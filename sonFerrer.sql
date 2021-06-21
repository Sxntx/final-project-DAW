-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-06-2021 a las 14:37:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sonFerrer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumno`
--

CREATE TABLE `Alumno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `anyoNacimiento` date NOT NULL,
  `nExp` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Alumno`
--

INSERT INTO `Alumno` (`id`, `nombre`, `apellidos`, `anyoNacimiento`, `nExp`) VALUES
(48, 'alumno', 'prueba', '1999-09-09', 'SF148'),
(49, 'test1', 'test1', '1998-08-09', 'SF149'),
(50, 'test2', 'test', '1997-09-07', 'SF150'),
(51, 'Pepito', 'jose', '1998-07-08', 'SF151'),
(52, 'Dani', 'Gorreto', '1997-07-12', 'SF152');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignatura`
--

CREATE TABLE `Asignatura` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idProfe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Asignatura`
--

INSERT INTO `Asignatura` (`codigo`, `nombre`, `idGrupo`, `idProfe`) VALUES
(2, 'Tutoria', 0, 19),
(3, 'Aplicacions Ofimàtiques', 0, 26),
(4, 'Muntatge i Manteniment dEquips', 0, 20),
(5, 'Xarxes Locals', 0, 30),
(6, 'Sistemes Operatius Monolloc', 0, 24),
(7, 'Formació i Orientació Laboral', 0, 28),
(8, 'Tutoria', 1, 20),
(9, 'Seguretat Informàtica', 1, 22),
(10, 'Sistemes Operatius en Xarxa', 1, 21),
(11, 'Serveis en Xarxa', 1, 23),
(12, 'Empresa i Iniciativa Emprenedora', 1, 31),
(13, 'Aplicacions Web', 1, 29),
(14, 'Tutoria', 2, 21),
(15, 'Entorns de Desenvolupament', 2, 19),
(16, 'Llenguatges de Marques', 2, 22),
(17, 'Formació i Orientació Laboral', 2, 23),
(18, 'Programació', 2, 25),
(19, 'Databases', 2, 30),
(20, 'Sistemes informàtics', 2, 32),
(21, 'Tutoria', 3, 22),
(22, 'Disseny dInterfícies Web', 3, 26),
(23, 'Empresa i Iniciativa Emprenedora', 3, 30),
(24, 'Desplegament dAplicacions Web', 3, 32),
(25, 'Desenvolupament Web en Entorn Servidor', 3, 31),
(26, 'Desenvolupament Web en Entorn Client', 3, 28),
(27, 'Projecte de Desenvolupament dAplicacions Web', 3, 21),
(28, 'Formació en Centres de Treball', 3, 19),
(29, 'Lengua castellana', 4, 23),
(30, 'Geografia i Historia', 4, 25),
(31, 'BIOLOGIA I GEOLOGIA 1r ESO', 4, 24),
(32, 'Llengua i Literatura Castellana 1r ESO', 4, 26),
(33, 'Llengua catalana 1r ESO', 4, 28),
(34, 'GEOGRAFIA I HISTÒRIA 1r ESO', 4, 30),
(35, 'Educació Física 1r ESO', 4, 32),
(36, 'MATEMÀTIQUES 1r ESO 2015', 4, 31),
(37, 'Llengua i Literatura Castellana 2n ESO', 5, 29),
(38, 'Lengua Castellana', 5, 28),
(39, 'LLENGUA CATALANA 2n ESO', 5, 27),
(40, 'GEOGRAFIA I HISTÒRIA 2n ESO', 5, 26),
(41, 'Educació Física 2n ESO', 5, 25),
(42, 'MATEMÀTIQUES 2n ESO', 5, 24),
(43, 'Llengua Catalana 3r ESO A ', 6, 22),
(44, 'Educació física (3r ESO)', 6, 21),
(45, 'Matemàtiques 3r ESO Aplicades', 6, 20),
(46, 'Matemàtiques 3r ESO Acadèmiques', 6, 19),
(47, 'Educació Física 4t ESO', 7, 20),
(48, 'Iniciativa a lactivitat emprenedora i empresarial 4t ESO', 7, 21),
(49, 'Economia 4t ESO', 7, 22),
(50, 'Matemàtiques 4 ESO Acadèmiques', 7, 23),
(51, 'Matemàtiques 4 ESO Aplicades', 7, 24),
(52, 'Història del món contemporani 1r batxillerat', 8, 25),
(53, 'Educació Física 1r Batxillerat', 8, 26),
(54, 'Economia 1r Batxillerat', 8, 27),
(55, 'Matemàtiques 1r Batx CN', 8, 28),
(56, 'Matemàtiques1r Batxillerat CS', 8, 32),
(57, 'Geografia dEspanya', 9, 31),
(58, 'CATALÀ TONGA 2n BATX', 9, 30),
(59, 'Fonaments dAdministració i Gestió', 9, 29),
(60, 'Economia de lempresa 2n Batxillerat', 9, 28),
(61, 'Matemàtiques CCSS II 2n Batx', 9, 27),
(62, 'Matemàtiques II 2n Batx', 9, 25),
(63, 'Muntatge i manteniment de sistemes i components informàtics còpia 1', 10, 28),
(64, 'Equips elèctrics i electrònics', 10, 11),
(65, 'Muntatge i manteniment de sistemes i components informàtics', 10, 31),
(66, 'Matemàtiques 2 FPB', 11, 23),
(67, 'Operacions auxiliars per la configuració i lexplotació', 11, 27),
(68, 'Xarxes 2FPB', 11, 30),
(69, 'TALLER. Recuperació pendents juny', 13, 24),
(74, 'Tutoria', 4, 23),
(75, 'Tutoria', 5, 24),
(76, 'Tutoria', 6, 25),
(77, 'Tutoria', 7, 26),
(78, 'Tutoria', 8, 27),
(79, 'Tutoria', 9, 28),
(80, 'Tutoria', 10, 29),
(81, 'Tutoria', 11, 30),
(82, 'Tutoria', 12, 31),
(83, 'Tutoria', 13, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asistencia`
--

