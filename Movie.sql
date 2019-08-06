-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Jul 26, 2019 at 10:12 AM
-- Server version: 10.3.13-MariaDB-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_mahlert`
--

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE `Movie` (
  `MOVIE_ID` int(4) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `RATING` int(1) NOT NULL,
  `CATEGORY` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`MOVIE_ID`, `NAME`, `DESCRIPTION`, `YEAR`, `RATING`, `CATEGORY`) VALUES
(8, 'Yesterday', 'Movie about musician and The Beatles.', 2019, 4, 'Drama'),
(14, 'Once Upon A Time In Hollywood', 'A Movie about an actor and their stunt double trying to find roles in Golden Age Hollywood', 2019, 5, 'Drama'),
(19, 'The Lion King', 'Movies about animals.', 2019, 4, 'Kids'),
(66, 'Crawl', 'Movie about a family in a hurricane', 2019, 3, 'Thriller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`MOVIE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
