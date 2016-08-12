<?php

class Model_exceptions extends Exceptions {


	public function __construct() {
		parent::__construct();
	}

	public function find_or_fail() {
		$this->exceptions->redirect->with('errorMessage', 'Data tidak ditemukan')->back();
	}

}