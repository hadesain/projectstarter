<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= getConfig('_application_name') ?></title>
	<link rel="stylesheet" href="<?= base_url('public/plugins/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/plugins/font-awesome-4.5.0/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert/sweetalert.css') ?> ">
	<link rel="stylesheet" href="<?= base_url('public/plugins/jquery.growl/jquery.growl.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/plugins/datepicker/datepicker3.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/plugins/timepicker/bootstrap-timepicker.min.css') ?> ">
	<link rel="stylesheet" href="<?= base_url('public/plugins/datatables/dataTables.bootstrap.css') ?>">
	<?php render('css') ?>	
	<link rel="stylesheet" href="<?= base_url('public/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/css/skins/_all-skins.min.css') ?>">  	
	<link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="#" class="logo">
				<span class="logo-mini"><?= getConfig('_application_short_name') ?></span>
				<span class="logo-lg"><?= getConfig('_application_name') ?></span>
			</a>
			<nav class="navbar navbar-static-top" role="navigation">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= getLogin('profile_name') ?></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('setting') ?>"><i class="fa fa-gear"></i> Pengaturan</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<?= base_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<li>
						<a href="<?= base_url('dashboard') ?>">
							<i class="fa fa-home"></i> <span>Dashboard</span>
						</a> 
					</li>					
					<li class="treeview">
						<a href="#>"><i class="fa fa-users"></i> <span>User</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= base_url('users/groups') ?>">Group User</a></li>							
							<li><a href="<?= base_url('users') ?>">Data User</a></li>							
						</ul>						
					</li>
				</ul>
			</section>
		</aside>
		<div class="content-wrapper">
			<section class="content-header">
				<?php render('content_header') ?>
			</section>
			<section class="content">
				<?php render('content') ?>
			</section>
		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<strong><center>Copyright &copy; 2016 StarterPack</center></strong>    
		</footer>
	</div>
	<script src="<?= base_url('public/plugins/jQuery/jQuery-2.2.0.min.js') ?>"></script>
	<script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('public/js/moment.min.js') ?>"></script>	
	<script src="<?= base_url('public/plugins/sweetalert/sweetalert.js') ?>"></script>
	<script src="<?= base_url('public/plugins/sweetalert/sweetalert.min.js') ?>"></script>
	<script src="<?= base_url('public/plugins/jquery.growl/jquery.growl.js') ?>"></script>
	<script src="<?= base_url('public/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>	
	<script src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('public/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>	
	<?php render('script') ?>
	<script src="<?= base_url('public/js/app.min.js') ?>"></script>
	<script src="<?= base_url('public/js/app/app.js') ?>"></script>
	<?php render('page_script') ?>
</body>
</html>
