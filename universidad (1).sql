-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2023 a las 19:43:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contrasena` varchar(300) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `email`, `contrasena`, `nombre`) VALUES
(1, 'admin@admin', '$2y$10$2vm90PJQbdahh.Ys5.u8degaQEJirFBgpCdqqTmlUP6TkMI6ODLMu', 'KafkaAlejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre_curso` varchar(100) NOT NULL,
  `maestroID` int(11) NOT NULL,
  `duracion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre_curso`, `maestroID`, `duracion`) VALUES
(8, 'Ingenieria Ambiental', 4, '4 meses '),
(9, 'Robotica', 11, '3 años'),
(16, 'Ingle', 12, '4 meses '),
(17, 'Quimica', 5, '4 meses'),
(18, 'Sociales', 7, '2 meses'),
(19, 'Pediatria', 3, ''),
(22, 'Paintball', 6, ''),
(25, 'Minecraft', 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `matricula` varchar(300) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `nombre`, `apellido`, `email`, `contrasena`, `direccion`, `matricula`, `fecha_nacimiento`) VALUES
(5, 'Alejandro', 'Uribo', 'alumno@alumno', '$2y$10$wdXKFiiZzkSXDDAgtndRZOakY7Fb0TuaFlVPVnCvewDxwKGXE5ELe', 'Manzana B Lote 8', '1002244325', '2002-03-17'),
(8, 'asandro', 'lol', 'asandro@asandro', '$2y$10$MImDX.q1g15UNj1UQlO.IO.5x9zeuUcELU3qTjzie4BgtBt1NaYse', 'nose', '102', '2023-09-20'),
(10, 'Alejin pin pin', 'poon', 'alejito@alejito', '$2y$10$IQNW/XcVuLtcZgH10U.ycuA7Gq7OlSH.KSQXbNsChKAz.OSXH4DZ2', 'dsgdsg', '1212443', '2023-09-26'),
(11, 'aljon', 'sabuesp', 'aljon@aljon', '$2y$10$kNsELuuF6OFmayIA26W6bO6FTJjagk6W51IR8FLbVyqe2BTkBnNii', 'qwdq', '982547854', '2023-09-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `inscripcionID` int(11) NOT NULL,
  `estudianteID` int(11) DEFAULT NULL,
  `cursoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`inscripcionID`, `estudianteID`, `cursoID`) VALUES
(13, 5, 8),
(14, 5, 9),
(15, 5, 19),
(16, 5, 22),
(17, 5, 16),
(18, 5, 17),
(19, 5, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id_maestro` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `contrasena` varchar(150) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id_maestro`, `email`, `contrasena`, `nombre`, `apellido`, `direccion`, `fecha_nacimiento`) VALUES
(3, 'harold@harold', '$2y$10$VQT6GjdOOiLlOG3/.DM6IeTbE92VixbV7w.TOuLyzmSeTKvY4xTZ.', 'haritolo', 'Carcanza', 'Lima Peru', '2023-08-24'),
(4, 'francesco@francesco', '$2y$10$BqGzjgQHk8kCdpJhOWnESOno0RMVPvAT7WMVGWtGfPtRllcDHsQ7q', 'francesco', 'galeano', 'nose', '2023-09-20'),
(5, 'miluska@miluska', '$2y$10$BwT8koulKDrREeo.U1UdZeioyBB9cBp/Bfb6TGQHYXPN0BhrXbQJ.', 'miluska', 'burgos', 'peru', '2023-09-06'),
(6, 'alirio@alirio', '$2y$10$hC48oVAA6uOHmIkWVZGo1eBtJeAkVu9QF8Hun.tCRvO5kYcrZQhre', 'alirio', 'mieres', 'aysinose', '2023-09-19'),
(7, 'fefi@fefi', '$2y$10$oVkY0tUqhGGzN0pvtVb2Hu4SfuEuVfyu31DnODjnXmyXSG9k02DGm', 'fefi', 'aguardiente', 'su casa', '2023-09-05'),
(11, 'asidvouasvd@iaosgipagsf', '$2y$10$sBAS1nU0osdj2zwvQ2VLxOKjwGaz706/Hn5.nSQRU55m4g4EZBfKC', 'alei', 'alein', 'asfsfds', '2023-09-13'),
(12, 'maestro@maestro', '$2y$10$4DPWcsoUje8ky3sO98IuY.uC33nUUOIpnnWsBplurYNltmER/8Mfy', 'Alejandro', 'Uribe', 'Manzana B Lote 8', '2023-09-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contra` varchar(150) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cursos_maestros` (`maestroID`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`inscripcionID`),
  ADD KEY `estudianteID` (`estudianteID`),
  ADD KEY `cursoID` (`cursoID`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `inscripcionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id_maestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_maestros` FOREIGN KEY (`maestroID`) REFERENCES `maestros` (`id_maestro`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`estudianteID`) REFERENCES `estudiantes` (`id_estudiante`),
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`cursoID`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
