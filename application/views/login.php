<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login::<?= getConfig('_application_name') ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('public/plugins/font-awesome-4.5.0/css/font-awesome.min.css') ?>">     
    <link rel="stylesheet" href="<?= base_url('public/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/AdminLTE.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/login.css') ?>">          
</head>

<body>    
    <?= $this->form->open('login/attemp') ?>
    <div class="login-wrapper">
        <?php getview('layouts/partials/message') ?>
        <?php getview('layouts/partials/validation') ?>
        <div class="login-header text-center">
            <i class="fa fa-users" style="font-size: 150px"></i>
            <h3><?= getConfig('_application_name') ?></h3>
        </div>
        <div class="form-group">
            <?= $this->form->text('username', null, 'class="form-control form-login" placeholder="Username"') ?>
        </div>
        <div class="form-group">
            <?= $this->form->password('password', null, 'class="form-control form-login" placeholder="Password"') ?>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block text-center">Login To Enter Application</button>
        </div>
    </div>    
    <?= $this->form->close() ?>
    <script src="<?= base_url('public/plugins/jQuery/jQuery-2.2.0.min.js') ?>"></script>
</body>
</html>
