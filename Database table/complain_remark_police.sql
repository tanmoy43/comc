-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2020 at 10:49 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanmoyba_comc`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain_remark_police`
--

CREATE TABLE `complain_remark_police` (
  `id` int(50) NOT NULL,
  `complain_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `remark_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_remark_police`
--

INSERT INTO `complain_remark_police` (`id`, `complain_id`, `status`, `remark`, `remark_date`) VALUES
(1, 'PC25359544', 'In process', '', '2020-05-07 01:18:45.796879'),
(2, 'PC25359544', 'In process', '', '2020-05-07 01:39:56.051271'),
(3, 'PC25359544', 'In process', '', '2020-05-07 01:42:40.909936'),
(4, 'PC25359544', 'In process', '', '2020-05-07 01:48:31.999621'),
(5, 'PC54893549', 'In process', 'in process', '2020-05-07 01:51:50.557881'),
(6, '3', 'Solved', '', '2020-05-07 03:34:20.600012'),
(7, 'PC54893549', 'Solved', 'solved', '2020-05-07 03:18:30.482526'),
(8, 'PC64540834', '', '', '2020-05-07 03:45:30.722492'),
(9, 'PC95884192', '', '', '2020-05-07 03:45:55.859852'),
(10, 'PC64540834', 'In process', 'in process we are thinking', '2020-05-07 16:41:59.640377'),
(11, 'PC64540834', 'Solved', 'problem solved', '2020-05-07 16:43:07.460805'),
(12, 'PC05895733', '', '', '2020-05-08 16:21:08.718729'),
(13, 'PC05895733', 'Not processing', 'adasd', '2020-05-09 06:06:42.717337');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain_remark_police`
--
ALTER TABLE `complain_remark_police`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain_remark_police`
--
ALTER TABLE `complain_remark_police`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
