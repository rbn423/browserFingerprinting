-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2020 a las 22:46:02
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
-- Estructura de tabla para la tabla `fuentes`
--

CREATE TABLE `fuentes` (
  `id` int(11) NOT NULL,
  `nombreFuente` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `DNT` tinyint(1) DEFAULT NULL,
  `plataforma` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `userAgentJS` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
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
  `toolBar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `http`
--

INSERT INTO `http` (`ID`, `Fecha`, `Accept`, `AcceptLanguage`, `UpgradeInsecureRequests`, `UserAgent`, `AcceptEncoding`, `Connection`, `SecFetchMode`, `SecFetchUser`, `SecFetchSite`, `DNT`, `plataforma`, `userAgentJS`, `cookieEnabled`, `language`, `onLine`, `appName`, `zonaHoraria`, `screenWidth`, `screenHeight`, `screenAvailWidth`, `screenAvailHeight`, `screenColorDepth`, `screenPixelDepth`, `locationBar`, `pixelRatio`, `menuBar`, `personalBar`, `statusBar`, `toolBar`) VALUES
(1, '2020-02-27 14:48:06', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(2, '2020-02-27 14:49:27', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(3, '2020-02-27 14:49:53', 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 'es-ES,es;q=0.9', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.115', 'gzip, deflate, br', 'keep-alive', 'navigate', '?1', 'none', 1, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.115', 1, 'es-ES', 1, 'Netscape', -60, 1536, 864, 1536, 824, 24, 24, 1, 1.25, 1, 1, 1, 1),
(4, '2020-02-27 14:50:33', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 'gzip, deflate', 'keep-alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 1, 'es-ES', 1, 'Netscape', -60, 1536, 864, 1536, 824, 24, 24, 1, 1.25, 1, 1, 1, 1),
(5, '2020-02-27 14:50:52', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 'gzip, deflate', 'keep-alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 1, 'es-ES', 1, 'Netscape', -60, 1536, 864, 1536, 824, 24, 24, 1, 1.25, 1, 1, 1, 1),
(6, '2020-02-27 14:51:46', 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 'es-ES,es;q=0.9', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'gzip, deflate, br', 'keep-alive', 'navigate', '?1', 'same-origin', NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1, 'es-ES', 1, 'Netscape', -60, 1536, 864, 1536, 824, 24, 24, 1, 1.25, 1, 1, 1, 1),
(7, '2020-02-27 14:58:42', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 'gzip, deflate', 'keep-alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 1, 'es-ES', 1, 'Netscape', -60, 1536, 864, 1536, 824, 24, 24, 1, 1.25, 1, 1, 1, 1),
(8, '2020-02-29 20:11:18', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(9, '2020-02-29 20:14:39', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(10, '2020-02-29 20:17:13', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(11, '2020-02-29 20:18:50', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(12, '2020-02-29 20:19:52', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(13, '2020-02-29 20:23:33', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(14, '2020-02-29 20:23:38', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(15, '2020-02-29 21:21:28', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(16, '2020-02-29 21:22:35', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(17, '2020-02-29 21:22:58', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(18, '2020-02-29 21:23:14', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(19, '2020-02-29 21:24:43', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(20, '2020-02-29 21:26:18', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(21, '2020-02-29 21:26:49', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(22, '2020-02-29 21:26:53', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(23, '2020-02-29 21:27:09', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(24, '2020-02-29 21:28:39', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(25, '2020-02-29 21:29:53', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(26, '2020-02-29 21:33:25', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(27, '2020-02-29 21:33:36', NULL, 'es-ES,es;q=0.9', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.115', 'gzip, deflate, br', 'keep-alive', 'no-cors', NULL, 'none', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2020-02-29 21:33:36', 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 'es-ES,es;q=0.9', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.115', 'gzip, deflate, br', 'keep-alive', 'navigate', '?1', 'none', 1, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.115', 1, 'es-ES', 1, 'Netscape', -60, 1536, 864, 1536, 824, 24, 24, 1, 1.25, 1, 1, 1, 1),
(29, '2020-02-29 21:33:54', '*/*', 'es-ES,es;q=0.9', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.115', 'gzip, deflate, br', 'keep-alive', 'no-cors', NULL, 'same-origin', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2020-02-29 21:34:38', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(31, '2020-02-29 21:37:09', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(32, '2020-02-29 21:38:29', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(33, '2020-02-29 21:39:22', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(34, '2020-02-29 21:41:17', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(35, '2020-02-29 21:41:21', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(36, '2020-02-29 21:41:22', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1),
(37, '2020-02-29 21:42:32', 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'Keep-Alive', NULL, NULL, NULL, NULL, 'Win32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 1, 'es-ES', 1, 'Netscape', -60, 1433, 806, 1433, 769, 24, 24, 1, 1.340000033378601, 1, 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  ADD PRIMARY KEY (`id`,`nombreFuente`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
