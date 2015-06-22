<?php $this -> load -> view("fisico/incluir/cabecera"); ?>
<?php $this -> load -> view("fisico/incluir/cuerpo"); ?>

<div class="center_left">
<div class="title">Bienvenido al control de Almacén</div>


<div id='frmAlmacen'>
	<table border=0>
		<tr>
			
			<td>Nombre:</td>
			<td><input type="text" id="nombre" class="login_input"></td>
			<td>Ubicación:</td>
			<td><input type="text" id="ubicacion" class="login_input"></td>
		</tr>
		<tr>
			<td>Observación:</td>
			<td colspan="3"><textarea rows="3" cols="8" id="observacion" style="width: 370px" 
					class="login_input"></textarea></td>
		</tr>
		<tr>
		<td colspan="4" align="justify"><a href="#" onclick="registrar()" class="read_more">Registrar</a></td>
		</tr>
	</table>
</div>
<br>
<br>
<div id='almacen' style='width: 800px'></div>
<br>
<br>
</div>
<?php $this -> load -> view("fisico/incluir/pie"); ?>