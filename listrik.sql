-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 03:27 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hitungsub` (IN `IDPenggunaan` INT(12), IN `IDPelanggan` VARCHAR(6), IN `Bulan` VARCHAR(12), IN `Tahun` YEAR(4), IN `Meterawal` INT(12), IN `Meterakhir` INT(12), IN `sub_total` INT(55))  NO SQL
BEGIN
INSERT INTO `penggunaan`( `IDPenggunaan` , `IDPelanggan`, `Tahun`, `Bulan`, `Meterawal`, `Meterakhir`)   VALUES ( IDPenggunaan , IDPelanggan, Tahun, Bulan, Meterawal, Meterakhir);
INSERT INTO tagihan (IDPenggunaan,IDPelanggan,Bulan,Tahun,Jumlahmeter,sub_total,STATUS)
VALUES
(IDPenggunaan,IDPelanggan,Bulan,Tahun,(Meterakhir-Meterawal),(Meterakhir-Meterawal)*sub_total,'Belum Lunas');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IDPelanggan` varchar(6) NOT NULL,
  `NoMeter` int(6) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `KodeTarif` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IDPelanggan`, `NoMeter`, `Nama`, `Alamat`, `KodeTarif`) VALUES
('BPN001', 879551, 'JAMALUDIN KAMALUDIN', 'KILO 11', 'L2'),
('BPN002', 879324, 'Jakwan Marinto', 'KILO 4', 'L3'),
('BPN003', 567123, 'JUMINAH', 'KILO 2', 'L2'),
('BPN004', 543980, 'GUNTRO KALMINO', 'KILO 12', 'L1'),
('BPN005', 980788, 'AHMAD SUBAGUSi', 'KILO 13', 'L1');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `IDBayar` int(3) NOT NULL,
  `IDTagihan` int(12) NOT NULL,
  `Tanggal` date NOT NULL,
  `Bulanbayar` varchar(12) NOT NULL,
  `Biayaadmin` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`IDBayar`, `IDTagihan`, `Tanggal`, `Bulanbayar`, `Biayaadmin`) VALUES
(212, 34, '2020-12-11', 'Desember', 2500),
(213, 37, '2020-12-18', 'Januari', 2000),
(434, 36, '2020-12-12', 'Januari', 2333),
(215, 35, '2020-12-11', 'Februari', 2333),
(2127, 38, '2020-12-12', 'April', 3000),
(216, 39, '2020-12-12', 'Desember', 5000);

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `bayar_lunas` BEFORE INSERT ON `pembayaran` FOR EACH ROW BEGIN
UPDATE tagihan SET tagihan.Status="Sudah Lunas" WHERE tagihan.IDTagihan=NEW.IDTagihan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `IDPenggunaan` int(12) NOT NULL,
  `IDPelanggan` varchar(6) NOT NULL,
  `Bulan` varchar(12) NOT NULL,
  `Tahun` year(4) NOT NULL,
  `Meterawal` int(12) NOT NULL,
  `Meterakhir` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`IDPenggunaan`, `IDPelanggan`, `Bulan`, `Tahun`, `Meterawal`, `Meterakhir`) VALUES
(218, 'BPN001', 'Januari', 2020, 10, 40),
(1212, 'BPN001', 'Januari', 2021, 233, 444),
(2122, 'BPN001', 'Februari', 2021, 5454, 5555),
(2123, 'BPN002', 'Januari', 2021, 876, 1098),
(2124, 'BPN005', 'Januari', 2021, 786, 980),
(2126, 'BPN001', 'April', 2021, 43, 46),
(2127, 'BPN003', 'November', 2020, 580, 620);

--
-- Triggers `penggunaan`
--
DELIMITER $$
CREATE TRIGGER `edit_tagihan` AFTER UPDATE ON `penggunaan` FOR EACH ROW BEGIN
DELETE FROM tagihan WHERE tagihan.IDPenggunaan=OLD.IDPenggunaan;

INSERT INTO tagihan (IDPenggunaan,IDPelanggan,Bulan,Tahun,Jumlahmeter,STATUS)
VALUES
(NEW.IDPenggunaan,NEW.IDPelanggan,NEW.Bulan,NEW.Tahun,(NEW.Meterakhir-NEW.Meterawal),'Belum Lunas');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_tagihan` BEFORE DELETE ON `penggunaan` FOR EACH ROW BEGIN
DELETE FROM tagihan WHERE tagihan.IDPenggunaan = OLD.IDPenggunaan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `IDTagihan` int(12) NOT NULL,
  `IDPenggunaan` int(12) NOT NULL,
  `IDPelanggan` varchar(6) NOT NULL,
  `Bulan` varchar(12) NOT NULL,
  `Tahun` year(4) NOT NULL,
  `Jumlahmeter` int(12) NOT NULL,
  `sub_total` int(55) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`IDTagihan`, `IDPenggunaan`, `IDPelanggan`, `Bulan`, `Tahun`, `Jumlahmeter`, `sub_total`, `Status`) VALUES
