-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 08:45 AM
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
-- Table structure for table `educontent`
--

CREATE TABLE `educontent` (
  `contentID` int(11) NOT NULL,
  `typeOfContent` varchar(50) NOT NULL,
  `categoryOfContent` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educontent`
--

INSERT INTO `educontent` (`contentID`, `typeOfContent`, `categoryOfContent`, `title`, `description`, `content`) VALUES
(19, 'Infographic', 'Transportation', 'The Carbon Cost Of Transportation', 'Embark on a journey through our comprehensive infographic as we unveil the carbon cost of various modes of transportation. Delve into the environmental impact of your travel choices, from everyday commuting to long-distance trips, and gain insights into the carbon footprints associated with different vehicles. This visually engaging infographic breaks down the carbon emissions of automobiles, buses, trains, flights, and more, measuring their environmental impact in grams of carbon dioxide. Discover how each mode of transportation contributes to the global carbon footprint, empowering you with knowledge to make informed and sustainable travel decisions.', '23658carbon-cost-of-transportation-ds.jpg'),
(20, 'Video', 'Environmental Issue', 'What is Carbon Footprint', 'Reducing your carbon footprint is about minimizing the environmental impact of your actions, much like leaving a mark on the environment with every activity that releases carbon emissions, such as CO2 from burning fossil fuels. It\'s not just about the emissions from your car\'s engine; consider the entire lifecycle, from extracting and transporting fuel to manufacturing the vehicle. Even seemingly simple activities like reading a book or eating an apple contribute to your carbon footprint due to energy consumption and transportation. While it\'s challenging to have zero impact, being mindful of your choices can help shrink your carbon footprint and contribute to combating climate change.', '96699simpleshow explains the Carbon Footprint.mp4'),
(21, 'Image', 'Dietary Choice', 'A Guide to Climate-friendly food choices', 'To minimize your carbon footprint through dietary choices, adopt a plant-based or flexitarian diet, prioritize locally sourced and seasonal produce, reduce dairy consumption, choose organic options with minimal packaging, explore insect-based proteins, engage in meatless days, calculate and offset your emissions, support sustainable agriculture initiatives, educate others on eco-friendly choices, practice water-efficient cooking, opt for low-impact snacks, plan sustainable celebrations, and consistently make mindful, informed decisions about the foods you consume.', '37306Screenshot 2024-02-29 at 5.40.10 PM.png'),
(22, 'Image', 'Energy Consumption', '5 Simple Tips to Save Energy', 'Unlock the power of energy efficiency with our visually compelling infographic that shares five practical tips to lighten your environmental impact. Dive into a world of sustainable living as we guide you through easy-to-implement strategies that not only conserve energy but also contribute to a greener tomorrow. Join the movement towards a more sustainable lifestyle – it\'s time to energize your life while preserving our planet! #EnergyEfficiency #EcoTrace', '64683energy tips for college students.png'),
(31, 'Image', 'Transportation', 'A Carbon Footprint Scale for Transportation', 'In the pursuit of sustainable living, it\'s crucial to assess the environmental impact of our daily choices, especially in the realm of transportation. Introducing the Carbon Footprint Scale, a concise guide to help individuals make eco-friendly decisions on their journeys. Walking and cycling lead the pack with a minimal score of 1, promoting personal health and environmental well-being. Public transportation, electric vehicles, and hybrids follow suit with moderate scores, offering practical alternatives. However, conventional gasoline vehicles escalate the scale, underscoring their contribution to air pollution and emissions. Topping the list with a score of 10 is air travel, emphasizing the need for awareness and conscious choices when planning longer journeys. By understanding this scale, individuals can align their transportation choices with a commitment to reducing carbon footprints, contributing to a more sustainable and eco-conscious future.', '33261transport2.png'),
(32, 'Infographic', 'Environmental Issue', 'Impact of Climate Change', 'Delve into the profound and far-reaching effects of climate change with our comprehensive article. From rising temperatures to extreme weather events, we unravel the intricate tapestry of environmental shifts and their consequences on ecosystems, biodiversity, and human societies. Gain insight into the latest scientific findings, real-world examples, and potential solutions as we navigate the complexities of a changing climate. Whether you\'re seeking a deeper understanding or searching for ways to contribute to a sustainable future, this Infographic provides a compelling exploration of the multifaceted impact that climate change on human mental health', '78263environment2.jpeg'),
(33, 'Image', 'Dietary Choice', 'How food speeding up climate change', ' Dive into the intricate relationship between our daily food choices and the acceleration of climate change in this eye-opening exploration. From food production and supply chains to consumption patterns, discover the hidden environmental costs that accompany our meals. This article sheds light on the significant role agriculture, livestock farming, and food waste play in contributing to greenhouse gas emissions. Uncover the startling connections between dietary habits and the health of our planet, offering insights into sustainable alternatives and mindful eating practices. If you\'re curious about the environmental impact of your plate, \"Bite by Bite\" provides a compelling narrative on how our food decisions can either exacerbate or mitigate the challenges of climate change.', '63193food2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educontent`
--
ALTER TABLE `educontent`
  ADD PRIMARY KEY (`contentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educontent`
--
ALTER TABLE `educontent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;