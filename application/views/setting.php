<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Pengaturan</h3>
		</div>
		<div class="panel-body">
			<?= getview('layouts/partials/message') ?>
			<?= getview('layouts/partials/validation') ?>
			<?= $this->form->open('setting/change_profile') ?>
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
			<?= $this->form->open('setting/change_password') ?>
				<div class="row">
					<div class="col-md-4">
						<h3 class="form-title">Ubah Password</h3>						
					</div>
					<div class="col-md-8">					
						<div class="form-group">
							<label>Password Lama</label>
							<?= $this->form->password('old_password', null, 'class="form-control"') ?>
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<?= $this->form->password('new_password', null, 'class="form-control"') ?>
						</div>
						<div class="form-group">
							<label>Ulangi Password Baru</label>
							<?= $this->form->password('confirm_new_password', null, 'class="form-control"') ?>
						</div>	
						<div class="form-group">
							<button class="btn btn-success">Ubah Password</button>
						</div>									
					</div>
				</div>
			<?= $this->form->close() ?>
		</div>		
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>
