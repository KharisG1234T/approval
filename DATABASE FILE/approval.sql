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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.barangpeminjaman: ~5 rows (approximately)
/*!40000 ALTER TABLE `barangpeminjaman` DISABLE KEYS */;
INSERT INTO `barangpeminjaman` (`id_bp`, `sku`, `nama`, `qty`, `harga`, `jumlah`, `stok_po`, `maks_delivery`, `id_peminjaman`) VALUES
	(1, '', 'Sampel', 2, 50000, 100000, '', '2023-03-08', 1),
	(2, '', 'Tester', 3, 1000, 2000, '', '2023-03-10', 1),
	(3, '', 'Sampel', 5, 1000, 5000, '', '2023-03-08', 2),
	(4, '', 'Tester', 2, 2000, 4000, '', '2023-03-09', 2),
	(5, '', 'COntoh', 3, 1000, 3000, '', '2023-03-08', 3);
/*!40000 ALTER TABLE `barangpeminjaman` ENABLE KEYS */;

-- Dumping structure for table approval.cabang
CREATE TABLE IF NOT EXISTS `cabang` (
  `id_cabang` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.cabang: ~1 rows (approximately)
/*!40000 ALTER TABLE `cabang` DISABLE KEYS */;
INSERT INTO `cabang` (`id_cabang`, `nama_cabang`) VALUES
	(5, 'CV Solusi Arya Prima');
/*!40000 ALTER TABLE `cabang` ENABLE KEYS */;

-- Dumping structure for table approval.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(15) NOT NULL,
  `id_cabang` int(15) NOT NULL,
  `from` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `number` varchar(50) NOT NULL DEFAULT '',
  `closingdate` date NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.peminjaman: ~3 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_cabang`, `from`, `date`, `number`, `closingdate`, `note`) VALUES
	(1, 1, 0, '', '0000-00-00', '3', '2023-03-10', 'Urgent'),
	(2, 1, 5, 'Pusat 1', '0000-00-00', '3', '2023-03-11', 'Urgent'),
	(3, 1, 5, 'Pusat 1', '0000-00-00', '3', '2023-03-10', 'Test');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table approval.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user: ~7 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(27, 'Admin Raizel', 'admin@mail.com', 'Screenshot_1.png', '$2y$10$.9Jgo7HSNyrg9nCJVv5uh.EpgVulkqzZDnG3gBXc5ypSKCd1pViim', 1, 1, 1599504982),
	(29, 'Tester', 'web1.hitechcomputer@gmail.com', 'logo_bw1.jpg', '$2y$10$6vmR.Ia65RJvidhIEKWOVuhE.igclGpTWkTko9SVy3fQe9DSiHbBy', 2, 1, 1678265073),
	(31, 'pm', 'pm@premmiere.co.id', 'default.jpg', '$2y$10$q59RcJszxu.UFselb.qtnuFdx4xnM7l/piZ/117kXN9sj/TS0S2kG', 3, 1, 1679990629),
	(32, 'Koordinator Sales', 'koorsales@premmiere.co.id', 'default.jpg', '$2y$10$nAk01O.3lY8E2e0qjhWS.u3lS45RwVGlUv3E6/xltnqTJ/0Iw6HRa', 4, 1, 1679990764),
	(33, 'Head Region Sales', 'headregion@premmiere.co.id', 'default.jpg', '$2y$10$OoDPvjOJF1SBN9.kG3D9guUkatoV4eECL8qP5olB.yuLJgYDakSzi', 5, 1, 1679990811),
	(34, 'Manager Sales', 'mansales@premmiere.co.id', 'default.jpg', '$2y$10$3V2QkUPT9YTz/o/nqBBlRuWNz2upVkaG.pwZjFejBvfoyfz.KDOKy', 6, 1, 1679990856),
	(35, 'Manager Operasional', 'manops@premmiere.co.id', 'default.jpg', '$2y$10$XLdx3fdOGVsYgffVuEidtezPJhH.9Mw31rchlEEvO0fnLYKqtK.Ei', 7, 1, 1679990893);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table approval.userpeminjaman
CREATE TABLE IF NOT EXISTS `userpeminjaman` (
  `id_up` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `approvedate` date NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  PRIMARY KEY (`id_up`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table approval.userpeminjaman: ~0 rows (approximately)
/*!40000 ALTER TABLE `userpeminjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `userpeminjaman` ENABLE KEYS */;

-- Dumping structure for table approval.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_access_menu: ~20 rows (approximately)
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
	(39, 7, 5);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;

-- Dumping structure for table approval.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_menu: ~6 rows (approximately)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'Menu'),
	(3, 'User'),
	(4, 'Form Pengajuan'),
	(5, 'Pusat Data Pengajuan'),
	(6, 'Status Pengajuan User');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

-- Dumping structure for table approval.user_report
CREATE TABLE IF NOT EXISTS `user_report` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `nik` varchar(64) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `village` varchar(64) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `date_reported` int(11) NOT NULL,
  `file` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `idstatus` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_report: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_report` DISABLE KEYS */;
INSERT INTO `user_report` (`id`, `name`, `nik`, `rt`, `rw`, `village`, `title`, `description`, `type`, `date_reported`, `file`, `idstatus`) VALUES
	('640ab132c7840', 'Tester', '21312142312', 1, 4, 'aadafasf', 'dadwqad', 'adacqwd', 'Bantuan Sosial', 1678422322, '640ab132c7840.jpg', '1');
/*!40000 ALTER TABLE `user_report` ENABLE KEYS */;

-- Dumping structure for table approval.user_report_status
CREATE TABLE IF NOT EXISTS `user_report_status` (
  `idstat` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`idstat`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_report_status: ~4 rows (approximately)
/*!40000 ALTER TABLE `user_report_status` DISABLE KEYS */;
INSERT INTO `user_report_status` (`idstat`, `status`) VALUES
	('1', 'Belum Diproses'),
	('2', 'Diproses'),
	('3', 'Ditolak'),
	('4', 'Selesai');
/*!40000 ALTER TABLE `user_report_status` ENABLE KEYS */;

-- Dumping structure for table approval.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_role: ~7 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `role`) VALUES
	(1, 'Administrator'),
	(2, 'Sales'),
	(3, 'PM'),
	(4, 'KoorSales'),
	(5, 'HeadRegion'),
	(6, 'ManagerSales'),
	(7, 'ManagerOps');
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
	(10, 5, 'Data Pengajuan', 'peminjaman/index2', 'fas fa-fw fa-file-alt', 1),
	(11, 1, 'Data User', 'admin/datamember', 'fas fa-fw fa-users', 1),
	(12, 5, 'Pengajuan Baru Masuk', 'admin', 'fas fa-fw fa-file-alt', 1),
	(13, 5, 'Pengajuan OnProses', 'admin', 'fas fa-fw fa-file-alt', 1),
	(14, 5, 'Pengajuan Gagal', 'admin', 'fas fa-fw fa-file-alt', 1),
	(15, 5, 'Pengajuan Selesai', 'admin', 'fas fa-fw fa-file-alt', 1),
	(16, 6, 'Status Pengaduan', 'report/statusreport', 'fas fa-fw fa-file-alt', 1),
	(17, 1, 'Data Cabang', 'cabang/index', 'fa fa-flag', 1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;

-- Dumping structure for table approval.user_token
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table approval.user_token: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
