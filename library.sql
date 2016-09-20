-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2016 at 10:45 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `author` varchar(50) NOT NULL,
  `place` varchar(20) NOT NULL,
  `available` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `name`, `author`, `place`, `available`) VALUES
('43687944', 'Let Us C', 'Yashwant Kanetkar', '5/1', 'Y'),
('43687945', 'Let Us C', 'Yashwant Kanetkar', '5/1', 'Y'),
('4931435', 'Java', 'Herbert Schiltz', '4/2', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE IF NOT EXISTS `book_issue` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` bigint(10) NOT NULL,
  `book_id` varchar(15) NOT NULL,
  `doi` bigint(15) NOT NULL,
  `dos` bigint(15) NOT NULL,
  `fine` int(5) NOT NULL DEFAULT '0',
  `reissues` int(5) NOT NULL,
  `status` char(2) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`sno`),
  UNIQUE KEY `s_id` (`s_id`,`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `book_issue`
--


-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE IF NOT EXISTS `book_request` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `requester_id` bigint(10) NOT NULL,
  `date` bigint(15) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `book_request`
--


-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE IF NOT EXISTS `librarian` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `picture` varchar(30) NOT NULL DEFAULT 'img_avatar3.png',
  PRIMARY KEY (`sno`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`sno`, `username`, `password`, `name`, `picture`) VALUES
(1, 'librarian', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Name', 'img_avatar3.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `s_id` bigint(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `semester` int(2) NOT NULL,
  `dob` bigint(15) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `feeslip` varchar(50) NOT NULL,
  `verified` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
