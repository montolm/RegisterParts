<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modelo</title>
        <link rel="stylesheet" href="<?= base_url() ?>css/Bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    </head>   
    <?php include ('header.php'); ?>
    <body>
        <?php include ('menu.php'); ?>
        <br>
        <div class="container col-lg-2" style="margin-left: 20%">
            <form id="vehicleModelForm" method="post">
                <div class="form-group">
                    <?php
                    if (isset($_POST['Submit'])) {
                        $marca = $_SESSION['marca'];
                        $value = $_SESSION['value'];
                        echo "<div class='container col-lg-10' style='margin-left:-4%'>
                            <select id= 'listVehicleModel'class='form-control' name='selectVehicleModel'>
                            <option value=$value selected>$marca</option>";
                        foreach ($make as $row) {
                            echo "<option value=$row->id_vehicle_make>$row->name_vehicle_make</option>";
                        }
                        echo"</select>
                    </div>";
                    } else {
                        echo "<div class='container col-lg-10' style='margin-left:-4%'>
                            <select id= 'listVehicleModel'class='form-control' name='selectVehicleModel'>
                            <option value='0' selected>Marcas</option>";
                        foreach ($make as $row) {
                            echo "<option value=$row->id_vehicle_make>$row->name_vehicle_make</option>";
                        }
                        echo"</select>
                    </div>";
                    }
                    ?>

                </div>
                <br>
                <br>
                <br>
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "vehicleModel" id = "idvehicleModel" value = "<?php
                    if (isset($_POST['Submit'])) {
                        echo $_SESSION['modelo'];
                    }
                    ?>" placeholder = "Modelo">
                </div>
                <!--
                                <div class="form-group" id="datetimepicker2">
                                    <input type="text" class="form-control date"  name="star_generatioModel" id="idstar_generatioModel" placeholder="Ini.Generacion 1985" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="end_generatioModel" id="idend_generatioModel" placeholder="Fin.Generacion 1989" value=""/>
                                </div>-->
                <div id="idmensaje"></div>
                <div>
                    <button type="submit" class="btn btn-lg btn-primary" id="btnVehicleModel" name="Submit" onclick="insertVehicleModel()" ><span class="glyphicon glyphicon-ok-sign"></span> Enviar</button>
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
        <!--<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({format: 'YYYY', locale: 'ES'});
                $('#datetimepicker2').datetimepicker({format: 'YYYY', locale: 'ES'});
                $('#prueba').datetimepicker({format: 'YYYY', locale: 'ES'});
            });
        </script>-->

    </body>
</html>
