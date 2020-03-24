-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 10:02 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flood`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `damage_type` text NOT NULL,
  `house_damage` text NOT NULL,
  `sanitation_damage` text NOT NULL,
  `mosquito` text NOT NULL,
  `flies` text NOT NULL,
  `diarrhea` text NOT NULL,
  `scorpions` text NOT NULL,
  `water_source` text NOT NULL,
  `health_center` text NOT NULL,
  `needs` text NOT NULL,
  `state` int(11) NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `date`, `name`, `phone`, `damage_type`, `house_damage`, `sanitation_damage`, `mosquito`, `flies`, `diarrhea`, `scorpions`, `water_source`, `health_center`, `needs`, `state`, `lon`, `lat`) VALUES
(6, '2019-08-27 12:32:55', 'user1', '', 'some information', 'yes', 'yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'no need', 0, 32.45387756542968, 15.720430782557841),
(3, '2019-08-22 02:47:17', 'admin', '', 'disaster', 'test house', 'test satination', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'water', 1, 32.504782540457605, 15.524640893767994),
(4, '2019-08-22 03:26:09', 'Mohammed Nasser', '', 'Some Damages in street with fall in some house partially', 'yes', 'yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No', 'For Ambulance ', 0, 32.527577593595105, 15.607436091836732);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `permission`, `about`, `online`, `session`, `name`) VALUES
(1, 'admin', '578fb4bd088fc6a65e508b29d3e96f84', '', 0, '', 0, '578fb4bd088fc6a65e508b29d3e96f84', 'Mohammed Nasser'),
(2, 'user1', 'f775b224c15061533dc38bdd328008c1', '', 0, '', 0, 'f775b224c15061533dc38bdd328008c1', 'user1'),
(3, 'user2', '622bec497d073c858c3187d952d3e85e', '', 0, '', 0, '622bec497d073c858c3187d952d3e85e', 'user2'),
(4, 'user3', '38a4ca028d5144ae5d3551abaacc3055', '', 0, '', 0, '38a4ca028d5144ae5d3551abaacc3055', 'user3'),
(5, 'user4', '80a9cab36263687f3036332dffad4be2', '', 0, '', 0, '80a9cab36263687f3036332dffad4be2', 'user4'),
(6, 'user5', 'a97356f6d80805d63b979893ffb0052e', '', 0, '', 0, 'a97356f6d80805d63b979893ffb0052e', 'user5'),
(7, 'user6', '5da6beb6af2c9603f0eb3106170b250d', '', 0, '', 0, '5da6beb6af2c9603f0eb3106170b250d', 'user6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
