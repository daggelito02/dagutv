-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2022 at 01:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Webbutv-II`
--

-- --------------------------------------------------------

--
-- Table structure for table `dagges_blogg_tbl1`
--

CREATE TABLE `dagges_blogg_tbl1` (
  `ID` int(11) NOT NULL,
  `time` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `homepage` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dagges_blogg_tbl1`
--

INSERT INTO `dagges_blogg_tbl1` (`ID`, `time`, `name`, `email`, `homepage`, `comment`) VALUES
(56, '2022-12-29 18:47:21', 'Dag Fredriksson', 'daggelito02@gmail.com', 'www.dn.se', 'Testar igen'),
(100, '2022-12-30 13:16:06', 'Dag Fredriksson', 'daggelito02@gmail.com', 'www.dn.se', 'Testar en till bild'),
(101, '2022-12-30 13:21:57', 'Dag Fredriksson', 'daggelito02@gmail.com', 'www.dn.se', 'Animerad cat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dagges_blogg_tbl1`
--
ALTER TABLE `dagges_blogg_tbl1`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dagges_blogg_tbl1`
--
ALTER TABLE `dagges_blogg_tbl1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
