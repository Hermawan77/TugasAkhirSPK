-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 02:44 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kk`
--

CREATE TABLE `bidang_kk` (
  `id` int(10) NOT NULL,
  `nama_kk` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_kk`
--

INSERT INTO `bidang_kk` (`id`, `nama_kk`, `slug`) VALUES
(1, 'Keamanan Siber dan Pervasif', 'KASPER'),
(2, 'Kecerdasan Buatan dan Rekayasa Data', 'AIDE'),
(3, 'Rekayasa Perangkat Lunak dan Sistem Informasi', 'RPL');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_metode`
--

CREATE TABLE `bobot_metode` (
  `id` int(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot_topsis` int(100) NOT NULL,
  `bobot_vikor` float NOT NULL,
  `bobot_ahp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot_metode`
--

INSERT INTO `bobot_metode` (`id`, `nama_kriteria`, `bobot_topsis`, `bobot_vikor`, `bobot_ahp`) VALUES
(1, 'Nilai Matakuliah Wajib', 3, 0.2, 0.142746),
(2, 'Riwayat Proyek/Penelitian/Pelatihan', 5, 0.6, 0.767448),
(3, 'Matakuliah Pilihan yang telah diambil', 3, 0.2, 0.089805);

-- --------------------------------------------------------

--
-- Table structure for table `data_hitung`
--

CREATE TABLE `data_hitung` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `kk` int(10) NOT NULL,
  `ipk` varchar(10) NOT NULL,
  `penelitian` int(10) NOT NULL,
  `pilihan` int(10) NOT NULL,
  `history` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_hitung`
--

INSERT INTO `data_hitung` (`id`, `nama`, `nim`, `kk`, `ipk`, `penelitian`, `pilihan`, `history`) VALUES
(1, 'Taufik Agung Santoso', 14116007, 1, '2', 2, 3, 1),
(2, 'Taufik Agung Santoso', 14116007, 2, '3', 3, 2, 1),
(3, 'Taufik Agung Santoso', 14116007, 3, '2', 2, 2, 1),
(4, 'Taufik Agung Santoso', 14116007, 1, '4', 5, 2, 2),
(5, 'Taufik Agung Santoso', 14116007, 2, '4', 4, 1, 2),
(6, 'Taufik Agung Santoso', 14116007, 3, '5', 2, 1, 2),
(7, 'Dicky Hermawan', 14116005, 1, '3', 3, 5, 1),
(8, 'Dicky Hermawan', 14116005, 2, '2', 1, 3, 1),
(9, 'Dicky Hermawan', 14116005, 3, '4', 1, 1, 1),
(10, 'Dicky Hermawan', 14116005, 1, '2', 2, 2, 2),
(11, 'Dicky Hermawan', 14116005, 2, '5', 3, 1, 2),
(12, 'Dicky Hermawan', 14116005, 3, '3', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_pilihan`
--

