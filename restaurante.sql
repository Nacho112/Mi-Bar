-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2022 a las 00:19:52
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
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menumañana`
--

CREATE TABLE `menumañana` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tipo` text NOT NULL,
  `turno` text NOT NULL,
  `precio` text NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menumañana`
--

INSERT INTO `menumañana` (`id`, `nombre`, `tipo`, `turno`, `precio`, `imagen`) VALUES
(87, 'Medialunas', 'Comida', 'Mañana', '150', 'medialunas.jpeg'),
(88, 'Medialunas', 'Comida', 'Mañana', '150', 'medialunas.jpeg'),
(89, 'Medialunas', 'Comida', 'Mañana', '150', 'medialunas.jpeg'),
(90, 'Medialunas', 'Comida', 'Mañana', '150', 'medialunas.jpeg'),
(91, 'Licuado', 'Bebida', 'Mañana', '200', 'licuado.jpeg'),
(93, 'Licuado', 'Bebida', 'Mañana', '200', 'licuado.jpeg'),
(94, 'Licuado', 'Bebida', 'Mañana', '200', 'licuado.jpeg'),
(95, 'Licuado', 'Bebida', 'Mañana', '200', 'licuado.jpeg'),
(96, 'Licuado', 'Bebida', 'Mañana', '200', 'licuado.jpeg'),
(97, 'Licuado', 'Bebida', 'Mañana', '200', 'licuado.jpeg'),
(98, 'Licuado', 'Bebida', 'Mañana', '200', 'licuado.jpeg'),
(99, 'Bebidas', 'Bebida', 'Tarde', '50', 'bebida.jpeg'),
(100, 'Bebidas', 'Bebida', 'Tarde', '50', 'bebida.jpeg'),
(101, 'Bebidas', 'Bebida', 'Tarde', '50', 'bebida.jpeg'),
(102, 'Bebidas', 'Bebida', 'Tarde', '50', 'bebida.jpeg'),
(103, 'Bebidas', 'Bebida', 'Tarde', '50', 'bebida.jpeg'),
(104, 'Bebidas', 'Bebida', 'Tarde', '50', 'bebida.jpeg'),
(105, 'Bebidas', 'Bebida', 'Tarde', '50', 'bebida.jpeg'),
(106, 'Hamburguesa', 'Comida', 'Tarde', '250', 'comida.jpeg'),
(107, 'Hamburguesa', 'Comida', 'Tarde', '250', 'comida.jpeg'),
(108, 'Hamburguesa', 'Comida', 'Tarde', '250', 'comida.jpeg'),
(109, 'Hamburguesa', 'Comida', 'Tarde', '250', 'comida.jpeg'),
(110, 'Hamburguesa', 'Comida', 'Tarde', '250', 'comida.jpeg'),
(111, 'Hamburguesa', 'Comida', 'Tarde', '250', 'comida.jpeg'),
(112, 'Hamburguesa', 'Comida', 'Tarde', '250', 'comida.jpeg'),
(113, 'Postre', 'Postre', 'Tarde', '450', 'postre.jpeg'),
(114, 'Postre', 'Postre', 'Tarde', '450', 'postre.jpeg'),
(115, 'Postre', 'Postre', 'Tarde', '450', 'postre.jpeg'),
(116, 'Postre', 'Postre', 'Tarde', '450', 'postre.jpeg'),
(117, 'Postre', 'Postre', 'Tarde', '450', 'postre.jpeg'),
(118, 'Postre', 'Postre', 'Tarde', '450', 'postre.jpeg'),
(119, 'Postre', 'Postre', 'Tarde', '450', 'postre.jpeg'),
(122, 'Combo 1', 'Comida', 'Tarde', '570', 'combo.jpeg'),
(123, 'Combo 2', 'Comida', 'Tarde', '1200', 'combodos.jpeg'),
(124, 'Combo 3', 'Comida', 'Tarde', '400', 'combotres.jpeg'),
(125, 'Combo 4', 'Comida', 'Tarde', '1300', 'combocuatro.jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `Admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `Admin`) VALUES
(1, 'admin', '12345', 1),
(2, 'Nacho', '54321', 0),
(5, 'probando 1', 'estoyprobando', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menumañana`
--
ALTER TABLE `menumañana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menumañana`
--
ALTER TABLE `menumañana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
