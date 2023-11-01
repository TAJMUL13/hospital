-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 03:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `nationality_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_archive` int(2) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `location_id`, `category_id`, `nationality_id`, `case_id`, `date`, `time`, `gender`, `age`, `description`, `latitude`, `longitude`, `is_archive`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, '35345', '2020-09-15', '20:24', 'Female', '44', 'dfgdfgd', '44.99999', '55.999999', 1, '2020-09-20 08:21:10', '2020-09-20 10:02:38'),
(2, 2, 1, 1, '3993', '2020-09-15', '10:50', 'Male', '55', 'gdfgdfgdfgdfs dffgdf', '', '', 0, '2020-09-20 08:49:14', '2020-09-20 08:49:14'),
(3, 2, 6, 1, '6456', '2020-09-16', '21:34', 'Male', '25', 'fdgfdgd', '43454', '34534543', 0, '2020-09-20 09:31:59', '2020-09-20 09:31:59'),
(4, 1, 4, 3, '35345', '2020-09-15', '20:24', 'Female', '44', 'gdfhg', '5456.76786', '456465.888', 0, '2020-09-20 09:51:59', '2020-09-20 09:51:59'),
(5, 1, 6, 1, '35345', '2020-09-15', '20:24', 'Female', '44', 'sdasdf', '4345.676', '546456.756', 0, '2020-09-20 09:53:01', '2020-09-20 09:53:01'),
(6, 1, 6, 1, '35345', '2020-09-15', '20:24', 'Female', '44', 'dfgdgfd', '44.787', '4564.567', 0, '2020-09-20 09:53:25', '2020-09-20 09:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority_id` int(10) UNSIGNED NOT NULL,
  `priority_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `priority_id`, `priority_name`, `category_code`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Habijabi', 'KHJJH', 'categroy name5', '2020-09-20 06:54:08', '2020-09-20 07:04:29'),
(3, 2, 'priority', 'AYUC', 'Category name 4', NULL, NULL),
(4, 3, 'priority Name 3', 'THREE', 'Category name 5', NULL, NULL),
(5, 2, 'priority22', 'AYUC 22', 'Category name 42', NULL, NULL),
(6, 3, 'priority Name 3', 'THREE33', 'Category name 53', NULL, NULL),
(7, 2, 'Habijabi', 'YYYY', 'Category name uuy', '2020-09-20 08:46:11', '2020-09-20 08:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `area_name`, `area_code`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'area name44', 'PLKR', '', '', NULL, '2020-09-20 04:52:41'),
(2, 'area name 2', 'YUO', '', '', NULL, NULL),
(3, 'area naother name', 'pkr', '', '', '2020-09-20 04:43:27', '2020-09-20 04:43:27'),
(4, 'name of the', 'HYUI', '', '', '2020-09-20 04:43:48', '2020-09-20 04:43:48'),
(8, 'name', 'name', '8384894.434342', '4834.3443343', '2020-09-20 09:25:43', '2020-09-20 09:27:29');

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2020_09_17_122310_create_sites_table', 1),
(20, '2020_09_17_122425_create_locations_table', 1),
(21, '2020_09_17_122535_create_priorties_table', 1),
(22, '2020_09_17_122612_create_categories_table', 1),
(23, '2020_09_17_123832_create_nationalities_table', 1),
(24, '2020_09_17_123919_create_cases_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BD', 'bangladw6', '2020-09-20 07:13:42', '2020-09-20 07:21:28'),
(3, 'AB', 'Arabican 2', '2020-09-20 08:47:07', '2020-09-20 08:47:22');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'nationality_add', 0, 0),
(2, 'nationality_edit', 0, 0),
(3, 'nationality_delete', 0, 0),
(4, 'nationality_list', 0, 0),
(5, 'location_add', 0, 0),
(6, 'location_edit', 0, 0),
(7, 'location_delete', 0, 0),
(8, 'location_list', 0, 0),
(9, 'priority_add', 0, 0),
(10, 'priority_edit', 0, 0),
(11, 'priority_delete', 0, 0),
(12, 'priority_list', 0, 0),
(13, 'category_add', 0, 0),
(14, 'category_edit', 0, 0),
(15, 'category_delete', 0, 0),
(16, 'category_list', 0, 0),
(17, 'case_add', 0, 0),
(18, 'case_edit', 0, 0),
(19, 'case_delete', 0, 0),
(20, 'case_list', 0, 0),
(21, 'user_add', 0, 0),
(22, 'user_edit', 0, 0),
(23, 'user_delete', 0, 0),
(24, 'user_list', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `priority_code`, `priority_name`, `created_at`, `updated_at`) VALUES
(2, 'HBH', 'Habijabi', '2020-09-20 05:43:12', '2020-09-20 05:43:12'),
(3, 'YIU', 'ANother priority', '2020-09-20 05:43:39', '2020-09-20 05:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `permissions`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tajmul', 'tajmul13@gmail.com', '$2y$10$TNDsh.umBnj/mdaAbIeSFeAirSpueiIujzP99MdLaT8IOQJFg3xkG', NULL, 'a:24:{i:0;s:15:\"nationality_add\";i:1;s:16:\"nationality_edit\";i:2;s:18:\"nationality_delete\";i:3;s:16:\"nationality_list\";i:4;s:12:\"location_add\";i:5;s:13:\"location_edit\";i:6;s:15:\"location_delete\";i:7;s:13:\"location_list\";i:8;s:12:\"priority_add\";i:9;s:13:\"priority_edit\";i:10;s:15:\"priority_delete\";i:11;s:13:\"priority_list\";i:12;s:12:\"category_add\";i:13;s:13:\"category_edit\";i:14;s:15:\"category_delete\";i:15;s:13:\"category_list\";i:16;s:8:\"case_add\";i:17;s:9:\"case_edit\";i:18;s:11:\"case_delete\";i:19;s:9:\"case_list\";i:20;s:8:\"user_add\";i:21;s:9:\"user_edit\";i:22;s:11:\"user_delete\";i:23;s:9:\"user_list\";}', NULL, '2020-09-20 04:21:42', '2020-09-20 18:57:50'),
(2, 'name', 'ami@gmial.com', '123456789', NULL, 'a:20:{i:0;s:15:\"nationality_add\";i:1;s:16:\"nationality_edit\";i:2;s:18:\"nationality_delete\";i:3;s:18:\"nationality_update\";i:4;s:12:\"location_add\";i:5;s:13:\"location_edit\";i:6;s:15:\"location_delete\";i:7;s:15:\"location_update\";i:8;s:12:\"priority_add\";i:9;s:13:\"priority_edit\";i:10;s:15:\"priority_delete\";i:11;s:15:\"priority_update\";i:12;s:12:\"category_add\";i:13;s:13:\"category_edit\";i:14;s:15:\"category_delete\";i:15;s:15:\"category_update\";i:16;s:8:\"case_add\";i:17;s:9:\"case_edit\";i:18;s:11:\"case_delete\";i:19;s:11:\"case_update\";}', NULL, '2020-09-20 10:36:14', '2020-09-20 11:01:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cases_location_id_foreign` (`location_id`),
  ADD KEY `cases_category_id_foreign` (`category_id`),
  ADD KEY `cases_nationality_id_foreign` (`nationality_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_priority_id_foreign` (`priority_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
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
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `cases_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `cases_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
