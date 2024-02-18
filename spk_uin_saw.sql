-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 03:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_uin_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `Id_Alternatif` int(3) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`Id_Alternatif`, `Nama`) VALUES
(2, 'Bahasa dan Sastra Arab'),
(3, 'Sejarah Peradaban Islam'),
(4, 'Ilmu Perpustakaan dan Informasi Islam'),
(5, 'Ilmu Perpustakaan'),
(6, 'Komunikasi dan Penyiaran Islam'),
(7, 'Bimbingan dan Konseling Islam'),
(8, 'Menajemen Dakwah'),
(9, 'Pengembangan Masyarakat Islam'),
(10, 'Hukum Keluarga'),
(11, 'Hukum Tatanegara Islam'),
(12, 'Perbandingan Mahzab'),
(13, 'Pendidikan Agama Islam'),
(14, 'Pendidikan Bahasa Arab'),
(15, 'Menajemen Pendidikan Islam'),
(16, 'Pendidikan Guru Madrasah Ibtidaiyah'),
(17, 'Tadris Bahasa Inggris'),
(18, 'Tadris Ilmu Pengetahuan Alam (IPA)'),
(19, 'Tadris Ilmu Pengetahuan Sosial (IPS)'),
(20, 'Tadris Matematika'),
(21, 'Bimbingan dan Konseling Pendidikan Islam'),
(22, 'Aqidah dan Filsafat Islam'),
(23, 'Studi Agama-agama'),
(24, 'Ilmu Alquran dan Tafsir'),
(25, 'Psikologi islam'),
(26, 'Ilmu Hadist'),
(27, 'Tasawuf dan Psikoterapi'),
(28, 'Ekonomi Syariah'),
(29, 'Menajemen Perbankan Syariah'),
(30, 'Akutansi Syariah'),
(31, 'Perbankan Syariah'),
(32, 'Menajemen Bisnis Islam'),
(33, 'Sistem Informasi'),
(34, 'Matematika'),
(35, 'Hukum Ekonomi Syariah'),
(36, 'kedokteran'),
(37, 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_data_user` int(3) NOT NULL,
  `Id_User` int(3) NOT NULL,
  `NilaiX_SmtI` float NOT NULL,
  `NilaiX_SmtII` float NOT NULL,
  `NilaiXI_SmtI` float NOT NULL,
  `NilaiXI_SmtII` float NOT NULL,
  `NilaiXII_SmtI` float NOT NULL,
  `NilaiXII_SmtII` float NOT NULL,
  `Nilai_Rapor` float NOT NULL,
  `Minat_Bakat` enum('Pemikiran Kritis dan Penelitian','Bahasa','Hukum','Agama','Pendidikan','Sains','Teknologi','Ilmu Sosial','Ekonomi','Bisnis dan Menajemen','Matematika') NOT NULL,
  `Prestasi_Akademik` enum('Juara Tingkat Nasional >3','Juara Tingkat Nasional 1 – 3','Juara Tingkat Kabupaten/Kota >3','Juara Tingkat Kabupaten/Kota 1 – 3','Juara Tingkat Sekolah >3','Juara Tingkat Sekolah 1 – 3','Tidak Ada -','Juara Tingkat Provinsi >3','Juara Tingkat Provinsi 1 – 3') NOT NULL,
  `Penghasilan_Ortu` enum('500.000 s/d 1.400.000','1.500.000 s/d 2.400.000','2.500.000 s/d 3.400.000','3.500.000 s/d 5.000.000','5.100.000 s/d 10.000.000') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_data_user`, `Id_User`, `NilaiX_SmtI`, `NilaiX_SmtII`, `NilaiXI_SmtI`, `NilaiXI_SmtII`, `NilaiXII_SmtI`, `NilaiXII_SmtII`, `Nilai_Rapor`, `Minat_Bakat`, `Prestasi_Akademik`, `Penghasilan_Ortu`) VALUES
(4, 26, 83, 85, 86, 87, 87, 88, 86, 'Hukum', 'Tidak Ada -', '1.500.000 s/d 2.400.000'),
(5, 27, 83, 85, 86, 87, 87, 88, 86, 'Pemikiran Kritis dan Penelitian', 'Tidak Ada -', '1.500.000 s/d 2.400.000');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_perhitungan_saw`
--

CREATE TABLE `hasil_perhitungan_saw` (
  `Id_Hasil_SAW` int(3) NOT NULL,
  `Id_Alternatif` int(3) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_perhitungan_saw`
--

