-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 10:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s11_sari`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_reklame`
--

CREATE TABLE `kategori_reklame` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_reklame`
--

INSERT INTO `kategori_reklame` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Insidentil', '2021-02-06 06:31:33', '2021-02-06 06:31:33'),
(2, 'Permanen', '2021-02-06 06:31:37', '2021-02-06 06:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_20_073008_create_reklame_table', 2),
(6, '2021_01_20_073138_create_pemesanan_table', 3),
(7, '2021_01_20_074307_create_pembayaran_table', 4),
(8, '2021_02_06_063019_create_kategori_reklame_table', 5),
(9, '2021_02_06_063331_add_kategori_on_reklame_table', 6),
(10, '2021_02_06_064155_create_titik_reklame_table', 7),
(11, '2021_02_06_081756_add_titik_reklame_on_pemesanan_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reklame_id` bigint(20) UNSIGNED NOT NULL,
  `titik_reklame_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_pemesanan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tanggal_awal_pemasangan` date NOT NULL,
  `tanggal_akhir_pemasangan` date NOT NULL,
  `isi_reklame` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double DEFAULT NULL,
  `file_pendukung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perizinan` tinyint(4) NOT NULL DEFAULT 0,
  `status_pembayaran` tinyint(4) NOT NULL DEFAULT 0,
  `status_reklame` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `user_id`, `reklame_id`, `titik_reklame_id`, `kode_pemesanan`, `tanggal_awal_pemasangan`, `tanggal_akhir_pemasangan`, `isi_reklame`, `harga`, `file_pendukung`, `status_perizinan`, `status_pembayaran`, `status_reklame`, `created_at`, `updated_at`) VALUES
