-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2026 a las 15:26:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ludokids`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `calificacion` int(11) NOT NULL CHECK (`calificacion` between 1 and 5),
  `comentario` text NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuento`
--

CREATE TABLE `cuento` (
  `id_cuento` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuento`
--

INSERT INTO `cuento` (`id_cuento`, `titulo`, `imagen`, `audio`) VALUES
(1, 'Cuento de la bella durmiente', '../../Elementos/img_bellaDurmiente_cuento.webp', '../../ELEMENTOS/audios_cuentos/bella.mp3'),
(2, 'Cuento de caperucita roja', '../../Elementos/img-caperucita.webp', '../../ELEMENTOS/audios_cuentos/caperucita.mp3'),
(3, 'Cuento de Heidi', '../../Elementos/img_heidi_cuentos.webp', '../../ELEMENTOS/audios_cuentos/heidi.mp3'),
(4, 'Cuento de la Reina de Hielo', '../../Elementos/img-reina.webp', '../../ELEMENTOS/audios_cuentos/la_reina_hielo.mp3'),
(5, 'Cuento del patito feo', '../../Elementos/img-patitofeo.webp', '../../ELEMENTOS/audios_cuentos/pato.mp3'),
(6, 'Cuento de Pinocho', '../../ELEMENTOS/img-pinocho.webp', '../../ELEMENTOS/audios_cuentos/pinocho.mp3'),
(7, 'Cuento de Pulgarcito', '../../Elementos/img-pulgarcito.webp', '../../ELEMENTOS/audios_cuentos/pulgarcito.mp3'),
(8, 'Cuento de los tres cerditos', '../../Elementos/img-cerditos.webp', '../../ELEMENTOS/audios_cuentos/cerditos.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego_recreo`
--

CREATE TABLE `juego_recreo` (
  `id_juego` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url_embed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juego_recreo`
--

INSERT INTO `juego_recreo` (`id_juego`, `nombre`, `imagen`, `url_embed`) VALUES
(1, 'Angry balls', NULL, 'https://www.gamearter.com/game/angry-balls/'),
(2, 'Block Blaster', NULL, 'https://www.gamearter.com/game/tetris/'),
(3, 'Cañon de colores', NULL, 'https://www.gamearter.com/game/bubble-odyssey/'),
(4, 'Escape de la nave', NULL, 'https://www.gamearter.com/game/orbit-escape/'),
(5, 'Fruit fusion', NULL, 'https://www.gamearter.com/game/fruit-merge-2/'),
(6, 'Hole io', NULL, 'https://www.gamearter.com/game/hole-plus-3d-color-hole/'),
(7, 'Maquilla la princesa', NULL, 'https://www.gamearter.com/game/fairy-tale-princess-makeover/'),
(8, 'El Mercado del Mono', NULL, 'https://www.minijuegos.com/embed/monkey-mart'),
(9, 'Pako pako', NULL, 'https://www.gamearter.com/game/paco-paco/'),
(10, 'El Restaurante del Pinguino', NULL, 'https://www.minijuegos.com/embed/penguin-diner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fecha_publicacion` datetime DEFAULT current_timestamp(),
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `rol` varchar(20) NOT NULL DEFAULT 'profesor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_comentario_usuario` (`id_usuario`);

--
-- Indices de la tabla `cuento`
--
ALTER TABLE `cuento`
  ADD PRIMARY KEY (`id_cuento`);

--
-- Indices de la tabla `juego_recreo`
--
ALTER TABLE `juego_recreo`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `fk_material_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cuento`
--
ALTER TABLE `cuento`
  MODIFY `id_cuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `juego_recreo`
--
ALTER TABLE `juego_recreo`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
