-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2019 at 02:37 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `give`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(10) DEFAULT NULL,
  `nama_paket` varchar(10) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
('11', 'paket 1', 200000),
('12', 'paket 2', 100000),
('13', 'paket 3', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `tempat_lahir` char(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` char(10) NOT NULL,
  `status` char(10) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` blob,
  `tgl_gabung` date NOT NULL,
  `masa_kerja` varchar(15) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `tunjangan` varchar(10) NOT NULL,
  `status_kerja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `gol_darah`, `agama`, `status`, `no_tlp`, `email`, `alamat`, `foto`, `tgl_gabung`, `masa_kerja`, `jabatan`, `tunjangan`, `status_kerja`) VALUES
('123', 'Sutisna', 'L', 'Cianjur', '2019-01-01', 'B', 'Islam', 'Jomblo', '08977654332', 'sutisna@gmail.com', 'Cianjur', NULL, '2019-01-31', '5', 'direktur', '500000', 9000),
('124', 'entis', 'L', 'Cipanas', '2019-01-01', 'B', 'Islam', 'Menikah', '098979798787', 'enst@gmail.com', 'cipanas', NULL, '2019-01-17', '4', 'bendahara', '400000', 80099);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_event`
--

CREATE TABLE `pembayaran_event` (
  `id_pembayaran` varchar(15) NOT NULL,
  `pendaftaran` varchar(10) NOT NULL,
  `total_bayar` double NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_event`
--

INSERT INTO `pembayaran_event` (`id_pembayaran`, `pendaftaran`, `total_bayar`, `tanggal_pembayaran`, `status`) VALUES
('BY001', 'REGIS001', 5200000, '2019-01-17', 'Lunas'),
('BY002', 'REGIS002', 6600000, '2019-01-17', 'Lunas'),
('BY003', 'REGIS003', 10900000, '2019-01-17', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `Id_Pendaftaran` varchar(10) NOT NULL,
  `No_KTP` varchar(20) NOT NULL,
  `Nama_Pelanggan` varchar(50) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `No_HP` varchar(13) NOT NULL,
  `Tgl_Pendaftaran` date NOT NULL,
  `Tgl_Booking` date NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Paket` varchar(10) NOT NULL,
  `Tempat` varchar(10) NOT NULL,
  `Pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`Id_Pendaftaran`, `No_KTP`, `Nama_Pelanggan`, `Alamat`, `No_HP`, `Tgl_Pendaftaran`, `Tgl_Booking`, `Status`, `Paket`, `Tempat`, `Pegawai`) VALUES
('REGIS001', '123456789', 'Ujang', 'Cipanas', '08998765678', '2019-01-01', '2019-01-08', 'Terlaksana', '13', 'T017', '124'),
('REGIS002', '0987654321', 'Asep', 'Cianjur', '098909899890', '2019-01-04', '2019-01-15', 'Terlaksana', '13', 'T018', '124'),
('REGIS003', '897329873402', 'Ridwan', 'Pacet', '9089898900', '2019-01-17', '2019-01-31', 'Belum terlaksana', '12', 'T017', '124');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `Id_Tempat` varchar(10) NOT NULL,
  `Nama_Tempat` varchar(30) NOT NULL,
  `Jenis_Tempat` varchar(15) NOT NULL,
  `Ukuran_Tempat` varchar(15) NOT NULL,
  `Harga_Tempat` int(10) NOT NULL,
  `Kapasitas_Tempat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`Id_Tempat`, `Nama_Tempat`, `Jenis_Tempat`, `Ukuran_Tempat`, `Harga_Tempat`, `Kapasitas_Tempat`) VALUES
('T016', 'Ruby', 'indoor', '8000m2', 10800000, '900 orang'),
('T017', 'Emerald', 'outdoor', '3500m2', 5000000, '150 orang'),
('T018', 'Bixbite', 'indoor', '5000 m2', 6500000, '300 orang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('001', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2'),
('002', 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', '1'),
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pembayaran_event`
--
ALTER TABLE `pembayaran_event`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`Id_Pendaftaran`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`Id_Tempat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
