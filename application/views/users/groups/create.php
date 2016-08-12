<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Buat Grup User</h3>
		</div>
		<?= $this->form->open('users/groups/store') ?>
			<?php getview('users/groups/form') ?>
		<?= $this->form->close() ?>
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>