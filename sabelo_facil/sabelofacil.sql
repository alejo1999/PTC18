-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2018 a las 17:05:47
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sabelofacil`
--
CREATE DATABASE IF NOT EXISTS `sabelofacil` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sabelofacil`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `cambiar_estado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiar_estado` ()  NO SQL
UPDATE producto SET estado=0 WHERE precio<=0.0$$

DROP PROCEDURE IF EXISTS `mostar_clientes_con_menbresia`$$
CREATE DEFINER=`sabeloeasy`@`localhost` PROCEDURE `mostar_clientes_con_menbresia` ()  NO SQL
SELECT *
From cliente WHERE FK_ID_membresia != ""$$

DROP PROCEDURE IF EXISTS `new_Membresia`$$
CREATE DEFINER=`sabeloeasy`@`localhost` PROCEDURE `new_Membresia` ()  NO SQL
INSERT INTO membresia (ID_membresia,fecha_inicio,fecha_vencimiento) VALUES (NULL,CURRENT_DATE,(select DATE_ADD(CURRENT_DATE,INTERVAL 1 YEAR)))$$

DROP PROCEDURE IF EXISTS `ver_activos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ver_activos` (IN `estadop` INT(1))  NO SQL
SELECT * FROM administrador WHERE estado = (estadop)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `ID_admin` int(11) NOT NULL,
  `FK_ID_tipousuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FK_ID_tipo_doc` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_admin`, `FK_ID_tipousuario`, `nombre`, `apellido`, `fecha_nac`, `correo`, `contrasena`, `imagen_url`, `direccion`, `documento`, `username`, `FK_ID_tipo_doc`, `estado`) VALUES
(3, 1, 'alejandro Ernesto', 'Mejia Rodriguez', '1999-10-18', 'alejo@gmail.com', '$2y$10$jwjcY5bW77tWJ97yKvNN7OTOSUkNX6wKw695FQIKae704lNypCshG', 'no hay imagen', 'mi casa', 123456789, 'Alejo99', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora` (
  `ID_bitacora` int(11) NOT NULL,
  `FK_ID_admin` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `Accion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `nombre_categoria`, `imagen_url`, `Estado`) VALUES
(1, 'Instrumentos de Escritura', '', 1),
(2, 'Instrumentos de Escriturra', '', 1),
(3, 'Instrumentos de PrecisiÃ³n', '', 1),
(4, 'Instrumentos de Coloreo', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `ID_cliente` int(11) NOT NULL,
  `FK_ID_membresia` int(11) DEFAULT NULL,
  `FK_ID_tipo_doc` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_cliente`, `FK_ID_membresia`, `FK_ID_tipo_doc`, `nombre`, `apellido`, `genero`, `fecha_nacimiento`, `direccion`, `documento`, `correo`, `username`, `contrasena`, `imagen_url`, `estado`) VALUES
