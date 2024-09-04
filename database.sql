-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2024 at 09:40 PM
-- Server version: 10.6.18-MariaDB-cll-lve-log
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamclov_demo_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `nama_data` varchar(255) DEFAULT NULL,
  `tanggal_hitung` varchar(50) DEFAULT NULL,
  `jumlah_data` int(11) DEFAULT NULL,
  `data_analisis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `nama_data`, `tanggal_hitung`, `jumlah_data`, `data_analisis`) VALUES
(2, 'Tes Data1', '2024-08-25 09:41:31', 0, NULL),
(3, 'tes 5', '2024-08-25 09:44:22', 0, '{\"time_execution\":0.034928083419799805,\"id_sample\":\"3\",\"data_testing\":{\"atribut_kelas\":{\"siap\":27,\"belum_siap\":6},\"atribut_jenis_kelamin\":{\"siap\":{\"laki_laki\":14,\"perempuan\":13},\"belum_siap\":{\"laki_laki\":4,\"perempuan\":2}},\"atribut_usia\":{\"siap\":{\"5\":0,\"6\":27},\"belum_siap\":{\"5\":3,\"6\":3}},\"atribut_emosional\":{\"y\":{\"siap\":26,\"belum_siap\":4},\"t\":{\"siap\":0,\"belum_siap\":2}},\"atribut_kognitif\":{\"y\":{\"siap\":27,\"belum_siap\":3},\"t\":{\"siap\":0,\"belum_siap\":3}},\"atribut_sosial\":{\"y\":{\"siap\":22,\"belum_siap\":6},\"t\":{\"siap\":5,\"belum_siap\":0}},\"atribut_calistung\":{\"y\":{\"siap\":27,\"belum_siap\":3},\"t\":{\"siap\":0,\"belum_siap\":3}},\"probabilitas_kelas\":{\"siap\":\"27\\/33\",\"belum_siap\":\"6\\/33\",\"siap_count\":0.8182,\"belum_siap_count\":0.1818},\"probabilitas_jenis_kelamin\":{\"laki_laki\":{\"jenis_kelamin\":\"laki-laki\",\"siap\":\"14\\/27\",\"belum_siap\":\"4\\/6\",\"siap_count\":0.5185,\"belum_siap_count\":0.6667},\"perempuan\":{\"jenis_kelamin\":\"perempuan\",\"siap\":\"13\\/27\",\"belum_siap\":\"2\\/6\",\"siap_count\":0.4815,\"belum_siap_count\":0.3333}},\"probabilitas_usia\":{\"5\":{\"keterangan\":\"5 Tahun\",\"siap\":\"0\\/27\",\"belum_siap\":\"3\\/6\",\"siap_count\":0,\"belum_siap_count\":0.5},\"6\":{\"keterangan\":\"6 Tahun\",\"siap\":\"27\\/27\",\"belum_siap\":\"3\\/6\",\"siap_count\":1,\"belum_siap_count\":0.5}},\"probabilitas_emosional\":{\"y\":{\"keterangan\":\"Ya\",\"siap\":\"26\\/27\",\"belum_siap\":\"4\\/6\",\"siap_count\":0.963,\"belum_siap_count\":0.6667},\"t\":{\"keterangan\":\"Tidak\",\"siap\":\"0\\/27\",\"belum_siap\":\"2\\/6\",\"siap_count\":0,\"belum_siap_count\":0.3333}},\"probabilitas_kognitif\":{\"y\":{\"keterangan\":\"Ya\",\"siap\":\"27\\/27\",\"belum_siap\":\"3\\/6\",\"siap_count\":1,\"belum_siap_count\":0.5},\"t\":{\"keterangan\":\"Tidak\",\"siap\":\"0\\/27\",\"belum_siap\":\"3\\/6\",\"siap_count\":0,\"belum_siap_count\":0.5}},\"probabilitas_sosial\":{\"y\":{\"keterangan\":\"Ya\",\"siap\":\"22\\/27\",\"belum_siap\":\"6\\/6\",\"siap_count\":0.8148,\"belum_siap_count\":1},\"t\":{\"keterangan\":\"Tidak\",\"siap\":\"5\\/27\",\"belum_siap\":\"0\\/6\",\"siap_count\":0.1852,\"belum_siap_count\":0}},\"probabilitas_calistung\":{\"y\":{\"keterangan\":\"Ya\",\"siap\":\"27\\/27\",\"belum_siap\":\"3\\/6\",\"siap_count\":1,\"belum_siap_count\":0.5},\"t\":{\"keterangan\":\"Tidak\",\"siap\":\"0\\/27\",\"belum_siap\":\"3\\/6\",\"siap_count\":0,\"belum_siap_count\":0.5}}}}');

-- --------------------------------------------------------

--
-- Table structure for table `table_anak`
--

CREATE TABLE `table_anak` (
  `id_anak` int(11) NOT NULL,
  `id_sample` int(11) DEFAULT NULL,
  `nama_anak` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(3) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `nst` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `foto_anak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_anak`
--

INSERT INTO `table_anak` (`id_anak`, `id_sample`, `nama_anak`, `jenis_kelamin`, `umur`, `nst`, `keterangan`, `foto_anak`) VALUES
(3, 3, 'ALIFA NAUFALYN', 'P', 6, 65, 'SIAP', NULL),
(4, 3, 'SAKINAH', 'P', 6, 64, 'SIAP', NULL),
(5, 3, 'RAFASHA RISKI', 'L', 6, 66, 'SIAP', NULL),
(6, 3, 'FAEZYA', 'L', 5, 45, 'BELUM', NULL),
(7, 3, 'ALIYA HUSNA', 'P', 6, 56, 'SIAP', NULL),
(8, 3, 'REZALDI', 'L', 5, 40, 'BELUM', NULL),
(9, 3, 'EAIHAN AL SABDA', 'L', 6, 67, 'SIAP', NULL),
(10, 3, 'NAZRIL', 'L', 6, 62, 'SIAP', NULL),
(11, 3, 'ALIYA SAKIRA PUTRI', 'P', 6, 64, 'SIAP', NULL),
(12, 3, 'ALFIN  AL GIFARI', 'L', 6, 64, 'SIAP', NULL),
(13, 3, 'ADELIA SAHIRA', 'P', 6, 57, 'SIAP', NULL),
(14, 3, 'MARYA', 'P', 6, 59, 'SIAP', NULL),
(15, 3, 'ZHAFIRA AZZARA', 'P', 6, 67, 'SIAP', NULL),
(16, 3, 'KHAIRA NAFISAH', 'P', 6, 55, 'SIAP', NULL),
(17, 3, 'ALYA FARISHA', 'P', 6, 65, 'SIAP', NULL),
(18, 3, 'ANDYRA NAIFA', 'P', 5, 40, 'BELUM', NULL),
(19, 3, 'MEISYA ALIFYA', 'P', 6, 55, 'SIAP', 'uploads/foto_anak/706d80a11603da153b6012ef2f48f29c.jpg'),
(23, 3, 'ALPIAN MAHARA', 'L', 6, 65, 'SIAP', NULL),
(24, 3, 'RAIMA NADIRA', 'P', 6, 64, 'SIAP', NULL),
(25, 3, 'KEISYA ALFIKA', 'P', 6, 66, 'SIAP', NULL),
(26, 3, 'MAHDALENA', 'P', 6, 45, 'BELUM', NULL),
(27, 3, 'RAFA HAZIQ', 'L', 6, 56, 'SIAP', NULL),
(28, 3, 'RANDI', 'L', 6, 40, 'BELUM', NULL),
(29, 3, 'NABILA PUTRI', 'P', 6, 67, 'SIAP', NULL),
(30, 3, 'NAZRIL', 'L', 6, 62, 'SIAP', NULL),
(31, 3, 'ALVIANI', 'L', 6, 64, 'SIAP', NULL),
(32, 3, 'AZKA MAULANA', 'L', 6, 64, 'SIAP', NULL),
(33, 3, 'ALBY LUTFI', 'L', 6, 57, 'SIAP', NULL),
(34, 3, 'INDRA', 'L', 6, 59, 'SIAP', NULL),
(35, 3, 'AGUS', 'L', 6, 67, 'SIAP', NULL),
(36, 3, 'SETIAWAN PUTRA', 'L', 6, 55, 'SIAP', NULL),
(37, 3, 'SYAHDU ANGGRAINI', 'L', 6, 65, 'SIAP', NULL),
(38, 3, 'AUFA QALIKA', 'L', 6, 40, 'BELUM', NULL),
(39, 3, 'QUENSA', 'P', 6, 555, 'SIAP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_kemampuan_anak`
--

