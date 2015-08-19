$(function() {
	listarProducto();
	listarAlmacen();
    $("#factura").hide();
    $("#marca").hide();
    $("#modelo").hide();
    $("#proveedor").hide();
});

/**
 * Listar Tipo de unidades
 */
function listarProducto() {
	$.ajax({
		url : sUrlP + 'listarComboProducto/5',
		dataType : 'JSON',
		success : function(json) {
			$.each(json, function(item, valor) {
				$("#producto").append(new Option(valor, item, false, true));
			});
            cargar();
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

function consultar() {

}

function listar() {

}

function registrar() {

	var cadena = new FormData();
	cadena.append('idproducto', $('#producto option:selected').val());
	cadena.append('marca', $('#marca').val());
	cadena.append('proveedor', $('#proveedor').val());
	cadena.append('modelo', $('#modelo').val());
	cadena.append('descripcion', $('#descripcion').val());
	cadena.append('compra', $('#compra').val());
	cadena.append('detal', $('#detal').val());
	cadena.append('mayor', $('#mayor').val());
	cadena.append('factura', $('#factura').val());
	
	cadena.append('lote', $('#lote').val());
	cadena.append('observacion', $('#observacion').val());
	cadena.append('serial', $('#serial').val());
	cadena.append('cantidad', $('#cantidad').val());
	
	
	cadena.append('fecha', $('#fechaEntrada').val());
	cadena.append('ubicacion', $('#ubicacion option:selected').val());
	$.ajax({
		url : sUrlP + "agregarExistenciaLote",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			//limpiar();
			alert(msj);
		}
	});

}

function limpiar() {
	$('#producto').val(0);
	$('#marca').val('');
	$('#factura').val('');
	$('#proveedor').val('');
	$('#modelo').val('');
	$('#descripcion').val('');
	$('#compra').val('');
	$('#detal').val('');
	$('#mayor').val('');
	$('#fechaEntrada').val('');
	$('#ubicacion').val(0);
	
	$('#lote').val('');	
	$('#observacion').val('');	
	$('#cantidad').val('');	
	$('#serial').val('');	
}

function cargar(){
    var id = $("#producto").val();
    $.ajax({
        url : sUrlP + 'consultarID',
        type:"POST",
        data: "id="+id,
        dataType : 'JSON',
        success : function(json) {
            $("#compra").val(json.costoProduccion);
            $("#detal").val(json.costoProduccion);
            $("#mayor").val(json.costoProduccion);
            $("#descripcion").val(json.nombre);
            if(json.identificador == 13){
                $("#factura").show();
                $("#proveedor").show();
                $("#marca").show();
                $("#modelo").show();
            }else{
                $("#factura").hide();
                $("#marca").hide();
                $("#modelo").hide();
                $("#proveedor").hide();
            }
        }
    });
}
