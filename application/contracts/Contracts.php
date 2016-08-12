<?php

class Contracts {
	protected $contracts;

	public function __construct() {
		$this->contracts = &get_instance();
	}

}