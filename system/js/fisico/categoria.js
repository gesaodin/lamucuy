$(function() {
	listar();
});

function listar() {
	$.ajax({
		url : sUrlP + "listarCategoria",
		dataType : "json",
		success : function(oEsq) {
			Grid = new TGrid(oEsq, 'categoria', '');
			Grid.SetName("Listar");
			Grid.SetNumeracion(true);
			Grid.Generar();
		}
	});
}

function registrar() {
	var archivoImagen = document.getElementById("imagen");
	var imagen = archivoImagen.files[0];
	var cadena = new FormData();

	cadena.append('imagen', imagen);
	cadena.append('nombre', $('#nombre').val());
	$.ajax({
		url : sUrlP + "registrarCategoria",
		type : 'POST',
		contentType : false,
		processData : false,
		cache : false,
		data : cadena,
		success : function(msj) {
			if (msj == "") {
				alert('Proceso Exitoso');
				listar();
				$('#nombre').val('');
			} else {
				alert(msj);
			}
		}
	});
}

function generarMenu() {
	sUrlC = sUrl + '/index.php/carro/carro/';
	$.ajax({
		url : sUrlC + "Genera_Menu_Categoria",
		success : function(resp) {
			alert(resp);
		}
	});
}