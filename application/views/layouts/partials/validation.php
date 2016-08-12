<?php if ($this->session->flashdata('validation')) { ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Form tidak terisi dengan benar!</h4>
		<?= $this->session->flashdata('validation') ?>
	</div>
<?php } ?>