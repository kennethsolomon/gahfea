-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 12:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_gahfea`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendant`
--

CREATE TABLE `attendant` (
  `attendant_id` int(12) NOT NULL,
  `attendant_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendant`
--

INSERT INTO `attendant` (`attendant_id`, `attendant_name`, `position`, `username`, `password`) VALUES
(1, 'fattendant', 'Front Attendant', 'fattendant', 'fattendant');

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
(1, 'cashier', 'Cashier', 'cashier', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `cmonth` varchar(25) NOT NULL,
  `cyear` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE `kitchen` (
  `kitchen_id` int(100) NOT NULL,
  `kitchen_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`kitchen_id`, `kitchen_name`, `position`, `username`, `password`) VALUES
(1, 'kitchen', 'Kitchen', 'kitchen', 'kitchen');

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
  `exdate` varchar(30) NOT NULL,
  `lmonth` varchar(25) NOT NULL,
  `lyear` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'P-6323323', 'Daing na bangus w/ egg salad and rice', 'Daing na bangus w/ egg salad and rice', 'Per Pieces', '400', '300', 'GAHFEA', 139, 'All Day Rice Meal', '2019-11-12', '2020-02-06');

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
(1, 'PO-22333252', '2019-12-14', 'GAHFEA', '2019-12-14', 'P-6323323', '20', '6000', 'Received', ' received'),
(2, 'PO-77333226', '2019-12-14', 'GAHFEA', '2019-12-15', 'P-6323323', '100', '30000', 'Received', ' 100 orders'),
(3, 'PO-334537', '2020-01-29', 'GAHFEA', '2020-01-29', 'P-6323323', '1', '300', 'Received', ' '),
(4, 'PO-63222', '2020-02-19', 'GAHFEA', '', 'P-6323323', '2', '600', 'pending', '');

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
(1, 'P-6323323', 20, '6000', 'PO-22333252', 'Received', '2019-12-14'),
(2, 'P-6323323', 100, '30000', 'PO-77333226', 'Received', '2019-12-14'),
(3, 'P-6323323', 1, '300', 'PO-334537', 'Received', '2020-01-29'),
(4, 'P-6323323', 2, '600', 'PO-63222', 'pending', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
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
(6, 'RS-53334594', 'Test3', '02/20/2020', 'cash', '600', '', 'te', '', '', '6', 'February', '2020', '300', '36', 'tet', '12312'),
(7, 'RS-53334594', 'Test3', '02/19/2020', 'cash', '600', '', 'te', '', '', '6', 'February', '2020', '300', '36', 'tet', '12312'),
(8, 'RS-53334594', 'Test3', '02/20/2020', 'cash', '600', '', 'te', '', '', '6', 'February', '2020', '300', '36', 'tet', '12312');

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
  `total_amount` varchar(30) NOT NULL,
  `table_number` varchar(25) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `name`, `price`, `discount`, `category`, `date`, `omonth`, `oyear`, `qtyleft`, `dname`, `vat`, `total_amount`, `table_number`, `order_status`) VALUES
(99, 'RS-059022', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '01/24/2020', 'January', '2020', '149', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(100, 'RS-059022', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '01/24/2020', 'January', '2020', '148', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(102, 'RS-83803', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '01/29/2020', 'January', '2020', '148', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(104, 'RS-322033', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '01/29/2020', 'January', '2020', '148', 'Daing na bangus w/ egg salad and rice', '0', '300', '2', 'pending'),
(105, 'RS-330320', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/03/2020', 'February', '2020', '147', 'Daing na bangus w/ egg salad and rice', '0', '300', '2', 'pending'),
(106, 'RS-53334594', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/03/2020', 'February', '2020', '146', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(107, 'RS-53334594', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/03/2020', 'February', '2020', '145', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(108, 'RS-53334594', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/03/2020', 'February', '2020', '144', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(109, 'RS-53334594', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/03/2020', 'February', '2020', '143', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(110, 'RS-53334594', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/03/2020', 'February', '2020', '142', 'Daing na bangus w/ egg salad and rice', '0', '300', '0', 'paid'),
(111, 'RS-22000333', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/19/2020', 'February', '2020', '141', 'Daing na bangus w/ egg salad and rice', '0', '300', '1', 'served'),
(112, 'RS-27522303', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/19/2020', 'February', '2020', '140', 'Daing na bangus w/ egg salad and rice', '0', '300', '1', 'served'),
(113, 'RS-22000333', 'P-6323323', '1', '300', 'Daing na bangus w/ egg salad and rice', '300', '0', 'All Day Rice Meal', '02/19/2020', 'February', '2020', '139', 'Daing na bangus w/ egg salad and rice', '0', '300', '1', 'served');

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
(1, 'GAHFEA', 'GAHFEA', '123', 'GAHFEA');

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
(1, 'admin', 'admin', 'Admin', 'ADMIN'),
(2, 'test', 'test', 'Test', 'Front Attendant'),
(3, 'kitchen', 'kitchen', 'Test2', 'Kitchen'),
(4, 'test3', 'test3', 'Test3', 'Cashier'),
(5, 'cashier', 'cashier', 'Cashier', 'Cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendant`
--
ALTER TABLE `attendant`
  ADD PRIMARY KEY (`attendant_id`);

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
-- Indexes for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`kitchen_id`);

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
-- AUTO_INCREMENT for table `attendant`
--
ALTER TABLE `attendant`
  MODIFY `attendant_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `kitchen_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lose`
--
ALTER TABLE `lose`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
