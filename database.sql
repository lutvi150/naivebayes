-- --------------------------------------------------------
-- Host:                         103.15.226.176
-- Server version:               10.6.19-MariaDB-cll-lve-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             12.8.0.6935
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table teamclov_demo_4.data
CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama_data` varchar(255) DEFAULT NULL,
  `tanggal_hitung` varchar(50) DEFAULT NULL,
  `jumlah_data` int(11) DEFAULT NULL,
  `data_analisis` text DEFAULT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table teamclov_demo_4.data: ~2 rows (approximately)
INSERT INTO `data` (`id_data`, `nama_data`, `tanggal_hitung`, `jumlah_data`, `data_analisis`) VALUES
	(2, 'Tes Data1', '2024-08-25 09:41:31', 0, NULL),
	(3, 'tes 5', '2024-08-25 09:44:22', 0, '{"time_execution":0.01677393913269043,"id_sample":3,"data":{"atribut_kelas":{"siap":0,"belum_siap":0},"atribut_jenis_kelamin":{"siap":{"laki_laki":0,"perempuan":0},"belum_siap":{"laki_laki":0,"perempuan":0}},"atribut_usia":{"siap":{"5":0,"6":0},"belum_siap":{"5":0,"6":0}},"atribut_emosional":{"y":{"siap":0,"belum_siap":0},"t":{"siap":0,"belum_siap":0}},"atribut_kognitif":{"y":{"siap":0,"belum_siap":0},"t":{"siap":0,"belum_siap":0}},"atribut_sosial":{"y":{"siap":0,"belum_siap":0},"t":{"siap":0,"belum_siap":0}},"atribut_calistung":{"y":{"siap":0,"belum_siap":0},"t":{"siap":0,"belum_siap":0}},"probabilitas_kelas":{"siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0},"probabilitas_jenis_kelamin":{"laki_laki":{"jenis_kelamin":"laki-laki","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0},"perempuan":{"jenis_kelamin":"perempuan","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0}},"probabilitas_usia":{"5":{"keterangan":"5 Tahun","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0},"6":{"keterangan":"6 Tahun","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0}},"probabilitas_emosional":{"y":{"keterangan":"Ya","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0},"t":{"keterangan":"Tidak","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0}},"probabilitas_kognitif":{"y":{"keterangan":"Ya","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0},"t":{"keterangan":"Tidak","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0}},"probabilitas_sosial":{"y":{"keterangan":"Ya","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0},"t":{"keterangan":"Tidak","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0}},"probabilitas_calistung":{"y":{"keterangan":"Ya","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0},"t":{"keterangan":"Tidak","siap":"0\\/0","belum_siap":"0\\/0","siap_count":0,"belum_siap_count":0}}}}');

-- Dumping structure for table teamclov_demo_4.table_anak
CREATE TABLE IF NOT EXISTS `table_anak` (
  `id_anak` int(11) NOT NULL AUTO_INCREMENT,
  `id_sample` int(11) DEFAULT NULL,
  `nama_anak` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(3) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenis_data` varchar(2) DEFAULT NULL,
  `nst` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `foto_anak` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_anak`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table teamclov_demo_4.table_anak: ~51 rows (approximately)
INSERT INTO `table_anak` (`id_anak`, `id_sample`, `nama_anak`, `jenis_kelamin`, `umur`, `jenis_data`, `nst`, `keterangan`, `foto_anak`) VALUES
	(3, 3, 'ALIFA NAUFALYN', 'P', 6, '1', 65, 'SIAP', NULL),
	(4, 3, 'SAKINAH', 'P', 6, '1', 64, 'SIAP', NULL),
	(5, 3, 'RAFASHA RISKI', 'L', 6, '1', 66, 'SIAP', NULL),
	(6, 3, 'FAEYZA', 'L', 5, '1', 45, 'BELUM', NULL),
	(7, 3, 'ALIYA HUSNA', 'P', 6, '1', 56, 'SIAP', NULL),
	(8, 3, 'REZALDI', 'L', 5, '1', 40, 'BELUM', NULL),
	(9, 3, 'RAIHAN AL SABDA', 'L', 6, '1', 67, 'SIAP', NULL),
	(10, 3, 'NAZRIL', 'L', 6, '1', 62, 'SIAP', NULL),
	(11, 3, 'ALIYA SAKIRA PUTRI', 'P', 6, '1', 64, 'SIAP', NULL),
	(12, 3, 'ALFIN  AL GIFARI', 'L', 6, '1', 64, 'SIAP', NULL),
	(13, 3, 'ADELIA SAHIRA', 'P', 6, '1', 57, 'SIAP', NULL),
	(14, 3, 'MARYA', 'P', 6, '1', 59, 'SIAP', NULL),
	(15, 3, 'ZHAFIRA AZZARA', 'P', 6, '1', 67, 'SIAP', NULL),
	(16, 3, 'KHAIRA NAFISAH', 'P', 6, '1', 55, 'SIAP', NULL),
	(17, 3, 'ALYA FARISHA', 'P', 6, '1', 65, 'SIAP', NULL),
	(18, 3, 'ANDYRA NAIFA', 'P', 5, '1', 40, 'BELUM', NULL),
	(19, 3, 'MEISYA ALIFYA', 'P', 6, '1', 55, 'SIAP', 'uploads/foto_anak/706d80a11603da153b6012ef2f48f29c.jpg'),
	(23, 3, 'ALPIAN MAHARA', 'L', 6, '0', 65, 'SIAP', NULL),
	(24, 3, 'RAIMA NADIRA', 'P', 6, '0', 64, 'SIAP', NULL),
	(25, 3, 'KEISYA ALFIKA', 'P', 6, '0', 66, 'SIAP', NULL),
	(26, 3, 'MAHDALENA', 'P', 6, '0', 45, 'BELUM', NULL),
	(27, 3, 'RAFA HAZIQ', 'L', 6, '0', 56, 'SIAP', NULL),
	(28, 3, 'RANDI', 'L', 6, '0', 40, 'BELUM', NULL),
	(30, 3, 'NAZRIL', 'L', 6, '0', 62, 'SIAP', NULL),
	(31, 3, 'ALVIANI', 'P', 6, '0', 64, 'SIAP', NULL),
	(32, 3, 'AZKA MAULANA', 'L', 6, '0', 64, 'SIAP', NULL),
	(33, 3, 'ALBY LUTFI', 'L', 6, '0', 57, 'SIAP', NULL),
	(34, 3, 'INDRA', 'L', 6, '0', 59, 'SIAP', NULL),
	(35, 3, 'AGUS', 'L', 6, '0', 67, 'SIAP', NULL),
	(36, 3, 'SETIAWAN PUTRA', 'L', 6, '0', 55, 'SIAP', NULL),
	(37, 3, 'SYAHDU ANGGRAINI', 'P', 6, '0', 65, 'SIAP', NULL),
	(38, 3, 'AUFA QALIKA', 'P', 6, '0', 40, 'BELUM', NULL),
	(39, 3, 'QUENSA', 'P', 6, '0', 55, 'SIAP', NULL),
	(40, 3, 'GISELLA', 'L', 6, '0', 64, 'SIAP', NULL),
	(41, 3, 'RIANDA', 'L', 6, '0', 57, 'SIAP', NULL),
	(42, 3, 'JAKIAN', 'L', 6, '0', 59, 'SIAP', NULL),
	(43, 3, 'MUNA AL WAQIA', 'P', 6, '0', 67, 'SIAP', NULL),
	(44, 3, 'PUTRI RANIA', 'P', 6, '0', 55, 'SIAP', NULL),
	(45, 3, 'ALFIN SERGA', 'L', 6, '0', 65, 'SIAP', NULL),
	(46, 3, 'MIKAYLA', 'P', 6, '0', 40, 'BELUM', NULL),
	(47, 3, 'RESKI PRIDALA', 'L', 6, '0', 55, 'SIAP', NULL),
	(48, 3, 'RIA AGUSTINA', 'P', 6, '0', 67, 'SIAP', NULL),
	(49, 3, 'SIMAHBENGI', 'P', 6, '0', 55, 'SIAP', NULL),
	(50, 3, 'RANGGA ADITYA', 'L', 6, '0', 65, 'SIAP', NULL),
	(51, 3, 'RAHMADAINI', 'P', 5, '0', 40, 'BELUM', NULL),
	(53, 3, 'LAURA ADELIA', 'P', 6, '0', 55, 'SIAP', NULL),
	(54, 3, 'SIMAH BENGI', 'P', 6, '0', 55, 'SIAP', NULL),
	(56, 3, 'NABILA PUTRI', 'P', 6, '0', 67, 'SIAP', NULL),
	(61, 3, 'RAHMADAINI', 'P', 5, '0', 40, 'BELUM', NULL),
	(63, 3, 'RANGGA ADITYA', 'L', 6, '0', 65, 'SIAP', NULL),
	(64, 3, 'PUTRA AKBAR', 'L', 6, '0', 55, 'SIAP', NULL);

-- Dumping structure for table teamclov_demo_4.table_kemampuan_anak
CREATE TABLE IF NOT EXISTS `table_kemampuan_anak` (
  `id_kemampuan` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) NOT NULL DEFAULT 0,
  `emosional` varchar(2) DEFAULT NULL,
  `kognitif` varchar(2) DEFAULT NULL,
  `sosial` varchar(2) DEFAULT NULL,
  `calistung` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_kemampuan`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table teamclov_demo_4.table_kemampuan_anak: ~63 rows (approximately)
