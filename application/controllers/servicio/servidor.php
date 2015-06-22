<?php
class Servidor extends CI_Controller {
	
	var $disponibilidad = 0;
	
	function __construct() {
		parent::__construct();		
	}
	
	function index(){
		ini_set("soap.wsdl_cache_enabled","0");
		$servidor = new SoapServer('http://localhost/estcorp/application/controllers/servicio/servidor.wsdl');
		
		$servidor->setObject($this);
		$servidor->handle();/****/
	}
	
	function hola($a){
		$this -> load -> model('administracion/minventario', 'Inventario');		
		$b = $this->disponibilidad = $this->Inventario->disponibilidad(1);
		return 'Hola buenos dias Sr. ' . $a. ' Hay disponible el productos ( ' . $b . ' )' ; 
	}
	
}