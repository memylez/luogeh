-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 04:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luogeh`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `cname` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `parent_ssn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`cname`, `age`, `parent_ssn`) VALUES
('Clare', 12, 54321),
('Jona', 10, 98765),
('Ron', 10, 98765),
('Sap', 9, 23456),
('Rian', 5, 10510);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_num` int(11) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `mgr_ssn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_num`, `dept_name`, `budget`, `mgr_ssn`) VALUES
(1, 'IT', 150000, 54321),
(2, 'Agriculture', 150000, 98765),
(3, 'Business', 150000, 23456),
(4, 'AgriBusiness', 150000, 10510);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ssn` int(11) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ssn`, `salary`, `phone`) VALUES
(10510, 28000, '09285621659'),
(11213, 27000, '09365489856'),
(12356, 29000, '09771598632'),
(14243, 27000, '09771386841'),
(23456, 28000, '09157456321'),
(54321, 35000, '09123456789'),
(87654, 27000, '09365489856'),
(98765, 28200, '09771386841');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD UNIQUE KEY `cname` (`cname`),
  ADD KEY `parent_ssn` (`parent_ssn`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_num`),
  ADD KEY `mgr_ssn` (`mgr_ssn`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ssn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`parent_ssn`) REFERENCES `employee` (`ssn`) ON DELETE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`mgr_ssn`) REFERENCES `employee` (`ssn`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
