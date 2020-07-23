-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 11:23 AM
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
(1, 'Echo', 'ธนาคารกสิกรไทย', '1234567890', '', 'img/money/k.png', 0, '2020-07-22 16:30:09', '2020-07-23 11:14:15'),
(9, 'test', 'ธนาคารกรุงไทย', ' 1234', '12345', 'img/money/ktb.jpg', 0, '2020-07-23 09:10:38', '2020-07-23 09:56:58'),
(10, 'test', 'ธนาคารไทยพาณิชย์', ' 1234', '1234', 'img/money/scb.jpg', 0, '2020-07-23 09:35:36', '2020-07-23 09:35:36'),
(11, 'test', 'ธนาคารกรุงเทพ', ' 1234', '1234', 'img/money/BBL.png', 0, '2020-07-23 09:38:49', '2020-07-23 11:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `IDcard` int(13) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `paymentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `IDcard`, `createdAt`, `updatedAt`, `orderID`, `paymentID`) VALUES
(1, 'OaT', '0909878787', 'AIA', 2147483647, '2020-07-23 16:06:59', '2020-07-23 16:07:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_code` char(255) NOT NULL,
  `net_total` decimal(10,2) DEFAULT 0.00,
  `active` tinyint(4) DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `orderdetailID` int(11) DEFAULT NULL,
  `shippingcostID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `unit` int(11) NOT NULL DEFAULT 0,
  `unit_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unittotal_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `unit`, `unit_price`, `unittotal_price`, `createdAt`, `updatedAt`, `productID`, `customerID`, `orderID`) VALUES
(1, 2, '7000.00', '14000.00', '2020-07-23 16:05:16', '2020-07-23 16:05:16', 35, 1, NULL),
(2, 1, '1500.00', '1500.00', '2020-07-23 16:08:07', '2020-07-23 16:08:08', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `credit` decimal(10,2) DEFAULT 0.00,
  `img` text DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
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
  `cost` varchar(255) NOT NULL,
  `type` enum('EMS','Flash') NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingcost`
--

INSERT INTO `shippingcost` (`id`, `name`, `cost`, `type`, `createdAt`, `updatedAt`) VALUES
(1, 'Test', '50', 'EMS', '2020-07-23 15:53:22', '2020-07-23 15:53:23'),
(2, 'Test2', '50', 'Flash', '2020-07-23 15:55:39', '2020-07-23 15:55:40');

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippingcostID` (`shippingcostID`),
  ADD KEY `productID` (`orderdetailID`) USING BTREE;

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_customer_buy_product` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `FK_customer_payment` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order_order_detail` FOREIGN KEY (`shippingcostID`) REFERENCES `order_detail` (`id`),
  ADD CONSTRAINT `FK_order_shippingcost` FOREIGN KEY (`orderdetailID`) REFERENCES `shippingcost` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order_detail_customer` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_order_detail_order` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_payment_bank` FOREIGN KEY (`bankID`) REFERENCES `bank` (`id`),
  ADD CONSTRAINT `FK_payment_buy_product` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `FK_payment_payment_status` FOREIGN KEY (`payment_statusID`) REFERENCES `payment_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
