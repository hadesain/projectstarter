<?php

class Model extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (ENVIRONMENT == 'production') {
			show_404();
		}
	}

	public function create($directory, $name = null) {
		if (!$name) {
			$name = $directory;						
			$path = '';
		} else {
			if (!is_dir('./application/controllers/' . $directory)) {
				mkdir('./application/controllers/' . $directory);
			}			
			$path = $directory .'/';
		}		
		$this->load->helper('file');
		$model = '<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

class '.ucwords($name).'_m extends BaseModel {

	protected $table = \''.$name.'\';
	protected $fillable = array();
	protected $timestamp = false;
	protected $author = false;

}';

		if (!file_exists('./application/models/' . $path . ucwords($name) . '_m.php')) {
			if (write_file('./application/models/' . $path . ucwords($name) . '_m.php', $model)) {
				echo "Model ". $name ." berhasil di buat\n";
			} else {
				echo "Model ". $name ." gagal di buat\n";
			}

		} else {
			echo "Model sudah dibuat\n";
		}		

	}

}