-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2014 a las 15:46:32
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE IF NOT EXISTS `accesos` (
  `id_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `acceso` varchar(64) NOT NULL,
  PRIMARY KEY (`id_acceso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `copete` text NOT NULL,
  `articulo` text NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `fecha_despublicacion` date NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_estado_articulo` int(11) NOT NULL,
  PRIMARY KEY (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(64) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `id_estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `css` varchar(128) NOT NULL,
  `mostrar_tarifa` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(128) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_acceso`
--

CREATE TABLE IF NOT EXISTS `detalles_acceso` (
  `id_acceso_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_acceso` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `crear` tinyint(4) NOT NULL DEFAULT '1',
  `escribir` tinyint(4) NOT NULL DEFAULT '1',
  `modificar` tinyint(4) NOT NULL DEFAULT '1',
  `borrar` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_acceso_detalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_config`
--

CREATE TABLE IF NOT EXISTS `detalles_config` (
  `id_detalle_config` int(11) NOT NULL AUTO_INCREMENT,
  `id_config` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `usar` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_detalle_config`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_hotel`
--

CREATE TABLE IF NOT EXISTS `direcciones_hotel` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `calle` varchar(64) NOT NULL,
  `nro` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `coordenadas` varchar(128) NOT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_huesped`
--

CREATE TABLE IF NOT EXISTS `direcciones_huesped` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_huesped` int(11) NOT NULL,
  `calle` varchar(64) NOT NULL,
  `nro` int(11) NOT NULL,
  `piso` int(11) NOT NULL DEFAULT '0',
  `id_departamento` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `coordenadas` varchar(128) NOT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_usuario`
--

CREATE TABLE IF NOT EXISTS `direcciones_usuario` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `calle` varchar(64) NOT NULL,
  `nro` int(11) NOT NULL,
  `piso` int(11) NOT NULL DEFAULT '0',
  `id_departamento` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `coordenadas` varchar(128) NOT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_hotel`
--

CREATE TABLE IF NOT EXISTS `emails_hotel` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_tipo_email` int(11) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_huesped`
--

CREATE TABLE IF NOT EXISTS `emails_huesped` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `id_huesped` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_tipo_email` int(11) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_usuario`
--

CREATE TABLE IF NOT EXISTS `emails_usuario` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_tipo_email` int(11) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_articulo`
--

CREATE TABLE IF NOT EXISTS `estados_articulo` (
  `id_estado_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `estado_articulo` varchar(64) NOT NULL,
  PRIMARY KEY (`id_estado_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_habitacion`
--

CREATE TABLE IF NOT EXISTS `estados_habitacion` (
  `id_estado_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `estado_habitacion` varchar(64) NOT NULL,
  PRIMARY KEY (`id_estado_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_mensaje`
--

CREATE TABLE IF NOT EXISTS `estados_mensaje` (
  `id_estados_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `estado_mensaje` varchar(64) NOT NULL,
  PRIMARY KEY (`id_estados_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_reserva`
--

CREATE TABLE IF NOT EXISTS `estados_reserva` (
  `id_estado_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `estado_reserva` varchar(64) NOT NULL,
  PRIMARY KEY (`id_estado_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_usuario`
--

CREATE TABLE IF NOT EXISTS `estados_usuario` (
  `id_estado_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `estado_usuario` varchar(64) NOT NULL,
  PRIMARY KEY (`id_estado_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE IF NOT EXISTS `galerias` (
  `id_galeria` int(11) NOT NULL AUTO_INCREMENT,
  `galeria` varchar(64) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  PRIMARY KEY (`id_galeria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `habitacion` varchar(32) NOT NULL,
  `adultos` int(11) NOT NULL,
  `menores` int(11) NOT NULL,
  `estadia_min` int(11) NOT NULL,
  `estadia_max` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_tarifa` int(11) NOT NULL,
  `id_estado_habiatacion` int(11) NOT NULL,
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE IF NOT EXISTS `hoteles` (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `hotel` varchar(64) NOT NULL,
  `descripción` text NOT NULL,
  `url` varchar(128) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes`
--

CREATE TABLE IF NOT EXISTS `huespedes` (
  `id_huesped` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `dni` int(11) NOT NULL,
  PRIMARY KEY (`id_huesped`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_carrusel`
--

CREATE TABLE IF NOT EXISTS `imagenes_carrusel` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(128) NOT NULL,
  `tipo` varchar(32) NOT NULL,
  `size` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `id_hotel` int(11) NOT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_galeria`
--

CREATE TABLE IF NOT EXISTS `imagenes_galeria` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(128) NOT NULL,
  `id_galeria` int(11) NOT NULL,
  `tipo` varchar(32) NOT NULL,
  `size` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) NOT NULL,
  `mensaje` text NOT NULL,
  `emisor` varchar(128) NOT NULL,
  `remitente` varchar(128) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `id_estado_mensaje` int(11) NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE IF NOT EXISTS `monedas` (
  `id_moneda` int(11) NOT NULL AUTO_INCREMENT,
  `moneda` varchar(64) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_moneda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nota` text NOT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(64) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(128) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_habitacion` int(11) NOT NULL,
  `id_huesped` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `id_nota` int(11) NOT NULL,
  `id_estado_reserva` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE IF NOT EXISTS `tarifas` (
  `id_tarifa` int(11) NOT NULL AUTO_INCREMENT,
  `tarifa` varchar(64) NOT NULL,
  `adultos` int(11) NOT NULL,
  `menores` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_moneda` int(11) NOT NULL,
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `id_tarjeta` int(11) NOT NULL,
  `id_husped` int(11) NOT NULL,
  `tarjeta` int(11) NOT NULL,
  `id_tipo_tarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_hotel`
--

CREATE TABLE IF NOT EXISTS `telefonos_hotel` (
  `id_telefono` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `telefono` varchar(64) NOT NULL,
  `id_tipo_telefono` int(11) NOT NULL,
  PRIMARY KEY (`id_telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_huesped`
--

CREATE TABLE IF NOT EXISTS `telefonos_huesped` (
  `id_telefono` int(11) NOT NULL AUTO_INCREMENT,
  `id_huesped` int(11) NOT NULL,
  `telefono` varchar(64) NOT NULL,
  `id_tipo_telefono` int(11) NOT NULL,
  PRIMARY KEY (`id_telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_usuario`
--

CREATE TABLE IF NOT EXISTS `telefonos_usuario` (
  `id_telefono` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `telefono` varchar(64) NOT NULL,
  `id_tipo_telefono` int(11) NOT NULL,
  PRIMARY KEY (`id_telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_direccion`
--

CREATE TABLE IF NOT EXISTS `tipos_direccion` (
  `id_tipo_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_direccion` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_email`
--

CREATE TABLE IF NOT EXISTS `tipos_email` (
  `id_tipo_email` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_habitacion`
--

CREATE TABLE IF NOT EXISTS `tipos_habitacion` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_mensaje`
--

CREATE TABLE IF NOT EXISTS `tipos_mensaje` (
  `id_tipo_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_mensaje` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_tarjeta`
--

CREATE TABLE IF NOT EXISTS `tipos_tarjeta` (
  `id_tipo_tarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_tarjeta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_tarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_telefono`
--

CREATE TABLE IF NOT EXISTS `tipos_telefono` (
  `id_tipo_telefono` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_telefono` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE IF NOT EXISTS `ubicacion` (
  `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(64) NOT NULL,
  PRIMARY KEY (`id_ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `fecha_alta` date NOT NULL,
  `id_acceso` int(11) NOT NULL,
  `id_estado_usuario` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
