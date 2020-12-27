-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2020 at 12:23 PM
-- Server version: 10.2.10-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realsur`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminid` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `plain_password` varchar(100) NOT NULL,
  `admin_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `email`, `password`, `plain_password`, `admin_type`) VALUES
(2, 'NS45121514', 'admin@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `show` int(11) NOT NULL DEFAULT 0,
  `in_front` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `banner_image` varchar(500) NOT NULL,
  `back_image` varchar(500) NOT NULL,
  `item_order` int(11) NOT NULL,
  `today` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `affilate_per` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category`, `show`, `in_front`, `image`, `banner_image`, `back_image`, `item_order`, `today`, `parent`, `affilate_per`) VALUES
(1, 'test', 1, 0, NULL, '', '', 0, 0, 0, 0),
(2, 'new test', 0, 0, NULL, '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `profileid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(255) NOT NULL,
  `profession` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `token_id` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `profileid`, `name`, `dob`, `city`, `state`, `profession`, `email`, `mobile_no`, `password`, `reg_date`, `user_type`, `address`, `image`, `token_id`) VALUES
(1, '1603447699', 'test', '1993-11-27', 'Ujjain', 'MP', 'testuser', 'user@gmail.com', '1215154848', '098f6bcd4621d373cade4e832627b4f6', '2020-10-23 15:38:19', 'register_user', 'test add', 'assets/user-images/5336-new-user1.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
