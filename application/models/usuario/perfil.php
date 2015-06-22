<?php
class Perfil {
	
	var $identificador;
	
	var $nombre;
	
	var $descripcion;
	
	
	
	function __construct($identificador = null) {
		parent::__construct();
		$this->load->database();			
		$consulta = 'SELECT * FROM perfil WHERE oid =\'' . $identificador .  '\'';

		
	}
		
	
	function listaPrivilegios() {
		
	}
	
	
	function __destruct(){
		unset($this->db);
	}
	
}