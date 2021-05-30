-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:56 PM
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
  `kata_sandi` varchar(20) NOT NULL,
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

INSERT INTO `admin` (`NIK`, `nama`, `username`, `alamat`, `kata_sandi`, `ttl`, `tgl`, `kontak`, `foto`, `pekerjaan`, `jenis`) VALUES
('0', 'Rizaldi Septian Fauzi', 'aldi', 'Perumahan Cahaya Jempong Asri', 'tolong', 'Karangasem, 21 September 1999', '2021-02-22 18:52:12.6', '0871234567', 'assets/img/profil/aldi-p.jpg', 'pelajar', 'admin'),
('1234567890123456', 'Lol', 'Lol', 'Lol, Lol, Lol', 'lol', '2021-02-26', '2021-02-22 18:06:54.6', '085338228872', 'assets/img/profil/6033f2beaa6c4.jpg', 'Lol', 'user'),
('1234567898765432', 'AMA BODER', 'boder', 'Jln. Sagne, Kancut, Cawet', 'sagne', '2021-02-11', '2021-02-23 05:50:41.6', '0928309283023', 'assets/img/profil/603497b1a324c.jpg', 'Pekerja Seks Komersial', 'user'),
('5203015408990003', 'Nurlaili Agustin', 'Nurlaili Agustin', 'Telagebagek, desa ketapang raya kecamatan keruak, kabupaten lombok timur, NTB, Telagebagek, Ketapang', 'agustin14', '1999-08-14', '2021-02-23 06:51:21.4', '085931194233', 'assets/img/profil/6034a5e966283.jpg', 'Mahasiswa', 'user'),
('5203016008980001', 'Humaira Agustini', 'Humaira Agustini', 'Mendana, desa Mendana Raya, Kec. Keruak , Panggungan, Mendana', 'humaira20', '1998-08-20', '2021-02-23 07:14:54.5', '087865539499', 'assets/img/profil/6034ab6e7d3d6.jpg', 'Mahasiswa', 'user'),
('5203016711980001', 'Yudira Adhani', 'Yudiraadhani', 'Batu lawang, kecamatan keruak, Cerangang, Dane rase', '27november', '1998-11-27', '2021-02-22 22:54:35.8', '087881192678', 'assets/img/profil/6034362bd439f.jpg', 'Mahasiswi', 'user'),
('5203016906990002', 'Widia Ningsih', 'widia ningsih', 'Tampeng Desa Senyiur Kecamatan Keruak Kabupaten Lombok Timur, Tambun, Senyiur', 'widiatampeng', '1999-06-29', '2021-03-09 13:55:20.3', '085333991667', 'assets/img/profil/60349a25765f1.jpg', 'Mahasiswa', 'admin'),
('5203203004990001', 'Hafizul Khatomy', 'Hafizul', 'Tibubelo, Rumes, Sepapan', '300499', '1999-04-30', '2021-02-23 06:18:12.4', '085923286179', 'assets/img/profil/60349e246b770.jpg', 'Pelajar', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menyukai_fasilitas`
--

CREATE TABLE `admin_menyukai_fasilitas` (
  `id` int(6) NOT NULL,
  `id_fasilitas` int(5) NOT NULL,
  `NIK` varchar(16) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menyukai_fasilitas`
--

INSERT INTO `admin_menyukai_fasilitas` (`id`, `id_fasilitas`, `NIK`) VALUES
(4, 2, '1234567890123456'),
(5, 2, '5203016906990002');

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
-- Dumping data for table `admin_menyukai_galeri`
--

INSERT INTO `admin_menyukai_galeri` (`id`, `id_galeri`, `NIK`) VALUES
(3, 4, '5203016906990002');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menyukai_komentar`
--

CREATE TABLE `admin_menyukai_komentar` (
  `id` int(6) NOT NULL,
  `id_komentar` int(5) NOT NULL,
  `NIK` varchar(16) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menyukai_komentar`
--

INSERT INTO `admin_menyukai_komentar` (`id`, `id_komentar`, `NIK`) VALUES
(3, 9, '5203016906990002'),
(4, 9, '1234567890123456');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menyukai_wisata`
--

CREATE TABLE `admin_menyukai_wisata` (
  `id` int(6) NOT NULL,
  `id_wisata` int(2) NOT NULL,
  `NIK` varchar(16) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menyukai_wisata`
--

INSERT INTO `admin_menyukai_wisata` (`id`, `id_wisata`, `NIK`) VALUES
(1, 2, '5203016906990002'),
(4, 2, '1234567890123456'),
(5, 3, '1234567890123456'),
(6, 3, '5203016906990002');

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
(1, 'kopi-hangat.jpg', 'Kopi Hangat Hanya Rp. 5.000', 'minuman', '0', 3),
(2, '604788266301c.jpg', '                     lol ', 'fasilitas', '0', 11);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `NIK` varchar(16) DEFAULT NULL,
  `id_wisata` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `nama`, `deskripsi`, `NIK`, `id_wisata`) VALUES