CREATE TABLE `matakuliah_pilihan` (
  `id` int(10) NOT NULL,
  `matkul_pilihan` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `sks` int(10) NOT NULL,
  `nama_kk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah_pilihan`
--

INSERT INTO `matakuliah_pilihan` (`id`, `matkul_pilihan`, `slug`, `sks`, `nama_kk`) VALUES
(19, 'Jaringan Komputer Lanjut', 'JARKOML', 3, 1),
(20, 'Pervasive Computing', 'PERVASIVE', 3, 1),
(21, 'Teknologi Game', 'TEKGAME', 3, 1),
(22, 'Pengolahan Sinyal Digital', 'PSD', 3, 1),
(23, 'Kriptografi', 'KRIPTO', 3, 1),
(24, 'Sistem/Teknologi Multimedia', 'STM', 3, 1),
(25, 'Pemrograman Paralel', 'PARALEL', 3, 1),
(26, 'Keamanan Jaringan', 'KEJAR', 3, 1),
(27, 'Pemrograman Web Lanjut', 'PWL', 3, 1),
(36, 'Data Mining', 'DATMIN', 3, 2),
(37, 'Pengolahan Bahasa Alami', 'NLP', 3, 2),
(38, 'Pembelajaran Mesin', 'ML', 3, 2),
(39, 'Representasi Pengetahuan dan Penalaran', 'RPP', 3, 2),
(40, 'Information Retrieval', 'IR', 3, 2),
(41, 'Pengolahan Citra Digital', 'PCD', 3, 2),
(42, 'Teknologi Basis Data', 'TBD', 3, 2),
(43, ' Visualisasi Data dan Informasi', 'VISDAT', 3, 2),
(44, 'Sistem Informasi Geografis', 'SIG', 3, 3),
(45, 'Sistem Informasi Lanjut', 'SIL', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_wajib`
--

CREATE TABLE `matakuliah_wajib` (
  `id` int(10) NOT NULL,
  `matkul_wajib` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `sks` int(10) NOT NULL,
  `nilai` int(10) DEFAULT NULL,
  `kk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah_wajib`
--

INSERT INTO `matakuliah_wajib` (`id`, `matkul_wajib`, `slug`, `sks`, `nilai`, `kk`) VALUES
(1, 'Algoritma dan Struktur Data', 'ASD', 4, NULL, 1),
(2, 'Organisasi dan Arsitektur Komputer', 'OAK', 3, NULL, 1),
(3, 'Probabilitas dan Statistika', 'PROBSTAT', 3, NULL, 2),
(4, 'Matriks dan Ruang Vektor', 'MRV', 3, NULL, 2),
(5, 'Matematika Diskrit 1', 'MATDIS1', 2, NULL, 2),
(6, 'Teori Bahasa Formal dan Otomata', 'TBFO', 3, NULL, 2),
(7, 'Basis Data', 'BASDAT', 3, NULL, 2),
(8, 'Dasar Rekayasa Perangkat Lunak', 'DRPL', 2, NULL, 3),
(9, 'Pemrograman Berorientasi Objek', 'PBO', 3, NULL, 1),
(10, 'Sistem Operasi', 'SO', 3, NULL, 1),
(11, 'Manajemen Proyek Perangkat Lunak', 'MPPL', 3, NULL, 3),
(12, 'Strategi Algoritma', 'STIGMA', 3, NULL, 2),
(13, 'Manajemen Basis Data', 'MBD', 3, NULL, 2),
(14, 'Pemrograman Web', 'WEB', 3, NULL, 1),
(15, 'Jaringan Komputer', 'JARKOM', 3, NULL, 1),
(16, 'Inteligensi Buatan', 'AI', 3, NULL, 2),
(17, 'Sistem Tertanam', 'ST', 3, NULL, 1),
(19, 'Pengembangan Aplikasi Mobile', 'PAM', 3, NULL, 1),
(20, 'Sistem Informasi', 'SI', 2, NULL, 3),
(21, 'Proyek Perangkat Lunak', 'PPL', 4, NULL, 3),
(22, 'Interaksi Manusia dan Komputer', 'IMK', 2, NULL, 3),
(23, 'Matematika Diskrit 2', 'MATDIS2', 2, NULL, 2),
(24, 'Algoritma Pemrograman 1', 'ALPRO1', 2, NULL, 1),
(25, 'Algoritma Pemrograman 2', 'ALPRO2', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(10) NOT NULL,
  `huruf` varchar(2) NOT NULL,
  `angka` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `huruf`, `angka`) VALUES
(1, 'A', '4'),
(2, 'AB', '3.5'),
(3, 'B', '3'),
(4, 'BC', '2.5'),
(5, 'C', '2'),
(6, 'D', '1'),
(7, 'E', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_kk`
--
ALTER TABLE `bidang_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot_metode`
--
ALTER TABLE `bobot_metode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_hitung`
--
ALTER TABLE `data_hitung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kk` (`kk`);

--
-- Indexes for table `matakuliah_pilihan`
--
ALTER TABLE `matakuliah_pilihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_kk` (`nama_kk`);

--
-- Indexes for table `matakuliah_wajib`
--
ALTER TABLE `matakuliah_wajib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai` (`nilai`),
  ADD KEY `kk` (`kk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidang_kk`
--
ALTER TABLE `bidang_kk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bobot_metode`
--
ALTER TABLE `bobot_metode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_hitung`
--
ALTER TABLE `data_hitung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `matakuliah_pilihan`
--
ALTER TABLE `matakuliah_pilihan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `matakuliah_wajib`
--
ALTER TABLE `matakuliah_wajib`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_hitung`
--
ALTER TABLE `data_hitung`
  ADD CONSTRAINT `data_hitung_ibfk_1` FOREIGN KEY (`kk`) REFERENCES `bidang_kk` (`id`);

--
-- Constraints for table `matakuliah_pilihan`
--
ALTER TABLE `matakuliah_pilihan`
  ADD CONSTRAINT `matakuliah_pilihan_ibfk_2` FOREIGN KEY (`nama_kk`) REFERENCES `bidang_kk` (`id`);

--
-- Constraints for table `matakuliah_wajib`
--
ALTER TABLE `matakuliah_wajib`
  ADD CONSTRAINT `matakuliah_wajib_ibfk_1` FOREIGN KEY (`nilai`) REFERENCES `nilai` (`id`),
  ADD CONSTRAINT `matakuliah_wajib_ibfk_2` FOREIGN KEY (`kk`) REFERENCES `bidang_kk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
