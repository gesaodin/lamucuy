-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.44-0ubuntu0.14.04.1 - (Ubuntu)
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla lamucuy.almacen
CREATE TABLE IF NOT EXISTS `almacen` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre Oficina, Bodega, Sucursal',
  `ubic` varchar(255) NOT NULL COMMENT 'Ubicación',
  `obse` varchar(255) NOT NULL COMMENT 'Observaciones',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Ubicación del deposito';

-- Volcando datos para la tabla lamucuy.almacen: 4 rows
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` (`oid`, `nomb`, `ubic`, `obse`) VALUES
	(1, 'Principal', 'Merida', 'Merida'),
	(2, 'Las Tapias', 'Las Tapias', 'Las Tapias'),
	(3, 'Plaza Mayor', 'Merida', 'Merida'),
	(4, 'MUKUMBARI', 'LAS HEROINAS', 'LAS HEROINAS');
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `oid` tinyint(1) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `imag` varchar(256) NOT NULL COMMENT 'Imagen',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Catégoria de Productos';

-- Volcando datos para la tabla lamucuy.categoria: 7 rows
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`oid`, `nomb`, `imag`) VALUES
	(1, 'Bombones', 'Bombones.png'),
	(2, 'Lingotes', 'lingotes.png'),
	(3, 'Lingotes Sin Azucar', 'lingotes_sin_azucar.png'),
	(7, 'ALFAJORES', 'IMG-20150619-WA0002.jpg'),
	(12, 'CAJAS DE MADERA', 'caja de madera tipo II 12 bomobones7.JPG'),
	(9, 'CHUPETAS', 'P7173180.JPG'),
	(11, 'FORMAS Y FIGURAS', 'P7173194.JPG');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.deposito
CREATE TABLE IF NOT EXISTS `deposito` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oidu` int(10) NOT NULL,
  `oido` int(10) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `deposito` varchar(32) NOT NULL,
  `obser` text NOT NULL,
  `estatus` tinyint(4) NOT NULL COMMENT '0:creado,1:aceptado,2:rechazado',
  `fecha` date NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lamucuy.deposito: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `deposito` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposito` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.detalle_lote
CREATE TABLE IF NOT EXISTS `detalle_lote` (
  `oid` varchar(16) NOT NULL COMMENT 'Indentificador Lote',
  `obsr` varchar(64) NOT NULL COMMENT 'Observaciones Generales',
  `cant` int(11) NOT NULL COMMENT 'Cantidad Disponible',
  `fent` date NOT NULL COMMENT 'Fecha de Entradas',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Parte, ración, cuota, porción';

-- Volcando datos para la tabla lamucuy.detalle_lote: 13 rows
/*!40000 ALTER TABLE `detalle_lote` DISABLE KEYS */;
INSERT INTO `detalle_lote` (`oid`, `obsr`, `cant`, `fent`) VALUES
	('0001', ':-D', 1000, '2015-06-01'),
	('002', '0.-', 100, '0000-00-00'),
	('003', '00', 1000, '2015-06-07'),
	('0003', 'LAS ALMENDRAS SON MUY CARAS', 1000, '2015-07-13'),
	('', '', 500, '0000-00-00'),
	('12052015', 'NO SE VENDEN CAJAS SOLAS OK', 100, '2015-07-16'),
	('1234', '', 100, '2015-07-10'),
	('220315', '', 243, '2015-07-22'),
	('000', '11', 40, '2015-08-18'),
	('1718', '', 40, '2015-08-18'),
	('lot20', 'observacion', 20, '2015-08-05'),
	('lot21', 'lote 21', 21, '2015-08-22'),
	('mucu00025', 'algo', 20, '2015-08-20');
/*!40000 ALTER TABLE `detalle_lote` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.existencia
CREATE TABLE IF NOT EXISTS `existencia` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador en Almacen',
  `marc` varchar(16) NOT NULL COMMENT 'Marca',
  `prov` varchar(64) NOT NULL COMMENT 'Proveedores',
  `mode` varchar(255) NOT NULL COMMENT 'Modelo',
  `dscr` varchar(255) NOT NULL COMMENT 'Descripcion',
  `oidp` int(11) NOT NULL COMMENT 'Identificador del Producto',
  `seri` varchar(64) NOT NULL COMMENT 'Serial del Producto',
  `lote` varchar(16) NOT NULL COMMENT 'Lote del Producto',
  `cuni` decimal(10,2) NOT NULL COMMENT 'Costo por unidad',
  `cpro` decimal(10,2) NOT NULL COMMENT 'Costo de Produccion',
  `cdet` decimal(10,2) NOT NULL COMMENT 'Costo al Detal',
  `cmay` decimal(10,2) NOT NULL COMMENT 'Costo al Mayor',
  `unid` int(2) NOT NULL COMMENT 'Unidad de Medida Para la venta',
  `cant` int(11) NOT NULL COMMENT 'Cantidad de Elementos',
  `fact` varchar(32) NOT NULL COMMENT 'Factura',
  `esta` tinyint(1) NOT NULL COMMENT '0: Disponible 1: Comprometido 2: Vendido',
  `ubic` int(3) NOT NULL COMMENT 'Ubicación en Almacen',
  `fech` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de Modificacion',
  `visi` tinyint(1) NOT NULL COMMENT 'Estatus de visibilidad para sucursales 0: Contable 1: Pendiente',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `oidp` (`oidp`,`seri`,`lote`,`ubic`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='Mercancía activa e inactiva';

-- Volcando datos para la tabla lamucuy.existencia: 16 rows
/*!40000 ALTER TABLE `existencia` DISABLE KEYS */;
INSERT INTO `existencia` (`oid`, `marc`, `prov`, `mode`, `dscr`, `oidp`, `seri`, `lote`, `cuni`, `cpro`, `cdet`, `cmay`, `unid`, `cant`, `fact`, `esta`, `ubic`, `fech`, `visi`) VALUES
	(1, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', ':-o', 1, '0001-001', '0001', 0.00, 80000.00, 104.00, 85.00, 2, 20, '0001', 1, 2, '2015-08-18 17:02:40', 0),
	(17, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'MUCUTELLA', 9, 'mucu0002', 'lot20', 0.00, 100.00, 100.00, 100.00, 2, 20, '0', 0, 2, '2015-08-19 23:36:25', 0),
	(18, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ALMENDRAS', 1, 'alm0002', 'lot21', 0.00, 0.00, 0.00, 0.00, 2, 21, '0', 0, 2, '2015-08-20 00:08:41', 0),
	(4, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'CHOCOLATES PENDIENTES', 4, '0003-0001', '0003', 0.00, 80000.00, 104.00, 85.00, 2, 53, '0001', 1, 2, '2015-08-20 10:28:37', 0),
	(5, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 5, '', '0001', 0.00, 90.00, 0.00, 0.00, 2, 0, '456555', 1, 4, '2015-07-27 18:57:02', 0),
	(6, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 6, '', '', 0.00, 0.00, 0.00, 0.00, 2, 100, '001', 1, 4, '2015-07-16 18:24:05', 0),
	(8, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 5, '', '', 0.00, 0.00, 0.00, 0.00, 2, 100, '001', 1, 4, '2015-07-27 18:57:02', 0),
	(9, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 6, '', '', 0.00, 0.00, 0.00, 0.00, 2, -60, '001', 1, 2, '2015-08-20 10:35:12', 0),
	(10, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 5, '', '', 0.00, 0.00, 0.00, 0.00, 2, 58, '001', 1, 2, '2015-07-27 18:57:02', 0),
	(11, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 6, '321', '12052015', 0.00, 60.00, 60.00, 55.00, 2, 100, '003', 1, 2, '2015-07-16 18:24:05', 0),
	(12, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'COBERTURA DE CHOCOLATE BLANCO', 6, '2424', '1234', 0.00, 60.00, 60.00, 57.00, 2, 10, '000000000', 1, 3, '2015-08-18 17:02:40', 0),
	(13, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 11, '1234', '220315', 0.00, 60.00, 0.00, 0.00, 2, 50, '', 1, 3, '2015-08-18 17:02:40', 0),
	(14, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', '', 9, '1234', '220315', 0.00, 60.00, 0.00, 0.00, 2, 11, '12345', 1, 3, '2015-08-18 17:02:40', 0),
	(15, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'chocolate con leche ', 13, '010203', '000', 0.00, 75.00, 75.00, 75.00, 2, 40, '1111', 0, 2, '2015-08-18 00:00:00', 0),
	(16, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'chocolate negro', 14, '01020304', '1718', 0.00, 75.00, 75.00, 75.00, 2, 40, '0102', 0, 2, '2015-08-18 00:00:00', 0),
	(19, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'MUCUTELLA', 9, 'mucu131', 'mucu00025', 0.00, 100.00, 100.00, 100.00, 2, 20, '0', 0, 2, '2015-08-20 10:34:33', 0);
/*!40000 ALTER TABLE `existencia` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oidp` int(10) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`oid`),
  KEY `oip` (`oidp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lamucuy.galeria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.historial_cierre
CREATE TABLE IF NOT EXISTS `historial_cierre` (
  `oid` int(11) NOT NULL,
  `mont` decimal(10,2) NOT NULL,
  `debi` decimal(10,2) NOT NULL,
  `cred` decimal(10,2) NOT NULL,
  `fech` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usua` int(11) NOT NULL,
  `esta` tinyint(1) NOT NULL,
  `clav` varchar(256) NOT NULL COMMENT 'Manejo de Claves'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lamucuy.historial_cierre: 0 rows
/*!40000 ALTER TABLE `historial_cierre` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_cierre` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Inventario',
  `oidp` int(11) NOT NULL COMMENT 'Identificador Producto',
  `seri` varchar(32) NOT NULL COMMENT 'Serial',
  `lote` varchar(32) NOT NULL COMMENT 'Lote',
  `ubic` int(3) NOT NULL COMMENT 'Ubicacion en Almacen',
  `disp` int(11) NOT NULL COMMENT 'Cantidad Existente',
  `prec` decimal(10,2) NOT NULL COMMENT 'Precio Unitario',
  `fent` date NOT NULL COMMENT 'Fecha Entrada',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `oidp` (`oidp`,`seri`,`lote`,`ubic`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='Registro, balance, descripción, lista, relación';

-- Volcando datos para la tabla lamucuy.inventario: 16 rows
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`oid`, `oidp`, `seri`, `lote`, `ubic`, `disp`, `prec`, `fent`) VALUES
	(1, 1, '0001-001', '0001', 2, 20, 80000.00, '2015-07-07'),
	(18, 9, 'mucu0002', 'lot20', 2, 20, 100.00, '2015-08-19'),
	(4, 4, '0003-0001', '0003', 2, 53, 80000.00, '2015-07-13'),
	(5, 5, '', '0001', 4, 0, 90.00, '2015-07-16'),
	(6, 6, '', '', 4, 100, 0.00, '2015-07-16'),
	(8, 5, '', '', 4, 100, 0.00, '2015-07-16'),
	(9, 6, '', '', 2, -60, 0.00, '2015-07-16'),
	(10, 5, '', '', 2, 58, 0.00, '2015-07-16'),
	(11, 6, '321', '12052015', 2, 200, 60.00, '2015-07-16'),
	(12, 6, '2424', '1234', 3, 110, 60.00, '2015-07-17'),
	(13, 11, '1234', '220315', 3, 131, 60.00, '2015-07-22'),
	(14, 9, '1234', '220315', 3, 173, 60.00, '2015-07-22'),
	(15, 13, '010203', '000', 2, 80, 75.00, '2015-08-18'),
	(16, 14, '01020304', '1718', 2, 80, 75.00, '2015-08-18'),
	(19, 1, 'alm0002', 'lot21', 2, 21, 0.00, '2015-08-19'),
	(20, 9, 'mucu131', 'mucu00025', 2, 20, 100.00, '2015-08-20');
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Signo distintivo de un producto';

-- Volcando datos para la tabla lamucuy.marca: 0 rows
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.movimiento
CREATE TABLE IF NOT EXISTS `movimiento` (
  `oidi` int(11) NOT NULL COMMENT 'Identificador Inventario',
  `cant` int(11) NOT NULL COMMENT 'Cantidad',
  `prec` decimal(10,0) NOT NULL COMMENT 'Precio Unitario',
  `fsal` date NOT NULL COMMENT 'Fecha Salida'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Desplazamiento, circulación';

-- Volcando datos para la tabla lamucuy.movimiento: 0 rows
/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.movimiento_existencia
CREATE TABLE IF NOT EXISTS `movimiento_existencia` (
  `oid` int(11) NOT NULL COMMENT 'Identificador en Almacen',
  `marc` varchar(16) NOT NULL COMMENT 'Marca',
  `prov` varchar(64) NOT NULL COMMENT 'Proveedores',
  `mode` varchar(255) NOT NULL COMMENT 'Modelo',
  `dscr` varchar(255) NOT NULL COMMENT 'Descripcion',
  `oidp` int(11) NOT NULL COMMENT 'Identificador del Producto',
  `seri` varchar(64) NOT NULL COMMENT 'Serial del Producto',
  `lote` varchar(16) NOT NULL COMMENT 'Lote del Producto',
  `cuni` decimal(10,2) NOT NULL COMMENT 'Costo por unidad',
  `cpro` decimal(10,2) NOT NULL COMMENT 'Costo de Produccion',
  `cdet` decimal(10,2) NOT NULL COMMENT 'Costo al Detal',
  `cmay` decimal(10,2) NOT NULL COMMENT 'Costo al Mayor',
  `unid` int(2) NOT NULL COMMENT 'Unidad de Medida Para la venta',
  `cant` int(11) NOT NULL COMMENT 'Cantidad de Elementos',
  `fact` varchar(32) NOT NULL COMMENT 'Factura',
  `esta` tinyint(1) NOT NULL COMMENT '0: Disponible 1: Comprometido 2: Vendido',
  `ubic` int(3) NOT NULL COMMENT 'Ubicación en Almacen',
  `fech` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de Modificacion',
  `visi` tinyint(1) NOT NULL COMMENT 'Estatus de visibilidad para sucursales 0: Contable 1: Pendiente',
  `clav` varchar(255) NOT NULL COMMENT 'Manejo de Claves',
  `oidusu` int(11) NOT NULL COMMENT 'oid de usuario',
  `tip` int(11) NOT NULL COMMENT 'Tipo de movimiento: 0=apertura , 1=cierre',
  `pedido` int(11) NOT NULL DEFAULT '0' COMMENT 'oid de pediod de venta asociado al cierre'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Mercancía activa e inactiva';

-- Volcando datos para la tabla lamucuy.movimiento_existencia: 0 rows
/*!40000 ALTER TABLE `movimiento_existencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento_existencia` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.orden
CREATE TABLE IF NOT EXISTS `orden` (
  `codi` int(16) NOT NULL COMMENT 'Código Unico',
  `nomb` varchar(256) NOT NULL COMMENT 'Nombre del Pedido',
  `tipo` int(2) NOT NULL COMMENT '0: Pedido, 1: Despacho, 2: Facturación',
  `fech` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha del Evento',
  PRIMARY KEY (`codi`,`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Control de Pedidos';

-- Volcando datos para la tabla lamucuy.orden: 24 rows
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` (`codi`, `nomb`, `tipo`, `fech`) VALUES
	(0, 'Carrito: Solicitud de Pedido', 0, '2014-03-05 22:15:07'),
	(0, 'Orden de Compra', 2, '2015-06-16 08:31:14'),
	(0, 'Orden de Despacho', 1, '2015-06-16 08:31:21'),
	(15, 'Carrito: Solicitud de Pedido', 0, '2015-07-27 00:00:00'),
	(14, 'Carrito: Solicitud de Pedido', 0, '2015-07-22 00:00:00'),
	(13, 'Carrito: Solicitud de Pedido', 0, '2015-07-16 00:00:00'),
	(12, 'Carrito: Solicitud de Pedido', 0, '2015-07-16 00:00:00'),
	(10, 'Carrito: Solicitud de Pedido', 0, '2015-07-16 00:00:00'),
	(11, 'Carrito: Solicitud de Pedido', 0, '2015-07-16 00:00:00'),
	(9, 'Carrito: Solicitud de Pedido', 0, '2015-07-16 00:00:00'),
	(7, 'Carrito: Solicitud de Pedido', 0, '2015-07-07 00:00:00'),
	(8, 'Carrito: Solicitud de Pedido', 0, '2015-07-16 00:00:00'),
	(4, 'Carrito: Solicitud de Pedido', 0, '2015-07-07 00:00:00'),
	(5, 'Carrito: Solicitud de Pedido', 0, '2015-07-07 00:00:00'),
	(6, 'Carrito: Solicitud de Pedido', 0, '2015-07-07 00:00:00'),
	(3, 'Carrito: Solicitud de Pedido', 0, '2015-07-07 00:00:00'),
	(1, 'Carrito: Solicitud de Pedido', 0, '2015-06-18 00:00:00'),
	(2, 'Carrito: Solicitud de Pedido', 0, '2015-07-07 00:00:00'),
	(16, 'Carrito: Solicitud de Pedido', 0, '2015-08-17 00:00:00'),
	(17, 'Carrito: Solicitud de Pedido', 0, '2015-08-18 00:00:00'),
	(1, 'Carrito: Solicitud de Pedido', 1, '2015-08-19 00:00:00'),
	(18, 'Carrito: Solicitud de Pedido', 0, '2015-08-19 00:00:00'),
	(19, 'Carrito: Solicitud de Pedido', 0, '2015-08-20 00:00:00'),
	(20, 'Carrito: Solicitud de Pedido', 0, '2015-08-20 00:00:00');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `oidu` int(11) NOT NULL COMMENT 'Identificador del Usuario',
  `oidp` int(11) NOT NULL COMMENT 'Identificador Producto',
  `seri` varchar(32) NOT NULL COMMENT 'Serial',
  `lote` varchar(32) NOT NULL COMMENT 'Lote',
  `ubic` int(3) NOT NULL COMMENT 'Ubicacion por Almacen',
  `cant` int(11) NOT NULL COMMENT 'Cantidad',
  `prec` decimal(10,2) NOT NULL COMMENT 'Precio',
  `orde` varchar(16) NOT NULL COMMENT 'Orden de Pedido',
  `esta` tinyint(1) NOT NULL COMMENT '0: Comprometido, 1: Vendido ',
  PRIMARY KEY (`oid`),
  KEY `oidu` (`oidu`),
  KEY `oidp` (`oidp`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Encargo, petición, demanda';

-- Volcando datos para la tabla lamucuy.pedido: 24 rows
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`oid`, `oidu`, `oidp`, `seri`, `lote`, `ubic`, `cant`, `prec`, `orde`, `esta`) VALUES
	(1, 2, 1, '001-001', '001', 1, 50, 65.00, '1', 1),
	(2, 2, 1, '0001-001', '0001', 2, 1, 104.00, '2', 0),
	(3, 2, 1, '0001-001', '0001', 2, 58, 104.00, '3', 0),
	(4, 2, 3, '002-001', '002', 2, 91, 104.00, '3', 0),
	(5, 2, 1, '0001-001', '0001', 2, 178, 104.00, '4', 0),
	(6, 2, 1, '0001-001', '0001', 2, 178, 104.00, '5', 0),
	(7, 4, 3, '00-001', '003', 3, 10, 117.00, '6', 1),
	(8, 4, 3, '00-001', '003', 3, 10, 117.00, '7', 1),
	(9, 2, 1, '0001-001', '0001', 2, 500, 104.00, '8', 0),
	(10, 2, 6, '', '', 2, 15, 0.00, '12', 1),
	(11, 2, 1, '0001-001', '0001', 2, 50, 104.00, '13', 1),
	(12, 2, 1, '0001-001', '0001', 2, 2, 104.00, '15', 0),
	(13, 2, 3, '002-001', '002', 2, 8, 104.00, '15', 0),
	(14, 2, 4, '0003-0001', '0003', 2, 7, 104.00, '15', 0),
	(15, 2, 5, '', '', 2, 42, 0.00, '15', 0),
	(16, 4, 3, '00-001', '003', 3, 10, 117.00, '16', 0),
	(17, 4, 6, '2424', '1234', 3, 30, 60.00, '16', 0),
	(18, 4, 9, '1234', '220315', 3, 40, 0.00, '16', 0),
	(19, 4, 1, '0001-001', '0001', 2, 13, 104.00, '17', 0),
	(20, 4, 6, '2424', '1234', 3, 60, 60.00, '17', 0),
	(21, 4, 9, '1234', '220315', 3, 30, 0.00, '17', 0),
	(22, 4, 11, '1234', '220315', 3, 31, 0.00, '17', 0),
	(23, 2, 4, '0003-0001', '0003', 2, 940, 104.00, '19', 0),
	(24, 2, 6, '', '', 2, 145, 0.00, '20', 0);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.perfil
CREATE TABLE IF NOT EXISTS `perfil` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `enmb` varchar(64) NOT NULL COMMENT 'MD5 Perfil',
  `obse` varchar(255) NOT NULL COMMENT 'Observaciones',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Perfiles de los clientes';

-- Volcando datos para la tabla lamucuy.perfil: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` (`oid`, `nomb`, `enmb`, `obse`) VALUES
	(1, 'Administrador', '2a2e9a58102784ca18e2605a4e727b5f', 'Administrador General'),
	(2, 'Normal', '960b44c579bc2f6818d2daaf9e4c16f0', 'Ventas Normal'),
	(3, 'Revendedores', '9f9278682707efc6b7345fa39df105dc', 'Ventas Al Mayor'),
	(6, 'Panel', 'f1e5d7a5fe13498abbdeb0f1f19136a8', 'Panel de Control');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `codi` varchar(16) NOT NULL COMMENT 'Código Producto',
  `nomb` varchar(128) NOT NULL COMMENT 'Nombre del Producto',
  `obse` varchar(255) NOT NULL COMMENT 'Observacion',
  `unid` int(2) NOT NULL COMMENT 'Tipo',
  `cpro` decimal(10,2) NOT NULL COMMENT 'Costo de Producción',
  `cate` tinyint(1) NOT NULL COMMENT 'Categoria',
  `meto` tinyint(1) NOT NULL COMMENT 'Metodo 0: PEPS, 1: UEPS',
  `maxi` int(11) NOT NULL COMMENT 'Máximo',
  `mini` int(11) NOT NULL COMMENT 'Mínimo',
  `imag` varchar(256) NOT NULL COMMENT 'Ruta de la Imagen',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `codi` (`codi`,`nomb`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='Artículo, manufactura, elaboración';

-- Volcando datos para la tabla lamucuy.producto: 12 rows
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`oid`, `codi`, `nomb`, `obse`, `unid`, `cpro`, `cate`, `meto`, `maxi`, `mini`, `imag`) VALUES
	(1, 'BOM-ALM', 'ALMENDRAS', 'BOMBONES DE ALMENDRAS', 4, 0.00, 1, 0, 81, 81, 'Almendra.jpg'),
	(4, 'BOM-003', 'MEREY', 'BOMBONES DE MEREY', 2, 0.00, 1, 0, 1000, 81, 'bombones.png'),
	(5, 'ohb8y1', 'PARCHITA NEGRO', '', 2, 0.00, 1, 0, 0, 0, 'DSC_0016.JPG'),
	(6, '001', 'JAZMIN', '', 2, 0.00, 1, 0, 100, 70, 'DSC_0232 copia.jpg'),
	(7, '01234', 'FRANGELICO', 'COBERTURA DE CHOCOLATE BLANCO', 2, 0.00, 1, 0, 40, 20, 'DSC_0121 copia.jpg'),
	(8, '012345', 'NUEZ', 'COBERTURA  DE CHOCOLATE  CON LECHE', 2, 0.00, 1, 0, 40, 20, 'bombon de nuez8.JPG'),
	(9, '12344', 'MUCUTELLA', 'COBERTURA DE CHOCOLATE CON LECHE', 2, 100.00, 1, 0, 84, 45, 'MUCUTELLA.jpg'),
	(10, '123455', 'COCO', 'COBERTURA DE CHOCOLATE CON LECHE', 2, 0.00, 1, 0, 40, 20, 'COCO.jpg'),
	(11, '1233', 'MORA ', 'COBERTURA DE CHOCOLATE NEGRO', 2, 0.00, 1, 0, 100, 50, 'MORA.jpg'),
	(13, 'Ln001', 'lingote de cambur', 'lingote de cambur', 2, 0.00, 2, 0, 200, 100, 'magenta.jpg'),
	(14, 'ln007', 'lingote de fresa', 'lingote de fresa', 2, 0.00, 2, 0, 200, 100, ''),
	(15, 'Lng003', 'Lingonte de Naranja', 'Lingote de Naranja', 2, 60.00, 2, 0, 200, 100, '');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `rif` varchar(16) NOT NULL COMMENT 'Registro de Información Fiscal',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `ubic` varchar(255) NOT NULL COMMENT 'Ubicación',
  `esta` tinyint(1) NOT NULL COMMENT 'Estatus',
  `fech` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha Entrega',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Presta servicios a otras entidades';

-- Volcando datos para la tabla lamucuy.proveedor: 0 rows
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.unidad
CREATE TABLE IF NOT EXISTS `unidad` (
  `oid` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(64) NOT NULL COMMENT 'Nombre Descriptivo',
  PRIMARY KEY (`oid`),
  KEY `nomb` (`nomb`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Unidad de Medida';

-- Volcando datos para la tabla lamucuy.unidad: 4 rows
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` (`oid`, `nomb`) VALUES
	(1, 'Unidad'),
	(2, 'Lote'),
	(3, 'Caja'),
	(4, 'Paquete');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `tipo` char(1) NOT NULL COMMENT 'tipo V: Venezolano, J: Juridico',
  `cedu` int(11) NOT NULL COMMENT 'Cedula o rif',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre del Cliente',
  `apel` varchar(255) NOT NULL COMMENT 'Apellido',
  `dire` varchar(255) NOT NULL COMMENT 'Direccion de Habitacion',
  `seud` varchar(255) NOT NULL COMMENT 'Seudo Nombre',
  `clav` varchar(255) NOT NULL COMMENT 'Clave MD5',
  `corr` varchar(255) NOT NULL COMMENT 'Correo',
  `celu` varchar(16) NOT NULL COMMENT 'Celular',
  `telf` varchar(16) NOT NULL COMMENT 'Teléfono',
  `empr` varchar(255) NOT NULL COMMENT 'Empresa',
  `pagi` varchar(255) NOT NULL COMMENT 'Pagina Web',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `cedu` (`cedu`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Control de usuarios';

-- Volcando datos para la tabla lamucuy.usuario: 5 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`oid`, `tipo`, `cedu`, `nomb`, `apel`, `dire`, `seud`, `clav`, `corr`, `celu`, `telf`, `empr`, `pagi`) VALUES
	(1, 'V', 1, 'Administrador De Inventario', 'General', 'Mérida', 'INVEN', '202cb962ac59075b964b07152d234b70', '', '', '', '', ''),
	(2, 'V', 2, 'Las Tapias', 'Mérida', 'Mérida', 'TAPIASM', '202cb962ac59075b964b07152d234b70', 'jud.prog@gmail.com', '04262742990', '02742215686', 'electron', 'ninguan'),
	(3, 'V', 3, 'Administrador Ventas', 'barrios', 'Mérida', 'ADMIN', '202cb962ac59075b964b07152d234b70', 'mjbr.poet@gmail.com', '04247570208', '02742218069', 'insumos', 'insumoslacandelara.com'),
	(4, '1', 4, 'PLAZA', 'MAYOR', 'Mérida, C.C, Plaza Mayor', 'PLAZA', '202cb962ac59075b964b07152d234b70', 'A@A.COM', '0', '0', '1', '0'),
	(5, 'V', 5, 'LAS TAPIAS TARDE', 'LAS TAPIAD TARDE', 'LAS TAPIAS', 'TAPIAST', '202cb962ac59075b964b07152d234b70', 'A@A.COM', '1', '1', '1', '1');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Volcando estructura para tabla lamucuy._usuarioperfil
CREATE TABLE IF NOT EXISTS `_usuarioperfil` (
  `oidu` int(11) NOT NULL COMMENT 'Identificador Usuario',
  `oidp` int(11) NOT NULL COMMENT 'Identificador Perfil',
  `oidub` int(3) NOT NULL COMMENT 'Ubicacion de Almacen',
  UNIQUE KEY `oidu` (`oidu`,`oidp`),
  KEY `oidu_2` (`oidu`),
  KEY `oidp` (`oidp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Relacion Usuario - Perfil';

-- Volcando datos para la tabla lamucuy._usuarioperfil: 4 rows
/*!40000 ALTER TABLE `_usuarioperfil` DISABLE KEYS */;
INSERT INTO `_usuarioperfil` (`oidu`, `oidp`, `oidub`) VALUES
	(2, 2, 2),
	(1, 1, 0),
	(3, 6, 1),
	(4, 2, 3);
/*!40000 ALTER TABLE `_usuarioperfil` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
