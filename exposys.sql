-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 09:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exposys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_mail` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `a_name`, `a_mail`, `a_password`) VALUES
(4, 'Vinroy', 'vinroy2308@gmail.com', 'vinroy'),
(5, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ecat` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `edesc` varchar(255) NOT NULL,
  `eventtime` datetime DEFAULT NULL,
  `eventdeadline` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eid`, `id`, `ecat`, `ename`, `edesc`, `eventtime`, `eventdeadline`) VALUES
(6, 4, 1, 'Code_init', 'A workshop on competitive coding', '2021-07-14 16:00:00', '2021-07-12 12:00:00'),
(7, 4, 2, 'Art Attack', 'A digital art competition', '2021-07-20 10:30:00', '2021-07-18 23:59:00'),
(8, 5, 2, 'Bamboozled', 'Unleash the fun side of you and win exiting prizes', '2021-07-17 15:00:00', '2021-07-15 12:00:00'),
(9, 5, 1, 'Version control with Git and Github', 'Hands on workshop for beginners', '2021-07-25 09:30:00', '2021-07-22 20:00:00'),
(10, 4, 1, 'Technical Colloqiuim', 'Online presentation competition', '2021-07-28 12:30:00', '2021-07-26 11:39:00'),
(11, 4, 2, 'Quizdom', 'Online quiz competition', '2021-07-19 10:30:00', '2021-07-17 12:30:00'),
(12, 5, 1, 'LaTeX for beginners', 'Hands on workshop on Latex', '2021-07-21 13:00:00', '2021-07-14 12:00:00'),
(13, 4, 1, 'Coding hackathon', 'Hackathon for 2 days', '2021-07-16 13:30:00', '2021-07-15 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`uid`, `eid`) VALUES
(2, 6),
(2, 7),
(2, 11),
(3, 6),
(3, 11),
(4, 6),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_mail` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `u_name`, `u_mail`, `u_password`) VALUES
(2, 'Shraddha', 'shraddha@gmail.com', 'shraddha'),
(3, 'Vinroy', 'vinroy@gmail.com', 'vinroy'),
(4, 'Xyz', 'xyz@gmail.com', 'xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`uid`,`eid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `event` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
