-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 05:16 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mukul`
--

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `sl` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `country` varchar(50) NOT NULL,
  `vname` varchar(255) NOT NULL,
  `vlocation` varchar(255) NOT NULL,
  `imgname` varchar(255) NOT NULL,
  `imglocation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`sl`, `id`, `name`, `age`, `gender`, `country`, `vname`, `vlocation`, `imgname`, `imglocation`) VALUES
(64, '2018000000071', 'Shafinur Rahman', 20, 'Male', 'India', 'Syringe.mp4', 'files/Syringe.mp4', 'fusion-medical.jpg', 'files/fusion-medical.jpg'),
(68, '2018000000066', 'Nafish Sadik', 20, 'Male', 'Pakistan', 'vaccine.mp4', 'files/vaccine.mp4', 'martin-sanchez.jpg', 'files/martin-sanchez.jpg'),
(72, '2018000000087', 'Mehedy Hassan Mukul', 22, 'Male', 'Bangladesh', 'covid-19 vaccine.MP4', 'files/covid-19 vaccine.MP4', 'matteo-jorjoson.jpg', 'files/matteo-jorjoson.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(3, 'accounts'),
(1, 'faculty'),
(2, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `imgname` text NOT NULL,
  `imglocation` text NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `imgname`, `imglocation`, `user_role`) VALUES
(5, 'Mehedy Hassan Mukul', 'mukulseu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mukul.png', 'files/mukul.png', 2),
(6, 'Nafish Sadik', 'rkrimon89@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'files/', 'files/profile.png', 2),
(7, 'Admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'files/', 'files/profile.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
