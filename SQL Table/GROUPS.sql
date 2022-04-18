-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 12:25 AM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbeugre_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `GROUPS`
--

CREATE TABLE `GROUPS` (
  `Group_ID` int(5) NOT NULL,
  `Group_CreatorID` int(11) NOT NULL,
  `Group_Name` varchar(255) DEFAULT NULL,
  `Group_Topic` varchar(255) DEFAULT NULL,
  `Group_NumberofUser` int(255) DEFAULT NULL,
  `Group_MaxUser` int(255) DEFAULT NULL,
  `Group_Description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GROUPS`
--
ALTER TABLE `GROUPS`
  ADD PRIMARY KEY (`Group_ID`),
  ADD UNIQUE KEY `Group_ID` (`Group_ID`),
  ADD KEY `GROUPS_ibfk_1` (`Group_CreatorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GROUPS`
--
ALTER TABLE `GROUPS`
  MODIFY `Group_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GROUPS`
--
ALTER TABLE `GROUPS`
  ADD CONSTRAINT `GROUPS_ibfk_1` FOREIGN KEY (`Group_CreatorID`) REFERENCES `USER` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
