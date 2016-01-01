-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2016 at 12:01 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `img_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `Flag` int(11) NOT NULL DEFAULT '0',
  `Mark` int(11) NOT NULL,
  `Chapter` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Link` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`Flag`, `Mark`, `Chapter`, `Name`, `Link`, `ID`) VALUES
(0, 3, 1, 'ques_1_3_1', 'uploads/ques_1_3_1.png', 1),
(0, 1, 2, 'ques_2_1_1', 'uploads/ques_2_1_1.png', 2),
(0, 3, 2, 'ques_2_3_1', 'uploads/ques_2_3_1.png', 3),
(0, 3, 2, 'ques_2_3_2', 'uploads/ques_2_3_2.png', 4),
(0, 3, 1, 'ques_1_3_2', 'uploads/ques_1_3_2.png', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
