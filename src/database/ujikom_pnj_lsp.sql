-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 05:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_pnj_lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `nama_pemesan` varchar(40) NOT NULL,
  `nomor_identitas` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `durasi_menginap` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `total_bayar` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_pemesan`, `nomor_identitas`, `jenis_kelamin`, `tipe_kamar`, `durasi_menginap`, `discount`, `total_bayar`) VALUES
(22, 'Ahmad Fauzan', '1234567890123421', 'laki-laki', 'deluxe', 4, 10, 3020000),
(23, 'Najy', '1234567890123457', 'laki-laki', 'standard', 6, 10, 3180000);

-- --------------------------------------------------------

--
-- Table structure for table `cust_receipt`
--

CREATE TABLE `cust_receipt` (
  `id` int(10) NOT NULL,
  `nama_pemesan` varchar(40) NOT NULL,
  `nomor_identitas` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `durasi_menginap` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `total_bayar` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(10) NOT NULL,
  `nama_pemesan` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nomor_identitas` varchar(20) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `harga_kamar` int(10) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `durasi_menginap` int(10) NOT NULL,
  `termasuk_breakfast` varchar(10) NOT NULL,
  `total_bayar` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`nomor_identitas`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cust_receipt`
--
ALTER TABLE `cust_receipt`
  ADD PRIMARY KEY (`nomor_identitas`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cust_receipt`
--
ALTER TABLE `cust_receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
