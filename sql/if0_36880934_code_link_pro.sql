-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.infinityfree.com
-- Generation Time: Jul 14, 2024 at 04:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36880934_code_link_pro`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`homework_id`, `homework_problem_id`, `user_id`, `user_name`, `homework_title`, `problems_count`, `homework_file_name`, `homework_status`, `homework_submission_datetime`, `datetime`) VALUES
(33, '', '', 'Lokeshwar_Deb_Protik', 'Day 1: Basic Syntax and Variables', '3', 'homework_33_Day_1:_Basic_Syntax_and_Variables__7_days_hw1.pdf', 'running', '2024-07-15 12:36:00', '2024-07-14 02:36:54'),
(34, '', '', 'Lokeshwar_Deb_Protik', 'Day 2: Conditionals', '3', 'homework_34_Day_2:_Conditionals__7_days_hw2.pdf', 'time_expired', '2024-07-16 12:38:00', '2024-07-14 02:38:34'),
(35, '', '', 'Lokeshwar_Deb_Protik', 'Day 3: Loops', '3', 'homework_35_Day_3:_Loops__7_days_hw3.pdf', 'time_expired', '2024-07-17 12:39:00', '2024-07-14 02:39:27'),
(36, '', '', 'Lokeshwar_Deb_Protik', 'Day 4: Lists', '3', 'homework_36_Day_4:_Lists__7_days_hw4.pdf', 'time_expired', '2024-07-18 12:40:00', '2024-07-14 02:40:42'),
(37, '', '', 'Lokeshwar_Deb_Protik', 'Day 5: Dictionaries', '3', 'homework_37_Day_5:_Dictionaries__7_days_hw5.pdf', 'time_expired', '2024-07-19 12:41:00', '2024-07-14 02:41:31'),
(38, '', '', 'Lokeshwar_Deb_Protik', 'Day 6: Tuples', '3', 'homework_38_Day_6:_Tuples__7_days_hw6.pdf', 'time_expired', '2024-07-20 12:42:00', '2024-07-14 02:42:25'),
(39, '', '', 'Lokeshwar_Deb_Protik', 'Day 7: Sets', '3', 'homework_39_Day_7:_Sets__7_days_hw7.pdf', 'time_expired', '2024-07-21 12:43:00', '2024-07-14 02:43:14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework_problems`
--

