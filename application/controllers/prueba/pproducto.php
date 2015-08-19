<?php
require_once (APPPATH . '/controllers/prueba/Toast.php');

class PProducto extends Toast {
  var $estatus = TRUE;
  function __construct() {
    parent::__construct(__FILE__);
    $this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
  }

  function _pre() {
  }

  function _post() {
  }

  function test_mapearObjeto() {
    $this -> _assert_equals_array($this -> MaestroProducto -> mapearObjeto());
  }

  function test_registrarProducto() {
    $msj = '';
    $this -> MaestroProducto -> identificador = 3;
    $this -> MaestroProducto -> nombre = 'Tarjetas';
    $this -> MaestroProducto -> observacion = 'Tipo Carnet';
    $this -> MaestroProducto -> categoria = 1;
    $arr = $this -> MaestroProducto -> registrar();
    
    foreach ($arr as $clv) {
      if ($clv['msj'] != '') {
        $this -> estatus = FALSE;
        $msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
      }
    }
    $this -> _assert_true($this -> estatus);
    $this -> message = $msj;
  }

  
  function test_listarActivo() {
  	$msj = '';
  	
  	$arr = $this -> MaestroProducto -> listarActivo(5);
  
  	foreach ($arr as $clv) {
  		if ($clv['msj'] != '') {
  			$this -> estatus = FALSE;
  			$msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
  		}
  	}
  	$this -> _assert_true($this -> estatus);
  	$this -> message = $msj;
  }


    function test_consultarID(){
        $msj = '';
        $this -> MaestroProducto ->identificador = 3;
        $arr = $this -> MaestroProducto -> consultarID();
        foreach ($arr as $clv) {
            if ($clv['msj'] != '') {
                $this -> estatus = FALSE;
                $msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
            }
        }
        $this -> _assert_true($this -> estatus);
        $this -> message = $msj;

    }
  
  
  function test_actualizarProducto() {
    $msj = '';
    $this -> estatus = TRUE;
    $this -> MaestroProducto -> identificador = 3;
    $this -> MaestroProducto -> nombre = 'Tarjetas';
    $this -> MaestroProducto -> observacion = 'Tipo de Valor';
    $this -> MaestroProducto -> categoria = 1;
    $arr = $this -> MaestroProducto -> actualizar();
    
    foreach ($arr as $clv) {
      if ($clv['msj'] != '') {
        $this -> estatus = FALSE;
        $msj .= 'Error: ' . $clv['err'] . ' Mensaje: ' . $clv['msj'] . '<br>';
      }
    }
    $this -> _assert_true($this -> estatus);
    $this -> message = $msj;
  }

  function test_borrarProducto() {
    $msj = '';
    $this -> estatus = TRUE;
    $this -> MaestroProducto -> identificador = 3;
    $arr = $this -> MaestroProducto -> borrar();
    
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
