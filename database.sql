-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 04, 2018 at 05:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bowo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `agama`) VALUES
(1, 'renald', 'Renald Robert Arguh', 'Belanda 113', '2018-08-06', 'Perempuan', 'Jln Kemayoran', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `id_document` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kk` varchar(200) NOT NULL,
  `ijazah` varchar(200) NOT NULL,
  `akte` varchar(200) NOT NULL,
  `skhun` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending, 1=verifikasi, 2=reject'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`id_document`, `nisn`, `username`, `kk`, `ijazah`, `akte`, `skhun`, `status`) VALUES
(2, '14532684211', 'safri', '722d5637388bf09174226751be93279f.jpg', 'df2fa6df59609d1c2dc54c31e94ce78c.jpg', 'f424cf72739bf728d0d16ee6064aa82b.jpg', '1c4053c9d956d423641e9ca483626c71.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nisn` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `tempat_lahir` varchar(70) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nisn`, `username`, `nama`, `asal_sekolah`, `email`, `jurusan`, `no_telepon`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
('1123234232', 'dayat113', 'Hidayat Nurwahid', 'SMPN113', 'dayat@gmail.com', 'IPA', '021-32423', 'Jakarta', '2018-08-01', 'Jln Kampung Banda'),
('1223424', 'adibah', 'Adibah Choerun Nisa', 'SMPN 113', 'adibah@gmail.com', 'IPS', '021-3242342', 'Jakarta', '2018-09-09', 'Jln bandan'),
('12344243', 'agis', 'Agis Choerun Nisa', 'SMPN 113', 'agis@gmail.com', 'IPS', '021-32423423', 'Pandeglang', '2018-09-09', 'Jln Bandan'),
('12442', 'test', 'testing', 'SMPN 113', 'testing@gmail.com', 'IPA', '021-324242', 'Pandeglang', '2019-09-09', 'Jl Bandan'),
('145326842', 'reno', 'Reno Agus Setiadi', 'SMPN 113 Jakarta Utara', 'hc.safri@gmail.com', 'IPA', '0897-9876-5334', 'Jakarta', '2002-08-07', 'Jln Bandengan'),
('14532684211', 'safri', 'Safri Samsudin', 'SMPN113', 'safrisyamsudin123@gmail.com', 'IPA', '085811460453', 'Jakarta Utara d', '2018-08-06', 'Jln Kampung Muka Blok C no.13 RT004/RW009 Kec.Pademangan Kel.Ancol aasdas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `id_ujian` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `file_ujian` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending, 1=lolos, 2=tidak lolos'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`id_ujian`, `nisn`, `username`, `file_ujian`, `status`) VALUES
(2, '14532684211', 'safri', '650cef1a594de573d80f31f174cdd8a9.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=admin, 2=siswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `status`) VALUES
('adibah', '123', 2),
('agis', '123', 2),
('dayat113', '113', 2),
('renald', '12345', 1),
('reno', '123', 2),
('safri', '123', 2),
('test', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`id_document`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
