-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Aug 24, 2023 at 12:29 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la_interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE `cates` (
  `id` bigint UNSIGNED NOT NULL,
  `cate_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `cate_name`, `image`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Vegitables', 'cates/OTfiCK2Vg1kyjEFDDZR5fLO2JyVIvwgGDEVioYyz.png', 'vegitables', NULL, '2023-08-21 04:04:44', '2023-08-24 11:17:20'),
(2, 'Grocery', 'cates/IJVUpsTegpMif1TeQ41ljmSgsxp6spXBbb0erOTx.png', 'grocery', NULL, '2023-08-21 04:04:51', '2023-08-24 11:17:41'),
(3, 'Fruits', 'cates/3hbMze7L3CSMZlkvOw14IIPa0szxrlsxTvYW35xX.png', 'fruits', NULL, '2023-08-21 04:05:01', '2023-08-24 11:18:15'),
(4, 'Root Vegies', 'cates/J5nXLLefHmyFWRBS8YsPfHIBS4D2tUmpa6rHljk8.png', 'root-vegies', NULL, '2023-08-21 04:44:31', '2023-08-24 11:18:23'),
(5, 'Seasoning', 'cates/wdlmAdcUZYjdD6E0mQ7c9MS4Apw40hHWBTTx8UM9.png', 'seasoning', NULL, '2023-08-21 04:44:55', '2023-08-24 11:18:34');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Nhan Cao', 'nhan-cao', '2023-08-22 07:19:50', '2023-08-22 07:19:50'),
(3, 'David Cao', 'david-cao', '2023-08-22 07:20:56', '2023-08-22 07:20:56'),
(4, 'Edward Cao', 'edward-cao', '2023-08-22 07:23:14', '2023-08-23 06:06:44'),
(6, 'cbum update invoice', 'cbum-update-invoice', '2023-08-22 10:20:40', '2023-08-23 17:05:50'),
(9, 'My Kieu', 'my-kieu', '2023-08-23 09:51:37', '2023-08-23 16:42:28'),
(10, 'NHAN CAO', 'nhan-cao', '2023-08-23 17:07:03', '2023-08-23 17:07:03'),
(11, 'Test Image', 'test-image', '2023-08-24 12:00:44', '2023-08-24 12:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int UNSIGNED NOT NULL DEFAULT '0',
  `cate_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `image`, `slug`, `unit`, `price`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'Amla', 'items/mu0ddGiRx2K4oeKcdRgZnA1qjwp824Z7U20kGBtm.png', 'amla', 'kg', 70, 1, '2023-08-21 05:57:40', '2023-08-24 11:46:22'),
