<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.min.css">
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
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Marca</a></li>
                            <li><a href=<?= site_url('/category/urlCategory'); ?>>Tipo Vehiculo</a></li>
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Pieza</a></li>
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Modelo</a></li>
                        </ul>

                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Consultas<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href=<?= site_url('/category/urlCategory'); ?>>Categoria</a></li>
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Marca</a></li>
                            <li><a href=<?= site_url('/category/urlCategory'); ?>>Tipo Vehiculo</a></li>
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Pieza</a></li>
                            <li><a href=<?= site_url('/manager/urlManager'); ?>>Modelo</a></li> 
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
