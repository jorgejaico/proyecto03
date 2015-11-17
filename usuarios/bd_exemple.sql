-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2015 a las 11:29:43
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_exemple`
--
CREATE DATABASE IF NOT EXISTS `bd_exemple` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_exemple`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `pro_id` int(3) NOT NULL,
  `pro_nom` varchar(25) NOT NULL,
  `pro_descripcio` text NOT NULL,
  `pro_preu` float(10,0) NOT NULL,
  `pro_actiu` int(1) NOT NULL DEFAULT '1',
  `tip_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_id`, `pro_nom`, `pro_descripcio`, `pro_preu`, `pro_actiu`, `tip_id`) VALUES
(1, 'Bici buena', 'Es la mejor que tenemos', 12000, 0, 1),
(2, 'Cubierta mala', 'es muy mala', 3, 1, 2),
(4, 'Luz blanca', 'Luz delantera', 6, 1, 2),
(5, 'Bici 3', 'bla bla bla es muy bonita bla bla...', 600, 0, 1),
(8, 'Bici cutre', 'No le gusta a nadie', 15, 0, 1),
(9, 'Candado grande', 'Candado que coge toda la bici...', 15, 1, 2),
(10, 'Bici plegable', 'Se dobla por la mitad', 600, 0, 1),
(11, 'PulsÃ³metro Garmin', 'Tiene GPS', 300, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `tip_id` int(11) NOT NULL,
  `tip_nombre` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`tip_id`, `tip_nombre`) VALUES
(1, 'Bicicleta'),
(2, 'Accesorio'),
(3, 'Servicio'),
(4, 'Taller');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `pro_id_2` (`pro_id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tip_id`),
  ADD KEY `tip_id` (`tip_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
