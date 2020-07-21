-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 12:47 PM
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
-- Table structure for table `buy_product`
--

CREATE TABLE `buy_product` (
  `id` int(11) NOT NULL,
  `sum_price` decimal(10,2) DEFAULT 0.00,
  `amount` int(11) DEFAULT 0,
  `active` tinyint(4) DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `buy_productID` int(11) DEFAULT NULL,
  `paymentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `credit` decimal(10,0) DEFAULT 0,
  `price` decimal(10,2) DEFAULT 0.00,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `buy_productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `name`, `price`, `detail`, `stock`, `photo`, `createdAt`, `updatedAt`, `active`) VALUES
(1, 'TG-ECHO001CA', 'Calbilberry', '650.00', 'dfhnijgsfuihusihguifhuidfhnij', 120, 'img/product/p1.png', '2020-07-21 13:51:28', '2020-07-21 13:51:29', 0),
(2, 'TG-ECHO004CO', 'Collysine', '450.00', 'dfhnijgsfuihusihguifhuidfhnij', 120, 'img/product/p2.png', '2020-07-21 13:51:31', '2020-07-21 13:51:32', 0),
(3, 'TG-ECHO003RI', 'Riciomeg', '550.00', 'dfhnijgsfuihusihguifhuidfhnij', 120, 'img/product/p3.png', '2020-07-21 13:51:41', '2020-07-21 13:51:32', 0),
(4, 'TG-ECHO002VI', 'Vitaoxxy FP', '650.00', 'dfhnijgsfuihusihguifhuidfhnij', 120, 'img/product/p4.png', '2020-07-21 13:51:41', '2020-07-21 13:51:33', 0),
(24, 'OAT-8000', 'Big Brother', '5000.00', 'Good', 12, 'img/productS__18309123.jpg', '2020-07-21 17:36:53', '2020-07-21 17:36:53', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy_product`
--
ALTER TABLE `buy_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buy_productID` (`buy_productID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buy_productID` (`buy_productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy_product`
--
ALTER TABLE `buy_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy_product`
--
ALTER TABLE `buy_product`
  ADD CONSTRAINT `FK_buy_product_product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_customer_buy_product` FOREIGN KEY (`buy_productID`) REFERENCES `buy_product` (`id`),
  ADD CONSTRAINT `FK_customer_payment` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_payment_buy_product` FOREIGN KEY (`buy_productID`) REFERENCES `buy_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
