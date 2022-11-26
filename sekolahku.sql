-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2022 pada 14.19
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `npsn` varchar(8) NOT NULL,
  `status` enum('Negeri','Swasta') NOT NULL,
  `bentuk_pendidikan` enum('TK','SD','SMP','SMA','SMK') NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `sk_pendirian` varchar(20) NOT NULL,
  `tgl_pendirian` date NOT NULL,
  `sk_izin_operasional` varchar(20) NOT NULL,
  `tgl_izin_operasional` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten_kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_sekolah`
--

INSERT INTO `data_sekolah` (`npsn`, `status`, `bentuk_pendidikan`, `nama_sekolah`, `sk_pendirian`, `tgl_pendirian`, `sk_izin_operasional`, `tgl_izin_operasional`, `alamat`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `kode_pos`) VALUES
('20271222', '', '', 'SDN Cikatomas', '421.5/Disdik/2011', '2022-11-18', '421.5/Disdik/2011', '2022-11-01', 'Cikatomas pakemitan', '004', '002', 'Pakemitan', 'Pakemitan', 'Cikatomas', 'Tasikmalaya', 'Jawa Barat', '46193'),
('20271311', 'Negeri', 'TK', 'SMK Jati', '03/disdik/2010', '2022-11-29', '03/disdik/2010', '2022-11-24', 'Cikatomas', '01', '02', 'Pakemitan', 'Cilumba', 'Cikatomas', 'Kab. Tasikmalaya', 'Jabar', '46193');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_sekolah`
--
ALTER TABLE `data_sekolah`
  ADD PRIMARY KEY (`npsn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
