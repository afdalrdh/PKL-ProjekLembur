-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2018 at 10:14 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_lembur`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata_karyawan`
--

CREATE TABLE `biodata_karyawan` (
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `inisial` varchar(20) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata_karyawan`
--

INSERT INTO `biodata_karyawan` (`nik`, `nama`, `divisi`, `lokasi`, `inisial`, `password`, `level`) VALUES
('1001', 'Afdal Ramdan Daman Huri', 'IT Application', 'Thamrin', 'AFD', '2bbfa55dc58149cbdc795d293e8a5f7a', 'user'),
('1002', 'Andrian Maulana Yusuf', 'IT Infra', 'Lintas', 'AMY', 'b5a5589d370ae4b742c859541c921c0a', 'user'),
('1003', 'Arip Pratama', 'IT Application', 'Lintas', 'ARP', '4bbd3774d13db2c36fba588bf4d3344c', 'user'),
('1004', 'Damanhuri', 'IT Application', 'Thamrin', 'DMH', '2e0aca891f2a8aedf265edf533a6d9a8', 'user'),
('1005', 'M Akmal Asykar', 'IT Application', 'Thamrin', 'MYQ', '4297f44b13955235245b2497399d7a93', 'user'),
('1006', 'Mahfiatun Hasanah', 'IT Infra', 'Cimahi', 'MHF', '4297f44b13955235245b2497399d7a93', 'user'),
('1007', 'Mitha Budianti', 'IT Application', 'Lintas', 'MBD', '4297f44b13955235245b2497399d7a93', 'admin'),
('1008', 'Raden Agus Setiawan', 'IT Infra', 'Thamrin', 'RAS', '4297f44b13955235245b2497399d7a93', 'admin'),
('1009', 'Ramdan', 'IT Application', 'Thamrin', 'RMD', '2e0aca891f2a8aedf265edf533a6d9a8', 'user'),
('1010', 'Si Kasep', 'IT Application', 'Thamrin', 'SKS', '2e0aca891f2a8aedf265edf533a6d9a8', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `datakaryawan`
--

CREATE TABLE `datakaryawan` (
  `id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `dari_jam` time NOT NULL,
  `sampai_jam` time NOT NULL,
  `agenda_lembur` text NOT NULL,
  `pemberi_tugas` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  `jam` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datakaryawan`
--

INSERT INTO `datakaryawan` (`id`, `nama`, `nik`, `divisi`, `lokasi`, `tgl`, `dari_jam`, `sampai_jam`, `agenda_lembur`, `pemberi_tugas`, `status`, `jam`, `date`) VALUES
(1, 'Afdal Ramdan Daman Huri', '1001', 'IT Application', 'Thamrin', '2018-12-31', '20:00:00', '23:00:00', 'Testing blablablabla', 'M Akmal Asykar', 7, '03:00:00', '2018-12-31'),
(2, 'Andrian Maulana Yusuf', '1002', 'IT Infra', 'Lintas', '2018-12-31', '21:30:00', '23:30:00', 'Cetak ulang pengajuan lembur', 'Mahfiatun Hasanah', 9, '02:00:00', '2018-12-31'),
(3, 'Andrian Maulana Yusuf', '1002', 'IT Infra', 'Lintas', '2018-12-31', '21:35:00', '23:35:00', 'Coba lagi', 'Mahfiatun Hasanah', 7, '02:00:00', '2018-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `awalp` datetime NOT NULL,
  `akhirp` datetime NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id`, `nama`, `ket`, `awalp`, `akhirp`, `status`) VALUES
(1, 'Afdal Ramdan Daman Huri', 'iyeay', '2018-12-31 03:30:41', '2018-12-31 03:30:52', 1),
(1, 'Afdal Ramdan Daman Huri', '11', '2018-12-31 03:30:52', '2018-12-31 03:31:12', 6),
(1, 'Afdal Ramdan Daman Huri', '22', '2018-12-31 03:31:12', '2018-12-31 09:31:29', 11),
(2, 'Andrian Maulana Yusuf', 'acc', '2018-12-31 03:32:59', '2018-12-31 03:35:34', 13),
(3, 'Andrian Maulana Yusuf', 'aa', '2018-12-31 03:35:59', '2018-12-31 03:36:07', 1),
(3, 'Andrian Maulana Yusuf', 'lanjut', '2018-12-31 03:36:07', '2018-12-31 03:36:33', 6),
(3, 'Andrian Maulana Yusuf', 'oke siap', '2018-12-31 03:36:33', '2018-12-31 09:37:12', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inbox`
--

INSERT INTO `tb_inbox` (`id`, `nama`, `waktu`, `status`) VALUES
(1, 'Afdal Ramdan Daman Huri', '2018-12-31 03:30:41', 1),
(2, 'Andrian Maulana Yusuf', '2018-12-31 03:32:59', 1),
(3, 'Andrian Maulana Yusuf', '2018-12-31 03:35:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_outbox`
--

CREATE TABLE `tb_outbox` (
  `id` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_outbox`
--

INSERT INTO `tb_outbox` (`id`, `nama`, `ket`, `waktu`, `status`) VALUES
(1, 'Afdal Ramdan Daman Huri', '22', '2018-12-31 09:31:29', 2),
(2, 'Andrian Maulana Yusuf', 'acc', '2018-12-31 03:35:34', 3),
(3, 'Andrian Maulana Yusuf', 'oke siap', '2018-12-31 09:37:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_uang`
--

CREATE TABLE `tb_uang` (
  `inisial` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `Divisi` varchar(50) NOT NULL,
  `Lokasi` varchar(50) NOT NULL,
  `jam` int(255) NOT NULL,
  `uang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uang`
--

INSERT INTO `tb_uang` (`inisial`, `nama`, `nik`, `Divisi`, `Lokasi`, `jam`, `uang`) VALUES
('AFD', 'Afdal Ramdan Daman Huri', '1001', 'IT Application', 'Thamrin', 3, 0),
('AMY', 'Andrian Maulana Yusuf', '1002', 'IT Infra', 'Lintas', 2, 0),
('ARP', 'Arip Pratama', '1003', 'IT Application', 'Lintas', 0, 0),
('DMH', 'Damanhuri', '1004', 'IT Application', 'Thamrin', 0, 0),
('MYQ', 'M Akmal Asykar', '1005', 'IT Application', 'Thamrin', 0, 0),
('MHF', 'Mahfiatun Hasanah', '1006', 'IT Infra', 'Cimahi', 0, 0),
('RMD', 'Ramdan', '1009', 'IT Application', 'Thamrin', 0, 0),
('SKS', 'Si Kasep', '1010', 'IT Application', 'Thamrin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_uang_date`
--

CREATE TABLE `tb_uang_date` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `jam` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uang_date`
--

INSERT INTO `tb_uang_date` (`id`, `nama`, `divisi`, `jam`, `date`) VALUES
(1, 'Afdal Ramdan Daman Huri', 'IT Application', 3, '2018-12-31'),
(3, 'Andrian Maulana Yusuf', 'IT Infra', 2, '2018-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata_karyawan`
--
ALTER TABLE `biodata_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `datakaryawan`
--
ALTER TABLE `datakaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_outbox`
--
ALTER TABLE `tb_outbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_uang`
--
ALTER TABLE `tb_uang`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_uang_date`
--
ALTER TABLE `tb_uang_date`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datakaryawan`
--
ALTER TABLE `datakaryawan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
