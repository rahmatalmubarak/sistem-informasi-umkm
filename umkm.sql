-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 04:40 PM
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
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_user`
--

CREATE TABLE `alamat_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provinsi` varchar(150) NOT NULL,
  `kabupaten_kota` varchar(150) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat_user`
--

INSERT INTO `alamat_user` (`id`, `user_id`, `provinsi`, `kabupaten_kota`, `alamat_lengkap`, `kode_pos`) VALUES
(0, 35, '2', '29', 'Padang', 26192),
(0, 27, '2', '28', 'Padang', 26192),
(0, 38, '2', '28', 'Padang', 26192);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `icon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `warna`, `icon`) VALUES
(60, 'Fashion', 'bg-info', ''),
(61, 'Barang', 'bg-success', ''),
(62, 'Makananqwe', 'bg-danger', ''),
(63, 'Teknologi', 'bg-warning', ''),
(65, 'Fashion', 'bg-info', ''),
(66, 'Barang', 'bg-success', ''),
(67, 'Makanan', 'bg-danger', ''),
(68, 'Teknologi', 'bg-warning', ''),
(69, 'Fashion', 'bg-info', ''),
(70, 'qwe', 'bg-success', ''),
(71, 'Makanan', 'bg-danger', ''),
(72, 'Teknologi', 'bg-warning', ''),
(73, 'Fashion', 'bg-info', ''),
(74, 'Barang', 'bg-success', ''),
(75, 'Makanan', 'bg-danger', ''),
(76, 'Teknologi', 'bg-warning', ''),
(77, 'Fashion', 'bg-info', ''),
(78, 'Barang', 'bg-success', ''),
(79, 'Makanan', 'bg-danger', ''),
(80, 'Teknologiqweqwe', 'bg-warning', ''),
(81, 'Fashion', 'bg-info', ''),
(82, 'Barang', 'bg-success', ''),
(83, 'Makanan', 'bg-danger', ''),
(84, 'Teknologi', 'bg-warning', ''),
(85, 'Fashion', 'bg-info', ''),
(86, 'Barang', 'bg-success', ''),
(87, 'Makanan', 'bg-danger', ''),
(88, 'Teknologi', 'bg-warning', ''),
(89, 'Fashion', 'bg-info', ''),
(90, 'Barang', 'bg-success', ''),
(91, 'Makanan', 'bg-danger', ''),
(92, 'asd', 'bg-warning', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_update` date NOT NULL,
  `toko_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama_produk`, `harga`, `deskripsi`, `tanggal_update`, `toko_id`, `kategori_id`) VALUES
(2, 'product_4.png', 'Tas Salempang', '200000', 'Bla bla bla', '2023-09-14', 11, 60),
(4, 'prod-1.jpg', 'Sepatu Gunung', '200000', 'Sepatu Gunung bagus untuk traveling', '2023-09-18', 11, 61),
(5, 'product_1.png', 'Pocket cotton sweatshirts', '200000', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut', '2023-09-24', 11, 60),
(7, 'product_1.png', 'Pocket cotton sweatshirts', '200000', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut', '2023-09-24', 11, 60),
(8, 'product_2.png', 'Samsung CF591 Series Curved 27-Inch FHD Monitor', '350000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-09-25', 11, 63),
(9, 'product_3.png', 'Blue Yeti USB Microphone Blackout Edition', '250000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-09-25', 11, 60),
(12, 'product_6.png', 'Fujifilm X100T 16 MP Digital Camera (Silver)', '270000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-09-25', 11, 60),
(13, 'product_8.png', 'Blue Yeti USB Microphone Blackout Edition', '220000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-09-25', 11, 63),
(14, 'product_9.png', 'DYMO LabelWriter 450 Turbo Thermal Label Printer', '130000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-09-25', 11, 60),
(15, 'product_9.png', 'DYMO LabelWriter 450 Turbo Thermal Label Printer', '130000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-09-25', 11, 60);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Pelaku UMKM'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `alamat`) VALUES
(1, 'Fulan Store', 'alamat_toko'),
(10, 'Banteng Merah', 'alamat_toko'),
(11, 'Rahmat store', 'Imam bonjol'),
(12, 'Yanto Store', 'Kuranji, Padang'),
(13, 'Mickel Store', 'Bukittinggi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `pelaku_umkm_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `notif` tinyint(1) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `produk_id`, `pelanggan_id`, `pelaku_umkm_id`, `jumlah`, `total`, `status`, `notif`, `tanggal_transaksi`) VALUES
(18, 2, 35, 1, 1, 0, 'sudah bayar', NULL, '2023-09-29 08:12:31'),
(29, 2, 35, 25, 1, 200000, 'belum bayar', NULL, '2023-09-29 08:01:42'),
(30, 5, 38, 32, 1, 200000, 'belum bayar', NULL, '2023-09-29 08:12:31'),
(32, 9, 38, 27, 1, 250000, 'belum bayar', NULL, '2023-09-29 08:12:31'),
(33, 2, 35, 27, 1, 200000, 'belum bayar', NULL, '2023-09-29 08:12:31'),
(34, 12, 35, 27, 1, 270000, 'belum bayar', NULL, '2023-09-29 08:12:31'),
(35, 13, 35, 27, 1, 220000, 'belum bayar', 0, '2023-09-29 09:20:00'),
(37, 15, 35, 27, 1, 232000, 'belum bayar', 1, '2024-01-01 21:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `toko_id` int(11) DEFAULT NULL,
  `rekening` varchar(25) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `photo`, `nama`, `email`, `jenis_kelamin`, `kontak`, `toko_id`, `rekening`, `password`, `role_id`) VALUES
(1, 'banner_1.jpg', 'Herzi', 'admin@gmail.com', 'laki-laki', '0989089', NULL, '0120123123', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(25, 'avatar5.png', 'Fulans', 'qwe@asd.comas', 'laki-laki', '081512312123', 1, '012987773112', 'f5bb0c8de146c67b44babbf4e6584cc0', 2),
(27, 'avatar2.png', 'Rahmat', 'rahmat@gmail.com', 'laki-laki', '0989089', 11, '012987123112', 'e00cf25ad42683b3df678c61f42c6bda', 2),
(32, 'avatar2.png', 'Rahmat al mubarak', 'rahmatalmuabarak35@gmail.com', 'laki-laki', '0989089', 10, '0120123123', '202cb962ac59075b964b07152d234b70', 1),
(35, 'avatar2.png', 'Deni Wahyuni', 'deni@gmail.com', 'perempuan', '081977717633', NULL, NULL, '202cb962ac59075b964b07152d234b70', 3),
(37, 'avatar3.png', 'Mickel', 'mickel@gmail.com', 'laki-laki', '081977717634', 13, '115212318', '202cb962ac59075b964b07152d234b70', 2),
(38, 'deal_ofthe_week.png', 'Aseps', 'asep@gmail.com', 'laki-laki', '123123123', NULL, NULL, '202cb962ac59075b964b07152d234b70', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_user`
--
ALTER TABLE `alamat_user`
  ADD KEY `alamat_user_ibfk_1` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `toko_id` (`toko_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `pelaku_umkm_id` (`pelaku_umkm_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`role_id`),
  ADD KEY `user_ibfk_2` (`toko_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat_user`
--
ALTER TABLE `alamat_user`
  ADD CONSTRAINT `alamat_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`toko_id`) REFERENCES `toko` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`pelanggan_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`pelaku_umkm_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`toko_id`) REFERENCES `toko` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
