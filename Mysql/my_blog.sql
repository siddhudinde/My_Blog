-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 03:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE macce_bin NOT NULL,
  `blog_title` varchar(255) COLLATE macce_bin NOT NULL,
  `blog_description` text COLLATE macce_bin NOT NULL,
  `blog_date` varchar(200) COLLATE macce_bin NOT NULL,
  `blog_image` text COLLATE macce_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=macce COLLATE=macce_bin;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `cat_name`, `blog_title`, `blog_description`, `blog_date`, `blog_image`) VALUES
(1, 1, '4', 'tech', 'hey i am siddhu dinde \r\n                            ', '2020-09-17', ''),
(3, 1, '6', 'Photos', 'Photography \r\n                            ', '2020-09-02', ''),
(4, 1, '0', 'tech', 'ddd\r\n                            ', '2020-09-20', ''),
(5, 1, 'Foodyee', 'foodyee', 'Enter Blog Description                            ', '2020-09-10', ''),
(6, 1, 'Photoholics', 'Photos', 'photooooo', '2020-09-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE macce_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=macce COLLATE=macce_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`) VALUES
(2, 'Car Bloggye\r\n', '2020-09-28 09:59:02'),
(4, 'Technologies', '2020-09-28 12:59:55'),
(5, 'Foodyee', '0000-00-00 00:00:00'),
(6, 'Photoholics', '2020-09-29 05:08:59'),
(7, 'Gamming\r\n', '2020-09-30 11:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE macce_bin NOT NULL,
  `user_password` varchar(255) COLLATE macce_bin NOT NULL,
  `first_name` varchar(255) COLLATE macce_bin NOT NULL,
  `last_name` varchar(255) COLLATE macce_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=macce COLLATE=macce_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `user_password`, `first_name`, `last_name`) VALUES
(1, 'siddhu@gmail.com', 'Siddhu@7', 'siddhu', 'Dinde'),
(2, 'tushar@gmail.com', 'tush@7', 'Tushar', 'Dinde'),
(3, 'kalpana@gmail.coma', '552200', 'kalpana', 'Dinde'),
(5, 'sign@gmail.com', 'asdfgh', 'bobbye', 'sigh'),
(6, 'michal@gmail.com', '123123', 'michal', 'lordh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
