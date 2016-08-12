<?php
class BaseController extends CI_Controller {
    
	protected $access = array(
		'dashboard/index' => array(
			'has_login' => null
		),
		'setting/index' => array(
			'has_login' => null
		),

		'users/groups/index' => array(
			'has_login' => null,
			'authorization' => 'groups_get'
		),
		'users/groups/create' => array(
			'has_login' => null,
			'authorization' => 'groups_create'
		),
		'users/groups/store' => array(
			'has_login' => null,
			'authorization' => 'groups_create'
		),
		'users/groups/edit' => array(
			'has_login' => null,
			'authorization' => 'groups_edit'
		),
		'users/groups/update' => array(
			'has_login' => null,
			'authorization' => 'groups_edit'
		),
		'users/groups/access' => array(
			'has_login' => null,
			'authorization' => 'groups_access'
		),
		'users/groups/update_access' => array(
			'has_login' => null,
			'authorization' => 'groups_access'
		),
		'users/groups/delete' => array(
			'has_login' => null,
			'authorization' => 'groups_delete'
		),

		'users/users/index' => array(
			'has_login' => null,
			'authorization' => 'users_get'
		),
		'users/users/create' => array(
			'has_login' => null,
			'authorization' => 'users_create'
		),
		'users/users/store' => array(
			'has_login' => null,
			'authorization' => 'users_create'
		),
		'users/users/edit' => array(
			'has_login' => null,
			'authorization' => 'users_edit'
		),
		'users/users/update' => array(
			'has_login' => null,
			'authorization' => 'users_edit'
		),	
		'users/users/delete' => array(
			'has_login' => null,
			'authorization' => 'users_delete'
		)

	);

	public function __construct() {
		parent::__construct();	
		$this->load->library('../exceptions/exceptions');
		$this->load->library('../exceptions/model_exceptions');
		$this->middleware();
		$this->contracts();
	}


	public function middleware() {
		$access['directory'] = trim($this->router->directory, '/');
		$access['class'] = trim($this->router->fetch_class(), '/');
		$access['method'] = trim($this->router->fetch_method(), '/');
		$access = trim(implode('/', $access), '/');			
		if (isset($this->access[$access])) {			
			foreach ($this->access[$access] as $method => $data) {
				if ($data) {					
					$this->{$method}($data);
				} else {
					$this->{$method}();
				}
			}
		}
	}

	public function contracts() {
		$this->load->library('../contracts/contracts');
		$directory = $this->router->directory;
		$class = $this->router->fetch_class();		
		$method = $this->router->fetch_method();		
		if (file_exists(APPPATH . '/contracts/' . $directory . ucwords($class) . '_contracts.php')) {
			$contracts = $class . '_contracts';
			$this->load->library('../contracts/' . $directory . $contracts);							
			if (method_exists($this->{$contracts}, $method)) {				
				$params = array_slice($this->uri->rsegment_array(), 2);				
				call_user_func_array(array($this->{$contracts}, $method), $params);				
			} else {
				return true;
			}
		} else {
			return true;
		}
	}

	public function has_login() {
		if (isLogin()) {
			return true;
		} else {
			$this->redirect->guest('login');
		}
	}

	public function authorization($access_key) {					
		$permission = $this->db->where('group_id', getLogin('group_id'))
		->where('access_key', $access_key)
		->get('usr_group_access')
		->row();
		if ($permission) {
			if ($permission->permission) {
				return true;
			} else {
				$this->load->view('access_denied');
				exit();
			}		
		} else {
			$this->load->view('access_denied');
			exit();
		}
	}

}