-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2019 pada 14.09
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brg`
--

CREATE TABLE `brg` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brg`
--

INSERT INTO `brg` (`id`, `name`, `harga`) VALUES
(1, 'mouse', 1000),
(2, 'kabel data pc', 3000),
(3, 'harddisk', 5000),
(5, 'keyboard', 6000),
(9, 'universal adapter', 8000),
(11, 'universal charger ', 4500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `name`) VALUES
(1, 'pcs'),
(3, 'rim'),
(6, 'bxs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_brg`
--

CREATE TABLE `trans_brg` (
  `id` int(11) NOT NULL,
  `sales` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jmlh` varchar(100) NOT NULL,
  `dibayar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `detail` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_brg`
--

INSERT INTO `trans_brg` (`id`, `sales`, `customer`, `barang`, `jmlh`, `dibayar`, `total`, `kembalian`, `detail`) VALUES
(16, 'maman', 'maman', '9,1', '30,10', 20000, 10000, 10000, 'universal adapter @8,000 dengan jumlah 30 ;mouse @1,000 dengan jumlah 10 '),
(17, 'santo', 'santa', '2,1,3', '200,100,25', 850000, 825000, 25000, 'kabel data pc @3,000 dengan jumlah 200 ;mouse @1,000 dengan jumlah 100 ;harddisk @5,000 dengan jumlah 25 '),
(20, 'jaka', 'maman', '1,5', '20,20', 150000, 140000, 10000, 'mouse @1,000 dengan jumlah 20 ;keyboard @6,000 dengan jumlah 20 ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brg`
--
ALTER TABLE `brg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_brg`
--
ALTER TABLE `trans_brg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brg`
--
ALTER TABLE `brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `trans_brg`
--
ALTER TABLE `trans_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
