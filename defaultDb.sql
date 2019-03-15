-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 06:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grab_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `draws`
--

CREATE TABLE `draws` (
  `id` int(10) UNSIGNED NOT NULL,
  `player_id` int(11) NOT NULL,
  `prize_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2018_12_16_005523_add_type_in_users', 2),
(6, '2018_12_16_033754_create_players_table', 3),
(7, '2018_12_16_034642_create_prizes_table', 3),
(8, '2018_12_16_035019_create_draws_table', 3),
(9, '2018_12_16_040028_create_schedules_table', 3),
(10, '2018_12_16_040514_create_settings_table', 3),
(11, '2018_12_16_041216_rename_draws_user_id', 4),
(12, '2018_12_16_145214_update_schedules_fields', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `draws` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prizes`
--

CREATE TABLE `prizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `prize_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `play_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `prize_id`, `created_at`, `updated_at`, `play_order`) VALUES
(11, 8, '2018-12-19 13:15:01', '2018-12-19 19:24:08', 2018),
(12, 8, '2018-12-19 13:15:35', '2018-12-20 13:46:35', 3300),
(13, 9, '2018-12-19 13:16:37', '2018-12-20 21:03:12', 5995),
(22, 14, '2018-12-19 13:23:16', '2018-12-19 15:59:54', 1111),
(23, 14, '2018-12-19 13:23:27', '2018-12-19 21:04:04', 2611),
(24, 14, '2018-12-19 13:23:37', '2018-12-19 20:11:09', 2255),
(26, 19, '2018-12-19 13:24:32', '2018-12-19 15:38:43', 1000),
(27, 19, '2018-12-19 13:25:48', '2018-12-19 20:59:53', 2399),
(28, 43, '2018-12-19 21:03:47', '2018-12-19 21:20:22', 2500),
(29, 49, '2018-12-19 21:04:27', '2018-12-19 21:04:27', 2777),
(30, 9, '2018-12-19 21:04:51', '2018-12-19 21:38:58', 2606),
(33, 14, '2018-12-19 22:24:00', '2018-12-19 22:26:52', 2840),
(34, 19, '2018-12-20 12:15:20', '2018-12-20 12:15:20', 3200),
(35, 14, '2018-12-20 14:01:24', '2018-12-20 14:07:03', 3377),
(36, 51, '2018-12-20 14:06:27', '2018-12-20 14:06:27', 3400),
(38, 8, '2018-12-20 14:19:08', '2018-12-20 14:37:32', 3666),
(39, 14, '2018-12-20 14:28:13', '2018-12-20 14:28:13', 3555),
(40, 51, '2018-12-20 15:48:45', '2018-12-20 15:48:45', 4088),
(41, 5, '2018-12-20 17:16:54', '2018-12-20 17:21:56', 4700),
(42, 14, '2018-12-20 19:24:43', '2018-12-20 19:37:54', 5522),
(43, 12, '2018-12-20 19:43:16', '2018-12-20 19:43:16', 5660),
(44, 14, '2018-12-20 20:47:57', '2018-12-20 20:47:57', 5912),
(46, 14, '2018-12-20 21:16:29', '2018-12-20 21:16:29', 6099),
(47, 34, '2018-12-20 21:49:06', '2018-12-20 21:49:06', 6300),
(48, 19, '2018-12-20 22:10:41', '2018-12-20 22:10:41', 6444),
(49, 8, '2018-12-20 22:18:18', '2018-12-20 22:25:56', 6540),
(50, 50, '2018-12-21 12:14:23', '2018-12-21 12:14:23', 7100),
(51, 19, '2018-12-21 12:34:06', '2018-12-21 12:34:06', 611),
(52, 14, '2018-12-21 13:06:39', '2018-12-21 13:06:39', 7399),
(53, 47, '2018-12-21 13:51:33', '2018-12-21 13:51:33', 7625),
(54, 14, '2018-12-21 14:36:32', '2018-12-21 14:36:32', 7866),
(55, 19, '2018-12-21 15:05:57', '2018-12-21 15:05:57', 8010),
(57, 14, '2018-12-21 15:44:33', '2018-12-21 15:44:33', 8275),
(58, 51, '2018-12-21 16:02:56', '2018-12-21 16:17:35', 8440),
(59, 9, '2018-12-21 16:40:31', '2018-12-21 16:40:31', 8555),
(61, 14, '2018-12-21 17:24:49', '2018-12-21 17:24:49', 8825),
(62, 48, '2018-12-21 17:43:56', '2018-12-21 17:49:11', 8980),
(63, 51, '2018-12-21 17:57:06', '2018-12-21 17:57:06', 9099),
(64, 19, '2018-12-21 18:19:57', '2018-12-21 18:25:58', 9199),
(65, 14, '2018-12-21 18:32:25', '2018-12-21 18:32:25', 9267),
(66, 8, '2018-12-21 18:47:02', '2018-12-21 19:00:18', 9399),
(68, 47, '2018-12-21 19:47:58', '2018-12-21 19:57:29', 9700),
(69, 14, '2018-12-21 20:10:53', '2018-12-21 20:15:24', 9788),
(70, 34, '2018-12-21 20:11:36', '2018-12-21 20:29:01', 9999),
(71, 14, '2018-12-21 20:58:29', '2018-12-21 20:58:29', 10100),
(72, 46, '2018-12-21 21:49:59', '2018-12-21 21:49:59', 10350),
(73, 14, '2018-12-21 22:21:51', '2018-12-21 22:27:51', 10512),
(74, 48, '2018-12-21 22:34:12', '2018-12-21 22:34:12', 10546),
(75, 19, '2018-12-22 12:09:17', '2018-12-22 12:14:15', 10940),
(76, 14, '2018-12-22 12:33:55', '2018-12-22 12:36:41', 11070),
(77, 51, '2018-12-22 12:51:25', '2018-12-22 12:51:25', 11188),
(78, 48, '2018-12-22 13:35:39', '2018-12-22 13:35:50', 11446),
(80, 47, '2018-12-22 13:59:11', '2018-12-22 14:25:19', 11755),
(81, 48, '2018-12-22 15:23:31', '2018-12-22 15:23:31', 12072),
(82, 51, '2018-12-22 15:31:33', '2018-12-22 15:31:33', 12155),
(83, 48, '2018-12-22 16:08:26', '2018-12-22 16:08:26', 12350),
(84, 50, '2018-12-22 16:48:26', '2018-12-22 16:48:26', 12501),
(85, 48, '2018-12-22 17:55:01', '2018-12-22 17:55:01', 12777),
(86, 8, '2018-12-22 18:06:47', '2018-12-22 18:22:59', 12925),
(87, 49, '2018-12-22 19:17:27', '2018-12-22 19:17:27', 13111),
(88, 48, '2018-12-22 19:56:12', '2018-12-22 19:56:12', 13288),
(89, 19, '2018-12-22 20:10:06', '2018-12-22 20:10:06', 13388),
(90, 48, '2018-12-22 20:28:55', '2018-12-22 20:28:55', 13468),
(91, 48, '2018-12-22 20:54:55', '2018-12-22 20:54:55', 13590),
(93, 49, '2018-12-22 21:29:40', '2018-12-22 21:29:40', 13773),
(94, 48, '2018-12-22 21:50:29', '2018-12-22 21:50:29', 13900),
(95, 41, '2018-12-22 21:54:13', '2018-12-22 21:57:55', 13951),
(97, 34, '2018-12-22 22:17:40', '2018-12-22 22:24:44', 14074),
(98, 14, '2018-12-22 22:49:51', '2018-12-22 22:49:51', 14240),
(99, 48, '2018-12-23 11:49:45', '2018-12-23 11:49:45', 14620),
(100, 8, '2018-12-23 12:08:17', '2018-12-23 12:08:17', 14738),
(101, 14, '2018-12-23 12:24:04', '2018-12-23 12:24:04', 14830),
(102, 48, '2018-12-23 12:29:11', '2018-12-23 12:29:11', 14925),
(103, 14, '2018-12-23 12:44:05', '2018-12-23 12:52:54', 14996),
(105, 9, '2018-12-23 13:20:44', '2018-12-23 13:20:44', 15250),
(106, 48, '2018-12-23 13:56:07', '2018-12-23 13:56:07', 15392),
(107, 43, '2018-12-23 14:08:36', '2018-12-23 14:08:36', 15501),
(109, 48, '2018-12-23 14:38:04', '2018-12-23 14:38:04', 15695),
(110, 8, '2018-12-23 15:08:53', '2018-12-23 15:11:45', 15950),
(111, 48, '2018-12-23 16:00:41', '2018-12-23 16:00:59', 16306),
(112, 40, '2018-12-23 16:16:48', '2018-12-23 16:17:06', 16457),
(114, 48, '2018-12-23 17:07:18', '2018-12-23 18:11:46', 16910),
(116, 47, '2018-12-23 18:20:13', '2018-12-23 18:26:52', 17045),
(118, 73, '2018-12-23 18:45:07', '2018-12-23 18:45:07', 17205),
(119, 48, '2018-12-23 18:56:37', '2018-12-23 18:56:37', 17310),
(121, 14, '2018-12-23 18:58:43', '2018-12-23 18:58:43', 17358),
(123, 49, '2018-12-23 19:26:53', '2018-12-23 19:27:15', 17550),
(125, 14, '2018-12-23 19:32:22', '2018-12-23 19:32:22', 17602),
(126, 12, '2018-12-23 19:34:32', '2018-12-23 19:39:29', 17655),
(127, 34, '2018-12-23 19:54:18', '2018-12-23 20:04:03', 17865),
(128, 8, '2018-12-23 20:16:36', '2018-12-23 20:16:36', 18000),
(131, 48, '2018-12-23 20:44:38', '2018-12-23 20:44:38', 18178),
(132, 10, '2018-12-23 20:49:00', '2018-12-23 20:50:47', 18230),
(133, 14, '2018-12-23 20:53:05', '2018-12-23 20:53:05', 18264),
(134, 49, '2018-12-23 20:58:11', '2018-12-23 20:58:11', 18290),
(135, 35, '2018-12-23 21:33:34', '2018-12-23 21:33:34', 18569),
(136, 48, '2018-12-23 21:47:54', '2018-12-23 21:47:54', 18686);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `fields` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Super Admin', 'yuliantoalfian@gmail.com', NULL, '$2y$10$Feu5TTdT0dmhQRjYtiwdQuv6Jw2W7YMJHHP2N37xnsGl3fa.Zcw1O', 'mE2Zz9FcMRWj1OyoiIh6guDRtH48dAP9KykIb7Rw0nGaZjBAzjPmAqv2zW1X', '2018-12-16 11:06:33', '2018-12-16 11:06:33', 1),
(2, 'Admin Redemption', 'grabarawinda@gmail.com', NULL, '$2y$10$s5Cj7qE7qzDbtO3jYuTwyedSC9giG3fbkGXu4xBQVQWipKnAMKrvW', NULL, '2018-12-16 11:33:49', '2018-12-16 11:33:49', 2),
(3, 'Admin Redemption', 'grabidgreatrewards@gmail.com', NULL, '$2y$10$r5fQvsHehCQspPAipfSCr.fTY37xltm4Gb7PYxdKM.rhAfqgTFX2i', 'FOsqTGCO5foQNqmsymkwjnHXDkSqEvL1udBddnMFKqRWG3bMmxtoTJf9wDh8', '2018-12-18 07:32:04', '2018-12-18 07:32:04', 2),
(4, 'Super Admin', 'johan.tandoko@gmail.com', NULL, '$2y$10$X.sg6zIhPITM0NHELf4LzOMc2dO4fTzqE6fddviQrwFH1QJg4CBdu', 'NB3JPQAl3kL3TlWuFrGGC4Qci4CUgJkOJ8ga8lAKUVD37LGREuHN6mUCA5y5', '2018-12-18 07:34:07', '2018-12-18 07:34:07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `draws`
--
ALTER TABLE `draws`
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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prizes`
--
ALTER TABLE `prizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_fields_unique` (`fields`);

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
-- AUTO_INCREMENT for table `draws`
--
ALTER TABLE `draws`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `prizes`
--
ALTER TABLE `prizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
