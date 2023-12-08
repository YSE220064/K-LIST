-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 06:30 AM
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
  `user_id` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_content` text NOT NULL,
  `creation_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `okaimonolists`
--

INSERT INTO `okaimonolists` (`id`, `user_id`, `list_name`, `list_content`, `creation_datetime`) VALUES
(16, 10, 'test', '1. one\n2. two\n3. three\n', '2023-12-08 05:33:56'),
(18, 12, '1', '1. a\n', '2023-12-08 05:54:36'),
(19, 13, 'test', '1. test\n', '2023-12-08 06:00:51'),
(20, 14, 'yse', '1. aaaaaaaa\n2. bbbbbbbbb\n3. ccccccccccc\n', '2023-12-08 06:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
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
(12, 'test', 'test', 'test@test.com', '$2y$10$sKNt4TmG.L.hQ2SDCK3px.S8FwL2UQPkm5lHAZPOU0.g72B00AHqu', ''),
(13, 'one', 'one', 'one@one.com', '$2y$10$qngl4Gtd3ybmCwC4AKWO3emt5uCVXUQzrLjeLUFekpDWzhWkh5Co2', ''),
(14, 'YSE', 'YSE', 'yse@test.com', '$2y$10$U34bbmRANKsv.6M6qHRnO.zU95PG5/wA2gZibgmvWsCu1uufxLdcS', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `okaimonolists`
--
ALTER TABLE `okaimonolists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
