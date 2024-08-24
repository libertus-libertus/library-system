-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 01:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` char(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Libertus, S.Kom', 'libertus@yahoo.com', '081233621376', 'Glover Trail Apt. 474', '2024-08-22 03:21:13', '2024-08-23 23:39:11'),
(2, 'Jubilee Enterprise', 'carmella.wehner@kuhic.net', '081234529474', '51294 Brekke Garden Port', '2024-08-22 03:21:13', '2024-08-23 23:39:24'),
(3, 'Andrianus, S.Kom.', 'cleveland.hudson@hotmail.com', '081213245828', '3726 Marks HavenMauriciotown', '2024-08-22 03:21:13', '2024-08-23 23:40:02'),
(4, 'Patriani, S.Kom', 'halie.homenick@hotmail.com', '08122311162', '974 Elliot RidgeLake Mylenefort', '2024-08-22 03:21:13', '2024-08-23 23:39:51'),
(6, 'V. Monalisa, S.Kom.', 'mattie01@schneider.info', '081299787739', '9554 Madison Mills Apt. 768', '2024-08-22 03:21:13', '2024-08-23 23:40:34'),
(7, 'Edisius L., S.Kom.', 'rosalind.corkery@damore.com', '081247386659', '3906 Tremblay Spurs Apt. 429', '2024-08-22 03:21:13', '2024-08-23 23:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `isbn` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_publisher_id_foreign` (`publisher_id`),
  KEY `books_author_id_foreign` (`author_id`),
  KEY `books_catalog_id_foreign` (`catalog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(8, 931588674, 'Mahir SQL Server 2008', 2023, 8, 4, 3, 13, 11499, '2024-08-22 03:21:13', '2024-08-23 23:42:34'),
(9, 427301233, 'Membuat Website E-Course Start-Up Dengan Laravel', 2023, 7, 1, 4, 11, 19588, '2024-08-22 03:21:13', '2024-08-23 23:43:10'),
(24, 8738, 'Content Digital Marketing', 2016, 1, 6, 2, 5, 15000, '2024-08-23 23:32:17', '2024-08-23 23:44:55'),
(25, 82739293, 'Buku Pemrograman Website', 2000, 1, 7, 1, 20, 10000, '2024-08-23 23:45:44', '2024-08-23 23:45:44'),
(26, 827382, 'HTML, CSS and JavaScript', 2001, 2, 2, 1, 10, 10000, '2024-08-23 23:46:19', '2024-08-23 23:46:19'),
(27, 9823982, 'Mahir Microsoft Word 2013', 2021, 1, 7, 11, 10, 10000, '2024-08-23 23:47:43', '2024-08-23 23:47:43'),
(28, 922387, 'Belajar Python - Data Scientist', 2021, 8, 3, 10, 10, 12600, '2024-08-23 23:48:31', '2024-08-23 23:48:31'),
(29, 827382, 'Belajar RESTAPI di Laravel', 2022, 8, 1, 4, 12, 15000, '2024-08-23 23:48:48', '2024-08-23 23:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mahir Programming Laravel', '2024-08-22 03:21:13', '2024-08-22 03:21:13'),
(2, 'Social Digital Marketing', '2024-08-22 03:21:13', '2024-08-22 10:31:51'),
(3, 'Belajar Database From Zero to Hero', '2024-08-22 03:21:13', '2024-08-22 03:21:13'),
(4, 'Full-Stack Laravel Developer', '2024-08-22 03:21:13', '2024-08-23 09:26:15'),
(10, 'Data Science', '2024-08-23 23:46:36', '2024-08-23 23:46:36'),
(11, 'Microsoft Offices', '2024-08-23 23:46:46', '2024-08-23 23:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` char(255) NOT NULL,
  `phone_number` char(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Libertus', 'L', '081240347200', '978 Reyna Drive Apt. 330\nPort Arlo, CT 12268', 'libertus@gmail.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(2, 'Geoffrey Ritchie V', 'L', '081250712699', '275 Rowe Trafficway Apt. 949\nPort Keyshawn, SC 11276', 'waters.luther@oberbrunner.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(3, 'Braden Hayes', 'P', '081264024165', '4280 Hane Rue\nNew Adrian, MI 73167-2382', 'ipfeffer@anderson.biz', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(4, 'Cade Lemke', 'L', '081236541063', '150 Tia Island\nWest Josiah, MI 33390', 'ufeeney@gmail.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(5, 'Dr. Alberta Baumbach DDS', 'L', '081213143633', '5502 Strosin Squares\nNorth Landen, NC 97005', 'kmonahan@mertz.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(6, 'Ben Dibbert', 'L', '081227683953', '581 Franecki Square Suite 984\nPort Nathen, SD 45451', 'wintheiser.helen@gmail.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(7, 'Mrs. Danika Mohr', 'L', '081296943431', '3676 Jaden Village Apt. 971\nAngelineton, GA 17431-8478', 'gutkowski.zackary@gmail.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(8, 'Deondre Dickinson', 'P', '081266979374', '9992 Sydni Squares Suite 999\nPort Alexanne, IN 03837', 'gardner.marvin@ullrich.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(9, 'Jannie Kiehn', 'P', '081272565228', '5449 Hahn Rapid Suite 133\nEast Verlie, CT 48979-2044', 'elian12@hyatt.net', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(10, 'Dr. Ryan Kozey DDS', 'P', '081278900272', '413 Aufderhar Forges\nLednerchester, KY 94132', 'blaze.graham@hotmail.com', '2024-08-22 04:59:41', '2024-08-22 04:59:41'),
(12, 'Junaidi', 'L', '0128712191', 'Jakarta', 'june@gmail.com', '2024-08-23 12:29:24', '2024-08-23 12:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_08_21_161948_create_members_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_08_21_162039_create_publishers_table', 1),
(8, '2024_08_21_162049_create_authors_table', 1),
(9, '2024_08_21_162122_create_catalogs_table', 1),
(10, '2024_08_21_162133_create_books_table', 1),
(11, '2024_08_21_162146_create_transactions_table', 1),
(12, '2024_08_21_162156_create_transaction_details_table', 1),
(13, '2024_08_24_110358_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` char(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Erlangga', 'erlangga@yahoo.com', '081235929578', 'Jakarta', '2024-08-22 03:21:13', '2024-08-23 23:35:26'),
(2, 'Depublish', 'depublish@yahoo.com', '081280455117', 'Jakarta Selatan', '2024-08-22 03:21:13', '2024-08-23 23:35:52'),
(7, 'CV Andi', 'cvandi@yahoo.com', '081241915554', 'Yogyakarta', '2024-08-22 03:21:13', '2024-08-23 23:36:21'),
(8, 'Lin Depublish', 'lindepublish@yahoo.com', '081211877608', 'Mentawai', '2024-08-22 03:21:13', '2024-08-23 23:36:58'),
(9, 'Gramedia', 'gramedia@gmail.com', '081212954513', '3551 Lenora CentersNorth Damianport, IN 27874-1846', '2024-08-22 03:21:13', '2024-08-23 23:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_member_id_foreign` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `member_id`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-08-24', '2024-08-28', '2024-08-24 10:01:55', '2024-08-24 10:01:55'),
(2, 2, '2024-08-23', '2024-08-25', '2024-08-24 10:01:55', '2024-08-24 10:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  KEY `transaction_details_book_id_foreign` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `book_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 29, 1, '2024-08-24 10:04:05', '2024-08-24 10:04:05'),
(2, 2, 25, 1, '2024-08-24 10:04:05', '2024-08-24 10:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_member_id_foreign` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `member_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Libertus', 1, 'libertus@gmail.com', NULL, '$2y$10$3hJHRfd2q4L1xRdH33RavOpv.CS7IZoxizqlFO2uFKJ2who0G3mRe', NULL, '2024-08-22 03:39:26', '2024-08-22 03:39:26'),
(2, 'Pengguna Baru', NULL, 'pengguna@gmail.com', NULL, '$2y$10$tNVdpGdEnbxlFrd2re.kde7lRy.fYBgEEd9Z1dfNtzR3R4g9.JuoK', NULL, '2024-08-24 03:49:51', '2024-08-24 03:49:51');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
