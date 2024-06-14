-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2024 at 08:33 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andhika_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lantai` int(10) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `pt` varchar(255) NOT NULL,
  `tahun` int(10) NOT NULL,
  `no_penyimapanan` int(10) NOT NULL,
  `add_userid` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `edit_userid` int(11) NOT NULL,
  `edit_date` date NOT NULL,
  `sts_delete` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_divisi`
--

CREATE TABLE IF NOT EXISTS `master_divisi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `sts_delete` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_lantai`
--

CREATE TABLE IF NOT EXISTS `master_lantai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `sts_delete` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `master_lantai`
--

INSERT INTO `master_lantai` (`id`, `nama`, `sts_delete`) VALUES
(1, '0', 0),
(2, '0', 0),
(3, '0', 0),
(4, '0', 0),
(5, '0', 0),
(6, '0', 0),
(7, '0', 0),
(8, '0', 0),
(9, '0', 0),
(10, '0', 0),
(11, 'test', 0),
(12, 'test2', 0),
(13, 'test3', 0),
(14, 'test', 0),
(15, 'test', 0),
(16, 'test', 0),
(17, 'test1', 0),
(18, 'test', 0),
(19, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_rak`
--

CREATE TABLE IF NOT EXISTS `master_rak` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `sts_delete` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_full` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `sts_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
