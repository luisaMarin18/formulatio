-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2023 a las 23:04:49
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
-- Base de datos: `formulatio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `cliente` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `empleado` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `email`, `message`, `date`, `cliente`, `departamento`, `empleado`) VALUES
(1, 'correo@correo.com', 'mensaje', '2023-09-08 14:25:46', '', '', NULL),
(2, 'luchia@gmail.com', 'test', '2023-09-08 14:53:23', 'luchia', 'soportetecnico', NULL),
(3, 'papiyo@gmail.com', 'oto oto vampiro', '2023-09-08 14:55:36', 'ahorayo', 'ATENCION CLIENTE', NULL),
(4, 'CORE@GMAIL.COM', 'ADSF', '2023-09-08 15:07:40', 'TEST2', 'ATENCION CLIENTE', NULL),
(5, 'ASD', 'ADASD', '2023-09-08 15:09:22', 'YUY', 'FACTURACION', NULL),
(6, 'aaaaa', 'aaaaa', '2023-09-08 15:16:35', 'aaaaa', 'ATENCION CLIENTE', ''),
(7, 'BBB4@GMAIL.COM', 'BBBB', '2023-09-08 15:21:48', 'BBBB', 'ATENCION CLIENTE', ''),
(8, 'cccc', 'ccccc', '2023-09-08 15:28:17', 'cccc', 'ATENCION CLIENTE', 'Carlos Pérez AC'),
(9, 'dddd', 'ddddd', '2023-09-08 15:28:42', 'dddd', 'SOPORTE TECNICO', 'Arley Ramirez SP'),
(10, 'vvvv', 'vvvv', '2023-09-08 15:29:02', 'vvv', 'FACTURACION', 'Juan Díaz FA'),
(11, 'tttt', 'ttttt', '2023-09-08 15:29:22', 'tttt', 'ATENCION CLIENTE', 'Javier Martínez AC'),
(12, 'ggg', 'gg', '2023-09-08 15:37:50', 'ggg', 'ATENCION CLIENTE', 'Ana Rodríguez AC'),
(13, 'jose@jose.com', 'atienda', '2023-09-08 15:44:39', 'jose', 'ATENCION CLIENTE', 'Ana Rodríguez AC'),
(14, 'LEO@LEO.COM', 'NO ATIENDE', '2023-09-08 15:47:06', 'LEO', 'SOPORTE TECNICO', 'Pedro Sanchez SP'),
(15, 'jame@gmail.com', 'james no lo atienden', '2023-09-08 15:50:50', 'jmes', 'SOPORTE TECNICO', 'Arley Ramirez SP'),
(16, 'wre', 'wer', '2023-09-08 16:01:03', 'wer', 'ATENCION CLIENTE', 'Carlos Pérez AC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
