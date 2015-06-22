<body>
<?php $this -> load -> view("carro/incluir/cabezera"); ?>
<!DOCTYPE html>
<html lang="en">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo __TITLE__ ?></title>
<link href="<?php echo __CSS__ ?>defecto/jquery-ui-1.10.4.custom.min.css" rel="stylesheet"  type="text/css">
<link rel="stylesheet" href="<?php echo __CSS__ ?>menu2.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>jquery/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>jquery/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>carro/pedido.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>general/Global.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>tgrid/tgrid.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>tgrid/func.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>tgrid/paginador.js"></script>
<link href="<?php echo __CSS__ ?>tgrid/tgrid.css" type="text/css" rel="stylesheet" />


<script type="text/javascript">
sUrlP = sUrl + '/index.php/carro/carro/';
</script>
</HEAD>

<body>
	<div id="agregar_producto" title="Carrito"></div>
<div id="galeria"></div>
<!--<div id="galeria"><ul id="myGallery"></ul><div id='des_galeria'></div></div> !-->
<div id="soloDet"></div>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<div class="contactinfo">
									<ul class="nav nav-pills">
										<li>

										</li>
										<li>
											<a href="#"><i class="fa fa-envelope"></i> soporte@mamonsoft.com.ve</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="social-icons pull-right">
									<ul class="nav navbar-nav">
										<li>
											<a href="#"><i class="fa fa-google-plus"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-facebook"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-twitter"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-linkedin"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-dribbble"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-google-plus"></i></a>
										</li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div><!--/header_top-->

				<div class="header-middle">
					<!--header-middle-->
					<div class="container">
						<div class="row">
						<div class="navbar-header">
						<div class="logo pull-left">
						<img style="width:55%;float: left;"  src="<?php echo __IMG__ ?>principal/home/logo2.png" alt="" /></a>
						</div>

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						</div>
						<?php
						echo '<div class="mainmenu pull-right">
<ul class="nav navbar-nav collapse navbar-collapse">

<li><a href="' . __LOCALWWW__ . '/index.php/carro/carro"><i class="fa fa-user"></i> Inicio</a></li>
<li><a href="' . __LOCALWWW__ . '/index.php/carro/carro/ver_pedidos"><i class="fa fa-crosshairs"></i> Mi Cuenta</a></li>
<li><a href="' . __LOCALWWW__ . '/index.php/carro/carro/ver_carro"><i class="fa fa-shopping-cart"></i> Mi Carro</a></li>
<li><a href="' . __LOCALWWW__ . '/index.php/carro/carro/cerrar"><i class="fa fa-lock"></i> Salir</a></li>

</ul>
</div>
</div>';
						?>
					</div>
				</div>
				</div><!--/header-middle-->


			</header>

			<section id="advertisement">
				<div class="container">

				</div>
			</section>

			<section>
				<div class="container"style="width: 88%;">
					<div class="row">
						<div id="estcorp-contenedor-medio-productos">
							<div class="container" style="position: relative;float: left;width: 75%;">
                                <div>
          		                    <div id="agregar_producto" title="Carrito"></div>
	 	                            <div id="msj_alertas" style="background:#F5F5F5;color:#444;"></div>
		                            <div id="pedidos">
			                            <div id="tabs" style="width:700px; background:#F5F5F5;color:#444;"  >
			                                <ul style="font-size: 13px; background:#F5F5F5;color:#444;">
		                                        <li><a href="#tabs-1">Comanda Faltante</a></li>
		                                        <li><a href="#tabs-2">Por Aprobar</a></li>
                                                <li><a href="#tabs-3">Aprobada y Enviada</a></li>
		                                        <li><a href="#tabs-4">R.Por Zona</a></li>
		                                        <li><a href="#tabs-5">R.Por Administrador</a></li>
		                                    </ul>
		                                    <div id="tabs-1"><div id="resp1"></div></div>
		                                    <div id="tabs-2"><div id="resp2"></div></div>
		                                    <div id="tabs-3"><div id="resp3"></div></div>
                                            <div id="tabs-4"><div id="resp4"></div></div>
		                                    <div id="tabs-5"><div id="resp5"></div></div>
		                                </div>
		                            </div>
                                </div>
                            </div>
						</div><!--features_items-->
					</div>
				</div>
			</section>
    <br>
    <br>
    <br>

    <br>

    <?php $this -> load -> view("principal/incluir/pie"); ?>

		</body>
	</html>