INSERT INTO `homework_problems` (`homework_problem_id`, `homework_id`, `user_id`, `homework_problem_name`, `homework_problem_file`, `homework_problem_status`, `datetime`) VALUES
(41, 33, '', '1.  Write a Python program to swap the values of two variables without using a temporary variable.', '', 'running', '2024-07-14 02:36:54'),
(42, 33, '', '2.  Write a Python program to calculate the area and perimeter of a rectangle. The user should provide the length and width.', '', 'running', '2024-07-14 02:36:54'),
(43, 33, '', '3.  Write a program to convert temperature from Celsius to Fahrenheit and vice versa. The user should provide the temperature and the conversion direction.', '', 'running', '2024-07-14 02:36:54'),
(44, 34, '', '1.  Write a program that asks the user to enter three numbers and prints the largest and smallest of the three.', '', 'time_expired', '2024-07-14 02:38:34'),
(45, 34, '', '2.  Write a program that checks if a given year is a leap year. A year is a leap year if it is divisible by 4, but not divisible by 100, unless it is also divisible by 400.', '', 'time_expired', '2024-07-14 02:38:34'),
(46, 34, '', '3.  Write a program that asks the user for a number and prints &quot;Fizz&quot; if the number is divisible by 3, &quot;Buzz&quot; if it is divisible by 5, and &quot;FizzBuzz&quot; if it is divisible by both 3 and 5. If the number is not divisible by 3 or ', '', 'time_expired', '2024-07-14 02:38:34'),
(47, 35, '', '1.  Write a program that prints all the prime numbers between 1 and 100.', '', 'time_expired', '2024-07-14 02:39:27'),
(48, 35, '', '2.  Write a program that asks the user for a number and then prints the multiplication table for that number up to 12.', '', 'time_expired', '2024-07-14 02:39:27'),
(49, 35, '', '3.  Write a program to print the sum of the first n natural numbers, where n is provided by the user. Ensure your program handles invalid inputs gracefully.', '', 'time_expired', '2024-07-14 02:39:27'),
(50, 36, '', '1.  Write a program that asks the user for a list of numbers and then prints the largest, smallest numbers, and their positions in the list.', '', 'time_expired', '2024-07-14 02:40:42'),
(51, 36, '', '2.  Write a program that takes a list of numbers and returns a new list with the numbers sorted in ascending order without using the built-in sort function.', '', 'time_expired', '2024-07-14 02:40:42'),
(52, 36, '', '3.  Write a program that takes a list of words and returns a list with the words in reverse order. Additionally, reverse each word in the list.', '', 'time_expired', '2024-07-14 02:40:42'),
(53, 37, '', '1.  Write a program that counts the frequency of each word in a given sentence provided by the user and prints the word with the highest frequency.', '', 'time_expired', '2024-07-14 02:41:31'),
(54, 37, '', '2.  Write a program that takes a dictionary of employee names and their salaries, then prints the name and salary of the employee with the highest and lowest salaries.', '', 'time_expired', '2024-07-14 02:41:31'),
(55, 37, '', '3.  Write a program that merges two dictionaries. If a key appears in both dictionaries, sum the values. Print the resulting dictionary.', '', 'time_expired', '2024-07-14 02:41:31'),
(56, 38, '', '1.  Write a program that takes a list of numbers and converts it into a tuple, then prints the tuple and the sum of all its elements.', '', 'time_expired', '2024-07-14 02:42:25'),
(57, 38, '', '2.  Write a program that finds the index of an element in a tuple provided by the user. If the element is not in the tuple, print an appropriate message.', '', 'time_expired', '2024-07-14 02:42:25'),
(58, 38, '', '3.  Write a program that takes a tuple of numbers and returns a new tuple containing only the numbers that are divisible by 3. Additionally, calculate the average of these numbers.', '', 'time_expired', '2024-07-14 02:42:25'),
(59, 39, '', '1.  Write a program that removes all duplicate elements from a list of numbers provided by the user and prints the unique elements. Sort the resulting set in ascending order before printing.', '', 'time_expired', '2024-07-14 02:43:14'),
(60, 39, '', '2.  Write a program that takes two sets of numbers and prints their union, intersection, and symmetric difference.', '', 'time_expired', '2024-07-14 02:43:14'),
(61, 39, '', '3.  Write a program that checks if one set is a subset of another set. If not, print the elements that are in the first set but not in the second set.', '', 'time_expired', '2024-07-14 02:43:14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework_submission`
--

INSERT INTO `homework_submission` (`homework_submission_id`, `homework_id`, `homework_problem_id`, `submitted_user_id`, `homework_code`, `code_language`, `check_submitted_homework_status`, `homework_inspection_result`, `wrong_solution_reason`, `homework_file_name`, `homework_submitted_datetime`) VALUES
(88, '33', '41', '6', 'To write a code at first select a language and then write your codes here !!', '', '', '', '', '', '2024-07-14 10:16:07'),
(89, '33', '42', '3', '# Write your python programming code here\r\nprint(&#039;the test programming language&#039;)', 'python3', '', '', '', '', '2024-07-14 10:18:20'),
(90, '33', '41', '5', '# Write your python programming code here\r\n\r\n\r\nprint(&#039;the test&#039;)', 'python3', '', '', '', '', '2024-07-14 11:22:44'),
(91, '33', '41', '8', '# 1. Python program to swap the values of two variables without using a temporary variable. \r\n\r\n# Initialize the variables\r\nx = 10\r\ny = 5\r\n\r\n# Print the originale values\r\nprint(&quot;The original values:&quot;)\r\nprint(&quot;x = &quot;,x)\r\nprint(&quot;y = &quot;,y)\r\n\r\n# Swapping the values of variables by using arithmatic operations\r\nx = x + y\r\ny = x - y\r\nx = x - y\r\n\r\n# Print the swapping values\r\nprint(&quot;\\nThe swapping values are:&quot;)\r\nprint(&quot;x = &quot;,x)\r\nprint(&quot;y = &quot;,y)', 'python3', 'checked', 'correct_solution', '', '', '2024-07-14 11:29:59'),
(92, '33', '42', '5', '# Write your python programming code here\r\nprint(&quot;new test check&quot;)', 'python3', '', '', '', '', '2024-07-14 11:30:24'),
(93, '33', '42', '8', '# 2.Python program to calculate the area and perimeter of a rectangle by using user input\r\n\r\n# Get user input for length and width \r\nl = float(input(&quot;Please enter the length of the rectangle:&quot;))\r\nw = float(input(&quot;Please enter the width of the rectangle:&quot;))\r\n\r\n# Perform the operation to calculate the area and perimeter of the rectangle\r\narea = w * l\r\nperimeter = 2 * (w + l) \r\n\r\n# print the value of the area and perimeter\r\nprint(&quot;\\nArea of the rectangle = &quot;,area)\r\nprint(&quot;Perimeter of the rectangle = &quot;,perimeter)', 'python3', '', '', '', '', '2024-07-14 11:33:56'),
(94, '33', '43', '8', '# 3.Python program to convert temperature from Celsius to Fahrenheit and vice versa.\r\n\r\n# Function to convert Celsius to Fahrenheit\r\ndef celsius_to_fahrenheit(celsius):\r\n    return (celsius * 9/5) + 32\r\n\r\n# Function to convert Fahrenheit to Celsius\r\ndef fahrenheit_to_celsius(fahrenheit):\r\n    return (fahrenheit - 32) * 5/9\r\n\r\n# Main function\r\ndef main():\r\n    # Get user input for temperature and conversion direction\r\n    temp = float(input(&quot;Enter the temperature: &quot;))\r\n    direction = input(&quot;Convert to Fahrenheit or Celsius? Please enter &#039;F&#039; or &#039;C&#039; = &quot;).strip().upper()\r\n\r\n    # Perform the conversion based on the direction\r\n    if direction == &#039;F&#039;:\r\n        converted_temp = celsius_to_fahrenheit(temp)\r\n        print(f&quot;\\n{temp}Â°C is equal to {converted_temp:.2f}Â°F&quot;)\r\n    elif direction == &#039;C&#039;:\r\n        converted_temp = fahrenheit_to_celsius(temp)\r\n        print(f&quot;\\n{temp}Â°F is equal to {converted_temp:.2f}Â°C&quot;)\r\n    else:\r\n        print(&quot;\\nInvalid conversion direction. Please enter &#039;F&#039; or &#039;C&#039;.&quot;)\r\n\r\n# Run the main function\r\nif __name__ == &quot;__main__&quot;:\r\n    main()', 'python3', '', '', '', '', '2024-07-14 11:37:24'),
(95, '33', '41', '2', '# Write your python programming code here\r\nprint(&quot;dummy python code&quot;)', 'python3', '', '', '', '', '2024-07-14 13:31:06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_role`, `user_block_status`, `datetime`) VALUES
(1, 'd', 'd@d.d', '$2y$10$9y/7uL7aU0BWgDHgV4cBquSkmkrYEUhJ3eNeSpLJr0Lh.s16Rl7N.', 'team_member', 'user_blocked', '2024-07-07 14:12:02'),
(2, '', '', '$2y$10$Co5vuFqDg3wyFClAwZC0.unknx6TIsFhLKBWe4DQwwDc7H9Wv27WS', 'team_member', '', '2024-07-07 14:12:05'),
(3, 'c', 'c.@c.c', '$2y$10$CKXGC5Xoh3EBjNabs4uRSeWIgM36gFnY5.1Koj9zO5hM9qGyk991K', 'team_member', '', '2024-07-07 14:13:57'),
(4, 'dch', 'd@dkfjkdjfk.cljjdkjf', '$2y$10$3PlVWtDI0JrSYs6uDaLTLupKuz0CSJV3nEZKLGBGzfGDQcgVy2ZEK', 'team_member', '', '2024-07-07 14:26:01'),
(5, 'checkings', 'check@check.check', '$2y$10$ISrR.tiXM2sSeouOum7WJevq5IrSFr1J63AI.6JYwPbbSd9HGs0p.', 'team_member', '', '2024-07-07 14:44:59'),
(6, 'birt', 'birt@birt.birt', '$2y$10$S/cZAQvRrfZZ.Outdd8tg.n5o0yg8VA9QZZZpOrDrI8TYioy1YUzG', 'admin', '', '2024-07-07 14:46:01'),
(7, 'Lokeshwar Deb Protik', 'lokeshwardebprotik@gmail.com', '$2y$10$Jk3qgCpW0nnWNAp1GNWE8ems6yY5xcE9pvy7XS1SOUKgptFZSsbua', 'admin', '', '2024-07-14 02:35:00'),
(8, 'M.R.Amit Hasan', 'amithasanmr@gmail.com', '$2y$10$1Dnr/AB53aD/jKIme7BV1up12fHKXGEPPAfMl0JsjhHJA0Yl2G4lu', 'team_member', '', '2024-07-14 10:29:53'),
(10, 'supriyo chakraborty', 'supriyochakraborty456@gmail.com', '$2y$10$a3KyX7pfrhp4XINN5IIxPOUfMqrarC12pdc3TlaPOGDaQ1FR9Zn6K', 'team_member', '', '2024-07-14 14:52:44');

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
  MODIFY `homework_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `homework_problems`
--
ALTER TABLE `homework_problems`
  MODIFY `homework_problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `homework_submission`
--
ALTER TABLE `homework_submission`
  MODIFY `homework_submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `homework_submission_files`
--
ALTER TABLE `homework_submission_files`
  MODIFY `homework_submission_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
