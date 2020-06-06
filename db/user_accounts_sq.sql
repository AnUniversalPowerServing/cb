-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 08:44 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kv_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts_sq`
--

CREATE TABLE IF NOT EXISTS `user_accounts_sq` (
  `sQ_Id` int(11) NOT NULL AUTO_INCREMENT,
  `sQ` varchar(100) NOT NULL,
  PRIMARY KEY (`sQ_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user_accounts_sq`
--

INSERT INTO `user_accounts_sq` (`sQ_Id`, `sQ`) VALUES
(1, 'Which is your favourite food?'),
(2, 'Which is your dream country, you would like to visit?'),
(3, 'Who is your favourite Teacher?'),
(4, 'Which is your favourite Car?'),
(5, 'At which place, you were born?'),
(6, 'What is your favourite Movie?'),
(7, 'What is your favourite Color?'),
(8, 'What is your Mother Surname?'),
(9, 'Who is your favourite actor, musician or artist?'),
(10, 'What is your favourite pet Animal?'),
(11, 'What is the name of the Bank, you opened saving Account for the first time?'),
(12, 'Who is your favourite Actor?'),
(13, 'In which year, you bought your New Car?'),
(14, 'In which month, you have born?'),
(15, 'What is your favourite Game?'),
(16, 'Who is your Childhood''s Best Friend?'),
(17, 'Where you do shopping mostly in online?'),
(18, 'What is your all time favourite Song?'),
(19, 'Mention a significant Date in your life (YYYYMMDD)'),
(20, 'What is your favourite TV Show?'),
(21, 'What is your favourite flavour of ice-cream?'),
(22, 'What is the name of the politician for the first time, you refuse to vote?'),
(23, 'Who is your favourite Actress?'),
(24, 'Which is your favourite place for vacation?'),
(25, 'What''s your dream Job?'),
(26, 'What is the name of your first Car?'),
(27, 'Which is your favourite Costume?'),
(28, 'If you won a million dollars, what could you purchase?'),
(29, 'In which year, you bought your New Bike?'),
(30, 'What was the name of your first pet?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