INSERT INTO `table_kemampuan_anak` (`id_kemampuan`, `id_anak`, `emosional`, `kognitif`, `sosial`, `calistung`) VALUES
	(1, 3, 'Y', 'Y', 'Y', 'Y'),
	(2, 4, 'T', 'Y', 'Y', 'Y'),
	(3, 5, 'Y', 'Y', 'T', 'Y'),
	(4, 6, 'T', 'T', 'Y', 'T'),
	(5, 7, 'T', 'Y', 'Y', 'Y'),
	(6, 8, 'T', 'T', 'Y', 'T'),
	(7, 9, 'Y', 'Y', 'Y', 'Y'),
	(8, 10, 'Y', 'Y', 'T', 'Y'),
	(9, 11, 'Y', 'Y', 'Y', 'Y'),
	(10, 12, 'Y', 'Y', 'Y', 'Y'),
	(11, 13, 'T', 'Y', 'T', 'Y'),
	(12, 14, 'T', 'T', 'T', 'Y'),
	(13, 15, 'Y', 'T', 'Y', 'T'),
	(14, 16, 'Y', 'T', 'T', 'Y'),
	(15, 17, 'Y', 'Y', 'Y', 'Y'),
	(16, 18, 'T', 'T', 'Y', 'T'),
	(17, 19, 'T', 'Y', 'T', 'T'),
	(18, 20, 'Y', 'Y', 'Y', 'Y'),
	(19, 21, 'Y', 'Y', 'Y', 'Y'),
	(20, 22, 'Y', 'Y', 'Y', 'Y'),
	(21, 23, 'Y', 'Y', 'Y', 'Y'),
	(22, 24, 'Y', 'Y', 'Y', 'Y'),
	(23, 25, 'Y', 'Y', 'Y', 'Y'),
	(24, 26, 'Y', 'Y', 'Y', 'Y'),
	(25, 27, 'Y', 'Y', 'Y', 'Y'),
	(26, 28, 'Y', 'Y', 'Y', 'Y'),
	(27, 29, 'Y', 'Y', 'Y', 'Y'),
	(28, 30, 'Y', 'Y', 'T', 'Y'),
	(29, 31, 'Y', 'Y', 'Y', 'Y'),
	(30, 32, 'Y', 'Y', 'Y', 'Y'),
	(31, 33, 'Y', 'Y', 'Y', 'Y'),
	(32, 34, 'Y', 'Y', 'Y', 'Y'),
	(33, 35, 'Y', 'Y', 'Y', 'Y'),
	(34, 36, 'Y', 'Y', 'Y', 'Y'),
	(35, 37, 'Y', 'Y', 'Y', 'Y'),
	(36, 38, 'Y', 'Y', 'Y', 'Y'),
	(37, 39, 'Y', 'Y', 'Y', 'Y'),
	(38, 40, 'Y', 'Y', 'Y', 'Y'),
	(39, 41, 'Y', 'Y', 'Y', 'Y'),
	(40, 42, 'Y', 'Y', 'Y', 'Y'),
	(41, 43, 'Y', 'Y', 'Y', 'Y'),
	(42, 44, 'Y', 'Y', 'Y', 'Y'),
	(43, 45, 'Y', 'Y', 'Y', 'Y'),
	(44, 46, 'Y', 'Y', 'Y', 'Y'),
	(45, 47, 'Y', 'Y', 'Y', 'Y'),
	(46, 48, 'Y', 'Y', 'Y', 'Y'),
	(47, 49, 'Y', 'Y', 'Y', 'Y'),
	(48, 50, 'Y', 'Y', 'Y', 'Y'),
	(49, 51, 'Y', 'Y', 'Y', 'Y'),
	(50, 52, 'Y', 'Y', 'Y', 'Y'),
	(51, 53, 'Y', 'Y', 'Y', 'Y'),
	(52, 54, 'Y', 'Y', 'Y', 'Y'),
	(53, 55, 'Y', 'Y', 'Y', 'Y'),
	(54, 56, 'Y', 'Y', 'Y', 'Y'),
	(55, 57, 'Y', 'Y', 'Y', 'Y'),
	(56, 58, 'Y', 'Y', 'Y', 'Y'),
	(57, 58, 'Y', 'Y', 'Y', 'Y'),
	(58, 59, 'Y', 'Y', 'Y', 'Y'),
	(59, 60, 'Y', 'Y', 'Y', 'Y'),
	(60, 61, 'Y', 'Y', 'Y', 'Y'),
	(61, 62, 'Y', 'Y', 'Y', 'Y'),
	(62, 63, 'Y', 'Y', 'Y', 'Y'),
	(63, 64, 'Y', 'Y', 'Y', 'Y'),
	(64, 65, 'Y', 'Y', 'Y', 'Y');

