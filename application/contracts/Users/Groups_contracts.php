<?php

class Groups_contracts extends Contracts {

	public function store() {
		$this->validation();		
	}		

	public function update() {
		$this->validation();
	}

	public function validation() {
		$this->contracts->load->library('form_validation');
		$this->contracts->form_validation->set_rules('group', 'Group', 'required');		
		if (!$this->contracts->form_validation->run()) {
			$this->contracts->redirect->withInput()->withValidation()->back();
		}
	}

}