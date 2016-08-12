<?php

class View extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (ENVIRONMENT == 'production') {
			show_404();
		}
	}

	public function create_all($directory, $name = null) {
		$this->create_index($directory, $name);
		$this->create_create($directory, $name);
		$this->create_edit($directory, $name);
	}

	public function create_index($directory, $name = null) {						
		if (!is_dir('./application/views/' . $directory)) {
			mkdir('./application/views/' . $directory);
		}					
		$path = $directory .'/';
		if (!$name) {
			$name = $directory;						
		} else {
			if (!is_dir('./application/views/' . $path . $name)) {
				mkdir('./application/views/' . $path . $name);
			}
			$path = $directory . '/' . $name . '/';
		}						
		
		$this->load->helper('file');
		$index = '<?php section(\'content\') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Data '.ucwords($name).'</h3>
		</div>
		<div class="panel-body">
			<?= getview(\'layouts/partials/message\') ?>
			<div class="panel-toolbar">
				<div class="row">
					<div class="col-md-12 text-right">
						<!--Toolbar-->
					</div>
				</div>
			</div>			
			<!--Content-->
		</div>
	</div>
<?php endsection() ?>

<?php getview(\'layouts/layout\') ?>
';
		if (!file_exists('./application/views/' . $path . 'index.php')) {
			if (write_file('./application/views/' . $path . 'index.php', $index)) {
				echo "View " . $path . "index berhasil dibuat\n";
			} else {
				echo "View " . $path . "index gagal dibuat\n";
			}
		} else {
			echo "View " . $path . "index sudah ada\n";
		}
	}

	protected function create_form($directory, $name = null) {			
		if (!is_dir('./application/views/' . $directory)) {
			mkdir('./application/views/' . $directory);
		}					
		$path = $directory .'/';
		if (!$name) {
			$name = $directory;						
		} else {
			if (!is_dir('./application/views/' . $path . $name)) {
				mkdir('./application/views/' . $path . $name);
			}
			$path = $directory . '/' . $name . '/';
		}
		
		$this->load->helper('file');
		$form = '<div class="panel-body">
	<?= getview(\'layouts/partials/message\') ?>
	<?= getview(\'layouts/partials/validation\') ?>			
	<div class="row">
		<!--Form-->
	</div>			
</div>
<div class="panel-footer text-right">				
	<button class="btn btn-success">Simpan</button>
	<a href="#" class="btn btn-default">Batal</a>				
</div>';
		if (!file_exists('./application/views/' . $path . 'form.php')) {
			if (write_file('./application/views/' . $path . 'form.php', $form)) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function create_create($directory, $name = null) {		
		$this->create_form($directory, $name);
		if (!is_dir('./application/views/' . $directory)) {
			mkdir('./application/views/' . $directory);
		}					
		$path = $directory .'/';
		if (!$name) {
			$name = $directory;						
		} else {
			if (!is_dir('./application/views/' . $path . $name)) {
				mkdir('./application/views/' . $path . $name);
			}
			$path = $directory . '/' . $name . '/';
		}		
		
		$this->load->helper('file');
		$create = '<?php section(\'content\') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Tambah '.ucwords($name).'</h3>
		</div>
		<?= $this->form->open() ?>
			<?php getview(\''.$name.'/form\') ?>
		<?= $this->form->close() ?>
	</div>
<?php endsection() ?>

<?php getview(\'layouts/layout\') ?>';		
		if (!file_exists('./application/views/' . $path . 'create.php')) {
			if (write_file('./application/views/' . $path . 'create.php', $create)) {
				echo "View " . $path . "create berhasil dibuat\n";
			} else {
				echo "View " . $path . "create gagal dibuat\n";
			}
		} else {
			echo "View " . $path . "create sudah ada\n";
		}
	}

	public function create_edit($directory, $name = null) {		
		$this->create_form($directory, $name);
		if (!is_dir('./application/views/' . $directory)) {
			mkdir('./application/views/' . $directory);
		}					
		$path = $directory .'/';
		if (!$name) {
			$name = $directory;						
		} else {
			if (!is_dir('./application/views/' . $path . $name)) {
				mkdir('./application/views/' . $path . $name);
			}
			$path = $directory . '/' . $name . '/';
		}
		
		$this->load->helper('file');
		$edit = '<?php section(\'content\') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Edit '.ucwords($name).'</h3>
		</div>
		<?= $this->form->model($result, null, $result->id) ?>
			<?php getview(\''.$name.'/form\') ?>
		<?= $this->form->close() ?>
	</div>
<?php endsection() ?>

<?php getview(\'layouts/layout\') ?>';		
		if (!file_exists('./application/views/' . $path . 'edit.php')) {
			if (write_file('./application/views/' . $path . 'edit.php', $edit)) {
				echo "View " . $path . "edit berhasil dibuat\n";
			} else {
				echo "View " . $path . "edit gagal dibuat\n";
			}
		} else {
			echo "View " . $path . "edit sudah ada\n";
		}
	}

}