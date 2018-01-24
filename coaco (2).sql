-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-01-2018 a las 11:42:24
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coaco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `000aalumno`
--

CREATE TABLE `000aalumno` (
  `000id` bigint(20) NOT NULL,
  `000documento` bigint(20) NOT NULL,
  `000tipDocumento` int(2) NOT NULL,
  `000genero` int(1) NOT NULL,
  `000nombres` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000fecNacimiento` date NOT NULL,
  `000email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `000celular` bigint(12) NOT NULL,
  `000eps` int(2) NOT NULL,
  `000foto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `000telFijo` int(8) NOT NULL,
  `000direccion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000barrio` int(4) NOT NULL,
  `000nomAcu` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000apelAcu` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000celAcu` bigint(12) NOT NULL,
  `000fijoAcu` int(8) NOT NULL,
  `000emailAcu` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `000nomMad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000apelMad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000celMad` bigint(12) NOT NULL,
  `000fijoMad` int(8) NOT NULL,
  `000emailMad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `000nomPad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000apelPad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `000celPad` bigint(12) NOT NULL,
  `000fijoPad` int(8) NOT NULL,
  `000emailPad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `000rh` int(1) NOT NULL,
  `000docPad` bigint(20) NOT NULL,
  `000docMad` bigint(20) NOT NULL,
  `000tipDocPad` int(1) NOT NULL,
  `000tipDocMad` int(1) NOT NULL,
  `000estado` int(1) NOT NULL DEFAULT '1',
  `000aniosCursados` int(2) DEFAULT NULL,
  `000gradosRepetidos` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `000aalumno`
--

INSERT INTO `000aalumno` (`000id`, `000documento`, `000tipDocumento`, `000genero`, `000nombres`, `000apellidos`, `000fecNacimiento`, `000email`, `000celular`, `000eps`, `000foto`, `000telFijo`, `000direccion`, `000barrio`, `000nomAcu`, `000apelAcu`, `000celAcu`, `000fijoAcu`, `000emailAcu`, `000nomMad`, `000apelMad`, `000celMad`, `000fijoMad`, `000emailMad`, `000nomPad`, `000apelPad`, `000celPad`, `000fijoPad`, `000emailPad`, `000rh`, `000docPad`, `000docMad`, `000tipDocPad`, `000tipDocMad`, `000estado`, `000aniosCursados`, `000gradosRepetidos`) VALUES
(20, 1012452185, 1, 1, 'cristian', 'tometo', '1998-04-26', 'ccromero581@misena.edu.co', 3114573204, 3, 'view/app/imagenes/Thumbnail/1516608550751-455486004.jpg', 1243576, 'caalev27', 1, 'scuduen', 'nombre acu', 3114523265, 1232555253, 'cctomru@jj.xn--ci-zoa', 'rubis', 'rometo', 3114573204, 0, 'nijttuyyh@jb.bc', 'cgg', 'ggf', 3114521235, 1234567, 'dydt@tsd.cf', 1, 31485547032, 4007742, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `001agenero`
--

CREATE TABLE `001agenero` (
  `001id` int(1) NOT NULL,
  `001desGenero` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `001agenero`
--

INSERT INTO `001agenero` (`001id`, `001desGenero`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Transgenero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `002aeps`
--

CREATE TABLE `002aeps` (
  `002id` int(2) NOT NULL,
  `002desEps` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `002tel` bigint(12) NOT NULL,
  `002estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `002aeps`
--

INSERT INTO `002aeps` (`002id`, `002desEps`, `002tel`, `002estado`) VALUES
(1, 'Cafesalud', 6510777, 1),
(2, 'Colmédica', 7464646, 1),
(3, 'Compensar', 4441234, 1),
(4, 'Convida ARS', 18000112803, 1),
(5, 'Coomeva EPS', 3906791, 1),
(6, 'Cruz Blanca', 6446100, 1),
(7, 'Famisanar', 3078085, 1),
(8, 'Salud Colmena', 4010447, 1),
(9, 'Salud Total', 4854555, 1),
(10, 'SaludCoop', 5558510, 1),
(11, 'Saludvida', 2088330, 1),
(12, 'Sanitas', 3759000, 1),
(13, 'S.O.S EPS', 4898686, 1),
(14, 'Sura', 4897941, 1),
(15, 'Sisben', 3358000, 1),
(27, 'Colsalud 2 borr', 311457855, 1),
(28, 'Colsalud 3', 545444545, 1),
(29, 'Colsalud 4 ', 2325252525, 1),
(30, 'Colsalud nu bor', 26734524, 1),
(31, 'Compesar', 23, 1),
(32, 'Sdfs', 345345, 1),
(33, 'Caca', 123, 1),
(34, 'As12', 12, 1),
(35, 'Borrar de la li', 324234, 1),
(36, 'Nueva eps borra', 8923744, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `003aestadocivil`
--

CREATE TABLE `003aestadocivil` (
  `003id` int(1) NOT NULL,
  `003desEsCivil` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `003aestadocivil`
--

INSERT INTO `003aestadocivil` (`003id`, `003desEsCivil`) VALUES
(1, 'Soltero'),
(2, 'Casado'),
(3, 'divorciado'),
(4, 'viudo'),
(5, 'Padre/madre'),
(6, 'Hijo/Hija'),
(7, 'Otro...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `004apais`
--

CREATE TABLE `004apais` (
  `004id` int(3) NOT NULL,
  `004desPais` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `004apais`
--

INSERT INTO `004apais` (`004id`, `004desPais`) VALUES
(1, 'Colombia'),
(2, 'Ecuador'),
(3, 'Perú'),
(4, 'Bolivia'),
(5, 'Venezuela'),
(6, 'Otro...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `005adepartamento`
--

CREATE TABLE `005adepartamento` (
  `005id` int(2) NOT NULL,
  `005desDepartamento` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `005pais` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `005adepartamento`
--

INSERT INTO `005adepartamento` (`005id`, `005desDepartamento`, `005pais`) VALUES
(1, 'Bogotá D.C.', 1),
(2, 'Cundinamarca', 1),
(3, 'Antioquia', 1),
(4, 'Meta', 1),
(5, 'Boyacá', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `006aciudad`
--

CREATE TABLE `006aciudad` (
  `006id` int(3) NOT NULL,
  `006desCiudad` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `006departamento` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `006aciudad`
--

INSERT INTO `006aciudad` (`006id`, `006desCiudad`, `006departamento`) VALUES
(1, 'Acacias', 4),
(2, 'Barranca de Upía', 4),
(3, 'Cabuyaro', 4),
(4, 'Castilla La Nueva', 4),
(5, 'Cumaral', 4),
(6, 'El Calvario', 4),
(7, 'El Castillo', 4),
(8, 'El Dorado', 4),
(9, 'Fuente de Oro', 4),
(10, 'Granada', 4),
(11, 'Guamal', 4),
(12, 'La Macarena', 4),
(13, 'La Uribe', 4),
(14, 'Lejanías', 4),
(15, 'Mapiripán', 4),
(16, 'Mesetas', 4),
(17, 'Puerto Concordia', 4),
(18, 'Puerto Gaitán', 4),
(19, 'Puerto Lleras', 4),
(20, 'Puerto López', 4),
(21, 'Puerto Rico', 4),
(22, 'Restrepo', 4),
(23, 'San Carlos de Guaroa', 4),
(24, 'San Juan de Arama', 4),
(25, 'San Juanito', 4),
(26, 'San Luis de Cubarral', 4),
(27, 'San Martín', 4),
(28, 'Villavicencio', 4),
(29, 'Vista Hermosa', 4),
(30, 'Abejorral', 3),
(31, 'Abriaquí', 3),
(32, 'Alejandría', 3),
(33, 'Amagá', 3),
(34, 'Amalfi', 3),
(35, 'Andes', 3),
(36, 'Angelopolis', 3),
(37, 'Angostura', 3),
(38, 'Anori', 3),
(39, 'Anzá', 3),
(40, 'Apartadó', 3),
(41, 'Arboletes', 3),
(42, 'Argelia', 3),
(43, 'Armenia', 3),
(44, 'Barbosa', 3),
(45, 'Bello', 3),
(46, 'Belmira', 3),
(47, 'Betania', 3),
(48, 'Betulia', 3),
(49, 'Briceño', 3),
(50, 'Buritica', 3),
(51, 'Caicedo', 3),
(52, 'Caldas', 3),
(53, 'Campamento', 3),
(54, 'Caracolí', 3),
(55, 'Caramanta', 3),
(56, 'Carepa', 3),
(57, 'Carmen de Viboral', 3),
(58, 'Carolina', 3),
(59, 'Caucasia', 3),
(60, 'Cañasgordas', 3),
(61, 'Chigorodo', 3),
(62, 'Cisneros', 3),
(63, 'Ciudad Bolívar', 3),
(64, 'Cocorná', 3),
(65, 'Concepción', 3),
(66, 'Concordia', 3),
(67, 'Copacabana', 3),
(68, 'Cáceres', 3),
(69, 'Dabeiba', 3),
(70, 'Don Matías', 3),
(71, 'Ebéjico', 3),
(72, 'El Bagre', 3),
(73, 'Entrerríos', 3),
(74, 'Envigado', 3),
(75, 'Fredonia', 3),
(76, 'Frontino', 3),
(77, 'Giraldo', 3),
(78, 'Girardota', 3),
(79, 'Granada', 3),
(80, 'Guadalupe', 3),
(81, 'Guarne', 3),
(82, 'Guatapé', 3),
(83, 'Gómez Plata', 3),
(84, 'Heliconia', 3),
(85, 'Hispania', 3),
(86, 'Itagüí', 3),
(87, 'Ituango', 3),
(88, 'Jardín', 3),
(89, 'Jericó', 3),
(90, 'La Ceja', 3),
(91, 'La Estrella', 3),
(92, 'La Magdalena', 3),
(93, 'La Pintada', 3),
(94, 'La Unión', 3),
(95, 'Liborina', 3),
(96, 'Maceo', 3),
(97, 'Marinilla', 3),
(98, 'Medellín', 3),
(99, 'Montebello', 3),
(100, 'Murindo', 3),
(101, 'Mutatá', 3),
(102, 'Nariño', 3),
(103, 'Nechi', 3),
(104, 'Necocli', 3),
(105, 'Olaya', 3),
(106, 'Peque', 3),
(107, 'Peñol', 3),
(108, 'Pueblorrico', 3),
(109, 'Puerto Berrío', 3),
(110, 'Puerto Nare', 3),
(111, 'Puerto Triunfo', 3),
(112, 'Remedios', 3),
(113, 'Retiro', 3),
(114, 'Rionegro', 3),
(115, 'Sabanalarga', 3),
(116, 'Sabaneta', 3),
(117, 'Salgar', 3),
(118, 'San Andrés', 3),
(119, 'San Carlos', 3),
(120, 'San Francisco', 3),
(121, 'San Jerónimo', 3),
(122, 'San José de la Montaña', 3),
(123, 'San Juan de Urabá', 3),
(124, 'San Luis', 3),
(125, 'San Pedro de Urabá', 3),
(126, 'San Pedro de los Milagros', 3),
(127, 'San Rafael', 3),
(128, 'San Roque', 3),
(129, 'San Vicente', 3),
(130, 'Santa Bárbara', 3),
(131, 'Santa Rosa de Osos', 3),
(132, 'Santafé de Antioquia', 3),
(133, 'Santo Domingo', 3),
(134, 'Santuario', 3),
(135, 'Segovia', 3),
(136, 'Sonsón', 3),
(137, 'Sopetrán', 3),
(138, 'Taraza', 3),
(139, 'Tarso', 3),
(140, 'Titiribí', 3),
(141, 'Toledo', 3),
(142, 'Turbo', 3),
(143, 'Támesis', 3),
(144, 'Uramita', 3),
(145, 'Urrao', 3),
(146, 'Valdivia', 3),
(147, 'Valparaiso', 3),
(148, 'Vegachi', 3),
(149, 'Venecia', 3),
(150, 'Vigía del Fuerte', 3),
(151, 'Yali', 3),
(152, 'Yarumal', 3),
(153, 'Yolombó', 3),
(154, 'Yondó', 3),
(155, 'Zaragoza', 3),
(156, 'Albán ', 2),
(157, 'Anapoima ', 2),
(158, 'Anolaima ', 2),
(159, 'Arbelaez ', 2),
(160, 'Beltrán ', 2),
(161, 'Bituima ', 2),
(162, 'Bojacá ', 2),
(163, 'Cabrera ', 2),
(164, 'Cachipay ', 2),
(165, 'Cajica ', 2),
(166, 'Caparrapí ', 2),
(167, 'Caqueza ', 2),
(168, 'Carmen de Carupa ', 2),
(169, 'Chaguaní ', 2),
(170, 'Chia ', 2),
(171, 'Chipaqué ', 2),
(172, 'Choachí ', 2),
(173, 'Chocontá ', 2),
(174, 'Cogua ', 2),
(175, 'Cota ', 2),
(176, 'Cucunubá ', 2),
(177, 'El Colegio ', 2),
(178, 'El Peñón ', 2),
(179, 'El Rosal ', 2),
(180, 'Facatativá ', 2),
(181, 'Fomeque ', 2),
(182, 'Fosca ', 2),
(183, 'Funza ', 2),
(184, 'Fuquene ', 2),
(185, 'Fusagasugá ', 2),
(186, 'Gachalá ', 2),
(187, 'Gachancipá ', 2),
(188, 'Gachetá ', 2),
(189, 'Gama ', 2),
(190, 'Girardot ', 2),
(191, 'Granada ', 2),
(192, 'Guacheta ', 2),
(193, 'Guaduas ', 2),
(194, 'Guasca ', 2),
(195, 'Guataqui ', 2),
(196, 'Guatavita ', 2),
(197, 'Guayabal de Siquima ', 2),
(198, 'Guayabetal ', 2),
(199, 'Gutiérrez ', 2),
(200, 'Jerusalén ', 2),
(201, 'Junín ', 2),
(202, 'La Calera ', 2),
(203, 'La Mesa ', 2),
(204, 'La Palma ', 2),
(205, 'La Peña ', 2),
(206, 'La Vega ', 2),
(207, 'Lenguazaque ', 2),
(208, 'Machetá ', 2),
(209, 'Madrid ', 2),
(210, 'Manta ', 2),
(211, 'Medina ', 2),
(212, 'Mosquera ', 2),
(213, 'Nariño ', 2),
(214, 'Nemocón ', 2),
(215, 'Nilo ', 2),
(216, 'Nimaima ', 2),
(217, 'Nocaima ', 2),
(218, 'Ospina Pérez (Venecia) ', 2),
(219, 'Pacho ', 2),
(220, 'Paime ', 2),
(221, 'Pandi ', 2),
(222, 'Paratebueno ', 2),
(223, 'Pasca ', 2),
(224, 'Puerto Salgar ', 2),
(225, 'Puli ', 2),
(226, 'Quebradanegra ', 2),
(227, 'Quetame ', 2),
(228, 'Quipile ', 2),
(229, 'Rafael Reyes (Apulo) ', 2),
(230, 'Ricaurte ', 2),
(231, 'San Antonio de Tequendama ', 2),
(232, 'San Bernando ', 2),
(233, 'San Cayetano ', 2),
(234, 'San Francisco ', 2),
(235, 'San Juan de Rioseco ', 2),
(236, 'Sasaima ', 2),
(237, 'Sesquilé ', 2),
(238, 'Sibaté ', 2),
(239, 'Silvania ', 2),
(240, 'Simijaca ', 2),
(241, 'Soacha ', 2),
(242, 'Sopó ', 2),
(243, 'Subachoque ', 2),
(244, 'Suesca ', 2),
(245, 'Supatá ', 2),
(246, 'Susa ', 2),
(247, 'Sutatausa ', 2),
(248, 'Tabio ', 2),
(249, 'Tausa ', 2),
(250, 'Tena ', 2),
(251, 'Tenjo ', 2),
(252, 'Tibacuy ', 2),
(253, 'Tibirita ', 2),
(254, 'Tocaima ', 2),
(255, 'Tocancipá ', 2),
(256, 'Topaipí ', 2),
(257, 'Ubalá ', 2),
(258, 'Ubaque ', 2),
(259, 'Ubaté ', 2),
(260, 'Une ', 2),
(261, 'Vergara ', 2),
(262, 'Viani ', 2),
(263, 'Villagomez ', 2),
(264, 'Villapinzón ', 2),
(265, 'Villeta ', 2),
(266, 'Viotá ', 2),
(267, 'Yacopí ', 2),
(268, 'Zipacón ', 2),
(269, 'Zipaquirá ', 2),
(270, 'Útica ', 2),
(271, 'Almeida', 5),
(272, 'Aquitania (Pueblo Viejo)', 5),
(273, 'Arcabuco', 5),
(274, 'Belén', 5),
(275, 'Berbeo', 5),
(276, 'Beteitiva', 5),
(277, 'Boavita', 5),
(278, 'Boyacá', 5),
(279, 'Briceño', 5),
(280, 'Buenavista', 5),
(281, 'Busbanza', 5),
(282, 'Caldas', 5),
(283, 'Campohermoso', 5),
(284, 'Cerinza', 5),
(285, 'Chinavita', 5),
(286, 'Chiquinquirá', 5),
(287, 'Chiquiza', 5),
(288, 'Chiscas', 5),
(289, 'Chita', 5),
(290, 'Chitaraque', 5),
(291, 'Chivatá', 5),
(292, 'Chivor', 5),
(293, 'Ciénaga', 5),
(294, 'Combita', 5),
(295, 'Coper', 5),
(296, 'Corrales', 5),
(297, 'Covarachia', 5),
(298, 'Cubará', 5),
(299, 'Cucaita', 5),
(300, 'Cuitiva', 5),
(301, 'Duitama', 5),
(302, 'El Cocuy', 5),
(303, 'El Espino', 5),
(304, 'Firavitoba', 5),
(305, 'Floresta', 5),
(306, 'Gachantivá', 5),
(307, 'Gameza', 5),
(308, 'Garagoa', 5),
(309, 'Guacamayas', 5),
(310, 'Guateque', 5),
(311, 'Guayatá', 5),
(312, 'Guican', 5),
(313, 'Iza', 5),
(314, 'Jenesano', 5),
(315, 'Jericó', 5),
(316, 'La Capilla', 5),
(317, 'La Uvita', 5),
(318, 'La Victoria', 5),
(319, 'Labranzagrande', 5),
(320, 'Los Cedros', 5),
(321, 'Macanal', 5),
(322, 'Maripi', 5),
(323, 'Miraflores', 5),
(324, 'Mongua', 5),
(325, 'Monguí', 5),
(326, 'Moniquirá', 5),
(327, 'Motavita', 5),
(328, 'Muzo', 5),
(329, 'Nobsa', 5),
(330, 'Nuevo Colón', 5),
(331, 'Oicata', 5),
(332, 'Otanche', 5),
(333, 'Pachavitá', 5),
(334, 'Paez', 5),
(335, 'Paipa', 5),
(336, 'Pajarito', 5),
(337, 'Panqueva', 5),
(338, 'Pauna', 5),
(339, 'Paya', 5),
(340, 'Paz de Río', 5),
(341, 'Pesca', 5),
(342, 'Pisva', 5),
(343, 'Puerto Boyacá', 5),
(344, 'Quipama', 5),
(345, 'Ramiriquí', 5),
(346, 'Rondón', 5),
(347, 'Ráquira', 5),
(348, 'Saboya', 5),
(349, 'Samacá', 5),
(350, 'San Eduardo', 5),
(351, 'San José de Pare', 5),
(352, 'San Luis de Gaceno', 5),
(353, 'San Mateo', 5),
(354, 'San Miguel de Sema', 5),
(355, 'SanPablo de Borbur', 5),
(356, 'Santa Rosa de Viterbo', 5),
(357, 'Santa Sofía', 5),
(358, 'Santamaría', 5),
(359, 'Santana', 5),
(360, 'Sativanorte', 5),
(361, 'Sativasur', 5),
(362, 'Siachoque', 5),
(363, 'Soata', 5),
(364, 'Socha', 5),
(365, 'Socota', 5),
(366, 'Sogamoso', 5),
(367, 'Somondoco', 5),
(368, 'Sora', 5),
(369, 'Soraca', 5),
(370, 'Sotaquirá', 5),
(371, 'Susacón', 5),
(372, 'Sutamarchán', 5),
(373, 'Sutatenza', 5),
(374, 'Sáchica', 5),
(375, 'Tasco', 5),
(376, 'Tenza', 5),
(377, 'Tibaná', 5),
(378, 'Tibasosa', 5),
(379, 'Tinjacá', 5),
(380, 'Tipacoque', 5),
(381, 'Toca', 5),
(382, 'Togui', 5),
(383, 'Topaga', 5),
(384, 'Tota', 5),
(385, 'Tunja', 5),
(386, 'Tunungua', 5),
(387, 'Turmequé', 5),
(388, 'Tuta', 5),
(389, 'Tutasa', 5),
(390, 'Umbita', 5),
(391, 'Ventaquemada', 5),
(392, 'Villa de Leyva', 5),
(393, 'Viracacha', 5),
(394, 'Zetaquirá', 5),
(395, 'Bogotá', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `007ausuarios`
--

CREATE TABLE `007ausuarios` (
  `007id` bigint(20) NOT NULL,
  `007nombreUsu` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `007claveUsu` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `007rolUsu` int(2) NOT NULL,
  `007correoUsu` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `007keypass` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '',
  `007newpass` varchar(50) COLLATE utf8_spanish2_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `007ausuarios`
--

INSERT INTO `007ausuarios` (`007id`, `007nombreUsu`, `007claveUsu`, `007rolUsu`, `007correoUsu`, `007keypass`, `007newpass`) VALUES
(112, '123456', '123456', 1, 'ccromero581@misena.edu.co', '', ''),
(127, '1012452185', 'b1c347056056b4ad965f1424f5645563', 4, 'ccromero581@misena.edu.co', '', ''),
(128, '4007742', '70a46b1611b24546b52154bde139ead9', 5, 'nijttuyyh@jb.bc', '', ''),
(129, '31485547032', 'a89f3567cac3af9d6ccc3fbaffdc2109', 5, 'dydt@tsd.cf', '', ''),
(130, 'cctomru@jj.xn--ci-zoa', '6218972e0195543312af35857a5f2568', 6, 'cctomru@jj.xn--ci-zoa', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `008adirectivas`
--

CREATE TABLE `008adirectivas` (
  `008id` bigint(11) NOT NULL,
  `008nombres` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `008apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `008fecNacimiento` date NOT NULL,
  `008genero` int(1) NOT NULL,
  `008estaCivil` int(1) NOT NULL,
  `008fechaIngreso` date NOT NULL,
  `008email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `008celular` bigint(12) NOT NULL,
  `008eps` int(2) NOT NULL,
  `008telFijo` int(8) NOT NULL,
  `008direccion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `008barrio` int(4) NOT NULL,
  `008nomAcu` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `008apelAcu` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `008celAcu` bigint(12) NOT NULL,
  `008fijoAcu` int(8) NOT NULL,
  `008jornada` int(1) NOT NULL,
  `008documento` bigint(20) NOT NULL,
  `008rol` int(1) NOT NULL,
  `008tipDocumento` int(1) NOT NULL,
  `008estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `008adirectivas`
--

INSERT INTO `008adirectivas` (`008id`, `008nombres`, `008apellidos`, `008fecNacimiento`, `008genero`, `008estaCivil`, `008fechaIngreso`, `008email`, `008celular`, `008eps`, `008telFijo`, `008direccion`, `008barrio`, `008nomAcu`, `008apelAcu`, `008celAcu`, `008fijoAcu`, `008jornada`, `008documento`, `008rol`, `008tipDocumento`, `008estado`) VALUES
(1, 'CrisOmar', 'RomTegon', '1998-01-01', 3, 1, '2017-11-03', 'ccromero581@misena.edu.co', 3113000, 31, 123456, 'calle 27', 2, 'Rubis', 'Romero Pñierpos', 31145734204, 12345684, 1, 123456, 1, 1, 1),
(3, 'Rosita', 'Clara', '1993-10-14', 2, 3, '2017-11-04', 'rosita@gmail.com', 123456654, 7, 54545454, 'calle 48', 4, 'acu rosita', 'ape acu rosita', 23426346346, 34636346, 1, 112233, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `009apermisos`
--

CREATE TABLE `009apermisos` (
  `009id` int(1) NOT NULL,
  `009desUsu` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `009apermisos`
--

INSERT INTO `009apermisos` (`009id`, `009desUsu`) VALUES
(1, 'super'),
(2, 'secretaria'),
(3, 'profesor'),
(4, 'alumno'),
(5, 'padres'),
(6, 'acudiente'),
(7, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0010abarrio`
--

CREATE TABLE `0010abarrio` (
  `0010id` int(4) NOT NULL,
  `0010desBarrio` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `0010ciudad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0010abarrio`
--

INSERT INTO `0010abarrio` (`0010id`, `0010desBarrio`, `0010ciudad`) VALUES
(1, 'villa Italia', 241),
(2, 'San mateo', 241),
(3, 'Ricaurte', 241),
(4, 'Las rosas', 272),
(5, 'Villa omar', 272),
(6, 'Villas', 272),
(7, 'Ricaurte', 395),
(8, 'Kennedy', 395),
(9, 'Tierra blanca', 241),
(10, 'Olivos', 241),
(11, 'San francisco', 208),
(12, 'Sumapaz', 241),
(13, 'Borra bario', 241),
(14, 'Ducales', 241),
(15, 'San nicolas', 241),
(16, 'Ciudad latina', 241),
(25, 'Pase real', 241),
(26, 'Borrar d el lis', 241),
(27, 'Borrar de la li', 241);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0011acomuna`
--

CREATE TABLE `0011acomuna` (
  `0011id` int(3) NOT NULL,
  `0011desComuna` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0011acomuna`
--

INSERT INTO `0011acomuna` (`0011id`, `0011desComuna`) VALUES
(1, 'comuna1'),
(2, 'comuna2'),
(3, 'comuna3'),
(4, 'comuna4'),
(5, 'comuna5'),
(6, 'comuna6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0012alog`
--

CREATE TABLE `0012alog` (
  `0012id` bigint(20) NOT NULL,
  `0012idUsu` bigint(20) NOT NULL,
  `0012fecha` date NOT NULL,
  `0012hora` time NOT NULL,
  `0012accion` int(1) NOT NULL,
  `0012dirigido` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0013aacciones`
--

CREATE TABLE `0013aacciones` (
  `0013id` int(1) NOT NULL,
  `0013desAccion` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0014amatriculados`
--

CREATE TABLE `0014amatriculados` (
  `0014id` bigint(20) NOT NULL,
  `0014curso` int(4) NOT NULL,
  `0014documento` bigint(20) NOT NULL,
  `0014sede` int(1) NOT NULL,
  `0014jornada` int(1) NOT NULL,
  `0014estado` int(11) NOT NULL DEFAULT '1',
  `0014anio` year(4) NOT NULL COMMENT 'anio a matricular',
  `0014fechaReg` date NOT NULL COMMENT 'fecha de registro',
  `0014anioActu` year(4) NOT NULL COMMENT 'anioo q esta cursando actualmente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0014amatriculados`
--

INSERT INTO `0014amatriculados` (`0014id`, `0014curso`, `0014documento`, `0014sede`, `0014jornada`, `0014estado`, `0014anio`, `0014fechaReg`, `0014anioActu`) VALUES
(91, 22, 20, 1, 1, 1, 2018, '2018-01-23', 2018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0015ajornada`
--

CREATE TABLE `0015ajornada` (
  `0015id` int(1) NOT NULL,
  `0015desJornada` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0015ajornada`
--

INSERT INTO `0015ajornada` (`0015id`, `0015desJornada`) VALUES
(1, 'Mañana'),
(2, 'Tarde'),
(3, 'Noche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0016amateria`
--

CREATE TABLE `0016amateria` (
  `0016id` int(2) NOT NULL,
  `0016desMateria` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `0016codArea` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0016amateria`
--

INSERT INTO `0016amateria` (`0016id`, `0016desMateria`, `0016codArea`) VALUES
(1, 'Español', 1),
(2, 'Matematicas', 1),
(5, 'Ingles', 2),
(7, 'Quimina', 1),
(8, 'Sociales', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0017aarea`
--

CREATE TABLE `0017aarea` (
  `0017id` int(2) NOT NULL,
  `0017desArea` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0017aarea`
--

INSERT INTO `0017aarea` (`0017id`, `0017desArea`) VALUES
(1, 'Ciencias '),
(2, 'Idiomas'),
(3, ''),
(4, 'Ciencias sociales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0018abloque`
--

CREATE TABLE `0018abloque` (
  `0018id` int(2) NOT NULL,
  `0018desBloque` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0018abloque`
--

INSERT INTO `0018abloque` (`0018id`, `0018desBloque`) VALUES
(1, '1'),
(2, '2'),
(3, '1-2'),
(4, '3'),
(5, '4'),
(6, '3-4'),
(7, '5'),
(8, '6'),
(9, '5-6'),
(10, '2-3'),
(11, '4-5'),
(12, '1-2-3-4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0019atipdocumento`
--

CREATE TABLE `0019atipdocumento` (
  `0019id` int(1) NOT NULL,
  `0019desTipo` varchar(5) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0019atipdocumento`
--

INSERT INTO `0019atipdocumento` (`0019id`, `0019desTipo`) VALUES
(1, 'C.C'),
(2, 'T.I'),
(3, 'C.E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0020acurso`
--

CREATE TABLE `0020acurso` (
  `0020id` int(4) NOT NULL,
  `0020desCurso` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `0020estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0020acurso`
--

INSERT INTO `0020acurso` (`0020id`, `0020desCurso`, `0020estado`) VALUES
(1, '601', 1),
(2, '602', 1),
(3, '603', 1),
(4, '604', 1),
(5, '605', 1),
(6, '701', 1),
(7, '702', 1),
(8, '703', 1),
(9, '704', 1),
(10, '705', 1),
(11, '706', 1),
(12, '801', 1),
(13, '802', 1),
(14, '803', 1),
(15, '804', 1),
(16, '805', 1),
(17, '901', 1),
(18, '902', 1),
(19, '903', 1),
(20, '904', 1),
(21, '1001', 1),
(22, '1002', 1),
(23, '1003', 1),
(24, '1004', 1),
(25, '1005', 1),
(26, '1101', 1),
(27, '1102', 1),
(28, '1103', 1),
(29, '1104', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0021aperiodo`
--

CREATE TABLE `0021aperiodo` (
  `0021id` int(1) NOT NULL,
  `0021desPeriodo` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `0021porcentaje` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0021aperiodo`
--

INSERT INTO `0021aperiodo` (`0021id`, `0021desPeriodo`, `0021porcentaje`) VALUES
(1, '1 Periodo', 25),
(2, '2 Periodo', 25),
(3, '3 Periodo', 25),
(4, '4 Periodo', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0022asede`
--

CREATE TABLE `0022asede` (
  `0022id` int(1) NOT NULL,
  `0022desSede` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0022asede`
--

INSERT INTO `0022asede` (`0022id`, `0022desSede`) VALUES
(1, 'Institución Educativa san Mateo'),
(2, 'Institución Educativa Francisco de Paula Santander');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0023rh`
--

CREATE TABLE `0023rh` (
  `0023id` int(1) NOT NULL,
  `0023desRh` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0023rh`
--

INSERT INTO `0023rh` (`0023id`, `0023desRh`) VALUES
(1, 'O+'),
(2, '0-'),
(3, 'A+'),
(4, 'A-'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB+'),
(8, 'Ab-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0024acupos`
--

CREATE TABLE `0024acupos` (
  `0024id` int(11) NOT NULL,
  `0024curso` int(4) NOT NULL,
  `0024cursomax` int(3) NOT NULL,
  `0024anio` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `0024acupos`
--

INSERT INTO `0024acupos` (`0024id`, `0024curso`, `0024cursomax`, `0024anio`) VALUES
(1, 1, 30, 2017),
(2, 1, 45, 2018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0025adirectorcurso`
--

CREATE TABLE `0025adirectorcurso` (
  `0025id` bigint(20) NOT NULL,
  `0025profesor` bigint(20) NOT NULL,
  `0025curso` int(4) NOT NULL,
  `0025anio` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `0026ahorarios`
--

CREATE TABLE `0026ahorarios` (
  `0026id` bigint(20) NOT NULL,
  `0026profesor` bigint(20) NOT NULL,
  `0026curso` bigint(2) DEFAULT NULL,
  `0026fechaDisponible` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `0026hora` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `0026jornada` int(1) NOT NULL,
  `0026observacion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `0026ahorarios`
--

INSERT INTO `0026ahorarios` (`0026id`, `0026profesor`, `0026curso`, `0026fechaDisponible`, `0026hora`, `0026jornada`, `0026observacion`) VALUES
(1, 1, NULL, 'Lunes', '7:00 am a 12:00 pm', 1, 'Si el estudiante no llega a tiempo no me are cargo de la cita'),
(2, 1, NULL, 'Martes', '6:00am a 8:00am', 1, 'Llegar temprano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `100anotas`
--

CREATE TABLE `100anotas` (
  `100IDNOTA` int(11) NOT NULL,
  `100CODCURSO` int(4) NOT NULL,
  `100CODALUMNO` bigint(20) NOT NULL,
  `100CODPERIODO` int(1) NOT NULL,
  `100CODPORCENTAJE` int(11) NOT NULL,
  `100NOTA` decimal(2,1) NOT NULL,
  `100CODMATERIA` int(11) NOT NULL,
  `100idNombreNota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `106aporcentaje`
--

CREATE TABLE `106aporcentaje` (
  `106IDPORCENTAJE` int(11) NOT NULL,
  `106NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `106PORCENTAJE` double NOT NULL,
  `106CODCURSO` int(4) NOT NULL,
  `106CODMATERIA` int(2) NOT NULL,
  `106CODPROFESOR` bigint(20) NOT NULL,
  `106CODPERIODO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `106aporcentaje`
--

INSERT INTO `106aporcentaje` (`106IDPORCENTAJE`, `106NOMBRE`, `106PORCENTAJE`, `106CODCURSO`, `106CODMATERIA`, `106CODPROFESOR`, `106CODPERIODO`) VALUES
(1, 'dhhv', 0, 27, 5, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `108anombrenotas`
--

CREATE TABLE `108anombrenotas` (
  `108id` int(11) NOT NULL,
  `108nombreNota` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `108codprofe` bigint(20) NOT NULL,
  `108codMateria` int(2) NOT NULL,
  `108codCurso` int(4) NOT NULL,
  `108codPeriodo` int(1) NOT NULL,
  `108codGrupoNota` int(11) NOT NULL,
  `108Anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `108anombrenotas`
--

INSERT INTO `108anombrenotas` (`108id`, `108nombreNota`, `108codprofe`, `108codMateria`, `108codCurso`, `108codPeriodo`, `108codGrupoNota`, `108Anio`) VALUES
(1, 'N1', 1, 5, 1, 1, 1, 2017),
(2, 'A', 1, 5, 1, 2, 1, 2017),
(5, 'nota 1', 1, 1, 1, 1, 1, 2017),
(6, 'nota 1', 1, 1, 1, 2, 1, 2017),
(7, 'nota 1', 1, 1, 1, 1, 1, 2017),
(8, 'nota 1', 1, 1, 1, 3, 1, 2017),
(9, 'NOTAS', 1, 1, 1, 3, 1, 2017),
(10, 'nota 1', 1, 1, 1, 4, 1, 2017),
(11, 'nota 1', 1, 1, 1, 3, 1, 2017),
(12, 'nota 1', 1, 1, 1, 3, 1, 2017),
(13, 'VCXBFSD', 1, 1, 1, 3, 1, 2017),
(14, 'tarea matematicas', 1, 1, 1, 1, 1, 2017),
(15, 'tarea matematicas', 1, 1, 1, 1, 1, 2017),
(16, 'tarea matematicas', 1, 1, 1, 1, 1, 2017),
(17, 'Tarea 2', 1, 1, 1, 1, 1, 2017),
(18, '', 1, 1, 1, 1, 1, 2017),
(19, 'Thalia', 1, 1, 1, 1, 1, 2017),
(20, 'Thalia', 1, 1, 1, 1, 1, 2017),
(21, 'iuuiu', 1, 1, 1, 1, 1, 2017),
(22, 'HHHHH', 1, 1, 1, 1, 1, 2017),
(23, 'Nota ral', 1, 1, 1, 1, 1, 2017),
(24, 'ddvsv', 1, 1, 1, 1, 1, 2017),
(25, 'Taller 06 de noviembre', 1, 1, 1, 1, 1, 2017),
(26, 'Th', 1, 1, 1, 1, 1, 2017),
(27, 'Nota 12', 1, 1, 1, 1, 1, 2017),
(28, 'Nota 13', 1, 1, 1, 1, 1, 2017),
(29, 'fe', 1, 1, 1, 1, 1, 2017),
(30, 'vv', 1, 1, 1, 1, 1, 2017),
(31, 'xzx', 1, 1, 1, 1, 1, 2017),
(32, 'xx', 1, 1, 1, 1, 1, 2017),
(33, 'dddd', 1, 1, 1, 1, 1, 2017),
(34, 'ccc', 1, 1, 1, 1, 1, 2017),
(35, 'fff', 1, 1, 1, 1, 1, 2017),
(36, 'Tttt', 1, 1, 1, 1, 1, 2017),
(37, 'fff', 1, 1, 1, 1, 1, 2017),
(38, 'fff', 1, 1, 1, 1, 1, 2017),
(39, 'Tttf', 1, 1, 1, 1, 1, 2017),
(40, 'Taller 56', 1, 1, 1, 1, 1, 2017),
(41, 'Taller 8 de novimebw', 1, 1, 1, 1, 1, 2017),
(42, 'Thaliamm', 1, 1, 1, 1, 1, 2017),
(43, 'Nota thalia', 1, 1, 1, 1, 1, 2017),
(44, 'Npppp', 1, 1, 1, 1, 1, 2017),
(45, 'Nota mate prueba local por wifi', 1, 1, 1, 1, 1, 2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1010aboletines`
--

CREATE TABLE `1010aboletines` (
  `1010id` int(11) NOT NULL,
  `1010codAlumno` bigint(20) NOT NULL,
  `1010p1` decimal(3,1) NOT NULL DEFAULT '0.0',
  `1010p2` decimal(2,1) NOT NULL DEFAULT '0.0',
  `1010p3` decimal(2,1) NOT NULL DEFAULT '0.0',
  `1010p4` decimal(2,1) NOT NULL DEFAULT '0.0',
  `1010definitiva` decimal(2,1) NOT NULL DEFAULT '0.0',
  `1010curso` int(4) NOT NULL,
  `1010materia` int(2) NOT NULL,
  `1010anio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1011apro_cur_mat`
--

CREATE TABLE `1011apro_cur_mat` (
  `1011id` bigint(11) NOT NULL,
  `1011idprofesor` bigint(20) NOT NULL,
  `1011idmateria` int(2) NOT NULL,
  `1011idcurso` int(4) NOT NULL,
  `1011ih` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `1011apro_cur_mat`
--

INSERT INTO `1011apro_cur_mat` (`1011id`, `1011idprofesor`, `1011idmateria`, `1011idcurso`, `1011ih`) VALUES
(1, 1, 1, 1, 2),
(3, 1, 5, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1012ffl`
--

CREATE TABLE `1012ffl` (
  `1012id` int(11) NOT NULL,
  `1012curso` int(4) NOT NULL,
  `1012materia` int(2) NOT NULL,
  `1012periodo` int(1) NOT NULL,
  `1012codAlumno` bigint(20) NOT NULL,
  `1012fallas` int(11) DEFAULT '0',
  `1012felicitaciones` int(11) DEFAULT '0',
  `1012llamados_atencion` int(11) DEFAULT '0',
  `1012observaciones` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1013aconstancias`
--

CREATE TABLE `1013aconstancias` (
  `1013id` int(11) NOT NULL,
  `1013idMatricula` bigint(20) NOT NULL,
  `1013entregado` date DEFAULT NULL,
  `1013anio` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1014anotasdefinitivas`
--

CREATE TABLE `1014anotasdefinitivas` (
  `1014id` bigint(20) NOT NULL,
  `1014codigoalumno` bigint(20) NOT NULL,
  `1014curso` int(4) NOT NULL,
  `1014periodo` int(11) NOT NULL,
  `1014cantidadmaterias` int(11) NOT NULL,
  `1014fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2000aasistenciadetalles`
--

CREATE TABLE `2000aasistenciadetalles` (
  `2000id` bigint(20) NOT NULL,
  `2000documento` bigint(20) NOT NULL,
  `2000documentoP` bigint(20) NOT NULL,
  `2000anio` year(4) NOT NULL,
  `2000mes` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2000fecha` date NOT NULL,
  `2000hora` time NOT NULL,
  `2000bloque` int(2) NOT NULL,
  `2000materia` int(2) NOT NULL,
  `2000descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `2000periodo` int(1) NOT NULL,
  `2000tarde` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `2000uniforme` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `2000falla` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `2000evasion` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `2000observacion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `2000curso` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2001aasistenciasemana`
--

CREATE TABLE `2001aasistenciasemana` (
  `2001id` bigint(20) NOT NULL,
  `2001idSemana` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001curso` int(4) NOT NULL,
  `2001mes` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001anio` year(4) NOT NULL,
  `2001idAlumno` bigint(20) NOT NULL,
  `2001periodo` int(1) NOT NULL,
  `2001lh1` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001lh2` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001lh3` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001lh4` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001lh5` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001lh6` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mh1` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mh2` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mh3` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mh4` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mh5` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mh6` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mih1` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mih2` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mih3` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mih4` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mih5` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001mih6` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001jh1` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001jh2` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001jh3` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001jh4` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001jh5` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001jh6` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001vh1` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001vh2` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001vh3` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001vh4` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001vh5` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `2001vh6` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2002aasistenciajustificada`
--

CREATE TABLE `2002aasistenciajustificada` (
  `2002id` bigint(20) NOT NULL,
  `2002idAlumno` bigint(20) NOT NULL,
  `2002idProfe` bigint(20) NOT NULL,
  `2002evidencia` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `2002observacion` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `2002fechaFalla` date NOT NULL,
  `2002fechaJustificada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `3000aobservacionperiodo`
--

CREATE TABLE `3000aobservacionperiodo` (
  `3000id` bigint(20) NOT NULL,
  `3000materia` int(2) NOT NULL,
  `3000documento` bigint(20) NOT NULL,
  `3000periodo` int(1) NOT NULL,
  `3000fecha` date NOT NULL,
  `3000mes` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `3000anio` year(4) NOT NULL,
  `3000hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `3001anotasfelicitacion`
--

CREATE TABLE `3001anotasfelicitacion` (
  `3001id` bigint(20) NOT NULL,
  `3001fecha` date NOT NULL,
  `3001documento` bigint(20) NOT NULL,
  `3001desFelicitacion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `3002acaramelo`
--

CREATE TABLE `3002acaramelo` (
  `3002id` bigint(20) NOT NULL,
  `3002motivo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `3002descargo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `3002faltaAlManual` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `3002estrategia` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `3002fecha` date NOT NULL,
  `3002anio` year(4) NOT NULL,
  `3002documentoE` bigint(20) NOT NULL,
  `3002documentoP` bigint(20) NOT NULL,
  `3002fechacitacion` date NOT NULL,
  `3002citacion` enum('si','no') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'no' COMMENT 'Estado de la citacion si fue o no fue citado',
  `3002asistio` enum('si','no') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesprogramadores`
--

CREATE TABLE `mensajesprogramadores` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajesprogramadores`
--

INSERT INTO `mensajesprogramadores` (`id`, `descripcion`) VALUES
(1, 'En este campo ingresamos los cambios q vamos hacer frente  a al base de datos, cual quier modificacion recuerde comentarla. :) (y) ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRUEBABORRAR`
--

CREATE TABLE `PRUEBABORRAR` (
  `id_p` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PRUEBABORRAR`
--

INSERT INTO `PRUEBABORRAR` (`id_p`, `nombre`) VALUES
(1, 'Si funciona esto esta genial att(omar)'),
(2, 'Si funciona esto esta genial att(omar)');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `000aalumno`
--
ALTER TABLE `000aalumno`
  ADD PRIMARY KEY (`000id`,`000documento`),
  ADD KEY `000tipDocumento` (`000tipDocumento`),
  ADD KEY `000genero` (`000genero`),
  ADD KEY `000eps` (`000eps`),
  ADD KEY `000barrio` (`000barrio`),
  ADD KEY `000rh` (`000rh`),
  ADD KEY `000tipDocPad` (`000tipDocPad`),
  ADD KEY `000tipDocMad` (`000tipDocMad`),
  ADD KEY `000documento` (`000documento`);

--
-- Indices de la tabla `001agenero`
--
ALTER TABLE `001agenero`
  ADD PRIMARY KEY (`001id`);

--
-- Indices de la tabla `002aeps`
--
ALTER TABLE `002aeps`
  ADD PRIMARY KEY (`002id`);

--
-- Indices de la tabla `003aestadocivil`
--
ALTER TABLE `003aestadocivil`
  ADD PRIMARY KEY (`003id`);

--
-- Indices de la tabla `004apais`
--
ALTER TABLE `004apais`
  ADD PRIMARY KEY (`004id`);

--
-- Indices de la tabla `005adepartamento`
--
ALTER TABLE `005adepartamento`
  ADD PRIMARY KEY (`005id`),
  ADD KEY `005pais` (`005pais`);

--
-- Indices de la tabla `006aciudad`
--
ALTER TABLE `006aciudad`
  ADD PRIMARY KEY (`006id`),
  ADD KEY `006departamento` (`006departamento`);

--
-- Indices de la tabla `007ausuarios`
--
ALTER TABLE `007ausuarios`
  ADD PRIMARY KEY (`007id`),
  ADD KEY `007rolUsu` (`007rolUsu`);

--
-- Indices de la tabla `008adirectivas`
--
ALTER TABLE `008adirectivas`
  ADD PRIMARY KEY (`008id`),
  ADD KEY `008genero` (`008genero`),
  ADD KEY `008estaCivil` (`008estaCivil`),
  ADD KEY `008eps` (`008eps`),
  ADD KEY `008barrio` (`008barrio`),
  ADD KEY `008jornada` (`008jornada`),
  ADD KEY `008rol` (`008rol`),
  ADD KEY `008tipDocumento` (`008tipDocumento`);

--
-- Indices de la tabla `009apermisos`
--
ALTER TABLE `009apermisos`
  ADD PRIMARY KEY (`009id`);

--
-- Indices de la tabla `0010abarrio`
--
ALTER TABLE `0010abarrio`
  ADD PRIMARY KEY (`0010id`),
  ADD KEY `0010ciudad` (`0010ciudad`);

--
-- Indices de la tabla `0011acomuna`
--
ALTER TABLE `0011acomuna`
  ADD PRIMARY KEY (`0011id`);

--
-- Indices de la tabla `0012alog`
--
ALTER TABLE `0012alog`
  ADD PRIMARY KEY (`0012id`),
  ADD KEY `0012accion` (`0012accion`),
  ADD KEY `0012dirigido` (`0012dirigido`);

--
-- Indices de la tabla `0013aacciones`
--
ALTER TABLE `0013aacciones`
  ADD PRIMARY KEY (`0013id`);

--
-- Indices de la tabla `0014amatriculados`
--
ALTER TABLE `0014amatriculados`
  ADD PRIMARY KEY (`0014id`),
  ADD KEY `0014curso` (`0014curso`),
  ADD KEY `0014documento` (`0014documento`),
  ADD KEY `0014sede` (`0014sede`),
  ADD KEY `0014jornada` (`0014jornada`);

--
-- Indices de la tabla `0015ajornada`
--
ALTER TABLE `0015ajornada`
  ADD PRIMARY KEY (`0015id`);

--
-- Indices de la tabla `0016amateria`
--
ALTER TABLE `0016amateria`
  ADD PRIMARY KEY (`0016id`),
  ADD KEY `0016codArea` (`0016codArea`);

--
-- Indices de la tabla `0017aarea`
--
ALTER TABLE `0017aarea`
  ADD PRIMARY KEY (`0017id`);

--
-- Indices de la tabla `0018abloque`
--
ALTER TABLE `0018abloque`
  ADD PRIMARY KEY (`0018id`);

--
-- Indices de la tabla `0019atipdocumento`
--
ALTER TABLE `0019atipdocumento`
  ADD PRIMARY KEY (`0019id`);

--
-- Indices de la tabla `0020acurso`
--
ALTER TABLE `0020acurso`
  ADD PRIMARY KEY (`0020id`);

--
-- Indices de la tabla `0021aperiodo`
--
ALTER TABLE `0021aperiodo`
  ADD PRIMARY KEY (`0021id`);

--
-- Indices de la tabla `0022asede`
--
ALTER TABLE `0022asede`
  ADD PRIMARY KEY (`0022id`);

--
-- Indices de la tabla `0023rh`
--
ALTER TABLE `0023rh`
  ADD PRIMARY KEY (`0023id`);

--
-- Indices de la tabla `0024acupos`
--
ALTER TABLE `0024acupos`
  ADD PRIMARY KEY (`0024id`),
  ADD KEY `0024curso` (`0024curso`);

--
-- Indices de la tabla `0025adirectorcurso`
--
ALTER TABLE `0025adirectorcurso`
  ADD PRIMARY KEY (`0025id`),
  ADD KEY `0025profesor` (`0025profesor`),
  ADD KEY `0025curso` (`0025curso`);

--
-- Indices de la tabla `0026ahorarios`
--
ALTER TABLE `0026ahorarios`
  ADD PRIMARY KEY (`0026id`),
  ADD KEY `0026profesor` (`0026profesor`),
  ADD KEY `0026curso` (`0026curso`),
  ADD KEY `0026jornada` (`0026jornada`),
  ADD KEY `0026jornada_2` (`0026jornada`);

--
-- Indices de la tabla `100anotas`
--
ALTER TABLE `100anotas`
  ADD PRIMARY KEY (`100IDNOTA`),
  ADD KEY `100CODCURSO` (`100CODCURSO`),
  ADD KEY `100CODALUMNO` (`100CODALUMNO`),
  ADD KEY `100CODPERIODO` (`100CODPERIODO`),
  ADD KEY `100CODPORCENTAJE` (`100CODPORCENTAJE`),
  ADD KEY `100CODAREA` (`100CODMATERIA`),
  ADD KEY `100CODCURSO_2` (`100CODCURSO`),
  ADD KEY `100idNombreNota` (`100idNombreNota`);

--
-- Indices de la tabla `106aporcentaje`
--
ALTER TABLE `106aporcentaje`
  ADD PRIMARY KEY (`106IDPORCENTAJE`),
  ADD KEY `106CODCURSO` (`106CODCURSO`,`106CODMATERIA`,`106CODPROFESOR`,`106CODPERIODO`),
  ADD KEY `106CODPERIODO` (`106CODPERIODO`),
  ADD KEY `106CODMATERIA` (`106CODMATERIA`),
  ADD KEY `106CODPROFESOR` (`106CODPROFESOR`);

--
-- Indices de la tabla `108anombrenotas`
--
ALTER TABLE `108anombrenotas`
  ADD PRIMARY KEY (`108id`),
  ADD KEY `108codprofe` (`108codprofe`),
  ADD KEY `108codMateria` (`108codMateria`),
  ADD KEY `108codCurso` (`108codCurso`),
  ADD KEY `108codPeriodo` (`108codPeriodo`),
  ADD KEY `108GrupoNota` (`108codGrupoNota`);

--
-- Indices de la tabla `1010aboletines`
--
ALTER TABLE `1010aboletines`
  ADD PRIMARY KEY (`1010id`),
  ADD KEY `1010materia` (`1010materia`),
  ADD KEY `1010curso` (`1010curso`),
  ADD KEY `1010codAlumno` (`1010codAlumno`);

--
-- Indices de la tabla `1011apro_cur_mat`
--
ALTER TABLE `1011apro_cur_mat`
  ADD PRIMARY KEY (`1011id`),
  ADD KEY `1011idprofesor` (`1011idprofesor`),
  ADD KEY `1011idmateria` (`1011idmateria`),
  ADD KEY `1011idcurso` (`1011idcurso`);

--
-- Indices de la tabla `1012ffl`
--
ALTER TABLE `1012ffl`
  ADD PRIMARY KEY (`1012id`),
  ADD KEY `1012curso` (`1012curso`),
  ADD KEY `1012materia` (`1012materia`),
  ADD KEY `1012codAlumno` (`1012codAlumno`),
  ADD KEY `1012` (`1012periodo`);

--
-- Indices de la tabla `1013aconstancias`
--
ALTER TABLE `1013aconstancias`
  ADD PRIMARY KEY (`1013id`),
  ADD KEY `1013idMatricula` (`1013idMatricula`);

--
-- Indices de la tabla `1014anotasdefinitivas`
--
ALTER TABLE `1014anotasdefinitivas`
  ADD PRIMARY KEY (`1014id`),
  ADD KEY `1014codigoalumno` (`1014codigoalumno`),
  ADD KEY `1014periodo` (`1014periodo`),
  ADD KEY `1014codigoalumno_2` (`1014codigoalumno`),
  ADD KEY `1014curso` (`1014curso`);

--
-- Indices de la tabla `2000aasistenciadetalles`
--
ALTER TABLE `2000aasistenciadetalles`
  ADD PRIMARY KEY (`2000id`),
  ADD KEY `0018documento` (`2000documento`),
  ADD KEY `0018bloque` (`2000bloque`),
  ADD KEY `0018materia` (`2000materia`),
  ADD KEY `0018documentoP` (`2000documentoP`),
  ADD KEY `2000periodo` (`2000periodo`),
  ADD KEY `2000curso` (`2000curso`);

--
-- Indices de la tabla `2001aasistenciasemana`
--
ALTER TABLE `2001aasistenciasemana`
  ADD PRIMARY KEY (`2001id`),
  ADD KEY `0021documento` (`2001idAlumno`),
  ADD KEY `0021periodo` (`2001periodo`),
  ADD KEY `2001curso` (`2001curso`);

--
-- Indices de la tabla `2002aasistenciajustificada`
--
ALTER TABLE `2002aasistenciajustificada`
  ADD PRIMARY KEY (`2002id`),
  ADD KEY `2002idAlumno` (`2002idAlumno`),
  ADD KEY `2002idProfe` (`2002idProfe`);

--
-- Indices de la tabla `3000aobservacionperiodo`
--
ALTER TABLE `3000aobservacionperiodo`
  ADD PRIMARY KEY (`3000id`),
  ADD KEY `0023materia` (`3000materia`),
  ADD KEY `0023documento` (`3000documento`),
  ADD KEY `0023periodo` (`3000periodo`);

--
-- Indices de la tabla `3001anotasfelicitacion`
--
ALTER TABLE `3001anotasfelicitacion`
  ADD PRIMARY KEY (`3001id`),
  ADD KEY `0025documento` (`3001documento`);

--
-- Indices de la tabla `3002acaramelo`
--
ALTER TABLE `3002acaramelo`
  ADD PRIMARY KEY (`3002id`),
  ADD KEY `0026documentoE` (`3002documentoE`),
  ADD KEY `0026documentoP` (`3002documentoP`);

--
-- Indices de la tabla `mensajesprogramadores`
--
ALTER TABLE `mensajesprogramadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `PRUEBABORRAR`
--
ALTER TABLE `PRUEBABORRAR`
  ADD PRIMARY KEY (`id_p`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `000aalumno`
--
ALTER TABLE `000aalumno`
  MODIFY `000id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `001agenero`
--
ALTER TABLE `001agenero`
  MODIFY `001id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `002aeps`
--
ALTER TABLE `002aeps`
  MODIFY `002id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `003aestadocivil`
--
ALTER TABLE `003aestadocivil`
  MODIFY `003id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `004apais`
--
ALTER TABLE `004apais`
  MODIFY `004id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `005adepartamento`
--
ALTER TABLE `005adepartamento`
  MODIFY `005id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `006aciudad`
--
ALTER TABLE `006aciudad`
  MODIFY `006id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT de la tabla `007ausuarios`
--
ALTER TABLE `007ausuarios`
  MODIFY `007id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `008adirectivas`
--
ALTER TABLE `008adirectivas`
  MODIFY `008id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `009apermisos`
--
ALTER TABLE `009apermisos`
  MODIFY `009id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `0010abarrio`
--
ALTER TABLE `0010abarrio`
  MODIFY `0010id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `0011acomuna`
--
ALTER TABLE `0011acomuna`
  MODIFY `0011id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `0012alog`
--
ALTER TABLE `0012alog`
  MODIFY `0012id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `0013aacciones`
--
ALTER TABLE `0013aacciones`
  MODIFY `0013id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `0014amatriculados`
--
ALTER TABLE `0014amatriculados`
  MODIFY `0014id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `0015ajornada`
--
ALTER TABLE `0015ajornada`
  MODIFY `0015id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `0016amateria`
--
ALTER TABLE `0016amateria`
  MODIFY `0016id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `0017aarea`
--
ALTER TABLE `0017aarea`
  MODIFY `0017id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `0018abloque`
--
ALTER TABLE `0018abloque`
  MODIFY `0018id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `0019atipdocumento`
--
ALTER TABLE `0019atipdocumento`
  MODIFY `0019id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `0020acurso`
--
ALTER TABLE `0020acurso`
  MODIFY `0020id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `0021aperiodo`
--
ALTER TABLE `0021aperiodo`
  MODIFY `0021id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `0022asede`
--
ALTER TABLE `0022asede`
  MODIFY `0022id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `0023rh`
--
ALTER TABLE `0023rh`
  MODIFY `0023id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `0024acupos`
--
ALTER TABLE `0024acupos`
  MODIFY `0024id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `0025adirectorcurso`
--
ALTER TABLE `0025adirectorcurso`
  MODIFY `0025id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `0026ahorarios`
--
ALTER TABLE `0026ahorarios`
  MODIFY `0026id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `100anotas`
--
ALTER TABLE `100anotas`
  MODIFY `100IDNOTA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `106aporcentaje`
--
ALTER TABLE `106aporcentaje`
  MODIFY `106IDPORCENTAJE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `108anombrenotas`
--
ALTER TABLE `108anombrenotas`
  MODIFY `108id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `1010aboletines`
--
ALTER TABLE `1010aboletines`
  MODIFY `1010id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `1011apro_cur_mat`
--
ALTER TABLE `1011apro_cur_mat`
  MODIFY `1011id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `1012ffl`
--
ALTER TABLE `1012ffl`
  MODIFY `1012id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `1013aconstancias`
--
ALTER TABLE `1013aconstancias`
  MODIFY `1013id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `1014anotasdefinitivas`
--
ALTER TABLE `1014anotasdefinitivas`
  MODIFY `1014id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `2000aasistenciadetalles`
--
ALTER TABLE `2000aasistenciadetalles`
  MODIFY `2000id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `2001aasistenciasemana`
--
ALTER TABLE `2001aasistenciasemana`
  MODIFY `2001id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `2002aasistenciajustificada`
--
ALTER TABLE `2002aasistenciajustificada`
  MODIFY `2002id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `3000aobservacionperiodo`
--
ALTER TABLE `3000aobservacionperiodo`
  MODIFY `3000id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `3001anotasfelicitacion`
--
ALTER TABLE `3001anotasfelicitacion`
  MODIFY `3001id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `3002acaramelo`
--
ALTER TABLE `3002acaramelo`
  MODIFY `3002id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajesprogramadores`
--
ALTER TABLE `mensajesprogramadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `PRUEBABORRAR`
--
ALTER TABLE `PRUEBABORRAR`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `000aalumno`
--
ALTER TABLE `000aalumno`
  ADD CONSTRAINT `000aalumno_ibfk_1` FOREIGN KEY (`000genero`) REFERENCES `001agenero` (`001id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `000aalumno_ibfk_10` FOREIGN KEY (`000tipDocMad`) REFERENCES `0019atipdocumento` (`0019id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `000aalumno_ibfk_2` FOREIGN KEY (`000eps`) REFERENCES `002aeps` (`002id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `000aalumno_ibfk_3` FOREIGN KEY (`000tipDocumento`) REFERENCES `0019atipdocumento` (`0019id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `000aalumno_ibfk_4` FOREIGN KEY (`000barrio`) REFERENCES `0010abarrio` (`0010id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `000aalumno_ibfk_8` FOREIGN KEY (`000rh`) REFERENCES `0023rh` (`0023id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `000aalumno_ibfk_9` FOREIGN KEY (`000tipDocPad`) REFERENCES `0019atipdocumento` (`0019id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `005adepartamento`
--
ALTER TABLE `005adepartamento`
  ADD CONSTRAINT `005adepartamento_ibfk_1` FOREIGN KEY (`005pais`) REFERENCES `004apais` (`004id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `006aciudad`
--
ALTER TABLE `006aciudad`
  ADD CONSTRAINT `006aciudad_ibfk_1` FOREIGN KEY (`006departamento`) REFERENCES `005adepartamento` (`005id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `007ausuarios`
--
ALTER TABLE `007ausuarios`
  ADD CONSTRAINT `007ausuarios_ibfk_1` FOREIGN KEY (`007rolUsu`) REFERENCES `009apermisos` (`009id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `008adirectivas`
--
ALTER TABLE `008adirectivas`
  ADD CONSTRAINT `008adirectivas_ibfk_1` FOREIGN KEY (`008estaCivil`) REFERENCES `003aestadocivil` (`003id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `008adirectivas_ibfk_2` FOREIGN KEY (`008eps`) REFERENCES `002aeps` (`002id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `008adirectivas_ibfk_3` FOREIGN KEY (`008barrio`) REFERENCES `0010abarrio` (`0010id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `008adirectivas_ibfk_4` FOREIGN KEY (`008jornada`) REFERENCES `0015ajornada` (`0015id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `008adirectivas_ibfk_7` FOREIGN KEY (`008genero`) REFERENCES `001agenero` (`001id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `008adirectivas_ibfk_8` FOREIGN KEY (`008rol`) REFERENCES `009apermisos` (`009id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `008adirectivas_ibfk_9` FOREIGN KEY (`008tipDocumento`) REFERENCES `0019atipdocumento` (`0019id`);

--
-- Filtros para la tabla `0010abarrio`
--
ALTER TABLE `0010abarrio`
  ADD CONSTRAINT `0010abarrio_ibfk_1` FOREIGN KEY (`0010ciudad`) REFERENCES `006aciudad` (`006id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `0012alog`
--
ALTER TABLE `0012alog`
  ADD CONSTRAINT `0012alog_ibfk_1` FOREIGN KEY (`0012accion`) REFERENCES `0013aacciones` (`0013id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `0014amatriculados`
--
ALTER TABLE `0014amatriculados`
  ADD CONSTRAINT `0014amatriculados_ibfk_2` FOREIGN KEY (`0014documento`) REFERENCES `000aalumno` (`000id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `0014amatriculados_ibfk_3` FOREIGN KEY (`0014sede`) REFERENCES `0022asede` (`0022id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `0014amatriculados_ibfk_4` FOREIGN KEY (`0014jornada`) REFERENCES `0015ajornada` (`0015id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `0014amatriculados_ibfk_5` FOREIGN KEY (`0014curso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `0016amateria`
--
ALTER TABLE `0016amateria`
  ADD CONSTRAINT `0016amateria_ibfk_1` FOREIGN KEY (`0016codArea`) REFERENCES `0017aarea` (`0017id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `0024acupos`
--
ALTER TABLE `0024acupos`
  ADD CONSTRAINT `0024acupos_ibfk_1` FOREIGN KEY (`0024curso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `0025adirectorcurso`
--
ALTER TABLE `0025adirectorcurso`
  ADD CONSTRAINT `0025adirectorcurso_ibfk_1` FOREIGN KEY (`0025profesor`) REFERENCES `008adirectivas` (`008id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `0025adirectorcurso_ibfk_2` FOREIGN KEY (`0025curso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `0026ahorarios`
--
ALTER TABLE `0026ahorarios`
  ADD CONSTRAINT `0026ahorarios_ibfk_1` FOREIGN KEY (`0026profesor`) REFERENCES `008adirectivas` (`008id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `0026ahorarios_ibfk_2` FOREIGN KEY (`0026jornada`) REFERENCES `0015ajornada` (`0015id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `100anotas`
--
ALTER TABLE `100anotas`
  ADD CONSTRAINT `100anotas_ibfk_1` FOREIGN KEY (`100CODPERIODO`) REFERENCES `0021aperiodo` (`0021id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `100anotas_ibfk_2` FOREIGN KEY (`100CODCURSO`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `100anotas_ibfk_3` FOREIGN KEY (`100CODALUMNO`) REFERENCES `0014amatriculados` (`0014id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `100anotas_ibfk_4` FOREIGN KEY (`100CODPORCENTAJE`) REFERENCES `106aporcentaje` (`106IDPORCENTAJE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `106aporcentaje`
--
ALTER TABLE `106aporcentaje`
  ADD CONSTRAINT `106aporcentaje_ibfk_1` FOREIGN KEY (`106CODPERIODO`) REFERENCES `0021aperiodo` (`0021id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `106aporcentaje_ibfk_2` FOREIGN KEY (`106CODCURSO`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `106aporcentaje_ibfk_3` FOREIGN KEY (`106CODMATERIA`) REFERENCES `0016amateria` (`0016id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `106aporcentaje_ibfk_4` FOREIGN KEY (`106CODPROFESOR`) REFERENCES `008adirectivas` (`008id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `108anombrenotas`
--
ALTER TABLE `108anombrenotas`
  ADD CONSTRAINT `108anombrenotas_ibfk_1` FOREIGN KEY (`108codCurso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `108anombrenotas_ibfk_2` FOREIGN KEY (`108codPeriodo`) REFERENCES `0021aperiodo` (`0021id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `108anombrenotas_ibfk_3` FOREIGN KEY (`108codMateria`) REFERENCES `0016amateria` (`0016id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `108anombrenotas_ibfk_4` FOREIGN KEY (`108codprofe`) REFERENCES `008adirectivas` (`008id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `108anombrenotas_ibfk_5` FOREIGN KEY (`108codGrupoNota`) REFERENCES `106aporcentaje` (`106IDPORCENTAJE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `1010aboletines`
--
ALTER TABLE `1010aboletines`
  ADD CONSTRAINT `1010aboletines_ibfk_1` FOREIGN KEY (`1010curso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1010aboletines_ibfk_2` FOREIGN KEY (`1010materia`) REFERENCES `0016amateria` (`0016id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1010aboletines_ibfk_3` FOREIGN KEY (`1010codAlumno`) REFERENCES `0014amatriculados` (`0014id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `1011apro_cur_mat`
--
ALTER TABLE `1011apro_cur_mat`
  ADD CONSTRAINT `1011apro_cur_mat_ibfk_1` FOREIGN KEY (`1011idcurso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1011apro_cur_mat_ibfk_2` FOREIGN KEY (`1011idprofesor`) REFERENCES `008adirectivas` (`008id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1011apro_cur_mat_ibfk_3` FOREIGN KEY (`1011idmateria`) REFERENCES `0016amateria` (`0016id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `1012ffl`
--
ALTER TABLE `1012ffl`
  ADD CONSTRAINT `1012ffl_ibfk_1` FOREIGN KEY (`1012periodo`) REFERENCES `0021aperiodo` (`0021id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1012ffl_ibfk_2` FOREIGN KEY (`1012curso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1012ffl_ibfk_3` FOREIGN KEY (`1012materia`) REFERENCES `0016amateria` (`0016id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1012ffl_ibfk_4` FOREIGN KEY (`1012codAlumno`) REFERENCES `0014amatriculados` (`0014id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `1013aconstancias`
--
ALTER TABLE `1013aconstancias`
  ADD CONSTRAINT `1013aconstancias_ibfk_1` FOREIGN KEY (`1013idMatricula`) REFERENCES `0014amatriculados` (`0014id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `1014anotasdefinitivas`
--
ALTER TABLE `1014anotasdefinitivas`
  ADD CONSTRAINT `1014anotasdefinitivas_ibfk_1` FOREIGN KEY (`1014codigoalumno`) REFERENCES `000aalumno` (`000documento`),
  ADD CONSTRAINT `1014anotasdefinitivas_ibfk_2` FOREIGN KEY (`1014periodo`) REFERENCES `0021aperiodo` (`0021id`),
  ADD CONSTRAINT `1014anotasdefinitivas_ibfk_3` FOREIGN KEY (`1014curso`) REFERENCES `0020acurso` (`0020id`);

--
-- Filtros para la tabla `2000aasistenciadetalles`
--
ALTER TABLE `2000aasistenciadetalles`
  ADD CONSTRAINT `2000aasistenciadetalles_ibfk_1` FOREIGN KEY (`2000bloque`) REFERENCES `0018abloque` (`0018id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2000aasistenciadetalles_ibfk_2` FOREIGN KEY (`2000materia`) REFERENCES `0016amateria` (`0016id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2000aasistenciadetalles_ibfk_3` FOREIGN KEY (`2000documento`) REFERENCES `000aalumno` (`000id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2000aasistenciadetalles_ibfk_4` FOREIGN KEY (`2000documentoP`) REFERENCES `008adirectivas` (`008id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2000aasistenciadetalles_ibfk_5` FOREIGN KEY (`2000periodo`) REFERENCES `0021aperiodo` (`0021id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2000aasistenciadetalles_ibfk_6` FOREIGN KEY (`2000curso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `2001aasistenciasemana`
--
ALTER TABLE `2001aasistenciasemana`
  ADD CONSTRAINT `2001aasistenciasemana_ibfk_1` FOREIGN KEY (`2001idAlumno`) REFERENCES `000aalumno` (`000id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2001aasistenciasemana_ibfk_2` FOREIGN KEY (`2001periodo`) REFERENCES `0021aperiodo` (`0021id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2001aasistenciasemana_ibfk_3` FOREIGN KEY (`2001curso`) REFERENCES `0020acurso` (`0020id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `2002aasistenciajustificada`
--
ALTER TABLE `2002aasistenciajustificada`
  ADD CONSTRAINT `2002aasistenciajustificada_ibfk_1` FOREIGN KEY (`2002idAlumno`) REFERENCES `000aalumno` (`000id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2002aasistenciajustificada_ibfk_2` FOREIGN KEY (`2002idProfe`) REFERENCES `008adirectivas` (`008id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `3000aobservacionperiodo`
--
ALTER TABLE `3000aobservacionperiodo`
  ADD CONSTRAINT `3000aobservacionperiodo_ibfk_1` FOREIGN KEY (`3000periodo`) REFERENCES `0021aperiodo` (`0021id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `3000aobservacionperiodo_ibfk_2` FOREIGN KEY (`3000documento`) REFERENCES `000aalumno` (`000id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `3001anotasfelicitacion`
--
ALTER TABLE `3001anotasfelicitacion`
  ADD CONSTRAINT `3001anotasfelicitacion_ibfk_1` FOREIGN KEY (`3001documento`) REFERENCES `000aalumno` (`000id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `3002acaramelo`
--
ALTER TABLE `3002acaramelo`
  ADD CONSTRAINT `3002acaramelo_ibfk_2` FOREIGN KEY (`3002documentoE`) REFERENCES `000aalumno` (`000id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `3002acaramelo_ibfk_3` FOREIGN KEY (`3002documentoP`) REFERENCES `008adirectivas` (`008id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
