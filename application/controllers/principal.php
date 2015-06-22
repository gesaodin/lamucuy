<?php

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 *
 * @package estcorp
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link		http://www.genprog.org
 * @since Version 1.0
 *
 */
class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();		
	}

	function index() {
		$this->ingresar ();
	}


/**
 *Menu
 */
  function ingresar() {
		$this->load->view ( 'principal/ingresar');
	}
 /**
 *Fin Menu
 */
	
	function validarUsuario(){
		$this->load->model('usuario/iniciar', 'Iniciar');
		$this->Iniciar->validarCuenta($_POST);	
	}
	
	public function registrarUsuario(){
		$this -> load -> model("usuario/usuario","usuario");
		$usuario = new $this -> usuario;
		$usuario -> cedula = $_POST['cedu'];
		$usuario -> tipo = $_POST['tipo'];
		$usuario -> nombre = $_POST['nomb'];
		$usuario -> apellido = $_POST['apel'];
		$usuario -> direccion = $_POST['dire'];
		$usuario -> sobreNombre = $_POST['seud'];
		$usuario -> correo = $_POST['corr'];	
		$usuario -> celular = $_POST['celu'];
		$usuario -> telefono = $_POST['telf'];
		$usuario -> empresa = $_POST['empr'];
		$usuario -> pagina = $_POST['pagi'];
		$usuario -> clave = $_POST['clav'];
		
		$usuario -> registrar();
		echo "Se registro con exito..";
	}


  
	function __destruct(){

	}
}