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
				<?= $this->form->text('group', null, 'class="form-control"') ?>
			</div>										
		</div>
	</div>			
</div>
<div class="panel-footer text-right">				
	<button class="btn btn-success">Simpan</button>
	<a href="<?= base_url('users/groups') ?>" class="btn btn-default">Batal</a>				
</div>