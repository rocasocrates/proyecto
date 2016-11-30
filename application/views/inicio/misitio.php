<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publicidad</title>
    <meta name="author" content="Manuel Roca González">
    <meta name="description" content="Portal Web para descargar extensiones para gestionar la publicidad">
    <meta name="keywords" content="extendiones, publicidad">
    <meta name="robots" content="index, follow">

    <link rel="icon" href="imagenes/mano.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css') ?>" >
    <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>">
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('estilo/misitio.css');?>">


</head>
<body>
<div id="main">
<?php   $this->load->library('session');?>

<header>
    <div id="contenidoheader" class="contenido">
    <img src="<?php echo base_url('imagenes/logo.png');?>">
	<p>Usuario : <strong> <?php echo $this->session->userdata('minick'); ?></strong>
        <?= anchor('Usuarios/cerrar_session', 'Cerrar Sesión', 'class="btn btn-primary btn-xs botones" role="button"') ?></p>
    </div>
</header>
    <nav>
        <div id="contenedornav" class="contenido">
        <span><?= anchor('#', 'Descargas', 'class="enlace1"') ?></span>
        <span><?= anchor('Recuento/recuento', 'Recuento', 'class="enlace1"') ?></span>
        </div>
    </nav>
<section>
    Bienvenido a su zona aquí puedes descargar una extensión para google chrome y también puedes dirigirte a ver
    la publicidad consumida.
</section>

	<p> <?= anchor('Extensiones/descargar', 'Descargar') ?></p>

</div>
</body>
</html>