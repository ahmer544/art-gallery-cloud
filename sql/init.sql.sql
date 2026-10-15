CREATE DATABASE IF NOT EXISTS `my_database`;
USE `my_database`;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 05:10 PM
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
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, '123', 'ahmer@gmail.com', '$2y$10$Pu8MX.Wqtihsv2uINJAfXOXf9qDgORgxLRJPAfbu2jrVzGmTsT1GC', '2025-02-02 17:35:18'),
(2, 'khan', 'ahme@gmail.com', '$2y$10$rT.QKBHlV5nVzNmaz/EbEeQqhymoSWZoC6VlfV.LQ3aN4r0FuP5Qi', '2025-02-02 18:47:07'),
(3, 'ahmer', 'ahmermazhar579@gmail.com', '$2y$10$gFuYvurI/4/QxiyV9ANhiuvA1YLgtXQ7cORuyQc0jg3FwTi/BBz42', '2025-03-05 16:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `user_id`, `message`, `message_date`, `status`) VALUES
(1, 1, 'afdfaf', '2025-02-03 12:35:06', 'unread'),
(2, 1, 'afdfaf', '2025-02-03 12:49:00', 'unread'),
(3, 8, 'zdbx', '2025-02-03 13:15:25', 'unread'),
(4, 1, 'approved', '2025-02-03 13:33:12', 'unread'),
(5, 11, 'hello', '2025-02-03 19:37:26', 'unread'),
(6, 11, 'done', '2025-02-03 19:40:54', 'unread'),
(7, 11, 'You have won the auction', '2025-02-06 06:45:35', 'unread'),
(8, 11, 'You have won the auction', '2025-02-06 07:03:27', 'unread'),
(9, 11, 'Helo', '2025-02-06 07:51:43', 'unread'),
(10, 1, 'hello', '2025-03-05 16:07:21', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `auction_items`
--

CREATE TABLE `auction_items` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `start_price` decimal(10,2) NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auction_items`
--

INSERT INTO `auction_items` (`id`, `title`, `artist`, `description`, `image`, `start_price`, `end_time`) VALUES
(1, 'Starry Night', 'Vincent Van Gogh', 'A famous masterpiece by Van Gogh.', 'images/starry-night.jpg', 500.00, '2025-12-31 23:59:59'),
(2, 'Mona Lisa', 'Leonardo da Vinci', 'Iconic portrait painting.', 'images/mona-lisa.jpg', 1000.00, '2025-11-30 23:59:59'),
(3, 'The Persistence of Memory', 'Salvador Dalí', 'Surreal painting with melting clocks.', 'images/persistence-of-memory.jpg', 750.00, '2025-10-31 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_amount` decimal(10,2) NOT NULL,
  `bid_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `artwork_id`, `user_id`, `bid_amount`, `bid_time`) VALUES
(1, 3, 1, 758.00, '2025-02-01 18:12:06'),
(2, 3, 1, 758.00, '2025-02-01 18:12:35'),
(3, 3, 1, 800.00, '2025-02-01 18:19:41'),
(4, 3, 1, 900.00, '2025-02-01 18:22:20'),
(5, 3, 1, 2000.00, '2025-02-01 18:23:26'),
(6, 3, 1, 2000.00, '2025-02-01 18:23:59'),
(7, 3, 1, 5200.00, '2025-02-01 18:25:04'),
(8, 3, 1, 7600.00, '2025-02-01 18:27:26'),
(9, 3, 1, 1200.00, '2025-02-01 18:31:01'),
(10, 3, 1, 840.00, '2025-02-01 18:37:38'),
(11, 3, 1, 750.00, '2025-02-01 18:38:53'),
(12, 2, 1, 4200.00, '2025-02-01 18:40:37'),
(13, 3, 1, 6500.00, '2025-02-01 18:41:26'),
(14, 3, 1, 1.00, '2025-02-03 11:51:48'),
(15, 1, 1, 600.00, '2025-02-05 19:13:22'),
(16, 3, 1, 8.00, '2025-02-06 06:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'ahmer', 'a@gmail.com', 'date', 'hello', '2025-01-27 13:51:42'),
(2, 'ahmer', 'a@gmail.com', 'date', 'afsrgerett', '2025-02-01 05:29:36'),
(3, 'khan', 'ahmer@gmail.com', 'help', 'help me', '2025-02-02 17:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_tickets`
--

CREATE TABLE `exhibition_tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_count` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `membership_type` enum('Basic','Premium','Lifetime') NOT NULL,
  `message` text DEFAULT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','accepted','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `full_name`, `email`, `phone`, `membership_type`, `message`, `application_date`, `status`) VALUES
(1, 'ahmer', 'a@gmail.com', '0320', 'Basic', '', '2025-01-27 15:17:44', 'accepted'),
(2, 'ahmer', 'ad@gmail.com', '0320', 'Basic', '', '2025-01-27 15:18:11', 'accepted'),
(5, 'ahmer', 'ade@gmail.com', '0320', 'Basic', '', '2025-01-27 15:19:59', 'accepted'),
(7, 'ahmer', 'adel@gmail.com', '0320', 'Basic', '', '2025-01-27 15:22:25', 'accepted'),
(8, 'khan', 'k@gmail.com', '32', 'Basic', '', '2025-01-27 15:23:07', 'accepted'),
(10, 'khan', 'k2@gmail.com', '32', 'Premium', '', '2025-01-27 15:24:51', 'accepted'),
(11, 'khan', '1a@gmail.com', '32', 'Basic', '', '2025-01-27 15:26:13', 'accepted'),
(13, 'ahmer', 'a12@gmail.com', '0320', 'Basic', '', '2025-01-27 16:59:24', 'pending'),
(15, 'ahmer', 'aasd@gmail.com', '3221', 'Basic', '', '2025-01-30 07:36:19', 'pending'),
(16, 'khan', 'ak1@gmail.com', '03205726544', 'Basic', '', '2025-02-01 05:28:42', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `message_type` enum('query','membership','general') NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `response` text DEFAULT NULL,
  `status` enum('pending','read','resolved') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `response_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_subscribed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `date_subscribed`) VALUES
(1, 'ahmer@gmail.com', '2025-02-03 18:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_purchases`
--

CREATE TABLE `ticket_purchases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tickets` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_purchases`
--

INSERT INTO `ticket_purchases` (`id`, `name`, `email`, `tickets`, `purchase_date`) VALUES
(1, 'ahmer', 'ak@gmail.com', 2, '2025-01-27 16:46:15'),
(2, 'ahmer', 'ak@gmail.com', 2, '2025-01-27 16:46:26'),
(3, 'ahmer', 'ak@gmail.com', 2, '2025-01-27 16:47:47'),
(4, 'ahmer', 'ak@gmail.com', 2, '2025-01-27 16:48:35'),
(5, 'ahmer', 'ak@gmail.com', 1, '2025-01-27 16:48:42'),
(6, 'ahmer', 'a@gmail.com', 1, '2025-01-27 16:54:52'),
(7, 'ahmer', 'a@gmail.com', 1, '2025-01-27 16:55:29'),
(8, 'ahmer', 'a@gmail.com', 1, '2025-01-27 16:57:48'),
(9, 'ahmer', 'ake@gmail.com', 2, '2025-01-27 17:01:20'),
(10, 'ahmer', 'ake@gmail.com', 2, '2025-01-27 17:05:39'),
(11, 'ahmer', 'ake@gmail.com', 2, '2025-01-27 17:05:47'),
(12, 'ahmer', 'aafsrgdgrt@gmail.com', 1, '2025-01-27 17:07:44'),
(13, 'ahmer', 'aafsrgdgrt@gmail.com', 1, '2025-01-27 17:11:38'),
(14, 'ahmer', 'a@gmail.com', 1, '2025-01-30 06:44:13'),
(15, 'ahmer', 'a@gmail.com', 2, '2025-01-30 07:37:11'),
(16, 'ahmer', 'a@gmail.com', 3, '2025-02-01 05:27:36'),
(17, 'khan', 'ahmer@gmail.com', 1, '2025-02-06 07:00:55'),
(18, 'ahmer', 'ahmermazhar579@gmail.com', 2, '2025-03-05 16:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_online` tinyint(1) DEFAULT 0,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_online`, `last_activity`) VALUES
(1, 'ahmer', 'aafsrgdgt@gmail.com', '$2y$10$KVdf6JmpN2uFVimtK6Crq.A9pGoS4sGO4Kgmfyv.kmPw3UT9hH0Q.', 0, '2025-02-03 15:30:23'),
(10, 'ahmer', 'ahmer@gmail.com', '$2y$10$REKTCu3K1MLZhBOTpgoAMuKOZrDGZ6jEWpaGkUxslhQjvih4ffLMK', 0, '2025-02-03 15:30:23'),
(11, 'khan', 'khan@gmail.com', '$2y$10$EKR/QjGWYsLmRie85T4DWuv6.dBTBYH3pggl1YHd2qdl25ury3wP6', 1, '2025-02-11 04:34:07'),
(12, 'admin', 'ahmermazhar579@gmail.com', '$2y$10$v2y5wHniuhDHDWvam2HnrueaAfxxgSaIDDqa2RVwN0pYsETIWFtjO', 1, '2025-03-05 16:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_log`
--

CREATE TABLE `user_activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_type` enum('login','logout') NOT NULL,
  `activity_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity_log`
--

INSERT INTO `user_activity_log` (`id`, `user_id`, `activity_type`, `activity_time`) VALUES
(1, 11, 'login', '2025-02-03 16:16:37'),
(2, 11, 'login', '2025-02-03 16:17:11'),
(3, 11, 'logout', '2025-02-03 16:25:29'),
(4, 11, 'login', '2025-02-03 16:28:00'),
(5, 11, 'logout', '2025-02-03 16:28:06'),
(6, 11, 'login', '2025-02-03 16:28:27'),
(7, 11, 'logout', '2025-02-03 17:21:03'),
(8, 11, 'login', '2025-02-03 17:21:14'),
(9, 11, 'login', '2025-02-03 18:25:56'),
(10, 11, 'logout', '2025-02-03 19:37:02'),
(11, 11, 'login', '2025-02-03 19:37:07'),
(12, 11, 'login', '2025-02-05 19:12:44'),
(13, 11, 'login', '2025-02-06 06:38:58'),
(14, 11, 'logout', '2025-02-06 06:44:05'),
(15, 11, 'login', '2025-02-06 06:45:46'),
(16, 11, 'logout', '2025-02-06 07:49:17'),
(17, 11, 'login', '2025-02-06 07:50:05'),
(18, 11, 'login', '2025-02-11 04:34:07'),
(19, 12, 'login', '2025-03-05 16:03:59'),
(20, 12, 'login', '2025-03-05 16:07:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auction_items`
--
ALTER TABLE `auction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artwork_id` (`artwork_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition_tickets`
--
ALTER TABLE `exhibition_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_purchases`
--
ALTER TABLE `ticket_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `auction_items`
--
ALTER TABLE `auction_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exhibition_tickets`
--
ALTER TABLE `exhibition_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_purchases`
--
ALTER TABLE `ticket_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD CONSTRAINT `admin_messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `memberships` (`id`);

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`artwork_id`) REFERENCES `auction_items` (`id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `exhibition_tickets`
--
ALTER TABLE `exhibition_tickets`
  ADD CONSTRAINT `exhibition_tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD CONSTRAINT `user_activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
