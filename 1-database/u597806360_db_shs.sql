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
-- Database: `u597806360_db_shs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbdelshs`
--

CREATE TABLE `tb_dbdelshs` (
  `id_del_shs` int(15) NOT NULL,
  `deleted_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_shs` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_shs` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `deletion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbeditshs`
--

CREATE TABLE `tb_dbeditshs` (
  `id_edit_shs` int(15) NOT NULL,
  `edited_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_shs` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_shs` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_rig_operation` varchar(255) NOT NULL,
  `new_rig_yard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhasilshs`
--

CREATE TABLE `tb_dbhasilshs` (
  `id_shs` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_shs` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_shs` varchar(255) NOT NULL,
  `no_asset` varchar(255) NOT NULL,
  `no_mov` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dbhasilshs`
--

INSERT INTO `tb_dbhasilshs` (`id_shs`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_shs`, `type`, `man`, `status_shs`, `no_asset`, `no_mov`, `no_po`, `username`) VALUES
(1, '2025-04-30', 'SBS', 'PDSI #01.2/N80B-M', '17611-02-613', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710009431', '01.66.9237', 'N/A', 'Adm Asset'),
(2, '2025-04-30', 'SBS', 'PDSI #01.2/N80B-M', '17611-02-614', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710009430', '01.66.9236', 'N/A', 'Adm Asset'),
(3, '2025-04-30', 'SBS', 'PDSI #01.2/N80B-M', '17611-02-842', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710009429', '01.66.9235', 'N/A', 'Adm Asset'),
(4, '2025-04-30', 'KTI', 'PDSI #04.3/N110-M', 'SN-UNK-4', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710004523', '01.61.1079', 'N/A', 'Adm Asset'),
(5, '2025-04-30', 'KTI', 'PDSI #04.3/N110-M', 'SN-UNK-5', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(6, '2025-04-30', 'KTI', 'PDSI #04.3/N110-M', 'SN-UNK-6', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(7, '2025-04-30', 'KTI', 'PDSI #04.3/N110-M', 'MA-024244', 'HYPERPOOL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(8, '2025-04-30', 'KTI', 'PDSI #04.3/N110-M', 'MA-024235', 'HYPERPOOL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(9, '2025-04-30', 'KTI', 'PDSI #04.3/N110-M', '16013-00', 'FLC', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(10, '2025-04-30', 'SBS', 'PDSI #05.2/OW760-M', 'FE-SHA-KC-017', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', '4500190677', 'Adm Asset'),
(11, '2025-04-30', 'SBS', 'PDSI #07.1/PD350-M', 'SN-UNK-11', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710001231', '01.66.1104', 'N/A', 'Adm Asset'),
(12, '2025-04-30', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-12', 'N/A', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(13, '2025-04-30', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-13', 'N/A', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(14, '2025-04-30', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-14', 'N/A', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(15, '2025-04-30', 'KTI', 'PDSI #10.2/D700-M', 'SN-UNK-15', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(16, '2025-04-30', 'KTI', 'PDSI #10.2/D700-M', 'SN-UNK-16', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(17, '2025-04-30', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-17', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710004522', '01.61.1078', 'N/A', 'Adm Asset'),
(18, '2025-04-30', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-18', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(19, '2025-04-30', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-19', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(20, '2025-04-30', 'JAWA', 'PDSI #12.3/N110-M', 'MA-021596', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710011711', '01.66.9261', 'N/A', 'Adm Asset'),
(21, '2025-04-30', 'JAWA', 'PDSI #12.3/N110-M', 'MA-021595', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710011710', '01.66.9260', 'N/A', 'Adm Asset'),
(22, '2025-04-30', 'JAWA', 'PDSI #12.3/N110-M', 'MA-021594', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710011709', '01.66.9259', 'N/A', 'Adm Asset'),
(23, '2025-04-30', 'JAWA', 'PDSI #12.3/N110-M', 'MA-01825', 'FLC-500', 'DERRICK', 'ON SITE', '700005134', '01.66.9226', 'N/A', 'Adm Asset'),
(24, '2025-04-30', 'JAWA', 'PDSI #12.3/N110-M', 'MA-01824', 'FLC-500', 'DERRICK', 'ON SITE', '700005133', '01.66.9225', 'N/A', 'Adm Asset'),
(25, '2025-04-30', 'JAWA', 'PDSI #12.3/N110-M', 'MA-01823', 'FLC-500', 'DERRICK', 'ON SITE', '700005132', '01.66.9224', 'N/A', 'Adm Asset'),
(26, '2025-04-30', 'JAWA', 'PDSI #13.1/H40D-M', 'SN-UNK-26', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(27, '2025-04-30', 'JAWA', 'PDSI #13.1/H40D-M', 'SN-UNK-27', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(28, '2025-04-30', 'JAWA', 'PDSI #13.1/H40D-M', 'SN-UNK-28', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(29, '2025-04-30', 'JAWA', 'PDSI #15.3/N110-M', 'MA-021599', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710011717', '01.66.9267', 'N/A', 'Adm Asset'),
(30, '2025-04-30', 'JAWA', 'PDSI #15.3/N110-M', 'MA-021598', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710011716', '01.66.9266', 'N/A', 'Adm Asset'),
(31, '2025-04-30', 'JAWA', 'PDSI #15.3/N110-M', 'MA-021597', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710011715', '01.66.9265', 'N/A', 'Adm Asset'),
(32, '2025-04-30', 'JAWA', 'PDSI #15.3/N110-M', 'SN-UNK-32', 'HYPERPOOL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(33, '2025-04-30', 'SBS', 'PDSI #16.2/NT45-M', 'MA-023380-(1)', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710017689', '01.66.9320', 'N/A', 'Adm Asset'),
(34, '2025-04-30', 'SBS', 'PDSI #16.2/NT45-M', 'MA-023428', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710017687', '01.66.9318', 'N/A', 'Adm Asset'),
(35, '2025-04-30', 'SBS', 'PDSI #16.2/NT45-M', 'MA-023429', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710017688', '01.66.9319', 'N/A', 'Adm Asset'),
(36, '2025-04-30', 'JANARO', 'PDSI #17.2/NT45-M', 'SN-UNK-36', 'FLC-503 SINGLE DECK', 'DERRICK', 'ON SITE', '710001582', '01.66.1075', 'N/A', 'Adm Asset'),
(37, '2025-04-30', 'SBS', 'PDSI #18.2/LTO650-M', 'SN-UNK-37', 'BD56109', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(38, '2025-04-30', 'JANARO', 'PDSI #19.1/LTO350-M', 'MA-023381', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018180', '01.66.9311', 'N/A', 'Adm Asset'),
(39, '2025-04-30', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'MA-023276', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018597', '01.66.9340', 'N/A', 'Adm Asset'),
(40, '2025-04-30', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'MA-023559', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018598', '01.66.9341', 'N/A', 'Adm Asset'),
(41, '2025-04-30', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'MA-023600', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018599', '01.66.9342', 'N/A', 'Adm Asset'),
(42, '2025-04-30', 'KTI', 'PDSI #21.2/OW700-M ', '17611-02-857', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710009443', '01.66.9249', 'N/A', 'Adm Asset'),
(43, '2025-04-30', 'KTI', 'PDSI #21.2/OW700-M ', '17611-02-858', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710009441', '01.66.9247', 'N/A', 'Adm Asset'),
(44, '2025-04-30', 'KTI', 'PDSI #21.2/OW700-M ', '17611-02-860', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710009442', '01.66.9248', 'N/A', 'Adm Asset'),
(45, '2025-04-30', 'KTI', 'PDSI #22.2/OW700-M', 'SN-UNK-45', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710018234', '01.66.9277', 'N/A', 'Adm Asset'),
(46, '2025-04-30', 'KTI', 'PDSI #22.2/OW700-M', 'SN-UNK-46', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710018235', '01.66.9278', 'N/A', 'Adm Asset'),
(47, '2025-04-30', 'KTI', 'PDSI #22.2/OW700-M', 'SN-UNK-47', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710018236', '01.66.9279', 'N/A', 'Adm Asset'),
(48, '2025-04-30', 'SBS', 'PDSI #23.1/CWKT650-M', 'SN-UNK-48', 'TRI FLEW', 'N/A', 'ON SITE', '710001580', '01.66.1073', 'N/A', 'Adm Asset'),
(49, '2025-04-30', 'SBS', 'PDSI #24.1/CWKT210-M', '14579-01-094', 'FLC-513', 'DERRICK', 'ON SITE', 'N/A', '01.66.1005', 'N/A', 'Adm Asset'),
(50, '2025-04-30', 'SBS', 'PDSI #25.2/LTO750-M', 'MA-022077', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710015729', '01.66.9281', 'N/A', 'Adm Asset'),
(51, '2025-04-30', 'SBS', 'PDSI #25.2/LTO750-M', 'MA-022078-(1)', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710015730', '01.66.9282', 'N/A', 'Adm Asset'),
(52, '2025-04-30', 'SBS', 'PDSI #25.2/LTO750-M', 'MA-022079', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710015731', '01.66.9283', 'N/A', 'Adm Asset'),
(53, '2025-04-30', 'SBS', 'PDSI #26.1/H25CD-M', '114340537', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '700002398', 'N/A', 'N/A', 'Adm Asset'),
(54, '2025-04-30', 'JAWA', 'PDSI #28.2/D1000-E', 'MA-022627', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018179', '01.66.9310', 'N/A', 'Adm Asset'),
(55, '2025-04-30', 'JAWA', 'PDSI #28.2/D1000-E', 'MA-022626', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018178', '01.66.9309', 'N/A', 'Adm Asset'),
(56, '2025-04-30', 'JAWA', 'PDSI #28.2/D1000-E', 'MA-022625', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018177', '01.66.9308', 'N/A', 'Adm Asset'),
(57, '2025-04-30', 'SBS', 'STAGING AREA TLJ-207', 'SN-UNK-57', 'BRANDT KING COBRA', 'NOV', 'STANDBY', '710002807', '01.66.1088', 'N/A', 'Adm Asset'),
(58, '2025-04-30', 'SBS', 'STAGING AREA TLJ-207', 'SN-UNK-58', 'BRANDT KING COBRA', 'NOV', 'STANDBY', '710002808', '01.66.1089', 'N/A', 'Adm Asset'),
(59, '2025-04-30', 'SBS', 'STAGING AREA TLJ-207', 'SN-UNK-59', 'BRANDT KING COBRA', 'NOV', 'STANDBY', '710002809', '01.66.1090', 'N/A', 'Adm Asset'),
(60, '2025-04-30', 'SBS', 'PDSI #29.3/D1500-E/53', 'MA-023266', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018591', '01.66.9334', 'N/A', 'Adm Asset'),
(61, '2025-04-30', 'SBS', 'PDSI #29.3/D1500-E/53', 'MA-023267', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018592', '01.66.9335', 'N/A', 'Adm Asset'),
(62, '2025-04-30', 'SBS', 'PDSI #29.3/D1500-E/53', 'MA-023268', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018593', '01.66.9336', 'N/A', 'Adm Asset'),
(63, '2025-04-30', 'SBS', 'PDSI #30.2/D1000-E', 'MA-022078-(2)', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710017263', '01.66.9291', 'N/A', 'Adm Asset'),
(64, '2025-04-30', 'SBS', 'PDSI #30.2/D1000-E', 'MA-022078-(3)', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710017264', '01.66.9292', 'N/A', 'Adm Asset'),
(65, '2025-04-30', 'SBS', 'PDSI #30.2/D1000-E', 'MA-022078-(4)', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710017265', '01.66.9293', 'N/A', 'Adm Asset'),
(66, '2025-04-30', 'SBS', 'PDSI #31.3/D1500-E', 'SN-UNK-66', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710003753', '01.66.1102', 'N/A', 'Adm Asset'),
(67, '2025-04-30', 'SBS', 'PDSI #31.3/D1500-E', 'SN-UNK-67', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710003752', '01.66.1101', 'N/A', 'Adm Asset'),
(68, '2025-04-30', 'SBS', 'PDSI #31.3/D1500-E', 'SN-UNK-68', 'BRANDT KING COBRA', 'NOV', 'ON SITE', '710003751', '01.66.1100', 'N/A', 'Adm Asset'),
(69, '2025-04-30', 'KTI', 'PDSI #32.2/N80UE-E', 'MA-023425', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018188', '01.66.9312', 'N/A', 'Adm Asset'),
(70, '2025-04-30', 'KTI', 'PDSI #32.2/N80UE-E', 'MA-023426', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018189', '01.66.9313', 'N/A', 'Adm Asset'),
(71, '2025-04-30', 'KTI', 'PDSI #32.2/N80UE-E', 'MA-023427', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018190', '01.66.9314', 'N/A', 'Adm Asset'),
(72, '2025-04-30', 'SBS', 'PDSI #33.1/IDECO/H35-M', 'MA-020038', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(73, '2025-04-30', 'SBS', 'PDSI #34.1/IDECO/H35-M', 'SN-UNK-73', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(74, '2025-04-30', 'JANARO', 'PDSI #35.1/IDECO/H35-M ', 'SN-UNK-74', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710011092', '01.66.9258', 'N/A', 'Adm Asset'),
(75, '2025-04-30', 'JANARO', 'PDSI #35.1/IDECO/H35-M ', 'MA-013558', 'FLC-503', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(76, '2025-04-30', 'SBS', 'PDSI #36.1/SKYTOP/650-M', 'SN-UNK-76', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', '01.66.9371', 'N/A', 'Adm Asset'),
(77, '2025-04-30', 'SBS', 'PDSI #36.1/SKYTOP/650-M', 'SN-UNK-77', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', '01.66.9370', 'N/A', 'Adm Asset'),
(78, '2025-04-30', 'SBS', 'PDSI #36.1/SKYTOP/650-M', 'SN-UNK-78', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', '01.66.9375', 'N/A', 'Adm Asset'),
(79, '2025-04-30', 'JAWA', 'PDSI #38.2/D1000-E', 'MA-022091', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710015734', '01.66.9286', 'N/A', 'Adm Asset'),
(80, '2025-04-30', 'JAWA', 'PDSI #38.2/D1000-E', 'MA-022093', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710015732', '01.66.9284', 'N/A', 'Adm Asset'),
(81, '2025-04-30', 'JAWA', 'PDSI #38.2/D1000-E', 'MA-022094', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710015733', '01.66.9285', 'N/A', 'Adm Asset'),
(82, '2025-04-30', 'SBS', 'PDSI #39.3/D1500-E/57 ', 'SN-UNK-82', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(83, '2025-04-30', 'SBS', 'PDSI #39.3/D1500-E/57 ', 'SN-UNK-83', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(84, '2025-04-30', 'SBS', 'PDSI #39.3/D1500-E/57 ', 'SN-UNK-84', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(85, '2025-04-30', 'JAWA', 'PDSI #40.3/DS1500-E ', 'SN-UNK-85', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(86, '2025-04-30', 'JAWA', 'PDSI #40.3/DS1500-E ', 'SN-UNK-86', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(87, '2025-04-30', 'JAWA', 'PDSI #40.3/DS1500-E ', 'SN-UNK-87', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(88, '2025-04-30', 'JAWA', 'PDSI #40.3/DS1500-E ', 'SN-UNK-88', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(89, '2025-04-30', 'SBS', 'PDSI #41.3/N110UE-E', 'MA-024174', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018594', '01.66.9337', 'N/A', 'Adm Asset'),
(90, '2025-04-30', 'SBS', 'PDSI #41.3/N110UE-E', 'MA-024175', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018595', '01.66.9338', 'N/A', 'Adm Asset'),
(91, '2025-04-30', 'SBS', 'PDSI #41.3/N110UE-E', 'MA-024176', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018596', '01.66.9339', 'N/A', 'Adm Asset'),
(92, '2025-04-30', 'SBS', 'PDSI #41.3/N110UE-E', 'SN-UNK-92', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(93, '2025-04-30', 'JANARO', 'PDSI #42.3/N1500-E', 'MA-022994', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018176', '01.66.9307', 'N/A', 'Adm Asset'),
(94, '2025-04-30', 'JANARO', 'PDSI #42.3/N1500-E', 'MA-022995', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018174', '01.66.9305', 'N/A', 'Adm Asset'),
(95, '2025-04-30', 'JANARO', 'PDSI #42.3/N1500-E', 'MA-023045', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018175', '01.66.9306', 'N/A', 'Adm Asset'),
(96, '2025-04-30', 'KTI', 'PDSI #43.3/AB1500-E', 'MA-023378', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018185', '01.66.9315', 'N/A', 'Adm Asset'),
(97, '2025-04-30', 'KTI', 'PDSI #43.3/AB1500-E', 'MA-023379', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018186', '01.66.9316', 'N/A', 'Adm Asset'),
(98, '2025-04-30', 'KTI', 'PDSI #43.3/AB1500-E', 'MA-023380-(2)', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710018187', '01.66.9317', 'N/A', 'Adm Asset'),
(99, '2025-04-30', 'SBS', 'PDSI #44.1/PD350-M', '4845', 'N/A', 'DERRICK', 'ON SITE', '710015119', '01.66.9268', 'N/A', 'Adm Asset'),
(100, '2025-04-30', 'SBS', 'PDSI #45.1/PD350-M', '4844-(1)', 'N/A', 'DERRICK', 'ON SITE', '710015210', '01.66.9269', 'N/A', 'Adm Asset'),
(101, '2025-04-30', 'JANARO', 'PDSI #46.1/PD350-M', '4844-(2)', 'N/A', 'DERRICK', 'ON SITE', '710015471', '01.66.9290', 'N/A', 'Adm Asset'),
(102, '2025-04-30', 'JANARO', 'PDSI #50.2/PD550-M', 'SN-UNK-102', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(103, '2025-04-30', 'JANARO', 'PDSI #50.2/PD550-M', 'SN-UNK-103', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(104, '2025-04-30', 'JANARO', 'PDSI #50.2/PD550-M', 'SN-UNK-104', 'BRANDT KING COBRA', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(105, '2025-04-30', 'JANARO', 'PDSI #51.2/PD550-M', 'SN-UNK-105', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020433', '01.66.9355', 'N/A', 'Adm Asset'),
(106, '2025-04-30', 'JANARO', 'PDSI #51.2/PD550-M', 'SN-UNK-106', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020434', '01.66.9356', 'N/A', 'Adm Asset'),
(107, '2025-04-30', 'JANARO', 'PDSI #51.2/PD550-M', 'SN-UNK-107', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020435', '01.66.9357', 'N/A', 'Adm Asset'),
(108, '2025-04-30', 'JANARO', ' PDSI #52.2/PD550-M', 'SN-UNK-108', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020729', '01.66.9359', 'N/A', 'Adm Asset'),
(109, '2025-04-30', 'JANARO', ' PDSI #52.2/PD550-M', 'SN-UNK-109', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020730', '01.66.9360', 'N/A', 'Adm Asset'),
(110, '2025-04-30', 'JANARO', ' PDSI #52.2/PD550-M', 'SN-UNK-110', 'HYPERPOOL 4 PANEL', 'DERRICK', 'ON SITE', '710020731', '01.66.9361', 'N/A', 'Adm Asset');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dbdelshs`
--
ALTER TABLE `tb_dbdelshs`
  ADD PRIMARY KEY (`id_del_shs`);

--
-- Indexes for table `tb_dbeditshs`
--
ALTER TABLE `tb_dbeditshs`
  ADD PRIMARY KEY (`id_edit_shs`);

--
-- Indexes for table `tb_dbhasilshs`
--
ALTER TABLE `tb_dbhasilshs`
  ADD PRIMARY KEY (`id_shs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dbdelshs`
--
ALTER TABLE `tb_dbdelshs`
  MODIFY `id_del_shs` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_dbeditshs`
--
ALTER TABLE `tb_dbeditshs`
  MODIFY `id_edit_shs` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dbhasilshs`
--
ALTER TABLE `tb_dbhasilshs`
  MODIFY `id_shs` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
