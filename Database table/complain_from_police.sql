-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2020 at 10:48 AM
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
-- Table structure for table `complain_from_police`
--

CREATE TABLE `complain_from_police` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `complain_id` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `complain_type` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `upload_link` varchar(255) NOT NULL,
  `complain_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_from_police`
--

INSERT INTO `complain_from_police` (`id`, `user_id`, `complain_id`, `status`, `user_name`, `user_email`, `complain_type`, `place`, `message`, `upload_link`, `complain_time`) VALUES
(1, 2, 'PC25359544', 'In process', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Others', 'Chittagong', 'Hi!', '', '2020-05-07 07:48:31.997865'),
(2, 2, 'PC54893549', 'Solved', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Pickpocket', 'asdasd', 'asdasd', '158880833165301405_700792303698076_5903102467230400512_n.jpg', '2020-05-07 09:18:30.480212'),
(3, 2, '3', 'Solved', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Pickpocket', 'Chittagong', '', '', '2020-05-07 09:15:53.373301'),
(4, 2, 'PC64540834', 'Solved', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Fight', 'adasdadasdasd', 'asdasdasdsdadad', '', '2020-05-07 09:50:41.652302'),
(5, 2, 'PC95884192', 'Solved', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Fight', 'asdadasdasd', 'asdasdasdasd', '', '2020-05-07 09:48:09.607855'),
(6, 2, 'PC05895733', 'Not processing', '', '', 'Null', '', '', '', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain_from_police`
--
ALTER TABLE `complain_from_police`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain_from_police`
--
ALTER TABLE `complain_from_police`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
