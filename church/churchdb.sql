-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 04:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE `appointment_tbl` (
  `appointmentid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `adrss` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `appdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_tbl`
--

INSERT INTO `appointment_tbl` (`appointmentid`, `lastname`, `firstname`, `contact`, `adrss`, `purpose`, `appdate`) VALUES
(3, 'bedico', 'swett', '09182876539', 'cupang muntin', 'Marriage', '2021-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_tbl`
--

CREATE TABLE `reserve_tbl` (
  `reserve_id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adrss` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve_tbl`
--

INSERT INTO `reserve_tbl` (`reserve_id`, `lastname`, `firstname`, `gender`, `age`, `phone`, `adrss`, `purpose`, `file_url`) VALUES
(5, 'tadena', 'johnmark', 'Male', '21', '09281609620', 'cupang', 'Marriage', 'FILE-60a83112712c80.60075282.docx'),
(6, 'Lepio', 'chris', 'Female', '21', '09872765489', 'paranaque', 'Baptismal', 'FILE-60a8314ae11df0.98178150.docx'),
(7, 'tadena', 'lani', 'Male', '21', '09783628793', 'poblacion', 'Baptismal', 'FILE-60a849ff0d79f9.02123780.docx');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `userid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `fav_pet` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`userid`, `lastname`, `firstname`, `email`, `username`, `usertype`, `pwd`, `fav_pet`, `img_url`) VALUES
(8, 'Ebrada', 'Lanz Frealyn', 'lanzfrealynesprecion@gmail.com', 'admin123', 'Admin', '$2y$10$W9lbtev9jrLNNKRqDy9VzuszFcLZc6pQr8osHG9KK9kSTnSrOKIu.', 'dog', 'IMG-60a7849e002e65.86102995.jpg'),
(9, 'Benosa', 'Swetzell', 'benosaswett@gmail.com', 'staff01', 'Staff', '$2y$10$VvrkTUdrqa2qPgQbpsECSeKzl/d4G23EOYQt3fgMHYetn.K47tXX6', 'bird', 'IMG-60a7bcd1db0fb3.21219641.jpg'),
(10, 'ebrada', 'lanz', 'lanz@gmail.com', 'priozyne', 'Staff', '$2y$10$hcixVQ.z7DCk9pZQFC3.pu.Hv84WSIMiCj6nJ5/jTJIu0uH07BT3G', 'dog', 'IMG-60a84b417fd386.36134826.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD PRIMARY KEY (`appointmentid`);

--
-- Indexes for table `reserve_tbl`
--
ALTER TABLE `reserve_tbl`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  MODIFY `appointmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reserve_tbl`
--
ALTER TABLE `reserve_tbl`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
