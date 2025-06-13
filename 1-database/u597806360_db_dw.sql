-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2025 at 02:36 AM
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
-- Database: `u597806360_db_dw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbdeldraw`
--

CREATE TABLE `tb_dbdeldraw` (
  `id_del_dw` int(15) NOT NULL,
  `deleted_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_dw` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `legacy` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `deletion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbeditdraw`
--

CREATE TABLE `tb_dbeditdraw` (
  `id_edit_dw` int(15) NOT NULL,
  `edited_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_dw` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `legacy` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_rig_operation` varchar(255) NOT NULL,
  `new_rig_yard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhasildraw`
--

CREATE TABLE `tb_dbhasildraw` (
  `id_dw` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_dw` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `legacy` varchar(255) NOT NULL,
  `no_mov` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dbhasildraw`
--

INSERT INTO `tb_dbhasildraw` (`id_dw`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_dw`, `man`, `type`, `legacy`, `no_mov`, `no_po`, `username`) VALUES
(1, '2025-03-20', 'SBS', 'PDSI #01.2/N80B-M', 'H-3180', 'NOV', 'N-80-B', 'NOV', '11.06.0003', 'N/A', 'Adm Asset'),
(2, '2025-03-21', 'KTI', 'PDSI #04.3/N110-M', 'T-2419', 'NOV', 'N-110', 'NOV', '0010256000', 'N/A', 'Adm Asset'),
(3, '2025-01-28', 'SBS', 'PDSI #05.2/OW760-M', 'H39-92UK', 'NOV', '760', 'OIL WELL', 'N/A', 'N/A', 'Adm Asset'),
(4, '2025-03-21', 'JAWA', 'PDSI #08.1/H40D-M', 'H40D', 'NOV', 'B-140', 'IDECO', 'C601350000', 'N/A', 'Adm Asset'),
(5, '2025-03-21', 'JAWA', 'PDSI #09.2/N80UE-E', '10123054', 'NOV', '80 UE', 'NOV', '0109004400', 'N/A', 'Adm Asset'),
(6, '2025-03-21', 'KTI', 'PDSI #10.2/D700-M', '09-013', 'NOV', 'D700', 'NOV', '11.27.0072', 'N/A', 'Adm Asset'),
(7, '2025-03-21', 'KTI', 'PDSI #11.2/N80B-M', 'T-2535', 'NOV', 'N-80-B', 'NOV', '0010312010', 'N/A', 'Adm Asset'),
(8, '2025-03-21', 'JAWA', 'PDSI #12.3/N110-M', 'H-3190', 'NOV', 'N-110', 'NOV', '01.09.0002', 'N/A', 'Adm Asset'),
(9, '2025-01-28', 'JAWA', 'PDSI #13.1/H40D-M', 'N/A 1', 'NOV', '55 AH', 'NOV', '01.09.012', 'N/A', 'Adm Asset'),
(10, '2025-03-21', 'JAWA', 'PDSI #15.3/N110-M', 'H-3191', 'NOV', 'N-110-M', 'NOV', '01.12.0001', 'N/A', 'Adm Asset'),
(11, '2025-03-21', 'SBS', 'PDSI #16.2/NT45-M', '49132 LDII-1 (IDH-1)', 'NOV', 'T-45', 'NOV', 'RIG-00T451-01', 'N/A', 'Adm Asset'),
(12, '2025-03-21', 'JANARO', 'PDSI #17.2/NT45-M', '49232 LDII-1 (IDH-2)', 'NOV', 'NT-45', 'NOV', '0109006010', 'N/A', 'Adm Asset'),
(13, '2025-03-21', 'SBS', 'PDSI #18.2/LTO650-M', 'LTO650-B-2', 'NOV', 'LTO 650', 'COOPER', '4212.428', 'N/A', 'Adm Asset'),
(14, '2025-01-28', 'JANARO', 'PDSI #19.1/LTO350-M', '1878', 'NOV', '42-2-10/38-8', 'COOPER', 'N/A', 'N/A', 'Adm Asset'),
(15, '2025-03-21', 'SBS', 'PDSI #20.2/EMSCOD2-M', '46', 'NOV', 'MECHANICAL', 'CONTINENTAL', '0113007010', 'N/A', 'Adm Asset'),
(16, '2025-03-21', 'KTI', 'PDSI #21.2/OW700-M', 'H50-7', 'NOV', 'M-700', 'NOV', '0111001000', 'N/A', 'Adm Asset'),
(17, '2025-03-21', 'KTI', 'PDSI #22.2/OW700-M', 'H50-8', 'NOV', 'M-700', 'NOV', '0109000900', 'N/A', 'Adm Asset'),
(18, '2025-03-21', 'SBS', 'PDSI #23.1/CWKT650-M', '124', 'NOV', 'KT 210 B', 'CARDWELL', '0107008010', 'N/A', 'Adm Asset'),
(19, '2025-03-21', 'SBS', 'PDSI #24.1/CWKT210-M', '123', 'NOV', 'CARDWELL 210B', 'CARDWELL', '0107007010', 'N/A', 'Adm Asset'),
(20, '2025-01-28', 'SBS', 'PDSI #25.2/LTO750-M', '6-LTO750B6', 'NOV', '4214/428', 'COOPER', 'N/A', 'N/A', 'Adm Asset'),
(21, '2025-01-28', 'SBS', 'PDSI #26.1/H25CD-M', '570', 'NOV', 'H25 CD', 'IDECO', 'N/A', 'N/A', 'Adm Asset'),
(22, '2025-03-21', 'JAWA', 'PDSI #28.2/D1000-E', '472', 'NOV', 'DSGD-250-2300-28-56-12L-6H', 'NOV', '11.27.0073', 'N/A', 'Adm Asset'),
(23, '2025-03-21', 'SBS', 'PDSI #29.3/D1500-E/53', '473', 'NOV', 'DSGD-375-2300-28-56-12L-6H', 'NOV', '11.27.0074', 'N/A', 'Adm Asset'),
(24, '2025-03-21', 'SBS', 'PDSI #30.2/D1000-E', '480', 'NOV', 'DSGD-250-2300-28-56-12L-6H', 'NOV', '11.27.0079', 'N/A', 'Adm Asset'),
(25, '2025-03-21', 'JAWA', 'PDSI #31.3/D1500-E', '481', 'NOV', 'DSGD-375-2300-28-56-12L-6H', 'NOV', '11.27.0080', 'N/A', 'Adm Asset'),
(26, '2025-01-28', 'KTI', 'PDSI #32.2/N80UE-E', 'T-2449', 'NOV', 'N-80-UE', 'NOV', 'N/A', 'N/A', 'Adm Asset'),
(27, '2025-01-28', 'SBS', 'PDSI #33.1/IDECO/H35-M', 'CA 999', 'NOV', 'H35', 'IDECO', 'N/A', 'N/A', 'Adm Asset'),
(28, '2025-01-28', 'SBS', 'PDSI #34.1/IDECO/H35-M', 'A 705', 'NOV', 'H35 KD-AL 705', 'IDECO', 'N/A', 'N/A', 'Adm Asset'),
(29, '2025-03-21', 'JANARO', 'PDSI #35.1/IDECO/H35-M', 'PD01-DW350:1000', 'PETRODRILL', 'DW-350', 'PETRODRILL', '11.27.0085', 'N/A', 'Adm Asset'),
(30, '2025-03-21', 'SBS', 'PDSI #36.1/SKYTOP650-M', 'N/A 2', 'NOV', 'N/A', 'SKYTOP', '68.80.0001', 'N/A', 'Adm Asset'),
(31, '2025-03-21', 'JAWA', 'PDSI #38.2/D1000-E', '550', 'NOV', 'DSGD-250-2300-28-56-12L-6H', 'NOV', '11.27.0081', 'N/A', 'Adm Asset'),
(32, '2025-03-21', 'SBS', 'PDSI #39.3/D1500-E/57', '549', 'NOV', 'DSGD-375-2300-28-56-12L-6H', 'NOV', '03.62.1681', 'N/A', 'Adm Asset'),
(33, '2025-03-21', 'JAWA', 'PDSI #40.3/DS1500-E', '139', 'SCHLUMBERGER', 'LDW-1000K', 'LEWCO/CAMERON', '1.9.2004', 'N/A', 'Adm Asset'),
(34, '2025-03-21', 'SBS', 'PDSI #41.3/N110UE-E', '57803', 'NOV', 'N-110-UE', 'NOV', '11.27.0082', 'N/A', 'Adm Asset'),
(35, '2025-03-21', 'JANARO', 'PDSI #42.3/N1500-E', 'ADS10SDD23V050-TX', 'NOV', 'ADS10SDD23V050-IX', 'NOV', '11.27.0083', 'N/A', 'Adm Asset'),
(36, '2025-03-21', 'KTI', 'PDSI #43.3/AB1500-E', '140797', 'AMERICAN BLOCK', '35670000', 'AMERICAN BLOCK', '11.27.0084', 'N/A', 'Adm Asset'),
(37, '2025-05-09', 'SBS', 'PDSI #44.1/PD350-M', 'PD61-DW350-1000', 'PETRODRILL', 'PD-350', 'PETRODRILL', '11.27.0086', 'N/A', 'Adm Asset'),
(38, '2025-05-09', 'SBS', 'PDSI #45.1/PD350-M', 'PD03-DW350-1000', 'PETRODRILL', 'PD-350', 'PETRODRILL', '11.27.0087', 'N/A', 'Adm Asset'),
(39, '2025-05-09', 'JANARO', 'PDSI #46.1/PD350-M', 'PD04-DW350-1000', 'PETRODRILL', 'PD-350', 'PETRODRILL', '11.27.0088', 'N/A', 'Adm Asset'),
(40, '2025-05-09', 'OFF SHORE', 'PDSI #47.2/PD550-M', 'PD15A-DW550-1000', 'PETRODRILL', 'PD-550', 'PETRODRILL', '11.27.0090', 'N/A', 'Adm Asset'),
(41, '2025-05-09', 'OFF SHORE', 'PDSI #48.2/PD550-M', 'PD15B-DW550-1000', 'PETRODRILL', 'PD-550', 'PETRODRILL', '11.27.0091', 'N/A', 'Adm Asset'),
(42, '2025-01-28', 'JANARO', 'PDSI #49.2/PD550-M', '210102', 'SJ PETRO', 'SDW-550', 'SJ PETRO', 'N/A', 'N/A', 'Adm Asset'),
(43, '2025-03-21', 'JANARO', 'PDSI #50.2/PD550-M', 'WRH-13120', 'SJ PETRO', 'C18/PD550-M', 'SJ PETRO', '11.27.0093', 'N/A', 'Adm Asset'),
(44, '2025-03-21', 'JANARO', 'PDSI #51.2/PD550-M', '210103', 'SJ PETRO', 'SDW-550', 'SJ PETRO', '11.27.0094', 'N/A', 'Adm Asset'),
(45, '2025-03-21', 'JANARO', 'PDSI #52.2/PD550-M', 'N/A 3', 'SJ PETRO', 'SDW-550', 'SJ PETRO', '11.27.0095', 'N/A', 'Adm Asset'),
(48, '2025-05-09', 'JANARO', 'PDSI #53.2/ZJ750-M', 'JC-23068-01', 'JEREH', 'JC28/11-750', 'JEREH', '11.27.0096', 'N/A', 'Adm Asset'),
(49, '2025-05-09', 'JANARO', 'PDSI #54.2/ZJ750-M', 'JC-23068-02', 'JEREH', 'JC28/11-750', 'JEREH', '11.27.0097', 'N/A', 'Adm Asset');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhoursdraw`
--

CREATE TABLE `tb_dbhoursdraw` (
  `id_hours_dw` int(15) NOT NULL,
  `sn_dw` varchar(255) NOT NULL,
  `man` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `legacy` varchar(255) DEFAULT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `duration` time NOT NULL,
  `total_duration` time NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dbdeldraw`
--
ALTER TABLE `tb_dbdeldraw`
  ADD PRIMARY KEY (`id_del_dw`);

--
-- Indexes for table `tb_dbeditdraw`
--
ALTER TABLE `tb_dbeditdraw`
  ADD PRIMARY KEY (`id_edit_dw`);

--
-- Indexes for table `tb_dbhasildraw`
--
ALTER TABLE `tb_dbhasildraw`
  ADD PRIMARY KEY (`id_dw`);

--
-- Indexes for table `tb_dbhoursdraw`
--
ALTER TABLE `tb_dbhoursdraw`
  ADD PRIMARY KEY (`id_hours_dw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dbdeldraw`
--
ALTER TABLE `tb_dbdeldraw`
  MODIFY `id_del_dw` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dbeditdraw`
--
ALTER TABLE `tb_dbeditdraw`
  MODIFY `id_edit_dw` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_dbhasildraw`
--
ALTER TABLE `tb_dbhasildraw`
  MODIFY `id_dw` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_dbhoursdraw`
--
ALTER TABLE `tb_dbhoursdraw`
  MODIFY `id_hours_dw` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
