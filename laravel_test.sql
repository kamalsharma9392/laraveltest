-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 06:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=>PENDING,2=>ACTIVE,3=>PAYMENT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `service_id`, `user_id`, `address`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '50 Hagiwara Tea Garden Dr, San Francisco, CA 94118', '2021-03-11 09:00:00', '2021-03-12 09:00:00', '3', '2021-02-18 10:54:00', '2021-02-18 10:41:27'),
(2, 1, 2, '50 Hagiwara Tea Garden Dr, San Francisco, CA 94118', '2021-03-11 09:00:00', '2021-03-12 09:00:00', '1', '2021-02-18 10:54:00', NULL),
(3, 3, 1, '50 Hagiwara Tea Garden Dr, San Francisco, CA 94118', '2021-03-11 09:00:00', '2021-03-12 09:00:00', '1', '2021-02-18 10:54:00', NULL),
(4, 3, 2, '50 Hagiwara Tea Garden Dr, San Francisco, CA 94118', '2021-03-11 09:00:00', '2021-03-12 09:00:00', '1', '2021-02-18 10:54:00', NULL),
(5, 4, 1, '50 Hagiwara Tea Garden Dr, San Francisco, CA 94118', '2021-03-11 09:00:00', '2021-03-12 09:00:00', '1', '2021-02-18 10:54:00', NULL),
(6, 4, 2, '50 Hagiwara Tea Garden Dr, San Francisco, CA 94118', '2021-03-11 09:00:00', '2021-03-12 09:00:00', '1', '2021-02-18 10:54:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Traning', NULL, '2021-02-17 09:34:21', '2021-02-17 09:34:21'),
(3, 'Fitness', 2, '2021-02-17 09:35:23', '2021-02-17 10:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_17_102735_create_services_table', 1),
(5, '2021_02_17_102804_create_bookings_table', 1),
(6, '2021_02_17_103455_create_categories_table', 1),
(7, '2021_02_17_104649_create_service_category', 1);

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `image`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yoga and Pilate Training', 'yoga-and-pilate-training', 'services/uERHLyYHII2vPGdeebm2hfnzU.png', '<!-- wp:paragraph -->\r\n<p> This yoga and pilate training session is designed for all levels of trainees </p>\r\n<!-- /wp:paragraph -->', 80, 1, '2021-02-18 02:10:00', '2021-02-18 05:00:09'),
(3, 'plo r', 'plo-r', 'services/0OTaQtZz3fDPPDMKbP42F1Wk1.png', '<!-- wp:paragraph -->\r\n<p>sdsdxcxsas0000</p>\r\n<!-- /wp:paragraph -->', 0, 1, '2021-02-18 02:20:19', '2021-02-18 02:20:19'),
(4, 'plo rr', 'plo-rr', 'services/eImaJxGvyBffK1q46cu7DaQK6.png', '<!-- wp:paragraph -->\r\n<p>sdsdxcxsas0000</p>\r\n<!-- /wp:paragraph -->', 25, 1, '2021-02-18 02:25:19', '2021-02-18 02:25:19'),
(5, 'plo rr0', 'plo-rr0', 'services/Zjn6uQPQltBO79HCKkPUFFwAc.png', '<!-- wp:paragraph -->\r\n<p>gagan</p>\r\n<!-- /wp:paragraph -->', 83979, 0, '2021-02-18 02:27:33', '2021-02-18 02:36:42'),
(6, 'new in act', 'new-in-act', 'services/iCdWNVmsPIiE96WoBaXcMsP9N.png', '<!-- wp:paragraph -->\r\n<p>by default ibnactive</p>\r\n<!-- /wp:paragraph -->', 5214, 0, '2021-02-18 02:37:31', '2021-02-18 02:38:14'),
(7, 'new check', 'new-check', 'services/jr108ERHx2jMB2gDw8b28W8DM.png', '<!-- wp:paragraph -->\r\n<p>inactive</p>\r\n<!-- /wp:paragraph -->', 13213, 1, '2021-02-18 02:39:51', '2021-02-18 02:39:51'),
(8, 'ga h', 'ga-h', 'services/Mkr4r9jhYKAwjvvsAadlDA6NK.png', '<!-- wp:paragraph -->\r\n<p>test</p>\r\n<!-- /wp:paragraph -->', 25665, 0, '2021-02-18 02:41:53', '2021-02-18 02:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `service_id`, `category_id`) VALUES
(1, 5, 2),
(2, 5, 3),
(3, 6, 3),
(4, 7, 2),
(5, 8, 2),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=>ADMIN,2=>CUSTOMER',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `type`, `email_verified_at`, `password`, `profile_pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ray Pressley', 'Ray', 'raypressley@gmail.com', 2, '2021-02-18 10:49:53', '$2y$10$QIrtTf5CeCF1caVkqTnUqOHu.g8Zthg76bOhhg0kFGj9jHAOGJuUC', 'profile/0OTaQtZz3fDPPDMKbP42F1Wk1.png', NULL, NULL, NULL),
(2, 'Ray Pressley 2', 'Ray1', 'raypressley1@gmail.com', 2, '2021-02-18 10:49:53', '$2y$10$QIrtTf5CeCF1caVkqTnUqOHu.g8Zthg76bOhhg0kFGj9jHAOGJuUC', 'profile/0OTaQtZz3fDPPDMKbP42F1Wk2.png', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_category_service_id_foreign` (`service_id`),
  ADD KEY `service_category_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_category`
--
ALTER TABLE `service_category`
  ADD CONSTRAINT `service_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_category_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
