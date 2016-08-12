<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Edit Lokasi</h3>
		</div>
		<?= $this->form->model($result, null, $result->id) ?>
			<?php getview('lokasi/form') ?>
		<?= $this->form->close() ?>
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>