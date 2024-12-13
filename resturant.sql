-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 03:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `Phone_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `Phone_number`, `email`, `password`) VALUES
(1, 'ram', '9823196848', 'admin@example.com', 'admin@sms'),
(2, 'ram', '9823196848', 'admin@example.com', 'admin@sms'),
(3, 'ram', '9823196848', 'admin@example.com', 'admin@sms'),
(4, 'chandan', '987837637', 'ch@gmail.com', '12345'),
(5, '123456', 'chandalnfs', 'Hello', '3eqrr'),
(7, 'aayush', '9827486827', 'ap@gmail.com', 'aayush'),
(8, 'Bipana Thapa', '9875345546', 'bipana@gmail.com', '456'),
(9, '', '', '', ''),
(10, 'radhe radhe', '983475986', 'radhe@gmail.com', '1234'),
(11, 'radhe radhe', '983475986', 'radhe@gmail.com', '1234'),
(12, 'radhe radhe', '983475986', 'radheradhe@gmail.com', '1234'),
(13, 'radhe radhe', '983475986', 'radhe@gmail.com', '1234'),
(14, 'shiva', '98364637', 'shiv@gmail.com', '1234'),
(15, 'shiva', '98364637', 'shiv@gmail.com', '1234'),
(16, 'shiva', '98364637', 'shiv@gmail.com', '1234'),
(17, 'shiva', '98364637', 'shiv@gmail.com', '1234'),
(18, 'shiva', '98364637', 'shiv@gmail.com', '1234'),
(19, 'shiva', '98364637', 'shiv@gmail.com', '1234'),
(20, 'Sabita', '98888888', 'sabita@gmail.com', '1234'),
(21, 'Abhishek', '9811131886', 'abhishek@gmail.com', '9874'),
(22, 'chandan', '123455', 'ap@gmai123', '12333'),
(23, 'su', '', '', ''),
(24, '', '', '', ''),
(25, 'chandan', '9886875564', 'ap@gmail.com', 'dsfasfdsfwefsfef'),
(26, 'chandan', '6564654535', 'ap@gmail.com', 'dfghrshrthytrh'),
(27, 'chandan', '6564654535', 'ap@gmail.com', 'dfghrshrthytrh'),
(28, 'chandan', '7846563452', 'ap@gmail.com', 'dfgtrgtrhdf'),
(29, 'chandan', '7846563452', 'ap@gmail.com', 'dfgtrgtrhdf'),
(30, 'chandan', '6574532412', 'ap@gmail.com', 'dgdgertger'),
(31, 'chandan', '6574532412', 'ap@gmail.com', 'dgdgertger'),
(32, 'chandan', '6574532412', 'ap@gmail.com', 'dgdgertger'),
(33, 'chandan', '5646344523', 'ap@gmail.com', 'sdfretgerf');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `name`, `price`, `category`) VALUES
(1, 'buff', '150', 'non-veg'),
(2, 'buff', '150', 'non-veg'),
(3, 'buff', '150', 'non-veg'),
(4, 'buff', '150', 'non-veg'),
(5, 'samosa', '25', 'veg'),
(6, 'rajama& fried rice', '50', 'veg'),
(7, '', '', 'veg'),
(8, '', '', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `table_id` varchar(11) NOT NULL,
  `order_food` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `table_id`, `order_food`, `quantity`, `total_price`, `role`) VALUES
(37, '01', 'Milk', 2, 20, NULL),
(38, '02', 'Coffee', 3, 20, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
