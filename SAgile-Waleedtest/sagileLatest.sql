-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2013 at 10:36 Õ
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sagile`
--

-- --------------------------------------------------------

--
-- Table structure for table `feature_story`
--

CREATE TABLE IF NOT EXISTS `feature_story` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_Story_ID` int(11) NOT NULL,
  `FK_Feature_ID` int(11) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  `FK_User_ID` int(11) NOT NULL,
  PRIMARY KEY (`PK_ID`),
  KEY `fs_Story` (`FK_Story_ID`),
  KEY `fs_feature` (`FK_Feature_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `feature_story`
--

INSERT INTO `feature_story` (`PK_ID`, `FK_Story_ID`, `FK_Feature_ID`, `1st_time_date`, `FK_User_ID`) VALUES
(17, 39, 1, '2013-02-04 04:36:51', 4),
(18, 6, 1, '2013-02-04 04:47:39', 4),
(21, 9, 1, '2013-02-04 05:26:22', 4),
(22, 9, 2, '2013-02-04 05:26:23', 4),
(23, 7, 1, '2013-02-04 05:38:14', 4),
(24, 7, 2, '2013-02-04 05:38:14', 4),
(25, 7, 3, '2013-02-04 05:38:14', 4),
(26, 36, 2, '2013-02-04 16:03:32', 4),
(27, 36, 3, '2013-02-04 16:03:32', 4);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_User_ID` int(11) NOT NULL,
  `name_Proj` varchar(255) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  `desc_proj` varchar(255) NOT NULL,
  PRIMARY KEY (`PK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`PK_ID`, `FK_User_ID`, `name_Proj`, `1st_time_date`, `desc_proj`) VALUES
(28, 2, '  MMS Decoder                         ', '2013-01-13 06:50:08', '  \r\n   This project will recieve MMS from the user and store it in the database \r\nsdfasdfsdfsssssgdfgdfgdfgdfgdfgdfgdfhgfhgfhfghfghfghfghfghgfh'),
(29, 2, 'Transportaion system', '2013-01-21 16:35:21', 'ghdgsgsd');

-- --------------------------------------------------------

--
-- Table structure for table `security_features`
--

CREATE TABLE IF NOT EXISTS `security_features` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name_Feature` varchar(255) NOT NULL,
  `1st_Time_date` datetime NOT NULL,
  PRIMARY KEY (`PK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `security_features`
--

INSERT INTO `security_features` (`PK_ID`, `name_Feature`, `1st_Time_date`) VALUES
(1, 'SQL Injection', '0000-00-00 00:00:00'),
(2, 'cross_site Scripting', '0000-00-00 00:00:00'),
(3, 'database_hacking', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sprint`
--

CREATE TABLE IF NOT EXISTS `sprint` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_User_ID` int(11) NOT NULL,
  `FK_Proj_ID` int(11) NOT NULL,
  `FK_Version_ID` int(11) NOT NULL,
  `sprint_name` varchar(255) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `active` varchar(50) NOT NULL,
  `Start_Date` date NOT NULL,
  PRIMARY KEY (`PK_ID`),
  KEY `s-u` (`FK_User_ID`),
  KEY `s-p` (`FK_Proj_ID`),
  KEY `s-r` (`FK_Version_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sprint`
--

INSERT INTO `sprint` (`PK_ID`, `FK_User_ID`, `FK_Proj_ID`, `FK_Version_ID`, `sprint_name`, `1st_time_date`, `due_date`, `active`, `Start_Date`) VALUES
(8, 2, 28, 15, 'sprint 2', '2013-01-15 11:34:41', '2013-01-28 00:00:00', '', '2013-01-22'),
(9, 2, 28, 15, 'sprint3', '2013-01-15 11:35:33', '2013-01-29 00:00:00', '', '2013-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `sprint_story`
--

CREATE TABLE IF NOT EXISTS `sprint_story` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_User_ID` int(11) NOT NULL,
  `FK_Sprint_ID` int(11) NOT NULL,
  `FK_Story_ID` int(11) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  PRIMARY KEY (`PK_ID`),
  KEY `sp-st-u` (`FK_User_ID`),
  KEY `sp-st-sp` (`FK_Sprint_ID`),
  KEY `sp-st-st` (`FK_Story_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sprint_story`
--

INSERT INTO `sprint_story` (`PK_ID`, `FK_User_ID`, `FK_Sprint_ID`, `FK_Story_ID`, `1st_time_date`) VALUES
(6, 2, 9, 7, '2013-01-15 17:30:10'),
(7, 2, 8, 6, '2013-01-21 16:37:25'),
(8, 2, 8, 9, '2013-01-26 20:30:46'),
(9, 2, 8, 11, '2013-01-28 21:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
  `PK_ID` int(255) NOT NULL AUTO_INCREMENT,
  `FK_User_ID` int(255) NOT NULL,
  `FK_Proj_ID` int(255) NOT NULL,
  `name_story` varchar(255) NOT NULL,
  `desc_story` varchar(500) NOT NULL,
  `prio_story` varchar(50) NOT NULL,
  `Workflow` varchar(100) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  `due_date` date NOT NULL,
  `completion_date` date NOT NULL,
  `assigned_to` int(255) NOT NULL,
  `original_Es` int(20) NOT NULL,
  `remain_Es` int(20) NOT NULL,
  `Es_Type` varchar(255) NOT NULL,
  `Dur_Type` varchar(255) NOT NULL,
  `Requested_by` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `AddedToSprint` varchar(200) NOT NULL,
  `AddedToSub` varchar(100) NOT NULL,
  `Duration` int(255) NOT NULL,
  `AddedToSecurity` int(11) NOT NULL,
  `SecurityComment` varchar(500) NOT NULL,
  PRIMARY KEY (`PK_ID`),
  KEY `st-p` (`FK_Proj_ID`),
  KEY `st-u` (`FK_User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`PK_ID`, `FK_User_ID`, `FK_Proj_ID`, `name_story`, `desc_story`, `prio_story`, `Workflow`, `1st_time_date`, `due_date`, `completion_date`, `assigned_to`, `original_Es`, `remain_Es`, `Es_Type`, `Dur_Type`, `Requested_by`, `Start_Date`, `AddedToSprint`, `AddedToSub`, `Duration`, `AddedToSecurity`, `SecurityComment`) VALUES
(6, 2, 28, 'register User', 'this story is for registering the new users', 'High', 'Approved', '2013-04-15 15:24:08', '2013-01-25', '2013-01-27', 2, 23, 2, 'months', 'Hrs', 2, '2013-01-14', 'yes', 'yes', 0, 1, 'this is very important story '),
(7, 2, 28, 'add user', '', 'Medium', 'New Request', '2013-01-28 17:17:36', '2013-01-17', '2013-01-21', 2, 26, 25, 'Hrs', 'Mins', 21, '2013-01-15', 'yes', 'yes', 0, 1, ''),
(9, 2, 28, 'waleed', 'jupopppp', 'High', 'In Progress', '2013-01-25 06:29:20', '2013-01-11', '2013-01-08', 2, 50, 0, 'days', 'Mins', 2, '2013-01-15', 'yes', '', 60, 1, ''),
(11, 2, 28, 'hju', 'test', 'High', 'Approved', '2013-01-25 18:50:40', '2013-01-12', '2013-01-14', 2, 50, 50, 'days', 'days', 2, '2013-01-08', 'yes', '', 60, 0, ''),
(12, 2, 29, 'TestMinutes', 'to test minutes', 'High', 'Approved', '2013-01-26 17:17:23', '2013-01-17', '2013-01-20', 2, 20, 70, 'Mins', 'Mins', 2, '2013-01-14', '', '', 20, 0, ''),
(35, 2, 29, 'hju', 'test', 'High', 'Approved', '2013-01-26 20:15:49', '2013-01-12', '2013-01-14', 2, 50, 50, 'days', 'days', 2, '2013-01-08', '', '', 60, 0, ''),
(36, 2, 28, 'TestMinutes', 'to test minutes', 'High', 'Approved', '2013-01-26 23:16:52', '2013-01-17', '2013-01-20', 2, 20, 70, 'Mins', 'Mins', 2, '2013-01-14', '', '', 20, 1, 'dangerous stroy'),
(37, 2, 29, 'add user', '', 'Medium', 'New Request', '2013-01-26 20:17:28', '2013-01-17', '2013-01-21', 2, 26, 25, 'Hrs', 'Mins', 21, '2013-01-15', 'yes', 'yes', 0, 1, ''),
(38, 4, 29, 'register User', 'this story is for registering the new users', 'High', 'Approved', '2013-01-28 19:49:26', '2013-01-25', '2013-01-27', 2, 23, 2, 'months', 'Hrs', 2, '2013-01-14', 'yes', 'yes', 0, 0, ''),
(39, 2, 28, 'Reports', 'mj', 'High', 'Approved', '2013-02-02 17:07:07', '2013-02-22', '2013-02-11', 2, 50, 50, 'Mins', 'Mins', 2, '2013-02-12', '', '', 30, 1, ''),
(40, 4, 29, 'register User', 'this story is for registering the new users', 'High', 'Approved', '2013-02-04 16:16:15', '2013-01-25', '2013-01-27', 2, 23, 2, 'months', 'Hrs', 2, '2013-01-14', 'yes', 'yes', 0, 1, 'this is very important story '),
(43, 2, 28, 'time estimation ', 'this is for timing', 'Low', 'Approved', '2013-02-04 16:31:03', '2013-02-06', '2013-02-12', 2, 50, 50, 'Hrs', 'Hrs', 2, '2013-02-05', '', '', 50, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE IF NOT EXISTS `sub` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_User_ID` int(11) NOT NULL,
  `name_sub` varchar(255) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  `desc_sub` varchar(500) NOT NULL,
  `FK_Proj_Id` int(11) NOT NULL,
  PRIMARY KEY (`PK_ID`),
  KEY `sub-u` (`FK_User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`PK_ID`, `FK_User_ID`, `name_sub`, `1st_time_date`, `desc_sub`, `FK_Proj_Id`) VALUES
(1, 2, 'Transportation kl', '2013-01-21 11:57:28', 'this is just for kl', 0),
(2, 2, 'transpo johor', '2013-01-21 12:06:05', 'this one for johor', 0),
(3, 2, 'transpo penang', '2013-01-21 12:08:25', 'this is for penang', 0),
(4, 2, 'transpo radang', '2013-01-21 12:10:33', 'this is for radang', 0),
(5, 2, 'Admin Login', '2013-01-21 12:13:23', 'sdfdsf', 27),
(6, 2, 'MMS reciever', '2013-01-21 12:41:16', 'this will recieve MMS', 28),
(7, 2, 'MMS sender', '2013-01-21 16:33:28', 'MMSS sender', 28);

-- --------------------------------------------------------

--
-- Table structure for table `sub_story`
--

CREATE TABLE IF NOT EXISTS `sub_story` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_User_ID` int(11) NOT NULL,
  `FK_Sub_ID` int(11) NOT NULL,
  `FK_Story_ID` int(11) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  PRIMARY KEY (`PK_ID`),
  KEY `sub-st-u` (`FK_User_ID`),
  KEY `sub-st-subp` (`FK_Sub_ID`),
  KEY `sub-st-st` (`FK_Story_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sub_story`
--

INSERT INTO `sub_story` (`PK_ID`, `FK_User_ID`, `FK_Sub_ID`, `FK_Story_ID`, `1st_time_date`) VALUES
(5, 2, 6, 6, '2013-01-21 13:09:45'),
(6, 2, 7, 7, '2013-01-21 16:34:27'),
(7, 2, 7, 6, '2013-01-28 21:45:15'),
(8, 2, 6, 7, '2013-01-28 21:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `PK_ID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  `role` varchar(255) NOT NULL,
  `FK_User_ID` int(11) NOT NULL,
  PRIMARY KEY (`PK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PK_ID`, `username`, `password`, `email`, `1st_time_date`, `role`, `FK_User_ID`) VALUES
(2, 'waleed@abc.com', '123456', 'wqaefwe@dssfs.sdfds', '2013-01-23 11:17:31', 'Scrum Master', 0),
(4, 'waleed', '125665', 'waleedkhaled2012@gmail.com', '2013-01-26 22:20:25', 'Security Master', 2);

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE IF NOT EXISTS `version` (
  `PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_User_ID` int(11) NOT NULL,
  `FK_Proj_ID` int(11) NOT NULL,
  `release_name` varchar(255) NOT NULL,
  `1st_time_date` datetime NOT NULL,
  `active` varchar(10) NOT NULL,
  `due_date` date NOT NULL,
  `Start_Date` date NOT NULL,
  PRIMARY KEY (`PK_ID`),
  KEY `v-u` (`FK_User_ID`),
  KEY `v-p` (`FK_Proj_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`PK_ID`, `FK_User_ID`, `FK_Proj_ID`, `release_name`, `1st_time_date`, `active`, `due_date`, `Start_Date`) VALUES
(15, 2, 28, 'Admin Login', '2013-01-15 11:17:25', '', '2013-01-31', '2013-01-23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feature_story`
--
ALTER TABLE `feature_story`
  ADD CONSTRAINT `fs_feature` FOREIGN KEY (`FK_Feature_ID`) REFERENCES `security_features` (`PK_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fs_Story` FOREIGN KEY (`FK_Story_ID`) REFERENCES `stories` (`PK_ID`) ON DELETE CASCADE;

--
-- Constraints for table `sprint`
--
ALTER TABLE `sprint`
  ADD CONSTRAINT `s-p` FOREIGN KEY (`FK_Proj_ID`) REFERENCES `project` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s-r` FOREIGN KEY (`FK_Version_ID`) REFERENCES `version` (`PK_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `s-u` FOREIGN KEY (`FK_User_ID`) REFERENCES `users` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sprint_story`
--
ALTER TABLE `sprint_story`
  ADD CONSTRAINT `sp-st-sp` FOREIGN KEY (`FK_Sprint_ID`) REFERENCES `sprint` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sp-st-st` FOREIGN KEY (`FK_Story_ID`) REFERENCES `stories` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sp-st-u` FOREIGN KEY (`FK_User_ID`) REFERENCES `users` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `st-p` FOREIGN KEY (`FK_Proj_ID`) REFERENCES `project` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `st-u` FOREIGN KEY (`FK_User_ID`) REFERENCES `users` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub`
--
ALTER TABLE `sub`
  ADD CONSTRAINT `sub-u` FOREIGN KEY (`FK_User_ID`) REFERENCES `users` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_story`
--
ALTER TABLE `sub_story`
  ADD CONSTRAINT `sub-st-st` FOREIGN KEY (`FK_Story_ID`) REFERENCES `stories` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub-st-subp` FOREIGN KEY (`FK_Sub_ID`) REFERENCES `sub` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub-st-u` FOREIGN KEY (`FK_User_ID`) REFERENCES `users` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `v-p` FOREIGN KEY (`FK_Proj_ID`) REFERENCES `project` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `v-u` FOREIGN KEY (`FK_User_ID`) REFERENCES `users` (`PK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
