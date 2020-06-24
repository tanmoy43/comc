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
-- Table structure for table `complain_remark_city`
--

CREATE TABLE `complain_remark_city` (
  `id` int(50) NOT NULL,
  `complain_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `remark_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_remark_city`
--

INSERT INTO `complain_remark_city` (`id`, `complain_id`, `status`, `remark`, `remark_date`) VALUES
(1, 'CC42459583', 'Not processing', '', '2020-05-09 03:31:14.085910'),
(2, 'CC23418233', 'Solved', '', '2020-05-09 03:50:52.297104'),
(3, 'CC54845823', '', '', '2020-05-10 15:36:24.793359'),
(4, 'CC30440382', '', '', '2020-05-10 15:36:29.624470'),
(5, 'CC43455419', '', '', '2020-05-10 15:40:09.795952'),
(6, 'CC74916188', '', '', '2020-05-10 15:50:45.432378'),
(7, 'CC41449519', '', '', '2020-05-10 19:10:33.099505'),
(8, 'CC41449519', 'In process', '', '2020-05-13 03:06:35.053391');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain_remark_city`
--
ALTER TABLE `complain_remark_city`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain_remark_city`
--
ALTER TABLE `complain_remark_city`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
