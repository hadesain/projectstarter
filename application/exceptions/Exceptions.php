<?php

class Exceptions {

	protected $exceptions;

	public function __construct() {
		$this->exceptions = &get_instance();
	}

}