CREATE TABLE `Asistencia` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `idAlumno` int(11) NOT NULL,
  `falta` tinyint(1) NOT NULL,
  `retardo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Asistencia`
--

INSERT INTO `Asistencia` (`id`, `fecha`, `idAlumno`, `falta`, `retardo`) VALUES
(30, '2021-06-11 18:28:56', 48, 0, 1),
(31, '2021-06-11 18:28:56', 49, 1, 0),
(32, '2021-06-11 18:28:56', 50, 1, 0),
(33, '2021-06-12 13:39:52', 48, 0, 1),
(34, '2021-06-12 13:39:52', 49, 1, 0),
(35, '2021-06-12 13:39:52', 50, 1, 0),
(36, '2021-06-13 19:43:57', 51, 1, 0),
(37, '2021-06-13 19:43:57', 52, 1, 0),
(38, '2021-06-20 18:31:31', 51, 0, 1),
(39, '2021-06-20 18:31:31', 52, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Deberes`
--

CREATE TABLE `Deberes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `idprofe` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `archivo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Deberes`
--

INSERT INTO `Deberes` (`id`, `titulo`, `descripcion`, `fecha`, `idprofe`, `idGrupo`, `archivo`) VALUES
(5, 'tarea2', 'nueva tarea', '2021-06-16', 30, 81, 0x5245474558502e706466),
(6, 'tarea3', 'nueva tare3', '2021-06-16', 30, 81, 0x32612061706c6963616369c3b3207765622e706466),
(14, 'conArchivo', 'nuevo contento', '2021-06-16', 27, 78, 0x32612061706c6963616369c3b3207765622e706466),
(15, 'SinArchivo', 'contento', '2021-06-16', 27, 78, NULL),
(16, 'nueva', 'alicia sin archivo', '2021-06-16', 20, 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE `Grupo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `aula` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`id`, `nombre`, `aula`, `idProfesor`) VALUES
(0, '1r GM SMX', 9, 19),
(1, '2n GM SMX', 1, 20),
(2, '1r GS DAW', 3, 21),
(3, '2n GS DAW', 5, 39),
(4, '1r ESO', 9, 23),
(5, '2n ESO', 12, 24),
(6, '3r ESO', 5, 25),
(7, '4rt ESO', 9, 26),
(8, '1r Batxillerat', 7, 27),
(9, '2n Batxillerat', 16, 28),
(10, '1r FPB Informàtica', 13, 29),
(11, '2n FPB Informàtica', 11, 30),
(12, '1r FPB Fabricació', 10, 31),
(13, '2n FPB Fabricació', 8, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notas`
--

CREATE TABLE `Notas` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `notas1` int(11) NOT NULL,
  `notas2` int(11) NOT NULL,
  `notas3` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personal`
--

CREATE TABLE `Personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenya` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Personal`
--

INSERT INTO `Personal` (`id`, `nombre`, `apellidos`, `usuario`, `contrasenya`, `idTipoUsuario`, `idCurso`) VALUES
(3, 'admin', 'admin', 'admin', 'admin', 0, 5),
(127, 'Miquel', 'Muntaner', 'mmuntaner', 'mmuntaner', 1, 0),
(128, 'Alicia', 'Roselló', 'arosello', 'arosello123', 1, 1),
(129, 'Carlos', 'Sogorb', 'asogorb', 'asogorb123', 1, 2),
(130, 'Valeriana', 'Euskadi', 'veuskadi', '123', 1, 3),
(131, 'Catalina', 'Bosch', 'cbosch', '123', 1, 4),
(132, 'Antónia', 'Sinónim', 'asinonim', '123', 1, 5),
(133, 'Sebastian', 'Amengual', 'samengual', '123', 1, 6),
(134, 'Antoni', 'Pere', 'apere', '123', 1, 7),
(135, 'Andrés', 'Alonso', 'aalonso', '123', 1, 8),
(136, 'Magdalena', 'Martinez', 'mmartinez', '123', 1, 9),
(137, 'Climent', 'Picornell', 'cpicornell', '123', 1, 10),
(138, 'Adolf', 'Hitler', 'ahitler', '123', 1, 11),
(139, 'Rudolph', 'Musolini', 'rmusolini', '123', 1, 12),
(140, 'Frank', 'Jungla', 'fjungla', '123', 1, 13),
(148, 'alumno', 'prueba', 'test', 'test', 2, 7),
(149, 'test1', 'test1', 'teest', 'test', 2, 7),
(150, 'test2', 'test', 'test', 'test', 2, 7),
(151, 'Pepito', 'jose', 'pjose', '123', 2, 0),
(152, 'Dani', 'Gorreto', 'dgorreto', '123', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesor`
--

CREATE TABLE `Profesor` (
  `id` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Profesor`
--

INSERT INTO `Profesor` (`id`, `idPersonal`, `Email`, `Telefono`) VALUES
(19, 127, 'mmuntaner@iessonferrer.net', 657847657),
(20, 128, 'arosello@iessonferrer.net', 657847657),
(21, 129, 'csogorb@iessonferrer.net', 657847657),
(22, 130, 'veuskadi@iessonferrer.net', 657847657),
(23, 131, 'cbosch@iessonferrer.net', 657847657),
(24, 132, 'asinonim@iessonferrer.net', 657847657),
(25, 133, 'samengual@iessonferrer.net', 657847657),
(26, 134, 'apere@iessonferrer.net', 657847657),
(27, 135, 'aalonso@iessonferrer.net', 657847657),
(28, 136, 'mmartinez@iessonferrer.net', 657847657),
(29, 137, 'cpicornell@iessonferrer.net', 657847657),
(30, 138, 'ahitler@iessonferrer.net', 657847657),
(31, 139, 'rmusolini@iessonferrer.net', 657847657),
(32, 140, 'fjungla@iessonferrer.net', 657847657),
(34, 147, 'po@g.com', 657485767);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoUsuario`
--

CREATE TABLE `TipoUsuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TipoUsuario`
--

INSERT INTO `TipoUsuario` (`id`, `tipo`) VALUES
(0, 'Admin'),
(1, 'Profesor'),
(2, 'Alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alumno`
--
ALTER TABLE `Alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `Asistencia`
--
ALTER TABLE `Asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Deberes`
--
ALTER TABLE `Deberes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Notas`
--
ALTER TABLE `Notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Personal`
--
ALTER TABLE `Personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Profesor`
--
ALTER TABLE `Profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `TipoUsuario`
--
ALTER TABLE `TipoUsuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Alumno`
--
ALTER TABLE `Alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `Asistencia`
--
ALTER TABLE `Asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `Deberes`
--
ALTER TABLE `Deberes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `Notas`
--
ALTER TABLE `Notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Personal`
--
ALTER TABLE `Personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT de la tabla `Profesor`
--
ALTER TABLE `Profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `TipoUsuario`
--
ALTER TABLE `TipoUsuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
