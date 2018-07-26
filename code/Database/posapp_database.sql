-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 11:33 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posapp_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_members`
--

CREATE TABLE `company_members` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_tel` varchar(25) NOT NULL,
  `company_address1` varchar(255) NOT NULL,
  `company_address2` varchar(255) NOT NULL,
  `company_address3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_members`
--

INSERT INTO `company_members` (`id`, `company_name`, `company_tel`, `company_address1`, `company_address2`, `company_address3`) VALUES
(28, 'Secure company', '12-3456789', '54654 ', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `company_id` int(11) NOT NULL,
  `employee_pps` varchar(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_tel` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=employer, 1=employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`company_id`, `employee_pps`, `employee_name`, `employee_tel`, `employee_email`, `password`, `account_type`) VALUES
(28, '1234567A', 'Matthew Sumpter', '0123456789', 'matt@example.ie', '$2y$10$GoeHdlCJrsLh4XsLyolqGOu1327eFiM7s2vZ/.HCrfMeqh.Ly9Po.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employers_details`
--

CREATE TABLE `employers_details` (
  `employer_id` int(11) NOT NULL COMMENT 'AKA Company ID',
  `employer_name` varchar(255) NOT NULL,
  `employer_tel` varchar(255) DEFAULT NULL,
  `employers_email` varchar(255) NOT NULL,
  `employers_address1` varchar(255) DEFAULT NULL,
  `employers_address2` varchar(255) DEFAULT NULL,
  `employers_address3` varchar(255) DEFAULT NULL,
  `employers_password` varchar(255) NOT NULL,
  `account_type` int(11) NOT NULL DEFAULT '0' COMMENT '0=employer, 1=employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employers_details`
--

INSERT INTO `employers_details` (`employer_id`, `employer_name`, `employer_tel`, `employers_email`, `employers_address1`, `employers_address2`, `employers_address3`, `employers_password`, `account_type`) VALUES
(28, 'Secure Man', '6465465', 'secureman@secure.ie', 'asdad', 'asdasd', 'asdad', '$2y$10$WL1nG5yBTTganIn5xqubmOFOx.Q.a4DshYuSLN9wQezQ/bd/Xvxai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_details`
--

CREATE TABLE `menu_details` (
  `menu_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_catagory` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `item_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_details`
--

INSERT INTO `menu_details` (`menu_id`, `item_name`, `item_catagory`, `item_description`, `item_price`) VALUES
(28, 'Chocolate Milkshake', 'Sides', '', '3.99'),
(28, 'Pasta Carbonara', 'Mains', 'Really tasty', '14.99'),
(28, 'Selection of Ice Cream', 'Desserts', 'Chocolate, Banana and Vanilla ice cream server in a tall glass topped with chocolate sauce.', '4.99'),
(28, 'Spring Rolls', 'Starters', '', '8.99');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL COMMENT 'AKA company_id',
  `order_number` int(11) NOT NULL,
  `order_details` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `order_price` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'OPEN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `order_details`, `order_price`, `order_status`) VALUES
(28, 123, 'x2 Pasta x3 Ice Cream', '30.99', 'OPEN'),
(28, 182, 'x3 Ice Cream', '10.99', 'OPEN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_members`
--
ALTER TABLE `company_members`
  ADD PRIMARY KEY (`id`,`company_name`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`company_id`,`employee_pps`);

--
-- Indexes for table `employers_details`
--
ALTER TABLE `employers_details`
  ADD PRIMARY KEY (`employer_id`,`employer_name`);

--
-- Indexes for table `menu_details`
--
ALTER TABLE `menu_details`
  ADD PRIMARY KEY (`menu_id`,`item_name`,`item_price`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`,`order_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_members`
--
ALTER TABLE `company_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `company_restraint` FOREIGN KEY (`company_id`) REFERENCES `company_members` (`id`);

--
-- Constraints for table `employers_details`
--
ALTER TABLE `employers_details`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`employer_id`) REFERENCES `company_members` (`id`);

--
-- Constraints for table `menu_details`
--
ALTER TABLE `menu_details`
  ADD CONSTRAINT `company_menu` FOREIGN KEY (`menu_id`) REFERENCES `company_members` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `company_constraint` FOREIGN KEY (`order_id`) REFERENCES `company_members` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
