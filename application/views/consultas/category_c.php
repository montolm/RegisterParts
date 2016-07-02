<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Lista</title>

        <!-- Bootstrap -->
        <!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap.min.css"> 
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
            echo "<table class='table table-striped table-bordered table-hover table-responsive' id='mydata'>";
            echo"<thead>";
            echo"<tr>";
            echo"<th>ID</th>";
            echo"<th>Categoria</th>";
            echo"<th>Fecha de Creacion</th>";
            echo"<th>Fecha actualizacion</th>";
            echo"<th>Inhabilitado</th>";
            echo"<th>Usuario</th>";
            echo"</tr>";
            echo"</thead>";
            echo"<tfoot>";
            echo"<tr>";
            echo"<th>ID</th>";
            echo"<th>Categoria</th>";
            echo"<th>Fecha de Creacion</th>";
            echo"<th>Fecha actualizacion</th>";
            echo"<th>Inhabilitado</th>";
            echo"<th>Usuario</th>";
            echo"</tr>";
            echo"</tfoot>";
            echo "<tbody>";
            foreach ($categoria as $row) {
                echo"<tr>
                <td>$row->id_category </td>
                <td>$row->name_category</td>
                <td>$row->creation_date </td>
                <td>$row->fec_actu </td>
                <td>$row->mca_inh</td>
                <td>$row->user_username</td>";
                echo"</tr>";
            }
            echo"</tbody>";
            echo"</table>";
            ?>
        </div>
        <script src="<?php echo base_url(); ?>js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script>
            $('#mydata').dataTable();
        </script>
    </body>
</html>