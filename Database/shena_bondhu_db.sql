-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2023 at 05:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shena_bondhu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminEmail` varchar(254) NOT NULL,
  `adminPassword` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminEmail`, `adminPassword`) VALUES
(1, 'mail.rownok@gmail.com', '76bbaf8c1cdd3d23b27d49686437d0d3');

-- --------------------------------------------------------

--
-- Table structure for table `bookappointments`
--

CREATE TABLE `bookappointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` text DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `transaction_number` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookappointments`
--

INSERT INTO `bookappointments` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `date`, `time`, `message`, `phone_number`, `transaction_number`, `status`, `created_at`) VALUES
(2, 6, 'Arman', 'mail.rownok@gmail.com', '01749475566', 'Dhaka', '2023-09-23', '18:53:00', 'hi', '01749475566', 'OIGHIUG41564', 'Approved', '2023-09-22 10:52:05'),
(3, 5, 'Ripon', 'mail.rownok@gmail.com', '01601424748', 'Dhaka, Bangladesh', '2023-09-30', '10:30:00', 'Hi I need an Appointment', '01749475566', 'DIU654654', 'Approved', '2023-09-28 14:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(34, 'Alacot Max Eye Drop', '350.00', 'alacot-max-eye-drop-075ml-1-pc.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_type` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `message`, `sender_type`, `timestamp`, `sender_id`) VALUES
(50, 'hello', 'hospital', '2023-09-30 07:47:02', 1),
(51, 'ki', 'hospital', '2023-09-30 07:49:28', 1),
(52, 'hi', 'hospital', '2023-09-30 07:53:25', 1),
(53, 'hello', 'hospital', '2023-09-30 07:55:00', 1),
(54, 'ho', 'hospital', '2023-09-30 07:55:09', 1),
(55, 'hi', 'parent', '2023-09-30 04:26:33', 5),
(56, 'hi', 'parent', '2023-09-30 04:27:36', 5),
(57, 'hello', 'parent', '2023-09-30 04:28:17', 5),
(58, 'hello', 'hospital', '2023-09-30 08:28:44', 1),
(59, 'hello', 'hospital', '2023-09-30 08:29:14', 1),
(60, 'hello', 'parent', '2023-09-30 04:33:07', 5),
(61, 'hello', 'parent', '2023-09-30 04:33:26', 5),
(62, 'ho', 'parent', '2023-09-30 04:33:30', 5),
(63, 'hi', 'parent', '2023-09-30 05:04:31', 5),
(64, 'hello', 'parent', '2023-09-30 05:04:36', 5),
(65, 'ki  kos ', 'hospital', '2023-09-30 09:04:56', 1),
(66, 'hi', 'hospital', '2023-09-30 09:12:19', 1),
(67, 'hi', 'hospital', '2023-09-30 09:13:48', 1),
(68, 'hi', 'hospital', '2023-09-30 09:14:40', 1),
(69, 'hi', 'hospital', '2023-09-30 09:15:33', 1),
(70, 'hello', 'hospital', '2023-09-30 09:15:37', 1),
(71, 'hello', 'hospital', '2023-09-30 09:17:53', 1),
(72, 'ki', 'hospital', '2023-09-30 09:17:56', 1),
(73, 'na kisuna', 'parent', '2023-09-30 05:22:30', 5),
(74, 'na kisuna', 'parent', '2023-09-30 05:23:25', 5),
(75, 'na kisuna', 'parent', '2023-09-30 05:24:49', 5),
(76, 'hi', 'parent', '2023-09-30 05:26:10', 6),
(77, 'ki kos bal', 'hospital', '2023-09-30 09:26:55', 3),
(78, 'hi', 'hospital', '2023-10-12 06:58:09', 1),
(79, 'ok', 'hospital', '2023-10-12 06:59:38', 1),
(80, 'ok', 'parent', '2023-10-12 03:00:03', 6),
(81, 'Accha', 'parent', '2023-10-12 03:01:11', 6),
(82, 'hi', 'hospital', '2023-10-15 05:17:11', 1),
(83, 'Hi ', 'hospital', '2023-10-15 14:47:27', 1),
(84, 'Hi ', 'parent', '2023-10-15 10:47:43', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bkashNumber` varchar(256) NOT NULL,
  `tnxNumber` varchar(256) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` decimal(30,0) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `bkashNumber`, `tnxNumber`, `product_name`, `quantity`, `total_price`, `order_date`, `status`) VALUES
