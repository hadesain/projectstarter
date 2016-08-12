<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->model('users_m');
	}

	public function index() {		
		$this->load->view('login');
	}	

	public function attemp() {
		$post = $this->input->post();	
		$result = $this->users_m->attemp($post['username'], $post['password']);		
		if (!$result) {
			$this->redirect->with('errorMessage', 'Username / Password tidak sesuai.')->back();
		}
		$this->redirect->intended('dashboard');
	}

	public function logout() {
		$this->users_m->logout();
		$this->redirect->to('login');
	}

}
