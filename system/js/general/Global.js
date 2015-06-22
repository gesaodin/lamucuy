var sUrl = 'http://' + window.location.hostname + '/almacen';
var sUrlC = sUrl + '/index.php/carro/carro/';
var sUrlP = sUrl + '/index.php/principal/';
var sImg = sUrl + '/system/img/';
$(document).ready(function() {
	$("#msj_alertas").dialog({
		modal : true,
		autoOpen : false,
		hide : 'explode',
		show : 'slide',
		position: { my: "center top", at: "center top+10%", of: top },
		buttons : {
			"Cerrar" : function() {
				$(this).dialog("close");
			}
		}
	});
});
function soloNumeros(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	numeros = "0123456789";
	especiales = [8, 37, 39, 46];

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (numeros.indexOf(tecla) == -1 && !tecla_especial) {
		return false;
	}
}

function soloLetras(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = [8, 37, 39, 46];

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (letras.indexOf(tecla) == -1 && !tecla_especial) {
		return false;
	}
}