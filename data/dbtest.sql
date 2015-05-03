-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2015 at 10:08 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `user_access_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ID`, `name`, `uri`, `module`, `user_access_level`) VALUES
(1, 'Gebruikersbeheer', '?page=gebruikersbeheer', '', 1),
(2, 'Database', '?page=database', '', 1),
(3, 'page 1', '?module=my_module&page=page1', 'My Module', 1),
(4, 'Page 2', '?module=my_module&page=page2', 'My Module', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `firstname`, `lastname`, `email`, `telephone`, `password`) VALUES
(2, 'admin', 'Admin', 'de Superuser', 'admin@mail.com', '06-12345678', 'fionu3giiS71.'),
(3, 'test', 'Wim', 'ad', 'slevel@wigbek.zwm', '12345452', 'fi3LLch28IK7A'),
(4, 'dwaard', 'Daan', 'de Waard', 'daan.de.waard@hz.n', '06-23016807', 'fi4jJJNfbkvVk'),
(6, 'Jaap', 'Jaap', 'Klomp', 'jaapklomp@mail.com', '06-JAAP-555', 'fiBI5J9BtGVGM'),
(7, 'Kaas', 'Kip', 'Kaas', 'kaas@kip.com', '12345678', 'fiAVk6cBWOBz2'),
(8, 'erik', 'Erik', 'Nagelkerke', 'erik@mail.com', '123456', 'fi3LLch28IK7A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
