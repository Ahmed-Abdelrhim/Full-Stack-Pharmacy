-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 09:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`) VALUES
(3, 'mohamed wael', 101010, 'mohamedwaelol74@gmail.com', '1010'),
(4, 'Mostafa Mohamed', 1206556130, 'mostafamohamed@gmail.com', '1111'),
(5, 'Ahmed Abdelrhim', 1152067271, 'abdelrhim@gmail.com', '123'),
(6, 'ahmed ebrahim', 0, 'ahmedebrahim@gmail.com', '3333'),
(7, 'mostafa gamal', 505050, 'mostafagamal@gmail.com', '4444'),
(9, 'Ahmed Abdelrhim', 1152067271, 'ahmed@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `manger_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `location`, `manger_id`) VALUES
(1, 'Helwan', 3),
(2, 'Banha', 4),
(3, 'Maasra', 5),
(4, 'Zagazig', 7),
(5, 'Hawamdya', 6);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone`, `address`, `password`, `image`) VALUES
(8, 'Mostafa Mohamed', 'mostafa@gmail.com', 1096896122, 'Banha', '123', '16537031503a9dc36537b992e0dcd99ac1478e8064.jpg'),
(9, 'Ahmed Azzam', 'azzam@gmail.com', 1010162658, 'Elmassara ', '123', '16537037833a9dc36537b992e0dcd99ac1478e8064.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `medicine_title` varchar(50) NOT NULL,
  `medicine_image` varchar(100) NOT NULL,
  `medicine_description` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_title`, `medicine_image`, `medicine_description`, `price`, `quantity`) VALUES
(6, 'Panadol', '1653838557panadol.jpg', 'This drug is used to treat mild to moderate pain (from headaches, menstrual periods, toothaches, backaches, osteoarthritis, or cold/flu aches and pains) and to reduce fever.', 30, 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(15) NOT NULL,
  `order_description` varchar(300) NOT NULL,
  `med_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `name`, `phone`, `email`, `password`, `branch_id`) VALUES
(1, 'Mohamed Wael', 11500, 'wael@gmail.com', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `manger_id` (`manger_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `med_id` (`med_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`manger_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`med_id`) REFERENCES `medicines` (`id`);

--
-- Constraints for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD CONSTRAINT `pharmacist_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
