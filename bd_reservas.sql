-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2015 a las 12:19:08
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE IF NOT EXISTS `tbl_recursos` (
  `rec_id` int(11) NOT NULL,
  `rec_contingut` varchar(255) NOT NULL,
  `rec_reservado` tinyint(1) NOT NULL DEFAULT '1',
  `rec_tipo_rec` tinyint(1) NOT NULL,
  `rec_desactivat` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`rec_id`, `rec_contingut`, `rec_reservado`, `rec_tipo_rec`, `rec_desactivat`) VALUES
(1, 'Aula de teoria 1', 1, 1, 1),
(2, 'Aula de teoria 2', 1, 1, 1),
(3, 'Aula de teoria 3', 1, 1, 1),
(4, 'Aula de teoria 4', 1, 1, 1),
(5, 'Aula informàtica 1', 1, 1, 1),
(6, 'Aula informàtica 2', 1, 1, 1),
(7, 'Despatx per a entrevistes 1', 1, 1, 1),
(8, 'Despatx per a entrevistes 2', 1, 1, 1),
(9, 'Sala de reunions', 1, 1, 1),
(10, 'Projector portàtil', 1, 0, 1),
(11, 'Carro de portàtils', 1, 0, 1),
(12, 'Portàtil 1', 1, 0, 1),
(13, 'Portàtil 2', 1, 0, 1),
(14, 'Portàtil 3', 1, 0, 1),
(15, 'Mòbil 1', 1, 0, 1),
(16, 'Mòbil 2', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE IF NOT EXISTS `tbl_reservas` (
  `res_id` int(11) NOT NULL,
  `res_fecha_ini` date NOT NULL,
  `res_hora_ini` varchar(8) NOT NULL,
  `res_fecha_fin` date NOT NULL,
  `res_hora_fin` varchar(8) NOT NULL,
  `res_incidencia` tinyint(1) NOT NULL DEFAULT '1',
  `res_incidencia_coment` varchar(255) NOT NULL,
  `res_incidencia_usu_email` varchar(50) NOT NULL,
  `UsuarioReservante` varchar(50) DEFAULT NULL,
  `idRecurso` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`res_id`, `res_fecha_ini`, `res_hora_ini`, `res_fecha_fin`, `res_hora_fin`, `res_incidencia`, `res_incidencia_coment`, `res_incidencia_usu_email`, `UsuarioReservante`, `idRecurso`) VALUES
(1, '2015-11-19', '10:47:56', '2015-11-19', '10:49:4', 1, '', '', 'it.jeo@msn.com', 1),
(2, '2015-11-19', '10:49:6', '2015-11-19', '10:49:11', 1, '', '', 'it.jeo@msn.com', 1),
(3, '2015-11-19', '10:49:31', '2015-11-19', '10:51:36', 1, '', '', 'it.jeo@msn.com', 1),
(4, '2015-11-19', '10:51:38', '2015-11-19', '10:51:43', 1, '', '', 'it.jeo@msn.com', 1),
(5, '2015-11-19', '10:51:45', '2015-11-19', '10:51:53', 1, '', '', 'it.jeo@msn.com', 2),
(6, '2015-11-19', '10:51:57', '2015-11-19', '10:54:28', 1, '', '', 'it.jeo@msn.com', 1),
(7, '2015-11-19', '10:54:30', '2015-11-19', '10:54:31', 1, '', '', 'it.jeo@msn.com', 1),
(8, '2015-11-19', '10:54:32', '2015-11-19', '10:57:15', 1, '', '', 'it.jeo@msn.com', 2),
(9, '2015-11-19', '10:57:22', '2015-11-19', '10:57:23', 1, '', '', 'it.jeo@msn.com', 1),
(10, '2015-11-19', '10:57:30', '2015-11-19', '10:57:55', 1, '', '', 'it.jeo@msn.com', 16),
(11, '2015-11-19', '10:57:57', '2015-11-19', '10:57:59', 1, '', '', 'it.jeo@msn.com', 16),
(12, '2015-11-19', '10:58:1', '2015-11-19', '10:58:3', 1, '', '', 'it.jeo@msn.com', 1),
(13, '2015-11-19', '10:58:6', '2015-11-19', '10:58:9', 1, '', '', 'it.jeo@msn.com', 9),
(14, '2015-11-19', '10:58:19', '2015-11-19', '10:58:41', 1, '', '', 'it.jeo@msn.com', 9),
(15, '2015-11-19', '10:58:22', '2015-11-19', '10:58:23', 1, '', '', 'it.jeo@msn.com', 2),
(16, '2015-11-19', '10:58:35', '2015-11-19', '10:58:38', 1, '', '', 'it.jeo@msn.com', 2),
(17, '2015-11-19', '10:59:5', '2015-11-19', '10:59:9', 1, '', '', 'it.jeo@msn.com', 9),
(18, '2015-11-19', '10:59:12', '2015-11-19', '10:59:13', 1, '', '', 'it.jeo@msn.com', 1),
(19, '2015-11-19', '10:59:38', '2015-11-19', '10:59:40', 1, '', '', 'it.jeo@msn.com', 1),
(20, '2015-11-19', '10:59:42', '2015-11-19', '10:59:45', 1, '', '', 'it.jeo@msn.com', 1),
(21, '2015-11-19', '10:59:47', '2015-11-19', '10:59:48', 1, '', '', 'it.jeo@msn.com', 1),
(22, '2015-11-19', '10:59:57', '2015-11-19', '11:0:7', 1, '', '', 'it.jeo@msn.com', 1),
(23, '2015-11-19', '11:0:18', '2015-11-19', '11:0:19', 1, '', '', 'it.jeo@msn.com', 1),
(24, '2015-11-19', '11:0:20', '2015-11-19', '11:0:21', 1, '', '', 'it.jeo@msn.com', 10),
(25, '2015-11-19', '11:0:36', '2015-11-19', '11:0:39', 1, '', '', 'it.jeo@msn.com', 10),
(26, '2015-11-19', '11:0:40', '2015-11-19', '11:0:41', 1, '', '', 'it.jeo@msn.com', 1),
(27, '2015-11-19', '11:0:43', '2015-11-19', '11:0:45', 1, '', '', 'it.jeo@msn.com', 5),
(28, '2015-11-19', '11:0:46', '2015-11-19', '11:0:51', 1, '', '', 'it.jeo@msn.com', 7),
(29, '2015-11-19', '11:0:48', '2015-11-19', '11:0:49', 1, '', '', 'it.jeo@msn.com', 1),
(30, '2015-11-19', '11:10:52', '2015-11-19', '11:10:53', 1, '', '', 'it.jeo@msn.com', 1),
(31, '2015-11-20', '10:31:18', '2015-11-20', '10:31:19', 1, '', '', 'it.jeo@msn.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `usu_email` varchar(50) NOT NULL,
  `usu_contra` varchar(14) NOT NULL,
  `usu_nom` varchar(35) NOT NULL,
  `usu_rang` tinyint(1) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_email`, `usu_contra`, `usu_nom`, `usu_rang`, `activo`) VALUES
('agnes.jeo@msn.com', 'q1w2e3r4', 'Agnes', 1, 1),
('aitor.jeo@msn.com', '1q2w3e4r', 'Aitor', 1, 1),
('alejandro.jeo@msn.com', 'r3w1e2q4', 'Alejandro', 1, 1),
('david.jeo@msn.com', 'r4e3w2q1', 'David', 1, 1),
('enric.jeo@msn.com', '12qw34er', 'Enric', 1, 1),
('it.jeo@msn.com', 'administra', 'IT', 0, 1),
('jorge.jeo@msn.com', '1234qwer', 'Jorge', 1, 1),
('oriol.jeo@msn.com', 'qwer1234', 'Oriol', 1, 1),
('oskitah@fdgdfg.com', '1234', 'Oscar', 1, 0),
('victor.jeo@msn.com', '1r2e3w4q', 'Victor', 1, 1),
('xavi.jeo@msn.com', '13qe24wr', 'Xavi', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `UsuarioReservante` (`UsuarioReservante`),
  ADD KEY `idRecurso` (`idRecurso`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD CONSTRAINT `tbl_reservas_ibfk_1` FOREIGN KEY (`UsuarioReservante`) REFERENCES `tbl_usuario` (`usu_email`),
  ADD CONSTRAINT `tbl_reservas_ibfk_2` FOREIGN KEY (`idRecurso`) REFERENCES `tbl_recursos` (`rec_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
