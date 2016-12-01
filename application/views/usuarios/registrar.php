<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publicidad</title>
    <meta name="author" content="Manuel Roca González">
    <meta name="description" content="Portal Web para descargar extensiones para gestionar la publicidad">
    <meta name="keywords" content="extendiones, publicidad">
    <meta name="robots" content="index, follow">

    <link rel="icon" href="imagenes/mano.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" type="text/css"
          href="<?= base_url('css/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js') ?>">

    </script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('estilo/misitio.css') ?>">


</head>
<body>
<header>
    <div id="contenidoheader" class="contenido">
        <img src="<?php echo base_url('imagenes/logo.png'); ?>">
        <?php if (isset($mensaje)): ?> <h2><?= $mensaje; ?></h2> <?php endif; ?>
    </div>
</header>
<?= form_open("Usuarios/registrar", array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'formulario')) ?>
<div class="form-group">
    <?= form_label('Nick:', 'nick', array('class' => 'col-lg-2 control-label')) ?>
    <div class="col-lg-10">
        <?= form_input('nick', set_value('nick', '', FALSE),
            'id="nick" class="form-control"') ?>
    </div>
</div>
<div class="form-group">
    <?= form_label('Email:', 'email', array('class' => 'col-lg-2 control-label')) ?>
    <div class="col-lg-10">
        <?= form_input('email', set_value('email', '', FALSE),
            'id="email" class="form-control"') ?>
    </div>
</div>
<div class="form-group">
    <?= form_label('Password:', 'password', array('class' => 'col-lg-2 control-label')) ?>
    <div class="col-lg-10">
        <?= form_input('password', set_value('password', '', FALSE),
            'id="password" class="form-control"') ?>
    </div>
</div>
<div class="form-group">
    <?= form_label('Confirme Password:', 'repassword', array('class' => 'col-lg-2 control-label')) ?>
    <div class="col-lg-10">
        <?= form_input('repassword', set_value('repassword', '', FALSE),
            'id="repassword" class="form-control"') ?>

    </div>
</div>
<?= form_submit('submit', 'submit', 'class="btn btn-success"') ?>
<?= form_close() ?>
<?= validation_errors() ?>

</body>
</html>