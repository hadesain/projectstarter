<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Tambah User</h3>
		</div>
		<?= $this->form->open('users/users/store') ?>
			<div class="panel-body">
				<?= getview('layouts/partials/message') ?>
				<?= getview('layouts/partials/validation') ?>			
				<div class="row">
					<div class="col-md-4">
						<h3 class="form-title">Data Akun</h3>						
					</div>
					<div class="col-md-8">					
						<div class="form-group">
							<label>Username</label>
							<?= $this->form->text('username', null, 'class="form-control"') ?>
						</div>
						<div class="form-group">
							<label>Grup</label>
							<?= $this->form->select('group_id', $ls_group, null, 'class="form-control"') ?>
						</div>
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
							<label>Nama</label>
							<?= $this->form->text('profile_name', null, 'class="form-control"') ?>
						</div>							
					</div>
				</div>			
			</div>
			<div class="panel-footer text-right">				
				<button class="btn btn-success">Simpan</button>
				<a href="<?= base_url('users') ?>" class="btn btn-default">Batal</a>				
			</div>
		<?= $this->form->close() ?>
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>