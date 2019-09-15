-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 07:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `client_balance`
--

DROP TABLE IF EXISTS `client_balance`;
CREATE TABLE `client_balance` (
  `bid` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `balance_change` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_balance`
--

INSERT INTO `client_balance` (`bid`, `client_id`, `balance_change`, `date`, `comment`) VALUES
(1, 1004, 5, '2019-09-04 14:43:11', 'xx'),
(2, 1004, -1.3, '2019-09-04 14:43:11', 'سس'),
(3, 1004, 5, '2019-09-04 17:06:11', ''),
(4, 1004, 5, '2019-09-04 17:07:13', ''),
(5, 1004, 5, '2019-09-04 17:08:33', ''),
(6, 1004, 1, '2019-09-04 17:09:02', ''),
(7, 1004, -100, '2019-09-04 17:09:08', ''),
(8, 1004, 15, '2019-09-04 17:09:19', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_balance`
--
ALTER TABLE `client_balance`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_balance`
--
ALTER TABLE `client_balance`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_balance`
--
ALTER TABLE `client_balance`
  ADD CONSTRAINT `client_balance_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
