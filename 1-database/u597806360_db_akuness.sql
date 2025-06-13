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
-- Database: `u597806360_db_akuness`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akuness`
--

CREATE TABLE `tb_akuness` (
  `id_akun` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `status_akun` varchar(255) NOT NULL,
  `is_online` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `last_active` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_akuness`
--

INSERT INTO `tb_akuness` (`id_akun`, `email`, `username`, `password`, `user_role`, `status_akun`, `is_online`, `last_login`, `last_logout`, `last_active`) VALUES
(1, 'adm.pdsiasset@pertamina.com', 'Adm Asset', '$2y$10$h/tgSz1B1KnLGbm6UpcnuOQvCL1roDyCxq9dSWyleUqaqOWVdcesK', 'admin', 'ACTIVE', 0, '2025-06-13 00:58:19', '2025-06-13 00:59:07', '2025-06-13 00:58:50'),
(2, 'evin.adi@pertamina.com', 'Evin A', '$2y$10$RNwcbUg3tt.67OjLh3RlUulXCcuhSgTwXGZrg8iOHlodKSyL/oueG', 'admin', 'ACTIVE', 0, '2025-06-13 08:23:23', '2025-06-13 09:02:48', '2025-06-13 09:02:30'),
(29, 'zulkarnaini1@pertamina.com', 'Zulkarnaini', '$2y$10$4NR8r6wxFduJMBQb5qiuM.LaUnuNNK6A.Npdlt0SF67rZOqP0LL/y', 'asset', 'ACTIVE', 1, '2025-06-12 11:27:59', '2025-06-11 16:31:37', '2025-06-11 16:21:37'),
(30, 'tomy@pertamina.com', 'Tomy', '$2y$10$tCBWVyG6aNFPDOZiYeFuNeWAKELKOjd/NMb9b66Imff2a.Tdmh2g2', 'asset', 'ACTIVE', 0, '2025-06-12 18:50:23', '2025-06-12 18:54:12', '2025-06-12 18:53:58'),
(31, 'firman2@pertamina.com', 'Firman', '$2y$10$gZgCeDvSlNYhJkq1r3kcYOp.Mt8pH7gz.WFOKrOORrvGLeoR8q.F2', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(32, 'dadang.suharsono@pertamina.com', 'Dadang S', '$2y$10$m43jVnohtoCc8WQCITJJE.H6/bT00.G6BDCS2qf0OUUG4fUc/Cvfu', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(33, 'hendrawijayapbm12@gmail.com', 'Hendra W', '$2y$10$jYBPs3l0akp7RG33quS/NuyQehAwNneA3uoxbOqZDVj5a16mPmrd.', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(34, 'ess_pdsi01@guest.com', 'Guest 01', '$2y$10$GGl4rRs14.GJwr/32S7pQulgLvQS2Ejx9N5d5iForM2cWWCHTSPwy', 'guest', 'DISABLED', 0, '2025-06-12 07:27:40', '2025-06-12 07:30:39', '2025-06-12 07:30:36'),
(35, 'ess_pdsi02@guest.com', 'Guest 02', '$2y$10$H/qHu8YZbdpASY9bfk66ouVx0k0aOM5rC0LcmCXvRxE0ZR6KUCoF.', 'guest', 'DISABLED', 0, NULL, NULL, NULL),
(36, 'ess_pdsi03@guest.com', 'Guest 03', '$2y$10$xLDUaRhatxxPSTTEWsM4teBj36BiZhlLWW8slcR9UkgcCj7qFKey.', 'guest', 'DISABLED', 0, NULL, NULL, NULL),
(37, 'aditya.firmansyah@pertamina.com', 'Aditya F', '$2y$10$ZCWM7aeP81vBwx0uMYNjNeC78JWJxA2jEfsKq1tX.aJns35PxnoEu', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(38, 'sonny.wicaksono@pertamina.com', 'Sonny W', '$2y$10$r4K/3Zvj5qrIWj2jZDp8fO1Zzybjv1ZxScRwNzZ58tONJkC3hjMcS', 'admin', 'ACTIVE', 0, '2025-06-11 15:39:36', '2025-06-11 15:47:44', '2025-06-11 15:47:02'),
(39, 'mk.hayckal.y@pertamina.com', 'Hayckal Y', '$2y$10$lPfYanZcH5xFeK5noS61iefqeaSZJlQjBOdNiI8oCk6Nj38WnMJ8q', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(40, 'mk.syamsul.hidayat2@mitrakerja.pertamina.com', 'Syamsul H', '$2y$10$7Mj25tXWC6udW3EdNKoqT.2M9piydl/Z/PLxP.QBnoqNWzIuOhgxK', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(41, 'mk.farrel.sinatria@mitrakerja.pertamina.com', 'Farrel S', '$2y$10$G4isEIdz15X6FJ7p4ShIReRM140.tol8MQpL8gwNPxt9Oen4z.tey', 'asset', 'ACTIVE', 0, '2025-06-11 16:56:13', '2025-06-11 17:00:04', '2025-06-11 16:59:55'),
(42, 'mk.gizta.trijulia@mitrakerja.pertamina.com', 'Gizta T', '$2y$10$Rh6d3cDdr85kQrrkqHYPW.HeGFMeGbMb4AH00mlW8dL7wzXbXN6Fy', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(43, 'mk.citra.fitriani@mitrakerja.pertamina.com', 'Citra F', '$2y$10$mnGz7r5MNEQAsKPO6qbs/.R/2eegS4rd.r7ozQZ.MlMDd/PB8y3KK', 'asset', 'ACTIVE', 0, NULL, NULL, NULL),
(44, 'mk.hendri.ahmadi@mitrakerja.pertamina.com', 'Hendri A', '$2y$10$KZCMxSHiyuO1jR5BjhMb1udyt0cV4i9jzbfGkPrMOGADLd1R8hHYq', 'maintenance', 'ACTIVE', 0, NULL, NULL, NULL),
(45, 'mk.khafid.nasser@mitrakerja.pertamina.com', 'Khafid N', '$2y$10$uSdhsmxkXF6aO8EIVNwMrOmRW1K7qJOBvEytMcz8/db2NCRL1YEzy', 'maintenance', 'ACTIVE', 0, NULL, NULL, NULL),
(46, 'teguh.laksono@pertamina.com', 'Teguh L', '$2y$10$.NkWeNmM3k.krUKpziY0..HiB54Q.ezxJi1vTDJLNXi/H6qWHDbF2', 'maintenance', 'ACTIVE', 0, NULL, NULL, NULL),
(49, 'mk.purwanto5@mitrakerja.pertamina.com', 'Purwanto', '$2y$10$JegDJ.5Vd1cxlK7.XpyBMOM5nnouXqVI4XYD8CvZcPL5aURlR.S/2', 'guest', 'ACTIVE', 0, NULL, NULL, NULL),
(51, 'slamet.nurhadi@pertamina.com', 'Slamet N', '$2y$10$PO2Kh49EtVKCsQioW/oxYuZT5eEBMcZ7Zofb6pNEULguTpplHcILW', 'maintenance', 'ACTIVE', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akuness`
--
ALTER TABLE `tb_akuness`
  ADD PRIMARY KEY (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akuness`
--
ALTER TABLE `tb_akuness`
  MODIFY `id_akun` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
