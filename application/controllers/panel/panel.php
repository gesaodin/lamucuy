<?php
date_default_timezone_set ( 'America/Caracas' );
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
class Panel extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!isset($_SESSION['usuario'])) {
			session_destroy();
			redirect(base_url() . 'index.php/panel/principal');
		}
		$this -> load -> model('panel/mpanel', 'Panel');
		$this -> load -> helper('url');
	}

	function index() {
		/*$data['js'] = 'principal';
		$this -> load -> view('panel2/panel', $data);*/
        $this->resumenDiario();
	}

    function resumenDiario(){
        $data['js'] = 'diario';
        $this -> load -> view('panel2/diario', $data);
    }

	/*
	 * Agregar imagen a galeria de producto
	 */
	function agregarGaleria() {
		$data['js'] = 'panel';
		$this -> load -> view('panel/creaGaleria', $data);
	}

	function listarComboProducto() {
		$this -> load -> model("fisico/maestroproducto", "maestro");
		$lista = $this -> maestro -> listarActivo();
		foreach ($lista[0]['rs'] as $clave => $valor) {
			$combo[$valor -> oidp] = '( ' . $valor -> codi . ' ) ' . $valor -> nomb;
		}
		echo json_encode($combo);
	}

	function registrarGaleria() {
		$this -> load -> model('comun/mimagen', 'MImagen');
		$this -> load -> model('panel/mpanel', 'MPanel');
		$oidp = $_POST['codigo'];

		$varlor = $this -> MImagen -> cargar($_FILES, BASEPATH . 'img/galeria') -> salvar();
		$nombreImagen = $_FILES['imagen']['name'];
		echo $this -> MPanel -> registrarGaleria($oidp, $nombreImagen);
		//echo "si";

	}

	function consultarGaleria() {
		$this -> load -> model('panel/mpanel', 'MPanel');
		$oidp = $_POST['codigo'];
		echo $this -> MPanel -> consultarGaleria($oidp);
		//echo "si";
	}

	function eliminarGaleria() {
		$this -> load -> model('panel/mpanel', 'MPanel');
		$json = json_decode($_POST['objeto'], true);
		echo $this -> MPanel -> eliminarGaleria($json);
	}

	/**
	 * Listar Pedido
	 */

	function listar_pedidos_pendientes() {
		$this -> load -> model('comun/mpedido', 'MPedido');
		$estatus = $_POST['estatus'];
		$consulta = $this -> MPedido -> listarPorAdmin($estatus);
		$obj = array();
		if ($consulta[0]['cant'] != 0) {
			$i = 1;
			$cab = $this -> MPedido -> cabezeraJSONAdmin();
			$cuerpo = array();
			foreach ($consulta[0]['rs'] as $filas) {
				$nom = $filas -> nomb . ' ' . $filas -> apel;
				$cuerpo[$i] = array("1" => "", "2" => $filas -> nomb . ' ' . $filas -> apel, "3" => $filas -> telf . '|' . $filas -> corr, "4" => $filas -> orde, "5" => number_format($filas -> total, 2, ",", "."), "6" => '', "7" => '', "8" => '', "9" => "", "10" => $filas -> oidu);
				if ($estatus == 0) {
					array_push($cuerpo[$i], array("11" => ""), array("12" => ""));
				}
				$i++;
			}
			$obj = array("Cabezera" => $cab, "Cuerpo" => $cuerpo, "Origen" => "json", "Paginador" => 20, "resp" => 1);
		} else
			$obj['resp'] = 0;
		echo json_encode($obj);
		//echo "llega";
	}

    function listar_pedidos_pendientes2() {
        $this -> load -> model('comun/mpedido', 'MPedido');
        $estatus = $_POST['estatus'];
        $consulta = $this -> MPedido -> listarPorAdmin($estatus);
        $obj = array();
        if ($consulta[0]['cant'] != 0) {
            $cab = array("#Pedido","Nombre","Telefono","Monto","Usuario");
            $cuerpo = array();
            foreach ($consulta[0]['rs'] as $filas) {
                $nom = $filas -> nomb . ' ' . $filas -> apel;
                $cuerpo[] = array($filas -> orde, $nom, $filas -> telf . '|' . $filas -> corr,number_format($filas -> total, 2, ",", "."), $filas -> oidu);
            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);
        //echo "llega";
    }

	function listar_pedidos_cliente() {
		$this -> load -> model('comun/mdeposito', 'MDeposito');
		$estatus = $_POST['estatus'];
		$consulta = $this -> MDeposito -> listarPorAdmin($estatus);
		$obj = array();
		if ($consulta[0]['cant'] != 0) {
			$i = 1;
			$cab = $this -> MDeposito -> cabezeraJSONAdmin();
			$cuerpo = array();
			foreach ($consulta[0]['rs'] as $filas) {
				$nom = $filas -> nomb . ' ' . $filas -> apel;
				$cuerpo[$i] = array("1" => "", "2" => $filas -> nomb . ' ' . $filas -> apel, "3" => $filas -> telf . '|' . $filas -> corr, "4" => $filas -> orde, "5" => number_format($filas -> total, 2, ",", "."), "6" => $filas -> banco, "7" => $filas -> deposito, "8" => $filas -> obser, "9" => $filas -> fecha);
				if ($estatus == 1) {
					array_push($cuerpo[$i], array("10" => ""), array("11" => ""));
				}
				$i++;
			}
			$obj = array("Cabezera" => $cab, "Cuerpo" => $cuerpo, "Origen" => "json", "Paginador" => 20, "resp" => 1);
		} else
			$obj['resp'] = 0;
		echo json_encode($obj);
		//print_R($consulta);
	}

	function Detalle_Orden() {
		$datos = json_decode($_POST['objeto'], true);
		$this -> load -> model('comun/mpedido', 'MPedido');
		$consulta = $this -> MPedido -> listaPedidosOrden($datos[0]);
		$obj = array();
		if ($consulta[0]['cant'] != 0) {
			$i = 1;
			$cabecera[1] = array("titulo" => "Cantidad", "atributos" => "width:10px");
			$cabecera[2] = array("titulo" => "Producto", "atributos" => "width:100px");
			$cabecera[3] = array("titulo" => "Detalle", "atributos" => "width:180px");
			$cabecera[4] = array("titulo" => "Precio", "atributos" => "width:40px");
			$cabecera[5] = array("titulo" => "Total");
			$cuerpo = array();

			$tot = 0;
			foreach ($consulta[0]['rs'] as $filas) {
				$cuerpo[$i] = array("1" => $filas -> cant, "2" => $filas -> nombre, "3" => $filas -> detalle, "4" => $filas -> prec, "5" => $filas -> total);
				$i++;
				$tot += $filas -> total;
			}
			$leyenda = "<h2>TOTAL:" . number_format($tot, 2, ",", ".");
			$obj = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "resp" => 1, "leyenda" => $leyenda);
		} else
			$obj['resp'] = 0;
		echo json_encode($obj);

	}

    function Detalle_Orden2() {
        $datos = json_decode($_POST['datos'],true);
        $this -> load -> model('comun/mpedido', 'MPedido');
        $consulta = $this -> MPedido -> listaPedidosOrden($datos[0]);
        $obj = array();
        if ($consulta[0]['cant'] != 0) {
            $cab = array("Cantidad","Producto","Detalle","Precio","Total");
            $cuerpo = array();
            foreach ($consulta[0]['rs'] as $filas) {
                $cuerpo[] = array($filas -> cant,$filas -> nombre,$filas -> detalle,$filas -> prec,$filas -> total);

            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);

    }

	function Aceptar_Deposito() {
		$this -> load -> model('comun/mpedido', 'MPedido');
		$this -> load -> model('comun/mdeposito', 'MDeposito');
		$datos = json_decode($_POST['objeto'], true);
		//print("<pre>");
		//print_R($datos);
		$this -> MPedido -> cambiarEstatusPedido($datos[0], 1);
		$this -> MDeposito -> registrar($datos);
		echo "Se proceso con exito";
	}

    function Aceptar_Deposito2() {
        $this -> load -> model('comun/mpedido', 'MPedido');
        //$this -> load -> model('comun/mdeposito', 'MDeposito');
        $datos = json_decode($_POST['datos'], true);
        //print("<pre>");
        //print_R($datos);
        $this -> MPedido -> cambiarEstatusPedido($datos[0], 1);
        //$this -> MDeposito -> registrar($datos);
        echo "Se proceso con exito";
    }

	function Aceptar_Procesando() {
		$this -> load -> model('comun/mpedido', 'MPedido');
		$this -> load -> model('comun/mdeposito', 'MDeposito');
		$datos = json_decode($_POST['objeto'], true);
		//print("<pre>");
		//print_R($datos);
		$this -> MPedido -> cambiarEstatusPedido($datos[0], 2);
		$this -> MDeposito -> Aceptar($datos);
		echo "Se proceso con exito";
	}

	function Rechazar_Pedido_Cliente() {
		$this -> load -> model('comun/mpedido', 'MPedido');
		$this -> load -> model('administracion/minventario', 'MInventario');
		$datos = json_decode($_POST['objeto'], true);
		$this -> MPedido -> cambiarEstatusPedido($datos[0], 4);
		$this -> MInventario -> presindir($datos[0]);
	}

	function Rechazar_Procesando() {
		$this -> load -> model('comun/mpedido', 'MPedido');
		$this -> load -> model('comun/mdeposito', 'MDeposito');
		$this -> load -> model('administracion/minventario', 'MInventario');
		$datos = json_decode($_POST['objeto'], true);
		$this -> MPedido -> cambiarEstatusPedido($datos[0], 4);
		$this -> MDeposito -> Rechazar($datos);
		$this -> MInventario -> presindir($datos[0]);
	}

	/**
	 * Funciones de panel sobre usuarios
	 */

	function verUsuarios() {
		$data['js'] = 'usuarios';
		$this -> load -> view('panel/verUsuarios', $data);

	}

	function listarUsuarios() {
		$obj = array();
		$consulta = $this -> db -> query("select oid,concat(tipo,'-',cedu)as cedula,concat(nomb,' ',apel)as nombre,
											dire,seud,corr,celu,telf,empr,pagi,oidp 
											from usuario
											join _usuarioperfil on usuario.oid = _usuarioperfil.oidu
											where (oidp=2 or oidp=3)");
		if ($consulta -> num_rows() != 0) {
			$i = 1;
			$cabecera[1] = array("titulo" => " ", "oculto" => 1);
			$cabecera[2] = array("titulo" => "Cedula", "atributos" => "width:60px");
			$cabecera[3] = array("titulo" => "Nombre", "atributos" => "width:60px");
			$cabecera[4] = array("titulo" => "Seudonimo", "atributos" => "width:60px");
			$cabecera[5] = array("titulo" => "Telefono|Correo", "atributos" => "width:40px");
			$cabecera[6] = array("titulo" => "Direccion", "atributos" => "width:150px;");
			$cabecera[7] = array("titulo" => "Perfil", "tipo" => "combo", "atributos" => "width:150px;");
			$cabecera[8] = array("titulo" => "Mod", "tipo" => "bimagen", "mantiene" => 1, "funcion" => 'modificarUsuario', "parametro" => "1,7", "ruta" => __IMG__ . "botones/aceptar1.png", "atributos" => "width:10px");

			$cuerpo = array();
			$rsConsulta = $consulta -> result();
			foreach ($rsConsulta as $filas) {
				$tel_corr = $filas -> celu . '|' . $filas -> telf . '|' . $filas -> corr;
				$cuerpo[$i] = array("1" => $filas -> oid, "2" => $filas -> cedula, "3" => $filas -> nombre, "4" => $filas -> seud, "5" => $tel_corr, "6" => $filas -> dire, "7" => $this -> tipoCliente($filas -> oidp), "8" => "");
				$i++;
			}
			$tusu = array("2" => "Cliente Normal", "3" => "Cliente Especial");
			$obj = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "Paginador" => 10, "resp" => 1, "Objetos" => array("7" => $tusu));
		} else
			$obj['resp'] = 0;
		echo json_encode($obj);

	}

	function modificarUsuario() {
		$datos = json_decode($_POST['objeto'], true);
		//print_r($datos);
		if ($datos[1] == 2 || $datos[1] == 3) {
			$this -> db -> query("UPDATE _usuarioperfil set oidp=" . $datos[1] . " WHERE oidu=" . $datos[0]);
			echo "Se modifico con exito el perfil";
		} else {
			echo "No hubo modificacion";
		}
	}

	function tipoCliente($tipo) {
		switch ($tipo) {
			case 2 :
				$t = 'Cliente Normal';
				break;
			case 3 :
				$t = 'Cliente Especial';
				break;
			default :
				$t = 'Cliente Normal';
				break;
		}
		return $t;
	}

	/**
	 * Funcion para generar excel desde tgrid
	 */
	public function Exporta_Exel() {
   		$this -> load -> model('utilidades/mexcel','MExcel'); 
		$this -> MExcel -> cabezera = json_decode($_POST['cabezera'] ,TRUE);
		$this -> MExcel -> cuerpo = json_decode($_POST['cuerpo'],TRUE);
		$nomb = 'reporte_'.Date('U').'.xls';
		$ruta = BASEPATH.'repository/xls/'.$nomb;
   		$this -> MExcel -> Generar();
		$this -> MExcel -> Guardar($ruta);
		echo "<br><center><a href='/system/repository/xls/".$nomb."' target='top'><img src='" . __IMG__ . "exel1.jpg' style='width:70px'>Click aqui</img></a>";
	}
    /*
     * Funciones para consolidar inventario de sucursal
     */
    function listarExistenciaSucursal(){
        $ubica = $_POST['ubicacion'];
        $consulta = $this -> db -> query("select existencia.oidp, producto.nomb as producto,
            producto.cate, categoria.nomb as categoria, sum(existencia.cant)as cant,existencia.ubic, almacen.nomb from producto
INNER JOIN categoria ON categoria.oid=producto.cate
INNER JOIN existencia on existencia.oidp=producto.oid
INNER JOIN almacen ON existencia.ubic=almacen.oid
WHERE existencia.ubic = ".$ubica."
GROUP BY producto.cate,existencia.ubic");
        $obj = array();
        if ($consulta->num_rows() != 0) {
            $cab = array("#oid","Producto","oidcat","Categoria","Cantidad","ubicacion");
            $cuerpo = array();
            foreach ($consulta->result() as $filas) {
                $cuerpo[] = array($filas -> oidp, $filas -> producto, $filas -> cate ,$filas -> categoria, $filas -> cant, $filas ->ubic);
            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);
    }

    function listarExistenciaSucursalDetalle(){
        $datos = json_decode($_POST['datos'],true);
        $consulta = $this -> db -> query("select activos.oidp, fab.oidp as oidpfab,producto.nomb as producto,fab.oid as oidfab,
                                  producto.cate, categoria.nomb as categoria, ifnull(activos.cant,0)as cant,ifnull(fab.cant,0) as fabrica
                                  from producto
                                  left join existencia on existencia.oidp=producto.oid
                                    LEFT JOIN (select oidp,oid,sum(cant)as cant,ubic from existencia
                                    		WHERE existencia.ubic = ".$datos[1]." and existencia.visi=0
                                    		group by existencia.oidp)as activos ON producto.oid=activos.oidp
                                    LEFT JOIN (select oidp,oid,sum(cant)as cant,ubic from existencia
                                    		WHERE existencia.ubic = ".$datos[1]." and existencia.visi=1
                                    		group by existencia.oidp)as fab ON producto.oid=fab.oidp
                                    LEFT JOIN categoria ON categoria.oid=producto.cate
                                    LEFT JOIN almacen ON activos.ubic=almacen.oid or fab.ubic=almacen.oid
                                    WHERE (activos.ubic = ".$datos[1]." or fab.ubic=".$datos[1].") and producto.cate = ".$datos[0]."
                                    GROUP BY producto.oid");
        $obj = array();
        if ($consulta->num_rows() != 0) {
            $cab = array("Producto","Existencia","Comanda","oid");
            $cuerpo = array();
            foreach ($consulta->result() as $filas) {
                $cuerpo[] = array($filas -> producto, $filas -> cant, $filas -> fabrica,$filas -> oidfab);
            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);
    }

    function consolidarProducto(){
        $datos = json_decode($_POST['datos']);
        if($datos[0]!= ''){
            $this -> db -> query("update existencia set visi=0 where oid=".$datos[0]);
            echo "La Comanda fue consolidada y agregada a existencia en sucurusal.";
        }else{
            echo "No Posee comanda por consolidar";
        }
    }

    function historialconsolidarProducto(){
        date_default_timezone_set ( 'America/Caracas' );
        $this -> db -> query("insert into movimiento_existencia(oid,marc,prov,mode,dscr,oidp,seri,lote,
                                cuni,cpro,cdet,cmay,unid,cant,fact,esta,ubic,visi,oidusu,tip)
                                select oid,marc,prov,mode,dscr,oidp,seri,lote,
                                cuni,cpro,cdet,cmay,unid,cant,fact,esta,ubic,visi,'".$_SESSION['oid']."',0 from existencia
                                where existencia.ubic = ".$_SESSION['ubicacion']);
        echo "Se consolido inventario con exito...".date("d-m-Y h:i:s");
        //print_R($_SESSION);
    }

    /**
     * Funciones para reporte de resumen diario
     */
    function dtgridresumenDiario(){
        $consulta = $this -> db -> query('select mv.fech as fecha,ubic,oidusu,if(tip = 0,"Apertura","Cierre")as tip,
                        pedido,usuario.seud ,ifnull(debi,0)as debi,ifnull(cred,0)as efectivo,ifnull(mont,0)as sistema
                        from movimiento_existencia as mv
                        join usuario on usuario.oid = mv.oidusu
                        left join historial_cierre on historial_cierre.oid = mv.pedido
                        where mv.ubic = '.$_POST['ubic'].' and mv.fech like "%'.$_POST['fech'].'%"
                        group by mv.fech');
        $obj = array();
        if ($consulta->num_rows() != 0) {
            $cab = array("pedido","Usuario","Tipo","M. Debito/Credito","M. Efectivo","M. Sistema","Fecha","ubic","usu");
            $cuerpo = array();
            $rs = $consulta -> result();
            foreach ($rs as $filas) {
                $cuerpo[] = array($filas -> pedido, $filas -> seud, $filas -> tip , $filas -> debi,
                    $filas -> efectivo,$filas -> sistema,$filas -> fecha,$filas -> ubic,$filas -> oidusu);
            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);
    }

    function DetalleResumenDiario(){
        $datos = json_decode($_POST['datos'],true);

        $consulta = $this -> db -> query('select movimiento_existencia.oidp, producto.nomb as producto,
            producto.cate, categoria.nomb as categoria, sum(movimiento_existencia.cant)as cant,
				movimiento_existencia.ubic, almacen.nomb,movimiento_existencia.oidusu,movimiento_existencia.fech
				from producto
INNER JOIN categoria ON categoria.oid=producto.cate
INNER JOIN movimiento_existencia on movimiento_existencia.oidp=producto.oid
INNER JOIN almacen ON movimiento_existencia.ubic=almacen.oid
WHERE movimiento_existencia.ubic = '.$datos[1].' and movimiento_existencia.oidusu = '.$datos[2].'
and movimiento_existencia.fech = "'.$datos[0].'"
GROUP BY producto.cate,movimiento_existencia.ubic');
        $obj = array();
        if ($consulta->num_rows() != 0) {
            $cab = array("#oid","Producto","oidcat","Categoria","Cantidad","ubicacion","usu","fech");
            $cuerpo = array();
            foreach ($consulta->result() as $filas) {
                $cuerpo[] = array($filas -> oidp, $filas -> producto, $filas -> cate ,$filas -> categoria,
                    $filas -> cant, $filas ->ubic,$filas -> oidusu, $filas ->fech);
            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);

    }

    function Detalle2ResumenDiario(){
        $datos = json_decode($_POST['datos'],true);
        $consulta = $this -> db -> query('select activos.oidp, fab.oidp as oidpfab,producto.nomb as producto,fab.oid as oidfab,
   producto.cate, categoria.nomb as categoria, ifnull(activos.cant,0)as cant,
	ifnull(fab.cant,0) as fabrica
   from producto
   left join movimiento_existencia on movimiento_existencia.oidp=producto.oid
   LEFT JOIN (select oidp,oid,sum(cant)as cant,ubic from movimiento_existencia
          		WHERE movimiento_existencia.ubic = '.$datos[1].' and movimiento_existencia.visi=0
          		and movimiento_existencia.oidusu = '.$datos[2].'
					 and movimiento_existencia.fech = "'.$datos[3].'"
           		group by movimiento_existencia.oidp)as activos ON producto.oid=activos.oidp
   LEFT JOIN (select oidp,oid,sum(cant)as cant,ubic from movimiento_existencia
          		WHERE movimiento_existencia.ubic = '.$datos[1].' and movimiento_existencia.visi=1
          		and movimiento_existencia.oidusu = '.$datos[2].'
					 and movimiento_existencia.fech = "'.$datos[3].'"
           		group by movimiento_existencia.oidp)as fab ON producto.oid=fab.oidp
   LEFT JOIN categoria ON categoria.oid=producto.cate
   LEFT JOIN almacen ON activos.ubic=almacen.oid or fab.ubic=almacen.oid
   WHERE (activos.ubic = '.$datos[1].' or fab.ubic='.$datos[1].') and producto.cate = '.$datos[0].'
   GROUP BY producto.oid');
        $obj = array();
        if ($consulta->num_rows() != 0) {
            $cab = array("Producto","Existencia","Comanda","oid");
            $cuerpo = array();
            foreach ($consulta->result() as $filas) {
                $cuerpo[] = array($filas -> producto, $filas -> cant, $filas -> fabrica,$filas -> oidfab);
            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);

    }

    function pedidoID(){
        $data['oid'] = $_GET['valor'];
        $data['js'] = 'verPedido';
        $this -> load -> view('panel2/verPedido', $data);
    }

    function resumenPedido(){
        $orde = $_POST['oid'];
        $consulta = $this -> db -> query('select cant,prec,producto.nomb,(cant*prec)as tot from pedido
join producto on producto.oid = pedido.oidp
where orde = '.$orde);
        $obj = array();
        if ($consulta->num_rows() != 0) {
            $cab = array("Producto","Cantidad","Precio","Sub-Total");
            $cuerpo = array();
            foreach ($consulta->result() as $filas) {
                $cuerpo[] = array($filas -> nomb, $filas -> cant, $filas -> prec,$filas -> tot);
            }
            $obj[] = array("cabecera" => $cab, "cuerpo" => $cuerpo);
        } else
            $obj['resp'] = 0;
        echo json_encode($obj);


    }

	/**
	 * Cerrar Sesion del sistema
	 */
	function cerrar() {
		session_destroy();
		redirect(base_url() . 'index.php');
	}

	function __destruct() {

	}

}
?>