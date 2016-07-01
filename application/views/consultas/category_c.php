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
            <table class="table table-striped table-bordered table-hover table-responsive" id="mydata">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Manuel</td>
                        <td>Montolio</td>
                        <td>manueljax@gmail.com</td>
                        <td>829-707-1002</td>
                        <td>Villas Pantojas</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mirely</td>
                        <td>Ortiz</td>
                        <td>mirely@gmail.com</td>
                        <td>829-707-2010</td>
                        <td>Villas Pantojas</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Manuel</td>
                        <td>Gonzalez</td>
                        <td>manuelG@gmail.com</td>
                        <td>829-567-1002</td>
                        <td>Villas Olimpica</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr><tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr><tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr><tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr><tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                    
                    <tr>
                        <td>4</td>
                        <td>Suleica</td>
                        <td>Perez</td>
                        <td>manuelG@hotmail</td>
                        <td>809-756-8596</td>
                        <td>Santo domingo</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--    <script src="js/bootstrap.min.js"></script>-->
        <script src="<?php echo base_url(); ?>js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script>
         $('#mydata').dataTable();
        </script>
    </body>
</html>