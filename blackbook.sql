-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 03:53 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `matric_no` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `crime` varchar(255) NOT NULL,
  `complainer` varchar(255) NOT NULL,
  `eye_witness` varchar(255) NOT NULL,
  `penalty` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blacklist`
--

INSERT INTO `blacklist` (`id`, `surname`, `first_name`, `middlename`, `matric_no`, `department`, `faculty`, `level`, `sex`, `crime`, `complainer`, `eye_witness`, `penalty`, `passport`, `date`) VALUES
(8, 'Deal', 'With', 'Pride', 2147483647, 'DOit', 'Traine', '700Level', 'Others', 'Failure', 'Ground', 'Bandits', '1 Year Ban', '500.jpg', '2002-10-21'),
(9, 'he', 'wont', 'listen', 778787878, 'ddeeddd', 'sasasasa', '600Level', 'Male', 'aauuuuuu', 'auauauauua', 'kjkjkjkjkk', 'kkkkkkk', '2.jpg', '2000-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `first_name`, `middle_name`, `usertype`, `email`, `username`, `pwd`, `image`) VALUES
(9, 'oke', 'monday', 'whenayon', 'admin', 'mondayoke93@gmail.com', 'mdconnect', '$2y$10$OBXd2.qm/.1VK0x3F2lKB.HbH8WKTjkgRx1afUns81W8PB4826Q9G', 'IMG_0496.JPG'),
(10, 'Omojuwa', 'Oluwatoyin', 'Abosede', 'dean student affairs', 'oluwatoyin.60@yahoo.com', 'toyintoyin', '$2y$10$lZ07gKWDKiGQll2/nlUVye.BG54kfxgJA86F7t.cAtJnaB7RILSqK', 'IMG-20180428-WA0005.jpg'),
(11, 'Emmanuel', 'Sunday', 'Bolaji', 'sdc', 'emmasunny@gmail.com', 'emma', '$2y$10$8PezCQKQl.gY6uDAQ/AutOfw3tOtTbqEm2qhHmKv5rhlw3yfyY4Iq', 'IMG-20180418-WA0002.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
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
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
