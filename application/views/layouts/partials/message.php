<?php if ($this->session->flashdata('successMessage')) { ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i><?= $this->session->flashdata('successMessage') ?></h4>
	</div>
<?php } ?>
<?php if ($this->session->flashdata('errorMessage')) { ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i><?= $this->session->flashdata('errorMessage') ?></h4>
	</div>
<?php } ?>