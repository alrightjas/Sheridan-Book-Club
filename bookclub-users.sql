-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 12:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookclub-users`
--

-- --------------------------------------------------------

--
-- Table structure for table `reading_goals`
--

CREATE TABLE `reading_goals` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `goal` int(11) DEFAULT 0,
  `completed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reading_goals`
--

INSERT INTO `reading_goals` (`id`, `username`, `goal`, `completed`) VALUES
(3, 'alrightjas', 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `review_text` text DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `review_text`, `rating`, `created_at`) VALUES
(1, 'alrightjas', 'this book was great! 5/5', 5, '2025-11-24 19:45:22'),
(4, 'alrightjas', 'amazing', 5, '2025-11-24 20:30:14'),
(5, 'alrightjas', 'wowo', 3, '2025-11-24 20:30:23'),
(6, 'alrightjas', 'amazing book!', 5, '2025-11-26 03:18:07'),
(7, 'alrightjas', 'wow', 3, '2025-11-26 03:20:47'),
(8, 'alrightjas', 'amazing', 3, '2025-11-26 03:20:54'),
(9, 'fabj', 'so good wow', 4, '2025-11-26 21:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `firstname`, `lastname`, `password`, `created_at`) VALUES
(7, 'jas.em.dejesus@gmail.com', 'alrightjas', 'jas', 'dejesus', '$2y$10$DI/6ERGQ2qXVGXeq/yXlguoad8OrA/XeLeMSSi/QnAaNAdPgZp62G', '2025-11-21 20:50:58'),
(8, 'f.javines30@gmail.com', 'fabj', 'franz', 'javines', '$2y$10$ngiUuqTLZ33aqQVOuyGa3eevpR2ShJ9Hvxerx6MlUZqVGSX5VsIKW', '2025-11-21 20:54:40'),
(17, 'tinybigpotato@gmail.com', 'jas1', 'jas', 'de jesus', '$2y$10$CHOugBHCeXHcOnz1M6jygOKtPSTb/DZRwln4ZypQafM54SwtPI9E6', '2025-11-26 20:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_books`
--

CREATE TABLE `user_books` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `status` enum('current','completed') NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_books`
--

INSERT INTO `user_books` (`id`, `username`, `book_title`, `status`, `completed_at`) VALUES
(1, 'alrightjas', 'A Court of Frost and Starlight', 'completed', '2025-11-25 15:42:06'),
(2, 'alrightjas', 'Better Than The Movies', 'completed', '2025-11-25 16:30:18'),
(3, 'alrightjas', 'Throne of Glass', 'completed', '2025-11-25 16:33:28'),
(4, 'alrightjas', 'Six of Crows', 'completed', '2025-11-26 03:19:21'),
(5, 'alrightjas', 'I Am Not Jessica Chen', 'current', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reading_goals`
--
ALTER TABLE `reading_goals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_books`
--
ALTER TABLE `user_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reading_goals`
--
ALTER TABLE `reading_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_books`
--
ALTER TABLE `user_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reading_goals`
--
ALTER TABLE `reading_goals`
  ADD CONSTRAINT `reading_goals_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `user_books`
--
ALTER TABLE `user_books`
  ADD CONSTRAINT `user_books_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
