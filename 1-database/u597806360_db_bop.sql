-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2025 at 02:35 AM
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
-- Database: `u597806360_db_bop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbbahanbop`
--

CREATE TABLE `tb_dbbahanbop` (
  `id_bop` int(11) NOT NULL,
  `sn_bop` varchar(255) NOT NULL,
  `jenis_bop` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `no_coc` varchar(255) NOT NULL,
  `akhir_coc` date NOT NULL,
  `no_mov` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbdelbop`
--

CREATE TABLE `tb_dbdelbop` (
  `id_del_bop` int(15) NOT NULL,
  `deleted_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_bop` varchar(255) NOT NULL,
  `jenis_bop` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `deletion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbeditbop`
--

CREATE TABLE `tb_dbeditbop` (
  `id_edit_bop` int(15) NOT NULL,
  `edited_item_id` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_bop` varchar(255) NOT NULL,
  `jenis_bop` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `inputed_by` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_rig_operation` varchar(255) NOT NULL,
  `new_rig_yard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dbeditbop`
--

INSERT INTO `tb_dbeditbop` (`id_edit_bop`, `edited_item_id`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_bop`, `jenis_bop`, `size`, `pressure`, `man`, `inputed_by`, `edited_by`, `edit_time`, `new_rig_operation`, `new_rig_yard`) VALUES
(414, 401, '2025-03-01', 'WS VENDOR', 'FUJI CIKARANG', '87825', 'DOUBLE RAM', '11\"', '5000', 'HYDRILL', 'Adm Asset', 'Firman', '2025-03-07 11:36:15', 'JAWA', 'PDSI #13.1/H40D-M'),
(415, 402, '2025-03-01', 'JAWA', 'PDSI #38.2/D1000-E', '43873-B', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-03-18 13:43:50', 'WS VENDOR', 'BENVORS GN PUTRI'),
(417, 404, '2025-03-01', 'OFF SHORE', 'PDSI #48.2/PD550-M', '1215213390001', 'ANNULAR', '13-5/8\"', '3000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-03-18 13:54:42', 'WS VENDOR', 'BENVORS GN PUTRI'),
(418, 405, '2025-03-01', 'OFF SHORE', 'PDSI #48.2/PD550-M', '1215591400001', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-03-18 13:54:53', 'WS VENDOR', 'BENVORS GN PUTRI'),
(419, 406, '2025-03-01', 'WS VENDOR', 'BENVORS GN PUTRI', 'BAW-037', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'Adm Asset', 'Firman', '2025-03-25 09:58:06', 'JAWA', 'PDSI #38.2/D1000-E'),
(420, 407, '2025-03-01', 'WS VENDOR', 'JMS GN PUTRI', 'MOV-0362117', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Hendra W', '2025-04-09 10:05:34', 'SBS', 'WS BOP PML SBS'),
(421, 408, '2025-03-01', 'WS VENDOR', 'BENVORS GN PUTRI', '52341', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Hendra W', '2025-04-09 14:02:48', 'SBS', 'PDSI #05.2/OW760-M'),
(422, 409, '2025-03-01', 'WS VENDOR', 'JMS GN PUTRI', '13077', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-04-16 08:21:15', 'OFF SHORE', 'PDSI #48.2/PD550-M'),
(423, 410, '2025-03-01', 'WS VENDOR', 'JMS BALIKPAPAN', 'BAW-047', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'Adm Asset', 'Firman', '2025-04-20 11:23:09', 'JAWA', 'PDSI #12.3/N110-M'),
(425, 412, '2025-03-01', 'SBS', 'WS BOP PML SBS', 'MOV-0362765', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-04-21 10:29:45', 'WS VENDOR', 'BENVORS GN PUTRI'),
(426, 413, '2025-03-01', 'OFF SHORE', 'PDSI #48.2/PD550-M', '1215592830001', 'ANNULAR', '11\"', '3000', 'CAMERON', 'Adm Asset', 'Firman', '2025-04-21 14:24:49', 'JAWA', 'WS BOP MUNDU JAWA'),
(427, 414, '2025-03-01', 'OFF SHORE', 'PDSI #48.2/PD550-M', '1215591390001', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', 'Adm Asset', 'Firman', '2025-04-21 14:25:08', 'JAWA', 'WS BOP MUNDU JAWA'),
(428, 415, '2025-03-01', 'WS VENDOR', 'JMS GN PUTRI', '52342', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Tomy', '2025-04-24 12:30:31', 'SBS', 'WS BOP PML SBS'),
(429, 416, '2025-03-01', 'SBS', 'WS BOP PML SBS', 'MOV-0362165', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-04-24 15:43:57', 'OFF SHORE', 'PDSI #48.2/PD550-M'),
(437, 312, '2025-03-13', 'JANARO', 'YARD DURI', 'R-120/05/21/UMB', 'DOUBLE RAM', '7-1/16\"', '3000', 'CAMERON', 'Adm Asset', 'Zulkarnaini', '2025-05-04 10:09:13', 'SBS', 'PDSI #44.1/PD350-M'),
(438, 22, '2025-04-09', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-22', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Zulkarnaini', '2025-05-06 09:14:18', 'JANARO', 'PDSI #50.2/PD550-M'),
(439, 27, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-27', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'Adm Asset', 'Zulkarnaini', '2025-05-06 09:33:57', 'JANARO', 'PDSI #50.2/PD550-M'),
(440, 207, '2025-03-13', 'KTI', 'PDSI #43.3/AB1500-E', 'BAW-103', 'SINGLE RAM', '13-5/8\"', '10000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-05-06 10:22:15', 'WS VENDOR', 'JMS BALIKPAPAN'),
(441, 418, '2025-05-06', 'KTI', 'PDSI #43.3/AB1500-E', '156878-01', 'ANNULAR', '13-5/8\"', '10000', 'SHAFFER', 'Adm Asset', 'Adm Asset', '2025-05-06 10:26:25', 'WS VENDOR', 'JMS BALIKPAPAN'),
(442, 172, '2025-03-14', 'SBS', 'PDSI #36.1/SKYTOP650-M', 'SN-UNK-172', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'Adm Asset', 'Hendra W', '2025-05-06 10:46:59', 'SBS', 'WS BOP PML SBS'),
(443, 289, '2025-03-14', 'SBS', 'WS BOP PML SBS', '152838-20', 'ANNULAR', '7-1/16\"', '10000', 'SHAFFER', 'Adm Asset', 'Hendra W', '2025-05-06 11:02:52', 'JANARO', 'PDSI #42.3/N1500-E'),
(444, 301, '2025-03-14', 'SBS', 'WS BOP PML SBS', '20092', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-06 11:04:54', 'SBS', 'PDSI #24.1/CWKT210-M'),
(445, 287, '2025-03-27', 'SBS', 'WS BOP PML SBS', 'BAW-204', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'Adm Asset', 'Hendra W', '2025-05-06 11:06:00', 'SBS', 'PDSI #01.2/N80B-M'),
(446, 298, '2025-04-09', 'SBS', 'WS BOP PML SBS', 'W-152838-61', 'ANNULAR', '7-1/16\"', '10000', 'SHAFFER', 'Adm Asset', 'Tomy', '2025-05-06 11:07:26', 'SBS', 'PDSI #41.3/N110UE-E'),
(447, 24, '2025-04-11', 'SBS', 'WS BOP PML SBS', 'MOV-0362117', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-06 11:09:39', 'SBS', 'PDSI #41.3/N110UE-E'),
(448, 214, '2025-03-09', 'SBS', 'PDSI #45.1/PD350-M', 'SK-21026', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Tomy', '2025-05-06 14:04:55', 'SBS', 'PDSI #44.1/PD350-M'),
(449, 121, '2025-03-09', 'SBS', 'PDSI #24.1/CWKT210-M', 'SK-21042', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Hendra W', '2025-05-06 14:09:44', 'SBS', 'PDSI #45.1/PD350-M'),
(450, 157, '2025-03-27', 'SBS', 'PDSI #33.1/IDECO/H35-M', 'MOV-03621082', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'Adm Asset', 'Hendra W', '2025-05-06 14:10:52', 'SBS', 'PDSI #01.2/N80B-M'),
(451, 130, '2025-03-11', 'SBS', 'PDSI #25.2/LTO750-M', '431188', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-06 14:11:52', 'SBS', 'PDSI #05.2/OW760-M'),
(452, 179, '2025-03-24', 'SBS', 'PDSI #39.3/D1500-E/57', '30663L/03.62.0345-(2)', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-06 14:12:38', 'SBS', 'PDSI #05.2/OW760-M'),
(453, 100, '2025-03-09', 'SBS', 'PDSI #16.2/NT45-M', 'SN-UNK-100', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'Adm Asset', 'Hendra W', '2025-05-06 14:13:15', 'SBS', 'PDSI #18.2/LTO650-M'),
(454, 168, '2025-03-27', 'SBS', 'PDSI #36.1/SKYTOP650-M', '152169-1551', 'ANNULAR', '7-1/16\"', '5000', 'SHAFFER', 'Adm Asset', 'Tomy', '2025-05-06 14:13:54', 'SBS', 'PDSI #18.2/LTO650-M'),
(455, 169, '2025-03-09', 'SBS', 'PDSI #36.1/SKYTOP650-M', '54-240-(3)', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', 'Adm Asset', 'Hendra W', '2025-05-06 14:16:36', 'SBS', 'PDSI #18.2/LTO650-M'),
(456, 29, '2025-04-11', 'SBS', 'PDSI #05.2/OW760-M', '52341', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-06 14:17:23', 'SBS', 'PDSI #39.3/D1500-E/57'),
(457, 291, '2025-03-27', 'SBS', 'PDSI #05.2/OW760-M', 'BAW-161', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-05-06 14:17:53', 'SBS', 'PDSI #39.3/D1500-E/57'),
(458, 304, '2025-03-18', 'JANARO', 'YARD RANTAU', 'BAW-105', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'Adm Asset', 'Hendra W', '2025-05-06 14:18:31', 'JANARO', 'PDSI #42.3/N1500-E'),
(459, 419, '2025-05-06', 'JANARO', 'PDSI #53.2/ZJ750-M', '120952', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-06 14:40:35', 'SBS', 'WS BOP PML SBS'),
(460, 57, '2025-03-11', 'SBS', 'PDSI #01.2/N80B-M', 'JK-20093', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-08 09:21:45', 'SBS', 'WS BOP PML SBS'),
(461, 147, '2025-03-12', 'SBS', 'PDSI #30.2/D1000-E', 'BAW-332-0', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-05-08 09:22:29', 'SBS', 'WS BOP PML SBS'),
(462, 30, '2025-05-07', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-30', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-08 09:23:25', 'SBS', 'PDSI #33.1/IDECO/H35-M'),
(463, 157, '2025-05-06', 'SBS', 'PDSI #01.2/N80B-M', 'MOV-03621082', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-05-08 09:24:03', 'SBS', 'PDSI #33.1/IDECO/H35-M'),
(464, 194, '2025-03-17', 'JANARO', 'PDSI #17.2/NT45-M', 'SN-UNK-194', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Zulkarnaini', '2025-05-08 09:25:03', 'SBS', 'PDSI #41.3/N110UE-E'),
(465, 178, '2025-04-16', 'SBS', 'WS BOP PML SBS', 'BAW-136', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-05-08 09:25:34', 'SBS', 'PDSI #05.2/OW760-M'),
(466, 141, '2025-04-27', 'SBS', 'WS BOP PML SBS', 'BAW-258', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-05-08 09:26:36', 'SBS', 'PDSI #30.2/D1000-E'),
(467, 77, '2025-04-10', 'JAWA', 'PDSI #09.2/N80UE-E', '049710302', 'ANNULAR', '13-5/8\"', '5000', 'STEWART', 'Adm Asset', 'Firman', '2025-05-08 10:37:00', 'JAWA', 'PDSI #38.2/D1000-E'),
(468, 397, '2025-05-09', 'JAWA', 'PLB CILINCING', 'SK-24887', 'ANNULAR', '7-1/16\"', '5000', 'SHENKAI', 'Adm Asset', 'Firman', '2025-05-09 09:22:52', 'JAWA', 'PDSI #55.2/XJ550-M'),
(469, 421, '2025-05-09', 'JAWA', 'PLB CILINCING', 'SK-25024', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Firman', '2025-05-09 09:23:18', 'JAWA', 'PDSI #55.2/XJ550-M'),
(470, 422, '2025-05-09', 'JAWA', 'PLB CILINCING', 'SK-25026', 'DOUBLE RAM', '7-1/16\"', '5000', 'SHENKAI', 'Adm Asset', 'Firman', '2025-05-09 09:23:36', 'JAWA', 'PDSI #55.2/XJ550-M'),
(471, 399, '2025-05-02', 'JAWA', 'PLB CILINCING', 'SK-24888', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Adm Asset', '2025-05-09 09:24:31', 'JAWA', 'PDSI #56.2/XJ550-M'),
(472, 420, '2025-05-09', 'JAWA', 'PLB CILINCING', 'SK-25025', 'DOUBLE RAM', '7-1/16\"', '5000', 'SHENKAI', 'Adm Asset', 'Adm Asset', '2025-05-09 09:24:52', 'JAWA', 'PDSI #56.2/XJ550-M'),
(473, 423, '2025-05-09', 'JAWA', 'PLB CILINCING', 'SK-24889', 'ANNULAR', '7-1/16\"', '5000', 'SHENKAI', 'Adm Asset', 'Firman', '2025-05-09 09:25:11', 'JAWA', 'PDSI #56.2/XJ550-M'),
(474, 396, '2025-04-21', 'JAWA', 'PDSI #12.3/N110-M', 'BAW-102', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'Adm Asset', 'Firman', '2025-05-10 13:40:46', 'JAWA', 'WS BOP MUNDU JAWA'),
(475, 173, '2025-04-09', 'JAWA', 'PDSI #38.2/D1000-E', 'BAW-255-2', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'Adm Asset', 'Firman', '2025-05-16 09:22:10', 'JAWA', 'WS BOP MUNDU JAWA'),
(476, 173, '2025-05-16', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-255-2', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'Adm Asset', 'Adm Asset', '2025-05-16 09:22:47', 'JAWA', 'PDSI #15.3/N110-M'),
(477, 269, '2025-04-09', 'JAWA', 'PDSI #31.3/D1500-E', 'BAW-164', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'Adm Asset', 'Firman', '2025-05-19 11:46:12', 'JAWA', 'WS BOP MUNDU JAWA'),
(478, 89, '2025-03-17', 'JAWA', 'PDSI #12.3/N110-M', '20351148', 'ANNULAR', '29-1/2\"', '500', 'T3', 'Adm Asset', 'Firman', '2025-05-19 11:46:49', 'JAWA', 'WS BOP MUNDU JAWA'),
(479, 73, '2025-05-19', 'JAWA', 'PDSI #08.1/H40D-M', 'SK-21043', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Adm Asset', '2025-05-19 15:02:34', 'JAWA', 'WS BOP MUNDU JAWA'),
(480, 74, '2025-04-10', 'JAWA', 'PDSI #08.1/H40D-M', 'MOV-0362494', 'DOUBLE RAM', '11\"', '10000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-05-19 15:41:33', 'JAWA', 'WS BOP MUNDU JAWA'),
(481, 150, '2025-03-17', 'JAWA', 'PDSI #31.3/D1500-E', '1499785', 'ANNULAR', '13-5/8\"', '10000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-20 19:04:37', 'JAWA', 'WS BOP MUNDU JAWA'),
(484, 13, '2025-04-14', 'WS VENDOR', 'JMS BALIKPAPAN', 'SN-UNK-13', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-21 14:49:29', 'JAWA', 'PDSI #15.3/N110-M'),
(485, 37, '2025-05-07', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-37', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-05-21 16:12:56', 'KTI', 'PDSI #22.2/OW700-M'),
(486, 220, '2025-05-02', 'JANARO', 'PDSI #50.2/PD550-M', 'SK-21022', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', 'Adm Asset', 'Zulkarnaini', '2025-05-21 16:14:23', 'WS VENDOR', 'JMS GN PUTRI'),
(487, 221, '2025-05-07', 'JANARO', 'PDSI #50.2/PD550-M', 'SK-21024', 'DOUBLE RAM', '13-5/8\"', '5000', 'SHENKAI', 'Adm Asset', 'Zulkarnaini', '2025-05-21 16:15:46', 'WS VENDOR', 'JMS GN PUTRI'),
(488, 90, '2025-03-24', 'JAWA', 'PDSI #12.3/N110-M', 'BAW-104', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'Adm Asset', 'Firman', '2025-05-22 21:35:19', 'JAWA', 'PDSI #09.2/N80UE-E'),
(489, 89, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '20351148', 'ANNULAR', '29-1/2\"', '500', 'T3', 'Adm Asset', 'Firman', '2025-05-22 21:43:10', 'JAWA', 'PDSI #31.3/D1500-E'),
(490, 229, '2025-04-09', 'JANARO', 'PDSI #54.2/ZJ750-M', 'SK-19199', 'DOUBLE RAM', '13-5/8\"', '5000', 'SHENKAI', 'Adm Asset', 'Zulkarnaini', '2025-05-23 06:52:38', 'JANARO', 'PDSI #49.2/PD550-M'),
(491, 227, '2025-05-23', 'JANARO', 'PDSI #53.2/ZJ750-M', 'SK-23343', 'DOUBLE RAM-(SHEAR)', '13-5/8\"', '5000', 'SHENKAI', 'Zulkarnaini', 'Zulkarnaini', '2025-05-23 07:09:15', 'JANARO', 'PDSI #54.2/ZJ750-M'),
(492, 114, '2025-03-17', 'KTI', 'PDSI #21.2/OW700-M', 'SN-UNK-114', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-05-23 11:13:52', 'KTI', 'PDSI #10.2/D700-M'),
(493, 312, '2025-05-04', 'SBS', 'PDSI #44.1/PD350-M', 'R-120/05/21/UMB', 'DOUBLE RAM', '7-1/16\"', '3000', 'CAMERON', 'Adm Asset', 'Hendra W', '2025-05-23 17:25:59', 'SBS', 'WS BOP PML SBS'),
(494, 194, '2025-05-28', 'SBS', 'PDSI #41.3/N110UE-E', 'SN-UNK-194', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-05-28 15:48:58', 'SBS', 'PDSI #01.2/N80B-M'),
(496, 109, '2025-03-09', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'SN-UNK-109', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Tomy', '2025-05-28 16:45:07', 'SBS', 'PDSI #29.3/D1500-E/53'),
(497, 145, '2025-03-12', 'SBS', 'PDSI #30.2/D1000-E', 'SN-UNK-145', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Tomy', '2025-05-28 16:47:44', 'SBS', 'PDSI #29.3/D1500-E/53'),
(498, 129, '2025-04-22', 'SBS', 'PDSI #39.3/D1500-E/57', 'W-3937', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'Adm Asset', 'Tomy', '2025-05-28 16:49:51', 'SBS', 'PDSI #01.2/N80B-M'),
(499, 128, '2025-04-22', 'SBS', 'PDSI #39.3/D1500-E/57', '140856', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Tomy', '2025-05-28 16:51:07', 'SBS', 'PDSI #01.2/N80B-M'),
(500, 138, '2025-03-14', 'SBS', 'PDSI #29.3/D1500-E/53', 'BAW-168-(3)', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'Adm Asset', 'Tomy', '2025-05-30 12:10:57', 'SBS', 'WS BOP PML SBS'),
(501, 43, '2025-03-09', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-43', 'ANNULAR', '13-5/8\"', '5000', 'T3', 'Adm Asset', 'Tomy', '2025-05-31 19:35:38', 'SBS', 'PDSI #20.2/EMSCOD2-M'),
(502, 396, '2025-05-10', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-102', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-02 09:17:53', 'WS VENDOR', 'BENVORS GN PUTRI'),
(503, 149, '2025-03-14', 'JAWA', 'PDSI #31.3/D1500-E', 'BAW-312', 'ANNULAR', '20-3/4\"', '3000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-02 10:13:01', 'JAWA', 'PDSI #15.3/N110-M'),
(504, 75, '2025-03-14', 'JAWA', 'PDSI #09.2/N80UE-E', 'JK-20089', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-06-02 10:14:15', 'JAWA', 'PDSI #15.3/N110-M'),
(505, 296, '2025-05-02', 'SBS', 'PDSI #45.1/PD350-M', 'SK-21017', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Hendra W', '2025-06-02 11:13:54', 'SBS', 'WS BOP PML SBS'),
(506, 121, '2025-05-07', 'SBS', 'PDSI #45.1/PD350-M', 'SK-21042', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Hendra W', '2025-06-02 11:17:55', 'SBS', 'WS BOP PML SBS'),
(520, 218, '2025-05-23', 'JANARO', 'PDSI #49.2/PD550-M', '03892901', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'Adm Asset', 'Zulkarnaini', '2025-06-04 08:13:49', 'JANARO', 'PDSI #52.2/PD550-M'),
(522, 469, '2025-06-04', 'JANARO', 'PDSI #17.2/NT45-M', 'SN-UNK-346', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Tomy', '2025-06-04 09:18:11', 'SBS', 'PDSI #30.2/D1000-E'),
(523, 137, '2025-03-26', 'SBS', 'PDSI #29.3/D1500-E/53', '156878-24', 'ANNULAR', '13-5/8\"', '10000', 'SHAFFER', 'Adm Asset', 'Adm Asset', '2025-06-04 09:36:28', 'SBS', 'WS BOP PML SBS'),
(524, 210, '2025-03-13', 'SBS', 'PDSI #44.1/PD350-M', '144/SO-FIT/V/22', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-06-04 09:37:52', 'SBS', 'WS BOP PML SBS'),
(525, 168, '2025-05-06', 'SBS', 'PDSI #18.2/LTO650-M', '152169-1551', 'ANNULAR', '7-1/16\"', '5000', 'SHAFFER', 'Adm Asset', 'Adm Asset', '2025-06-04 10:15:25', 'SBS', 'PDSI #36.1/SKYTOP650-M'),
(526, 169, '2025-05-06', 'SBS', 'PDSI #18.2/LTO650-M', '54-240-(3)', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-04 10:16:41', 'SBS', 'PDSI #36.1/SKYTOP650-M'),
(527, 31, '2025-04-27', 'SBS', 'WS BOP PML SBS', '52342', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-06-04 10:18:26', 'SBS', 'PDSI #44.1/PD350-M'),
(528, 181, '2025-03-14', 'SBS', 'PDSI #39.3/D1500-E/57', '20088291-1', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'Adm Asset', 'Adm Asset', '2025-06-04 10:35:52', 'SBS', 'PDSI #16.2/NT45-M'),
(529, 140, '2025-03-13', 'SBS', 'PDSI #30.2/D1000-E', 'C11Y0199/2-6', 'ANNULAR', '21-1/4\"', '2000', 'T3', 'Adm Asset', 'Adm Asset', '2025-06-04 10:52:04', 'SBS', 'PDSI #29.3/D1500-E/53'),
(530, 138, '2025-06-04', 'SBS', 'WS BOP PML SBS', 'BAW-168-(3)', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-04 10:54:14', 'SBS', 'PDSI #29.3/D1500-E/53'),
(531, 100, '2025-05-06', 'SBS', 'PDSI #18.2/LTO650-M', 'SN-UNK-100', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'Adm Asset', 'Adm Asset', '2025-06-04 11:01:47', 'SBS', 'PDSI #39.3/D1500-E/57'),
(532, 287, '2025-05-06', 'SBS', 'PDSI #01.2/N80B-M', 'BAW-204', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-04 11:09:31', 'JANARO', 'PDSI #42.3/N1500-E'),
(533, 294, '2025-03-09', 'SBS', 'WS BOP PML SBS', 'SN-UNK-294', 'SINGLE RAM', '13-5/8\"', '10000', 'WOM', 'Adm Asset', 'Tomy', '2025-06-04 13:20:39', 'WS VENDOR', 'BENVORS GN PUTRI'),
(534, 303, '2025-06-04', 'SBS', 'WS BOP PML SBS', 'E-508700-2', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'Adm Asset', 'Tomy', '2025-06-04 13:23:12', 'WS VENDOR', 'JMS GN PUTRI'),
(535, 170, '2025-03-27', 'SBS', 'PDSI #36.1/SKYTOP650-M', 'BAW-053', 'SINGLE RAM', '13-5/8\"', '5000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-04 13:24:24', 'SBS', 'WS BOP PML SBS'),
(536, 123, '2025-03-09', 'SBS', 'PDSI #24.1/CWKT210-M', 'BODY-55006378', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'Adm Asset', 'Tomy', '2025-06-04 13:25:19', 'WS VENDOR', 'JMS GN PUTRI'),
(537, 312, '2025-06-04', 'SBS', 'WS BOP PML SBS', 'R-120/05/21/UMB', 'DOUBLE RAM', '7-1/16\"', '3000', 'CAMERON', 'Adm Asset', 'Tomy', '2025-06-04 13:26:31', 'WS VENDOR', 'JMS GN PUTRI'),
(538, 297, '2025-03-09', 'SBS', 'WS BOP PML SBS', 'SN-UNK-297', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'Adm Asset', 'Adm Asset', '2025-06-04 13:40:47', 'WS VENDOR', 'BENVORS GN PUTRI'),
(539, 419, '2025-05-23', 'SBS', 'WS BOP PML SBS', '120952', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'Hendra W', 'Adm Asset', '2025-06-09 22:04:21', 'JANARO', 'PDSI #54.2/ZJ750-M'),
(540, 293, '2025-03-13', 'SBS', 'WS BOP PML SBS', 'JK-22003', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-09 22:05:39', 'SBS', 'PDSI #29.3/D1500-E/53'),
(541, 155, '2025-03-14', 'KTI', 'PDSI #32.2/N80UE-E', 'JK-20100', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'Adm Asset', 'Adm Asset', '2025-06-09 22:09:36', 'SBS', 'PDSI #16.2/NT45-M'),
(542, 225, '2025-03-17', 'JANARO', 'PDSI #52.2/PD550-M', 'R-118/03/09/UMB', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'Adm Asset', 'Zulkarnaini', '2025-06-10 10:40:03', 'JANARO', 'YARD DURI'),
(549, 280, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-325', 'ANNULAR', '18-3/4\"', '10000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-10 15:21:09', 'WS VENDOR', 'VDHI TANGERANG'),
(550, 279, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-316', 'SINGLE RAM', '18-3/4\"', '10000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-10 15:21:40', 'WS VENDOR', 'VDHI TANGERANG'),
(551, 277, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '01190064F', 'SINGLE RAM', '13-5/8\"', '15000', 'RONGSHENG', 'Adm Asset', 'Adm Asset', '2025-06-10 15:22:01', 'WS VENDOR', 'VDHI TANGERANG'),
(552, 278, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-329', 'DOUBLE RAM-(SHEAR)', '18-3/4\"', '10000', 'WOM', 'Adm Asset', 'Adm Asset', '2025-06-10 15:22:20', 'WS VENDOR', 'VDHI TANGERANG'),
(553, 276, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '02190140F', 'DOUBLE RAM', '13-5/8\"', '15000', 'RONGSHENG', 'Adm Asset', 'Adm Asset', '2025-06-10 15:22:40', 'WS VENDOR', 'VDHI TANGERANG'),
(554, 188, '2025-03-09', 'JAWA', 'PDSI #40.3/DS1500-E', '20088291-5', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'Adm Asset', 'Adm Asset', '2025-06-12 12:37:58', 'JANARO', 'PDSI #17.2/NT45-M'),
(555, 68, '2025-05-02', 'SBS', 'PDSI #44.1/PD350-M', 'SK-21019', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Tomy', '2025-06-12 18:33:49', 'SBS', 'PDSI #23.1/CWKT650-M'),
(556, 214, '2025-05-06', 'SBS', 'PDSI #44.1/PD350-M', 'SK-21026', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', 'Adm Asset', 'Tomy', '2025-06-12 18:35:42', 'SBS', 'PDSI #23.1/CWKT650-M');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhasilbop`
--

CREATE TABLE `tb_dbhasilbop` (
  `id_bop` int(15) NOT NULL,
  `periode_laporan` varchar(255) NOT NULL,
  `rig_operation` varchar(255) NOT NULL,
  `rig_yard` varchar(255) NOT NULL,
  `sn_bop` varchar(255) NOT NULL,
  `jenis_bop` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status_unit` varchar(255) NOT NULL,
  `no_coc` varchar(255) NOT NULL,
  `akhir_coc` date NOT NULL,
  `status_coc` varchar(255) NOT NULL,
  `file_coc` varchar(255) DEFAULT NULL,
  `no_mov` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dbhasilbop`
--

INSERT INTO `tb_dbhasilbop` (`id_bop`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_bop`, `jenis_bop`, `size`, `pressure`, `man`, `type`, `status_unit`, `no_coc`, `akhir_coc`, `status_coc`, `file_coc`, `no_mov`, `no_po`, `username`) VALUES
(1, '2025-03-09', 'WS VENDOR', 'BENVORS GN PUTRI', '200882975', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'RE-COC/REPAIR', 'WO BENVORS NO. SPK-361-13', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(2, '2025-03-17', 'WS VENDOR', 'BENVORS GN PUTRI', 'BAW-063-2', 'DOUBLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'RE-COC/REPAIR', '025/COC-RMFR/BSU/II/25', '2029-02-14', 'VALID', 'file-coc/coc-bop_67cffb56375564.23469730.pdf', '', 'N/A', 'Adm Asset'),
(3, '2025-05-20', 'WS VENDOR', 'BENVORS GN PUTRI', 'SN-UNK-3', 'SINGLE RAM', '13-5/8\"', '10000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO BENVORS NO. SPK-361-15', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1113', 'N/A', 'Adm Asset'),
(4, '2025-03-20', 'JAWA', 'PDSI #38.2/D1000-E', 'BAW-037', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', '023/COC-RMFR/BSU/I/25', '2029-01-08', 'VALID', 'file-coc/coc-bop_67cffad37ae527.60540870.pdf', '', 'N/A', 'Adm Asset'),
(5, '2025-04-16', 'WS VENDOR', 'FUJI CIKARANG', 'JG-18029', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO FUJI NO. 102', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(6, '2025-04-16', 'WS VENDOR', 'FUJI CIKARANG', 'BAW-304', 'DOUBLE RAM', '20-3/4\"', '3000', 'WOM', 'WU', 'RE-COC/REPAIR', 'WO FUJI NO. 135', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1850', 'N/A', 'Adm Asset'),
(7, '2025-04-14', 'JAWA', 'IDTC', 'SN-UNK-7', 'DOUBLE RAM', '7-1/16\"', '5000', 'HYDRILL', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(8, '2025-03-09', 'JAWA', 'IDTC', 'SN-UNK-8', 'DOUBLE RAM', '7-1/16\"', '3000', 'CAMERON', 'U', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(9, '2025-03-09', 'JAWA', 'IDTC', 'SN-UNK-9', 'ANNULAR', '13-5/8\"', '3000', 'WOM', 'GK', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(10, '2025-03-09', 'JAWA', 'IDTC', 'SN-UNK-10', 'DOUBLE RAM', '7-1/16\"', '5000', 'KOOMEY', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(11, '2025-03-09', 'WS VENDOR', 'JMS BALIKPAPAN', 'SN-UNK-11', 'ANNULAR', '21-1/4\"', '2000', '', 'MSP', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-24011', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(12, '2025-04-20', 'JAWA', 'PDSI #12.3/N110-M', 'BAW-047', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'WU', 'ON SITE', 'JC-25-0003', '2029-01-23', 'VALID', 'file-coc/coc-bop_67cffc452e84a2.86031122.pdf', '03.62.1726', 'N/A', 'Adm Asset'),
(13, '2025-05-23', 'JAWA', 'PDSI #15.3/N110-M', 'F-37370-(1)', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', 'JC-25-0007', '2029-05-07', 'VALID', 'file-coc/coc-bop_6830b77a2f5031.47560750.pdf', '', 'N/A', 'Adm Asset'),
(14, '2025-06-02', 'WS VENDOR', 'JMS BALIKPAPAN', 'BAW-393-0', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-25-0012', '2029-05-07', 'VALID', 'file-coc/coc-bop_683d03c1a0a096.32115779.pdf', '', 'N/A', 'Adm Asset'),
(15, '2025-04-16', 'WS VENDOR', 'JMS BALIKPAPAN', 'SN-UNK-15', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-24066', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(16, '2025-04-14', 'WS VENDOR', 'JMS BALIKPAPAN', 'SN-UNK-16', 'ANNULAR', '13-5/8\"', '10000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-24067', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(17, '2025-04-16', 'WS VENDOR', 'JMS BALIKPAPAN', 'SN-UNK-17', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-24068', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(18, '2025-04-16', 'WS VENDOR', 'JMS BALIKPAPAN', 'SN-UNK-18', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-24069', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(19, '2025-03-09', 'WS VENDOR', 'JMS BALIKPAPAN', 'SN-UNK-19', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-25001', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(21, '2025-04-09', 'WS VENDOR', 'JMS GN PUTRI', 'BAW-165', 'ANNULAR', '21-1/4\"', '2000', 'WOM', 'MSP', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-25013/043/COC-FIT/IX/23', '2027-10-16', 'VALID', 'file-coc/coc-bop_67d39e281a4129.62292768.pdf', '', 'N/A', 'Adm Asset'),
(22, '2025-05-26', 'JANARO', 'PDSI #50.2/PD550-M', 'SN-UNK-22', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '047/COC-FIT/X/22-(2)', '2026-10-10', 'VALID', 'file-coc/coc-bop_67d7995c322bd3.39744230.pdf', '', 'N/A', 'Adm Asset'),
(23, '2025-04-16', 'OFF SHORE', 'PDSI #48.2/PD550-M', '13077', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'ON SITE', 'JC-23-0014', '2027-08-31', 'VALID', 'file-coc/coc-bop_67cffbc5a2cb98.65172148.pdf', '', 'N/A', 'Adm Asset'),
(24, '2025-05-06', 'SBS', 'PDSI #41.3/N110UE-E', 'MOV-0362117', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GX', 'ON SITE', 'JC-24-0059', '2029-03-10', 'VALID', 'file-coc/coc-bop_67f8cdb9b7df57.77030941.pdf', '03.62.117', 'N/A', 'Adm Asset'),
(25, '2025-04-14', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-25', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-23046', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(26, '2025-04-14', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-26', 'DOUBLE RAM', '11\"', '3000', 'WOM', 'U', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24016', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.485', 'N/A', 'Adm Asset'),
(27, '2025-05-07', 'JANARO', 'PDSI #50.2/PD550-M', 'BAW-133', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'WU', 'ON SITE', 'JC-25-0009', '2029-04-24', 'VALID', 'file-coc/coc-bop_681afbcee2c383.20090950.pdf', '', 'N/A', 'Adm Asset'),
(28, '2025-04-14', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-28', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24031', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.844', 'N/A', 'Adm Asset'),
(29, '2025-05-06', 'SBS', 'PDSI #39.3/D1500-E/57', '52341', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0060', '2029-03-10', 'VALID', 'file-coc/coc-bop_67f8cc5a221b09.59277315.pdf', '03.70.19', 'N/A', 'Adm Asset'),
(30, '2025-05-08', 'SBS', 'PDSI #33.1/IDECO/H35-M', 'SN-UNK-30', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'ON SITE', 'JC-25-0010', '2029-04-24', 'VALID', 'file-coc/coc-bop_681afc52752fd7.14747044.pdf', '', 'N/A', 'Adm Asset'),
(31, '2025-06-04', 'SBS', 'PDSI #44.1/PD350-M', '52342', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0061', '2029-03-10', 'VALID', '', '03.62.0360', 'N/A', 'Adm Asset'),
(32, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'BODY-19080', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24035', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(33, '2025-03-09', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-33', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24036', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(34, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'BAW-211', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'WU', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24038', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(35, '2025-04-14', 'WS VENDOR', 'JMS GN PUTRI', '142', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24043', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(36, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', '143', 'DOUBLE RAM', '7-1/16\"', '3000', 'TOWNSEND', 'T-81', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24044', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(37, '2025-05-21', 'KTI', 'PDSI #22.2/OW700-M', 'SN-UNK-37', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-25-0011', '2029-04-24', 'VALID', 'file-coc/coc-bop_681afce0c6bf98.57366277.pdf', '03.62.1109-(2)', 'N/A', 'Adm Asset'),
(38, '2025-04-14', 'WS VENDOR', 'JMS GN PUTRI', '0811019', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24046', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(39, '2025-04-14', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-39', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24047', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2073', 'N/A', 'Adm Asset'),
(40, '2025-04-14', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-40', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24049', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(41, '2025-05-07', 'WS VENDOR', 'JMS GN PUTRI', 'SK-21041', 'DOUBLE RAM', '13-5/8\"', '5000', 'SHENKAI', '', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24051', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2096', 'N/A', 'Adm Asset'),
(42, '2025-03-09', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-42', 'ANNULAR', '11\"', '5000', 'SHENKAI', '', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24057', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(43, '2025-06-02', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'C11P0493/24', 'ANNULAR', '13-5/8\"', '5000', 'T3', 'SPHERICAL', 'ON SITE', 'JC-25-0014', '2029-05-20', 'VALID', 'file-coc/coc-bop_683d0435060d82.83895535.pdf', '03.62.1697', 'N/A', 'Adm Asset'),
(44, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'W-2842', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'WU', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24059', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(45, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-45', 'DOUBLE RAM', '11\"', '3000', 'SHAFFER', 'E', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24060', '0000-00-00', 'COC DATE UNKNOW', '', '10.07.036', 'N/A', 'Adm Asset'),
(46, '2025-03-09', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-46', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24061', '0000-00-00', 'COC DATE UNKNOW', NULL, '03.62.835-(1)', 'N/A', 'Adm Asset'),
(47, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', '0207019-(2)', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24062', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(48, '2025-03-09', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-48', 'ANNULAR', '11\"', '10000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24063', '0000-00-00', 'COC DATE UNKNOW', NULL, '03.62.835-(2)', 'N/A', 'Adm Asset'),
(49, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-49', 'DOUBLE RAM', '11\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24064', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(50, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-50', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-25001', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(51, '2025-05-06', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-51', 'ANNULAR', '11\"', '3000', 'CAMERON', 'SPHERICAL', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-25002', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(52, '2025-04-16', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-52', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-25003', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(53, '2025-03-09', 'WS VENDOR', 'JMS GN PUTRI', 'SN-UNK-53', 'ANNULAR', '7-1/16\"', '5000', 'SHAFFER', 'SPHERICAL', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-24065', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(54, '2025-03-24', 'SBS', 'PDSI #01.2/N80B-M', 'BAW-050', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'U', 'ON SITE', 'JC-23-0023', '2027-10-25', 'VALID', 'file-coc/coc-bop_67e0d2c9927f52.62030827.pdf', '03.62.1235', 'N/A', 'Adm Asset'),
(55, '2025-03-09', 'SBS', 'PDSI #01.2/N80B-M', '6618B-000', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', '057/COC-FIT/XI/23', '2027-11-17', 'VALID', NULL, '', 'N/A', 'Adm Asset'),
(56, '2025-03-13', 'SBS', 'PDSI #01.2/N80B-M', '50870', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', '017/COC-FIT/IV/23', '2027-04-06', 'VALID', '', '03.62.854-(1)', 'N/A', 'Adm Asset'),
(57, '2025-05-08', 'SBS', 'WS BOP PML SBS', 'JK-20093', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-21-0045', '2025-12-09', 'NEAR EXPIRED', 'file-coc/coc-bop_67cffba953a0d9.86244541.pdf', 'BODY-4650013771', 'N/A', 'Adm Asset'),
(58, '2025-03-19', 'KTI', 'PDSI #04.3/N110-M', '156878-96', 'ANNULAR', '13-5/8\"', '10000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-22-0013', '2026-03-15', 'VALID', 'file-coc/coc-bop_67da42c31c38b9.65531578.pdf', '03.62.1231', 'N/A', 'Adm Asset'),
(59, '2025-03-27', 'KTI', 'PDSI #04.3/N110-M', 'BAW-174', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'WU', 'ON SITE', 'JC-23-0029', '2027-11-22', 'VALID', 'file-coc/coc-bop_67e4b5c2a24494.10244929.pdf', '03.62.1189', 'N/A', 'Adm Asset'),
(60, '2025-03-19', 'KTI', 'PDSI #04.3/N110-M', 'BAW-206', 'SINGLE RAM-(SHEAR)', '13-5/8\"', '10000', 'WOM', 'WU', 'ON SITE', 'JC-20-0013', '2024-04-13', 'EXPIRED', 'file-coc/coc-bop_67da3de42b4617.07766055.pdf', '', 'N/A', 'Adm Asset'),
(61, '2025-03-17', 'KTI', 'PDSI #04.3/N110-M', '1300004', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-21-0027', '2025-06-25', 'NEAR EXPIRED', 'file-coc/coc-bop_67d7ab337a9eb4.41107163.pdf', '', 'N/A', 'Adm Asset'),
(62, '2025-03-17', 'KTI', 'PDSI #04.3/N110-M', 'BAW-041', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'ON SITE', '039/COC-FIT/X/22', '2026-10-12', 'VALID', 'file-coc/coc-bop_67d796fb7f4286.87199832.pdf', '03.62.1075', 'N/A', 'Adm Asset'),
(63, '2025-03-17', 'SBS', 'PDSI #05.2/OW760-M', '20023004-255', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'ON SITE', '041/COC-FIT/X/22', '2026-10-13', 'VALID', 'file-coc/coc-bop_67d797f3bc4de1.01133902.pdf', '03.62.1179', 'N/A', 'Adm Asset'),
(64, '2025-03-27', 'SBS', 'PDSI #05.2/OW760-M', 'JG-23040', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-24-0002', '2028-01-17', 'VALID', 'file-coc/coc-bop_67e4b7948052a2.68457058.pdf', '', 'N/A', 'Adm Asset'),
(65, '2025-03-09', 'SBS', 'PDSI #05.2/OW760-M', 'BAW-166-(1)', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', '046/COC-FIT/XI/22-(1)', '2026-11-15', 'VALID', NULL, '03.62.1253', 'N/A', 'Adm Asset'),
(66, '2025-03-27', 'SBS', 'PDSI #07.1/PD350-M', 'MOV-03621092', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', 'U', 'ON SITE', 'JC-24-0008', '2028-03-20', 'VALID', 'file-coc/coc-bop_67e4b7d16820d0.07301291.pdf', '03.62.1092', 'N/A', 'Adm Asset'),
(67, '2025-03-27', 'SBS', 'PDSI #07.1/PD350-M', '153826', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0011', '2028-03-20', 'VALID', 'file-coc/coc-bop_67e4b896db46a5.13231059.pdf', '03.62.1118', 'N/A', 'Adm Asset'),
(68, '2025-06-12', 'SBS', 'PDSI #23.1/CWKT650-M', 'SK-21019', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'FH28-35', 'ON SITE', 'SK-21019', '2025-02-05', 'EXPIRED', 'file-coc/coc-bop_68147d72f0a981.28622363.pdf', '', '4500195625', 'Tomy'),
(69, '2025-04-09', 'SBS', 'WS BOP PML SBS', 'MOV-0362163', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'JC-24-0052', '2028-10-30', 'VALID', 'file-coc/coc-bop_67f5dc7b959ff4.67444488.pdf', '03.62.163', 'N/A', 'Adm Asset'),
(70, '2025-04-10', 'JAWA', 'PDSI #08.1/H40D-M', 'MOV-0362242', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0056', '2028-12-12', 'VALID', 'file-coc/coc-bop_67f5ddc868f572.95170560.pdf', '03.62.242', 'N/A', 'Adm Asset'),
(71, '2025-03-17', 'JAWA', 'PDSI #08.1/H40D-M', 'JK-20057', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', '049/COC-FIT/X/22', '2026-10-15', 'VALID', 'file-coc/coc-bop_67d79d23e14d82.95696928.pdf', '', 'N/A', 'Adm Asset'),
(72, '2025-03-27', 'JAWA', 'PDSI #08.1/H40D-M', 'SN-UNK-72', 'ANNULAR', '11\"', '5000', 'HRSB', 'SPHERICAL', 'ON SITE', 'JC-24-0019', '2028-06-13', 'VALID', 'file-coc/coc-bop_67e4bb3baec152.27697765.pdf', '', 'N/A', 'Adm Asset'),
(73, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SK-21043', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', '2FZ28-35', 'RE-COC/REPAIR', 'SK-21043', '2025-03-01', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(74, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'MOV-0362494', 'DOUBLE RAM', '11\"', '10000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'JC-24-0015', '2028-05-10', 'VALID', 'file-coc/coc-bop_67e4ba79a04148.81290497.pdf', '03.62.494', 'N/A', 'Adm Asset'),
(75, '2025-06-02', 'JAWA', 'PDSI #15.3/N110-M', 'JK-20089', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', '011/COC-FIT/IV/23', '2027-04-17', 'VALID', 'file-coc/coc-bop_67d3810b4a4642.55223014.pdf', '', 'N/A', 'Adm Asset'),
(76, '2025-03-17', 'JAWA', 'PDSI #09.2/N80UE-E', 'BAW-389-0-1', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', 'JC-24-0009', '2028-03-20', 'VALID', 'file-coc/coc-bop_67cffbf0270fa3.79237967.pdf', '03.62.1945', 'N/A', 'Adm Asset'),
(77, '2025-05-08', 'JAWA', 'PDSI #38.2/D1000-E', '049710302', 'ANNULAR', '13-5/8\"', '5000', 'STEWART', 'GK', 'ON SITE', 'JC-24-0013', '2028-03-20', 'VALID', 'file-coc/coc-bop_67e4b97444e0c8.50488232.pdf', '03.62.0280-(2)', 'N/A', 'Adm Asset'),
(78, '2025-03-19', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-78', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-22-0008', '2026-02-03', 'VALID', 'file-coc/coc-bop_67da4021c93839.21596516.pdf', '', 'N/A', 'Adm Asset'),
(79, '2025-03-17', 'KTI', 'PDSI #10.2/D700-M', 'SN-UNK-79', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-21-0043', '2025-12-09', 'NEAR EXPIRED', 'file-coc/coc-bop_67d7aa90d2af54.74391677.pdf', '', 'N/A', 'Adm Asset'),
(80, '2025-03-27', 'KTI', 'PDSI #10.2/D700-M', '37370', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', 'JC-23-0033', '2027-12-18', 'VALID', 'file-coc/coc-bop_67e4b6cf438eb8.03916453.pdf', '', 'N/A', 'Adm Asset'),
(81, '2025-03-17', 'KTI', 'PDSI #10.2/D700-M', 'SN-UNK-81', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-21-0044', '2025-12-09', 'NEAR EXPIRED', 'file-coc/coc-bop_67d7aaf9653813.58142390.pdf', '', 'N/A', 'Adm Asset'),
(82, '2025-03-17', 'KTI', 'PDSI #11.2/N80B-M', '4287383', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0048', '2028-10-24', 'VALID', 'file-coc/coc-bop_67d77e648fee78.66848625.pdf', '', 'N/A', 'Adm Asset'),
(83, '2025-03-09', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-83', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(84, '2025-04-09', 'KTI', 'PDSI #11.2/N80B-M', 'BAW-391-0', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', '', 'ON SITE', 'JC-24-0031', '2028-08-14', 'VALID', 'file-coc/coc-bop_67f5cd357e5521.39938590.pdf', '03.62.1947', 'N/A', 'Adm Asset'),
(85, '2025-03-09', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-85', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(86, '2025-03-14', 'KTI', 'PDSI #11.2/N80B-M', 'SN-UNK-86', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '019/COC-FIT/IV/23', '2027-04-17', 'VALID', 'file-coc/coc-bop_67d3850d179808.74744923.pdf', '', 'N/A', 'Adm Asset'),
(87, '2025-03-17', 'KTI', 'PDSI #11.2/N80B-M', 'MOV-03621091', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', '060/COC-FIT/XII/22', '2026-12-15', 'VALID', 'file-coc/coc-bop_67d785229d5dc7.20846168.pdf', '03.62.1091-(1)', 'N/A', 'Adm Asset'),
(88, '2025-04-13', 'JAWA', 'PDSI #12.3/N110-M', 'BAW-259-00-02', 'DOUBLE RAM', '21-1/4\"', '2000', 'WOM', 'U', 'ON SITE', '007/COS-FIT/IV/22', '2026-04-15', 'VALID', 'file-coc/coc-bop_67fbd041615034.71996042.pdf', '03.62.1842', 'N/A', 'Adm Asset'),
(89, '2025-05-22', 'JAWA', 'PDSI #31.3/D1500-E', '20351148', 'ANNULAR', '29-1/2\"', '500', 'T3', 'DIVERTER', 'ON SITE', '065/COC-FIT/XI/23', '2027-11-02', 'VALID', 'file-coc/coc-bop_67d3a41e6c83f4.33506153.pdf', '03.62.1693', 'N/A', 'Adm Asset'),
(90, '2025-05-22', 'JAWA', 'PDSI #09.2/N80UE-E', 'BAW-104', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', '', 'ON SITE', 'JC-23-0009', '2027-07-26', 'VALID', 'file-coc/coc-bop_67e0ceeaa63732.30319204.pdf', '03.62.1139', 'N/A', 'Adm Asset'),
(91, '2025-04-09', 'JAWA', 'PDSI #12.3/N110-M', 'MOV-03621081', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', 'JC-24-0040', '2028-09-19', 'VALID', 'file-coc/coc-bop_67f5d4f9af0a60.14086606.pdf', '03.62.1081', 'N/A', 'Adm Asset'),
(92, '2025-03-27', 'JAWA', 'PDSI #12.3/N110-M', 'SN-UNK-92', 'ANNULAR', '13-5/8\"', '10000', 'WOM', 'GK', 'ON SITE', 'JC-24-0024', '2028-07-30', 'VALID', 'file-coc/coc-bop_67e4bc26b25f91.36109653.pdf', '', 'N/A', 'Adm Asset'),
(94, '2025-04-10', 'JAWA', 'PDSI #13.1/H40D-M', '87825', 'DOUBLE RAM', '11\"', '5000', 'HYDRILL', '', 'ON SITE', '013/COC-FIT/III/25', '2029-03-13', 'VALID', 'file-coc/coc-bop_67f73f89155b10.18407012.pdf', '02.05.029', 'N/A', 'Adm Asset'),
(95, '2025-03-17', 'JAWA', 'PDSI #13.1/H40D-M', '1030322/JG-22003', 'ANNULAR', '11\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '042/COC-FIT/X/22', '2026-10-13', 'VALID', 'file-coc/coc-bop_67d79c4586dad9.23874941.pdf', '03.62.1370', 'N/A', 'Adm Asset'),
(96, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SK-21044', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', '2FZ28-35', 'RE-COC/REPAIR', 'SK-21044', '2025-03-01', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(97, '2025-04-09', 'JAWA', 'PDSI #15.3/N110-M', '63242', 'ANNULAR', '13-5/8\"', '10000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0037', '2028-08-28', 'VALID', 'file-coc/coc-bop_67f5d1c068e608.45490240.pdf', '', 'N/A', 'Adm Asset'),
(98, '2025-04-09', 'JAWA', 'PDSI #15.3/N110-M', 'MOV-03622368', 'DOUBLE RAM', '13-5/8\"', '10000', 'CAMERON', '', 'ON SITE', 'JC-24-0034', '2028-08-28', 'VALID', 'file-coc/coc-bop_67f5ce3ced8d50.38308761.pdf', '03.62.2368', 'N/A', 'Adm Asset'),
(99, '2025-03-14', 'JAWA', 'PDSI #15.3/N110-M', 'BAW-049', 'SINGLE RAM', '13-5/8\"', '10000', 'WOM', 'U', 'ON SITE', '042/COC-FIT/IX/23', '2027-09-08', 'VALID', 'file-coc/coc-bop_67d39b5a986ec0.61735286.pdf', '', 'N/A', 'Adm Asset'),
(100, '2025-06-04', 'SBS', 'PDSI #39.3/D1500-E/57', 'SN-UNK-100', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'SPHERICAL', 'ON SITE', '066/COC-FIT/XI/23-(2)', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(101, '2025-04-09', 'SBS', 'PDSI #16.2/NT45-M', '83-8788', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', '', 'ON SITE', 'JC-24-0051', '2028-10-30', 'VALID', 'file-coc/coc-bop_67f5dc3d88f2a4.77549522.pdf', '03.89.50/03.89.2901', 'N/A', 'Adm Asset'),
(102, '2025-04-13', 'JANARO', 'PDSI #17.2/NT45-M', 'SN-UNK-102', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', '056/COC-FIT/IV/24', '2028-04-06', 'VALID', 'file-coc/coc-bop_67fbd0beef5c34.92117185.pdf', '', 'N/A', 'Adm Asset'),
(103, '2025-05-07', 'SBS', 'PDSI #18.2/LTO650-M', 'MOV-03621109', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-23-0032', '2027-11-22', 'VALID', 'file-coc/coc-bop_67e4b6581e3376.90358406.pdf', '03.62.1109-(1)', 'N/A', 'Adm Asset'),
(104, '2025-03-24', 'JANARO', 'PDSI #19.1/LTO350-M', 'R-119/05/19/UMB', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'ON SITE', 'JC-23-0024', '2027-10-24', 'VALID', 'file-coc/coc-bop_67e0d3099fff51.01442021.pdf', '', 'N/A', 'Adm Asset'),
(105, '2025-03-17', 'SBS', 'PDSI #20.2/EMSCOD2-M', '54-240-(1)', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', 'U', 'ON SITE', '044/COC-FIT/X/22-(1)', '2026-10-10', 'VALID', 'file-coc/coc-bop_67d79dfdbbe5c2.99672887.pdf', '03.62.4091-(1)', 'N/A', 'Adm Asset'),
(106, '2025-03-09', 'SBS', 'PDSI #20.2/EMSCOD2-M', '30663L/03.62.0345-(1)', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-22-0016-(1)', '2026-04-28', 'VALID', NULL, '03.62.1108', 'N/A', 'Adm Asset'),
(107, '2025-03-24', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'BAW-043-4', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'U', 'ON SITE', 'JC-23-0017', '2027-08-31', 'VALID', 'file-coc/coc-bop_67e0d0b972c119.32973842.pdf', '03.62.1141', 'N/A', 'Adm Asset'),
(108, '2025-04-09', 'SBS', 'PDSI #20.2/EMSCOD2-M', '149827', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', 'JC-24-0036', '2028-08-28', 'VALID', 'file-coc/coc-bop_67f5d1567e0a97.45541043.pdf', '03.62.1107', 'N/A', 'Adm Asset'),
(109, '2025-05-28', 'SBS', 'PDSI #29.3/D1500-E/53', 'SN-UNK-109', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '047/COC-FIT/X/22-(1)', '2026-10-07', 'VALID', '', '', 'N/A', 'Tomy'),
(110, '2025-03-17', 'SBS', 'PDSI #20.2/EMSCOD2-M', 'BAW-168-(1)', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'U', 'ON SITE', '043/COC-FIT/XI/22-(1)', '2026-11-15', 'VALID', 'file-coc/coc-bop_67d79baab22ba6.55981335.pdf', '', 'N/A', 'Adm Asset'),
(111, '2025-03-17', 'KTI', 'PDSI #21.2/OW700-M', 'SN-UNK-111', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-21-0009', '2025-03-15', 'EXPIRED', 'file-coc/coc-bop_67d7ac09e6d128.64067381.pdf', '', 'N/A', 'Adm Asset'),
(112, '2025-03-24', 'KTI', 'PDSI #21.2/OW700-M', 'SN-UNK-112', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-23-0013', '2027-08-16', 'VALID', 'file-coc/coc-bop_67e0d0225382e4.30411961.pdf', '', 'N/A', 'Adm Asset'),
(113, '2025-03-27', 'KTI', 'PDSI #21.2/OW700-M', '1002020', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0014', '2028-05-10', 'VALID', 'file-coc/coc-bop_67e4ba2e139431.52155135.pdf', 'BODY-510030261', 'N/A', 'Adm Asset'),
(114, '2025-05-23', 'KTI', 'PDSI #10.2/D700-M', 'JK-20091', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-21-0025', '2025-06-25', 'NEAR EXPIRED', 'file-coc/coc-bop_67d7ab737a7fb9.18995025.pdf', '', 'N/A', 'Adm Asset'),
(115, '2025-04-09', 'KTI', 'PDSI #21.2/OW700-M', 'MOV-0362039', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', 'JC-24-0047', '2028-10-24', 'VALID', 'file-coc/coc-bop_67f5db314c2873.64233755.pdf', '03.62.039', 'N/A', 'Adm Asset'),
(116, '2025-03-09', 'KTI', 'PDSI #22.2/OW700-M', 'SN-UNK-116', 'DOUBLE RAM', '13-5/8\"', '3000', '', '', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(117, '2025-04-09', 'KTI', 'PDSI #22.2/OW700-M', '10659133-001/1', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-24-0039', '2028-08-23', 'VALID', 'file-coc/coc-bop_67f5d488800f89.56920461.pdf', '03.62.1234', 'N/A', 'Adm Asset'),
(118, '2025-03-17', 'KTI', 'PDSI #22.2/OW700-M', 'MOV-03621002', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '069/COC-FIT/IX/24', '2028-09-14', 'VALID', 'file-coc/coc-bop_67d7a1188deef3.36508597.pdf', '03.62.1002', 'N/A', 'Adm Asset'),
(119, '2025-03-13', 'SBS', 'PDSI #23.1/CWKT650-M', 'R-145/12/20/UMB', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '582/UMB-PDSI/IV/21', '2025-04-07', 'EXPIRED', 'file-coc/coc-bop_67d274a6367112.28420829.pdf', 'BODY-1009005-PDSI', 'N/A', 'Adm Asset'),
(120, '2025-06-04', 'SBS', 'PDSI #23.1/CWKT650-M', 'MOV-036203601001', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-23-0025', '2027-10-24', 'VALID', 'file-coc/coc-bop_67e0d34e55fe43.36657970.pdf', '03.62.03.60.1001', 'N/A', 'Adm Asset'),
(121, '2025-06-02', 'SBS', 'WS BOP PML SBS', 'SK-21042', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', '2FZ28-35', 'RE-COC/REPAIR', 'SK-21042', '2025-03-01', 'EXPIRED', '', '', 'N/A', 'Hendra W'),
(122, '2025-03-17', 'SBS', 'PDSI #24.1/CWKT210-M', '500.030.251', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', '055/COC-FIT/XI/22', '2026-11-11', 'VALID', 'file-coc/coc-bop_67d781670437e7.70108047.pdf', '03.62.0346-(1)', 'N/A', 'Adm Asset'),
(123, '2025-06-04', 'WS VENDOR', 'JMS GN PUTRI', 'BODY-55006378', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-21-0037-(1)', '2025-08-19', 'NEAR EXPIRED', '', '', 'N/A', 'Tomy'),
(124, '2025-06-04', 'SBS', 'PDSI #25.2/LTO750-M', 'BAW-168-(2)', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'U', 'ON SITE', '043/COC-FIT/XI/22-(2)', '2026-11-15', 'VALID', '', '', 'N/A', 'Adm Asset'),
(125, '2025-04-09', 'SBS', 'PDSI #25.2/LTO750-M', '428738', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0042', '2028-09-19', 'VALID', 'file-coc/coc-bop_67f5d7f7b75c64.90227064.pdf', 'BODY-001/25.1/10/2024', 'N/A', 'Adm Asset'),
(126, '2025-03-24', 'SBS', 'PDSI #25.2/LTO750-M', 'BAW-210', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'U', 'ON SITE', 'JC-23-0010', '2027-07-26', 'VALID', 'file-coc/coc-bop_67e0cf527d04e9.08734805.pdf', '03.62.1810', 'N/A', 'Adm Asset'),
(127, '2025-03-14', 'SBS', 'PDSI #25.2/LTO750-M', '330-52022', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', '041/COC-FIT/IX/23', '2027-09-08', 'VALID', 'file-coc/coc-bop_67d39a418c7020.76448020.pdf', '03.83.11', 'N/A', 'Adm Asset'),
(128, '2025-06-04', 'SBS', 'PDSI #01.2/N80B-M', '140856', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '068/COC-FIT/IX/23', '2028-09-12', 'VALID', '', '03.62.1115', 'N/A', 'Adm Asset'),
(129, '2025-05-28', 'SBS', 'PDSI #01.2/N80B-M', 'W-3937', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'U', 'ON SITE', 'JC-23-0006', '2027-06-08', 'VALID', 'file-coc/coc-bop_67e0cde96a7298.30419240.pdf', '03.62.1745', 'N/A', 'Tomy'),
(130, '2025-05-06', 'SBS', 'PDSI #05.2/OW760-M', '431188', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '024/COC-RMFR/BSU/II/25', '2029-02-14', 'VALID', 'file-coc/coc-bop_67cffb2e1591f3.00213682.pdf', '', 'N/A', 'Adm Asset'),
(131, '2025-03-14', 'SBS', 'PDSI #26.1/H25CD-M', '159505-34', 'ANNULAR', '7-1/16\"', '3000', 'SHAFFER', 'SPHERICAL', 'ON SITE', '062/COC-FIT/X/23', '2027-10-16', 'VALID', 'file-coc/coc-bop_67d39f6b095ae0.12895291.pdf', '03.62.1845', 'N/A', 'Adm Asset'),
(132, '2025-04-09', 'SBS', 'PDSI #26.1/H25CD-M', '0207019-(1)', 'DOUBLE RAM', '7-1/16\"', '3000', 'CAMERON', 'U', 'ON SITE', 'JC-24-0046', '2028-10-30', 'VALID', 'file-coc/coc-bop_67f5da965f5453.95273911.pdf', 'BODY-191021', 'N/A', 'Adm Asset'),
(133, '2025-03-19', 'JAWA', 'PDSI #28.2/D1000-E', '20023004-246', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-22-0012', '2026-03-15', 'VALID', 'file-coc/coc-bop_67da427cd78db8.98473165.pdf', '03.62.1687', 'N/A', 'Adm Asset'),
(134, '2025-03-19', 'JAWA', 'PDSI #28.2/D1000-E', 'BAW-043-2', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', 'JC-22-0011', '2026-02-02', 'VALID', 'file-coc/coc-bop_67da4186aab2a2.51891052.pdf', '', 'N/A', 'Adm Asset'),
(135, '2025-03-19', 'JAWA', 'PDSI #28.2/D1000-E', 'C000007', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-22-0009', '2026-02-02', 'VALID', 'file-coc/coc-bop_67da409a106908.31547347.pdf', '60.13.2600', 'N/A', 'Adm Asset'),
(136, '2025-03-19', 'JAWA', 'PDSI #28.2/D1000-E', 'SN-UNK-136', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'WU', 'ON SITE', 'JC-22-0010', '2026-02-03', 'VALID', 'file-coc/coc-bop_67da4138e72bb4.43026152.pdf', '03.62.1132', 'N/A', 'Adm Asset'),
(137, '2025-06-04', 'SBS', 'WS BOP PML SBS', '156878-24', 'ANNULAR', '13-5/8\"', '10000', 'SHAFFER', 'SPHERICAL', 'RE-COC/REPAIR', '039/COS-FIT/IX/2022', '2026-09-07', 'VALID', 'file-coc/coc-bop_67e3806adace66.94428400.pdf', '03.62.1713', 'N/A', 'Adm Asset'),
(138, '2025-06-04', 'SBS', 'PDSI #29.3/D1500-E/53', 'BAW-168-(3)', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'U', 'ON SITE', '015/COC-FIT/IV/23', '2027-04-06', 'VALID', 'file-coc/coc-bop_67d3832fce11e9.91583388.pdf', '', 'N/A', 'Adm Asset'),
(139, '2025-06-04', 'SBS', 'PDSI #29.3/D1500-E/53', 'BAW-051', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'U SGL', 'ON SITE', 'JC-23-0004', '2027-06-08', 'VALID', 'file-coc/coc-bop_67e0cc12747eb4.41501608.pdf', '03.62.5918/03.62.1747', 'N/A', 'Adm Asset'),
(140, '2025-06-04', 'SBS', 'PDSI #29.3/D1500-E/53', 'C11Y0199/2-6', 'ANNULAR', '21-1/4\"', '2000', 'T3', 'SPHERICAL', 'ON SITE', '007/COC-FIT/III/23', '2027-03-06', 'VALID', 'file-coc/coc-bop_67d29e01361a88.74878546.pdf', '03.62.854-(2)', 'N/A', 'Adm Asset'),
(141, '2025-05-08', 'SBS', 'PDSI #30.2/D1000-E', 'BAW-258', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', 'JC-23-0019', '2027-10-05', 'VALID', 'file-coc/coc-bop_67e0d1d97dbf76.38241775.pdf', '03.62.1840', 'N/A', 'Adm Asset'),
(142, '2025-03-17', 'SBS', 'PDSI #30.2/D1000-E', '1002020/55.00.6378', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-21-0037-(2)', '2025-08-19', 'NEAR EXPIRED', 'file-coc/coc-bop_67d7aa3345e0e8.81094130.pdf', '03.62.212', 'N/A', 'Adm Asset'),
(143, '2025-03-17', 'SBS', 'PDSI #30.2/D1000-E', '54-240-(2)', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', '044/SO-FIT/V/22', '2026-10-10', 'VALID', '', '03.62.0346-(2)', 'N/A', 'Adm Asset'),
(144, '2025-04-09', 'SBS', 'PDSI #30.2/D1000-E', 'JG-23014', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-24-0023', '2028-06-24', 'VALID', 'file-coc/coc-bop_67f5e158628e91.91908424.pdf', '03.62.XXXX', 'N/A', 'Adm Asset'),
(145, '2025-05-28', 'SBS', 'PDSI #29.3/D1500-E/53', 'SN-UNK-145', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '008/COC-RMFR/BSU/X/24', '2028-08-16', 'VALID', 'file-coc/coc-bop_67d129909bd619.22667168.pdf', '', 'N/A', 'Tomy'),
(146, '2025-04-16', 'SBS', 'WS BOP PML SBS', 'BAW-389-0-2', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'RE-COC/REPAIR', '020/COC-RMFR/BSU/I/25', '2029-01-08', 'VALID', 'file-coc/coc-bop_67d13292825063.50339559.pdf', '03.62.1946', 'N/A', 'Adm Asset'),
(147, '2025-05-08', 'SBS', 'WS BOP PML SBS', 'BAW-332-0', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'RE-COC/REPAIR', '021/COC-RMFR/BSU/I/25', '2029-01-08', 'VALID', 'file-coc/coc-bop_67d133071233e8.76762349.pdf', '03.62.1910', 'N/A', 'Adm Asset'),
(148, '2025-03-24', 'JAWA', 'PDSI #31.3/D1500-E', 'BAW-036', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', '', 'ON SITE', 'JC-23-0003', '2027-06-08', 'VALID', 'file-coc/coc-bop_67e0cb6edf20c0.92672972.pdf', '03.62.5918', 'N/A', 'Adm Asset'),
(149, '2025-06-02', 'JAWA', 'PDSI #15.3/N110-M', 'BAW-312', 'ANNULAR', '20-3/4\"', '3000', 'WOM', 'MSP', 'ON SITE', '040/COC-FIT/IX/23', '2027-09-08', 'VALID', 'file-coc/coc-bop_67d387c3dcc069.72719394.pdf', '03.62.1860', 'N/A', 'Adm Asset'),
(150, '2025-05-20', 'JAWA', 'WS BOP MUNDU JAWA', '1499785', 'ANNULAR', '13-5/8\"', '10000', 'HYDRILL', 'GX', 'RE-COC/REPAIR', 'JC-21-0019', '2025-05-07', 'EXPIRED', 'file-coc/coc-bop_67d7a8cb1fc4a8.98420007.pdf', '03.62.1105', 'N/A', 'Adm Asset'),
(151, '2025-03-27', 'JAWA', 'PDSI #31.3/D1500-E', 'MOV-0362498', 'DOUBLE RAM', '13-5/8\"', '10000', 'CAMERON', '', 'ON SITE', 'JC-24-0055', '2028-12-12', 'VALID', 'file-coc/coc-bop_67e4bbc40ce957.10244371.pdf', '03.62.498', 'N/A', 'Adm Asset'),
(152, '2025-03-12', 'JAWA', 'PDSI #31.3/D1500-E', 'BAW-175', 'SINGLE RAM', '13-5/8\"', '10000', 'WOM', 'U', 'ON SITE', '004/COC-RMFR/BSU/VII/24', '2028-06-28', 'VALID', 'file-coc/coc-bop_67d1277ca33972.78396085.pdf', '03.62.1233', 'N/A', 'Adm Asset'),
(153, '2025-03-24', 'KTI', 'PDSI #32.2/N80UE-E', 'BAW-135', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', 'JC-23-0020', '2027-05-10', 'VALID', 'file-coc/coc-bop_67e0d231607225.80487207.pdf', '03.62.1719', 'N/A', 'Adm Asset'),
(154, '2025-03-24', 'KTI', 'PDSI #32.2/N80UE-E', 'SN-UNK-154', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', '070/COC-FIT/XI/23', '2027-12-14', 'VALID', '', '', 'N/A', 'Adm Asset'),
(155, '2025-06-09', 'SBS', 'PDSI #16.2/NT45-M', 'JK-20100', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK HL', 'ON SITE', '023/COC-FIT/VI/23', '2027-06-21', 'VALID', 'file-coc/coc-bop_67d3869192aa23.26883634.pdf', '', 'N/A', 'Adm Asset'),
(156, '2025-05-27', 'KTI', 'PDSI #32.2/N80UE-E', 'BAW-236', 'SINGLE RAM-(SHEAR)', '13-5/8\"', '5000', 'WOM', 'WU SGL', 'ON SITE', '005/COC-RMFR/BSU/VII/24', '2028-06-28', 'VALID', 'file-coc/coc-bop_67d129393e8792.91002894.pdf', '03.62.1833', 'N/A', 'Adm Asset'),
(157, '2025-05-08', 'SBS', 'PDSI #33.1/IDECO/H35-M', 'MOV-03621082', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-23-0030', '2027-11-22', 'VALID', 'file-coc/coc-bop_67e4b5f6515585.33349065.pdf', '03.62.1082', 'N/A', 'Adm Asset'),
(158, '2025-04-09', 'SBS', 'PDSI #33.1/IDECO/H35-M', '20088304-6', 'ANNULAR', '7-1/16\"', '5000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-24-0038', '2028-08-28', 'VALID', 'file-coc/coc-bop_67f5d22e146ff4.08421353.pdf', '03.62.1712', 'N/A', 'Adm Asset'),
(159, '2025-04-09', 'SBS', 'PDSI #33.1/IDECO/H35-M', 'SN-UNK-159', 'DOUBLE RAM', '7-1/16\"', '3000', 'DRECO', '', 'ON SITE', 'JC-25-0004', '2029-01-30', 'VALID', 'file-coc/coc-bop_67f5df3ea41cb2.27872167.pdf', '', 'N/A', 'Adm Asset'),
(160, '2025-03-17', 'SBS', 'PDSI #34.1/IDECO/H35-M', 'MOV-0364024', 'SINGLE RAM', '7-1/16\"', '3000', 'CAMERON', 'U', 'ON SITE', 'JC-22-0007', '2026-01-26', 'VALID', 'file-coc/coc-bop_67d7ad5749bf96.32115720.pdf', '03.64.024', 'N/A', 'Adm Asset'),
(161, '2025-03-17', 'SBS', 'PDSI #34.1/IDECO/H35-M', '00036210003', 'SINGLE RAM', '7-1/16\"', '3000', 'CAMERON', 'U', 'ON SITE', 'JC-22-0006', '2026-01-26', 'VALID', 'file-coc/coc-bop_67d7ada90be2c6.26439459.pdf', '000.362.1003', 'N/A', 'Adm Asset'),
(162, '2025-04-09', 'SBS', 'PDSI #34.1/IDECO/H35-M', 'MOV-03621089', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0035', '2028-08-28', 'VALID', 'file-coc/coc-bop_67f5d035afc645.94648900.pdf', '03.62.1089', 'N/A', 'Adm Asset'),
(163, '2025-05-02', 'JANARO', 'PDSI #35.1/IDECO/H35-M', 'SK-21018', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'FH28-35', 'ON SITE', 'SK-21018', '2025-02-05', 'EXPIRED', 'file-coc/coc-bop_68147cd6d740f3.20523569.pdf', '03.62.2079', '4500195625', 'Adm Asset'),
(164, '2025-03-17', 'JANARO', 'PDSI #35.1/IDECO/H35-M', '04.03.033/31600L', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'ON SITE', 'JC-22-0005', '2026-01-26', 'VALID', 'file-coc/coc-bop_67d7acde4f2041.77294600.pdf', '04.03.033', 'N/A', 'Adm Asset'),
(165, '2025-06-02', 'JANARO', 'PDSI #35.1/IDECO/H35-M', 'R-149/09/21/UMB', 'DOUBLE RAM', '7-1/16\"', '3000', 'TOWNSEND', '', 'ON SITE', 'JC-19-0001', '2023-01-21', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(166, '2025-03-17', 'JANARO', 'PDSI #35.1/IDECO/H35-M', 'MOV-0362467', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', 'U', 'ON SITE', 'JC-22-0003', '2026-01-05', 'VALID', 'file-coc/coc-bop_67d7ae397e7ba6.26867353.pdf', '03.62.467', 'N/A', 'Adm Asset'),
(167, '2025-03-13', 'JANARO', 'PDSI #35.1/IDECO/H35-M', '10070301', 'ANNULAR', '11\"', '3000', 'SHAFFER', 'GK', 'ON SITE', '609/UMB-PDSI/X/22', '2026-10-19', 'VALID', 'file-coc/coc-bop_67d2970aa12d90.06006857.pdf', '21.10.12-(1)', 'N/A', 'Adm Asset'),
(168, '2025-06-04', 'SBS', 'PDSI #36.1/SKYTOP650-M', '152169-1551', 'ANNULAR', '7-1/16\"', '5000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-24-0010', '2028-03-20', 'VALID', 'file-coc/coc-bop_67e4b8017ff690.98014376.pdf', '03.62.1315', 'N/A', 'Adm Asset'),
(169, '2025-06-04', 'SBS', 'PDSI #36.1/SKYTOP650-M', '54-240-(3)', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', '', 'ON SITE', '044/COC-FIT/X/22-(2)', '2026-10-10', 'VALID', '', '03.62.4091-(2)', 'N/A', 'Adm Asset'),
(170, '2025-06-04', 'SBS', 'WS BOP PML SBS', 'BAW-053', 'SINGLE RAM', '13-5/8\"', '5000', 'WOM', 'U', 'RE-COC/REPAIR', 'JC-24-0012', '2028-03-20', 'VALID', 'file-coc/coc-bop_67e4b8d382e849.88960735.pdf', '03.62.1685', 'N/A', 'Adm Asset'),
(171, '2025-04-27', 'SBS', 'WS BOP PML SBS', '118087', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '058/COC-FIT/XII/22', '2026-12-05', 'VALID', 'file-coc/coc-bop_67d7846f203300.21712092.pdf', 'BODY-1101028-PDSI', 'N/A', 'Adm Asset'),
(172, '2025-05-06', 'SBS', 'WS BOP PML SBS', 'SN-UNK-172', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '058/COC-FIT/IX/23', '2027-09-26', 'VALID', 'file-coc/coc-bop_67d39edcafc4a6.01985630.pdf', '', 'N/A', 'Adm Asset'),
(173, '2025-05-16', 'JAWA', 'PDSI #15.3/N110-M', 'BAW-255-2', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'ON SITE', 'JC-25-0001', '2029-01-23', 'VALID', 'file-coc/coc-bop_67f5dea5bedc47.15507528.pdf', '03.62.1838', 'N/A', 'Adm Asset'),
(174, '2025-03-27', 'JAWA', 'PDSI #38.2/D1000-E', '00461', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-24-0020', '2028-06-13', 'VALID', 'file-coc/coc-bop_67e4bb90779539.44815574.pdf', '', 'N/A', 'Adm Asset'),
(175, '2025-04-16', 'WS VENDOR', 'BENVORS GN PUTRI', '43873-B', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'WO BENVORS NO. SPK-361-21/JC-21-0013', '2025-04-13', 'EXPIRED', 'file-coc/coc-bop_67da3fa0b76536.59266535.pdf', '', 'N/A', 'Adm Asset'),
(176, '2025-03-09', 'JAWA', 'PDSI #38.2/D1000-E', 'SN-UNK-176', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', '', 'ON SITE', '059/COC-FIT/IX/23', '2027-09-26', 'VALID', NULL, '', 'N/A', 'Adm Asset'),
(177, '2025-03-17', 'JAWA', 'PDSI #38.2/D1000-E', 'MOV-03620002', 'SINGLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', '051/COC-FIT/X/22', '2026-10-25', 'VALID', 'file-coc/coc-bop_67d79a1aeeccc7.65106409.pdf', '03.62.0002', 'N/A', 'Adm Asset'),
(178, '2025-05-08', 'SBS', 'PDSI #05.2/OW760-M', 'BAW-136', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', 'U', 'ON SITE', 'JC-22-0017', '2026-04-28', 'VALID', 'file-coc/coc-bop_67e0ca540f0cf2.40372094.pdf', '03.62.1720', 'N/A', 'Adm Asset'),
(179, '2025-05-06', 'SBS', 'PDSI #05.2/OW760-M', '30663L/03.62.0345-(2)', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-22-0016-(2)', '2026-04-28', 'VALID', 'file-coc/coc-bop_67e0c9cfb27ca0.54900814.pdf', '03.62.0345', 'N/A', 'Adm Asset'),
(180, '2025-03-24', 'SBS', 'PDSI #39.3/D1500-E/57', 'BAW-134', 'SINGLE RAM', '13-5/8\"', '5000', 'WOM', 'U', 'ON SITE', 'JC-23-0018', '2027-08-31', 'VALID', 'file-coc/coc-bop_67e0d199a4e598.75912307.pdf', '03.62.1171', 'N/A', 'Adm Asset'),
(181, '2025-06-04', 'SBS', 'PDSI #16.2/NT45-M', '20088291-1', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'SPHERICAL', 'ON SITE', '066/COC-FIT/XI/23', '2027-11-17', 'VALID', 'file-coc/coc-bop_67d3ade8022fd7.78145233.pdf', '', 'N/A', 'Adm Asset'),
(182, '2025-03-17', 'SBS', 'PDSI #39.3/D1500-E/57', 'BAW-166-(2)', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', '046/COC-FIT/XI/22-(2)', '2026-11-15', 'VALID', 'file-coc/coc-bop_67d79fab702698.75271232.pdf', '03.62.1138-(1)', 'N/A', 'Adm Asset'),
(183, '2025-03-24', 'SBS', 'PDSI #39.3/D1500-E/57', 'BAW-343-0', 'ANNULAR', '21-1/4\"', '2000', 'WOM', 'MSP', 'ON SITE', 'JC-23-0015', '2027-08-31', 'VALID', 'file-coc/coc-bop_67e0d0731d8882.47394421.pdf', '03.62.1909', 'N/A', 'Adm Asset'),
(184, '2025-04-09', 'SBS', 'PDSI #39.3/D1500-E/57', 'BAW-035', 'SINGLE RAM', '13-5/8\"', '5000', 'WOM', 'WU', 'ON SITE', 'JC-24-0027', '2028-07-30', 'VALID', 'file-coc/coc-bop_67f5ccb9db8031.99981431.pdf', '', 'N/A', 'Adm Asset'),
(185, '2025-03-09', 'JAWA', 'PDSI #40.3/DS1500-E', '20023004-454', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', '', 'ON SITE', '', '2027-12-20', 'VALID', NULL, '', 'N/A', 'Adm Asset'),
(186, '2025-03-09', 'JAWA', 'PDSI #40.3/DS1500-E', 'S11P1574/1', 'SINGLE RAM', '21-1/4\"', '2000', 'T3', '', 'ON SITE', '', '2027-12-01', 'VALID', NULL, '03.62.1696', 'N/A', 'Adm Asset'),
(187, '2025-03-09', 'JAWA', 'PDSI #40.3/DS1500-E', 'S11P1561/1', 'SINGLE RAM', '21-1/4\"', '2000', 'T3', '', 'ON SITE', '', '2027-12-01', 'VALID', NULL, '03.62.1695', 'N/A', 'Adm Asset'),
(188, '2025-06-12', 'JANARO', 'PDSI #17.2/NT45-M', '20088291-5', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', '', 'ON SITE', '', '2027-12-01', 'VALID', '', '', 'N/A', 'Adm Asset'),
(189, '2025-03-09', 'JAWA', 'PDSI #40.3/DS1500-E', 'C11P0493/25', 'DOUBLE RAM-(SHEAR)', '13-5/8\"', '5000', 'T3', '', 'ON SITE', '', '2028-02-01', 'VALID', NULL, '03.62.1699', 'N/A', 'Adm Asset'),
(190, '2025-03-09', 'JAWA', 'PDSI #40.3/DS1500-E', 'C11P0493/27', 'SINGLE RAM', '13-5/8\"', '5000', 'T3', '', 'ON SITE', '', '2027-12-01', 'VALID', NULL, '03.62.1698', 'N/A', 'Adm Asset'),
(191, '2025-03-12', 'SBS', 'PDSI #41.3/N110UE-E', 'MOV-03621211', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', '013/COC-RMFR/BSU/X/24', '2028-10-31', 'VALID', 'file-coc/coc-bop_67d12a07220e57.80511876.pdf', '03.62.1211', 'N/A', 'Adm Asset'),
(192, '2025-03-12', 'SBS', 'PDSI #41.3/N110UE-E', 'MOV-03621138', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'WU', 'ON SITE', '015/COC-RMFR/BSU/X/24', '2028-10-31', 'VALID', 'file-coc/coc-bop_67d12ab70a5d54.58553955.pdf', '03.62.1138-(2)', 'N/A', 'Adm Asset'),
(193, '2025-03-27', 'SBS', 'PDSI #41.3/N110UE-E', '048/0362503', 'DOUBLE RAM', '7-1/16\"', '10000', 'CAMERON', 'U', 'ON SITE', 'JC-23-0026', '2027-10-24', 'VALID', 'file-coc/coc-bop_67e4b1f0e57799.15719418.pdf', '03.62.503', 'N/A', 'Adm Asset'),
(194, '2025-06-04', 'SBS', 'PDSI #01.2/N80B-M', 'SN-UNK-194', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '001/COC-FIT/II/23', '2027-02-25', 'VALID', 'file-coc/coc-bop_6836ce1c098899.91356062.pdf', '', 'N/A', 'Adm Asset'),
(195, '2025-03-12', 'SBS', 'PDSI #41.3/N110UE-E', 'MOV-03628313', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', '014/COC-RMFR/BSU/X/24', '2028-10-31', 'VALID', 'file-coc/coc-bop_67d12b25aee1b1.22177151.pdf', '03.62.8313', 'N/A', 'Adm Asset'),
(196, '2025-03-24', 'JANARO', 'PDSI #17.2/NT45-M', 'MOV-03621225', 'ANNULAR', '7-1/16\"', '5000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-23-0007', '2026-07-26', 'VALID', 'file-coc/coc-bop_67e0ce64e85657.81838983.pdf', '03.62.1225', 'N/A', 'Adm Asset'),
(197, '2025-03-24', 'JANARO', 'PDSI #17.2/NT45-M', 'BAW-171', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'U', 'ON SITE', 'JC-23-0005', '2027-06-08', 'VALID', 'file-coc/coc-bop_67e0cc49b57201.82256987.pdf', '03.83.1901', 'N/A', 'Adm Asset'),
(198, '2025-03-24', 'JANARO', 'PDSI #42.3/N1500-E', 'BAW-043-3', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'U', 'ON SITE', '022/COC-FIT/VII/22', '2026-07-28', 'VALID', 'file-coc/coc-bop_67d78a329d7567.74556680.pdf', '03.62.1140', 'N/A', 'Adm Asset'),
(199, '2025-06-04', 'JANARO', 'PDSI #42.3/N1500-E', 'BAW-235', 'SINGLE RAM-(SHEAR)', '13-5/8\"', '10000', 'WOM', 'U', 'ON SITE', 'JC-23-0011', '2027-07-26', 'VALID', 'file-coc/coc-bop_67e0cfd9e3a4a8.79021258.pdf', '03.62.1832', 'N/A', 'Adm Asset'),
(200, '2025-03-17', 'JANARO', 'PDSI #42.3/N1500-E', '37141/F-37370', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'ON SITE', '035/COC-FIT/IX/22', '2026-09-30', 'VALID', 'file-coc/coc-bop_67d79551397ff1.46724424.pdf', '03.62.851', 'N/A', 'Adm Asset'),
(201, '2025-03-17', 'JANARO', 'PDSI #42.3/N1500-E', '149826', 'ANNULAR', '13-5/8\"', '10000', 'HYDRILL', 'GX', 'ON SITE', '057/COC-FIT/IV/24', '2028-04-06', 'VALID', 'file-coc/coc-bop_67d7a09a1aa346.15265222.pdf', '', 'N/A', 'Adm Asset'),
(202, '2025-05-06', 'JANARO', 'PDSI #42.3/N1500-E', 'BAW-068', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'U', 'ON SITE', '003/COC-RMFR/BSU/VII/24', '2028-06-28', 'VALID', 'file-coc/coc-bop_67d11c1fe584e6.90792076.pdf', '03.62.1158', 'N/A', 'Adm Asset'),
(203, '2025-03-24', 'JANARO', 'PDSI #42.3/N1500-E', 'MOV-03621744', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'U', 'ON SITE', 'JC-23-0008', '2027-07-26', 'VALID', 'file-coc/coc-bop_67e0ce98a14799.41214923.pdf', '03.62.1744', 'N/A', 'Adm Asset'),
(204, '2025-03-17', 'JANARO', 'PDSI #42.3/N1500-E', '48-813362-01', 'SINGLE RAM-(SHEAR)', '13-5/8\"', '10000', 'AXON', 'U', 'ON SITE', '023/COC-FIT/VII/22', '2026-07-27', 'VALID', 'file-coc/coc-bop_67d78c5b9a05f1.96599707.pdf', '03.62.1727', 'N/A', 'Adm Asset'),
(205, '2025-03-27', 'KTI', 'PDSI #43.3/AB1500-E', 'MOV-03621099', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'ON SITE', 'JC-24-0001', '2028-01-17', 'VALID', 'file-coc/coc-bop_67e4b74f668338.25195924.pdf', '03.62.1099', 'N/A', 'Adm Asset'),
(206, '2025-03-09', 'KTI', 'PDSI #43.3/AB1500-E', 'BAW-259-001', 'DOUBLE RAM', '21-1/4\"', '2000', 'WOM', 'U', 'ON SITE', 'JC-20-0049', '2024-11-09', 'EXPIRED', NULL, '03.62.1841', 'N/A', 'Adm Asset'),
(207, '2025-05-06', 'WS VENDOR', 'JMS BALIKPAPAN', 'BAW-103', 'SINGLE RAM', '13-5/8\"', '10000', 'WOM', 'U', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-25009/541/UMB-PDSI/V/19', '2023-05-08', 'EXPIRED', 'file-coc/coc-bop_67d27377025a33.06619525.pdf', '', 'N/A', 'Adm Asset'),
(208, '2025-03-19', 'KTI', 'PDSI #43.3/AB1500-E', 'BAW-032', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', 'U', 'ON SITE', 'JC-22-0015', '2026-04-28', 'VALID', 'file-coc/coc-bop_67da431a9cdcb5.16562086.pdf', '', 'N/A', 'Adm Asset'),
(209, '2025-03-17', 'KTI', 'PDSI #43.3/AB1500-E', 'BAW-208', 'ANNULAR', '21-1/4\"', '2000', 'WOM', 'MSP', 'ON SITE', '054/COC-FIT/XI/22', '2026-11-15', 'VALID', 'file-coc/coc-bop_67d780bb3fead4.68975269.pdf', '', 'N/A', 'Adm Asset'),
(210, '2025-06-04', 'SBS', 'WS BOP PML SBS', '144/SO-FIT/V/22', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '006/COC-FIT/III/23', '2027-03-06', 'VALID', 'file-coc/coc-bop_67d29d6d31a1d3.80417796.pdf', 'BODY-H03-46-PDSI', 'N/A', 'Adm Asset'),
(211, '2025-03-17', 'SBS', 'PDSI #44.1/PD350-M', 'W-1399-4', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', 'U', 'ON SITE', '050/COC-FIT/X/22', '2026-10-10', 'VALID', 'file-coc/coc-bop_67d79cb650dd61.77983720.pdf', '03.62.1133', 'N/A', 'Adm Asset'),
(212, '2025-04-09', 'SBS', 'PDSI #45.1/PD350-M', 'MOV-036010', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-25-0005', '2029-01-30', 'VALID', 'file-coc/coc-bop_67f5e04c0b4042.84640351.pdf', '03.60.10', 'N/A', 'Adm Asset'),
(213, '2025-04-09', 'SBS', 'PDSI #45.1/PD350-M', 'TM20-6(57)', 'DOUBLE RAM', '7-1/16\"', '3000', 'TOWNSEND', '', 'ON SITE', 'JC-24-0026', '2028-07-30', 'VALID', 'file-coc/coc-bop_67f5cbaf3b7455.05473226.pdf', '057/03.62.0060', 'N/A', 'Adm Asset'),
(214, '2025-06-12', 'SBS', 'PDSI #23.1/CWKT650-M', 'SK-21026', 'DOUBLE RAM', '11\"', '5000', 'SHENKAI', '', 'ON SITE', 'SK-21026', '2025-02-01', 'EXPIRED', '', '03.62.2081', 'N/A', 'Tomy'),
(215, '2025-03-13', 'JANARO', 'PDSI #46.1/PD350-M', 'R-086/12/11/UMB', 'DOUBLE RAM', '11\"', '3000', 'SHAFFER', 'LWS', 'ON SITE', '605/UMB-PDSI/VII/22', '2026-07-27', 'VALID', 'file-coc/coc-bop_67d2759c3e2347.57397092.pdf', '21.10.12-(2)', 'N/A', 'Adm Asset'),
(216, '2025-03-14', 'JANARO', 'PDSI #46.1/PD350-M', 'SN-UNK-216', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', '014/COC-FIT/IV/23', '2027-04-06', 'VALID', 'file-coc/coc-bop_67d38249f1dbd6.01916914.pdf', '', 'N/A', 'Adm Asset'),
(217, '2025-04-09', 'JANARO', 'PDSI #46.1/PD350-M', 'MOV-035568', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', 'U', 'ON SITE', 'JC-25-0006', '2029-01-30', 'VALID', 'file-coc/coc-bop_67f5e0e58d2314.59277195.pdf', '03.55.68', 'N/A', 'Adm Asset');
INSERT INTO `tb_dbhasilbop` (`id_bop`, `periode_laporan`, `rig_operation`, `rig_yard`, `sn_bop`, `jenis_bop`, `size`, `pressure`, `man`, `type`, `status_unit`, `no_coc`, `akhir_coc`, `status_coc`, `file_coc`, `no_mov`, `no_po`, `username`) VALUES
(218, '2025-06-04', 'JANARO', 'PDSI #52.2/PD550-M', '03892901', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'ON SITE', '022/COC-RMFR/BSU/I/25', '2029-01-08', 'VALID', 'file-coc/coc-bop_682fc405d0f230.49357202.pdf', '', 'N/A', 'Zulkarnaini'),
(219, '2025-05-02', 'JANARO', 'PDSI #49.2/PD550-M', 'SK-19161', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', 'FH35-35', 'ON SITE', 'SK-19161', '2025-03-14', 'EXPIRED', 'file-coc/coc-bop_681480d6455046.87460977.pdf', '03.62.2021', '4500195625', 'Adm Asset'),
(220, '2025-05-21', 'WS VENDOR', 'JMS GN PUTRI', 'SK-21022', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', 'FH35-35', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-25015', '2025-02-14', 'EXPIRED', 'file-coc/coc-bop_68147dd54cbe42.55937781.pdf', '03.62.2028', '4500195625', 'Adm Asset'),
(221, '2025-05-21', 'WS VENDOR', 'JMS GN PUTRI', 'SK-21024', 'DOUBLE RAM', '13-5/8\"', '5000', 'SHENKAI', '2FZ35-35', 'RE-COC/REPAIR', 'WO JMS GNP NO. JG-25014', '2025-02-25', 'EXPIRED', 'file-coc/coc-bop_681afef14044a5.62897776.pdf', '03.62.2080', '4500195625', 'Adm Asset'),
(222, '2025-05-07', 'JANARO', 'PDSI #51.2/PD550-M', 'SK-21039', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', '', 'ON SITE', 'SK-21039', '2025-02-15', 'EXPIRED', '', '03.62.2086', 'N/A', 'Adm Asset'),
(223, '2025-05-07', 'JANARO', 'PDSI #51.2/PD550-M', 'SK-21023', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', 'FH35-35', 'ON SITE', 'SK-21023', '2025-02-16', 'EXPIRED', 'file-coc/coc-bop_681b08d6632297.85765046.pdf', '03.62.2088', '4500195625', 'Adm Asset'),
(224, '2025-05-02', 'JANARO', 'PDSI #52.2/PD550-M', 'SK-21040', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', 'FH35-35', 'ON SITE', 'SK-21040', '2025-03-10', 'EXPIRED', 'file-coc/coc-bop_68147f41373b23.89658380.pdf', '03.62.2094', '4500195625', 'Adm Asset'),
(225, '2025-06-10', 'JANARO', 'YARD DURI', 'R-118/03/09/UMB', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'OUT OF SERVICE', 'JC-23- 0021', '2027-06-05', 'VALID', 'file-coc/coc-bop_6847ab5ecb6c96.69408556.pdf', '', '4650016771', 'Zulkarnaini'),
(226, '2025-05-23', 'JANARO', 'PDSI #53.2/ZJ750-M', 'SK-23319', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', 'FH35-35', 'ON SITE', 'SK-23319', '2027-11-15', 'VALID', 'file-coc/coc-bop_682fbdbc388f40.20636497.pdf', '03.62.2167', 'N/A', 'Adm Asset'),
(227, '2025-05-23', 'JANARO', 'PDSI #54.2/ZJ750-M', 'SK-23343', 'DOUBLE RAM-(SHEAR)', '13-5/8\"', '5000', 'SHENKAI', 'FW-23-197', 'ON SITE', 'SK-23343', '2027-12-12', 'VALID', 'file-coc/coc-bop_682fbc7f22db99.26925705.pdf', '03.62.2168', 'N/A', 'Adm Asset'),
(228, '2025-05-07', 'JANARO', 'PDSI #53.2/ZJ750-M', 'SK-23342', 'DOUBLE RAM-(SHEAR)', '13-5/8\"', '5000', 'SHENKAI', '', 'ON SITE', 'SK-23342', '2027-12-12', 'VALID', '', '03.62.2174', 'N/A', 'Adm Asset'),
(229, '2025-05-22', 'JANARO', 'PDSI #49.2/PD550-M', 'SK-19199', 'DOUBLE RAM', '13-5/8\"', '5000', 'SHENKAI', '', 'ON SITE', 'JC-24-0025', '2028-07-30', 'VALID', 'file-coc/coc-bop_682fb8c6d9b1d1.11467005.pdf', '', 'N/A', 'Zulkarnaini'),
(230, '2025-05-23', 'JANARO', 'PDSI #54.2/ZJ750-M', 'SK-23341', 'ANNULAR', '13-5/8\"', '5000', 'SHENKAI', 'FH35-35', 'ON SITE', 'SK-23341', '2027-11-15', 'VALID', 'file-coc/coc-bop_682fdde2472f80.51123239.pdf', '03.62.2173', 'N/A', 'Adm Asset'),
(231, '2025-06-02', 'SBS', 'STAGING AREA TLJ-207', 'SN-UNK-231', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.75.28', 'N/A', 'Adm Asset'),
(232, '2025-06-02', 'SBS', 'STAGING AREA TLJ-207', 'SN-UNK-232', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.6015', 'N/A', 'Adm Asset'),
(233, '2025-06-02', 'SBS', 'STAGING AREA TLJ-207', '100019-PDSI', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'U', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.72.162', 'N/A', 'Adm Asset'),
(234, '2025-06-02', 'SBS', 'STAGING AREA TLJ-207', 'R-535', 'SINGLE RAM', '13-5/8\"', '3000', 'HYDRILL', '', 'OUT OF SERVICE', 'JUNK', '2014-07-01', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(235, '2025-06-02', 'SBS', 'STAGING AREA TLJ-207', 'BODY-8367500001', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(236, '2025-06-02', 'SBS', 'STAGING AREA TLJ-207', '810285', 'ANNULAR', '13-5/8\"', '3000', 'SHAFCO', '', 'OUT OF SERVICE', 'JUNK', '2014-05-31', 'EXPIRED', '', 'BODY-00283', 'N/A', 'Adm Asset'),
(237, '2025-06-02', 'SBS', 'STAGING AREA TLJ-216', '31301', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.0845', 'N/A', 'Adm Asset'),
(238, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'R000000055-1', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', '', 'RE-COC/REPAIR', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1095', 'N/A', 'Adm Asset'),
(239, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '150006', 'ANNULAR', '7-1/16\"', '10000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JUNK', '2021-03-22', 'EXPIRED', '', '03.62.1106', 'N/A', 'Adm Asset'),
(240, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-039', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', '', 'RE-COC/REPAIR', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '09.20.1039', 'N/A', 'Adm Asset'),
(241, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-241', 'DOUBLE RAM', '7-1/16\"', '3000', 'RONGSHENG', '', 'RE-COC/REPAIR', 'WO ASSET KE-1/MARK NO. 23', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(242, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BW-1019-1', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', '', 'RE-COC/REPAIR', 'JUNK', '2013-05-01', 'EXPIRED', '', '03.62.1688', 'N/A', 'Adm Asset'),
(243, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-080', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'RE-COC/REPAIR', 'JC-18-0206', '2022-04-12', 'EXPIRED', '', '03.62.1748', 'N/A', 'Adm Asset'),
(244, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '660003836', 'ANNULAR', '13-5/8\"', '10000', 'CAMERON', 'MSP', 'RE-COC/REPAIR', 'JUNK', '2016-12-27', 'EXPIRED', '', '03.62.1079', 'N/A', 'Adm Asset'),
(245, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-207', 'ANNULAR', '13-5/8\"', '5000', 'WOM', 'GK', 'RE-COC/REPAIR', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1807', 'N/A', 'Adm Asset'),
(247, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-247', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-21-0008', '2025-03-15', 'EXPIRED', '', '03.62.0359', 'N/A', 'Adm Asset'),
(249, '2025-03-17', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-249', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', '', 'RE-COC/REPAIR', 'WO ASSET KE-2/MARK NO. 10', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1091-(2)', 'N/A', 'Adm Asset'),
(250, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '4115-1', 'DOUBLE RAM', '7-1/16\"', '5000', 'KOOMEY', '', 'RE-COC/REPAIR', 'WO ASSET KE-2/MARK NO. 11', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.901', 'N/A', 'Adm Asset'),
(251, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '54731-15610', 'DOUBLE RAM', '7-1/16\"', '5000', 'KOOMEY', '', 'RE-COC/REPAIR', 'WO ASSET KE-2/MARK NO. 12', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.0361', 'N/A', 'Adm Asset'),
(252, '2025-03-09', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-252', 'DOUBLE RAM', '7-1/16\"', '3000', 'KOOMEY', '', 'RE-COC/REPAIR', 'WO ASSET KE-2/MARK NO. 13', '0000-00-00', 'COC DATE UNKNOW', NULL, '03.62.445', 'N/A', 'Adm Asset'),
(253, '2025-03-09', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-253', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', '', 'RE-COC/REPAIR', 'WO ASSET KE-2/MARK NO. 19', '0000-00-00', 'COC DATE UNKNOW', NULL, '', 'N/A', 'Adm Asset'),
(254, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-254', 'SINGLE RAM', '11\"', '3000', 'CAMERON', '', 'RE-COC/REPAIR', 'WO ASSET KE-2/MARK NO. 20', '0000-00-00', 'COC DATE UNKNOW', '', '03.76.63', 'N/A', 'Adm Asset'),
(255, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '523877-2', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '673/UMB-PDSI/IV/2926', '2024-04-10', 'EXPIRED', '', '10.02.122', 'N/A', 'Adm Asset'),
(256, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-256', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1210', 'N/A', 'Adm Asset'),
(257, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-065', 'ANNULAR', '13-5/8\"', '10000', 'WOM', 'GK', 'RE-COC/REPAIR', 'JC-20-0014', '2024-04-13', 'EXPIRED', '', '03.62.1144', 'N/A', 'Adm Asset'),
(258, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-163', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'RE-COC/REPAIR', 'JC-21-0041', '2025-09-30', 'NEAR EXPIRED', '', '', 'N/A', 'Adm Asset'),
(259, '2025-03-09', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-259', 'DOUBLE RAM', '7-1/16\"', '10000', 'CAMERON', '', 'RE-COC/REPAIR', 'O.12/DSI1140/24/163', '0000-00-00', 'COC DATE UNKNOW', NULL, '03.62.1209', 'N/A', 'Adm Asset'),
(260, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '36331', 'ANNULAR', '7-1/16\"', '10000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-20-0043', '2024-09-10', 'EXPIRED', '', '03.62.0298', 'N/A', 'Adm Asset'),
(261, '2025-03-09', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-261', 'DOUBLE RAM', '7-1/16\"', '5000', 'WOM', '', 'RE-COC/REPAIR', 'O.24/DSI1120/23/096', '0000-00-00', 'COC DATE UNKNOW', NULL, '03.62.074', 'N/A', 'Adm Asset'),
(262, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-262', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-22-0002', '2026-01-05', 'VALID', '', '03.62.002', 'N/A', 'Adm Asset'),
(263, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-263', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'RE-COC/REPAIR', 'O.25/DSI1140/24/121', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.0337', 'N/A', 'Adm Asset'),
(264, '2025-06-02', 'JAWA', 'WS BOP MUNDU JAWA', '20073004-394', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'RE-COC/REPAIR', '045/COC-FIT/XI/22', '2026-11-15', 'VALID', '', '03.62.1742', 'N/A', 'Adm Asset'),
(265, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-255-1', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'RE-COC/REPAIR', 'JC-21-0023', '2025-06-08', 'EXPIRED', 'file-coc/coc-bop_67cffb9575df41.00885046.pdf', '03.62.1839', 'N/A', 'Adm Asset'),
(266, '2025-03-17', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-042', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'RE-COC/REPAIR', 'JC-19-0008', '2023-02-12', 'EXPIRED', 'file-coc/coc-bop_67cffb7c32b4f4.95270965.pdf', '', 'N/A', 'Adm Asset'),
(269, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-164', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'RE-COC/REPAIR', '064/COC-FIT/XI/23', '2027-11-02', 'VALID', '', '', 'N/A', 'Adm Asset'),
(272, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-255-02', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'RE-COC/REPAIR', 'JC-21-0014', '2025-04-14', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(274, '2025-06-02', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-303', 'ANNULAR', '20-3/4\"', '3000', 'WOM', 'MSP', 'RE-COC/REPAIR', 'JC-24-0053', '2028-12-12', 'VALID', 'file-coc/coc-bop_683d0eac1c99f1.32020579.pdf', '03.62.1849', 'N/A', 'Adm Asset'),
(275, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '138867', 'DOUBLE RAM', '7-1/16\"', '5000', 'SHAFFER', 'SPHERICAL LWS', 'RE-COC/REPAIR', 'JC-21-0007', '2025-03-15', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(276, '2025-06-10', 'WS VENDOR', 'VDHI TANGERANG', '02190140F', 'DOUBLE RAM', '13-5/8\"', '15000', 'RONGSHENG', '2FZ35-105', 'RE-COC/REPAIR', '062/DSI1220/2025-S0', '2023-05-01', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(277, '2025-06-10', 'WS VENDOR', 'VDHI TANGERANG', '01190064F', 'SINGLE RAM', '13-5/8\"', '15000', 'RONGSHENG', 'FZ35-105', 'RE-COC/REPAIR', '062/DSI1220/2025-S0', '2023-05-01', 'EXPIRED', '', '03.62.1912', 'N/A', 'Adm Asset'),
(278, '2025-06-10', 'WS VENDOR', 'VDHI TANGERANG', 'BAW-329', 'DOUBLE RAM-(SHEAR)', '18-3/4\"', '10000', 'WOM', 'WU', 'RE-COC/REPAIR', '062/DSI1220/2025-S0', '2021-07-01', 'EXPIRED', '', '03.62.1858', 'N/A', 'Adm Asset'),
(279, '2025-06-10', 'WS VENDOR', 'VDHI TANGERANG', 'BAW-316', 'SINGLE RAM', '18-3/4\"', '10000', 'WOM', 'WU', 'RE-COC/REPAIR', '062/DSI1220/2025-S0', '2021-07-01', 'EXPIRED', '', '03.62.1859', 'N/A', 'Adm Asset'),
(280, '2025-06-10', 'WS VENDOR', 'VDHI TANGERANG', 'BAW-325', 'ANNULAR', '18-3/4\"', '10000', 'WOM', 'GX', 'RE-COC/REPAIR', '062/DSI1220/2025-S0', '2021-08-01', 'EXPIRED', '', '03.62.1857', 'N/A', 'Adm Asset'),
(281, '2025-04-21', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-237', 'SINGLE RAM-(SHEAR)', '11\"', '10000', 'WOM', '', 'RE-COC/REPAIR', '062/DSI1220/2025-S0', '2020-11-01', 'EXPIRED', '', '03.62.1834', 'N/A', 'Adm Asset'),
(282, '2025-03-11', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-170', 'ANNULAR', '7-1/16\"', '10000', 'WOM', 'GK', 'RE-COC/REPAIR', 'JC-24-0045', '2028-09-19', 'VALID', 'file-coc/coc-bop_67cffc2d8bfa44.80795587.pdf', '03.62.1743', 'N/A', 'Adm Asset'),
(283, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-055', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'WU', 'RE-COC/REPAIR', 'JC-24-0003', '2028-01-17', 'VALID', 'file-coc/coc-bop_67d77eff890be5.24198264.pdf', '03.62.4880', 'N/A', 'Adm Asset'),
(284, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '440475-2', 'SINGLE RAM', '13-5/8\"', '5000', 'CAMERON', '', 'RE-COC/REPAIR', 'JC-21-0024', '2025-06-25', 'NEAR EXPIRED', '', '', 'N/A', 'Adm Asset'),
(285, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-327', 'DOUBLE RAM', '20-3/4\"', '3000', 'WOM', 'WU', 'RE-COC/REPAIR', 'JC-24-0057', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1861', 'N/A', 'Adm Asset'),
(286, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-328', 'SINGLE RAM-(SHEAR)', '20-3/4\"', '3000', 'WOM', 'WU', 'RE-COC/REPAIR', '', '2021-09-01', 'EXPIRED', '', '03.62.1862', 'N/A', 'Adm Asset'),
(287, '2025-06-04', 'JANARO', 'PDSI #42.3/N1500-E', 'BAW-204', 'ANNULAR', '29-1/2\"', '500', 'WOM', 'DIVERTER', 'ON SITE', 'JC-23-0028', '2027-10-24', 'VALID', 'file-coc/coc-bop_67e4b58bb0b386.85176626.pdf', '03.62.1805', 'N/A', 'Adm Asset'),
(288, '2025-03-17', 'SBS', 'WS BOP PML SBS', 'MOV-03620280', 'SINGLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'JC-22-0004', '2026-01-26', 'VALID', 'file-coc/coc-bop_67d7ad24b02c47.41332727.pdf', '03.62.0280-(1)', 'N/A', 'Adm Asset'),
(289, '2025-05-06', 'JANARO', 'PDSI #42.3/N1500-E', '152838-20', 'ANNULAR', '7-1/16\"', '10000', 'SHAFFER', 'SPHERICAL', 'ON SITE', '063/COC-FIT/XI/23', '2027-11-02', 'VALID', 'file-coc/coc-bop_67d3a0ab6ad0e0.18883868.pdf', '03.62.1788', 'N/A', 'Adm Asset'),
(290, '2025-03-17', 'SBS', 'WS BOP PML SBS', 'MOV-03621100', 'ANNULAR', '29-1/2\"', '500', 'HYDRILL', 'DIVERTER', 'RE-COC/REPAIR', '037/COC-FIT/X/22', '2026-10-12', 'VALID', 'file-coc/coc-bop_67d7967b558567.98280777.pdf', '03.62.1100', 'N/A', 'Adm Asset'),
(291, '2025-05-06', 'SBS', 'PDSI #39.3/D1500-E/57', 'BAW-161', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'WU', 'ON SITE', '068/COC-FIT/XI/23', '2027-11-17', 'VALID', 'file-coc/coc-bop_67d3ae58f28895.52761538.pdf', '', 'N/A', 'Adm Asset'),
(292, '2025-04-27', 'WS VENDOR', 'BENVORS GN PUTRI', 'MOV-0362765', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO BENVORS NO. SPK-361-22/585/UMB-PDSI/IV/21', '2025-04-08', 'EXPIRED', 'file-coc/coc-bop_67d27507862114.36328706.pdf', '03.62.765', 'N/A', 'Adm Asset'),
(293, '2025-06-09', 'SBS', 'PDSI #29.3/D1500-E/53', 'JK-22003', 'DOUBLE RAM', '13-5/8\"', '5000', 'WOM', 'U', 'ON SITE', '002/COC-FIT/II/23', '2027-02-25', 'VALID', 'file-coc/coc-bop_67d29c68475704.56396293.pdf', '', 'N/A', 'Adm Asset'),
(294, '2025-06-04', 'WS VENDOR', 'BENVORS GN PUTRI', 'SN-UNK-294', 'SINGLE RAM', '13-5/8\"', '10000', 'WOM', '', 'RE-COC/REPAIR', 'JC-20-0056', '2024-11-25', 'EXPIRED', '', '', 'N/A', 'Tomy'),
(295, '2025-04-23', 'OFF SHORE', 'PDSI #48.2/PD550-M', 'MOV-0362165', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'U', 'ON SITE', '058/COC-FIT/IV/24', '2028-04-06', 'VALID', 'file-coc/coc-bop_67d7a168888121.02272137.pdf', '03.62.165', 'N/A', 'Adm Asset'),
(296, '2025-06-02', 'SBS', 'WS BOP PML SBS', 'SK-21017', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'FH28-35', 'RE-COC/REPAIR', 'SK-21017', '2025-02-05', 'EXPIRED', 'file-coc/coc-bop_68147c54adcc90.02334015.pdf', '', '4500195625', 'Hendra W'),
(297, '2025-06-04', 'WS VENDOR', 'BENVORS GN PUTRI', 'SN-UNK-297', 'DOUBLE RAM', '13-5/8\"', '5000', 'CAMERON', 'U', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(298, '2025-05-06', 'SBS', 'PDSI #41.3/N110UE-E', 'W-152838-61', 'ANNULAR', '7-1/16\"', '10000', 'SHAFFER', 'SPHERICAL', 'ON SITE', 'JC-24-0043', '2028-09-19', 'VALID', 'file-coc/coc-bop_67f5d8b97eaae9.73924975.pdf', '03.62.1236', 'N/A', 'Adm Asset'),
(299, '2025-04-16', 'SBS', 'WS BOP PML SBS', 'W-3936', 'SINGLE RAM', '13-5/8\"', '10000', 'WOM', '', 'RE-COC/REPAIR', 'JC-24-0041', '2028-09-19', 'VALID', 'file-coc/coc-bop_67ff6bd0e461a7.15106178.pdf', '03.62.1113-(1)/03.62.11182', 'N/A', 'Adm Asset'),
(300, '2025-03-27', 'SBS', 'WS BOP PML SBS', 'BW-1019-2', 'SINGLE RAM', '21-1/4\"', '2000', 'WOM', 'U', 'RE-COC/REPAIR', 'JC-23-0027', '2027-10-24', 'VALID', 'file-coc/coc-bop_67e4b4e0148c28.36799673.pdf', '03.62.1119', 'N/A', 'Adm Asset'),
(301, '2025-06-04', 'SBS', 'PDSI #24.1/CWKT210-M', '20092', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-22-0016-(3)', '2026-04-28', 'VALID', '', '03.77.19/03.62.1080', 'N/A', 'Adm Asset'),
(302, '2025-03-14', 'SBS', 'WS BOP PML SBS', 'SN-UNK-302', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '016/COC-FIT/IV/23', '2027-04-06', 'VALID', 'file-coc/coc-bop_67d38497662677.63345118.pdf', '', 'N/A', 'Adm Asset'),
(303, '2025-06-04', 'WS VENDOR', 'JMS GN PUTRI', 'E-508700-2', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Tomy'),
(304, '2025-05-06', 'JANARO', 'PDSI #42.3/N1500-E', 'BAW-105', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', 'U', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(305, '2025-05-19', 'JAWA', 'YARD BONGAS', 'SN-UNK-305', 'SINGLE RAM', '11\"', '3000', 'CAMERON', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.050', 'N/A', 'Adm Asset'),
(306, '2025-05-09', 'JAWA', 'YARD BONGAS', 'SN-UNK-306', 'SINGLE RAM', '13-5/8\"', '5000', 'CAMERON', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.130', 'N/A', 'Adm Asset'),
(307, '2025-05-19', 'JAWA', 'YARD BONGAS', 'SN-UNK-307', 'SINGLE RAM', '13-5/8\"', '5000', 'SHAFFER', '', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(308, '2025-05-09', 'JAWA', 'YARD BONGAS', 'SN-UNK-308', 'SINGLE RAM', '13-5/8\"', '5000', 'CAMERON', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(309, '2025-05-19', 'JAWA', 'YARD BONGAS', 'SN-UNK-309', 'SINGLE RAM', '13-5/8\"', '5000', 'CAMERON', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.189', 'N/A', 'Adm Asset'),
(310, '2025-06-04', 'JAWA', 'YARD BONGAS', '4361', 'SINGLE RAM', '13-5/8\"', '5000', 'SHAFFER', '', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.0269-(1)', 'N/A', 'Adm Asset'),
(311, '2025-05-19', 'JAWA', 'YARD BONGAS', '58043', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.73.24', 'N/A', 'Adm Asset'),
(312, '2025-06-04', 'WS VENDOR', 'JMS GN PUTRI', 'R-120/05/21/UMB', 'DOUBLE RAM', '7-1/16\"', '3000', 'CAMERON', 'U', 'RE-COC/REPAIR', '552/UMB-PDSI/VI/19', '2023-06-27', 'EXPIRED', 'file-coc/coc-bop_67d27437f1aec8.13770967.pdf', '03.62.391', 'N/A', 'Tomy'),
(313, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', '32952L', 'ANNULAR', '16-3/4\"', '2000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.63.29', 'N/A', 'Adm Asset'),
(314, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-314', 'ANNULAR', '16-3/4\"', '2000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.38.09', 'N/A', 'Adm Asset'),
(315, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-315', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.07.30', 'N/A', 'Adm Asset'),
(316, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-316', 'ANNULAR', '13-5/8\"', '10000', 'SHAFFER', 'SPHERICAL', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.86.11', 'N/A', 'Adm Asset'),
(317, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-317', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', 'U', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(318, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-318', 'DOUBLE RAM', '11\"', '3000', 'HYDRILL', 'U', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(319, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-319', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(320, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-320', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'SPHERICAL', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(321, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-321', 'DOUBLE RAM', '11\"', '3000', 'SHAFFER', 'SPHERICAL LWS', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(322, '2025-03-09', 'JAWA', 'YARD KAPETAKAN', '654', 'SINGLE RAM', '16-3/4\"', '2000', 'CAMERON', 'U', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', NULL, '03.76.31', 'N/A', 'Adm Asset'),
(323, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-323', 'SINGLE RAM', '16-3/4\"', '2000', 'CAMERON', 'U', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.76.72', 'N/A', 'Adm Asset'),
(324, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-324', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(325, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-325', 'ANNULAR', '16-3/4\"', '2000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.61.27', 'N/A', 'Adm Asset'),
(326, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-326', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'SPHERICAL', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(327, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', '35150', 'ANNULAR', '16-3/4\"', '2000', 'HYDRILL', 'GK', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.76.90', 'N/A', 'Adm Asset'),
(328, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', '31815-(2)', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(329, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-329', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.761', 'N/A', 'Adm Asset'),
(330, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-330', 'ANNULAR', '13-5/8\"', '5000', 'SHAFFER', 'SPHERICAL', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.192', 'N/A', 'Adm Asset'),
(331, '2025-06-02', 'JANARO', 'YARD KENALI ASAM JAMBI', 'SN-UNK-331', 'ANNULAR', '6\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '13.58.28', 'N/A', 'Adm Asset'),
(332, '2025-06-02', 'JANARO', 'YARD KENALI ASAM JAMBI', 'B949-5/7', 'DOUBLE RAM', '6\"', '3000', 'HYDRILL', '', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(381, '2025-04-16', 'WS VENDOR', 'BENVORS GN PUTRI', '1215213390001', 'ANNULAR', '13-5/8\"', '3000', 'CAMERON', 'T-90 SPHERICAL', 'RE-COC/REPAIR', 'WO BENVORS NO. SPK-361-19', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2004', 'N/A', 'Adm Asset'),
(382, '2025-03-17', 'OFF SHORE', 'PDSI #47.2/PD550-M', '1215506130001', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', '', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2005', 'N/A', 'Adm Asset'),
(383, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '1215592830001', 'ANNULAR', '11\"', '3000', 'CAMERON', 'T-90 SPHERICAL', 'RE-COC/REPAIR', '', '2024-08-01', 'EXPIRED', '', '03.62.2006', 'N/A', 'Adm Asset'),
(384, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '1215591390001', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', 'U', 'RE-COC/REPAIR', '', '2024-08-01', 'EXPIRED', '', '03.62.2007', 'N/A', 'Adm Asset'),
(385, '2025-03-17', 'OFF SHORE', 'PDSI #48.2/PD550-M', '1215592840001', 'ANNULAR', '11\"', '3000', 'CAMERON', '', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2014', 'N/A', 'Adm Asset'),
(386, '2025-03-17', 'OFF SHORE', 'PDSI #48.2/PD550-M', '1215567780001', 'DOUBLE RAM', '11\"', '3000', 'CAMERON', '', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2015', 'N/A', 'Adm Asset'),
(387, '2025-03-17', 'OFF SHORE', 'PDSI #48.2/PD550-M', 'SN-UNK-332', 'ANNULAR', '13-5/8\"', '3000', 'CAMERON', '', 'ON SITE', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2012', 'N/A', 'Adm Asset'),
(388, '2025-04-08', 'WS VENDOR', 'BENVORS GN PUTRI', '1215591400001', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', 'U', 'RE-COC/REPAIR', 'WO BENVORS NO. SPK-361-20', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.2013', 'N/A', 'Adm Asset'),
(389, '2025-03-17', 'JAWA', 'SUNTER', 'SN-UNK-333', 'DOUBLE RAM', '11\"', '3000', 'SHAFFER', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(390, '2025-04-15', 'WS VENDOR', 'REGIAN BALIKPAPAN', 'SN-UNK-334', 'ANNULAR', '11\"', '10000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(396, '2025-06-02', 'WS VENDOR', 'BENVORS GN PUTRI', 'BAW-102', 'DOUBLE RAM', '13-5/8\"', '10000', 'WOM', '', 'RE-COC/REPAIR', 'WO BENVORS NO. SPK-361-23/JC-21-0020', '2025-05-07', 'EXPIRED', '', '03.62.1232', 'N/A', 'Adm Asset'),
(397, '2025-05-09', 'JAWA', 'PDSI #55.2/XJ550-M', 'SK-24887', 'ANNULAR', '7-1/16\"', '5000', 'SHENKAI', 'FH18-35', 'ON SITE', 'SK-24887', '2028-12-31', 'VALID', '', '03.62.2221', 'N/A', 'Adm Asset'),
(399, '2025-05-09', 'JAWA', 'PDSI #56.2/XJ550-M', 'SK-24888', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'FH28-35', 'ON SITE', 'SK-24888', '2028-12-31', 'VALID', '', '03.62.2202', 'N/A', 'Adm Asset'),
(418, '2025-05-06', 'WS VENDOR', 'JMS BALIKPAPAN', '156878-01', 'ANNULAR', '13-5/8\"', '10000', 'SHAFFER', 'MSP', 'RE-COC/REPAIR', 'WO JMS BPP NO. JK-25008', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.1683', 'N/A', 'Adm Asset'),
(419, '2025-06-09', 'JANARO', 'PDSI #54.2/ZJ750-M', '120952', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', '', 'ON SITE', 'JC-22-0001', '2026-01-05', 'VALID', 'file-coc/coc-bop_6819bcd9159fe7.25814925.pdf', '03.62.033', 'N/A', 'Adm Asset'),
(420, '2025-05-19', 'JAWA', 'PDSI #56.2/XJ550-M', 'SK-25025', 'DOUBLE RAM', '7-1/16\"', '5000', 'SHENKAI', '2FZ18-35', 'ON SITE', 'SK-25025', '2028-12-31', 'VALID', '', '03.62.2204', 'N/A', 'Adm Asset'),
(421, '2025-05-09', 'JAWA', 'PDSI #55.2/XJ550-M', 'SK-25024', 'ANNULAR', '11\"', '5000', 'SHENKAI', 'FH28-35', 'ON SITE', 'SK-25024', '2028-12-31', 'VALID', '', '03.62.2192', 'N/A', 'Adm Asset'),
(422, '2025-05-19', 'JAWA', 'PDSI #55.2/XJ550-M', 'SK-25026', 'DOUBLE RAM', '7-1/16\"', '5000', 'SHENKAI', '2FZ18-35', 'ON SITE', 'SK-25026', '2028-12-31', 'VALID', '', '03.62.2194', 'N/A', 'Adm Asset'),
(423, '2025-05-09', 'JAWA', 'PDSI #56.2/XJ550-M', 'SK-24889', 'ANNULAR', '7-1/16\"', '5000', 'SHENKAI', 'FH18-35', 'ON SITE', 'SK-24889', '2028-12-31', 'VALID', '', '03.62.2222', 'N/A', 'Adm Asset'),
(426, '2025-05-19', 'JAWA', 'YARD BONGAS', 'SN-UNK-335', 'SINGLE RAM', '13-5/8\"', '5000', 'CAMERON', '', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(427, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', '32552L', 'ANNULAR', '16-3/4\"', '2000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(428, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', 'SN-UNK-336', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.96.26', 'N/A', 'Adm Asset'),
(429, '2025-05-19', 'JAWA', 'YARD KAPETAKAN', '30729L', 'ANNULAR', '13-5/8\"', '3000', 'HYDRILL', 'GK', 'OUT OF SERVICE', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(430, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '20088297-1', 'ANNULAR', '21-1/4\"', '2000', 'SHAFFER', 'SPHERICAL', 'RE-COC/REPAIR', 'DNT-19-005', '2023-05-20', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(431, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'F-37370-(2)', 'ANNULAR', '21-1/4\"', '2000', 'HYDRILL', 'MSP', 'RE-COC/REPAIR', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.83.12', 'N/A', 'Adm Asset'),
(432, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-337', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.74.70', 'N/A', 'Adm Asset'),
(433, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '31400L', 'ANNULAR', '11\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-19-0007', '2023-02-12', 'EXPIRED', '', '03.38.99', 'N/A', 'Adm Asset'),
(434, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '3400L/10837', 'ANNULAR', '11\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-20-0057', '2024-11-25', 'EXPIRED', '', '60.15.1000', 'N/A', 'Adm Asset'),
(435, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '31400/10105', 'ANNULAR', '11\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JC-19-0041', '2023-12-11', 'EXPIRED', '', '03.39.06', 'N/A', 'Adm Asset'),
(436, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '31815-(1)', 'ANNULAR', '11\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(437, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '132841', 'ANNULAR', '7-1/16\"', '10000', 'SHAFFER', 'SPHERICAL', 'RE-COC/REPAIR', 'JC-18-0202', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(438, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '152838-38', 'ANNULAR', '7-1/16\"', '10000', 'SHAFFER', 'SPHERICAL', 'RE-COC/REPAIR', 'JC-18-0018', '2022-07-11', 'EXPIRED', '', '03.62.8851', 'N/A', 'Adm Asset'),
(439, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '1104004', 'SINGLE RAM', '7-1/16\"', '10000', 'CAMERON', '', 'RE-COC/REPAIR', '00617/COC/SSE-VDHI/VI/2012', '2016-06-22', 'EXPIRED', '', '03.62.250', 'N/A', 'Adm Asset'),
(440, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', '1104005', 'SINGLE RAM', '7-1/16\"', '10000', 'CAMERON', '', 'RE-COC/REPAIR', '00617/COC/SSE-VDHI/VI/2012', '2016-06-22', 'EXPIRED', '', '03.62.251', 'N/A', 'Adm Asset'),
(441, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-338', 'DOUBLE RAM', '7-1/16\"', '10000', 'WOM', '', 'RE-COC/REPAIR', '529/UMB-PDSI/XII/18', '2022-12-28', 'EXPIRED', '', '03.27.86', 'N/A', 'Adm Asset'),
(442, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-339', 'SINGLE RAM', '11\"', '3000', 'CAMERON', '', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.76.14', 'N/A', 'Adm Asset'),
(443, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-340', 'SINGLE RAM', '11\"', '3000', 'CAMERON', '', 'RE-COC/REPAIR', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.14.53', 'N/A', 'Adm Asset'),
(444, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-341', 'DOUBLE RAM', '11\"', '10000', 'CAMERON', '', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.506', 'N/A', 'Adm Asset'),
(445, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-342', 'SINGLE RAM', '13-5/8\"', '3000', 'CAMERON', '', 'RE-COC/REPAIR', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '03.62.05', 'N/A', 'Adm Asset'),
(446, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-343', 'DOUBLE RAM', '13-5/8\"', '3000', 'CAMERON', '', 'RE-COC/REPAIR', '536/UMB-PDSI/II/19', '2023-03-13', 'EXPIRED', '', '03.62.0469', 'N/A', 'Adm Asset'),
(447, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'BAW-063-1', 'DOUBLE RAM', '21-1/4\"', '2000', 'WOM', '', 'RE-COC/REPAIR', '', '2015-01-12', 'EXPIRED', '', '03.62.1142', 'N/A', 'Adm Asset'),
(448, '2025-05-19', 'JAWA', 'WS BOP MUNDU JAWA', 'SN-UNK-344', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', 'JUNK', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(449, '2025-05-20', 'JAWA', 'WS BOP MUNDU JAWA', '1002020-(2)', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(450, '2025-05-20', 'JAWA', 'WS BOP MUNDU JAWA', '30663L', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(451, '2025-05-20', 'JAWA', 'WS BOP MUNDU JAWA', '31600L', 'ANNULAR', '7-1/16\"', '3000', 'HYDRILL', 'GK', 'RE-COC/REPAIR', '', '0000-00-00', 'COC DATE UNKNOW', '', '', 'N/A', 'Adm Asset'),
(454, '2025-05-26', 'JAWA', 'PDSI #09.2/N80UE-E', 'SN-UNK-345', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-24-0058', '2029-01-24', 'VALID', 'file-coc/coc-bop_6833db2fe6a275.78543989.pdf', '03.62.213', '4650017960', 'Adm Asset'),
(469, '2025-06-04', 'SBS', 'PDSI #30.2/D1000-E', 'SN-UNK-346', 'ANNULAR', '13-5/8\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-23-0031', '2027-11-22', 'VALID', 'file-coc/coc-bop_683facc795ab48.13869163.pdf', '03.62.1202', 'N/A', 'Adm Asset'),
(470, '2025-06-04', 'SBS', 'PDSI #16.2/NT45-M', 'SN-UNK-347', 'ANNULAR', '7-1/16\"', '5000', 'HYDRILL', 'GK', 'ON SITE', 'JC-20-0027', '2024-07-13', 'EXPIRED', '', '', 'N/A', 'Adm Asset'),
(471, '2025-06-04', 'SBS', 'PDSI #16.2/NT45-M', 'R-0960918', 'DOUBLE RAM', '7-1/16\"', '5000', 'CAMERON', '', 'ON SITE', 'JC-20-0001', '2025-02-09', 'EXPIRED', '', '03.62.0269-(2)', 'N/A', 'Adm Asset');

--
-- Triggers `tb_dbhasilbop`
--
DELIMITER $$
CREATE TRIGGER `update_status_coc` BEFORE INSERT ON `tb_dbhasilbop` FOR EACH ROW BEGIN
    IF NEW.akhir_coc IS NULL OR NEW.akhir_coc = '' THEN
        SET NEW.status_coc = 'COC DATE UNKNOW';
    ELSEIF NEW.akhir_coc < CURDATE() THEN
        SET NEW.status_coc = 'EXPIRED';
    ELSEIF NEW.akhir_coc BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 6 MONTH) THEN
        SET NEW.status_coc = 'NEAR EXPIRED';
    ELSE
        SET NEW.status_coc = 'VALID';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_coc_on_insert` BEFORE INSERT ON `tb_dbhasilbop` FOR EACH ROW BEGIN
    -- Status COC logic
    IF NEW.akhir_coc IS NULL OR NEW.akhir_coc = '' THEN
        SET NEW.status_coc = 'COC DATE UNKNOW';
    ELSEIF NEW.akhir_coc < CURDATE() THEN
        SET NEW.status_coc = 'EXPIRED';
    ELSEIF NEW.akhir_coc BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 6 MONTH) THEN
        SET NEW.status_coc = 'NEAR EXPIRED';
    ELSE
        SET NEW.status_coc = 'VALID';
    END IF;

    -- Status Unit logic
    IF NEW.rig_yard LIKE 'PDSI%' THEN
        SET NEW.status_unit = 'ON SITE';
    ELSEIF 
        NEW.rig_yard LIKE 'BENVORS%' OR
        NEW.rig_yard LIKE 'JMS%' OR
        NEW.rig_yard LIKE 'REGIAN%' OR
        NEW.rig_yard LIKE 'FUJI%' OR
        NEW.rig_yard LIKE 'VDHI%' OR
        NEW.rig_yard LIKE '%BOP%' THEN
        SET NEW.status_unit = 'RE-COC/REPAIR';
    ELSE
        SET NEW.status_unit = 'OUT OF SERVICE';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_coc_on_update` BEFORE UPDATE ON `tb_dbhasilbop` FOR EACH ROW BEGIN
    -- Status COC logic
    IF NEW.akhir_coc IS NULL OR NEW.akhir_coc = '' THEN
        SET NEW.status_coc = 'COC DATE UNKNOW';
    ELSEIF NEW.akhir_coc < CURDATE() THEN
        SET NEW.status_coc = 'EXPIRED';
    ELSEIF NEW.akhir_coc BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 6 MONTH) THEN
        SET NEW.status_coc = 'NEAR EXPIRED';
    ELSE
        SET NEW.status_coc = 'VALID';
    END IF;

    -- Status Unit logic
    IF NEW.rig_yard LIKE 'PDSI%' THEN
        SET NEW.status_unit = 'ON SITE';
    ELSEIF 
        NEW.rig_yard LIKE 'BENVORS%' OR
        NEW.rig_yard LIKE 'JMS%' OR
        NEW.rig_yard LIKE 'REGIAN%' OR
        NEW.rig_yard LIKE 'FUJI%' OR
        NEW.rig_yard LIKE 'VDHI%' OR
        NEW.rig_yard LIKE '%BOP%' THEN
        SET NEW.status_unit = 'RE-COC/REPAIR';
    ELSE
        SET NEW.status_unit = 'OUT OF SERVICE';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dbhoursbop`
--

CREATE TABLE `tb_dbhoursbop` (
  `id_hours_bop` int(15) NOT NULL,
  `sn_bop` varchar(255) NOT NULL,
  `jenis_bop` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `pressure` varchar(255) DEFAULT NULL,
  `man` varchar(255) DEFAULT NULL,
  `no_coc` varchar(255) DEFAULT NULL,
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
-- Indexes for table `tb_dbbahanbop`
--
ALTER TABLE `tb_dbbahanbop`
  ADD PRIMARY KEY (`id_bop`);

--
-- Indexes for table `tb_dbdelbop`
--
ALTER TABLE `tb_dbdelbop`
  ADD PRIMARY KEY (`id_del_bop`);

--
-- Indexes for table `tb_dbeditbop`
--
ALTER TABLE `tb_dbeditbop`
  ADD PRIMARY KEY (`id_edit_bop`);

--
-- Indexes for table `tb_dbhasilbop`
--
ALTER TABLE `tb_dbhasilbop`
  ADD PRIMARY KEY (`id_bop`);

--
-- Indexes for table `tb_dbhoursbop`
--
ALTER TABLE `tb_dbhoursbop`
  ADD PRIMARY KEY (`id_hours_bop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dbdelbop`
--
ALTER TABLE `tb_dbdelbop`
  MODIFY `id_del_bop` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_dbeditbop`
--
ALTER TABLE `tb_dbeditbop`
  MODIFY `id_edit_bop` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- AUTO_INCREMENT for table `tb_dbhasilbop`
--
ALTER TABLE `tb_dbhasilbop`
  MODIFY `id_bop` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `tb_dbhoursbop`
--
ALTER TABLE `tb_dbhoursbop`
  MODIFY `id_hours_bop` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
