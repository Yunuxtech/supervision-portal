-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 08:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supervisor_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Prof. Muhammad', 'hadi@gmail.com', 'c6e06f6073a29fa6ab311e425ac449a6', '2023-02-21 12:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_student_tbl`
--

CREATE TABLE `assigned_student_tbl` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_student_tbl`
--

INSERT INTO `assigned_student_tbl` (`id`, `student_id`, `supervisor_id`, `created_at`) VALUES
(6, 10, 2, '2023-03-02 19:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `chat_tbl`
--

CREATE TABLE `chat_tbl` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `receiver_id` varchar(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` varchar(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_tbl`
--

INSERT INTO `chat_tbl` (`id`, `sender_id`, `receiver_id`, `message`, `status`, `created_at`) VALUES
(26, '10', '2', 'hello, good morming sir', '1', '2023-03-02 19:50:23'),
(27, '2', '10', 'Fine and you??', '1', '2023-03-02 19:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_tbl`
--

CREATE TABLE `lecturer_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer_tbl`
--

INSERT INTO `lecturer_tbl` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Dr. Yunus Isah', 'yunusisah123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-03 21:37:32'),
(2, 'Prof. Umar Harande', 'umarharande@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-03 21:37:32'),
(3, 'Dr. Aliyu Aminu', 'aliyuaminu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-03 21:37:32'),
(8, 'Prof. Abdul Wahab Lawal', 'wahab@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-21 20:33:21'),
(9, 'sani muhammad', 'abdul.basy1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-02 19:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `review_logs_tbl`
--

CREATE TABLE `review_logs_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `document` varchar(50) NOT NULL,
  `status` varchar(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reg.no` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`id`, `username`, `email`, `reg.no`, `password`, `created_at`) VALUES
(10, 'Yunus Isah', 'yunusisah123@gmail.com', 'CST/17/IFT/00029', 'c6e06f6073a29fa6ab311e425ac449a6', '2023-03-02 19:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_upload_tbl`
--

CREATE TABLE `student_upload_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `document` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 is not not  reviewed, while 1 is reviewd',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_application_tbl`
--

CREATE TABLE `supervisor_application_tbl` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `regNo` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `summary` longtext NOT NULL,
  `status` int(11) NOT NULL COMMENT 'assigned = 1, pending = 0',
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor_application_tbl`
--

INSERT INTO `supervisor_application_tbl` (`id`, `userId`, `regNo`, `department`, `option1`, `option2`, `topic`, `summary`, `status`, `create_at`) VALUES
(10, 10, 'CST/17/IFT/00029', '', 'Dr. Yunus Isah', 'Dr. Aliyu Aminu', 'Project management system', 'Final year project management system', 1, '2023-03-02 19:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_tbl`
--

CREATE TABLE `supervisor_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor_tbl`
--

INSERT INTO `supervisor_tbl` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Yunus Isah', 'yunusisah123@gmail.com', '12345', '2023-02-09 21:35:24'),
(2, 'Umar Harande', 'umarharande@gmail.com', '12345', '2023-02-09 21:35:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_student_tbl`
--
ALTER TABLE `assigned_student_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer_tbl`
--
ALTER TABLE `lecturer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_logs_tbl`
--
ALTER TABLE `review_logs_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_upload_tbl`
--
ALTER TABLE `student_upload_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_application_tbl`
--
ALTER TABLE `supervisor_application_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_tbl`
--
ALTER TABLE `supervisor_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_student_tbl`
--
ALTER TABLE `assigned_student_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `lecturer_tbl`
--
ALTER TABLE `lecturer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review_logs_tbl`
--
ALTER TABLE `review_logs_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_upload_tbl`
--
ALTER TABLE `student_upload_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supervisor_application_tbl`
--
ALTER TABLE `supervisor_application_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supervisor_tbl`
--
ALTER TABLE `supervisor_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
