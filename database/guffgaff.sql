-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2025 at 05:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guffgaff`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Rabin Thapa', 'raveenthpa@gmail.com', 'hello sir', '2025-02-24 16:47:02'),
(2, 'Rajin Rayamajhi', 'rajinrayamajhi21@gmail.com', 'hello sir', '2025-02-24 16:48:15'),
(3, 'Rabin Thapa', 'raveenthpa@gmail.com', 'my name', '2025-02-24 16:50:16'),
(4, 'Rajin Rayamajhi', 'rajinrayamajhi21@gmail.com', 'hi', '2025-02-24 16:51:09'),
(5, 'Rabin Thapa', 'raveenthpa@gmail.com', 'hi', '2025-02-24 16:51:39'),
(6, 'Rabin Thapa', 'raveenthpa@gmail.com', 'hi', '2025-02-24 16:52:55'),
(7, 'Rabin Thapa', 'raveenthpa@gmail.com', 'hello', '2025-02-25 05:31:56'),
(8, 'Rabin Thapa', 'raveenthpa@gmail.com', 'hello', '2025-02-25 05:32:44'),
(9, 'Rabin Thapa', 'raveenthpa@gmail.com', 'hello', '2025-02-25 08:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(255) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `friend_id` int(255) NOT NULL,
  `last_msg_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `unique_id`, `friend_id`, `last_msg_id`) VALUES
(17, 1532290356, 950813576, 359),
(51, 346231911, 1494273371, 365),
(52, 1494273371, 346231911, 365),
(53, 280583920, 1341642802, 374),
(54, 1341642802, 280583920, 374),
(55, 212461806, 1341642802, 374),
(56, 1341642802, 212461806, 374),
(57, 1341642802, 805768377, 374),
(58, 805768377, 1341642802, 374),
(59, 1193537362, 1341642802, 374),
(60, 1341642802, 1193537362, 374);

-- --------------------------------------------------------

--
-- Table structure for table `friend_req`
--

CREATE TABLE `friend_req` (
  `req_id` int(255) NOT NULL,
  `from_req_id` int(255) NOT NULL,
  `to_req_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend_req`
--

INSERT INTO `friend_req` (`req_id`, `from_req_id`, `to_req_id`, `status`) VALUES
(14, 950813576, 1014738211, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `date_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hastag` varchar(255) NOT NULL,
  `full_username` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `about` varchar(150) NOT NULL DEFAULT '''I''''am Happy User''',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'logo.jpg',
  `status` varchar(255) NOT NULL,
  `reg_datetime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `username`, `hastag`, `full_username`, `gender`, `about`, `email`, `password`, `img`, `status`, `reg_datetime`) VALUES
(101, 157237235, 'rabin', '#8434', 'rabin#8434', NULL, '\'I\'\'am Happy User\'', 'raveenthpa@gmail.com', '$2y$10$7sqnx0aDSTwjDtgwH7OpgevI6CUDZaPMcMC1gUmWtnRW3CjBVCykS', 'logo.jpg', 'Offline now', '2025-03-09 10:12:20.151163'),
(102, 1597893243, 'samir10', '#9007', 'samir10#9007', NULL, '\'I\'\'am Happy User\'', 'rbthapa23432@gmail.com', '$2y$10$OLxyGRqr/DbQPcudboqK6OgvcCioobKb.FYUIOEvKR9l.QnC1HXHG', 'logo.jpg', 'Offline now', '2025-03-09 10:14:07.804595');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_req`
--
ALTER TABLE `friend_req`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `friend_req`
--
ALTER TABLE `friend_req`
  MODIFY `req_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
