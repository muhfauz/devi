-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 12:49 PM
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
  `status_admin` enum('admin','service','sales') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `gambar_admin`, `alamat_admin`, `nohp_admin`, `status_admin`) VALUES
('ADM001', 'Sutrisno', 'ADM001', 'e10adc3949ba59abbe56e057f20f883e', 'adm_1657406829.png', 'Suro', '085742906467', 'admin'),
('ADM002', 'erererer', 'ADM002', 'e10adc3949ba59abbe56e057f20f883e', 'admin_gaji.png', 'eerer', '34343434', 'service'),
('ADM003', 'Sutrisno', 'ADM003', 'e10adc3949ba59abbe56e057f20f883e', 'admin_gaji.png', 'Banyumas', '082135644777', 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `kd_bagian` varchar(10) NOT NULL,
  `nama_bagian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`kd_bagian`, `nama_bagian`) VALUES
('BAG001', 'Sales'),
('BAG002', 'Service'),
('BAG003', 'Umum'),
('BAG004', 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `kd_bank` varchar(10) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_bank` varchar(20) NOT NULL,
  `kd_admin` text NOT NULL,
  `c_bank` datetime NOT NULL,
  `e_bank` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`kd_bank`, `nama_bank`, `no_bank`, `kd_admin`, `c_bank`, `e_bank`) VALUES
('BANK001', 'BRI', '0077-01-022126-53', 'ADM001', '2022-08-29 10:21:46', '0000-00-00 00:00:00'),
('BANK002', 'Mandiri', '139-00-1652600-0', 'ADM001', '2022-08-29 10:24:18', '0000-00-00 00:00:00'),
('BANK003', 'BCA', ' 0460878136', 'ADM001', '2022-08-29 10:24:36', '0000-00-00 00:00:00'),
('BANK004', 'BNI', '0372001567', 'ADM001', '2022-08-29 10:24:56', '2022-08-30 08:23:11'),
('BANK005', 'Genius', '4661601036722699', 'ADM001', '2022-08-30 08:23:34', '2022-08-30 08:24:13'),
('BANK006', 'BTPN', '90320195515', 'ADM001', '2022-08-30 08:26:50', '0000-00-00 00:00:00');

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
-- Table structure for table `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `kd_gaji` varchar(10) NOT NULL,
  `bulan_gaji` varchar(10) NOT NULL,
  `tahun_gaji` varchar(4) NOT NULL,
  `status_gaji` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gaji`
--

