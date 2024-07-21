-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_hospicare.tbbaru
DROP TABLE IF EXISTS `tbbaru`;
CREATE TABLE IF NOT EXISTS `tbbaru` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) DEFAULT NULL,
  `no_kamar` varchar(50) DEFAULT NULL,
  `nama_kamar` varchar(30) DEFAULT NULL,
  `kapasitas` varchar(50) DEFAULT NULL,
  `terisi` varchar(50) DEFAULT NULL,
  `status_kamar` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbbaru_tb_kelaskamar` (`kategori`),
  CONSTRAINT `FK_tbbaru_tb_kelaskamar` FOREIGN KEY (`kategori`) REFERENCES `tb_kelaskamar` (`kategori`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_hospicare.tbbaru: ~18 rows (approximately)
INSERT INTO `tbbaru` (`id`, `foto`, `no_kamar`, `nama_kamar`, `kapasitas`, `terisi`, `status_kamar`, `kategori`) VALUES
	(15, 'vip (1)_1721315375.jpeg', '1001', 'Musdalifah', '1 Orang', '1 Orang', 'Penuh', 'VIP'),
	(16, 'vip (2)_1721315417.jpeg', '1002', 'Musdalifah', '1 Orang', '0 Orang', 'Kosong', 'VIP'),
	(17, 'vip (3)_1721315469.jpeg', '1003', 'Turki', '1 Orang', '0 Orang', 'Kosong', 'VIP'),
	(18, 'vip (4)_1721315505.jpeg', '1004', 'Turki', '1 Orang', '0 Orang', 'Kosong', 'VIP'),
	(19, 'vip (5)_1721315574.jpeg', '1005', 'Mesir', '1 Orang', '0 Orang', 'Kosong', 'VIP'),
	(20, 'vip (6)_1721315622.jpeg', '1006', 'Mesir', '1 Orang', '1 Orang', 'penuh', 'VIP'),
	(21, 'vip (7)_1721315665.jpeg', '1007', 'Mesir', '1 Orang', '0 Orang', 'Kosong', 'VIP'),
	(22, '2 (6)_1721315787.jpeg', '2001', 'Palestina', '2 Orang', '0 Orang', 'Kosong', 'Semi VIP'),
	(23, '2 (5)_1721315837.jpeg', '2002', 'Arab saudi', '2 Orang', '0 Orang', 'penuh', 'Semi VIP'),
	(24, '2 (3)_1721315885.jpeg', '2003', 'Palestina', '2 Orang', '1 Orang', 'Terisi', 'Semi VIP'),
	(25, '2 (2)_1721315933.jpeg', '2004', 'Palestina', '2 Orang', '2 Orang', 'penuh', 'Semi VIP'),
	(26, '2 (4)_1721315977.jpeg', '2005', 'malaysia', '3 Orang', '0 Orang', 'Kosong', 'Semi VIP'),
	(27, '2 (1)_1721316012.jpeg', '2007', 'malaysia', '3 Orang', '3 Orang', 'penuh', 'Semi VIP'),
	(28, 'bangsal (3)_1721316093.jpeg', '3001', 'indonesia', '12 Orang', '6 Orang', 'Terisi', 'Bangsal'),
	(29, 'bangsal (1)_1721316132.jpeg', '3002', 'Cinderella', '12 Orang', '10 Orang', 'Terisi', 'Bangsal Anak'),
	(30, 'bangsal (4)_1721316191.jpeg', '3003', 'Madinah', '12 Orang', '9 Orang', 'Terisi', 'Bangsal'),
	(31, 'bangsal (2)_1721316269.jpeg', '3004', 'kairo', '12 Orang', '0 Orang', 'Kosong', 'Bangsal'),
	(32, 'bangsal_1721316346.jpeg', '3005', 'Ankara', '12 Orang', '0 Orang', 'Kosong', 'Bangsal');

-- Dumping structure for table db_hospicare.tb_dokter
DROP TABLE IF EXISTS `tb_dokter`;
CREATE TABLE IF NOT EXISTS `tb_dokter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Id_dokter` varchar(500) DEFAULT NULL,
  `nama_dokter` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spesialis` varchar(50) DEFAULT NULL,
  `jadwal_praktik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nohp` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_hospicare.tb_dokter: ~13 rows (approximately)
