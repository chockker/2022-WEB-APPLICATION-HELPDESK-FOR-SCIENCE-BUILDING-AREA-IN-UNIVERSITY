-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2020 at 07:25 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_helpdesk`
--
CREATE DATABASE IF NOT EXISTS `project_helpdesk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project_helpdesk`;

-- --------------------------------------------------------

--
-- Table structure for table `case_report`
--

CREATE TABLE `case_report` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_type` varchar(50) NOT NULL,
  `c_town` varchar(10) NOT NULL,
  `c_floor` varchar(10) NOT NULL,
  `c_detail` text NOT NULL,
  `c_img` varchar(50) NOT NULL,
  `c_status` varchar(50) NOT NULL DEFAULT 1,
  `c_date_save` timestamp NOT NULL DEFAULT current_timestamp(),
  `c_ad_id` int(10) NOT NULL, COMMENT 'ไอดีแอดมินที่ทำการ'
  `c_ad_name` varchar(50) NOT NULL, COMMENT 'ชื่อแอดมินที่ทำการ'
  `c_case_update` datetime NOT NULL, COMMENT 'วว/ดด/ปป ที่มีการอัพเดต'
  `c_case_update_log` text NOT NULL, COMMENT 'รายละเอียดการอัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_report`
--
ALTER TABLE `case_report`
  ADD PRIMARY KEY (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_report`
--
ALTER TABLE `case_report`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_status` int(1) NOT NULL COMMENT '0=BAN, 1=Online'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `j_id` int(5) NOT NULL,
  `j_name` varchar(150) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`j_id`);
 
ALTER TABLE `job_type`
  MODIFY `j_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `fl_id` int(5) NOT NULL,
  `fl_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`fl_id`, `fl_no`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12');

-- --------------------------------------------------------

--
-- Table structure for table `floor_detail`
--

CREATE TABLE `floor_detail` (
  `fld_id` int(5) NOT NULL,
  `fld_name` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `fld_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `t_id` int(5) NOT NULL,
  `t_num` varchar(50) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_fl_amt` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`t_id`, `t_num`, `t_fl_amt`) VALUES
(1, '78', 10),
(2, '75', 12);

--
-- Indexes for dumped tables
--

ALTER TABLE `floor`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `floor_detail`
--
ALTER TABLE `floor_detail`
  ADD PRIMARY KEY (`fld_id`);

ALTER TABLE `town`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `floor`
  MODIFY `fl_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `floor_detail`
--
ALTER TABLE `floor_detail`
  MODIFY `fld_id` int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE `town`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;