INSERT INTO `tbl_gaji` (`kd_gaji`, `bulan_gaji`, `tahun_gaji`, `status_gaji`) VALUES
('GAJ001', 'Juli', '2022', 'aktif'),
('GAJ002', 'Agustus', '2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gajidetail`
--

CREATE TABLE `tbl_gajidetail` (
  `kd_gajidetail` int(11) NOT NULL,
  `kd_gaji` varchar(10) NOT NULL,
  `kd_karyawan` varchar(10) NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `insentif_reguler` int(20) NOT NULL,
  `tunjangan_jabatan` int(20) NOT NULL,
  `kd_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gajidetail`
--

INSERT INTO `tbl_gajidetail` (`kd_gajidetail`, `kd_gaji`, `kd_karyawan`, `jumlah_masuk`, `insentif_reguler`, `tunjangan_jabatan`, `kd_admin`) VALUES
(37, 'GAJ001', 'KAR001', 30, 0, 100000, 'ADM001'),
(38, 'GAJ001', 'KAR002', 0, 55556, 0, 'ADM001'),
(39, 'GAJ001', 'KAR003', 0, 55556, 0, 'ADM001'),
(40, 'GAJ001', 'KAR004', 0, 0, 200000, 'ADM001'),
(41, 'GAJ001', 'KAR005', 0, 0, 200000, 'ADM001'),
(42, 'GAJ001', 'KAR006', 0, 55556, 0, 'ADM001'),
(43, 'GAJ001', 'KAR007', 20, 55556, 0, 'ADM001'),
(44, 'GAJ001', 'KAR008', 0, 0, 100000, 'ADM001'),
(45, 'GAJ001', 'KAR009', 0, 0, 0, 'ADM001'),
(46, 'GAJ001', 'KAR010', 0, 0, 1500000, 'ADM001'),
(47, 'GAJ001', 'KAR011', 0, 0, 0, 'ADM001'),
(48, 'GAJ001', 'KAR012', 0, 0, 0, 'ADM001'),
(49, 'GAJ001', 'KAR013', 0, 0, 0, 'ADM001'),
(50, 'GAJ001', 'KAR014', 0, 0, 0, 'ADM001'),
(51, 'GAJ001', 'KAR015', 0, 0, 0, 'ADM001'),
(52, 'GAJ001', 'KAR016', 0, 0, 0, 'ADM001'),
(53, 'GAJ001', 'KAR017', 0, 0, 0, 'ADM001'),
(54, 'GAJ001', 'KAR018', 0, 0, 0, 'ADM001'),
(55, 'GAJ001', 'KAR019', 0, 0, 0, 'ADM001'),
(56, 'GAJ001', 'KAR020', 0, 0, 0, 'ADM001'),
(57, 'GAJ001', 'KAR021', 0, 0, 0, 'ADM001'),
(58, 'GAJ001', 'KAR022', 0, 0, 0, 'ADM001'),
(59, 'GAJ001', 'KAR023', 0, 0, 0, 'ADM001'),
(60, 'GAJ001', 'KAR024', 0, 0, 0, 'ADM001'),
(61, 'GAJ001', 'KAR025', 0, 0, 0, 'ADM001'),
(62, 'GAJ001', 'KAR026', 0, 0, 0, 'ADM001');

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
('JAM002', '10:00', 0),
('JAM003', '11:00', 0),
('JAM004', '12:00', 80000),
('JAM005', '19:00', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenismobil`
--

CREATE TABLE `tbl_jenismobil` (
  `kd_jenismobil` varchar(10) NOT NULL,
  `nama_jenismobil` varchar(30) NOT NULL,
  `komisisales_jenismobil` int(20) NOT NULL,
  `komisisupervisor_jenismobil` int(20) NOT NULL,
  `komisikc_jenismobil` int(20) NOT NULL,
  `komisiadmin_jenismobil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenismobil`
--

INSERT INTO `tbl_jenismobil` (`kd_jenismobil`, `nama_jenismobil`, `komisisales_jenismobil`, `komisisupervisor_jenismobil`, `komisikc_jenismobil`, `komisiadmin_jenismobil`) VALUES
('JEN001', 'FORMO', 750000, 200000, 50000, 50000),
('JEN002', 'CONFERO', 750000, 200000, 50000, 50000),
('JEN003', 'CORTEZ', 1000000, 200000, 50000, 50000),
('JEN004', 'ALMAZ', 1500000, 300000, 100000, 50000),
('JEN005', 'AMBULANCE', 750000, 200000, 50000, 50000);

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
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `kd_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tempatlahir_karyawan` varchar(30) NOT NULL,
  `tgllahir_karyawan` date NOT NULL,
  `jk_karyawan` enum('Pria','Wanita') NOT NULL,
  `alamat_karyawan` varchar(50) NOT NULL,
  `nohp_karyawan` varchar(15) NOT NULL,
  `kd_jabatan` varchar(10) NOT NULL,
  `kd_bagian` varchar(10) NOT NULL,
  `tglmasuk_karyawan` date NOT NULL,
  `gambar_karyawan` varchar(50) NOT NULL,
  `bpjs_kes` int(20) NOT NULL,
  `bpjs_tk` int(20) NOT NULL,
  `bpjs_pen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`kd_karyawan`, `nama_karyawan`, `tempatlahir_karyawan`, `tgllahir_karyawan`, `jk_karyawan`, `alamat_karyawan`, `nohp_karyawan`, `kd_jabatan`, `kd_bagian`, `tglmasuk_karyawan`, `gambar_karyawan`, `bpjs_kes`, `bpjs_tk`, `bpjs_pen`) VALUES
('KAR001', 'PETER SANTORO', 'SURABAYA', '1976-12-01', 'Pria', 'PERUM BAI PURWOKERTO TIMUR', '02816446008', 'JAB001', 'BAG004', '2018-12-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR002', 'WISNU', 'SEMARANG', '1989-12-13', 'Pria', 'SOLO', '0877', 'JAB002', 'BAG002', '2021-09-20', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR003', 'YESSA', 'BANYUMAS', '1998-06-06', 'Pria', 'SOKARAJA LOR', '0877', 'JAB003', 'BAG002', '2020-11-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR004', 'AGUNG PRABOWO', 'WONOSOBO', '1978-12-12', 'Pria', 'PURWOKERTO SELATAN', '0877', 'JAB004', 'BAG001', '2019-02-21', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR005', 'ABDUL AZIZ', 'BANYUMAS', '1998-12-12', 'Pria', 'PURWOKERTO', '0877', 'JAB004', 'BAG001', '2020-02-02', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR006', 'RIZKY MARHABAN', 'YOGYAKARTA', '1992-12-12', 'Pria', 'PURBALINGGA', '0877', 'JAB005', 'BAG002', '2018-06-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR007', 'ELISA DAMAYANTI', 'BANYUMAS', '1997-09-16', 'Wanita', 'KALIBAGOR', '0812', 'JAB007', 'BAG002', '2018-01-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR008', 'DEWI ANGGRAENI', 'BANYUMAS', '1997-06-12', 'Wanita', 'KALIORI', '0813', 'JAB006', 'BAG001', '2020-12-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR009', 'FADLUN FAUZI', 'CILACAP', '1997-02-22', 'Pria', 'NUSAWUNGU', '087719956565', 'JAB008', 'BAG002', '2015-06-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR010', 'VENI FATMAWATI', 'BANYUMAS', '1982-06-12', 'Wanita', 'PURWOKERTO UTARA', '0812', 'JAB009', 'BAG001', '2012-12-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR011', 'ERI UNDIYANI', 'BANYUMAS', '1992-01-08', 'Wanita', 'AJIBARANG', '0812', 'JAB009', 'BAG001', '2018-03-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR012', 'IDE BAGUS', 'PURBALINGGA', '1989-12-12', 'Pria', 'PURBALINGGA', '0877', 'JAB010', 'BAG001', '2020-06-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR013', 'DIMAS RIZKY', 'CIREBON', '1998-12-12', 'Pria', 'BANJARNEGARA', '0877', 'JAB010', 'BAG001', '2022-03-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR014', 'DENNY', 'BANYUMAS', '1992-06-12', 'Pria', 'PURWOKERTO', '0877', 'JAB010', 'BAG001', '2021-02-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR015', 'DESSY', 'BANYUMAS', '1992-02-04', 'Wanita', 'AJIBARANG', '0877', 'JAB010', 'BAG001', '2022-03-15', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR016', 'MAHENDRA SAPUTRA', 'CIREBON', '1976-05-06', 'Pria', 'CIREBON', '0877', 'JAB010', 'BAG001', '2018-11-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR017', 'AMRUL', 'BANYUMAS', '1998-06-05', 'Pria', 'PURWOKERTO', '0877', 'JAB010', 'BAG001', '2022-05-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR018', 'JUNIOR NUGRAHA', 'BANYUMAS', '1999-01-01', 'Pria', 'BANYUMAS', '0877', 'JAB010', 'BAG001', '2022-06-20', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR019', 'FEBIAN VALENTINO', 'BANYUMAS', '1996-01-01', 'Pria', 'BANYUMAS', '0877', 'JAB010', 'BAG001', '2022-06-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR020', 'SILVIA AYU', 'BANYUMAS', '1995-06-01', 'Wanita', 'BANYUMAS', '0877', 'JAB010', 'BAG001', '2022-06-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR021', 'GALUH PERMANA', 'BANYUMAS', '1989-05-01', 'Pria', 'SUMBANG', '0815', 'JAB011', 'BAG002', '2013-05-12', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR022', 'TRIAN ACIK', 'BANYUMAS', '1995-06-15', 'Pria', 'SOMAGEDE', '0877', 'JAB011', 'BAG002', '2014-12-15', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR023', 'ERNO KURNIAWAN', 'KEBUMEN', '1998-06-12', 'Pria', 'KEBUMEN', '0877', 'JAB011', 'BAG002', '2018-01-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR024', 'HANDOKO SULISTIYO', 'BANYUMAS', '1995-06-15', 'Pria', 'BANYUMAS', '087', 'JAB012', 'BAG003', '2018-09-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR025', 'SALIMAN', 'BANYUMAS', '1975-05-12', 'Pria', 'SOKARAJA KULON', '0877', 'JAB013', 'BAG003', '2018-03-01', 'foto_karyawan.png', 20000, 40000, 20000),
('KAR026', 'ANTA WALIYANA', 'BANYUMAS', '1992-12-12', 'Pria', 'PURWOKERTO UTARA', '0877', 'JAB003', 'BAG003', '2020-05-01', 'foto_karyawan.png', 20000, 40000, 20000);

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
('LAP001', 'Lapangan A');

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
-- Table structure for table `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `kd_lowongan` int(11) NOT NULL,
  `kd_pengiklan` varchar(10) NOT NULL,
  `tgl_lowongan` date NOT NULL,
  `url_lowongan` varchar(100) NOT NULL,
  `harga_lowongan` int(100) NOT NULL,
  `kd_bank` text NOT NULL,
  `kd_web` varchar(10) NOT NULL,
  `kd_admin` varchar(10) NOT NULL,
  `jumlah_lowongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `kd_mobil` varchar(10) NOT NULL,
  `nama_mobil` varchar(30) NOT NULL,
  `harga_mobil` int(20) NOT NULL,
  `ket_mobil` text NOT NULL,
  `gambar_mobil` varchar(50) NOT NULL,
  `kd_jenismobil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`kd_mobil`, `nama_mobil`, `harga_mobil`, `ket_mobil`, `gambar_mobil`, `kd_jenismobil`) VALUES
('MOB001', 'FORMO 1.2 BLIND VAN', 154200000, '', 'foto_mobil.png', 'JEN001'),
('MOB002', 'FORMO 1.2 MB 5 SEATER', 164800000, 'TEST', 'foto_mobil.png', 'JEN001'),
('MOB003', 'FORMO 1.2 MB 8 SEATER', 169600000, '', 'foto_mobil.png', 'JEN001'),
('MOB004', 'CONFERO 1.5 DB', 184300000, '', 'foto_mobil.png', 'JEN002'),
('MOB005', 'CONFERO S 1.5 C LUX', 203700000, '', 'foto_mobil.png', 'JEN002'),
('MOB006', 'CONFERO S 1.5 L LUX+', 218850000, '', 'foto_mobil.png', 'JEN002'),
('MOB007', 'CONFERO S 1.5 ACT', 228300000, '', 'foto_mobil.png', 'JEN002'),
('MOB008', 'CORTEZ 1.5 ST LUX MT', 253500000, '', 'foto_mobil.png', 'JEN003'),
('MOB009', 'CORTEZ 1.5 ST LUX CVT', 271100000, '', 'foto_mobil.png', 'JEN003'),
('MOB010', 'CORTEZ 1.5 ST LUX+ CVT', 275200000, '', 'foto_mobil.png', 'JEN003'),
('MOB011', 'CORTEZ 1.5 CT 6MT', 269200000, '', 'foto_mobil.png', 'JEN003'),
('MOB012', 'CORTEZ 1.5 CT LUX 6MT', 273200000, '', 'foto_mobil.png', 'JEN003'),
('MOB013', 'CORTEZ 1.5 CT LUX+ CVT', 278300000, '', 'foto_mobil.png', 'JEN003'),
('MOB014', 'CORTEZ 1.5 LT LUX+ CVT', 325650000, '', 'foto_mobil.png', 'JEN003'),
('MOB015', 'CORTEZ 1.5 CT LUX+ CVT(CE) MY2', 292300000, '', 'foto_mobil.png', 'JEN003'),
('MOB016', 'CORTEZ 1.5 LT LUX+ CVT (EX) MY', 330650000, '', 'foto_mobil.png', 'JEN003'),
('MOB017', 'ALMAZ 1.5 ST 6MT 7 SEAT', 300500000, '', 'foto_mobil.png', 'JEN004'),
('MOB018', 'ALMAZ 1.5 ST CVT 7 SEAT', 318050000, '', 'foto_mobil.png', 'JEN004'),
('MOB019', 'ALMAZ 1.5 LT LUX VC CVT 5 SEAT', 372100000, '', 'foto_mobil.png', 'JEN004'),
('MOB020', 'ALMAZ 1.5 LUX+ SC CVT 7 SEAT', 382800000, '', 'foto_mobil.png', 'JEN004'),
('MOB021', 'ALMAZ RS 1.5 E 5 SEAT', 404100000, '', 'foto_mobil.png', 'JEN004'),
('MOB022', 'ALMAZ RS 1.5 E 7 SEAT', 416100000, '', 'foto_mobil.png', 'JEN004'),
('MOB023', 'ALMAZ RS PRO 1.5 7 SEAT', 436200000, '', 'foto_mobil.png', 'JEN004'),
('MOB024', 'FORMO 1.2 MB BASIC', 195000000, '', 'foto_mobil.png', 'JEN005'),
('MOB025', 'FORMO 1.2 MB MEDIUM', 208000000, '', 'foto_mobil.png', 'JEN005'),
('MOB026', 'FORMO 1.2 MB LUXURY', 220500000, '', 'foto_mobil.png', 'JEN005'),
('MOB027', 'CONFERO 1.5 DB BASIC', 214500000, '', 'foto_mobil.png', 'JEN005'),
('MOB028', 'CONFERO 1.5 DB MEDIUM', 227500000, '', 'foto_mobil.png', 'JEN005'),
('MOB029', 'CONFERO 1.5 DB  LUXURY', 240000000, '', 'foto_mobil.png', 'JEN005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiklan`
--

CREATE TABLE `tbl_pengiklan` (
  `kd_pengiklan` varchar(10) NOT NULL,
  `nama_pengiklan` varchar(100) NOT NULL,
  `tentang_pengiklan` text NOT NULL,
  `alamat_pengiklan` varchar(100) NOT NULL,
  `hrd_pengiklan` varchar(30) NOT NULL,
  `ig_pengiklan` varchar(100) NOT NULL,
  `email_pengiklan` varchar(100) NOT NULL,
  `hp_pengiklan` varchar(15) NOT NULL,
  `c_pengiklan` datetime NOT NULL,
  `e_pengiklan` datetime NOT NULL,
  `kd_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengiklan`
--

INSERT INTO `tbl_pengiklan` (`kd_pengiklan`, `nama_pengiklan`, `tentang_pengiklan`, `alamat_pengiklan`, `hrd_pengiklan`, `ig_pengiklan`, `email_pengiklan`, `hp_pengiklan`, `c_pengiklan`, `e_pengiklan`, `kd_admin`) VALUES
('ADV001', 'Siomay Bandung Opick', 'Perusahaan Somai', 'Bandung', '-', '', '', '087770080096', '2022-08-29 06:10:07', '2022-08-29 06:20:10', 'ADM001'),
('ADV002', 'UCLIN', 'Toko Uclin', 'Jl. MT Haryono 122 Purwokerto ', '-', '', '', '08170488899', '2022-08-29 06:59:45', '2022-08-29 07:00:11', 'ADM001'),
('ADV003', 'Afas HIjab', '-', '-', '-', '', '', '088225077304', '2022-08-29 07:01:11', '0000-00-00 00:00:00', 'ADM001'),
('ADV004', 'Bimbel Privat Pintar', 'Bimbangan Belajar', '-', 'Akbar', '', '', '087723057689', '2022-08-29 07:04:47', '0000-00-00 00:00:00', 'ADM001'),
('ADV005', 'Pllanet Surf', 'toko Planet Surt', '-', '-', 'https://www.instagram.com/tigazero/', '', '0', '2022-08-29 07:49:08', '2022-08-29 07:49:21', 'ADM001'),
('ADV006', 'CV Al Fazza Jaya', '-', '-', '-', 'https://www.instagram.com/awangkhecol/', '', '0', '2022-08-29 07:51:44', '0000-00-00 00:00:00', 'ADM001'),
('ADV007', 'GURU KITA', 'Bimbel', '-', 'Ade Rahmawati Nurbekti', 'https://www.instagram.com/adebekti/', '', '0', '2022-08-29 07:52:56', '0000-00-00 00:00:00', 'ADM001'),
('ADV008', 'PT Buana Rima Persada', '-', '-', 'R. Dimas Bagus k', 'https://www.instagram.com/rdbk09/', '', '0', '2022-08-29 07:54:13', '0000-00-00 00:00:00', 'ADM001'),
('ADV009', 'Lumpia Boom', 'PT Lumpia BOom', '-', 'Desti Dwi Saputri', 'https://www.instagram.com/desti27/', '', '0', '2022-08-29 07:55:39', '0000-00-00 00:00:00', 'ADM001'),
('ADV010', 'PT. CREATIVE DIGITAL UTAMA (CREDIA)', '-', '-', 'Haidar Ammar', 'https://www.instagram.com/haidarmarr/', '', '0', '2022-08-29 07:58:07', '0000-00-00 00:00:00', 'ADM001'),
('ADV011', 'PT Dua Pilar Lestari', '-', '-', 'Ita', '-', '', '085600836119', '2022-08-29 08:22:43', '0000-00-00 00:00:00', 'ADM001'),
('ADV012', 'JLF Store', 'Digital Marketing', 'Jalan Pancuraws Purwokerto Kidul Kec Purwokerto Selatan Kab Banyumas', 'Fajri', '-', 'jlfstoreid@gmail.com', '082225128004', '2022-08-29 08:40:46', '2022-08-29 09:28:44', 'ADM001'),
('ADV013', 'TB. Baja Makmur', '-', '-', '-', '-', '', '087837416020', '2022-08-29 09:12:58', '0000-00-00 00:00:00', 'ADM001'),
('ADV014', 'PT KARUNIA BANGUN SEMESTA', '-', '-', 'Yanti Purwokerto', 'https://www.instagram.com/yantipwt/', '-', '0', '2022-08-29 10:15:10', '2022-08-29 10:15:51', 'ADM001'),
('ADV015', 'Toko Selera', 'toko roti', '-', '-', '-', '-', '081318087825', '2022-08-29 13:56:17', '0000-00-00 00:00:00', 'ADM001'),
('ADV016', 'fortuuin_thriftshop', '-', '-', '-', 'https://www.instagram.com/fortuuin_thriftshop/', '-', '0', '2022-08-29 14:16:03', '0000-00-00 00:00:00', 'ADM001'),
('ADV017', 'PT Padma Raharja Sentosa', '-', '-', 'Devie', '-', '-', '082133652508', '2022-08-29 15:09:27', '0000-00-00 00:00:00', 'ADM001'),
('ADV018', 'Sembada Gold', '-', '-', '-', '-', '-', '081903579345', '2022-08-30 12:10:58', '0000-00-00 00:00:00', 'ADM001'),
('ADV019', 'Surya Security Sistem', '-', '-', 'Theo Surya', '-', '-', '0', '2022-08-30 12:11:22', '0000-00-00 00:00:00', 'ADM001'),
('ADV020', 'Elzatta', '-', '-', 'M Naufal Quthbi Arifin', 'https://www.instagram.com/acengzaenalarifin/', '-', '0', '2022-08-30 13:00:26', '0000-00-00 00:00:00', 'ADM001'),
('ADV021', 'Bimbel Cendikia', '-', '-', '-', '-', '-', '085225609954', '2022-08-30 15:14:31', '0000-00-00 00:00:00', 'ADM001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `kd_penjualan` varchar(10) NOT NULL,
  `kd_gaji` varchar(10) NOT NULL,
  `kd_karyawan` varchar(10) NOT NULL,
  `kd_mobil` varchar(10) NOT NULL,
  `jumlah_penjualan` int(10) NOT NULL,
  `kd_spv` varchar(10) NOT NULL,
  `kd_as` varchar(10) NOT NULL,
  `kd_kc` varchar(10) NOT NULL,
  `total_penjualan` int(20) NOT NULL,
  `kd_admin` varchar(10) NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`kd_penjualan`, `kd_gaji`, `kd_karyawan`, `kd_mobil`, `jumlah_penjualan`, `kd_spv`, `kd_as`, `kd_kc`, `total_penjualan`, `kd_admin`, `tgl_penjualan`) VALUES
('PJL001', 'GAJ001', 'KAR010', 'MOB002', 1, 'KAR004', 'KAR008', 'KAR001', 164800000, 'ADM001', '2022-07-25'),
('PJL002', 'GAJ001', 'KAR010', 'MOB002', 1, 'KAR005', 'KAR008', 'KAR001', 164800000, 'ADM001', '2022-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewa`
--

CREATE TABLE `tbl_penyewa` (
  `kd_penyewa` varchar(10) NOT NULL,
  `nama_penyewa` varchar(30) NOT NULL,
  `tempatlahir_penyewa` varchar(20) NOT NULL,
  `tgllahir_penyewa` date NOT NULL,
  `jk_penyewa` varchar(10) NOT NULL,
  `alamat_penyewa` varchar(30) NOT NULL,
  `nohp_penyewa` varchar(15) NOT NULL,
  `gambar_penyewa` varchar(58) NOT NULL,
  `password_penyewa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penyewa`
--

INSERT INTO `tbl_penyewa` (`kd_penyewa`, `nama_penyewa`, `tempatlahir_penyewa`, `tgllahir_penyewa`, `jk_penyewa`, `alamat_penyewa`, `nohp_penyewa`, `gambar_penyewa`, `password_penyewa`) VALUES
('KAR001', 'aaaa', 'aaaa', '2022-12-16', 'Pria', '343434', '34343434', '', '');

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
(1, 'Lapangn Bola', 'Jl.Siliwangi, Desa Suro Kecamatan Kalibagor Banyumas. ', 'ererererer', '085742906467', 'azzuhriyyahsuro@gmail.com', 'gambar1639611256.png', 'gambar1639612064.png', 'logodepan1639612646.png', '53444', 'purbalingga', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `kd_service` varchar(10) NOT NULL,
  `kd_gaji` varchar(15) NOT NULL,
  `total_service` int(10) NOT NULL,
  `kd_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`kd_service`, `kd_gaji`, `total_service`, `kd_admin`) VALUES
('SER001', 'GAJ001', 500000, 'ADM001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web`
--

CREATE TABLE `tbl_web` (
  `kd_web` varchar(10) NOT NULL,
  `nama_web` varchar(40) NOT NULL,
  `username_web` varchar(40) NOT NULL,
  `email_web` varchar(100) NOT NULL,
  `password_web` varchar(100) NOT NULL,
  `domain_web` varchar(100) NOT NULL,
  `hosting_web` varchar(100) NOT NULL,
  `c_web` datetime NOT NULL,
  `e_web` datetime NOT NULL,
  `kd_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`kd_bagian`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indexes for table `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`kd_bulan`);

--
-- Indexes for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`kd_gaji`);

--
-- Indexes for table `tbl_gajidetail`
--
ALTER TABLE `tbl_gajidetail`
  ADD PRIMARY KEY (`kd_gajidetail`);

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
-- Indexes for table `tbl_jenismobil`
--
ALTER TABLE `tbl_jenismobil`
  ADD PRIMARY KEY (`kd_jenismobil`);

--
-- Indexes for table `tbl_judul`
--
ALTER TABLE `tbl_judul`
  ADD PRIMARY KEY (`kd_judul`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`kd_karyawan`);

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
-- Indexes for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`kd_lowongan`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`kd_mobil`);

--
-- Indexes for table `tbl_pengiklan`
--
ALTER TABLE `tbl_pengiklan`
  ADD PRIMARY KEY (`kd_pengiklan`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`kd_penjualan`);

--
-- Indexes for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  ADD PRIMARY KEY (`kd_penyewa`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`kd_perush`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`kd_service`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  MODIFY `kd_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_gajidetail`
--
ALTER TABLE `tbl_gajidetail`
  MODIFY `kd_gajidetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
-- AUTO_INCREMENT for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `kd_perush` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
