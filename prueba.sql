-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2020 a las 04:52:16
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE `casa` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `recamaras` int(1) NOT NULL,
  `banos` int(1) NOT NULL,
  `cocheras` int(1) NOT NULL,
  `estado` text NOT NULL,
  `precio` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id`, `tipo`, `direccion`, `descripcion`, `recamaras`, `banos`, `cocheras`, `estado`, `precio`) VALUES
(8, 'casa', 'av las rosas # 4232', 'solo se vende el terreno', 1, 2, 3, 'venta', 0),
(9, 'casa', 'foasd', 'Viven un chico Iphone mamadisimo y su hermana futuramente esposa de fido.', 3, 4, 2, 'venta', 0),
(12, 'casa', 'av. gaviotas #343', 'Casa blanda de dos pisos con vista a un lote valdio', 1, 2, 0, 'venta', 1200001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_nombre`
--

CREATE TABLE `img_nombre` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `img_nombre`
--

INSERT INTO `img_nombre` (`id`, `nombre`) VALUES
(1, 'BC.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'superadmin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `nacimiento` date NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varbinary(70) NOT NULL,
  `id_casa` int(11) NOT NULL,
  `privilegios` int(1) NOT NULL,
  `vendedor` int(1) NOT NULL,
  `num_acc` int(10) NOT NULL,
  `cam_contr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `nacimiento`, `correo`, `contra`, `id_casa`, `privilegios`, `vendedor`, `num_acc`, `cam_contr`) VALUES
(9, 'Miguel Angel el carreador3000', '2001-08-16', 'mpalomo@ucol.mx', 0x2432792431302456706d5276414d697441632e46756258466377616e4f555561656f304a495450345962727a2f6e6a497663566e3879457342746c79, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `nombre`, `tipo_usuario`) VALUES
(2, 'ola', '793f970c52ded1276b9264c742f19d1888cbaf73', 'soiadmin', 2),
(5, 'superadmin', '150ace6d48af9cbd9809b358fbaa6279257b0a8f', 'Super Joselito admin', 1),
(6, 'olasoi admin2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin2', 2),
(7, 'cola', '150ace6d48af9cbd9809b358fbaa6279257b0a8f', 'pilin', 1),
(8, 'fido', '150ace6d48af9cbd9809b358fbaa6279257b0a8f', 'fidoelPepino', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casa`
--
ALTER TABLE `casa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
