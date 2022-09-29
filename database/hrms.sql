-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 09:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `full_name` varchar(15) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `role` varchar(15) CHARACTER SET latin1 NOT NULL,
  `mrtial_s` varchar(50) NOT NULL,
  `id_number` varchar(50) CHARACTER SET latin1 NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `e_phone` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `full_name`, `password`, `role`, `mrtial_s`, `id_number`, `address`, `email`, `phone`, `e_phone`, `image`, `status`) VALUES
(49, 'Zelalem Mee', 'MTIzMTIz', 'Tenant', '', '10', 'Bahir Dar', 'zelalem@gmail.com', '0963704498', '0963704498', 'c.jpg', 'Active'),
(50, 'Mengestu La', 'MTIzMTIz', 'Owner', '', '11', 'Bahir Dar', 'mengestu12@gmail.com', '0963704400', '0963704400', 'user.jpg', 'Active'),
(51, 'Dejene Diriba', 'MTIzNDEy', 'System Admin', '', '111', 'Bahir Dar', 'dejen@gmail.com', '0963704222', '0963704222', 'c.jpg', 'Active'),
(52, 'Jemal A', 'MTIzMTIz', 'Kebele Admin', '', '11', 'Bahir Dar', 'jemal@gmail.com', '0963704255', '0963704255', 'c.jpg', 'Active'),
(53, 'Dasiyibelow D', 'MTIzNDU2', 'Owner', '', 'bdu11', 'Bahir Dar', 'dase@gmail.com', '0963704211', '09637042000', 'user.jpg', 'Active'),
(54, 'Desalegn D', 'MTIzNDU2', 'Owner', '', '1123', 'BahirDar', 'dasu@gmail.com', '0930771467', '0930771466', 'u1.jfif', 'Active'),
(55, 'Kabbe w', 'MTIzNDU2', 'Tenant', '', '123', 'BahirDar', 'kabe@gmail.com', '0930771411', '0930771412', 'u3.jfif', 'Active'),
(56, 'ddd', 'MTIzNDU2Nzg=', 'Owner', '', '1123', 'BahirDar', 'fgghh.@com', '0012345612', '0930771466', 'c.jpg', 'Active'),
(57, 'Worku M', 'dzEyMzEyMzQ=', 'Tenant', '', '111', 'Bahir Dar', 'workuu@gmial.com', '0963704550', '0963704550', 'shop03.jpg', 'Active'),
(58, 'Alemayew G', 'YTEyMzEyMzQ=', 'Tenant', 'Marred', '101', 'Bahir Dar', 'alex12@gmail.com', '0911704200', '0911704200', 'shop03.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) CHARACTER SET latin1 NOT NULL,
  `message` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` varchar(10) CHARACTER SET latin1 NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'un_view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `sender`, `message`, `date`, `status`) VALUES
(3, 'mengestu123@gmail.com', 'hello this is mengestu how are you?', '20-02-22', 'View'),
(4, 'mengestu123@gmail.com', 'hello this is mengestu\r\n', '20-02-22', 'View'),
(6, 'hongkonge21@gmailcom', 'hello how are you?', '11-08-22', 'View'),
(8, 'hongkonge21@gmailcom', 'hello how are you?', '11-08-22', 'View');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `hous_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `no_room` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `hous_name`, `category`, `no_room`, `mobile`, `address`, `price`, `email`, `description`, `image`, `status`) VALUES
(7, 'Naki NO 2', 'Hotel', '100', '0963704400', 'Bahir Dar', '8000', 'mengestu12@gmail.com', 'for u', 'IMG_20220805_235137_532.jpg', 'free'),
(8, 'Nokia', 'Cafe', '23', '0963704211', 'Bahir Dar', '5000', 'dase@gmail.com', 'there is smart house', 'IMG_20220805_235141_831.jpg', 'free'),
(9, 'fffff', 'Shooping', '3', '0930771467', 'BahirDar', '28', 'dasu@gmail.com', 'retttrtrryryrryr', '1.jpg', 'free'),
(10, 'asty', 'Shooping', '12', '0963704400', 'Bahir Dar', '800', 'mengestu12@gmail.com', 'All', 'shop01.jpg', 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `notic`
--

CREATE TABLE `notic` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notic`
--

INSERT INTO `notic` (`id`, `subject`, `message`, `date`, `status`) VALUES
(8, 'meeting', 'to day they are meeting', '2012-08-22', ''),
(9, 'hello ', 'congratulation there', '2012-08-22', ''),
(10, 'hi', 'how are you', '2012-08-22', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amonut` varchar(50) NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `tenant_email` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status_ow` varchar(50) NOT NULL DEFAULT 'un_view',
  `status_te` varchar(20) NOT NULL DEFAULT 'un_view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amonut`, `owner_email`, `tenant_email`, `date`, `status_ow`, `status_te`) VALUES
(15, '4000', 'mengestu12@gmail.com', 'zelalem@gmail.com', '2022-08-12', 'un_view', 'un_view'),
(16, '5000', 'dase@gmail.com', 'zelalem@gmail.com', '2022-08-12', 'un_view', 'un_view'),
(17, '4500', 'dase@gmail.com', 'zelalem@gmail.com', '2022-08-12', 'un_view', 'un_view');

-- --------------------------------------------------------

--
-- Table structure for table `tele-birr-wallet`
--

CREATE TABLE `tele-birr-wallet` (
  `id` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tele-birr-wallet`
--

INSERT INTO `tele-birr-wallet` (`id`, `owner`, `phone`, `amount`) VALUES
(14, 'zelalem@gmail.com', '0963704498', 8000),
(15, 'mengestu12@gmail.com', '0963704400', 14000),
(16, 'dejen@gmail.com', '0963704222', 10000),
(17, 'jemal@gmail.com', '0963704255', 10000),
(18, 'dase@gmail.com', '0963704211', 70000),
(19, 'dasu@gmail.com', '0930771467', 10000),
(20, 'kabe@gmail.com', '0930771411', 10000),
(21, 'fgghh.@com', '0012345612', 10000),
(22, 'workuu@gmial.com', '0963704550', 17),
(23, 'alex12@gmail.com', '0911704200', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_requeset`
--

CREATE TABLE `tenant_requeset` (
  `id` int(11) NOT NULL,
  `tenant_emial` varchar(50) NOT NULL,
  `house_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Unapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_requeset`
--

INSERT INTO `tenant_requeset` (`id`, `tenant_emial`, `house_id`, `status`) VALUES
(11, 'zelalem@gmail.com', '8', 'Unapproved'),
(12, 'kabe@gmail.com', '9', 'Unapproved'),
(15, 'zelalem@gmail.com', '10', 'Accepted'),
(17, 'workuu@gmial.com', '7', 'Unapproved'),
(18, 'alex12@gmail.com', '7', 'Unapproved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`full_name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notic`
--
ALTER TABLE `notic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tele-birr-wallet`
--
ALTER TABLE `tele-birr-wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_requeset`
--
ALTER TABLE `tenant_requeset`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notic`
--
ALTER TABLE `notic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tele-birr-wallet`
--
ALTER TABLE `tele-birr-wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tenant_requeset`
--
ALTER TABLE `tenant_requeset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
