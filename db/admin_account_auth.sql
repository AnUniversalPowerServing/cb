-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 08:55 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account_auth`
--

CREATE TABLE IF NOT EXISTS `admin_account_auth` (
  `account_Id` int(11) NOT NULL AUTO_INCREMENT,
  `role_Id` int(11) NOT NULL,
  `surName` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `acc_pwd` varchar(100) NOT NULL,
  `acc_active` varchar(1) NOT NULL,
  PRIMARY KEY (`account_Id`),
  KEY `role_Id` (`role_Id`),
  KEY `role_Id_2` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User Account Information' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_account_auth`
--
ALTER TABLE `admin_account_auth`
  ADD CONSTRAINT `admin_account_auth_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `admin_account_roles` (`role_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
