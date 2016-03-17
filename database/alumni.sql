-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2016 at 03:35 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `staff_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `all_qualifications` varchar(250) NOT NULL,
  `work_history` varchar(1000) NOT NULL,
  `department` varchar(50) NOT NULL,
  `blog` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`photo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `name`, `all_qualifications`, `work_history`, `department`, `blog`, `email`, `phone`, `photo`) VALUES
(2, 'saf', 'BTech , ', 'dfsfd', 'Computer Science', 'gdf', 'dfgd', 'dfg', 'saf_1457894167'),
(6, '', '', '', 'Computer Science', '', 'fdgdsf', '', ''),
(9, '', '', '', 'Computer Science', '', 'czxcz', '', '_1457896113'),
(12, '', '', '', 'Computer Science', '', 'vcxzv', '', '_1457896359'),
(13, '', '', '', 'Computer Science', '', 'safdsgs', '', '_1457896457'),
(16, '', '', '', 'Computer Science', '', 'nmmm', '', '_1457896772'),
(18, '', '', '', 'Computer Science', '', 'hi', '', 'fggh'),
(19, '', '', '', 'Computer Science', '', 'dfgdfgd', '', '_1457897237');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
