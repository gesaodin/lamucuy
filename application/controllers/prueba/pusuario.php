<?php

require_once (APPPATH . '/controllers/prueba/Toast.php');

class PUsuario extends Toast {

  var $estatus = TRUE;

  function __construct() {
    parent::__construct(__FILE__);
    $this -> load -> model('usuario/usuario', 'Usuario');

  }

  function _pre() {

  }

  function _post() {

  }

  function test_evaluarSobreNombre() {
    $this -> Usuario -> sobreNombre = 'Carlos';
    $this -> _assert_true($this -> Usuario -> _evaluarSobreNombre());
  }

  function test_evaluarCorreo() {
    $this -> Usuario -> correo = 'Carlos@a.com';
    $this -> _assert_true($this -> Usuario -> _evaluarCorreo());
  }

  function test_registrarUsuario() {
    $msj = '';
    $this -> Usuario -> cedula = '17341';
    $this -> Usuario -> nombre = 'Prueba_1';
    $this -> Usuario -> apellido = 'Prueba_1';
    $this -> Usuario -> tipo = 'V';
    $this -> Usuario -> sobreNombre = 'Prueba_1';
    $this -> Usuario -> clave = '123';
    $arr = $this -> Usuario -> registrar();
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
