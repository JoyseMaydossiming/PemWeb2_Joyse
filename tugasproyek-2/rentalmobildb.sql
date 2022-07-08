-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2022 pada 06.00
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobildb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_perawatans`
--

CREATE TABLE `jenis_perawatans` (
  `id` int(11) NOT NULL,
  `nama` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_perawatans`
--

INSERT INTO `jenis_perawatans` (`id`, `nama`) VALUES
(1, 'ganti oli'),
(2, 'rem depan'),
(3, 'suspensi'),
(4, 'ban'),
(5, 'tune up');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merks`
--

CREATE TABLE `merks` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merks`
--

INSERT INTO `merks` (`id`, `nama`, `produk`) VALUES
(1, 'Hummer', 'H1'),
(2, 'Lexus', 'ES'),
(3, 'Nissan', 'Armada'),
(4, 'Volkswagen', 'Passat'),
(5, 'Ford', 'E150'),
(6, 'Mercury', 'Grand Marquis'),
(7, 'Chevrolet', 'Monte Carlo'),
(8, 'Mercedes-Benz', 'E-Class'),
(9, 'Chrysler', '300M'),
(10, 'Nissan', 'Rogue'),
(11, 'Mazda', 'B-Series Plus'),
(12, 'Toyota', 'Land Cruiser'),
(13, 'Land Rover', 'Discovery'),
(14, 'Isuzu', 'Terbaru'),
(15, 'Dodge', 'Neon'),
(16, 'Chevrolet', 'S10 Blazer'),
(17, 'Ford', 'Taurus'),
(18, 'Mercury', 'Milan'),
(19, 'Volvo', 'S40'),
(20, 'Honda', 'CR-V');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobils`
--

CREATE TABLE `mobils` (
  `id` int(11) NOT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `biaya_sewa` float DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `cc` varchar(50) DEFAULT NULL,
  `tahun` varchar(50) DEFAULT NULL,
  `merk_id` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobils`
--

