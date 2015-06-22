$(function() {
	
	listarUsuarios();

});

function listarUsuarios() {
	//alert(sUrlP + "listarUsuarios");
	$.ajax({
		url : sUrlP + "listarUsuarios",
		type : 'POST',
		contentType : false,
		processData : false,
		cache : false,
		dataType : "json",
		success : function(json) {//alert(json['resp']);
			if(json['resp'] == 1){
				Grid = new TGrid(json, 'usuarios_grid', "Usuarios");
				Grid.SetNumeracion(true);
				Grid.SetName("usu");
				Grid.SetXls(true);
				Grid.Generar();
			}else{
				alert("No se a creado usuarios");
			}
		}
	});
}