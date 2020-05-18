-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2020 a las 18:40:37
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
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idDisp` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatosaudio`
--

CREATE TABLE `formatosaudio` (
  `id` int(11) NOT NULL,
  `ogg-vorbis` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ogg-opus` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `3gpp` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp4-mp4a` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp4-mp3` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp4-ac3` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp4-ec3` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `acc` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pcm` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mpeg` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `flac` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `wave` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `webm-vorbis` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp3-mp3` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatosvideo`
--

CREATE TABLE `formatosvideo` (
  `id` int(11) NOT NULL,
  `ogg-theora` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ogg-vorbis` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ogg-opus` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp4-avc1` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp4-mp4a` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mp4-flac` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `webm-vp8` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `webm-vp9` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `webm-vorbis` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes`
--

CREATE TABLE `fuentes` (
  `id` int(11) NOT NULL,
  `nombreFuente` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plugins`
--

CREATE TABLE `plugins` (
  `id` int(11) NOT NULL,
  `nombrePlugin` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
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
  `DNT` tinyint(1) DEFAULT NULL,
  `plataforma` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `userAgentJS` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `navegador` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `cookieEnabled` tinyint(1) DEFAULT NULL,
  `language` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `onLine` tinyint(1) DEFAULT NULL,
  `appName` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zonaHoraria` int(11) DEFAULT NULL,
  `screenWidth` int(11) DEFAULT NULL,
  `screenHeight` int(11) DEFAULT NULL,
  `screenAvailWidth` int(11) DEFAULT NULL,
  `screenAvailHeight` int(11) DEFAULT NULL,
  `screenColorDepth` int(11) DEFAULT NULL,
  `screenPixelDepth` int(11) DEFAULT NULL,
  `locationBar` tinyint(1) DEFAULT NULL,
  `pixelRatio` double DEFAULT NULL,
  `menuBar` tinyint(1) DEFAULT NULL,
  `personalBar` tinyint(1) DEFAULT NULL,
  `statusBar` tinyint(1) DEFAULT NULL,
  `toolBar` tinyint(1) DEFAULT NULL,
  `localStorage` tinyint(1) DEFAULT NULL,
  `sessionStorage` tinyint(1) DEFAULT NULL,
  `windowResults` tinyint(1) DEFAULT NULL,
  `indexDB` tinyint(1) DEFAULT NULL,
  `bateria` tinyint(1) DEFAULT NULL,
  `DNTJS` tinyint(1) DEFAULT NULL,
  `touchpoints` int(11) DEFAULT NULL,
  `product` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `productSub` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `os` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `vendor` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hardwareConcurrency` int(11) DEFAULT NULL,
  `lenguajes` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `buildId` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `devMemory` float DEFAULT NULL,
  `flash` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `canvas` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resumenFuentes` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resumenPlugins` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`,`tipo`,`idDisp`);

--
-- Indices de la tabla `formatosaudio`
--
ALTER TABLE `formatosaudio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formatosvideo`
--
ALTER TABLE `formatosvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  ADD PRIMARY KEY (`id`,`nombreFuente`);

--
-- Indices de la tabla `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`,`nombrePlugin`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
