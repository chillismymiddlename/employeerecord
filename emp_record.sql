-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2017 at 11:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emp_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_email` varchar(30) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_phone` bigint(12) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_dept` varchar(30) NOT NULL,
  `emp_status` varchar(20) NOT NULL,
  `emp_password` varchar(16) NOT NULL,
  `emp_joindate` date NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_email`, `emp_name`, `emp_phone`, `emp_dob`, `emp_address`, `emp_dept`, `emp_status`, `emp_password`, `emp_joindate`) VALUES
(7, 'pa@gmail.com', 'sourav', 8521412789, '2017-05-06', 'noida', 'Operator', 'Contract', '4444444', '2017-05-18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
