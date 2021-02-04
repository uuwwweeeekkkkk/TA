-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 05:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` char(15) NOT NULL,
  `nm_dokumen` varchar(100) NOT NULL,
  `kd_folder` char(10) NOT NULL,
  `diupload_oleh` int(11) DEFAULT NULL,
  `waktu_diupload` datetime DEFAULT NULL,
  `dirubah_oleh` int(11) DEFAULT NULL,
  `waktu_dirubah` datetime DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `nm_dokumen`, `kd_folder`, `diupload_oleh`, `waktu_diupload`, `dirubah_oleh`, `waktu_dirubah`, `file`) VALUES
('DOC001', 'Pengenalan php', 'GNA003', 1, '2020-12-24 13:44:32', 1, '2020-12-24 13:44:32', 'PERTEMUAN 1 - PENGENALAN PHP.pdf'),
('DOC002', 'Materi tambahan', 'GNA003', 1, '2020-12-24 13:44:49', 1, '2020-12-24 13:44:49', 'PERTEMUAN 1B - MATERI TAMBAHAN.pdf'),
('DOC003', 'TA 2', 'GNA002', 1, '2020-12-24 13:45:20', 1, '2020-12-24 13:45:20', 'TUGAS PERTEMUAN 2.pdf'),
('DOC004', 'Dokumen elemen dasar', 'RDN002', 1, '2020-12-24 13:45:39', 1, '2020-12-24 13:45:39', 'PERTEMUAN 2 - ELEMEN ELEMEN DASAR PHP.pdf'),
('DOC005', '2B', 'RDN002', 1, '2020-12-24 13:45:46', 1, '2020-12-24 13:45:46', 'pertemuan 2B - MATERI TAMBAHAN.pdf'),
('DOC006', 'Dokumen lat 10', 'KJ002', 1, '2020-12-24 13:46:22', 1, '2020-12-24 13:46:22', 'Latihan_pert10.docx'),
('DOC007', 'Dok DB', 'KJ003', 1, '2020-12-24 13:46:55', 1, '2020-12-24 13:46:55', 'PERTEMUAN 10 - DATABASE.pdf'),
('DOC008', 'Tugas 10', 'KJ003', 1, '2020-12-24 13:47:04', 1, '2020-12-24 13:47:04', 'TUGAS PERT-10.pdf'),
('DOC009', 'ERD', 'MA002', 1, '2020-12-24 13:47:23', 2, '2020-12-26 10:53:58', 'erd.png'),
('DOC010', 'bagan', 'MA002', 1, '2020-12-24 13:47:37', 1, '2020-12-24 13:47:37', 'erd_1.png'),
('DOC011', 'elemen', 'RDN007', 1, '2020-12-24 13:48:01', 1, '2020-12-24 13:48:01', 'PERTEMUAN 2 - ELEMEN ELEMEN DASAR PHP.pdf'),
('DOC012', 'elemen 2B', 'RDN007', 1, '2020-12-24 13:48:09', 1, '2020-12-24 13:48:09', 'pertemuan 2B - MATERI TAMBAHAN.pdf'),
('DOC013', 'Testing', 'MA006', 2, '2020-12-26 11:18:33', 2, '2020-12-26 11:18:33', 'Bully 07_11_2020 21_30_14.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','User') NOT NULL,
  `user_aktif` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `nama`, `username`, `password`, `level`, `user_aktif`) VALUES
(1, 'Ahmad Juantoro', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', b'1'),
(2, 'Riza Pranata', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', b'1'),
(3, 'Bu Sri', 'test', '098f6bcd4621d373cade4e832627b4f6', 'Admin', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `ms_folder`
--

CREATE TABLE `ms_folder` (
  `id_folder` char(10) NOT NULL,
  `folder` char(30) NOT NULL,
  `sub_folder` char(30) NOT NULL,
  `sub_subfolder` char(30) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `sub_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_folder`
--

INSERT INTO `ms_folder` (`id_folder`, `folder`, `sub_folder`, `sub_subfolder`, `menu`, `sub_menu`) VALUES
('GNA001', 'GNA', '', '', 'Gas Nuri Arizona', ''),
('GNA002', 'GNA', 'GNA_MSTCBL', '', 'Gas Nuri Arizona', 'Master Cable'),
('GNA003', 'GNA', 'GNA_CRTFCT', '', 'Gas Nuri Arizona', 'Certificate'),
('GNA004', 'GNA', 'GNA_VTTNG', '', 'Gas Nuri Arizona', 'Vetting'),
('GNA005', 'GNA', 'GNA_DCKNG', '', 'Gas Nuri Arizona', 'Docking'),
('GNA006', 'GNA', 'GNA_INVNTR', '', 'Gas Nuri Arizona', 'Inventory'),
('GNA007', 'GNA', 'GNA_FOANLS', '', 'Gas Nuri Arizona', 'FO Analysis'),
('GNA008', 'GNA', 'GNA_LOANLS', '', 'Gas Nuri Arizona', 'LO Analysis'),
('KJ001', 'ENC_KJ', '', '', 'ENC Kalijapat', ''),
('KJ002', 'ENC_KJ', 'KJ_AGNC', '', 'ENC Kalijapat', 'Agency'),
('KJ003', 'ENC_KJ', 'KJ_VSSL', '', 'ENC Kalijapat', 'Vessel'),
('KJ004', 'ENC_KJ', 'KJ_CRWRTT', '', 'ENC Kalijapat', 'Crew Rotation'),
('KJ005', 'ENC_KJ', 'KJ_CBLVYG', '', 'ENC Kalijapat', 'Cable Voyage'),
('KJ006', 'ENC_KJ', 'KJ_STTTR', '', 'ENC Kalijapat', 'Statutory'),
('MA001', 'MA', '', '', 'Mitra Anugerah', ''),
('MA002', 'MA', 'MA_EQPMNT', '', 'Mitra Anugerah', 'Equipment'),
('MA003', 'MA', 'MA_TMSHT', '', 'Mitra Anugerah', 'Timesheet'),
('MA004', 'MA', 'MA_MRN', '', 'Mitra Anugerah', 'Marine'),
('MA005', 'MA', 'MA_MTRX', '', 'Mitra Anugerah', 'Matrix'),
('MA006', 'MA', 'MA_ASSRN', '', 'Mitra Anugerah', 'Assurance'),
('RDN001', 'ENC_RDN', '', '', 'ENC Rhayden', ''),
('RDN002', 'ENC_RDN', 'RDN_SHPP', '', 'ENC Rhayden', 'Shipping'),
('RDN003', 'ENC_RDN', 'RDN_INVNTR', '', 'ENC Rhayden', 'Inventory'),
('RDN004', 'ENC_RDN', 'RDN_DCKNG', '', 'ENC Rhayden', 'Docking'),
('RDN005', 'ENC_RDN', 'RDN_REPORT', '', 'ENC Rhayden', 'Report'),
('RDN006', 'ENC_RDN', 'RDN_INVC', '', 'ENC Rhayden', 'Invoice'),
('RDN007', 'ENC_RDN', 'RDN_FLCNTRL', '', 'ENC Rhayden', 'Fuel Control');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ms_folder`
--
ALTER TABLE `ms_folder`
  ADD PRIMARY KEY (`id_folder`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
