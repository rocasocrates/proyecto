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
          href="<?php echo base_url('css/bootstrap.min.css'); ?>">
   
    <script type="text/javascript" src="http://localhost/publicidad/javascript/validarFormulario.js">
    </script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('estilo/misitio.css'); ?>">
    <script type="text/javascript" src="http://localhost/publicidad/javascript/jquery-1.12.1.min.js">
    </script>
    <!-- <script type="text/javascript" src="<?php //echo  base_url('js/bootstrap.min.js'); ?>">

   </script>-->
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
            'id="nickr" class="form-control"') ?>
    </div>
    <p id="errornick"></p>
</div>
<div class="form-group">
    <?= form_label('Email:', 'email', array('class' => 'col-lg-2 control-label')) ?>
    <div class="col-lg-10">
        <?= form_input('email', set_value('email', '', FALSE),
            'id="emailr" class="form-control"') ?>
    </div>
    <p id="erroremail"></p>
</div>
<div class="form-group">
    <?= form_label('Password:', 'password', array('class' => 'col-lg-2 control-label')) ?>
    <div class="col-lg-10">
        <?= form_input('password', set_value('password', '', FALSE),
            'id="passwordr" class="form-control"') ?>
    </div>
    <p id="errorpassword"></p>
</div>
<div class="form-group">
    <?= form_label('Confirme Password:', 'repassword', array('class' => 'col-lg-2 control-label')) ?>
    <div class="col-lg-10">
        <?= form_input('repassword', set_value('repassword', '', FALSE),
            'id="repasswordr" class="form-control"') ?>

    </div>
    <p id="errorrepassword"></p>
</div>
<?= form_submit('submit', 'Enviar', 'class="btn btn-success" id="envio"') ?>
<?= form_close() ?>
<?= validation_errors() ?>
</body>
<?php include 'footer.php'; ?>
</html>