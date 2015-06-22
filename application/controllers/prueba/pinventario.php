<?php
require_once (APPPATH . '/controllers/prueba/Toast.php');
class PInventario extends Toast {
  var $estatus = TRUE;
  function __construct() {
    parent::__construct(__FILE__);
    $this -> load -> model('administracion/minventario', 'Inventario');
  }

  function _pre() {
  }

  function _post() {
  }

  function test_mapearObjeto() {
    $this -> _assert_equals_array($this -> Inventario -> mapearObjeto());
  }

  function test_registrarInventario() {
    $msj = '';
    $this -> Inventario -> idProducto = 3;
    $this -> Inventario -> disponible = 5;
    
    $this -> Inventario -> precio = 46.89;
    $arr = $this -> Inventario -> registrar();
    foreach ($arr as $clv) {
      if ($clv['msj'] != '') {
        $this -> estatus = FALSE;
        $msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
      }
    }
    $this -> _assert_true($this -> estatus);
    $this -> message = $msj;
  }

  function test_actualizarInventario() {
    $msj = '';
    $this -> estatus = TRUE;
    $this -> Inventario -> identificador = 3;
    $this -> Inventario -> idProducto = 3;
    $this -> Inventario -> disponibile = 6;
    $this -> Inventario -> precio = 56.89;
    $this -> Inventario -> fechaEntrada = '2014-02-02';
    $arr = $this -> Inventario -> actualizar();
    foreach ($arr as $clv) {
      if ($clv['msj'] != '') {
        $this -> estatus = FALSE;
        $msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
      }
    }
    $this -> _assert_true($this -> estatus);
    $this -> message = $msj;
  }

  function test_borrarInventario() {
    $msj = '';
    $this -> estatus = TRUE;
    $this -> Inventario -> idProducto = 3;
    $arr = $this -> Inventario -> borrar($this ->Inventario -> idProducto );
    foreach ($arr as $clv) {
      if ($clv['msj'] != '') {
        $this -> estatus = FALSE;
        $msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
      }
    }
    $this -> _assert_true($this -> estatus);
    $this -> message = $msj;
  }

  function test_generarOrden() {
    $msj = '';
    $this -> load -> model('administracion/morden', 'MOrden');
    $this -> estatus = TRUE;
    $this -> MOrden -> codigo = NULL;
    $this -> MOrden -> nombre = 'Carrito: Solicitud de Pedido';
    $this -> MOrden -> tipo = 1;
    $arr = $this -> MOrden ->generarPedido();
    
    foreach ($arr as $clv) {
      if ($clv['msj'] != '') {
        $this -> estatus = FALSE;
        $msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
      }
    }
    $this -> _assert_true($this -> estatus);
    $this -> message = $msj;
  }

}

// End of file example_test.php */
// Location: ./system/application/controllers/test/example_test.php */
