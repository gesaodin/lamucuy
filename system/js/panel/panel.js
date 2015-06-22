$(function() {

	listarProducto();

});

function listarProducto() {
	// alert(sUrlP);
	$.ajax({
		url : sUrlP + 'listarComboProducto',
		dataType : 'JSON',
		success : function(json) {
			$.each(json, function(item, valor) {
				$("#producto").append(new Option(valor, item, false, true));
			});
		}
	});
}

function registrar() {
	var archivoImagen = document.getElementById("imagen");
	var imagen = archivoImagen.files[0];
	var cadena = new FormData();

	cadena.append('imagen', imagen);
	cadena.append('codigo', $('#producto option:selected').val());

	$.ajax({
		url : sUrlP + "registrarGaleria",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			limpiar();
			alert(msj);
		}
	});

}

function consultar(){
	var cadena = new FormData();
	$("#imagenes").html('');
	cadena.append('codigo', $('#producto option:selected').val());
	$.ajax({
		url : sUrlP + "consultarGaleria",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		dataType : "json",
		success : function(json) {
			if(json['msj'] == 'SI'){
				Grid = new TGrid(json, 'imagenes', "Galeria");
				Grid.SetNumeracion(true);
				Grid.SetName("Galeria");
				Grid.Generar();
			}else{
				alert("No se a creado galeria");
			}
		}
	});
}

function limpiar(){
	
}