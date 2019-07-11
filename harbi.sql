-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 06:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(14) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `brand` varchar(111) NOT NULL,
  `year` year(4) NOT NULL,
  `chassis_no` varchar(111) NOT NULL,
  `license_name` varchar(111) NOT NULL,
  `KM_counter` int(100) NOT NULL,
  `signup_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `phone_no`, `license_no`, `brand`, `year`, `chassis_no`, `license_name`, `KM_counter`, `signup_date`) VALUES
(1000, 'shorouq fayez', '01225157255', 'س ط ب 1699', 'SYM SR', 2018, '', 'shorouq fayez', 15000, '0000-00-00 00:00:00.000000'),
(1001, 'shorouq fayez', '01225157255', 'س ط ب 1689', 'SYM SR', 2018, '', 'shorouq fayez', 15000, '0000-00-00 00:00:00.000000'),
(1002, 'harbi', '1111111111', 'asd 212', 'caffenero sport', 2018, '1111111111', 'harbi', 1111, '2019-07-06 16:13:56.544874'),
(1003, 'harbi', '1111111111', 'asd 211', 'caffenero sport', 0000, '564324354', 'harbi', 2100, '2019-07-06 16:50:48.462137');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
