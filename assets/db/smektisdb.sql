-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 02:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smektisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kode_barang` varchar(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `user_id`, `kategori_id`, `kode_barang`, `nama`, `harga`, `stok`, `keterangan`, `foto`) VALUES
(1, 1, 1, NULL, 'Canon EOS 60D', 125000, 1, 'Boleh dipinjam kapan saja', '0'),
(2, 1, 1, NULL, 'Sony A7ii', 250000, 5, 'Boleh dipinjam kapan saja', '0'),
(11, 1, 2, NULL, 'Godox', 80000, 4, 'Lampu Flash', NULL),
(12, 1, 2, NULL, 'LED 500 Watt', 150000, 3, 'lampu Terang benerang', NULL),
(59, 1, 6, NULL, 'ximatec', 15000, 1, 'biasa', NULL),
(60, 1, 1, 'CN001', 'Canon100D', 150000, 1, 'asdda', NULL),
(64, 1, 1, 'CN002', 'EOS 70D', 300000, 4, 'wwww', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_pinjam`
--

CREATE TABLE `barang_pinjam` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_pinjam`
--

INSERT INTO `barang_pinjam` (`id`, `transaksi_id`, `barang_id`, `jumlah`) VALUES
(20, 20, 2, 2),
(22, 21, 11, 1),
(23, 21, 12, 1),
(24, 22, 12, 2),
(25, 23, 2, 1),
(26, 24, 11, 1),
(27, 25, 2, 1),
(28, 26, 1, 1),
(29, 26, 2, 1),
(30, 27, 59, 1),
(32, 29, 1, 1),
(33, 29, 2, 4),
(35, 31, 2, 1),
(40, 33, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(4, 'Bahan Makanan'),
(3, 'Gimbal'),
(1, 'Kamera'),
(2, 'Lighting'),
(6, 'tripod');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_penyewa` varchar(15) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `media_sosial` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL COMMENT 'Laki-laki, Perempuan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id`, `user_id`, `kode_penyewa`, `nama`, `alamat`, `email`, `no_telp`, `media_sosial`, `jenis_kelamin`) VALUES
(4, 1, NULL, 'Riduwan', 'Jl. Tumapel Singosari', 'riduwan@gmail.com', '+62895366446634', 'Ridz Creator', 'Laki-laki'),
(5, 1, NULL, 'Sahabul Ashfari', 'Jl. Rogonoto Timur no.235', 'ahmarsahab13@gmail.com', '089680895777', 'Sahabul Ashfari', 'Laki-laki'),
(6, 1, NULL, 'Mansur', 'Dsn Gunung Rejo Kreweh', 'rusnammildcv47@gmail.com', '081335369331', 'mansurzip', 'Laki-laki'),
(8, 1, NULL, 'bpk wedha', 'pakis', 'wedha@gmail.com', '087775242588', 'wedha', 'Laki-laki'),
(9, 1, NULL, 'riza', 'jl sulfat', 'riza@gmail', '9788133', 'mansurzip', 'Laki-laki'),
(12, 1, 'BAM12', 'bambang', 'jl kramat gg mawar hitam', 'artusima7@gmail.com', '6281335369331', 'bambangcuy', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`) VALUES
(1, 'Pinjam'),
(2, 'Sewa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penyewa_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `durasi` float NOT NULL,
  `jaminan` varchar(255) NOT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `penyewa_id`, `status_id`, `tanggal_pinjam`, `durasi`, `jaminan`, `tanggal_kembali`, `foto`) VALUES
(20, 1, 4, 2, '2021-05-05 21:41:00', 2, 'KTP,BPJS', '2021-05-09 22:12:01', NULL),
(21, 1, 5, 2, '2021-04-14 22:36:00', 1, 'KTP,BPJS', '2021-05-09 22:12:05', NULL),
(22, 1, 4, 2, '2020-05-08 21:03:00', 1, 'BPJS', '2021-05-09 22:12:09', NULL),
(23, 1, 4, 2, '2021-06-16 22:19:00', 2, 'KTP,BPJS', '2021-05-19 23:30:09', NULL),
(24, 1, 5, 1, '2021-05-11 22:21:00', 2, 'BPJS', '2021-05-19 23:30:04', NULL),
(25, 1, 5, 2, '2021-05-12 17:14:00', 2, 'KTP KK', '2021-05-19 23:30:01', NULL),
(26, 1, 4, 2, '2021-05-19 23:30:00', 1, 'KTP KK', '2021-06-10 09:22:42', NULL),
(27, 1, 6, 2, '2021-06-10 09:21:00', 2, 'KTP', NULL, NULL),
(29, 1, 8, 2, '2021-06-10 09:33:00', 3, 'KTP', '2021-06-10 09:50:44', NULL),
(31, 1, 8, 1, '2021-06-10 09:36:00', 1, 'KTP', '2021-06-10 09:42:20', NULL),
(33, 1, 6, 2, '2021-06-11 19:23:00', 1, 'KTP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `tipe`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `barang_pinjam`
--
ALTER TABLE `barang_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `kode_penyewa` (`kode_penyewa`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `penyewa_id` (`penyewa_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `barang_pinjam`
--
ALTER TABLE `barang_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_pinjam`
--
ALTER TABLE `barang_pinjam`
  ADD CONSTRAINT `barang_pinjam_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_pinjam_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`penyewa_id`) REFERENCES `penyewa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
