<?php
class BaseLoader extends CI_Loader {
    public function __construct() {
        parent::__construct();
    }

    public function view($view, $vars = array(), $return = false) {                
        ob_start();
        $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => false));
        $output = ob_get_clean();
        $output = trim($output);
        if ($return) {
            return $output;
        } else {
            $CI = &get_instance();
            echo $output;            
        }
    }
}