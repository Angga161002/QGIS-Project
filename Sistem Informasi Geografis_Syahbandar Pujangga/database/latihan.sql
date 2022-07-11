-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2022 pada 16.34
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lat_long` varchar(50) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lat_long`, `nama_tempat`, `kategori`, `keterangan`) VALUES
(9, 'LatLng(-0.9405533453014261, 100.39954500230355)', 'Semen Padang Hospital', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(10, 'LatLng(-0.9145902188776195, 100.36027661109594)', 'Rumah Sakit Herimina', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(11, 'LatLng(-0.9478901477514283, 100.3673093224801)', 'Rumah Sakit Umum BMC ', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(12, 'LatLng(-0.9427354701495985, 100.36749703386029)', 'Rumah Sakit Umum Pusat Dr. M. Djamil', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(13, 'LatLng(-0.9454645017123183, 100.41722083513754)', 'Rumah Sakit Harapan Bunda', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(14, 'LatLng(-0.8672439269967945, 100.38323025288221)', 'Rumah Sakit Islam Siti Rahmah', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(15, 'LatLng(-0.78412, 100.429)', 'Rs Ibnu Sina', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(16, 'LatLng(-0.85553, 100.49492)', 'Rumah Sakit Ibu Dan Anak Siti Hawa', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(17, 'LatLng(-1.10063, 100.39741)', 'Rumah Sakit Belimbing', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(18, 'LatLng(-0.94341, 100.43998)', 'Rumah Sakit Ibu & Anak Mutiara Bunda', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(19, 'LatLng(-1.02099, 100.43312)', 'Rumah Sakit Yos Sudarso', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang'),
(20, 'LatLng(-0.8926, 100.48736)', 'Rumah Sakit Khusus Bedah Ropanasuri Padang', 'rumah sakit', 'Rumah Sakit yang Berada di Kawasan Padang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
