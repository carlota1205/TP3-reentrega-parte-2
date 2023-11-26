-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2023 a las 19:21:09
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
  `Profesion_Autor` varchar(45) NOT NULL,
  `Fecha_Autor` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`Autor_id`, `Nombre_Autor`, `Profesion_Autor`, `Fecha_Autor`) VALUES
(13, 'Nicolas Olivari', 'Periodista', '1900-09-08'),
(14, 'Hermann Hesse', 'Novelista', '1985-01-15'),
(34, 'Franz Kafka', 'Bohemio', '1983-03-07'),
(37, 'Virginia Woolf', 'Novelista', '1882-01-25'),
(39, 'Edgar Allan Poe', 'Poeta y Escritor ', '2023-12-27'),
(41, 'Julio Cortazar', 'Escritor y Profesor', '1914-08-26');

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
(19, 'La musa de la mala pata', 'Libro escrito a proncipios del siglo XX, en Argentina.', 'Poesia', 13),
(21, 'El lobo estepario', 'Es la historia de Harry Haller, un hombre solitario e insatisfecho con su vida.', 'Novela Introspeccion', 14),
(22, 'Siddhartha', 'La historia de Siddhartha, el hijo de un brahmán que no se siente satisfecho con su vida.', 'Novela', 14),
(23, 'Demian ', 'Un joven crece en una familia burguesa en Alemania a principios del siglo XX.', 'Novela', 14),
(27, 'La metamorfosis', 'La metamorfosis es una novela de Franz Kafka, publicada en 1915. Cuenta la historia de la transformación de Gregorio Samsa en un monstruoso insec', 'Novela', 34),
(30, 'Flush', 'Es una biografía parcial de Elizabeth Barrett (más tarde, Elizabeth Barrett Browning), y que es también una sátira divertida de las convenciones ', 'biografia', 37),
(31, 'Una habitación propia', 'El ensayo está basado en una serie de conferencias que la autora desarrolló en octubre de 1928 en el Newnham College y el Girton College, ambas u', 'Novela', 37),
(32, 'Orlando', '\"Orlando\" es la novela de la maravilla. En ella, Virginia Woolf alumbró uno de los personajes más singulares e inolvidables de la literatura.', 'Novela ', 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_admin`
--

CREATE TABLE `usuario_admin` (
  `User_id` int(11) NOT NULL,
  `Nombre_Usuario` varchar(45) NOT NULL,
  `Password_User` varchar(250) NOT NULL,
  `email` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_admin`
--

INSERT INTO `usuario_admin` (`User_id`, `Nombre_Usuario`, `Password_User`, `email`, `rol`) VALUES
(3, 'user', '$2y$10$i7Z78dFoK/h8eBq3PMiF5ecVvCJfFV5sNysxSIMNvHNLPcTh..p2.', '', '');

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
  MODIFY `Autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `Libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuario_admin`
--
ALTER TABLE `usuario_admin`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
