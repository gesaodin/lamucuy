$(function() {
	listarProducto();
	listarAlmacen();
});




/**
 * Listar Tipo de unidades
 */
function listarProducto() {
	$.ajax({
		url : sUrlP + 'listarComboProducto/1',
		dataType : 'JSON',
		success : function(json) {
			$.each(json, function(item, valor) {
				$("#producto").append(new Option(valor, item, false, true));
			});
		}
	});
}

function listarAlmacen() {
	$.ajax({
		url : sUrlP + 'listarComboAlmacen',
		dataType : 'JSON',
		success : function(json) {
			$.each(json, function(item, valor) {
				$("#ubicacion").append(new Option(valor, item, false, true));
			});
		}
	});
}

function agregarSerial() {
	var serial = $("#serial").val();
	if (serial != "") {
		$("#listaSerial").append(new Option(serial, serial));
		$("#listaSerial option:selected").attr("disabled", true);
		$("#listaSerial").val(0);
	} else {
		alert("Debe Seleccionar un Serial...");
	}
}

function quitarSerial() {
	elemento = $("#listaSerial option:selected").val();
	$("#listaSerial option").each(function() {
		if ($(this).val() == elemento) {
			$(this).attr("disabled", false);
		}
	});
	$("#listaSerial option:selected").remove();
}

function consultar() {

}

function listar() {

}

function registrar() {
	lserial = new Array();
	i = 0;
	$("#listaSerial option").each(function() {
		aux = $(this).text();
		lserial[i] = aux;
		i++;
	});
	var cadena = new FormData();
	cadena.append('idproducto', $('#producto option:selected').val());
	cadena.append('marca', $('#marca').val());
	cadena.append('proveedor', $('#proveedor').val());
	cadena.append('modelo', $('#modelo').val());
	cadena.append('factura', $('#factura').val());
	cadena.append('descripcion', $('#descripcion').val());
	cadena.append('compra', $('#compra').val());
	cadena.append('detal', $('#detal').val());
	cadena.append('mayor', $('#mayor').val());
	cadena.append('listaserial', lserial);
	cadena.append('fecha', $('#fechaEntrada').val());
	cadena.append('ubicacion', $('#ubicacion option:selected').val());
	$.ajax({
		url : sUrlP + "agregarExistencia",
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

function limpiar() {
	$('#producto').val(0);
	$('#factura').val('');
	$('#marca').val('');
	$('#proveedor').val('');
	$('#modelo').val('');
	$('#descripcion').val('');
	$('#compra').val('');
	$('#detal').val('');
	$('#mayor').val('');
	$('#fechaEntrada').val('');
	$('#ubicacion').val(0);
	$('#serial').val('');
	$('#listaSerial option').remove();	
}
