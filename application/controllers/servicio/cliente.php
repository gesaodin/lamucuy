<?php
class Cliente extends CI_Controller {

	function __construct(){
		parent::__construct();		
	}
		
	function index(){
		try{
			$clienteSOAP = new SoapClient(
					'http://localhost/estcorp/application/controllers/servicio/servidor.wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));
		
			$r = $clienteSOAP->hola('Carlos Pena');
		
			print('<pre>');
			print_r($r);
			print('</pre>');
		
		} catch(SoapFault $e){
			var_dump($e);
		}
	}
}