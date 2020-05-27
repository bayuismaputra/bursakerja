-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 01:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bursakerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `tipe_kriteria` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `status_uploud` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_lowongan`, `nama_kriteria`, `tipe_kriteria`, `bobot`, `status_uploud`) VALUES
(24, 40, 'Menguasai Jaringan (Sertifikat', 'benefit', 50, '1'),
(25, 40, 'Menguasai PHP', 'benefit', 50, '0'),
(26, 40, 'Menguasai JavaScript', 'benefit', 50, '0'),
(27, 40, 'Menguasai CSS', 'benefit', 50, '0'),
(28, 40, 'Sarjana Jurusan Teknik Informa', 'benefit', 40, '1'),
(29, 40, 'Tes Wawancara', 'benefit', 30, '0'),
(30, 40, 'Psikotes', 'benefit', 30, '0'),
(31, 41, 'Menguasai Jaringan (Sertifikat', 'benefit', 50, '1'),
(32, 41, 'Menguasai CSS', 'benefit', 50, '1'),
(33, 42, 'Menguasai Jaringan (Sertifikat', 'benefit', 50, '1'),
(34, 42, 'Menguasai CSS', 'benefit', 30, '1');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `id_pelamar`, `id_lowongan`, `id_kriteria`, `nilai`, `file`) VALUES
(62, 4, 40, 24, 2, '8_40_17-6633-1-SM.pdf45.pdf'),
(63, 4, 40, 25, 2, '-'),
(64, 4, 40, 26, 2, '-'),
(65, 4, 40, 27, 2, '-'),
(66, 4, 40, 28, 2, '8_40_78-82-1-PB.pdf44.pdf'),
(67, 4, 40, 29, 2, '-'),
(68, 4, 40, 30, 2, '-'),
(69, 6, 40, 24, 0, '11_40_18. Dwi novianti.pdf86.pdf'),
(70, 6, 40, 25, 0, '-'),
(71, 6, 40, 26, 0, '-'),
(72, 6, 40, 27, 0, '-'),
(73, 6, 40, 28, 0, '11_40_383-953-1-PB_2.pdf13.pdf'),
(74, 6, 40, 29, 0, '-'),
(75, 6, 40, 30, 0, '-'),
(76, 5, 40, 24, 0, '10_40_198-770-1-PB.pdf83.pdf'),
(77, 5, 40, 25, 0, '-'),
(78, 5, 40, 26, 0, '-'),
(79, 5, 40, 27, 0, '-'),
(80, 5, 40, 28, 0, '10_40_491-947-1-SM.pdf31.pdf'),
(81, 5, 40, 29, 0, '-'),
(82, 5, 40, 30, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_lowongan` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `gaji` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `pengalaman_kerja` varchar(20) NOT NULL,
  `deskripsi` varchar(120) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `status_lowongan` enum('ada','tidak ada') NOT NULL DEFAULT 'ada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `nama_lowongan`, `departemen`, `gaji`, `kota`, `tanggal_buka`, `tanggal_tutup`, `pengalaman_kerja`, `deskripsi`, `id_perusahaan`, `status_lowongan`) VALUES
(40, 'IT Support', 'Teknologi Informasi', '4.000.000', 'Yogyakarta', '2020-05-21', '2020-05-31', '1 Tahun', 'Bertanggung Jawab terhadap ketersediaan jaringan di kantor maupun lapangan', 5, 'ada'),
(41, 'Analis Teknologi Informasi', 'Teknologi Informasi', '5.000.000', 'Yogyakarta', '2020-05-22', '2020-05-29', '1 Tahun', 'Bertanggung Jawab menganalisa keandalan TI di kantor dan lapangan', 5, 'ada'),
(42, 'Pranata Komputer', 'Komunikas dan Informasi', '6.000.000', 'Jakarta', '2020-05-22', '2020-05-29', '2 Tahun', 'Bertanggung jawab terhadap komunikasi dan informasi ', 5, 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `curriculum_vitae` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `email`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telpon`, `status_nikah`, `curriculum_vitae`, `id_user`) VALUES
(4, 'ismaputra@gmail.com', 'Setanggor', 'Lombok', '1999-05-20', 'Laki-Laki', '089099809090', 'Belum Nikah', '8_57123 revisi.pdf', 8),
(5, '-', '-', '-', '0000-00-00', '-', '-', '-', '-', 10),
(6, '-', '-', '-', '0000-00-00', '-', '-', '-', '-', 11);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `logo_perusahaan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `id_user`, `nama_perusahaan`, `alamat`, `kota`, `logo_perusahaan`, `email`) VALUES
(5, 7, 'IT support', 'pandeyan', 'Yogyakarta', '7_8Capture.PNG', 'blabla@gmail.com'),
(6, 9, '-', '-', '-', 'default.png', '-');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_nilai_kriteria` int(11) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hak_akses` enum('pengelola','pelamar','perusahaan','') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `hak_akses`, `password`) VALUES
(7, 'Bayu Isma Putra', 'bayu', 'perusahaan', 'a430e06de5ce438d499c2e4063d60fd6'),
(8, 'Isma Putra', 'isma', 'pelamar', 'b65cb932ad941c2de600ff3c5c0c9a56'),
(9, 'deri', 'deri', 'perusahaan', '7904a54f7baa776b3c5538bd3de3d447'),
(10, 'jannah', 'jannah', 'pelamar', '1c7c4f63aa573935f9cfe0d04800e81c'),
(11, 'nk', 'nk', 'pelamar', '7220d65820839700b6c9ae74f87b48e0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `id_lowongan` (`id_lowongan`),
  ADD KEY `id_pelamar` (`id_pelamar`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `id_nilai_kriteria` (`id_nilai_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`);

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`),
  ADD CONSTRAINT `lamaran_ibfk_3` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`),
  ADD CONSTRAINT `lamaran_ibfk_4` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_3` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`id_nilai_kriteria`) REFERENCES `nilai_kriteria` (`id_nilai_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
