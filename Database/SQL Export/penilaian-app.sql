-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 10:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian-app`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getNFTugas` (IN `npmMhs` INT)  BEGIN

SELECT a.id_tugas, a.judul, b.id_materi, c.kd_matkul, c.nama_matkul, a.deadline, IF(NOW()>a.deadline, "Terlambat", "Belum Selesai") AS status FROM tugas AS a 
INNER JOIN materi AS b ON a.id_materi = b.id_materi 
INNER JOIN matakuliah AS c ON b.kd_matkul = c.kd_matkul 
WHERE a.id_tugas NOT IN(
    SELECT id_tugas FROM upload_tugas AS d 
    WHERE d.npm = npmMhs
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUploadedTugas` (IN `npmMhs` INT)  BEGIN 

SELECT a.id_tugas, b.judul, b.id_materi, c.kd_matkul, c.nama_matkul, b.deadline, "Selesai" AS status FROM upload_tugas AS a 
INNER JOIN tugas AS b ON a.id_tugas = b.id_tugas 
INNER JOIN matakuliah AS c ON a.kd_matkul = c.kd_matkul
WHERE a.npm = npmMhs;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getNilaiSummary` (`npmMhs` INT) RETURNS DECIMAL(5,2) BEGIN
DECLARE nTot decimal(5,2);

SELECT (SUM(ntugas) + SUM(nquiz) + SUM(nuts) + SUM(nuas)) / (COUNT(kd_matkul) * 4)  INTO nTot FROM nilai WHERE npm = npmMhs LIMIT 1;

RETURN nTot;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `setPredikat` (`nilaiTotal` DECIMAL(5,2)) RETURNS VARCHAR(4) CHARSET utf8mb4 BEGIN
DECLARE predikat varchar(4);

IF nilaiTotal BETWEEN 90.0 AND 100.0 THEN SET 
predikat = "A";
ELSEIF nilaiTotal BETWEEN 85.0 AND 89.0 THEN SET 
predikat = "A-";
ELSEIF nilaiTotal BETWEEN 80.0 AND 84.0 THEN SET 
predikat = "B+";
ELSEIF nilaiTotal BETWEEN 75.0 AND 79.0 THEN SET 
predikat = "B";
ELSEIF nilaiTotal BETWEEN 70.0 AND 74.0 THEN SET 
predikat = "B-";
ELSEIF nilaiTotal BETWEEN 65.0 AND 69.0 THEN SET 
predikat = "C+";
ELSEIF nilaiTotal BETWEEN 60.0 AND 64.0 THEN SET 
predikat = "C";
ELSEIF nilaiTotal BETWEEN 55.0 AND 59.0 THEN SET 
predikat = "D";
ELSE SET predikat = "E";
END IF;

RETURN predikat;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nid`, `name`, `avatar`) VALUES
(1234567, 'Dr. John Doe, S.Kom.m M.T.', 'profile_1234567.png'),
(7654321, 'Jafar', 'default.jpg');

--
-- Triggers `dosen`
--
DELIMITER $$
CREATE TRIGGER `deleteUserDosen` BEFORE DELETE ON `dosen` FOR EACH ROW BEGIN

DELETE FROM user WHERE username = OLD.nid;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `name`, `avatar`) VALUES
(2000053, 'DHAFIN RIZQULLAH HADIPUTRO', 'default.jpg'),
(2000065, 'NAUFAL FAWWAZ ANDRIAWAN', 'default.jpg'),
(2000078, 'ARYAPUTRA HAIDAR AKBAR', 'default.jpg'),
(2000388, 'MIFTAH FIRDAUS', 'default.jpg'),
(2000427, 'FAARIS MUDA DWI NUGRAHA', 'default.jpg'),
(2000637, 'ADRIAN SUGANDI WIJAYA', 'default.jpg'),
(2000649, 'ABID MAFAHIM', 'profile_2000649.png'),
(2000696, 'FATHONI ZIKRI NUGROHO', 'default.jpg'),
(2000746, 'DIMAS ADITYA PERMANA', 'default.jpg'),
(2000782, 'RAKA RYANDRA GUNTARA', 'default.jpg'),
(2001237, 'AFILA ANSORI', 'default.jpg'),
(2001518, 'SALMAN ALFARIZI', 'default.jpg'),
(2001657, 'ALI AZIZ FADILLAH', 'default.jpg'),
(2001711, 'IRHAM NUR ALIM', 'default.jpg'),
(2001764, 'NASSYA PUTRI RIYANI', 'default.jpg'),
(2002923, 'ARIF RAHMAN PAMUNGKAS', 'default.jpg'),
(2003015, 'CHINTANAKASIH AMARASULLY', 'default.jpg'),
(2003018, 'RADEN SURYA MENGGALA PUTRA', 'default.jpg'),
(2003286, 'TRI NUGRAHA PRAWIRA', 'default.jpg'),
(2003354, 'ALMIRA DARMA UTAMI FADILLAH', 'default.jpg'),
(2003425, 'MUHAMAD IKHSAN FIRDAUS', 'default.jpg'),
(2003652, 'ZHOFRON AL FAJR GUNARKO PUTRA', 'default.jpg'),
(2003657, 'SANJAYA WISNU RAMADHAN', 'default.jpg'),
(2003918, 'SANDI FAISAL FERDIANSYAH', 'default.jpg'),
(2003982, 'ALIFTA FURQONNADA NUGRAHA', 'default.jpg'),
(2004060, 'ADNAN ARSY AKBAR', 'default.jpg'),
(2004212, 'ALFIN MUHAMMAD ILMI', 'default.jpg'),
(2004310, 'NABILA INDHY NOVANIS', 'default.jpg'),
(2004488, 'RIVALDI AGUSTINUS NUGRAHA SIRINGORINGO', 'default.jpg'),
(2004717, 'AZZAHRA AYU VAHENDRA', 'default.jpg'),
(2005328, 'ADRIANUS INDRAPRASTA DWICAKSANA', 'default.jpg'),
(2006012, 'NERISSA ARVIANA SUKMANANDA', 'default.jpg'),
(2006080, 'ANGELINE MEGA KRISTINA', 'default.jpg'),
(2006434, 'MUHAMMAD YAHYA AYYASH', 'default.jpg'),
(2007530, 'REGY YOGA PRAMANA', 'default.jpg'),
(2008114, 'MUHAMMAD FADHLI TAQDIRUL JABBAR', 'default.jpg'),
(2008261, 'SURYANI LESTARI', 'default.jpg'),
(2008322, 'DHAFIN TAUFIQI', 'default.jpg'),
(2008752, 'RANGGA KALAM SIDIQ', 'default.jpg'),
(2009077, 'DIMAS AJISAKA KURNIAWAN', 'default.jpg');

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `deleteUserMhs` BEFORE DELETE ON `mahasiswa` FOR EACH ROW BEGIN

DELETE FROM user WHERE username = OLD.npm;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kd_matkul` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(10) UNSIGNED NOT NULL,
  `nid2` int(10) UNSIGNED NOT NULL,
  `nama_matkul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kd_matkul`, `nid`, `nid2`, `nama_matkul`, `description`, `sks`, `waktu`, `hari`) VALUES
