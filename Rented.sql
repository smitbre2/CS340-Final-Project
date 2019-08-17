-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Aug 16, 2019 at 06:15 PM
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
  `CURR_DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rented`
--

INSERT INTO `Rented` (`USER_ID`, `MOVIE_ID`, `CURR_DATE`) VALUES
(626, 8, '2019-08-16 18:02:24'),
(626, 475, '2019-08-16 16:35:36'),
(1555, 8, '2019-08-16 18:02:34'),
(1555, 121, '2019-08-16 16:32:24');

--
-- Triggers `Rented`
--
DELIMITER $$
CREATE TRIGGER `update_stock_in` BEFORE DELETE ON `Rented` FOR EACH ROW BEGIN
 	UPDATE Inventory
	SET STOCK = STOCK + 1, STOCK_OUT = STOCK_OUT - 1
	WHERE MOVIE_ID = (SELECT DISTINCT MOVIE_ID FROM Inventory WHERE Inventory.MOVIE_ID=old.MOVIE_ID);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock_out` AFTER INSERT ON `Rented` FOR EACH ROW BEGIN
 	UPDATE Inventory
	SET STOCK = STOCK - 1, STOCK_OUT = STOCK_OUT + 1
	WHERE MOVIE_ID = (SELECT DISTINCT MOVIE_ID FROM Inventory WHERE Inventory.MOVIE_ID=new.MOVIE_ID);
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