(2, 'Baby Corn', 'items/gulE7Z8lGVjBH5TaS96akeDQBaPb59JBOnypTmEq.png', 'baby-corn', 'kg', 15, 1, '2023-08-21 05:59:00', '2023-08-24 11:46:30'),
(3, 'Tomato', 'items/QahQxM335JhT3ktltb9qVMP24eVVgzKnAnQERhtk.png', 'tomato', 'g', 70, 1, '2023-08-21 06:00:59', '2023-08-24 11:46:37'),
(4, 'Custard Apple', 'items/orx2cyrqpAVksIKXUUVr0Cbg1ZP1T3vCTNxbTYp0.png', 'custard-apple', 'pack', 140, 3, '2023-08-21 06:01:58', '2023-08-24 11:48:19'),
(5, 'Kiwi Green', 'items/EXfUOmOmfreL2fpWHX6gUV1duV2YJbgnrqp2tLVh.png', 'kiwi-green', 'kg', 80, 3, '2023-08-21 06:02:18', '2023-08-24 11:48:27'),
(6, 'Sweet Tamarind', 'items/gpi8xJ19duGIbbOALnxO9TrkfQ9ULq1w1m8Jlp0p.png', 'sweet-tamarind', 'g', 100, 3, '2023-08-21 06:02:36', '2023-08-24 11:48:35'),
(7, 'Pears Green', 'items/iHyGrmCjFXzrVI3mSB26GBvmgrWaOKBgesTRG1x2.png', 'pears-green', 'pcs', 80, 3, '2023-08-21 06:02:57', '2023-08-24 11:48:43'),
(8, 'Banana', 'items/8yj93D1KA0HYwtpKYpJYMadkakZJIUSRXP41sWAq.png', 'banana', 'kg', 25, 3, '2023-08-21 06:03:29', '2023-08-24 11:48:50'),
(9, 'Ginger Indian', 'items/IlVQbxcBA3NWMvrxaB5ZPEcolIMD3blwBatnUaEr.png', 'ginger-indian', 'g', 50, 5, '2023-08-21 06:04:03', '2023-08-24 11:50:06'),
(10, 'Leman', 'items/dZ7pu0evioDX21i1o1hrcAzgiVJ5m8FBDEMPqPsm.png', 'leman', 'kg', 80, 5, '2023-08-21 06:04:21', '2023-08-24 11:50:13'),
(11, 'Carrot Orange', 'items/Bnudl0gumWck5zT5wFRaYBBgPfVxcVlsGNJLlK4i.png', 'carrot-orange', 'g', 30, 4, '2023-08-21 06:04:57', '2023-08-24 11:50:20'),
(12, 'Rice Flour', 'items/W5zQ4LjDeeSIoT2l0WYbSsvBCg7HjhMCF5hfhsUQ.png', 'rice-flour', 'g', 27, 2, '2023-08-21 06:05:43', '2023-08-24 11:50:27'),
(13, 'Dry Fruits', 'items/aAYXy4V25YNlHTr4pVHzFKA4eF8e3DBhVytbrvtg.png', 'dry-fruits', 'kg', 405, 2, '2023-08-21 06:06:05', '2023-08-24 11:50:34'),
(20, 'Onion', 'items/hwK3Kpksu7NDiDLo75D25vulCvXYGeqRbqgCbzkz.png', 'onion', 'kg', 25, 4, '2023-08-24 11:59:00', '2023-08-24 11:59:00'),
(21, 'Potato', 'items/4NpJguHSPUngtOABhbRKsb6xkaLPTuZtUorZ9H5L.png', 'potato', 'kg', 28, 4, '2023-08-24 11:59:21', '2023-08-24 11:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `item_invoices`
--

CREATE TABLE `item_invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `invoice_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `price` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_invoices`
--

INSERT INTO `item_invoices` (`id`, `item_id`, `invoice_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 2, 100, '2023-08-22 07:19:50', '2023-08-22 07:19:50'),
(2, 8, 2, 1, 25, '2023-08-22 07:19:50', '2023-08-22 07:19:50'),
(3, 1, 3, 1, 70, '2023-08-22 07:20:56', '2023-08-22 07:20:56'),
(4, 2, 3, 1, 15, '2023-08-22 07:20:56', '2023-08-22 07:20:56'),
(5, 3, 3, 5, 70, '2023-08-22 07:20:56', '2023-08-22 07:20:56'),
(6, 12, 3, 1, 27, '2023-08-22 07:20:56', '2023-08-22 07:20:56'),
(8, 12, 4, 24, 27, '2023-08-22 07:23:14', '2023-08-23 06:06:44'),
(9, 6, 4, 24, 100, '2023-08-22 07:23:14', '2023-08-23 06:06:44'),
(10, 1, 4, 24, 70, '2023-08-22 07:23:14', '2023-08-23 06:06:44'),
(15, 7, 6, 3, 80, '2023-08-22 10:20:40', '2023-08-23 17:05:50'),
(16, 8, 6, 13, 25, '2023-08-22 10:20:40', '2023-08-23 17:05:50'),
(25, 1, 9, 2, 70, '2023-08-23 09:51:37', '2023-08-23 16:42:28'),
(26, 3, 9, 5, 70, '2023-08-23 09:51:37', '2023-08-23 16:42:28'),
(27, 4, 9, 1, 140, '2023-08-23 09:51:37', '2023-08-23 16:42:28'),
(28, 5, 9, 2, 80, '2023-08-23 09:51:37', '2023-08-23 16:42:28'),
(29, 2, 10, 2, 15, '2023-08-23 17:07:03', '2023-08-23 17:07:03'),
(30, 4, 10, 1, 140, '2023-08-23 17:07:03', '2023-08-23 17:07:03'),
(31, 5, 10, 2, 80, '2023-08-23 17:07:03', '2023-08-23 17:07:03'),
(32, 13, 10, 1, 405, '2023-08-23 17:07:03', '2023-08-23 17:07:03'),
(33, 1, 11, 3, 70, '2023-08-24 12:00:44', '2023-08-24 12:04:41'),
(34, 2, 11, 1, 15, '2023-08-24 12:00:44', '2023-08-24 12:04:41');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_08_20_034417_create_cates_table', 1),
(14, '2023_08_21_031112_rename_category_table_to_cates_table', 1),
(15, '2023_08_21_032218_create_items_table', 2),
(16, '2023_08_21_032244_create_invoices_table', 3),
(17, '2023_08_21_032527_create_item_invoices_table', 3),
(18, '2023_08_24_035130_add_image_column_to_cates', 4),
(19, '2023_08_24_035209_add_image_column_to_items', 4);

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
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$OYAeZYjWsUl7eT8dAiNaKOgOqd4WCYrADLSEclMJdYfyXa5J3RsSa', 'KltzALdYKvzvLvkJfRAPXbr6iIko31ZBGge7nMCR8k6yMsFas5eGewtT6iDK', '2023-08-21 04:04:09', '2023-08-21 04:04:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `item_invoices`
--
ALTER TABLE `item_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_invoices_item_id_foreign` (`item_id`),
  ADD KEY `item_invoices_invoice_id_foreign` (`invoice_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `item_invoices`
--
ALTER TABLE `item_invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_invoices`
--
ALTER TABLE `item_invoices`
  ADD CONSTRAINT `item_invoices_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_invoices_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
