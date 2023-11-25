-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2023 a las 12:39:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `Autor_id` int(11) NOT NULL,
  `Nombre_Autor` varchar(45) NOT NULL,
  `Profesion_Autor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`Autor_id`, `Nombre_Autor`, `Profesion_Autor`) VALUES
(1, 'juajuaj', ''),
(2, 'Cortazas', ''),
(3, 'Rimbaud', ''),
(4, 'Dostoyevski', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `Libro_id` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  `Genero` varchar(45) NOT NULL,
  `Autor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`Libro_id`, `Titulo`, `Descripcion`, `Genero`, `Autor_id`) VALUES
(3, 'blia', 'cgvgjhkl.', 'vla', 1),
(6, 'asdasd', 'asdasdas', 'asdasd', 3),
(7, 'sfdsfsd', 'sdfsdf', 'sdfsd', 4),
(8, 'Rayuela', 'cualquier cosa\r\n', 'feo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_admin`
--

CREATE TABLE `usuario_admin` (
  `User_id` int(11) NOT NULL,
  `Nombre_Usuario` varchar(45) NOT NULL,
  `Password_User` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_admin`
--

INSERT INTO `usuario_admin` (`User_id`, `Nombre_Usuario`, `Password_User`, `email`, `rol`) VALUES
(1, 'user', 'pass', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`Autor_id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`Libro_id`),
  ADD KEY `libros_ibfk_1` (`Autor_id`);

--
-- Indices de la tabla `usuario_admin`
--
ALTER TABLE `usuario_admin`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `Autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `Libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario_admin`
--
ALTER TABLE `usuario_admin`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Autor_id`) REFERENCES `autores` (`Autor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
