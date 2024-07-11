-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 08:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_link_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `homework_id` int(11) NOT NULL,
  `homework_problem_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `homework_title` varchar(255) NOT NULL,
  `problems_count` varchar(255) NOT NULL,
  `homework_status` varchar(255) NOT NULL,
  `homework_submission_datetime` datetime NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`homework_id`, `homework_problem_id`, `user_id`, `homework_title`, `problems_count`, `homework_status`, `homework_submission_datetime`, `datetime`) VALUES
(1, '1', '1', 'test', '2', 'time_expired', '2024-07-07 19:13:58', '2024-07-07 19:13:58'),
(2, '2', '1', 'new homework', '', 'time_expired', '2024-07-07 20:22:09', '2024-07-07 20:22:09'),
(3, '', '', '', '', 'time_expired', '2024-07-07 22:13:44', '2024-07-07 22:13:44'),
(4, '', '', '', '', '', '2024-07-07 22:13:50', '2024-07-07 22:13:50'),
(5, '', '', '', '', '', '2024-07-07 22:14:26', '2024-07-07 22:14:26'),
(6, '', '', '', '', '', '2024-07-07 22:14:30', '2024-07-07 22:14:30'),
(7, '', '', '', '', '', '2024-07-07 22:25:10', '2024-07-07 22:25:10'),
(8, '', '', '', '', '', '2024-07-07 22:26:48', '2024-07-07 22:26:48'),
(9, '', '', '', '', '', '2024-07-07 22:28:19', '2024-07-07 22:28:19'),
(10, '', '', 'd', '1', 'time_expired', '2024-07-07 22:37:22', '2024-07-07 22:37:22'),
(11, '', '', 'Jai sri ganesh', '2', '', '2024-07-08 17:00:02', '2024-07-08 17:00:02'),
(12, '', '', 'jai ganesh new homework', '2', 'time_expired', '2024-07-08 17:03:31', '2024-07-08 17:03:31'),
(13, '', '', 'check new hw', '2', 'time_expired', '2024-07-08 17:18:01', '2024-07-08 17:18:01'),
(14, '', '', 'new homweork check', '2', 'time_expired', '2024-07-08 17:20:15', '2024-07-08 17:20:15'),
(15, '', '', 'dffd', '2', 'time_expired', '2024-07-08 17:22:25', '2024-07-08 17:22:25'),
(16, '', '', 'kjhkjhn', '6', 'time_expired', '2024-07-08 17:26:27', '2024-07-08 17:26:27'),
(17, '', '', 'd', '5', 'time_expired', '2024-07-08 17:28:37', '2024-07-08 17:28:37'),
(18, '', '', 'The main new checking homework', '6', 'time_expired', '2024-07-08 17:30:55', '2024-07-08 17:30:55'),
(19, '', '', 'the test homework', '5', 'time_expired', '2024-07-08 17:31:46', '2024-12-31 23:59:59'),
(20, '', '', 'The python homework (In Loops)', '6', 'running', '2024-07-12 19:18:00', '2024-07-09 19:19:06'),
(21, '', '', 'test jai sri ramkrishna jai sri ganesh', '2', 'time_expired', '2024-07-10 23:50:00', '2024-07-09 22:51:07'),
(22, '', '', 'The argent homework', '2', 'running', '2024-07-10 10:48:00', '2024-07-10 09:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `homework_problems`
--

CREATE TABLE `homework_problems` (
  `homework_problem_id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `homework_problem_name` varchar(255) NOT NULL,
  `homework_problem_file` varchar(255) NOT NULL,
  `homework_problem_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homework_problems`
--

