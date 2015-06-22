$(function() {	
	listar();
});

function listar() {	
	$.ajax({
		url : sUrlP + "listarAlmacen",
		dataType : "json",
		success : function(oEsq) {			
			Grid = new TGrid(oEsq, 'almacen', '');
			Grid.SetName("Listar");
			Grid.SetNumeracion(true);
			Grid.Generar();			
		}
	});	
}

function registrar() {
	var codigo = 'NULL';
	var nombre = $('#nombre').val();
	var ubicacion = $('#ubicacion').val();
	var observacion = $('#observacion').val();
	var cadena = "codigo=" + codigo + "&nombre=" + nombre + "&ubicacion=" + ubicacion + "&observacion=" + ubicacion;
	$.ajax({
		url : sUrlP + "registrarAlmacen",
		type : 'POST',
		data : cadena,
		success : function(msj) {
			if(msj == ""){
				alert('Felicitaciones proceso exitoso!!!');
				limpiar();
				
				listar();
			}else{
			  alert(msj);
			}
		}
	});
}

function limpiar(){
	$('#nombre').val('');
	$('#ubicacion').val('');
	$('#observacion').val('');
}