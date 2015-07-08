<!DOCTYPE html>
<html>
<head>
    <!--<link rel="stylesheet" href="https://ssl.gstatic.com/docs/script/css/add-ons.css">!-->
    <link rel="stylesheet" href="/DTGrid/css/dataTable.css">
    <link type="text/css" rel="stylesheet" href="/DTGrid/md/css/materialize.css" media="screen,projection"/>
    <script type="text/javascript" src="<?php echo __JSVIEW__ ?>panel/general.js"></script>
    <script type="text/javascript" src="<?php echo __JSVIEW__;?>jquery/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/DTGrid/js/dtgrid.js"></script>
    <script type="text/javascript" src="/DTGrid/js/detalle.js"></script>
    <script type="text/javascript" src="/DTGrid/js/editar.js"></script>
    <script type="text/javascript" src="/DTGrid/js/paginador.js"></script>

    <script type="text/javascript" src="<?php echo __JSVIEW__ ?>panel2/<?php echo $js; ?>.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script>
        $(function () {
            $('.button-collapse').sideNav({
                    menuWidth: 300, // Default is 240
                    //edge: 'right',
                    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
                }
            );
        });

    </script>
</head>
<body>
<div class="row" >
    <div class="col-lg-12" > <!-- Note that "m4 l3" was added -->
        <nav class="brown darken-2">
            <div class="nav-wrapper">
                <a class="brand-logo right" href="#">Chocolates La Mucuy</a>
                <ul class="left hide-on-med-and-down">
                    <li><a href="<?php echo site_url("panel/panel/index") ?>">Inicio</a></li>
                    <li><a href="<?php echo site_url("panel/panel/verUsuarios") ?>">Galeria de Productos</a></li>
                    <li><a href="<?php echo site_url("panel/panel/agregarGaleria") ?>">Galeria de Productos</a></li>
                    <li><a href="<?php echo site_url("panel/panel/reporte") ?>">Reportes</a></li>
                    <li><a href="<?php echo site_url("panel/panel/cerrar") ?>">Salir</a></li>
                </ul>
                <ul id="slide-out" class="side-nav">TITULO
                    <li><a href="<?php echo site_url("panel/panel/index") ?>">Inicio</a></li>
                    <li><a href="<?php echo site_url("panel/panel/verUsuarios") ?>">Galeria de Productos</a></li>
                    <li><a href="<?php echo site_url("panel/panel/agregarGaleria") ?>">Galeria de Productos</a></li>
                    <li><a href="<?php echo site_url("panel/panel/reporte") ?>">Reportes</a></li>
                    <li><a href="<?php echo site_url("panel/panel/cerrar") ?>">Salir</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </nav>
    </div>
</div>