<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>jquery/jquery-1.10.2.js"></script>
<script>
	var sUrl = 'http://' + window.location.hostname + '/estcorp';
	var sUrlC = sUrl + '/index.php/carro/carro/';
	var sImg = sUrl + '/system/img/';
	
	function Generar(){
		var funcion = $("#txtFuncion").val();
		var archivo = $("#txtArch").val();
		$.ajax({
			url : sUrlC + "Genera_Plantilla",
			data : "funcion=" + funcion + "&archivo=" + archivo,
			type : 'POST',
			success : function(cadena) {//alert(oBj);
				alert(cadena);
			}
		});
	}
</script>	
</head>
<body>
	<h2> INGRESE MODELO A EJECUTAR.</h2>
<br>
<br>
<table width="600" border="0" cellspacing="3" cellpadding="0"class="formulario">

	<tr>
		<td style="width: 60px;" class="formulario">Archivo:</td>
		<td style="width: 120px;" align="left" class="">
		<input name="txtArch" type="text" class="" style="width: 370px;" id="txtArch"/>
		</td>
		<td style="width: 60px;" class="formulario">Origen:</td>
		<td style="width: 120px;" align="left" class="">
		<input name="txtFuncion" type="text" class="" style="width: 370px;" id="txtFuncion"/>
		</td>
	</tr>

	<tr>
		<td colspan="2">
		<button onclick="Generar();" >Crear_Modificar</button>
		</td>
	</tr>

</table>	
</body>
</html>
