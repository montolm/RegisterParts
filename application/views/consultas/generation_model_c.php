<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Consult. Generacion Modelo</title>

        <!-- Bootstrap -->
        <!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/Bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/dataTables.bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php include ('/../header.php'); ?>
    <body>
        <?php include ('/../menu.php'); ?>
        <div class="container">
            <?php
            echo "<table class='table table-striped table-bordered table-hover table-responsive' id='mydataGenerationModel'>";
            echo"<thead>";
            echo"<tr>";
            echo"<th>ID</th>";
            echo"<th>Modelo</th>";
            echo"<th>Ini. Generacion</th>";
            echo"<th>Fin. Generacion</th>";
            echo"<th>Fecha Actualizacion</th>";
            echo"<th>Inhabilitado</th>";
            echo"<th>Usuario</th>";
            echo"<th>Editar</th>";
            echo"</tr>";
            echo"</thead>";
            echo "<tbody>";
            foreach ($generationModel as $row) {
                echo"<tr>
                <td>$row->id_generation</td>
                <td>$row->model_name</td>
                <td>$row->start_generation </td>
                <td>$row->end_generation </td>
                <td>$row->fec_actu</td>
                <td>$row->mca_inh</td>
                <td>$row->username</td>";
                echo"<td>";
                echo"<a href=$row->id_generation class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' id='editButton' onclick = 'getGenerationVehicleModel()'><span class='glyphicon glyphicon-pencil' data-placement='top' data-toggle='tooltip' title='Edit'></span></a>";
                echo"</td>";
                echo"</tr>";
                echo"</tr>";
            }
            echo"</tbody>";
            echo"</table>";
            ?>
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Combustible Modelo</h4>
                        </div>
                        <form id="editFormGenerationModel" method="POST">
                            <div class="modal-body">
                                <div class="form-group hidden">
                                    <input class="form-control " type="text" id="editVehicleModel" name="vehicleModel">
                                </div>
                                <div class="form-group">
                                    <input class="form-control " type="text" id="editNameVehicleModel" name="nameVehicleModel" readonly="readonly">
                                </div>
                                <div class="form-group" id="datetimepicker2">
                                    <input type="text" class="form-control date"  name="start_generatioModel" id="idstart_generatioModel"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="end_generatioModel" id="idend_generatioModel"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control " type="text" id="idinhaGenerationModel" name="inhaGenerationModel">
                                </div>
                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" id="updateButtonGenerationModel">
                                    <span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
<!--        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>-->
<!--        <script src="<?php echo base_url(); ?>js/Validate.js" type="text/javascript"></script>-->
        <script>
            $('#mydataGenerationModel').dataTable({
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

