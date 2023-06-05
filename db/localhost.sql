-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 12:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_status` int(1) NOT NULL COMMENT '0=ช่าง,1=Admin,2=ผู้จัดการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `a_username`, `a_password`, `a_name`, `a_status`) VALUES
(1, 'admin01', 'ab874467a7d1ff5fc71a4ade87dc0e098b458aae', 'Admin01', 1),
(2, 'admin02', '011c945f30ce2cbafc452f39840f025693339c42', 'Technician01', 0),
(3, 'admin03', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'Manager01', 2),
(4, 'admin04', '92f2fd99879b0c2466ab8648afb63c49032379c1', 'Technician02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `case_report`
--

CREATE TABLE `case_report` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_type` varchar(50) NOT NULL,
  `c_town` varchar(10) NOT NULL,
  `c_room` varchar(50) NOT NULL,
  `c_item` varchar(50) NOT NULL,
  `c_detail` text NOT NULL,
  `c_img` varchar(50) NOT NULL,
  `c_status` varchar(50) NOT NULL DEFAULT '1',
  `c_date_save` timestamp NOT NULL DEFAULT current_timestamp(),
  `c_ad_id` int(10) NOT NULL COMMENT 'ไอดีแอดมินที่ทำการ',
  `c_ad_name` varchar(50) NOT NULL COMMENT 'ชื่อแอดมินที่ทำการ',
  `c_case_update` datetime DEFAULT NULL COMMENT 'วว/ดด/ปป ที่มีการอัพเดต',
  `c_case_update_log` text NOT NULL COMMENT 'รายละเอียดการอัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_report`
--

INSERT INTO `case_report` (`c_id`, `c_name`, `c_type`, `c_town`, `c_room`, `c_item`, `c_detail`, `c_img`, `c_status`, `c_date_save`, `c_ad_id`, `c_ad_name`, `c_case_update`, `c_case_update_log`) VALUES
(1, 'ccccccccc', 'ไฟฟ้า', '78', '78-101', 'L01', 'ไฟเสียครับ', '0c49f80b8a8a3b2d5fac7bc6ebbca4d7.png', '2', '2021-12-01 16:52:02', 1, 'Admin01', '2022-11-30 18:18:27', 'test'),
(2, 'fai', 'ไฟฟ้า', '78', '78-101', 'A06', 'aaaaaaa', '38e1c1141686353933a719e0de526cf3.png', '4', '2022-10-10 17:57:48', 1, 'Admin01', '2022-11-30 18:18:12', 'เสร็จ'),
(4, 'tester', 'ไฟฟ้า', '78', '78-101', 'L01', 'หลอดไฟขาด', 'd19d40d7d09d0454065cf8f321ca78f1.png', '3', '2022-11-23 02:32:30', 3, 'Admin_03', '2022-11-26 22:05:19', 'เสร็จ'),
(6, 'boonparit', 'ไฟฟ้า', '78', '78-101', 'A06', 'แอร์ไม่เย็น', 'bb009d874789039a6cd7dbf1b6b5191c.jpg', '1', '2022-11-27 15:58:37', 0, '', NULL, ''),
(7, 'boonparit', 'ไฟฟ้า', '78', '78-101', 'L01', 'หลอดไฟเสีย', '016ce5d50c7afd98e3ec9caf098ab197.jpg', '1', '2022-11-28 13:44:51', 0, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `case_work`
--

CREATE TABLE `case_work` (
  `cw_id` int(10) NOT NULL,
  `cw_as_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_work`
--

INSERT INTO `case_work` (`cw_id`, `cw_as_name`) VALUES
(1, 'วันชัย ชัยยะ'),
(2, 'สมศักดิ์ ขำปู่'),
(4, 'วันชัย ชัยยะ');

-- --------------------------------------------------------

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

--
-- Dumping data for table `floor_detail`
--

INSERT INTO `floor_detail` (`fld_id`, `fld_name`, `floor`, `town`, `fld_img`) VALUES
(1, '78-02', '2', '78', '78-02-Model_page-00011.jpg'),
(2, '75-01', '1', '75', ''),
(3, '78-03', '3', '78', '78-03-แก้ไข-Model_page-0001.jpg'),
(4, '78-04', '4', '78', '78-04-Model_page-0001.jpg'),
(5, '78-05', '5', '78', '78-05-Model_page-0001.jpg'),
(6, '78-06', '6', '78', '78-06-Model_page-0001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_id` int(50) NOT NULL,
  `i_codename` varchar(100) NOT NULL,
  `i_name` varchar(50) NOT NULL,
  `i_type` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `i_address` varchar(50) NOT NULL,
  `i_remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `i_codename`, `i_name`, `i_type`, `town`, `i_address`, `i_remark`) VALUES
(1, 'L01', 'หลอดไฟ1', 'ไฟฟ้า', '78', '78-101', NULL),
(2, 'L02', 'หลอดไฟ2', 'ไฟฟ้า', '78', '78-101', NULL),
(3, 'A01', 'แอร์1', 'ไฟฟ้า', '78', '78-202', NULL),
(4, 'A06', 'แอร์6', 'ไฟฟ้า', '78', '78-101', NULL),
(5, 'A16', 'แอร์6', 'ไฟฟ้า', '75', '75-215', NULL),
(6, 'A02', 'แอร์2', 'ไฟฟ้า', '78', '78-202', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `j_id` int(5) NOT NULL,
  `j_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`j_id`, `j_name`) VALUES
(1, 'ไฟฟ้า'),
(2, 'ประปา'),
(3, 'อุปกรณ์');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(10) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_type` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `r_name`, `r_type`, `floor`, `town`) VALUES
(1, '78-101', 'ห้องประชุม', '1', '78'),
(2, '75-215', 'ห้องเรียน', '2', '75'),
(3, '78-202', 'ห้องเรียน', '2', '78'),
(4, '75-110', 'ห้องเรียน', '1', '75'),
(5, '78-303', 'ห้องเรียน', '3', '78'),
(6, '78-404', 'ห้องเรียน', '4', '78'),
(7, '78-215', 'ห้องนํ้าชาย', '2', '78'),
(9, '78-211', 'ห้องเรียน', '2', '78');

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

INSERT INTO `town` (`t_id`, `t_num`, `t_name`, `t_fl_amt`) VALUES
(1, '78', 'ตึกคณะวิทยาศาสตร์ประยุกต์', 10),
(2, '75', 'ตึกคณะวิทยาศาสตร์ประยุกต์', 12),
(3, '72', 'อาคารยิมเนเซียม', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_report`
--
ALTER TABLE `case_report`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `case_work`
--
ALTER TABLE `case_work`
  ADD PRIMARY KEY (`cw_id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `floor_detail`
--
ALTER TABLE `floor_detail`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_report`
--
ALTER TABLE `case_report`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `fl_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `floor_detail`
--
ALTER TABLE `floor_detail`
  MODIFY `fld_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `j_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
