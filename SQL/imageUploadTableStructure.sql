-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2010 at 11:31 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imageupload`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_upload_master`
--

CREATE TABLE IF NOT EXISTS `image_upload_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(25) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `bill_no` varchar(20) NOT NULL,
  `bill_date` date NOT NULL,
  `gr_date` date NOT NULL,
  `defect` varchar(100) NOT NULL,
  `details` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `pack` int(11) NOT NULL,
  `uom` varchar(5) NOT NULL,
  `cds` varchar(5) NOT NULL,
  `no_of_packs` int(11) NOT NULL,
  `pkd_date` varchar(20) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `mrp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`,`image_name`),
  UNIQUE KEY `image_name` (`image_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

