-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 07:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echo`
--

-- --------------------------------------------------------

--
-- Table structure for table `background_image`
--

CREATE TABLE `background_image` (
  `id` int(11) NOT NULL,
  `img_name` text NOT NULL DEFAULT '0',
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `background_image`
--

INSERT INTO `background_image` (`id`, `img_name`, `createdAt`, `updatedAt`) VALUES
(1, 'img/bg_img/bg1.jpg', '2020-07-30 15:07:25', '2020-08-03 16:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `namebank` varchar(255) NOT NULL,
  `account` char(10) DEFAULT NULL,
  `promptpay` char(13) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `namebank`, `account`, `promptpay`, `photo`, `active`, `createdAt`, `updatedAt`) VALUES
(1, 'Echo', 'ธนาคารกสิกรไทย', '1234567890', '132154654', 'img/money/k.png', 0, '2020-07-22 16:30:09', '2020-07-31 15:45:44'),
(9, 'test', 'ธนาคารกรุงไทย', ' 1234', '12345', 'img/money/ktb.jpg', 0, '2020-07-23 09:10:38', '2020-07-23 09:56:58'),
(10, 'test', 'ธนาคารไทยพาณิชย์', ' 1234', '1234', 'img/money/scb.jpg', 0, '2020-07-23 09:35:36', '2020-07-23 09:35:36'),
(11, 'test', 'ธนาคารกรุงเทพ', ' 1234', '1234', 'img/money/BBL.png', 0, '2020-07-23 09:38:49', '2020-07-23 11:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `name_company` varchar(225) DEFAULT NULL,
  `about` varchar(225) DEFAULT NULL,
  `vision` varchar(225) DEFAULT NULL,
  `history` varchar(225) DEFAULT NULL,
  `mision` varchar(50) DEFAULT NULL,
  `img_promote` text DEFAULT NULL,
  `logo_icon` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `img_factory` text DEFAULT NULL,
  `img_production` text DEFAULT NULL,
  `img_map` text DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`id`, `name`, `name_company`, `about`, `vision`, `history`, `mision`, `img_promote`, `logo_icon`, `logo`, `img_factory`, `img_production`, `img_map`, `createdAt`, `updatedAt`) VALUES
(1, 'Echo health Extra life', 'Echo health co.,Ltd.', 'Echo health co.,ltd was established in 2020. Our objectives are to develop', 'เชื่ยวชาญด้านการพัฒนา และคิดop;iopiopค้น นวัตกรรมของผลิตภัณฑ์เสริมอาหาร ', 'Echo health co.,ltd was established in 2020. Our objectives are to develop dietary supplement, medical food and herbal medicine for serving to our priority customer. We intentionally focus on searching the best ingredients fr', 'มุ่งมั่นในการค้นคว้า วิจัยและพัฒนา นวัตกรรมที่ก้าว', 'img/logo_/Cal-Bilberry1.png', 'img/logo_/S__18309123.jpg', 'img/logo_/S__18309123.jpg', 'img/logo_/S__18309123.jpg', 'img/logo_/S__18309123.jpg', 'img/logo_/S__18309123.jpg', '2020-08-04 09:33:16', '2020-08-04 10:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(255) DEFAULT NULL,
  `cus_phone` char(10) DEFAULT NULL,
  `cus_address` varchar(255) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `paymentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cus_name`, `cus_phone`, `cus_address`, `cus_email`, `createdAt`, `updatedAt`, `orderID`, `paymentID`) VALUES
(1, 'OaT', '0909878787', 'AIA', '2147483647', '2020-07-23 16:06:59', '2020-07-23 16:07:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `namewebsite`
--

CREATE TABLE `namewebsite` (
  `nw_id` int(11) NOT NULL,
  `nw_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` char(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `namewebsite`
--

INSERT INTO `namewebsite` (`nw_id`, `nw_name`, `address`, `email`, `tel`, `createdAt`, `updatedAt`) VALUES
(1, 'ECHO HEALTH CO.,LTD.', '214 Sirindhorn Rd., Bangplath, Bangplath, Bangkok 10700', 'ไปใส่เอาลืม', '+66 655 099 888', '2020-07-31 15:50:39', '2020-08-03 14:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `topic` varchar(225) DEFAULT NULL,
  `material` varchar(225) DEFAULT NULL,
  `img` mediumtext DEFAULT NULL,
  `refer` varchar(100) DEFAULT NULL,
  `status` enum('แนะนำ','ธรรมดา') DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `topic`, `material`, `img`, `refer`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Echo', 'asdasdasdasdfgdgwergergsdrg', 'asd', '123465', NULL, '2020-08-04 10:50:39', '2020-08-04 10:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT 0.00,
  `runnumber` char(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `ship_price` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customerID`, `createdAt`, `updatedAt`, `total_price`, `runnumber`, `status`, `ship_price`, `note`) VALUES
