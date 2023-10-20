-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2023 at 08:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `massage`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `cus_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cus_tel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cus_name`, `cus_tel`, `created_at`, `updated_at`) VALUES
('MS000001', 'chok', '0999999999', '2023-07-10 14:25:32', '2023-07-30 18:13:23'),
('MS000002', 'Noey', '0999999999', '2023-07-11 13:33:43', '2023-07-30 18:13:27'),
('MS000003', 'jin', '0999999999', '2023-07-11 13:55:17', '2023-07-30 18:13:37'),
('MS000004', 'ex', '0999999999', '2023-07-19 12:33:53', '2023-07-30 18:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint NOT NULL,
  `emp_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emp_tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emp_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `emp_tel`, `emp_color`, `created_at`, `updated_at`) VALUES
(2, 'Ton', NULL, '#2e0000', '2023-07-06 12:24:42', '2023-07-30 16:21:53'),
(3, 'Tina', NULL, '#b35f00', '2023-07-10 12:07:19', '2023-07-30 16:22:01'),
(4, 'Deena', NULL, '#6b5d00', '2023-07-10 12:07:49', '2023-07-30 16:22:07'),
(5, 'Maree', NULL, '#0070a8', '2023-07-10 12:08:06', '2023-07-13 12:48:09'),
(6, 'Reeg', NULL, '#092900', '2023-07-10 12:08:21', '2023-07-30 16:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `massages`
--

CREATE TABLE `massages` (
  `id` bigint NOT NULL,
  `massage_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `massage_price` double DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `massages`
--

INSERT INTO `massages` (`id`, `massage_name`, `massage_price`, `created_at`, `updated_at`) VALUES
(2, 'Foot Reflexology Massage (45 mins.)', 208, '2023-07-10 14:05:40', '2023-07-10 14:14:59'),
(3, 'Foot Reflexology Massage (60 mins.', 258, '2023-07-10 14:06:35', '2023-07-10 14:15:04'),
(4, 'Foot Reflexology Massage (90 mins.)', 388, '2023-07-10 14:07:06', '2023-07-10 14:15:10'),
(5, 'Thai Massage (45 mins.)', 258, '2023-07-10 14:08:18', '2023-07-10 14:15:16'),
(6, 'Thai Massage (60 mins.)', 318, '2023-07-10 14:08:30', '2023-07-10 14:15:24'),
(7, 'Thai Massage (90 mins.)', 478, '2023-07-10 14:08:45', '2023-07-10 14:15:30'),
(8, 'Head & Shoulder (20 mins.)', 108, '2023-07-10 14:09:04', '2023-07-10 14:15:36'),
(9, 'Head & Shoulder (20 mins30', 198, '2023-07-10 14:09:34', '2023-07-10 14:09:34'),
(10, 'Aroma oil Massage (45 mins.)', 288, '2023-07-10 14:10:23', '2023-07-10 14:10:23'),
(11, 'Aroma oil Massage (60 mins.)', 348, '2023-07-10 14:10:37', '2023-07-10 14:10:37'),
(12, 'Aroma oil Massage (90 mins.)', 528, '2023-07-10 14:10:52', '2023-07-10 14:10:52'),
(13, 'Lymph Massage (45 mins.)', 368, '2023-07-10 14:11:12', '2023-07-10 14:11:12'),
(14, 'Lymph Massage (60 mins.)', 398, '2023-07-10 14:11:31', '2023-07-10 14:11:31'),
(15, 'Aroma oil Massage (90 mins.)', 598, '2023-07-10 14:11:46', '2023-07-10 14:11:46'),
(16, 'Ladies Massage lnclude Cheat Massages (45 mins.)', 588, '2023-07-10 14:12:12', '2023-07-10 14:12:12'),
(17, '淋巴乳腺胸部護理療程 (20 mins)', 388, '2023-07-10 14:12:54', '2023-07-10 14:13:36'),
(18, '卵巢保健按摩護理療程 (20 mins)', 288, '2023-07-10 14:14:10', '2023-07-10 14:14:10'),
(19, 'Maggentic Fork Madge (20 mins.)', 218, '2023-07-10 14:14:32', '2023-07-10 14:14:32'),
(20, 'Gua Sha Therapy Massager (20 mins.)', 168, '2023-07-10 14:14:52', '2023-07-10 14:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2023_06_22_020925_create_commodity_table', 1),
(57, '2014_10_12_000000_create_users_table', 2),
(58, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(59, '2014_10_12_100000_create_password_resets_table', 2),
(60, '2019_08_19_000000_create_failed_jobs_table', 2),
(61, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(62, '2023_06_22_020925_create_commodities_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('fridaymumu@gmail.com', '$2y$10$FCsGnAh/8x8FwhbNtw57XevpJlq5c5P77PC2kTRGnnvUjagjBbvqq', '2023-06-30 10:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `id` bigint NOT NULL,
  `start_time` datetime NOT NULL,
  `finish_time` datetime NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `massage_id` bigint NOT NULL DEFAULT '0',
  `customer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employee_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`id`, `start_time`, `finish_time`, `content`, `massage_id`, `customer_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(22, '2023-07-10 07:00:00', '2023-07-10 08:00:00', NULL, 11, 'MS000002', 5, '2023-07-13 12:49:50', '2023-07-30 16:01:24'),
(30, '2023-08-24 06:00:00', '2023-08-24 06:30:00', NULL, 2, 'MS000001', 2, '2023-08-24 05:14:10', '2023-08-24 05:14:10'),
(31, '2023-07-31 06:00:00', '2023-07-31 06:30:00', NULL, 2, 'MS000001', 2, '2023-08-24 05:19:24', '2023-08-24 05:19:24'),
(33, '2023-08-24 06:30:00', '2023-08-24 07:30:00', NULL, 2, 'MS000001', 2, '2023-08-24 07:20:56', '2023-08-24 07:15:05'),
(34, '2023-10-20 06:00:00', '2023-10-20 07:00:00', 'ooo', 2, 'MS000001', 2, '2023-10-20 07:54:06', '2023-10-20 07:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'chok', NULL, NULL, '$2y$10$4J4ZR/MkeDJSvXPedNHyNeSrLRotijm.r2r2Kdx4DNT2S66xjGlbG', 1, NULL, '2023-06-30 11:14:57', '2023-06-30 11:14:57'),
(8, 'admin', NULL, NULL, '$2y$10$FAtDprakHyNq9CnMhaZ.L.IrmnRxdFjNprVZyxHW5lDkLaRJaROc.', 1, NULL, '2023-07-19 13:53:21', '2023-07-19 13:53:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `massages`
--
ALTER TABLE `massages`
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
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `massage_id` (`massage_id`);

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `massages`
--
ALTER TABLE `massages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
