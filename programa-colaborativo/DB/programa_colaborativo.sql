-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2014 a las 00:40:30
-- Versión del servidor: 5.1.73
-- Versión de PHP: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `programa_colaborativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_comentarios`
--

CREATE TABLE IF NOT EXISTS `prog_comentarios` (
`id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `enmienda_id` int(11) NOT NULL,
  `comentario` text COLLATE utf8_bin NOT NULL,
  `sum_likes` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_enmiendas`
--

CREATE TABLE IF NOT EXISTS `prog_enmiendas` (
`id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `propuesta_id` int(11) NOT NULL,
  `enmienda` text COLLATE utf8_bin NOT NULL,
  `sum_likes` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_likes_comentarios`
--

CREATE TABLE IF NOT EXISTS `prog_likes_comentarios` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL,
  `comentario_voto` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_likes_enmiendas`
--

CREATE TABLE IF NOT EXISTS `prog_likes_enmiendas` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `enmienda_id` int(11) NOT NULL,
  `enmienda_voto` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_likes_propuesta`
--

CREATE TABLE IF NOT EXISTS `prog_likes_propuesta` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `propuesta_id` int(11) NOT NULL,
  `propuesta_voto` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_propuestas`
--

CREATE TABLE IF NOT EXISTS `prog_propuestas` (
`id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_bin NOT NULL,
  `propuesta` text COLLATE utf8_bin NOT NULL,
  `sum_likes` int(11) NOT NULL,
  `positivos` int(11) NOT NULL,
  `negativos` int(11) NOT NULL,
  `comentarios` int(11) NOT NULL,
  `sector` varchar(150) COLLATE utf8_bin NOT NULL,
  `barrio` varchar(150) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `ip` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=117 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prog_comentarios`
--
ALTER TABLE `prog_comentarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prog_enmiendas`
--
ALTER TABLE `prog_enmiendas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prog_likes_comentarios`
--
ALTER TABLE `prog_likes_comentarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prog_likes_enmiendas`
--
ALTER TABLE `prog_likes_enmiendas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prog_likes_propuesta`
--
ALTER TABLE `prog_likes_propuesta`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prog_propuestas`
--
ALTER TABLE `prog_propuestas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);
 
ALTER TABLE `users`
 ADD UNIQUE KEY `CORREO_UNICO` (`email`);
 
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
ALTER TABLE `users` ADD `id_rol` INT NOT NULL AFTER `id`;
 
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);
 
ALTER TABLE `prog_enmiendas`
 ADD CONSTRAINT `fk_enmiendas`
   FOREIGN KEY (`propuesta_id`)
   REFERENCES `prog_propuestas` (`id`)
   ON DELETE CASCADE 
   ON UPDATE RESTRICT;
   
ALTER TABLE `prog_comentarios`
 ADD CONSTRAINT `fk_comentarios`
   FOREIGN KEY (`enmienda_id`)
   REFERENCES `prog_enmiendas` (`id`)
   ON DELETE CASCADE 
   ON UPDATE RESTRICT;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prog_comentarios`
--
ALTER TABLE `prog_comentarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `prog_enmiendas`
--
ALTER TABLE `prog_enmiendas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prog_likes_comentarios`
--
ALTER TABLE `prog_likes_comentarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `prog_likes_enmiendas`
--
ALTER TABLE `prog_likes_enmiendas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prog_likes_propuesta`
--
ALTER TABLE `prog_likes_propuesta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prog_propuestas`
--
ALTER TABLE `prog_propuestas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
