<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 *
 * @package estcorp
 * @subpackage fisico
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link    http://www.genprog.org
 *
 */
session_start();
class Almacen extends CI_Controller {
  function __construct() {
    parent::__construct();
    if (!isset($_SESSION['usuario'])) {
      session_destroy();
      redirect(base_url() . 'index.php/fisico/principal');
    }
    $this -> load -> model('fisico/malmacen', 'Almacen');
    $this -> load -> helper('url');
  }

  function index() {
    $this ->verAlmacen();
   // $data['js'] = 'principal';
   // $this -> load -> view('fisico/principal', $data);
  }

  function verAlmacen() {
    $data['js'] = 'almacen';
    $this -> load -> view('fisico/almacen', $data);
  }

  function registrarAlmacen() {
    $this -> Almacen -> nombre = $_POST['nombre'];
    $this -> Almacen -> ubicacion = $_POST['ubicacion'];
    $this -> Almacen -> observacion = $_POST['observacion'];
    $data = $this -> Almacen -> registrar();
    echo $data[0]['msj'];
  }

  function listarAlmacen() {
    $cuerpo = array();
    $cabecera = $this -> Almacen -> cabeceraJSON();
    $data = $this -> Almacen -> listar();
    $rs = $data[0]['rs'];
    $i = 0;
    foreach ($rs as $clave => $valor) {
      $i++;
      $cuerpo[$i] = array("1" => $valor -> oid, "2" => $valor -> nomb, "3" => $valor -> ubic, "4" => $valor -> obse);
    }
    $objecto = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "titulo" => 'Listado de Almacenes', "leyenda" => '');
    echo json_encode($objecto);
  }

  // -------------------------------------------------------------------------
  // Categoria
  // -------------------------------------------------------------------------

  function agregarCategoria() {
    $data['js'] = 'categoria';
    $this -> load -> view('fisico/categoria', $data);
  }

  function registrarCategoria() {
  	$this -> load -> model('comun/mimagen', 'MImagen');
    $this -> load -> model('fisico/mcategoria', 'Categoria');
    $this -> Categoria -> nombre = $_POST['nombre'];
    $this -> Categoria -> imagen = $_FILES['imagen']['name'];
    $data = $this -> Categoria -> registrar();
    $varlor = $this -> MImagen -> cargar($_FILES, BASEPATH . 'img/categoria') -> salvar(0);
    
    echo $data[0]['msj'];
  }

  function listarCategoria() {
    $this -> load -> model('fisico/mcategoria', 'Categoria');
    $cuerpo = array();
    $cabecera[1] = array("titulo" => "codigo", "atributos" => "width:80px;text-align:center");
    $cabecera[2] = array("titulo" => "Nombre", "atributos" => "width:600px");
    $cabecera[3] = array("titulo" => "#", "atributos" => "width:8px", 'tipo' => 'bimagen', 
    		'funcion' => 'eliminarCategoria', 'ruta' => __IMG__ . 'quitar.png', 'parametro' => '1');
    
    $data = $this -> Categoria -> listar();
    $rs = $data[0]['rs'];
    $i = 0;
    foreach ($rs as $clave => $valor) {
      $i++;
      $cuerpo[$i] = array( //
        "1" => $valor -> oid, // 
        "2" => $valor -> nomb, //
        "3" => '' //
        
      );
    }
    $objecto = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "titulo" => 'Listado de Categoria', "leyenda" => '');
    echo json_encode($objecto);
  }
  
  function eliminarCategoria(){
    $this -> load -> model('fisico/mcategoria', 'MCategoria');
    $json = json_decode($_POST['objeto'], true);
    $this -> MCategoria -> identificador = $json['0'];
    $arr = $this -> MCategoria -> borrar();
    print('<pre>');
    print_r('Proceso Exitoso');
  }

  // -------------------------------------------------------------------------
  // Productos
  // -------------------------------------------------------------------------

  function producto() {
    $data['js'] = 'producto';
    $this -> load -> view('fisico/producto', $data);
  }

  function listarComboCategoria() {
    $combo = array();
    $this -> load -> model('fisico/mcategoria', 'Categoria');
    $lista = $this -> Categoria -> listar();
    foreach ($lista[0]['rs'] as $clave => $valor) {
      $combo[$valor -> oid] = $valor -> nomb;
    }
    echo json_encode($combo);
  }

  function listarComboUnidad() {
    $combo = array();
    $this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
    $lista = $this -> MaestroProducto -> listarUnidad();
    foreach ($lista[0]['rs'] as $clave => $valor) {
      $combo[$valor -> oid] = $valor -> nomb;
    }
    echo json_encode($combo);
  }

  function registrarProducto() {
    $this -> load -> model('comun/mimagen', 'MImagen');
    $this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
    $this -> MaestroProducto -> codigo = $_POST['codigo'];
    $this -> MaestroProducto -> nombre = $_POST['nombre'];
    $this -> MaestroProducto -> observacion = $_POST['descripcion'];
    $this -> MaestroProducto -> unidad = $_POST['unidad'];
    $this -> MaestroProducto -> categoria = $_POST['categoria'];
    $this -> MaestroProducto -> maximo = $_POST['maximo'];
    $this -> MaestroProducto -> metodo = $_POST['metodo'];
    $this -> MaestroProducto -> minimo = $_POST['minimo'];
    $this -> MaestroProducto -> costoProduccion = $_POST['costo'];
      if(isset($_FILES['imagen'])){
          $varlor = $this -> MImagen -> cargar($_FILES, BASEPATH . 'img/productos') -> salvar(1);
          $this -> MaestroProducto -> nombreImagen = $_FILES['imagen']['name'];
      }else{
          $this -> MaestroProducto -> nombreImagen = '';
      }

    $arr = $this -> MaestroProducto -> registrar();
	
    echo 'Proceso Exitoso...';

  }

  function consultarProducto() {

  }

  // -------------------------------------------------------------------------
  // Agregar seriales a Productos
  // -------------------------------------------------------------------------

  function agregarSerial() {
    $data['js'] = 'agregarserial';
    $this -> load -> view('fisico/agregarserial', $data);
  }

  function listarComboProducto($tipo = NULL) {
    $combo = array();
    $this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
    $lista = $this -> MaestroProducto -> listarActivo($tipo);
    foreach ($lista[0]['rs'] as $clave => $valor) {
      $combo[$valor -> oidp] = '( ' . $valor -> codi . ' ) ' . $valor -> nomb;
    }
    echo json_encode($combo);
  }

    function consultarID(){
        $this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
        $this -> MaestroProducto ->identificador = $_POST['id'];
        $lista = $this -> MaestroProducto -> consultarID();

        echo json_encode($this -> MaestroProducto);
        //echo $lista['err'];
    }

  function listarComboAlmacen($tipo = NULL) {
    $combo = array();
    $lista = $this -> Almacen -> listar();
    foreach ($lista[0]['rs'] as $clave => $valor) {
      $combo[$valor -> oid] = $valor -> nomb . ' ' . $valor -> ubic;
    }
    if (isset($tipo)) {
      return $combo;
    } else {
      echo json_encode($combo);
    }
  }

  function agregarExistencia() {
    $this -> load -> model('fisico/mexistencia', 'Existencia');
    $this -> Existencia -> cargarPost($_POST);

  }

  // -------------------------------------------------------------------------
  // Agregar lotes a Productos
  // -------------------------------------------------------------------------

  function agregarLote() {
    $data['js'] = 'agregarlote';
    $this -> load -> view('fisico/agregarlote', $data);
  }

  function agregarExistenciaLote() {
    $this -> load -> model('fisico/mexistencia', 'Existencia');
    $this -> Existencia -> cargarPostLote($_POST);

  }

  /**
   * Cerrar Sesion del sistema
   */
  function cerrar() {
    session_destroy();
    redirect(base_url() . 'index.php');
  }

  // -------------------------------------------------------------------------
  // Reporte
  // -------------------------------------------------------------------------

  function reporte() {
    $data['js'] = 'reporte';
    $this -> load -> view('fisico/reporte', $data);
  }

  function eliminarProducto() {
    $this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
    $json = json_decode($_POST['objeto'], true);
    $this -> MaestroProducto -> identificador = $json['0'];
    $arr = $this -> MaestroProducto -> borrar();
    print('<pre>');
    print_r($arr);
  }

  function listarExistenciaProductos() {
    $this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
    $cabecera = $this -> MaestroProducto -> cabeceraJSON();
    $data = $this -> MaestroProducto -> listarExistenciaProductos();
    $rs = $data[0]['rs'];
    $i = 0;
    foreach ($rs as $clave => $valor) {
      $i++;
      $cuerpo[$i] = array("1" => $valor -> oidp, "2" => $valor -> codi, "3" => $valor -> nomb, "4" => $valor -> unidad, "5" => $valor -> disp, "6" => $valor -> fent, "7" => '');
    }
    $objecto = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "titulo" => 'Control de Existencia', "leyenda" => '');
    echo json_encode($objecto);
  }
  
  function listarExistenciaProductosAlmacen() {
  	$this -> load -> model('fisico/maestroproducto', 'MaestroProducto');
  	$cabecera = $this -> MaestroProducto -> cabeceraJSON();
  	$data = $this -> MaestroProducto -> listarExistenciaProductos();
  	$rs = $data[0]['rs'];
  	$i = 0;
  	foreach ($rs as $clave => $valor) {
  		$i++;
  		$cuerpo[$i] = array("1" => $valor -> oidp, "2" => $valor -> codi, "3" => $valor -> nomb, "4" => $valor -> unidad, "5" => $valor -> disp, "6" => $valor -> fent, "7" => '');
  	}
  	$objecto = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "titulo" => 'Control de Existencia', "leyenda" => '');
  	echo json_encode($objecto);
  }
  
  

  function listarPorProducto() {
    $this -> load -> model('fisico/mexistencia', 'Existencia');
    $cuerpo = array();
    $ubicacion = $this -> listarComboAlmacen(1);
    $cabecera = $this -> Existencia -> cabeceraJSON();
    $data = $this -> Existencia -> listar($_POST['idProducto']);
    $rs = $data[0]['rs'];
    $i = 0;
    foreach ($rs as $clave => $valor) {
      $i++;
      $cuerpo[$i] = array(//
      "1" => $valor -> ubicacion . ' ' . $valor -> ubic, //
      "2" => $valor -> seri, //
      "3" => $valor -> fact, //
      "4" => $valor -> cant, //
      "5" => $valor -> unidad, //
      "6" => $valor -> cpro, //
      "7" => $valor -> cdet, //
      "8" => $valor -> cmay, //
      "9" => $valor -> esta //
      );
    }
    $combo = array('1', $ubicacion);
    $objecto = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "titulo" => 'Control de Productos', "leyenda" => '', 'Editable' => 'traslado', "Parametros" => "1,2", "Objetos" => $combo);
    echo json_encode($objecto);
  }

  function traslado() {
    $json = json_decode($_POST['objeto'], true);
    foreach ($json as $clave) {
      if (strval($clave[0]) > 0) {
        $actualizar = 'UPDATE existencia SET ubic=' . strval($clave[0]) . ' WHERE seri=\'' . $clave[1] . '\' LIMIT 1';
        $this -> db -> query($actualizar);
      }
    }
    echo 'Traslado Exitoso...';
  }

  // -------------------------------------------------------------------------
  // Inicio
  // -------------------------------------------------------------------------

  function listarPedidos() {
    $this -> load -> model('comun/mpedido', 'Pedido');
    $cabecera = $this -> Pedido -> cabeceraJSON();
    
  }

  function __destruct() {

  }

}
?>