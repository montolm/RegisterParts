<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/Bootstrap.min.css">
    </head>
    <body style="background-color: #204d74">
        <!--login modal-->
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center btn-lg">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                        Inicio de sesión
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('/login_control/validateLogin'); ?>" method="post" class="form col-md-12 center-block">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Usuario" id="user_name" name="user_name">
                            </div>
                            <div id="mensaje">

                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-lg" placeholder="Contraseña" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" >Aceptar</button>
                                <span class="pull-right"><a href="<?= site_url('/User_control/urlUser'); ?>">Registrate</a></span><span><a href="<?= site_url('/Password_control/urlPassword'); ?>">Olvide contraseña?</a></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!--                        <div class="col-md-12">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                </div>	-->
                    </div>
                </div>
            </div>
        </div>
        <!-- script references -->
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
    </body>
</html>