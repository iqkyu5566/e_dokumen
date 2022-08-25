-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;




-- Dumping structure for table db_doc.id_skhakim
CREATE TABLE IF NOT EXISTS `id_skhakim` (
  `id_skhakim` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` text NOT NULL,
  `jenis_sk` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_skhakim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.id_skhakim: ~4 rows (approximately)
DELETE FROM `id_skhakim`;
/*!40000 ALTER TABLE `id_skhakim` DISABLE KEYS */;
INSERT INTO `id_skhakim` (`id_skhakim`, `nomor_surat`, `tgl_surat`, `perihal`, `jenis_sk`, `keterangan`) VALUES
	(1, 'w23/u2.23./sdfsd/sdf/2134', '2022-07-27', 'tes', '', 'PHI'),
	(2, 'w23/u2.23./sdfsd/sdf/21345', '2022-07-27', 'tes', '', 'Perikanan'),
	(3, 'w23/u2.23./sdfsd/sdf/2', '2022-07-27', 'tes', '', 'Perikanan'),
	(4, 'w23/u2.23./sdfsd/sdf/2132', '2022-07-27', 'tes', 'PHI', 'pindah');
/*!40000 ALTER TABLE `id_skhakim` ENABLE KEYS */;

-- Dumping structure for table db_doc.id_zikualitaspelayanan
CREATE TABLE IF NOT EXISTS `id_zikualitaspelayanan` (
  `id_kualitaspelayanan` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_kualitaspelayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.id_zikualitaspelayanan: ~0 rows (approximately)
DELETE FROM `id_zikualitaspelayanan`;
/*!40000 ALTER TABLE `id_zikualitaspelayanan` DISABLE KEYS */;
INSERT INTO `id_zikualitaspelayanan` (`id_kualitaspelayanan`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'B2A', 'A. Nilai Persepsi Kualitas Pelayanan (Survei Eksternal)', '2022-07-26', 1, 'ZIHASIL2A.pdf');
/*!40000 ALTER TABLE `id_zikualitaspelayanan` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_akreditasi
CREATE TABLE IF NOT EXISTS `tbl_akreditasi` (
  `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_akreditasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_akreditasi: ~0 rows (approximately)
DELETE FROM `tbl_akreditasi`;
/*!40000 ALTER TABLE `tbl_akreditasi` DISABLE KEYS */;
INSERT INTO `tbl_akreditasi` (`id_akreditasi`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'IA', 'Akreditasi1', '2022-07-26', 1, 'akreditasi1.pdf');
/*!40000 ALTER TABLE `tbl_akreditasi` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_baperjakat
CREATE TABLE IF NOT EXISTS `tbl_baperjakat` (
  `id_baperjakat` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `nomor_surat` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `satker` text NOT NULL,
  `jab_lama` text NOT NULL,
  `jab_baru` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_baperjakat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_baperjakat: ~0 rows (approximately)
DELETE FROM `tbl_baperjakat`;
/*!40000 ALTER TABLE `tbl_baperjakat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_baperjakat` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_cuti
CREATE TABLE IF NOT EXISTS `tbl_cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `nomor_surat` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `jenis_cuti` text NOT NULL,
  `lama_cuti` text NOT NULL,
  `tgl_cuti` date NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_cuti: ~2 rows (approximately)
DELETE FROM `tbl_cuti`;
/*!40000 ALTER TABLE `tbl_cuti` DISABLE KEYS */;
INSERT INTO `tbl_cuti` (`id_cuti`, `nama`, `nomor_surat`, `tgl_surat`, `jenis_cuti`, `lama_cuti`, `tgl_cuti`, `keterangan`) VALUES
	(1, 'wa ode tika', 'w23/u2.23./sdfsd/sdf/213', '2022-07-27', 'Izin', '3 Hari', '2022-07-30', 'Izin'),
	(2, 'wa ode nanda', 'w23/u2.23./sdfsd/sdf/21346', '2022-07-27', 'tahunan', '5 hari', '2022-07-27', 'tahunan');
/*!40000 ALTER TABLE `tbl_cuti` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_hak_akses
CREATE TABLE IF NOT EXISTS `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table db_doc.tbl_hak_akses: ~26 rows (approximately)
DELETE FROM `tbl_hak_akses`;
/*!40000 ALTER TABLE `tbl_hak_akses` DISABLE KEYS */;
INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
	(15, 1, 1),
	(19, 1, 3),
	(21, 2, 1),
	(24, 1, 9),
	(28, 2, 3),
	(29, 2, 2),
	(30, 1, 2),
	(31, 2, 10),
	(32, 2, 25),
	(33, 2, 28),
	(34, 2, 29),
	(36, 4, 25),
	(37, 4, 11),
	(38, 4, 12),
	(39, 4, 28),
	(40, 4, 29),
	(41, 4, 10),
	(42, 2, 11),
	(43, 2, 12),
	(44, 1, 10),
	(45, 1, 25),
	(46, 1, 28),
	(47, 1, 29),
	(48, 5, 30),
	(49, 2, 31),
	(50, 2, 30);
/*!40000 ALTER TABLE `tbl_hak_akses` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_hukdis
CREATE TABLE IF NOT EXISTS `tbl_hukdis` (
  `id_hukdis` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `nomor_sk` varchar(40) NOT NULL,
  `tgl_sk` date NOT NULL,
  `jenis_huk` text NOT NULL,
  `sanksi` text NOT NULL,
  `tmt_mulai` text NOT NULL,
  `tmt_akhir` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_hukdis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_hukdis: ~0 rows (approximately)
DELETE FROM `tbl_hukdis`;
/*!40000 ALTER TABLE `tbl_hukdis` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_hukdis` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_kategori_pemenuhan
CREATE TABLE IF NOT EXISTS `tbl_kategori_pemenuhan` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_doc.tbl_kategori_pemenuhan: ~2 rows (approximately)
DELETE FROM `tbl_kategori_pemenuhan`;
/*!40000 ALTER TABLE `tbl_kategori_pemenuhan` DISABLE KEYS */;
INSERT INTO `tbl_kategori_pemenuhan` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Pemenuhan 1'),
	(2, 'Pemenuhan 2');
/*!40000 ALTER TABLE `tbl_kategori_pemenuhan` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_kategori_reform
CREATE TABLE IF NOT EXISTS `tbl_kategori_reform` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_kategori_reform: ~3 rows (approximately)
DELETE FROM `tbl_kategori_reform`;
/*!40000 ALTER TABLE `tbl_kategori_reform` DISABLE KEYS */;
INSERT INTO `tbl_kategori_reform` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Reform 1'),
	(2, 'Reform 2'),
	(3, 'Reform 3');
/*!40000 ALTER TABLE `tbl_kategori_reform` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_kepskhakim
CREATE TABLE IF NOT EXISTS `tbl_kepskhakim` (
  `id_skketua` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_sk` varchar(40) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_skketua`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_kepskhakim: ~0 rows (approximately)
DELETE FROM `tbl_kepskhakim`;
/*!40000 ALTER TABLE `tbl_kepskhakim` DISABLE KEYS */;
INSERT INTO `tbl_kepskhakim` (`id_skketua`, `nomor_sk`, `tanggal_sk`, `perihal`, `keterangan`) VALUES
	(1, 'w23.213/231/fsg/2022', '2022-07-26', 'tes', 'tes');
/*!40000 ALTER TABLE `tbl_kepskhakim` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_kepsurattugas
CREATE TABLE IF NOT EXISTS `tbl_kepsurattugas` (
  `id_surattugas` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_st` varchar(40) NOT NULL,
  `tanggal_st` date NOT NULL,
  `perihal` text NOT NULL,
  `nama` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_surattugas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_kepsurattugas: ~0 rows (approximately)
DELETE FROM `tbl_kepsurattugas`;
/*!40000 ALTER TABLE `tbl_kepsurattugas` DISABLE KEYS */;
INSERT INTO `tbl_kepsurattugas` (`id_surattugas`, `nomor_st`, `tanggal_st`, `perihal`, `nama`, `keterangan`) VALUES
	(1, 'w23.1234/213432/2022', '2022-07-26', 'tes', 'tes', '-');
/*!40000 ALTER TABLE `tbl_kepsurattugas` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_lapkegiatan
CREATE TABLE IF NOT EXISTS `tbl_lapkegiatan` (
  `id_lapkegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` text NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `keterangan` date NOT NULL,
  PRIMARY KEY (`id_lapkegiatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_lapkegiatan: ~0 rows (approximately)
DELETE FROM `tbl_lapkegiatan`;
/*!40000 ALTER TABLE `tbl_lapkegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lapkegiatan` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table db_doc.tbl_menu: ~31 rows (approximately)
DELETE FROM `tbl_menu`;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
	(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
	(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
	(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
	(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
	(10, 'ZONA INTEGRITAS (PROSES)', 'Pemenuhan', 'fa fa-id-card', 0, 'y'),
	(11, 'AREA I PEMENUHAN', 'Pemenuhan', 'fa fa-id-card', 10, 'y'),
	(12, 'AREA I REFORM', 'Areasatu', 'fa fa-id-card', 10, 'y'),
	(13, 'AREA II PEMENUHAN', 'Pemenuhandua', 'fa fa-id-card', 10, 'y'),
	(14, 'AREA II REFORM', 'Reformdua', 'fa fa-id-card', 10, 'y'),
	(15, 'AREA III PEMENUHAN', 'Pemenuhantiga', 'fa fa-id-card', 10, 'y'),
	(16, 'AREA III REFORM', 'Reformtiga', 'fa fa-id-card', 10, 'y'),
	(17, 'AREA IV PEMENUHAN', 'Pemenuhanempat', 'fa fa-id-card', 10, 'y'),
	(18, 'AREA IV REFORM', 'Reformempat', 'fa fa-id-card', 10, 'y'),
	(19, 'AREA V PEMENUHAN', 'Pemenuhanlima', 'fa fa-id-card', 10, 'y'),
	(20, 'AREA V REFORM', 'Reformlima', 'fa fa-id-card', 10, 'y'),
	(21, 'AREA VI PEMENUHAN', 'Pemenuhanenam', 'fa fa-id-card', 10, 'y'),
	(22, 'AREA VI REFORM', 'Reformenam', 'fa fa-id-card', 10, 'y'),
	(25, 'ZONA INTEGRITAS (HASIL)', '#', 'fa fa-id-card', 0, 'y'),
	(26, 'BIROKRASI YANG BERSIH <BR>DAN AKUNTABEL', 'Zibirokrasi', 'fa fa-id-card', 25, 'y'),
	(27, 'KUALITAS PELAYANAN PUBLIK', 'Zikualitaspelayanan', 'fa fa-id-card', 25, 'y'),
	(28, 'AKREDITASI', 'Akreditasi', 'fa fa-id-card', 0, 'y'),
	(29, 'PEMBINAAN DAN PENGAWASAN', 'Pengawasan', 'fa fa-id-card', 0, 'y'),
	(30, 'KEPEGAWAIAN', '#', 'fa fa-id-card', 0, 'y'),
	(31, 'SK KETUA', 'Kepskhakim', 'fa fa-id-card', 30, 'y'),
	(32, 'Surat Tugas', 'Kepsurattugaskep', 'fa fa-id-card', 30, 'y'),
	(33, 'Cuti/Izin', 'Cuti', 'fa fa-id-card', 30, 'y'),
	(34, 'SK Hakim khusus', 'Skhakim', 'fa fa-id-card', 30, 'y'),
	(35, 'laporan kegiatan', 'Lapkegiatan', 'fa fa-id-card', 30, 'y'),
	(36, 'baperjakat', 'Baperjakat', 'fa fa-id-card', 30, 'y'),
	(37, 'hukuman disiplin', 'Hukdis', 'fa fa-id-card', 30, 'y'),
	(38, 'Perencanaan Kesekret', 'Naikpangkat', 'fa fa-id-card', 30, 'y');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_naikpangkat
CREATE TABLE IF NOT EXISTS `tbl_naikpangkat` (
  `id_naikpangkat` int(11) NOT NULL AUTO_INCREMENT,
  `periode` text NOT NULL,
  `tahun` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_naikpangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_naikpangkat: ~0 rows (approximately)
DELETE FROM `tbl_naikpangkat`;
/*!40000 ALTER TABLE `tbl_naikpangkat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_naikpangkat` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pemenuhan
CREATE TABLE IF NOT EXISTS `tbl_pemenuhan` (
  `id_pemenuhan` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pemenuhan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pemenuhan: ~4 rows (approximately)
DELETE FROM `tbl_pemenuhan`;
/*!40000 ALTER TABLE `tbl_pemenuhan` DISABLE KEYS */;
INSERT INTO `tbl_pemenuhan` (`id_pemenuhan`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'I1a', 'Unit kerja telah membentuk tim untuk melakukan pembangunan Zona Integritas', '2022-07-17', 1, 'zi1.pdf'),
	(2, 'I1b', 'Penentuan anggota Tim dipilih melalui prosedur/mekanisme yang jelas', '2022-07-17', 1, 'zi2t.pdf'),
	(4, 'IAk', 'Tes 1', '2022-08-20', 2, 'hhsjjs.jpg'),
	(5, 'sfs', 'trr', '2022-08-20', 3, 'sfds.jpg');
/*!40000 ALTER TABLE `tbl_pemenuhan` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pemenuhandua
CREATE TABLE IF NOT EXISTS `tbl_pemenuhandua` (
  `id_pemenuhandua` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pemenuhandua`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pemenuhandua: ~2 rows (approximately)
DELETE FROM `tbl_pemenuhandua`;
/*!40000 ALTER TABLE `tbl_pemenuhandua` DISABLE KEYS */;
INSERT INTO `tbl_pemenuhandua` (`id_pemenuhandua`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(2, 'II1A', 'Apakah SOP mengacu pada peta proses bisnis instansi', '2022-07-25', 1, 'ziII1.pdf'),
	(3, 'II1B', 'Prosedur operasional tetap (SOP) telah diterapkan', '2022-07-25', 1, 'ZIIIb.pdf');
/*!40000 ALTER TABLE `tbl_pemenuhandua` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pemenuhanempat
CREATE TABLE IF NOT EXISTS `tbl_pemenuhanempat` (
  `id_pemenuhanempat` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pemenuhanempat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pemenuhanempat: ~2 rows (approximately)
DELETE FROM `tbl_pemenuhanempat`;
/*!40000 ALTER TABLE `tbl_pemenuhanempat` DISABLE KEYS */;
INSERT INTO `tbl_pemenuhanempat` (`id_pemenuhanempat`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'IV1A', 'a. Apakah pimpinan terlibat secara langsung pada saat penyusunan Perencanaan', '2022-07-25', 1, 'ZIIV1A.pdf'),
	(2, 'IV1B', 'b. Apakah pimpinan terlibat secara langsung pada saat penyusunan Penetapan Kinerja', '2022-07-25', 1, 'ZIIV1b.pdf');
/*!40000 ALTER TABLE `tbl_pemenuhanempat` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pemenuhanenam
CREATE TABLE IF NOT EXISTS `tbl_pemenuhanenam` (
  `id_pemenuhanenam` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pemenuhanenam`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pemenuhanenam: ~2 rows (approximately)
DELETE FROM `tbl_pemenuhanenam`;
/*!40000 ALTER TABLE `tbl_pemenuhanenam` DISABLE KEYS */;
INSERT INTO `tbl_pemenuhanenam` (`id_pemenuhanenam`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'VI1A', 'a. Terdapat kebijakan standar pelayanan', '2022-07-26', 1, 'ZIVIA.pdf'),
	(2, 'VI1B', 'b.	Standar pelayanan telah dimaklumatkan', '2022-07-26', 1, 'ZIVI1B.pdf');
/*!40000 ALTER TABLE `tbl_pemenuhanenam` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pemenuhanlima
CREATE TABLE IF NOT EXISTS `tbl_pemenuhanlima` (
  `id_pemenuhanlima` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pemenuhanlima`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pemenuhanlima: ~2 rows (approximately)
DELETE FROM `tbl_pemenuhanlima`;
/*!40000 ALTER TABLE `tbl_pemenuhanlima` DISABLE KEYS */;
INSERT INTO `tbl_pemenuhanlima` (`id_pemenuhanlima`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'V1A', 'a. Telah dilakukan public campaign tentang pengendalian gratifikasi', '2022-07-26', 1, 'VZI1.pdf'),
	(2, 'V1B', 'b. Pengendalian gratifikasi telah diimplementasikan', '2022-07-26', 1, 'VZIB.pdf');
/*!40000 ALTER TABLE `tbl_pemenuhanlima` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pemenuhansatu
CREATE TABLE IF NOT EXISTS `tbl_pemenuhansatu` (
  `id_pemenuhansatu` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pemenuhansatu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pemenuhansatu: ~2 rows (approximately)
DELETE FROM `tbl_pemenuhansatu`;
/*!40000 ALTER TABLE `tbl_pemenuhansatu` DISABLE KEYS */;
INSERT INTO `tbl_pemenuhansatu` (`id_pemenuhansatu`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(2, '1IA', 'Agen perubahan telah membuat perubahan yang konkret di Instansi (dalam 1 tahun)', '2022-07-19', 2, 'REFORM1.PDF'),
	(3, '1IB', 'Perubahan yang dibuat Agen Perubahan telah terintegrasi dalam sistem manajemen', '2022-07-19', 2, 'REFORM2.PDF');
/*!40000 ALTER TABLE `tbl_pemenuhansatu` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pemenuhantiga
CREATE TABLE IF NOT EXISTS `tbl_pemenuhantiga` (
  `id_pemenuhantiga` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pemenuhantiga`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pemenuhantiga: ~2 rows (approximately)
DELETE FROM `tbl_pemenuhantiga`;
/*!40000 ALTER TABLE `tbl_pemenuhantiga` DISABLE KEYS */;
INSERT INTO `tbl_pemenuhantiga` (`id_pemenuhantiga`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'III1A', '1. Peta Proses Bisnis Mempengaruhi Penyederhanaan Jabatan <br>\r\na. Apakah kebutuhan pegawai yang disusun oleh unit kerja mengacu kepada peta jabatan dan hasil analisis beban kerja untuk masing-masing jabatan?', '2022-07-25', 1, 'pemenuhan3.pdf'),
	(2, 'III1B', 'b.	Apakah penempatan pegawai hasil rekrutmen murni mengacu kepada kebutuhan pegawai yang telah disusun per jabatan?', '2022-07-25', 1, 'reformdua.pdf');
/*!40000 ALTER TABLE `tbl_pemenuhantiga` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_pengawasan
CREATE TABLE IF NOT EXISTS `tbl_pengawasan` (
  `id_pengawasan` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `satker` text NOT NULL,
  `tim` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_pengawasan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_pengawasan: ~0 rows (approximately)
DELETE FROM `tbl_pengawasan`;
/*!40000 ALTER TABLE `tbl_pengawasan` DISABLE KEYS */;
INSERT INTO `tbl_pengawasan` (`id_pengawasan`, `no_dokumen`, `satker`, `tim`, `tgl_upload`, `nama_file`) VALUES
	(1, 'IA', 'Pengadilan Negeri Kendari', 'A<br>\r\nB<br>\r\nC', '2022-07-26', 'Pengawasan1.pdf');
/*!40000 ALTER TABLE `tbl_pengawasan` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_reformdua
CREATE TABLE IF NOT EXISTS `tbl_reformdua` (
  `id_reformdua` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_reformdua`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_reformdua: ~2 rows (approximately)
DELETE FROM `tbl_reformdua`;
/*!40000 ALTER TABLE `tbl_reformdua` DISABLE KEYS */;
INSERT INTO `tbl_reformdua` (`id_reformdua`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, '2I', 'Telah disusun peta proses bisnis dengan adanya penyederhanaan jabatan', '2022-07-19', 2, 'reformdua.pdf'),
	(2, '2IA', 'Peta Proses Bisnis Mempengaruhi Penyederhanaan Jabatan	 	 	 	 	\r\n\r\n-Telah disusun peta proses bisnis dengan adanya penyederhanaan jabatan', '2022-07-25', 2, 'reform1.pdf');
/*!40000 ALTER TABLE `tbl_reformdua` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_reformempat
CREATE TABLE IF NOT EXISTS `tbl_reformempat` (
  `id_reformempat` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_reformempat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_reformempat: ~2 rows (approximately)
DELETE FROM `tbl_reformempat`;
/*!40000 ALTER TABLE `tbl_reformempat` DISABLE KEYS */;
INSERT INTO `tbl_reformempat` (`id_reformempat`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, '4I', 'Meningkatnya capaian kinerja unit kerja\r\n-Persentase Sasaran dengan capaian 100% atau lebih', '2022-07-26', 2, 'reform4zi.pdf'),
	(2, '4II', '-Hasil Capaian/Monitoring Perjanjian Kinerja telah dijadikan dasar sebagai pemberian reward and punishment bagi organisasi', '2022-07-26', 2, 'reform4zib.pdf');
/*!40000 ALTER TABLE `tbl_reformempat` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_reformenam
CREATE TABLE IF NOT EXISTS `tbl_reformenam` (
  `id_reformenam` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_reformenam`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_reformenam: ~2 rows (approximately)
DELETE FROM `tbl_reformenam`;
/*!40000 ALTER TABLE `tbl_reformenam` DISABLE KEYS */;
INSERT INTO `tbl_reformenam` (`id_reformenam`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, '6A', 'Upaya dan/atau inovasi telah mendorong perbaikan pelayanan publik pada:\r\n1. Kesesuaian Persyaratan\r\n2. Kemudahan Sistem, Mekanisme, dan Prosedur\r\n3. Kecepatan Waktu Penyelesaian\r\n4. Kejelasan Biaya/Tarif, Gratis\r\n5. Kualitas Produk Spesifikasi Jenis Pelayanan\r\n6. Kompetensi Pelaksana/Web\r\n7. Perilaku Pelaksana/Web\r\n8. Kualitas Sarana dan prasarana\r\n9. Penanganan Pengaduan, Saran dan Masukan', '2022-07-26', 2, 'reformZIA.pdf'),
	(2, '6B', 'Upaya dan/atau inovasi pada perijinan/pelayanan telah dipermudah:\r\n1. Waktu lebih cepat\r\n2. Pelayanan Publik yang terpadu\r\n3. Alur lebih pendek/singkat\r\n4 Terintegrasi dengan aplikasi', '2022-07-26', 2, 'reformziVIB.pdf');
/*!40000 ALTER TABLE `tbl_reformenam` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_reformlima
CREATE TABLE IF NOT EXISTS `tbl_reformlima` (
  `id_reformlima` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_reformlima`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_reformlima: ~2 rows (approximately)
DELETE FROM `tbl_reformlima`;
/*!40000 ALTER TABLE `tbl_reformlima` DISABLE KEYS */;
INSERT INTO `tbl_reformlima` (`id_reformlima`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, '5I', 'Telah dilakukan mekanisme pengendalian aktivitas secara berjenjang', '2022-07-26', 2, 'REFORMZIV.pdf'),
	(2, '5II', 'Persentase penanganan pengaduan masyarakat', '2022-07-26', 2, 'REFORMZIVB.pdf');
/*!40000 ALTER TABLE `tbl_reformlima` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_reformtiga
CREATE TABLE IF NOT EXISTS `tbl_reformtiga` (
  `id_reformtiga` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_reformtiga`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_reformtiga: ~2 rows (approximately)
DELETE FROM `tbl_reformtiga`;
/*!40000 ALTER TABLE `tbl_reformtiga` DISABLE KEYS */;
INSERT INTO `tbl_reformtiga` (`id_reformtiga`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, '3I', '-Ukuran kinerja individu telah berorientasi hasil (outcome) sesuai pada levelnya', '2022-07-25', 2, 'reformtiga.pdf'),
	(2, 'III1B', 'b.	Apakah penempatan pegawai hasil rekrutmen murni mengacu kepada kebutuhan pegawai yang telah disusun per jabatan?', '2022-07-25', 1, 'zi3IB.pdf');
/*!40000 ALTER TABLE `tbl_reformtiga` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_setting
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_doc.tbl_setting: ~0 rows (approximately)
DELETE FROM `tbl_setting`;
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
	(1, 'Tampil Menu', 'ya');
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `area` enum('Area 1','Area 2','Area 3','Area 4','Area 5','Area 6') NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_doc.tbl_user: ~3 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `area`, `images`, `id_user_level`, `is_aktif`) VALUES
	(7, 'hendra', 'hendra@gmail.com', '$2y$04$lxELAsNrn5OJnZhORCfjbeAxqiCEomMB1jf8Q8K90WiWwt83Ag9Qa', 'Area 1', '', 2, 'y'),
	(8, 'Nanda', 'nanda@gmail.com', '$2y$04$gsGbZ1pfAqh9iG.7poxSvevQQ3Tk6.3N6vr3zvvJuONuNRSpp0Kia', 'Area 1', '', 4, 'y'),
	(9, 'sulaiman', 'sulai@gmail.com', '$2y$04$S9juzwOdhuO9EwmmF1ej3enz35F.9NI0hoOPkqjvl4LZnak8ffWx6', 'Area 1', '', 5, 'y');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_user_level
CREATE TABLE IF NOT EXISTS `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_doc.tbl_user_level: ~5 rows (approximately)
DELETE FROM `tbl_user_level`;
/*!40000 ALTER TABLE `tbl_user_level` DISABLE KEYS */;
INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
	(1, 'Super Admin'),
	(2, 'Admin'),
	(3, 'Pimpinan'),
	(4, 'Pegawai'),
	(5, 'Kepegawaian');
/*!40000 ALTER TABLE `tbl_user_level` ENABLE KEYS */;

-- Dumping structure for table db_doc.tbl_zibirokrasi
CREATE TABLE IF NOT EXISTS `tbl_zibirokrasi` (
  `id_zibirokrasi` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  PRIMARY KEY (`id_zibirokrasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_doc.tbl_zibirokrasi: ~2 rows (approximately)
DELETE FROM `tbl_zibirokrasi`;
/*!40000 ALTER TABLE `tbl_zibirokrasi` DISABLE KEYS */;
INSERT INTO `tbl_zibirokrasi` (`id_zibirokrasi`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
	(1, 'B1A', 'a.Nilai Survey Persepsi Korupsi (Survei Eksternal)', '2022-07-26', 1, 'ZIHasilA.pdf'),
	(2, 'B1B', 'b.Capaian Kinerja Lebih Baik dari pada Capaian Kinerja Sebelumnya', '2022-07-26', 1, 'ZIhasilB.pdf');
/*!40000 ALTER TABLE `tbl_zibirokrasi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
