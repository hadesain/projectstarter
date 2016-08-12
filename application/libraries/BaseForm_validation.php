<?php
class BaseForm_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();        
    }

    public function errors() {
    	return $this->_error_array;
    }

}