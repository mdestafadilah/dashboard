-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2010 at 07:41 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_extjs_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'Drum Island'),
(2, 'Shiropp Village'),
(3, 'Kingdom Alabasta'),
(4, 'Fuschia Village'),
(5, 'Water Seven'),
(6, 'Island of Ohara');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `occupation` varchar(150) NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `country_id`, `occupation`, `birthdate`) VALUES
(1, 'Roronoa Zoro', 'roronoa-zoro@strawhat.com', 1, 'Straw Hat Swordman', '1990-07-26'),
(2, 'Sanji Black Leg', 'sanji@strawhat.com', 1, 'Straw Hat Chef', '1988-02-11'),
(3, 'Nico Robin', 'nico.robin@strawhat.com', 1, 'Straw Hat Archeologist ', '1986-12-25'),
(4, 'Brook', 'brook@strawhat.com', 1, 'Straw Hat Musician', '1945-04-03'),
(5, 'Monkey D Luffy', 'luffy@strawhat.com', 1, 'Straw Hat Captain', '1989-07-27'),
(6, 'Nami', 'nami@strawhat.com', 1, 'Straw Hat Navigator', '1987-10-29'),
(7, 'Red Haired Shanks', 'shanks@redhair.com', 1, 'Red Haired Captain', '1972-03-02'),
(8, 'Tony Tony Chopper', 'chopper@strawhat.com', 1, 'Straw Hat Docter', '1995-03-15'),
(9, 'Usopp ', 'usopp@strawhat.com', 1, 'Straw Hat Marksman', '1989-04-01'),
(10, 'Edward Newgate Whitebeard', 'edward@whitebeard.com', 1, 'Whitebeard Captain', '1955-03-23'),
(11, 'Nefertari Vivi', 'vivi@alabasta.com', 1, 'Princess of Alabasta ', '1989-11-21'),
(12, 'Franky Cutty Flam', 'franky@strawhat.com', 1, 'Straw Hat Shipwright', '1971-07-29'),
(13, 'Donquixote Doflamingo', 'doflamingo@shinchibukai.com', 1, 'Shinchibukai', '1980-09-08'),
(14, 'Bartholomew Kuma', 'b_kuma@shinchibukai.com', 1, 'Shinchibukai', '1977-12-31'),
(15, 'Jimbei', 'jimbei@shinchibukai.com', 1, 'Shinchibukai', '1988-03-29'),
(16, 'Juracule ''Hawk Eye'' Mihawk', 'mhawk@shinchibukai.com', 1, 'Shinchibukai', '1981-09-16'),
(17, 'Gecko Moria', 'g_moria@shinchibukai.com', 1, 'Shinchibukai', '1965-01-06'),
(18, 'Sir Crocodile', 'croc@shinchibukai.com', 1, 'Shinchibukai', '1976-10-07'),
(19, 'Marshall ''Blackbeard'' D. Teach', 'dteach.blackbeard@shinchibukai.com', 1, 'Shinchibukai', '1958-08-07'),
(20, 'Gensui Sengoku', 'sengoku@marinehq.com', 1, 'Fleet Admiral', '1977-07-14'),
(21, 'Smoker', 'smoker@marinehq.com', 1, 'Commodore', '1978-10-12'),
(22, 'Ensign Tashigi', 'e.tashigi@marinehq.com', 1, 'Smoker Partner', '1986-01-22'),
(23, 'Aokiji', 'aokiji@marinehq.com', 1, 'Admiral', '1971-02-25'),
(24, 'Taisho', 'taisho@marinehq.com', 1, 'Admiral', '1976-05-22'),
(25, 'Rob Lucci', 'rob.lucci@cp9.com', 1, 'CP9 Member', '1985-04-25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
