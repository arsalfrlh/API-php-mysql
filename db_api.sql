-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2024 pada 13.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `tgl_dibuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `gambar`, `nama_barang`, `merk`, `harga`, `stok`, `tgl_dibuat`) VALUES
(6, 'assets/vga.png', 'VGA', 'Nvida', 7000000, 5, '2024-09-28'),
(7, 'assets/cpu.png', 'CPU', 'AMD', 3000000, 10, '2024-09-22'),
(8, 'assets/ram.png', 'RAM', 'Kinston', 350000, 7, '2024-09-22'),
(12, 'https://down-id.img.susercontent.com/file/id-11134207-7r990-lxuo7xzp8hnf93@resize_w450_nl.webp', 'Motherboard', 'Varro', 700000, 10, '2024-10-04'),
(13, 'https://down-id.img.susercontent.com/file/be1c3c09cb75efe48918c0f78ae765b9@resize_w450_nl.webp', 'PSU', 'Imperion', 300000, 12, '2024-10-04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
