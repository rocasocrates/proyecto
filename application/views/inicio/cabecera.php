<?php
/**
 * Created by PhpStorm.
 * User: roca
 * Date: 1/12/16
 * Time: 23:47
 */
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publicidad</title>
    <meta name="author" content="Manuel Roca González">
    <meta name="description" content="Portal Web para descargar extensiones para gestionar la publicidad">
    <meta name="keywords" content="extendiones, publicidad">
    <meta name="robots" content="index, follow">

    <link rel="icon" href="imagenes/mano.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="<?php echo  base_url('css/bootstrap.min.css') ?>" >
    <script type="text/javascript" src="<?php echo base_url('javascript/jquery-1.12.1.min.js')?>">
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