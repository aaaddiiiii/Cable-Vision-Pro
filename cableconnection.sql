-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 06:03 AM
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
-- Database: `cableconnection`
--

-- --------------------------------------------------------

--
-- Table structure for table `billist`
--

CREATE TABLE `billist` (
  `No` int(11) NOT NULL,
  `BillReceiver` varchar(40) NOT NULL,
  `DueDate` date NOT NULL,
  `Amount` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billist`
--

INSERT INTO `billist` (`No`, `BillReceiver`, `DueDate`, `Amount`) VALUES
(1, 'all', '2024-03-31', 600),
(2, 'all', '2024-12-03', 6500),
(3, 'hd', '2024-02-15', 6500),
(4, 'all', '2024-02-22', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `No` int(20) NOT NULL,
  `Uid` varchar(40) NOT NULL,
  `Feedback` varchar(40) NOT NULL,
  `Resolved` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`No`, `Uid`, `Feedback`, `Resolved`) VALUES
(1, 'u112', 'My set top box is damaged', 'NO'),
(2, 'u112', 'HD channels not working', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `fullbill`
--

CREATE TABLE `fullbill` (
  `No` int(11) NOT NULL,
  `Uname` varchar(40) NOT NULL,
  `DueDate` date NOT NULL,
  `Amount` int(40) NOT NULL,
  `Paid` varchar(30) NOT NULL,
  `TransID` varchar(40) NOT NULL,
  `UPIID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fullbill`
--

INSERT INTO `fullbill` (`No`, `Uname`, `DueDate`, `Amount`, `Paid`, `TransID`, `UPIID`) VALUES
(1, 'Abhay Suresh', '2024-03-31', 600, 'YES', 'vdfbgn', 'hbfnfsh'),
(2, 'Milan', '2024-03-31', 600, 'YES', 'djibjsiBjo', 'milan@oksbi'),
(3, 'Milan', '2024-12-03', 6500, 'YES', 'bdhiadjiae', 'milan@oksbi'),
(4, 'Milan', '2024-02-22', 7000, 'NO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userid` varchar(40) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `pno` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `addr` varchar(40) NOT NULL,
  `plan` varchar(40) NOT NULL,
  `plan_activation` varchar(40) NOT NULL,
  `usertype` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userid`, `user_password`, `user_name`, `pno`, `email`, `addr`, `plan`, `plan_activation`, `usertype`) VALUES
('a111', 'adminpass', 'Adithyadev S', '8590174710', 'adithyadevseattolil@gmail.com', 'Pala', '', '', 'admin'),
('u112', 'upassword2', 'Milan', '09876543210', 'milangeomatt@gmail.com', 'Muvattupuzha', 'Normal', 'YES', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billist`
--
ALTER TABLE `billist`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `fullbill`
--
ALTER TABLE `fullbill`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billist`
--
ALTER TABLE `billist`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fullbill`
--
ALTER TABLE `fullbill`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
