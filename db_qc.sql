-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 04:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_qc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `nama_item` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `item`, `keterangan`) VALUES
(5, 'Ankylosaurus', 'Quty/IKEA'),
(7, 'Brontosaurus', 'H&amp;M'),
(8, 'Rabbit', 'Donehae');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produksi`
--

CREATE TABLE `tbl_produksi` (
  `id_item` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `item` varchar(150) NOT NULL,
  `jam` time NOT NULL,
  `hasil_produksi` varchar(10) NOT NULL,
  `reject_jahitan` varchar(10) NOT NULL,
  `reject_bentuk` varchar(10) NOT NULL,
  `total_reject` varchar(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produksi`
--

INSERT INTO `tbl_produksi` (`id_item`, `tgl`, `item`, `jam`, `hasil_produksi`, `reject_jahitan`, `reject_bentuk`, `total_reject`, `keterangan`) VALUES
(2, '2021-09-19', 'ankylosaurus', '13:33:00', '50', '8', '10', '18', 'ok'),
(3, '2021-12-10', 'ankylosaurus', '12:10:00', '150', '7', '20', '27', '- Gabungan jungjat\r\n- Hidung panjang sebelah\r\n-ekor melintir'),
(4, '2022-02-01', 'Brontosaurus', '11:32:00', '50', '8', '8', '16', 'reject bolong'),
(5, '2022-02-07', 'Ankylosaurus', '07:30:00', '150', '8', '12', '20', 'Ekor Melintir\r\nDuri Kurang Masuk\r\nBodi Samping Mepet'),
(6, '2022-02-07', 'Ankylosaurus', '08:30:00', '150', '9', '15', '24', 'Ekor Melintir\r\nDuri Kurang Masuk\r\nBodi Samping Mepet');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buyer`
--

CREATE TABLE `tb_buyer` (
  `id_buyer` int(11) NOT NULL,
  `nama_buyer` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buyer`
--

INSERT INTO `tb_buyer` (`id_buyer`, `nama_buyer`, `ket`, `foto`) VALUES
(1234, 'Testing', 'Test', '6344389a4972c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(2, 'Sifa', 'user1', '12345678', 'karyawan'),
(9, 'Ida', 'User2', 'Bintang7', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
