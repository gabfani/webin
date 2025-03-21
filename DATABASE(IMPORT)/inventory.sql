-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 08:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama`, `telepon`, `foto`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0812838281', '22092020020607employee1.png'),
(19, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user 1', '0812838281', '22092020020520employee3.png'),
(20, 'admin1', '80177534a0c99a7e3645b52f2027a48b', 'adminmin', '', '140320250718360d7ae790097d16eb9a9299809abf7f45.jpg'),
(21, 'min1', '21232f297a57a5a743894a0e4a801fc3', 'minmin', '', '19032025035115136879631295270573notas-hi-59f8a3875169955898185182.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ajuan`
--

CREATE TABLE `tb_ajuan` (
  `no_ajuan` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ajuan`
--

INSERT INTO `tb_ajuan` (`no_ajuan`, `tanggal`, `kode_brg`, `nama_brg`, `stok`, `jml_ajuan`, `jml_keluar`, `petugas`, `val`) VALUES
(998, '2025-03-07', '88821', 'RAM DDR10 1024 GB', 8, 3, 0, 'Petugas', 0),
(999, '2025-03-07', '99103', 'Laptop Rock', 8, 2, 0, 'Petugas', 0),
(1000, '2025-03-07', '99102', 'Handphone T34', 47, 23, 0, 'Petugas', 0),
(1001, '2025-03-09', '88821', 'RAM DDR10 1024 GB', 6, 2, 0, 'Petugas', 0),
(1002, '2025-03-09', '88821', 'RAM DDR10 1024 GB', 6, 2, 0, 'Petugas', 0),
(1003, '2025-03-09', '88821', 'RAM DDR10 1024 GB', 5, 1, 0, 'Petugas', 0),
(1004, '2025-03-10', '88821', 'RAM DDR10 1024 GB', 2, 4, 0, 'Petugas', 0),
(1005, '2025-03-10', '99105', 'Handphone Maus', 12, 1, 0, 'Petugas', 0),
(1006, '2025-03-10', '99105', 'Handphone Maus', 12, 1, 0, 'Petugas', 0),
(1007, '2025-03-10', '88821', 'RAM DDR10 1024 GB', 3, 2, 0, 'Petugas', 0),
(1008, '2025-03-12', '99105', 'Handphone Maus', 11, 1, 0, 'Petugas', 0),
(1009, '2025-03-12', '99103', 'Laptop Rock', 7, 2, 0, 'Petugas', 0),
(1010, '2025-03-12', '99102', 'Handphone T34', 45, 4, 0, 'Petugas', 0),
(1011, '2025-03-12', '92938', 'Ssd IOS 1 tb', 86, 2, 0, 'Petugas', 0),
(1012, '2025-03-14', '92938', 'Ssd IOS 1 tb', 74, 12, 0, 'gabyella', 0),
(1013, '2025-03-14', '99105', 'Handphone Maus', 11, 1, 0, 'gabyella', 0),
(1014, '2025-03-14', '88821', 'RAM DDR10 1024 GB', 6, 4, 0, 'gabyella', 0),
(1015, '2025-03-20', '92938', 'Ssd IOS 1 tb', 71, 5, 0, 'gabyella', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_brg`, `nama_brg`, `stok`, `rak`, `supplier`) VALUES
(88821, 'RAM DDR10 1024 GB', 5, 'RAK 001', 'CV.Abadi Sentosa'),
(92938, 'Ssd IOS 1 tb', 71, 'RAK 001', 'CV. Ayu Senja'),
(93333, 'Speaker Diskotik', 36, 'RAK 001', 'CV.Matahari'),
(99101, 'Flashdisk 12 gb', 28, 'RAK 001', 'CV.Abadi Sentosa'),
(99102, 'Handphone T34', 45, 'RAK 001', 'CV.Abadi Sentosa'),
(99103, 'Laptop Rock', 7, 'RAK 001', 'CV.Abadi Sentosa'),
(99105, 'Handphone Maus', 15, 'RAK 001', 'CV.Abadi Sentosa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_in`
--

CREATE TABLE `tb_barang_in` (
  `id_brg_in` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `noinv` varchar(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_in`
--

INSERT INTO `tb_barang_in` (`id_brg_in`, `tanggal`, `noinv`, `supplier`, `kode_brg`, `nama_brg`, `stok`, `jml_masuk`, `jam`, `petugas`) VALUES
(1, '19-12-2002', '1', 'CV. Tes', '22922', 'Kancut', 11, 22, '07.00', 'Budi\r\n'),
(5, '2020-09-19', '001', 'CV.Abadi Sentosa', '99102', 'Handphone Xue hua piao piao', 92, 1, '10:11 am', 'Hibiki Chan <3  >_<'),
(7, '2020-09-19', '001', 'CV.Abadi Sentosa', '99102', 'Handphone Xue hua piao piao', 93, 1, '10:58 am', 'Petugas satu'),
(8, '2020-09-22', '0022', 'CV.Abadi Sentosa', '93333', 'Speaker Diskotik', 22, 9, '07:28 am', 'Petugas'),
(9, '2020-09-22', '121', 'CV Indah Pertiwi', '99101', 'Flashdisk 12 gb', 1, 22, '09:49 am', 'Petugas'),
(10, '2025-03-14', '', 'CV.Abadi Sentosa', '88821', 'RAM DDR10 1024 GB', 6, 2, '10:16 am', 'gabyella'),
(11, '2025-03-18', '1225', 'CV.Abadi Sentosa', '99105', 'Handphone Maus', 11, 4, '03:05 pm', 'gabyella'),
(12, '2025-03-19', '', 'CV.Abadi Sentosa', '99101', 'Flashdisk 12 gb', 23, 5, '03:41 pm', ''),
(13, '2025-03-20', '001/M', 'CV.Matahari', '93333', 'Speaker Diskotik', 31, 5, '10:18 am', 'gabyella');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_out`
--

CREATE TABLE `tb_barang_out` (
  `no_brg_out` int(11) NOT NULL,
  `no_ajuan` int(11) NOT NULL,
  `tanggal_ajuan` varchar(255) NOT NULL,
  `tanggal_out` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_out`
--

INSERT INTO `tb_barang_out` (`no_brg_out`, `no_ajuan`, `tanggal_ajuan`, `tanggal_out`, `petugas`, `kode_brg`, `nama_brg`, `stok`, `jml_ajuan`, `jml_keluar`, `admin`) VALUES
(1, 998, '2025-03-07', '2025-03-07', 'Petugas', '88821', 'RAM DDR10 1024 GB', 11, 3, 3, 'adminmin'),
(134, 1000, '2025-03-07', '2025-03-09', 'Petugas', '99102', 'Handphone T34', 70, 23, 23, 'adminmin'),
(137, 999, '2025-03-07', '2025-03-09', 'Petugas', '99103', 'Laptop Rock', 11, 2, 3, 'adminmin'),
(138, 1001, '2025-03-09', '2025-03-09', 'Petugas', '88821', 'RAM DDR10 1024 GB', 8, 2, 2, 'adminmin'),
(139, 1002, '2025-03-09', '2025-03-09', 'Petugas', '88821', 'RAM DDR10 1024 GB', 8, 2, 2, 'adminmin'),
(143, 1006, '2025-03-10', '2025-03-10', 'Petugas', '99105', 'Handphone Maus', 13, 1, 1, 'adminmin'),
(144, 1007, '2025-03-10', '2025-03-11', 'Petugas', '88821', 'RAM DDR10 1024 GB', 5, 2, 2, 'adminmin'),
(145, 1008, '2025-03-12', '2025-03-12', 'Petugas', '99105', 'Handphone Maus', 12, 1, 1, 'adminmin'),
(146, 1009, '2025-03-12', '2025-03-12', 'Petugas', '99103', 'Laptop Rock', 8, 2, 1, 'adminmin'),
(147, 1010, '2025-03-12', '2025-03-12', 'Petugas', '99102', 'Handphone T34', 47, 4, 2, 'adminmin'),
(148, 1011, '2025-03-12', '2025-03-12', 'Petugas', '92938', 'Ssd IOS 1 tb', 88, 2, 2, 'adminmin'),
(149, 1012, '2025-03-14', '2025-03-14', 'gabyella', '92938', 'Ssd IOS 1 tb', 86, 12, 12, 'adminmin'),
(150, 1013, '2025-03-14', '2025-03-14', 'gabyella', '99105', 'Handphone Maus', 11, 1, 0, 'adminmin'),
(151, 1014, '2025-03-14', '2025-03-14', 'gabyella', '88821', 'RAM DDR10 1024 GB', 8, 4, 2, 'adminmin'),
(152, 1015, '2025-03-20', '2025-03-20', 'gabyella', '92938', 'Ssd IOS 1 tb', 74, 5, 3, 'minmin'),
(153, 1016, '2025-03-20', '2025-03-20', 'Petugas', '88821', 'RAM DDR10 1024 GB', 8, 5, 3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama`, `telepon`) VALUES
(11, 'Abdul', 'e80a0702d314d055d05af996fe60cff9', 'Kliment Vederov', '0812822929'),
(12, 'petugas1', 'd41d8cd98f00b204e9800998ecf8427e', 'Lyudmilla Pavlichenko', '0812838281'),
(14, 'biksu', 'd41d8cd98f00b204e9800998ecf8427e', 'Leonid Budovkin', '0812822929'),
(15, 'viktor', '4e3c1f58d4ace2057d5e18f4a5a478fb', 'Viktor Reznov', '081282939999'),
(16, 'vlad', 'd701fde59d74f76803087b6632186caf', 'Vladimir Vorosilov', '0812838222'),
(17, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas', '081280328889'),
(18, 'p1', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'p1', ''),
(19, 'gabyella', '5a6c3117f5348275ca26005ae5e40f3c', 'gabyella', '00000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'RAK 001'),
(2, 'RAK 002\r\n'),
(3, 'RAK 003'),
(5, 'RAK 004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sup`
--

CREATE TABLE `tb_sup` (
  `id_sup` int(11) NOT NULL,
  `nama_sup` varchar(255) NOT NULL,
  `kontak_sup` varchar(255) NOT NULL,
  `alamat_sup` text NOT NULL,
  `telepon_sup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sup`
--

INSERT INTO `tb_sup` (`id_sup`, `nama_sup`, `kontak_sup`, `alamat_sup`, `telepon_sup`) VALUES
(1, 'CV.Abadi Sentosa', 'Absentosa.gmail.com', 'Jl. Pekan 5 Pasarbaru km 2', '081208828388'),
(2, 'CV.Matahari', 'Matahari@aman.com', 'JL. Matahari', '0820283882883\r\n'),
(3, 'CV Indah Pertiwi', 'Indah@pertiwi.com', 'Jl. Makmur raya', '081202928382'),
(4, 'PT budi beriman sangat', 'Budi@gmail.com', 'Jl. Mekarpati Km 10', '081292039992'),
(5, 'CV. Ayu Senja', 'Santay@gmail.com', 'Pantai Jingga, KM 01', '081202928322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_ajuan`
--
ALTER TABLE `tb_ajuan`
  ADD PRIMARY KEY (`no_ajuan`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `tb_barang_in`
--
ALTER TABLE `tb_barang_in`
  ADD PRIMARY KEY (`id_brg_in`);

--
-- Indexes for table `tb_barang_out`
--
ALTER TABLE `tb_barang_out`
  ADD PRIMARY KEY (`no_brg_out`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_sup`
--
ALTER TABLE `tb_sup`
  ADD PRIMARY KEY (`id_sup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_ajuan`
--
ALTER TABLE `tb_ajuan`
  MODIFY `no_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT for table `tb_barang_in`
--
ALTER TABLE `tb_barang_in`
  MODIFY `id_brg_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_barang_out`
--
ALTER TABLE `tb_barang_out`
  MODIFY `no_brg_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_sup`
--
ALTER TABLE `tb_sup`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
