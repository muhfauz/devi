-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2023 at 02:19 AM
-- Server version: 10.3.37-MariaDB-log-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilmutaj1_devi`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `gambar_admin`, `alamat_admin`, `nohp_admin`, `status_admin`) VALUES
('ADM001', 'Sutrisno', 'ADM001', 'e10adc3949ba59abbe56e057f20f883e', 'adm_1657406829.png', 'Suro', '085742906467', 'Administrator'),
('ADM002', 'devi', 'ADM002', 'e10adc3949ba59abbe56e057f20f883e', 'admin_gaji.png', 'klangenan', 'Administrator', 'Administrator'),
('ADM003', 'Sutrisno', 'ADM003', 'e10adc3949ba59abbe56e057f20f883e', 'admin_gaji.png', 'Banyumas', '082135644777', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `kd_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `kd_faq` int(11) NOT NULL,
  `tanya_faq` varchar(100) NOT NULL,
  `jawab_faq` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`kd_faq`, `tanya_faq`, `jawab_faq`) VALUES
(1, 'Berikut Langkah-Langkah Cara Menyewa Lapangan Di Bintang Futsal', 'Bagaimana sih cara sewanya?\r\n<p>\r\n1. Pastikan telah masuk ke akun anda. Jika belum punya akun bisa registrasi (daftar) terlebih dahulu.\r\n</p>\r\n2. Kemudian pilih tanggal dan lapangan yang ada di menu sewa lapangan.\r\n3. Pilih jam yang akan di booking\r\n4. Pilih metode pembayaran DP 50% atau Lunas\r\n5. Masuk ke history sewa untuk mengkonfirmasi pembayaran dengan cara mengupload bukti bayar.\r\n6. Setelah upload bukti status pembayaran SUDAH BAYAR, ADMIN BELUM CEK. Tunggu beberapa saat sampai di konfirmasi oleh admin.\r\n7. Jika sudah terkonfirmasi maka status pembayaran telah berubah menjadi SELESAI.\r\n8. Jika belum maka UPLOAD BUKTI PEMBAYARAN ULANG.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `kd_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `gaji_pokok` int(50) NOT NULL,
  `uang_makan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jam`
--

INSERT INTO `tbl_jam` (`kd_jam`, `jam`, `hargasewa_lapangan`) VALUES
('JAM001', '09:00', 80000),
('JAM002', '10:00', 80000),
('JAM003', '11:00', 80000),
('JAM004', '12:00', 80000),
('JAM005', '13.00', 80000),
('JAM006', '14.00', 80000),
('JAM007', '15.00', 80000),
('JAM008', '16.00', 80000),
('JAM009', '17:00', 80000),
('JAM010', '18:00', 120000),
('JAM011', '19:00', 120000),
('JAM012', '20:00', 120000),
('JAM013', '21:00', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_judul`
--

CREATE TABLE `tbl_judul` (
  `kd_judul` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `oleh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_judul`
--

INSERT INTO `tbl_judul` (`kd_judul`, `judul`, `oleh`) VALUES
(1, 'Sistem Informasi Penyewaan Bintang Futsal Jamblang Cirebon', 'Devi Universitas Nusa Mandiri Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lapangan`
--

CREATE TABLE `tbl_lapangan` (
  `kd_lapangan` varchar(10) NOT NULL,
  `nama_lapangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lapangan`
--

INSERT INTO `tbl_lapangan` (`kd_lapangan`, `nama_lapangan`) VALUES
('LAP001', 'Lapangan A'),
('LAP002', 'Lapangan B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `kd_logo` int(11) NOT NULL,
  `nama_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penyewa`
--

INSERT INTO `tbl_penyewa` (`kd_penyewa`, `nama_penyewa`, `tempatlahir_penyewa`, `tgllahir_penyewa`, `jk_penyewa`, `alamat_penyewa`, `nohp_penyewa`, `gambar_penyewa`, `password_penyewa`) VALUES
('PEN001', 'Sutrisno', 'aaaa', '2022-12-16', 'Pria', 'Dawuhan Wetan', '082135644333', 'adm_1657406829.png', 'e10adc3949ba59abbe56e057f20f883e'),
('PEN002', 'aaa', 'bbb', '2022-12-24', 'Wanita', 'aaaa', '12222222', 'foto_penyewa.png', 'e10adc3949ba59abbe56e057f20f883e'),
('PEN003', 'dsfaerr', 'ererere', '2023-01-02', 'Wanita', '343434', '343434', 'foto_penyewa.png', '872622bacea6afdc9d6611efb38a433a'),
('PEN004', 'dererer', 'ererer', '2023-01-02', 'Pria', 'ererer', 'erererer', 'foto_penyewa.png', '872622bacea6afdc9d6611efb38a433a'),
('PEN005', 'ererer', 'ererere', '2023-01-03', 'Pria', '3434343', '55555', 'foto_penyewa.png', '872622bacea6afdc9d6611efb38a433a'),
('PEN006', 'aaaa', 'aaa', '2023-01-07', 'Wanita', 'aaa', 'aaa', 'foto_penyewa.png', '872622bacea6afdc9d6611efb38a433a');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penyewaan`
--

INSERT INTO `tbl_penyewaan` (`kd_penyewaan`, `tgl_penyewaan`, `kd_lapangan`, `kd_jam`, `kd_penyewa`, `kd_admin`, `status_penyewaan`, `tgl_pesan`, `harga_sewa`, `pembayaran_sewa`, `jumlah_bayar`, `bukti_bayar`, `rekening_bayar`) VALUES
(150, '2022-12-31', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(151, '2022-12-31', 'LAP001', 'JAM002', 'PEN001', 'ADM001', 'selesai', '2022-12-31 06:22:56', 80000, 'Lunas 80000', 80000, 'buktibayar_1672444817.png', 'BNI No  0372001567 a/n Sutrisno'),
(152, '2022-12-31', 'LAP001', 'JAM003', 'PEN001', 'ADM001', 'selesai', '2022-12-31 07:14:55', 80000, 'DP 40000', 80000, 'buktibayar_1672445724.png', 'BCA No  0460878136 a/n Sutrisno'),
(153, '2022-12-31', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(154, '2022-12-31', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(155, '2023-01-01', 'LAP001', 'JAM001', 'PEN001', 'ADM001', 'booking', '2023-01-01 10:30:52', 80000, 'Lunas 80000', 80000, 'buktibayar_1673272385.png', 'BCA No  0460878136 a/n Sutrisno'),
(156, '2023-01-01', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(157, '2023-01-01', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(158, '2023-01-01', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(159, '2023-01-01', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(160, '2023-01-09', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(161, '2023-01-09', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(162, '2023-01-09', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(163, '2023-01-09', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(164, '2023-01-09', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(165, '2023-01-09', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(166, '2023-01-09', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(167, '2023-01-09', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(168, '2023-01-09', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(169, '2023-01-09', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(170, '2023-01-09', 'LAP001', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(171, '2023-01-09', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(172, '2023-01-09', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(175, '2023-01-10', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(176, '2023-01-10', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(177, '2023-01-10', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(178, '2023-01-10', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(179, '2023-01-10', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(180, '2023-01-10', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(181, '2023-01-10', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(182, '2023-01-10', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(183, '2023-01-10', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(184, '2023-01-10', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(185, '2023-01-10', 'LAP001', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(186, '2023-01-10', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(187, '2023-01-10', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(190, '2023-01-11', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(191, '2023-01-11', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(192, '2023-01-11', 'LAP001', 'JAM003', 'PEN001', 'ADM001', 'booking', '2023-01-11 12:07:47', 80000, 'Lunas 80000', 0, '', ''),
(193, '2023-01-11', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(194, '2023-01-11', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(195, '2023-01-11', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(196, '2023-01-11', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(197, '2023-01-11', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(198, '2023-01-11', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(199, '2023-01-11', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(200, '2023-01-11', 'LAP001', 'JAM011', 'PEN001', 'ADM001', 'lunas', '2023-01-09 08:52:22', 120000, 'Lunas 120000', 1, 'buktibayar_1673843497.png', 'BCA No  0460878136 a/n Sutrisno'),
(201, '2023-01-11', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(202, '2023-01-11', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(205, '2023-01-12', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(206, '2023-01-12', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(207, '2023-01-12', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(208, '2023-01-12', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(209, '2023-01-12', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(210, '2023-01-12', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(211, '2023-01-12', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(212, '2023-01-12', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(213, '2023-01-12', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(214, '2023-01-12', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(215, '2023-01-12', 'LAP001', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(216, '2023-01-12', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(217, '2023-01-12', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(220, '2023-01-13', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(221, '2023-01-13', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(222, '2023-01-13', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(223, '2023-01-13', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(224, '2023-01-13', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(225, '2023-01-13', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(226, '2023-01-13', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(227, '2023-01-13', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(228, '2023-01-13', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(229, '2023-01-13', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(230, '2023-01-13', 'LAP001', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(231, '2023-01-13', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(232, '2023-01-13', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(235, '2023-01-14', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(236, '2023-01-14', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(237, '2023-01-14', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(238, '2023-01-14', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(239, '2023-01-14', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(240, '2023-01-14', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(241, '2023-01-14', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(242, '2023-01-14', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(243, '2023-01-14', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(244, '2023-01-14', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(245, '2023-01-14', 'LAP001', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(246, '2023-01-14', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(247, '2023-01-14', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(250, '2023-01-15', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(251, '2023-01-15', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(252, '2023-01-15', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(253, '2023-01-15', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(254, '2023-01-15', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(255, '2023-01-15', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(256, '2023-01-15', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(257, '2023-01-15', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(258, '2023-01-15', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(259, '2023-01-15', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(260, '2023-01-15', 'LAP001', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(261, '2023-01-15', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(262, '2023-01-15', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(265, '2023-01-10', 'LAP002', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(266, '2023-01-10', 'LAP002', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(267, '2023-01-10', 'LAP002', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(268, '2023-01-10', 'LAP002', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(269, '2023-01-10', 'LAP002', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(270, '2023-01-10', 'LAP002', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(271, '2023-01-10', 'LAP002', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(272, '2023-01-10', 'LAP002', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(273, '2023-01-10', 'LAP002', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(274, '2023-01-10', 'LAP002', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(275, '2023-01-10', 'LAP002', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(276, '2023-01-10', 'LAP002', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(277, '2023-01-10', 'LAP002', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(280, '2023-01-11', 'LAP002', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(281, '2023-01-11', 'LAP002', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(282, '2023-01-11', 'LAP002', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(283, '2023-01-11', 'LAP002', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(284, '2023-01-11', 'LAP002', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(285, '2023-01-11', 'LAP002', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(286, '2023-01-11', 'LAP002', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(287, '2023-01-11', 'LAP002', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(288, '2023-01-11', 'LAP002', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(289, '2023-01-11', 'LAP002', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(290, '2023-01-11', 'LAP002', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(291, '2023-01-11', 'LAP002', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(292, '2023-01-11', 'LAP002', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(295, '2023-01-13', 'LAP002', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(296, '2023-01-13', 'LAP002', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(297, '2023-01-13', 'LAP002', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(298, '2023-01-13', 'LAP002', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(299, '2023-01-13', 'LAP002', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(300, '2023-01-13', 'LAP002', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(301, '2023-01-13', 'LAP002', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(302, '2023-01-13', 'LAP002', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(303, '2023-01-13', 'LAP002', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(304, '2023-01-13', 'LAP002', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(305, '2023-01-13', 'LAP002', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(306, '2023-01-13', 'LAP002', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(307, '2023-01-13', 'LAP002', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(310, '2023-01-14', 'LAP002', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(311, '2023-01-14', 'LAP002', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(312, '2023-01-14', 'LAP002', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(313, '2023-01-14', 'LAP002', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(314, '2023-01-14', 'LAP002', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(315, '2023-01-14', 'LAP002', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(316, '2023-01-14', 'LAP002', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(317, '2023-01-14', 'LAP002', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(318, '2023-01-14', 'LAP002', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(319, '2023-01-14', 'LAP002', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(320, '2023-01-14', 'LAP002', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(321, '2023-01-14', 'LAP002', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(322, '2023-01-14', 'LAP002', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(325, '2023-01-15', 'LAP002', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(326, '2023-01-15', 'LAP002', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(327, '2023-01-15', 'LAP002', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(328, '2023-01-15', 'LAP002', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(329, '2023-01-15', 'LAP002', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(330, '2023-01-15', 'LAP002', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(331, '2023-01-15', 'LAP002', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(332, '2023-01-15', 'LAP002', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(333, '2023-01-15', 'LAP002', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(334, '2023-01-15', 'LAP002', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(335, '2023-01-15', 'LAP002', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(336, '2023-01-15', 'LAP002', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(337, '2023-01-15', 'LAP002', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(338, '2023-01-16', 'LAP001', 'JAM001', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(339, '2023-01-16', 'LAP001', 'JAM002', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(340, '2023-01-16', 'LAP001', 'JAM003', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(341, '2023-01-16', 'LAP001', 'JAM004', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(342, '2023-01-16', 'LAP001', 'JAM005', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(343, '2023-01-16', 'LAP001', 'JAM006', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(344, '2023-01-16', 'LAP001', 'JAM007', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(345, '2023-01-16', 'LAP001', 'JAM008', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(346, '2023-01-16', 'LAP001', 'JAM009', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 80000, '', 0, '', ''),
(347, '2023-01-16', 'LAP001', 'JAM010', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(348, '2023-01-16', 'LAP001', 'JAM011', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(349, '2023-01-16', 'LAP001', 'JAM012', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', ''),
(350, '2023-01-16', 'LAP001', 'JAM013', '', 'ADM001', 'kosong', '0000-00-00 00:00:00', 120000, '', 0, '', '');

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
  `prop_perush` varchar(50) NOT NULL,
  `url_perush` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`kd_perush`, `nama_perush`, `alamat_perush`, `tentang_perush`, `telepon_perush`, `email_perush`, `logob_perush`, `logok_perush`, `logo_depan`, `kd_pos`, `kab_perush`, `prop_perush`, `url_perush`) VALUES
(1, 'Bintang Footsal Jamblang', 'Jl. Bakung-Jamblang No.16, Sitiwinangun, Kec. Jamblang, Kabupaten Cirebon, Jawa Barat 45156', 'Menyewakan lapangan footsal dengan pelayanan terbaik', '082216473719', 'bintangfutsaljamblang@gmail.com', 'gambar1673252727.png', 'gambar1673252746.png', 'logodepan1673253403.png', '53444', 'purbalingga', 'Jawa Tengah', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d971.5883642396941!2d108.45715779487526!3d-6.699711420373256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee18a41a2df07%3A0xce6a267b0b764201!2sBintang%20Futsal!5e1!3m2!1sid!2sid!4v1673851610878!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `kd_rekening` varchar(10) NOT NULL,
  `nama_rekening` varchar(20) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`kd_rekening`, `nama_rekening`, `nomor_rekening`, `nama_bank`) VALUES
('REK001', 'Sutrisno', '0460878136', 'BCA'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`kd_slider`, `atas_slider`, `tengah_slider`, `bawah_slider`, `gambar_slider`) VALUES
(1, 'Lapangan Bola Berkualitas', 'Tempat ', 'BINTANG FUTSAL JAMBL', 'futsal.jpg'),
(2, 'PERCAYAKAN LAPANGAN FUTSAL ', 'ANAK ', 'BERSAMA KAMI', 'futsal2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentang`
--

CREATE TABLE `tbl_tentang` (
  `kd_tentang` int(5) NOT NULL,
  `judul_tentang` varchar(30) NOT NULL,
  `isi_tentang` text NOT NULL,
  `gambar_tentang` varchar(20) NOT NULL,
  `url_tentang` varchar(100) NOT NULL,
  `kd_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tentang`
--

INSERT INTO `tbl_tentang` (`kd_tentang`, `judul_tentang`, `isi_tentang`, `gambar_tentang`, `url_tentang`, `kd_admin`) VALUES
(1, 'Tentang Kami', '<p>Futsal dipopulerkan di Montevideo, Uruguay pada tahun 1930, oleh Juan Carlos Ceriani. Keunikan futsal mendapat perhatian di seluruh Amerika Selatan, terutamanya di Brasil. Ketrampilan yang dikembangkan dalam permainan ini dapat dilihat dalam gaya terkenal dunia yang diperlihatkan pemain-pemain Brasil di luar ruangan, pada lapangan berukuran biasa. Pele, bintang terkenal Brasil, contohnya, mengembangkan bakatnya di futsal. Sementara Brasil terus menjadi pusat futsal dunia, permainan ini sekarang dimainkan di bawah perlindungan F&eacute;d&eacute;ration Internationale de Football Association di seluruh dunia, dari Eropa hingga Amerika Tengah dan Amerika Utara serta Afrika, Asia, dan Oseania.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Futsal adalah permainan bola yang dimainkan oleh dua tim, yang masing-masing beranggotakan lima orang. Tujuannya adalah memasukkan bola ke gawang lawan, dengan memanipulasi bola dengan kaki. Selain lima pemain utama, setiap regu juga diizinkan memiliki pemain cadangan. Tidak seperti permainan sepak bola dalam ruangan lainnya, lapangan futsal dibatasi garis, bukan net atau papan.</p>\r\n', 'adm_1673044502.jpg', 'https://www.youtube.com/watch?v=niDjf5g1Iro', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terlambat`
--

CREATE TABLE `tbl_terlambat` (
  `kd_terlambat` varchar(10) NOT NULL,
  `terlambat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`kd_faq`);

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
-- Indexes for table `tbl_tentang`
--
ALTER TABLE `tbl_tentang`
  ADD PRIMARY KEY (`kd_tentang`);

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
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `kd_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `kd_penyewaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

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

--
-- AUTO_INCREMENT for table `tbl_tentang`
--
ALTER TABLE `tbl_tentang`
  MODIFY `kd_tentang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
