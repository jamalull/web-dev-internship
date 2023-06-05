-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 05:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `ttl` varchar(150) NOT NULL,
  `alamat` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `ttl`, `alamat`) VALUES
(181051100, 'Aldo Maaruf', 'Pria', 'Malang, 18 January 1998', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051101, 'Edo Febriansyah', 'Pria', 'Bekasi, 18 January 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051102, 'Adi Afthailah', 'Pria', 'Bogor, 19 Maret 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051103, 'Rama Fadill', 'Pria', 'Depok, 20 Desember 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051104, 'Denny Rachmat', 'Pria', 'Bekasi, 21 April 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051105, 'Alex Jovuska', 'Pria', 'Solo, 22 January 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051106, 'Andin Salsabila', 'Wanita', 'Jakarta, 23 Desember 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051107, 'Aurorra Eskova', 'Wanita', 'Jakarta, 24 Maret 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051108, 'Miranti Syauma', 'Wanita', 'Bekasi, 25 Desember 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051109, 'Hanan Nabila', 'Wanita', 'Tangerang, 26 April 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550'),
(181051110, 'Sisca Pricilla', 'Wanita', 'Bekasi, 27 Maret 2000', 'Jl.Bekasi Raya Gg.Makmur RT 4 RW 5, Bekasi Timur, 14550');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` int(150) NOT NULL,
  `nama_mk` varchar(250) NOT NULL,
  `sks` int(50) NOT NULL,
  `semester` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`, `semester`) VALUES
(1000, 'Basis Data', 4, 1),
(1001, 'Struktur Data', 3, 3),
(1002, 'Pendidikan Agama', 4, 4),
(1003, 'Pemrograman Web', 4, 5),
(1004, 'Analisis Algoritma', 4, 3),
(1005, 'OOP', 4, 5),
(1006, 'Algoritma', 3, 4),
(1007, 'Dasar Pemrograman', 4, 2),
(1008, 'Skripsi', 6, 8),
(1009, 'Proposal Penelitian', 6, 7),
(1010, 'Basis Data', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nim` int(11) NOT NULL,
  `kode_mk` int(150) NOT NULL,
  `uts` int(100) NOT NULL,
  `uas` int(100) NOT NULL,
  `nilai_akhir` int(100) NOT NULL,
  `grade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nim`, `kode_mk`, `uts`, `uas`, `nilai_akhir`, `grade`) VALUES
(181051100, 1000, 80, 85, 80, 'A'),
(181051101, 1001, 70, 88, 78, 'B'),
(181051102, 1002, 60, 76, 70, 'B'),
(181051103, 1003, 75, 90, 80, 'A'),
(181051104, 1004, 73, 90, 80, 'A'),
(181051105, 1005, 68, 85, 79, 'B'),
(181051106, 1006, 85, 80, 82, 'A'),
(181051107, 1007, 79, 78, 83, 'A'),
(181051108, 1008, 83, 78, 80, 'A'),
(181051109, 1009, 70, 85, 84, 'A'),
(181051110, 1010, 70, 87, 85, 'A'),
(181051111, 1000, 80, 85, 80, 'A'),
(181051112, 1001, 70, 88, 78, 'B'),
(181051113, 1002, 60, 76, 70, 'B'),
(181051114, 1003, 75, 90, 80, 'A'),
(181051115, 1004, 73, 90, 80, 'A'),
(181051116, 1005, 68, 85, 79, 'B'),
(181051117, 1006, 85, 80, 82, 'A'),
(181051118, 1007, 79, 78, 83, 'A'),
(181051119, 1008, 83, 78, 80, 'A'),
(181051120, 1009, 70, 85, 84, 'A'),
(181051121, 1010, 70, 87, 85, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
