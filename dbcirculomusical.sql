-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2018 a las 02:16:05
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbcirculomusical`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `idArtista` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `biografia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precioContratacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`idArtista`, `nombre`, `genero`, `biografia`, `precioContratacion`) VALUES
(1, 'Ariana Grande', 'Pop', 'Ariana Grande es una joven actriz y cantautora norteamericana que saltarÃ­a a la fama a travÃ©s del musical de Broadway 13 y dos aÃ±os mÃ¡s tarde, en 2010, se convertirÃ­a en una referencia teen graci', 9999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentpub`
--

CREATE TABLE `comentpub` (
  `idComentPub` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentpub`
--

INSERT INTO `comentpub` (`idComentPub`, `nombre`, `email`, `telefono`, `mensaje`) VALUES
(1, 'Eddie Sanchez', 'eddcsanchez@gmail.com', '4446587980', 'Me encanta su pagina jajajaja.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallerenta`
--

CREATE TABLE `detallerenta` (
  `idDetalleRenta` int(11) NOT NULL,
  `idRenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `idDetalleVenta` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `idSolicitud` int(11) DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `locacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idArtista` int(11) NOT NULL,
  `numeroEntradas` int(11) NOT NULL,
  `precioEntrada` float NOT NULL,
  `precioTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `idSolicitud`, `nombre`, `fecha`, `locacion`, `idArtista`, `numeroEntradas`, `precioEntrada`, `precioTotal`) VALUES
(3, 4, 'Ariana Grande Tout', '2018-05-05', 'CD MX', 1, 1000, 100, 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_usuario`
--

CREATE TABLE `info_usuario` (
  `idInfoUsuario` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPat` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMat` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `info_usuario`
--

INSERT INTO `info_usuario` (`idInfoUsuario`, `nombre`, `apellidoPat`, `apellidoMat`, `direccion`, `fechaNac`, `telefono`, `email`) VALUES
(1, 'Eduardo', 'Corpus', 'Sanchez', 'Moras #429 Col. Valle Tecnologico', '1995-11-11', '4446587980', 'eddcsanchez@gmail.com'),
(2, 'Camila', 'Cabello', 'Estrabao', 'Miami #536 Col. Valle', '1996-11-11', '4448208798', 'camilacabello@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idProducto` int(11) NOT NULL,
  `cantidadExistencia` int(11) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idProducto`, `cantidadExistencia`, `fechaEntrada`, `horaEntrada`) VALUES
(1, 5, '2018-05-05', '22:51:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precioUnitario` float NOT NULL,
  `precioVenta` float NOT NULL,
  `precioRenta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `categoria`, `precioUnitario`, `precioVenta`, `precioRenta`) VALUES
(1, 'Celular', 'Celular Nuevo', 'Iluminacion', 23213.2, 1232.22, 231312),
(2, 'SCSAS', 'JKSADS', 'Estructuras', 13424, 413, 3242430);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renta`
--

CREATE TABLE `renta` (
  `idRenta` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cantDias` int(11) NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `renta`
--

INSERT INTO `renta` (`idRenta`, `idSolicitud`, `fecha`, `hora`, `cantDias`, `estado`, `total`) VALUES
(1, 3, '2018-05-05', '00:00:00', 4, 'Entregado', 0),
(2, 7, '2018-05-06', '01:31:34', 6, 'En Renta', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `asunto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `idUsuario`, `fecha`, `asunto`, `descripcion`, `estado`) VALUES
(1, 2, '2018-05-04', 'Venta', 'Quiero que me venda una maquina de humo.', 'Rechazado'),
(2, 2, '2018-05-05', 'Evento', 'hola', 'Cancelado'),
(3, 2, '2018-05-05', 'Renta', 'hola', 'Modificado'),
(4, 2, '2018-05-05', 'Evento', 'Ariana Grande Tout', 'Aprobado'),
(5, 2, '2018-05-06', 'Venta', 'qwrlnqwd', 'Aprobado'),
(6, 2, '2018-05-06', 'Evento', 'dfafafasf', 'En Espera'),
(7, 2, '2018-05-06', 'Renta', 'asfsafsa', 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipoUsuario` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `idInfoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `password`, `tipoUsuario`, `idInfoUsuario`) VALUES
(1, 'eddcschz', '81dc9bdb52d04dc20036dbd8313ed055', '1', 1),
(2, 'camilacabello', '81dc9bdb52d04dc20036dbd8313ed055', '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `idSolicitud`, `fecha`, `hora`, `total`) VALUES
(1, 5, '2018-05-06', '01:34:52', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`idArtista`),
  ADD UNIQUE KEY `UNIQUE_NArtista` (`nombre`);

--
-- Indices de la tabla `comentpub`
--
ALTER TABLE `comentpub`
  ADD PRIMARY KEY (`idComentPub`);

--
-- Indices de la tabla `detallerenta`
--
ALTER TABLE `detallerenta`
  ADD PRIMARY KEY (`idDetalleRenta`),
  ADD KEY `FK_IdRenta` (`idRenta`) USING BTREE,
  ADD KEY `FK_IdProducto` (`idProducto`) USING BTREE;

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `FK_IdVenta` (`idVenta`) USING BTREE,
  ADD KEY `FK_idProducto` (`idProducto`) USING BTREE;

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD UNIQUE KEY `UNIQUE-NomEvento` (`nombre`),
  ADD KEY `FK_IdArtista` (`idArtista`) USING BTREE,
  ADD KEY `FK_IdSolicitud` (`idSolicitud`);

--
-- Indices de la tabla `info_usuario`
--
ALTER TABLE `info_usuario`
  ADD PRIMARY KEY (`idInfoUsuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `UNIQUE_Telefono` (`telefono`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD KEY `FK_IdProducto` (`idProducto`) USING BTREE;

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `renta`
--
ALTER TABLE `renta`
  ADD PRIMARY KEY (`idRenta`),
  ADD KEY `FK_IdSolicitud` (`idSolicitud`) USING BTREE;

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `UNIQUE_Usuario` (`usuario`) USING BTREE,
  ADD KEY `FOREING_IdInfoUsuario` (`idInfoUsuario`) USING BTREE;

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `FK_IdSolicitud` (`idSolicitud`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `idArtista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentpub`
--
ALTER TABLE `comentpub`
  MODIFY `idComentPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallerenta`
--
ALTER TABLE `detallerenta`
  MODIFY `idDetalleRenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `info_usuario`
--
ALTER TABLE `info_usuario`
  MODIFY `idInfoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `renta`
--
ALTER TABLE `renta`
  MODIFY `idRenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallerenta`
--
ALTER TABLE `detallerenta`
  ADD CONSTRAINT `detallerenta_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallerenta_ibfk_2` FOREIGN KEY (`idRenta`) REFERENCES `renta` (`idRenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_IdArtista` FOREIGN KEY (`idArtista`) REFERENCES `artista` (`idArtista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IdSolicitud` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`idSolicitud`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `renta`
--
ALTER TABLE `renta`
  ADD CONSTRAINT `renta_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `FK_IdUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_idInfoUsuario` FOREIGN KEY (`idInfoUsuario`) REFERENCES `info_usuario` (`idInfoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
