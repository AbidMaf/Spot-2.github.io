-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 12:35 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD PRIMARY KEY (`id_up_tugas`),
  ADD KEY `id_tugas` (`id_tugas`,`kd_matkul`),
  ADD KEY `npm` (`npm`),
  ADD KEY `kd_matkul` (`kd_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  MODIFY `id_up_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

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
