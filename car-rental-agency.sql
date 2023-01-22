-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 07:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car-rental-agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `name`, `email`, `phone`, `password`, `createdAt`) VALUES
(12, 'Ahuja Motors', 'ahujamotors@gmail.com', '+919205816348', '$2y$10$P64FPSFhN9x7ECilyiTxjelrGe5dzpAB39ZuiitFEKRzhPoWROuya', '2023-01-21 08:55:42'),
(13, 'Sharma Automobiles', 'sharmaautos@gmail.com', '98776543201', '$2y$10$ULox5jp.3iJPa6mPTCFPGehUMzB.3ZFF0qdh7Bv5zcC/s67vdTVj6', '2023-01-21 09:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `agencyID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `noOfDays` int(11) NOT NULL,
  `startTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `agencyID`, `carID`, `custID`, `noOfDays`, `startTime`) VALUES
(14, 12, 3, 8, 0, '2023-01-21 17:11:04'),
(15, 12, 4, 8, 0, '2023-01-21 17:11:08'),
(16, 13, 5, 8, 10, '2023-01-22 05:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`) VALUES
(8, 'Nitish Goswami', 'nkgoswami@gmail.com', '9205816348', '$2y$10$beWdIVvMvhPyuqP1/F/j6.Bv80U8e5CZkFVMXqeCs9FFALtnwBbTW'),
(9, 'Satyam Ojha', 'sojha@gmail.com', '890123456', '$2y$10$.CuOr7SIp.zCCQBdiiXwl.A5ADR24zXApj.qY/n9wKKdDER.eHeYO');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `agencyID` int(11) NOT NULL,
  `model_name` text NOT NULL,
  `number` varchar(20) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `rentperday` int(11) NOT NULL,
  `isBooked` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `agencyID`, `model_name`, `number`, `seating_capacity`, `rentperday`, `isBooked`) VALUES
(3, 12, 'Honda City 2000', 'HR51 1111', 10, 1500, 'No'),
(4, 12, 'Maruti Alto 2015', 'HR51 2222', 5, 1100, 'No'),
(5, 13, 'Tata Tiago 2020', 'UK07 3333', 7, 2100, 'No'),
(6, 13, 'Swift Dzire 2015', 'UK07 4444', 10, 2000, 'No'),
(7, 12, 'Maruti Wagnor 2015', 'BR41 5555', 5, 900, 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
