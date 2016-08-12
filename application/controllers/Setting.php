<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends BaseController {

	public function __construct() {
		parent::__construct();	
		$this->load->model('users_m');
	}

	public function index() {
		$this->load->view('setting');
	}

	public function change_password() {
		$post = $this->input->post();
		$result = $this->users_m->change_password(getLogin('username'), $post['old_password'], $post['new_password']);
		if ($result) {
			$this->redirect->with('successMessage', 'Password berhasil diperbarui.');
		} else{				
			$this->redirect->with('errorMessage', 'Password lama tidak sesuai.');
		}
		$this->redirect->back();		
	}

	public function change_profile() {
		$post = $this->input->post();				
		$this->users_m->change_profile(getLogin('username'), $post);
		$this->redirect->with('successMessage', 'Profile berhasil diperbaui.')->back();
	}

}