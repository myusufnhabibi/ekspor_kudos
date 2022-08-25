-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 03:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekspor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `satuan`) VALUES
('CB', 'Cup Board', 'PCS'),
('MR', 'Mirror', 'PCS'),
('PG', 'Pisang Goreng', 'BIJI'),
('SDT', 'Site Table', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_container`
--

CREATE TABLE `tbl_container` (
  `id_container` int(11) NOT NULL,
  `no_container` varchar(20) NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_container`
--

INSERT INTO `tbl_container` (`id_container`, `no_container`, `type`) VALUES
(2, '60293292', '40HC'),
(3, '34435', '45HC');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` varchar(10) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `negara` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama_customer`, `no_telepon`, `alamat`, `negara`, `email`) VALUES
('CUST001', 'Lebanon', '087728398302', 'US ( UNITED STATES OF AMERICA )\r\n', 'America', 'lebanon@gmail.com'),
('CUST002', 'Tesla', '087728398302', 'GB ( UNITED KINGDOM )\r\n', 'America', 'tesla@elon.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_export`
--

CREATE TABLE `tbl_export` (
  `no_export` varchar(6) NOT NULL,
  `no_pesan` varchar(15) NOT NULL,
  `tgl_plan_kapal` date NOT NULL,
  `id_container` int(11) NOT NULL,
  `sopir` varchar(50) NOT NULL,
  `nopol` varchar(20) NOT NULL,
  `id_user` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_export`
--

INSERT INTO `tbl_export` (`no_export`, `no_pesan`, `tgl_plan_kapal`, `id_container`, `sopir`, `nopol`, `id_user`) VALUES
('EXP001', 'PO20220607001', '2022-06-23', 2, 'Dahlan ', 'B 92382 KL', 'GDG002'),
('EXP002', 'PO20220608002', '2022-06-30', 3, 'Fajar', 'K 2312 UT', 'GDG002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `no_pesan` varchar(20) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `currency` varchar(10) NOT NULL,
  `qty` float NOT NULL,
  `total` double NOT NULL,
  `status_jadwal` tinyint(1) NOT NULL DEFAULT 0,
  `tgl_renc_kirim` date DEFAULT NULL,
  `id_user` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pesan`, `no_pesan`, `tgl_pesan`, `id_customer`, `kode_barang`, `harga`, `currency`, `qty`, `total`, `status_jadwal`, `tgl_renc_kirim`, `id_user`) VALUES
(1, 'PO20220607001', '2022-06-07', 'CUST001', 'SDT', 20, 'USD', 1, 20, 1, '2022-06-22', 'ADM001'),
(6, 'PO20220608002', '2022-06-08', 'CUST002', 'CB', 21, 'GBN', 4, 84, 1, '2022-06-30', 'ADM001'),
(7, 'PO20220608002', '2022-06-08', 'CUST002', 'SDT', 43, 'GBN', 4, 172, 1, '2022-06-30', 'ADM001'),
(8, 'PO20220609003', '2022-06-09', 'CUST002', 'PG', 500, 'YEN', 9, 4500, 1, '2022-06-28', 'ADM001'),
(9, 'PO20220614004', '2022-06-14', 'CUST001', 'SDT', 12, 'USD', 1, 12, 1, '2022-07-13', 'ADM001'),
(10, 'PO20220614004', '2022-06-14', 'CUST001', 'CB', 32, 'USD', 1, 32, 1, '2022-07-13', 'ADM001'),
(11, 'PO20220614004', '2022-06-14', 'CUST001', 'PG', 21, 'USD', 1, 21, 1, '2022-07-13', 'ADM001'),
(12, 'PO20220705005', '2022-07-05', 'CUST001', 'MR', 12, 'USD', 1, 12, 0, NULL, 'ADM001'),
(13, 'PO20220705005', '2022-07-05', 'CUST001', 'SDT', 23, 'USD', 2, 46, 0, NULL, 'ADM001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penagihan`
--

CREATE TABLE `tbl_penagihan` (
  `no_invoice` varchar(11) NOT NULL,
  `no_pesan` varchar(20) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `total_invoice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penagihan`
--

INSERT INTO `tbl_penagihan` (`no_invoice`, `no_pesan`, `tgl_invoice`, `total_invoice`) VALUES
('INV001', 'PO20220614004', '2022-07-13', 65);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `level` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `no_wa`, `level`) VALUES
('ADM001', 'Nafiudin', 'nafi', '802bc16db7097eee89e776c6b2d5eedba0e57440', '', '1'),
('ADM004', '-', 'iphone-ekspor', 'wB^vkKgyy8lcFKZirQpk46h{NGHuiw4tEQOkl7RmRXILGGF0-Mohammad', '', '0'),
('FNC003', 'Danang', 'danang', '053fc0001d4a37c829661b06ea644d10162babfc', '', '3'),
('GDG002', 'Jamal', 'jamal', 'e0195770807aa8c82b0b128d9c0423b5ad035172', '087728398302', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbl_container`
--
ALTER TABLE `tbl_container`
  ADD PRIMARY KEY (`id_container`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_export`
--
ALTER TABLE `tbl_export`
  ADD PRIMARY KEY (`no_export`),
  ADD KEY `no_pesan` (`no_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_container` (`id_container`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pesan`,`no_pesan`) USING BTREE,
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_penagihan`
--
ALTER TABLE `tbl_penagihan`
  ADD PRIMARY KEY (`no_invoice`),
  ADD KEY `no_pesan` (`no_pesan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_container`
--
ALTER TABLE `tbl_container`
  MODIFY `id_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_export`
--
ALTER TABLE `tbl_export`
  ADD CONSTRAINT `tbl_export_ibfk_1` FOREIGN KEY (`id_container`) REFERENCES `tbl_container` (`id_container`);

--
-- Constraints for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD CONSTRAINT `tbl_pemesanan_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`),
  ADD CONSTRAINT `tbl_pemesanan_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
