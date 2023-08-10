-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 19:04:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `incidencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tarea`
--

CREATE TABLE `detalle_tarea` (
  `ideta` int(11) NOT NULL,
  `idtarea` int(11) NOT NULL,
  `idmen` int(11) NOT NULL,
  `respueta` text COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_tarea`
--

INSERT INTO `detalle_tarea` (`ideta`, `idtarea`, `idmen`, `respueta`, `fere`) VALUES
(1, 1, 1, 'Se atendio y se corrigió correctamente la ticketadora ya funciona con una tinta al 100', '2022-11-23 02:59:58'),
(2, 2, 1, 'El problema se soluciono la impresora ya funciona en su estado normal', '2022-11-23 03:16:21'),
(3, 3, 3, 'Se soliciono el caso de la impresora ink tank 312, su funcionamiento esta correcto.', '2022-11-23 16:54:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `idmen` int(11) NOT NULL,
  `nomenb` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `apmenb` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `celu` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `state` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`idmen`, `nomenb`, `apmenb`, `sexo`, `celu`, `username`, `correo`, `contra`, `rol`, `state`, `fere`) VALUES
(1, 'Maria Manuela', 'Robles Palma', '2', '976757675', 'mmapal01342', 'mmpal01@gmail.com', '96e79218965eb72c92a549dd5a330112', '2', '1', '2022-11-22 01:57:00'),
(3, 'Manuel Javier', 'Jaramillo Manrique', '1', '978686756', 'jamanri01', 'jamanri01@gmail.com', '96e79218965eb72c92a549dd5a330112', '2', '1', '2022-11-22 01:40:24'),
(4, 'Dylan Alvaro', 'Jaramillo Manrique', '1', '975675675', 'ddylan01', 'ddylan01@gmail.com', '96e79218965eb72c92a549dd5a330112', '2', '1', '2022-11-22 20:15:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `idtarea` int(11) NOT NULL,
  `nomcl` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apecl` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `nomcas` text COLLATE utf8_unicode_ci NOT NULL,
  `sitio` text COLLATE utf8_unicode_ci NOT NULL,
  `state` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `dia` date NOT NULL,
  `celu` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idtarea`, `nomcl`, `apecl`, `nomcas`, `sitio`, `state`, `dia`, `celu`, `fere`) VALUES
(1, 'Manuel Lejia Flores', 'Juarez Cardoza', 'Mi ticketora no funciona', 'Los olivos j6 l0', '1', '2022-11-22', '998765453', '2022-11-23 02:59:58'),
(2, 'Javier Lucas', 'Lopez Mendoza', 'Mi impresora no prende esta fallando', 'Miraflores, av 87n', '1', '2022-11-22', '999867564', '2022-11-23 03:16:21'),
(3, 'Karla Ximena', 'Romero Lopez', 'mi impresora ink tank 312 no funciona', 'Miraflores lo922', '1', '2022-11-22', '997656543', '2022-11-23 16:54:29'),
(4, 'José Antonio', 'Urbina Perez', 'Problemas de conexión', 'Jr 28 De Julio 148', '0', '2022-11-23', '998676656', '2022-11-23 18:00:02'),
(5, 'Francisco Javier', 'Arevalo Ortis', 'Hardware dañado', 'Jr.Callao 122 1er.Piso Cercado', '0', '2022-11-23', '99656433', '2022-11-23 18:02:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `state` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nombre`, `correo`, `contra`, `rol`, `state`, `fere`) VALUES
(1, 'admin01', 'Administrador1', 'admin01@gmail.com', '96e79218965eb72c92a549dd5a330112', '1', '1', '2022-11-23 03:43:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_tarea`
--
ALTER TABLE `detalle_tarea`
  ADD PRIMARY KEY (`ideta`),
  ADD KEY `idtarea` (`idtarea`),
  ADD KEY `idmen` (`idmen`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`idmen`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idtarea`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_tarea`
--
ALTER TABLE `detalle_tarea`
  MODIFY `ideta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `idmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_tarea`
--
ALTER TABLE `detalle_tarea`
  ADD CONSTRAINT `detalle_tarea_ibfk_1` FOREIGN KEY (`idtarea`) REFERENCES `tarea` (`idtarea`),
  ADD CONSTRAINT `detalle_tarea_ibfk_2` FOREIGN KEY (`idmen`) REFERENCES `miembros` (`idmen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
