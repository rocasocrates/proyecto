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
        href="<?php echo base_url('css/bootstrap.min.css') ?>" >
  <script type="text/javascript" src="<?php echo base_url('javascript/jquery-1.12.1.min.js')?>">

  </script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('estilo/misitio.css')?>">


</head>
<body>
<div id="main">
        <header>
          <div id="contenidoheader" class="contenido">
              <img src="<?php echo base_url('imagenes/logo.png');?>">
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
          </div>
        </header>
  <nav>
    <div id="contenedornav" class="contenido">
      <span><?= anchor('#', 'Descargas', 'class="enlace1"') ?></span>
      <span><?= anchor('Recuento/recuento', 'Recuento', 'class="enlace1"') ?></span>
    </div>
  </nav>
    <!--<h1>¡¡¡Bienvenido</h1>-->
    <div id="video"><!--Esto es un sitio web para cuantificar la publicidad que consumes durante tu navegación.
        Instalate la extensión mediacount desde google chrome regístrate aquí y toda la publicidad que te encuentres durante tu
        navegación por la web será guardada en este sitio y podrás verla cuando quieras solo tienes que registrarte con un correo.
        Hoy día es importante saber cuanta publicidad estas consumiendo por donde navegas nosotros te la cuantificamos-->
        <video controls="">
            <source src="<?php echo base_url('videos/mediacount.mp4')?>" type="video/mpeg4">
            <source src="<?php echo base_url('videos/mediacount.ogv')?>" type="video/ogg">
            <source src="<?php echo base_url('videos/mediacount.webm')?>" type="video/webm">
        </video>
    </div>

</div>
<?php include 'footer.php'; ?>
</body>
</html>