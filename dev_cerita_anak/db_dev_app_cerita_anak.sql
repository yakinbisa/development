-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2016 at 10:08 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dev_app_cerita_anak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `idAnggota` smallint(3) NOT NULL,
  `Nama` char(100) NOT NULL,
  `JenisKelamin` enum('L','P') NOT NULL,
  `Asal` char(50) NOT NULL,
  `Usia` tinyint(2) NOT NULL,
  `idKelas` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`idAnggota`, `Nama`, `JenisKelamin`, `Asal`, `Usia`, `idKelas`) VALUES
(1, 'Abdi', 'L', 'Kediri', 13, 1),
(2, 'Budi', 'L', 'Jakarta', 13, 1),
(3, 'Cindy', 'P', 'Jakarta', 13, 2),
(4, 'Devi', 'P', 'Surabaya', 13, 2),
(5, 'Elia', 'P', 'Yogyakarta', 13, 1),
(6, 'Fulan', 'P', 'Batam', 13, 2),
(7, 'Gladys Gludus', 'P', 'Kediri', 13, 3),
(8, 'Hary', 'L', 'Surabaya', 13, 3),
(9, 'Indah', 'P', 'Surabaya', 13, 2),
(10, 'Jefry', 'L', 'Bekasi', 13, 1),
(11, 'Kiwil', 'L', 'Pati', 13, 2),
(12, 'Lily', 'P', 'Lampung', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `idKelas` tinyint(2) NOT NULL,
  `Level` tinyint(1) NOT NULL,
  `Kelas` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`idKelas`, `Level`, `Kelas`) VALUES
(1, 1, 'Beginner'),
(2, 2, 'Intermediate'),
(3, 3, 'Advanced');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` smallint(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `idAnggota` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`idUser`, `Username`, `Password`, `idAnggota`) VALUES
(1, 'abdi', 'abdi', 1),
(2, 'gladys', 'gladys', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`idAnggota`),
  ADD KEY `fk_anggota_idkelas` (`idKelas`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`idKelas`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fk_users_idAnggota` (`idAnggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `idAnggota` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `idKelas` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `fk_anggota_idkelas` FOREIGN KEY (`idKelas`) REFERENCES `tb_kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `fk_users_idAnggota` FOREIGN KEY (`idAnggota`) REFERENCES `tb_anggota` (`idAnggota`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
