-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2013 at 10:15 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text,
  `detail` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `alias`, `description`, `detail`, `date`) VALUES
(1, 'testing', 'testing', 'test', 'test', '2013-11-18 02:21:18'),
(2, 'sfsfgsfg', 'sfsfgsfg', 'sfgsfgsfg', 'sfgsfgsfgsfgsfgsfg', '2013-11-18 02:50:24'),
(3, 'wrtwrtwrt', 'wrtwrtwrt', 'wrtwrtwrt', 'wrtwrtwrtwrtwrt', '2013-11-18 02:50:39'),
(4, 'aettaetat', 'aettaetat', 'aetaetaet', 'aetaetaetaet', '2013-11-18 02:58:08'),
(5, 'qerqerqerqer', 'qerqerqerqer', 'qerqerqer', 'qerqerqerqerqerqer', '2013-11-18 03:13:34'),
(6, 'qerqreqer', 'qerqreqer', 'qerqerq', 'erqerqerqer', '2013-11-18 03:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `description` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `alias`, `priority`, `description`, `date`) VALUES
(1, 'Rotten Leaves is :', 'home', 1, 'Ambient/dubstep/triphop project of <a href="jamendo.com/en/artist/vermillia">vermillia</a>. rotten leaves offers a combining dark atmosphere of piano and string with dubstep wobbling bassline and beat. project name "rotten leaves" it self taken from vermillia''s song with same title. its closes to song themed about fall, end, finale or something like that.', '2013-11-18 05:25:43'),
(2, 'Music', 'music', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\n\n<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/12437407" frameborder="no" height="350" scrolling="no" width="100%"></iframe>', '2013-11-18 05:31:14'),
(3, 'About', 'about', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-11-18 05:49:58'),
(4, 'Contact', 'contact', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-11-18 05:50:14'),
(5, 'Blog', 'blog', 3, '', '2013-11-18 05:50:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
