-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 05:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k-list`
--

-- --------------------------------------------------------

--
-- Table structure for table `okaimonolists`
--

CREATE TABLE `okaimonolists` (
  `id` bigint(11) NOT NULL,
  `username` varchar(99) NOT NULL,
  `user_id` varchar(99) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_content` text NOT NULL,
  `creation_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `okaimonolists`
--

INSERT INTO `okaimonolists` (`id`, `username`, `user_id`, `list_name`, `list_content`, `creation_datetime`) VALUES
(64, '220064md', '1', 'test', '1. test\n', '2024-01-25 06:27:01'),
(65, '220064md', '20', 'Title', '1. Items\n', '2024-01-25 06:29:29'),
(69, '220064md', '20', 'test', '1. test\n', '2024-01-26 05:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(99) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `email`, `password`, `avatar`) VALUES
(20, '220064md', '220064md', '220064md@yse-c.net', '$2y$10$j8ujd737sGRNEN2GoWW2jONUZiItVV9PamVjtvZER/SLNZjYqgBLi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `okaimonolists`
--
ALTER TABLE `okaimonolists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `okaimonolists`
--
ALTER TABLE `okaimonolists`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
