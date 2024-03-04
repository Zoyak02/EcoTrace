-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2024 at 11:00 AM
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
(7, 'zoyaaa', '$2y$10$UPgQ8YeYO1xIP5bbTWcxeekGQud7o8W7jqsmnF4zH5VXYXwMMd8Ye', 0, 'zoyak1220@gmail.com', '12345678', 'zoya ', 'zoya', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
