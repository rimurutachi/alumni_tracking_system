-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 04:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_alumni2`
--

CREATE TABLE `register_alumni2` (
  `studentID` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `latin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_alumni2`
--

INSERT INTO `register_alumni2` (`studentID`, `firstname`, `lastname`, `middlename`, `emailaddress`, `birthday`, `telephone`, `address`, `sex`, `civilstatus`, `batch`, `course`, `latin`) VALUES
(1, 'Jimmar', 'Idioma', 'Dedal', 'jimmaridioma20@gmail.com', '2004-05-20', '09555634705', 'Bacoor, Cavite', 'Male', 'Married', '2023', 'Computer Science', 'Summa Cum Laude');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_alumni2`
--
ALTER TABLE `register_alumni2`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_alumni2`
--
ALTER TABLE `register_alumni2`
  MODIFY `studentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