(5, 5, 'Rownok Ripon', '01749475566', 'mail.rownok@gmail.com', 'Kalabagan,Dhaka,Bangladesh', '', '', 'Glow', 1, '50', '2023-09-14 11:14:07', 'confirmed'),
(6, 6, 'Al Almin Hossain', '01601424748', 'alamin@gmail.com', 'Hajaribag Dhaka', '', '', 'Hand Wash', 1, '100', '2023-09-14 11:21:17', 'on_the_way'),
(7, 5, 'Joy', '01701424748', 'mail.rownok@gmail.com', 'demo', '', '', 'Hand Wash', 6, '600', '2023-09-16 17:12:11', 'done'),
(8, 6, 'Rakib', '01749475566', 'alamin@gmail.com', 'dhaka', '', '', 'medicine1', 1, '10', '2023-09-22 10:48:52', 'Pending'),
(9, 6, 'Md Abraham ', '01712211221', 'abraham21@gmail.com', 'Dhaka', '01712211221', 'DTHRTHJRTH6546', 'Shampoo', 1, '10', '2023-09-22 15:03:45', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(16, 'Banana Chompa', 'Banana Chompa', '150.00', 'banana-chompa-ready-to-eat-4-pcs.webp', '1'),
(17, 'Alacot Max Eye Drop', 'Alacot Max Eye Drop', '350.00', 'alacot-max-eye-drop-075ml-1-pc.webp', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointments`
--

CREATE TABLE `tbl_appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `hospitalName` varchar(255) NOT NULL,
  `visit` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointments`
--

INSERT INTO `tbl_appointments` (`id`, `name`, `department`, `hospitalName`, `visit`, `image`, `created_at`, `status`) VALUES
(12, 'Dr. Md Ali Hossain', 'Neurology', 'Dhaka Medical College & Hospital', '500', 'doctors/360_F_260040863_fYxB1SnrzgJ9AOkcT0hoe7IEFtsPiHAD.jpg', '2023-09-22 14:51:18', 'Available'),
(13, 'Dr. Mrs Laila', 'General surgery', 'Anwar Khan Modern Hospital', '1000', 'doctors/smiling-asian-woman-physician-white-coat_9083-2472.jpg', '2023-09-22 14:52:28', 'Available'),
(14, 'Dr. Jenifar', 'Ophthalmology', 'BRB Hospital LTD', '1200', 'doctors/smiling-asian-woman-physician-white-coat_9083-2472.jpg', '2023-09-22 14:52:52', 'Available'),
(15, 'Dr. Abraham ', 'homiopathic', 'Labaid Diagnostic Centre', '1500', 'doctors/istockphoto-1201439096-170667a.jpg', '2023-09-22 14:53:20', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_army`
--

CREATE TABLE `tbl_army` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `army_id` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_army`
--

INSERT INTO `tbl_army` (`id`, `name`, `army_id`, `phone`, `email`, `password`, `profile_image`) VALUES
(5, 'Rownok Ripon', 'M-987654321', '01749475566', 'mail.rownok@gmail.com', '76bbaf8c1cdd3d23b27d49686437d0d3', ''),
(6, 'Al Almin Hossain', 'M-321456987', '01750302654', 'alamin@gmail.com', 'cb601893c1269f7d7b8c2947158ca194', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`) VALUES
(1, 'Grocery'),
(2, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital`
--

CREATE TABLE `tbl_hospital` (
  `id` int(11) NOT NULL,
  `hospitalName` varchar(254) NOT NULL,
  `hospitalEmail` varchar(254) NOT NULL,
  `hospitalPhone` varchar(254) NOT NULL,
  `hospitalAddress` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hospital`
--

INSERT INTO `tbl_hospital` (`id`, `hospitalName`, `hospitalEmail`, `hospitalPhone`, `hospitalAddress`, `password`) VALUES
(1, 'Anwar Khan', 'ahmedfaysal0176@gmail.com', '+8801328298863', 'Gauringor school, sodor lakshmipur ,', '663a7901115b60098359bacc4f70ca11'),
(3, 'Bardem ', 'dfgf@gmail.com', '01745845120', 'dhaka', 'cc67d6f1093a428ba1fd1af8812b5bf6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookappointments`
--
ALTER TABLE `bookappointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_army`
--
ALTER TABLE `tbl_army`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookappointments`
--
ALTER TABLE `bookappointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_army`
--
ALTER TABLE `tbl_army`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
