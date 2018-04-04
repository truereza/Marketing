-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 Apr 2018 pada 11.39
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_lantai`
--

CREATE TABLE `detail_lantai` (
  `kd_lantai` int(2) NOT NULL,
  `lantai` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_lantai`
--

INSERT INTO `detail_lantai` (`kd_lantai`, `lantai`, `status`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_kamar`
--

CREATE TABLE `head_kamar` (
  `kd_kamar` int(5) NOT NULL,
  `kamar` varchar(10) NOT NULL,
  `kd_lantai` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1',
  `no_pesan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `head_kamar`
--

INSERT INTO `head_kamar` (`kd_kamar`, `kamar`, `kd_lantai`, `status`, `no_pesan`) VALUES
(11, 'K101', 1, 1, 51),
(12, 'K102', 1, 1, 0),
(13, 'K103', 1, 1, 52),
(14, 'K104', 1, 1, 0),
(15, 'K105', 1, 1, 0),
(21, 'K201', 2, 1, 0),
(22, 'K202', 2, 1, 54),
(23, 'K203', 2, 1, 55),
(24, 'K204', 2, 1, 53),
(25, 'K205', 2, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pesan` int(5) NOT NULL,
  `kamar` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pesan`, `kamar`, `nama`, `no_id`) VALUES
(51, 'K101', 'A', 1),
(52, 'K103', 'B', 2),
(53, 'K204', 'AWAW', 1111),
(54, 'K202', 'rere', 2323),
(55, 'K203', 'Juju', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(3, 'Tutut', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'uwa', 'mrkt', 'c1c16452b04650ea34d1463da2739f3b', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_lantai`
--
ALTER TABLE `detail_lantai`
  ADD PRIMARY KEY (`kd_lantai`);

--
-- Indexes for table `head_kamar`
--
ALTER TABLE `head_kamar`
  ADD PRIMARY KEY (`kd_kamar`),
  ADD KEY `kd_lantai` (`kd_lantai`),
  ADD KEY `no_pesan` (`no_pesan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pesan`),
  ADD KEY `no_id` (`no_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `no_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `head_kamar`
--
ALTER TABLE `head_kamar`
  ADD CONSTRAINT `head_kamar_ibfk_1` FOREIGN KEY (`kd_lantai`) REFERENCES `detail_lantai` (`kd_lantai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
