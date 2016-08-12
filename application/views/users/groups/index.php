<?php section('content') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Data Grup</h3>
		</div>
		<div class="panel-body">
			<?= getview('layouts/partials/message') ?>
			<div class="panel-toolbar">
				<div class="row">
					<div class="col-md-12 text-right">
						<a href="<?= base_url('users/groups/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Grup Baru</a>
					</div>
				</div>
			</div>
			<table id="data-table" class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>Grup</th>						
						<th width="100px"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($result as $row) { ?>
						<tr>
							<td><?= $row->group ?></td>
							<td class="text-center">
								<a href="<?= base_url('users/groups/access/' . $row->id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-key"></i></a>
								<a href="<?= base_url('users/groups/edit/' . $row->id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url('users/groups/delete/' . $row->id) ?>" class="btn btn-danger btn-xs" onclick="confirm('Apakah anda yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
<?php endsection() ?>

<?php getview('layouts/layout') ?>