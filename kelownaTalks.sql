-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2021 at 08:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelownaTalks`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `categoryName`) VALUES
(1, 'Events'),
(2, 'Sites To See'),
(3, 'Gallery'),
(4, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `content` varchar(400) NOT NULL,
  `pid` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `commentdate` timestamp NULL DEFAULT current_timestamp(),
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `content`, `pid`, `username`, `commentdate`, `category`) VALUES
(1, 'wow', 4, 'francesca', '2021-12-08 03:15:00', 'Events'),
(18, 'This is great!', 4, 'francesca', '2021-12-08 06:18:03', 'Events'),
(19, 'This is great!', 4, 'francesca', '2021-12-08 06:20:12', 'Events');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `postDate` timestamp NULL DEFAULT current_timestamp(),
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `username` varchar(11) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `postDate`, `title`, `content`, `username`, `category`) VALUES
(1, '2021-12-08 04:10:40', 'farmer\'s market', 'check out local farmer\'s market from 8AM TO 2PM Mon-FRI', 'kkuckian', 'Events'),
(2, '2021-12-08 04:11:36', 'music concert', 'music concert on Dec 31 2021 at downtown Kelowna ', 'franny', 'Events'),
(3, '2021-12-08 01:47:58', 'Apple Picking', 'Go Apple Picking at Kelowna Farms', 'franny', 'Events'),
(4, '2021-12-08 01:48:50', 'Wine Tasting', 'Go on a wine tasting tour', 'kkuckian', 'Events'),
(6, '2021-12-08 06:14:44', 'local thrift store', 'Local thrift store at 1234 west avenue! \r\nAWESOME PRICES \r\nOpen 9 AM - 6 PM (MON - SAT)', 'franny', 'Business'),
(8, '2021-12-08 06:28:48', 'lisa\'s tailoring\r\n\r\n', 'have pants that need to be hemmed? shirt that needs it\'s buttons replaced?\r\nAnything sewing related can be done here! \r\ncall 1 (234)-456-7890\r\n', 'kkuckian', 'Business'),
(9, '2021-12-08 06:30:27', 'covid outbreak - downtown Kelowna', 'news about covid outbreak in Kelowna downtown. 100s of people been affected. stay indoors', 'francesca', 'News'),
(10, '2021-12-08 06:31:28', 'Downtown Marina', 'take a walk along the downtown marina while enjoying a beautiful view of the Okanagan Lake', 'kkuckian', 'Sites To See');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(15) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `disable` tinyint(1) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`username`, `password`, `firstName`, `lastName`, `email`, `disable`, `isAdmin`) VALUES
('aanchal', '8f4ead2befdb85868edbe7e1417f432c', 'aanchal', 'kuckian', 'aanchalkuckian@gmail.com', NULL, NULL),
('franny', '5f4dcc3b5aa765d61d8327deb882cf99', 'fran', 'drescher', 'franny@gmail.com', NULL, NULL),
('kkuckian', '25d55ad283aa400af464c76d713c07ad', 'khushee', 'kuckian', 'khusheekuckian@yahoo.com', 1, 0),
('vjha', '463e67e110bace76024c3ba6e8b53c14', 'varun', 'jha', 'vjha@gmail.com', NULL, NULL),
('vova1010', '5eee9cd75302ace6e9dc809a587aa64a', 'vlad', 'shevliakov', 'vova1010@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