-- Dumping structure for table teamclov_demo_4.table_orang_tua
CREATE TABLE IF NOT EXISTS `table_orang_tua` (
  `id_orang_tua` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_orang_tua`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table teamclov_demo_4.table_orang_tua: ~52 rows (approximately)
INSERT INTO `table_orang_tua` (`id_orang_tua`, `id_anak`, `nama_ayah`, `nama_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`) VALUES
	(3, 3, 'MISWAR', 'NURI HIDAYATI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(4, 4, 'KHAIRUL', 'PITRIANI', 'SMA', 'S1', 'PETANI', 'GURU'),
	(5, 5, 'ABDULLAH', 'JULIANA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(6, 6, 'SADARI', 'RAHAYU', 'S1', 'SMA', 'GURU', 'IRT'),
	(7, 7, 'ABDULLAH', 'KHAIRANI', 'S1', 'S1', 'PERAWAT', 'GURU'),
	(8, 8, 'MAHMUDA', 'LENA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(9, 9, 'KAHFI', 'RINI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(10, 10, 'LINGE', 'KIKI', 'S1', 'S1', 'GURU', 'GURU'),
	(11, 11, 'JOKO', 'HIDAYANI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(12, 12, 'IWAN', 'ISDAMIATI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(13, 13, 'FIRMAN', 'DEWI', 'S1', 'S1', 'GURU', 'GURU'),
	(14, 14, 'SABDIN', 'MASTANI', 'S1', 'S1', 'GURU', 'GURU'),
	(15, 15, 'DIAN', 'JUNIA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(16, 16, 'DANI', 'MAIMUNAH', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(17, 17, 'ARMAN', 'MALA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(18, 18, 'JAFAR', 'MULYANI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(19, 19, 'SYUKURDI', 'RAHMA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(23, 23, 'DIKI', 'AIDA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(24, 24, 'ILHAM', 'LIANA', 'SMA', 'S1', 'PETANI', 'GURU'),
	(25, 25, 'ZAKI', 'DIANA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(26, 26, 'WIWIN', 'RENI', 'S1', 'SMA', 'GURU', 'IRT'),
	(27, 27, 'DUAN', 'KHAIRANI', 'S1', 'S1', 'PERAWAT', 'GURU'),
	(28, 28, 'JUL', 'LENI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(30, 30, 'LINGE', 'KIKI', 'S1', 'S1', 'GURU', 'GURU'),
	(31, 31, 'AYU', 'WIN', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(32, 32, 'IWAN', 'DWIKA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(33, 33, 'FIRMAN', 'DEWI', 'S1', 'S1', 'GURU', 'GURU'),
	(34, 34, 'SABDIN', 'MASTANI', 'S1', 'S1', 'GURU', 'GURU'),
	(35, 35, 'MIRDA', 'YASMIN', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(36, 36, 'FITRAH', 'JASIA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(37, 37, 'ARMAN', 'MALA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(38, 38, 'JAPAR', 'MULYANI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(39, 39, 'SYUKURDI', 'RAHMA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(40, 40, 'IWAN', 'DWIKA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(41, 41, 'FIRMAN', 'DEWI', 'S1', 'S1', 'GURU', 'GURU'),
	(42, 42, 'RENDI', 'AYNA', 'S1', 'S1', 'GURU', 'GURU'),
	(43, 43, 'DIAN', 'JUNIA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(44, 44, 'DANI', 'MAIMUNAH', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(45, 45, 'IYAN', 'PUTRI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(46, 46, 'JALI', 'DESI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(47, 47, 'JUS', 'DEVI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(48, 48, 'DANDI', 'REVA', 'SMA', 'S1', 'PETANI', 'GURU'),
	(49, 49, 'IQBAL', 'AYU', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(50, 50, 'RADEN', 'NURMA', 'SMA', 'S1', 'PETANI', 'GURU'),
	(51, 51, 'ANWAR', 'MUNA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(53, 53, 'SYAHRU', 'YANTI', 'S1', 'SMA', 'GURU', 'IRT'),
	(54, 54, 'RISKAN', 'NURI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(56, 56, 'JAMAL', 'RESTI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(61, 61, 'TONA', 'JAS', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(63, 63, 'ADAN', 'KIA', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(64, 64, 'DIKA', 'ARA', 'SMA', 'SMA', 'PETANI', 'IRT');

-- Dumping structure for table teamclov_demo_4.table_user
CREATE TABLE IF NOT EXISTS `table_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table teamclov_demo_4.table_user: ~0 rows (approximately)
INSERT INTO `table_user` (`id`, `username`, `password`) VALUES
	(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
