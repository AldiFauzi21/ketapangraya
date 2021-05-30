-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2021 at 06:17 AM
-- Server version: 10.1.43-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibicoid_ketapangraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menyukai_galeri`
--

CREATE TABLE `admin_menyukai_galeri` (
  `id` int(6) NOT NULL,
  `id_galeri` int(5) NOT NULL,
  `NIK` varchar(16) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menyukai_galeri`
--
ALTER TABLE `admin_menyukai_galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_galeri_galeri` (`id_galeri`),
  ADD KEY `admin_galeri_admin` (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menyukai_galeri`
--
ALTER TABLE `admin_menyukai_galeri`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menyukai_galeri`
--
ALTER TABLE `admin_menyukai_galeri`
  ADD CONSTRAINT `admin_galeri_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_galeri_galeri` FOREIGN KEY (`id_galeri`) REFERENCES `galeri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
