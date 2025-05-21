-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 03:08 PM
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
-- Database: `equipment`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_name` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `total_systems` int(4) NOT NULL,
  `Notes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_name`, `district`, `address`, `pic`, `phone_number`, `email`, `Status`, `total_systems`, `Notes`) VALUES
('1', 'belize', '1', '1', '1', '1', 'active', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `network_devices`
--

CREATE TABLE `network_devices` (
  `device_id` int(6) NOT NULL,
  `type` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `notes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `network_devices`
--

INSERT INTO `network_devices` (`device_id`, `type`, `brand`, `model`, `status`, `location`, `notes`) VALUES
(4, '', 'ASUS', 'Rapture', 'inactive', 'school2', 'N/A'),
(5, '', 'ASUS', 'Rapture', 'inactive', 'school2', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `peripherals`
--

CREATE TABLE `peripherals` (
  `device_id` int(6) NOT NULL,
  `type` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `serialNum` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `notes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peripherals`
--

INSERT INTO `peripherals` (`device_id`, `type`, `brand`, `model`, `serialNum`, `status`, `location`, `notes`) VALUES
(3, '', '1', '1', '', 'active', 'school1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `system_units`
--

CREATE TABLE `system_units` (
  `device_id` int(6) NOT NULL,
  `CPU` varchar(50) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `GPU` varchar(50) NOT NULL,
  `motherboard` varchar(50) NOT NULL,
  `FormFactor` varchar(50) NOT NULL,
  `PSU` varchar(50) NOT NULL,
  `tower` varchar(50) NOT NULL,
  `OS` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `notes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_units`
--

INSERT INTO `system_units` (`device_id`, `CPU`, `RAM`, `storage`, `GPU`, `motherboard`, `FormFactor`, `PSU`, `tower`, `OS`, `status`, `location`, `notes`) VALUES
(6, '1', '1', '1', '1', '1', 'ATX', '1', '1', '1', 'active', 'school1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$xXW2rxGFCCLm88s2bi7zLO1DHFEvF.5S.TLqjzFM/slx76XFxPsE.', '2025-05-17 16:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `network_devices`
--
ALTER TABLE `network_devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `peripherals`
--
ALTER TABLE `peripherals`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `system_units`
--
ALTER TABLE `system_units`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `network_devices`
--
ALTER TABLE `network_devices`
  MODIFY `device_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peripherals`
--
ALTER TABLE `peripherals`
  MODIFY `device_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_units`
--
ALTER TABLE `system_units`
  MODIFY `device_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
