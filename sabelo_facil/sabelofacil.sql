-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2018 a las 21:05:47
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ID_admin` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `FK_ID_tipo_doc` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_admin`, `nombre`, `apellido`, `fecha_nac`, `correo`, `contraseña`, `imagen_url`, `direccion`, `documento`, `FK_ID_tipo_doc`, `estado`) VALUES
(1, 'Kevin', 'Henriquez', '1999-04-07', 'kevin@gmail.com', 'sabelo123', 'kevin.jpg', 'su casita', 1234567890, 2, 1),
(2, 'pablo', 'mejia', '1999-04-07', 'pablito@gmail.com', 'sabelo12345', 'kevin.jpg', 'su casita', 1234567890, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_gratis`
--

CREATE TABLE `archivo_gratis` (
  `ID_archivog` int(11) NOT NULL,
  `FK_ID_materia` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `url_archivo` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_premium`
--

CREATE TABLE `archivo_premium` (
  `ID_archivop` int(11) NOT NULL,
  `FK_ID_materia` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `url_archivo` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_login`
--

CREATE TABLE `bitacora_login` (
  `ID_bitacora` int(11) NOT NULL,
  `FK_ID_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID_carrito` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FK_ID_cliente` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_cliente` int(11) NOT NULL,
  `FK_ID_membresia` int(11) NOT NULL,
  `FK_ID_curso` int(11) NOT NULL,
  `FK_ID_tipo_doc` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `ID_curso` int(11) NOT NULL,
  `codigo_curso` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `ID_detalle` int(11) NOT NULL,
  `FK_ID_carrito` int(11) NOT NULL,
  `FK_ID_producto` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_comercio`
--

CREATE TABLE `estado_comercio` (
  `ID_estadoC` int(11) NOT NULL,
  `EstadoC` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

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
(3, 'sociales', 'moa', 0),
(9, 'Matematicas', 'ss', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

CREATE TABLE `membresia` (
  `ID_membresia` int(11) NOT NULL,
  `cod_membresia` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID_mensajes` int(11) NOT NULL,
  `FK_ID_emisor` int(11) NOT NULL,
  `FK_ID_receptor` int(11) NOT NULL,
  `FK_ID_tipo_envio` int(11) NOT NULL,
  `asunto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_mensaje_url` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `FK_ID_marca` int(11) NOT NULL,
  `FK_ID_Categoria` int(11) NOT NULL,
  `FK_ID_proveedor` int(11) NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `existencia` int(11) NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `ID_tipo_doc` int(11) NOT NULL,
  `nombre_tipo_doc` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`ID_tipo_doc`, `nombre_tipo_doc`) VALUES
(1, 'DUI'),
(2, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_envio`
--

CREATE TABLE `tipo_envio` (
  `ID_tipo_envio` int(11) NOT NULL,
  `nombre_tipo_envio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `FK_ID_tipo_usuario` int(11) NOT NULL,
  `FK_ID_tipo_doc` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `ID_valoracion` int(11) NOT NULL,
  `FK_ID_cliente` int(11) NOT NULL,
  `FK_ID_producto` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `comentario` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_admin`),
  ADD KEY `FK_ID_tipo_doc` (`FK_ID_tipo_doc`);

--
-- Indices de la tabla `archivo_gratis`
--
ALTER TABLE `archivo_gratis`
  ADD PRIMARY KEY (`ID_archivog`),
  ADD KEY `FK_ID_materia` (`FK_ID_materia`);

--
-- Indices de la tabla `archivo_premium`
--
ALTER TABLE `archivo_premium`
  ADD PRIMARY KEY (`ID_archivop`),
  ADD KEY `FK_ID_materia` (`FK_ID_materia`);

--
-- Indices de la tabla `bitacora_login`
--
ALTER TABLE `bitacora_login`
  ADD PRIMARY KEY (`ID_bitacora`),
  ADD KEY `FK_ID_usuario` (`FK_ID_usuario`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID_carrito`),
  ADD KEY `FK_ID_cliente` (`FK_ID_cliente`);

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
  ADD KEY `FK_ID_curso` (`FK_ID_curso`),
  ADD KEY `FK_ID_membresia` (`FK_ID_membresia`),
  ADD KEY `FK_ID_tipo_doc` (`FK_ID_tipo_doc`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`ID_comercio`),
  ADD KEY `FK_ID_estado_comercio` (`FK_ID_estado_comercio`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_curso`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`ID_detalle`),
  ADD KEY `FK_ID_carrito` (`FK_ID_carrito`),
  ADD KEY `FK_ID_producto` (`FK_ID_producto`);

--
-- Indices de la tabla `estado_comercio`
--
ALTER TABLE `estado_comercio`
  ADD PRIMARY KEY (`ID_estadoC`);

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
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`ID_mensajes`),
  ADD KEY `FK_ID_emisor` (`FK_ID_emisor`),
  ADD KEY `FK_ID_receptor` (`FK_ID_receptor`),
  ADD KEY `FK_ID_tipo_envio` (`FK_ID_tipo_envio`);

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
-- Indices de la tabla `tipo_envio`
--
ALTER TABLE `tipo_envio`
  ADD PRIMARY KEY (`ID_tipo_envio`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `FK_ID_tipo_doc` (`FK_ID_tipo_doc`),
  ADD KEY `FK_ID_tipo_usuario` (`FK_ID_tipo_usuario`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`ID_valoracion`),
  ADD KEY `FK_ID_cliente` (`FK_ID_cliente`),
  ADD KEY `FK_ID_producto` (`FK_ID_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `archivo_gratis`
--
ALTER TABLE `archivo_gratis`
  MODIFY `ID_archivog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivo_premium`
--
ALTER TABLE `archivo_premium`
  MODIFY `ID_archivop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora_login`
--
ALTER TABLE `bitacora_login`
  MODIFY `ID_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `ID_comercio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `ID_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_comercio`
--
ALTER TABLE `estado_comercio`
  MODIFY `ID_estadoC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `membresia`
--
ALTER TABLE `membresia`
  MODIFY `ID_membresia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `ID_mensajes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ID_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `ID_tipo_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_envio`
--
ALTER TABLE `tipo_envio`
  MODIFY `ID_tipo_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `ID_valoracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`FK_ID_tipo_doc`) REFERENCES `tipo_doc` (`ID_tipo_doc`);

--
-- Filtros para la tabla `archivo_gratis`
--
ALTER TABLE `archivo_gratis`
  ADD CONSTRAINT `archivo_gratis_ibfk_1` FOREIGN KEY (`FK_ID_materia`) REFERENCES `materia` (`ID_materia`);

--
-- Filtros para la tabla `archivo_premium`
--
ALTER TABLE `archivo_premium`
  ADD CONSTRAINT `archivo_premium_ibfk_1` FOREIGN KEY (`FK_ID_materia`) REFERENCES `materia` (`ID_materia`);

--
-- Filtros para la tabla `bitacora_login`
--
ALTER TABLE `bitacora_login`
  ADD CONSTRAINT `bitacora_login_ibfk_1` FOREIGN KEY (`FK_ID_usuario`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`FK_ID_cliente`) REFERENCES `cliente` (`ID_cliente`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`FK_ID_curso`) REFERENCES `curso` (`ID_curso`),
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
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`FK_ID_carrito`) REFERENCES `carrito` (`ID_carrito`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`FK_ID_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`FK_ID_emisor`) REFERENCES `cliente` (`ID_cliente`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`FK_ID_emisor`) REFERENCES `administrador` (`ID_admin`),
  ADD CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`FK_ID_emisor`) REFERENCES `usuario` (`ID_usuario`),
  ADD CONSTRAINT `mensajes_ibfk_4` FOREIGN KEY (`FK_ID_receptor`) REFERENCES `cliente` (`ID_cliente`),
  ADD CONSTRAINT `mensajes_ibfk_5` FOREIGN KEY (`FK_ID_receptor`) REFERENCES `administrador` (`ID_admin`),
  ADD CONSTRAINT `mensajes_ibfk_6` FOREIGN KEY (`FK_ID_receptor`) REFERENCES `usuario` (`ID_usuario`),
  ADD CONSTRAINT `mensajes_ibfk_7` FOREIGN KEY (`FK_ID_tipo_envio`) REFERENCES `tipo_envio` (`ID_tipo_envio`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`FK_ID_Categoria`) REFERENCES `categoria` (`ID_categoria`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`FK_ID_marca`) REFERENCES `marca` (`ID_marca`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`FK_ID_proveedor`) REFERENCES `proveedor` (`ID_proveedor`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`FK_ID_tipo_doc`) REFERENCES `tipo_doc` (`ID_tipo_doc`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`FK_ID_tipo_usuario`) REFERENCES `tipo_usuario` (`ID_tipo_usuario`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`FK_ID_cliente`) REFERENCES `cliente` (`ID_cliente`),
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`FK_ID_producto`) REFERENCES `producto` (`ID_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
