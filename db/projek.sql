-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2018 at 02:36 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `NamaDokumen` varchar(100) NOT NULL,
  `IdJenisDokumen` int(10) NOT NULL,
  `Path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumenpegawai`
--

CREATE TABLE IF NOT EXISTS `dokumenpegawai` (
  `IdDokumenPegawai` varchar(100) NOT NULL,
  `NIP` int(20) NOT NULL,
  `NamaDokumen` varchar(100) NOT NULL,
  `IdJenisDokumen` int(10) NOT NULL,
  `Path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `dokumenpegawai`
--
DELIMITER //
CREATE TRIGGER `Ketika Insert DokPegawai` AFTER INSERT ON `dokumenpegawai`
 FOR EACH ROW INSERT INTO Dokumen SET NamaDokumen = NEW.NamaDokumen, IdJenisDokumen = NEW.IdJenisDokumen,Path = NEW.Path
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenisdokumen`
--

CREATE TABLE IF NOT EXISTS `jenisdokumen` (
`IdJenisDokumen` int(10) NOT NULL,
  `JenisDokumen` varchar(20) NOT NULL,
  `Keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisdokumen`
--

INSERT INTO `jenisdokumen` (`IdJenisDokumen`, `JenisDokumen`, `Keterangan`) VALUES
(4, 'Surat Berubah', 'Jeooasodasd\r\nasdasd'),
(5, 'Surat Penyerahan Hak', 'asdasdasd'),
(6, 'Surat Tanah', 'adsasdasdasd'),
(7, 'Surat Utang', 'adsad');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `NIP` int(20) NOT NULL,
  `GelarDepan` varchar(10) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `GelarBelakang` varchar(10) NOT NULL,
  `HP` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `KodeRole` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `GelarDepan`, `Nama`, `GelarBelakang`, `HP`, `Username`, `Password`, `Email`, `KodeRole`) VALUES
(1, 'Ir', 'Imam Suro Beno', 'S.Kom', '0821390012', 'admin', 'admin', 'imamsuro@gmail.com', 'Admin'),
(3000, 'Ir', 'Soekarno', 'S.Kam', '10830123', 'entri', 'entri', 'entri@gmail.com', 'Entri'),
(4000, 'Ir', 'Bambang S', 'S.Jam', '123123123', 'user', 'userr', 'user@gmail.com', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `KodeRole` varchar(10) NOT NULL,
  `NamaRole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`KodeRole`, `NamaRole`) VALUES
('Admin', 'Administrator'),
('Entri', 'Pegawai Entri'),
('User', 'User Biasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
 ADD PRIMARY KEY (`NamaDokumen`), ADD KEY `Path` (`Path`), ADD KEY `JenisDokumen` (`IdJenisDokumen`), ADD KEY `IdJenisDokumen` (`IdJenisDokumen`);

--
-- Indexes for table `dokumenpegawai`
--
ALTER TABLE `dokumenpegawai`
 ADD PRIMARY KEY (`IdDokumenPegawai`), ADD KEY `JenisDokumen` (`IdJenisDokumen`), ADD KEY `JenisDokumen_2` (`IdJenisDokumen`), ADD KEY `IdJenisDokumen` (`IdJenisDokumen`);

--
-- Indexes for table `jenisdokumen`
--
ALTER TABLE `jenisdokumen`
 ADD PRIMARY KEY (`IdJenisDokumen`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`KodeRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenisdokumen`
--
ALTER TABLE `jenisdokumen`
MODIFY `IdJenisDokumen` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
