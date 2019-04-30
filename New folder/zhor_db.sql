-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 08:36 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zhor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `instalment`
--

CREATE TABLE `instalment` (
  `ins_id` int(11) NOT NULL,
  `inst_date` date NOT NULL,
  `member_id` int(9) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `per_inst` int(9) NOT NULL,
  `due_inst` int(9) NOT NULL,
  `area` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instalment`
--

INSERT INTO `instalment` (`ins_id`, `inst_date`, `member_id`, `member_name`, `per_inst`, `due_inst`, `area`, `created_at`, `update_at`) VALUES
(1, '2018-07-31', 2, 'Murad', 5000, -5000, 'mir-bazar', '2018-07-31 17:54:53', '0000-00-00 00:00:00'),
(2, '2018-08-01', 2, 'Murad', 5000, 0, 'mir-bazar', '2018-07-31 17:58:09', '0000-00-00 00:00:00'),
(3, '2018-08-01', 2, 'Murad', 5000, -5000, 'mir-bazar', '2018-07-31 18:02:49', '0000-00-00 00:00:00'),
(4, '2018-08-01', 2, 'Murad', 100, 0, '', '2018-07-31 18:11:29', '0000-00-00 00:00:00'),
(5, '2018-08-02', 2, 'Murad', 1000, 99000, 'mir-bazar', '2018-08-02 03:43:44', '0000-00-00 00:00:00'),
(6, '2018-08-01', 10, 'hasan', 5000, 45000, 'mir-bazar', '2018-08-02 04:53:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(9) NOT NULL,
  `member_id` int(9) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `amount` int(9) NOT NULL,
  `loan_date` date NOT NULL,
  `ref_member_id` int(9) NOT NULL,
  `national_id` bigint(17) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `status` varchar(255) DEFAULT '1' COMMENT '0=Better,1=Good',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `member_id`, `member_name`, `amount`, `loan_date`, `ref_member_id`, `national_id`, `sex`, `area`, `status`, `created_at`, `update_at`) VALUES
(2, 10, 'fariha', 50000, '2018-07-24', 19, 12365478963214569, 'female', 'mazu-khan', 'Good', '2018-07-17 06:40:09', NULL),
(3, 20, 'Kamal', 100000, '2018-07-17', 2, 32165498778963214, 'male', '', 'Good', '2018-07-17 07:05:18', NULL),
(10, 6, 'hasntt', 50001, '2018-07-20', 2, 32106540023144566, 'male', 'mir-bazar', 'Good', '2018-07-21 12:25:24', NULL),
(11, 2, 'Murad', 100000, '2018-07-24', 20, 32103210654789633, 'male', 'mir-bazar', 'Better', '2018-07-23 11:50:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_deposit`
--

CREATE TABLE `user_deposit` (
  `deposit_id` int(9) NOT NULL,
  `dep_date` date NOT NULL,
  `member_id` int(9) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `dep_amount` int(9) NOT NULL,
  `dep_total` int(9) NOT NULL,
  `area` varchar(55) NOT NULL,
  `dep_status` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_deposit`
--

INSERT INTO `user_deposit` (`deposit_id`, `dep_date`, `member_id`, `member_name`, `dep_amount`, `dep_total`, `area`, `dep_status`, `created_at`, `update_at`) VALUES
(6, '0000-00-00', 2, 'Murad', 5000, 5000, 'mir-bazar ', 1, '2018-07-30 16:55:30', '2018-07-30 16:55:30'),
(7, '0000-00-00', 2, 'Murad', 3000, 8000, 'mir-bazar ', 1, '2018-07-30 16:56:49', '2018-07-30 16:56:49'),
(8, '2018-07-30', 6, 'hasan-2', 1000, 1000, 'mir-bazar ', 1, '2018-07-30 17:01:11', '2018-07-30 17:01:11'),
(9, '2018-07-31', 23, 'Murad', 100, 100, 'mir-bazar ', 1, '2018-07-30 17:30:32', '2018-07-30 17:30:32'),
(10, '2018-08-01', 23, 'jahanara', 200, 300, 'mir-bazar ', 1, '2018-07-30 17:31:00', '2018-07-30 17:31:00'),
(11, '0000-00-00', 2, 'hasan', 200, 8200, 'mir-bazar ', 1, '2018-07-30 17:43:56', '2018-07-30 17:43:56'),
(12, '0000-00-00', 2, 'Murad', 400, 8600, 'mir-bazar ', 1, '2018-07-30 17:45:15', '2018-07-30 17:45:15'),
(13, '0000-00-00', 2, 'Murad', 200, 8800, 'mir-bazar ', 1, '2018-07-30 17:49:16', '2018-07-30 17:49:16'),
(14, '0000-00-00', 10, 'hasan', 1000, 1000, 'mir-bazar ', 1, '2018-07-30 17:52:03', '2018-07-30 17:52:03'),
(15, '2018-07-31', 12, 'Nasima', 20000, 20000, 'mazu-khan ', 1, '2018-07-31 03:53:32', '2018-07-31 03:53:32'),
(16, '2018-07-10', 6, 'hasan-2', 50000, 51000, 'mazu-khan ', 1, '2018-07-31 03:54:46', '2018-07-31 03:54:46'),
(17, '2018-07-25', 6, 'hasan-2', 200, 51200, 'mazu-khan ', 1, '2018-07-31 03:55:29', '2018-07-31 03:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `u_id` int(99) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `member_id` int(99) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `fa_name` varchar(255) NOT NULL,
  `mo_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `da_birth` date NOT NULL,
  `n_id` int(9) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`u_id`, `photo`, `member_id`, `member_name`, `fa_name`, `mo_name`, `address`, `email`, `phone_num`, `da_birth`, `n_id`, `sex`, `area`, `created_at`, `update_at`) VALUES
(1, '1531154801_53737_searchicon.png', 9, 'Anwar', 'Mr.An', 'Mrs.Ni', 'Mirer Bazar,pubail,Gazipur', 'fakrul@gmail.com', '1816044944', '2018-07-09', 123456789, 'male', 'mir-bazar', '2018-07-09 16:46:41', '2018-07-09 16:46:41'),
(5, '1531156225_77300_play.png', 10, 'hasan', 'mr.hasan', 'mrs.khaonln', 'gggggggg', 'fakrul@gmail.com', '1789060060', '2018-07-30', 123456789, 'male', 'mir-bazar', '2018-07-09 17:10:25', '2018-07-09 17:10:25'),
(6, '1531156713_39289_topright.png', 6, 'hasan-2', 'mr.hasan', 'mrs.khaonln', 'aaaaa', 'fakrul@gmail.com', '1789060060', '2018-07-30', 123456789, 'male', 'mir-bazar', '2018-07-09 17:18:33', '2018-07-09 17:18:33'),
(7, '1531190103_59276_bird.gif', 20, 'Kamal', 'Mr.kam', 'Mrs.K', 'afafafkhf', 'fakrulhasan@gmail.com', '1816044944', '2018-07-17', 123456, 'male', 'mir-bazar', '2018-07-10 02:35:03', '2018-07-10 02:35:03'),
(9, '1531217138_62276_Screenshot_2014-11-30-14-56-46.png', 2, 'Murad', 'Mozmal', 'Moho', 'Dhaka', 'murad@gmail.com', '1811799646', '2018-07-24', 2147483647, 'male', 'mir-bazar', '2018-07-10 10:05:38', '2018-07-10 10:05:38'),
(10, '1532345064_87174_Screenshot_2014-11-30-14-56-46.png', 19, 'Nazma', 'Mr.ha', 'Mrs.shela', 'gak', 'she@gmail.com', '1677464249', '2018-07-10', 2147483647, 'male', 'mazu-khan', '2018-07-10 12:35:43', '2018-07-10 12:35:43'),
(11, '1532345374_38770_myphoto.png', 2, 'Nirzhor', 'Mr :nirr', 'laila', 'fsda', 'tushi1@gmail.com', '01816044949', '2018-07-31', 2147483647, 'male', 'mazu-khan', '2018-07-11 17:19:36', '2018-07-11 17:19:36'),
(12, '1532149451_93944_Screenshot_2014-11-30-14-56-46.png', 23, 'jahanara', 'Hasan', 'Moho', 'konolopopswql il;, #2op4 \r\nfsda\r\ngazipur', 'tushi012@gmail.com', '01816544944', '2018-07-31', 2147483647, 'male', 'mazu-khan', '2018-07-21 05:04:11', '2018-07-21 05:04:11'),
(13, '1533009184_16240_SLUB-SMOKE-FRONT.forweb_1024x1024.jpg', 12, 'Nasima', 'Nasimas', 'Masuma', 'Majukhan', 'nasima@gmail.com', '01914971263', '2018-07-10', 2147483647, 'female', 'mazu-khan', '2018-07-31 03:53:04', '2018-07-31 03:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_withdraw`
--

CREATE TABLE `user_withdraw` (
  `withdraw_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `withdraw_amount` int(9) NOT NULL,
  `withdraw_total` int(9) NOT NULL,
  `area` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_withdraw`
--

INSERT INTO `user_withdraw` (`withdraw_id`, `member_id`, `member_name`, `withdraw_amount`, `withdraw_total`, `area`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Murad', 200, 200, 'mir-bazar ', 1, '2018-07-30 23:50:21', NULL),
(2, 2, 'Murad', 400, 600, 'mir-bazar ', 1, '2018-07-30 23:50:44', NULL),
(3, 10, 'hasan', 1000, 1000, 'mir-bazar ', 1, '2018-07-30 23:52:37', NULL),
(4, 6, 'hasan-2', 20000, 20000, 'mazu-khan ', 1, '2018-07-31 09:56:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instalment`
--
ALTER TABLE `instalment`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `user_deposit`
--
ALTER TABLE `user_deposit`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_withdraw`
--
ALTER TABLE `user_withdraw`
  ADD PRIMARY KEY (`withdraw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instalment`
--
ALTER TABLE `instalment`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_deposit`
--
ALTER TABLE `user_deposit`
  MODIFY `deposit_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `u_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_withdraw`
--
ALTER TABLE `user_withdraw`
  MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
