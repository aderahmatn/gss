-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Feb 2020 pada 10.25
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ptgss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbarang`
--

CREATE TABLE IF NOT EXISTS `tbarang` (
  `IdBarang` varchar(50) NOT NULL,
  `KodeBarang` varchar(50) NOT NULL,
  `NamaBarang` varchar(50) NOT NULL,
  `Qty` int(5) NOT NULL,
  `Box` varchar(10) NOT NULL,
  `Label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbarang`
--

INSERT INTO `tbarang` (`IdBarang`, `KodeBarang`, `NamaBarang`, `Qty`, `Box`, `Label`) VALUES
('BRG5e366c4c64f41', '33709-K03-N300', 'COVER TAIL LOWER K03', 100, 'BB', 'putih'),
('BRG5e366f5fc0404', '6431A-K03-N300-IN', 'COVER MAIN PIPE ASSY', 10, 'C3', 'putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbarcode`
--

CREATE TABLE IF NOT EXISTS `tbarcode` (
  `idbarcode` varchar(20) NOT NULL,
  `IdSpp` varchar(50) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Lot` varchar(2) NOT NULL,
  `ActualQty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbarcode`
--

INSERT INTO `tbarcode` (`idbarcode`, `IdSpp`, `Date`, `Lot`, `ActualQty`) VALUES
('BRD5E3BEC490E7F1', 'SPP5e380bf7bed75', '06/02/2020', 'a4', 12),
('BRD5E3BEC8FB1040', 'SPP5e384d6fb72ce', '06/02/2020', '12', 123),
('BRD5E3D1C5BF03A8', 'SPP5e380bf7bed75', '07/02/2020', 'a3', 46),
('BRD5E3D1C6C49B67', 'SPP5e384d6fb72ce', '07/02/2020', 'a1', 72),
('BRD5E3D1EAB3DFD0', 'SPP5e380bf7bed75', '2020-02-07', 'a1', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmesin`
--

CREATE TABLE IF NOT EXISTS `tmesin` (
  `IdMesin` varchar(50) NOT NULL,
  `NoMc` varchar(20) NOT NULL,
  `Merk` varchar(20) NOT NULL,
  `Tonase` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmesin`
--

INSERT INTO `tmesin` (`IdMesin`, `NoMc`, `Merk`, `Tonase`) VALUES
('MSN5e33d68b36284', 'MC-03', 'JSW', 450),
('MSN5e33d69a03c0b', 'MC-04', 'TOYO', 250),
('MSN5e3b2cd8aae1c', 'MC-06', 'KYW', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tspb`
--

CREATE TABLE IF NOT EXISTS `tspb` (
  `IdSpb` varchar(20) NOT NULL,
  `IdBarcode` varchar(20) NOT NULL,
  `IdMesin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tspb`
--

INSERT INTO `tspb` (`IdSpb`, `IdBarcode`, `IdMesin`) VALUES
('SPB5e3c2d7badbe4', 'BRD5E3BEC490E7F1', 'MSN5e33d68b36284'),
('SPB5e3c2d7badbe4', 'BRD5E3BEC8FB1040', 'MSN5e33d68b36284'),
('SPB5e3c46110cac9', 'BRD5E3BEC490E7F1', 'MSN5e33d68b36284'),
('SPB5e3c46110cac9', 'BRD5E3BEC490E7F1', 'MSN5e33d68b36284'),
('SPB5e3c46110cac9', 'BRD5E3BEC8FB1040', 'MSN5e33d68b36284');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tspp`
--

CREATE TABLE IF NOT EXISTS `tspp` (
  `IdSpp` varchar(50) NOT NULL,
  `NoSpp` varchar(20) NOT NULL,
  `IdBarang` varchar(50) NOT NULL,
  `QtyPlan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tspp`
--

INSERT INTO `tspp` (`IdSpp`, `NoSpp`, `IdBarang`, `QtyPlan`) VALUES
('SPP5e380bf7bed75', 'AHM0215', 'BRG5e366c4c64f41', 23),
('SPP5e384d6fb72ce', 'AHM0216', 'BRG5e366f5fc0404', 43);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
  `IdUser` varchar(100) NOT NULL,
  `Nik` int(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` int(5) NOT NULL COMMENT '1:Admin 2:Handling 3:Supervisor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tusers`
--

INSERT INTO `tusers` (`IdUser`, `Nik`, `Nama`, `Gender`, `Username`, `Password`, `Level`) VALUES
('GSS5e3c5347cc9ae', 123451, 'supervisor1', 'L', 'supervisor', '21232f297a57a5a743894a0e4a801fc3', 3),
('GSS5e3d2c0682ae1', 123452, 'admin produksi', 'P', 'adminprod', '21232f297a57a5a743894a0e4a801fc3', 1),
('GSS5e3d2c1d21f73', 123453, 'operator handling', 'L', 'opthandling', '21232f297a57a5a743894a0e4a801fc3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
 ADD PRIMARY KEY (`IdBarang`);

--
-- Indexes for table `tbarcode`
--
ALTER TABLE `tbarcode`
 ADD PRIMARY KEY (`idbarcode`);

--
-- Indexes for table `tmesin`
--
ALTER TABLE `tmesin`
 ADD PRIMARY KEY (`IdMesin`);

--
-- Indexes for table `tspp`
--
ALTER TABLE `tspp`
 ADD PRIMARY KEY (`IdSpp`);

--
-- Indexes for table `tusers`
--
ALTER TABLE `tusers`
 ADD PRIMARY KEY (`IdUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
