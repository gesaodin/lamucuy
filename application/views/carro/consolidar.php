<!DOCTYPE html>
<html>
<head>
    <!--<link rel="stylesheet" href="https://ssl.gstatic.com/docs/script/css/add-ons.css">!-->

    <link type="text/css" rel="stylesheet" href="/DTGrid/md/css/materialize.css" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo __CSS__ ?>demo.css"/>
    <!-- carro -->
    <link href="<?php echo __CSS__ ?>principal/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo __CSS__ ?>principal/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo __CSS__ ?>principal/main.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo __JSVIEW__ ?>principal/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo __JSVIEW__ ?>panel/general.js"></script>
    <script type="text/javascript" src="<?php echo __JSVIEW__; ?>jquery/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/DTGrid/js/dtgrid.js"></script>
    <script type="text/javascript" src="/DTGrid/js/detalle.js"></script>
    <script type="text/javascript" src="/DTGrid/js/editar.js"></script>
    <script type="text/javascript" src="/DTGrid/js/paginador.js"></script>

    <script type="text/javascript" src="<?php echo __JSVIEW__ ?>carro/consolidar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<?php $this->load->view("carro/incluir/menu"); ?>
<div class="row">
    <input type="hidden" id="ubicacion" value="<?php echo $_SESSION['ubicacion']; ?>">

    <div class="col-md-10 col-md-offset-1" id="reporte">

    </div>
</div>
<div class="row">

    <div class=" col-md-6 col-md-offset-3 well-lg ">
        <p>
            <button type="button" class="btn btn-default btn-lg btn-block" onclick="consolidar();">Consolidar</button>
        </p>
    </div>
</div>
<script type="text/javascript" src="/DTGrid/js/accion.js"></script>
<script type="text/javascript" src="/DTGrid/md/js/materialize.min.js"></script>
<?php //$this -> load -> view("principal/incluir/pie"); ?>

</body>
</html>
