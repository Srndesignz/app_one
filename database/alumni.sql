-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2016 at 07:47 PM
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
  `passout_year` varchar(10) NOT NULL,
  `all_qualifications` varchar(250) NOT NULL,
  `work_history` varchar(1000) NOT NULL,
  `department` varchar(50) NOT NULL,
  `blog` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `name`, `passout_year`, `all_qualifications`, `work_history`, `department`, `blog`, `email`, `phone`, `photo`, `created_date`, `edited_date`) VALUES
(1, 'Sreenath K', '2013', 'BTech , MTech DIP, ', 'Developer at IHRD', 'Computer Science', 'ridelogues.blogspot.com', 'nath0012@gmail.com', '9562348990', 'Sreenath-K_1458150500.jpg', '0000-00-00 00:00:00', '2016-03-17 20:58:30'),
(6, 'Saran BL', '2013', 'BTech , MTech , ', 'KSM', 'Computer Science', '', 'saranbl@gmail.com', '986645667', 'Saran-BL_1458155351.jpg', '2016-03-16 18:49:25', '2016-03-17 21:01:09'),
(20, 'Roshini', '2013', 'BTech , MTech CS, ', 'Higher studies', 'Computer Science', '', 'roshini@gmail.com', '8797797979', '', '2016-03-17 20:28:34', '2016-03-17 21:01:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
