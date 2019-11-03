-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2019 a las 18:05:29
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
  `Accept` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `AcceptLanguage` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UpgradeInsecureRequests` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UserAgent` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `AcceptEncoding` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Host` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Connection` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SecFetchMode` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SecFetchUser` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SecFetchSite` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Cookie` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CacheControl` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `http`
--

INSERT INTO `http` (`Accept`, `AcceptLanguage`, `UpgradeInsecureRequests`, `UserAgent`, `AcceptEncoding`, `Host`, `Connection`, `SecFetchMode`, `SecFetchUser`, `SecFetchSite`, `Cookie`, `CacheControl`) VALUES
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8', 'es-ES,es;q=0.9', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36 OPR/63.0.3368.107', 'gzip, deflate, br', 'localhost', 'keep-alive', 'navigate', '?1', 'none', 'PHPSESSID=qqc59t4shu2fm501qf4at12n5s', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8', 'es-ES,es;q=0.9', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36 OPR/63.0.3368.107', 'gzip, deflate, br', 'localhost', 'keep-alive', 'navigate', '?1', 'none', 'PHPSESSID=qqc59t4shu2fm501qf4at12n5s', 'max-age=0'),
('text/html, application/xhtml+xml, image/jxr, */*', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'Phpstorm-c8043c4b=946782f6-98c7-45dc-b286-c225233f1dee', NULL),
('text/html, application/xhtml+xml, image/jxr, */*', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'Phpstorm-c8043c4b=946782f6-98c7-45dc-b286-c225233f1dee; PHPSESSID=ia4c2j8p1670c6o482co0fpfip', NULL),
('text/html, application/xhtml+xml, image/jxr, */*', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'Phpstorm-c8043c4b=946782f6-98c7-45dc-b286-c225233f1dee; PHPSESSID=ia4c2j8p1670c6o482co0fpfip', NULL),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0'),
('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362', 'gzip, deflate', 'localhost', 'Keep-Alive', NULL, NULL, NULL, 'PHPSESSID=rhr1sotmvmb2kodsn5rdpam0cr', 'max-age=0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