INSERT INTO `mobils` (`id`, `nopol`, `warna`, `biaya_sewa`, `deskripsi`, `cc`, `tahun`, `merk_id`, `foto`) VALUES
(1, '3C4PDCAB9FT915428', 'Pink', 7208340, 'porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in', '1', '2010', 1, '1.png'),
(2, '3LN6L2LU8DR284247', 'Puce', 5303980, 'nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere', '2', '2003', 2, '2.png'),
(3, 'WAUSH94F48N297127', 'All Black', 4335660, 'natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque', '3', '2000', 3, '3.png'),
(4, 'WAUMR44E06N395066', 'Grey', 4249080, 'ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat', '4', '2002', 4, '4.png'),
(5, 'WA1LGBFE5DD983032', 'Puce', 690, 'sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor', '5', '2010', 5, '5.png'),
(6, 'WAULD64B53N337879', 'Fuscia', 295, 'vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra', '6', '2007', 6, '6.png'),
(7, 'WAUDF48H19K671225', 'Fuscia', 943, 'lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea', '7', '2007', 7, '7.png'),
(8, 'WAUKG68E05A425904', 'Mauv', 787, 'fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis', '8', '1989', 8, '8.png'),
(9, 'JH4DC53893S082180', 'Maroon', 866, 'faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec', '9', '1984', 9, '9.png'),
(10, 'JHMZF1C67ES680906', 'All Black', 718, 'at nulla suspendisse potenti cras in purus eu magna vulputate', '10', '2008', 10, '10.png'),
(11, 'WBANF33596B053139', 'Turquoise', 728, 'aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu', '11', '1977', 11, '11.png'),
(12, 'WAUFFAFL2FN884371', 'Turquoise', 623, 'pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien', '12', '2008', 12, '12.png'),
(13, 'JTEBU4BF8DK885513', 'Black', 821, 'et ultrices posuere cubilia curae nulla dapibus dolor vel est', '13', '2007', 13, '13.png'),
(14, '1GYS3NKJ6FR955158', 'Purple', 609, 'nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum', '14', '1993', 14, '14.png'),
(15, '1C4SDJCT3CC615007', 'Turquoise', 44, 'turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus', '15', '2007', 15, '15.png'),
(16, 'JH4NA12663T207665', 'Blue', 1000, 'molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec', '16', '2010', 16, '16.png'),
(17, '3VWPG3AG4AM429452', 'Pink', 157, 'metus vitae ipsum aliquam non mauris morbi non lectus aliquam', '17', '1994', 17, '17.png'),
(18, '1N6AA0EC3DN915855', 'White', 513, 'libero rutrum ac lobortis vel dapibus at diam nam tristique', '18', '2001', 18, '18.png'),
(19, 'SCBBP9ZA7DC157438', 'Grey', 601, 'accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean', '19', '2008', 19, '19.png'),
(20, '1G4HC5EM6AU308749', 'Khaki', 555, 'turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut', '20', '2012', 20, '20.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatans`
--

CREATE TABLE `perawatans` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `km_mobil` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `jenis_perawatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perawatans`
--

INSERT INTO `perawatans` (`id`, `tanggal`, `biaya`, `km_mobil`, `deskripsi`, `mobil_id`, `jenis_perawatan_id`) VALUES
(1, '2022-07-08 00:00:00', 155849, 654, 'Oli lama, perlu di ganti', 1, 1),
(2, '0000-00-00 00:00:00', 192462, 818, 'accumsan tellus nisi eu orci mauris lacinia sapien quis libero', 2, 2),
(3, '0000-00-00 00:00:00', 620225, 894, 'odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit', 3, 1),
(4, '0000-00-00 00:00:00', 984829, 24, 'etiam justo etiam pretium iaculis justo in hac habitasse platea', 4, 2),
(5, '0000-00-00 00:00:00', 137120, 83, 'urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius', 5, 2),
(6, '0000-00-00 00:00:00', 654155, 371, 'sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer', 6, 3),
(7, '0000-00-00 00:00:00', 615297, 205, 'lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat', 7, 3),
(8, '0000-00-00 00:00:00', 641881, 610, 'semper sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed', 8, 1),
(9, '0000-00-00 00:00:00', 997933, 392, 'ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 9, 2),
(10, '0000-00-00 00:00:00', 715677, 57, 'venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewas`
--

CREATE TABLE `sewas` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `noktp` varchar(50) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewas`
--

INSERT INTO `sewas` (`id`, `tanggal_mulai`, `tanggal_akhir`, `tujuan`, `noktp`, `users_id`, `mobil_id`) VALUES
(1, '0000-00-00', '0000-00-00', 'Načeradec', '52-3798279', 1, 1),
(2, '0000-00-00', '0000-00-00', 'Reading', '99-3011405', 2, 2),
(3, '0000-00-00', '0000-00-00', 'Beruniy', '98-5496293', 3, 3),
(4, '0000-00-00', '0000-00-00', 'Akita', '41-1809085', 4, 4),
(5, '0000-00-00', '0000-00-00', 'Pancheng', '07-1850113', 5, 5),
(6, '0000-00-00', '0000-00-00', 'Timaru', '37-8721868', 6, 6),
(7, '0000-00-00', '0000-00-00', 'Yantan', '74-1802635', 7, 7),
(8, '0000-00-00', '0000-00-00', 'Youlongchuan', '15-7765809', 8, 8),
(9, '0000-00-00', '0000-00-00', 'Taishanmiao', '10-8529979', 9, 9),
(10, '0000-00-00', '0000-00-00', 'Guatire', '13-1229482', 7, 10),
(11, '0000-00-00', '0000-00-00', 'Dniprodzerzhyns’k', '95-7886264', 1, 11),
(12, '0000-00-00', '0000-00-00', 'Qal‘ah-ye Shāhī', '62-9251475', 10, 12),
(13, '0000-00-00', '0000-00-00', 'Pôrto Barra do Ivinheima', '97-1197359', 9, 13),
(14, '0000-00-00', '0000-00-00', 'Zafarwāl', '96-4724127', 1, 14),
(15, '0000-00-00', '0000-00-00', 'Kafr Nubl', '88-2780266', 10, 15),
(16, '2022-07-08', '2022-07-10', 'Jalan sama ayank', '033122342222', 11, 17),
(17, '0000-00-00', '0000-00-00', 'Piknik', '30001111', 11, 3),
(18, '2022-07-09', '2022-07-16', 'pulang kamoung ke jawa', '3102873927', 11, 1),
(19, '2022-07-09', '2022-07-13', 'Pulang Kampung', '4521046229', 14, 3),
(20, '2022-07-14', '2022-07-20', 'Kepentingan Keluarga', '312836283', 15, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `role` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `last_login`, `status`, `role`) VALUES
(1, 'sfinicj0', '6b6UUrKh', 'smoyce0@thetimes.co.uk', '0000-00-00', '0000-00-00', 0, 'admin'),
(2, 'nhumpatch1', 'oicP8R', 'gwinckworth1@disqus.com', '0000-00-00', '0000-00-00', 0, 'admin'),
(3, 'kwillmot2', 'raVyLm5', 'mmathieson2@amazon.co.jp', '0000-00-00', '0000-00-00', 2, 'user'),
(4, 'vbenzi3', 'Qi6H46xA', 'cchastel3@ca.gov', '0000-00-00', '0000-00-00', 0, 'user'),
(5, 'ldradey4', 'JtpM2BSiTPGw', 'afollis4@t.co', '0000-00-00', '0000-00-00', 2, 'user'),
(6, 'fmcmurty5', 'LSdl0SOrx', 'lruppertz5@phoca.cz', '0000-00-00', '0000-00-00', 2, 'user'),
(7, 'tdive6', 'EDo7nf', 'jableson6@bbc.co.uk', '0000-00-00', '0000-00-00', 0, 'user'),
(8, 'kgush7', '3vqHGS2d', 'zstockport7@bbb.org', '0000-00-00', '0000-00-00', 0, 'admin'),
(9, 'smote8', 'xKAERvUQt', 'drogliero8@guardian.co.uk', '0000-00-00', '0000-00-00', 0, 'user'),
(10, 'rturbefield9', 'uIALU9fhvq', 'cruddock9@booking.com', '0000-00-00', '0000-00-00', 0, 'user'),
(11, 'joy3', '12345', 'josye@gmail.com', NULL, NULL, 1, 'user'),
(12, 'admin', 'admin', 'admin@gmail.com', NULL, NULL, 1, 'user'),
(14, 'joyse', '123', 'joyse@gmail.com', NULL, NULL, 1, 'user'),
(15, 'nurul fikri', '12345', 'nurulfikri@gmail.com', '2022-07-08', '2022-07-08', 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_perawatans`
--
ALTER TABLE `jenis_perawatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merks`
--
ALTER TABLE `merks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Mobil_Merk` (`merk_id`);

--
-- Indeks untuk tabel `perawatans`
--
ALTER TABLE `perawatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Perawatan_Jenis` (`jenis_perawatan_id`),
  ADD KEY `FK_Perawatan_Mobil` (`mobil_id`);

--
-- Indeks untuk tabel `sewas`
--
ALTER TABLE `sewas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Sewa_User` (`users_id`),
  ADD KEY `FK_Sewa_Mobil` (`mobil_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_perawatans`
--
ALTER TABLE `jenis_perawatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `merks`
--
ALTER TABLE `merks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `perawatans`
--
ALTER TABLE `perawatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `sewas`
--
ALTER TABLE `sewas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobils`
--
ALTER TABLE `mobils`
  ADD CONSTRAINT `FK_Mobil_Merk` FOREIGN KEY (`merk_id`) REFERENCES `merks` (`id`);

--
-- Ketidakleluasaan untuk tabel `perawatans`
--
ALTER TABLE `perawatans`
  ADD CONSTRAINT `FK_Perawatan_Jenis` FOREIGN KEY (`jenis_perawatan_id`) REFERENCES `jenis_perawatans` (`id`),
  ADD CONSTRAINT `FK_Perawatan_Mobil` FOREIGN KEY (`mobil_id`) REFERENCES `mobils` (`id`);

--
-- Ketidakleluasaan untuk tabel `sewas`
--
ALTER TABLE `sewas`
  ADD CONSTRAINT `FK_Sewa_Mobil` FOREIGN KEY (`mobil_id`) REFERENCES `mobils` (`id`),
  ADD CONSTRAINT `FK_Sewa_User` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
