<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Edit User</h3>
		</div>
		<div class="panel-body">
			<?= getview('layouts/partials/message') ?>
			<?= getview('layouts/partials/validation') ?>
			<?= $this->form->model($result, 'users/users/update_profile/' . $result->id) ?>
				<div class="row">
					<div class="col-md-4">
						<h3 class="form-title">Data Profil</h3>						
					</div>
					<div class="col-md-8">	
						<div class="form-group">
							<label>Nama</label>
							<?= $this->form->text('profile_name', null, 'class="form-control"') ?>
						</div>	
						<div class="form-group">
							<button class="btn btn-success">Perbarui Profil</button>
						</div>
					</div>
				</div>
			<?= $this->form->close() ?>
			<hr>
			<?= $this->form->model($result, 'users/users/update_setting/' . $result->id) ?>
				<div class="row">
					<div class="col-md-4">
						<h3 class="form-title">Pengaturan Akun</h3>						
					</div>
					<div class="col-md-8">	
						<div class="form-group">
							<label>Username</label>
							<?= $this->form->text('username', null, 'class="form-control" readonly') ?>
						</div>
						<div class="form-group">
							<label>Grup</label>
							<?= $this->form->select('group_id', $ls_group, null, 'class="form-control"') ?>
						</div>
						<div class="form-group">
							<button class="btn btn-success">Simpan Perubahan</button>
						</div>
					</div>
				</div>
			<?= $this->form->close() ?>
			<hr>
			<?= $this->form->model($result, 'users/users/change_password/' . $result->id) ?>
				<div class="row">
					<div class="col-md-4">
						<h3 class="form-title">Ubah Password</h3>						
					</div>
					<div class="col-md-8">											
						<div class="row">
							<div class="form-group col-md-6">
								<label>Password</label>
								<?= $this->form->password('password', null, 'class="form-control"') ?>
							</div>
							<div class="form-group col-md-6">
								<label>Ulangi Password</label>
								<?= $this->form->password('confirm_password', null, 'class="form-control"') ?>
							</div>
						</div>														
						<div class="form-group">
							<button class="btn btn-success">Ubah Password</button>
						</div>
					</div>
				</div>
			<?= $this->form->close() ?>
		</div>
		<div class="panel-footer text-right">							
			<a href="<?= base_url('users') ?>" class="btn btn-default">Batal</a>				
		</div>
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>