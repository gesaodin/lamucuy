$(function() {
  listarProducto();

});

function listarProducto() {
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

function verPorProducto() {
  $('#tablaProductos').show();
  $('#reporte').html('');
}

function listarPorProducto() {
  //$('#tablaProductos').hide();
  $.ajax({
    url : sUrlP + "listarPorProducto",
    type: 'POST',
    data : 'idProducto=' + $('#producto').val(),
    dataType : "json",
    success : function(oEsq) {
      Grid = new TGrid(oEsq, 'reporte', '');
      Grid.SetName("Listar");
      Grid.SetNumeracion(true);
      Grid.Generar();
    }
  });
}

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