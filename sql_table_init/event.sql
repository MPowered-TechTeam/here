-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2013 at 10:29 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mpowered`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(50) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `long` double NOT NULL,
  `lat` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `active`, `name`, `creator`, `long`, `lat`) VALUES
(18, 1, 'R2220', 'mlripper', -83.73820359999999, 42.27253779999999),
(25, 1, 'MPowered Talent Meeting', 'mlripper', -83.7362886, 42.27522860000001),
(28, 1, '3rd floor dude', 'jsallans', -83.71582389999999, 42.2909548),
(29, 1, 'dude 3rd floor with jill', 'jsallans', -83.7155959, 42.2912813),
(30, 1, 'CFE ugli space', 'jsallans', -83.736989, 42.2756761),
(31, 1, 'home', 'jsallans', -83.72647549999999, 42.2946434),
(32, 1, 'tech team meeting', 'jsallans', -83.716155, 42.2927885),
(33, 1, 'Ugli middle tables', 'jsallans', -83.7367922, 42.2755647);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
