-- Import this into your hosted MySQL database.
-- It combines admin.sql and smartfarmdatabase.sql for Render deployment.
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2026 at 03:01 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2026 at 03:01 PM
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
-- Table structure for table `smartfarmdatabase`
--

CREATE TABLE `smartfarmdatabase` (
  `id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `produce` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `business_type` varchar(100) NOT NULL,
  `state_district` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smartfarmdatabase`
--

INSERT INTO `smartfarmdatabase` (`id`, `business_name`, `category`, `produce`, `product`, `business_type`, `state_district`, `contact`, `email`) VALUES
(1, 'GREEN AGRICULTURE ENTERPRISE', 'LOCAL', 'VEGETABLES & FRUITS', 'N/A', 'PRIVATE SELLER', 'KULAI, JOHOR', '012-345 6789', 'greenagrienterprise@gmail.com'),
(2, 'JANE FLORIST', 'FLORIST', 'N/A', 'FLOWERS', 'PRIVATE SELLER', 'SKUDAI, JOHOR', '012-345 6789', 'janecheaflowers@gmail.com'),
(3, 'SMART AGRO TAN SDN BHD', 'FERTILIZER', 'N/A', 'FERTILIZERS & CHEMICALS', 'COMPANY', 'BATU PAHAT, JOHOR', '012-345 6789', 'agrotanbusiness@gmail.com'),
(4, 'SENG HENG MACHINERY ENTERPISE', 'EQUIPMENT', 'N/A', 'LIGHT & HEAVY MACHINERY', 'COMPANY', 'KLUANG, JOHOR', '012-345 6789', 'senghengmachinery@gmail.com'),
(5, 'PASARAYA SEGAR SDN BHD', 'RETAILERS', 'N/A', 'VEGETABLE & POULTRY', 'MARKET', 'KULAI, JOHOR', '012-345 6789', 'pasarayasegar@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartfarmdatabase`
--
ALTER TABLE `smartfarmdatabase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartfarmdatabase`
--
ALTER TABLE `smartfarmdatabase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