('PT502', 1234567, 7654321, 'Sistem Operasi', 'Mata kuliah ini mengajarkan prinsip-prinsip dasar Internet dan teknologi yang dapat digunakan untuk membangun sebuah Aplikasi Internet. HTML dan CSS yang merupakan komponen dasar dari halaman web, merupakan dua topik pertama yang dibahas dalam mata kuliah ini. Mata kuliah ini kemudian membahas penampilan web secara dinamis menggunakan Javascript. Javascript juga merupakan dasar pemrograman Ajax yang juga akan diperkenalkan pada mata kuliah ini. Pemrograman dari sisi server juga akan dibahas dengan menggunakan bahasa PHP dan ASP. Mahasiswa juga diajarkan untuk menganalisis berbagai aspek kualitas pada aplikasi internet, seperti: usability, security, dan performance.', 3, '13:00:00', 'Senin'),
('RL209', 1234567, 7654321, 'Pemrograman Berorientasi Objek', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis hendrerit nibh, a porttitor nisl. Fusce nec mollis eros, vel egestas purus. Vivamus elit est, convallis non blandit eleifend, imperdiet a velit. Aliquam vulputate feugiat tellus vitae pellentesque. Curabitur vel diam tincidunt, gravida nibh sed, semper dui. Proin nec efficitur felis. Etiam ultrices ante a tempus ultricies.\r\n\r\nIn ultricies ornare condimentum. Duis sed velit ut diam imperdiet eleifend eu eu est. Mauris convallis, sem eget gravida pretium, nisi neque dignissim metus, a volutpat risus orci nec nulla. Nullam imperdiet, nisl a aliquam egestas, magna nisi interdum nibh, sed feugiat diam ex at nulla. Etiam quis scelerisque nisi, vel porttitor leo. Vivamus in ex tincidunt, blandit augue in, fermentum quam. Sed sem quam, lobortis eu mollis eu, porta at arcu. In vitae placerat ex. Mauris pharetra mi in arcu mattis vestibulum.', 3, '07:00:00', 'Jumat');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `kd_matkul` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` int(3) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `highlight` text NOT NULL,
  `deskripsi` text NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `kd_matkul`, `pertemuan`, `judul`, `highlight`, `deskripsi`, `last_update`) VALUES
