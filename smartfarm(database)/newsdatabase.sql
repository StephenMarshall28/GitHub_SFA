-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2026 at 08:07 AM
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
-- Database: `smartfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsdatabase`
--

CREATE TABLE `newsdatabase` (
  `id` int(11) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_summary` text NOT NULL,
  `news_source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsdatabase`
--

INSERT INTO `newsdatabase` (`id`, `news_image`, `news_title`, `news_summary`, `news_source`) VALUES
(2, 'newsimg/paddyfield.jpg', 'Rice Industry Sinking, Farmers Warn Ahead of Protest', 'Farmers warn that rising production costs and subsidy removal are putting severe pressure on the rice industry in Malaysia.', 'https://www.malaysianow.com/news/2025/01/16/rice-industry-sinking-farmers-warn-ahead-of-putrajaya-gathering-to-protest-floor-price'),
(4, 'newsimg/paddyfieldpeople.jpg', 'India likely to receive below-average monsoon rains in August', 'The monsoon, vital for India US$3 trillion economy, delivers nearly 70% of the rain needed to water its farms and refill reservoirs and aquifers.', 'https://www.malaysianow.com/out-there-now/2023/08/01/india-likely-to-receive-below-average-monsoon-rains-in-august');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsdatabase`
--
ALTER TABLE `newsdatabase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsdatabase`
--
ALTER TABLE `newsdatabase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
