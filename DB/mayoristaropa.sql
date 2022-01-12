-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2019 a las 22:13:46
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mayoristaropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_category` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_category`, `name`, `description`) VALUES
(133, 'Masculino', 'Uso para hombres'),
(134, 'Femenino', 'Uso para mujeres'),
(135, 'Unisex', 'Uso para hombres/mujeres'),
(145, 'Chau', 'Hola'),
(151, 'asdasd', 'asdsa'),
(152, 'asdasd', 'asdsa'),
(153, 'qqq', 'qqq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comment` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `score` int(5) NOT NULL,
  `date` date NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comment`, `comment`, `score`, `date`, `id_product`) VALUES
(15, 'asd', 4, '2019-11-26', 12),
(16, 'asdasd', 4, '2019-11-26', 12),
(17, 'asdasd', 4, '2019-11-26', 12),
(34, 'Joyaaaa', 5, '2019-11-27', 17),
(35, 'qqqqq', 4, '2019-11-27', 17),
(36, 'as', 2, '2019-11-27', 17),
(37, 'as', 3, '2019-11-27', 17),
(38, 'asd', 3, '2019-11-27', 17),
(43, 'asd', 3, '2019-11-27', 44),
(44, 'asdasd', 5, '2019-11-28', 12),
(46, 'Que piolaaa\n', 5, '2019-11-28', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id_image`, `direccion`, `id_product`) VALUES
(2, 'imgProduct/5de02fc919528.jpg', 44),
(4, 'imgProduct/5de031789976b.jpg', 12),
(5, 'imgProduct/5de031a9ae5cb.jpg', 12),
(9, 'imgProduct/5de0359b0ddd5.jpg', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_product` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_product`, `name`, `description`, `price`, `stock`, `image`, `id_category`) VALUES
(12, 'Medias', 'Negra Talle L', 100, 50, '', 135),
(13, 'Remera', 'Blanca Talle M', 100, 100, '', 135),
(14, 'Brasier', 'Azul Talle S', 150, 200, '', 134),
(17, 'Boxer', 'Talle Medium', 200, 150, '', 133),
(44, 'Emiliano', 'kpo', 1, 1, '', 133),
(46, 'sofia', 'kpa', 1000000, 1, '', 134);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `pass`, `email`, `name`, `lastname`, `is_admin`) VALUES
(2, 'guille', '$2y$10$KOoVzgcoI25LbsruQOWHW.wPe6KmzYwqQFqLrez7Dai9cBde0Jfo.', 'guille@gmail.com', 'asd', 'asd', 1),
(4, 'Exe', '$2y$10$fkxu/.VwJtl523dZpDjsruCWZECrr7iXomB.CTau9j2pa8zb4XXyq', 'exe@exe.com', 'exe', 'exe', 1),
(6, '40020001', '$2y$10$XbqY2JqoBTVuarX/sd4qXe/5TAq9jhsb/YAdfPoLbTC.kjzHxA5XG', 'sofiaormazabal1@gmail.com', 'sofia', '', 1),
(22, 'asd', '$2y$10$c8sCEjdACb.hIc2Cb0zkxeAaKA6G/Cq41ewgXtEFt3a4SZ1DrWUne', 'asd@asd.com', 'asd', 'asd', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_producto` (`id_product`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `name` (`name`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `producto` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `producto` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categoria` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
