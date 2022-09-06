-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2022 a las 05:45:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_daw`
--
DROP DATABASE IF EXISTS `proyecto_daw`;
CREATE DATABASE IF NOT EXISTS `proyecto_daw` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto_daw`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id_cotizacion` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `presupuesto` float NOT NULL,
  `fecha_cotizacion` date NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_pago`
--

CREATE TABLE `medio_pago` (
  `id_medio_pago` int(11) NOT NULL,
  `nombre_medio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problemas`
--

CREATE TABLE `problemas` (
  `id_problemas` int(11) NOT NULL,
  `nombre_problema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `stock_inicial` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `id_medio_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_servicio`
--

CREATE TABLE `solicitud_servicio` (
  `id_solicitud` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_tecnico`
--

CREATE TABLE `solicitud_tecnico` (
  `id_solicitud` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `id_problemas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- �?ndices para tablas volcadas
--

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  ADD PRIMARY KEY (`id_medio_pago`);

--
-- Indices de la tabla `problemas`
--
ALTER TABLE `problemas`
  ADD PRIMARY KEY (`id_problemas`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `id_medio_pago` (`id_medio_pago`);

--
-- Indices de la tabla `solicitud_servicio`
--
ALTER TABLE `solicitud_servicio`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `solicitud_tecnico`
--
ALTER TABLE `solicitud_tecnico`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_problemas` (`id_problemas`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_producto` (`id_tipo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_producto` (`id_tipo`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_medio_pago`) REFERENCES `medio_pago` (`id_medio_pago`);

--
-- Filtros para la tabla `solicitud_servicio`
--
ALTER TABLE `solicitud_servicio`
  ADD CONSTRAINT `solicitud_servicio_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_servicio` (`id_tipo`);

--
-- Filtros para la tabla `solicitud_tecnico`
--
ALTER TABLE `solicitud_tecnico`
  ADD CONSTRAINT `solicitud_tecnico_ibfk_2` FOREIGN KEY (`id_problemas`) REFERENCES `problemas` (`id_problemas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
