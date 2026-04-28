-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2026 pada 13.33
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
-- Struktur dari tabel `bagi_hasil`
--

CREATE TABLE `bagi_hasil` (
  `id_bagi_hasil` int(11) NOT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `periode` varchar(7) DEFAULT NULL,
  `total_omset` int(11) DEFAULT NULL,
  `bagi_hasil_pusat` int(11) DEFAULT NULL,
  `bagian_mitra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bagi_hasil`
--

INSERT INTO `bagi_hasil` (`id_bagi_hasil`, `id_franchise`, `periode`, `total_omset`, `bagi_hasil_pusat`, `bagian_mitra`) VALUES
(1, 3, '2026-03', 50000, 10000, 40000),
(2, 4, '2026-03', 70000, 14000, 56000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khasiat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nama_bahan`, `stok`, `satuan`, `tanggal_update`, `khasiat`) VALUES
(1, 'Kunyit', 75, 'kg', '2026-04-09 06:06:14', 'Anti-inflamasi alami, Meningkatkan daya tahan tubuh, Menjaga kesehatan hati, Membantu pencernaan, Meredakan nyeri haid, Mencegah kerusakan sel akibat radikal bebas, Menjaga kesehatan kulit'),
(2, 'Jahe', 35, 'kg', '2026-04-09 06:06:14', 'Menghangatkan tubuh, Meningkatkan daya tahan tubuh, Meredakan nyeri otot dan sendi, Menurunkan kolesterol dan gula darah, Melancarkan peredaran darah, Meredakan batuk dan pilek, Meningkatkan stamina'),
(3, 'Temulawak', 35, 'kg', '2026-04-09 06:06:14', 'Meningkatkan nafsu makan, Menjaga kesehatan hati, Membantu pencernaan, Mengurangi peradangan, Meningkatkan daya tahan tubuh, Mengatasi kelelahan, Membantu meredakan nyeri sendi'),
(4, 'Serai', 25, 'kg', '2026-04-09 06:06:14', 'Membantu meredakan perut kembung, Mengurangi rasa mual, Menurunkan tekanan darah, Membantu detoksifikasi tubuh, Meredakan nyeri sendi, Meningkatkan kualitas tidur'),
(5, 'Bunga Talang', 0, 'kg', '2026-04-09 06:06:14', 'Menjaga kesehatan mata, Meningkatkan daya tahan tubuh, Melancarkan peredaran darah, Menenangkan pikiran rileks, Menyegarkan tubuh, Mengandung antioksidan tinggi, Memberi warna alami'),
(6, 'Rosela', 0, 'kg', '2026-04-09 06:06:14', 'Menurunkan tekanan darah, Menurunkan kadar kolesterol, Meningkatkan daya tahan tubuh, Membantu menurunkan berat badan, Melancarkan pencernaan, Menangkal radikal bebas, Mengurangi peradangan'),
(7, 'Kencur', 0, 'kg', '2026-04-09 06:06:14', 'Meningkatkan nafsu makan, Meredakan batuk dan pilek, Menghangatkan tubuh, Mengurangi pegal dan nyeri otot, Membantu pencernaan, Mengatasi masuk angin, Menambah energi tubuh'),
(8, 'Cengkeh', 0, 'kg', '2026-04-09 06:06:14', 'Meredakan sakit gigi, Menghangatkan tubuh, Mengatasi batuk dan pilek, Meningkatkan daya tahan tubuh, Membantu pencernaan, Mengurangi nyeri sendi dan otot, Menyegarkan napas'),
(9, 'Kayu Manis', 0, 'kg', '2026-04-09 06:06:14', 'Mengontrol gula darah, Meningkatkan daya tahan tubuh, Menghangatkan tubuh, Membantu pencernaan, Mengurangi peradangan, Menurunkan kolesterol, Memberi aroma dan rasa manis alami'),
(10, 'Biji Adas', 0, 'kg', '2026-04-09 06:06:14', 'Membantu pencernaan, Mengurangi perut kembung, Meredakan mual, Menyegarkan napas, Mengurangi nyeri haid, Meningkatkan nafsu makan, Membantu meredakan batuk'),
(11, 'Lengkuas', 0, 'kg', '2026-04-09 06:06:14', 'Menghangatkan tubuh, Membantu pencernaan, Meredakan nyeri otot dan sendi, Mengatasi mual, Meningkatkan daya tahan tubuh, Mengurangi peradangan, Mengatasi masuk angin'),
(12, 'Secang', 0, 'kg', '2026-04-09 06:06:14', 'Menghangatkan tubuh, Meningkatkan daya tahan tubuh, Melancarkan peredaran darah, Membantu pencernaan, Mengurangi peradangan, Menyegarkan tubuh, Memberi warna alami pada minuman'),
(13, 'Pala', 0, 'kg', '2026-04-09 06:06:14', 'Membantu pencernaan, Meningkatkan kualitas tidur, Meredakan batuk dan pilek, Mengurangi peradangan, Menghangatkan tubuh, Menyegarkan napas, Membantu meredakan nyeri'),
(14, 'Kapulaga', 0, 'kg', '2026-04-09 06:06:14', 'Membantu pencernaan, Mengurangi bau mulut, Meredakan batuk dan pilek, Mengurangi peradangan, Menyegarkan napas, Mengontrol tekanan darah, Meningkatkan daya tahan tubuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_penjualan`, `id_produk`, `qty`, `harga`) VALUES
(1, 1, 1, 1, 50000),
(2, 2, 5, 1, 20000),
(3, 11, 1, 2, 50000),
(4, 12, 5, 2, 20000),
(5, 13, 5, 1, 20000),
(6, 14, 1, 2, 50000),
(7, 14, 5, 3, 20000),
(8, 15, 1, 1, 50000),
(9, 15, 5, 1, 20000),
(10, 16, 7, 40, 10000),
(11, 16, 18, 20, 10000),
(12, 17, 9, 20, 10000),
(13, 18, 8, 20, 10000),
(14, 18, 18, 10, 10000),
(15, 19, 8, 20, 10000),
(16, 19, 18, 20, 10000),
(17, 20, 7, 20, 10000),
(18, 20, 18, 20, 10000),
(19, 20, 17, 20, 10000),
(20, 21, 7, 40, 10000),
(21, 22, 7, 10, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `franchise`
--

CREATE TABLE `franchise` (
  `id_franchise` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `franchise`
--

INSERT INTO `franchise` (`id_franchise`, `nama_cabang`, `pemilik`, `alamat`, `no_hp`, `status`) VALUES
(3, 'Subang 1', 'Pak Andi', 'Subang', '08123456789', 'Aktif'),
(4, 'Subang 2', 'Bu Sari', 'Subang', '08123456788', 'Aktif'),
(6, 'Pagaden', 'Rahmat Saleh', 'Depan polsek pagaden', '0895421083359', 'Aktif'),
(7, 'pamanukan', 'indra', 'depan yogya', '08131554929', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-04-09-060435', 'App\\Database\\Migrations\\AddKhasiatToBahanBaku', 'default', 'App', 1775714694, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_bahan`
--

CREATE TABLE `pemesanan_bahan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_franchise` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan_bahan`
--

INSERT INTO `pemesanan_bahan` (`id_pemesanan`, `id_franchise`, `id_bahan`, `jumlah`, `tanggal_pesan`, `status`) VALUES
(1, 3, 1, 10, '2026-03-17', 'dikirim'),
(2, 3, 2, 5, '2026-03-17', 'dikirim'),
(3, 3, 1, 5, '2026-03-17', 'selesai'),
(4, 3, 1, 5, '2026-03-17', 'diproses'),
(5, 4, 1, 2, '2026-04-09', 'diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_franchise`, `id_produk`, `tanggal`, `jumlah`, `total`) VALUES
(12, 3, NULL, '2026-03-19', NULL, 40000),
(13, 3, NULL, '2026-03-19', NULL, 20000),
(14, 3, NULL, '2026-03-19', NULL, 160000),
(15, 3, NULL, '2026-03-19', NULL, 70000),
(16, 3, NULL, '2026-04-09', NULL, 600000),
(17, 3, NULL, '2026-04-10', NULL, 200000),
(18, 3, NULL, '2026-04-09', NULL, 300000),
(19, 3, NULL, '2026-04-09', NULL, 400000),
(20, 4, NULL, '2026-04-09', NULL, 600000),
(21, 6, NULL, '2026-04-09', NULL, 400000),
(22, 3, NULL, '2026-04-14', NULL, 100000);

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
(7, 'WEDANG REMPAH (Rempah Super)', 10000, NULL, 'Meningkatkan daya tahan tubuh, Mengontrol gula darah & kolesterol, Menjaga kesehatan jantung & peredaran darah, Pegal-pegal & masuk angin, Melancarkan pencernaan, Flu & batuk'),
(8, 'SUSU JAHE REMPAH (Jahe, Rempah KCB, susu)', 10000, NULL, 'Meningkatkan daya tahan tubuh, Menambah energi & stamina, Efek Relaksasi, Baik untuk pencernaan'),
(9, 'WEDANG TEMULAWAK (Temulawak, KCB, Serai)', 10000, NULL, 'Menjaga kesehatan hati, Meningkatkan nafsu makan, Melancarkan pencernaan, Meningkatkan stamina & imun tubuh, Meredakan peradangan & pegal-pegal, Kolesterol & metabolisme'),
(10, 'WEDANG KENCUR (Kencur, Jahe, KCB, serai)', 10000, NULL, 'Meredakan Flu, batuk & tenggorokan gatal, Masuk angin & menghangatkan tubuh, Meningkatkan daya tahan tubuh, Mengurangi stres & membuat rileks, Menambah energi & kesegaran, Gigi, gusi, menyegarkan mulut, Nyeri radang, mengontrol gula darah'),
(11, 'STMJ (Susu, Telur, Madu, Jahe)', 15000, NULL, 'Meningkatkan stamina & energi, Menjaga kesehatan otot & tulang, Meningkatkan daya tahan tubuh, Membantu pemulihan tubuh, Melancarkan peredaran darah, Baik untuk kesuburan (pria & wanita)'),
(12, 'WEDANG UWUH (Jahe, KCB, kayu manis, serai, secang)', 10000, NULL, 'Menghangatkan tubuh, Melancarkan peredaran darah, Meningkatkan daya tahan tubuh, Meredakan masuk angin, flu, dan batuk, Mengurangi kolesterol & gula darah, Anti-inflamasi & analgesik alami, Menenangkan tubuh'),
(13, 'WEDANG KUNYIT (kunyit, Jahe, KCB, kayu manis, serai)', 10000, NULL, 'Anti-inflamasi & detoks tubuh, Melancarkan pencernaan & menjaga kesehatan jantung, Meredakan batuk & sakit tenggorokan, Meningkatkan imun & meredakan flu, Menghangatkan tubuh & melancarkan peredaran darah, Menurunkan tekanan darah & meredakan stres, Mengontrol gula darah & kolesterol, Melancarkan sirkulasi darah & menyehatkan jantung'),
(14, 'WEDANG LENGKUAS (Lengkuas, Jahe, KCB, kayu manis, serai)', 10000, NULL, 'Melancarkan pencernaan & antibakteri, Meredakan batuk & tingkatkan imun, Melancarkan peredaran darah & sehatkan jantung, Hangatkan tubuh & redakan masuk angin, Turunkan tekanan darah & bantu detoks'),
(15, 'JAHE BOOSTER (Jahe, Lemon, serai)', 10000, NULL, 'Menyegarkan tubuh & melepas dahaga, Meningkatkan imun & kaya vitamin C, Meredakan flu, batuk & sakit tenggorokan, Membantu detoksifikasi tubuh, Menurunkan stres & menjaga mood tetap segar'),
(16, 'KENCUR BOOSTER (Kencur, Lemon, serai)', 10000, NULL, 'Menyegarkan tubuh & melepas dahaga, Meningkatkan imun & kaya vitamin C, Meredakan perut kembung & melancarkan pencernaan, Membantu detoksifikasi tubuh, Menurunkan stres & menjaga mood tetap segar'),
(17, 'KUNYIT BOOSTER (Kunyit, Lemon, serai)', 10000, NULL, 'Menyegarkan tubuh & melepas dahaga, Anti-inflamasi alami & baik untuk sendi, Meningkatkan imun & kaya vitamin C, Membantu detoksifikasi tubuh, Menurunkan stres & membuat tubuh lebih rileks'),
(18, 'KUNJARUK (Kunyit, Jahe, Jeruk)', 10000, NULL, 'Meningkatkan Imun Tubuh, Mengurangi rasa lelah & stres, Melancarkan pencernaan & menjaga lambung, Detox alami'),
(19, 'JANCRUK (Jahe, Kencur, Jeruk)', 10000, NULL, 'Meningkatkan Imun Tubuh, Mengurangi rasa lelah & pegal, Melancarkan pencernaan & meredakan kembung, Detox alami'),
(20, 'TEH BUNGA TELANG', 10000, NULL, 'Baik untuk Imun & melawan Radikal bebas, Kesehatan mata, Menjaga Sirkulasi darah & kesehatan jantung, Baik untuk kulit, rambut & kesehatan otak, Menurunkan tekanan darah tinggi, Bersifat deuretik (melancarkan buang air kecil)'),
(21, 'TEH BUNGA ROSELA', 10000, NULL, 'Baik untuk Imun & melawan Radikal bebas, Kesehatan mata, Menjaga Sirkulasi darah & kesehatan jantung, Baik untuk kulit, rambut & kesehatan otak, Menurunkan tekanan darah tinggi, Bersifat deuretik (melancarkan buang air kecil)');

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
(2, 'owner', 'owner123', 'owner', NULL),
(4, 'mitra_subang1', '123456', 'mitra', 3),
(5, 'mitra_subang2', '123456', 'mitra', 4),
(8, 'Pagaden', '123456', 'mitra', 6),
(9, 'pamanukan', '123456', 'mitra', 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  ADD PRIMARY KEY (`id_bagi_hasil`),
  ADD KEY `fk_bagi_hasil_franchise` (`id_franchise`);

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `franchise`
--
ALTER TABLE `franchise`
  ADD PRIMARY KEY (`id_franchise`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_franchise` (`id_franchise`),
  ADD KEY `fk_pemesanan_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_penjualan_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk_jamu`
--
ALTER TABLE `produk_jamu`
  ADD PRIMARY KEY (`id_produk`);

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
-- AUTO_INCREMENT untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  MODIFY `id_bagi_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `franchise`
--
ALTER TABLE `franchise`
  MODIFY `id_franchise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `produk_jamu`
--
ALTER TABLE `produk_jamu`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  ADD CONSTRAINT `fk_bagi_hasil_franchise` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  ADD CONSTRAINT `fk_pemesanan_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_bahan_ibfk_1` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_bahan_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk_jamu` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_franchise` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
