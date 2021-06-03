-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2021 pada 05.40
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esemka-his`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'esemka-his', '2deb2be2578d34c02511eeb568da1bb2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` text NOT NULL,
  `nama_poli` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `nama_poli`) VALUES
(1, 'Dr. Bambang Sulaksono', 'Poli Gigi'),
(2, 'Dr. Bambang Isni', 'Poli Mata'),
(3, 'Dr. Indro K', 'Poli THT\r\n'),
(6, 'Dr. Indra', 'Poli Mata'),
(9, 'Dr. Isna', 'Poli THT'),
(10, 'Dr. Indro', 'Poli Mata'),
(20, 'Dr. Kana', 'Poli Kecantikan'),
(22, 'Dr.Mera', 'Poli Hidung'),
(23, 'Dr. Indrap', 'Poli Matap'),
(29, 'Dr. kai', 'Poli Hati'),
(33, 'dr.Irwan', 'Poli Mata'),
(34, 'Dr. Indah', 'Poli Gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama_dokter` text NOT NULL,
  `nama_poli` text NOT NULL,
  `nama_pasien` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `tgl_daftar`, `nama_dokter`, `nama_poli`, `nama_pasien`, `tgl_lahir`, `jk`, `alamat`, `no_hp`, `status`) VALUES
(1, '2021-03-30', 'Dr. Indra', 'Poli Mata', 'Indah ', '2018-12-05', 'Laki-laki', 'Surabaya', '092872635', 'Daftar'),
(5, '2021-02-10', 'Dr. INdro', 'Poli Gigi', 'wdsa', '2006-06-14', 'Laki-laki', 'eww', 'wwr', 'Daftar'),
(6, '2021-04-07', 'Dr. Indra', 'Poli Mata', 'Indah ', '1998-06-09', 'Laki-laki', 'anu', 'kjhs', 'Pulang'),
(8, '2021-04-08', 'Dr. INdro', 'Poli Mata', 'Ano', '2008-12-29', 'Laki-laki', 'zzz', 'sasas', 'Daftar'),
(10, '2021-04-13', 'Dr. Indra', 'Poli Mata', 'Andri', '2004-12-28', 'Laki-laki', 'adqwsdas', '972138', 'Daftar'),
(12, '2021-04-27', 'Dr. Bambang ', 'Poli Mata', 'ayak', '2005-02-02', 'Laki-laki', 'jati tempel', '823y12y3178', 'Daftar'),
(13, '2021-05-24', 'Dr. Bambang ', 'Poli Mata', 'Andri', '2021-05-24', 'Laki-laki', 'adqwsdas', '972138', 'Daftar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `tgl_pelayanan` text NOT NULL,
  `id_dokter` text NOT NULL,
  `nama_pasien` text NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `suhu` int(11) NOT NULL,
  `penyakit` text NOT NULL,
  `tindakan` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `tgl_pelayanan`, `id_dokter`, `nama_pasien`, `tinggi_badan`, `berat_badan`, `suhu`, `penyakit`, `tindakan`, `status`) VALUES
(1, '0', 'Dr. Bambang', 'indah', 8, 8, 9, 'fliu', 'aaaaaaa', 'Daftar'),
(12, '2011', 'Dr. Bambang', 'Ano', 2, 2, 2, 'hhhh', 'jjj', 'Pulang'),
(15, '2010', 'hoi9', 'wdsa', 178, 50, 40, 'demam', 'anunuun', 'Daftar'),
(20, '0000-00-00', 'Dr. Bambang ', 'Andri', 134, 45, 40, 'Sakit Gigi', 'Pelepasan gigi', 'Daftar'),
(25, '0', 'Dr. Bambang', ' indahhhhh', 134, 65, 40, 'hhhh', 'jjj', 'Pulang'),
(33, '1988', '.Array', 'Indah ', 90, 65, 67, 'yugyuj', 'bvh', 'Pulang'),
(39, '2021-05-27', '', 'Agin', 155, 45, 38, 'Meriang', 'Suntik', 'Daftar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `tgl_daftar` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
