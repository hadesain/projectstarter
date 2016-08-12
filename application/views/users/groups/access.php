<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Penggaturan Akses</h3>
		</div>
		<?= $this->form->model($result, 'users/groups/update_access/' . $result->id) ?>
			<div class="panel-body">
				<?= getview('layouts/partials/message') ?>
				<?= getview('layouts/partials/validation') ?>	
				<div class="row">
					<div class="col-md-4">
						<h3 class="form-title">Data Grup</h3>						
					</div>
					<div class="col-md-8">					
						<div class="form-group">
							<label>Grup</label>
							<?= $this->form->text('group', null, 'class="form-control" readonly') ?>
						</div>										
					</div>
				</div>						
				<?php foreach($rs_access as $access) { ?>
					<hr>
					<div class="row">
						<div class="col-md-4">
							<h3 class="form-title"><?= $access->access ?></h3>						
						</div>
						<div class="col-md-8">					
							<table class="table table-bordered table-condensed">
								<?php foreach($access->rs_access_key as $access_key) { ?>
									<tr>
										<td><?= $access_key->description ?></td>
										<td width="1px">
											<?= $this->form->checkbox('access['.$access_key->access_key.']', '1') ?>
										</td>
									</tr>
								<?php } ?>
							</table>									
						</div>
					</div>
				<?php } ?>						
			</div>
			<div class="panel-footer text-right">				
				<button class="btn btn-success">Simpan</button>
				<a href="<?= base_url('users/groups') ?>" class="btn btn-default">Batal</a>				
			</div>
		<?= $this->form->close() ?>
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>