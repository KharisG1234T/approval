-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table approval.area
CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_area`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.area: ~5 rows (approximately)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`id_area`, `area`) VALUES
	(1, 'Semarang'),
	(2, 'Jakarta'),
	(3, 'Bali'),
	(4, 'Yogyakarta'),
	(7, 'Kalimantan');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;

-- Dumping structure for table approval.barangpeminjaman
CREATE TABLE IF NOT EXISTS `barangpeminjaman` (
  `id_bp` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `qty` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `stok_po` varchar(10) NOT NULL,
  `maks_delivery` date NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  PRIMARY KEY (`id_bp`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.barangpeminjaman: ~22 rows (approximately)
/*!40000 ALTER TABLE `barangpeminjaman` DISABLE KEYS */;
INSERT INTO `barangpeminjaman` (`id_bp`, `sku`, `nama`, `qty`, `harga`, `jumlah`, `stok_po`, `maks_delivery`, `id_peminjaman`) VALUES
	(26, 'aqwsqs', 'Sampel', 34, 6000, 204000, 'po', '2023-04-19', 16),
	(30, '', 'Sampel', 5, 45454, 227270, '', '2023-04-25', 20),
	(31, '', 'Cilok', 13, 3433, 44633472, '', '2023-05-13', 21),
	(32, '', 'Sampel', 9, 3433, 30900096, '', '2023-05-13', 22),
	(34, '', 'Sampel', 9, 3, 30900096, '', '2023-05-13', 22),
	(35, '', 'Tester', 23, 45, 1042889, '', '2023-05-13', 22),
	(50, '', 'Sampel', 12, 0, 119988, '', '2023-04-18', 17),
	(51, '', 'Tester', 12, 0, 94536, '', '2023-04-18', 17),
	(63, '', 'Sampel', 6, 2323, 13938, '', '2023-04-18', 19),
	(64, '', 'Tester', 6, 23534, 141204, '', '2023-05-13', 19),
	(65, '', 'test', 2, 5343, 10686, '', '2023-05-13', 19),
	(72, '', 'Sampel', 50, 80000, 4000000, '', '2023-04-22', 18),
	(73, '', 'motor', 1, 500000, 500000, '', '2023-06-27', 18),
	(74, '', 'mobil', 1, 1500000, 1500000, '', '2023-06-13', 18),
	(75, '', 'snack', 50, 10000, 500000, '', '2023-06-27', 18),
	(76, '', 'laptop', 15, 250000, 3750000, '', '2023-06-12', 18),
	(77, '', 'apapun lah bo', 1000, 1000000, 1000000000, '', '2023-06-20', 18),
	(78, '', 'newww', 21, 5000, 105000, '', '2023-06-14', 18),
	(79, '', 'access point', 5, 15000, 75000, '', '2023-06-22', 18),
	(80, '', 'lancard', 200, 500, 100000, '', '2023-07-04', 18),
	(81, '', 'tang crimping', 3, 5000, 15000, '', '2023-06-14', 18),
	(82, '', 'lan tester', 5, 1000, 5000, '', '2023-06-27', 18);
/*!40000 ALTER TABLE `barangpeminjaman` ENABLE KEYS */;

-- Dumping structure for table approval.cabang
CREATE TABLE IF NOT EXISTS `cabang` (
  `id_cabang` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_area` int(11) NOT NULL,
  `nama_cabang` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.cabang: ~5 rows (approximately)
/*!40000 ALTER TABLE `cabang` DISABLE KEYS */;
INSERT INTO `cabang` (`id_cabang`, `id_area`, `nama_cabang`) VALUES
	(5, 1, 'CV Solusi Arya Prima'),
	(6, 3, 'KCP Bali'),
	(7, 2, 'KCP Jakarta'),
	(9, 4, 'KCP Yogyakarta'),
	(10, 7, 'KCP Kalimantan');
/*!40000 ALTER TABLE `cabang` ENABLE KEYS */;

