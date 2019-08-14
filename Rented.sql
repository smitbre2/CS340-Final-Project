-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Aug 14, 2019 at 04:15 PM
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
-- Table structure for table `Rented`
--

CREATE TABLE `Rented` (
  `USER_ID` int(4) NOT NULL,
  `MOVIE_ID` int(4) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rented`
--

INSERT INTO `Rented` (`USER_ID`, `MOVIE_ID`, `DATE`) VALUES
(13, 14, '2019-08-06 13:27:02'),
(13, 121, '2019-08-07 11:17:07'),
(123, 434, '2019-08-07 11:17:26'),
(626, 121, '2019-08-07 11:17:46');

--
-- Triggers `Rented`
--
DELIMITER $$
CREATE TRIGGER `update_stock_after_rent` AFTER INSERT ON `Rented` FOR EACH ROW BEGIN
	UPDATE Inventory
    SET STOCK = STOCK - 1, STOCK_OUT = STOCK_OUT + 1;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock_after_return` AFTER DELETE ON `Rented` FOR EACH ROW BEGIN
	UPDATE Inventory
    SET Stock = Stock + 1, STOCK_OUT = STOCK_OUT - 1;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Rented`
--
ALTER TABLE `Rented`
  ADD PRIMARY KEY (`USER_ID`,`MOVIE_ID`),
  ADD KEY `ID` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
