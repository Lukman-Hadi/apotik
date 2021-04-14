-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 05:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `satuan`, `harga`, `deskripsi`) VALUES
(1, 'barang-1', 'namabarang-1', 'dus', 100000, 'hai'),
(2, 'barang-2', 'namabarang-2', 'dus', 100000, 'hai'),
(3, 'barang-3', 'namabarang-3', 'dus', 100000, 'hai'),
(4, 'barang-4', 'namabarang-4', 'dus', 100000, 'hai'),
(5, 'barang-5', 'namabarang-5', 'dus', 100000, 'hai'),
(6, 'barang-6', 'namabarang-6', 'dus', 100000, 'hai'),
(7, 'barang-7', 'namabarang-7', 'dus', 100000, 'hai'),
(8, 'barang-8', 'namabarang-8', 'dus', 100000, 'hai'),
(9, 'barang-9', 'namabarang-9', 'dus', 100000, 'hai'),
(10, 'barang-10', 'namabarang-10', 'dus', 100000, 'hai'),
(11, 'barang-11', 'namabarang-11', 'dus', 100000, 'hai'),
(12, 'barang-12', 'namabarang-12', 'dus', 100000, 'hai'),
(13, 'barang-13', 'namabarang-13', 'dus', 100000, 'hai'),
(14, 'barang-14', 'namabarang-14', 'dus', 100000, 'hai'),
(15, 'barang-15', 'namabarang-15', 'dus', 100000, 'hai'),
(16, 'barang-16', 'namabarang-16', 'dus', 100000, 'hai'),
(17, 'barang-17', 'namabarang-17', 'dus', 100000, 'hai'),
(18, 'barang-18', 'namabarang-18', 'dus', 100000, 'hai'),
(19, 'barang-19', 'namabarang-19', 'dus', 100000, 'hai'),
(20, 'barang-20', 'namabarang-20', 'dus', 100000, 'hai'),
(21, 'barang-21', 'namabarang-21', 'dus', 100000, 'hai'),
(22, 'barang-22', 'namabarang-22', 'dus', 100000, 'hai'),
(23, 'barang-23', 'namabarang-23', 'dus', 100000, 'hai'),
(24, 'barang-24', 'namabarang-24', 'dus', 100000, 'hai'),
(25, 'barang-25', 'namabarang-25', 'dus', 100000, 'hai'),
(26, 'barang-26', 'namabarang-26', 'dus', 100000, 'hai'),
(27, 'barang-27', 'namabarang-27', 'dus', 100000, 'hai'),
(28, 'barang-28', 'namabarang-28', 'dus', 100000, 'hai'),
(29, 'barang-29', 'namabarang-29', 'dus', 100000, 'hai'),
(30, 'barang-30', 'namabarang-30', 'dus', 100000, 'hai'),
(31, 'barang-31', 'namabarang-31', 'dus', 100000, 'hai'),
(32, 'barang-32', 'namabarang-32', 'dus', 100000, 'hai'),
(33, 'barang-33', 'namabarang-33', 'dus', 100000, 'hai'),
(34, 'barang-34', 'namabarang-34', 'dus', 100000, 'hai'),
(35, 'barang-35', 'namabarang-35', 'dus', 100000, 'hai'),
(36, 'barang-36', 'namabarang-36', 'dus', 100000, 'hai'),
(37, 'barang-37', 'namabarang-37', 'dus', 100000, 'hai'),
(38, 'barang-38', 'namabarang-38', 'dus', 100000, 'hai'),
(39, 'barang-39', 'namabarang-39', 'dus', 100000, 'hai'),
(40, 'barang-40', 'namabarang-40', 'dus', 100000, 'hai'),
(41, 'barang-41', 'namabarang-41', 'dus', 100000, 'hai'),
(42, 'barang-42', 'namabarang-42', 'dus', 100000, 'hai'),
(43, 'barang-43', 'namabarang-43', 'dus', 100000, 'hai'),
(44, 'barang-44', 'namabarang-44', 'dus', 100000, 'hai'),
(45, 'barang-45', 'namabarang-45', 'dus', 100000, 'hai'),
(46, 'barang-46', 'namabarang-46', 'dus', 100000, 'hai'),
(47, 'barang-47', 'namabarang-47', 'dus', 100000, 'hai'),
(48, 'barang-48', 'namabarang-48', 'dus', 100000, 'hai'),
(49, 'barang-49', 'namabarang-49', 'dus', 100000, 'hai'),
(50, 'barang-50', 'namabarang-50', 'dus', 100000, 'hai'),
(51, 'barang-51', 'namabarang-51', 'dus', 100000, 'hai'),
(52, 'barang-52', 'namabarang-52', 'dus', 100000, 'hai'),
(53, 'barang-53', 'namabarang-53', 'dus', 100000, 'hai'),
(54, 'barang-54', 'namabarang-54', 'dus', 100000, 'hai'),
(55, 'barang-55', 'namabarang-55', 'dus', 100000, 'hai'),
(56, 'barang-56', 'namabarang-56', 'dus', 100000, 'hai'),
(57, 'barang-57', 'namabarang-57', 'dus', 100000, 'hai'),
(58, 'barang-58', 'namabarang-58', 'dus', 100000, 'hai'),
(59, 'barang-59', 'namabarang-59', 'dus', 100000, 'hai'),
(60, 'barang-60', 'namabarang-60', 'dus', 100000, 'hai'),
(61, 'barang-61', 'namabarang-61', 'dus', 100000, 'hai'),
(62, 'barang-62', 'namabarang-62', 'dus', 100000, 'hai'),
(63, 'barang-63', 'namabarang-63', 'dus', 100000, 'hai'),
(64, 'barang-64', 'namabarang-64', 'dus', 100000, 'hai'),
(65, 'barang-65', 'namabarang-65', 'dus', 100000, 'hai'),
(66, 'barang-66', 'namabarang-66', 'dus', 100000, 'hai'),
(67, 'barang-67', 'namabarang-67', 'dus', 100000, 'hai'),
(68, 'barang-68', 'namabarang-68', 'dus', 100000, 'hai'),
(69, 'barang-69', 'namabarang-69', 'dus', 100000, 'hai'),
(70, 'barang-70', 'namabarang-70', 'dus', 100000, 'hai'),
(71, 'barang-71', 'namabarang-71', 'dus', 100000, 'hai'),
(72, 'barang-72', 'namabarang-72', 'dus', 100000, 'hai'),
(73, 'barang-73', 'namabarang-73', 'dus', 100000, 'hai'),
(74, 'barang-74', 'namabarang-74', 'dus', 100000, 'hai'),
(75, 'barang-75', 'namabarang-75', 'dus', 100000, 'hai'),
(76, 'barang-76', 'namabarang-76', 'dus', 100000, 'hai'),
(77, 'barang-77', 'namabarang-77', 'dus', 100000, 'hai'),
(78, 'barang-78', 'namabarang-78', 'dus', 100000, 'hai'),
(79, 'barang-79', 'namabarang-79', 'dus', 100000, 'hai'),
(80, 'barang-80', 'namabarang-80', 'dus', 100000, 'hai'),
(81, 'barang-81', 'namabarang-81', 'dus', 100000, 'hai'),
(82, 'barang-82', 'namabarang-82', 'dus', 100000, 'hai'),
(83, 'barang-83', 'namabarang-83', 'dus', 100000, 'hai'),
(84, 'barang-84', 'namabarang-84', 'dus', 100000, 'hai'),
(85, 'barang-85', 'namabarang-85', 'dus', 100000, 'hai'),
(86, 'barang-86', 'namabarang-86', 'dus', 100000, 'hai'),
(87, 'barang-87', 'namabarang-87', 'dus', 100000, 'hai'),
(88, 'barang-88', 'namabarang-88', 'dus', 100000, 'hai'),
(89, 'barang-89', 'namabarang-89', 'dus', 100000, 'hai'),
(90, 'barang-90', 'namabarang-90', 'dus', 100000, 'hai'),
(91, 'barang-91', 'namabarang-91', 'dus', 100000, 'hai'),
(92, 'barang-92', 'namabarang-92', 'dus', 100000, 'hai'),
(93, 'barang-93', 'namabarang-93', 'dus', 100000, 'hai'),
(94, 'barang-94', 'namabarang-94', 'dus', 100000, 'hai'),
(95, 'barang-95', 'namabarang-95', 'dus', 100000, 'hai'),
(96, 'barang-96', 'namabarang-96', 'dus', 100000, 'hai'),
(97, 'barang-97', 'namabarang-97', 'dus', 100000, 'hai'),
(98, 'barang-98', 'namabarang-98', 'dus', 100000, 'hai'),
(99, 'barang-99', 'namabarang-99', 'dus', 100000, 'hai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id` int(11) NOT NULL,
  `kode_faktur` varchar(255) NOT NULL,
  `pembeli` varchar(255) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id`, `kode_faktur`, `pembeli`, `jumlah`, `tgl_transaksi`) VALUES
(1, 'test', 'admin', 0, '2021-04-01'),
(2, 'asdasdasd', 'admin', 1200000, '2021-04-16'),
(3, 'asdasdasd', 'admin', 1200000, '2021-04-01'),
(4, 'asdasdasd', 'admin', 1100000, '2021-04-01'),
(5, 'asdasdasd', 'admin', 1000000, '2021-04-01'),
(6, 'asdasdasd', 'admin', 900000, '2021-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar_detail`
--

CREATE TABLE `tbl_barang_keluar_detail` (
  `id` bigint(20) NOT NULL,
  `kode_faktur` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kode_batch` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_keluar_detail`
--

INSERT INTO `tbl_barang_keluar_detail` (`id`, `kode_faktur`, `kode_barang`, `kode_batch`, `total`) VALUES
(1, '2', 'barang-1', 'batch-2', 5),
(2, '2', 'barang-1', '213123', 2),
(3, '2', 'barang-1', '21321', 4),
(4, '2', 'barang-1', 'batch-1', 1),
(5, '3', 'barang-1', 'batch-2', 5),
(6, '3', 'barang-1', '213123', 2),
(7, '3', 'barang-1', '21321', 4),
(8, '3', 'barang-1', 'batch-1', 1),
(9, '4', 'barang-10', 'batch-1', 11),
(10, '5', 'barang-10', 'batch-1', 10),
(11, '6', 'barang-10', 'batch-1', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id` int(11) NOT NULL,
  `kode_faktur` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `grandtotal` bigint(20) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id`, `kode_faktur`, `id_supplier`, `grandtotal`, `tgl_transaksi`) VALUES
(1, 'f-001', 3, 300000, '2021-04-01'),
(2, 'f-002', 3, 0, '2021-04-23'),
(3, 'asdasdasd', 2, 0, '2021-04-01'),
(4, 'asdasdasd', 2, 0, '2021-04-01'),
(5, 'asdasdasd', 2, 0, '2021-04-01'),
(6, 'asdasdasd', 2, 10000000, '2021-04-01'),
(7, 'f-102310', 3, 10000000, '2021-04-01'),
(8, 'f-012301545', 2, 2000000, '2021-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk_detail`
--

CREATE TABLE `tbl_barang_masuk_detail` (
  `id` bigint(20) NOT NULL,
  `kode_faktur` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kode_batch` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_expired` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_masuk_detail`
--

INSERT INTO `tbl_barang_masuk_detail` (`id`, `kode_faktur`, `kode_barang`, `kode_batch`, `harga`, `tgl_expired`, `jumlah`, `total`) VALUES
(1, 'asdasdasd', 'barang-1', '213123', 1, '2021-04-01', 1, 1),
(2, 'asdasdasd', 'barang-6', '213123', 1, '2021-04-02', 1, 1),
(3, 'asdasdasd', 'barang-1', '213123', 1, '2021-04-12', 1, 1),
(4, 'asdasdasd', 'barang-1', '213123', 1, '2021-04-01', 1, 1),
(5, 'asdasdasd', 'barang-6', '213123', 1, '2021-04-02', 1, 1),
(6, 'asdasdasd', 'barang-1', '213123', 1, '2021-04-12', 1, 1),
(7, 'asdasdasd', 'barang-1', '213123', 1, '2021-04-01', 1, 1),
(8, 'asdasdasd', 'barang-6', '213123', 1, '2021-04-02', 1, 1),
(9, 'asdasdasd', 'barang-1', '213123', 1, '2021-04-12', 1, 1),
(10, 'wakwak', 'barang-1', '213123', 10, '0000-00-00', 1, 10),
(11, 'wakwak', 'barang-1', '21321', 10000, '2021-04-27', 10, 100000),
(12, 'f-001', 'barang-1', 'batch-1', 20000, '2021-04-01', 10, 200000),
(13, 'f-001', 'barang-1', 'batch-2', 20000, '2021-04-27', 10, 200000),
(14, 'f-002', 'barang-2', 'batch-1', 0, '2021-04-30', 100, 0),
(15, 'f-002', 'barang-6', 'batch-1', 0, '2021-04-29', 100, 0),
(16, 'f-102310', 'barang-10', 'batch-1', 2000, '2021-04-15', 2, 0),
(17, 'f-102310', 'barang-10', 'batch-2', 2000, '2021-04-30', 3, 0),
(18, 'f-012301545', 'barang-10', 'batch-1', 2000, '2021-04-01', 3, 0),
(19, 'f-012301545', 'barang-10', 'batch-2', 2000, '2021-04-30', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` char(20) NOT NULL,
  `maps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `kode_batch` varchar(255) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `combined_key` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stok`
--

INSERT INTO `tbl_stok` (`id`, `kode_barang`, `kode_batch`, `total`, `tgl_expired`, `combined_key`) VALUES
(1, 'barang-1', 'batch-1', 0, '2021-04-02', 'barang-1-batch-1'),
(3, 'barang-1', '213123', 0, '2021-04-12', 'barang-1-213123'),
(4, 'barang-6', '213123', 3, '2021-04-02', 'barang-6-213123'),
(19, 'barang-1', '21321', 0, '2021-04-27', 'barang-1-21321'),
(21, 'barang-1', 'batch-2', 0, '2021-04-27', 'barang-1-batch-2'),
(22, 'barang-2', 'batch-1', 6, '2021-04-30', 'barang-2-batch-1'),
(23, 'barang-6', 'batch-1', 7, '2021-04-29', 'barang-6-batch-1'),
(546, 'barang-3', 'batch-1', 9, '2021-04-29', 'barang-3-batch-1'),
(547, 'barang-4', 'batch-1', 10, '2021-04-29', 'barang-4-batch-1'),
(548, 'barang-5', 'batch-1', 11, '2021-04-29', 'barang-5-batch-1'),
(549, 'barang-7', 'batch-1', 12, '2021-04-29', 'barang-7-batch-1'),
(550, 'barang-8', 'batch-1', 13, '2021-04-29', 'barang-8-batch-1'),
(551, 'barang-9', 'batch-1', 14, '2021-04-29', 'barang-9-batch-1'),
(552, 'barang-10', 'batch-1', 170, '2021-04-30', 'barang-10-batch-1'),
(553, 'barang-11', 'batch-1', 16, '2021-04-29', 'barang-11-batch-1'),
(554, 'barang-12', 'batch-1', 17, '2021-04-29', 'barang-12-batch-1'),
(555, 'barang-13', 'batch-1', 18, '2021-04-29', 'barang-13-batch-1'),
(556, 'barang-14', 'batch-1', 19, '2021-04-29', 'barang-14-batch-1'),
(557, 'barang-15', 'batch-1', 20, '2021-04-29', 'barang-15-batch-1'),
(558, 'barang-16', 'batch-1', 21, '2021-04-29', 'barang-16-batch-1'),
(559, 'barang-17', 'batch-1', 22, '2021-04-29', 'barang-17-batch-1'),
(560, 'barang-18', 'batch-1', 23, '2021-04-29', 'barang-18-batch-1'),
(561, 'barang-19', 'batch-1', 24, '2021-04-29', 'barang-19-batch-1'),
(562, 'barang-20', 'batch-1', 25, '2021-04-29', 'barang-20-batch-1'),
(563, 'barang-21', 'batch-1', 26, '2021-04-29', 'barang-21-batch-1'),
(564, 'barang-22', 'batch-1', 27, '2021-04-29', 'barang-22-batch-1'),
(565, 'barang-23', 'batch-1', 28, '2021-04-29', 'barang-23-batch-1'),
(566, 'barang-24', 'batch-1', 29, '2021-04-29', 'barang-24-batch-1'),
(567, 'barang-25', 'batch-1', 30, '2021-04-29', 'barang-25-batch-1'),
(568, 'barang-26', 'batch-1', 31, '2021-04-29', 'barang-26-batch-1'),
(569, 'barang-27', 'batch-1', 32, '2021-04-29', 'barang-27-batch-1'),
(570, 'barang-28', 'batch-1', 33, '2021-04-29', 'barang-28-batch-1'),
(571, 'barang-29', 'batch-1', 34, '2021-04-29', 'barang-29-batch-1'),
(572, 'barang-30', 'batch-1', 35, '2021-04-29', 'barang-30-batch-1'),
(573, 'barang-31', 'batch-1', 36, '2021-04-29', 'barang-31-batch-1'),
(574, 'barang-32', 'batch-1', 37, '2021-04-29', 'barang-32-batch-1'),
(575, 'barang-33', 'batch-1', 38, '2021-04-29', 'barang-33-batch-1'),
(576, 'barang-34', 'batch-1', 39, '2021-04-29', 'barang-34-batch-1'),
(577, 'barang-35', 'batch-1', 40, '2021-04-29', 'barang-35-batch-1'),
(578, 'barang-36', 'batch-1', 41, '2021-04-29', 'barang-36-batch-1'),
(579, 'barang-37', 'batch-1', 42, '2021-04-29', 'barang-37-batch-1'),
(580, 'barang-38', 'batch-1', 43, '2021-04-29', 'barang-38-batch-1'),
(581, 'barang-39', 'batch-1', 44, '2021-04-29', 'barang-39-batch-1'),
(582, 'barang-40', 'batch-1', 45, '2021-04-29', 'barang-40-batch-1'),
(583, 'barang-41', 'batch-1', 46, '2021-04-29', 'barang-41-batch-1'),
(584, 'barang-42', 'batch-1', 47, '2021-04-29', 'barang-42-batch-1'),
(585, 'barang-43', 'batch-1', 48, '2021-04-29', 'barang-43-batch-1'),
(586, 'barang-44', 'batch-1', 49, '2021-04-29', 'barang-44-batch-1'),
(587, 'barang-45', 'batch-1', 50, '2021-04-29', 'barang-45-batch-1'),
(588, 'barang-46', 'batch-1', 51, '2021-04-29', 'barang-46-batch-1'),
(589, 'barang-47', 'batch-1', 52, '2021-04-29', 'barang-47-batch-1'),
(590, 'barang-48', 'batch-1', 53, '2021-04-29', 'barang-48-batch-1'),
(591, 'barang-49', 'batch-1', 54, '2021-04-29', 'barang-49-batch-1'),
(592, 'barang-50', 'batch-1', 55, '2021-04-29', 'barang-50-batch-1'),
(593, 'barang-51', 'batch-1', 56, '2021-04-29', 'barang-51-batch-1'),
(594, 'barang-52', 'batch-1', 57, '2021-04-29', 'barang-52-batch-1'),
(595, 'barang-53', 'batch-1', 58, '2021-04-29', 'barang-53-batch-1'),
(596, 'barang-54', 'batch-1', 59, '2021-04-29', 'barang-54-batch-1'),
(597, 'barang-55', 'batch-1', 60, '2021-04-29', 'barang-55-batch-1'),
(598, 'barang-56', 'batch-1', 61, '2021-04-29', 'barang-56-batch-1'),
(599, 'barang-57', 'batch-1', 62, '2021-04-29', 'barang-57-batch-1'),
(600, 'barang-58', 'batch-1', 63, '2021-04-29', 'barang-58-batch-1'),
(601, 'barang-59', 'batch-1', 64, '2021-04-29', 'barang-59-batch-1'),
(602, 'barang-60', 'batch-1', 65, '2021-04-29', 'barang-60-batch-1'),
(603, 'barang-61', 'batch-1', 66, '2021-04-29', 'barang-61-batch-1'),
(604, 'barang-62', 'batch-1', 67, '2021-04-29', 'barang-62-batch-1'),
(605, 'barang-63', 'batch-1', 68, '2021-04-29', 'barang-63-batch-1'),
(606, 'barang-64', 'batch-1', 69, '2021-04-29', 'barang-64-batch-1'),
(607, 'barang-65', 'batch-1', 70, '2021-04-29', 'barang-65-batch-1'),
(608, 'barang-66', 'batch-1', 71, '2021-04-29', 'barang-66-batch-1'),
(609, 'barang-67', 'batch-1', 72, '2021-04-29', 'barang-67-batch-1'),
(610, 'barang-68', 'batch-1', 73, '2021-04-29', 'barang-68-batch-1'),
(611, 'barang-69', 'batch-1', 74, '2021-04-29', 'barang-69-batch-1'),
(612, 'barang-70', 'batch-1', 75, '2021-04-29', 'barang-70-batch-1'),
(613, 'barang-71', 'batch-1', 76, '2021-04-29', 'barang-71-batch-1'),
(614, 'barang-72', 'batch-1', 77, '2021-04-29', 'barang-72-batch-1'),
(615, 'barang-73', 'batch-1', 78, '2021-04-29', 'barang-73-batch-1'),
(616, 'barang-74', 'batch-1', 79, '2021-04-29', 'barang-74-batch-1'),
(617, 'barang-75', 'batch-1', 80, '2021-04-29', 'barang-75-batch-1'),
(618, 'barang-76', 'batch-1', 81, '2021-04-29', 'barang-76-batch-1'),
(619, 'barang-77', 'batch-1', 82, '2021-04-29', 'barang-77-batch-1'),
(620, 'barang-78', 'batch-1', 83, '2021-04-29', 'barang-78-batch-1'),
(621, 'barang-79', 'batch-1', 84, '2021-04-29', 'barang-79-batch-1'),
(622, 'barang-80', 'batch-1', 85, '2021-04-29', 'barang-80-batch-1'),
(623, 'barang-81', 'batch-1', 86, '2021-04-29', 'barang-81-batch-1'),
(624, 'barang-82', 'batch-1', 87, '2021-04-29', 'barang-82-batch-1'),
(625, 'barang-83', 'batch-1', 88, '2021-04-29', 'barang-83-batch-1'),
(626, 'barang-84', 'batch-1', 89, '2021-04-29', 'barang-84-batch-1'),
(627, 'barang-85', 'batch-1', 90, '2021-04-29', 'barang-85-batch-1'),
(628, 'barang-86', 'batch-1', 91, '2021-04-29', 'barang-86-batch-1'),
(629, 'barang-87', 'batch-1', 92, '2021-04-29', 'barang-87-batch-1'),
(630, 'barang-88', 'batch-1', 93, '2021-04-29', 'barang-88-batch-1'),
(631, 'barang-89', 'batch-1', 94, '2021-04-29', 'barang-89-batch-1'),
(632, 'barang-90', 'batch-1', 95, '2021-04-29', 'barang-90-batch-1'),
(633, 'barang-91', 'batch-1', 96, '2021-04-29', 'barang-91-batch-1'),
(634, 'barang-92', 'batch-1', 97, '2021-04-29', 'barang-92-batch-1'),
(635, 'barang-93', 'batch-1', 98, '2021-04-29', 'barang-93-batch-1'),
(636, 'barang-94', 'batch-1', 99, '2021-04-29', 'barang-94-batch-1'),
(637, 'barang-95', 'batch-1', 100, '2021-04-29', 'barang-95-batch-1'),
(638, 'barang-96', 'batch-1', 101, '2021-04-29', 'barang-96-batch-1'),
(639, 'barang-97', 'batch-1', 102, '2021-04-29', 'barang-97-batch-1'),
(640, 'barang-98', 'batch-1', 103, '2021-04-29', 'barang-98-batch-1'),
(641, 'barang-99', 'batch-1', 104, '2021-04-29', 'barang-99-batch-1'),
(643, 'barang-10', 'batch-2', 5, '2021-04-30', 'barang-10-batch-2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` text,
  `telp` char(20) DEFAULT NULL,
  `email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `nama_supplier`, `alamat`, `telp`, `email`) VALUES
(2, 'Tambah Supplier Baru ruuu', 'Halo Halo Halooooo looooo', '12312379', 'admin@admin.com'),
(3, 'Pabrik Parasetamol', 'cikande ', '123123', 'kkakak@kaak.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang_keluar_detail`
--
ALTER TABLE `tbl_barang_keluar_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang_masuk_detail`
--
ALTER TABLE `tbl_barang_masuk_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `combinedd` (`combined_key`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar_detail`
--
ALTER TABLE `tbl_barang_keluar_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk_detail`
--
ALTER TABLE `tbl_barang_masuk_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=644;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
