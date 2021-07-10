-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 04:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Obat-obatans'),
(2, 'Vitamin'),
(6, 'Rempah-rempah'),
(7, 'Lainnya'),
(8, 'Minuman'),
(9, 'Makanan');

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
(4, '2021_07_07_115422_create_sessions_table', 1);

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `idkategori` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `idprodusen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `stok`, `harga`, `foto`, `idkategori`, `satuan_id`, `idprodusen`) VALUES
(1, 'Gamat', 1000, '120.000', '', 2, 2, 1),
(4, 'Panadhol', 100, '2000', 'Panadhol.jpg', 6, 2, 4),
(8, 'Parasetamol', 100, '5000', '', 1, 1, 2),
(9, 'Doritos', 100, '10.000', 'Doritos.jpg', 9, 3, 5),
(10, 'Conver', 20, '30.000', 'Conver.png', 2, 2, 2),
(11, 'Kacang Garudes', 12, '20000', '', 9, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `lokasi` varchar(45) NOT NULL,
  `cp` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id`, `nama`, `lokasi`, `cp`, `email`) VALUES
(1, 'Kalbe', 'Bekasi', '08217144667', 'cp@kalbe.com'),
(2, 'Kimia Farma', 'Depok', '021738383', 'kmia@farma.com'),
(4, 'Sanbe Farma', 'Bogor', '01231203', 'sanbe@obat'),
(5, 'Sido nangkring', 'Yogyakarta', '08219391', 'email@sido.com');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `jenis`) VALUES
(1, 'Satuan'),
(2, 'Pack'),
(3, 'Dos'),
(4, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aripin', 'arip19121ti@student.nururlfikri.ac.id', '$2y$10$WjdX3dv3wGd1p2V8ruAJdOF1Llh6nngFiz58NXhy4c7aH8l842vju', NULL, '2021-07-07 07:22:13', '2021-07-07 07:22:13'),
(2, 'Aris', 'ilhamarifin.official@gmail.com', '$2y$10$l261LxctQWACd0GXiOamm.gjxHHHY65rx2lHww.Ev.ILoFtLGQVjC', NULL, '2021-07-09 10:12:01', '2021-07-09 10:12:01'),
(3, 'Ammi Ali', 'abdulmuh@gmail.com', '$2y$10$XF4.eedeqqWYXPgeOH63Pul6im5cLFvljNEP.TlbkiaFQrAp3VcXK', NULL, '2021-07-09 10:13:48', '2021-07-09 10:13:48'),
(4, 'Abdul Hamid', 'hamid@gmail.com', '$2y$10$uwUH//2nJyTnJ22nCqzFyOGFNfmEWfnHsDuL5KGk7uE1LEMUGOYDO', NULL, '2021-07-09 10:21:08', '2021-07-09 10:21:08'),
(5, 'Faisal', 'faisal@gmail.com', '$2y$10$jLSagzLLpTGqzNx0Xkrzq.9f0Xx2DV5j2xbRb4HBsxhgp/POWu9m.', NULL, '2021-07-09 10:23:11', '2021-07-09 10:23:11'),
(6, 'Udin', 'undinsedunia@gmail.com', '$2y$10$Wfvmf0tc5TP9rM2ASWr2UOchJEcKWRUyYmZRnDb/yrlcI3eQ95k4e', NULL, '2021-07-09 10:24:17', '2021-07-09 10:24:17'),
(7, 'Iqbal', 'iqbal@gg.com', '$2y$10$XBEK4IjfUA7K1xLzRxOkNu1BO3CH0jbZ014tvtr8bAvQQW8p0/dZ2', NULL, '2021-07-10 02:37:15', '2021-07-10 02:37:15'),
(8, 'admin', 'admin@admin.com', '$2y$10$RWKdrr6B9eGFDJGWC1Qtk./F7QZcLHNDMKAMlCYMhPje01n8OCIQG', NULL, '2021-07-10 02:54:52', '2021-07-10 02:54:52');

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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk_kategori_idx` (`idkategori`),
  ADD KEY `fk_produk_satuan1_idx` (`satuan_id`),
  ADD KEY `fk_produk_produsen1_idx` (`idprodusen`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_produsen1` FOREIGN KEY (`idprodusen`) REFERENCES `produsen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_satuan1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
