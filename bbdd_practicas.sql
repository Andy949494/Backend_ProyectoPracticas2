-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2022 a las 00:15:59
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd_practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE `boletin` (
  `id_boletin` int(10) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boletin`
--

INSERT INTO `boletin` (`id_boletin`, `correo`) VALUES
(1, 'juan_garcia@gmail.com'),
(2, 'andy.practicas2@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Alimentos'),
(2, 'Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalle` int(10) NOT NULL,
  `id_venta` int(10) DEFAULT NULL,
  `id_producto` int(10) DEFAULT NULL,
  `nombre_prod` varchar(50) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(10) NOT NULL,
  `id_venta` int(10) DEFAULT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `cod_postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `nombre`, `apellido`, `tel`, `correo`, `contrasena`, `rol`) VALUES
(1, 'Juan', 'Garcia', '3426325499', 'juan_garcia@gmail.com', 'juan_123', 'usuario'),
(2, 'Victoria', 'Torres', '3424551210', 'v.torres@yahoo.com.ar', 'victoria.torres1988', 'usuario'),
(3, 'Andrés', 'Orlando', '3426132574', 'andy.practicas2@gmail.com', 'andres_123', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `id_categoria` int(10) DEFAULT NULL,
  `id_proveedor` int(10) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `id_proveedor`, `nombre`, `marca`, `modelo`, `precio`, `imagen`, `codigo`) VALUES
(1, 1, 1, 'Aceitunas Toscana', 'La Toscana', 'verde', 180.00, '../imagenes/aceitunas.jpg', 'FQ55'),
(2, 1, 1, 'Aceite Natura 1lt', 'Natura', 'Girasol', 175.00, '../imagenes/aceite.jpg', 'QT67'),
(3, 2, 1, 'Agua Villavicencio 2.5lts', 'Villavicencio', 'Mineral', 120.00, '../imagenes/agua.jpg', 'FT99'),
(4, 2, 1, 'Cerveza Andes 470ml', 'Andes', 'Rubia', 125.00, '../imagenes/andes.jpg', 'RM41'),
(5, 1, 1, 'Atun La Campagnola', 'La Campagnola', 'Al natural', 250.00, '../imagenes/atun.jpg', 'HN66'),
(6, 2, 1, 'Coca-Cola 2.5lts', 'Coca Cola', 'Original', 300.00, '../imagenes/coca.jpg', 'LL40'),
(7, 2, 2, 'Champagne Baron B', 'Baron B', 'Extra Brut', 4300.00, '../imagenes/baron.jpg', 'LK18'),
(8, 1, 2, 'Cheddar Finlandia 200grs', 'Finlandia', 'Cheddar', 210.00, '../imagenes/cheddar.jpg', 'NH20'),
(9, 1, 2, 'Cafe Dolca 400grs', 'Dolca', 'Suave', 178.00, '../imagenes/dolca.jpg', 'BJ37'),
(10, 1, 2, 'Doritos 350grs', 'Doritos', 'Queso', 300.00, '../imagenes/doritos_queso.jpg', 'LX92'),
(11, 2, 2, 'Gatorade 500ml', 'Gatorade', 'Naranja', 192.00, '../imagenes/gatorade.jpg', 'BW02'),
(12, 1, 2, 'Harina 0000 Pureza', 'Pureza', '0000', 140.00, '../imagenes/harina.jpg', 'VS41'),
(13, 1, 3, 'Leche Milkaut 1lt', 'Milkaut', 'Entera', 94.00, '../imagenes/leche.jpg', 'JQ27'),
(14, 2, 3, 'Vino Malbec Luigi Bosca 1lt', 'Luigi Bosca', 'Malbec', 1448.00, '../imagenes/luigi.jpg', 'LD78'),
(15, 2, 3, 'Mirinda 2.5lts', 'Mirinda', 'Naranja', 155.00, '../imagenes/mirinda.jpg', 'BW15'),
(16, 1, 3, 'Oreo tripack', 'Oreo', 'Clasica', 310.00, '../imagenes/oreo.jpg', 'FZ10'),
(17, 2, 3, 'Cerveza Patagonia 470ml', 'Patagonia', 'Lagger', 240.00, '../imagenes/patagonia.jpg', 'DF57'),
(18, 2, 4, 'Pepsi 2.5lts', 'Pepsi', 'Original', 210.00, '../imagenes/pepsi.jpg', 'GW64'),
(19, 1, 4, 'Salsa de tomate Arcor 400grs', 'Arcor', 'Tomate', 60.00, '../imagenes/salsa.jpg', 'CZ97'),
(20, 2, 4, '7up 2.5lts', '7up', 'Lima-limon', 250.00, '../imagenes/seven.jpg', 'XW97'),
(21, 2, 4, 'Soda Ivess 1.5lts', 'Ivess', 'Gasificada', 150.00, '../imagenes/soda.jpg', 'HU06'),
(22, 1, 4, 'Tallarines Lucchetti 500grs', 'Lucchetti', 'Tallarines', 66.00, '../imagenes/tallarines.jpg', 'FS40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(10) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `cuit_cuil` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `razon_social`, `telefono`, `direccion`, `ciudad`, `cuit_cuil`, `email`) VALUES
(1, 'Almacén Distribuidor', 'Juan Garcia S.A', '011 4588-1352', 'Almafuerte 2568', 'Buenos Aires', '15-15689784-3', 'almacen_almafuerte25@gmail.com'),
(2, 'Multirubro Eduardo', 'Anchorena S.R.L', '011 4511-6577', 'Independencia 5622', 'Buenos Aires', '10-25684784-5', 'multirubro.eduardo@yahoo.com'),
(3, 'Todo Mercaderia', 'Maria Hernandez S.L', '342 4556898', 'Blas Parera 6058', 'Santa Fe', '18-20119710-6', 'mercaderiahernandez@outlook.com'),
(4, 'Lopez Abastecimiento', 'Mauricio Lopez SLL', '011 4604-3817', 'Av. del Libertador 4564', 'Buenos Aires', '20-29551702-2', 'abastecimiento_lopez_45@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD PRIMARY KEY (`id_boletin`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_categoria` (`id_categoria`,`id_proveedor`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletin`
--
ALTER TABLE `boletin`
  MODIFY `id_boletin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalle` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `login` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
