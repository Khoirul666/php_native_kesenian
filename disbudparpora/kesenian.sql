-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2023 pada 15.55
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesenian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminid`, `adminemail`, `adminpassword`) VALUES
(4, 'dyah@gmail.com', 'dyah'),
(5, 'imel@gmail.com', 'Imel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `tgldaftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `useremail`, `userpassword`, `tgldaftar`) VALUES
(25, 'dyah@gmail.com', 'dyah', '2023-08-08 03:55:12'),
(26, 'user@gmail.com', 'user', '2023-08-08 16:04:00'),
(27, 'kiran@gmail.com', 'kiran', '2023-08-09 02:06:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userdata`
--

CREATE TABLE `userdata` (
  `userdataid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `noinduk` varchar(50) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `jeniskelamin` varchar(25) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `namakesenian` varchar(30) NOT NULL,
  `tglberdiri` date NOT NULL,
  `jeniskesenian` varchar(25) NOT NULL,
  `jmlanggota` varchar(25) NOT NULL,
  `ktpketua` varchar(99) NOT NULL,
  `ktpanggota` varchar(99) NOT NULL,
  `alatmusik` varchar(99) NOT NULL,
  `suratizin` varchar(99) NOT NULL,
  `tglberlaku` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Unverified',
  `tglkonfirmasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `userdata`
--

INSERT INTO `userdata` (`userdataid`, `userid`, `noinduk`, `nama`, `jeniskelamin`, `tempatlahir`, `tgllahir`, `alamat`, `kelurahan`, `kecamatan`, `nohp`, `jabatan`, `namakesenian`, `tglberdiri`, `jeniskesenian`, `jmlanggota`, `ktpketua`, `ktpanggota`, `alatmusik`, `suratizin`, `tglberlaku`, `status`, `tglkonfirmasi`) VALUES
(6, 0, '', 'dyah', 'P', 'kediri', '2023-08-01', 'Jl. Kapten tendean', 'Sukorejo', 'Mojoroto', '08532658979', 'Ketua', 'Rogo ', '2023-08-09', 'dance', 'Pa: 20 Pi:10', 'images/ktpketua/.jpeg', 'images/ktpanggota/.jpeg', 'images/alatmusik/.jpeg', 'images/suratizin/.jpeg', '0000-00-00', 'Unverified', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userdataid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userdataid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
