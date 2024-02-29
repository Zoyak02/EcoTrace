-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 29, 2024 at 11:00 AM
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
(1, 'Infographic', 'Transportation', 'The Carbon Cost of Transportation', 'Embark on a journey through our comprehensive infographic as we unveil the carbon cost of various modes of transportation. Delve into the environmental impact of your travel choices, from everyday commuting to long-distance trips, and gain insights into the carbon footprints associated with different vehicles.\r\n\r\nThis visually engaging infographic breaks down the carbon emissions of automobiles, buses, trains, flights, and more, measuring their environmental impact in grams of carbon dioxide. Discover how each mode of transportation contributes to the global carbon footprint, empowering you with knowledge to make informed and sustainable travel decisions.', '60015carbon-cost-of-transportation-ds.jpg'),
(2, 'Video', 'Environmental Issue', 'What is Carbon Footprint', 'Reducing your carbon footprint is about minimizing the environmental impact of your actions, much like leaving a mark on the environment with every activity that releases carbon emissions, such as CO2 from burning fossil fuels. It\'s not just about the emissions from your car\'s engine; consider the entire lifecycle, from extracting and transporting fuel to manufacturing the vehicle. Even seemingly simple activities like reading a book or eating an apple contribute to your carbon footprint due to energy consumption and transportation. While it\'s challenging to have zero impact, being mindful of your choices can help shrink your carbon footprint and contribute to combating climate change.', '30406simpleshow explains the Carbon Footprint.mp4'),
(3, 'Image', 'Dietary Choice', 'A Guide to Climate-friendly food choices', 'To minimize your carbon footprint through dietary choices, adopt a plant-based or flexitarian diet, prioritize locally sourced and seasonal produce, reduce dairy consumption, choose organic options with minimal packaging, explore insect-based proteins, engage in meatless days, calculate and offset your emissions, support sustainable agriculture initiatives, educate others on eco-friendly choices, practice water-efficient cooking, opt for low-impact snacks, plan sustainable celebrations, and consistently make mindful, informed decisions about the foods you consume.', '53166Screenshot 2024-02-29 at 5.40.10 PM.png'),
(4, 'Infographic', 'Energy Consumption', '5 Simple Tips to Save Energy', 'Unlock the power of energy efficiency with our visually compelling infographic that shares five practical tips to lighten your environmental impact. Dive into a world of sustainable living as we guide you through easy-to-implement strategies that not only conserve energy but also contribute to a greener tomorrow. \r\n\r\nJoin the movement towards a more sustainable lifestyle – it\'s time to energize your life while preserving our planet! #EnergyEfficiency #EcoTrace', '39126energy tips for college students.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eduContent`
--
ALTER TABLE `eduContent`
  ADD PRIMARY KEY (`contentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eduContent`
--
ALTER TABLE `eduContent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
