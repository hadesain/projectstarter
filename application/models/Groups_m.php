<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups_m extends BaseModel {

	protected $table = 'usr_groups';
	protected $fillable = array('group');
	protected $timestamp = true;
	protected $author = true;

	public function get_access() {
		return $this->db->get('usr_access')->result();
	}

	public function get_access_key($access_id) {
		return $this->db->where('access_id', $access_id)
		->get('usr_access_key')->result();
	}

	public function get_group_access($id) {
		return $this->db->where('group_id', $id)
		->get('usr_group_access')
		->result();
	}

	public function update_access($id, $access) {
		$this->db->where('group_id', $id)->delete('usr_group_access');
		foreach($access as $key => $val) {
			$this->db->insert('usr_group_access', array(
				'group_id' => $id,
				'access_key' => $key,
				'permission' => 1
			));
		}
	}

}