-- Dumping structure for table approval.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(15) NOT NULL,
  `id_cabang` int(15) NOT NULL,
  `from` int(15) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `number` varchar(50) NOT NULL DEFAULT '',
  `closingdate` date NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` enum('PENDING','PROCESS','SUCCESS','REJECTED') NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.peminjaman: ~7 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_cabang`, `from`, `date`, `number`, `closingdate`, `note`, `status`) VALUES
	(16, 29, 5, 1, '2023-04-17', '04/PB/X/23', '2023-04-20', 'Urgent', 'PROCESS'),
	(17, 41, 5, 2, '2023-04-17', '04/PB/X/23', '2023-04-21', 'Test', 'PENDING'),
	(18, 42, 5, 3, '2023-04-17', '04/PB/X/23', '2023-04-25', 'Test aja', 'PENDING'),
	(19, 43, 5, 4, '2023-04-17', '04/PB/X/23', '2023-04-27', 'Test', 'PENDING'),
	(20, 44, 5, 7, '2023-04-17', '04/PB/X/23', '2023-04-26', 'Test aja', 'PENDING'),
	(21, 0, 5, 3, '2023-05-12', '05/PB/X/23', '2023-05-14', 'Urgent', 'PENDING'),
	(22, 41, 5, 2, '2023-05-12', '05/PB/X/23', '2023-05-14', 'Urgent', 'PENDING');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table approval.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `ttd` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user: ~19 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `ttd`) VALUES
	(27, 'Administrator', 'admin@mail.com', 'LOGO_IT_SAP.png', '$2y$10$.9Jgo7HSNyrg9nCJVv5uh.EpgVulkqzZDnG3gBXc5ypSKCd1pViim', 1, 1, 1599504982, 'e07a27085942ea3a2c6e8e7e639d0a98.jpg'),
	(29, 'Sales 1', 'web1.hitechcomputer@gmail.com', 'download.png', '$2y$10$6vmR.Ia65RJvidhIEKWOVuhE.igclGpTWkTko9SVy3fQe9DSiHbBy', 2, 1, 1678265073, '0b4eb3ba9175ff11b1a0a433319043e6.png'),
	(31, 'PM 1', 'pm@premmiere.co.id', 'default.jpg', '$2y$10$q59RcJszxu.UFselb.qtnuFdx4xnM7l/piZ/117kXN9sj/TS0S2kG', 3, 1, 1679990629, '6b6f5ada97fea1bd2b1c8351a5681a5e.jpg'),
	(32, 'Koordinator Sales', 'koorsales@premmiere.co.id', 'default.jpg', '$2y$10$nAk01O.3lY8E2e0qjhWS.u3lS45RwVGlUv3E6/xltnqTJ/0Iw6HRa', 4, 1, 1679990764, 'fa54676d64ae335a81fec1bb5837dce7.jpg'),
	(33, 'Head Region Sales', 'headregion@premmiere.co.id', 'default.jpg', '$2y$10$OoDPvjOJF1SBN9.kG3D9guUkatoV4eECL8qP5olB.yuLJgYDakSzi', 5, 1, 1679990811, 'bedd87c58c97f0de10df6776df76affd.jpg'),
	(34, 'Manager Sales', 'mansales@premmiere.co.id', 'default.jpg', '$2y$10$3V2QkUPT9YTz/o/nqBBlRuWNz2upVkaG.pwZjFejBvfoyfz.KDOKy', 6, 1, 1679990856, '9108a86cfe2e35d9cd26b39b627342c7.png'),
	(35, 'Manager Operasional', 'manops@premmiere.co.id', 'default.jpg', '$2y$10$XLdx3fdOGVsYgffVuEidtezPJhH.9Mw31rchlEEvO0fnLYKqtK.Ei', 7, 1, 1679990893, '9b1a58f03776a98c24002e88d3c16237.png'),
	(36, 'PM Manager', 'pmman@premmiere.co.id', 'default.jpg', '$2y$10$QKj03I5coe.1YEl0L0v7Du4uPfxVBBxnOEwlkoOzwopdjwqMrxHxK', 8, 1, 1680077137, '76a6173f4f290cb1af2d3ef51aa96cfa.jpg'),
	(37, 'PM 2', 'pm2@premmiere.co.id', 'default.jpg', '$2y$10$rIpyUzSPz4p3BH2QPOkVEe7QF75sYA2AXPGf5uRq9FMVlByMAkrby', 3, 1, 1681358785, '68faf45e8289d1f253be8946d1a5f501.jpg'),
	(38, 'PM 3', 'pm3@premmiere.co.id', 'default.jpg', '$2y$10$E3FUnusehOU62XGYthW05.zzcBNbiRFtvSTh25xor28PphNQyS0eO', 3, 1, 1681359093, '289e22f8679f2a919c1c4277c9ae72fb.jpg'),
	(39, 'PM 4', 'pm4@premmiere.co.id', 'default.jpg', '$2y$10$9scRB1hvdS9zTjJc/oajOOdM7LqZs2Rm7zCknvpEafPZKeHm9SSKK', 3, 1, 1681359335, 'bf07d6d7666e1ea6b5c9e7516486f1e2.jpg'),
	(40, 'PM 5', 'pm5@premmiere.co.id', 'default.jpg', '$2y$10$ks4EqRUqK9j8OWmbFNHEO.IP5GyCZiMtI8oxr8TpO5lmH9NpPq.kG', 3, 1, 1681361259, 'edf1c8a1e110b7d2e82e7dd83207f243.jpg'),
	(41, 'Sales 2', 'sales2@premmiere.co.id', 'default.jpg', '$2y$10$qmFORO0kz800vnOyOvS5wewrVPcfjmRuK2OfyQrMMclTD1tCLKRIS', 2, 1, 1681361397, '55dac1c9bc8ef96d303d921fc98ab949.png'),
	(42, 'Sales 3', 'sales3@premmiere.co.id', 'default.jpg', '$2y$10$jlbvz2gxTAQadAdW.SoxCemCNJEU4yt1eSKlU34iwaljIKV7TIygi', 2, 1, 1681361427, '7f7c2e0ad596b7efdd76577d31ef7ecd.png'),
	(43, 'Sales 4', 'sales4@premmiere.co.id', 'default.jpg', '$2y$10$1NTEzOW4gVBOd6Lz.BaaFukSPrhWAWqYJ.gipZIQcRMs6cx5k8QAe', 2, 1, 1681361456, '7ac7128dc93529b7bc15b9d00cf5be86.png'),
	(44, 'Sales 5', 'sales5@premmiere.co.id', 'default.jpg', '$2y$10$Rk0bhJEWcDAOjc7nGAvC3.PK.Z5B6BoANJTVx0yIaCuxNorIbuFDW', 2, 1, 1681361587, 'e71069f6a9904d870b7431ae1f731e07.png'),
	(45, 'Koordinator Sales 2', 'koorsales2@premmiere.co.id', 'default.jpg', '$2y$10$8QdEy5ctAl/AjUftibeaS.ibztoNsgTVSNOReH820bmzzKoQCc3SG', 4, 1, 1681715097, '0bba07cd9a8c622210e56c7c62077a28.jpg'),
	(46, 'Koordinator Sales 3', 'koorsales3@premmiere.co.id', 'default.jpg', '$2y$10$s0qymVsROLFPrQMEKlyxaetGTgG40rT5EkjRflwhmhku33uEHBc.q', 4, 1, 1681715138, '7b8598965bad2798ed9910e3bd97627e.jpg'),
	(47, 'Koordinator Sales 4', 'koorsales4@premmiere.co.id', 'default.jpg', '$2y$10$CokZ.BrWPKqHc8jVU4iRSekEqIheBnvnrBFcvS6tlbQGQk.U4FxKG', 4, 1, 1681715169, '29350fac0beed19eabe3b4e048bde693.jpg'),
	(48, 'Koordinator Sales 5', 'koorsales5@premmiere.co.id', 'default.jpg', '$2y$10$mLcPMEaO2d6ufUDPTPslIe6nlXufIW9bKopOjPy1eHb1wW5AtuQX6', 4, 1, 1681715256, '9d9c31f45497ff2b2f3e8ce252aa5ad3.jpg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table approval.userapproval
CREATE TABLE IF NOT EXISTS `userapproval` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdat` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.userapproval: ~8 rows (approximately)
/*!40000 ALTER TABLE `userapproval` DISABLE KEYS */;
INSERT INTO `userapproval` (`id`, `id_peminjaman`, `id_user`, `createdat`, `status`) VALUES
	(12, 16, 29, '2023-04-17', ''),
	(13, 17, 41, '2023-04-17', ''),
	(14, 18, 42, '2023-04-17', ''),
	(15, 19, 43, '2023-04-17', ''),
	(16, 20, 44, '2023-04-17', ''),
	(19, 16, 36, '2023-04-17', 'APPROVE'),
	(20, 21, 27, '2023-05-12', ''),
	(21, 22, 41, '2023-05-12', '');
/*!40000 ALTER TABLE `userapproval` ENABLE KEYS */;

-- Dumping structure for table approval.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_access_menu: ~21 rows (approximately)
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(14, 1, 2),
	(15, 1, 7),
	(16, 2, 4),
	(17, 1, 5),
	(20, 1, 3),
	(21, 2, 3),
	(22, 2, 6),
	(26, 1, 6),
	(28, 1, 4),
	(30, 3, 3),
	(31, 3, 5),
	(32, 4, 3),
	(33, 4, 5),
	(34, 5, 3),
	(35, 5, 5),
	(36, 6, 3),
	(37, 6, 5),
	(38, 7, 3),
	(39, 7, 5),
	(40, 8, 3),
	(41, 8, 5);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;

-- Dumping structure for table approval.user_area
CREATE TABLE IF NOT EXISTS `user_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_area: ~55 rows (approximately)
/*!40000 ALTER TABLE `user_area` DISABLE KEYS */;
INSERT INTO `user_area` (`id`, `user_id`, `area_id`) VALUES
	(9, 29, 1),
	(10, 27, 1),
	(11, 27, 2),
	(12, 27, 3),
	(13, 27, 4),
	(14, 27, 7),
	(25, 41, 2),
	(26, 42, 3),
	(27, 43, 4),
	(28, 44, 7),
	(29, 36, 1),
	(30, 36, 2),
	(31, 36, 3),
	(32, 36, 4),
	(33, 36, 7),
	(39, 33, 1),
	(40, 33, 2),
	(41, 33, 3),
	(42, 33, 4),
	(43, 33, 7),
	(44, 34, 1),
	(45, 34, 2),
	(46, 34, 3),
	(47, 34, 4),
	(48, 34, 7),
	(49, 35, 1),
	(50, 35, 2),
	(51, 35, 3),
	(52, 35, 4),
	(53, 35, 7),
	(63, 40, 1),
	(64, 40, 2),
	(65, 40, 3),
	(66, 40, 4),
	(67, 40, 7),
	(68, 31, 1),
	(69, 31, 2),
	(70, 31, 3),
	(71, 31, 4),
	(72, 31, 7),
	(73, 37, 1),
	(74, 37, 2),
	(75, 37, 3),
	(76, 37, 4),
	(77, 37, 7),
	(78, 38, 1),
	(79, 38, 2),
	(80, 38, 3),
	(81, 38, 4),
	(82, 38, 7),
	(83, 39, 1),
	(84, 39, 2),
	(85, 39, 3),
	(86, 39, 4),
	(87, 39, 7),
	(90, 32, 1),
	(91, 45, 2),
	(92, 46, 3),
	(93, 47, 4),
	(94, 48, 7);
/*!40000 ALTER TABLE `user_area` ENABLE KEYS */;

-- Dumping structure for table approval.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_menu: ~6 rows (approximately)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'Menu'),
	(3, 'User'),
	(4, 'Form Pengajuan'),
	(5, 'Pusat Data Pengajuan');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