INSERT INTO `hasil_perhitungan_saw` (`Id_Hasil_SAW`, `Id_Alternatif`, `Nilai`) VALUES
(1, 2, 84.95),
(2, 3, 30.5),
(3, 4, 57.5),
(4, 5, 43),
(5, 6, 67),
(6, 7, 34.7),
(7, 8, 34),
(8, 9, 66),
(9, 10, 62),
(10, 11, 62.75),
(11, 35, 50.75),
(12, 12, 56.25),
(13, 13, 50.7),
(14, 14, 29),
(15, 15, 77),
(16, 16, 65.75),
(17, 17, 57.7),
(18, 18, 39.75),
(19, 19, 70.95),
(20, 20, 75),
(21, 21, 36.75),
(22, 22, 55.75),
(23, 23, 58.75),
(24, 24, 51.5),
(25, 25, 65.45),
(26, 26, 46.75),
(27, 27, 24.7),
(28, 28, 64.5),
(29, 29, 27.75),
(30, 30, 63.75),
(31, 31, 52.7),
(32, 32, 63.5),
(33, 33, 80.5),
(34, 34, 45);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `Id_Kriteria` int(3) NOT NULL,
  `Kode_Kriteria` varchar(10) NOT NULL,
  `Nama_Kriteria` varchar(50) NOT NULL,
  `Bobot_Kriteria` float NOT NULL,
  `Jenis_Kriteria` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`Id_Kriteria`, `Kode_Kriteria`, `Nama_Kriteria`, `Bobot_Kriteria`, `Jenis_Kriteria`) VALUES
(27, 'C1', 'Nilai Rapor', 35, 'Benefit'),
(28, 'C2', 'Minat dan Bakat', 25, 'Benefit'),
(29, 'C3', 'Prestasi Akademik', 25, 'Benefit'),
(31, 'C4', 'Penghasilan Orang Tua', 15, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `Id_Penilaian` int(3) NOT NULL,
  `Id_Sub_Kriteria` int(3) NOT NULL,
  `Id_Alternatif` int(3) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`Id_Penilaian`, `Id_Sub_Kriteria`, `Id_Alternatif`, `Nilai`) VALUES
