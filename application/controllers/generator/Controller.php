<?php

class Controller extends CI_Controller {

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
		$controllers = '<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

class '.ucwords($name).' extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

	}

	public function create() {

	}

	public function store() {

	}

	public function edit($id) {

	}

	public function update($id) {

	}

	public function delete($id) {

	}

}';

$contracts = '<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

class '.ucwords($name).'_contracts extends Contracts {

	public function __construct() {
		parent::__construct();
	}

	public function store() {

	}

	public function update() {

	}

	public function delete() {

	}

}';
		if (!file_exists('./application/controllers/' . $path . ucwords($name) . '.php') && !file_exists('./application/contracts/' . $path . ucwords($name) . '.php')) {
			if (write_file('./application/controllers/' . $path . ucwords($name) . '.php', $controllers)) {
				echo "Controller ". $name ." berhasil di buat\n";
			} else {
				echo "Controller ". $name ." gagal di buat\n";
			}

			if (write_file('./application/contracts/' . $path . ucwords($name) . '_contracts.php', $contracts)) {
				echo "Contracts ". $name ." berhasil di buat\n";
			} else {
				echo "Contracts ". $name ." gagal di buat\n";
			}
		} else {
			echo "Controller/Contracts sudah dibuat\n";
		}		

	}

}