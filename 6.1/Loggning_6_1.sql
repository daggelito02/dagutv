-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 15 apr 2023 kl 17:01
-- Serverversion: 10.5.18-MariaDB-0+deb11u1
-- PHP-version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `dagutv`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Loggning_6_1`
--

CREATE TABLE `Loggning_6_1` (
  `time` varchar(30) DEFAULT NULL,
  `RemoteAddress` varchar(50) DEFAULT NULL,
  `RemoteUserAgent` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `Loggning_6_1`
--

INSERT INTO `Loggning_6_1` (`time`, `RemoteAddress`, `RemoteUserAgent`) VALUES
('Tid: 2023-04-15 16:57:00', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
('Tid: 2023-04-15 16:57:02', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
('Tid: 2023-04-15 16:57:03', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
('Tid: 2023-04-15 16:57:57', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
('Tid: 2023-04-15 16:57:58', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
('Tid: 2023-04-15 16:57:59', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
('Tid: 2023-04-15 16:57:59', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
('Tid: 2023-04-15 17:00:53', 'REMOTE_ADDR: 2.66.223.103', 'REMOTE_USER_AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
