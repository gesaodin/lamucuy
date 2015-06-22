<?php $this -> load -> view("fisico/incluir/cabecera"); ?>
<?php $this -> load -> view("fisico/incluir/cuerpo"); ?>

<div class="center_left">
	<div class="title">Bienvenido, Categoria</div>


	<div id='frmAlmacen'>
		<table border=0>

			<tr>
				<td valign="top">Nombre:</td>
				<td><textarea rows="3" cols="8" id="nombre" style="width: 580px"
						class="login_input"></textarea></td>
			</tr>

			<tr>
				<td>Imagen:</td>
				<td><input type="file" size=60 id="imagen" style="width: 400px"></td>
			</tr>


			<tr>
				<td colspan="4" align="justify"><a href="#" onclick="registrar()"
					class="read_more">Registrar</a></td>
			</tr>
		</table>
	</div>
	<div id='categoria' style='width: 800px'></div>
	<br> <br>
</div>
<a href="#" onclick="generarMenu()" class="">Generar Menu Categorias</a>
<?php $this -> load -> view("fisico/incluir/pie"); ?>