-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2020 a las 06:43:37
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `udh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(6) NOT NULL,
  `codigo` varchar(12) NOT NULL,
  `nombres` varchar(90) NOT NULL,
  `apellidos` varchar(90) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `id_pa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `codigo`, `nombres`, `apellidos`, `telefono`, `correo`, `id_pa`) VALUES
(3, '1231233423', 'Pedro', 'Sanchez', '90000009', 'pedros@gmail.com', 1),
(8, '32423', 'Omar ', 'Sulca', '32432423', 'das@gmail.com', 1),
(10, '3242333', 'Omar ', 'werw', '32432432', 'das@gmail.com', 1),
(11, '3242334', 'Andrea', 'Frias', '32412312', 'andrea@gmail.com', 1),
(12, '3242334', 'Valentina', 'Cibelli', '32432423', '3sdas@gmail.com', 1),
(13, '3242334', 'Valentina', 'Cibelli', '32432423', '3sdas@gmail.com', 1),
(14, '32423', 'Pedro', 'Pascal', '32412312', 'das@gmail.com', 1),
(15, '32423', 'Omar ', 'Sulca', '32432423', 'das@gmail.com', 1),
(16, '32423', 'Omar ', 'Sulca', '32432423', '3sdas@gmail.com', 1),
(17, '10001', 'Omar', 'Correa', '920092223', 'omarsulca@gmail.com', 1),
(18, '10001', 'Omar', 'Correa', '920092223', 'omarsulca@gmail.com', 1),
(19, '10001', 'Omar', 'Correa', '920092223', 'omarsulca@gmail.com', 2),
(20, '10001', 'Omar', 'Perez', '920092223', 'omarsulca@gmail.com', 1),
(21, '10001', 'Omar', 'Mazur', '920092223', 'omarsulca@gmail.com', 1),
(22, '32423', 'Ana', 'Perez', '32412312', 'das@gmail.com', 2),
(23, '32423', 'Miguel', 'Soto', '32432423', '3sdas@gmail.com', 2),
(24, '32423', 'Ana', 'Suarez', '32432423', 'das@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`) VALUES
(1, 'Ingenieria'),
(3, 'Educacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pa`
--

CREATE TABLE `pa` (
  `id` int(2) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_facultad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pa`
--

INSERT INTO `pa` (`id`, `nombre`, `id_facultad`) VALUES
(1, 'Ingeniería de Sistemas e Informática', 1),
(2, 'Ingeniería Civil', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `id_tabla` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `tipo`, `id_tabla`) VALUES
(1, 'pedritosc', '123456', 'estudiante', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pa`
--
ALTER TABLE `pa`
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
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pa`
--
ALTER TABLE `pa`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
