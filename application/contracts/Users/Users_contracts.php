<?php

class Users_contracts extends Contracts {

	public function store() {
		$this->contracts->load->library('form_validation');
		$this->contracts->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->contracts->form_validation->set_rules('password', 'Password', 'required|alpha_numeric');
		$this->contracts->form_validation->set_rules('confirm_password', 'Ulangi Password', 'matches[password]');
		$this->contracts->form_validation->set_rules('profile_name', 'Nama', 'required');
		if (!$this->contracts->form_validation->run()) {
			$this->contracts->redirect->withInput()->withValidation()->back();
		}
	}		

	public function update_profile() {		
		$this->contracts->load->library('form_validation');		
		$this->contracts->form_validation->set_rules('profile_name', 'Nama', 'required');
		if (!$this->contracts->form_validation->run()) {
			$this->contracts->redirect->withInput()->withValidation()->back();
		}	
	}

	public function change_password() {
		$this->contracts->load->library('form_validation');		
		$this->contracts->form_validation->set_rules('password', 'Password', 'required|alpha_numeric');
		$this->contracts->form_validation->set_rules('confirm_password', 'Ulangi Password', 'required|matches[password]');		
		if (!$this->contracts->form_validation->run()) {
			$this->contracts->redirect->withInput()->withValidation()->back();
		}
	}

}