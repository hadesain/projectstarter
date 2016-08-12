<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Dashboard</h3>
		</div>
		<div class="panel-body">
			<div class="text-center">
				<h1>Selamat Datang di <?= $this->config->item('_application_name') ?></h1>
			</div>
		</div>
	</div>
<?php endsection('content') ?>

<?php getview('layouts/layout') ?>