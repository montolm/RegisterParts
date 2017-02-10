<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= base_url() ?>css/Bootstrap.min.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    </head>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <!-- El logotipo y el icono que despliega el menú se agrupan
                 para mostrarlos mejor en los dispositivos móviles -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Menu</a>
            </div>

            <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                 otro elemento que se pueda ocultar al minimizar la barra -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Crear <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">  
                            <li><a href=<?= site_url('/category_control/urlCategory'); ?>>Categoria</a></li>
                            <li><a href=<?= site_url('/vehicle_motor_control/urlVehicleMotor'); ?>>Vehiculo de motor</a></li> 
                            <li><a href=<?= site_url('/combustible_control/urlCombustible'); ?>>Combustible</a></li> 
                            <li><a href=<?= site_url('/make_control/urlMake'); ?>>Marca</a></li>
                            <li><a href=<?= site_url('/vehicleModel_control/consultMake'); ?>>Modelo</a></li>
                            <li><a href=<?= site_url('/combustibleModel_control/consultVehicleModel');?>>Combus. Modelo</a></li>
                            <li><a href=<?= site_url('/generationModel_control/consultVehicleModel');?>>Generat. Modelo</a></li>
                            <li><a href=<?= site_url('/vehicleType_control/consultListOption'); ?>>Tipo Vehiculo</a></li>
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Pieza</a></li>  
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Consultas<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href=<?= site_url('/category_control/consultCategory'); ?>>Categorias</a></li>
                            <li><a href=<?= site_url('/vehicle_motor_control/consultVehicleMotor'); ?>>Vehiculos de motor</a></li> 
                            <li><a href=<?= site_url('/combustible_control/consultCombustible'); ?>>Combustibles</a></li>
                            <li><a href=<?= site_url('/make_control/consultMake');?>>Marcas</a></li>
                            <li><a href=<?= site_url('/vehicleModel_control/consultVehicleModel'); ?>>Modelos</a></li> 
                            <li><a href=<?= site_url('/combustibleModel_control/consultCombustibleModel');?>>Combus. Modelos</a></li>
                            <li><a href=<?= site_url('/generationModel_control/consultGenerationModel');?>>Generat. Modelos</a></li>
                            <li><a href=<?= site_url('/category/urlCategory'); ?>>Tipos Vehiculos</a></li>
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Piezas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-togle="dropdown">
                            Reportes<b class="caret"></b>
                            
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="btn-link"><a href="<?= site_url('/menu_control/urlLogin'); ?>">Salir</a></li>

                </ul>
            </div>
        </nav>
    </div>

</html>
