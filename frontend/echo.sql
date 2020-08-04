-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 04:11 AM
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
(1, 'SCB', 'ธนาคารไทยพาณิชย์', ' 1234', '1234', 'img/money/scb.jpg', 0, '2020-07-23 09:35:36', '2020-07-23 09:35:36'),
(2, 'KBANK', 'ธนาคารกสิกรไทย', '1234567890', '11', 'img/money/k.png', 0, '2020-07-22 16:30:09', '2020-07-23 11:14:15'),
(3, 'KTB', 'ธนาคารกรุงไทย', ' 1234', '12345', 'img/money/ktb.jpg', 0, '2020-07-23 09:10:38', '2020-07-23 09:56:58'),
(4, 'BBL', 'ธนาคารกรุงเทพ', ' 1234', '1234', 'img/money/BBL.png', 0, '2020-07-23 09:38:49', '2020-07-23 11:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(255) DEFAULT NULL,
  `cus_phone` char(10) DEFAULT NULL,
  `cus_address` varchar(255) DEFAULT NULL,
  `cus_email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `paymentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `namewebsite`
--

CREATE TABLE `namewebsite` (
  `nw_id` int(11) NOT NULL,
  `nw_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `namewebsite`
--

INSERT INTO `namewebsite` (`nw_id`, `nw_name`, `address`, `email`, `tel`) VALUES
(1, 'ECHO HEALTH CO.,LTD.', '214 Sirindhorn Rd., Bangplath, Bangplath, Bangkok 10700', 'service@echohealthfood.com', '+66 655 099 888');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `runnumber` char(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `ship_price` int(11) DEFAULT NULL,
  `note` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` char(50) NOT NULL,
  `img` text DEFAULT NULL,
  `paytotal` int(11) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `time1` time DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `bankID` int(11) DEFAULT NULL,
  `payment_statusID` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'TG-ECHO002VI', 'Vitaoxxy FP', '650.00', 'Good', 100, 'img/product/p4.png', NULL, NULL, 0, '2020-07-21 13:51:41', '2020-07-23 08:43:55'),
(35, 'OAT-8000', 'Big Brother', '5000.00', 'Good', 10, 'img/product1.jpg', 'img/product1.jpg', 'img/product1.jpg', 0, '2020-07-23 11:11:44', '2020-07-23 14:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `shippingcost`
--

CREATE TABLE `shippingcost` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL DEFAULT 0,
  `type` enum('EMS','Flash') NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingcost`
--

INSERT INTO `shippingcost` (`id`, `name`, `cost`, `type`, `createdAt`, `updatedAt`) VALUES
(20, 'Test2', 20, 'Flash', '2020-07-23 15:55:39', '2020-07-23 15:55:40'),
(50, 'Test', 50, 'EMS', '2020-07-23 15:53:22', '2020-07-23 15:53:23');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`nw_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `status` (`status`),
  ADD KEY `ship_price` (`ship_price`);

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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `namewebsite`
--
ALTER TABLE `namewebsite`
  MODIFY `nw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_customer_buy_product` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_customer` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_orders_shippingcost` FOREIGN KEY (`ship_price`) REFERENCES `shippingcost` (`cost`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order_detail_customer` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_order_detail_orders` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
