<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Publicidad</title>
        <meta name="author" content="Manuel Roca González">
        <meta name="description" content="Portal Web para descargar extensiones para gestionar la publicidad">
        <meta name="keywords" content="extendiones, publicidad">
        <meta name="robots" content="index, follow">
        <script type="text/javascript">

            function validar_nick(nick) {
                var elementonick = document.getElementById('errornick');
                if(!/^\w+$/.test(nick)) {
                    throw new Error("Nick incorrecto. Debe tener algun caracter.");
                }else
                {
                    if(elementonick.childNodes != null)
                    {
                        elementonick.style.visibility = 'hidden';
                    }
                }

            }
            function validar_email(email) {
                var elementoemail = document.getElementById('erroremail');
                if(!/^.*@.*\..*$/.test(email)) {
                    throw new Error("Email incorrecto. Debe ser del tipo xxx@yyy.zzz");
                }else
                {
                    if(elementoemail.childNodes != null)
                    {
                        elementoemail.style.visibility = 'hidden';
                    }
                }
            }
            function validar_password(password) {
                var elementopassword = document.getElementById('errorpassword');
                if(!/^\w{8,10}$/.test(password)) {
                    throw new Error("Password incorrecta. Debe tener entre 8 y 10 caracteres.");
                }else
                {
                    if(elementopassword.childNodes != null)
                    {
                        elementopassword.style.visibility = 'hidden';
                    }
                }

            }
            function validar_repassword(password, repassword) {
                var elementorepassword = document.getElementById('errorrepassword');
                if(!/^\w{8,10}$/.test(password)) {
                    throw new Error("Password incorrecta. Debe tener entre 8 y 10 caracteres.");
                }
                if (password != repassword) {
                    throw new Error("Las contraseñas no coinciden");
                }else
                {
                    if(elementorepassword.childNodes != null)
                    {
                        elementorepassword.style.visibility = 'hidden';
                    }
                }
            }
            window.onload= function () {
//$(document).ready(function(){
                document.getElementById('nickr').addEventListener('blur',function (event) {
                    var evento = event || window.event;
                    try {
                        validar_nick(document.getElementById('nickr').value);

                        // document.getElementById('errornick').style.visibility = 'hidden';
                    } catch (error) {
                        evento.preventDefault();
                        document.getElementById('errornick').innerHTML = error;
                        document.getElementById('errornick').style.visibility = 'visible';
                        document.getElementById('errornick').style.color = '#BB0E0D';

                    }
                });
                document.getElementById('emailr').addEventListener('blur',function (event) {
                    var evento = event || window.event;
                    try {
                        validar_email(document.getElementById('emailr').value);

                    } catch (error) {
                        evento.preventDefault();
                        document.getElementById('erroremail').innerHTML = error;
                        document.getElementById('erroremail').style.visibility = 'visible';
                        document.getElementById('erroremail').style.color = '#BB0E0D';
                    }
                });
                document.getElementById('passwordr').addEventListener('blur',function (event) {
                    var evento = event || window.event;
                    try {
                        validar_password(document.getElementById('passwordr').value);
                    } catch (error) {
                        evento.preventDefault();
                        document.getElementById('errorpassword').innerHTML = error;
                        document.getElementById('errorpassword').style.visibility = 'visible';
                        document.getElementById('errorpassword').style.color = '#BB0E0D';
                    }
                });
                document.getElementById('repasswordr').addEventListener('blur',function (event) {
                    var evento = event || window.event;
                    try {
                        validar_repassword(document.getElementById('passwordr').value), document.getElementById('repasswordr').value;
                    } catch (error) {
                        evento.preventDefault();
                        document.getElementById('errorrepassword').innerHTML = error;
                        document.getElementById('errorrepassword').style.visibility = 'visible';
                        document.getElementById('errorrepassword').style.color = '#BB0E0D';
                    }
                });

            }
            //});



        </script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css') ?>" >

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('estilo/misitio.css')?>">


    </head>
<body>

<header>

    <div id="contenidoheader" class="contenido">
        <a href="<?php echo base_url('index.php/Usuarios/index')?>"><img src="<?php echo base_url('imagenes/logo.png');?>" alt="logo"></a>
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
<footer role="contentinfo">
    <section>
        <div>
            <img src="<?php echo base_url('imagenes/facebook.gif'); ?>"/>
            <img src="<?php echo base_url('imagenes/twitter.gif'); ?>"/>
        </div>

    </section>
    <p>&copy; 2016 " www.mediacount.es" || Todos los derechos reservados </p>
    <p></p>
</footer>
</body>
</html>