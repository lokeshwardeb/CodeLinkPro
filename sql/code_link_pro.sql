-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 03:46 AM
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
  `user_name` varchar(255) NOT NULL,
  `homework_title` varchar(255) NOT NULL,
  `problems_count` varchar(255) NOT NULL,
  `homework_file_name` varchar(255) NOT NULL,
  `homework_status` varchar(255) NOT NULL,
  `homework_submission_datetime` datetime NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`homework_id`, `homework_problem_id`, `user_id`, `user_name`, `homework_title`, `problems_count`, `homework_file_name`, `homework_status`, `homework_submission_datetime`, `datetime`) VALUES
(32, '', '', 'birt', 'jai sri ganesh', '2', 'homework_32_t_jai_sri_ganesh_f_n_Hw_3.pdf', 'running', '2024-07-19 11:24:00', '2024-07-13 11:22:22');

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
(39, 32, '', 'hw_32_problem_1', '', 'running', '2024-07-13 11:22:22'),
(40, 32, '', 'hw_32_problem_2', '', 'running', '2024-07-13 11:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `homework_submission`
--

CREATE TABLE `homework_submission` (
  `homework_submission_id` int(11) NOT NULL,
  `homework_id` varchar(255) NOT NULL,
  `homework_problem_id` varchar(255) NOT NULL,
  `submitted_user_id` varchar(255) NOT NULL,
  `homework_code` text NOT NULL,
  `code_language` varchar(255) NOT NULL,
  `check_submitted_homework_status` varchar(255) NOT NULL,
  `homework_inspection_result` varchar(255) NOT NULL,
  `wrong_solution_reason` text NOT NULL,
  `homework_file_name` varchar(255) NOT NULL,
  `homework_submitted_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homework_submission`
--

INSERT INTO `homework_submission` (`homework_submission_id`, `homework_id`, `homework_problem_id`, `submitted_user_id`, `homework_code`, `code_language`, `check_submitted_homework_status`, `homework_inspection_result`, `wrong_solution_reason`, `homework_file_name`, `homework_submitted_datetime`) VALUES
(85, '32', '39', '6', '# Write your python programming code here\r\n\r\n\r\nprint(&quot;the check&quot;)', 'python3', 'checked', 'correct_solution', '', '', '2024-07-14 01:26:05'),
(87, '32', '40', '6', '# Write your python programming code here\r\n\r\n\r\nprint(&quot;the check 2&quot;)', 'python3', 'checked', 'wrong_solution', '', '', '2024-07-14 01:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `homework_submission_files`
--

CREATE TABLE `homework_submission_files` (
  `homework_submission_files_id` int(11) NOT NULL,
  `homework_submission_id` varchar(255) NOT NULL,
  `homework_id` varchar(255) NOT NULL,
  `homework_problem_id` varchar(255) NOT NULL,
  `homework_file_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homework_submission_files`
--

INSERT INTO `homework_submission_files` (`homework_submission_files_id`, `homework_submission_id`, `homework_id`, `homework_problem_id`, `homework_file_name`, `datetime`) VALUES
(33, '84', '32', '', 'problem_no_1', '2024-07-13 11:46:44'),
(34, '84', '32', '', 'problem_no_2', '2024-07-13 11:46:44'),
(35, '88', '32', '', 'problem_no_1', '2024-07-14 01:29:50');

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
  `user_block_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_role`, `user_block_status`, `datetime`) VALUES
(1, 'd', 'd@d.d', '$2y$10$9y/7uL7aU0BWgDHgV4cBquSkmkrYEUhJ3eNeSpLJr0Lh.s16Rl7N.', 'team_member', 'user_blocked', '2024-07-07 14:12:02'),
(2, '', '', '$2y$10$Co5vuFqDg3wyFClAwZC0.unknx6TIsFhLKBWe4DQwwDc7H9Wv27WS', 'team_member', '', '2024-07-07 14:12:05'),
(3, 'c', 'c.@c.c', '$2y$10$CKXGC5Xoh3EBjNabs4uRSeWIgM36gFnY5.1Koj9zO5hM9qGyk991K', 'team_member', '', '2024-07-07 14:13:57'),
(4, 'dch', 'd@dkfjkdjfk.cljjdkjf', '$2y$10$3PlVWtDI0JrSYs6uDaLTLupKuz0CSJV3nEZKLGBGzfGDQcgVy2ZEK', 'team_member', '', '2024-07-07 14:26:01'),
(5, 'checkings', 'check@check.check', '$2y$10$ISrR.tiXM2sSeouOum7WJevq5IrSFr1J63AI.6JYwPbbSd9HGs0p.', 'team_member', '', '2024-07-07 14:44:59'),
(6, 'birt', 'birt@birt.birt', '$2y$10$S/cZAQvRrfZZ.Outdd8tg.n5o0yg8VA9QZZZpOrDrI8TYioy1YUzG', 'admin', '', '2024-07-07 14:46:01');

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
-- Indexes for table `homework_submission_files`
--
ALTER TABLE `homework_submission_files`
  ADD PRIMARY KEY (`homework_submission_files_id`);

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
  MODIFY `homework_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `homework_problems`
--
ALTER TABLE `homework_problems`
  MODIFY `homework_problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `homework_submission`
--
ALTER TABLE `homework_submission`
  MODIFY `homework_submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `homework_submission_files`
--
ALTER TABLE `homework_submission_files`
  MODIFY `homework_submission_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
