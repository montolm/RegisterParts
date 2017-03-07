<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pieza</title>
        <link rel="stylesheet" href="<?= base_url() ?>css/Bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    </head>   
    <?php include ('header.php'); ?>
    <body>
        <?php include ('menu.php'); ?>
        <br>
        <div class="container col-lg-2" style="margin-left: 20%">
            <form id="partForm" method="post">
                <div class="form-group">
                    <?php
                    if (isset($_POST['Submit'])) {
                        $name = $_SESSION['name'];
                        $value = $_SESSION['value'];
                        
                        echo "<div class='container col-lg-10' style='margin-left:-4%'>
                            <select id= 'listCategory'class='form-control' name='selectCategory'>
                            <option value=$value selected>$name</option>";
                        foreach ($category as $row) {
                            echo "<option value=$row->id_category>$row->name_category</option>";
                        }
                        echo"</select>
                    </div>";
                    } else {
                        echo "<div class='container col-lg-10' style='margin-left:-4%'>
                            <select id= 'listCategory'class='form-control' name='selectCategory'>
                            <option value='0' selected>Categorias</option>";
                        foreach ($category as $row) {
                            echo "<option value=$row->id_category>$row->name_category</option>";
                        }
                        echo"</select>
                    </div>";
                    }
                    ?>
                </div>
                <br>
                <br>
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "part" id = "idpart" placeholder = "Pieza">
                </div>
                <div id="idmensaje"></div>
                <div>
                    <button type="submit" class="btn btn-lg btn-primary" id="btnPieza" name="Submit" onclick="insertPart()" ><span class="glyphicon glyphicon-ok-sign"></span> Enviar</button>
                </div>
            </form>
            <div id="confirmation" class="alert alert-success hidden">
                <span class="glyphicon glyphicon-star"> Su registro fue guardado</span>
            </div>
        </div>    
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="http://momentjs.com/downloads/moment-with-locales.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>js/Validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/overhang.min.js" type="text/javascript"></script> 
    </body>
</html>
