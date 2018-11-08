-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2018 a las 03:38:56
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL,
  `idanio` int(11) DEFAULT NULL,
  `idgrado` int(11) NOT NULL,
  `nombreAlumno` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `idanio`, `idgrado`, `nombreAlumno`, `apellido`, `sexo`, `tel`, `direccion`, `usuario`, `clave`, `imagen`, `condicion`) VALUES
(22, 11, 17, 'Carmelina', 'Aguilar Ruano', 'F', '45454545', 'El Salitre', 'carme', 'usuario', '1539103879.png', 1),
(23, 11, 17, 'qdsqw', 'dasd', 'dasd', 'dsaad', 'das', 'das', 'das', '1539141080.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio`
--

CREATE TABLE `anio` (
  `idanio` int(11) NOT NULL,
  `nombreAnio` varchar(4) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anio`
--

INSERT INTO `anio` (`idanio`, `nombreAnio`, `condicion`) VALUES
(11, '2018', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `clase` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idasignatura`, `idgrado`, `clase`, `condicion`) VALUES
(31, 17, 'Contabilidad Bancaria', 1),
(32, 17, 'Estadística Comercial PC', 1),
(33, 17, 'Contabilidad Gubernamental Integrada', 1),
(34, 17, 'Organización de Empresas', 1),
(35, 17, 'Ética Profesional y Relaciones Humanas', 1),
(36, 17, 'Practica Supervisada', 1),
(37, 17, 'Auditoria', 1),
(38, 17, 'Derecho Mercantil y Nociones de Derecho Laboral', 1),
(39, 17, 'Computación III', 1),
(40, 17, 'Seminario PC', 1),
(41, 17, 'Programación III', 1),
(42, 18, 'Musica I', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calasignatura`
--

CREATE TABLE `calasignatura` (
  `idcalasignatura` int(11) NOT NULL,
  `idasignatura` int(11) DEFAULT NULL,
  `idalumno` int(11) DEFAULT NULL,
  `idunidad` int(11) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL,
  `nota` int(12) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calasignatura`
--

INSERT INTO `calasignatura` (`idcalasignatura`, `idasignatura`, `idalumno`, `idunidad`, `fecha_hora`, `nota`, `condicion`) VALUES
(60, 31, 22, 1, '2018-09-19 00:00:00', 70, 1),
(61, 32, 22, 1, '2018-09-19 00:00:00', 84, 1),
(62, 33, 22, 1, '2018-09-19 00:00:00', 67, 1),
(63, 34, 22, 1, '2018-09-19 00:00:00', 78, 1),
(64, 35, 22, 1, '2018-09-19 00:00:00', 88, 1),
(65, 37, 22, 1, '2018-09-19 00:00:00', 70, 1),
(66, 38, 22, 1, '2018-09-19 00:00:00', 95, 1),
(67, 39, 22, 1, '2018-09-19 00:00:00', 92, 1),
(68, 41, 22, 1, '2018-09-19 00:00:00', 92, 1),
(69, 31, 22, 2, '2018-09-19 00:00:00', 85, 1),
(70, 32, 22, 2, '2018-09-19 00:00:00', 84, 1),
(71, 33, 22, 2, '2018-09-19 00:00:00', 65, 1),
(72, 34, 22, 2, '2018-09-19 00:00:00', 100, 1),
(73, 35, 22, 2, '2018-09-19 00:00:00', 86, 1),
(74, 37, 22, 2, '2018-09-19 00:00:00', 61, 1),
(75, 38, 22, 2, '2018-09-19 00:00:00', 79, 1),
(76, 39, 22, 2, '2018-09-19 00:00:00', 79, 1),
(77, 41, 22, 2, '2018-09-19 00:00:00', 70, 1),
(78, 31, 22, 3, '2018-09-19 00:00:00', 95, 1),
(79, 32, 22, 3, '2018-09-19 00:00:00', 81, 1),
(80, 33, 22, 3, '2018-09-19 00:00:00', 71, 1),
(81, 34, 22, 3, '2018-09-19 00:00:00', 74, 1),
(82, 35, 22, 3, '2018-09-19 00:00:00', 80, 1),
(83, 37, 22, 3, '2018-09-19 00:00:00', 82, 1),
(84, 38, 22, 3, '2018-09-19 00:00:00', 91, 1),
(85, 39, 22, 3, '2018-09-19 00:00:00', 66, 1),
(86, 41, 22, 3, '2018-09-19 00:00:00', 86, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancelado`
--

CREATE TABLE `cancelado` (
  `idcancelado` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idmes` int(11) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `condicion` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancelado`
--

INSERT INTO `cancelado` (`idcancelado`, `idalumno`, `idmes`, `estado`, `fecha`, `condicion`) VALUES
(13, 22, 1, 'Cancelado', '2018-09-19 22:52:27', 1),
(14, 22, 2, 'Cancelado', '2018-09-19 22:52:36', 1),
(15, 22, 3, 'Cancelado', '2018-09-22 22:24:54', 1),
(16, 22, 4, 'Cancelado', '2018-10-10 06:21:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casignatura`
--

CREATE TABLE `casignatura` (
  `idcasignatura` int(11) NOT NULL,
  `idcatedratico` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `casignatura`
--

INSERT INTO `casignatura` (`idcasignatura`, `idcatedratico`, `idasignatura`, `condicion`) VALUES
(14, 16, 31, 1),
(15, 17, 40, 1),
(16, 16, 33, 1),
(17, 17, 32, 1),
(18, 17, 34, 1),
(19, 16, 37, 1),
(20, 19, 35, 1),
(21, 19, 39, 1),
(22, 19, 41, 1),
(23, 19, 36, 1),
(24, 19, 38, 1),
(25, 19, 42, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedratico`
--

CREATE TABLE `catedratico` (
  `idcatedratico` int(11) NOT NULL,
  `nombreCatedratico` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catedratico`
--

INSERT INTO `catedratico` (`idcatedratico`, `nombreCatedratico`, `apellido`, `correo`, `dni`, `profesion`, `usuario`, `clave`, `imagen`, `condicion`) VALUES
(15, 'Admin', 'Admin', 'gersonbreakgonzalez@gmail.com', 'notengosoyeladminitr', 'Admin', 'holamundo', 'holamundo', '1539144347.png', 1),
(16, 'Josue Eleazar', 'Vivas Marrroquin', 'yoshuajm@gmail.com', '1744238612101', 'Perito Contador', 'yoshuajm@gmail.com', 'yoshua', '', 1),
(17, 'Sintia Marleni', 'Hermandez Soliz', 'solir@gmail.com', '589465349827423', 'Maestra de Educación Primaria', 'solir@gmail.com', 'solir', '', 1),
(18, 'Elmer Eduardo', 'Gonzalez Raymundo', 'elmer@gmial.com', '34234234233', 'Maestro de Educación', 'elmer@gmial.com', 'elmer', '', 1),
(19, 'Edy Rolando', 'Jimenez Aguilar', 'edy@gmail.com', '498534985', 'Maestra de Educación Primaria', 'edy@gmail.com', 'edy', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `iddia` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`iddia`, `idasignatura`, `idhorario`, `nombre`, `condicion`) VALUES
(24, 35, 17, 'Sabado', 1),
(25, 36, 17, 'Domingo', 1),
(26, 41, 18, 'Sabado', 1),
(27, 31, 18, 'Domingo', 1),
(28, 36, 19, 'Sabado', 1),
(29, 34, 19, 'Domingo', 1),
(30, 38, 20, 'Sabado', 1),
(31, 36, 20, 'Domingo', 1),
(32, 37, 24, 'Domingo', 1),
(33, 39, 21, 'Sabado', 1),
(34, 32, 22, 'Sabado', 1),
(35, 40, 23, 'Sabado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gprofesor`
--

CREATE TABLE `gprofesor` (
  `idgprofesor` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `idcatedratico` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gprofesor`
--

INSERT INTO `gprofesor` (`idgprofesor`, `idgrado`, `idcatedratico`, `descripcion`, `condicion`) VALUES
(15, 17, 16, 'Es altamente profesional en el área de contabilida', 1),
(16, 17, 19, '', 1),
(17, 17, 18, '', 1),
(18, 17, 19, '', 1),
(19, 18, 19, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `seccion` varchar(1) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `jornada` varchar(25) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idgrado`, `nombre`, `seccion`, `modalidad`, `jornada`, `condicion`) VALUES
(17, 'Sexto Perito Contador', 'A', 'Presencial', 'Vespertina', 1),
(18, 'Primero Básico', 'A', 'Presencial', 'Vespertina', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `hora`, `condicion`) VALUES
(17, '07:30-08:30', 1),
(18, '08:30-09:30', 1),
(19, '10:00-11:00', 1),
(20, '11:00-12:00', 1),
(21, '13:00-14:00', 1),
(22, '14:00-15:00', 1),
(23, '15:00-16:00', 1),
(24, '12:00-12:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `idmes` int(11) NOT NULL,
  `nombreMes` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`idmes`, `nombreMes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queja`
--

CREATE TABLE `queja` (
  `idqueja` int(11) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `queja`
--

INSERT INTO `queja` (`idqueja`, `descripcion`, `fecha`) VALUES
(17, 'Hola', '2018-09-19 22:51:48'),
(18, 'Soy de sexto perito mi compañero juan es muy prepotente', '2018-09-22 22:23:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idunidad` int(11) NOT NULL,
  `nombreUnidad` varchar(20) NOT NULL,
  `condicion` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idunidad`, `nombreUnidad`, `condicion`) VALUES
(1, 'Primera', 1),
(2, 'Segunda ', 1),
(3, 'Tercera ', 1),
(4, 'Cuarta ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upermiso`
--

CREATE TABLE `upermiso` (
  `idupermiso` int(11) NOT NULL,
  `idcatedratico` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fk_alumno_grado` (`idgrado`),
  ADD KEY `fk_alumno_anio` (`idanio`),
  ADD KEY `clave` (`clave`);

--
-- Indices de la tabla `anio`
--
ALTER TABLE `anio`
  ADD PRIMARY KEY (`idanio`),
  ADD UNIQUE KEY `nombreAnio` (`nombreAnio`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idasignatura`),
  ADD UNIQUE KEY `clase` (`clase`),
  ADD KEY `fk_asignatura_grado` (`idgrado`);

--
-- Indices de la tabla `calasignatura`
--
ALTER TABLE `calasignatura`
  ADD PRIMARY KEY (`idcalasignatura`),
  ADD KEY `fk_calasignatura_asignatura` (`idasignatura`),
  ADD KEY `fk_calasignatura_alumno` (`idalumno`),
  ADD KEY `fk_calasignatura_unidad` (`idunidad`);

--
-- Indices de la tabla `cancelado`
--
ALTER TABLE `cancelado`
  ADD PRIMARY KEY (`idcancelado`),
  ADD KEY `fk_cancelado_alumno` (`idalumno`),
  ADD KEY `fk_cancelado_mes` (`idmes`);

--
-- Indices de la tabla `casignatura`
--
ALTER TABLE `casignatura`
  ADD PRIMARY KEY (`idcasignatura`),
  ADD KEY `fk_casignatura_catedratico` (`idcatedratico`),
  ADD KEY `fk_casignatura_asignatura` (`idasignatura`);

--
-- Indices de la tabla `catedratico`
--
ALTER TABLE `catedratico`
  ADD PRIMARY KEY (`idcatedratico`),
  ADD UNIQUE KEY `nombreCatedratico` (`nombreCatedratico`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`iddia`),
  ADD KEY `fk_dia_asignatura` (`idasignatura`),
  ADD KEY `fk_dia_horario` (`idhorario`);

--
-- Indices de la tabla `gprofesor`
--
ALTER TABLE `gprofesor`
  ADD PRIMARY KEY (`idgprofesor`),
  ADD KEY `fk_grado_profesor_grado` (`idgrado`),
  ADD KEY `fk_grado_profesor_catedratico` (`idcatedratico`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idgrado`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`),
  ADD UNIQUE KEY `hora` (`hora`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`idmes`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `queja`
--
ALTER TABLE `queja`
  ADD PRIMARY KEY (`idqueja`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idunidad`);

--
-- Indices de la tabla `upermiso`
--
ALTER TABLE `upermiso`
  ADD PRIMARY KEY (`idupermiso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `anio`
--
ALTER TABLE `anio`
  MODIFY `idanio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `calasignatura`
--
ALTER TABLE `calasignatura`
  MODIFY `idcalasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `cancelado`
--
ALTER TABLE `cancelado`
  MODIFY `idcancelado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `casignatura`
--
ALTER TABLE `casignatura`
  MODIFY `idcasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `catedratico`
--
ALTER TABLE `catedratico`
  MODIFY `idcatedratico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `iddia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `gprofesor`
--
ALTER TABLE `gprofesor`
  MODIFY `idgprofesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `idmes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `queja`
--
ALTER TABLE `queja`
  MODIFY `idqueja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `upermiso`
--
ALTER TABLE `upermiso`
  MODIFY `idupermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_anio` FOREIGN KEY (`idanio`) REFERENCES `anio` (`idanio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_grado` FOREIGN KEY (`idgrado`) REFERENCES `grado` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_asignatura_grado` FOREIGN KEY (`idgrado`) REFERENCES `grado` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calasignatura`
--
ALTER TABLE `calasignatura`
  ADD CONSTRAINT `fk_calasignatura_alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calasignatura_asignatura` FOREIGN KEY (`idasignatura`) REFERENCES `asignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calasignatura_unidad` FOREIGN KEY (`idunidad`) REFERENCES `unidad` (`idunidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cancelado`
--
ALTER TABLE `cancelado`
  ADD CONSTRAINT `fk_cancelado_alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cancelado_mes` FOREIGN KEY (`idmes`) REFERENCES `mes` (`idmes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `casignatura`
--
ALTER TABLE `casignatura`
  ADD CONSTRAINT `fk_casignatura_asignatura` FOREIGN KEY (`idasignatura`) REFERENCES `asignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_casignatura_catedratico` FOREIGN KEY (`idcatedratico`) REFERENCES `catedratico` (`idcatedratico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dia`
--
ALTER TABLE `dia`
  ADD CONSTRAINT `fk_dia_asignatura` FOREIGN KEY (`idasignatura`) REFERENCES `asignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dia_horario` FOREIGN KEY (`idhorario`) REFERENCES `horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gprofesor`
--
ALTER TABLE `gprofesor`
  ADD CONSTRAINT `fk_grado_profesor_catedratico` FOREIGN KEY (`idcatedratico`) REFERENCES `catedratico` (`idcatedratico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grado_profesor_grado` FOREIGN KEY (`idgrado`) REFERENCES `grado` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
