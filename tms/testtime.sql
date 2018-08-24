-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 10:21 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testtime`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblapprover`
--

CREATE TABLE `tblapprover` (
  `id` int(11) NOT NULL,
  `nme` text NOT NULL,
  `othrNme` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblapprover`
--

INSERT INTO `tblapprover` (`id`, `nme`, `othrNme`, `surname`, `email`) VALUES
(1, 'thabo', '', 'thabosur', 'thabo3@mail3.com'),
(2, 'c', '', '123', 'c123@mail3.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nme` text NOT NULL,
  `othrNme` text NOT NULL,
  `surname` text NOT NULL,
  `Position` text NOT NULL,
  `empno` varchar(50) NOT NULL,
  `departmnt` varchar(50) NOT NULL,
  `manager` varchar(100) NOT NULL,
  `approver` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `email`, `nme`, `othrNme`, `surname`, `Position`, `empno`, `departmnt`, `manager`, `approver`, `password`, `unit`) VALUES
(1, 'a123@mail.com', 'a', '', '123', 'Solution Architect', '123', 'abc', 'thabo2@mail2.com', 'c123@mail3.com', '123', 'coporate center'),
(2, 'b456@mail.com', 'b', 'b45', '456', 'SA', '456', 'def', 'thabo2@mail2.com', 'c123@mail3.com', '12345', ''),
(6, 'thabo@mail.com', 'thabo', '', 'thabosur', 'architect', 'th100', 'the touch', 'b456@mail2.com', 'thabo3@mail3.com', '67891', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblhours`
--

CREATE TABLE `tblhours` (
  `id` int(11) NOT NULL,
  `accountDescription` varchar(100) NOT NULL,
  `accountCode` varchar(100) NOT NULL,
  `dte` int(20) NOT NULL,
  `hors` float NOT NULL,
  `employee` varchar(50) NOT NULL,
  `dtemon` int(100) NOT NULL,
  `monhrs` float NOT NULL,
  `dtetue` int(11) NOT NULL,
  `tuehrs` float NOT NULL,
  `dtewed` int(11) NOT NULL,
  `wedhrs` float NOT NULL,
  `dtethur` int(11) NOT NULL,
  `thurhrs` float NOT NULL,
  `dtefri` int(11) NOT NULL,
  `frihrs` float NOT NULL,
  `dtesat` int(11) NOT NULL,
  `sathrs` float NOT NULL,
  `dtesun` int(11) NOT NULL,
  `sunhrs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhours`
--

INSERT INTO `tblhours` (`id`, `accountDescription`, `accountCode`, `dte`, `hors`, `employee`, `dtemon`, `monhrs`, `dtetue`, `tuehrs`, `dtewed`, `wedhrs`, `dtethur`, `thurhrs`, `dtefri`, `frihrs`, `dtesat`, `sathrs`, `dtesun`, `sunhrs`) VALUES
(39, 'general', '123456', 1531087200, 1.5, 'a123@mail.com', 1531087200, 0, 1531173600, 0, 1531260000, 0, 1531346400, 0, 1531432800, 0, 1531519200, 0, 1531605600, 0),
(40, 'gen2', '987', 1531087200, 4.5, 'a123@mail.com', 1531087200, 0, 1531173600, 0, 1531260000, 0, 1531346400, 0, 1531432800, 0, 1531519200, 0, 1531605600, 0),
(41, 'gen2', '987', 1531346400, 5, 'a123@mail.com', 1532296800, 5.5, 1532383200, 0, 1532469600, 0, 1532556000, 0, 1532642400, 0, 1532728800, 0, 1532815200, 0),
(90, 'general', '123456', 1530482400, 1.5, 'a123@mail.com', 1530482400, 0, 1530568800, 0, 1530655200, 0, 1530741600, 0, 1530828000, 0, 1530914400, 0, 1531000800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmanager`
--

CREATE TABLE `tblmanager` (
  `id` int(11) NOT NULL,
  `nme` text NOT NULL,
  `surnme` text NOT NULL,
  `othernme` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmanager`
--

INSERT INTO `tblmanager` (`id`, `nme`, `surnme`, `othernme`, `email`) VALUES
(1, 'thabo', '', 'thabosur', 'thabo2@mail2.com'),
(2, 'b4', '', '456', 'b456@mail2.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblwork`
--

CREATE TABLE `tblwork` (
  `id` int(11) NOT NULL,
  `accountDescription` varchar(100) NOT NULL,
  `crNumber` varchar(100) NOT NULL,
  `accountCode` varchar(100) NOT NULL,
  `employee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwork`
--

INSERT INTO `tblwork` (`id`, `accountDescription`, `crNumber`, `accountCode`, `employee`) VALUES
(1, 'general', '987', '123456', 'a123@mail.com'),
(2, 'gen2', 'C987', '987', 'a123@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblworktime`
--

CREATE TABLE `tblworktime` (
  `id` int(11) NOT NULL,
  `accountDescription` varchar(100) NOT NULL,
  `accountCode` varchar(100) NOT NULL,
  `crnum` varchar(20) NOT NULL,
  `frmdate` int(100) NOT NULL,
  `todate` int(100) NOT NULL,
  `employee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblworktime`
--

INSERT INTO `tblworktime` (`id`, `accountDescription`, `accountCode`, `crnum`, `frmdate`, `todate`, `employee`) VALUES
(2, 'general', '123456', '987', 1529272800, 1529618400, 'a123@mail.com'),
(3, 'general', '123456', '987', 1530482400, 1530828000, 'a123@mail.com'),
(4, 'general', '123456', '987', 1530482400, 1530828000, 'a123@mail.com'),
(5, 'general', '123456', '987', 1530482400, 1530828000, 'a123@mail.com'),
(6, 'general', '123456', '987', 1530655200, 1530741600, 'a123@mail.com'),
(7, 'general', '123456', '987', 1530655200, 1530741600, 'a123@mail.com'),
(8, 'general', '123456', '987', 1530482400, 1530828000, 'a123@mail.com'),
(9, 'general', '123456', '987', 1531087200, 1531432800, 'a123@mail.com'),
(10, 'general', '123456', '987', 0, 345600, 'a123@mail.com'),
(11, 'general', '123456', '987', 0, 345600, 'a123@mail.com'),
(12, 'general', '123456', '987', 1530482400, 1530828000, 'a123@mail.com'),
(13, 'general', '123456', '987', 1532296800, 1532642400, 'a123@mail.com'),
(14, 'general', '123456', '987', 1532296800, 1532642400, 'a123@mail.com'),
(15, 'gen2', '987', 'C987', 1531087200, 1531432800, 'a123@mail.com'),
(16, 'general', '123456', '987', 1531692000, 1532037600, 'a123@mail.com'),
(17, 'general', '123456', '987', 1530482400, 1530828000, 'a123@mail.com'),
(18, 'general', '123456', '987', 1532296800, 1532642400, 'a123@mail.com'),
(19, 'general', '123456', '987', 1530482400, 1531000800, 'a123@mail.com'),
(20, 'general', '123456', '987', 1532296800, 1532815200, 'a123@mail.com'),
(21, 'general', '123456', '987', 1530482400, 1531000800, 'a123@mail.com'),
(22, 'general', '123456', '987', 1531087200, 1531605600, 'a123@mail.com'),
(23, 'gen2', '987', 'C987', 1531087200, 1531605600, 'a123@mail.com'),
(24, 'gen2', '987', 'C987', 1532296800, 1532815200, 'a123@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblapprover`
--
ALTER TABLE `tblapprover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblhours`
--
ALTER TABLE `tblhours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmanager`
--
ALTER TABLE `tblmanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblwork`
--
ALTER TABLE `tblwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblworktime`
--
ALTER TABLE `tblworktime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblapprover`
--
ALTER TABLE `tblapprover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblhours`
--
ALTER TABLE `tblhours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tblmanager`
--
ALTER TABLE `tblmanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblwork`
--
ALTER TABLE `tblwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblworktime`
--
ALTER TABLE `tblworktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
