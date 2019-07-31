-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 07:53 PM
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
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
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
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone_no`, `license_no`, `brand`, `year`, `chassis_no`, `license_name`, `KM_counter`, `signup_date`) VALUES
(1002, 'Haitham Harbi', '01111111111', 'asd 212', 'caffenero sport', 2018, '1111111111', 'harbi', 1111, '2019-07-06 16:13:56.544874'),
(1003, 'harbi', '1111111111', 'asd 211', 'caffenero sport', 2017, '564324354', 'harbi', 2100, '2019-07-06 16:50:48.462137'),
(1004, 'shorouq', '2147483647', 'س ط ب 1699', 'Sym SR', 2018, '16574212544', 'shrouq fayez', 15000, '2019-07-13 12:05:51.224826'),
(1005, 'أسامه شعبان عبدالعال', '01285581475', 'س ط ب 5969', 'SYM S', 2018, '213693', 'أسامه شعبان عبدالعال', 10300, '2019-07-17 14:55:40.997737'),
(1006, 'نور محمد عبدالرازق', '1111959557', 'س ع ب 8161', 'Benelli Caffenero Sport', 2018, 'B955957', 'نور محمد عبدالرازق', 1293, '2019-07-20 15:46:21.547465'),
(1007, 'محمد رضا محمد النيكلاوي', '1223286850', 'س ل أ 9282', 'zaffrano', 2016, '633250', 'خالد خميس محمد عثمان', 32020, '2019-07-20 16:59:10.859542'),
(1008, 'عمرو فتحي حسن', '1010220270', 'س ن أ 3266', 'SYM SR', 2016, '50064', 'فتحي حسن حسن', 9050, '2019-07-20 17:20:04.610943'),
(1009, 'بهاء الدين محمد', '1116658274', 'س ع ب 4522', 'SYM SR', 2018, '25912', 'عمر نبيل محمود', 6624, '2019-07-20 18:51:30.042174'),
(1010, 'مهند طارق دسوقي', '1279359212', 'س ق ب 9343', 'zaffrano', 2018, '954964', 'احمد محمود محمد', 9300, '2019-07-21 16:17:24.986299'),
(1011, 'عمر حماد ', '1222505171', 'س م ب 9892', 'JET 14', 2019, '00000', 'عمر حماد', 1300, '2019-07-21 17:43:04.250434'),
(1012, 'مازن محمد عبد السلام محمد', '1284858409', '9695س ن ب', 'Benelli Caffenero Sport', 2018, '956042', 'مازن محمد  عبد السلام', 5800, '2019-07-25 19:49:24.424208'),
(1013, 'محمد الوزيري', '1286873277', 'س ن ب 4478', 'zaffrano', 2019, '11111', 'محمد الوزيري', 6500, '2019-07-27 14:01:01.535358'),
(1014, 'محمد هاني', '1097068228', 'س ع ب 3134', 'SYM JET 14', 2017, '7813', 'احمد عيسى محمود', 12000, '2019-07-27 16:33:04.626632'),
(1015, 'محمد السيد مصطفى ', '1141145533', 'س ن ب 9179', 'Benelli Caffenero Sport', 2018, 'B955996', 'محمد السيد مصطفى ', 6300, '2019-07-27 18:24:28.705930'),
(1016, 'محمد عبد اللطيف', '1229899180', '4121س ن ب', 'Sym SR', 2019, 'z001902', 'محمد عبد اللطيف السيد', 3000, '2019-07-28 18:44:50.514059'),
(1017, 'احمد رجب ابراهيم', '1091113035', 'س ه ب 1167', 'Benelli Caffenero Sport', 2018, 'jb955766', 'احمد رجب ابراهيم', 2000, '2019-07-29 13:42:35.614659'),
(1018, 'يوسف علي سعيد', '1151882500', 'س ن أ 9788', 'Sym jet4', 2017, '4721', 'يوسف علي سعيد', 8000, '2019-07-31 16:43:13.790395');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `quantity`) VALUES
(1000, 'Castrol Oil', '120', 2);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_history`
--

CREATE TABLE `maintenance_history` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `details` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenance_history`
--

INSERT INTO `maintenance_history` (`id`, `cid`, `date`, `name`, `details`) VALUES
(1, 1006, '2019-07-20 18:53:12', '1300 KM', 'زيت وولف 10/40'),
(2, 1005, '2019-07-17 18:00:00', '10300 KM', 'تغير زيت جير بوكس,تغير تيل خلفي,CVT,تغير بكر سحب,تغير تيل امامي,تغير رمان بلي'),
(3, 1007, '2019-07-20 20:01:44', '32000 KM', 'زيت وولف 10/40'),
(4, 1008, '2019-07-20 20:22:00', '9000 KM', 'تيل أمامي,تغير زيت وولف 10/40,تنضيف فلتر'),
(5, 1009, '2019-07-20 21:54:45', '6600  KM', 'تغير زيت وولف 10/40,كشف تيلين'),
(10, 1011, '2019-07-21 20:43:57', '1300 KM', 'تغير زيت وولف 10/40'),
(12, 1017, '2019-07-01 00:00:00', '1000', ' زيت جير بوكس, زيت وولف'),
(1002, 1012, '2019-07-25 22:51:21', '5800', 'تنظيف cvt, تغير بكر السحب'),
(1006, 1013, '2019-07-27 19:29:39', '6500', '\0\0تغير زيت وولف 10/40,تغير فلتر هواء'),
(1007, 1014, '2019-07-27 19:33:16', '12000', '\0\0تنضيف CVT,تغير بكر سحب,تنضيف فلتر'),
(1011, 1007, '2019-07-28 21:35:18', '32020', ''),
(1012, 1016, '2019-07-28 21:46:43', '3000', '\0\0تغير زيت وولف 10/40,تنظيف تيل خلفى,\0له عندنا غير زيت جير بوكس خالص الثمن'),
(1013, 1017, '2019-07-29 16:45:29', '2000', '\0\0تنضيف فلتر');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_history`
--
ALTER TABLE `maintenance_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `maintenance_history`
--
ALTER TABLE `maintenance_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
