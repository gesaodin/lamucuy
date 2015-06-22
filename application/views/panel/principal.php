<?php $this -> load -> view("panel/incluir/cabecera"); ?>
<?php $this -> load -> view("panel/incluir/cuerpo"); ?>
<div class="center_left">
	<div class="title">Bienvenido al Panel de Control</div>
	<br>
	<h2>Pedidos Realizados</h2>
		<div id="pedidos" style='width: 800px'>
			<div id="tabs" style="width:100%"> 
			    <ul>
		        <li><a href="#tabs-1">Por Deposito</a></li>
		        <li><a href="#tabs-2">Procesando</a></li>
		        <li><a href="#tabs-3">Procesados</a></li>
		        <li><a href="#tabs-4">R.Por Cliente</a></li>
		        <li><a href="#tabs-5">R.Por Administrador</a></li>
		        </ul>
		        <div id="tabs-1"><div id="resp1"></div></div>
		        <div id="tabs-2"><div id="resp2"></div></div>
		        <div id="tabs-3"><div id="resp3"></div></div>
		        <div id="tabs-4"><div id="resp4"></div></div>
		        <div id="tabs-5"><div id="resp5"></div></div>
		     </div>
		</div> 
	<br>
	<div id='reporte' style='width: 800px'></div>
</div>

<?php $this -> load -> view("panel/incluir/pie"); ?>