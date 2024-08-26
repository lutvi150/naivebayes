-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for naivebayes
CREATE DATABASE IF NOT EXISTS `naivebayes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `naivebayes`;

-- Dumping structure for table naivebayes.data
CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama_data` varchar(255) DEFAULT NULL,
  `tanggal_hitung` varchar(50) DEFAULT NULL,
  `jumlah_data` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table naivebayes.data: ~2 rows (approximately)
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` (`id_data`, `nama_data`, `tanggal_hitung`, `jumlah_data`) VALUES
	(2, 'Tes Data1', '2024-08-25 09:41:31', 0),
	(3, 'tes 5', '2024-08-25 09:44:22', 0);
/*!40000 ALTER TABLE `data` ENABLE KEYS */;

-- Dumping structure for table naivebayes.table_anak
CREATE TABLE IF NOT EXISTS `table_anak` (
  `id_anak` int(11) NOT NULL AUTO_INCREMENT,
  `id_sample` int(11) DEFAULT NULL,
  `nama_anak` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(3) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `nst` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_anak`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table naivebayes.table_anak: ~17 rows (approximately)
/*!40000 ALTER TABLE `table_anak` DISABLE KEYS */;
INSERT INTO `table_anak` (`id_anak`, `id_sample`, `nama_anak`, `jenis_kelamin`, `umur`, `nst`, `keterangan`) VALUES
	(3, 3, 'ALIFA NAUFALYN', 'P', 6, 65, 'SIAP'),
	(4, 3, 'SAKINAH', 'P', 6, 64, 'SIAP'),
	(5, 3, 'RAFASHA RISKI', 'L', 6, 66, 'SIAP'),
	(6, 3, 'FAEZYA', 'L', 5, 45, 'BELUM'),
	(7, 3, 'ALIYA HUSNA', 'P', 6, 56, 'SIAP'),
	(8, 3, 'REZALDI', 'L', 5, 40, 'BELUM'),
	(9, 3, 'EAIHAN AL SABDA', 'L', 6, 67, 'SIAP'),
	(10, 3, 'NAZRIL', 'L', 6, 62, 'SIAP'),
	(11, 3, 'ALIYA SAKIRA PUTRI', 'P', 6, 64, 'SIAP'),
	(12, 3, 'ALFIN  AL GIFARI', 'L', 6, 64, 'SIAP'),
	(13, 3, 'ADELIA SAHIRA', 'P', 6, 57, 'SIAP'),
	(14, 3, 'MARYA', 'P', 6, 59, 'SIAP'),
	(15, 3, 'ZHAFIRA AZZARA', 'P', 6, 67, 'SIAP'),
	(16, 3, 'KHAIRA NAFISAH', 'P', 6, 55, 'SIAP'),
	(17, 3, 'ALYA FARISHA', 'P', 6, 65, 'SIAP'),
	(18, 3, 'ANDYRA NAIFA', 'P', 5, 40, 'BELUM'),
	(19, 3, 'MEISYA ALIFYA', 'P', 6, 55, 'SIAP');
/*!40000 ALTER TABLE `table_anak` ENABLE KEYS */;

-- Dumping structure for table naivebayes.table_orang_tua
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table naivebayes.table_orang_tua: ~18 rows (approximately)
/*!40000 ALTER TABLE `table_orang_tua` DISABLE KEYS */;
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
	(17, 17, 'ARMAN', 'MALA', 'SMA', 'SMA', 'PETANI', 'PERAWAT'),
	(18, 18, 'JAFAR', 'MULYANI', 'SMA', 'SMA', 'PETANI', 'IRT'),
	(19, 19, 'SYUKURDI', 'RAHMA', 'SMA', 'SMA', 'PETANI', 'IRT');
/*!40000 ALTER TABLE `table_orang_tua` ENABLE KEYS */;

-- Dumping structure for table naivebayes.table_user
CREATE TABLE IF NOT EXISTS `table_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table naivebayes.table_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` (`id`, `username`, `password`) VALUES
	(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
