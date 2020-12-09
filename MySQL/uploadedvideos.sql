-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:54 PM
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
-- Table structure for table `uploadedvideos`
--

CREATE TABLE `uploadedvideos` (
  `UploadedVideosID` varchar(50) NOT NULL,
  `UploadedBy` int(11) NOT NULL,
  `UploadedVideoName` varchar(50) NOT NULL,
  `UploadedVideosDescription` text NOT NULL,
  `NumberOfViews` int(11) NOT NULL DEFAULT 0,
  `UploadDate` datetime NOT NULL DEFAULT current_timestamp(),
  `NumberOfLikes` int(11) NOT NULL DEFAULT 0,
  `NumberOfDislikes` int(11) NOT NULL,
  `Hide` varchar(11) NOT NULL,
  `UploadedVideoNamef` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploadedvideos`
--
ALTER TABLE `uploadedvideos`
  ADD PRIMARY KEY (`UploadedVideosID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
