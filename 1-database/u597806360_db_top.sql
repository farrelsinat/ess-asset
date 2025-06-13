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
-- Database: `u597806360_db_top`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbdeltop`
--

CREATE TABLE `tb_dbdeltop` (
  `id_del_top` int(15) NOT NULL,
  `deleted_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_top` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tonase` varchar(255) NOT NULL,
  `status_top` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `deletion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbedittop`
--

CREATE TABLE `tb_dbedittop` (
  `id_edit_top` int(15) NOT NULL,
  `edited_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_top` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tonase` varchar(255) NOT NULL,
  `status_top` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_rig_operation` varchar(255) NOT NULL,
  `new_rig_yard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhasiltop`
--

CREATE TABLE `tb_dbhasiltop` (
  `id_top` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_top` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tonase` varchar(255) NOT NULL,
  `tahun_beli` varchar(255) NOT NULL,
  `status_top` varchar(255) NOT NULL,
  `no_mov` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dbhasiltop`
--

INSERT INTO `tb_dbhasiltop` (`id_top`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_top`, `type`, `tonase`, `tahun_beli`, `status_top`, `no_mov`, `no_po`, `username`) VALUES
(1, '2025-04-29', 'JAWA', 'SUNTER', 'TDS500MHY/01', 'Maritime 500', '500', '', 'STANDBY', 'UNKNOW', 'N/A', 'Adm Asset'),
(2, '2025-04-29', 'JAWA', 'PDSI #12.3/N110-M', 'TDS500THY/02', 'Tesco 500', '500', '2007', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(3, '2025-04-29', 'JAWA', 'PDSI #15.3/N110-M', 'TDS500THY/03', 'Tesco 500', '500', '2007', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(4, '2025-04-29', 'SBS', 'PDSI #25.2/LTO750-M', 'TDS250THY/04', 'TD 250 Ton ', '250', '2010', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(5, '2025-04-29', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'TDS250THY/05', 'TD 250 Ton ', '250', '2010', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(6, '2025-04-29', 'KTI', 'PDSI #11.2/N80B-M', 'TDS250THY/06', 'TD 250 Ton ', '250', '2011', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(7, '2025-04-29', 'SBS', 'PDSI #05.2/OW760-M', 'TDS500MHY/07', 'Maritime 500', '500', '', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(9, '2025-04-29', 'JAWA', 'PDSI #28.2/D1000-E', 'TDS250NEL/09', 'TDS-10SA', '250', '2011', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(10, '2025-04-29', 'KTI', 'PDSI #04.3/N110-M', 'TDS500NEL/10', 'TDS-11SA', '500', '2013', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(11, '2025-04-29', 'SBS', 'PDSI #41.3/N110UE-E', 'TDS500CEL/11', 'CANRIG 500', '500', '', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(12, '2025-04-29', 'KTI', 'PDSI #21.2/OW700-M', 'TDS250WHY/12', 'Warrior 250', '250', '2014', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(13, '2025-04-29', 'KTI', 'PDSI #10.2/D700-M', 'TDS250WHY/13', 'Warrior 250', '250', '2014', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(14, '2025-04-29', 'KTI', 'PDSI #32.2/N80UE-E', 'TDS500NEL/14', 'TDS-11 SA', '500', '2014', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(15, '2025-04-29', 'SBS', 'PDSI #39.3/D1500-E/57', 'TDS500NEL/15', 'TDS-11 SA', '500', '2014', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(16, '2025-04-29', 'JAWA', 'PDSI #09.2/N80UE-E', 'TDS500NEL/16', 'TDS-11 SA', '500', '2014', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(17, '2025-04-29', 'WS VENDOR', 'NOV BSD', 'TDS250NEL/17', 'TDS-10 SH', '250', '2014', 'RE-COC/REPAIR', 'UNKNOW', 'N/A', 'Adm Asset'),
(18, '2025-04-29', 'SBS', 'PDSI #30.2/D1000-E', 'TDS250NEL/18', 'TDS-10 SH', '250', '2014', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(19, '2025-04-29', 'JANARO', 'PDSI #42.3/N1500-E', 'TDS500NEL/19', 'TDS-11 SA', '500', '', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(20, '2025-04-29', 'SBS', 'PDSI #29.3/D1500-E/53', 'TDS500NEL/20', 'TDS-11 SA', '500', '2011', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(21, '2025-04-29', 'JAWA', 'PDSI #31.3/D1500-E', 'TDS500NEL/21', 'TDS-11 SA', '500', '2015', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(22, '2025-04-29', 'JAWA', 'PDSI #40.3/DS1500-E', 'TDS500NEL/22', 'TDS-11 SA', '500', '', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(23, '2025-04-29', 'SBS', 'PDSI #01.2/N80B-M', 'TDS500NHY/23', 'TDH-250', '250', '2016', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(24, '2025-04-29', 'JANARO', 'PDSI #17.2/NT45-M', 'TDS500NHY/24', 'TDH-250', '250', '2016', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(25, '2025-04-29', 'KTI', 'PDSI #22.2/OW700-M', 'TDS500NHY/25', 'TDH-250', '250', '2016', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(26, '2025-04-29', 'SBS', 'PDSI #16.2/NT45-M', 'TDS500NHY/26', 'TDH-250', '250', '2016', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(27, '2025-04-29', 'KTI', 'PDSI #43.3/AB1500-E', 'TDS500NEL/27', 'TDS-11 SA', '500', '2017', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(28, '2025-04-29', 'JANARO', 'PDSI #49.2/PD550-M', 'TDH250CHY/28', 'Tesco 250 Ton', '250', '2021', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(29, '2025-04-29', 'JANARO', 'PDSI #52.2/PD550-M', 'TDH250CHY/29', 'Tesco 250 Ton', '250', '2021', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(30, '2025-04-29', 'JANARO', 'PDSI #51.2/PD550-M', 'TDH250CHY/30', 'Tesco 250 Ton', '250', '2021', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(31, '2025-04-29', 'JANARO', 'PDSI #50.2/PD550-M', 'TDH250CHY/31', 'Tesco 250 Ton', '250', '2021', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(32, '2025-04-29', 'JANARO', 'PDSI #53.2/ZJ750-M', 'TDH250CHY/32', 'Tesco 250 Ton', '250', '2023', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset'),
(33, '2025-04-29', 'JANARO', 'PDSI #54.2/ZJ750-M', 'TDH250CHY/33', 'Tesco 250 Ton', '250', '2023', 'ON SITE', 'UNKNOW', 'N/A', 'Adm Asset');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhourstop`
--

CREATE TABLE `tb_dbhourstop` (
  `id_hours_top` int(15) NOT NULL,
  `sn_top` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tonase` varchar(255) NOT NULL,
  `status_top` varchar(255) NOT NULL,
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
-- Indexes for table `tb_dbdeltop`
--
ALTER TABLE `tb_dbdeltop`
  ADD PRIMARY KEY (`id_del_top`);

--
-- Indexes for table `tb_dbedittop`
--
ALTER TABLE `tb_dbedittop`
  ADD PRIMARY KEY (`id_edit_top`);

--
-- Indexes for table `tb_dbhasiltop`
--
ALTER TABLE `tb_dbhasiltop`
  ADD PRIMARY KEY (`id_top`);

--
-- Indexes for table `tb_dbhourstop`
--
ALTER TABLE `tb_dbhourstop`
  ADD PRIMARY KEY (`id_hours_top`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dbdeltop`
--
ALTER TABLE `tb_dbdeltop`
  MODIFY `id_del_top` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_dbedittop`
--
ALTER TABLE `tb_dbedittop`
  MODIFY `id_edit_top` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_dbhasiltop`
--
ALTER TABLE `tb_dbhasiltop`
  MODIFY `id_top` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_dbhourstop`
--
ALTER TABLE `tb_dbhourstop`
  MODIFY `id_hours_top` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
