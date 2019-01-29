-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 07:46 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cannon`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bickree_id` int(11) NOT NULL,
  `comment_type` int(11) NOT NULL COMMENT '1=red card, 2=green card ,3=crane card, 4=last word',
  `detail` varchar(255) NOT NULL,
  `entery_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `bickree_id`, `comment_type`, `detail`, `entery_date`) VALUES
(45, 27, 29, 3, 'sdaf', '2019-01-20 23:04:01'),
(46, 27, 30, 4, 'adfads', '2019-01-17 23:04:13'),
(47, 27, 29, 1, '', '2019-01-17 23:04:38'),
(48, 27, 29, 2, '', '2019-01-17 23:04:44'),
(49, 27, 30, 1, '', '2019-01-17 23:04:55'),
(50, 27, 30, 2, '', '2019-01-17 23:04:59'),
(51, 27, 31, 2, '', '2019-01-17 23:05:02'),
(53, 27, 31, 1, '', '2019-01-17 23:05:10'),
(54, 27, 29, 1, 'ads', '2019-01-21 05:00:00'),
(55, 27, 29, 1, '', '2019-01-21 05:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `decription` longtext NOT NULL,
  `event_photo` varchar(255) NOT NULL,
  `entery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `slide_img` varchar(255) NOT NULL,
  `entery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `slide_img`, `entery_date`) VALUES
(8, '1547549470_4k-wallpaper-automotive-bike-1413412.jpg', '2019-01-15'),
(9, '1547549470_clem-onojeghuo-175917-unsplash.jpg', '2019-01-15'),
(10, '1547549471_fineas-anton-136459-unsplash.jpg', '2019-01-15'),
(11, '1547549471_free-strass-vector-gold-glitter-texture-on-black-background.jpg', '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `user_pic` varchar(255) NOT NULL,
  `bick_class` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `extracurricular` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 0=not active',
  `account_type` int(11) NOT NULL COMMENT '1=admin, 2=member, 3=bikerrer',
  `entery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `username`, `password`, `hometown`, `user_pic`, `bick_class`, `major`, `extracurricular`, `status`, `account_type`, `entery_date`) VALUES
(6, 'Cannon', 'Admin', 'admin@gmail.com', 'admin', 'TVlRemJoY0I5T1VMWnJieXVJaXY4Zz09', '', '', '', '', '', 0, 1, '2019-01-17'),
(27, 'Ahmad', 'Qureshi', 'ahmad@gmail.com', 'member', 'TVlRemJoY0I5T1VMWnJieXVJaXY4Zz09', '', '', 'Class', 'Major', 'Extracuricular', 0, 2, '2019-01-21'),
(28, 'nafees', 'khan', 'nafees@gmail.com', 'nafees', 'TVlRemJoY0I5T1VMWnJieXVJaXY4Zz09', '', '', '', '', '', 0, 2, '2019-01-18'),
(29, 'umair', 'majeed', 'umair@gmail.com', 'umair', 'TVlRemJoY0I5T1VMWnJieXVJaXY4Zz09', 'Lahore', '1547812976_1547549470_4k-wallpaper-automotive-bike-1413412.jpg', 'Class', 'Major', 'Extra', 0, 3, '2019-01-19'),
(30, 'asad', 'khan', 'asad@gmail.com', 'asad', 'TVlRemJoY0I5T1VMWnJieXVJaXY4Zz09', 'Lahore', '1547812991_1547549470_clem-onojeghuo-175917-unsplash.jpg', 'Class', 'Major', 'Extracuricular', 0, 3, '2019-01-18'),
(31, 'Bickree', 'name', 'bickree@gmail.com', 'bickree', 'TVlRemJoY0I5T1VMWnJieXVJaXY4Zz09', 'Lahore', '1547813008_1547549471_fineas-anton-136459-unsplash.jpg', 'Class', 'Major', 'Extra', 0, 3, '2019-01-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
