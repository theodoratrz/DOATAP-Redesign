-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 19, 2022 at 11:41 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doatap`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ann_id` int NOT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `time_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ann_id`, `type`, `title`, `content`, `time_uploaded`) VALUES
(1, '', 'Test Title', 'This is a test announcement', '2022-01-14 22:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int NOT NULL,
  `state` enum('Υποβλήθηκε','Εκκρεμής','Προσωρινά Αποθηκευμένη','Απορρίφθηκε','Εγκρίθηκε') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `department` int NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attendance` enum('Συμβατικός','Εξ αποστάσεως') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `studiesType` enum('Τακτική','Μερική') NOT NULL,
  `ECTS` int NOT NULL,
  `dateIntro` date DEFAULT NULL,
  `dateGrad` date DEFAULT NULL,
  `yearsOfStudy` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `state`, `department`, `user_id`, `created`, `last_modified`, `attendance`, `studiesType`, `ECTS`, `dateIntro`, `dateGrad`, `yearsOfStudy`) VALUES
(3, 'Υποβλήθηκε', 1, 9, '2022-01-19 21:12:42', '2022-01-19 21:12:42', 'Συμβατικός', 'Τακτική', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `application_to_form`
--

CREATE TABLE `application_to_form` (
  `application` int NOT NULL,
  `form` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `coun_id` int NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`coun_id`, `name`) VALUES
(1, 'Greece');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `university` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `name`, `university`) VALUES
(1, 'Infomatics and Telecommunications', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `from_id` int NOT NULL,
  `file_location` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `uni_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uni_id`, `name`, `country`) VALUES
(1, 'University of Athens', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(40) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mothers_name` varchar(20) NOT NULL,
  `fathers_name` varchar(20) NOT NULL,
  `country` int NOT NULL,
  `city` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `docType` enum('ID','Passport') NOT NULL,
  `docNumber` varchar(15) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `birthday` date NOT NULL DEFAULT '1900-01-01',
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `isAdmin`, `first_name`, `last_name`, `mothers_name`, `fathers_name`, `country`, `city`, `address`, `docType`, `docNumber`, `gender`, `birthday`, `mobile`, `phone`) VALUES
(9, 'nikk', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'nick@mailll.com', 0, '', '0', '0', '0', 0, '', '', 'ID', '', 'Male', '1900-01-01', '', ''),
(10, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin@mail.com', 1, '', '0', '0', '0', 0, '', '', 'ID', '', 'Male', '1900-01-01', '', ''),
(11, 'admin1', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin1@mail.com', 1, '', '0', '0', '0', 0, '', '', 'ID', '', 'Male', '1900-01-01', '', ''),
(12, 'nikozzzz', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'nikkk@gmail.com', 0, '', '0', '0', '0', 0, '', '', 'ID', '', 'Male', '1900-01-01', '', ''),
(13, 'nikoz', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'nickkkk@gmail.com', 0, '', '0', '0', '0', 0, '', '', 'ID', '', 'Male', '1900-01-01', '', ''),
(18, 'Nikos', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'nikolas@mail.com', 0, 'Nikos', 'Paschalitsas', 'Nikos', 'Nikos', 3, 'Athens', 'Athinas 2', '', 'AM123456', '', '2001-01-01', '2384723948', '234293847');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `department` (`department`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `application_to_form`
--
ALTER TABLE `application_to_form`
  ADD PRIMARY KEY (`application`,`form`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`coun_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `university` (`university`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`from_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`uni_id`),
  ADD KEY `country` (`country`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ann_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `coun_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `from_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`dep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`university`) REFERENCES `universities` (`uni_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`coun_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
