-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 01:25 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Assignment5`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assignment5`
--

CREATE TABLE `Assignment5` (
  `ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Name` text NOT NULL,
  `URL` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Assignment5`
--

INSERT INTO `Assignment5` (`ID`, `Date`, `Name`, `URL`, `Description`) VALUES
(1, '2018-04-17 00:00:00', 'Stephen O Brien', 'www.SOB.com', 'A website devoted to how great I am. '),
(28, '2018-04-22 10:12:31', 'Bilbo Baggins', 'www.bilbobaggins.com', 'knknkjn'),
(31, '2018-04-22 10:18:27', 'Samwise Gamgee', 'www.sam.com', 'kjnkjnkj'),
(51, '2018-04-22 14:47:33', 'Conor McGregor', 'www.con.com', 'monk'),
(52, '2018-04-22 14:47:48', 'Nate Diaz', 'www.nate.com', 'kjbkjbsa'),
(53, '2018-04-22 14:51:06', 'Frasier Crane', 'www.frasier.com', 'Tossed Scrambled Eggs'),
(54, '2018-04-22 14:52:40', 'Wayne Rooney', 'www.ayne.com', 'kjkhkjh'),
(56, '2018-04-22 14:54:30', 'John Frusciante', 'www.j.com', 'kjhkjhkj'),
(57, '2018-04-22 14:55:35', 'Ned Flanders', 'www.nf.com', 'jhbkjhkjh'),
(59, '2018-04-22 16:11:28', 'Mackenzie Dern', 'www.mac.com', 'UFC Fighter.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Assignment5`
--
ALTER TABLE `Assignment5`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Assignment5`
--
ALTER TABLE `Assignment5`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
