<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends BaseModel {

	protected $table = 'usr_users';
	protected $fillable = array('username', 'password', 'group_id', 'profile_name');
	protected $timestamp = true;
	protected $author = true;

	public function view_users() {
		$this->db->select('usr_users.*, usr_groups.group')
		->join('usr_groups', 'usr_groups.id = usr_users.group_id');
		return $this;
	}

	public function attemp($username, $password) {
		$user = $this->db->where('username', $username)
		->where('password', sha1($password))
		->get($this->table)
		->row();
		$log = $this->db->where('username', $username)
			->where('left(created_at, 10) = ', date('Y-m-d'))
			->where('success', 0)
			->get('usr_logs')
			->row();		
		if ($user) {		
			$this->db->where('username', $username)
			->update($this->table, array(
				'last_login' => date('Y-m-d H:i:s')
			));
			if ($log) {
				$this->db->set('attemp', 'attemp + 1', false)
				->set('updated_at', date('Y-m-d H:i:s'))
				->set('success', 1)
				->where('left(created_at, 10) = ', date('Y-m-d'))
				->where('username', $username)
				->where('success', 0)
				->update('usr_logs');
			} else {
				$this->db->insert('usr_logs', array(
					'username' => $username,				
					'attemp' => 1,
					'success' => 1,
					'created_at' => date('Y-m-d H:i:s')
				));
			}		
			setLogin(array(
				'id' => $user->id,
				'username' => $user->username,
				'group_id' => $user->group_id,
				'profile_name' => $user->profile_name,
				'login_at' => date('Y-m-d H:i:s'),

			));	
		} else {
			if ($log) {
				$this->db->set('attemp', 'attemp + 1', false)
				->set('updated_at', date('Y-m-d H:i:s'))
				->where('left(created_at, 10) = ', date('Y-m-d'))
				->where('username', $username)
				->where('success', 0)
				->update('usr_logs');
			} else {
				$this->db->insert('usr_logs', array(
					'username' => $username,				
					'attemp' => 1,
					'success' => 0,
					'created_at' => date('Y-m-d H:i:s')
				));
			}
			$this->set_error('usr-invalid_login', 'Username/Password tidak sesuai.');
		}
		return $user;
	}

	public function logout() {
		unsetLogin();
		return true;
	}

	public function register($username, $password, $attributes = array()) {
		$record = $attributes;
		$record['username'] = $username;
		$record['password'] = sha1($password);
		return $this->insert($record);
	}

	public function update($id, $record) {		
		$record =  $this->fillable($record);
		if (isset($record['password'])) {
			$record['password'] = sha1($record['password']);
		}
        if ($this->timestamp) {            
            $record['updated_at'] = date('Y-m-d H:i:s');
        }
        if ($this->author) {
            $record['updated_by'] = getLogin('username');
        }
        return $this->db->where('id', $id)->update($this->table, $record);
	}

	public function change_password($username, $old_password, $new_password) {
		$user = $this->find_by('username', $username);		
		if ($user) {
			if ($user->password == sha1($old_password)) {			
				$record['password'] = $new_password;
				return $this->update($user->id, $record);
			} else {
				$this->set_error('usr-old_password_no_matches', 'Password lama tidak cocok');
				return false;			
			}		
		} else {
			$this->set_error('usr-username_not_found', 'Username tidak terdaftar');
			return false;
		}
	}

	public function change_profile($username, $record) {		
		$user = $this->find_by('username', $username);		
		if ($user) {			
			$result = $this->update($user->id, $record);
			if ($result) {
				$user = $this->find_by('username', $username);	
				$login = getLogin();
				setLogin(array(
					'id' => $user->id,
					'username' => $user->username,
					'group_id' => $user->group_id,
					'profile_name' => $user->profile_name,
					'login_at' => $login['getLogin'],
				));	
			}
			return $result;
		} else {
			$this->set_error('usr-username_not_found', 'Username tidak terdaftar');
			return false;
		}
	}

}