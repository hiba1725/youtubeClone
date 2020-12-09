-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `displayedvideodetails`
--

CREATE TABLE `displayedvideodetails` (
  `ID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `UploadedBy` int(11) NOT NULL,
  `ViewingBy` int(11) NOT NULL,
  `LikedBefore` tinyint(1) NOT NULL DEFAULT 0,
  `DisLikedBefore` tinyint(1) NOT NULL DEFAULT 0,
  `ViewedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `displayedvideodetails`
--
ALTER TABLE `displayedvideodetails`
  ADD PRIMARY KEY (`ID`,`UploadedBy`,`ViewingBy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
