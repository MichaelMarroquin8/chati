-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 23:35:19
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chati`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificar`
--

CREATE TABLE `calificar` (
  `idcal` int(80) NOT NULL,
  `idcliente` varchar(80) DEFAULT NULL,
  `idusur` varchar(80) DEFAULT NULL,
  `puntaje` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificar`
--

INSERT INTO `calificar` (`idcal`, `idcliente`, `idusur`, `puntaje`) VALUES
(1, NULL, '16', '5'),
(2, '1', '1', '3'),
(3, '1', '31', '4'),
(4, '1', '37', '5'),
(5, '1', '39', '5'),
(6, '1', '16', '5'),
(7, '1', '16', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalagente`
--

CREATE TABLE `canalagente` (
  `idagen` int(80) NOT NULL,
  `refeagente` varchar(80) DEFAULT NULL,
  `idcanal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canalagente`
--

INSERT INTO `canalagente` (`idagen`, `refeagente`, `idcanal`) VALUES
(1, '17', '1'),
(2, '17', '22'),
(3, '44', '22'),
(4, '17', '23'),
(5, '48', '24'),
(7, '48', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatxuser`
--

CREATE TABLE `chatxuser` (
  `idchatxuser` int(80) NOT NULL,
  `usuario` varchar(80) DEFAULT NULL,
  `idagente` varchar(80) DEFAULT NULL,
  `idcliente` varchar(80) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `token` varchar(80) DEFAULT NULL,
  `agente` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chatxuser`
--

INSERT INTO `chatxuser` (`idchatxuser`, `usuario`, `idagente`, `idcliente`, `fecha`, `hora`, `token`, `agente`) VALUES
(1, '16', 'Sigma Móvil ', '1', '2022-10-12', '15:30', 'e42s5AdZkznJ2JffECoR', NULL),
(2, '1', 'Alberto ', '16', '2022-10-12', '15:31', 'e42s5AdZkznJ2JffECoR', NULL),
(3, '37', 'Sigma Móvil ', '1', '2022-10-18', '15:04', 'e42s5AdZkznJ2JffECoR', NULL),
(4, '38', 'Sigma Móvil ', '1', '2022-10-18', '15:21', 'e42s5AdZkznJ2JffECoR', NULL),
(5, '42', 'Sigma Móvil ', '40', '2022-10-18', '17:31', 'oBWQ2kMC3a1i7gkQueQ2', NULL),
(6, '16', 'Sura ', '20', '2022-10-25', '09:23', 'Bdx2dAXo7iMKsc3fKB2T', NULL),
(7, '20', 'Alberto ', '16', '2022-10-25', '09:26', 'Bdx2dAXo7iMKsc3fKB2T', NULL),
(8, '16', 'Constructora Las Galias ', '21', '2022-10-31', '09:26', 'tgo5LSa9Xinz99atzhWG', NULL),
(9, '21', 'Alberto ', '16', '2022-10-31', '09:27', 'tgo5LSa9Xinz99atzhWG', NULL),
(10, '16', 'Sigma Móvil ', '40', '2022-10-31', '15:01', 'oBWQ2kMC3a1i7gkQueQ2', NULL),
(11, '40', 'Alberto ', '16', '2022-10-31', '15:50', 'oBWQ2kMC3a1i7gkQueQ2', NULL),
(12, '16', 'Sigma Móvil ', '45', '2022-11-01', '08:35', 'C7BxOByXC1ZFUm2CPXYs', NULL),
(13, '45', 'Alberto ', '16', '2022-11-01', '08:36', 'C7BxOByXC1ZFUm2CPXYs', NULL),
(14, '16', 'Wolfteam ', '47', '2022-11-01', '11:49', 'REmP7th8Pm6NEkZd2dF6', NULL),
(15, '47', 'Alberto ', '16', '2022-11-01', '11:50', 'REmP7th8Pm6NEkZd2dF6', NULL),
(16, '16', 'Wolfteam ', '49', '2022-11-01', '11:50', 'cJ3IcbPC7HugaHroMnan', NULL),
(17, '49', 'Alberto ', '16', '2022-11-01', '11:50', 'cJ3IcbPC7HugaHroMnan', NULL),
(18, '50', 'Sigma Móvil ', '1', '2022-11-03', '14:41', 'e42s5AdZkznJ2JffECoR', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clickuser`
--

CREATE TABLE `clickuser` (
  `id` int(10) NOT NULL,
  `UserIdSession` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clickUser` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clickuser`
--

INSERT INTO `clickuser` (`id`, `UserIdSession`, `clickUser`) VALUES
(1, '16', '1'),
(2, '1', '16'),
(3, '35', '1'),
(4, '37', '1'),
(5, '38', '1'),
(6, '39', '1'),
(7, '41', '40'),
(8, '41', '40'),
(9, '42', '40'),
(10, '20', '16'),
(11, '21', '16'),
(12, '40', '42'),
(13, '45', '16'),
(14, '47', '16'),
(15, '49', '16'),
(16, '50', '1'),
(17, '50', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios`
--

CREATE TABLE `espacios` (
  `idesp` int(80) NOT NULL,
  `tokenc` varchar(80) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `quienre` varchar(80) DEFAULT NULL,
  `sitiore` varchar(250) DEFAULT NULL,
  `nombespac` varchar(400) DEFAULT NULL,
  `idcliente` varchar(30) DEFAULT NULL,
  `bloqueado` varchar(80) DEFAULT NULL,
  `quienbloc` varchar(20) DEFAULT NULL,
  `quieneli` varchar(120) DEFAULT NULL,
  `palabras` varchar(600) DEFAULT NULL,
  `nomb` varchar(250) DEFAULT NULL,
  `inform` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `espacios`
--

INSERT INTO `espacios` (`idesp`, `tokenc`, `estado`, `quienre`, `sitiore`, `nombespac`, `idcliente`, `bloqueado`, `quienbloc`, `quieneli`, `palabras`, `nomb`, `inform`) VALUES
(1, 'e42s5AdZkznJ2JffECoR', 'disponible', '1', 'Colombia', 'Soporte', '1', '', NULL, NULL, 'SMS,email,omnicanal,encuestas,formularios,whatsapp,IA', 'Sigma Móvil SAS', 'Líneas de atención al cliente:\r\nMedellín:  324 5672654\r\nBogotá: 329 3452678\r\nCali: 320 7645781'),
(6, 'Bdx2dAXo7iMKsc3fKB2T', 'disponible', '20', 'Colombia', 'Atención al Cliente', '20', 'bloqueado', '1', NULL, NULL, 'Sura', NULL),
(9, 'tgo5LSa9Xinz99atzhWG', 'disponible', '21', 'Colombia', 'Atención al Cliente', '21', 'bloqueado', '1', NULL, '', 'Constructora Las Galias ', 'Líneas de atención al cliente:\r\nMedellín:  324 5672654\r\nBogotá: 329 3452678'),
(10, 'e7RDKjTCbeMjOQP7kVmZ', 'disponible', '22', 'Colombia', 'Atención al Cliente', '22', 'bloqueado', '1', NULL, NULL, 'Constructora Bolívar ', NULL),
(11, 'B6tsPNfFJlviZyaeBBbJ', 'disponible', '23', 'Colombia', 'Atención al Cliente', '23', 'bloqueado', '1', NULL, NULL, 'SIESA ', NULL),
(12, 'zgMB2IsK5tqtZiCID9pd', 'disponible', '24', 'Colombia', 'Atención al Cliente', '24', 'bloqueado', '1', NULL, NULL, 'Universidad ICESI ', NULL),
(13, 'XAq2xaXiojVVO8WWPDIq', 'disponible', '25', 'Colombia', 'Atención al Cliente', '25', 'bloqueado', '1', NULL, NULL, 'la Montaña Agromercados ', NULL),
(14, 'PpcFqWYnv1mzKfLCOs83', 'disponible', '26', 'Colombia', 'Atención al Cliente', '26', 'bloqueado', '1', NULL, NULL, 'COXTI ', NULL),
(15, 'DNfYTVd4758cV3UdTJ71', 'disponible', '27', 'Colombia', 'Atención al Cliente', '27', 'bloqueado', '1', NULL, NULL, 'Higuera Escalante ', NULL),
(16, 'OReoQYNnV1VkFPaIDCR9', 'disponible', '28', 'Colombia', 'Atención al Cliente', '28', 'bloqueado', '1', NULL, NULL, 'Supertiendas Cañaveral ', NULL),
(17, '9F3L5S3QjPZ4MY97455e', 'disponible', '29', 'Colombia', 'Atención al Cliente', '29', 'bloqueado', '1', NULL, NULL, 'Christus Sinergia ', NULL),
(18, 'SyS1vEgqjt6D6DGsHtKn', 'disponible', '30', 'Colombia', 'Atención al Cliente', '30', 'bloqueado', '1', NULL, NULL, 'Automotores Farallones ', NULL),
(22, 'oBWQ2kMC3a1i7gkQueQ2', 'disponible', '40', 'Colombia', 'Gestión de Contenidos', '40', '', '1', NULL, NULL, 'Sigma Móvil SAS', NULL),
(23, 'C7BxOByXC1ZFUm2CPXYs', 'disponible', '1', 'Colombia', 'Comercial', '45', NULL, NULL, NULL, NULL, 'Sigma Móvil SAS', NULL),
(24, 'REmP7th8Pm6NEkZd2dF6', 'disponible', '47', 'Colombia', 'Atención', '47', '', '47', NULL, NULL, 'Wolfteam', NULL),
(25, 'cJ3IcbPC7HugaHroMnan', 'disponible', '47', 'Colombia', 'Soporte', '49', NULL, NULL, NULL, NULL, 'Wolfteam ', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `msjs`
--

CREATE TABLE `msjs` (
  `id` int(11) NOT NULL,
  `user` varchar(250) DEFAULT NULL,
  `user_id` int(250) DEFAULT NULL,
  `to_user` varchar(250) DEFAULT NULL,
  `to_id` int(250) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `fecha` varchar(250) DEFAULT NULL,
  `nombre_equipo_user` varchar(250) DEFAULT NULL,
  `leido` varchar(100) DEFAULT NULL,
  `sonido` varchar(10) DEFAULT NULL,
  `archivos` varchar(50) DEFAULT NULL,
  `tokeng` varchar(80) DEFAULT NULL,
  `fechasep` varchar(30) DEFAULT NULL,
  `horasep` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `msjs`
--

INSERT INTO `msjs` (`id`, `user`, `user_id`, `to_user`, `to_id`, `message`, `fecha`, `nombre_equipo_user`, `leido`, `sonido`, `archivos`, `tokeng`, `fechasep`, `horasep`) VALUES
(1, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 1, 'Hola', '12/10/2022 03:30 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-12', '15:30'),
(2, 'sigmamovil@sigmamovil.com', 1, 'Alberto ', 16, 'Hola', '12/10/2022 03:31 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-12', '15:31'),
(3, 'albertDxj3Iz@gmail.com', 37, 'Sigma Móvil ', 1, 'Hola como les va?', '18/10/2022 03:04 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-18', '15:04'),
(4, 'albertDxj3Iz@gmail.com', 37, 'Sigma Móvil ', 1, 'Necesito ayuda con un reporte por favor', '18/10/2022 03:04 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-18', '15:04'),
(5, 'otronuevo4hgTzV@gmail.com', 38, 'Sigma Móvil ', 1, 'Hola soy yo nuevamente', '18/10/2022 03:21 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-18', '15:21'),
(6, 'sigmamovil@sigmamovil.com', 1, 'otronuevo ', 38, 'Listo', '18/10/2022 03:23 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-18', '15:23'),
(7, 'edgarTXQpwM@gmail.com', 42, 'Sigma Móvil ', 40, 'hey', '18/10/2022 05:31 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-18', '17:31'),
(8, 'alberto.vonlody@sigmamovil.com', 16, 'Sura ', 20, 'Hola Sura', '25/10/2022 09:23 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'Bdx2dAXo7iMKsc3fKB2T', '2022-10-25', '09:23'),
(9, 'soporte@sura.com', 20, 'Alberto ', 16, 'Hola Alberto', '25/10/2022 09:26 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'Bdx2dAXo7iMKsc3fKB2T', '2022-10-25', '09:26'),
(10, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 1, 'Hola Soporte necesito ayuda', '31/10/2022 09:25 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-31', '09:25'),
(11, 'sigmamovil@sigmamovil.com', 1, 'Alberto ', 16, 'Si claro', '31/10/2022 09:25 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-31', '09:25'),
(12, 'alberto.vonlody@sigmamovil.com', 16, 'Constructora Las Galias ', 21, 'Hola Que tal', '31/10/2022 09:26 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'tgo5LSa9Xinz99atzhWG', '2022-10-31', '09:26'),
(13, 'david.monroy@galias.com.co', 21, 'Alberto ', 16, 'Hola buen día, en que lo puedo ayudar?', '31/10/2022 09:27 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'tgo5LSa9Xinz99atzhWG', '2022-10-31', '09:27'),
(14, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'Hola necesito ayuda', '31/10/2022 03:01 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:01'),
(15, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'raro', '31/10/2022 03:09 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:09'),
(16, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 1, 'Nuevo mensaje para soporte', '31/10/2022 03:23 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-31', '15:23'),
(17, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'Hola hey', '31/10/2022 03:23 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-31', '15:23'),
(18, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'new', '31/10/2022 03:43 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:43'),
(19, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'Otro más', '31/10/2022 03:49 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:49'),
(20, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'Hey llego el mensaje de otro más', '31/10/2022 03:50 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:50'),
(21, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'Hey llego el mensaje de otro más', '31/10/2022 03:50 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:50'),
(22, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'punto', '31/10/2022 03:52 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:52'),
(23, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'Y ahora?', '31/10/2022 03:55 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:55'),
(24, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'Repetido', '31/10/2022 03:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:57'),
(25, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'repetido dos', '31/10/2022 03:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:57'),
(26, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'repetido dos', '31/10/2022 03:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:57'),
(27, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'recibido dos veces', '31/10/2022 03:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:57'),
(28, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'recibido dos veces', '31/10/2022 03:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:57'),
(29, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'dos veces', '31/10/2022 03:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:57'),
(30, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'dos veces', '31/10/2022 03:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:57'),
(31, 'jose.vasquez@gmail.com', 40, 'Alberto ', 16, 'esta', '31/10/2022 03:59 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:59'),
(32, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 40, 'llego sin repetirse', '31/10/2022 03:59 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '15:59'),
(33, 'jose.vasquez@gmail.com', 40, 'edgar ', 42, 'Hola edgar', '31/10/2022 04:03 pm', 'des-alberto.sigmamovil.local', 'NO', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-10-31', '16:03'),
(34, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'Hola Alberto desde soporte', '31/10/2022 04:04 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-31', '16:04'),
(35, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 1, 'Hola Sax ', '31/10/2022 04:04 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-10-31', '16:04'),
(36, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 45, 'Hola muy buenos días.', '01/11/2022 08:35 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-01', '08:35'),
(37, 'jose.vasquez@gmail.com', 45, 'Alberto ', 16, 'Hola como le va?', '01/11/2022 08:36 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-01', '08:36'),
(38, 'alberto.vonlody@sigmamovil.com', 16, 'Wolfteam ', 47, 'Hola buenas tardes', '01/11/2022 11:49 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'REmP7th8Pm6NEkZd2dF6', '2022-11-01', '11:49'),
(39, 'alberto.vonlody@sigmamovil.com', 16, 'Wolfteam ', 47, 'Necesito ayuda con mi cuenta por favor.', '01/11/2022 11:49 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'REmP7th8Pm6NEkZd2dF6', '2022-11-01', '11:49'),
(40, 'alberto.vonlody@sigmamovil.com', 16, 'Wolfteam ', 47, 'Tengo un error 400', '01/11/2022 11:49 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'REmP7th8Pm6NEkZd2dF6', '2022-11-01', '11:49'),
(41, 'soporte@wolf.com', 47, 'Alberto ', 16, 'Hola Alberto', '01/11/2022 11:50 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'REmP7th8Pm6NEkZd2dF6', '2022-11-01', '11:50'),
(42, 'soporte@wolf.com', 47, 'Alberto ', 16, 'Ya le colaboro', '01/11/2022 11:50 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'REmP7th8Pm6NEkZd2dF6', '2022-11-01', '11:50'),
(43, 'alberto.vonlody@sigmamovil.com', 16, 'Wolfteam ', 49, 'Hola esta es conversación con soporte', '01/11/2022 11:50 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'cJ3IcbPC7HugaHroMnan', '2022-11-01', '11:50'),
(44, 'soporte@wolf.com', 49, 'Alberto ', 16, 'Ok recibido.', '01/11/2022 11:50 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'cJ3IcbPC7HugaHroMnan', '2022-11-01', '11:50'),
(45, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 45, 'Hola buen día aun no me han podido atender.', '03/11/2022 10:10 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-03', '10:10'),
(46, 'sigmamovil@sigmamovil.com', 45, 'Alberto ', 16, 'Hola, de una ya lo atendemos.', '03/11/2022 10:10 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-03', '10:10'),
(47, 'sigmamovil@sigmamovil.com', 45, 'Alberto ', 16, 'otro', '03/11/2022 10:12 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-03', '10:12'),
(48, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 45, 'Ok otro new', '03/11/2022 10:14 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-03', '10:14'),
(49, 'sigmamovil@sigmamovil.com', 45, 'Alberto ', 16, 'hey', '03/11/2022 10:14 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-03', '10:14'),
(50, 'sigmamovil@sigmamovil.com', 45, 'Alberto ', 16, 'hey', '03/11/2022 10:14 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-03', '10:14'),
(51, 'sigmamovil@sigmamovil.com', 45, 'Alberto ', 16, 'newway', '03/11/2022 10:20 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'C7BxOByXC1ZFUm2CPXYs', '2022-11-03', '10:20'),
(52, 'sigmamovil@sigmamovil.com', 40, 'Alberto ', 16, 'new', '03/11/2022 10:31 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'oBWQ2kMC3a1i7gkQueQ2', '2022-11-03', '10:31'),
(53, 'carlos@gmail.com', 50, 'Sigma Móvil ', 1, 'Hola soporte habla carlos', '03/11/2022 02:41 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-03', '14:41'),
(54, 'jose.vasquez@gmail.com', 1, 'Carlos ', 50, 'Hola Carlos es soporte', '03/11/2022 02:41 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-03', '14:41'),
(55, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'Hola Alberto', '03/11/2022 05:50 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-03', '17:50'),
(56, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'Notificación', '03/11/2022 05:56 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-03', '17:56'),
(57, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'Otro', '03/11/2022 05:57 pm', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-03', '17:57'),
(58, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'report', '04/11/2022 08:17 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '08:17'),
(59, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'nuevo', '04/11/2022 08:20 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '08:20:45'),
(60, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'fecha', '04/11/2022 08:21 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '08:21:23'),
(61, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'new', '04/11/2022 09:01 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:01:49'),
(62, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'Mensaje chati', '04/11/2022 09:06 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:06:19'),
(63, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'nu', '04/11/2022 09:09 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:09:21'),
(64, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'ok', '04/11/2022 09:09 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:09:58'),
(65, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'ok', '04/11/2022 09:10 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:10:52'),
(66, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'Albert', '04/11/2022 09:12 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:12:45'),
(67, 'jose.vasquez@gmail.com', 1, 'Alberto ', 16, 'a las 15', '04/11/2022 09:13 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:13:30'),
(68, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 1, 'hola hola', '04/11/2022 09:17 am', 'des-alberto.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-04', '09:17:57'),
(69, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 1, 'hey men+', '08/11/2022 02:46 pm', 'des-fodor.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-08', '14:46:14'),
(70, 'alberto.vonlody@sigmamovil.com', 16, 'Sigma Móvil ', 1, 'hey men', '08/11/2022 02:46 pm', 'des-fodor.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-08', '14:46:14'),
(71, 'sigmamovil@sigmamovil.com', 1, 'Alberto ', 16, 'Hola Alberto', '18/11/2022 10:36 am', 'des-fodor.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-18', '10:36:47'),
(72, 'sigmamovil@sigmamovil.com', 1, 'Alberto ', 16, 'Que onda', '18/11/2022 10:48 am', 'des-fodor.sigmamovil.local', 'SI', NULL, NULL, 'e42s5AdZkznJ2JffECoR', '2022-11-18', '10:48:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE `sitios` (
  `idsitio` int(80) NOT NULL,
  `udetalle` varchar(20) DEFAULT NULL,
  `estatus` varchar(60) DEFAULT NULL,
  `pais` varchar(80) DEFAULT NULL,
  `nsitio` varchar(250) DEFAULT NULL,
  `zonahora` varchar(170) DEFAULT NULL,
  `quieneli` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sitios`
--

INSERT INTO `sitios` (`idsitio`, `udetalle`, `estatus`, `pais`, `nsitio`, `zonahora`, `quieneli`) VALUES
(1, '1', 'disponible', 'Colombia', 'Sigma Móvil S.A.S.', 'America/Bogota', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unirse`
--

CREATE TABLE `unirse` (
  `iduni` int(80) NOT NULL,
  `idusur` varchar(80) DEFAULT NULL,
  `nomb_cus` varchar(300) DEFAULT NULL,
  `mensaje` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unirse`
--

INSERT INTO `unirse` (`iduni`, `idusur`, `nomb_cus`, `mensaje`) VALUES
(1, '16', 'Adidas colombia', 'este es un mensaje de prueba.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(50) NOT NULL,
  `linea` varchar(10) DEFAULT NULL,
  `estado` varchar(70) DEFAULT NULL,
  `sitio` varchar(250) DEFAULT NULL,
  `usuario_nom` varchar(100) NOT NULL,
  `nombre_comple` varchar(300) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `cedula` varchar(30) DEFAULT NULL,
  `emailusuario` varchar(215) DEFAULT NULL,
  `pasusuario` varchar(100) NOT NULL,
  `sector` varchar(250) DEFAULT NULL,
  `estatus` varchar(20) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `cargo` varchar(120) DEFAULT NULL,
  `celular` varchar(60) DEFAULT NULL,
  `fecha_registro` varchar(50) DEFAULT NULL,
  `fecha_session` varchar(250) DEFAULT NULL,
  `moduno` varchar(10) DEFAULT NULL,
  `moddos` varchar(10) DEFAULT NULL,
  `modtres` varchar(10) DEFAULT NULL,
  `modcuatro` varchar(10) DEFAULT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  `polit` varchar(20) DEFAULT NULL,
  `empresa` varchar(90) DEFAULT NULL,
  `idcliente` varchar(30) DEFAULT NULL,
  `idref` varchar(80) DEFAULT NULL,
  `checki` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `linea`, `estado`, `sitio`, `usuario_nom`, `nombre_comple`, `apellidos`, `cedula`, `emailusuario`, `pasusuario`, `sector`, `estatus`, `foto`, `cargo`, `celular`, `fecha_registro`, `fecha_session`, `moduno`, `moddos`, `modtres`, `modcuatro`, `tipo`, `polit`, `empresa`, `idcliente`, `idref`, `checki`) VALUES
(1, 'dos', 'disponible', 'Colombia', 'sigmamovil@sigmamovil.com', 'Sigma Móvil', 'SAS', '686376', 'sigmamovil@sigmamovil.com', '23140756', 'Comunicación', 'Administrador', 'foto/70707650P_23.jpg', NULL, '3144226972', NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, 'SI'),
(16, 'dos', 'disponible', 'Colombia', 'alberto.vonlody@sigmamovil.com', 'Alberto', 'Fodor', NULL, 'alberto.vonlody@sigmamovil.com', '23140756', '', 'Usuario', 'foto/85328441P_15196162P_92832211P_fotofodor.jpg', 'Agente', '3144226972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', '1', NULL, NULL),
(17, 'dos', 'disponible', 'Colombia', 'jose.vasquez@gmail.com', 'José', 'Vásquez', NULL, 'jose.vasquez@gmail.com', '23140756', NULL, 'Usuario', NULL, 'Agente', '3142675892', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'Agente', '1', NULL, NULL),
(18, 'dos', 'disponible', 'Colombia', 'agente1@gmail.com', 'Pablo', 'Arbeláez', '12345678', 'agente1@gmail.com', '23140756', NULL, 'Administrador', NULL, 'Agente', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 'Agente', '1', NULL, NULL),
(19, NULL, 'disponible', 'Colombia', 'prueba@gmail.com', 'prueba', 'prueba', NULL, 'prueba@gmail.com', '23140756', NULL, 'Usuario', NULL, 'Agente', NULL, NULL, NULL, 'SI', '', '', NULL, NULL, NULL, 'Agente', '1', NULL, NULL),
(20, 'dos', 'disponible', 'Colombia', 'soporte@sura.com', 'Sura', NULL, '23147655', 'soporte@sura.com', '23140756', 'Salud', 'Administrador', 'foto/77779886P_seguros-sura-historia-logo-de-sura.jpg', 'Salud', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(21, 'dos', 'disponible', 'Colombia', 'david.monroy@galias.com.co', 'Constructora Las Galias', NULL, '', 'david.monroy@galias.com.co', '23140756', 'Construcción', 'Administrador', 'foto/95999459P_galias.png', 'Construcción', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(22, 'dos', 'disponible', 'Colombia', 'lina.salazar@cbolivar.com', 'Constructora Bolívar', NULL, '', 'lina.salazar@cbolivar.com', '23140756', 'Construcción', 'Administrador', 'foto/12345520P_bolivar.jpeg', 'Construcción', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(23, 'dos', 'disponible', 'Colombia', 'Vh@siesa.com', 'SIESA', NULL, '', 'Vh@siesa.com', '23140756', 'Tecnología', 'Administrador', 'foto/47176483P_siesa.png', 'Tecnología', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(24, 'dos', 'disponible', 'Colombia', 'soporte@icesi.com', 'Universidad ICESI', NULL, '', 'soporte@icesi.com', '23140756', 'Educación', 'Administrador', 'foto/00144589P_icesi.jpg', 'Educación', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(25, 'dos', 'disponible', 'Colombia', 'soporte@lamontana.com', 'la Montaña Agromercados', NULL, '', 'soporte@lamontana.com', '23140756', 'Alimentos', 'Administrador', 'foto/32339118P_montaña.jpg', 'Alimentos', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(26, 'dos', 'disponible', 'Colombia', 'soporte@coxti.com', 'COXTI', NULL, '', 'soporte@coxti.com', '23140756', 'Tecnología', 'Administrador', 'foto/05066964P_otro.jpg', 'Tecnología', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(27, 'dos', 'disponible', 'Colombia', 'soporte@higueraescalante.com', 'Higuera Escalante', NULL, '', 'soporte@higueraescalante.com', '23140756', 'Salud', 'Administrador', 'foto/80482759P_higuera.png', 'Salud', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(28, 'dos', 'disponible', 'Colombia', 'soporte@canaveral.com', 'Supertiendas Cañaveral', NULL, '', 'soporte@canaveral.com', '23140756', 'Supermercados', 'Administrador', 'foto/25678786P_cana.jpg', 'Supermercados', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(29, 'dos', 'disponible', 'Colombia', 'soporte@sinergia.com', 'Christus Sinergia', NULL, '', 'soporte@sinergia.com', '23140756', 'Salud', 'Administrador', 'foto/10264333P_sinergia.jpg', 'Salud', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(30, 'dos', 'disponible', 'Colombia', 'soporte@farallones.com', 'Automotores Farallones', NULL, '', 'soporte@farallones.com', '23140756', 'Automotriz', 'Administrador', 'foto/39862954P_farallones.png', 'Automotriz', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, NULL, NULL),
(31, 'dos', 'disponible', 'Colombia', 'julio@gmail.com', 'Julio', 'Murillo', NULL, 'julio@gmail.com', '23140756', NULL, 'Usuario', '', 'usuario', '3144226972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', '1', NULL, NULL),
(32, 'dos', 'disponible', 'Colombia', 's.bonilla539@icloud.com', 'Sergio', 'Bonilla Otoya', '', 's.bonilla539@icloud.com', 'Sb11235813', 'Comunicación', 'Usuario', 'foto/25970227P_F0A59DBA-AF96-4F40-B55C-5952F1A84427.jpeg', '', '3176412829', NULL, NULL, '', '', '', '', NULL, 'SI', 'usuario', NULL, NULL, NULL),
(33, 'dos', 'disponible', 'Colombia', 'jfbonilla@me.com', 'Juan Fernando', 'Bonilla', '', 'jfbonilla@me.com', 'jawcyz-fitmiS-0mexdy', '', 'Usuario', '', '', '3175098602', NULL, NULL, '', '', '', '', NULL, 'SI', 'usuario', NULL, NULL, NULL),
(34, 'dos', 'disponible', 'Colombia', 'tatiana.llanos@gmail.com', 'Tatiana', 'Llanos', '', 'tatiana.llanos@gmail.com', 'Tatilos-22', '', 'Usuario', '', '', '3005158047', NULL, NULL, '', '', '', '', NULL, 'SI', 'usuario', NULL, NULL, NULL),
(35, 'dos', 'disponible', 'Colombia', 'anonimo@gmail.com', 'anónimo', '', '', 'anonimo@gmail.com', 'anonimo23140756', '', 'Usuario', '', '', '', NULL, NULL, '', '', '', '', NULL, 'SI', 'usuario', NULL, NULL, NULL),
(37, 'dos', 'disponible', 'Colombia', 'albertDxj3Iz@gmail.com', 'albert', NULL, NULL, 'albertDxj3Iz@gmail.com', 'albert', NULL, 'Usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', NULL, NULL, NULL),
(38, 'dos', 'disponible', 'Colombia', 'otronuevo4hgTzV@gmail.com', 'otronuevo', NULL, NULL, 'otronuevo4hgTzV@gmail.com', 'otronuevo', NULL, 'Usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', NULL, NULL, NULL),
(39, 'dos', 'disponible', 'Colombia', 'otronuevozDZ3CK@gmail.com', 'otronuevo', NULL, NULL, 'otronuevozDZ3CK@gmail.com', 'otronuevo', NULL, 'Usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', NULL, NULL, NULL),
(40, 'dos', 'disponible', 'Colombia', 'sigmamovil2@sigmamovil.com', 'Sigma Móvil', 'SAS', '686376', 'sigmamovil2@sigmamovil.com', '23140756', 'Comunicación', 'Administrador', 'foto/70707650P_23.jpg', '', NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, '1', NULL),
(42, 'uno', 'disponible', 'Colombia', 'edgarTXQpwM@gmail.com', 'edgar', NULL, NULL, 'edgarTXQpwM@gmail.com', 'edgar', NULL, 'Usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', NULL, NULL, NULL),
(43, 'dos', 'disponible', 'Colombia', 'thiago@gmail.com', 'thiago', 'thiago', NULL, 'thiago@gmail.com', '23140756', NULL, 'Usuario', NULL, NULL, '3144562761', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', NULL, NULL, NULL),
(44, 'dos', 'disponible', 'Colombia', 'sax@gmail.com', 'sax', 'sax', NULL, 'sax@gmail.com', '23140756', NULL, 'Usuario', NULL, 'Agente', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 'Agente', '40', NULL, NULL),
(45, 'dos', 'disponible', 'Colombia', 'Sigma Móvil_l1hQ5iaE@sigmamovil.com', 'Sigma Móvil', 'SAS', NULL, 'Sigma Móvil_l1hQ5iaE@sigmamovil.com', '23140756', NULL, 'Administrador', 'foto/70707650P_23.jpg', NULL, NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, '1', NULL),
(47, 'dos', 'disponible', 'Colombia', 'soporte@wolfteam.com', 'Wolfteam', '', NULL, 'soporte@wolfteam.com', '23140756', 'Industria', 'Administrador', 'foto/11074418P_wolf-team-logo-6A6A3397B4-seeklogo.com.png', NULL, NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, '46', NULL),
(48, 'dos', 'disponible', 'Colombia', 'soporte@wolf.com', 'Pedro', 'Perez', NULL, 'soporte@wolf.com', '23140756', NULL, 'Usuario', NULL, 'Agente', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 'Agente', '47', NULL, NULL),
(49, 'dos', 'disponible', 'Colombia', 'Wolfteam_JaviStlQ@sigmamovil.com', 'Wolfteam', '', NULL, 'Wolfteam_JaviStlQ@sigmamovil.com', '23140756', NULL, 'Administrador', 'foto/11074418P_wolf-team-logo-6A6A3397B4-seeklogo.com.png', NULL, NULL, NULL, NULL, 'SI', 'SI', 'SI', 'SI', NULL, NULL, 'SI', NULL, '47', NULL),
(50, 'dos', 'disponible', 'Colombia', 'carlos@gmail.com', 'Carlos', 'Mendez', NULL, 'carlos@gmail.com', '23140756', NULL, 'Usuario', NULL, 'Agente', '3145625789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SI', 'usuario', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonah`
--

CREATE TABLE `zonah` (
  `idzh` int(80) NOT NULL,
  `zonahora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `zonah`
--

INSERT INTO `zonah` (`idzh`, `zonahora`) VALUES
(1, 'America/Adak'),
(2, 'America/Araguaina'),
(3, 'America/Argentina/Jujuy'),
(4, 'America/Argentina/Salta'),
(5, 'America/Argentina/Ushuaia'),
(6, 'America/Bahia'),
(7, 'America/Belize'),
(8, 'America/Boise'),
(9, 'America/Caracas'),
(10, 'America/Chihuahua'),
(11, 'America/Curacao'),
(12, 'America/Denver'),
(13, 'America/Eirunepe'),
(14, 'America/Glace_Bay'),
(15, 'America/Grenada'),
(16, 'America/Guyana'),
(17, 'America/Indiana/Indianapolis'),
(18, 'America/Indiana/Tell_City'),
(19, 'America/Inuvik'),
(20, 'America/Kentucky/Louisville'),
(21, 'America/Lima'),
(22, 'America/Managua'),
(23, 'America/Matamoros'),
(24, 'America/Metlakatla'),
(25, 'America/Monterrey'),
(26, 'America/New_York'),
(27, 'America/North_Dakota/Beulah'),
(28, 'America/Panama'),
(29, 'America/Port-au-Prince'),
(30, 'America/Punta_Arenas'),
(31, 'America/Regina'),
(32, 'America/Santiago'),
(33, 'America/Sitka'),
(34, 'America/St_Lucia'),
(35, 'America/Tegucigalpa'),
(36, 'America/Toronto'),
(37, 'America/Winnipeg'),
(38, 'America/Anchorage'),
(39, 'America/Argentina/Buenos_Aires'),
(40, 'America/Argentina/La_Rioja'),
(41, 'America/Argentina/San_Juan'),
(42, 'America/Aruba'),
(43, 'America/Bahia_Banderas'),
(44, 'America/Blanc-Sablon'),
(45, 'America/Cambridge_Bay'),
(46, 'America/Cayenne'),
(47, 'America/Costa_Rica'),
(48, 'America/Danmarkshavn'),
(49, 'America/Detroit'),
(50, 'America/El_Salvador'),
(51, 'America/Godthab'),
(52, 'America/Guadeloupe'),
(53, 'America/Halifax'),
(54, 'America/Indiana/Knox'),
(55, 'America/Indiana/Vevay'),
(56, 'America/Iqaluit'),
(57, 'America/Kentucky/Monticello'),
(58, 'America/Los_Angeles'),
(59, 'America/Manaus'),
(60, 'America/Mazatlan'),
(61, 'America/Mexico_City'),
(62, 'America/Montevideo'),
(63, 'America/Nipigon'),
(64, 'America/North_Dakota/Center'),
(65, 'America/Pangnirtung'),
(66, 'America/Port_of_Spain'),
(67, 'America/Rainy_River'),
(68, 'America/Resolute'),
(69, 'America/Santo_Domingo'),
(70, 'America/St_Barthelemy'),
(71, 'America/St_Thomas'),
(72, 'America/Thule'),
(73, 'America/Tortola'),
(74, 'America/Yakutat'),
(75, 'America/Anguilla'),
(76, 'America/Argentina/Catamarca'),
(77, 'America/Argentina/Mendoza'),
(78, 'America/Argentina/San_Luis'),
(79, 'America/Asuncion'),
(80, 'America/Barbados'),
(81, 'America/Boa_Vista'),
(82, 'America/Campo_Grande'),
(83, 'America/Cayman'),
(84, 'America/Creston'),
(85, 'America/Dawson'),
(86, 'America/Dominica'),
(87, 'America/Fort_Nelson'),
(88, 'America/Goose_Bay'),
(89, 'America/Guatemala'),
(90, 'America/Havana'),
(91, 'America/Indiana/Marengo'),
(92, 'America/Indiana/Vincennes'),
(93, 'America/Jamaica'),
(94, 'America/Kralendijk'),
(95, 'America/Lower_Princes'),
(96, 'America/Marigot'),
(97, 'America/Menominee'),
(98, 'America/Miquelon'),
(99, 'America/Montserrat'),
(100, 'America/Nome'),
(101, 'America/North_Dakota/New_Salem'),
(102, 'America/Paramaribo'),
(103, 'America/Porto_Velho'),
(104, 'America/Rankin_Inlet'),
(105, 'America/Rio_Branco'),
(106, 'America/Sao_Paulo'),
(107, 'America/St_Johns'),
(108, 'America/St_Vincent'),
(109, 'America/Thunder_Bay'),
(110, 'America/Vancouver'),
(111, 'America/Yellowknife'),
(112, 'America/Antigua'),
(113, 'America/Argentina/Cordoba'),
(114, 'America/Argentina/Rio_Gallegos'),
(115, 'America/Argentina/Tucuman'),
(116, 'America/Atikokan'),
(117, 'America/Belem'),
(118, 'America/Bogota'),
(119, 'America/Cancun'),
(120, 'America/Chicago'),
(121, 'America/Cuiaba'),
(122, 'America/Dawson_Creek'),
(123, 'America/Edmonton'),
(124, 'America/Fortaleza'),
(125, 'America/Grand_Turk'),
(126, 'America/Guayaquil'),
(127, 'America/Hermosillo'),
(128, 'America/Indiana/Petersburg'),
(129, 'America/Indiana/Winamac'),
(130, 'America/Juneau'),
(131, 'America/La_Paz'),
(132, 'America/Maceio'),
(133, 'America/Martinique'),
(134, 'America/Merida'),
(135, 'America/Moncton'),
(136, 'America/Nassau'),
(137, 'America/Noronha'),
(138, 'America/Ojinaga'),
(139, 'America/Phoenix'),
(140, 'America/Puerto_Rico'),
(141, 'America/Recife'),
(142, 'America/Santarem'),
(143, 'America/Scoresbysund'),
(144, 'America/St_Kitts'),
(145, 'America/Swift_Current'),
(146, 'America/Tijuana'),
(147, 'America/Whitehorse');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificar`
--
ALTER TABLE `calificar`
  ADD PRIMARY KEY (`idcal`);

--
-- Indices de la tabla `canalagente`
--
ALTER TABLE `canalagente`
  ADD PRIMARY KEY (`idagen`);

--
-- Indices de la tabla `chatxuser`
--
ALTER TABLE `chatxuser`
  ADD PRIMARY KEY (`idchatxuser`);

--
-- Indices de la tabla `clickuser`
--
ALTER TABLE `clickuser`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`idesp`);

--
-- Indices de la tabla `msjs`
--
ALTER TABLE `msjs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD PRIMARY KEY (`idsitio`);

--
-- Indices de la tabla `unirse`
--
ALTER TABLE `unirse`
  ADD PRIMARY KEY (`iduni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `usuario_nom` (`usuario_nom`);

--
-- Indices de la tabla `zonah`
--
ALTER TABLE `zonah`
  ADD PRIMARY KEY (`idzh`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificar`
--
ALTER TABLE `calificar`
  MODIFY `idcal` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `canalagente`
--
ALTER TABLE `canalagente`
  MODIFY `idagen` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `chatxuser`
--
ALTER TABLE `chatxuser`
  MODIFY `idchatxuser` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `clickuser`
--
ALTER TABLE `clickuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `espacios`
--
ALTER TABLE `espacios`
  MODIFY `idesp` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `msjs`
--
ALTER TABLE `msjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `sitios`
--
ALTER TABLE `sitios`
  MODIFY `idsitio` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unirse`
--
ALTER TABLE `unirse`
  MODIFY `iduni` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `zonah`
--
ALTER TABLE `zonah`
  MODIFY `idzh` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
