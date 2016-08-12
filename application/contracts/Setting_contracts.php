<?php

class Setting_contracts extends Contracts {

	public function change_profile() {
		$this->contracts->load->library('form_validation');		
		$this->contracts->form_validation->set_rules('profile_name', 'Nama', 'required');
		if (!$this->contracts->form_validation->run()) {
			$this->contracts->redirect->withInput()->withValidation()->back();
		}
	}

	public function change_password() {
		$this->contracts->load->library('form_validation');
		$this->contracts->form_validation->set_rules('old_password', 'Password Lama', 'required');
		$this->contracts->form_validation->set_rules('new_password', 'Password Baru', 'required');
		$this->contracts->form_validation->set_rules('confirm_new_password', 'Ulangi Password Baru', 'required|matches[new_password]');
		if(!$this->contracts->form_validation->run()) {
			$this->contracts->redirect->withValidation()->back();
		}
	}

}