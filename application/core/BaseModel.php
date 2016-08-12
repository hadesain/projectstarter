<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseModel extends CI_Model {

    protected $table;

    protected $primary_key = 'id';    

    protected $row_num = 'row_num';

    protected $auto_row_num = false;    

    protected $format_row_num = '{Y}{m}{d}:3';

    protected $fillable = array();

    protected $timestamp = false;

    protected $author = false;

    protected $error = null;

    protected $error_message = null;

    public function get() {
        return $this->db->get($this->table)->result();
    }

    public function get_by($column, $key) {
        return $this->db->where($column, $key)->get($this->table)->result();
    }

    public function count() {
        return $this->db->count_all_result($this->table);
    }

    public function count_by($column, $key) {
        return $this->db->where($column, $key)->count_all_result($this->table);
    }

    public function find($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function find_by($column, $key) {
        return $this->db->where($column, $key)->get($this->table)->row();
    }

    public function find_or_fail($id) {        
        if ($result = $this->find($id)) {
            return $result;
        } else {
            $this->model_exceptions->find_or_fail();
        }
    }

    public function lists($val_field, $lbl_field, $placeholder = null) {
        $list = array();
        if ($placeholder) {
            $list[''] = $placeholder;
        }
        $result = $this->get();
        foreach ($result as $row) {
            $list[$row->{$val_field}] = $row->$lbl_field;
        }
        return $list;
    }

    public function query() {
        return $this->db->get_compiled_select('usr_users');
    }
    
    public function insert($record) {
        if ($auto_row_key) {
            $record[$this->row_num] = $this->generate_row_key();
        }
        $record =  $this->fillable($record);
        if ($this->timestamp) {
            $record['created_at'] = date('Y-m-d H:i:s');            
        }
        if ($this->author) {
            $record['created_by'] = getLogin('username');
        }
        return $this->db->insert($this->table, $record);
    }

    public function update($id, $record) {
        $record =  $this->fillable($record);
        if ($this->timestamp) {            
            $record['updated_at'] = date('Y-m-d H:i:s');
        }
        if ($this->author) {
            $record['updated_by'] = getLogin('username');
        }
        return $this->db->where('id', $id)->update($this->table, $record);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function fillable($record) {
        $data = array();
        foreach ($this->fillable as $fillable) { 
          $formatters = array();         
          $parse = explode(':', $fillable);
          if (count($parse) > 1) {
            $fillable = $parse[0];              
            $formatters = explode('|', $parse[1]);
          }          
          if (isset($record[$fillable])) {            
            if (count($formatters) <> 0) {
                foreach ($formatters as $formatter) {
                    switch ($formatter) {
                        case 'date':
                            $data[$fillable] = date('Y-m-d', strtotime($record[$fillable]));
                            break;           
                        case 'upper':
                            $data[$fillable] = strtoupper($data[$fillable]);
                            break;
                        case 'lower':
                            $data[$fillable] = strtolower($data[$fillable]);                        
                        default:
                            $data[$fillable] = $record[$fillable];
                            break;
                    }                
                }
            } else {
                $data[$fillable] = $record[$fillable];
            }
          }
        }
        return $data;
    }

    public function generate_row_num() {
        $format = $this->format_row_num;
        $parse = explode(':', $format);
        $prefix = str_replace(array('{Y}', '{m}', '{d}'), array(date('Y'), date('m'), date('d')), $parse[0]);
        $digit = str_repeat('0', $parse[1]);
        $last_id =  $this->db->select_max($this->row_num)
        ->where('left('.$this->row_num.','.(strlen($prefix)).')', $prefix)
        ->get($this->table)->row()->{$this->row_num};
        if ($last_id) {            
            $counter = substr($last_id, -strlen($digit)) + 1;
            return $prefix.substr($digit.$counter, -strlen($digit));
        } else {
            return $prefix.substr($digit.'1', -strlen($digit));
        }        
    }

    public function set_error($key, $message) {
        $this->error = $key;
        $this->error_message = $message;
    }

    public function get_error() {
        return $this->error;
    }

    public function get_error_message() {
        return $this->error_message;
    }

}