-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2024 pada 22.57
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
-- Database: `jenna's_studio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Foto Indoor', 'Fotografi indoor adalah salah satu jenis fotografi yang dilakukan di dalam ruangan, seperti rumah, studio, atau gedung. Jenis fotografi ini sangat populer karena fleksibilitasnya dan kemampuannya untuk menciptakan suasana yang unik.', 'foto-2.webp', '2024-12-09', 'admin'),
(2, 'Foto outdoor', 'Fotografi outdoor adalah seni menangkap momen di luar ruangan, dengan latar alam, jalanan, atau tempat umum lainnya. Jenis fotografi ini menawarkan kesempatan untuk memanfaatkan cahaya alami dan keindahan lingkungan sekitar, menjadikannya populer untuk berbagai jenis pemotretan seperti potret, lanskap, dan dokumentasi perjalanan.', 'foto-3.jpg', '2024-12-05', 'admin'),
(3, 'Foto Produk', 'Fotografi produk adalah jenis fotografi yang bertujuan menampilkan barang dagangan dengan cara yang menarik dan profesional. Foto produk sering digunakan untuk keperluan iklan, katalog, atau toko online. Dengan gambar yang berkualitas, produk dapat terlihat lebih menarik dan meningkatkan peluang penjualan.', 'foto-4.jpg', '2024-12-01', 'admin'),
(4, 'Foto Prewedding', 'Foto prewedding adalah sesi fotografi yang dilakukan pasangan sebelum hari pernikahan mereka. Foto ini biasanya digunakan untuk undangan, dekorasi pernikahan, atau sekadar menjadi kenang-kenangan yang berharga. Sesi prewedding bertujuan untuk menangkap momen cinta dan kebahagiaan pasangan dalam suasana yang romantis dan kreatif.', 'foto-5.webp', '2024-11-25', 'admin'),
(5, 'Foto Object', 'Fotografi objek adalah jenis fotografi yang fokus pada benda tertentu, baik benda hidup maupun mati, dengan tujuan menonjolkan detail, tekstur, dan karakteristiknya. Foto objek banyak digunakan dalam berbagai bidang, seperti seni, komersial, pendidikan, hingga dokumentasi.', 'foto-6.jpeg', '2024-11-01', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
