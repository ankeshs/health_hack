-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2011 at 07:17 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hcapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `patname` varchar(30) NOT NULL,
  `refname` varchar(30) NOT NULL,
  `id` varchar(15) NOT NULL,
  `slot` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `turn` int(11) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`patname`, `refname`, `id`, `slot`, `doctor`, `turn`, `type`) VALUES
('Shekhar', 'Shekhar', 'shekhark', 'any', 'any', 3, 'stud'),
('Shekhar', 'Shekhar', 'shekhark', 'any', 'any', 5, 'stud'),
('Shekhar', 'Shekhar', 'shekhark', 'any', 'any', 4, 'stud'),
('Shekhar', 'Shekhar', 'shekhark', 'any', 'any', 2, 'stud'),
('Ankesh Kumar Singh', 'Ankesh Kumar Singh', 'ankeshs', 'any', 'any', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(25) NOT NULL,
  `id` varchar(10) NOT NULL,
  `mob` varchar(14) NOT NULL,
  `gma` varchar(50) NOT NULL,
  `yah` varchar(50) NOT NULL,
  `fac` varchar(50) NOT NULL,
  `emob` tinyint(1) NOT NULL,
  `egma` tinyint(1) NOT NULL,
  `eyah` tinyint(1) NOT NULL,
  `efac` tinyint(1) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `id`, `mob`, `gma`, `yah`, `fac`, `emob`, `egma`, `eyah`, `efac`, `type`) VALUES
('Ankesh Kumar Singh', 'ankeshs', '9792085327', 'ank.singh90', 'ank.singh90', 'aksdvp', 0, 0, 0, 0, 'admin'),
('Ankit Mahato', 'amahato', '9532094890', 'ankmahato', 'aryan.9001', 'ankitmahato', 1, 1, 1, 1, 'stud'),
('Shekhar', 'shekhark', '9559753562', 'shekhar.kadyan', 'shekharkadyan', 'shekhar.kadyan', 1, 1, 1, 1, 'stud');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
