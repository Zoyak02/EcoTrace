-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 03:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecotrace`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educontent`
--

CREATE TABLE `educontent` (
  `contentID` int(11) NOT NULL,
  `typeOfContent` varchar(50) NOT NULL,
  `categoryOfContent` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educontent`
--

INSERT INTO `educontent` (`contentID`, `typeOfContent`, `categoryOfContent`, `title`, `description`, `content`) VALUES
(19, 'Infographic', 'Transportation', 'The Carbon Cost Of Transportation', 'Embark on a journey through our comprehensive infographic as we unveil the carbon cost of various modes of transportation. Delve into the environmental impact of your travel choices, from everyday commuting to long-distance trips, and gain insights into the carbon footprints associated with different vehicles. This visually engaging infographic breaks down the carbon emissions of automobiles, buses, trains, flights, and more, measuring their environmental impact in grams of carbon dioxide. Discover how each mode of transportation contributes to the global carbon footprint, empowering you with knowledge to make informed and sustainable travel decisions.', '23658carbon-cost-of-transportation-ds.jpg'),
(20, 'Video', 'Environmental Issue', 'What is Carbon Footprint', 'Reducing your carbon footprint is about minimizing the environmental impact of your actions, much like leaving a mark on the environment with every activity that releases carbon emissions, such as CO2 from burning fossil fuels. It\'s not just about the emissions from your car\'s engine; consider the entire lifecycle, from extracting and transporting fuel to manufacturing the vehicle. Even seemingly simple activities like reading a book or eating an apple contribute to your carbon footprint due to energy consumption and transportation. While it\'s challenging to have zero impact, being mindful of your choices can help shrink your carbon footprint and contribute to combating climate change.', '96699simpleshow explains the Carbon Footprint.mp4'),
(21, 'Image', 'Dietary Choice', 'A Guide to Climate-friendly food choices', 'To minimize your carbon footprint through dietary choices, adopt a plant-based or flexitarian diet, prioritize locally sourced and seasonal produce, reduce dairy consumption, choose organic options with minimal packaging, explore insect-based proteins, engage in meatless days, calculate and offset your emissions, support sustainable agriculture initiatives, educate others on eco-friendly choices, practice water-efficient cooking, opt for low-impact snacks, plan sustainable celebrations, and consistently make mindful, informed decisions about the foods you consume.', '37306Screenshot 2024-02-29 at 5.40.10 PM.png'),
(22, 'Image', 'Energy Consumption', '5 Simple Tips to Save Energy', 'Unlock the power of energy efficiency with our visually compelling infographic that shares five practical tips to lighten your environmental impact. Dive into a world of sustainable living as we guide you through easy-to-implement strategies that not only conserve energy but also contribute to a greener tomorrow. Join the movement towards a more sustainable lifestyle – it\'s time to energize your life while preserving our planet! #EnergyEfficiency #EcoTrace', '64683energy tips for college students.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `first_login`, `email`, `contactNumber`, `firstName`, `lastName`, `commutingMethod`, `energySource`, `dietPreferences`) VALUES
(1, 'zoyak', '$2y$10$5nipLUb/BIo2w/qx/imOWeDKcGga39PC4Qql/uFhKKsz8AyIcTUbS', 1, 'zoya@gmail.com', '12345', 'Zoya', 'Khan', '', '', ''),
(6, 'emr', '$2y$10$2GbQnyV5Z/VN5CU6yXgCUuZPJBUGk55/PiH97CNBFTv7mCMRhKJkm', 0, 'erm@gmail.com', '1234567', 'erm', 'erm', NULL, NULL, NULL),
(7, 'zoyaaa', '$2y$10$Axad8u8pcWEYQ./1C0fcs.2PHiIFhGnEPNz33iDQMgGdmvgX8v6xq', 0, 'zoyak1220@gmail.com', '12345678', 'zoya ', 'zoya', NULL, NULL, NULL),
(8, 'ermmyna', '$2y$10$CaWKKr6vtO9HxDenv7cNwOQigbHDB5R42CZ4HKIfMlrotmX2mTyF.', 0, 'ermmyna@gmail.com', '+60192644588', 'Ermmyna', 'Roselee Shah', NULL, NULL, NULL),
(9, 'zoyakhan', '$2y$10$Ar5ib.LZU3awc2iUMHQrFetD3b183e6U4F3PAPT9bTOCvv5GTlLuG', 1, 'zoyak1220@gmail.com', '1234567', 'Zoya', 'Khan', NULL, NULL, NULL),
(11, 'jimmy', '$2y$10$SaKHd8Cm1Vy336I9ZUjgl.RAe8xAmWKxdgl3ZUc2BxUCIdtpLJ0x6', 0, 'tanjimhern@gmail.com', '123424234', 'Jim Hern', 'Tan', NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- AUTO_INCREMENT for table `educontent`
--
ALTER TABLE `educontent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`userID`) REFERENCES `ecotrace2`.`user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
