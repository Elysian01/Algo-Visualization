-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 11:36 AM
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
(1, 1, 'BFS', '', 'bfs.gif', '', '', '', '', ''),
(2, 1, 'DFS', '', 'dfs.gif', '', '', '', '', ''),
(3, 1, 'Dijkstra', '', 'dijkstra2.gif', '', '', '', '', ''),
(4, 1, 'A star', '', 'astar2.gif', '', '', '', '', ''),
(7, 1, 'Greedy', '', 'best.gif', '', '', '', '', ''),
(10, 2, 'Bubble', '', 'bubble.gif', '', '', '', '', ''),
(11, 2, 'Selection', '', 'selection.gif', '', '', '', '', ''),
(12, 2, 'Insertion', '', 'insertion.gif', '', '', '', '', ''),
(13, 2, 'Merge', '', 'merge.gif', '', '', '', '', ''),
(14, 2, 'Quick', '', 'quick.gif', '', '', '', '', ''),
(15, 2, 'Heap', '', 'heap.gif', '', '', '', '', ''),
(23, 3, 'Linear', '', 'linear.gif', '', '', '', '', ''),
(24, 3, 'Jump', '', 'jump.gif', '', '', '', '', ''),
(25, 3, 'Binary', '', 'binary.gif', '', '', '', '', ''),
(26, 3, 'Exponential', '', 'exponent.gif', '', '', '', '', '');

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
(3, 'Abhishek', 'admin@gmail.com', 'm8bf5+Y=');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