INSERT INTO `tb_dokter` (`id`, `foto`, `Id_dokter`, `nama_dokter`, `jenis_kelamin`, `spesialis`, `jadwal_praktik`, `pendidikan`, `nohp`, `keterangan`) VALUES
	(30, '5_1721143182.jpeg', '237865434567', 'dr.muhammad raziq al ansari', 'Laki-laki', 'Umum', ' senin- jumat (09:00-17:00)', 'S2 kedokteran unsyiah', '087654322345', 'On '),
	(31, '1.jpeg', '237865484567', 'dr.Mudaris hafiz', 'Laki-laki', 'Gigi', ' senin- jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654322345', 'On '),
	(32, '6.jpeg', '237865484568', 'dr.Aqil Ramadhada', 'Laki-laki', 'Jantung', ' senin- jumat (08:00-16:00)', 'S2 kedokteran UGM', '087654322367', 'On '),
	(33, '14_1721116925.jpeg', '237865484569', 'dr.Muhammad najid Alfaizie', 'Laki-laki', 'Saluran pencernaan', ' senin- jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087984322345', 'Off- 7 Agustus 2024'),
	(34, '15.jpeg', '237865484564', 'dr.Rajul Alpasya', 'Laki-laki', 'Saraf', ' senin- jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'Off- 11 Desember 2024'),
	(35, '17.jpeg', '237865484561', 'dr.Akmal hidayat', 'Laki-laki', 'Umum', ' senin- jumat (08:00-16:00)', 'S1 kedokteran Unimal', '021654322345', 'ON'),
	(36, '2.jpeg', '465829284857', 'dr.Faiza Ajwa Nakhla', 'Perempuan', 'Kulit', ' senin- jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'On '),
	(37, '3.jpeg', '235410008776', 'dr.Adelia Zahra', 'Perempuan', 'Gigi', ' selasa - jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'On '),
	(38, '4.jpeg', '039393837330', 'dr.Anna Altafunnisa', 'Perempuan', 'Umum', ' senin - jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'Off- 11 Desember 2024'),
	(39, '7.jpeg', '232345567890', 'dr.Putri Auliani', 'Perempuan', 'THT', ' senin- jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'On '),
	(40, '9.jpeg', '100033455656', 'dr.sariyulis', 'Perempuan', 'Saraf', ' senin- jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'Off- 11 Desember 2024'),
	(41, '11.jpeg', '200484756575', 'dr.Mona Lianda', 'Perempuan', 'Anak', ' senin- kamis(08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'On '),
	(42, '13.jpeg', '475757565242', 'dr.Dien Puspita', 'Perempuan', 'Kulit', ' senin- jumat (08:00-16:00)', 'S1 kedokteran unsyiah', '087654982345', 'On ');

-- Dumping structure for table db_hospicare.tb_kelaskamar
DROP TABLE IF EXISTS `tb_kelaskamar`;
CREATE TABLE IF NOT EXISTS `tb_kelaskamar` (
  `kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fasilitas` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `kode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_hospicare.tb_kelaskamar: ~5 rows (approximately)
INSERT INTO `tb_kelaskamar` (`kategori`, `fasilitas`, `kode`) VALUES
	('Bangsal', 'Kasur Rumah Sakit, Air Conditioner, Lemari Pakaian, Kamar mandi, ', 'lll'),
	('Bangsal Anak', 'Kasur Rumah Sakit, Air Conditioner, Lemari Pakaian, Kamar mandi, ', 'lll'),
	('Semi VIP', 'Kasur Rumah Sakit, Air Conditioner, Lemari Pakaian, Kamar mandi, ', 'll'),
	('VIP', 'Kasur Rumah Sakit, Air Conditioner, Lemari Pakaian, Kamar mandi, Sofa Bed, Smart TV,', 'l'),
	('VIP Eklusif', 'Kasur Rumah Sakit, Air Conditioner, Lemari Pakaian, Kamar mandi, Sofa Bed, Smart TV, wife	', 'l');

-- Dumping structure for table db_hospicare.tb_pembatalan
DROP TABLE IF EXISTS `tb_pembatalan`;
CREATE TABLE IF NOT EXISTS `tb_pembatalan` (
  `id_selesai` int NOT NULL AUTO_INCREMENT,
  `waktu_selesai` timestamp NULL DEFAULT NULL,
  `keterangan_selesai` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_pendaftaran` int DEFAULT NULL,
  `status_selesai` int DEFAULT NULL,
  PRIMARY KEY (`id_selesai`),
  KEY `FK_tb_selesai_tb_pendaftaran` (`id_pendaftaran`) USING BTREE,
  CONSTRAINT `FK_tb_selesai_tb_pendaftaran` FOREIGN KEY (`id_pendaftaran`) REFERENCES `tb_pendaftaran` (`id_reg`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_hospicare.tb_pembatalan: ~1 rows (approximately)
INSERT INTO `tb_pembatalan` (`id_selesai`, `waktu_selesai`, `keterangan_selesai`, `id_pendaftaran`, `status_selesai`) VALUES
	(9, NULL, 'Dibatalkan sendiri oleh Anda, \r\ndengan senang hati kami menunggu kedatangan anda lagi', 51, 3);

-- Dumping structure for table db_hospicare.tb_pendaftaran
DROP TABLE IF EXISTS `tb_pendaftaran`;
CREATE TABLE IF NOT EXISTS `tb_pendaftaran` (
  `id_reg` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jns_kelamin` varchar(50) DEFAULT NULL,
  `alamat_pasien` varchar(100) DEFAULT NULL,
  `nohp_pas` varchar(100) DEFAULT NULL,
  `jenis_pelayanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `katekamr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_poli` int DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT NULL,
  `feedback_adm` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengguna` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tgl_selesai` timestamp NULL DEFAULT NULL,
  `rencana_janji_temu` date DEFAULT NULL,
  PRIMARY KEY (`id_reg`),
  KEY `FK_tb_pendaftaran_tb_kelaskamar` (`katekamr`),
  KEY `FK_tb_pendaftaran_tb_poliklinik` (`nama_poli`),
  KEY `FK_tb_pendaftaran_tb_user` (`pengguna`) USING BTREE,
  CONSTRAINT `FK_tb_pendaftaran_tb_kelaskamar` FOREIGN KEY (`katekamr`) REFERENCES `tb_kelaskamar` (`kategori`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_pendaftaran_tb_poliklinik` FOREIGN KEY (`nama_poli`) REFERENCES `tb_poliklinik` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_pendaftaran_tb_user` FOREIGN KEY (`pengguna`) REFERENCES `tb_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_hospicare.tb_pendaftaran: ~6 rows (approximately)
INSERT INTO `tb_pendaftaran` (`id_reg`, `nik`, `nama_pasien`, `tgl_lahir`, `jns_kelamin`, `alamat_pasien`, `nohp_pas`, `jenis_pelayanan`, `katekamr`, `nama_poli`, `waktu`, `feedback_adm`, `pengguna`, `status`, `tgl_selesai`, `rencana_janji_temu`) VALUES
	(47, '10098789011010101', 'Muhammad hamdani', '1993-02-22', 'Laki-laki', 'desa blang bayu', '087654323456', 'Rawat Inap', 'Bangsal', NULL, '2024-07-21 10:51:28', NULL, 1, NULL, NULL, NULL),
	(48, '1109200039303938', 'Annisa Al mukarramah', '1890-03-04', 'Perempuan', 'desa manjron', '086543234567', 'Rawat Inap', 'VIP', NULL, '2024-07-21 10:51:29', NULL, 1, NULL, NULL, NULL),
	(49, '0192803999383747', 'Muhammad khairul Azzam', '2000-04-04', 'Laki-laki', 'teupin punti', '087654321234', 'Rawat Inap', 'VIP Eklusif', NULL, '2024-07-21 10:51:29', NULL, 1, NULL, NULL, NULL),
	(50, '0876543212345678', 'Ankara zahira', '2012-12-12', 'Perempuan', 'bayu', '087654321234', 'Rawat Jalan', NULL, 18, '2024-07-21 10:51:30', 'iya pendaftran anda kami terima, kami mohon untuk hadir pada tanggal yang telah anda tetapkan', 19, 2, NULL, NULL),
	(51, '100098789010998', 'munawwarah', '2020-02-23', 'Perempuan', 'punteut', '087654345678', 'Rawat Jalan', NULL, 16, '2024-07-21 10:51:31', 'iya pendaftran anda kami terima, kami mohon untuk hadir pada tanggal yang telah anda tetapkan', 20, 3, NULL, NULL),
	(52, '09876543223455', 'annisa', '2000-11-11', 'Perempuan', 'teupin punti', '09876543333', 'Rawat Inap', 'VIP', NULL, '2024-07-21 12:59:04', 'pendaftraan anda di kami terima, senang melayani anda \r\nanda berada di kamar vip nomor 2001', 1, 2, NULL, NULL);

-- Dumping structure for table db_hospicare.tb_poliklinik
DROP TABLE IF EXISTS `tb_poliklinik`;
CREATE TABLE IF NOT EXISTS `tb_poliklinik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) DEFAULT NULL,
  `id_poli` varchar(50) DEFAULT NULL,
  `nama_poli` varchar(70) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_hospicare.tb_poliklinik: ~7 rows (approximately)
INSERT INTO `tb_poliklinik` (`id`, `foto`, `id_poli`, `nama_poli`, `keterangan`) VALUES
	(13, 'gigi.jpeg', '1001', 'Poli Gigi', 'Klinik Gigi merupakan unit yang memberikan pelayanan kesehatan terkait berbagai kondisi gigi oleh dokter gigi umum, dokter gigi spesialis bedah mulut, dokter gigi spesialis konservasi gigi, dan dokter gigi spesialis orthodonti.'),
	(14, 'jantung.jpeg', '1002', 'Poli Mata', 'Klinik Mata kami memberikan pelayanan holistik untuk penanganan kelainan penglihatan dan berbagai gangguan mata dengan dukungan peralatan diagnostik mata terkini. Tim dokter kami terdiri dari dokter spesialis dan subspesialis di bidang kesehatan mata, antara lain:'),
	(15, 'THT.jpeg', '1003', 'Poli THT', 'Cluster THT merupakan pusat pelayanan terintegrasi khusus terdiri dari dokter spesialis THT yang menangani berbagai penyakit Telinga, Hidung, Tenggorok, dan Bedah Kepala Leher.'),
	(16, 'anak.jpeg', '1004', 'Poli Anak', 'Pediatric Cluster merupakan pusat pelayanan terintegrasi khusus pasien anak yang terdiri dari berbagai dokter spesialis anak dengan keahlian masing-masing, serta dokter spesialis kedokteran jiwa konsultan psikiatri anak dan remaja.'),
	(17, 'Tulang.jpeg', '1005', 'Poli Saraf', 'Merupakan pusat pelayanan terpadu yang menangani penyakit terkait saraf. Neurology cluster mencakup dokter spesialis neurologi dan dokter spesialis bedah saraf'),
	(18, 'paru-paru.jpeg', '1006', 'Poli paru-paru', 'Polusi udara, asap rokok, dan racun lainnya dapat menyebabkan kerusakan pada paru yang akhirnya mengganggu kesehatan Anda secara menyeluruh. Klinik Paru & Pernapasan kami didukung oleh dokter spesialis dan subspesialis yang kompeten menangani berbagai penyakit pernapasan, seperti asma, pneumonia, penyakit paru obstruktif kronik, kanker, maupun keluhan terkait paru lainnya.'),
	(19, 'Kandungan.jpeg', '1007', 'Poli Saluran pencernaan', 'Klinik Penyakit Dalam RS Metropolitan Medical Centre siap membantu menangani keluhan kesehatan Anda secara spesifik. ');

-- Dumping structure for table db_hospicare.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_hospicare.tb_user: ~8 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`, `foto`) VALUES
	(1, 'Nadila Arsyifa', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '082365566505', 'Syamtalira Bayu, aceh utara', NULL),
	(2, 'nadila', 'nadila@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '081265456789', 'Desa ulee meuria kec. syamtalira bayu', NULL),
	(18, 'Muhammad najid Alfaizie', 'faizie@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '086754321234', 'Lhokseumawe', NULL),
	(19, 'Muhammad Raziq Al ansari', 'raziq@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '087654321245', 'desa ulee meuria kec. syamtalira bayu', NULL),
	(20, 'Nur lathifah', 'lathifah@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '087654322222', 'syamtalira bayu', NULL),
	(21, 'Nadila Arsyifa', 'nadilaars12@gmail.com', '$2y$10$P3frLccNeRhvK.QcIWo5muZlgQ1hYWIf7FJOw57D0gcu3JXX/xbhi', 3, '087654322222', 'bayu', NULL),
	(24, 'nadila', 'nadila4@gmail.com', '$2y$10$m8HJGHtoMsRLcpCgwvSkAu5Y/lSnJuOzYAiwEyuu5we.6dEOZASNi', 3, '087654322222', 'syamtalira bayu', NULL),
	(27, 'nadila arsyiga', 'nalaars@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '087654322222', 'matang', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
