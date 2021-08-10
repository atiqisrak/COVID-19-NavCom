-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2021 at 04:55 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navana_group`
--

-- --------------------------------------------------------

--
-- Table structure for table `Vaccinated`
--

CREATE TABLE `Vaccinated` (
  `office_id` int(6) NOT NULL,
  `employee_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `concern_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nid` int(10) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `vaccinated` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `first_dose` date DEFAULT NULL,
  `second_dose` date DEFAULT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Vaccinated`
--

INSERT INTO `Vaccinated` (`office_id`, `employee_name`, `concern_name`, `nid`, `email`, `phone`, `vaccinated`, `first_dose`, `second_dose`, `reg_date`) VALUES
(123, 'Test', '', 1234123412, 'test@email.com', '123456', 'Yes', '1969-12-31', '2021-08-08', '0000-00-00'),
(2762, 'AFZAL NAZIM', 'Navana Communication', 2147483647, 'afzal.nazim@navana.com', '+8801713361787', 'Registered, but not Vacci', '0000-00-00', '0000-00-00', '2021-08-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Vaccinated`
--
ALTER TABLE `Vaccinated`
  ADD PRIMARY KEY (`nid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
