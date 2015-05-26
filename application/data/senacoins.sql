-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2015 a las 23:58:16
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `senacoins`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` int(11) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(30) DEFAULT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `monedas` int(11) DEFAULT NULL,
  `administrador` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idEquipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idEquipo`, `nombre_equipo`, `nombre_usuario`, `contrasena`, `monedas`, `administrador`) VALUES
(0, 'REDES', 'redes_JP', 'r1234', 1000, b'0'),
(1, 'MULTIMEDIA', 'm_mm', '2431', 1000, b'0'),
(2, 'MANTENIMIENTO', 'Mantenimiento_JP', 'man123', 1000, b'0'),
(3, 'DISEÑO', 'DISEÑO_JP', 'D123', 1000, b'0'),
(4, 'COCINA', 'cocineros', 'cocina17', 1000, b'0'),
(5, 'salud', 'salud_123', 's12', 1000, b'0'),
(6, 'Enfermeria', 'enfer12', 's12', 1000, b'0'),
(7, '12345', 'kjsd', '123', 1000, b'0'),
(8, '112312', 'sdasd', 'awe', 1000, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `url_imagen` varchar(50) DEFAULT NULL,
  `producto_idProducto` int(11) NOT NULL,
  `estado` bit(1) DEFAULT 0,
  PRIMARY KEY (`idImagen`),
  KEY `fk_imagen_producto1_idx` (`producto_idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `url_guia` varchar(45) DEFAULT NULL,
  `equipo_idEquipo` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_producto_equipo_idx` (`equipo_idEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE IF NOT EXISTS `transaccion` (
  `idTransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `producto_idProducto` int(11) NOT NULL,
  `equipo_idEquipo` int(11) NOT NULL,
  PRIMARY KEY (`idTransaccion`),
  KEY `fk_transaccion_producto1_idx` (`producto_idProducto`),
  KEY `fk_transaccion_equipo1_idx` (`equipo_idEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_producto1` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_equipo` FOREIGN KEY (`equipo_idEquipo`) REFERENCES `equipo` (`idEquipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `fk_transaccion_equipo1` FOREIGN KEY (`equipo_idEquipo`) REFERENCES `equipo` (`idEquipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaccion_producto1` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
