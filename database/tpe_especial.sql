-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 20:14:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_especial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `Pelicula_ID` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `ID_genero` int(11) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `Fecha_de_estreno` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`Pelicula_ID`, `Titulo`, `ID_genero`, `Duracion`, `Fecha_de_estreno`) VALUES
(15, 'duro de matar', 1, 12, 2012);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipogenero`
--

CREATE TABLE `tipogenero` (
  `ID_genero` int(11) NOT NULL,
  `Genero` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipogenero`
--

INSERT INTO `tipogenero` (`ID_genero`, `Genero`, `Edad`) VALUES
(1, 'accíon', 22),
(10, 'dibujo animados', 0),
(16, 'romantico', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID`, `email`, `password`) VALUES
(1, 'eloytangorra@gmail.com', '$2a$12$SOyNh9oq.uk4EDf5iCSdzOq0XOdOyV2oWy/uSvj/mg4OkdlTQ21Xu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`Pelicula_ID`),
  ADD KEY `ID_genero` (`ID_genero`);

--
-- Indices de la tabla `tipogenero`
--
ALTER TABLE `tipogenero`
  ADD PRIMARY KEY (`ID_genero`),
  ADD KEY `Genero` (`Genero`),
  ADD KEY `Genero_2` (`Genero`),
  ADD KEY `ID_genero` (`ID_genero`),
  ADD KEY `ID_genero_2` (`ID_genero`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `Pelicula_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipogenero`
--
ALTER TABLE `tipogenero`
  MODIFY `ID_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`ID_genero`) REFERENCES `tipogenero` (`ID_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
