-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 09:54 PM
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

INSERT INTO `clients` (`id`, `name`, `phone_no`, `license_no`, `brand`, `year`, `chassis_no`, `license_name`, `KM_counter`, `signup_date`, `balance`) VALUES
(1002, 'Haitham Harbi', '01111111111', 'asd 212', 'caffenero sport', 2018, '1111111111', 'harbi', 1111, '2019-07-06 16:13:56.544874', -5),
(1003, 'harbi', '1111111111', 'asd 211', 'caffenero sport', 2017, '564324354', 'harbi', 2100, '2019-07-06 16:50:48.462137', 0),
(1004, 'shorouq', '2147483647', 'س ط ب 1699', 'Sym SR', 2018, '16574212544', 'shrouq fayez', 15000, '2019-07-13 12:05:51.224826', 0),
(1005, 'أسامه شعبان عبدالعال', '01285581475', 'س ط ب 5969', 'SYM S', 2018, '213693', 'أسامه شعبان عبدالعال', 10300, '2019-07-17 14:55:40.997737', 0),
(1006, 'نور محمد عبدالرازق', '1111959557', 'س ع ب 8161', 'Benelli Caffenero Sport', 2018, 'B955957', 'نور محمد عبدالرازق', 1293, '2019-07-20 15:46:21.547465', 0),
(1007, 'محمد رضا محمد النيكلاوي', '1223286850', 'س ل أ 9282', 'zaffrano', 2016, '633250', 'خالد خميس محمد عثمان', 32020, '2019-07-20 16:59:10.859542', 0),
(1008, 'عمرو فتحي حسن', '1010220270', 'س ن أ 3266', 'SYM SR', 2016, '50064', 'فتحي حسن حسن', 9050, '2019-07-20 17:20:04.610943', 0),
(1009, 'بهاء الدين محمد', '1116658274', 'س ع ب 4522', 'SYM SR', 2018, '25912', 'عمر نبيل محمود', 6624, '2019-07-20 18:51:30.042174', 0),
(1010, 'مهند طارق دسوقي', '1279359212', 'س ق ب 9343', 'zaffrano', 2018, '954964', 'احمد محمود محمد', 9300, '2019-07-21 16:17:24.986299', 0),
(1011, 'عمر حماد ', '01222505171', 'س م ب 9892', 'JET 14', 2019, '30423', 'عمر حماد', 2005, '2019-07-21 17:43:04.250434', 0),
(1012, 'مازن محمد عبد السلام محمد', '1284858409', '9695س ن ب', 'Benelli Caffenero Sport', 2018, '956042', 'مازن محمد  عبد السلام', 5800, '2019-07-25 19:49:24.424208', 0),
(1013, 'محمد الوزيري', '1286873277', 'س ن ب 4478', 'zaffrano', 2019, '11111', 'محمد الوزيري', 6500, '2019-07-27 14:01:01.535358', 0),
(1014, 'محمد هاني', '1097068228', 'س ع ب 3134', 'SYM JET 14', 2017, '7813', 'احمد عيسى محمود', 12000, '2019-07-27 16:33:04.626632', 0),
(1015, 'محمد السيد مصطفى ', '1141145533', 'س ن ب 9179', 'Benelli Caffenero Sport', 2018, 'B955996', 'محمد السيد مصطفى ', 6300, '2019-07-27 18:24:28.705930', 0),
(1016, 'محمد عبد اللطيف', '1229899180', '4121س ن ب', 'Sym SR', 2019, 'z001902', 'محمد عبد اللطيف السيد', 3000, '2019-07-28 18:44:50.514059', 0),
(1017, 'احمد رجب ابراهيم', '1091113035', 'س ه ب 1167', 'Benelli Caffenero Sport', 2018, 'jb955766', 'احمد رجب ابراهيم', 2000, '2019-07-29 13:42:35.614659', 0),
(1018, 'يوسف علي سعيد', '1151882500', 'س ن أ 9788', 'Sym jet4', 2017, '4721', 'يوسف علي سعيد', 8000, '2019-07-31 16:43:13.790395', 0),
(1019, 'محمود محمد كمال', '1205062273', 'س ي ق 6472', 'Benelli Caffenero Sport', 2018, 'JB955781', 'محمود محمد كمال', 370, '2019-08-01 16:17:14.728384', 0),
(1020, 'عمر احمد عبدالظاهر', '1276456956', 'س م أ 8977', 'Sym SR', 2018, 'X007587', 'ايمان مصطفى', 18000, '2019-08-01 16:27:11.132011', 0),
(1021, 'احمد الفخراني', '1091666910', 'س ع ب 9397', 'SYM S', 2019, '202949', 'احمد الفخراني', 460, '2019-08-03 16:34:21.034637', 0),
(1022, 'اسلام مجدي سعد', '1283665069', 'س ق ب 5815', 'Sym SR', 2018, 'x027744', 'اسلام مجدي سعد', 8500, '2019-08-06 19:58:32.040802', 0);

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
(1, 1006, '2019-07-20 18:53:12', '1300', 'زيت وولف 10/40'),
(2, 1005, '2019-07-17 18:00:00', '10300', 'تغير زيت جير بوكس,تغير تيل خلفي,CVT,تغير بكر سحب,تغير تيل امامي,تغير رمان بلي'),
(3, 1007, '2019-07-20 20:01:44', '32000', 'زيت وولف 10/40'),
(4, 1008, '2019-07-20 20:22:00', '9000', 'تيل أمامي,تغير زيت وولف 10/40,تنضيف فلتر'),
(5, 1009, '2019-07-20 21:54:45', '6600', 'تغير زيت وولف 10/40,كشف تيلين'),
(10, 1011, '2019-07-21 20:43:57', '1300', 'تغير زيت وولف 10/40'),
(12, 1017, '2019-07-01 00:00:00', '1000', ' زيت جير بوكس, زيت وولف'),
(1002, 1012, '2019-07-25 22:51:21', '5800', 'تنظيف cvt, تغير بكر السحب'),
(1006, 1013, '2019-07-27 19:29:39', '6500', '\0\0تغير زيت وولف 10/40,تغير فلتر هواء'),
(1007, 1014, '2019-07-27 19:33:16', '12000', '\0\0تنضيف CVT,تغير بكر سحب,تنضيف فلتر'),
(1012, 1016, '2019-07-28 21:46:43', '3000', '\0\0تغير زيت وولف 10/40,تنظيف تيل خلفى,\0له عندنا غير زيت جير بوكس خالص الثمن'),
(1013, 1017, '2019-07-29 16:45:29', '2000', '\0\0تنضيف فلتر'),
(1014, 1019, '2019-08-01 18:17:58', '370', '\0\0تنضيف فلتر,تغير زيت وولف 10/40,زيت جير بوكس'),
(1015, 1020, '2019-08-01 18:27:49', '18000', '\0\0تغير سير,تغير بكر سحب,تغير زيت WOLF 10/40,تغير زيت جير,تغير فلتر هواء'),
(1016, 1011, '2019-08-03 17:41:13', '2005', '\0\0تغير زيت وولف 10/40'),
(1017, 1021, '2019-08-03 18:34:49', '460', '\0\0تغير زيت وولف 10/40,تغير زيت جير بوكس'),
(1018, 1022, '2019-08-06 21:58:37', '8500', '\0\0تنضيف CVT,تغير زيت جير بوكس');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `code` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `store_type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`code`, `name`, `store_type`, `quantity`, `price`, `details`) VALUES
(100, 'تيل أمامي', 'BENELLI', 14, 0, ''),
(101, 'تيل خلفي', '', 21, 0, ''),
(102, 'بكر سحب أصلي', '', 4, 100, ''),
(103, 'بكر سحب', 'SYM', 2, 0, ''),
(104, 'بكر سحب', 'Joyride', 1, 0, ''),
(105, 'زرار كلاكس', 'BENELLI', 2, 75, ''),
(106, 'طقم قواعد ماتور ومقص', '', 4, 0, ''),
(107, 'قواعد مقص', '', 1, 0, ''),
(108, 'بوجيه', 'SYM', 5, 0, ''),
(109, 'رداخ بنزين', '', 5, 0, ''),
(110, 'الكتروني', '', 1, 0, ''),
(111, 'فلتر هواء', 'SYM', 28, 0, '');

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
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`code`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
