-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2018 at 07:51 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `eBook_MetaData`
--

CREATE TABLE `eBook_MetaData` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `creator` varchar(30) NOT NULL,
  `title` varchar(40) NOT NULL,
  `type` varchar(50) NOT NULL,
  `identifier` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `language` varchar(30) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eBook_MetaData`
--

INSERT INTO `eBook_MetaData` (`ID`, `creator`, `title`, `type`, `identifier`, `date`, `language`, `description`) VALUES
(85, 'JK Rowling', 'Half Blood Prince', 'Fantasy', '2398239iuqwu', '1997-01-20', 'EN-US', 'Harry Potter series, the 5th book of the series.'),
(86, 'Stephen Hawkings', 'The Theory of Everything', 'Horror', '9823848HHSUYS', '1999-01-01', 'FR-CA', 'This book deals with the theory of blackholes and relevations. '),
(87, 'J.R.R Tolkien', 'The Hobbit', 'Fantasy', '8373447437GGAYDG', '1939-06-05', 'EN-US', 'In a hole, there lived a hobbit. The first book of a series from J.R.R Tolkien.'),
(90, 'Topsy Kretts', 'The Number 23', 'Horror', ' 3253465464564', '2010-12-07', 'EN-US', 'The book of the award winning film, The number 23. Starring Academy Award winner, Jim Carrey.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eBook_MetaData`
--
ALTER TABLE `eBook_MetaData`
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `identifier_unique` (`identifier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eBook_MetaData`
--
ALTER TABLE `eBook_MetaData`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
