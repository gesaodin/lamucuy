$(function() {
  listarTipo();
  listarCategoria();

});

/**
 * Listar Tipo de unidades
 */
function listarTipo() {
  $.ajax({
    url : sUrlP + 'listarComboUnidad',
    dataType : 'JSON',
    success : function(json) {
      $.each(json, function(item, valor) {
        $("#unidad").append(new Option(valor, item, false, true));
      });
    }
  });
}

/**
 * Listar Categorias de Productos
 */
function listarCategoria() {
  $.ajax({
    url : sUrlP + 'listarComboCategoria',
    dataType : 'JSON',
    success : function(json) {
      $.each(json, function(item, valor) {
        $("#categoria").append(new Option(valor, item, false, true));
      });
    }
  });
}

function consultar(){
  
}

function listar() {

}

function registrar() {
  var archivoImagen = document.getElementById("imagen");
  var imagen = archivoImagen.files[0];
  var cadena = new FormData();

  cadena.append('imagen', imagen);
  cadena.append('codigo', $('#codigo').val());
  cadena.append('nombre', $('#nombre').val());
  cadena.append('descripcion', $('#descripcion').val());
  cadena.append('metodo', $('#metodo option:selected').val());
  cadena.append('unidad', $('#unidad option:selected').val());
  cadena.append('costo', $('#costoProducto').val());
  cadena.append('maximo', $('#maximo').val());
  cadena.append('minimo', $('#minimo').val());
  cadena.append('categoria', $('#categoria option:selected').val());

  $.ajax({
    url : sUrlP + "registrarProducto",
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


function limpiar(){
  $('#codigo').val('');
  $('#nombre').val('');
  $('#maximo').val('');
  $('#minimo').val('');
  $('#descripcion').val('');
  $('#costoProducto').val('');
}


