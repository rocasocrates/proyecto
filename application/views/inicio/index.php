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
        href="<?= base_url('css/bootstrap.min.css') ?>" >
  <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js') ?>">

  </script>
  <link rel="stylesheet" type="text/css" href="<?= base_url('estilo/misitio.css') ?>">


</head>
<body>
<div id="main">
    <header>
        <h1>Media<strong>Count</strong></h1>
	<?php if(isset($mensaje)): ?>
		<h2><?= $mensaje;?></h2>
	<?php endif; ?>
	<?= form_open("usuarios/login", array('role' => 'form',
                                            'class'=> 'form-horizontal')) ?>
	<div class="form-group">
      <div class="col-lg-10">
      <?= form_input('email', set_value('email', FALSE), 'id="email" placeholder="Email" class="form-control"') ?>
        </div>
	</div>
      <div class="form-group">
        <div class="col-lg-10">
        <?= form_password('password', '', 'id="password" class="form-control" placeholder="Contraseña"') ?>
          </div>
      </div>
      <span class="input-group-btn">
      <?= form_submit('submit', 'Entrar', 'class="btn btn-primary btn-xs botones"') ?>
      <?= anchor('Usuarios/registro_usuario', 'Registro', 'class="btn btn-primary btn-xs botones" role="button"') ?>
      </span>
      <?= form_close() ?>
      <?= validation_errors() ?>
      <script>
        if (window.localStorage) {

          localStorage.setItem("nombre", "pepe");

          var nombre = localStorage.getItem("nombre");

          localStorage.removeItem("nombre");
        }
        else {
          throw new Error('Tu Browser no soporta LocalStorage!');
        }
      </script>
    </header>
  <nav>
    <span><?= anchor('Extensiones/descargar', 'Descargas', 'class="enlace1"') ?></span>
    <span><?= anchor('Extensiones/descargar', 'Recuento', 'class="enlace1"') ?></span>
  </nav>
</div>
</body>
</html>