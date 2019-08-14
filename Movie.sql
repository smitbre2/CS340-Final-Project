-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Aug 14, 2019 at 04:14 PM
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
(66, 'Crawl', 'Movie about a family in a hurricane', 2019, 3, 'Thriller'),
(121, 'The Wizard of Oz', 'Journey to find the Wizard', 1939, 4, 'Fantasy'),
(161, 'The Godfather', 'Movie about organized crime family', 1972, 5, 'Drama'),
(190, 'Top Gun', 'The Top Gun Naval Fighter Weapons School is where the best of the best train to refine their elite flying skills', 1986, 5, 'Drama'),
(331, 'Looper', 'In a future society, time-travel exists, but it\'s only available to those with the means to pay for it on the black market.', 2012, 2, 'Action'),
(434, 'Ferris Bueller\'s Day Off', 'Ferris Bueller has an uncanny skill at cutting classes and getting away with it.', 1986, 5, 'Drama'),
(475, 'Titanic', 'Movie about the Titanic sinking', 1997, 5, 'Drama'),
(641, 'The Bourne Identity', 'The story of a man, salvaged, near death, from the ocean by an Italian fishing boat. When he recuperates, the man suffers from total amnesia, without identity or background.', 2002, 5, 'Action');

--
-- Triggers `Movie`
--
DELIMITER $$
CREATE TRIGGER `dec_cat` BEFORE DELETE ON `Movie` FOR EACH ROW BEGIN
UPDATE Categories
	SET MOVIES_IN_CAT = MOVIES_IN_CAT - 1
	WHERE CATEGORY = (SELECT DISTINCT CATEGORY FROM Movie WHERE Movie.CATEGORY=old.CATEGORY);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `incr_cat` AFTER INSERT ON `Movie` FOR EACH ROW BEGIN
UPDATE Categories
	SET MOVIES_IN_CAT = MOVIES_IN_CAT + 1
	WHERE CATEGORY = (SELECT DISTINCT CATEGORY FROM Movie WHERE Movie.CATEGORY=new.CATEGORY);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inventory_add` AFTER INSERT ON `Movie` FOR EACH ROW BEGIN
INSERT INTO Inventory(MOVIE_ID, STOCK, STOCK_OUT)
VALUES (new.MOVIE_ID, 1, 0);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inventory_remove` BEFORE DELETE ON `Movie` FOR EACH ROW BEGIN
DELETE FROM Inventory
    WHERE Inventory.MOVIE_ID = old.MOVIE_ID;
END
$$
DELIMITER ;

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
