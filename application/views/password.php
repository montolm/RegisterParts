<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Olvido Contraseña</title>
        <link rel="stylesheet" href="<?= base_url() ?>css/Bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>css/Styles.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    </head>   
    <?php include ('header.php'); ?>
    <body>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center btn-lg">         
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>-->
                    Introduzca correo para ser enviado sus datos de usuario.
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('/Password_control/sendPassword'); ?>" method="post" class="form col-md-12 center-block" id="emailform">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="Correo" id="idemail" name="email">
                        </div>
                        <div id="mensaje">
                            
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block" id="btnsend" >Enviar</button>
                            <span class="pull-right"><a href="<?= site_url('/home_control/urlLogin'); ?>">Cancelar</a></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>js/Validate.js" type="text/javascript"></script>
    </body>
</html>
