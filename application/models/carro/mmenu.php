<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 *
 * @package estcorp
 * @subpackage carro
 * @author Judelvis Rivas
 * @copyright	Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link		http://www.genprog.org
 * @since Version 1.0
 *
 */
class MMenu extends CI_Model {
  function __construct() {
    parent::__construct();
    
  }
  function generar() {
    $this -> load -> model("fisico/mcategoria","categoria");
    $categoria = $this -> categoria -> listar();
    return $categoria[0]['rs'];
  }

}