(1, 1, 1, 'Roberto', 'Moran', 0, '1999-05-03', 'su casita', 1245231254, 'willy@gmail.com', '', 'buenas tardes ', 'wiliito.jpg', 1),
(2, NULL, 1, 'Andres', 'Gomez', 0, '1999-05-03', 'su casita', 1245231254, 'anres@gmail.com', '', 'buenos dias ', 'wiliito.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

DROP TABLE IF EXISTS `comercio`;
CREATE TABLE `comercio` (
  `ID_comercio` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `responsable` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `FK_ID_estado_comercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`ID_comercio`, `nombre`, `Producto`, `correo`, `telefono`, `responsable`, `imagen_url`, `FK_ID_estado_comercio`) VALUES
(1, 'ZAPATOS CHULI', 'variedad de zapatos', 'chuli_ctact@gmail.com', 22301542, 'Raul bolaÃ±os', 'chuli_shoes.jpg', 1),
(2, 'Uniformes alvarado', 'variedad de uniformes', 'alvarado@gmail.com', 22301542, 'Raul Castro', 'alvarado.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

DROP TABLE IF EXISTS `cupones`;
CREATE TABLE `cupones` (
  `ID_cupon` int(11) NOT NULL,
  `FK_ID_comercio` int(11) NOT NULL,
  `FK_ID_categoria` int(11) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `limitado` tinyint(1) NOT NULL,
  `existencia` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE `detalle_factura` (
  `ID_detalle` int(11) NOT NULL,
  `FK_ID_venta` int(11) DEFAULT NULL,
  `FK_ID_producto` int(11) NOT NULL,
  `FK_ID_cliente` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` decimal(6,2) NOT NULL,
  `estadoventa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`ID_detalle`, `FK_ID_venta`, `FK_ID_producto`, `FK_ID_cliente`, `descuento`, `cantidad`, `sub_total`, `estadoventa`) VALUES
(1, NULL, 1, 2, 1, 2, '6.00', 0),
(2, 2, 1, 2, 2, 6, '50.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_comercio`
--

DROP TABLE IF EXISTS `estado_comercio`;
CREATE TABLE `estado_comercio` (
  `ID_estadoC` int(11) NOT NULL,
  `EstadoC` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_comercio`
--

INSERT INTO `estado_comercio` (`ID_estadoC`, `EstadoC`) VALUES
(1, 'Disponible'),
(2, 'Pendiente'),
(3, 'Rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_cupones`
--

DROP TABLE IF EXISTS `imagenes_cupones`;
CREATE TABLE `imagenes_cupones` (
  `ID_imgcupon` int(11) NOT NULL,
  `url_imagen` int(11) NOT NULL,
  `FK_ID_cupon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `ID_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_marca`, `nombre_marca`, `correo`, `telefono`, `direccion`, `imagen_url`, `estado`) VALUES
(1, 'Faber-Castell', 'marketing@faber-castell.com', 22710218, 'Paseo Gral. EscalÃ³n 4646, San Salvador', NULL, 1),
(2, 'Facela', 'info@facela.com', 22417100, 'Km. 11 Carretera al Puerto de La Libertad.\r\nAntiguo CuscatlÃ¡n, El Salvador, C.A.', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
  `ID_materia` int(11) NOT NULL,
  `nombre_materia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_materia`, `nombre_materia`, `descripcion`, `estado`) VALUES
(1, 'Matematicas', 'Calculos y procesos de resolucion de problemas', 1),
(10, 'Estudios Sociales ', 'Vista de cerca la realidad social en el paÃ­s', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

DROP TABLE IF EXISTS `membresia`;
CREATE TABLE `membresia` (
  `ID_membresia` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `membresia`
--

INSERT INTO `membresia` (`ID_membresia`, `fecha_inicio`, `fecha_vencimiento`, `estado`) VALUES
(1, '2018-05-17', '2019-05-17', 1),
(2, '2018-04-17', '2019-04-17', 1),
(3, '2018-03-17', '2019-03-17', 1),
(4, '2018-05-16', '2019-05-16', 1),
(5, '2018-05-16', '2019-05-16', 1),
(18, '2018-05-16', '2019-05-16', 1),
(19, '2018-05-16', '2019-05-16', 1),
(20, '2018-05-16', '2019-05-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `FK_ID_marca` int(11) NOT NULL,
  `FK_ID_Categoria` int(11) NOT NULL,
  `FK_ID_proveedor` int(11) NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_producto`, `FK_ID_marca`, `FK_ID_Categoria`, `FK_ID_proveedor`, `nombre_producto`, `precio`, `imagen_url`, `descripcion`, `estado`) VALUES
(1, 2, 4, 1, 'Colores ', '5.00', 'facela_colors.jpg', '12 unidades brillantes', 1),
(2, 1, 1, 1, 'Lapiz ', '3.00', 'lapiz.jpg', 'caja de 12 unidades ', 1),
(3, 1, 3, 1, 'Compas 12mm', '2.00', 'compas_faber.jpg', 'compas de presicion de 12mm', 1),
(5, 2, 1, 2, 'Plumas', '2.00', 'plumas.jpg', 'caja de 10 unidades ', 1),
(6, 1, 4, 1, 'Colores ', '2.00', 'colores.jpg', '12 unidades ', 1),
(7, 1, 4, 1, 'Colores ', '2.00', 'colores.jpg', '12 unidades', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `ID_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID_proveedor`, `nombre_proveedor`, `correo`, `telefono`, `direccion`, `estado`) VALUES
(1, 'ARANDA', 'aranda@gmail.com', 22325645, 'avenida aranda ', 1),
(2, 'LA LUZ', 'la_luz@gmail.com', 23154268, 'avenida la cruz #4457', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

DROP TABLE IF EXISTS `tipo_doc`;
CREATE TABLE `tipo_doc` (
  `ID_tipo_doc` int(11) NOT NULL,
  `nombre_tipo_doc` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`ID_tipo_doc`, `nombre_tipo_doc`) VALUES
(1, 'DUI'),
(2, 'NIT'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `ID_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID_tipo_usuario`, `nombre_tipo`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Maestro', 1),
(3, 'Secretario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

DROP TABLE IF EXISTS `valoracion`;
CREATE TABLE `valoracion` (
  `ID_valoracion` int(11) NOT NULL,
  `FK_ID_cliente` int(11) NOT NULL,
  `FK_ID_producto` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `comentario` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `ID_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FK_ID_cliente` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`ID_venta`, `fecha`, `FK_ID_cliente`, `estado`) VALUES
(1, '2018-05-14', 1, 1),
(2, '2018-05-18', 2, 1),
(3, '2018-05-18', 2, 1),
(4, '2018-05-18', 2, 1),
(5, '2018-05-18', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_admin`),
  ADD KEY `FK_ID_tipo_doc` (`FK_ID_tipo_doc`),
  ADD KEY `FK_ID_tipousuario` (`FK_ID_tipousuario`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`ID_bitacora`),
  ADD KEY `FK_ID_usuario` (`FK_ID_admin`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_cliente`),
  ADD KEY `FK_ID_membresia` (`FK_ID_membresia`),
  ADD KEY `FK_ID_tipo_doc` (`FK_ID_tipo_doc`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`ID_comercio`),
  ADD KEY `FK_ID_estado_comercio` (`FK_ID_estado_comercio`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`ID_cupon`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`ID_detalle`),
  ADD KEY `FK_ID_carrito` (`FK_ID_venta`),
  ADD KEY `FK_ID_producto` (`FK_ID_producto`),
  ADD KEY `FK_ID_cliente` (`FK_ID_cliente`);

--
-- Indices de la tabla `estado_comercio`
--
ALTER TABLE `estado_comercio`
  ADD PRIMARY KEY (`ID_estadoC`);

--
-- Indices de la tabla `imagenes_cupones`
--
ALTER TABLE `imagenes_cupones`
  ADD PRIMARY KEY (`ID_imgcupon`),
  ADD KEY `FK_ID_cupon` (`FK_ID_cupon`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_marca`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_materia`);

--
-- Indices de la tabla `membresia`
--
ALTER TABLE `membresia`
  ADD PRIMARY KEY (`ID_membresia`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`),
  ADD KEY `FK_ID_Categoria` (`FK_ID_Categoria`),
  ADD KEY `FK_ID_marca` (`FK_ID_marca`),
  ADD KEY `FK_ID_proveedor` (`FK_ID_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID_proveedor`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`ID_tipo_doc`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_tipo_usuario`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`ID_valoracion`),
  ADD KEY `FK_ID_cliente` (`FK_ID_cliente`),
  ADD KEY `FK_ID_producto` (`FK_ID_producto`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID_venta`),
  ADD KEY `FK_ID_cliente` (`FK_ID_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `ID_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `ID_comercio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `ID_cupon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `ID_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_comercio`
--
ALTER TABLE `estado_comercio`
  MODIFY `ID_estadoC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes_cupones`
--
ALTER TABLE `imagenes_cupones`
  MODIFY `ID_imgcupon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `membresia`
--
ALTER TABLE `membresia`
  MODIFY `ID_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ID_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `ID_tipo_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `ID_valoracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`FK_ID_admin`) REFERENCES `administrador` (`ID_admin`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`FK_ID_membresia`) REFERENCES `membresia` (`ID_membresia`),
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`FK_ID_tipo_doc`) REFERENCES `tipo_doc` (`ID_tipo_doc`);

--
-- Filtros para la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD CONSTRAINT `comercio_ibfk_1` FOREIGN KEY (`FK_ID_estado_comercio`) REFERENCES `estado_comercio` (`ID_estadoC`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`FK_ID_cliente`) REFERENCES `cliente` (`ID_cliente`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`FK_ID_producto`) REFERENCES `producto` (`ID_producto`),
  ADD CONSTRAINT `detalle_factura_ibfk_3` FOREIGN KEY (`FK_ID_venta`) REFERENCES `venta` (`ID_venta`);

--
-- Filtros para la tabla `imagenes_cupones`
--
ALTER TABLE `imagenes_cupones`
  ADD CONSTRAINT `imagenes_cupones_ibfk_1` FOREIGN KEY (`FK_ID_cupon`) REFERENCES `cupones` (`ID_cupon`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`FK_ID_Categoria`) REFERENCES `categoria` (`ID_categoria`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`FK_ID_marca`) REFERENCES `marca` (`ID_marca`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`FK_ID_proveedor`) REFERENCES `proveedor` (`ID_proveedor`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`FK_ID_cliente`) REFERENCES `cliente` (`ID_cliente`),
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`FK_ID_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`FK_ID_cliente`) REFERENCES `cliente` (`ID_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
