$(document).ready(function() {
	$('a[rel*=leanModal]').leanModal({ top : 200, closeButton: ".modal_close" });
});

function Registrar(){
	var nomb = $("#nomb").val();
	var apel = $("#apel").val();
	var tipo = $("#tipo option:selected").val();
	var cedu = $("#cedu").val();
	var seud = $("#seud").val();
	var clav = $("#clav").val();
	var corr = $("#corr").val();
	var celu = $("#celu").val();
	var telf = $("#telf").val();
	var empr = $("#empr").val();
	var pagi = $("#pagi").val();
	var dire = $("#dire").val();
	
	var vali = Validar();
	if(vali == false) return false;
	
	var datos = new FormData();
	datos.append('nomb', nomb);
	datos.append('apel', apel);
	datos.append('tipo', tipo);
	datos.append('cedu', cedu);
	datos.append('seud', seud);
	datos.append('clav', clav);
	datos.append('corr', corr);
	datos.append('celu', celu);
	datos.append('telf', telf);
	datos.append('empr', empr);
	datos.append('pagi', pagi);
	datos.append('dire', dire);
	$.ajax({
		url : sUrlP + "registrarUsuario",
		type : "POST",
		data : datos,
		contentType : false,
		processData : false,
		cache : false,
		success : function(respuesta) {
			alert(respuesta);
			Limpiar();
		}
	});
}

function Validar(){
	var nomb = $("#nomb").val();
	var apel = $("#apel").val();
	var tipo = $("#tipo option:selected").val();
	var cedu = $("#cedu").val();
	var seud = $("#seud").val();
	var clav = $("#clav").val();
	var corr = $("#corr").val();
	var celu = $("#celu").val();
	var telf = $("#telf").val();
	var empr = $("#empr").val();
	var pagi = $("#pagi").val();
	var dire = $("#dire").val();
	if(nomb == '' || apel == '' || tipo == '' || cedu == '' || seud == '' || clav == '' || corr == '' || celu == '' || telf == '' || empr == '' || dire == ''){
		alert("Debe ingresar todos los datos para completar el registro");
		return false;
	}else{
		return true;
	}
}

function Limpiar(){
	var nomb = $("#nomb").val('');
	var apel = $("#apel").val('');
	var cedu = $("#cedu").val('');
	var seud = $("#seud").val('');
	var clav = $("#clav").val('');
	var corr = $("#corr").val('');
	var celu = $("#celu").val('');
	var telf = $("#telf").val('');
	var empr = $("#empr").val('');
	var pagi = $("#pagi").val('');
	var dire = $("#dire").val('');
}