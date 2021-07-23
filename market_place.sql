-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 07:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_place`
--

-- --------------------------------------------------------

--
-- Table structure for table `market_users`
--

CREATE TABLE `market_users` (
  `id` int(11) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `gender` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_users`
--

INSERT INTO `market_users` (`id`, `userid`, `full_name`, `state`, `phone`, `gender`, `email`, `password`, `date_register`) VALUES
(1, '84654', '', 'lagos state', '08145362848', 'male', 'olahisrael07@gmail.com', '$2y$10$n1SnriKtmE6ybb3Nrikyr.6fG/nAMv8s3pdw9GLONpWpb7qwxP1/m', '2021-07-14 23:23:55'),
(2, '98837', '', 'ebonyi', '09056404286', 'male', 'aderemi641@gmail.com', '$2y$10$8MtZSTfmQk9laRI1.ThyfeTU.zMg8i/iqe6yBEJ5ov42DbseTND9i', '2021-07-14 23:26:45'),
(3, '34928', 'justin', 'ondo', '08038457568594', 'male', 'Jonsnow@gmail.com', '$2y$10$j68Tzje7HEa0mYlBcJZrneJBpi7TL8oHgo5BSr208NUmR01KtM4aC', '2021-07-14 23:29:50'),
(4, '28256', 'olah israel', 'lagos state', '09023457543', 'male', 'olahisrael07@gmail.com', '$2y$10$rwpIEk2FpBtqanTyYXt3NOJX2FeojaNQFBQB7AZAA5/O32mPJpaQO', '2021-07-18 16:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postid` varchar(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` double NOT NULL,
  `phone` varchar(18) NOT NULL,
  `state` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` blob NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `name`, `price`, `phone`, `state`, `description`, `photo`, `date_post`) VALUES
(1, '864436', 'headset', 70000, '070390005678', 'osun state', 'hello', 0x3836343433362e706e67, '2021-07-18 17:12:23'),
(2, '778838', 'shirt', 15000, '09134756483', 'ogun state', 'I want to sell my trouser', 0x3737383833382e6a7067, '2021-07-18 17:18:05'),
(3, '587664', 'trouser', 12000, '08144858696', 'ondo state', 'For sale', 0x3538373636342e706e67, '2021-07-18 17:18:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `market_users`
--
ALTER TABLE `market_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `market_users`
--
ALTER TABLE `market_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
