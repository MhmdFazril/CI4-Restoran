-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2023 pada 17.41
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_account`
--

CREATE TABLE `master_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_account`
--

INSERT INTO `master_account` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'yulianto', 'yulianto@gmail.com', 'qwerty', 'customer'),
(7, 'test', 'admin@gmail.com', '$2y$10$YVrSSFAAoxKTuH9XavMLzOzadqobJTZzUp09ngdzVzuFfljoJk2Bu', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_office`
--

CREATE TABLE `master_office` (
  `id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_office`
--

INSERT INTO `master_office` (`id`, `office_name`, `location`) VALUES
(1, 'Triwijaya', 'Jakarta Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_product`
--

CREATE TABLE `master_product` (
  `id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `source` varchar(100) NOT NULL,
  `material` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_product`
--

INSERT INTO `master_product` (`id`, `photo`, `name`, `price`, `description`, `source`, `material`, `quantity`) VALUES
(1, 'test1', 'test1', 120000, 'Sebuah pemandangan alam yang menakjubkan terbentang di depan mata, dengan perbukitan hijau yang menghampar luas dan jajaran pegunungan yang menjulang gagah di kejauhan. Langit cerah dengan awan-awan putih yang berarak melintasi langit biru, menciptakan su', 'Itali', 'udang', 0),
(2, 'test2', 'test2', 160000, 'Sebuah pantai yang memukau dengan pasir putih lembut yang terhampar sejauh mata memandang, dihiasi dengan pohon kelapa yang menjulang tinggi. Ombak yang tenang menggulung dengan lembut ke tepi pantai, mengundang untuk berjalan-jalan santai atau berenang di air jernih yang segar.', 'Jerman', 'pasta', 0),
(3, 'test3', 'test3', 23800, 'Sebuah pantai yang memukau dengan pasir putih lembut yang terhampar sejauh mata memandang, dihiasi dengan pohon kelapa yang menjulang tinggi. Ombak yang tenang menggulung dengan lembut ke tepi pantai, mengundang untuk berjalan-jalan santai atau berenang d', 'Indonesia', 'daging sapi', 0),
(4, 'test4', 'test4', 540000, 'Sebuah hutan yang mistis dan rimbun, dengan pepohonan tinggi yang menjulang ke langit. Cahaya matahari yang tersaring melalui daun-daun hijau yang rapat menciptakan bayangan yang menarik di tanah yang ditumbuhi rerumputan. Bunyi riuh pepohonan dan nyanyia', 'Jepang', 'ikan salmon', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_sale`
--

CREATE TABLE `transaction_sale` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_office` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaction_sale`
--

INSERT INTO `transaction_sale` (`id`, `id_product`, `quantity`, `id_account`, `id_office`, `created_time`) VALUES
(3, 3, 4, 7, 1, '2023-05-14 14:36:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_account`
--
ALTER TABLE `master_account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_office`
--
ALTER TABLE `master_office`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_product`
--
ALTER TABLE `master_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction_sale`
--
ALTER TABLE `transaction_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_sale_FK` (`id_account`),
  ADD KEY `transaction_sale_FK_1` (`id_office`),
  ADD KEY `transaction_sale_FK_2` (`id_product`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_account`
--
ALTER TABLE `master_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `master_office`
--
ALTER TABLE `master_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_product`
--
ALTER TABLE `master_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaction_sale`
--
ALTER TABLE `transaction_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaction_sale`
--
ALTER TABLE `transaction_sale`
  ADD CONSTRAINT `transaction_sale_FK` FOREIGN KEY (`id_account`) REFERENCES `master_account` (`id`),
  ADD CONSTRAINT `transaction_sale_FK_1` FOREIGN KEY (`id_office`) REFERENCES `master_office` (`id`),
  ADD CONSTRAINT `transaction_sale_FK_2` FOREIGN KEY (`id_product`) REFERENCES `master_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
