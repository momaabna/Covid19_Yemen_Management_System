-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 12:00 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `datetime` datetime NOT NULL,
  `info` text NOT NULL,
  `adress` text NOT NULL,
  `hc_name` text NOT NULL,
  `hc_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `type` int(11) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `nat_id` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `name`, `datetime`, `info`, `adress`, `hc_name`, `hc_id`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`, `nat_id`) VALUES
(1, 'Mohammed', '2020-03-24 00:22:00', 'hello ', 'dkaskdlaklk', 'saldkalklakl', 1, 3, 32.34264099316405, 15.46249331847524, 1, '12121332', '1', NULL),
(4, 'fff', '2020-03-25 21:02:30', 'ffff', 'f', 'ffff', 1, 1, 32.69832336621093, 15.529985139590508, 2, '111', '111', NULL),
(5, 'hkkhkhkh', '2020-03-25 21:03:30', 'kkhkhh', 'khkhkh', 'khkhkh', 1, 0, 32.467610475585936, 15.679447037575102, 1, '1111111111', '1111111111', NULL),
(7, 'fff', '2020-03-29 17:48:57', 'fffffffffffffffffff', 'ff', 'f', 1, 0, 32.5651141376953, 15.543216242914127, 1, '323232323232', '3232323232', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hc`
--

DROP TABLE IF EXISTS `hc`;
CREATE TABLE IF NOT EXISTS `hc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `info` text NOT NULL,
  `power` int(11) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `adress` text NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hc`
--

INSERT INTO `hc` (`id`, `name`, `info`, `power`, `phone`, `phone2`, `lon`, `lat`, `adress`, `state`) VALUES
(1, 'kljjkj', 'kljkljlj', 10, '00002', '55454', 32.48134338574218, 15.602745682597899, 'lklklk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `datetime` datetime NOT NULL,
  `info` text NOT NULL,
  `adress` text NOT NULL,
  `hc_name` text NOT NULL,
  `hc_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `type` int(11) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `nat_id` text NOT NULL,
  `p1` int(11) NOT NULL,
  `p2` int(11) NOT NULL,
  `p3` int(11) NOT NULL,
  `p4` int(11) NOT NULL,
  `p5` int(11) NOT NULL,
  `p6` int(11) NOT NULL,
  `p7` int(11) NOT NULL,
  `p8` int(11) NOT NULL,
  `p9` int(11) NOT NULL,
  `p10` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `datetime`, `info`, `adress`, `hc_name`, `hc_id`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`, `nat_id`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `child`) VALUES
(3, 'Mohammed Ahmed Ali', '2020-04-01 01:32:40', 'No thing', 'Emarat', 'Atebaaa', 1, -1, 35.482645, 38.720372499999996, 0, '211212121212', '111111', '2121454323232', 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `permission` int(11) NOT NULL,
  `about` text NOT NULL,
  `online` int(11) NOT NULL,
  `session` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `permission`, `about`, `online`, `session`, `name`) VALUES
(10, 'user11', 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', '132232355', 1, 'about', 0, 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', 'Moha'),
(8, 'user', '605cdb800822642eabfb9d10283033b7', '00000000', 0, 'no thing', 0, '605cdb800822642eabfb9d10283033b7', 'mohammed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
