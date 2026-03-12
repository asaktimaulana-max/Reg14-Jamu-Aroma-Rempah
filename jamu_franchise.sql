-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2026 pada 17.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamu_franchise`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `franchise`
--

CREATE TABLE `franchise` (
  `id_franchise` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `franchise`
--

INSERT INTO `franchise` (`id_franchise`, `nama_cabang`, `pemilik`, `alamat`, `kota`, `no_hp`, `status`) VALUES
(1, 'JAMU AROMA REMPAH', 'Anton Hadi', 'Jl Asia Afrika', 'SUBANG', '08123456789', 'Aktif'),
(3, 'Subang 1', 'Pak Andi', 'Subang', 'Subang', '08123456789', 'Aktif'),
(4, 'Subang 2', 'Bu Sari', 'Subang', 'Subang', '08123456788', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_franchise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_produk`, `tanggal`, `jumlah`, `total`, `id_franchise`) VALUES
(9, 1, '2025-03-10', 2, 100000, 3),
(10, 5, '2025-03-10', 1, 20000, 3),
(30, 5, '2026-03-12', 2, 40000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_jamu`
--

CREATE TABLE `produk_jamu` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `khasiat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_jamu`
--

INSERT INTO `produk_jamu` (`id_produk`, `nama_produk`, `harga`, `foto`, `khasiat`) VALUES
(1, 'supers', 50000, '1773062965_db3b9aaee4bb7327b3ac.jpg', 'suplemen kesehatan'),
(5, 'jamu', 20000, '1773063056_32de61de758b805a5eb8.jpeg', 'meredakan demam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_franchise` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `id_produk`, `id_franchise`, `jumlah`) VALUES
(1, 1, 3, 20),
(2, 5, 3, 15),
(3, 1, 4, 10),
(4, 5, 4, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `id_franchise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `id_franchise`) VALUES
(1, 'admin', 'admin123', 'admin', NULL),
(4, 'mitra_subang1', '123456', 'mitra', 3),
(5, 'mitra_subang2', '123456', 'mitra', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `franchise`
--
ALTER TABLE `franchise`
  ADD PRIMARY KEY (`id_franchise`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_penjualan_franchise` (`id_franchise`),
  ADD KEY `fk_penjualan_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk_jamu`
--
ALTER TABLE `produk_jamu`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `fk_stok_produk` (`id_produk`),
  ADD KEY `fk_stok_franchise` (`id_franchise`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_franchise` (`id_franchise`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `franchise`
--
ALTER TABLE `franchise`
  MODIFY `id_franchise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `produk_jamu`
--
ALTER TABLE `produk_jamu`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_franchise` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`),
  ADD CONSTRAINT `fk_penjualan_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk_jamu` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `fk_stok_franchise` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`),
  ADD CONSTRAINT `fk_stok_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk_jamu` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_franchise` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
