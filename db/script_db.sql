-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 11:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `script_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `new_password_requested` varchar(500) NOT NULL,
  `new_password_key` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `new_password_requested`, `new_password_key`) VALUES
(3, 'maaz', 'maaza42101@gmail.com', '$2y$10$/E2rHu1E0.n44EyYQxiSLu46GbPVkvJ2qlvm59DP3DNT3Uzwh7/FS', '2024-09-28 11:37:50', '90608ee55f56cde4cbd0cd874f4a352a'),
(5, 'admin', 'admin@gmail.com', '$2y$10$1iW1g8lVGH90qpuhLe/OOuRzdz.3OqE45ZKFWMr9AjsPgQbQwL3N6', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `script`
--

CREATE TABLE `script` (
  `id` int(11) NOT NULL,
  `scripts` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `script`
--

INSERT INTO `script` (`id`, `scripts`) VALUES
(1, ' <script>console.log(\'Hello World\')</script>'),
(2, '<script>console.log(\'body\')</script>'),
(3, ' <script>console.log(\'Hello Footer\')</script>'),
(4, '<script>console.log(\'Thank You\')</script>');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `global_head` text NOT NULL,
  `thank_you_head` text NOT NULL,
  `global_body` text NOT NULL,
  `thank_you_body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `website_name`, `global_head`, `thank_you_head`, `global_body`, `thank_you_body`, `created_at`) VALUES
(1, 'maaz ahmed', ' <script>console.log(\'Hello World\')</script>', ' <script>console.log(\'Hello World\')</script>', ' <script>console.log(\'Hello World\')</script>', ' <script>console.log(\'Hello World\')</script>', '2024-09-27 13:17:54'),
(6, 'Gogrades', 'dfdvddsf', 'dffdsdg', 'fdfdsfd', 'dsfgfdfd', '2024-09-28 07:33:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `script`
--
ALTER TABLE `script`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `script`
--
ALTER TABLE `script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
