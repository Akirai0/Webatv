-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 04:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webatv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lg_p`
--

CREATE TABLE `lg_p` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `namep` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `s_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lg_p`
--

INSERT INTO `lg_p` (`id`, `image`, `namep`, `price`, `s_price`) VALUES
(1, 0x6c67206f6c65642065766f2e61766966, 'LG OLED evo 4K Smart TV รุ่น OLED55C3PSA', '฿60,990', 60990),
(2, 0x6c67206f6c65642e61766966, 'LG OLED 4K Smart TV รุ่น OLED55B3PSA', '฿56,490', 56490),
(3, 0x6c6720716e65642e61766966, 'LG QNED Mini LED 8K Smart TV รุ่น 65QNED99SQB', '฿129,990', 129990);

-- --------------------------------------------------------

--
-- Table structure for table `samsung_p`
--

CREATE TABLE `samsung_p` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `namep` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `s_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `samsung_p`
--

INSERT INTO `samsung_p` (`id`, `image`, `namep`, `price`, `s_price`) VALUES
(1, 0x6e656f716c6564346b2e61766966, '85\" Neo QLED 4K QN90C', '฿139,990', 139990),
(3, 0x716c6564346b2e61766966, '77\" OLED 4K S95C', '฿169,990', 169990),
(4, 0x71716c6564346b2e61766966, '75\" QLED 4K QE1C', '฿35,990', 35990);

-- --------------------------------------------------------

--
-- Table structure for table `tcl_p`
--

CREATE TABLE `tcl_p` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `namep` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `s_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tcl_p`
--

INSERT INTO `tcl_p` (`id`, `image`, `namep`, `price`, `s_price`) VALUES
(1, 0x74636c206d696e692e706e67, 'TCL Mini LED All-Round TV', '฿89,990', 89990),
(2, 0x74636c20716c65642e706e67, 'TCL 85\" C645 4K QLED HDR 10+ Dolby Vision Atmos DLG 120Hz Google TV', '฿55,990', 55990),
(3, 0x74636c20716c65642067616d696e672e706e67, 'TCL C745 QLED Gaming TV', '฿39,990', 39990);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `memberlevel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `address`, `email`, `memberlevel`) VALUES
(1, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'a@gmail.com', 'a'),
(2, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b', 'b', 'b@gmail.com', 'm'),
(4, 'c', 'c', 'c', 'c', 'c@gmail.com', 'a'),
(5, 'd', 'd', 'd', 'd', 'd@gmail.com', 'a'),
(6, 'e', 'e', 'e', 'e', 'e@gmail.com', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `memberlevel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `username`, `password`, `firstname`, `lastname`, `address`, `email`, `memberlevel`) VALUES
(1, 'Akiraie', '698d51a19d8a121ce581499d7b701668', 'Thanuphat', 'buakamsri', 'abcde', 'Akirai@gmail.com', 'a'),
(2, 'akirai11', '698d51a19d8a121ce581499d7b701668', 'akirai', 'akiraie', 'asdkdgsgs', 'akirai2211@gmail.com', 'memberleve'),
(3, 'akirai22', 'bcbe3365e6ac95ea2c0343a2395834dd', 'akirai', 'akiraie', 'asdkdgsgs', 'akirai3322@gmail.com', 'memberleve'),
(4, 'akirai33', '310dcbbf4cce62f762a2aaa148d556bd', 'akirai', 'akiraie', 'asdkdgsgs', 'akirai2244@gmail.com', 'a'),
(5, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'aaa', 'a@gmail.com', 'a'),
(6, 'q', '7694f4a66316e53c8cdd9d9954bd611d', 'q', 'q', 'q', 'q@gmail.com', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lg_p`
--
ALTER TABLE `lg_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samsung_p`
--
ALTER TABLE `samsung_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tcl_p`
--
ALTER TABLE `tcl_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lg_p`
--
ALTER TABLE `lg_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `samsung_p`
--
ALTER TABLE `samsung_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tcl_p`
--
ALTER TABLE `tcl_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
