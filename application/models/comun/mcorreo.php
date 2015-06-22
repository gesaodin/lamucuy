<?php
/**
 *
 */
class MCorreo extends CI_Model {

  var $para;
  var $titulo;
  var $asunto;
  var $mensaje;
  var $cabecera;
  var $imagen;
  var $fecha;

  function __construct() {
    parent::__construct();
  }

  /**
   *
   */
  function enviar() {
    $valor = mail($this -> para, $this -> titulo, $this -> mensaje, $this -> cabecera);
    return $valor;
  }

  function _evaluarCorreo() {
    return preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $this -> correo);
  }
  
  function salvar() {
    
  }

}
?>