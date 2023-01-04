-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 01:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(40) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(200) NOT NULL,
  `gambar_admin` varchar(30) NOT NULL,
  `alamat_admin` varchar(100) NOT NULL,
  `nohp_admin` varchar(14) NOT NULL,
  `status_admin` enum('Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `gambar_admin`, `alamat_admin`, `nohp_admin`, `status_admin`) VALUES
('ADM001', 'Sutrisno', 'ADM001', 'e10adc3949ba59abbe56e057f20f883e', 'adm_1657406829.png', 'Suro', '085742906467', 'Administrator'),
('ADM002', 'erererer', 'ADM002', 'e10adc3949ba59abbe56e057f20f883e', 'admin_gaji.png', 'eerer', 'Administrator', 'Administrator'),
('ADM003', 'Sutrisno', 'ADM003', 'e10adc3949ba59abbe56e057f20f883e', 'admin_gaji.png', 'Banyumas', '082135644777', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `kd_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bulan`
--

INSERT INTO `tbl_bulan` (`kd_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `kd_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `gaji_pokok` int(50) NOT NULL,
  `uang_makan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`kd_jabatan`, `nama_jabatan`, `gaji_pokok`, `uang_makan`) VALUES
('JAB001', 'Kepala Cabang', 4750000, 30000),
('JAB002', 'Kepala Bengkel', 3000000, 25000),
('JAB003', 'CCO', 2300000, 10000),
('JAB004', 'Supervisor', 1750000, 15000),
('JAB005', 'Service Advisor', 2300000, 10000),
('JAB006', 'Admin Sales', 2200000, 10000),
('JAB007', 'Admin Service', 2000000, 10000),
('JAB008', 'Part Staff', 2000000, 10000),
('JAB009', 'Sales Counter', 0, 25000),
('JAB010', 'Sales Consultan', 0, 25000),
('JAB011', 'Mekanik', 2000000, 10000),
('JAB012', 'Driver', 2000000, 10000),
('JAB013', 'Satpam', 2000000, 15000),
('JAB014', 'Office Boy', 1750000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `kd_jam` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `hargasewa_lapangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jam`
--

INSERT INTO `tbl_jam` (`kd_jam`, `jam`, `hargasewa_lapangan`) VALUES
('JAM001', '09:00', 80000),
('JAM002', '10:00', 80000),
('JAM003', '11:00', 80000),
('JAM004', '12:00', 80000),
('JAM005', '13.00', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_judul`
--

CREATE TABLE `tbl_judul` (
  `kd_judul` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `oleh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_judul`
--

INSERT INTO `tbl_judul` (`kd_judul`, `judul`, `oleh`) VALUES
(1, 'Sistem Informasi Penyewaan Lapangan Bola xdsfdsfasdfasfasf', 'Devi Universitas Nusa Mandiri Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lapangan`
--

CREATE TABLE `tbl_lapangan` (
  `kd_lapangan` varchar(10) NOT NULL,
  `nama_lapangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lapangan`
--

INSERT INTO `tbl_lapangan` (`kd_lapangan`, `nama_lapangan`) VALUES
('LAP001', 'Lapangan A'),
('LAP002', 'Lapangan B'),
('LAP003', 'Lapangan C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `kd_logo` int(11) NOT NULL,
  `nama_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`kd_logo`, `nama_logo`) VALUES
(1, 'gambar1595851792.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewa`
--

CREATE TABLE `tbl_penyewa` (
  `kd_penyewa` varchar(10) NOT NULL,
  `nama_penyewa` varchar(30) NOT NULL,
  `tempatlahir_penyewa` varchar(20) NOT NULL,
  `tgllahir_penyewa` date NOT NULL,
  `jk_penyewa` enum('Pria','Wanita') NOT NULL,
  `alamat_penyewa` varchar(30) NOT NULL,
  `nohp_penyewa` varchar(15) NOT NULL,
  `gambar_penyewa` varchar(58) NOT NULL,
  `password_penyewa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penyewa`
--

INSERT INTO `tbl_penyewa` (`kd_penyewa`, `nama_penyewa`, `tempatlahir_penyewa`, `tgllahir_penyewa`, `jk_penyewa`, `alamat_penyewa`, `nohp_penyewa`, `gambar_penyewa`, `password_penyewa`) VALUES
('PEN001', 'Sutrisno', 'aaaa', '2022-12-16', 'Pria', 'Dawuhan Wetan', '082135644333', 'adm_1657406829.png', 'e10adc3949ba59abbe56e057f20f883e'),
('PEN002', 'aaa', 'bbb', '2022-12-24', 'Wanita', 'aaaa', '12222222', 'foto_penyewa.png', 'e10adc3949ba59abbe56e057f20f883e'),
('PEN003', 'dsfaerr', 'ererere', '2023-01-02', 'Wanita', '343434', '343434', 'foto_penyewa.png', '872622bacea6afdc9d6611efb38a433a'),
('PEN004', 'dererer', 'ererer', '2023-01-02', 'Pria', 'ererer', 'erererer', 'foto_penyewa.png', '872622bacea6afdc9d6611efb38a433a'),
('PEN005', 'ererer', 'ererere', '2023-01-03', 'Pria', '3434343', '55555', 'foto_penyewa.png', '872622bacea6afdc9d6611efb38a433a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewaan`
--

CREATE TABLE `tbl_penyewaan` (
  `kd_penyewaan` int(10) NOT NULL,
  `tgl_penyewaan` date NOT NULL,
  `kd_lapangan` varchar(10) NOT NULL,
  `kd_jam` varchar(10) NOT NULL,
  `kd_penyewa` varchar(10) NOT NULL,
  `kd_admin` varchar(10) NOT NULL,
  `status_penyewaan` enum('kosong','lunas','selesai','gagal','booking') NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `harga_sewa` double NOT NULL,
  `pembayaran_sewa` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `rekening_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penyewaan`
--

INSERT INTO `tbl_penyewaan` (`kd_penyewaan`, `tgl_penyewaan`, `kd_lapangan`, `kd_jam`, `kd_penyewa`, `kd_admin`, `status_penyewaan`, `tgl_pesan`, `harga_sewa`, `pembayaran_sewa`, `jumlah_bayar`, `bukti_bayar`, `rekening_bayar`) VALUES
(150, '2022-12-31', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(151, '2022-12-31', 'LAP001', 'JAM002', 'PEN001', 'ADM001', 'selesai', '2022-12-31 06:22:56', 80000, 'Lunas 80000', 80000, 'buktibayar_1672444817.png', 'BNI No  0372001567 a/n Sutrisno'),
(152, '2022-12-31', 'LAP001', 'JAM003', 'PEN001', 'ADM001', 'selesai', '2022-12-31 07:14:55', 80000, 'DP 40000', 80000, 'buktibayar_1672445724.png', 'BCA No  0460878136 a/n Sutrisno'),
(153, '2022-12-31', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(154, '2022-12-31', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(155, '2023-01-01', 'LAP001', 'JAM001', 'PEN001', 'ADM001', 'booking', '2023-01-01 10:30:52', 80000, 'Lunas 80000', 0, '', ''),
(156, '2023-01-01', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(157, '2023-01-01', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(158, '2023-01-01', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(159, '2023-01-01', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `kd_perush` int(11) NOT NULL,
  `nama_perush` varchar(200) NOT NULL,
  `alamat_perush` varchar(200) NOT NULL,
  `tentang_perush` text NOT NULL,
  `telepon_perush` varchar(100) NOT NULL,
  `email_perush` varchar(400) NOT NULL,
  `logob_perush` varchar(30) NOT NULL,
  `logok_perush` varchar(30) NOT NULL,
  `logo_depan` varchar(100) NOT NULL,
  `kd_pos` varchar(10) NOT NULL,
  `kab_perush` varchar(50) NOT NULL,
  `prop_perush` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`kd_perush`, `nama_perush`, `alamat_perush`, `tentang_perush`, `telepon_perush`, `email_perush`, `logob_perush`, `logok_perush`, `logo_depan`, `kd_pos`, `kab_perush`, `prop_perush`) VALUES
(1, 'Lapangn Bola', 'Jl.Siliwangi, Desa Suro Kecamatan Kalibagor Banyumas. ', 'ererererer', '085742906467', 'azzuhriyyahsuro@gmail.com', 'gambar1639611256.png', 'gambar1639612064.png', 'logodepan1672789090.png', '53444', 'purbalingga', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `kd_rekening` varchar(10) NOT NULL,
  `nama_rekening` varchar(20) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`kd_rekening`, `nama_rekening`, `nomor_rekening`, `nama_bank`) VALUES
('REK001', 'Sutrisno', '0460878136', 'BCA'),
('REK002', 'Sutrisno', '0372001567', 'BNI'),
('REK003', 'Sutrisno', '007701022126536', 'BRI'),
('REK004', 'Sutrisno', '139-00-1652600-0 ', 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `kd_slider` int(11) NOT NULL,
  `atas_slider` varchar(30) NOT NULL,
  `tengah_slider` varchar(20) NOT NULL,
  `bawah_slider` varchar(20) NOT NULL,
  `gambar_slider` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`kd_slider`, `atas_slider`, `tengah_slider`, `bawah_slider`, `gambar_slider`) VALUES
(1, 'Lapangan Bola Berkualitas', 'Tempat ', 'SANTRI BERKUALITAS', 'futsal.jpg'),
(2, 'PERCAYAKAN MASA DEPAN', 'ANAK ', 'BERSAMA KAMI', 'futsal2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terlambat`
--

CREATE TABLE `tbl_terlambat` (
  `kd_terlambat` varchar(10) NOT NULL,
  `terlambat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_terlambat`
--

INSERT INTO `tbl_terlambat` (`kd_terlambat`, `terlambat`) VALUES
('TER001', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`kd_jam`);

--
-- Indexes for table `tbl_judul`
--
ALTER TABLE `tbl_judul`
  ADD PRIMARY KEY (`kd_judul`);

--
-- Indexes for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  ADD PRIMARY KEY (`kd_lapangan`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`kd_logo`);

--
-- Indexes for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  ADD PRIMARY KEY (`kd_penyewa`);

--
-- Indexes for table `tbl_penyewaan`
--
ALTER TABLE `tbl_penyewaan`
  ADD PRIMARY KEY (`kd_penyewaan`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`kd_perush`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`kd_rekening`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`kd_slider`);

--
-- Indexes for table `tbl_terlambat`
--
ALTER TABLE `tbl_terlambat`
  ADD PRIMARY KEY (`kd_terlambat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  MODIFY `kd_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_judul`
--
ALTER TABLE `tbl_judul`
  MODIFY `kd_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `kd_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_penyewaan`
--
ALTER TABLE `tbl_penyewaan`
  MODIFY `kd_penyewaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `kd_perush` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `kd_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
