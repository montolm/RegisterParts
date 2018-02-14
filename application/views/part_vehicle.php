<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Consult. Tipos de vehiculos</title>

        <!-- Bootstrap -->
        <!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/Bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/Styles.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php include ('header.php'); ?>
    <body>
        <?php include ('menu.php'); ?>
        <div class="container" style="margin-left: 13%">
            <form id="partForm" method="post" action="<?= site_url('/Part_vehicle_control/consultListOption'); ?>">
                <div class="form-group">
                    <?php
                    if (isset($_POST['Submit'])) {
                        $name = $_SESSION['name'];
                        $value = $_SESSION['value'];
                        
                        if ($value == 0) {
                            $name = 'Categorias';
                        }
                        echo "<div class='container col-lg-2'>
                            <select id= 'listCategory'class='form-control' name='selectCategory'>
                            <option value=$value selected>$name</option>";
                        foreach ($category as $row) {
                            echo "<option value=$row->id_category>$row->name_category</option>";
                        }
                        echo"</select>
                    </div>";
                    } else {
                        echo "<div class='container col-lg-2'>
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
                <div class="form-group">
                    <?php
                    if (isset($_POST['Submit'])) {
                        $marca = $_SESSION['marca'];
                        $value = $_SESSION['value'];
                        if ($value == 0) {
                            $marca = 'Marcas';
                        }
                        echo "<div class='container col-lg-2'>
                            <select id= 'listMake'class='form-control' name='selectMakeVM'>
                            <option value='0' selected>$marca</option>";
                        foreach ($make as $row) {
                            echo "<option value=$row->id_vehicle_make>$row->name_vehicle_make</option>";
                        }
                        echo"</select>
                    </div>";
                    } else {
                        echo "<div class='container col-lg-2'>
                            <select id= 'listMake'class='form-control' name='selectMakeVM'>
                            <option value='0' selected>Marcas</option>";
                        foreach ($make as $row) {
                            echo "<option value=$row->id_vehicle_make>$row->name_vehicle_make</option>";
                        }
                        echo"</select>
                    </div>";
                    }
                    ?>
                </div>
                <div class="container col-xs-2"> 
                    <button type="Submit" class="btn btn-primary" id="idButtonSavePart" name="Submit">Buscar</button>
                </div>
            </form>
            <div id="confirmation" class="alert alert-success hidden">
                <span class="glyphicon glyphicon-star"> Su registro fue guardado</span>
            </div>
        </div>  
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <?php
            if (isset($_POST['Submit'])) {
                echo "<table class='table table-striped table-bordered table-hover table-responsive' id='mydataTypeVehiclePart'>";
                echo"<thead>";
                echo"<tr>";
                echo"<th>ID</th>";
                echo"<th>Tipo Vehiculo</th>";
                echo"<th>Tipo Vehiculo Motor</th>";
                echo"<th>Marca</th>";
                echo"<th>Modelo</th>";
                echo"<th>Generacion</th>";
                echo"<th>fecha Actualizacion</th>";
                echo"<th>Inhabilitado</th>";
                echo"<th>usuario</th>";
                echo"<th>Editar</th>";
                echo"</tr>";
                echo"</thead>";
                echo "<tbody>";
                foreach ($vehicleType as $row) {
                    echo"<tr>
                <td>$row->id_vehicle_type</td>
                <td>$row->name_vehicle_type </td>
                <td>$row->type_name_vehicle</td>
                <td>$row->name_vehicle_make </td>
                <td>$row->model_name</td>
                <td>$row->generacion</td>
                <td>$row->fec_actu</td>
                <td>$row->mca_inh</td>
                <td>$row->username</td>";
                    echo"<td>";
                    echo"<a href=$row->id_vehicle_type class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' id='editButton'><span class='glyphicon glyphicon-pencil' data-placement='top' data-toggle='tooltip' title='Edit'></span></a>";
                    echo"</td>";
                    echo"</tr>";
                    echo"</tr>";
                }
                echo"</tbody>";
                echo"</table>";
            }
            ?>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content col-lg-10">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Piezas Tipo vehiculo</h4>
                    </div>
                    <form id="partVehicleTypeForm" method="POST" name="f1">
                        <div class="modal-body">
                            <div class="form-group hidden">
                                <input class="form-control " type="text" id="editVehicleModel" name="vehicleModel">
                            </div>
                            <div class="form-group hidden">
                                <input class="form-control " type="text" id="editCategory" name="category">
                            </div>
                            <div class="form-group">
                                <input class="form-control " type="text" id="editNameVehicleModel" name="nameVehicleModel" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <input class="form-control " type="text" id="inhaTypeVehicleModel" name="inhaTypeVehicleModel" readonly="readonly">
                            </div>
                            <div class="form-group hidden">
                                <input class="form-control " type="text" id="idVehiclePart" name="vehiclePart">
                            </div>
                            <div class="container" style="margin-top:20px;">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <h3 class="text-center">Piezas por Categoria</h3>
                                        <div class="well" style="max-height: 300px;overflow: auto;" >
                                            <ul class="list-group checked-list-box" id="idcheckboxes">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-lg" style="width: 100%;" id="btnPartVehicleType" onclick="insertPartTypeVehicle()">
                                    <span class="glyphicon glyphicon-ok-sign"></span> Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
        <script>
                                    $('#mydataTypeVehiclePart').dataTable({
                                        "paging": true,
                                        "ordering": true,
                                        "info": false,
                                        "language": {
                                            "sLengthMenu": "Mostrar _MENU_ registros",
                                            "zeroRecords": "Nothing found - sorry",
                                            "info": "Showing page _PAGE_ of _PAGES_",
                                            "infoEmpty": "No records available",
                                            "infoFiltered": "(filtered from _MAX_ total records)",
                                            "sSearch": "Buscar:",
                                            "oPaginate": {
                                                "sFirst": "Primero",
                                                "sLast": "Último",
                                                "sNext": "Siguiente",
                                                "sPrevious": "Anterior"
                                            }

                                        }
                                    });
        </script>
    </body>
</html>

