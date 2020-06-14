-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2020 pada 13.56
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengantar_desa_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_warga`
--

CREATE TABLE `data_warga` (
  `id_data_warga` int(11) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_warga`
--

INSERT INTO `data_warga` (`id_data_warga`, `no_kk`, `no_ktp`, `nama_lengkap`, `jk`, `tempat`, `tanggal_lahir`, `agama`, `pekerjaan`, `alamat`) VALUES
(1, '33322667775334677', '3328112901960005', 'asep', 'L', 'bndung', '2020-06-10', 'Islam', 'HRD', 'kepo'),
(3, '33322667775334677', '231312313123', 'kroco', 'L', 'C', '2020-06-01', 'Hindu', 'Tani', 'asdhddfewfds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `password`, `jabatan`) VALUES
(1, 'RT04', '$2y$10$bbFD.fzrCOS1Q0W73nqtm.eJmJaSZhvPyWoCLclFxvQx4cCOEwdny', 'RT'),
(2, 'RW05', '$2y$10$bbFD.fzrCOS1Q0W73nqtm.eJmJaSZhvPyWoCLclFxvQx4cCOEwdny', 'RW'),
(4, 'RW0456', '$2y$10$sArE/NEAprp9uAz0LpSi0O9osnLeZbEkRDLmQdcJowFnPj5mnAGkG', 'RW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pengantar`
--

CREATE TABLE `surat_pengantar` (
  `id_surat_pengantar` int(11) NOT NULL,
  `id_data_warga` int(11) NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal_buat` date NOT NULL,
  `no_surat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_pengantar`
--

INSERT INTO `surat_pengantar` (`id_surat_pengantar`, `id_data_warga`, `keperluan`, `tanggal_buat`, `no_surat`) VALUES
(1, 3, 'melamar kerja', '2020-06-01', '1'),
(2, 1, 'melamar pekerjaan', '2020-06-01', '2'),
(3, 3, 'melamar kerja', '2020-06-13', '3'),
(4, 1, 'melamar', '2020-06-14', '4');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_warga`
--
ALTER TABLE `data_warga`
  ADD PRIMARY KEY (`id_data_warga`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD PRIMARY KEY (`id_surat_pengantar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_warga`
--
ALTER TABLE `data_warga`
  MODIFY `id_data_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  MODIFY `id_surat_pengantar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
