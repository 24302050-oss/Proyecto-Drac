-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2025 a las 02:21:40
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
-- Base de datos: `bibliodraco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Alejandra Valeriano', '24302050@utfv.edu.mx', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `sexo` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `carrera`, `sexo`) VALUES
('24302010', 'Kevin Aldahir Jasso Monrroy', 'Desarrollo de Software Multiplataforma', 'M'),
('24302014', 'Gustavo Antonio Soriano Rivera', 'Desarrollo de Software Multiplataforma', 'M'),
('24302019', 'Gustavo Gil Gatica', 'Desarrollo de Software Multiplataforma', 'M'),
('24302022', 'Francisco Arturo Candelas Morales', 'Desarrollo de Software Multiplataforma', 'M'),
('24302029', 'Jose Fabian Sanchez Romero', 'Desarrollo de Software Multiplataforma', 'M'),
('24302031', 'Javier Sanchez Reyes', 'Desarrollo de Software Multiplataforma', 'M'),
('24302033', 'Angel Alejandro Tapia Vargas', 'Desarrollo de Software Multiplataforma', 'M'),
('24302037', 'Máximo Aarón López Suárez', 'Desarrollo de Software Multiplataforma', 'M'),
('24302041', 'Alexander Padilla Trujillo', 'Desarrollo de Software Multiplataforma', 'M'),
('24302042', 'Pedro Soto Lopez', 'Desarrollo de Software Multiplataforma', 'M'),
('24302049', 'Alan Alfredo Gonzalez Cruz', 'Desarrollo de Software Multiplataforma', 'M'),
('24302050', 'Natali Alejandra Valeriano Yañez', 'Desarrollo de Software Multiplataforma', 'F'),
('24302051', 'Sara Estrella Aldana Reyes', 'Desarrollo de Software Multiplataforma', 'F'),
('24302054', 'Arturo Emiliano Hernandez Arvizu', 'Desarrollo de Software Multiplataforma', 'M'),
('24302055', 'Bitia Asarela Casas Ramirez', 'Desarrollo de Software Multiplataforma', 'F'),
('24302057', 'Pedro Jesus Nicolas Plaza', 'Desarrollo de Software Multiplataforma', 'M'),
('24302058', 'Alan Jiménez Saucedo', 'Desarrollo de Software Multiplataforma', 'M'),
('24302060', 'Jaquelin Esmeralda Perez Hernandez', 'Desarrollo de Software Multiplataforma', 'F'),
('24302064', 'Miguel Angel Rojas Gonzalez', 'Desarrollo de Software Multiplataforma', 'M'),
('24302065', 'Lesli Abigail Martínez Hernández', 'Desarrollo de Software Multiplataforma', 'F'),
('24302066', 'Luis Javier Chavez Aguila', 'Desarrollo de Software Multiplataforma', 'M'),
('24302072', 'Crhistian Mauricio Hernandez Nava', 'Desarrollo de Software Multiplataforma', 'M'),
('24302077', 'Angel De Jesus Huerta Zamora', 'Desarrollo de Software Multiplataforma', 'M'),
('24302085', 'Angelica Yoselin Vazquez Tejeda', 'Desarrollo de Software Multiplataforma', 'F'),
('24302091', 'Jonatan Abdiel Servin Flores', 'Desarrollo de Software Multiplataforma', 'M'),
('24302112', 'Ulises Timoteo Mirafuentes', 'Desarrollo de Software Multiplataforma', 'M'),
('24302141', 'Rafael Camarillo Chavez', 'Desarrollo de Software Multiplataforma', 'M'),
('24302164', 'Danna Itzel Castillo Solorzano', 'Desarrollo de Software Multiplataforma', 'F'),
('24305035', 'Daneli Barbosa Castillo', 'Contaduría', 'F'),
('24305116', 'Emma Alexa Velázquez González', 'Contaduría', 'F'),
('24311061', 'Mia Yarais Vega Solis', 'Mercadotecnia', 'F'),
('24314017', 'Leonardo González Reyes', 'Logistica en Cadena de Suministro', 'M'),
('24318106', 'Guadalupe Sánchez Velasco', 'Enfermería', 'F'),
('25311012', 'Dafne Marely Leal Moreno', 'Negocios y Mercadotecnia', 'F'),
('25322004', 'Omar Uciel Celaya Hernández', 'Logistica en Cadena de Suministro', 'M'),
('25322005', 'Susana Mayorga Salas', 'Logistica en Cadena de Suministro', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `carrera` varchar(100) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `hora_entrada` datetime NOT NULL,
  `hora_salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `matricula`, `nombre`, `carrera`, `sexo`, `hora_entrada`, `hora_salida`) VALUES
(1, '24302050', 'Natali Alejandra Valeriano Yañez', 'Desarrollo de Software Multiplataforma', 'F', '2025-11-18 09:07:48', '2025-11-18 09:50:59'),
(2, '24305035', 'Daneli Barbosa Castillo', 'Contaduría', 'F', '2025-11-18 10:08:58', '2025-11-18 10:16:08'),
(3, '24311061', 'Mia Yarais Vega Solis', 'Mercadotecnia', 'F', '2025-11-18 10:10:22', '2025-11-18 10:30:27'),
(4, '24318106', 'Guadalupe Sánchez Velasco', 'Enfermería', 'F', '2025-11-19 10:09:49', '2025-11-19 10:40:01'),
(5, '25311012', 'Dafne Marely Leal Moreno', 'Negocios y Mercadotecnia', 'F', '2025-11-19 10:15:14', '2025-11-19 10:56:19'),
(6, '25322005', 'Susana Mayorga Salas', 'Logistica en Cadena de Suministro', 'F', '2025-11-19 11:25:28', '2025-11-19 11:42:32'),
(7, '24305116', 'Emma Alexa Velázquez González', 'Contaduría', 'F', '2025-11-19 11:50:47', '2025-11-19 12:08:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
