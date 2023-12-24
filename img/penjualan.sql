-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2023 at 02:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `kdbarang` char(4) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_brg` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`kdbarang`, `nama_brg`, `jenis`, `kondisi`, `deskripsi`, `foto`) VALUES
('B001', 'Tablet Iphone', 'Tablet', 'Bekas', 'Ini adalah tablet', 'download (2).jpg'),
('B002', 'Xiaomi MI 9', 'Handphone', 'Baru', 'HP dengan spesifikasi Processor Snapdragon 620 dan RAM 4GB bla bla..', 'gambar2.jpg'),
('B003', 'Samsung Galaxy S23', 'Handphone', 'Baru', 'Handphone samsung', 'download (4).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblpembeli`
--

CREATE TABLE `tblpembeli` (
  `idpembeli` int NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblpembeli`
--

INSERT INTO `tblpembeli` (`idpembeli`, `nama_pelanggan`, `alamat`, `telepon`, `foto`) VALUES
(1, 'Fatimatuzzakah', 'Dasan Ketujur Lombok Barat', '08123123412', 'download (2).jpg'),
(3, 'Jaya', 'Narmada', '12333333', 'Screenshot 2023-12-05 193332.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblpenjual`
--

CREATE TABLE `tblpenjual` (
  `kdpenjual` char(5) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `jumlah_jual` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblpenjual`
--

INSERT INTO `tblpenjual` (`kdpenjual`, `tanggal_jual`, `jumlah_jual`) VALUES
('P01', '2023-12-01', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` char(35) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `verifikasi` char(1) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `nama_lengkap`, `level`, `verifikasi`) VALUES
('admin@gmail.com', 'b56b06fc4b4d547199270617b8e864da', 'Dedi Supriadi', 'admin', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`kdbarang`);

--
-- Indexes for table `tblpembeli`
--
ALTER TABLE `tblpembeli`
  ADD PRIMARY KEY (`idpembeli`);

--
-- Indexes for table `tblpenjual`
--
ALTER TABLE `tblpenjual`
  ADD PRIMARY KEY (`kdpenjual`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