-- Dumping structure for table approval.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_role: ~8 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `role`) VALUES
	(1, 'Administrator'),
	(2, 'Sales'),
	(3, 'PM'),
	(4, 'KoorSales'),
	(5, 'HeadRegion'),
	(6, 'ManagerSales'),
	(7, 'ManagerOps'),
	(8, 'PMManager');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Dumping structure for table approval.user_sub_menu
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_sub_menu: ~15 rows (approximately)
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
	(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
	(2, 3, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
	(3, 3, 'Perbarui Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
	(4, 2, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
	(5, 2, 'Submenu Management', 'menu/submenu', 'fas fa-fa-fw fa-folder-open', 1),
	(6, 1, 'Tingkatan Akses', 'admin/role', 'fas fa-fw fa-user-tie', 1),
	(7, 3, 'Ganti Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
	(9, 4, 'Form Peminjaman', 'peminjaman/index', 'fas fa-fw fa-headset', 1),
	(10, 5, 'Data Pengajuan', 'peminjaman/index', 'fas fa-fw fa-file-alt', 1),
	(11, 1, 'Data User', 'admin/datamember', 'fas fa-fw fa-users', 1),
	(12, 5, 'Pengajuan Baru Masuk', 'peminjaman/new', 'fas fa-fw fa-file-alt', 1),
	(13, 5, 'Pengajuan OnProses', 'peminjaman/onprocess', 'fas fa-fw fa-file-alt', 1),
	(14, 5, 'Pengajuan Ditolak', 'peminjaman/rejected', 'fas fa-fw fa-file-alt', 1),
	(15, 5, 'Pengajuan Selesai', 'peminjaman/success', 'fas fa-fw fa-file-alt', 1),
	(17, 1, 'Data Cabang', 'cabang/index', 'fa fa-flag', 1),
	(18, 1, 'Data Area', 'area/index', 'fa fa-flag', 1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;

-- Dumping structure for table approval.user_token
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_token: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
