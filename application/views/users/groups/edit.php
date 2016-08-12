<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Edit Grup User</h3>
		</div>
		<?= $this->form->model($result, 'users/groups/update/' . $result->id) ?>
			<?php getview('users/groups/form') ?>
		<?= $this->form->close() ?>
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>