(1, 'galeri (1).jpg', 'Lesehan yang asri', '0', 3),
(2, 'galeri (4).jpg', 'Memancing dengan tenang sembari menikmati suasana matahari terbit', '0', 3),
(4, '6047991515156.jpg', '               yayan       ', '0', 11);

-- --------------------------------------------------------

--
-- Table structure for table `kkn`
--

CREATE TABLE `kkn` (
  `nama` varchar(30) NOT NULL,
  `foto` varchar(10) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `jurusan` enum('Teknik Informatika','Peternakan','Ilmu Tanah','Kehutanan','Fisika','Kimia','Ilmu dan Teknologi Pangan') NOT NULL,
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
('Widia Ningsih', 'widia.jpg', 'J1A017188', '', 'https://www.instagram.com/widiya_nsh/', 'https://web.facebook.com/wita.vraw', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(5) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `id_wisata` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `NIK`, `id_wisata`) VALUES
(9, '0', 11);

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
(1, 'Dari Pasar Keruak', 3, '0'),
(2, 'Dari Pantai Rambang', 3, '0');

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
  `background` varchar(40) DEFAULT NULL,
  `tanggal` timestamp(1) NOT NULL DEFAULT current_timestamp(1) ON UPDATE current_timestamp(1),
  `NIK` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `jenis`, `youtube`, `kontak`, `koordinat`, `lokasi`, `background`, `tanggal`, `NIK`) VALUES
(2, 'Pantai Lungkak', 'wisata', 'p4CLiPxuwTs', '-', '-8.789893, 116.505399', 'Jl. Desa Ketapang Raya, Ketapang Raya, Keruak, Kabupaten Lombok Timur', 'hero-bg-lkk.jpg', '2021-02-19 13:13:46.3', '0'),
(3, 'Pantai Tanjung Luar', 'wisata', 'xkqUg-wBO6U', '-', '-8.770269, 116.525207', 'Jl. Dermaga II, Tj. Luar. Keruak, Kabupaten Lombok Timur', 'hero-bg-tjl.jpg', '2021-02-24 05:52:51.7', '0'),
(11, 'lol', 'wisata', 'p4CLiPxuwTs', 'lol', '-8.770269, 116.525207', 'lol', '604781da64568.png', '2021-03-09 14:10:34.4', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `admin_menyukai_fasilitas`
--
ALTER TABLE `admin_menyukai_fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_fasilitas_fasilitas` (`id_fasilitas`),
  ADD KEY `admin_fasilitas_admin` (`NIK`);

--
-- Indexes for table `admin_menyukai_galeri`
--
ALTER TABLE `admin_menyukai_galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_galeri_galeri` (`id_galeri`),
  ADD KEY `admin_galeri_admin` (`NIK`);

--
-- Indexes for table `admin_menyukai_komentar`
--
ALTER TABLE `admin_menyukai_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_komentar_komentar` (`id_komentar`),
  ADD KEY `admin_komentar_admin` (`NIK`);

--
-- Indexes for table `admin_menyukai_wisata`
--
ALTER TABLE `admin_menyukai_wisata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_wisata_wisata` (`id_wisata`),
  ADD KEY `admin_wisata_admin` (`NIK`);

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
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_komentar` (`NIK`),
  ADD KEY `komentar_wisata` (`id_wisata`);

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
-- AUTO_INCREMENT for table `admin_menyukai_fasilitas`
--
ALTER TABLE `admin_menyukai_fasilitas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_menyukai_galeri`
--
ALTER TABLE `admin_menyukai_galeri`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_menyukai_komentar`
--
ALTER TABLE `admin_menyukai_komentar`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_menyukai_wisata`
--
ALTER TABLE `admin_menyukai_wisata`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menyukai_fasilitas`
--
ALTER TABLE `admin_menyukai_fasilitas`
  ADD CONSTRAINT `admin_fasilitas_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_fasilitas_fasilitas` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_menyukai_galeri`
--
ALTER TABLE `admin_menyukai_galeri`
  ADD CONSTRAINT `admin_galeri_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_galeri_galeri` FOREIGN KEY (`id_galeri`) REFERENCES `galeri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_menyukai_komentar`
--
ALTER TABLE `admin_menyukai_komentar`
  ADD CONSTRAINT `admin_komentar_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_komentar_komentar` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_menyukai_wisata`
--
ALTER TABLE `admin_menyukai_wisata`
  ADD CONSTRAINT `admin_wisata_admin` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_wisata_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `admin_komentar` FOREIGN KEY (`NIK`) REFERENCES `admin` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
