-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2025 at 02:37 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u597806360_db_wo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbwoass`
--

CREATE TABLE `tb_dbwoass` (
  `id_woass` int(15) NOT NULL,
  `no_woass` varchar(255) NOT NULL,
  `tglbuat_woass` date NOT NULL,
  `susun_woass` varchar(255) NOT NULL,
  `nama_susun_woass` varchar(255) NOT NULL,
  `asal_woass` varchar(255) NOT NULL,
  `nama_asal_woass` varchar(255) NOT NULL,
  `costc_woass` varchar(255) NOT NULL,
  `wbs_woass` varchar(255) NOT NULL,
  `tujuan_woass` varchar(255) NOT NULL,
  `jenis_woass` varchar(255) NOT NULL,
  `tglperlu_woass` date NOT NULL,
  `desc_woass` varchar(255) NOT NULL,
  `barang_woass` varchar(255) NOT NULL,
  `qty_woass` int(15) NOT NULL,
  `iden_woass` varchar(255) NOT NULL,
  `note_woass` varchar(255) NOT NULL,
  `lokasal_woass` varchar(255) NOT NULL,
  `pic_lokasal_woass` varchar(255) NOT NULL,
  `loktuj_woass` varchar(255) NOT NULL,
  `pic_loktuj_woass` varchar(255) NOT NULL,
  `status_woass` enum('unapprove','approve') DEFAULT 'unapprove'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbworo`
--

CREATE TABLE `tb_dbworo` (
  `id_woro` int(15) NOT NULL,
  `no_woro` varchar(255) NOT NULL,
  `tglbuat_woro` date NOT NULL,
  `asal_woro` varchar(255) NOT NULL,
  `nama_asal_woro` varchar(255) NOT NULL,
  `atasan_woro` varchar(255) NOT NULL,
  `nama_atasan_woro` varchar(255) NOT NULL,
  `tujuan_woro` varchar(255) NOT NULL,
  `costc_woro` varchar(255) NOT NULL,
  `wbs_woro` varchar(255) NOT NULL,
  `jenis_woro` varchar(255) NOT NULL,
  `tglperlu_woro` date NOT NULL,
  `desc_woro` varchar(255) NOT NULL,
  `barang_woro` varchar(255) NOT NULL,
  `qty_woro` int(15) NOT NULL,
  `utk_woro` varchar(255) NOT NULL,
  `note_woro` varchar(255) NOT NULL,
  `lokasal_woro` varchar(255) NOT NULL,
  `pic_lokasal_woro` varchar(255) NOT NULL,
  `loktuj_woro` varchar(255) NOT NULL,
  `pic_loktuj_woro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dbwoass`
--
ALTER TABLE `tb_dbwoass`
  ADD PRIMARY KEY (`id_woass`);

--
-- Indexes for table `tb_dbworo`
--
ALTER TABLE `tb_dbworo`
  ADD PRIMARY KEY (`id_woro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dbwoass`
--
ALTER TABLE `tb_dbwoass`
  MODIFY `id_woass` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_dbworo`
--
ALTER TABLE `tb_dbworo`
  MODIFY `id_woro` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
