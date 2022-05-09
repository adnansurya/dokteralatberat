-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2022 pada 17.37
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokteralatberat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `email`, `password`) VALUES
(1, 'Hologram Makassar', 'hologram_mks', 'hologram.mks@gmail.com', '$2y$10$LQ4aGKD6Tb7EiviIB4W3.Ogg4XbfEvtVcdOXsq7eOYKg6nio7NbXi'),
(2, 'Anonymous', 'anonym', 'anonym@gmail.com', '$2y$10$h7VpWvj65EsorbINr0vJGem5MR7FGx8C3/D6sHuF/VNjPoJApGMim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklist_harian`
--

CREATE TABLE `checklist_harian` (
  `id_checklist` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `stat_operasi` text NOT NULL,
  `lokasi` text NOT NULL,
  `jam_start` int(11) NOT NULL,
  `jam_stop` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `jasa` text NOT NULL,
  `sparepart` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `nama`, `username`, `password`) VALUES
(1, 'Multi Niaga Rejeki', 'multiniagarejeki', '$2y$10$TcmF9BtTCiPRU5nZT.cVC.rMVSMc/2EiAWqqgAhqR5gOgCBG5pG7a'),
(2, 'Makassar Robotics', 'mksrobotics', '$2y$10$JJf4.6aUcluakw2H0KEh3eUcnSzUSC6lkTW/8nIpPzBBGtQB46gZC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link_admin_client`
--

CREATE TABLE `link_admin_client` (
  `id_link` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `link_admin_client`
--

INSERT INTO `link_admin_client` (`id_link`, `id_admin`, `id_client`) VALUES
(3, 2, 1),
(4, 2, 2),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `nama` text NOT NULL,
  `no_hp` text NOT NULL,
  `foto_identitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `nama`, `no_hp`, `foto_identitas`) VALUES
(1, 'Muhammad Adnan', '081244047984', '-'),
(2, 'Zagi', '083247587638263', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `no_id` text NOT NULL,
  `model` text NOT NULL,
  `serial_num` text NOT NULL,
  `id_client` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `no_id`, `model`, `serial_num`, `id_client`, `tahun`, `foto`) VALUES
(1, 'CAT 65', 'Caterpillar 320 GC', 'ZBT00485', 2, 2019, ''),
(2, 'CAT 64', 'Caterpillar 320 GC', 'ZBT00336', 1, 2019, ''),
(3, 'SUM 98', 'Sumitomo SH210-6', 'STN210T6C00BH2072', 2, 2019, ''),
(4, 'SUM 99', 'Sumitomo SH210-6', 'STN210T6C00BH2071', 1, 2019, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `checklist_harian`
--
ALTER TABLE `checklist_harian`
  ADD PRIMARY KEY (`id_checklist`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `link_admin_client`
--
ALTER TABLE `link_admin_client`
  ADD PRIMARY KEY (`id_link`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `checklist_harian`
--
ALTER TABLE `checklist_harian`
  MODIFY `id_checklist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `link_admin_client`
--
ALTER TABLE `link_admin_client`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
