-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2024 at 10:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fetdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'logo', '1', 'logo-22.jpg', '2024-01-30 09:41:28', '2024-01-31 02:48:06'),
(2, 'favicon', '1', 'logo.png', '2024-01-31 09:39:36', '2024-01-31 02:48:06'),
(3, 'company', '1', 'đại học tiền giang', '2024-01-31 09:41:58', '2024-01-31 02:48:05'),
(4, 'email', '1', 'email@tgu.edu.vn', '2024-01-31 09:43:11', '2024-01-31 02:48:05'),
(5, 'phone', '1', '0273369698', '2024-01-31 09:43:45', '2024-01-31 02:48:05'),
(6, 'address1', '1', 'Thân Cửu Nghĩa Tiền Giang', '2024-01-31 09:44:12', '2024-01-31 02:48:05'),
(7, 'address2', '1', 'Ấp Bắc', '2024-01-31 09:45:18', '2024-01-31 02:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `active`, `created_at`, `updated_at`, `link`, `stt`) VALUES
(1, 'Giới thiệu', 0, 1, '2024-01-31 02:59:27', '2024-01-31 02:59:27', 'gioithieu.php', 0),
(2, 'Khoa Kỹ thuật Công nghệ', 1, 1, '2024-01-31 02:59:57', '2024-01-31 02:59:57', 'gioithieukktcn.php', 0),
(3, 'Bộ môn Công nghệ thông tin', 1, 1, '2024-01-31 03:00:21', '2024-01-31 03:00:21', 'cnttt.php', 0),
(4, 'Bộ môn Điện-Điện tử', 1, 1, '2024-01-31 03:00:57', '2024-01-31 03:00:57', 'diendientu.php', 0),
(5, 'Bộ môn Xây dựng', 1, 1, '2024-01-31 03:01:22', '2024-01-31 03:01:22', 'xaydung.php', 0),
(6, 'Bộ môn Cơ khí', 1, 1, '2024-01-31 03:01:43', '2024-01-31 03:01:43', 'cokhi.php', 0),
(20, 'Đào tạo', 0, 1, '2024-01-31 03:11:42', '2024-01-31 03:11:42', 'daotao.php', NULL),
(21, 'Chương trình đào tạo', 20, 1, '2024-01-31 03:11:58', '2024-01-31 03:18:45', 'http://fet.test/ctdt', NULL),
(22, 'Chuẩn đầu ra', 20, 1, '2024-01-31 03:12:10', '2024-01-31 03:12:10', 'cdr.php', NULL),
(23, 'Danh mục ngành đào tạo', 20, 1, '2024-01-31 03:12:54', '2024-01-31 03:12:54', 'dmctdt', NULL),
(24, 'Tuyển sinh', 0, 1, '2024-01-31 03:13:16', '2024-01-31 03:13:16', 'tuyensinh.php', NULL),
(25, 'Đại học', 24, 1, '2024-01-31 03:13:33', '2024-01-31 03:13:33', 'daihocts.php', NULL),
(26, 'Vừa học vừa làm', 24, 1, '2024-01-31 03:13:48', '2024-01-31 03:13:48', 'vhvlts.php', NULL),
(27, 'Thạc sỹ', 24, 1, '2024-01-31 03:13:59', '2024-01-31 03:13:59', 'thacsy.php', NULL),
(28, 'Liên kết đào tạo', 24, 1, '2024-01-31 03:14:28', '2024-01-31 03:14:28', 'lkdt.php', NULL),
(29, 'Nghiên cứu khoa học', 0, 1, '2024-01-31 03:15:02', '2024-01-31 03:15:02', 'nckh.php', NULL),
(30, 'Giảng viên', 29, 1, '2024-01-31 03:15:18', '2024-01-31 03:15:18', 'gvnckh.php', NULL),
(31, 'Sinh viên', 29, 1, '2024-01-31 03:15:28', '2024-01-31 03:15:28', 'svnckh.php', NULL),
(32, 'Hội thảo khoa học', 29, 1, '2024-01-31 03:15:45', '2024-01-31 03:15:45', 'htkh.php', NULL),
(33, 'Quy trình - Biểu mẫu', 0, 1, '2024-01-31 03:17:05', '2024-01-31 03:17:05', 'qtbm.php', NULL),
(34, 'Liên hệ', 0, 1, '2024-01-31 03:17:21', '2024-01-31 03:17:21', 'lienhe.php', NULL),
(35, 'Cơ sở Ấp Bắc', 34, 1, '2024-01-31 03:17:48', '2024-01-31 03:17:48', 'ap.php', NULL),
(36, 'Cơ sở Thân Cửu Nghĩa', 34, 1, '2024-01-31 03:18:07', '2024-01-31 03:18:07', 'tcn.php', NULL),
(37, 'Đề cương chi tiết học phần', 33, 1, '2024-01-31 03:20:51', '2024-01-31 03:20:51', 'http://fet.test/dccthp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_30_030321_create_slides_table', 2),
(6, '2024_01_30_034254_create_slides_table', 3),
(7, '2024_01_30_035219_create_menus_table', 4),
(8, '2024_01_30_035406_create_configs_table', 5),
(9, '2024_01_30_035532_create_article_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `content`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Slide-1', 'DHTG-1', '/images/slide/2024/01/31/117174536_2671321256440969_4803184240591724625_n.jpg', 'DHTG', '2024-01-31 02:49:40', '2024-01-31 02:49:40'),
(2, 'Slide-2', 'DHTG-2', '/images/slide/2024/01/31/h1.jpg', 'DHTG-2', '2024-01-31 02:50:16', '2024-01-31 02:50:16'),
(3, 'Slide-3', 'DHTG-3', '/images/slide/2024/01/31/116205323_2671321129774315_4485397927863257425_n.jpg', 'DHTG-3', '2024-01-31 02:50:54', '2024-01-31 02:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@tgu.edu.vn', NULL, '$2y$12$J1S2iXlHmPVEvsz4un7QzuFOURJ.3OierCOTcafvRzbzknU1Ks8c.', NULL, '2024-01-30 02:58:31', '2024-01-30 02:58:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
