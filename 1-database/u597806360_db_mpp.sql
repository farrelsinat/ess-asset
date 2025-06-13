-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2025 at 02:38 AM
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
-- Database: `u597806360_db_mpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbdelmpp`
--

CREATE TABLE `tb_dbdelmpp` (
  `id_del_mpp` int(15) NOT NULL,
  `deleted_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_mpp` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_mpp` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `deletion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbeditmpp`
--

CREATE TABLE `tb_dbeditmpp` (
  `id_edit_mpp` int(15) NOT NULL,
  `edited_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_mpp` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_mpp` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_rig_operation` varchar(255) NOT NULL,
  `new_rig_yard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhasilmpp`
--

CREATE TABLE `tb_dbhasilmpp` (
  `id_mpp` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_mpp` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `status_mpp` varchar(255) NOT NULL,
  `no_asset` varchar(255) NOT NULL,
  `no_mov` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dbhasilmpp`
--

INSERT INTO `tb_dbhasilmpp` (`id_mpp`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_mpp`, `type`, `man`, `status_mpp`, `no_asset`, `no_mov`, `no_po`, `username`) VALUES
(1, '2025-05-26', 'SBS', 'PDSI #01.2/N80B-M', '11201-H', '9P-100', 'NOV', 'ON SITE', '710001002', '32.05.1012', 'N/A', 'Adm Asset'),
(2, '2025-05-26', 'SBS', 'PDSI #01.2/N80B-M', '11205-H', '9P-100', 'NOV', 'ON SITE', '710002366', '32.05.1013', 'N/A', 'Adm Asset'),
(3, '2025-05-26', 'SBS', 'PDSI #01.2/N80B-M', 'SN-UNK-3', '9P-100', 'NOV', 'ON SITE', '710000997', '32.05.1010', 'N/A', 'Adm Asset'),
(4, '2025-05-26', 'KTI', 'PDSI #04.3/N110-M', '12190-H', '10P-130', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(5, '2025-05-26', 'KTI', 'PDSI #04.3/N110-M', '12189-H', '10P-130', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(6, '2025-05-26', 'KTI', 'PDSI #04.3/N110-M', 'SN-UNK-6', '10P-130', 'NOV', 'ON SITE', '710002255', '01.85.100.61', 'N/A', 'Adm Asset'),
(7, '2025-05-26', 'SBS', 'PDSI #05.2/OW760-M', '11020-RJ', '9P-100', 'NOV', 'ON SITE', '700003416', '29.53.1008', 'N/A', 'Adm Asset'),
(8, '2025-05-26', 'SBS', 'PDSI #05.2/OW760-M', '12129-H', '9P-100', 'NOV', 'ON SITE', 'N/A', '01.85.1202', '4500044316', 'Adm Asset'),
(9, '2025-05-26', 'SBS', 'PDSI #05.2/OW760-M', '11129-RJ', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(10, '2025-05-26', 'SBS', 'PDSI #07.1/PD350-M', '2010303', 'F-800', 'MUD KING', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(11, '2025-05-26', 'SBS', 'PDSI #07.1/PD350-M', '906149', 'PZ-7', 'GARDNER DENVER', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(12, '2025-05-26', 'SBS', 'PDSI #07.1/PD350-M', 'SN-UNK-12', '8P-80', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(13, '2025-05-26', 'JAWA', 'PDSI #08.1/H40D-M', 'SN-UNK-13', 'F-500', 'EMSCO', 'ON SITE', '700006615', '0290042000', 'N/A', 'Adm Asset'),
(14, '2025-05-26', 'JAWA', 'PDSI #09.2/N80UE-E', '11204-H', '9P-100', 'NOV', 'ON SITE', '710000432', '01.85.10084', 'N/A', 'Adm Asset'),
(15, '2025-05-26', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-15', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(16, '2025-05-26', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-16', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(17, '2025-05-26', 'KTI', 'PDSI #10.2/D700-M', 'SN-UNK-17', '8P-80', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(18, '2025-05-26', 'KTI', 'PDSI #10.2/D700-M', 'SN-UNK-18', 'PZ-9', 'GARDNER DENVER', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(19, '2025-05-26', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-19', '9P-100', 'NOV', 'ON SITE', '710002311', '01.85.10080', 'N/A', 'Adm Asset'),
(20, '2025-05-26', 'KTI', 'PDSI #11.2/N80B-M', '11020', '9P-100', 'NOV', 'ON SITE', '700003355', '29.53.1015', 'N/A', 'Adm Asset'),
(21, '2025-05-26', 'KTI', 'PDSI #11.2/N80B-M', '1122-H', '9P-100', 'NOV', 'ON SITE', '700003359', '29.53.1014', 'N/A', 'Adm Asset'),
(22, '2025-05-26', 'JAWA', 'PDSI #12.3/N110-M', 'SN-UNK-22', '10P-130', 'NOV', 'ON SITE', '710002147', '01.85.10071', 'N/A', 'Adm Asset'),
(23, '2025-05-26', 'JAWA', 'PDSI #12.3/N110-M', '11758-H', '10P-130', 'NOV', 'ON SITE', '710000007', '01.85.10061', 'N/A', 'Adm Asset'),
(24, '2025-05-26', 'JAWA', 'PDSI #12.3/N110-M', 'SN-UNK-24', '10P-130', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(25, '2025-05-26', 'JAWA', 'PDSI #13.1/H40D-M', '153L', 'N/A', 'IDECO', 'ON SITE', '700001273', '0290123010', 'N/A', 'Adm Asset'),
(26, '2025-05-26', 'JAWA', 'PDSI #13.1/H40D-M', '3NB1300', 'N/A', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(27, '2025-05-26', 'JAWA', 'PDSI #15.3/N110-M', 'SN-UNK-27', '10P-130', 'NOV', 'ON SITE', '710001040', '01.85.1005', 'N/A', 'Adm Asset'),
(28, '2025-05-26', 'JAWA', 'PDSI #15.3/N110-M', 'SN-UNK-28', '10P-130', 'NOV', 'ON SITE', '710002248', '01.85.11096', 'N/A', 'Adm Asset'),
(29, '2025-05-26', 'SBS', 'PDSI #16.2/NT45-M', 'SN-UNK-29', '9P-100', 'NOV', 'ON SITE', '710013740', '01.85.10082', 'N/A', 'Adm Asset'),
(30, '2025-05-26', 'SBS', 'PDSI #16.2/NT45-M', 'SN-UNK-30', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(31, '2025-05-26', 'JANARO', 'PDSI #17.2/NT45-M', 'SN-UNK-31', '8P-80', 'NOV', 'ON SITE', '700001408', '0290097010', 'N/A', 'Adm Asset'),
(32, '2025-05-26', 'JANARO', 'PDSI #17.2/NT45-M', '0008387', 'PZ-9', 'GARDNER DENVER', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(33, '2025-05-26', 'JANARO', 'PDSI #17.2/NT45-M', 'SN-UNK-33', 'PZ-9', 'GARDNER DENVER', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(34, '2025-05-26', 'SBS', 'PDSI #18.2/LTO650-M ', 'SN-UNK-34', '8P-80', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(35, '2025-05-26', 'SBS', 'PDSI #18.2/LTO650-M ', 'SN-UNK-35', 'PZ-9', 'GARDNER DENVER', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(36, '2025-05-26', 'SBS', 'PDSI #18.2/LTO650-M ', 'SN-UNK-36', 'PZ-9', 'GARDNER DENVER', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(37, '2025-05-26', 'JANARO', 'PDSI #19.1/LTO350-M', 'SN-UNK-37', 'PZ-9', 'GARDNER DENVER', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(38, '2025-05-26', 'SBS', 'PDSI #20.2/EMSCOD2-M', '11023-RJ', '9P-100', 'NOV', 'ON SITE', '700003358', '29.53.1013', 'N/A', 'Adm Asset'),
(39, '2025-05-26', 'SBS', 'PDSI #20.2/EMSCOD2-M', '11073-RJ', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(40, '2025-05-26', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'GMB-1030376', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(41, '2025-05-26', 'KTI', 'PDSI #21.2/OW700-M', 'P210-166', 'A-600PT', 'NOV', 'ON SITE', '700006609', '296400100001', 'N/A', 'Adm Asset'),
(42, '2025-05-26', 'KTI', 'PDSI #21.2/OW700-M', '008509', 'PZ-9', 'GARDNER DENVER', 'ON SITE', '700003333', '29.53.1024', 'N/A', 'Adm Asset'),
(43, '2025-05-26', 'KTI', 'PDSI #21.2/OW700-M', '008510', 'PZ-9', 'GARDNER DENVER', 'ON SITE', '700003334', '29.53.1023', 'N/A', 'Adm Asset'),
(44, '2025-05-26', 'KTI', 'PDSI #22.2/OW700-M', '11206-H', '9P-100', 'NOV', 'ON SITE', '700006608', '29.53.1003', 'N/A', 'Adm Asset'),
(45, '2025-05-26', 'KTI', 'PDSI #22.2/OW700-M', 'SN-UNK-45', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(46, '2025-05-26', 'KTI', 'PDSI #22.2/OW700-M', 'SN-UNK-46', '9P-100', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(47, '2025-05-26', 'SBS', 'PDSI #23.1/CWKT650-M', '10281-R9', '8P-80', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(48, '2025-05-26', 'SBS', 'PDSI #23.1/CWKT650-M', 'SN-UNK-48', '8P-80', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(49, '2025-05-26', 'SBS', 'PDSI #24.1/CWKT210-M', '906151', 'PZ-7', 'GARDNER DENVER', 'ON SITE', '700007019', 'N/A', 'N/A', 'Adm Asset'),
(50, '2025-05-26', 'SBS', 'PDSI #24.1/CWKT210-M', 'SN-UNK-50', 'PZ-7', 'GARDNER DENVER', 'ON SITE', '700000909', '2928015010', 'N/A', 'Adm Asset'),
(51, '2025-05-26', 'SBS', 'PDSI #26.1/H25CD-M', 'SN-UNK-51', 'F-350', 'EMSCO', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(52, '2025-05-26', 'JAWA', 'PDSI #28.2/D1000-E', '12131-H', '9P-100', 'NOV', 'ON SITE', '710002506', '01.87.0004', 'N/A', 'Adm Asset'),
(53, '2025-05-26', 'JAWA', 'PDSI #28.2/D1000-E', '12132-H', '9P-100', 'NOV', 'ON SITE', '710002505', '01.87.0003', 'N/A', 'Adm Asset'),
(54, '2025-05-26', 'JAWA', 'PDSI #28.2/D1000-E', '12133-H', '9P-100', 'NOV', 'ON SITE', '710002504', '01.87.0002', 'N/A', 'Adm Asset'),
(55, '2025-05-26', 'SBS', 'PDSI #29.3/D1500-E/53', '12134-H', '10P-130', 'NOV', 'ON SITE', '710002781', '01.87.0005', 'N/A', 'Adm Asset'),
(56, '2025-05-26', 'SBS', 'PDSI #29.3/D1500-E/53', '12135-H', '10P-130', 'NOV', 'ON SITE', '710002782', '01.87.0006', 'N/A', 'Adm Asset'),
(57, '2025-05-26', 'SBS', 'PDSI #29.3/D1500-E/53', '12136-H', '10P-130', 'NOV', 'ON SITE', '710002783', '01.87.0007', 'N/A', 'Adm Asset'),
(58, '2025-05-26', 'SBS', 'PDSI #30.2/D1000-E', 'SN-UNK-58', '9P-100', 'NOV', 'ON SITE', '710003448', '01.87.0014', 'N/A', 'Adm Asset'),
(59, '2025-05-26', 'SBS', 'PDSI #30.2/D1000-E', 'SN-UNK-59', '9P-100', 'NOV', 'ON SITE', '710003449', '01.87.0015', 'N/A', 'Adm Asset'),
(60, '2025-05-26', 'SBS', 'PDSI #30.2/D1000-E', 'SN-UNK-60', '9P-100', 'NOV', 'ON SITE', '710003450', '01.87.0016', 'N/A', 'Adm Asset'),
(61, '2025-05-26', 'JAWA', 'PDSI #31.3/D1500-E', '12217-H', '10P-130', 'NOV', 'ON SITE', '710003727', '01.87.0019', 'N/A', 'Adm Asset'),
(62, '2025-05-26', 'JAWA', 'PDSI #31.3/D1500-E', '12218-H', '10P-130', 'NOV', 'ON SITE', '710003726', '01.87.0018', 'N/A', 'Adm Asset'),
(63, '2025-05-26', 'JAWA', 'PDSI #31.3/D1500-E', '12216-H', '10P-130', 'NOV', 'ON SITE', '710003725', '01.87.0017', 'N/A', 'Adm Asset'),
(64, '2025-05-26', 'KTI', 'PDSI #32.2/N80UE-E', 'SN-UNK-64', 'PZ-9', 'GARDNER DENVER', 'ON SITE', '710003215', '01.87.0008', 'N/A', 'Adm Asset'),
(65, '2025-05-26', 'SBS', 'PDSI #34.1/IDECO/H35-M', 'SN-UNK-65', '7P-50', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(66, '2025-05-26', 'JANARO', 'PDSI #35.1/IDECO/H35-M', '43', 'F-350', 'EMSCO', 'ON SITE', '700006602', '0290070000', 'N/A', 'Adm Asset'),
(67, '2025-05-26', 'JANARO', 'PDSI #35.1/IDECO/H35-M', 'SN-UNK-67', 'F-500', 'EMSCO', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(68, '2025-05-26', 'JANARO', 'PDSI #35.1/IDECO/H35-M', 'SN-UNK-68', 'F-500', 'EMSCO', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(69, '2025-05-26', 'JANARO', 'PDSI #35.1/IDECO/H35-M', 'SN-UNK-69', '8P-80', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(70, '2025-05-26', 'SBS', 'PDSI #36.1/SKYTOP/650-M', 'SN-UNK-70', '7P-50H', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(71, '2025-05-26', 'SBS', 'PDSI #36.1/SKYTOP/650-M', 'SN-UNK-71', '7P-50H', 'NOV', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(72, '2025-05-26', 'JAWA', 'PDSI #38.2/D1000-E', '12477-H', '9P-100', 'NOV', 'ON SITE', '710005544', '01.87.0030', 'N/A', 'Adm Asset'),
(73, '2025-05-26', 'JAWA', 'PDSI #38.2/D1000-E', '12478-H', '9P-100', 'NOV', 'ON SITE', '710005545', '01.87.0031', 'N/A', 'Adm Asset'),
(74, '2025-05-26', 'JAWA', 'PDSI #38.2/D1000-E', '12479-H', '9P-100', 'NOV', 'ON SITE', '710005546', '01.87.0032', 'N/A', 'Adm Asset'),
(75, '2025-05-26', 'SBS', 'PDSI #39.3/D1500-E/57', '12474-H', '10P-130', 'NOV', 'ON SITE', '710004747', '65.15.1236', 'N/A', 'Adm Asset'),
(76, '2025-05-26', 'SBS', 'PDSI #39.3/D1500-E/57', '12475-H', '10P-130', 'NOV', 'ON SITE', '710004748', '01.87.0024', 'N/A', 'Adm Asset'),
(77, '2025-05-26', 'SBS', 'PDSI #39.3/D1500-E/57', '12476-H', '10P-130', 'NOV', 'ON SITE', '710004749', '01.87.0025', 'N/A', 'Adm Asset'),
(78, '2025-05-26', 'JAWA', 'PDSI #40.3/DS1500-E', 'WH-1612-401', '1600HP', 'LETOURNEOU', 'ON SITE', '710005058', '01.87.0029', 'N/A', 'Adm Asset'),
(79, '2025-05-26', 'JAWA', 'PDSI #40.3/DS1500-E', 'WH-1612-401', '1600HP', 'LETOURNEOU', 'ON SITE', '710005057', '01.87.0028', 'N/A', 'Adm Asset'),
(80, '2025-05-26', 'JAWA', 'PDSI #40.3/DS1500-E', 'WH-1612-401', '1600HP', 'LETOURNEOU', 'ON SITE', '710005056', '01.87.0027', 'N/A', 'Adm Asset'),
(81, '2025-05-26', 'SBS', 'PDSI #41.3/N110UE-E', '0018777', 'PZ-11', 'GARDNER DENVER', 'ON SITE', 'N/A', '01.87.0034', 'N/A', 'Adm Asset'),
(82, '2025-05-26', 'SBS', 'PDSI #41.3/N110UE-E', '0018778', 'PZ-11', 'GARDNER DENVER', 'ON SITE', 'N/A', '01.87.0035', 'N/A', 'Adm Asset'),
(83, '2025-05-26', 'SBS', 'PDSI #41.3/N110UE-E', '0019552', 'PZ-11', 'GARDNER DENVER', 'ON SITE', 'N/A', '01.87.0033', 'N/A', 'Adm Asset'),
(84, '2025-05-26', 'JANARO', 'PDSI #42.3/N1500-E', '1242-C', 'FD-1600', 'NOV', 'ON SITE', '710006608', '01.87.0036', 'N/A', 'Adm Asset'),
(85, '2025-05-26', 'JANARO', 'PDSI #42.3/N1500-E', '1243-C', 'FD-1600', 'NOV', 'ON SITE', '710006610', '01.87.0038', 'N/A', 'Adm Asset'),
(86, '2025-05-26', 'JANARO', 'PDSI #42.3/N1500-E', '1301-C', 'FD-1600', 'NOV', 'ON SITE', '710006609', '01.87.0037', 'N/A', 'Adm Asset'),
(87, '2025-05-26', 'KTI', 'PDSI #43.3/AB1500-E', '1376-C', 'FD-1600', 'NOV', 'ON SITE', '710008376', '01.87.0040', 'N/A', 'Adm Asset'),
(88, '2025-05-26', 'KTI', 'PDSI #43.3/AB1500-E', '1378-C', 'FD-1600', 'NOV', 'ON SITE', '710008377', '01.87.0041', 'N/A', 'Adm Asset'),
(89, '2025-05-26', 'SBS', 'PDSI #44.1/PD350-M', 'SN-UNK-89', 'F-350', 'EMSCO', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(90, '2025-05-26', 'SBS', 'PDSI #44.1/PD350-M', 'SN-UNK-90', 'F-350', 'EMSCO', 'ON SITE', 'N/A', 'N/A', 'N/A', 'Adm Asset'),
(91, '2025-05-26', 'SBS', 'PDSI #44.1/PD350-M', 'SN-UNK-91', 'RMK-PZ-7', 'MUD KING', 'ON SITE', '710015108', '01.87.0046', 'N/A', 'Adm Asset'),
(92, '2025-05-26', 'SBS', 'PDSI #45.1/PD350-M', 'SN-UNK-92', 'RMK-PZ-7', 'MUD KING', 'ON SITE', '710015199', '01.87.0049', 'N/A', 'Adm Asset'),
(93, '2025-05-26', 'JANARO', 'PDSI #46.1/PD350-M', 'SN-UNK-93', 'RMK-PZ-7', 'MUD KING', 'ON SITE', '710015460', '01.87.0052', 'N/A', 'Adm Asset'),
(94, '2025-05-26', 'OFF SHORE', 'PDSI #47.2/PD550-M', 'Q-025518', 'TRIPLEX-550HP', 'GARDNER DENVER', 'ON SITE', '710019332', '01.87.0056', 'N/A', 'Adm Asset'),
(95, '2025-05-26', 'OFF SHORE', 'PDSI #48.2/PD550-M', 'SN-UNK-95', 'TRIPLEX-550HP', 'GARDNER DENVER', 'ON SITE', '710021000', '01.87.0057', 'N/A', 'Adm Asset'),
(96, '2025-05-26', 'JANARO', 'PDSI #49.2/PD550-M', 'SN-UNK-96', 'F-800', 'MUD KING', 'ON SITE', '710019812', '01.87.0058', 'N/A', 'Adm Asset'),
(97, '2025-05-26', 'JANARO', 'PDSI #49.2/PD550-M', 'SN-UNK-97', 'F-800', 'MUD KING', 'ON SITE', '710019815', '01.87.0059', 'N/A', 'Adm Asset'),
(98, '2025-05-26', 'JANARO', 'PDSI #49.2/PD550-M', 'SN-UNK-98', 'F-800', 'MUD KING', 'ON SITE', '710019818', '01.87.0060', 'N/A', 'Adm Asset'),
(99, '2025-05-26', 'JANARO', 'PDSI #50.2/PD550-M', 'SN-UNK-99', 'F-800', 'MUD KING', 'ON SITE', '710020114', '01.87.0063', 'N/A', 'Adm Asset'),
(100, '2025-05-26', 'JANARO', 'PDSI #50.2/PD550-M', 'SN-UNK-100', 'F-800', 'MUD KING', 'ON SITE', '710020111', '01.87.0062', 'N/A', 'Adm Asset'),
(101, '2025-05-26', 'JANARO', 'PDSI #51.2/PD550-M', 'SN-UNK-101', 'F-800', 'MUD KING', 'ON SITE', '710020404', '01.87.0064', 'N/A', 'Adm Asset'),
(102, '2025-05-26', 'JANARO', 'PDSI #51.2/PD550-M', 'SN-UNK-102', 'F-800', 'MUD KING', 'ON SITE', '710020407', '01.87.0065', 'N/A', 'Adm Asset'),
(103, '2025-05-26', 'JANARO', 'PDSI #51.2/PD550-M', 'SN-UNK-103', 'F-800', 'MUD KING', 'ON SITE', '710020410', '01.87.0066', 'N/A', 'Adm Asset'),
(104, '2025-05-26', 'JANARO', 'PDSI #52.2/PD550-M', 'SN-UNK-104', 'F-800', 'MUD KING', 'ON SITE', '710020700', '01.87.0067', 'N/A', 'Adm Asset'),
(105, '2025-05-26', 'JANARO', 'PDSI #52.2/PD550-M', 'SN-UNK-105', 'F-800', 'MUD KING', 'ON SITE', '710020703', '01.87.0068', 'N/A', 'Adm Asset'),
(106, '2025-05-26', 'JANARO', 'PDSI #52.2/PD550-M', 'SN-UNK-106', 'F-800', 'MUD KING', 'ON SITE', '710020706', '01.87.0069', 'N/A', 'Adm Asset');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dbdelmpp`
--
ALTER TABLE `tb_dbdelmpp`
  ADD PRIMARY KEY (`id_del_mpp`);

--
-- Indexes for table `tb_dbeditmpp`
--
ALTER TABLE `tb_dbeditmpp`
  ADD PRIMARY KEY (`id_edit_mpp`);

--
-- Indexes for table `tb_dbhasilmpp`
--
ALTER TABLE `tb_dbhasilmpp`
  ADD PRIMARY KEY (`id_mpp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dbdelmpp`
--
ALTER TABLE `tb_dbdelmpp`
  MODIFY `id_del_mpp` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dbeditmpp`
--
ALTER TABLE `tb_dbeditmpp`
  MODIFY `id_edit_mpp` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dbhasilmpp`
--
ALTER TABLE `tb_dbhasilmpp`
  MODIFY `id_mpp` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
