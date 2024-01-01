-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2024 at 12:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lstv`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerfile`
--

CREATE TABLE `customerfile` (
  `cuscde` varchar(55) DEFAULT NULL,
  `tercde` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerfile`
--

INSERT INTO `customerfile` (`cuscde`, `tercde`) VALUES
('CUSTOMER 1', 'CALOOCAN'),
('CUSTOMER 2', 'CALOOCAN'),
('CUSTOMER 3', 'MALABON'),
('CUSTOMER 4', 'NAVOTAS'),
('CUSTOMER 5', 'MALABON');

-- --------------------------------------------------------

--
-- Table structure for table `db_problem4`
--

CREATE TABLE `db_problem4` (
  `recid` int(11) NOT NULL,
  `trndte` date DEFAULT NULL,
  `cremon` int(11) NOT NULL,
  `creyer` year(4) NOT NULL,
  `datetyp` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_problem4`
--

INSERT INTO `db_problem4` (`recid`, `trndte`, `cremon`, `creyer`, `datetyp`) VALUES
(1, '2000-11-01', 11, '2000', 'F'),
(2, '1999-03-31', 3, '1999', 'L'),
(5, '2016-02-29', 2, '2016', 'L'),
(6, '2012-02-29', 2, '2012', 'L'),
(9, '2013-02-28', 2, '2013', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `db_problem5`
--

CREATE TABLE `db_problem5` (
  `recid` int(11) NOT NULL,
  `field1` varchar(555) NOT NULL,
  `field2` varchar(555) NOT NULL,
  `field3` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_problem5`
--

INSERT INTO `db_problem5` (`recid`, `field1`, `field2`, `field3`) VALUES
(1, 'f1-001', 'f2-002', 'f2-002'),
(2, 'f3-003', 'f3-003', 'f1-001'),
(5, 'f1-001', 'f1-001', 'f1-001');

-- --------------------------------------------------------

--
-- Table structure for table `employeefile`
--

CREATE TABLE `employeefile` (
  `recid` int(11) NOT NULL,
  `empcode` int(11) NOT NULL,
  `empname` varchar(55) NOT NULL,
  `birthdate` date NOT NULL,
  `status` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeefile`
--

INSERT INTO `employeefile` (`recid`, `empcode`, `empname`, `birthdate`, `status`, `gender`, `salary`) VALUES
(1, 2, 'allysa', '0000-00-00', 'single', 'female', 20000),
(2, 3, 'louis gonzaga', '0000-00-00', 'single', 'female', 21000),
(3, 4, 'elisa gonzaga', '0000-00-00', 'married', 'female', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `masterfile`
--

CREATE TABLE `masterfile` (
  `cuscde` varchar(55) DEFAULT NULL,
  `cusdsc` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterfile`
--

INSERT INTO `masterfile` (`cuscde`, `cusdsc`) VALUES
('CUSTOMER 1', 'CUS1'),
('CUSTOMER 2', 'CUS2'),
('CUSTOMER 3', 'CUS3'),
('CUSTOMER 4', 'CUS4'),
('CUSTOMER 5', 'CUS5');

-- --------------------------------------------------------

--
-- Table structure for table `salesfile1`
--

CREATE TABLE `salesfile1` (
  `docnum` int(5) UNSIGNED ZEROFILL NOT NULL,
  `trndte` date DEFAULT NULL,
  `cuscde` varchar(55) DEFAULT NULL,
  `trntot` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesfile1`
--

INSERT INTO `salesfile1` (`docnum`, `trndte`, `cuscde`, `trntot`) VALUES
(00055, '2024-01-09', 'CUSTOMER 1', 1500),
(00056, '2024-01-10', 'CUSTOMER 2', 2000),
(00057, '2024-01-11', 'CUSTOMER 3', 3000),
(00058, '2024-01-21', 'CUSTOMER 4', 1122),
(00059, '2024-01-20', 'CUSTOMER 5', 2223),
(00060, '2024-01-05', 'CUSTOMER 2', 2212),
(00061, '2024-01-03', 'CUSTOMER 1', 4444),
(00062, '2024-01-29', 'CUSTOMER 4', 2222),
(00063, '2024-01-18', 'CUSTOMER 3', 1232),
(00064, '2024-01-11', 'CUSTOMER 1', 2323),
(00065, '2024-01-09', 'CUSTOMER 1', 1500),
(00066, '2024-01-10', 'CUSTOMER 2', 2000),
(00067, '2024-01-11', 'CUSTOMER 3', 3000),
(00068, '2024-01-21', 'CUSTOMER 4', 1122),
(00069, '2024-01-20', 'CUSTOMER 5', 2223),
(00070, '2024-01-05', 'CUSTOMER 2', 2212),
(00071, '2024-01-03', 'CUSTOMER 1', 4444),
(00072, '2024-01-29', 'CUSTOMER 4', 2222),
(00073, '2024-01-18', 'CUSTOMER 3', 1232),
(00074, '2024-01-11', 'CUSTOMER 1', 2323);

-- --------------------------------------------------------

--
-- Table structure for table `territoryfile`
--

CREATE TABLE `territoryfile` (
  `tercde` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `territoryfile`
--

INSERT INTO `territoryfile` (`tercde`) VALUES
('MALABON'),
('NAVOTAS'),
('CALOOCAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerfile`
--
ALTER TABLE `customerfile`
  ADD UNIQUE KEY `cuscde` (`cuscde`);

--
-- Indexes for table `db_problem4`
--
ALTER TABLE `db_problem4`
  ADD PRIMARY KEY (`recid`);

--
-- Indexes for table `db_problem5`
--
ALTER TABLE `db_problem5`
  ADD PRIMARY KEY (`recid`);

--
-- Indexes for table `employeefile`
--
ALTER TABLE `employeefile`
  ADD PRIMARY KEY (`recid`),
  ADD UNIQUE KEY `empcode` (`empcode`);

--
-- Indexes for table `salesfile1`
--
ALTER TABLE `salesfile1`
  ADD PRIMARY KEY (`docnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_problem4`
--
ALTER TABLE `db_problem4`
  MODIFY `recid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_problem5`
--
ALTER TABLE `db_problem5`
  MODIFY `recid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employeefile`
--
ALTER TABLE `employeefile`
  MODIFY `recid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salesfile1`
--
ALTER TABLE `salesfile1`
  MODIFY `docnum` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
