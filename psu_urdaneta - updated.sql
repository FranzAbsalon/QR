-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 02:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psu_urdaneta`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `certificate_code` varchar(255) NOT NULL,
  `seminar_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `name`, `email`, `certificate_code`, `seminar_id`, `created_at`, `updated_at`) VALUES
(1, 'Guy Joyner', 'fycazixas@mailinator.com', 'PSU-2023-HltbGg2xLUE4', '1', '2023-01-15 21:49:18', '2023-01-15 21:49:18'),
(2, 'Carol Roth', 'cara@mailinator.com', 'PSU-2023-eUohqjH9NQf5', '1', '2023-01-16 00:03:17', '2023-01-16 00:03:17'),
(3, 'Jorden Thornton', 'hello@email.com', 'PSU-2023-PcaVyGbVd9Jx', '2', '2023-01-16 00:21:43', '2023-01-16 00:21:43'),
(4, 'Josh Smith', 'joshuayaacoub33@gmail.com', 'PSU-2023-z6wTdO3IIClH', '2', '2023-01-16 02:34:15', '2023-01-16 02:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `download_logs`
--

CREATE TABLE `download_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `download_logs`
--

INSERT INTO `download_logs` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-01-15 21:50:04', '2023-01-15 21:50:04'),
(2, 2, '2023-01-15 22:04:46', '2023-01-15 22:04:46'),
(3, 1, '2023-01-15 23:51:34', '2023-01-15 23:51:34'),
(4, 1, '2023-01-16 00:03:24', '2023-01-16 00:03:24'),
(5, 1, '2023-01-16 00:05:08', '2023-01-16 00:05:08'),
(6, 1, '2023-01-16 00:09:09', '2023-01-16 00:09:09'),
(7, 1, '2023-01-16 00:12:13', '2023-01-16 00:12:13'),
(8, 1, '2023-01-16 00:13:53', '2023-01-16 00:13:53'),
(9, 1, '2023-01-16 00:14:27', '2023-01-16 00:14:27'),
(10, 1, '2023-01-16 00:15:59', '2023-01-16 00:15:59'),
(11, 1, '2023-01-16 00:21:46', '2023-01-16 00:21:46'),
(12, 1, '2023-01-16 00:28:36', '2023-01-16 00:28:36'),
(13, 1, '2023-01-16 00:29:09', '2023-01-16 00:29:09'),
(14, 1, '2023-01-16 00:30:20', '2023-01-16 00:30:20'),
(15, 1, '2023-01-16 00:33:28', '2023-01-16 00:33:28'),
(16, 1, '2023-01-16 00:56:24', '2023-01-16 00:56:24'),
(17, 1, '2023-01-16 00:56:42', '2023-01-16 00:56:42'),
(18, 1, '2023-01-16 01:14:20', '2023-01-16 01:14:20'),
(19, 1, '2023-01-16 01:16:18', '2023-01-16 01:16:18'),
(20, 1, '2023-01-16 01:17:37', '2023-01-16 01:17:37'),
(21, 1, '2023-01-16 01:18:01', '2023-01-16 01:18:01'),
(22, 1, '2023-01-16 01:18:14', '2023-01-16 01:18:14'),
(23, 1, '2023-01-16 01:20:44', '2023-01-16 01:20:44'),
(24, 1, '2023-01-16 02:08:16', '2023-01-16 02:08:16'),
(25, 1, '2023-01-16 02:09:17', '2023-01-16 02:09:17'),
(26, 1, '2023-01-16 02:10:03', '2023-01-16 02:10:03'),
(27, 1, '2023-01-16 02:11:42', '2023-01-16 02:11:42'),
(28, 1, '2023-01-16 02:11:49', '2023-01-16 02:11:49'),
(29, 1, '2023-01-16 02:12:09', '2023-01-16 02:12:09'),
(30, 1, '2023-01-16 02:13:23', '2023-01-16 02:13:23'),
(31, 1, '2023-01-16 02:14:29', '2023-01-16 02:14:29'),
(32, 1, '2023-01-16 02:14:42', '2023-01-16 02:14:42'),
(33, 1, '2023-01-16 02:15:37', '2023-01-16 02:15:37'),
(34, 1, '2023-01-16 02:15:53', '2023-01-16 02:15:53'),
(35, 1, '2023-01-16 03:00:28', '2023-01-16 03:00:28'),
(36, 2, '2023-01-16 03:15:02', '2023-01-16 03:15:02'),
(37, 2, '2023-01-16 03:57:52', '2023-01-16 03:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_17_061607_create_seminar_table', 1),
(6, '2023_01_16_042347_create_download_logs_table', 1),
(7, '2023_01_16_050029_certificate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `start` datetime NOT NULL,
  `university` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `signature_no` int(11) NOT NULL,
  `signature1` varchar(255) DEFAULT NULL,
  `signature2` varchar(255) DEFAULT NULL,
  `end` datetime NOT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `name`, `number`, `start`, `university`, `certificate`, `address`, `logo`, `template`, `signature_no`, `signature1`, `signature2`, `end`, `venue`, `created_at`, `updated_at`) VALUES
(2, 'Jorden Thornton', NULL, '2023-01-05 00:00:00', 'Coleman Aguilar Trading', 'Est non ipsum magna', 'Incididunt quia non', '1673857275.png', '1673857275.jpg', 1, '1673857275.png', NULL, '2023-02-02 00:00:00', NULL, '2023-01-16 00:21:16', '2023-01-16 00:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, 1, '$2y$10$s1KYi0IzysvF1TYT8bDuNuoFgB9sIQiWAL0nX.HLSNH7i5NRkpvuC', NULL, '2023-01-15 21:48:25', '2023-01-15 21:48:25'),
(2, 'Charles Austin', 'dahokubuz@mailinator.com', NULL, 0, '$2y$10$WrjHjZ/F9sBclk1DY4mJi.XuOjp7GDXDdcrgDrV6MYhrOlqeWdI0C', NULL, '2023-01-15 21:49:46', '2023-01-15 21:49:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificate_email_unique` (`email`),
  ADD UNIQUE KEY `certificate_certificate_code_unique` (`certificate_code`);

--
-- Indexes for table `download_logs`
--
ALTER TABLE `download_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
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
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `download_logs`
--
ALTER TABLE `download_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `download_logs`
--
ALTER TABLE `download_logs`
  ADD CONSTRAINT `download_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
