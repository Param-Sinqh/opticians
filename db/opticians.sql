-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 10:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opticians`
--

-- --------------------------------------------------------

--
-- Table structure for table `busers`
--

CREATE TABLE `busers` (
  `id` int(11) NOT NULL,
  `comp_name` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `un` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `busers`
--

INSERT INTO `busers` (`id`, `comp_name`, `email`, `phone`, `address`, `un`, `pw`) VALUES
(1, 'Administrator', NULL, NULL, NULL, 'admin', 'gracious'),
(2, 'Preet Opticians', NULL, NULL, NULL, 'preet', 'p123');

-- --------------------------------------------------------

--
-- Table structure for table `cust_2`
--

CREATE TABLE `cust_2` (
  `cust_id` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dv_right_sph` varchar(10) NOT NULL,
  `dv_right_cyl` varchar(10) NOT NULL,
  `dv_right_axis` varchar(10) NOT NULL,
  `dv_right_prism` varchar(10) DEFAULT NULL,
  `dv_right_add` varchar(10) DEFAULT NULL,
  `dv_left_sph` varchar(10) NOT NULL,
  `dv_left_cyl` varchar(10) NOT NULL,
  `dv_left_axis` varchar(10) NOT NULL,
  `dv_left_prism` varchar(10) DEFAULT NULL,
  `dv_left_add` varchar(10) DEFAULT NULL,
  `dv_va` varchar(10) NOT NULL,
  `dv_pd` varchar(10) DEFAULT NULL,
  `nv_right_sph` varchar(10) NOT NULL,
  `nv_right_cyl` varchar(10) NOT NULL,
  `nv_right_axis` varchar(10) NOT NULL,
  `nv_right_prism` varchar(10) DEFAULT NULL,
  `nv_right_add` varchar(10) DEFAULT NULL,
  `nv_left_sph` varchar(10) NOT NULL,
  `nv_left_cyl` varchar(10) NOT NULL,
  `nv_left_axis` varchar(10) NOT NULL,
  `nv_left_prism` varchar(10) DEFAULT NULL,
  `nv_left_add` varchar(10) DEFAULT NULL,
  `nv_va` varchar(10) NOT NULL,
  `nv_pd` varchar(10) DEFAULT NULL,
  `bc` varchar(10) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cust_2`
--

INSERT INTO `cust_2` (`cust_id`, `cname`, `email`, `address`, `pin`, `phone`, `date_added`, `date_updated`, `dv_right_sph`, `dv_right_cyl`, `dv_right_axis`, `dv_right_prism`, `dv_right_add`, `dv_left_sph`, `dv_left_cyl`, `dv_left_axis`, `dv_left_prism`, `dv_left_add`, `dv_va`, `dv_pd`, `nv_right_sph`, `nv_right_cyl`, `nv_right_axis`, `nv_right_prism`, `nv_right_add`, `nv_left_sph`, `nv_left_cyl`, `nv_left_axis`, `nv_left_prism`, `nv_left_add`, `nv_va`, `nv_pd`, `bc`, `dia`) VALUES
(1, 'Bhupinder Singh S/O Balwant Singh', '', 'Cheema', '', '9464879699', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '-3.5', '-2.0', '1', '-', '-', '-3.5', '-2.0', '1', '-', '-', '3', '-', '+1.75', '+2', '1', '-', '-', '+2.25', '+2', '1', '-', '-', '3', '-', '-', '-'),
(3, 'Akashdeep Singh', '', 'Cheema', '', '8769847854', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '1.50', '0', '0', '-', '-', '1.50', '0', '0', '-', '-', '1.5', '-', '0', '0', '0', '-', '-', '0', '0', '0', '-', '-', '1.5', '-', '-', '-'),
(4, 'Arshdeep Singh', '', 'Cheema', '', '8999877711', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '1', '0', '0', NULL, NULL, '1', '0', '0', NULL, NULL, '2', NULL, '0', '0', '0', NULL, NULL, '0', '0', '0', NULL, NULL, '2', NULL, NULL, NULL),
(5, 'John Doe', 'john.doe@example.com', '123 Main St', '1234', '555-1234', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+1.25', '-0.75', '90', '', '+2.00', '+1.00', '-1.50', '180', '', '+2.25', '20/20', '60', '+1.50', '-0.50', '75', '', '+1.75', '+1.25', '-1.00', '105', '', '+1.75', '20/20', '65', NULL, NULL),
(6, 'Jane Smith', 'jane.smith@example.com', '456 Oak St', '5678', '555-5678', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+0.75', '-1.25', '45', '', '+1.75', '+0.50', '-1.75', '135', '', '+1.75', '20/20', '62', '+1.25', '-0.75', '90', '', '+2.00', '+0.75', '-1.00', '120', '', '+1.50', '20/20', '63', NULL, NULL),
(7, 'Michael Johnson', 'michael.johnson@example.com', '789 Elm St', '9876', '555-9876', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '-0.50', '-0.25', '30', '', '+1.25', '-0.75', '-0.50', '150', '', '+1.50', '20/20', '64', '-0.25', '-0.75', '135', '', '+1.25', '-0.50', '-0.75', '45', '', '+1.25', '20/20', '62', NULL, NULL),
(8, 'Emily Williams', 'emily.williams@example.com', '321 Maple St', '4321', '555-4321', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+1.00', '-1.50', '75', '', '+2.00', '+0.75', '-1.25', '105', '', '+2.25', '20/20', '63', '+1.25', '-1.00', '90', '', '+1.75', '+0.50', '-1.00', '75', '', '+1.50', '20/20', '62', NULL, NULL),
(9, 'David Brown', 'david.brown@example.com', '246 Pine St', '2468', '555-2468', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+0.50', '-0.50', '60', '', '+1.50', '+0.25', '-0.75', '120', '', '+1.75', '20/20', '61', '+0.75', '-0.25', '105', '', '+1.50', '+0.25', '-0.50', '30', '', '+1.50', '20/20', '60', NULL, NULL),
(10, 'Sarah Taylor', 'sarah.taylor@example.com', '357 Walnut St', '1357', '555-1357', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+1.25', '-1.00', '45', '', '+2.25', '+1.00', '-1.50', '135', '', '+2.50', '20/20', '62', '+1.50', '-0.75', '90', '', '+2.00', '+1.25', '-1.25', '105', '', '+2.00', '20/20', '63', NULL, NULL),
(11, 'Christopher Lee', 'christopher.lee@example.com', '698 Cherry St', '3698', '555-3698', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+0.75', '-1.25', '30', '', '+1.75', '+0.50', '-1.75', '150', '', '+1.75', '20/20', '64', '+0.25', '-0.75', '135', '', '+1.25', '+0.50', '-0.75', '45', '', '+1.25', '20/20', '62', NULL, NULL),
(12, 'Jessica Martinez', 'jessica.martinez@example.com', '852 Pineapple St', '7852', '555-7852', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+1.00', '-1.50', '75', '', '+2.00', '+0.75', '-1.25', '105', '', '+2.25', '20/20', '63', '+1.25', '-1.00', '90', '', '+1.75', '+0.50', '-1.00', '75', '', '+1.50', '20/20', '62', NULL, NULL),
(13, 'Daniel Rodriguez', 'daniel.rodriguez@example.com', '593 Apple St', '1593', '555-1593', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+0.50', '-0.50', '60', '', '+1.50', '+0.25', '-0.75', '120', '', '+1.75', '20/20', '61', '+0.75', '-0.25', '105', '', '+1.50', '+0.25', '-0.50', '30', '', '+1.50', '20/20', '60', NULL, NULL),
(14, 'Olivia Wilson', 'olivia.wilson@example.com', '426 Orange St', '7426', '555-7426', '2024-10-19 01:30:39', '2024-10-19 01:30:39', '+1.25', '-1.00', '45', '', '+2.25', '+1.00', '-1.50', '135', '', '+2.50', '20/20', '62', '+1.50', '-0.75', '90', '', '+2.00', '+1.25', '-1.25', '105', '', '+2.00', '20/20', '63', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busers`
--
ALTER TABLE `busers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_2`
--
ALTER TABLE `cust_2`
  ADD PRIMARY KEY (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busers`
--
ALTER TABLE `busers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cust_2`
--
ALTER TABLE `cust_2`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
