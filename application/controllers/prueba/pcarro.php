<?php

require_once(APPPATH . '/controllers/prueba/Toast.php');
//require_once(APPPATH . '/models/carro/mcarro.php');

class PCarro extends Toast  {

  function __construct() {
    parent::__construct(__FILE__);
    $this->load->model('carro/mcarro', 'Carro');
    
  }

  /**
   * OPTIONAL; Anything in this function will be run before each test
   * Good for doing cleanup: resetting sessions, renewing objects, etc.
   */
  function _pre() {
    
  }

  /**
   * OPTIONAL; Anything in this function will be run after each test
   * I use it for setting $this->message = $this->My_model->getError();
   */
  function _post() {
    
  }

  /* TESTS BELOW */

  function test_Agregar() {
    $MCarro = new MCarro();
    $data = array('id' => 1, 'cantidad' => 1, 'precio' => '20.82', 'nombre' => 'Bolsas de Color Rojo');
    $MCarro -> registrar($data);  
    $this->_assert_true($MCarro -> registrar($data));         
  }

/**  
  function test_Listar(){
    $this->_assert_equals($this->db->_error_number(), 0);
    $this->message = $this->db->_error_message();
    
    $obj = $this->Plantel->GUI();    
    $this->_assert_equals_object($obj);    
  }

  **/

}

// End of file example_test.php */
// Location: ./system/application/controllers/test/example_test.php */