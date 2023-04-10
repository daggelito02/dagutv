-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2022 at 11:53 AM
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
-- Table structure for table `dagges_blogg`
--

CREATE TABLE `dagges_blogg` (
  `ID` int(11) NOT NULL,
  `time` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `homepage` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dagges_blogg`
--

INSERT INTO `dagges_blogg` (`ID`, `time`, `name`, `email`, `homepage`, `comment`) VALUES
(77, '2022-12-27 15:16:47', 'Dag Fredriksson', 'dag.fredriksson@comprend.com', 'http://www.dn.se', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.\r\n\r\nHe lay on his armour-like back, and if he lifted'),
(110, '2022-12-27 16:07:24', 'Dag Fredriksson', 'daggelito02@gmail.com', 'www.sj.se', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.\r\n\r\nHe lay on his armour-like back, and if he lifted'),
(159, '2022-12-28 12:36:53', 'Dag Fredriksson', 'daggelito02@gmail.com', 'www.dn.se', 'Utan http'),
(160, '2022-12-28 12:38:00', 'Dag Fredriksson', 'daggelito02@gmail.com', 'http://www.sl.se', 'med http');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dagges_blogg`
--
ALTER TABLE `dagges_blogg`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dagges_blogg`
--
ALTER TABLE `dagges_blogg`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
