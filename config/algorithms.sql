-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 07:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algorithms`
--

-- --------------------------------------------------------

--
-- Table structure for table `algo`
--

CREATE TABLE `algo` (
  `algo_id` int(11) NOT NULL,
  `grp_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `definition` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `explanation` varchar(600) NOT NULL,
  `python` varchar(1000) NOT NULL,
  `cpp` varchar(1000) NOT NULL,
  `java` varchar(1000) NOT NULL,
  `links` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `algo`
--

INSERT INTO `algo` (`algo_id`, `grp_id`, `name`, `definition`, `image`, `explanation`, `python`, `cpp`, `java`, `links`) VALUES
(1, 1, 'BFS', '', '', '', '', '', '', ''),
(2, 1, 'DFS', '', '', '', '', '', '', ''),
(3, 1, 'Dijkstra', '', '', '', '', '', '', ''),
(4, 1, 'A star', '', '', '', '', '', '', ''),
(7, 1, 'Bidirectional', '', '', '', '', '', '', ''),
(9, 2, 'Linear', '', '', '', '', '', '', ''),
(10, 2, 'Bubble', '', '', '', '', '', '', ''),
(11, 2, 'Selection', '', '', '', '', '', '', ''),
(12, 2, 'Insertion', '', '', '', '', '', '', ''),
(13, 2, 'Merge', '', '', '', '', '', '', ''),
(14, 2, 'Quick', '', '', '', '', '', '', ''),
(15, 2, 'Heap', '', '', '', '', '', '', ''),
(23, 3, 'Linear', '', '', '', '', '', '', ''),
(24, 3, 'Jump', '', '', '', '', '', '', ''),
(25, 3, 'Binary', '', '', '', '', '', '', ''),
(26, 3, 'Exponential', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`user_id`, `name`, `email`, `password`) VALUES
(2, 'Abhishek', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `algo`
--
ALTER TABLE `algo`
  ADD PRIMARY KEY (`algo_id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `algo`
--
ALTER TABLE `algo`
  MODIFY `algo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
