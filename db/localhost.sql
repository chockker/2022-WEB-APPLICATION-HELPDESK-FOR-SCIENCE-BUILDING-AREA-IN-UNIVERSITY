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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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