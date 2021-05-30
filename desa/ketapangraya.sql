-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 10:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ketapangraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NIK` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kata-sandi` varchar(20) NOT NULL,
  `ttl` varchar(35) NOT NULL,
  `tgl` timestamp(1) NOT NULL DEFAULT current_timestamp(1) ON UPDATE current_timestamp(1),
  `kontak` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `jenis` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NIK`, `nama`, `username`, `alamat`, `kata-sandi`, `ttl`, `tgl`, `kontak`, `foto`, `pekerjaan`, `jenis`) VALUES
('0', 'Rizaldi Septian Fauzi', 'aldi', 'Perumahan Cahaya Jempong Asri', 'tolong', 'Karangasem, 21 September 1999', '2021-02-19 08:16:28.6', '0871234567', 'aldi-p.jpg', 'pelajar', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `jenis` enum('fasilitas','makanan','minuman') NOT NULL,
  `NIK` varchar(16) DEFAULT NULL,
  `id_wisata` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `deskripsi`, `jenis`, `NIK`, `id_wisata`) VALUES
(1, 'kopi-hangat.jpg', 'Kopi Hangat Hanya Rp. 5.000', 'minuman', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `NIK` varchar(16) DEFAULT NULL,
  `id_wisata` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `nama`, `deskripsi`, `NIK`, `id_wisata`) VALUES
(1, 'galeri (1).jpg', 'Lesehan yang asri', '0', 1),
(2, 'galeri (4).jpg', 'Memancing dengan tenang sembari menikmati suasana matahari terbit', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kkn`
--

CREATE TABLE `kkn` (
  `nama` varchar(30) NOT NULL,
  `foto` varchar(10) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `jurusan` enum('Teknik Informatika','Peternakan','Ilmu Tanah','Kehutanan','Fisika','Kimia','Ilmu Teknologi Pangan') NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kkn`
--

INSERT INTO `kkn` (`nama`, `foto`, `nim`, `jurusan`, `instagram`, `facebook`, `twitter`, `linkedin`) VALUES
('Humaira Agustini', 'tini.jpg', 'B1D017106', 'Peternakan', 'https://www.instagram.com/humaira_agustin/', 'https://web.facebook.com/tini.amanse', '-', '-'),
('Muhammad Khalid Rozani', 'rozani.jpg', 'B1D017202', 'Peternakan', 'https://www.instagram.com/rozanyrozany/', 'https://web.facebook.com/holid.rozany', '-', '-'),
('Nurlaili Agustin', 'gustin.jpg', 'B1D017234', 'Peternakan', 'https://www.instagram.com/gustin_na/', 'https://web.facebook.com/agusthin.cilidt', '-', '-'),
('Yudira Adhani', 'dira.jpg', 'B1D017324', 'Peternakan', 'https://www.instagram.com/yudira_adh/', 'https://web.facebook.com/yudiira.adhanii', 'https://twitter.com/adhaniyudira', '-'),
('Tiara Karantian', 'tiara.jpg', 'C1B017052', 'Ilmu Tanah', 'https://www.instagram.com/tiarakarantina/', 'https://web.facebook.com/whyter.tyara', '-', '-'),
('Hafizul Khatomy', 'hafiz.jpg', 'C1L017046', 'Kehutanan', 'https://www.instagram.com/hafizul_k/', 'https://web.facebook.com/hafizul.kh', '-', '-'),
('Rizaldi Septian Fauzi', 'aldi.jpg', 'F1D017075', 'Teknik Informatika', 'https://www.instagram.com/rizaldisfauzi99/', 'https://web.facebook.com/rizaldi.sfauzi99', '-', 'https://www.linkedin.com/in/rizaldi-fauzi-9943071a0'),
('Yayan Jayadi', 'yayan.jpg', 'F1D017089', 'Teknik Informatika', 'https://web.facebook.com/whyter.tyara', 'https://web.facebook.com/yayan.jayadi.50', '-', '-'),
('M. Fahmi Khairul Umam', 'fahmi.jpg', 'G1B017029', 'Fisika', 'https://www.instagram.com/fhm_1105/', '-', '-', '-'),
('Gemma Maya Gustin', 'gemma.jpg', 'G1C017019', 'Kimia', 'https://www.instagram.com/gmyagustin_/', 'https://web.facebook.com/gemma.gustiin', '-', '-'),
('Widia Ningsih', 'widia.jpg', 'J1A017188', 'Ilmu Teknologi Pangan', 'https://www.instagram.com/widiya_nsh/', 'https://web.facebook.com/wita.vraw', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_wisata` int(2) NOT NULL,
  `NIK` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `nama`, `id_wisata`, `NIK`) VALUES
(1, 'Dari Pasar Keruak', 1, '0'),
(2, 'Dari Pantai Rambang', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `titik`
--

CREATE TABLE `titik` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `koordinat` varchar(30) NOT NULL,
  `jarak` varchar(30) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `id_rute` int(2) NOT NULL,
  `NIK` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titik`
--

INSERT INTO `titik` (`id`, `nama`, `koordinat`, `jarak`, `deskripsi`, `id_rute`, `NIK`) VALUES
(1, 'Pasar Keruak', '-8.7727714,116.4862785', '2,5 km', 'anda harus melewati jalan raya labuhan haji', 1, '0'),
(2, 'Pantai Rambang', '-8.7258818,116.5492605', '4,8 km', 'Dari pantai Rambang di sekitar pertigaan ambil arah ke selatan melawati Jl. Raya Labuhan H. terus lurus hingga Balai Pengembangan Penangkapan Ikan Tanjung Luar berada di sebelah kiri anda.', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` enum('wisata','penyebrangan','penginapan','potensi') NOT NULL,
  `youtube` varchar(20) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `koordinat` varchar(30) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `profil` varchar(40) NOT NULL,
  `background` varchar(40) NOT NULL,
  `tanggal` timestamp(1) NOT NULL DEFAULT current_timestamp(1) ON UPDATE current_timestamp(1),
  `NIK` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `jenis`, `youtube`, `kontak`, `koordinat`, `lokasi`, `profil`, `background`, `tanggal`, `NIK`) VALUES
(1, 'Pantai Tanjung Luar', 'wisata', 'xkqUg-wBO6U', '0895110070118', '-8.770269, 116.525207', 'Jl. Dermaga II, Tj. Luar. Keruak, Kabupaten Lombok Timur', 'profile-img-tjl.jpg', 'hero-bg-tjl.jpg', '2021-02-01 11:20:07.0', '0'),
(2, 'Pantai Lungkak', 'wisata', '-', '0895110070118', '-8.770269, 116.525207', 'Jl. Dermaga II, Tj. Luar. Keruak, Kabupaten Lombok Timur', 'profile-img-tjl.jpg', 'hero-bg-tjl.jpg', '2021-02-13 08:07:55.2', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_admin` (`NIK`),
  ADD KEY `fasilitas_wisata` (`id_wisata`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeri_admin` (`NIK`),
  ADD KEY `galeri_wisata` (`id_wisata`);

--
-- Indexes for table `kkn`
--
ALTER TABLE `kkn`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rute_wisata` (`id_wisata`),
  ADD KEY `rute_admin` (`NIK`);

--
-- Indexes for table `titik`
--
ALTER TABLE `titik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titik_rute` (`id_rute`),
  ADD KEY `titik_admin` (`NIK`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisata_admin` (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `titik`
--
ALTER TABLE `titik`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitas_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `galeri_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `rute_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titik`
--
ALTER TABLE `titik`
  ADD CONSTRAINT `titik_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `titik_rute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
