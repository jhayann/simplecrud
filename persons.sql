-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 06:07 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bsit3c`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `birthplace` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `lastname`, `firstname`, `middlename`, `birthday`, `birthplace`, `gender`, `address`) VALUES
(3, 'BAQUIRIN', 'REY JHON', 'ABARRACOSO', '02/19/1996', 'CAMARIN', 'MALE', 'PHASE 6 PUROK 4 CAMARIN CALOOCAN CITY'),
(4, 'BAQUIRIN', 'JESSABELLE', 'ABARRACOSO', '05/25/1998', 'CAMARIN', 'FEMALE', 'PHASE 6 PUROK 4 CAMARIN CALOOCAN CITY'),
(5, 'DIARIOS', 'CHERRY ANN', 'REPARIP', '02/08/1996', 'BAGONG SILANG', 'FEMALE', 'PHASE 6 PUROK 4 CAMARIN CALOOCAN CITY'),
(6, 'LOBINGCO', 'JOHN KYMRIE', 'BANAL', '11/01/1991', 'CALOOCAN CITY', 'Others', 'PHASE 6 CAMARIN CALOOCAN CITY'),
(7, 'CALVEZ', 'JIELO', 'BAKUNAWA', '11/01/1991', 'CALOOCAN CITY', 'MALE', 'CAMARIN CALOOCAN CITY'),
(8, 'PUGOSA', 'EDGARDO', 'TGAKAIN', '11/01/1991', 'CALOOCAN CITY', 'MALE', 'CAMARIN CALOOCAN CITY'),
(9, 'JARABEJO', 'LESTER JOHN', 'TIRADORO', '11/01/1996', 'CAMARIN ', 'MALE', 'CAMARIN CALOOCAN CITY');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