(15, 14, 2, 5),
(16, 19, 2, 4),
(17, 10, 2, 9),
(18, 35, 2, 3),
(19, 2, 3, 1),
(20, 22, 3, 3),
(21, 32, 3, 2),
(22, 12, 3, 5),
(23, 4, 4, 2),
(24, 21, 4, 5),
(25, 30, 4, 4),
(26, 36, 4, 2),
(27, 5, 5, 3),
(28, 16, 5, 2),
(29, 31, 5, 3),
(30, 34, 5, 4),
(31, 13, 6, 4),
(32, 16, 6, 2),
(33, 29, 6, 5),
(34, 37, 6, 1),
(35, 2, 7, 1),
(36, 19, 7, 4),
(37, 33, 7, 1),
(38, 35, 7, 3),
(39, 2, 8, 1),
(41, 31, 8, 3),
(42, 34, 8, 4),
(43, 4, 9, 2),
(44, 21, 9, 5),
(45, 27, 9, 7),
(46, 36, 9, 2),
(47, 5, 10, 3),
(49, 30, 10, 4),
(50, 37, 10, 1),
(51, 13, 11, 4),
(52, 19, 11, 4),
(53, 30, 11, 4),
(54, 34, 11, 4),
(55, 14, 35, 5),
(56, 16, 35, 2),
(57, 33, 35, 1),
(58, 12, 35, 5),
(59, 5, 12, 3),
(60, 21, 12, 5),
(61, 33, 12, 1),
(62, 36, 12, 2),
(63, 4, 13, 2),
(65, 28, 13, 6),
(66, 35, 13, 3),
(67, 2, 14, 1),
(68, 16, 14, 2),
(69, 31, 14, 3),
(70, 34, 14, 4),
(71, 14, 15, 5),
(72, 18, 15, 5),
(73, 29, 15, 5),
(74, 12, 15, 5),
(75, 13, 16, 4),
(76, 19, 16, 4),
(77, 29, 16, 5),
(78, 34, 16, 4),
(79, 5, 17, 3),
(81, 28, 17, 6),
(82, 35, 17, 3),
(83, 4, 18, 2),
(84, 16, 18, 2),
(85, 31, 18, 3),
(86, 36, 18, 2),
(87, 14, 19, 5),
(88, 19, 19, 4),
(89, 30, 19, 4),
(90, 35, 19, 3),
(91, 5, 20, 3),
(92, 21, 20, 5),
(93, 29, 20, 5),
(94, 37, 20, 1),
(95, 2, 21, 1),
(97, 30, 21, 4),
(98, 34, 21, 4),
(99, 4, 22, 2),
(100, 16, 22, 2),
(101, 28, 22, 6),
(102, 37, 22, 1),
(103, 13, 23, 4),
(105, 31, 23, 3),
(106, 36, 23, 2),
(107, 5, 24, 3),
(108, 16, 24, 2),
(109, 28, 24, 6),
(110, 34, 24, 4),
(111, 14, 25, 5),
(112, 19, 25, 4),
(113, 32, 25, 2),
(114, 35, 25, 3),
(115, 4, 26, 2),
(117, 33, 26, 1),
(118, 37, 26, 1),
(119, 2, 27, 1),
(120, 16, 27, 2),
(121, 33, 27, 1),
(122, 35, 27, 3),
(123, 5, 28, 3),
(124, 21, 28, 5),
(125, 30, 28, 4),
(126, 36, 28, 2),
(127, 2, 29, 1),
(129, 33, 29, 1),
(130, 12, 29, 5),
(131, 13, 30, 4),
(132, 19, 30, 4),
(133, 31, 30, 3),
(134, 36, 30, 2),
(135, 14, 31, 5),
(136, 16, 31, 2),
(137, 33, 31, 1),
(138, 35, 31, 3),
(139, 4, 32, 2),
(141, 27, 32, 7),
(142, 37, 32, 1),
(143, 14, 33, 5),
(144, 21, 33, 5),
(145, 28, 33, 6),
(146, 34, 33, 4),
(147, 2, 34, 1),
(148, 21, 34, 5),
(149, 32, 34, 2),
(150, 36, 34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `Id_Sub_Kriteria` int(3) NOT NULL,
  `Id_Kriteria` int(3) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Bobot` varchar(20) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`Id_Sub_Kriteria`, `Id_Kriteria`, `Nama`, `Bobot`, `Nilai`) VALUES
(2, 27, '0-39', 'Sangat Rendah', 1),
(4, 27, '40-54', 'Rendah', 2),
(5, 27, '55-69', 'Cukup', 3),
(10, 29, 'Juara Tingkat Nasional', '>3', 9),
(12, 31, '500.000 s/d 1.400.000', 'Sangat Rendah', 5),
(13, 27, '70-84', 'Tinggi', 4),
(14, 27, '85-100', 'Sangat Tinggi', 5),
(16, 28, 'Bahasa', 'Cukup', 2),
(17, 28, 'Hukum', 'Cukup', 3),
(18, 28, 'Agama', 'Cukup', 5),
(19, 28, 'Pendidikan', 'Cukup', 4),
(20, 28, 'Sains', 'Cukup', 3),
(21, 28, 'Teknologi', 'Cukup', 5),
(22, 28, 'Ilmu Sosial', 'Cukup', 3),
(23, 28, 'Ekonomi', 'Cukup', 3),
(24, 28, 'Bisnis dan Menajemen', 'Cukup', 3),
(25, 28, 'Matematika', 'Cukup', 3),
(26, 29, 'Juara Tingkat Nasional', '1 – 3', 8),
(27, 29, 'Juara Tingkat Provinsi', '>3', 7),
(28, 29, 'Juara Tingkat Provinsi', '1 – 3', 6),
(29, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(30, 29, 'Juara Tingkat Kabupaten/Kota', '1 – 3', 4),
(31, 29, 'Juara Tingkat Sekolah', '>3', 3),
(32, 29, 'Juara Tingkat Sekolah', '1 – 3', 2),
(33, 29, 'Tidak Ada', '-', 1),
(34, 31, '1.500.000 s/d 2.400.000', 'Rendah', 4),
(35, 31, '2.500.000 s/d 3.400.000', 'Cukup', 3),
(36, 31, '3.500.000 s/d 5.000.000', 'Tinggi', 2),
(37, 31, '5.100.000 s/d 10.000.000', 'Sangat Tinggi', 1),
(38, 28, 'Sejarah', 'Cukup', 3),
(40, 28, 'kesehatan', 'Tinggi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(3) NOT NULL,
  `Foto` varchar(20) DEFAULT NULL,
  `NISN` int(10) NOT NULL,
  `Nama_Lengkap` varchar(50) NOT NULL,
  `Asal_Sekolah` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Level` enum('admin','siswa','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Foto`, `NISN`, `Nama_Lengkap`, `Asal_Sekolah`, `Username`, `Password`, `Level`) VALUES
(26, NULL, 1111, 'admin', 'asd', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(27, 'user-728875.png', 987654321, 'Sri Mulliyanti', 'Padang', 'sri', 'd1565ebd8247bbb01472f80e24ad29b6', 'siswa'),
(28, NULL, 1231231312, 'iui', 'ui', 'asd', '7815696ecbf1c96e6894b779456d330e', 'siswa'),
(29, NULL, 1212, 'sadA', 'dsf', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`Id_Alternatif`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_data_user`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  ADD PRIMARY KEY (`Id_Hasil_SAW`),
  ADD KEY `hasil_perhitungan_saw_ibfk_1` (`Id_Alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`Id_Kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`Id_Penilaian`),
  ADD KEY `penilaian_ibfk_2` (`Id_Sub_Kriteria`),
  ADD KEY `penilaian_ibfk_3` (`Id_Alternatif`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`Id_Sub_Kriteria`),
  ADD KEY `sub_kriteria_ibfk_1` (`Id_Kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `NISN` (`NISN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `Id_Alternatif` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_data_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  MODIFY `Id_Hasil_SAW` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `Id_Kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `Id_Penilaian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `Id_Sub_Kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);

--
-- Constraints for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  ADD CONSTRAINT `hasil_perhitungan_saw_ibfk_1` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`Id_Sub_Kriteria`) REFERENCES `sub_kriteria` (`Id_Sub_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`Id_Kriteria`) REFERENCES `kriteria` (`Id_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
