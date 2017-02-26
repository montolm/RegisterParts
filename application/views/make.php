<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marca</title>
        <link rel="stylesheet" href="<?= base_url() ?>css/Bootstrap.min.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    </head>   
    <?php include ('header.php'); ?>
    <body>
        <?php include ('menu.php'); ?>
        <br>     
        <div class="container col-lg-2" style="margin-left: 20%">
            <form id="makeForm" method="post">
                <div class="form-group">
                    <label for="idMake" class="col-lg-12 control-label">Marca</label>
                    <input type="text" class="form-control" name="name_make" id="idMake">   
                </div>
                <div id="idmensaje"></div>
                <div>
                    <button type="submit" class="btn btn-lg btn-primary" id="btnMake" ><span class="glyphicon glyphicon-ok-sign"></span> Enviar</button>
                </div>
            </form>   
        </div>
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>js/Validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/overhang.min.js" type="text/javascript"></script>
    </body>
</html>
