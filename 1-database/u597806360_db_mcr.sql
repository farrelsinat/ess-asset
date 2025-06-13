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
-- Database: `u597806360_db_mcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbdelmcr`
--

CREATE TABLE `tb_dbdelmcr` (
  `id_del_mcr` int(15) NOT NULL,
  `deleted_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_mcr` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_mcr` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `deletion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbeditmcr`
--

CREATE TABLE `tb_dbeditmcr` (
  `id_edit_mcr` int(15) NOT NULL,
  `edited_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_mcr` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_mcr` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_rig_operation` varchar(255) NOT NULL,
  `new_rig_yard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhasilmcr`
--

CREATE TABLE `tb_dbhasilmcr` (
  `id_mcr` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_mcr` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_mcr` varchar(255) NOT NULL,
  `no_asset` varchar(255) NOT NULL,
  `no_mov` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dbhasilmcr`
--

INSERT INTO `tb_dbhasilmcr` (`id_mcr`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_mcr`, `type`, `man`, `status_mcr`, `no_asset`, `no_mov`, `no_po`, `username`) VALUES
(1, '2025-04-30', 'SBS', 'PDSI #01.2/N80B-M', 'SN-UNK-1', '600 GP M', 'N/A', 'ON SITE', '700004018', '9780203010', 'N/A', 'Adm Asset'),
(2, '2025-04-30', 'SBS', 'PDSI #01.2/N80B-M', 'MA-024468', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710021203', '01.66.9363', 'N/A', 'Adm Asset'),
(3, '2025-04-30', 'KTI', 'PDSI #04.3/N110-M', 'SN-UNK-3', 'N/A', 'DERRICK', 'ON SITE', '710004445', '01.69.1027', 'N/A', 'Adm Asset'),
(4, '2025-04-30', 'SBS', 'PDSI#05.2/OW760-M', 'DA-001196', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', 'N/A', '01.66.9301', 'N/A', 'Adm Asset'),
(5, '2025-04-30', 'SBS', 'PDSI#05.2/OW760-M', 'MA-023342', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018170', '01.66.9301', 'N/A', 'Adm Asset'),
(6, '2025-04-30', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-6', 'BRANDT TM 24/3', 'NOV', 'ON SITE', '710018233', '01.66.9276', 'N/A', 'Adm Asset'),
(7, '2025-04-30', 'KTI', 'PDSI #10.2/D700-M', 'SN-UNK-7', 'N/A', 'DERRICK', 'ON SITE', '710004443', '01.69.1025', 'N/A', 'Adm Asset'),
(8, '2025-04-30', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-8', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710004444', '01.69.1026', 'N/A', 'Adm Asset'),
(9, '2025-04-30', 'KTI', 'PDSI #11.2/N80B-M', '20152', 'BRANDT', 'NOV', 'ON SITE', '710019605', '01.66.9345', 'N/A', 'Adm Asset'),
(10, '2025-04-30', 'JAWA', 'PDSI #12.3/N110-M ', 'SN-UNK-10', 'BRANDT TM 24/3', 'NOV', 'ON SITE', '710018232', '01.66.9275', 'N/A', 'Adm Asset'),
(11, '2025-04-30', 'JANARO', 'PDSI #17.2/NT45-M', 'MA-023343', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018171', '01.66.9302', 'N/A', 'Adm Asset'),
(12, '2025-04-30', 'SBS', 'PDSI #18.2/LTO650-M', 'MA-024243', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(13, '2025-04-30', 'SBS', 'PDSI #20.2/EMSCOD2-M', '20150', 'BRANDT', 'NOV', 'ON SITE', '710019603', '01.66.9343', 'N/A', 'Adm Asset'),
(14, '2025-04-30', 'KTI', 'PDSI #21.2/OW700-M', '17611-01-542', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710009445', '01.66.9251', 'N/A', 'Adm Asset'),
(15, '2025-04-30', 'KTI', 'PDSI #22.2/OW700-M', 'MA-023341', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018169', '01.66.9300', 'N/A', 'Adm Asset'),
(16, '2025-04-30', 'SBS', 'PDSI #23.1/CWKT650-M', 'SN-UNK-16', 'N/A', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(17, '2025-04-30', 'SBS', 'PDSI #25.2/LTO750-M', 'MA-024467', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710021205', '01.66.9365', 'N/A', 'Adm Asset'),
(18, '2025-04-30', 'JAWA', 'PDSI #28.2/D1000-E', 'SN-UNK-18', 'FLC-504', 'DERRICK', 'ON SITE', '710013692', '01.69.1050', 'N/A', 'Adm Asset'),
(19, '2025-04-30', 'SBS', 'PDSI #29.3/D1500-E/53', 'MA-023342', 'N/A', 'NOV', 'ON SITE', '710002812', '01.69.1029', 'N/A', 'Adm Asset'),
(20, '2025-04-30', 'SBS', 'PDSI #30.2/D1000-E', 'MA-024469', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710021207', '01.66.9367', 'N/A', 'Adm Asset'),
(21, '2025-04-30', 'JAWA', 'PDSI #31.3/D1500-E', 'SN-UNK-21', 'N/A', 'NOV', 'ON SITE', '710003756', '01.69.1032', 'N/A', 'Adm Asset'),
(22, '2025-04-30', 'KTI', 'PDSI #32.2/N80UE-E', 'MA-023345', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018173', '01.66.9304', 'N/A', 'Adm Asset'),
(23, '2025-04-30', 'SBS', 'PDSI #36.1/SKYTOP/650-M', '20151', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710019604', '01.66.9344', 'N/A', 'Adm Asset'),
(24, '2025-04-30', 'JAWA', 'PDSI #38.2/D1000-E', 'SN-UNK-24', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710005582', '01.69.1062', 'N/A', 'Adm Asset'),
(25, '2025-04-30', 'SBS', 'PDSI #39.3/D1500-E/57', 'SN-UNK-25', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710004786', '01.68.0019', 'N/A', 'Adm Asset'),
(26, '2025-04-30', 'SBS', 'PDSI #41.3/N110UE-E', 'SN-UNK-26', 'FLC-503 1200 GPM', 'DERRICK', 'ON SITE', '710005923', '01.69.1063', 'N/A', 'Adm Asset'),
(27, '2025-04-30', 'JANARO', 'PDSI #42.3/N1500-E', 'MA-023344', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018172', '01.66.9303', 'N/A', 'Adm Asset'),
(28, '2025-04-30', 'KTI', 'PDSI #43.3/AB1500-E', 'SN-UNK-28', 'FLC-504', 'DERRICK', 'ON SITE', '710013668', '01.69.1053', 'N/A', 'Adm Asset'),
(29, '2025-04-30', 'JANARO', 'PDSI #51.2/PD550-M', 'SN-UNK-29', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020436', '01.66.9358', 'N/A', 'Adm Asset'),
(30, '2025-04-30', 'JANARO', ' PDSI #52.2/PD550-M', 'SN-UNK-30', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020732', '01.66.9362', 'N/A', 'Adm Asset');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dbdelmcr`
--
ALTER TABLE `tb_dbdelmcr`
  ADD PRIMARY KEY (`id_del_mcr`);

--
-- Indexes for table `tb_dbeditmcr`
--
ALTER TABLE `tb_dbeditmcr`
  ADD PRIMARY KEY (`id_edit_mcr`);

--
-- Indexes for table `tb_dbhasilmcr`
--
ALTER TABLE `tb_dbhasilmcr`
  ADD PRIMARY KEY (`id_mcr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dbdelmcr`
--
ALTER TABLE `tb_dbdelmcr`
  MODIFY `id_del_mcr` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dbeditmcr`
--
ALTER TABLE `tb_dbeditmcr`
  MODIFY `id_edit_mcr` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dbhasilmcr`
--
ALTER TABLE `tb_dbhasilmcr`
  MODIFY `id_mcr` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
