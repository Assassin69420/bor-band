-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2023 at 07:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broband`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `C_id` int(11) NOT NULL,
  `C_conn` varchar(255) NOT NULL,
  `S_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `Of_id` int(11) NOT NULL,
  `Of_name` varchar(255) NOT NULL,
  `Of_amount` bigint(20) NOT NULL,
  `Of_valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `S_id` int(11) NOT NULL,
  `S_name` varchar(255) NOT NULL,
  `S_city` varchar(255) NOT NULL,
  `S_phone` bigint(20) NOT NULL,
  `S_amount` bigint(20) NOT NULL,
  `Of_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `SerPName` varchar(255) NOT NULL,
  `sta_amount` bigint(20) NOT NULL,
  `C_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulogin`
--

CREATE TABLE `ulogin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulogin`
--

INSERT INTO `ulogin` (`username`, `password`) VALUES
('Aryaman47', 'Uncharted 4');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `U_id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `U_name` varchar(255) NOT NULL,
  `U_gender` varchar(255) NOT NULL,
  `U_address` varchar(255) NOT NULL,
  `U_phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `customers_c_conn_foreign` (`C_conn`),
  ADD KEY `customers_s_id_foreign` (`S_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`Of_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`S_id`),
  ADD KEY `service_of_id_foreign` (`Of_id`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`SerPName`),
  ADD KEY `serviceprovider_c_id_foreign` (`C_id`);

--
-- Indexes for table `ulogin`
--
ALTER TABLE `ulogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`U_id`),
  ADD UNIQUE KEY `useraccount_username_unique` (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `constcid` FOREIGN KEY (`C_id`) REFERENCES `useraccount` (`U_id`),
  ADD CONSTRAINT `customers_c_conn_foreign` FOREIGN KEY (`C_conn`) REFERENCES `serviceprovider` (`SerPName`),
  ADD CONSTRAINT `customers_s_id_foreign` FOREIGN KEY (`S_id`) REFERENCES `service` (`S_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_of_id_foreign` FOREIGN KEY (`Of_id`) REFERENCES `offers` (`Of_id`);

--
-- Constraints for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD CONSTRAINT `changingusername` FOREIGN KEY (`Username`) REFERENCES `ulogin` (`username`),
  ADD CONSTRAINT `useraccount_username_foreign` FOREIGN KEY (`Username`) REFERENCES `ulogin` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
