-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2024 at 02:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EcoTrace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educontent`
--

CREATE TABLE `educontent` (
  `contentID` int(11) NOT NULL,
  `typeOfContent` varchar(50) NOT NULL,
  `categoryOfContent` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_login` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `commutingMethod` varchar(255) DEFAULT NULL,
  `energySource` varchar(255) DEFAULT NULL,
  `dietPreferences` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `first_login`, `email`, `contactNumber`, `firstName`, `lastName`, `commutingMethod`, `energySource`, `dietPreferences`) VALUES
(1, 'zoyak', '$2y$10$5nipLUb/BIo2w/qx/imOWeDKcGga39PC4Qql/uFhKKsz8AyIcTUbS', 1, 'zoya@gmail.com', '12345', 'Zoya', 'Khan', '', '', ''),
(6, 'emr', '$2y$10$2GbQnyV5Z/VN5CU6yXgCUuZPJBUGk55/PiH97CNBFTv7mCMRhKJkm', 0, 'erm@gmail.com', '1234567', 'erm', 'erm', NULL, NULL, NULL),
(7, 'zoyaaa', '$2y$10$Axad8u8pcWEYQ./1C0fcs.2PHiIFhGnEPNz33iDQMgGdmvgX8v6xq', 0, 'zoyak1220@gmail.com', '12345678', 'zoya ', 'zoya', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weeklylog`
--

CREATE TABLE `weeklylog` (
  `LogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `weekNo` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `carbonFootprintTransport` float NOT NULL,
  `carbonFootprintFood` float NOT NULL,
  `carbonFootprintEnergy` float NOT NULL,
  `totalCarbonFootprint` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weeklylog`
--

INSERT INTO `weeklylog` (`LogID`, `userID`, `date`, `weekNo`, `month`, `carbonFootprintTransport`, `carbonFootprintFood`, `carbonFootprintEnergy`, `totalCarbonFootprint`) VALUES
(5, 1, '2024-03-01 22:59:51', 3, 'March', 12.3, 46.5, 2.85, 61.65),
(6, 1, '2024-03-02 23:38:47', 2, 'March', 12.3, 77.5, 5.9, 95.7),
(7, 1, '2024-03-03 00:11:26', 1, 'March', 18.5, 77.5, 2.85, 98.85),
(8, 1, '2024-03-04 20:53:26', 4, 'March', 10.1, 82, 4.5, 96.6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `educontent`
--
ALTER TABLE `educontent`
  ADD PRIMARY KEY (`contentID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `weeklylog`
--
ALTER TABLE `weeklylog`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `user_fk` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educontent`
--
ALTER TABLE `educontent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `weeklylog`
--
ALTER TABLE `weeklylog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weeklylog`
--
ALTER TABLE `weeklylog`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
