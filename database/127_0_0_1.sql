-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2019 at 10:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--
CREATE DATABASE IF NOT EXISTS `pharma` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pharma`;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(225) NOT NULL,
  `area` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `thana` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area`, `district`, `thana`) VALUES
(1, 'area one', 'rajshahi', 'kazla'),
(2, 'area two', 'jessore', 'avaynagar');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(225) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `branch_no` int(225) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `favicon` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch_has_area`
--

CREATE TABLE `branch_has_area` (
  `id` int(225) NOT NULL,
  `branch_id` int(225) DEFAULT NULL,
  `area_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_has_area`
--

CREATE TABLE `employee_has_area` (
  `id` int(225) NOT NULL,
  `emp_id` varchar(225) DEFAULT NULL,
  `area_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_has_area`
--

INSERT INTO `employee_has_area` (`id`, `emp_id`, `area_id`) VALUES
(70, 'EMP-57030528', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_academic_info`
--

CREATE TABLE `emp_academic_info` (
  `id` int(225) NOT NULL,
  `emp_id` varchar(225) DEFAULT NULL,
  `exam_name` varchar(225) DEFAULT NULL,
  `institute` varchar(225) DEFAULT NULL,
  `board` varchar(225) DEFAULT NULL,
  `groupp` varchar(225) DEFAULT NULL,
  `result` varchar(225) DEFAULT NULL,
  `passing_year` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_academic_info`
--

INSERT INTO `emp_academic_info` (`id`, `emp_id`, `exam_name`, `institute`, `board`, `groupp`, `result`, `passing_year`) VALUES
(40, 'EMP-57030528', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_account_info`
--

CREATE TABLE `emp_account_info` (
  `id` int(225) NOT NULL,
  `emp_id` varchar(225) DEFAULT NULL,
  `acc_name` varchar(225) DEFAULT NULL,
  `bank_name` varchar(225) DEFAULT NULL,
  `branch_name` varchar(225) DEFAULT NULL,
  `acc_number` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_account_info`
--

INSERT INTO `emp_account_info` (`id`, `emp_id`, `acc_name`, `bank_name`, `branch_name`, `acc_number`) VALUES
(40, 'EMP-57030528', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_basic_info`
--

CREATE TABLE `emp_basic_info` (
  `emp_id` varchar(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `father` varchar(225) DEFAULT NULL,
  `mother` varchar(225) DEFAULT NULL,
  `spouse` varchar(225) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `gender` varchar(225) DEFAULT NULL,
  `nid` varchar(225) DEFAULT NULL,
  `birth_cer_no` varchar(225) DEFAULT NULL,
  `natioinality` varchar(225) DEFAULT NULL,
  `religion` varchar(225) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_basic_info`
--

INSERT INTO `emp_basic_info` (`emp_id`, `name`, `father`, `mother`, `spouse`, `date_of_birth`, `gender`, `nid`, `birth_cer_no`, `natioinality`, `religion`, `photo`) VALUES
('EMP-57030528', '', '', '', '', '', 'male', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_contact_info`
--

CREATE TABLE `emp_contact_info` (
  `emp_id` varchar(225) NOT NULL,
  `pre_house` varchar(225) DEFAULT NULL,
  `pre_road` varchar(225) DEFAULT NULL,
  `pre_village` varchar(225) DEFAULT NULL,
  `pre_post` varchar(225) DEFAULT NULL,
  `pre_police_station` varchar(225) DEFAULT NULL,
  `pre_district` varchar(225) DEFAULT NULL,
  `pre_post_code` varchar(225) DEFAULT NULL,
  `per_house` varchar(225) DEFAULT NULL,
  `per_road` varchar(225) DEFAULT NULL,
  `per_village` varchar(225) DEFAULT NULL,
  `per_post` varchar(225) DEFAULT NULL,
  `per_police_station` varchar(225) DEFAULT NULL,
  `per_district` varchar(225) DEFAULT NULL,
  `per_post_code` varchar(225) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_contact_info`
--

INSERT INTO `emp_contact_info` (`emp_id`, `pre_house`, `pre_road`, `pre_village`, `pre_post`, `pre_police_station`, `pre_district`, `pre_post_code`, `per_house`, `per_road`, `per_village`, `per_post`, `per_police_station`, `per_district`, `per_post_code`, `mobile`, `phone`, `email`) VALUES
('EMP-57030528', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_document_info`
--

CREATE TABLE `emp_document_info` (
  `id` int(225) NOT NULL,
  `emp_id` varchar(225) DEFAULT NULL,
  `doc_name` varchar(225) DEFAULT NULL,
  `doc_type` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_document_info`
--

INSERT INTO `emp_document_info` (`id`, `emp_id`, `doc_name`, `doc_type`, `description`, `photo`) VALUES
(63, 'EMP-57030528', 'paper', 'paper', 'paper', 'uploads/document/1ac449b5ec0.jpg'),
(64, 'EMP-57030528', 'paper', 'paper', 'paper', 'uploads/document/2a3ab43e5c1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `emp_health_info`
--

CREATE TABLE `emp_health_info` (
  `emp_id` varchar(225) NOT NULL,
  `weight` varchar(225) DEFAULT NULL,
  `blood` varchar(225) DEFAULT NULL,
  `mark` varchar(225) DEFAULT NULL,
  `height_feet` varchar(225) NOT NULL,
  `height_inch` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_health_info`
--

INSERT INTO `emp_health_info` (`emp_id`, `weight`, `blood`, `mark`, `height_feet`, `height_inch`) VALUES
('EMP-57030528', '', '', '', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `emp_office_info`
--

CREATE TABLE `emp_office_info` (
  `id` varchar(225) NOT NULL,
  `designation` varchar(225) DEFAULT NULL,
  `joining_date` varchar(50) DEFAULT NULL,
  `basic_salary` int(225) DEFAULT NULL,
  `house_rent` int(225) DEFAULT NULL,
  `medical_allowance` int(225) DEFAULT NULL,
  `trasnport_allowance` int(225) DEFAULT NULL,
  `insurance` int(225) DEFAULT NULL,
  `commission` int(225) DEFAULT NULL,
  `extra_over_time` int(225) DEFAULT NULL,
  `total_salary` int(225) DEFAULT NULL,
  `user_id` int(225) DEFAULT NULL,
  `pass` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_office_info`
--

INSERT INTO `emp_office_info` (`id`, `designation`, `joining_date`, `basic_salary`, `house_rent`, `medical_allowance`, `trasnport_allowance`, `insurance`, `commission`, `extra_over_time`, `total_salary`, `user_id`, `pass`) VALUES
('EMP-57030528', '', '22-06-2019', 1, 1, 1, 1, 1, 1, 1, 7, 1, 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `holyday`
--

CREATE TABLE `holyday` (
  `id` int(225) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_setting`
--

CREATE TABLE `profile_setting` (
  `id` int(225) NOT NULL,
  `org` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `api` varchar(100) DEFAULT NULL,
  `license` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(225) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_has_area`
--
ALTER TABLE `branch_has_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_has_area`
--
ALTER TABLE `employee_has_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_academic_info`
--
ALTER TABLE `emp_academic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_account_info`
--
ALTER TABLE `emp_account_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_basic_info`
--
ALTER TABLE `emp_basic_info`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_contact_info`
--
ALTER TABLE `emp_contact_info`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_document_info`
--
ALTER TABLE `emp_document_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_health_info`
--
ALTER TABLE `emp_health_info`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_office_info`
--
ALTER TABLE `emp_office_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holyday`
--
ALTER TABLE `holyday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_setting`
--
ALTER TABLE `profile_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch_has_area`
--
ALTER TABLE `branch_has_area`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_has_area`
--
ALTER TABLE `employee_has_area`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `emp_academic_info`
--
ALTER TABLE `emp_academic_info`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `emp_account_info`
--
ALTER TABLE `emp_account_info`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `emp_document_info`
--
ALTER TABLE `emp_document_info`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `holyday`
--
ALTER TABLE `holyday`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_setting`
--
ALTER TABLE `profile_setting`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
