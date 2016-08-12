<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Data User</h3>
		</div>
		<div class="panel-body">
			<?= getview('layouts/partials/message') ?>
			<div class="panel-toolbar">
				<div class="row">
					<div class="col-md-12 text-right">
						<a href="<?= base_url('users/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
					</div>
				</div>
			</div>
			<table id="data-table" class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>Username</th>
						<th>Nama Profil</th>
						<th>Grup</th>
						<th>Login Terakhir</th>
						<th width="100px"></th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
<?php endsection() ?>

<?php section('page_script') ?>
<script>
$(function() {

	var data_table = $('#data-table').dataTable({
		serverSide : true,
		processing : true,
		ajax : {
			url : base_url('users'),
			type : 'post'
		},
		columns : [
			{data : 'username'},
			{data : 'profile_name'},
			{data : 'group'},
			{data : 'last_login'},
			{data : 'id', class : 'text-center action', orderable : false, render : function(data) {
				var output = '<a href="'+base_url('users/edit/' + data)+'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>';
				output    += '<a href="'+base_url('users/delete/' + data)+'" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"><i class="fa fa-trash"></i></a>';
				return output;
			}}
		]
	});	

});
</script>
<?php endsection() ?>

<?php getview('layouts/layout') ?>