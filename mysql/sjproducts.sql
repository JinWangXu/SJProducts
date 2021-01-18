-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2020 a las 11:37:57
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sjproducts`
--
CREATE DATABASE IF NOT EXISTS `sjproducts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `sjproducts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `usuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `producto` int(20) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(3) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'ordenadores'),
(2, 'portatiles'),
(3, 'smartphones'),
(4, 'monitores'),
(5, 'audifonos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `idComentarioPadre` int(11) NOT NULL,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `idUsuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `idproducto` int(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idComentarioPadre`, `texto`, `idUsuario`, `idproducto`, `fecha`) VALUES
(6, 0, 'Se lo regalé a mi suegra y super contenta!', 'Sergio', 1, '2020-05-30 11:33:19'),
(7, 0, 'Tengo tres de estas! Nunca me canso', 'Sergio', 3, '2020-05-30 11:33:54'),
(8, 0, 'Guau que bien se ve!', 'Sergio', 7, '2020-05-30 11:34:14'),
(9, 0, 'Los cascos no son del todo geniales. Se rompen al mirarlos!', 'Sergio', 8, '2020-05-30 11:34:53'),
(10, 6, 'Yo a mi novia :D', 'JinWang', 1, '2020-05-30 11:35:49'),
(11, 0, 'Geniaal super contento de mi producto', 'JinWang', 2, '2020-05-30 11:36:06'),
(12, 9, 'Bonito perro', 'JinWang', 8, '2020-05-30 11:36:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` int(8) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `categoria` int(3) NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idValoracion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `categoria`, `imagen`, `idValoracion`) VALUES
(1, 'Portátil HP 15S', 'HP 15s-fq1034ns, un portátil elegante y fiable con una amplia pantalla Permanece conectado a lo que más te importa gracias a una batería de larga duración y a un diseño ligero y fino con bisel con mic', 549, 23, 2, 'images/laptop_hp.jpg', 4),
(2, 'Toshiba Z30-C 13\" ', 'Teclado QWERTY en ESPAÑOL con etiquetas. Equipo 100% funcional y revisado por nuestro servicio técnico. Licencia original e instalada (Windows o MacOS). Se envía en caja neutra. Puede tener arañazos, ', 514, 40, 2, 'images/laptop_toshiba.jpg', 5),
(3, 'Samsung Galaxy s7', ' Su configuración de 4 GB de RAM y 64 GB de almacenamiento interno, ampliable con una tarjeta microSD hasta 512 GB, permite poder almacenar gran cantidad de contenidos y archivos en tu Smartphone\r\nTriple cámara: cámara principal de 48 MP, cámara de profun', 229, 48, 3, 'images/samsung_galaxy.jpg', 4),
(4, 'Iphone 7', 'El iPhone 7 da un paso de gigante en todos y cada uno de los aspectos que hacen del iPhone algo único. Nuevo sistema avanzado de cámaras. El mejor rendimiento y la mayor autonomía que se han visto en un iPhone. Altavoces estéreo. Resistencia al agua y a l', 220, 18, 3, 'images/iphone.jpg', 0),
(5, 'PC HP M01-F0004ns', 'Un elegante ordenador de sobremesa que combina un diseño moderno con tecnología probada, de una marca de confianza en la que puedes confiar. Tanto si estás trabajando en tu proyecto más reciente, viendo vídeos o completando tus tareas del día a día, podrá', 358, 60, 1, 'images/pc_hp.jpg', 5),
(6, 'Lenovo - 10TX0015UK', 'Antes de comprar un PC para tu hogar, plantéate lo siguiente: ¿Es fácil de usar para niños y mayores por igual? ¿Tiene la potencia, memoria y capacidad de almacenamiento necesarias para satisfacer las necesidades informáticas de toda la familia? ¿Tiene un', 542, 95, 1, 'images/pc_lenovo.jpg', 0),
(7, 'Asus VP228HE 21.5', 'El VP228HE Full HD de 21,5\" ofrece una relación de contraste 100.000.000:1 y tecnologías de optimización de imagen SplendidPlus y VividPixel. El tiempo de respuesta de 1 ms elimina las imágenes borrosas y ofrece una reproducción del vídeo más fluida.', 86, 11, 4, 'images/monitor_asus.jpg', 4),
(8, 'JBL Tune 500', 'En tu mundo, un sonido superior es esencial, así que deslízate con un par de audífonos inalámbricos JBL LIVE500BT para todo el oído. ', 89, 60, 5, 'images/jbl.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apodo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `urlFoto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellidos`, `apodo`, `password`, `direccion`, `urlFoto`, `email`) VALUES
('Jin', 'Wang', 'JinWang', '$2y$10$RF913bsqMmAme3W4JgoQK.iVeAyn4LEg9rYA83e0ObQfMMKGXd6Ea', 'c/apruebame 10', 'images/jin.jpg', 'jwang04@ucm.es'),
('Sergio', 'Morán', 'Sergio', '$2y$10$DipnqhsCnL02nfu5fAwXMevbLY5e3Ix7tc0nYakHMeqlvANxcnK8C', 'C/Las rozas 54', 'images/jin.jpg', 'sermoran@ucm.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `idproducto` int(20) NOT NULL,
  `idusuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idvaloracion` int(5) NOT NULL,
  `valoracion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idproducto`, `idusuario`, `idvaloracion`, `valoracion`) VALUES
(1, 'Sergio', 4, 5),
(7, 'Sergio', 5, 4),
(8, 'Sergio', 6, 4),
(3, 'JinWang', 7, 4),
(1, 'JinWang', 8, 3),
(2, 'JinWang', 9, 5),
(5, 'JinWang', 10, 5),
(8, 'JinWang', 11, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign2` (`producto`),
  ADD KEY `foreign` (`usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign` (`categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`apodo`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`idvaloracion`),
  ADD KEY `foreign1` (`idproducto`),
  ADD KEY `foreign2` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `idvaloracion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_4` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
