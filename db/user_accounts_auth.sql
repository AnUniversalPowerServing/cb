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
-- Table structure for table `user_accounts_auth`
--

CREATE TABLE IF NOT EXISTS `user_accounts_auth` (
  `account_Id` int(11) NOT NULL AUTO_INCREMENT,
  `mob_code` varchar(5) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `mob_val` varchar(1) NOT NULL,
  `surName` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `acc_pwd` varchar(100) NOT NULL,
  `q1` int(11) NOT NULL,
  `a1` varchar(60) NOT NULL,
  `q2` int(11) NOT NULL,
  `a2` varchar(60) NOT NULL,
  `q3` int(11) NOT NULL,
  `a3` varchar(60) NOT NULL,
  `acc_active` varchar(1) NOT NULL,
  PRIMARY KEY (`account_Id`),
  KEY `q1` (`q1`),
  KEY `q2` (`q2`),
  KEY `q3` (`q3`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_accounts_auth`
--

INSERT INTO `user_accounts_auth` (`account_Id`, `mob_code`, `mobile`, `mob_val`, `surName`, `name`, `gender`, `acc_pwd`, `q1`, `a1`, `q2`, `a2`, `q3`, `a3`, `acc_active`) VALUES
(2, '+1', 'AR37139692', 'Y', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', 2, '', 3, '', ''),
(3, 'passw', 'AR37139692', 'Y', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', 2, '', 3, '', ''),
(4, 'passw', 'AR37139692', 'Y', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', 2, '', 3, '', ''),
(5, 'passw', 'AR37139692', 'Y', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', 2, '', 3, '', 'a'),
(6, 'passw', 'AR37139692', 'Y', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', 2, '', 3, '', 'Y'),
(7, '+91', '9160869337', 'Y', 'Nellutla', 'L N Rao', 'MALE', 'cc09745c464ebe35057d019a9778345f', 1, 'dwed', 2, 'wdwe', 3, 'wdwd', 'Y'),
(8, '+91', '', 'Y', 'qwf', 'fwefw', 'MALE', '28b8822eafc1e58a8d0d7972197bf2b2', 1, 'wefwe', 3, 'efwefwe', 4, 'wefwefwe', 'Y'),
(9, '+91', '', 'Y', 'wfwefew', 'fewfew', 'MALE', 'fdb21855522565271fd52fcf55f73a05', 1, 'ewfwe', 2, 'wedq', 4, 'ewffwewe', 'Y'),
(10, '+91', '', 'Y', 'Nellutla', 'L N Rao', 'MALE', '553501692703f81e92ba2df8ddeee012', 2, 'ssdwefew', 1, 'wefwe', 3, 'wefwe', 'Y'),
(11, '+91', '', 'Y', 'afa', 'sse', 'MALE', '5e0542f964858f96ae7194fb2a7dd365', 1, 'efwefwe', 4, 'fwrwefwr', 7, 'wrw44', 'Y'),
(12, '+91', '', 'Y', 'Nellutla', 'L N Rao', 'MALE', '07f5796330e5f5353e4b329b21d6677b', 1, '12345', 2, '2e232', 3, '232432', 'Y'),
(13, '+91', '', 'Y', 'dsfr', 'efr', 'MALE', 'b7faaa73a366df03fe46883927de4ad9', 1, 'fwerw', 2, 'wqwqew', 8, 'eqe3', 'Y'),
(14, '+91', '', 'Y', 'Anup', 'Chakravarthi', 'MALE', '2baddf737dc4ee3af3cf1aeefe64f8ca', 1, 'Dish', 2, 'India', 3, 'I am', 'Y'),
(15, '+91', '', 'Y', 'qwwe', '34t54``', 'MALE', 'ac1d2d940cacadb1a60dd79fc6684922', 1, 'WWEWFWE', 3, 'WWED', 2, 'W22', 'Y'),
(16, '+91', '9169869337', 'Y', 'QWERT', 'SAFDD', 'MALE', '63157ec36ea28fc3c65ddcd4067e6b11', 1, 'Pulihora', 3, 'Dosa', 2, 'India', 'Y'),
(22, '+91', '9666555444', 'Y', 'Nellutla', 'L N Rao', 'MALE', '25d55ad283aa400af464c76d713c07ad', 1, 'Pulihora', 12, 'Tiger Shroff', 26, 'Jaquar', 'Y');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_accounts_auth`
--
ALTER TABLE `user_accounts_auth`
  ADD CONSTRAINT `user_accounts_auth_ibfk_1` FOREIGN KEY (`q1`) REFERENCES `user_accounts_sq` (`sQ_Id`),
  ADD CONSTRAINT `user_accounts_auth_ibfk_2` FOREIGN KEY (`q2`) REFERENCES `user_accounts_sq` (`sQ_Id`),
  ADD CONSTRAINT `user_accounts_auth_ibfk_3` FOREIGN KEY (`q3`) REFERENCES `user_accounts_sq` (`sQ_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