(3, NULL, '2020-07-23 16:49:40', '2020-07-23 16:49:41', '14000.00', 'ORDER-#$#@$DSSDF454', 1, 1, '1'),
(4, NULL, '2020-07-30 12:04:00', '2020-07-30 12:04:01', '5000.00', 'ORDER-#$#@$DSSDF454', 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unit` int(11) NOT NULL DEFAULT 0,
  `unittotal_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `productID`, `unit_price`, `unit`, `unittotal_price`, `createdAt`, `updatedAt`, `customerID`, `orderID`) VALUES
(1, 35, '7000.00', 2, '14000.00', '2020-07-23 16:05:16', '2020-07-23 16:05:16', 1, NULL),
(2, 1, '1500.00', 1, '1500.00', '2020-07-23 16:08:07', '2020-07-23 16:08:08', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paytotal` decimal(10,2) DEFAULT 0.00,
  `img` text DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `time1` time DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `bankID` int(11) DEFAULT NULL,
  `payment_statusID` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `paytotal`, `img`, `date1`, `time1`, `createdAt`, `updatedAt`, `orderID`, `bankID`, `payment_statusID`) VALUES
(3, '14000.00', 'img/money/S__8822811.jpg', '2020-07-31', '11:54:01', '2020-07-23 16:49:00', '2020-08-03 16:07:27', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `status_name`, `createdAt`, `updatedAt`) VALUES
(1, 'รอชำระเงิน', '2020-07-23 10:44:41', '2020-07-23 10:44:42'),
(2, 'อยู่ระหว่างการดำเนินงาน', '2020-07-23 10:44:57', '2020-07-23 10:44:58'),
(3, 'จัดส่งสินค้าแล้ว', '2020-07-23 10:45:11', '2020-07-23 10:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_id` char(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `detail` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `photo` text DEFAULT NULL,
  `photo1` text DEFAULT NULL,
  `photo2` text DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `name`, `price`, `detail`, `stock`, `photo`, `photo1`, `photo2`, `active`, `createdAt`, `updatedAt`) VALUES
(1, 'TG-ECHO001CA', 'Calbilberry', '650.00', 'Good', 100, 'img/product/p1.png', 'img/product/p1.png', 'img/product/p1.png', 0, '2020-07-21 13:51:28', '2020-07-23 08:44:03'),
(2, 'TG-ECHO004CO', 'Collysine', '450.00', 'Good', 100, 'img/product/p2.png', NULL, NULL, 0, '2020-07-21 13:51:31', '2020-07-23 08:44:19'),
(3, 'TG-ECHO003RI', 'Riciomeg', '550.00', 'Good', 100, 'img/product/p3.png', NULL, NULL, 0, '2020-07-21 13:51:41', '2020-07-23 08:44:11'),
(4, 'TG-ECHO002VI', 'Vitaoxxy FP', '650.00', 'Good', 100, 'img/product/p4.png', NULL, NULL, 0, '2020-07-21 13:51:41', '2020-07-23 08:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `shippingcost`
--

CREATE TABLE `shippingcost` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `type` enum('EMS','Flash') NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingcost`
--

INSERT INTO `shippingcost` (`id`, `name`, `cost`, `type`, `createdAt`, `updatedAt`) VALUES
(20, 'Test', '20.00', 'EMS', '2020-07-23 15:53:22', '2020-07-23 15:53:23'),
(50, 'Test2', '50.00', 'Flash', '2020-07-23 15:55:39', '2020-07-23 15:55:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background_image`
--
ALTER TABLE `background_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentID` (`paymentID`),
  ADD KEY `buy_productID` (`orderID`) USING BTREE;

--
-- Indexes for table `namewebsite`
--
ALTER TABLE `namewebsite`
  ADD PRIMARY KEY (`nw_id`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `shippingcostID` (`ship_price`) USING BTREE,
  ADD KEY `productID` (`status`) USING BTREE;

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buy_productID` (`orderID`) USING BTREE,
  ADD KEY `bankID` (`bankID`),
  ADD KEY `statusID` (`payment_statusID`) USING BTREE;

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippingcost`
--
ALTER TABLE `shippingcost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cost` (`cost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `background_image`
--
ALTER TABLE `background_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `namewebsite`
--
ALTER TABLE `namewebsite`
  MODIFY `nw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `shippingcost`
--
ALTER TABLE `shippingcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
