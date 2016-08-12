<?php

class Login_contracts extends Contracts {

	public function __construct() {
		parent::__construct();
	}

	public function login() {
		$this->contracts->load->library('form_validation');
		$this->contracts->form_validation->set_rules('username', 'Username', 'required');
		$this->contracts->form_validation->set_rules('password', 'Password', 'required');
		if (!$this->contracts->form_validation->run()) {
			$this->contracts->redirect->withValidation()->back();
		}
	}

}