(8, 12, 9, 9, '985645', '2021-02-06', '2021-02-08', 'Contoh Isi Reklame', 150000, '12_4.jpeg', 1, 1, 1, '2021-02-06 01:23:30', '2021-02-06 02:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `reklame`
--

CREATE TABLE `reklame` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_jenis_reklame` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reklame`
--

INSERT INTO `reklame` (`id`, `kategori_id`, `nama_jenis_reklame`, `keterangan`, `harga`, `created_at`, `updated_at`) VALUES
(9, 1, 'Spanduk', '-', 20000, '2021-02-06 00:06:01', '2021-02-06 00:12:04'),
(10, 1, 'Baliho', 'Ukuran 6x4', 20000, '2021-02-06 00:12:28', '2021-02-06 00:12:28'),
(11, 1, 'Tron', '-', 100000, '2021-02-06 00:12:40', '2021-02-06 00:12:40'),
(12, 1, 'Billboard', 'Ukuran 5x10', 20000, '2021-02-06 00:12:59', '2021-02-06 00:12:59'),
(13, 1, 'Bendera', '-', 20000, '2021-02-06 00:13:11', '2021-02-06 00:13:11'),
(14, 2, 'Billboard', '-', 100000, '2021-02-06 00:13:36', '2021-02-06 00:13:36'),
(15, 2, 'Neon Box', '-', 20000, '2021-02-06 00:13:48', '2021-02-06 00:13:48'),
(16, 2, 'Baliho', '-', 20000, '2021-02-06 00:13:59', '2021-02-06 00:13:59'),
(17, 1, 'Vertical Banner', '-', 20000, '2021-02-06 00:34:36', '2021-02-06 00:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `titik_reklame`
--

CREATE TABLE `titik_reklame` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reklame_id` bigint(20) UNSIGNED NOT NULL,
  `lokasi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titik_reklame`
--

INSERT INTO `titik_reklame` (`id`, `reklame_id`, `lokasi`, `created_at`, `updated_at`) VALUES
(2, 10, 'Jln bandara kel. Akehuda', '2021-02-06 00:31:14', '2021-02-06 00:31:14'),
(3, 10, 'Jln hasan esa kel. Takoma', '2021-02-06 00:31:27', '2021-02-06 00:31:27'),
(4, 10, 'Jln sultan jabir syah kel. Gamalama', '2021-02-06 00:31:39', '2021-02-06 00:31:39'),
(5, 10, 'Jln perikanan kel. Manga dua', '2021-02-06 00:31:59', '2021-02-06 00:31:59'),
(6, 11, 'Benteng orens kel.makassar timur', '2021-02-06 00:32:18', '2021-02-06 00:32:18'),
(7, 11, 'Depan hypermat kel.lelong', '2021-02-06 00:32:29', '2021-02-06 00:32:29'),
(8, 9, 'Depan prima kel.santiong', '2021-02-06 00:32:43', '2021-02-06 00:32:50'),
(9, 9, 'Jln yudidarso kel.maliaro', '2021-02-06 00:33:01', '2021-02-06 00:33:01'),
(10, 9, 'Jln hasan esa kel. Takome', '2021-02-06 00:33:11', '2021-02-06 00:33:11'),
(11, 12, 'Jln pantai falajawa kel.Muhajirin', '2021-02-06 00:33:29', '2021-02-06 00:33:29'),
(12, 14, 'Jln Pelabuhan ahmad yani kel. Muhajirin', '2021-02-06 00:33:44', '2021-02-06 00:33:44'),
(13, 15, 'Seputaran kota ternate', '2021-02-06 00:33:55', '2021-02-06 00:33:55'),
(14, 17, 'Seputaran kota ternate', '2021-02-06 00:35:01', '2021-02-06 00:35:01'),
(15, 13, 'Seputaran kota ternate', '2021-02-06 00:35:10', '2021-02-06 00:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_instansi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `nama_lengkap`, `email`, `email_verified_at`, `password`, `remember_token`, `pekerjaan`, `jenis_kelamin`, `nama_instansi`, `no_telp`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(4, '12345', 'Administrator', 'admin@localhost', NULL, '$2y$10$zNxYoYeSWk.tL.uHQ6AlpuN.pGaYwlrxrl9TZ9zW.tqElEMGLTrR2', NULL, NULL, NULL, NULL, '085298239824', NULL, 1, '2021-01-20 01:35:56', '2021-01-20 01:35:56'),
(5, '54321', 'Pengguna', 'petugas@localhost', NULL, '$2y$10$9nKcCCoAnlAufNONB7ZqxO9QpARGkFG6j69ltR3WlLBkSTZ24RuZi', NULL, NULL, NULL, NULL, '085293839283', NULL, 2, '2021-01-20 01:36:42', '2021-01-20 01:36:42'),
(12, '8271022409118822', 'Sadam', 'sadam@gmail.com', NULL, '$2y$10$CVFiQzaGV/eYRy5MZq28xeH2xJt2dPGRHPWeWSRNcKpoldsf8mv2S', NULL, 'PNS', 'L', 'Bank Mandiri', '081244331123', 'Bastiong', 4, '2021-01-20 13:14:07', '2021-01-20 13:16:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori_reklame`
--
ALTER TABLE `kategori_reklame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_user_id_foreign` (`user_id`),
  ADD KEY `pemesanan_reklame_id_foreign` (`reklame_id`),
  ADD KEY `pemesanan_titik_reklame_id_index` (`titik_reklame_id`);

--
-- Indexes for table `reklame`
--
ALTER TABLE `reklame`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reklame_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `titik_reklame`
--
ALTER TABLE `titik_reklame`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titik_reklame_reklame_id_foreign` (`reklame_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_reklame`
--
ALTER TABLE `kategori_reklame`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reklame`
--
ALTER TABLE `reklame`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `titik_reklame`
--
ALTER TABLE `titik_reklame`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_reklame_id_foreign` FOREIGN KEY (`reklame_id`) REFERENCES `reklame` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_titik_reklame_id_foreign` FOREIGN KEY (`titik_reklame_id`) REFERENCES `titik_reklame` (`id`),
  ADD CONSTRAINT `pemesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reklame`
--
ALTER TABLE `reklame`
  ADD CONSTRAINT `reklame_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_reklame` (`id`);

--
-- Constraints for table `titik_reklame`
--
ALTER TABLE `titik_reklame`
  ADD CONSTRAINT `titik_reklame_reklame_id_foreign` FOREIGN KEY (`reklame_id`) REFERENCES `reklame` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
