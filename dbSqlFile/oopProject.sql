-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2020 at 03:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oopProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstName`, `lastName`, `gender`, `dateOfBirth`, `email`, `phone`, `languages`, `photo`, `createdAt`) VALUES
(1, 'Krishna', 'Narale', 'male', '1994-06-13', 'krishna.nucleosys@gmail.com', '9175077149', 'PHP', 'UserIcon.jpg', '2020-04-28 05:58:13'),
(2, 'Naveed', 'Shaikh', 'male', '1994-01-17', 'navee@gmail.com', '8484800301', 'PHP', 'UserIcon.jpg', '2020-04-27 14:49:06'),
(3, 'Tirru', 'Kute', 'female', '1999-09-28', 'tiruu@gmail.com', '9175077149', 'JavaScript', 'UserIcon.jpg', '2020-04-28 04:55:13'),
(4, 'Tirru', 'Kute', 'female', '1999-09-28', 'tiruu@gmail.com', '9175077149', 'JavaScript', 'UserIcon.jpg', '2020-04-28 04:55:20'),
(5, 'Tirru', 'Kute', 'female', '1999-09-28', 'tiruu@gmail.com', '9175077149', 'JavaScript', 'UserIcon.jpg', '2020-04-28 04:55:25'),
(6, 'Krishna', 'Narale', 'male', '2020-12-31', 'krishna.nucleosys@gmail.com', '9917077613', 'C', 'UserIcon.jpg', '2020-04-28 04:10:03'),
(7, 'Krishna', 'Narale', 'male', '2020-04-25', 'krishna.nucleosys@gmail.com', '9917077613', 'JavaScript', 'UserIcon.jpg', '2020-04-28 04:10:22'),
(8, 'Tirru', 'Narale', 'female', '2020-12-31', 'krishna.nucleosys@gmail.com', '9917077613', 'PHP', 'UserIcon.jpg', '2020-04-28 04:55:33'),
(9, 'Krishna', 'Narale', 'male', '2020-12-31', 'krishna.nucleosys@gmail.com', '9917077613', 'C', 'UserIcon.jpg', '2020-04-28 04:26:04'),
(10, 'Krishna', 'Narale', 'male', '2020-12-31', 'krishna.nucleosys@gmail.com', '9917077613', 'C, JavaScript', 'UserIcon.jpg', '2020-04-28 06:09:09'),
(12, 'Krishna', 'Narale', 'male', '2020-12-31', 'krishna.nucleosys@gmail.com', '9917077613', 'C, PHP, JavaScript', 'UserIcon.jpg', '2020-04-28 04:27:56'),
(13, 'Tirru', 'Narale', 'female', '2020-12-31', 'krishna.nucleosys@gmail.com', '9917077613', 'C, PHP', 'UserIcon.jpg', '2020-04-28 04:55:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
