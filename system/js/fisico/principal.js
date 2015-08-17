$(function() {
	listarExistenciaProducto();

});

function listarExistenciaProducto() {
	  $('#tablaProductos').hide();
	  $.ajax({
	    url : sUrlP + "listarExistenciaProductos",
	    dataType : "json",
	    success : function(oEsq) {
	      Grid = new TGrid(oEsq, 'reporte', '');
	      Grid.SetName("Listar");
	      Grid.SetNumeracion(true);
	      Grid.Generar();
	    }
	  });
	}