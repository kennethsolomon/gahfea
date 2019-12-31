-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 06:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` int(10) NOT NULL,
  `cashier_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `cashier_name`, `position`, `username`, `password`) VALUES
(1, 'Cashier', 'cashier', 'cashier', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`transaction_id`, `date`, `name`, `invoice`, `amount`, `remarks`, `balance`) VALUES
(1, '08/23/2019', 'RS-00020230', 'IN-02229', '10000', 'Balance will be on Monday', 550),
(2, '08/23/2019', 'RS-003283', 'IN-3332242', '3000', '', 0),
(3, '09/14/2019', 'RS-27232', 'IN-0323232', '1650', 'PAID', 0),
(4, '09/14/2019', 'RS-03336003', 'IN-322223', '800', 'paid', -50),
(5, '09/14/2019', 'RS-3232302', 'IN-32233238', '1500', 'PAID', 0),
(6, '09/15/2019', 'RS-203333', 'IN-274327', '2500', 'Paid', 0),
(7, '09/15/2019', 'RS-0033322', 'IN-3383203', '2500', 'Paid', 0),
(8, '09/15/2019', 'RS-00020230', 'IN-3539432', '550', 'Paid', 0),
(9, '09/15/2019', 'RS-003283', 'IN-03333', '0', 'PAID', 0),
(10, '09/15/2019', 'RS-40203', 'IN-2222203', '1250', 'PAID', 0),
(11, '09/16/2019', 'RS-026', 'IN-3043543', '12050', 'Paid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `first_name`, `middle_name`, `last_name`) VALUES
(2, 'Project Rangas  ', 'Guinlajon, Sorsogon City', '', '001', 'Project Rangas', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lose`
--

CREATE TABLE `lose` (
  `p_id` int(10) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description_name` varchar(30) NOT NULL,
  `amount_lose` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `exdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lose`
--

INSERT INTO `lose` (`p_id`, `product_code`, `product_name`, `description_name`, `amount_lose`, `qty`, `cost`, `date`, `category`, `exdate`) VALUES
(2, 'P-322323', 'RLCS LUMBER', '2x2x10 Coco Lumber', '9000', '10', '900', '09-14-2019', 'Coco Lumber', ''),
(3, 'P-03238', 'RLCS CHB', 'CHB 5', '20', '2', '10', '09-15-2019', 'Concrete Hallow Bloc', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description_name` varchar(50) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty_left` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_delivered` varchar(20) NOT NULL,
  `expiration_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `description_name`, `unit`, `cost`, `price`, `supplier`, `qty_left`, `category`, `date_delivered`, `expiration_date`) VALUES
(5, 'P-2330246', 'Boulder', 'Boulder', 'Per m3', '250000', '1050', 'Legazpi', 490, 'Boulder', '2019-08-23', ''),
(6, 'P-92703', 'Gravel', 'P-SIZE', 'Per m3', '300000', '1250', 'Legazpi', 471, 'Gravel', '2019-08-23', ''),
(7, 'P-423346', 'Sand', 'Sand', 'Per m3', '100000', '750', 'Legazpi', 459, 'Sand', '2019-08-23', ''),
(8, 'P-322323', 'RLCS LUMBER', '2x2x10 Coco Lumber', 'Per Piece', '20000', '90', 'Lumber Supply', 598, 'Coco Lumber', '2019-08-23', '0'),
(9, 'P-02036299', 'RLCS LUMBER', '2x2x10 Good Lumber', 'Per Piece', '300000', '100', 'Lumber Supply', 931, 'Good Lumber', '2019-08-23', ''),
(10, 'P-8230030', 'Republic', 'Republic Cement', 'Per Piece', '112500', '235', 'SORCOM', 528, 'Cement', '2019-08-23', '2019-09-15'),
(11, 'P-03238', 'RLCS CHB', 'CHB 5', 'Per Piece', '3800', '10', 'Legazpi', 377, 'Concrete Hallow Blocks', '2019-08-23', '0'),
(12, 'P-02232023', 'RLCS RSB', 'RSB 12mm', 'Per Piece', '40000', '120', 'SORCOM', 380, 'Round Steel Bar', '2019-08-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date_order` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `date_deliver` varchar(100) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date_order`, `suplier`, `date_deliver`, `p_name`, `qty`, `cost`, `status`, `remark`) VALUES
(6, 'PO-422338', '2019-08-23', 'SORCOM', '2019-08-23', 'P-8230030', '500', '117500', 'Received', ' ALL GOOD'),
(7, 'PO-35220', '2019-09-15', 'SORCOM', '2019-09-16', 'P-8230030', '500', '117500', 'Received', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `name`, `qty`, `cost`, `invoice`, `status`, `date`) VALUES
(2, 'Concrete Hallow Blocks', 500, '0', 'PO-8439000', 'pending', '2019-08-23'),
(3, 'Gravel', 1, '0', 'PO-3253765', 'pending', '2019-08-23'),
(4, 'P-322323', 500, '45000', 'PO-23620795', 'pending', '2019-08-23'),
(5, 'P-322323', 500, '45000', 'PO-80392362', 'Received', '2019-08-23'),
(6, 'P-8230030', 500, '117500', 'PO-422338', 'Received', '2019-08-23'),
(7, 'P-8230030', 500, '117500', 'PO-35220', 'Received', '2019-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `cash` varchar(100) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `p_amount` varchar(30) NOT NULL,
  `vat` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `contact_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `due_date`, `name`, `balance`, `total_amount`, `cash`, `month`, `year`, `p_amount`, `vat`, `address`, `contact_number`) VALUES
(4, 'RS-203222', 'Cashier', '08/23/2019', 'cash', '58750', '', 'Project Rangas  ', '', '', '58750', 'August', '2019', '58750', '7050', '', '0'),
(5, 'RS-06323039', 'Cashier', '08/23/2019', 'cash', '750', '', 'Project Rangas  ', '', '', '', 'August', '2019', '750', '90', '', '0'),
(6, 'RS-48233', 'Cashier', '08/23/2019', 'credit', '', '2019-08-24', 'Project Rangas  ', '1250', '1250', '', 'August', '2019', '1250', '150', '', '0'),
(7, 'RS-003283', 'Cashier', '09/15/2019', 'credit', '3000', 'PAID', 'Project Rangas  ', '0', '3000', '', 'August', '2019', '3000', '360', '', '0'),
(8, 'RS-030032', 'Cashier', '08/24/2019', 'cash', '500', '', '', '', '', '500', 'August', '2019', '500', '60', '', '0'),
(9, 'RS-82028', 'Cashier', '08/23/2019', 'cash', '4500', '', '', '', '', '5000', 'August', '2019', '4500', '540', '', '0'),
(10, 'RS-63822762', 'Cashier', '08/23/2019', 'cash', '12000', '', '', '', '', '12000', 'August', '2019', '12000', '1440', '', '0'),
(11, 'RS-35292032', 'Cashier', '08/23/2019', 'credit', '', '2019-08-24', 'Project Rangas  ', '1175', '1175', '', 'August', '2019', '1175', '141', '', '0'),
(12, 'RS-00020230', 'Cashier', '09/15/2019', 'credit', '10550', 'Paid', 'Project Rangas  ', '0', '10550', '', 'August', '2019', '2350', '282', '', '0'),
(13, 'RS-06908', 'Cashier', '08/23/2019', 'cash', '27000', '', '', '', '', '27000', 'August', '2019', '27000', '3240', '', '0'),
(14, 'RS-8328322', 'Cashier', '08/23/2019', 'cash', '23500', '', '', '', '', '23500', 'August', '2019', '23500', '2820', '', '0'),
(15, 'RS-8023', 'Cashier', '09/14/2019', 'cash', '1250', '', 'jason', '', '', '1300', 'September', '2019', '1250', '150', '', '0'),
(18, 'RS-27232', 'Cashier', '09/14/2019', 'credit', '1650', 'PAID', 'ALVIN JOSEPH GREGORIO', '0', '1650', '', 'September', '2019', '900', '108', 'RANGAS, GUINLAJON SORSOGON CITY', '0947898766'),
(19, 'RS-03336003', 'Cashier', '09/14/2019', 'credit', '800', 'paid', 'JASON', '-50', '750', '', 'September', '2019', '750', '90', 'PILAR, SORSOGON, SORSOGON', '09508978832'),
(20, 'RS-3232302', 'Cashier', '09/14/2019', 'credit', '1500', 'PAID', 'JASON', '0', '1500', '', 'September', '2019', '1500', '180', 'PILAR, SORSOGON, SORSOGON', '09509269930'),
(21, 'RS-0033322', 'Cashier', '09/15/2019', 'credit', '2500', 'Paid', 'JASON', '0', '2500', '', 'September', '2019', '2500', '300', 'PILAR, SORSOGON, SORSOGON', '09509269930'),
(25, 'RS-40203', 'Cashier', '09/15/2019', 'credit', '1250', 'PAID', 'Project Rangas  ', '0', '1250', '', 'September', '2019', '1250', '150', '', ''),
(26, 'RS-203333', 'Cashier', '09/15/2019', 'credit', '2500', 'Paid', 'Project Rangas  ', '0', '2500', '', 'September', '2019', '1250', '150', '', ''),
(36, 'RS-223602', 'Cashier', '09/15/2019', 'cash', '90', '', 'che', '', '', '100', 'September', '2019', '90', '10.8', 'sorsogon', '09389877787'),
(37, 'RS-862037', 'Cashier', '09/15/2019', 'cash', '100', '', 'vin', '', '', '100', 'September', '2019', '100', '12', 'sorsogon', '09120989963'),
(38, 'RS-3823377', 'Cashier', '09/15/2019', 'cash', '235', '', 'son', '', '', '500', 'September', '2019', '235', '28.2', 'sorsogon', '09408987733'),
(43, 'RS-3023322', 'Cashier', 'Sep-15-2019', 'cash', '750', '', 'von', '', '', '800', 'September', '2019', '750', '90', 'sorsogon', '09809890098'),
(44, 'RS-533302', 'Cashier', 'Sep-15-2019', 'cash', '90', '', 'asfga', '', '', '90', 'September', '2019', '90', '10.8', 'afga', '4565645'),
(45, 'RS-0082023', 'Cashier', 'Sep-15-2019', 'cash', '235', '', 'Jason', '', '', '500', 'September', '2019', '235', '28.2', 'sorsogon', '09809090099'),
(46, 'RS-38320205', 'Cashier', '09/15/2019', 'cash', '1050', '', 'Mark Jason Lagco', '', '', '1100', 'September', '2019', '1050', '126', 'Ilawood, Guinlajon, Sorsogon City', '09509269930'),
(47, 'RS-0229202', 'Cashier', '09/15/2019', 'cash', '750', '', 'Albert', '', '', '800', 'September', '2019', '750', '90', 'Guinlajon Sorsogon City', '09509263359'),
(48, 'RS-5323344', 'Cashier', '09/15/2019', 'cash', '120555', '', 'Project Rangas  ', '', '', '120600', 'September', '2019', '120555', '14466.6', 'Guinlajon Sorsogon City', '0950926930'),
(49, 'RS-026', 'Cashier', '09/16/2019', 'credit', '12050', 'Paid', 'Project Rangas  ', '0', '12050', '', 'September', '2019', '1000', '120', 'Guinlajon Sorsogon City', '09509289950');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `omonth` varchar(25) NOT NULL,
  `oyear` varchar(25) NOT NULL,
  `qtyleft` varchar(25) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `total_amount` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `name`, `price`, `discount`, `category`, `date`, `omonth`, `oyear`, `qtyleft`, `dname`, `vat`, `total_amount`) VALUES
(6, 'RS-772332', 'P-03238', '1', '0', 'RLCS CHB', '10', '10', 'Concrete Hallow Blocks', '08/23/2019', 'August', '2019', '499', 'CHB 5', '0', '0'),
(15, 'RS-62682333', 'P-423346', '10', '7500', 'Sand', '750', '0', 'Sand', '08/23/2019', 'August', '2019', '492', 'Sand', '0', '7500'),
(16, 'RS-203222', 'P-8230030', '250', '58750', 'Republic', '235', '0', 'Cement', '08/23/2019', 'August', '2019', '250', 'Republic Cement', '0', '58750'),
(17, 'RS-06323039', 'P-423346', '1', '750', 'Sand', '750', '0', 'Sand', '08/23/2019', 'August', '2019', '491', 'Sand', '0', '750'),
(18, 'RS-48233', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '08/23/2019', 'August', '2019', '499', 'P-SIZE', '0', '1250'),
(19, 'RS-003283', 'P-03238', '300', '3000', 'RLCS CHB', '10', '0', 'Concrete Hallow Blocks', '08/23/2019', 'August', '2019', '199', 'CHB 5', '0', '3000'),
(20, 'RS-030032', 'P-02036299', '5', '500', 'RLCS LUMBER', '100', '', 'Good Luber', '08/24/2019', 'August', '2019', '495', '2x2x10', '0', '500'),
(21, 'RS-82028', 'P-322323', '50', '4500', 'RLCS LUMBER', '90', '0', 'Select Category', '08/23/2019', 'August', '2019', '450', '2x2x10 Coco Lumber', '0', '4500'),
(22, 'RS-63822762', 'P-02232023', '100', '12000', 'RLCS RSB', '120', '0', 'Round Steel Bar', '08/23/2019', 'August', '2019', '400', 'RSB 12mm', '0', '12000'),
(23, 'RS-35292032', 'P-8230030', '5', '1175', 'Republic', '235', '0', 'Cement', '08/23/2019', 'August', '2019', '245', 'Republic Cement', '0', '1175'),
(29, 'RS-00020230', 'P-322323', '30', '2700', 'RLCS LUMBER', '90', '0', 'Select Category', '08/23/2019', 'August', '2019', '420', '2x2x10 Coco Lumber', '0', '2700'),
(30, 'RS-00020230', 'P-02036299', '30', '3000', 'RLCS LUMBER', '100', '0', 'Select Category', '08/23/2019', 'August', '2019', '464', '2x2x10 Good Lumber', '0', '3000'),
(31, 'RS-00020230', 'P-92703', '2', '2500', 'Gravel', '1250', '0', 'Gravel', '08/23/2019', 'August', '2019', '497', 'P-SIZE', '0', '2500'),
(32, 'RS-00020230', 'P-8230030', '10', '2350', 'Republic', '235', '0', 'Cement', '08/23/2019', 'August', '2019', '220', 'Republic Cement', '0', '2350'),
(33, 'RS-06908', 'P-322323', '300', '27000', 'RLCS LUMBER', '90', '0', 'Coco Lumber', '08/23/2019', 'August', '2019', '120', '2x2x10 Coco Lumber', '0', '27000'),
(34, 'RS-8328322', 'P-8230030', '100', '23500', 'Republic', '235', '0', 'Cement', '08/23/2019', 'August', '2019', '620', 'Republic Cement', '0', '23500'),
(35, 'RS-33330203', 'P-423346', '2', '1500', 'Sand', '750', '0', 'Sand', '09/14/2019', 'September', '2019', '486', 'Sand', '0', '1500'),
(36, 'RS-33330203', 'P-92703', '2', '2500', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '495', 'P-SIZE', '0', '2500'),
(37, 'RS-8023', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '494', 'P-SIZE', '0', '1250'),
(38, 'RS-322394', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '493', 'P-SIZE', '0', '1250'),
(39, 'RS-00489060', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '492', 'P-SIZE', '0', '1250'),
(40, 'RS-3292334', 'P-92703', '2', '2500', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '490', 'P-SIZE', '0', '2500'),
(41, 'RS-3292334', 'P-8230030', '5', '1175', 'Republic', '235', '0', 'Cement', '09/14/2019', 'September', '2019', '615', 'Republic Cement', '0', '1175'),
(42, 'RS-27232', 'P-423346', '1', '750', 'Sand', '750', '0', 'Sand', '09/14/2019', 'September', '2019', '485', 'Sand', '0', '750'),
(43, 'RS-27232', 'P-322323', '10', '900', 'RLCS LUMBER', '90', '0', 'Coco Lumber', '09/14/2019', 'September', '2019', '610', '2x2x10 Coco Lumber', '0', '900'),
(44, 'RS-03336003', 'P-423346', '1', '750', 'Sand', '750', '0', 'Sand', '09/14/2019', 'September', '2019', '484', 'Sand', '0', '750'),
(45, 'RS-3232302', 'P-423346', '2', '1500', 'Sand', '750', '0', 'Sand', '09/14/2019', 'September', '2019', '482', 'Sand', '0', '1500'),
(46, 'RS-0033322', 'P-92703', '2', '2500', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '488', 'P-SIZE', '0', '2500'),
(47, 'RS-830320', 'P-2330246', '1', '1050', 'Boulder', '1050', '0', 'Boulder', '09/14/2019', 'September', '2019', '499', 'Boulder', '0', '1050'),
(48, 'RS-03223', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '487', 'P-SIZE', '0', '1250'),
(49, 'RS-276620', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '486', 'P-SIZE', '0', '1250'),
(50, 'RS-40203', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '485', 'P-SIZE', '0', '1250'),
(52, 'RS-203333', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '484', 'P-SIZE', '0', '1250'),
(53, 'RS-203333', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/14/2019', 'September', '2019', '483', 'P-SIZE', '0', '1250'),
(54, 'RS-234322', 'P-92703', '2', '2500', 'Gravel', '1250', '0', 'Gravel', '09/15/2019', 'September', '2019', '481', 'P-SIZE', '0', '2500'),
(55, 'RS-234322', 'P-8230030', '15', '3525', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '600', 'Republic Cement', '0', '3525'),
(56, 'RS-234322', 'P-03238', '10', '100', 'RLCS CHB', '10', '0', 'Concrete Hallow Blocks', '09/15/2019', 'September', '2019', '689', 'CHB 5', '0', '100'),
(58, 'RS-6030323', 'P-02232023', '10', '1200', 'RLCS RSB', '120', '0', 'Round Steel Bar', '09/15/2019', 'September', '2019', '390', 'RSB 12mm', '0', '1200'),
(59, 'RS-6030323', 'P-03238', '10', '100', 'RLCS CHB', '10', '0', 'Concrete Hallow Blocks', '09/15/2019', 'September', '2019', '679', 'CHB 5', '0', '100'),
(60, 'RS-9902222', 'P-423346', '4', '3000', 'Sand', '750', '0', 'Sand', '09/15/2019', 'September', '2019', '478', 'Sand', '0', '3000'),
(61, 'RS-9902222', 'P-8230030', '15', '3525', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '585', 'Republic Cement', '0', '3525'),
(62, 'RS-52232', 'P-02232023', '10', '1200', 'RLCS RSB', '120', '0', 'Round Steel Bar', '09/15/2019', 'September', '2019', '380', 'RSB 12mm', '0', '1200'),
(63, 'RS-52232', 'P-03238', '200', '2000', 'RLCS CHB', '10', '0', 'Concrete Hallow Blocks', '09/15/2019', 'September', '2019', '479', 'CHB 5', '0', '2000'),
(64, 'RS-52232', 'P-8230030', '20', '4700', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '565', 'Republic Cement', '0', '4700'),
(65, 'RS-52232', 'P-423346', '4', '3000', 'Sand', '750', '0', 'Sand', '09/15/2019', 'September', '2019', '474', 'Sand', '0', '3000'),
(66, 'RS-52232', 'P-92703', '3', '3750', 'Gravel', '1250', '0', 'Gravel', '09/15/2019', 'September', '2019', '478', 'P-SIZE', '0', '3750'),
(67, 'RS-52232', 'P-2330246', '2', '2100', 'Boulder', '1050', '0', 'Boulder', '09/15/2019', 'September', '2019', '497', 'Boulder', '0', '2100'),
(68, 'RS-4522933', 'P-2330246', '1', '1050', 'Boulder', '1050', '0', 'Boulder', '09/15/2019', 'September', '2019', '496', 'Boulder', '0', '1050'),
(69, 'RS-2023204', 'P-2330246', '1', '1050', 'Boulder', '1050', '0', 'Boulder', '09/15/2019', 'September', '2019', '495', 'Boulder', '0', '1050'),
(70, 'RS-234', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/15/2019', 'September', '2019', '477', 'P-SIZE', '0', '1250'),
(71, 'RS-30933', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/15/2019', 'September', '2019', '476', 'P-SIZE', '0', '1250'),
(72, 'RS-6302332', 'P-8230030', '1', '235', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '564', 'Republic Cement', '0', '235'),
(73, 'RS-223602', 'P-322323', '1', '90', 'RLCS LUMBER', '90', '0', 'Coco Lumber', '09/15/2019', 'September', '2019', '599', '2x2x10 Coco Lumber', '0', '90'),
(74, 'RS-862037', 'P-02036299', '1', '100', 'RLCS LUMBER', '100', '0', 'Good Lumber', '09/15/2019', 'September', '2019', '963', '2x2x10 Good Lumber', '0', '100'),
(75, 'RS-3823377', 'P-8230030', '1', '235', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '563', 'Republic Cement', '0', '235'),
(76, 'RS-2803730', 'P-423346', '1', '750', 'Sand', '750', '0', 'Sand', '09/15/2019', 'September', '2019', '473', 'Sand', '0', '750'),
(77, 'RS-5338383', 'P-02036299', '1', '100', 'RLCS LUMBER', '100', '0', 'Good Lumber', '09/15/2019', 'September', '2019', '962', '2x2x10 Good Lumber', '0', '100'),
(79, 'RS-33233', 'P-02036299', '1', '100', 'RLCS LUMBER', '100', '0', 'Good Lumber', '09/15/2019', 'September', '2019', '961', '2x2x10 Good Lumber', '0', '100'),
(80, 'RS-632332', 'P-92703', '1', '1250', 'Gravel', '1250', '0', 'Gravel', '09/15/2019', 'September', '2019', '475', 'P-SIZE', '0', '1250'),
(81, 'RS-3023322', 'P-423346', '1', '750', 'Sand', '750', '0', 'Sand', '09/15/2019', 'September', '2019', '472', 'Sand', '0', '750'),
(82, 'RS-533302', 'P-322323', '1', '90', 'RLCS LUMBER', '90', '0', 'Coco Lumber', '09/15/2019', 'September', '2019', '598', '2x2x10 Coco Lumber', '0', '90'),
(83, 'RS-0082023', 'P-8230030', '1', '235', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '562', 'Republic Cement', '0', '235'),
(84, 'RS-38320205', 'P-2330246', '1', '1050', 'Boulder', '1050', '0', 'Boulder', '09/15/2019', 'September', '2019', '494', 'Boulder', '0', '1050'),
(85, 'RS-0229202', 'P-423346', '1', '750', 'Sand', '750', '0', 'Sand', '09/15/2019', 'September', '2019', '471', 'Sand', '0', '750'),
(87, 'RS-5323344', 'P-8230030', '513', '120555', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '49', 'Republic Cement', '0', '120555'),
(88, 'RS-20432333', 'P-8230030', '1', '235', 'Republic', '235', '0', 'Cement', '09/15/2019', 'September', '2019', '48', 'Republic Cement', '0', '235'),
(89, 'RS-333203', 'P-02036299', '30', '3000', 'RLCS LUMBER', '100', '0', 'Good Lumber', '09/16/2019', 'September', '2019', '931', '2x2x10 Good Lumber', '0', '3000'),
(90, 'RS-333203', 'P-92703', '4', '5000', 'Gravel', '1250', '0', 'Gravel', '09/16/2019', 'September', '2019', '471', 'P-SIZE', '0', '5000'),
(91, 'RS-333203', 'P-423346', '6', '4500', 'Sand', '750', '0', 'Sand', '09/16/2019', 'September', '2019', '465', 'Sand', '0', '4500'),
(92, 'RS-333203', 'P-8230030', '10', '2350', 'Republic', '235', '0', 'Cement', '09/16/2019', 'September', '2019', '538', 'Republic Cement', '0', '2350'),
(93, 'RS-026', 'P-2330246', '4', '4200', 'Boulder', '1050', '0', 'Boulder', '09/16/2019', 'September', '2019', '490', 'Boulder', '0', '4200'),
(94, 'RS-026', 'P-423346', '6', '4500', 'Sand', '750', '0', 'Sand', '09/16/2019', 'September', '2019', '459', 'Sand', '0', '4500'),
(95, 'RS-026', 'P-8230030', '10', '2350', 'Republic', '235', '0', 'Cement', '09/16/2019', 'September', '2019', '528', 'Republic Cement', '0', '2350'),
(96, 'RS-026', 'P-03238', '100', '1000', 'RLCS CHB', '10', '0', 'Concrete Hallow Blocks', '09/16/2019', 'September', '2019', '377', 'CHB 5', '0', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`) VALUES
(3, 'Legazpi', 'Legazpi City', '+639609287730', 'Ricardo'),
(4, 'SORCOM', 'Sorsogon City', '+639875987782', 'Char Celement'),
(5, 'Lumber Supply', 'Legazpi City', '+639098789462', 'Richard Yap'),
(6, 'Hollow Blocks', 'Guinlajon Sorsogon City', '09107876566', 'RLCS CHB MAKER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin123', 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `lose`
--
ALTER TABLE `lose`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lose`
--
ALTER TABLE `lose`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