(34, 1212, 'BPN001', 'Januari', 2021, 211, 42200000, 'Sudah Lunas'),
(35, 2122, 'BPN001', 'Februari', 2021, 101, 20200000, 'Sudah Lunas'),
(36, 2123, 'BPN002', 'Januari', 2021, 222, 44400000, 'Sudah Lunas'),
(37, 2124, 'BPN005', 'Januari', 2021, 194, 2328000, 'Sudah Lunas'),
(38, 2126, 'BPN001', 'April', 2021, 3, 36000, 'Sudah Lunas'),
(39, 2127, 'BPN003', 'November', 2020, 40, 480000, 'Sudah Lunas'),
(41, 218, 'BPN001', 'Januari', 2020, 30, 0, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `KodeTarif` varchar(2) NOT NULL,
  `Daya` int(12) NOT NULL,
  `Tarifperkwh` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`KodeTarif`, `Daya`, `Tarifperkwh`) VALUES
('L1', 900, 20000),
('L2', 1200, 12000),
('L3', 2200, 200000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_bayar`
-- (See below for the actual view)
--
CREATE TABLE `total_bayar` (
`IDBayar` int(3)
,`IDTagihan` int(12)
,`Tanggal` date
,`Bulanbayar` varchar(12)
,`Biayaadmin` int(12)
,`sub_total` int(55)
,`TOTAL` bigint(56)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDAkun` int(12) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDAkun`, `nama`, `username`, `password`, `level`) VALUES
(23, 'AHMAD AMILUDDIN', 'admin', 'adm', 'Administrator'),
(24, 'Cantika Segiri', 'loket1', '123', 'Loket'),
(25, 'Fanta Sprite', 'loket2', 'lkt', 'Loket');

-- --------------------------------------------------------

--
-- Structure for view `total_bayar`
--
DROP TABLE IF EXISTS `total_bayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_bayar`  AS  select `pembayaran`.`IDBayar` AS `IDBayar`,`pembayaran`.`IDTagihan` AS `IDTagihan`,`pembayaran`.`Tanggal` AS `Tanggal`,`pembayaran`.`Bulanbayar` AS `Bulanbayar`,`pembayaran`.`Biayaadmin` AS `Biayaadmin`,`tagihan`.`sub_total` AS `sub_total`,(`tagihan`.`sub_total` + `pembayaran`.`Biayaadmin`) AS `TOTAL` from (`pembayaran` join `tagihan`) where (`tagihan`.`IDTagihan` = `pembayaran`.`IDTagihan`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IDPelanggan`),
  ADD KEY `KodeTarif` (`KodeTarif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD KEY `IDTagihan` (`IDTagihan`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`IDPenggunaan`),
  ADD KEY `IDPelanggan` (`IDPelanggan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`IDTagihan`),
  ADD KEY `IDPelanggan` (`IDPelanggan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`KodeTarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDAkun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `IDPenggunaan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2128;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `IDTagihan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`KodeTarif`) REFERENCES `tarif` (`KodeTarif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`IDTagihan`) REFERENCES `tagihan` (`IDTagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`IDPelanggan`) REFERENCES `pelanggan` (`IDPelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
