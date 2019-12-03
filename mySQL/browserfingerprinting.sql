-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 00:27:07
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `browserfingerprinting`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `http`
--

CREATE TABLE `http` (
  `ID` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Accept` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `AcceptLanguage` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UpgradeInsecureRequests` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UserAgent` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `AcceptEncoding` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Connection` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SecFetchMode` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SecFetchUser` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SecFetchSite` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DNT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `http`
--
ALTER TABLE `http`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `http`
--
ALTER TABLE `http`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
