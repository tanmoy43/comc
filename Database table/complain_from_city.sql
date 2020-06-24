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
-- Table structure for table `complain_from_city`
--

CREATE TABLE `complain_from_city` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `complain_id` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `complain_type` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `message` varchar(2555) NOT NULL,
  `upload_link` varchar(255) NOT NULL,
  `complain_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_from_city`
--

INSERT INTO `complain_from_city` (`id`, `user_id`, `complain_id`, `status`, `user_name`, `user_email`, `complain_type`, `place`, `message`, `upload_link`, `complain_time`) VALUES
(6, 2, 'CC23418233', 'Solved', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Street Lighting', 'asd', 'asdasdas', '', '2020-05-09 03:50:52.295032'),
(7, 2, 'CC42459583', 'Not processing', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Street Lighting', 'asdas', 'asdasd', '', '2020-05-09 02:43:11.841449'),
(8, 2, 'CC54845823', 'Not processing', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Street Lighting', 'chakbazar', 'asdasd', '', '2020-05-10 15:36:24.791122'),
(9, 2, 'CC30440382', 'Not processing', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Street Lighting', 'chakbazar', 'asdasd', '', '2020-05-10 15:36:29.621976'),
(10, 2, 'CC43455419', 'Not processing', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Street Lighting', 'chakbazar', 'asdasd', '', '2020-05-10 15:40:09.789357'),
(11, 2, 'CC74916188', 'Not processing', 'Tanmoy Barua', 'tanmoybarua1@gmail.com', 'Health Care', 'sdfsfsf', 'asdsad', '', '2020-05-10 15:50:45.428317'),
(12, 10, 'CC41449519', 'In process', 'Dipanjal', 'dipanjal56@gmail.com', 'Street Lighting', 'rahamatganj', 'xyz', '158913783392137009_576198336318438_5775324875187027968_o.png', '2020-05-13 03:06:35.048196');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain_from_city`
--
ALTER TABLE `complain_from_city`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain_from_city`
--
ALTER TABLE `complain_from_city`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
