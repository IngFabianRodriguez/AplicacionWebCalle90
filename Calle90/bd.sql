-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2017 a las 00:22:06
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appwebpcis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancaria`
--

CREATE TABLE `bancaria` (
  `NumeroCuenta` varchar(45) NOT NULL,
  `TipoCuenta` varchar(45) DEFAULT NULL,
  `TitularCuenta` varchar(45) DEFAULT NULL,
  `codigoSWIFT` varchar(45) NOT NULL,
  `codigoIBAN` varchar(45) NOT NULL,
  `Proveedor_NIT` varchar(45) NOT NULL,
  `Banco_CodigoBanco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `CodigoBanco` varchar(45) NOT NULL,
  `EntidadBancaria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`CodigoBanco`, `EntidadBancaria`) VALUES
('1', 'Banco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nombre`) VALUES
(3, 'Bucaramanga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `Identificacion` varchar(45) NOT NULL,
  `TipoIdentificacion` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Celular` varchar(45) DEFAULT NULL,
  `TelefonoFijo` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Residencia` varchar(45) DEFAULT NULL,
  `Proveedor_NIT` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `CodigoDepartamento` int(11) NOT NULL,
  `NombreDepartamento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`CodigoDepartamento`, `NombreDepartamento`) VALUES
(1, 'Departamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `ActivoFijo` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `Fabricante` varchar(45) DEFAULT NULL,
  `Modelo` varchar(45) DEFAULT NULL,
  `Serie` varchar(45) DEFAULT NULL,
  `Descripcion` text,
  `Estado` varchar(45) DEFAULT NULL,
  `FechaAdquisicion` date DEFAULT NULL,
  `Pais_idPais` int(11) NOT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantia`
--

CREATE TABLE `garantia` (
  `TiempoGarantia` varchar(45) DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `Equipo_ActivoFijo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infolegal`
--

CREATE TABLE `infolegal` (
  `RUT` varchar(45) NOT NULL,
  `NombreRL` varchar(45) DEFAULT NULL,
  `IdentificacionRL` varchar(45) DEFAULT NULL,
  `ObjetoSocial` text,
  `DescripcionBienServicio` text,
  `Regimen` varchar(45) NOT NULL,
  `Proveedor_NIT` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `IdLogin` int(11) NOT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Usuario_IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`IdLogin`, `Correo`, `Password`, `Usuario_IdUsuario`) VALUES
(2, 'mccracflow@gmail.com', 'fabian17+', 375493);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `QuienRealiza` varchar(45) DEFAULT NULL,
  `FechaMnto` date DEFAULT NULL,
  `ProximoMnto` date DEFAULT NULL,
  `Periodicidad` varchar(45) DEFAULT NULL,
  `TipoMantenimiento` varchar(45) DEFAULT NULL,
  `DescripcionMnto` text,
  `Equipo_ActivoFijo` varchar(45) NOT NULL,
  `Proveedor_NIT` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `NombrePais` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `NombrePais`) VALUES
(1, 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblacion`
--

CREATE TABLE `poblacion` (
  `idPoblacion` int(11) NOT NULL,
  `NombrePoblacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poblacion`
--

INSERT INTO `poblacion` (`idPoblacion`, `NombrePoblacion`) VALUES
(1, 'Poblacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `CodigoEstudiante` int(11) NOT NULL,
  `NombreCompleto` varchar(60) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `HoraPrestamo` time DEFAULT NULL,
  `HoraDevolucion` time DEFAULT NULL,
  `Equipo_ActivoFijo` varchar(45) NOT NULL,
  `Usuario_IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `NIT` varchar(45) NOT NULL,
  `RazonSocial` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `FechaActualizacion` date DEFAULT NULL,
  `Observaciones` text,
  `Ciudad_idCiudad` int(11) NOT NULL,
  `Pais_idPais` int(11) NOT NULL,
  `Departamento_CodigoDepartamento` int(11) NOT NULL,
  `Poblacion_idPoblacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tributaria`
--

CREATE TABLE `tributaria` (
  `NumeroResolucion` varchar(45) NOT NULL,
  `nombre` text,
  `Respuesta` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Proveedor_NIT` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Cargo` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nombre`, `Apellido`, `Cargo`, `Telefono`, `Correo`) VALUES
(375493, 'Hector Fabian', 'Rodriguez Acosta', 'Desarrollador', '32132', 'mccracflow@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancaria`
--
ALTER TABLE `bancaria`
  ADD PRIMARY KEY (`NumeroCuenta`),
  ADD KEY `fk_Bancaria_Proveedor1_idx` (`Proveedor_NIT`),
  ADD KEY `fk_Bancaria_Banco1_idx` (`Banco_CodigoBanco`);

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`CodigoBanco`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`Identificacion`),
  ADD KEY `fk_Contacto_Proveedor1_idx` (`Proveedor_NIT`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`CodigoDepartamento`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`ActivoFijo`),
  ADD KEY `fk_Equipo_Pais1_idx` (`Pais_idPais`),
  ADD KEY `fk_Equipo_Ciudad1_idx` (`Ciudad_idCiudad`);

--
-- Indices de la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD KEY `fk_Garantia_Equipo1_idx` (`Equipo_ActivoFijo`);

--
-- Indices de la tabla `infolegal`
--
ALTER TABLE `infolegal`
  ADD PRIMARY KEY (`RUT`),
  ADD KEY `fk_InfoLegal_Proveedor1_idx` (`Proveedor_NIT`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`IdLogin`),
  ADD KEY `fk_Login_Usuario1_idx` (`Usuario_IdUsuario`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD KEY `fk_Mantenimiento_Equipo1_idx` (`Equipo_ActivoFijo`),
  ADD KEY `fk_Mantenimiento_Proveedor1_idx` (`Proveedor_NIT`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `poblacion`
--
ALTER TABLE `poblacion`
  ADD PRIMARY KEY (`idPoblacion`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`CodigoEstudiante`),
  ADD KEY `fk_Prestamo_Equipo1_idx` (`Equipo_ActivoFijo`),
  ADD KEY `fk_Prestamo_Usuario1_idx` (`Usuario_IdUsuario`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`NIT`),
  ADD KEY `fk_Proveedor_Ciudad1_idx` (`Ciudad_idCiudad`),
  ADD KEY `fk_Proveedor_Pais1_idx` (`Pais_idPais`),
  ADD KEY `fk_Proveedor_Departamento1_idx` (`Departamento_CodigoDepartamento`),
  ADD KEY `fk_Proveedor_Poblacion1_idx` (`Poblacion_idPoblacion`);

--
-- Indices de la tabla `tributaria`
--
ALTER TABLE `tributaria`
  ADD PRIMARY KEY (`NumeroResolucion`),
  ADD KEY `fk_Tributaria_Proveedor1_idx` (`Proveedor_NIT`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `IdLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bancaria`
--
ALTER TABLE `bancaria`
  ADD CONSTRAINT `fk_Bancaria_Banco1` FOREIGN KEY (`Banco_CodigoBanco`) REFERENCES `banco` (`CodigoBanco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bancaria_Proveedor1` FOREIGN KEY (`Proveedor_NIT`) REFERENCES `proveedor` (`NIT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_Contacto_Proveedor1` FOREIGN KEY (`Proveedor_NIT`) REFERENCES `proveedor` (`NIT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_Equipo_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Equipo_Pais1` FOREIGN KEY (`Pais_idPais`) REFERENCES `pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD CONSTRAINT `fk_Garantia_Equipo1` FOREIGN KEY (`Equipo_ActivoFijo`) REFERENCES `equipo` (`ActivoFijo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `infolegal`
--
ALTER TABLE `infolegal`
  ADD CONSTRAINT `fk_InfoLegal_Proveedor1` FOREIGN KEY (`Proveedor_NIT`) REFERENCES `proveedor` (`NIT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_Login_Usuario1` FOREIGN KEY (`Usuario_IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `fk_Mantenimiento_Equipo1` FOREIGN KEY (`Equipo_ActivoFijo`) REFERENCES `equipo` (`ActivoFijo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mantenimiento_Proveedor1` FOREIGN KEY (`Proveedor_NIT`) REFERENCES `proveedor` (`NIT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_Prestamo_Equipo1` FOREIGN KEY (`Equipo_ActivoFijo`) REFERENCES `equipo` (`ActivoFijo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prestamo_Usuario1` FOREIGN KEY (`Usuario_IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_Proveedor_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proveedor_Departamento1` FOREIGN KEY (`Departamento_CodigoDepartamento`) REFERENCES `departamento` (`CodigoDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proveedor_Pais1` FOREIGN KEY (`Pais_idPais`) REFERENCES `pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proveedor_Poblacion1` FOREIGN KEY (`Poblacion_idPoblacion`) REFERENCES `poblacion` (`idPoblacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tributaria`
--
ALTER TABLE `tributaria`
  ADD CONSTRAINT `fk_Tributaria_Proveedor1` FOREIGN KEY (`Proveedor_NIT`) REFERENCES `proveedor` (`NIT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
