-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 08:03 AM
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
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinates`
--

CREATE TABLE `coordinates` (
  `x` double NOT NULL,
  `y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinates`
--

INSERT INTO `coordinates` (`x`, `y`) VALUES
(199, 50),
(322, 239),
(222, 47),
(306, 206),
(114, 63),
(344, 191),
(86, 268),
(319, 322);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `division` int(11) NOT NULL,
  `division_name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `contact_number`, `division`, `division_name`, `password`) VALUES
(130, 'Zealous123', 'fig', 'zem18@gmail.com', '', 0, '', '123'),
(131, 'Yor', 'Rexcelent', 'zem18@gmail.com', '09472031935', 0, '', '123'),
(132, 'Brad', 'gff', 'zem18@gmail.com', '2323232', 0, '', '123');

-- --------------------------------------------------------

--
-- Table structure for table `userslist`
--

CREATE TABLE `userslist` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `division` int(11) NOT NULL,
  `division_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userslist`
--

INSERT INTO `userslist` (`user_id`, `first_name`, `last_name`, `contact_number`, `division`, `division_name`) VALUES
(1, 'Pter manism', 'fig', '+123456789', 1, 'Team secret 1'),
(2, 'Elon ', 'musk', '+111222333', 2, 'Team secret 2'),
(3, 'Will h', 'smith', '+111333555', 3, 'Team secret 3'),
(4, 'Bob ', 'bob', '+111555999', 4, 'Team secret 4'),
(5, 'Joji', 'Rexcelent', '+3244778899', 5, 'Team secret 5'),
(6, 'Emminem', 'Figueroa', '+4499778855', 6, 'Team secret 6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userslist`
--
ALTER TABLE `userslist`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `userslist`
--
ALTER TABLE `userslist`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
