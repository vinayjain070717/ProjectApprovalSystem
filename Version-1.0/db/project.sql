-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 08:36 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `code` int(11) NOT NULL,
  `first_name` char(25) NOT NULL,
  `last_name` char(25) NOT NULL,
  `email_id` char(30) NOT NULL,
  `password` char(100) NOT NULL,
  `password_key` char(100) NOT NULL,
  `image` blob,
  `group_code` int(11) DEFAULT NULL,
  `mobile_number` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`code`, `first_name`, `last_name`, `email_id`, `password`, `password_key`, `image`, `group_code`, `mobile_number`) VALUES
(1, 'fasfdf', 'fsfsdf', 'fffsfd@gmail.com', 'fadfs', 'fdsfsfsdfsfsdfsd', NULL, NULL, '35435345353'),
(2, 'ganesh', 'gaitonde', 'kancha@china', '1b6ac2587541c5c5ad510b7e010493d4', '', NULL, NULL, ''),
(3, 'abcd', 'efgh', 'hello@fsfsfds', 'dc1e07e2e0a3b90d0ae628fb324be082', '', NULL, NULL, ''),
(4, 'hklf', 'sfsfs', 'sfsfdf', '17c897eecdb76eca9127bf956c0dad04', '', NULL, NULL, ''),
(5, 'sfdf', 'fsdfsd', 'fsdfsdf', 'f8e6bee2d6437655db982190dc0d89c4', '', NULL, NULL, '4234');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_approval`
--

CREATE TABLE `faculty_approval` (
  `code` int(11) NOT NULL,
  `is_approved` char(1) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `date_of_creation` date NOT NULL,
  `time_of_creation` time NOT NULL,
  `faculty_code` int(11) NOT NULL,
  `student_group_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `code` int(11) NOT NULL,
  `first_name` char(25) NOT NULL,
  `last_name` char(25) NOT NULL,
  `year` int(1) NOT NULL,
  `section` char(1) NOT NULL,
  `roll_number` char(30) NOT NULL,
  `mobile_number` char(15) NOT NULL,
  `semester` int(2) NOT NULL,
  `department` char(30) NOT NULL,
  `profile_picture` blob,
  `group_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_file`
--

CREATE TABLE `student_file` (
  `code` int(11) NOT NULL,
  `file` text NOT NULL,
  `comment` varchar(400) DEFAULT NULL,
  `title` char(20) NOT NULL,
  `date_of_creation` date NOT NULL,
  `time_of_creation` time NOT NULL,
  `file_type` char(30) NOT NULL,
  `group_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

CREATE TABLE `student_group` (
  `code` int(11) NOT NULL,
  `email_id` char(50) NOT NULL,
  `password` char(100) NOT NULL,
  `number_of_student` int(1) NOT NULL,
  `is_email_verified` char(1) NOT NULL,
  `faculty_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`code`, `email_id`, `number_of_student`, `is_email_verified`, `faculty_code`) VALUES
(1, 'abcde@gmail.com', 1, 'N', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`code`),
  ADD KEY `faculty_student_group_relationship` (`group_code`);

--
-- Indexes for table `faculty_approval`
--
ALTER TABLE `faculty_approval`
  ADD PRIMARY KEY (`code`),
  ADD KEY `faculty_approval_relationship` (`faculty_code`),
  ADD KEY `faculty_approval_relationship2` (`student_group_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`code`),
  ADD KEY `group_relationship` (`group_code`);

--
-- Indexes for table `student_file`
--
ALTER TABLE `student_file`
  ADD PRIMARY KEY (`code`),
  ADD KEY `student_file_relationship` (`group_code`);

--
-- Indexes for table `student_group`
--
ALTER TABLE `student_group`
  ADD PRIMARY KEY (`code`),
  ADD KEY `group_relationship2` (`faculty_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_file`
--
ALTER TABLE `student_file`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_group`
--
ALTER TABLE `student_group`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_student_group_relationship` FOREIGN KEY (`group_code`) REFERENCES `student_group` (`code`);

--
-- Constraints for table `faculty_approval`
--
ALTER TABLE `faculty_approval`
  ADD CONSTRAINT `faculty_approval_relationship` FOREIGN KEY (`faculty_code`) REFERENCES `faculty` (`code`),
  ADD CONSTRAINT `faculty_approval_relationship2` FOREIGN KEY (`student_group_code`) REFERENCES `student_group` (`code`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `group_relationship` FOREIGN KEY (`group_code`) REFERENCES `student_group` (`code`);

--
-- Constraints for table `student_file`
--
ALTER TABLE `student_file`
  ADD CONSTRAINT `student_file_relationship` FOREIGN KEY (`group_code`) REFERENCES `student_group` (`code`);

--
-- Constraints for table `student_group`
--
ALTER TABLE `student_group`
  ADD CONSTRAINT `group_relationship2` FOREIGN KEY (`faculty_code`) REFERENCES `faculty` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;