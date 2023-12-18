-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 04:31 PM
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
-- Database: `gymmngr`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(50) NOT NULL,
  `nowdate` date NOT NULL,
  `personalname` varchar(50) NOT NULL,
  `personalphone` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` int(2) NOT NULL,
  `firstvisit` int(2) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `user` varchar(50) NOT NULL COMMENT 'the user who have added this details'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='stores new enrollments here';

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `Currency` varchar(11) NOT NULL,
  `daily` int(11) NOT NULL,
  `weekly` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `vat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `Currency`, `daily`, `weekly`, `monthly`, `vat`) VALUES
(1, 'EGP', 0, 0, 0, '0,0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL COMMENT 'automatic id',
  `username` varchar(100) NOT NULL COMMENT 'the username',
  `password` varchar(100) NOT NULL COMMENT 'the access password',
  `personalname` varchar(100) NOT NULL COMMENT 'its real name',
  `permission` varchar(50) NOT NULL COMMENT 'some permissions'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='main table for users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `personalname`, `permission`) VALUES
(1, 'admin', 'admin', 'Owner', 'all');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT COMMENT 'automatic id', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
