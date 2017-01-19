<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manager</title>
        <link rel="stylesheet" href="<?= base_url() ?>css/Bootstrap.min.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    </head>   
    <?php include ('header.php'); ?>
    <body>
        <div class="btn-link" style="margin-left: 90%">
            <a href="<?= site_url('/Home_control/urlLogin'); ?>">Iniciar Sesión</a>
        </div>
        <br>     
        <div class="container col-lg-5" style="margin-left: 20%">
            <form action="<?= site_url('/user_control/createUser'); ?>" id="loginForm" method="post">
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Nombre</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-lg-2 control-label">Apellido</label>
                    <input type="text" class="form-control" name="lastname"> 
                </div>

                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label"> Correo</label>
                    <input type="text" lang="" class="form-control" name="email" id="idemail">
                    <div id="mensaje">

                    </div>
                </div>


                <div class="form-group">
                    <label for="user" class="col-lg-2 control-label">Usuario</label>
                    <input type="text" class="form-control" name="user" id="iduser">
                    <div id="mensajeuser">

                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label"> Clave</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="confirm_password" class="col-lg-4 control-label"> Confirmar Clave</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                <div>
                    <button type="submit" class="btn btn-lg btn-primary" id="btnusuario" ><span class="glyphicon glyphicon-ok-sign"></span> Enviar</button>
                </div>
            </form>    
        </div>
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>js/Validate.js" type="text/javascript"></script>

    </body>
</html>
