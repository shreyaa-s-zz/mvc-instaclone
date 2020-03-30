-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2020 at 06:38 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `postId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `commentNote` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `userId`, `username`, `commentNote`) VALUES
(1, 4, 9, 'rk', 'hello'),
(2, 4, 9, 'rk', 'hy');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `imagePath` varchar(500) NOT NULL,
  `likes` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userId`, `username`, `caption`, `imagePath`, `likes`) VALUES
(1, 7, 'ishu', 'easy', '/assets/upload/Screenshot_20200301_121156.png', 0),
(2, 7, 'ishu', 'hard', '/assets/upload/Screenshot_20200317_150449.png', 0),
(3, 8, 'geeta', 'medium', '/assets/upload/Screenshot_20200301_124325.png', 0),
(4, 8, 'geeta', 'easy', 'assets/upload/Screenshot_20200317_150449.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'shreyaa', 'Shreya Sharma', 'shreyaa_s@ce.iitr.ac.in', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f'),
(7, 'ishu', 'ishu', 'ishu@gmail.com', '131e9766ff2a9ea6efdeb2af5f4b1ff8c00d5e0c756cde5aee314afc5a66fec2'),
(8, 'geeta', 'geeta', 'geeta@gmail.com', '23fdf9ed25cb4f7b499cd78cf166fa6f07585ba4afea23cdf25076b6d2e93df2'),
(9, 'rk', 'rk', 'rk@gmail.com', 'da8d176f739559b1fb9c2b64cbe793ce280732f2ef239090d75df41dc9054e7c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
