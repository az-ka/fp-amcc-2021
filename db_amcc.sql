-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 09:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_amcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tutang`
--

CREATE TABLE `tutang` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nom` bigint(20) NOT NULL,
  `ket` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutang`
--

INSERT INTO `tutang` (`id`, `name`, `nom`, `ket`) VALUES
(6, 'Aldzi', 2000, 'Utang'),
(11, 'Shady', 2000, 'Dulu Utang'),
(33, 'Firdana', 70000, 'Utang'),
(37, 'Paijo', 100000, 'Utang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tutang`
--
ALTER TABLE `tutang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutang`
--
ALTER TABLE `tutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