(1, 'PT502', 1, 'Operasi Sistem', 'Pengertian Operasi Sistem|Fungsi Operasi Sistem|Contoh Operasi Sistem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis hendrerit nibh, a porttitor nisl. Fusce nec mollis eros, vel egestas purus. Vivamus elit est, convallis non blandit eleifend, imperdiet a velit. Aliquam vulputate feugiat tellus vitae pellentesque. Curabitur vel diam tincidunt, gravida nibh sed, semper dui. Proin nec efficitur felis. Etiam ultrices ante a tempus ultricies.\r\n\r\nIn ultricies ornare condimentum. Duis sed velit ut diam imperdiet eleifend eu eu est. Mauris convallis, sem eget gravida pretium, nisi neque dignissim metus, a volutpat risus orci nec nulla. Nullam imperdiet, nisl a aliquam egestas, magna nisi interdum nibh, sed feugiat diam ex at nulla. Etiam quis scelerisque nisi, vel porttitor leo. Vivamus in ex tincidunt, blandit augue in, fermentum quam. Sed sem quam, lobortis eu mollis eu, porta at arcu. In vitae placerat ex. Mauris pharetra mi in arcu mattis vestibulum.', '2022-05-23 03:14:24'),
(2, 'RL209', 1, 'CRUD MySQL', 'Select. Insert, Update, dan Delete|Contoh Query', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis hendrerit nibh, a porttitor nisl. Fusce nec mollis eros, vel egestas purus. Vivamus elit est, convallis non blandit eleifend, imperdiet a velit. Aliquam vulputate feugiat tellus vitae pellentesque. Curabitur vel diam tincidunt, gravida nibh sed, semper dui. Proin nec efficitur felis. Etiam ultrices ante a tempus ultricies.\r\n\r\nIn ultricies ornare condimentum. Duis sed velit ut diam imperdiet eleifend eu eu est. Mauris convallis, sem eget gravida pretium, nisi neque dignissim metus, a volutpat risus orci nec nulla. Nullam imperdiet, nisl a aliquam egestas, magna nisi interdum nibh, sed feugiat diam ex at nulla. Etiam quis scelerisque nisi, vel porttitor leo. Vivamus in ex tincidunt, blandit augue in, fermentum quam. Sed sem quam, lobortis eu mollis eu, porta at arcu. In vitae placerat ex. Mauris pharetra mi in arcu mattis vestibulum.', '2022-05-24 08:59:42'),
(3, 'RL209', 2, 'Connection', 'MySQL Connection|Contoh Syntax', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis hendrerit nibh, a porttitor nisl. Fusce nec mollis eros, vel egestas purus. Vivamus elit est, convallis non blandit eleifend, imperdiet a velit. Aliquam vulputate feugiat tellus vitae pellentesque. Curabitur vel diam tincidunt, gravida nibh sed, semper dui. Proin nec efficitur felis. Etiam ultrices ante a tempus ultricies.\r\n\r\nIn ultricies ornare condimentum. Duis sed velit ut diam imperdiet eleifend eu eu est. Mauris convallis, sem eget gravida pretium, nisi neque dignissim metus, a volutpat risus orci nec nulla. Nullam imperdiet, nisl a aliquam egestas, magna nisi interdum nibh, sed feugiat diam ex at nulla. Etiam quis scelerisque nisi, vel porttitor leo. Vivamus in ex tincidunt, blandit augue in, fermentum quam. Sed sem quam, lobortis eu mollis eu, porta at arcu. In vitae placerat ex. Mauris pharetra mi in arcu mattis vestibulum.', '2022-05-22 08:59:42'),
(4, 'PT502', 2, 'Yes', 'Yeet', 'lor', '2022-05-24 03:07:13'),
(5, 'PT502', 3, 'Bash Scripting', 'Bash|Scripting', 'Need to test it more, but seems it`s works! Thank you so much! :) Now i will use your patter for finding all liks and checking them for files, whole idea to find all file links, but, now some sites like to do pretty links like test.com/superfile without extension, so this code can help me a lot :) - \r\nswamprunner7\r\n Apr 29, 2014 at', '2022-05-25 02:27:24');

--
-- Triggers `materi`
--
DELIMITER $$
CREATE TRIGGER `deleteTugas` BEFORE DELETE ON `materi` FOR EACH ROW BEGIN 
DELETE FROM tugas WHERE id_materi = old.id_materi;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_03_18_091449_mahasiswa', 1),
(3, '2022_03_18_095446_dosen', 1),
(4, '2022_03_18_102320_mata_kuliah', 1),
(5, '2022_03_18_102646_nilai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) UNSIGNED NOT NULL,
  `npm` int(10) UNSIGNED NOT NULL,
  `kd_matkul` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ntugas` int(11) DEFAULT 0,
  `nquiz` int(11) DEFAULT 0,
  `nuts` int(11) DEFAULT 0,
  `nuas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `npm`, `kd_matkul`, `ntugas`, `nquiz`, `nuts`, `nuas`) VALUES
(1, 2000649, 'PT502', 43, 90, 89, 94),
(2, 2000053, 'PT502', 2, 52, 64, 42),
(3, 2000649, 'RL209', 0, 98, 95, 90);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` datetime NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `judul`, `deskripsi`, `deadline`, `id_materi`) VALUES
(1, 'Membuat Operasi Sistem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis hendrerit nibh, a porttitor nisl. Fusce nec mollis eros, vel egestas purus. Vivamus elit est, convallis non blandit eleifend, imperdiet a velit. Aliquam vulputate feugiat tellus vitae pellentesque. Curabitur vel diam tincidunt, gravida nibh sed, semper dui. Proin nec efficitur felis. Etiam ultrices ante a tempus ultricies.\r\n\r\nIn ultricies ornare condimentum. Duis sed velit ut diam imperdiet eleifend eu eu est. Mauris convallis, sem eget gravida pretium, nisi neque dignissim metus, a volutpat risus orci nec nulla. Nullam imperdiet, nisl a aliquam egestas, magna nisi interdum nibh, sed feugiat diam ex at nulla. Etiam quis scelerisque nisi, vel porttitor leo. Vivamus in ex tincidunt, blandit augue in, fermentum quam. Sed sem quam, lobortis eu mollis eu, porta at arcu. In vitae placerat ex. Mauris pharetra mi in arcu mattis vestibulum.', '2022-05-31 08:17:58', 1),
(2, 'Tugas 1', 'Buatlah superapp mengalahkan game pou', '2022-05-24 14:22:16', 2),
(3, 'as', 'deck', '2022-05-23 08:07:35', 4),
(4, 'Inheritance, Polymorphism, dan Fish', 'https://www.youtube.com/c/adhesi', '2022-05-27 02:13:18', 3),
(5, 's', 'sasasasas', '2022-05-29 07:30:20', 5);

--
-- Triggers `tugas`
--
DELIMITER $$
CREATE TRIGGER `deleteUpoad` BEFORE DELETE ON `tugas` FOR EACH ROW BEGIN

DELETE FROM upload_tugas WHERE id_tugas = old.id_tugas;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `upload_tugas`
--

CREATE TABLE `upload_tugas` (
  `id_up_tugas` int(11) NOT NULL,
  `npm` int(10) UNSIGNED NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `kd_matkul` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_tugas`
--

INSERT INTO `upload_tugas` (`id_up_tugas`, `npm`, `id_tugas`, `kd_matkul`, `file`, `nilai`, `last_updated`) VALUES
(14, 2000649, 1, 'PT502', '1_2000649_Screenshot+2.jpg', 80, '2022-06-11 15:03:00'),
(15, 2000649, 3, 'PT502', '3_2000649.png', 90, '2022-06-11 15:34:35'),
(16, 2000053, 1, 'PT502', '1_2000053.jpeg', 0, '2022-06-11 15:34:35');

--
-- Triggers `upload_tugas`
--
DELIMITER $$
CREATE TRIGGER `countNTugas` AFTER UPDATE ON `upload_tugas` FOR EACH ROW BEGIN

DECLARE countTugas int;

SELECT COUNT(a.id_tugas) INTO countTugas 
FROM tugas AS a 
INNER JOIN materi AS b 
ON a.id_materi = b.id_materi 
WHERE b.kd_matkul = new.kd_matkul LIMIT 1;

UPDATE nilai SET ntugas = (ntugas + new.nilai) / countTugas WHERE npm = new.npm AND kd_matkul = new.kd_matkul;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editNTugas` AFTER INSERT ON `upload_tugas` FOR EACH ROW BEGIN

DECLARE countTugas int;

SELECT COUNT(a.id_tugas) INTO countTugas 
FROM tugas AS a 
INNER JOIN materi AS b 
ON a.id_materi = b.id_materi 
WHERE b.kd_matkul = new.kd_matkul LIMIT 1;

UPDATE nilai SET ntugas = (ntugas + new.nilai) / countTugas WHERE npm = new.npm AND kd_matkul = new.kd_matkul;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('mahasiswa','dosen','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, '2000053', '8a4ad55', 'mahasiswa'),
(2, '2000065', '181117c', 'mahasiswa'),
(3, '2000078', 'e031b52', 'mahasiswa'),
(4, '2000388', '53bb5d4', 'mahasiswa'),
(5, '2000427', '7810209', 'mahasiswa'),
(6, '2000637', 'fb09b4c', 'mahasiswa'),
(7, '2000649', '12345678', 'mahasiswa'),
(8, '2000696', '07d20c2', 'mahasiswa'),
(9, '2000746', '0c12900', 'mahasiswa'),
(10, '2000782', 'da3c3ba', 'mahasiswa'),
(11, '2001237', '3e8e292', 'mahasiswa'),
(12, '2001518', '63d2650', 'mahasiswa'),
(13, '2001657', '0c55469', 'mahasiswa'),
(14, '2001711', '9a1bab2', 'mahasiswa'),
(15, '2001764', 'd5a1026', 'mahasiswa'),
(16, '2002923', 'f1ad7ad', 'mahasiswa'),
(17, '2003015', '51d13b5', 'mahasiswa'),
(18, '2003018', 'ca29318', 'mahasiswa'),
(19, '2003286', '0b4e74f', 'mahasiswa'),
(20, '2003354', 'f712f7c', 'mahasiswa'),
(21, '2003425', 'e5008c5', 'mahasiswa'),
(22, '2003652', '8cb2921', 'mahasiswa'),
(23, '2003657', '9de0b90', 'mahasiswa'),
(24, '2003918', '348e513', 'mahasiswa'),
(25, '2003982', '0d01b68', 'mahasiswa'),
(26, '2004060', '6160746', 'mahasiswa'),
(27, '2004212', '3e898e8', 'mahasiswa'),
(28, '2004310', '90141b8', 'mahasiswa'),
(29, '2004488', 'ba2e858', 'mahasiswa'),
(30, '2004717', 'b688c0d', 'mahasiswa'),
(31, '2005328', 'e8d148e', 'mahasiswa'),
(32, '2006012', '8d4313d', 'mahasiswa'),
(33, '2006080', '869e2c7', 'mahasiswa'),
(34, '2006434', 'b886245', 'mahasiswa'),
(35, '2007530', '2aa29bf', 'mahasiswa'),
(36, '2008114', '7ea04eb', 'mahasiswa'),
(37, '2008261', '463dce9', 'mahasiswa'),
(38, '2008322', 'c68fd25', 'mahasiswa'),
(39, '2008752', '921c48a', 'mahasiswa'),
(40, '2009077', '5bdc572', 'mahasiswa'),
(64, '1234567', '3240f3f', 'dosen'),
(65, '7654321', '479096a', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kd_matkul`),
  ADD KEY `nid2` (`nid2`),
  ADD KEY `nid` (`nid`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `kd_matkul` (`kd_matkul`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nilai_npm_foreign` (`npm`),
  ADD KEY `nilai_kd_matkul_foreign` (`kd_matkul`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD PRIMARY KEY (`id_up_tugas`),
  ADD KEY `id_tugas` (`id_tugas`,`kd_matkul`),
  ADD KEY `npm` (`npm`),
  ADD KEY `kd_matkul` (`kd_matkul`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7654322;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `npm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2009078;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  MODIFY `id_up_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`kd_matkul`) REFERENCES `matakuliah` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_kd_matkul_foreign` FOREIGN KEY (`kd_matkul`) REFERENCES `matakuliah` (`kd_matkul`),
  ADD CONSTRAINT `nilai_npm_foreign` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE;

--
-- Constraints for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD CONSTRAINT `upload_tugas_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upload_tugas_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`),
  ADD CONSTRAINT `upload_tugas_ibfk_3` FOREIGN KEY (`kd_matkul`) REFERENCES `matakuliah` (`kd_matkul`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
