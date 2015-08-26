-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.37-0ubuntu0.13.10.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-08-26 09:56:15
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table lamucuy.almacen
DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre Oficina, Bodega, Sucursal',
  `ubic` varchar(255) NOT NULL COMMENT 'Ubicación',
  `obse` varchar(255) NOT NULL COMMENT 'Observaciones',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Ubicación del deposito';

-- Dumping data for table lamucuy.almacen: 4 rows
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` (`oid`, `nomb`, `ubic`, `obse`) VALUES
	(1, 'Principal', 'Merida', 'Merida'),
	(2, 'Las Tapias', 'Las Tapias', 'Las Tapias'),
	(3, 'Plaza Mayor', 'Merida', 'Merida'),
	(4, 'MUKUMBARI', 'LAS HEROINAS', 'LAS HEROINAS');
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;


-- Dumping structure for table lamucuy.categoria
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `oid` tinyint(1) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `imag` varchar(256) NOT NULL COMMENT 'Imagen',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COMMENT='Catégoria de Productos';

-- Dumping data for table lamucuy.categoria: 12 rows
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`oid`, `nomb`, `imag`) VALUES
	(1, 'Bombones', 'Bombones.png'),
	(2, 'Lingotes', 'lingotes.png'),
	(3, 'Lingotes Sin Azucar', 'lingotes_sin_azucar.png'),
	(7, 'ALFAJORES', 'IMG-20150619-WA0002.jpg'),
	(12, 'CAJAS DE MADERA', 'caja de madera tipo II 12 bomobones7.JPG'),
	(9, 'CHUPETAS', 'P7173180.JPG'),
	(11, 'FORMAS Y FIGURAS', 'P7173194.JPG'),
	(14, 'caja de acetato', 'cajas_cestas.png'),
	(15, 'barras valle del canoabo', 'brownies.png'),
	(16, ' chocolate franceschi', 'barras_exoticas.png'),
	(17, 'mantecas de cacao', 'brownies.png'),
	(18, 'barras exoticas', 'barras_exoticas.png');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Dumping structure for table lamucuy.deposito
DROP TABLE IF EXISTS `deposito`;
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

-- Dumping data for table lamucuy.deposito: ~0 rows (approximately)
/*!40000 ALTER TABLE `deposito` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposito` ENABLE KEYS */;


