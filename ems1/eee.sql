-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 10:34 AM
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
-- Database: `eee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `job_position` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `task` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `deadline` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`email`, `name`, `job_position`, `department`, `task`, `description`, `deadline`, `user_id`) VALUES
('vino10@gmail.com', 'vinoth', 'Developer', 'IT', 'Develop website', 'for hotel management', '2025-03-26', '9'),
('gayuni9@gmail.com', 'Gayuni', 'Tester', 'IT', 'test the app', 'Write automated testing progress', '2025-02-22', '8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','employee') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'dushy', 'dushy1@gmail.com', '$2y$10$qbnt.quF4c0mz0RaNLcWne81AfrnLFCS3tFbYp3svLcUP7DXWbwhe', 'admin', '2025-01-22 12:27:04'),
(2, 'Sha', 'sha1@gmail.com', '$2y$10$KTvvuONQ4XBfEo220u7Wb.RMsmNPRfAbb.yzq5.oo6CSdzFsh2lKm', 'employee', '2025-01-23 08:27:34'),
(3, 'test', 'test@email.com', '$2y$10$xPyalcOuRjZlceXF20Pty.1REB5/qIr/l.SlYuXmbktSwFML.39di', 'admin', '2025-01-25 17:20:16'),
(4, 'kanish', 'kanish8@gmail.com', '$2y$10$gUHSrkBV6/pil5znbuLiCOTptvA6n31Z2CQS85nbOVymCxEHWJUL6', 'employee', '2025-01-26 05:22:26'),
(5, 'Gayuni', 'gayuni1@gmail.com', '$2y$10$Wr1/XOIMvSQ4p5VEvarXzOXO0lyL4sUDu0fRnMjPEHVe2DOLnvok2', 'employee', '2025-01-26 05:34:38'),
(6, 'Kanish', 'Kanish1@gmail.com', '$2y$10$DWMPbnMSaLPi1EDRY.QaEeIiBcnzOpGQeWWo8MfM0USyuYDl4f0Fe', 'employee', '2025-01-26 06:28:27'),
(8, 'Gayuni', 'gayuni9@gmail.com', '$2y$10$XXDJvQUqFKUlqlm0hW7Od.wCYorrtM5kbxVV9PjrHJbE/bA47mpRe', 'employee', '2025-01-26 09:14:17'),
(9, 'Vinoth', 'vino10@gmail.com', '$2y$10$QesCzce2/6UDttA0ra3CxuJUFoi4YTfrhZkPtOoaHlJ2.XieVuAom', 'employee', '2025-01-26 09:14:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
