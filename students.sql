-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 07:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisers`
--

CREATE TABLE `advisers` (
  `adviser_id` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `department` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advisers`
--

INSERT INTO `advisers` (`adviser_id`, `name`, `phone`, `email`, `department`) VALUES
('1001', 'Refat Ara Hossain', '01700000001', 'refat.cse@diu.edu.bd', 'CSE'),
('1002', 'Fahmida Afrin', '01700000002', 'fahmida.cse@diu.edu.bd', 'CSE'),
('1003', 'Saiful Islam', '01700000003', 'saiful.cse@diu.edu.bd', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `assigend_adviser`
--

CREATE TABLE `assigend_adviser` (
  `adviser_id` varchar(20) DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigend_adviser`
--

INSERT INTO `assigend_adviser` (`adviser_id`, `student_id`) VALUES
('1001', '191-15-12102'),
('1002', '191-15-12216'),
('1002', '191-15-12313'),
('1002', '191-15-12442'),
('1003', '191-15-12644'),
('1002', '191-15-12597'),
('1002', '191-15-12835'),
('1002', '191-15-12836'),
('1002', '191-15-12645');

-- --------------------------------------------------------

--
-- Table structure for table `courselist`
--

CREATE TABLE `courselist` (
  `course_code` varchar(20) NOT NULL,
  `course_title` varchar(150) NOT NULL,
  `credit` varchar(11) NOT NULL,
  `level` varchar(11) NOT NULL,
  `term` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courselist`
--

INSERT INTO `courselist` (`course_code`, `course_title`, `credit`, `level`, `term`) VALUES
('ACT 211', 'Financial and Managerial Accounting', '2', '2', '1'),
('CSE 112', 'Computer Fundamentals', '3', '1', '1'),
('CSE 122', 'Programming and Problem Solving', '2', '1', '2'),
('CSE 123', 'Problem Solving Lab ', '2', '1', '2'),
('CSE 124', 'Business Application Design', '1', '1', '2'),
('CSE 131', 'Discrete Mathematics ', '3', '1', '3'),
('CSE 132', 'Electrical Circuits', '1', '1', '3'),
('CSE 133', 'Electrical Circuits Lab', '2', '1', '3'),
('CSE 134', 'Data Structures', '2', '1', '3'),
('CSE 135', 'Data Structures Lab', '2', '1', '3'),
('CSE 136', 'Software Project-I', '1', '1', '3'),
('CSE 212', 'Basic Electronics', '1', '2', '1'),
('CSE 213', 'Basic Electronics Lab ', '2', '2', '1'),
('CSE 214', 'Algorithm ', '2', '2', '2'),
('CSE 215', 'Algorithm Lab', '2', '2', '2'),
('CSE 216', 'Software Project II ', '1', '2', '1'),
('CSE 221', 'Object Oriented Programming', '2', '2', '1'),
('CSE 222', ' Object Oriented Programming Lab', '2', '2', '1'),
('CSE 223', 'Digital Electronics', '1', '2', '2'),
('CSE 224', 'Digital Electronics Lab', '2', '2', '2'),
('CSE 225', 'Data Communication', '3', '2', '2'),
('CSE 226', 'Software Project III ', '1', '2', '2'),
('CSE 231', 'Microprocessor, Embedded Systems and IoT', '1', '2', '3'),
('CSE 232', 'Microprocessor, Embedded Systems and IoT Lab', '2', '2', '3'),
('CSE 233', 'Object Oriented Programming II ', '1', '2', '3'),
('CSE 234', 'Object Oriented Programming II Lab ', '2', '2', '3'),
('CSE 235', 'Numerical Methods', '3', '2', '3'),
('CSE 236', 'Math for Computer Science', '2', '2', '3'),
('CSE 237', 'Software Project IV ', '1', '2', '3'),
('ENG 113', 'Basic Functional English and English Spoken ', '3', '1', '1'),
('ENG 123', 'Writing and Comprehension', '3', '1', '2'),
('GED 111', 'History of Bangladesh and Bangla Language', '3', '1', '1'),
('GED 121', 'Bangladesh Studies ', '3', '1', '2'),
('GED 131', 'Art of Living ', '3', '1', '3'),
('GED 999', 'Computer Fundamentals 999', '2', '1', '5'),
('MAT 111', 'Basic Mathematics', '3', '1', '1'),
('MAT 121', 'Mathematics II : Calculus, Complex Variables and Linear Algebra', '3', '1', '2'),
('MAT 211', 'Mathematics-IV: Engineering Mathematics ', '3', '2', '1'),
('mdsgj123', 'mbfzskjm', '3', '2', '3'),
('PHY 113', 'Basic Physics', '3', '1', '1'),
('PHY 114', 'Basic Physics Lab', '1', '1', '1'),
('PHY 116', 'Basic Physics II', '2', '1', '3'),
('STA 221', 'Statistics and Probability', '3', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `register_course`
--

CREATE TABLE `register_course` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `reg_status` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `sgpa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_course`
--

INSERT INTO `register_course` (`id`, `student_id`, `course_code`, `type`, `section`, `semester`, `reg_status`, `status`, `sgpa`) VALUES
(24, '191-15-12597', 'CSE 123', ' Regular', 'A', 'Spring 21 ', 'Completed', 'Completed', '4.00'),
(25, '191-15-12597', 'ACT 211', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(26, '191-15-12597', 'CSE 124', ' Retake', 'D', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(27, '191-15-12597', 'CSE 122', ' Regular', 'A', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(28, '191-15-12597', 'CSE 112', ' Regular', 'A', 'Spring 21 ', 'Completed', 'In Progres', ''),
(29, '191-15-12216', 'CSE 112', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(30, '191-15-12216', 'ACT 211', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(31, '191-15-12216', 'CSE 123', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(32, '191-15-12216', 'CSE 122', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(33, '191-15-12216', 'CSE 124', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(38, '191-15-12597', 'CSE 131', ' Regular', 'E', 'Spring 21 ', 'Completed', 'Completed', '4.00'),
(39, '191-15-12216', 'CSE 112', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(40, '191-15-12216', 'ACT 211', ' Regular', 'B', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(41, '191-15-12216', 'CSE 122', ' Regular', 'F', 'Spring 21 ', 'Completed', 'In Progres', NULL),
(42, '191-15-12836', 'CSE 112', ' Regular', 'A', 'Fall 20 ', 'Completed', 'In Progres', NULL),
(43, '191-15-12836', 'ACT 211', ' Regular', 'A', 'Fall 20 ', 'Completed', 'In Progres', NULL),
(44, '191-15-12836', 'CSE 131', ' Regular', 'A', 'Fall 20 ', 'Completed', 'In Progres', NULL),
(45, '191-15-12836', 'CSE 123', ' Regular', 'A', 'Fall 20 ', 'Completed', 'In Progres', NULL),
(46, '191-15-12836', 'CSE 122', ' Regular', 'A', 'Fall 20 ', 'Completed', 'In Progres', NULL),
(49, '191-15-12644', 'CSE 122', ' Regular', 'A', 'Summer 20 ', 'Panding', 'In Progres', NULL),
(50, '191-15-12644', 'ACT 211', ' Retake', 'A', 'Summer 20 ', 'Panding', 'In Progres', NULL),
(51, '191-15-12645', 'ACT 211', ' Regular', 'A', 'Spring 21 ', 'Completed', 'In Progres', ''),
(52, '191-15-12645', 'CSE 112', ' Regular', 'A', 'Spring 21 ', 'Completed', 'In Progres', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentlist`
--

CREATE TABLE `studentlist` (
  `student_id` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `batch` int(11) NOT NULL,
  `cgpa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlist`
--

INSERT INTO `studentlist` (`student_id`, `first_name`, `last_name`, `email`, `phone`, `department`, `shift`, `batch`, `cgpa`) VALUES
('191-15-12000', 'A', 'B', 'a@diu.edu.bd', '01700000004', 'CSE', 'Evening', 53, ''),
('191-15-12001', 'C', 'D', 'c@diu.edu.bd', '01700000005', 'CSE', 'Evening', 53, ''),
('191-15-12102', 'Uzzal', 'Roy', 'uzzal15-12102@diu.edu.bd', '01700000003', 'CSE', 'Day', 52, ''),
('191-15-12216', 'Mysha', 'Mobashira', 'mysha15-12216@diu.edu.bd', '01975484348', 'CSE', 'Day', 52, ''),
('191-15-12313', 'Samia Islam', 'Sumi', 'samia15-12313@diu.edu.bd', '01521562231', 'CSE', 'Day', 52, ''),
('191-15-12442', 'Mahim Hasan', 'Antu', 'mahim15-12442@diu.edu.bd', '01622905036', 'CSE', 'Day', 52, ''),
('191-15-12597', 'Md Galib', 'Hossain', 'galib15-12597@diu.edu.bd', '01704393092', 'CSE', 'Day', 52, ''),
('191-15-12644', 'Majeda Akter', 'Mitu', 'mitu15-12644@diu.edu.bd', '01833853473', 'CSE', 'Day', 52, ''),
('191-15-12645', 'Nazmul ', 'Islam', 'nazmul15-12645@diu.edu.bd', '01700000001', 'CSE', 'Day', 52, ''),
('191-15-12835', 'Reafat', 'Summam', 'reafat15-12835@diu.edu.bd', '01700000002', 'CSE', 'Day', 52, ''),
('191-15-12836', 'S. K. M Shadekul Islam', 'Shovo', 'shovo15-12836@diu.edu.bd', '01734542424', 'CSE', 'Day', 52, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisers`
--
ALTER TABLE `advisers`
  ADD PRIMARY KEY (`adviser_id`);

--
-- Indexes for table `assigend_adviser`
--
ALTER TABLE `assigend_adviser`
  ADD KEY `adviser_id` (`adviser_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `courselist`
--
ALTER TABLE `courselist`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `register_course`
--
ALTER TABLE `register_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_course`
--
ALTER TABLE `register_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigend_adviser`
--
ALTER TABLE `assigend_adviser`
  ADD CONSTRAINT `assigend_adviser_ibfk_1` FOREIGN KEY (`adviser_id`) REFERENCES `advisers` (`adviser_id`),
  ADD CONSTRAINT `assigend_adviser_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `studentlist` (`student_id`);

--
-- Constraints for table `register_course`
--
ALTER TABLE `register_course`
  ADD CONSTRAINT `register_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studentlist` (`student_id`),
  ADD CONSTRAINT `register_course_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `courselist` (`course_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
