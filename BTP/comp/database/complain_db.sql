-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2013 at 04:32 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `complain_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complains`
--

CREATE TABLE IF NOT EXISTS `tbl_complains` (
  `cid` int(10) NOT NULL auto_increment,
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(40) NOT NULL,
  `comp_type` varchar(40) NOT NULL,
  `comp_title` varchar(200) NOT NULL,
  `comp_desc` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `eng_id` int(10) NOT NULL,
  `eng_name` varchar(40) NOT NULL,
  `eng_comment` varchar(240) NOT NULL,
  `create_date` datetime NOT NULL,
  `close_date` datetime NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cid` int(10) NOT NULL auto_increment,
  `cname` varchar(40) NOT NULL,
  `cpass` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `c_mobile` varchar(15) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cid`, `cname`, `cpass`, `address`, `email`, `c_mobile`, `date_time`) VALUES
(1, 'kranthi', 'kranthi123', 'sricity', 'kranthi.n13@iiits.in', '9490094634', '2011-02-02 23:52:36'),
(2, 'prabhat', 'prabhat123', 'sricity', 'prabhat.k13@iiits.in', '8332957009', '2011-02-03 07:45:47'),
(3, 'bharath', 'bharath123', 'sricity', 'bharath.t13@iiits.in', '9524254254', '2012-02-05 17:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_engineer`
--

CREATE TABLE IF NOT EXISTS `tbl_engineer` (
  `eid` int(10) NOT NULL auto_increment,
  `ename` varchar(40) NOT NULL,
  `epass` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `e_mobile` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`eid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_engineer`
--

INSERT INTO `tbl_engineer` (`eid`, `ename`, `epass`, `address`, `email`, `e_mobile`, `date_time`) VALUES

(1, 'Hostel Commitee', 'hostel', 'sricity', 'hostel.commitee@iiits.in', '9854251425', '2011-02-02 23:36:09'),
(2, 'Mess Commitee', 'mess', 'sricity', 'mess.commitee@iiits.in', '9854251425', '2011-02-02 23:36:09'),
(3, 'Network Commitee', 'network', 'sricity', 'network.commitee@iiits.in', '9854251425', '2011-02-02 23:36:09'),
(4, 'Academic Commitee', 'academics', 'sricity', 'academics.commitee@iiits.in', '9854251425', '2011-02-02 23:36:09'),
(5, 'Sports Commitee', 'sports', 'sricity', 'sports.commitee@iiits.in', '9854251425', '2011-02-02 23:36:09')
;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `sid` int(11) NOT NULL auto_increment,
  `sname` varchar(40) NOT NULL,
  `spass` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `s_mobile` varchar(15) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`sid`, `sname`, `spass`, `address`, `email`, `s_mobile`, `date_time`) VALUES
(1, 'admin', 'admin', '290,shani peth,gudur', 'admin@iiits.in', '9987876765', '2010-11-27 17:29:05');
