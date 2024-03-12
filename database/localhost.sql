-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 06:40 AM
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
-- Database: `bookings`
--
CREATE DATABASE IF NOT EXISTS `bookings` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookings`;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `orderID` char(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `idNo` varchar(50) NOT NULL,
  `guests` int(10) NOT NULL,
  `tour_type` char(10) NOT NULL,
  `tour_location` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `star_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`orderID`, `userID`, `username`, `firstName`, `lastName`, `phoneNo`, `idNo`, `guests`, `tour_type`, `tour_location`, `product_name`, `product_price`, `total_amount`, `review`, `star_rating`) VALUES
('OD102486664', 'U1', 'hi', 'he', 'he', 1234567890, 'h123456789', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, 'dddee', 3),
('OD221620067', 'U1', 'hi', 'ffrr', 'ffrr', 12345678, 'g2345678', 4, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1526.00, NULL, NULL),
('OD234286272', 'U2', 'hello', 'zzz', 'khan', 1123456, 'd1234567', 5, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1908.00, NULL, NULL),
('OD234363699', 'U1', 'hi', 'zoa', 'zoa', 12345678, 'h12345678', 2, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1272.00, 'Love it ', 5),
('OD236370439', 'U1', 'hi', 'ss', 'ss', 12345678, 'ss1234567', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, NULL, NULL),
('OD256878584', 'U1', 'hi', 'ss', 'ss', 1234567, 'g12345678', 3, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1908.00, NULL, NULL),
('OD313823638', 'U1', 'hi', 'chea wan xin', 'cheah wan xin', 12345667, 'd123456789', 8, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 5088.00, 'Greattttttt', 5),
('OD333998060', 'U1', 'hi', 'yyy', 'yy', 98765432, 'y8765432', 5, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1908.00, NULL, NULL),
('OD377933998', 'U1', 'hi', 'hh', 'hh', 12345678, 'h123456789', 6, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 2290.00, NULL, NULL),
('OD447207659', 'U1', 'hi', 'hello', 'hello', 98765432, 'dd98765432', 4, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1526.00, 'Lovely ', 4),
('OD464247762', 'U1', 'hi', 'han', 'han', 87654321, 'han123456', 1, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 382.00, 'Great', 2),
('OD552151042', 'U1', 'hi', 'sss', 's', 12345678, 'd12345', 3, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1145.00, NULL, NULL),
('OD624191026', 'U1', 'hi', 'hh', 'hh', 2345678, 'a1234567890', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, 'yooo', 3),
('OD692051716', 'U1', 'hi', 'heel', 'heel', 98765432, 'g098765432', 3, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1908.00, NULL, NULL),
('OD769048341', 'U1', 'hi', 'hh', 'hh', 1234567890, 'g123456789', 3, 'Asia', 'India', 'Your Passage to a Land of Diversity and Splendor!', 600.00, 1908.00, 'wowwwwwwwww ', 5),
('OD77745564', 'U1', 'hi', 'hh', 'hh', 2345678, 'a1234567890', 2, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 763.00, 'greatttt', 4),
('OD841712089', 'U1', 'hi', 'dd', 'dd', 7654321, 'd8765432', 4, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1526.40, NULL, NULL),
('OD998172383', 'U1', 'hi', 'bb', 'bb', 7865432, 'b8765432', 4, 'Asia', 'Japan', 'Your Journey to the Land of the Rising Sun!', 360.00, 1526.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `orderID` char(11) NOT NULL,
  `tour_type` varchar(10) NOT NULL,
  `tour_location` varchar(20) NOT NULL,
  `guests` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `bookingRefNo` int(6) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `paymentStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`orderID`, `tour_type`, `tour_location`, `guests`, `firstName`, `lastName`, `total_amount`, `bookingRefNo`, `paymentMethod`, `paymentStatus`) VALUES
('OD320522258', 'Asia', 'Japan', 4, 'han', 'han', 1526.00, 579277418, 'CARD', 'PAID'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 729401895, 'CARD', 'SUCCESS'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 123721159, 'CARD', 'SUCCESS'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 597202934, 'CARD', 'SUCCESS'),
('OD464247762', 'Asia', 'Japan', 1, 'han', 'han', 382.00, 288505646, 'CARD', 'SUCCESS'),
('OD234363699', 'Asia', 'India', 2, 'zoa', 'zoa', 1272.00, 901761341, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 822202078, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 146167092, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 817642649, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 498922699, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 316647975, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 118439795, 'CARD', 'SUCCESS'),
('OD102486664', 'Asia', 'Japan', 2, 'he', 'he', 763.00, 320789373, 'CARD', 'SUCCESS'),
('OD77745564', 'Asia', 'Japan', 2, 'hh', 'hh', 763.00, 232035085, 'CARD', 'SUCCESS'),
('OD769048341', 'Asia', 'India', 3, 'hh', 'hh', 1908.00, 34675937, 'CARD', 'SUCCESS'),
('OD692051716', 'Asia', 'India', 3, 'heel', 'heel', 1908.00, 872748191, 'CARD', 'SUCCESS'),
('OD377933998', 'Asia', 'Japan', 6, 'hh', 'hh', 2290.00, 87086010, 'CARD', 'SUCCESS'),
('OD313823638', 'Asia', 'India', 8, 'chea wan xin', 'cheah wan xin', 5088.00, 959841970, 'CARD', 'SUCCESS'),
('OD221620067', 'Asia', 'Japan', 4, 'ffrr', 'ffrr', 1526.00, 739459346, 'CARD', 'SUCCESS'),
('OD998172383', 'Asia', 'Japan', 4, 'bb', 'bb', 1526.00, 596551422, 'CARD', 'SUCCESS'),
('OD841712089', 'Asia', 'Japan', 4, 'dd', 'dd', 1526.00, 352045582, 'CARD', 'SUCCESS'),
('OD299332283', 'Asia', 'Japan', 3, 'Zoya ', 'Khan', 1144.00, 604842642, 'CARD', 'SUCCESS'),
('OD926858984', 'Asia', 'Japan', 3, 'Zoya', 'Khan', 1144.00, 878344514, 'CARD', 'SUCCESS'),
('OD408235617', 'Asia', 'Japan', 3, 'Zoya', 'Khan', 1144.00, 999342050, 'CARD', 'SUCCESS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`username`) REFERENCES `login`.`user` (`username`);
--
-- Database: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `merchantID` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `merchant_logo` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `tour_type` enum('Asia','Europe','North America') NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`merchantID`, `username`, `merchant_logo`, `id`, `tour_type`, `name`, `location`, `price`, `description`, `image`) VALUES
('M505933160', 'Parlo Tours', 'uploads/logo-og.png', 1, 'Asia', 'Your Journey to the Land of the Rising Sun!', 'Japan', 360.00, ' Embark on an unforgettable adventure to Japan with our exclusive \"Japan Unveiled\" package tour. \r\nDive into the mesmerizing world of the Land of the Rising Sun, where ancient traditions coexist with modern marvels. \r\n                          This meticulously crafted tour invites you to explore the very essence of Japan.', '46829photo-1627052862140-069bd225b3b2.jpeg'),
('M505933160', 'Parlo Tours', 'uploads/logo-og.png', 2, 'Asia', 'Your Passage to a Land of Diversity and Splendor!', 'India', 600.00, 'Prepare to be enchanted by the myriad colors, cultures, and landscapes of India with our \"Incredible India\" package tour. \r\n                          This immersive journey invites you to explore the captivating tapestry of the Indian subcontinent, \r\n                          where ancient traditions seamlessly blend with modern wonders.', '56791photo-1696887484490-715e7eb0e682.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchantID` (`merchantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Database: `crud_php`
--
CREATE DATABASE IF NOT EXISTS `crud_php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud_php`;

-- --------------------------------------------------------

--
-- Table structure for table `adminofficer`
--

CREATE TABLE `adminofficer` (
  `officerID` int(11) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminofficer`
--

INSERT INTO `adminofficer` (`officerID`, `adminName`, `adminEmail`, `password`) VALUES
(1, 'admn212', 'admn212@gmail.com', 'admn2120'),
(2, 'admin212', 'admin212@gmail.com', '$2y$10$RISpeYgwZhAEeIN7CwU8NuLTeW8q47zTbW.RS.kGDbdkcVSEGrCMS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curd`
--

CREATE TABLE `tbl_curd` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `releaseyear` year(4) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `rating` char(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_curd`
--

INSERT INTO `tbl_curd` (`id`, `title`, `releaseyear`, `genre`, `director`, `rating`, `image`) VALUES
(1, ' Guardians of the Galaxy Vol. 3', '2023', 'Action, Sci-Fi', 'James Gunn', '10', 'uploads/Movie 1.jpg'),
(2, 'Weathering with You', '2019', 'Anime', 'Makoto Shinkai', '8', 'uploads/Movie2.jpg'),
(3, 'The Godfather', '1972', 'Crime, Action', 'Francis Ford Coppola', '10', 'uploads/Movie 3.jpg'),
(4, 'Spirited Away', '2001', 'Anime, Fantasy', 'Hayao Miyazaki', '10', 'uploads/Movie 4.jpg'),
(14, 'Oppenheimer', '2023', 'Thriller ', 'Christopher Nolan', '9', 'uploads/movie 6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminofficer`
--
ALTER TABLE `adminofficer`
  ADD PRIMARY KEY (`officerID`);

--
-- Indexes for table `tbl_curd`
--
ALTER TABLE `tbl_curd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminofficer`
--
ALTER TABLE `adminofficer`
  MODIFY `officerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_curd`
--
ALTER TABLE `tbl_curd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `EcoTrace`
--
CREATE DATABASE IF NOT EXISTS `EcoTrace` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `EcoTrace`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `email`) VALUES
('AD01', 'admin216', 'admin216', 'admin216@ecoTrace.com');

-- --------------------------------------------------------

--
-- Table structure for table `eduContent`
--

CREATE TABLE `eduContent` (
  `contentID` int(11) NOT NULL,
  `typeOfContent` varchar(50) NOT NULL,
  `categoryOfContent` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eduContent`
--

INSERT INTO `eduContent` (`contentID`, `typeOfContent`, `categoryOfContent`, `title`, `description`, `content`) VALUES
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
  `profilePicture` varchar(255) NOT NULL,
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

INSERT INTO `user` (`userID`, `username`, `password`, `first_login`, `profilePicture`, `email`, `contactNumber`, `firstName`, `lastName`, `commutingMethod`, `energySource`, `dietPreferences`) VALUES
(1, 'zoyak', '$2y$10$5nipLUb/BIo2w/qx/imOWeDKcGga39PC4Qql/uFhKKsz8AyIcTUbS', 1, '', 'zoya@gmail.com', '12345', 'Zoya', 'Khan', '', '', ''),
(6, 'emr', '$2y$10$2GbQnyV5Z/VN5CU6yXgCUuZPJBUGk55/PiH97CNBFTv7mCMRhKJkm', 0, '', 'erm@gmail.com', '1234567', 'erm', 'erm', NULL, NULL, NULL),
(7, 'zoyaaa', '$2y$10$.koVpy2MSHEk1p3KoJ4lp.ZRhAbuj3TJRIVwN8FQwGG.xwCJitcvS', 0, '', 'zoyak1220@gmail.com', '12345678', 'zoya ', 'zoya', NULL, NULL, NULL),
(8, 'zoya1', '$2y$10$PfuxtJAbtTFcNI.pEJKKSuDfTDR0DAWreIIkMjkRkkN9wNELHnrta', 0, '', 'zoyak1220@gmail.com', '12345678', 'zoya', 'khan', NULL, NULL, NULL);

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
(8, 1, '2024-03-04 20:53:26', 4, 'March', 10.1, 82, 4.5, 96.6),
(13, 7, '2024-02-29 19:43:15', 4, 'Feburary', 19.6, 73.5, 2.95, 96.05),
(14, 7, '2024-03-09 13:37:55', 2, 'March', 16.8, 54, 4.2, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `eduContent`
--
ALTER TABLE `eduContent`
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
-- AUTO_INCREMENT for table `eduContent`
--
ALTER TABLE `eduContent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weeklylog`
--
ALTER TABLE `weeklylog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weeklylog`
--
ALTER TABLE `weeklylog`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
--
-- Database: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `user_type`) VALUES
('admn210', '$2y$10$YVXyB1DTGNkYz7v015.knu5Qc/DTQslQNWQO0qu7g0Pwjpszf4qb.', 'admin'),
('Apple Vacations', '$2y$10$RDbAJIgctTxbeXDqks5ThetCZYLc.9P28bJ.nzEm8RTA94bQKxw.W', 'merchant'),
('crud', '$2y$10$AdlDT16Ktn2haWLDb94ykuZP/w7tInuxgzSN1Oj6N4TUDveCqC13G', 'merchant'),
('hello', '$2y$10$1pYDui.PUNSgxM6VtxCMu.b7IudplhOULVOks.9AQUUd2oinpjaFS', 'user'),
('hi', '$2y$10$Q4I5xySdtu5SRsOQNtCLAOIr2yG1L9pc8LhnPlwvl.6PEcE9TJVrO', 'user'),
('Parlo Tours', '$2y$10$34oo7KTIoEpdIra.gtcGteRyKMmznvGX9IrDppKBS3ab1QJO.U/WS', 'merchant'),
('perto', '$2y$10$.m27k9gBdOo.DqPbvIw4keCWNrJyOJevDFQr09zIPPx34CjfOUqpi', 'merchant'),
('Star Travels', '$2y$10$K0vtlXkgmE.8F1ca8FFCFeihjETz72xePuc6bUzP/C1KgRKjDJfre', 'merchant'),
('tourismOfficer210', '$2y$10$XzvWuzIMtRbXenoYrCisqun0WTMrKpPpo44qWcAEqxYdIDeuiX45u', 'tourism_officer'),
('Zoya', '$2y$10$ADfAgIivQ0BFaOZSmU0g4u1aJdzHA9.XkPmeyfd2liir0/tzuCgiK', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `user_type`) VALUES
('A12345', 'admn210', '$2y$10$YVXyB1DTGNkYz7v015.knu5Qc/DTQslQNWQO0qu7g0Pwjpszf4qb.', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchantID` char(11) NOT NULL,
  `first_login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL DEFAULT 'merchant',
  `email` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchantID`, `first_login`, `username`, `password`, `user_type`, `email`, `number`, `description`, `logo`, `document`, `status`) VALUES
('M103089407', 0, 'crud', '$2y$10$AdlDT16Ktn2haWLDb94ykuZP/w7tInuxgzSN1Oj6N4TUDveCqC13G', 'merchant', 'crud@gmail.com', 23456756, 'crud', 'uploads/8a2ba667-413c-4287-affe-5c2836e784ac.jpg', '', 'APPROVED'),
('M407423370', 0, 'perto', '$2y$10$.m27k9gBdOo.DqPbvIw4keCWNrJyOJevDFQr09zIPPx34CjfOUqpi', 'merchant', 'perto@gmail.com', 3456738, 'perto', '', '', 'PENDING'),
('M505933160', 0, 'Parlo Tours', '$2y$10$34oo7KTIoEpdIra.gtcGteRyKMmznvGX9IrDppKBS3ab1QJO.U/WS', 'merchant', 'parlo@gmail.com', 46699380, 'parlo', 'uploads/logo-og.png', '', 'PENDING'),
('M736351602', 0, 'Star Travels', '$2y$10$K0vtlXkgmE.8F1ca8FFCFeihjETz72xePuc6bUzP/C1KgRKjDJfre', 'merchant', 'startravel@gmail.com', 32436783, 'Star Travel Malaysia is your gateway to unparalleled travel experiences in the heart of Southeast Asia. We specialize in curating celestial journeys, offering a blend of exceptional destinations, seamless service, and unforgettable adventures.', 'uploads/m-s-star-travel-agencies-profile.jpg', 'uploads/8a2ba667-413c-4287-affe-5c2836e784ac.jpg', 'APPROVED'),
('M796441865', 0, 'Apple Vacations', '$2y$10$RDbAJIgctTxbeXDqks5ThetCZYLc.9P28bJ.nzEm8RTA94bQKxw.W', 'merchant', 'Apple@gmail.com', 1234567, 'Apple Vacation Tour Company: Your Gateway to Unforgettable Getaways! Offering curated travel experiences tailored to your preferences, we specialize in crafting seamless and memorable vacations', 'uploads/Apple.jpg', 'uploads/3bf0cf92-e399-4518-84ba-af41a4c8f698.jpg', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policyID` int(11) NOT NULL,
  `policyDescription` text NOT NULL,
  `aboutUsDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policyID`, `policyDescription`, `aboutUsDescription`) VALUES
(1, '\n    <h1>Privacy Policy for Seven Seas Travel</h1> <br>\n    <p>Last Updated: 10th November ,2023 </p> <br>\n    <p>Welcome to Seven Seas Travel (\"us\", \"we\", or \"our\"). This page informs you of our policies regarding the collection, use, and disclosure of Personal Information we receive from users of the Site.</p> <br>\n    <h2>Information Collection and Use</h2>\n    <p>While using our Site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally, identifiable information may include but is not limited to your name, email address, phone number, and postal address (\"Personal Information\").</p> <br>\n    <h2>Log Data</h2>\n    <p>Like many site operators, we collect information that your browser sends whenever you visit our Site (\"Log Data\"). This Log Data may include information such as your computer\'s Internet Protocol (\"IP\") address, browser type, browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p><br>\n\n    <h2>Cookies</h2>\n    <p>Cookies are files with a small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer\'s hard drive. Like many sites, we use \"cookies\" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Site.</p><br>\n\n    <h2>Security</h2>\n    <p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p><br>\n\n    <h2>Changes to This Privacy Policy</h2>\n    <p>This Privacy Policy is effective as of [Date] and will remain in effect except concerning any changes in its provisions in the future, which will be in effect immediately after being posted on this page. We reserve the right to update or change our Privacy Policy at any time, and you should check this Privacy Policy periodically. Your continued use of the Service after we post any modifications to the Privacy Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Privacy Policy.</p><br>\n\n    <h2>Contact Us</h2>\n    <p>If you have any questions about this Privacy Policy, please contact us.</p>', 'This is Seven Seas Travel Managment Console');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_officer`
--

CREATE TABLE `tourism_officer` (
  `officerID` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourism_officer`
--

INSERT INTO `tourism_officer` (`officerID`, `username`, `password`, `user_type`) VALUES
('O12345', 'tourismOfficer210', 'tourismOfficer210', 'tourism_officer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('user','merchant','admin','tourism_officer') NOT NULL DEFAULT 'user',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `user_type`, `email`) VALUES
('U1', 'hi', '$2y$10$Q4I5xySdtu5SRsOQNtCLAOIr2yG1L9pc8LhnPlwvl.6PEcE9TJVrO', 'user', 'hi@gmail.com'),
('U2', 'hello', '$2y$10$1pYDui.PUNSgxM6VtxCMu.b7IudplhOULVOks.9AQUUd2oinpjaFS', 'user', 'hello20@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchantID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policyID`);

--
-- Indexes for table `tourism_officer`
--
ALTER TABLE `tourism_officer`
  ADD PRIMARY KEY (`officerID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `merchant_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `tourism_officer`
--
ALTER TABLE `tourism_officer`
  ADD CONSTRAINT `tourism_officer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);
--
-- Database: `ocean`
--
CREATE DATABASE IF NOT EXISTS `ocean` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ocean`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `user_from` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `user_from` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `hometown` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `bio` text DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `work` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

--
-- Dumping data for table `pma__column_info`
--

INSERT INTO `pma__column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`, `input_transformation`, `input_transformation_options`) VALUES
(1, 'login', 'merchant', 'document', '', 'image_jpeg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'customer', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":\"okay\",\"table_structure[]\":\"okay\",\"table_data[]\":\"okay\",\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(2, 'root', 'database', 'sql', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"columns_priv\",\"column_stats\",\"db\",\"event\",\"func\",\"general_log\",\"global_priv\",\"gtid_slave_pos\",\"help_category\",\"help_keyword\",\"help_relation\",\"help_topic\",\"index_stats\",\"innodb_index_stats\",\"innodb_table_stats\",\"plugin\",\"proc\",\"procs_priv\",\"proxies_priv\",\"roles_mapping\",\"servers\",\"slow_log\",\"tables_priv\",\"table_stats\",\"time_zone\",\"time_zone_leap_second\",\"time_zone_name\",\"time_zone_transition\",\"time_zone_transition_type\",\"transaction_registry\",\"user\"],\"table_structure[]\":[\"columns_priv\",\"column_stats\",\"db\",\"event\",\"func\",\"general_log\",\"global_priv\",\"gtid_slave_pos\",\"help_category\",\"help_keyword\",\"help_relation\",\"help_topic\",\"index_stats\",\"innodb_index_stats\",\"innodb_table_stats\",\"plugin\",\"proc\",\"procs_priv\",\"proxies_priv\",\"roles_mapping\",\"servers\",\"slow_log\",\"tables_priv\",\"table_stats\",\"time_zone\",\"time_zone_leap_second\",\"time_zone_name\",\"time_zone_transition\",\"time_zone_transition_type\",\"transaction_registry\",\"user\"],\"table_data[]\":[\"columns_priv\",\"column_stats\",\"db\",\"event\",\"func\",\"general_log\",\"global_priv\",\"gtid_slave_pos\",\"help_category\",\"help_keyword\",\"help_relation\",\"help_topic\",\"index_stats\",\"innodb_index_stats\",\"innodb_table_stats\",\"plugin\",\"proc\",\"procs_priv\",\"proxies_priv\",\"roles_mapping\",\"servers\",\"slow_log\",\"tables_priv\",\"table_stats\",\"time_zone\",\"time_zone_leap_second\",\"time_zone_name\",\"time_zone_transition\",\"time_zone_transition_type\",\"transaction_registry\",\"user\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(3, 'root', 'database', 'login', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"accounts\",\"admin\",\"merchant\",\"user\"],\"table_structure[]\":[\"accounts\",\"admin\",\"merchant\",\"user\"],\"table_data[]\":[\"accounts\",\"admin\",\"merchant\",\"user\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(4, 'root', 'database', 'Products ', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":\"products\",\"table_structure[]\":\"products\",\"table_data[]\":\"products\",\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"EcoTrace\",\"table\":\"user\"},{\"db\":\"EcoTrace\",\"table\":\"weeklylog\"},{\"db\":\"EcoTrace\",\"table\":\"admin\"},{\"db\":\"EcoTrace\",\"table\":\"eduContent\"},{\"db\":\"EcoTrace\",\"table\":\"educontent\"},{\"db\":\"login\",\"table\":\"merchant\"},{\"db\":\"EcoTrace\",\"table\":\"dailylog\"},{\"db\":\"EcoTrace\",\"table\":\"dailyLog\"},{\"db\":\"login\",\"table\":\"accounts\"},{\"db\":\"login\",\"table\":\"tourism_officer\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('bookings', 'transaction', 'orderID'),
('crud', 'products', 'merchantID'),
('login', 'admin', 'username'),
('login', 'merchant', 'merchantID'),
('login', 'tourism_officer', 'officerID'),
('login', 'user', 'userID');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'EcoTrace', 'user', '{\"sorted_col\":\"`user`.`userID` ASC\"}', '2024-03-09 05:30:09'),
('root', 'bookings', 'purchases', '[]', '2023-11-11 16:39:27'),
('root', 'bookings', 'transaction', '{\"CREATE_TIME\":\"2023-11-02 00:41:54\"}', '2023-11-11 16:39:49'),
('root', 'login', 'accounts', '{\"CREATE_TIME\":\"2023-10-17 23:37:06\",\"sorted_col\":\"`accounts`.`username` DESC\"}', '2023-11-08 17:57:38'),
('root', 'login', 'user', '{\"CREATE_TIME\":\"2023-10-19 19:10:07\"}', '2023-11-14 05:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-03-09 05:38:36', '{\"lang\":\"en_GB\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