CREATE TABLE `table_kemampuan_anak` (
  `id_kemampuan` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL DEFAULT 0,
  `emosional` varchar(2) DEFAULT NULL,
  `kognitif` varchar(2) DEFAULT NULL,
  `sosial` varchar(2) DEFAULT NULL,
  `calistung` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_kemampuan_anak`
--

INSERT INTO `table_kemampuan_anak` (`id_kemampuan`, `id_anak`, `emosional`, `kognitif`, `sosial`, `calistung`) VALUES
(1, 3, 'Y', 'Y', 'Y', 'Y'),
(2, 4, 'Y', 'Y', 'Y', 'Y'),
(3, 5, 'Y', 'Y', 'T', 'Y'),
(4, 6, 'T', 'T', 'Y', 'T'),
(5, 7, 'Y', 'Y', 'Y', 'Y'),
(6, 8, 'T', 'T', 'Y', 'T'),
(7, 9, 'Y', 'Y', 'Y', 'Y'),
(8, 10, 'Y', 'Y', 'T', 'Y'),
(9, 11, 'Y', 'Y', 'Y', 'Y'),
(10, 12, 'Y', 'Y', 'Y', 'Y'),
(11, 13, 'Y', 'Y', 'T', 'Y'),
(12, 14, 'Y', 'Y', 'T', 'Y'),
(13, 15, 'Y', 'Y', 'Y', 'Y'),
(14, 16, 'Y', 'Y', 'T', 'Y'),
(15, 17, 'Y', 'Y', 'Y', 'Y'),
(16, 18, 'Y', 'T', 'Y', 'T'),
(17, 19, 'N', 'Y', 'Y', 'Y'),
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
(28, 30, 'Y', 'Y', 'Y', 'Y'),
(29, 31, 'Y', 'Y', 'Y', 'Y'),
(30, 32, 'Y', 'Y', 'Y', 'Y'),
(31, 33, 'Y', 'Y', 'Y', 'Y'),
(32, 34, 'Y', 'Y', 'Y', 'Y'),
(33, 35, 'Y', 'Y', 'Y', 'Y'),
(34, 36, 'Y', 'Y', 'Y', 'Y'),
(35, 37, 'Y', 'Y', 'Y', 'Y'),
(36, 38, 'Y', 'Y', 'Y', 'Y'),
(37, 39, 'Y', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `table_orang_tua`
--

CREATE TABLE `table_orang_tua` (
  `id_orang_tua` int(11) NOT NULL,
  `id_anak` int(11) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_orang_tua`
--

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
(19, 19, 'SYUKURDI', 'RAHMA', 'SMA', 'SMA', 'PETANI', 'IRT'),
(23, 23, 'DIKI', 'AIDA', 'SMA', 'SMA', 'PETANI', 'IRT'),
(24, 24, 'ILHAM', 'LIANA', 'SMA', 'S1', 'PETANI', 'GURU'),
(25, 25, 'ZAKI', 'DIANA', 'SMA', 'SMA', 'PETANI', 'IRT'),
(26, 26, 'WIWIN', 'RENI', 'S1', 'SMA', 'GURU', 'IRT'),
(27, 27, 'DUAN', 'KHAIRANI', 'S1', 'S1', 'PERAWAT', 'GURU'),
(28, 28, 'JUL', 'LENI', 'SMA', 'SMA', 'PETANI', 'IRT'),
(29, 29, 'JAMAL', 'RESTI', 'SMA', 'SMA', 'PETANI', 'IRT'),
(30, 30, 'LINGE', 'KIKI', 'S1', 'S1', 'GURU', 'GURU'),
(31, 31, 'AYU', 'WIN', 'SMA', 'SMA', 'PETANI', 'IRT'),
(32, 32, 'IWAN', 'DWIKA', 'SMA', 'SMA', 'PETANI', 'IRT'),
(33, 33, 'FIRMAN', 'DEWI', 'S1', 'S1', 'GURU', 'GURU'),
(34, 34, 'SABDIN', 'MASTANI', 'S1', 'S1', 'GURU', 'GURU'),
(35, 35, 'MIRDA', 'YASMIN', 'SMA', 'SMA', 'PETANI', 'IRT'),
(36, 36, 'FITRAH', 'JASIA', 'SMA', 'SMA', 'PETANI', 'IRT'),
(37, 37, 'ARMAN', 'MALA', 'SMA', 'SMA', 'PETANI', 'IRT'),
(38, 38, 'JAPAR', 'MULYANI', 'SMA', 'SMA', 'PETANI', 'IRT'),
(39, 39, 'SYUKURDI', 'RAHMA', 'SMA', 'SMA', 'PETANI', 'IRT');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `table_anak`
--
ALTER TABLE `table_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `table_kemampuan_anak`
--
ALTER TABLE `table_kemampuan_anak`
  ADD PRIMARY KEY (`id_kemampuan`);

--
-- Indexes for table `table_orang_tua`
--
ALTER TABLE `table_orang_tua`
  ADD PRIMARY KEY (`id_orang_tua`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_anak`
--
ALTER TABLE `table_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `table_kemampuan_anak`
--
ALTER TABLE `table_kemampuan_anak`
  MODIFY `id_kemampuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `table_orang_tua`
--
ALTER TABLE `table_orang_tua`
  MODIFY `id_orang_tua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