INSERT INTO `homework_problems` (`homework_problem_id`, `homework_id`, `user_id`, `homework_problem_name`, `homework_problem_file`, `homework_problem_status`, `datetime`) VALUES
(1, 1, '1', 'dfdf', 'the test problem file', 'time_expired', '2024-07-07 20:19:21'),
(2, 17, '', 'dfdf', '', 'time_expired', '2024-07-08 17:28:37'),
(3, 17, '', 'dfdf', '', 'time_expired', '2024-07-08 17:28:37'),
(4, 17, '', 'dfdf', '', 'time_expired', '2024-07-08 17:28:37'),
(5, 17, '', 'dfdf', '', 'time_expired', '2024-07-08 17:28:37'),
(6, 17, '', 'dfdf', '', 'time_expired', '2024-07-08 17:28:37'),
(7, 19, '', '1. test homwork ( Create a new game)', '', 'running', '2024-07-08 17:31:46'),
(8, 19, '', '2. test homework ( Use logic )', '', 'running', '2024-07-08 17:31:46'),
(9, 19, '', '3. test homework ( Use new )', '', 'running', '2024-07-08 17:31:46'),
(10, 19, '', '4. test homework ( Use condition )', '', 'running', '2024-07-08 17:31:46'),
(11, 19, '', '5. test homework ( Use loops )', '', 'running', '2024-07-08 17:31:46'),
(12, 20, '', 'hw_20_problem_1', '', 'running', '2024-07-09 19:19:06'),
(13, 20, '', 'hw_20_problem_2', '', 'running', '2024-07-09 19:19:06'),
(14, 20, '', 'hw_20_problem_3', '', 'running', '2024-07-09 19:19:06'),
(15, 20, '', 'hw_20_problem_4', '', 'running', '2024-07-09 19:19:06'),
(16, 20, '', 'hw_20_problem_5', '', 'running', '2024-07-09 19:19:06'),
(17, 20, '', 'hw_20_problem_6', '', 'running', '2024-07-09 19:19:06'),
(18, 21, '', 'hw_21_problem_1', '', 'running', '2024-07-09 22:51:07'),
(19, 21, '', 'hw_21_problem_2', '', 'running', '2024-07-09 22:51:07'),
(20, 22, '', 'hw_22_problem_1', '', 'running', '2024-07-10 09:47:44'),
(21, 22, '', 'hw_22_problem_2', '', 'running', '2024-07-10 09:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `homework_submission`
--

CREATE TABLE `homework_submission` (
  `homework_submission_id` int(11) NOT NULL,
  `homework_id` varchar(255) NOT NULL,
  `homework_problem_id` varchar(255) NOT NULL,
  `submitted_user_id` varchar(255) NOT NULL,
  `homework_file_name` varchar(255) NOT NULL,
  `homework_submitted_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_role`, `datetime`) VALUES
(1, 'd', 'd@d.d', '$2y$10$9y/7uL7aU0BWgDHgV4cBquSkmkrYEUhJ3eNeSpLJr0Lh.s16Rl7N.', 'team_member', '2024-07-07 14:12:02'),
(2, '', '', '$2y$10$Co5vuFqDg3wyFClAwZC0.unknx6TIsFhLKBWe4DQwwDc7H9Wv27WS', 'team_member', '2024-07-07 14:12:05'),
(3, 'c', 'c.@c.c', '$2y$10$CKXGC5Xoh3EBjNabs4uRSeWIgM36gFnY5.1Koj9zO5hM9qGyk991K', 'team_member', '2024-07-07 14:13:57'),
(4, 'dch', 'd@dkfjkdjfk.cljjdkjf', '$2y$10$3PlVWtDI0JrSYs6uDaLTLupKuz0CSJV3nEZKLGBGzfGDQcgVy2ZEK', 'team_member', '2024-07-07 14:26:01'),
(5, 'checkings', 'check@check.check', '$2y$10$ISrR.tiXM2sSeouOum7WJevq5IrSFr1J63AI.6JYwPbbSd9HGs0p.', 'team_member', '2024-07-07 14:44:59'),
(6, 'birt', 'birt@birt.birt', '$2y$10$S/cZAQvRrfZZ.Outdd8tg.n5o0yg8VA9QZZZpOrDrI8TYioy1YUzG', 'admin', '2024-07-07 14:46:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`homework_id`);

--
-- Indexes for table `homework_problems`
--
ALTER TABLE `homework_problems`
  ADD PRIMARY KEY (`homework_problem_id`);

--
-- Indexes for table `homework_submission`
--
ALTER TABLE `homework_submission`
  ADD PRIMARY KEY (`homework_submission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `homework_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `homework_problems`
--
ALTER TABLE `homework_problems`
  MODIFY `homework_problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `homework_submission`
--
ALTER TABLE `homework_submission`
  MODIFY `homework_submission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
