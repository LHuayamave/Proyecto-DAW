-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2022 a las 02:15:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id_cotizacion`, `nombre`, `correo`, `telefono`, `direccion`, `descripcion`, `presupuesto`, `fecha_cotizacion`, `id_tipo`) VALUES
(1, 'alcachofa', 'jose@gmail.com', '323232', 'portete', 'quiero comprar', 9123, '2022-09-04', 2),
(2, 'jefferson', 'jefferson@gmail.com', '123445678', 'isla trinitaria', 'necesito consultas sobre unos respuestos originales', 321, '2022-09-06', 3),
(3, 'manolo', 'manoloea2@gmail.com', '31212', 'el batallon', 'necesito unos respuesto', 32, '2022-09-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_pago`
--

CREATE TABLE `medio_pago` (
  `id_medio_pago` int(11) NOT NULL,
  `nombre_medio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medio_pago`
--

INSERT INTO `medio_pago` (`id_medio_pago`, `nombre_medio`) VALUES
(1, 'Tarjeta de Credito'),
(2, 'Pago en Efectivo'),
(3, 'Transferencia Bancaria'),
(4, 'Tarjeta de Debito');

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
  `nombre_producto` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `stock_inicial` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `total` float NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion`, `stock_inicial`, `fecha_ingreso`, `total`, `id_tipo`, `id_proveedor`) VALUES
(1, 'Rueda', 'Ruedas de Repuesto', 8, '2022-09-06', 60, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `id_medio_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_proveedor`, `direccion`, `telefono`, `fecha_contrato`, `id_medio_pago`) VALUES
(1, 'Distribuidora de Repuestos Guayaquil', 'Velez 1706, Entre Los Rios y Esmeraldas\r\n', '2578017', '2022-09-02', 1),
(100, 'Chevrolet', 'La Alborada', '2576195', '2022-09-01', 4),
(101, 'Mercedes', 'Las Americas', '2578929', '2022-05-09', 3),
(102, 'Marca Anonima', 'Norte', '0987765267', '2022-07-01', 4),
(104, 'Ferrari', 'Av. Francisco de Orellana', '2554395', '2021-09-02', 3);

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

--
-- Volcado de datos para la tabla `solicitud_servicio`
--

INSERT INTO `solicitud_servicio` (`id_solicitud`, `nombre`, `correo`, `telefono`, `direccion`, `descripcion`, `fecha_solicitud`, `id_tipo`) VALUES
(1, 'Luis Huayamave', 'luis@gmail.com', '021345667', 'Valdivia', 'Solicitud para pintar coche', '2022-09-08', 1),
(2, 'Kenia Nieves', 'kenia@gmail.com', '0987523145', 'Esteros ', 'Mantenimiento anual al coche.', '2022-09-09', 3),
(3, 'Ariel Palacios', 'ariel@gmail.com', '0986532156', 'La Guangala', 'Mantenimiento anual del coche', '2022-09-09', 2);

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
  `tipo_producto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo`, `tipo_producto`) VALUES
(1, 'Pieza de Recambio'),
(2, 'Repuestos Originales'),
(3, 'Repuestos alternativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id_tipo` int(11) NOT NULL,
  `tipo_servicio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id_tipo`, `tipo_servicio`) VALUES
(1, 'Pintura'),
(2, 'Mantenimiento Preventivo'),
(3, 'Mecanica General'),
(4, 'Desabolladura');

--
-- Índices para tablas volcadas
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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
