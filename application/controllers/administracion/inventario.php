<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * GenProg Generacion de Programadores
 * Control de Inventario 01/02/2014
 *
 * @package estcorp
 * @subpackage administracion
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link    http://www.genprog.org
 * @since Version 1.0
 *
 */

class Inventario extends CI_Controller {



  function __construct() {
    parent::__construct();
    if (!isset($_SESSION['usuario'])) {
      session_destroy();
      redirect(base_url() . 'index.php/administracion/principal');
    }

  }

  function index(){
    
  }

  function disponibilidad() {

  }

  function listar() {

  }

  function GenerarOrden() {

  }

  function __destruct() {

  }

}
?>