-- Dumping structure for table lamucuy.detalle_lote
DROP TABLE IF EXISTS `detalle_lote`;
CREATE TABLE IF NOT EXISTS `detalle_lote` (
  `oid` varchar(16) NOT NULL COMMENT 'Indentificador Lote',
  `obsr` varchar(64) NOT NULL COMMENT 'Observaciones Generales',
  `cant` int(11) NOT NULL COMMENT 'Cantidad Disponible',
  `fent` date NOT NULL COMMENT 'Fecha de Entradas',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Parte, ración, cuota, porción';

-- Dumping data for table lamucuy.detalle_lote: 8 rows
/*!40000 ALTER TABLE `detalle_lote` DISABLE KEYS */;
INSERT INTO `detalle_lote` (`oid`, `obsr`, `cant`, `fent`) VALUES
	('sadf', '\n            asdf', 81, '2015-08-21'),
	('asdf', 'sadf', 81, '0000-00-00'),
	('150116', '\n            ', 10, '0000-00-00'),
	('0102', '', 40, '0000-00-00'),
	('210815', '\n            ', 130, '2015-08-21'),
	('010203', '', 60, '0000-00-00'),
	('', '', 0, '0000-00-00'),
	('218815', '\n            ', 50, '2015-08-21');
/*!40000 ALTER TABLE `detalle_lote` ENABLE KEYS */;


-- Dumping structure for table lamucuy.existencia
DROP TABLE IF EXISTS `existencia`;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Mercancía activa e inactiva';

-- Dumping data for table lamucuy.existencia: 6 rows
/*!40000 ALTER TABLE `existencia` DISABLE KEYS */;
INSERT INTO `existencia` (`oid`, `marc`, `prov`, `mode`, `dscr`, `oidp`, `seri`, `lote`, `cuni`, `cpro`, `cdet`, `cmay`, `unid`, `cant`, `fact`, `esta`, `ubic`, `fech`, `visi`) VALUES
	(1, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ocumare 70%', 17, '0102', '150116', 0.00, 830.00, 830.00, 830.00, 2, 5, '0', 1, 4, '2015-08-21 10:19:47', 0),
	(2, '', '', '', 'ALMENDRAS', 1, '0102', '0102', 0.00, 60.00, 60.00, 60.00, 2, 40, '', 1, 2, '2015-08-21 10:41:42', 1),
	(3, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'PARCHITA NEGRO', 5, '010203', '210815', 0.00, 60.00, 60.00, 60.00, 2, 90, '0', 1, 2, '2015-08-21 10:41:42', 1),
	(4, '', '', '', 'MUCUTELLA', 9, '010203', '010203', 0.00, 60.00, 60.00, 60.00, 2, 10, '', 1, 3, '2015-08-21 10:41:42', 0),
	(6, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'PARCHITA NEGRO', 5, '0103', '218815', 0.00, 60.00, 60.00, 60.00, 2, 20, '0', 1, 3, '2015-08-21 10:41:42', 0),
	(7, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ALMENDRAS', 1, '1234', '210815', 0.00, 60.00, 60.00, 60.00, 2, 30, '0', 1, 3, '2015-08-21 10:41:42', 0);
/*!40000 ALTER TABLE `existencia` ENABLE KEYS */;


-- Dumping structure for table lamucuy.galeria
DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oidp` int(10) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`oid`),
  KEY `oip` (`oidp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table lamucuy.galeria: ~0 rows (approximately)
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;


-- Dumping structure for table lamucuy.historial_cierre
DROP TABLE IF EXISTS `historial_cierre`;
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

-- Dumping data for table lamucuy.historial_cierre: 3 rows
/*!40000 ALTER TABLE `historial_cierre` DISABLE KEYS */;
INSERT INTO `historial_cierre` (`oid`, `mont`, `debi`, `cred`, `fech`, `usua`, `esta`, `clav`) VALUES
	(1, 2100.00, 2000.00, 0.00, '2015-08-21 10:04:42', 4, 0, ''),
	(2, 4150.00, 2000.00, 2150.00, '2015-08-21 10:19:47', 7, 0, ''),
	(3, 3300.00, 3000.00, 2000.00, '2015-08-21 10:41:42', 4, 0, '');
/*!40000 ALTER TABLE `historial_cierre` ENABLE KEYS */;


-- Dumping structure for table lamucuy.inventario
DROP TABLE IF EXISTS `inventario`;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Registro, balance, descripción, lista, relación';

-- Dumping data for table lamucuy.inventario: 6 rows
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`oid`, `oidp`, `seri`, `lote`, `ubic`, `disp`, `prec`, `fent`) VALUES
	(1, 17, '0102', '150116', 4, 15, 830.00, '2015-08-21'),
	(2, 1, '0102', '0102', 2, 80, 60.00, '2015-08-21'),
	(3, 5, '010203', '210815', 2, 180, 60.00, '2015-08-21'),
	(4, 9, '010203', '010203', 3, 70, 60.00, '2015-08-21'),
	(6, 5, '0103', '218815', 3, 70, 60.00, '2015-08-21'),
	(7, 1, '1234', '210815', 3, 70, 60.00, '2015-08-21');
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;


-- Dumping structure for table lamucuy.marca
DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Signo distintivo de un producto';

-- Dumping data for table lamucuy.marca: 0 rows
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


-- Dumping structure for table lamucuy.movimiento
DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE IF NOT EXISTS `movimiento` (
  `oidi` int(11) NOT NULL COMMENT 'Identificador Inventario',
  `cant` int(11) NOT NULL COMMENT 'Cantidad',
  `prec` decimal(10,0) NOT NULL COMMENT 'Precio Unitario',
  `fsal` date NOT NULL COMMENT 'Fecha Salida'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Desplazamiento, circulación';

-- Dumping data for table lamucuy.movimiento: 0 rows
/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;


-- Dumping structure for table lamucuy.movimiento_existencia
DROP TABLE IF EXISTS `movimiento_existencia`;
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

-- Dumping data for table lamucuy.movimiento_existencia: 16 rows
/*!40000 ALTER TABLE `movimiento_existencia` DISABLE KEYS */;
INSERT INTO `movimiento_existencia` (`oid`, `marc`, `prov`, `mode`, `dscr`, `oidp`, `seri`, `lote`, `cuni`, `cpro`, `cdet`, `cmay`, `unid`, `cant`, `fact`, `esta`, `ubic`, `fech`, `visi`, `clav`, `oidusu`, `tip`, `pedido`) VALUES
	(4, '', '', '', 'MUCUTELLA', 9, '010203', '010203', 0.00, 60.00, 60.00, 60.00, 2, 60, '', 0, 3, '2015-08-21 10:03:20', 0, '', 4, 0, 0),
	(4, '', '', '', 'MUCUTELLA', 9, '010203', '010203', 0.00, 60.00, 60.00, 60.00, 2, 25, '', 1, 3, '2015-08-21 10:04:42', 0, '', 4, 1, 1),
	(1, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ocumare 70%', 17, '0102', '150116', 0.00, 830.00, 830.00, 830.00, 2, 10, '0', 0, 4, '2015-08-21 10:07:06', 0, '', 7, 0, 0),
	(1, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ocumare 70%', 17, '0102', '150116', 0.00, 830.00, 830.00, 830.00, 2, 5, '0', 1, 4, '2015-08-21 10:19:47', 0, '', 7, 1, 2),
	(4, '', '', '', 'MUCUTELLA', 9, '010203', '010203', 0.00, 60.00, 60.00, 60.00, 2, 25, '', 1, 3, '2015-08-21 10:39:39', 0, '', 4, 0, 0),
	(6, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'PARCHITA NEGRO', 5, '0103', '218815', 0.00, 60.00, 60.00, 60.00, 2, 50, '0', 0, 3, '2015-08-21 10:39:39', 0, '', 4, 0, 0),
	(7, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ALMENDRAS', 1, '1234', '210815', 0.00, 60.00, 60.00, 60.00, 2, 40, '0', 0, 3, '2015-08-21 10:39:39', 0, '', 4, 0, 0),
	(4, '', '', '', 'MUCUTELLA', 9, '010203', '010203', 0.00, 60.00, 60.00, 60.00, 2, 25, '', 1, 3, '2015-08-21 10:39:44', 0, '', 4, 0, 0),
	(6, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'PARCHITA NEGRO', 5, '0103', '218815', 0.00, 60.00, 60.00, 60.00, 2, 50, '0', 0, 3, '2015-08-21 10:39:44', 0, '', 4, 0, 0),
	(7, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ALMENDRAS', 1, '1234', '210815', 0.00, 60.00, 60.00, 60.00, 2, 40, '0', 0, 3, '2015-08-21 10:39:44', 0, '', 4, 0, 0),
	(4, '', '', '', 'MUCUTELLA', 9, '010203', '010203', 0.00, 60.00, 60.00, 60.00, 2, 10, '', 1, 3, '2015-08-21 10:41:42', 0, '', 4, 1, 3),
	(6, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'PARCHITA NEGRO', 5, '0103', '218815', 0.00, 60.00, 60.00, 60.00, 2, 20, '0', 1, 3, '2015-08-21 10:41:42', 0, '', 4, 1, 3),
	(7, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ALMENDRAS', 1, '1234', '210815', 0.00, 60.00, 60.00, 60.00, 2, 30, '0', 1, 3, '2015-08-21 10:41:42', 0, '', 4, 1, 3),
	(4, '', '', '', 'MUCUTELLA', 9, '010203', '010203', 0.00, 60.00, 60.00, 60.00, 2, 10, '', 1, 3, '2015-08-21 11:02:14', 0, '', 6, 0, 0),
	(6, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'PARCHITA NEGRO', 5, '0103', '218815', 0.00, 60.00, 60.00, 60.00, 2, 20, '0', 1, 3, '2015-08-21 11:02:14', 0, '', 6, 0, 0),
	(7, 'CHOCOLATES', 'CHOCOLATES LA MUCUY', 'CHOCOLATES', 'ALMENDRAS', 1, '1234', '210815', 0.00, 60.00, 60.00, 60.00, 2, 30, '0', 1, 3, '2015-08-21 11:02:14', 0, '', 6, 0, 0);
/*!40000 ALTER TABLE `movimiento_existencia` ENABLE KEYS */;


-- Dumping structure for table lamucuy.orden
DROP TABLE IF EXISTS `orden`;
CREATE TABLE IF NOT EXISTS `orden` (
  `codi` int(16) NOT NULL COMMENT 'Código Unico',
  `nomb` varchar(256) NOT NULL COMMENT 'Nombre del Pedido',
  `tipo` int(2) NOT NULL COMMENT '0: Pedido, 1: Despacho, 2: Facturación',
  `fech` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha del Evento',
  PRIMARY KEY (`codi`,`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Control de Pedidos';

-- Dumping data for table lamucuy.orden: 6 rows
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` (`codi`, `nomb`, `tipo`, `fech`) VALUES
	(0, 'Carrito: Solicitud de Pedido', 0, '2014-03-05 22:15:07'),
	(0, 'Orden de Compra', 2, '2015-06-16 08:31:14'),
	(0, 'Orden de Despacho', 1, '2015-06-16 08:31:21'),
	(2, 'Carrito: Solicitud de Pedido', 0, '2015-08-21 00:00:00'),
	(1, 'Carrito: Solicitud de Pedido', 0, '2015-08-21 00:00:00'),
	(3, 'Carrito: Solicitud de Pedido', 0, '2015-08-21 00:00:00');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;


-- Dumping structure for table lamucuy.pedido
DROP TABLE IF EXISTS `pedido`;
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Encargo, petición, demanda';

-- Dumping data for table lamucuy.pedido: 5 rows
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`oid`, `oidu`, `oidp`, `seri`, `lote`, `ubic`, `cant`, `prec`, `orde`, `esta`) VALUES
	(1, 4, 9, '010203', '010203', 3, 35, 60.00, '1', 0),
	(2, 7, 17, '0102', '150116', 4, 5, 830.00, '2', 0),
	(3, 4, 1, '1234', '210815', 3, 10, 60.00, '3', 0),
	(4, 4, 5, '0103', '218815', 3, 30, 60.00, '3', 0),
	(5, 4, 9, '010203', '010203', 3, 15, 60.00, '3', 0);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


-- Dumping structure for table lamucuy.perfil
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `enmb` varchar(64) NOT NULL COMMENT 'MD5 Perfil',
  `obse` varchar(255) NOT NULL COMMENT 'Observaciones',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Perfiles de los clientes';

-- Dumping data for table lamucuy.perfil: ~4 rows (approximately)
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` (`oid`, `nomb`, `enmb`, `obse`) VALUES
	(1, 'Administrador', '2a2e9a58102784ca18e2605a4e727b5f', 'Administrador General'),
	(2, 'Normal', '960b44c579bc2f6818d2daaf9e4c16f0', 'Ventas Normal'),
	(3, 'Revendedores', '9f9278682707efc6b7345fa39df105dc', 'Ventas Al Mayor'),
	(6, 'Panel', 'f1e5d7a5fe13498abbdeb0f1f19136a8', 'Panel de Control');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;


-- Dumping structure for table lamucuy.producto
DROP TABLE IF EXISTS `producto`;
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='Artículo, manufactura, elaboración';

-- Dumping data for table lamucuy.producto: 14 rows
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`oid`, `codi`, `nomb`, `obse`, `unid`, `cpro`, `cate`, `meto`, `maxi`, `mini`, `imag`) VALUES
	(1, 'BOM-ALM', 'ALMENDRAS', 'BOMBONES DE ALMENDRAS', 2, 60.00, 1, 0, 81, 81, 'Almendra.jpg'),
	(4, 'BOM-003', 'MEREY', 'BOMBONES DE MEREY', 2, 60.00, 1, 0, 1000, 81, 'bombones.png'),
	(5, 'ohb8y1', 'PARCHITA NEGRO', 'PARCHITA NEGRO', 2, 60.00, 1, 0, 0, 0, 'DSC_0016.JPG'),
	(6, '001', 'JAZMIN', 'JAZMIN', 2, 60.00, 1, 0, 100, 70, 'DSC_0232 copia.jpg'),
	(7, '01234', 'FRANGELICO', 'COBERTURA DE CHOCOLATE BLANCO', 2, 60.00, 1, 0, 40, 20, 'DSC_0121 copia.jpg'),
	(8, '012345', 'NUEZ', 'COBERTURA  DE CHOCOLATE  CON LECHE', 2, 60.00, 1, 0, 40, 20, 'bombon de nuez8.JPG'),
	(9, '12344', 'MUCUTELLA', 'COBERTURA DE CHOCOLATE CON LECHE', 2, 60.00, 1, 0, 84, 45, 'MUCUTELLA.jpg'),
	(10, '123455', 'COCO', 'COBERTURA DE CHOCOLATE CON LECHE', 2, 60.00, 1, 0, 40, 20, 'COCO.jpg'),
	(11, '1233', 'MORA ', 'COBERTURA DE CHOCOLATE NEGRO', 2, 60.00, 1, 0, 100, 50, 'MORA.jpg'),
	(13, 'Ln001', 'lingote de cambur', 'lingote de cambur', 2, 75.00, 2, 0, 200, 100, 'magenta.jpg'),
	(14, 'ln007', 'lingote de negro + naranja', 'lingote de negro + naranja', 2, 75.00, 2, 0, 200, 100, ''),
	(15, 'Lng003', 'Lingonte de Naranja', 'Lingote de Naranja', 2, 75.00, 2, 0, 200, 100, ''),
	(16, '00001', 'cereza', 'cobertura de chocolate negro', 2, 60.00, 1, 0, 90, 60, 'alfajor_corazon_solo.png'),
	(17, '010203', 'ocumare 70', 'chocolate oscuro', 2, 830.00, 16, 0, 10, 5, 'brownies.png');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


-- Dumping structure for table lamucuy.proveedor
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `rif` varchar(16) NOT NULL COMMENT 'Registro de Información Fiscal',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `ubic` varchar(255) NOT NULL COMMENT 'Ubicación',
  `esta` tinyint(1) NOT NULL COMMENT 'Estatus',
  `fech` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha Entrega',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Presta servicios a otras entidades';

-- Dumping data for table lamucuy.proveedor: 0 rows
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


-- Dumping structure for table lamucuy.unidad
DROP TABLE IF EXISTS `unidad`;
CREATE TABLE IF NOT EXISTS `unidad` (
  `oid` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(64) NOT NULL COMMENT 'Nombre Descriptivo',
  PRIMARY KEY (`oid`),
  KEY `nomb` (`nomb`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Unidad de Medida';

-- Dumping data for table lamucuy.unidad: 4 rows
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` (`oid`, `nomb`) VALUES
	(1, 'Unidad'),
	(2, 'Lote'),
	(3, 'Caja'),
	(4, 'Paquete');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;


-- Dumping structure for table lamucuy.usuario
DROP TABLE IF EXISTS `usuario`;
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Control de usuarios';

-- Dumping data for table lamucuy.usuario: 8 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`oid`, `tipo`, `cedu`, `nomb`, `apel`, `dire`, `seud`, `clav`, `corr`, `celu`, `telf`, `empr`, `pagi`) VALUES
	(1, 'V', 1, 'fabrica', 'General', 'Mérida', 'fabrica', '202cb962ac59075b964b07152d234b70', '', '', '', '', ''),
	(2, 'V', 2, 'Las Tapias', 'Mérida', 'Mérida', 'TAPIAS1', '202cb962ac59075b964b07152d234b70', 'jud.prog@gmail.com', '04262742990', '02742215686', 'electron', 'ninguan'),
	(3, 'V', 3, 'Administrador Ventas', 'barrios', 'Mérida', 'ADMIN', '202cb962ac59075b964b07152d234b70', 'mjbr.poet@gmail.com', '04247570208', '02742218069', 'insumos', 'insumoslacandelara.com'),
	(4, 'V', 4, 'PLAZA', 'MAYOR', 'Mérida, C.C, Plaza Mayor', 'PLAZA1', '202cb962ac59075b964b07152d234b70', 'A@A.COM', '0', '0', '1', '0'),
	(5, 'V', 5, 'LAS TAPIAS TARDE', 'LAS TAPIAD TARDE', 'LAS TAPIAS', 'TAPIAS2', '202cb962ac59075b964b07152d234b70', 'A@A.COM', '1', '1', '1', '1'),
	(6, 'V', 6, 'Plaza Mayor tarde', 'Mayor', 'CC plaza mayor', 'plaza2', '202cb962ac59075b964b07152d234b70', 'a@a.com', '2', '', '', ''),
	(7, 'V', 7, 'Mukumbari Teleferico ', 'Teleferico', 'Las Heroinas', 'teleferico1', '202cb962ac59075b964b07152d234b70', '', '', '', '', ''),
	(8, 'V', 8, 'Mukumbari Teleferico Tarde', 'Teleferico', 'Las Heroinas', 'teleferico2', '202cb962ac59075b964b07152d234b70', '', '', '', '', '');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Dumping structure for table lamucuy._usuarioperfil
DROP TABLE IF EXISTS `_usuarioperfil`;
CREATE TABLE IF NOT EXISTS `_usuarioperfil` (
  `oidu` int(11) NOT NULL COMMENT 'Identificador Usuario',
  `oidp` int(11) NOT NULL COMMENT 'Identificador Perfil',
  `oidub` int(3) NOT NULL COMMENT 'Ubicacion de Almacen',
  UNIQUE KEY `oidu` (`oidu`,`oidp`),
  KEY `oidu_2` (`oidu`),
  KEY `oidp` (`oidp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Relacion Usuario - Perfil';

-- Dumping data for table lamucuy._usuarioperfil: 8 rows
/*!40000 ALTER TABLE `_usuarioperfil` DISABLE KEYS */;
INSERT INTO `_usuarioperfil` (`oidu`, `oidp`, `oidub`) VALUES
	(2, 2, 2),
	(1, 1, 0),
	(3, 6, 1),
	(4, 2, 3),
	(5, 2, 2),
	(6, 2, 3),
	(7, 2, 4),
	(8, 2, 4);
/*!40000 ALTER TABLE `_usuarioperfil` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
