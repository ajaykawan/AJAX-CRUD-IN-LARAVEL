-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 01:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

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
(3, '2017_06_19_095943_create_tests_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$GetdJSq5ZVULdADbJKA88.NHcU2Jc/SOoUSOP09xCSIzBh/wTCjAm', '2017-06-14 04:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manchester united takes over barcelona', '<p><strong>Manchester united takes over barcelona</strong></p>\r\n\r\n<p>Manchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelona</p>', NULL, NULL, '2017-06-20 04:20:27', '2017-06-20 04:20:27'),
(2, 'Manchester united takes over barcelona', '<p>Manchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelona</p>', NULL, NULL, '2017-06-20 04:24:32', '2017-06-20 04:24:32'),
(3, 'hello', NULL, NULL, NULL, '2017-06-20 04:44:48', '2017-06-20 04:44:48'),
(4, 'Manchester united takes over barcelona', '<p>dataTables.bootstrap.cssdataTables.bootstrap.cssdataTables.bootstrap.cssdataTables.bootstrap.css</p>', NULL, NULL, '2017-06-20 04:50:41', '2017-06-20 04:50:41'),
(5, 'Manchester united takes over barcelona', '<p>dsadsad</p>', NULL, NULL, '2017-06-20 04:52:18', '2017-06-20 04:52:18'),
(6, 'Manchester united takes over barcelona', '<p>dsadsad</p>', NULL, NULL, '2017-06-20 04:52:44', '2017-06-20 04:52:44'),
(7, 'Manchester united takes over barcelona', '<p>dsadsad</p>', NULL, NULL, '2017-06-20 04:53:38', '2017-06-20 04:53:38'),
(8, 'Manchester united takes over barcelona', '<p>Manchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelona</p>', NULL, NULL, '2017-06-21 03:21:41', '2017-06-21 03:21:41'),
(9, 'Manchester united takes over barcelona', '<p>this is desc</p>', NULL, NULL, '2017-06-21 03:26:52', '2017-06-21 03:26:52'),
(10, 'Manchester united takes over barcelona', '<p>Manchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelonaManchester united takes over barcelona</p>', NULL, NULL, '2017-06-21 03:27:31', '2017-06-21 03:27:31'),
(11, 'title', '<p>titletitletitletitletitletitletitle</p>', NULL, NULL, '2017-06-21 03:28:26', '2017-06-21 03:28:26'),
(12, 'Manchester united takes over barcelona', '<p>adsfdsfsdfsd</p>', NULL, 1, '2017-06-21 03:37:02', '2017-06-21 03:37:02'),
(13, 'Manchester united takes over barcelona', '<p>adsfdsfsdfsd</p>', NULL, 1, '2017-06-21 03:37:30', '2017-06-21 03:37:30'),
(14, 'Manchester united takes over barcelona', '<p>adsfdsfsdfsd</p>', NULL, 1, '2017-06-21 03:37:31', '2017-06-21 03:37:31'),
(15, 'Manchester united takes over barcelona', '<p>test</p>', NULL, 1, '2017-06-21 03:38:09', '2017-06-21 03:38:09'),
(16, 'Manchester united takes over barcelona', '<p>test</p>', NULL, 0, '2017-06-21 03:39:16', '2017-06-21 03:39:16'),
(17, 'Manchester united takes over barcelona', '<p>test</p>', NULL, 0, '2017-06-21 03:39:49', '2017-06-21 03:39:49'),
(18, 'Manchester united takes over barcelona', '<pre>\r\n#TestInsert</pre>\r\n\r\n<pre>\r\n#TestInsert</pre>\r\n\r\n<pre>\r\n#TestInsert</pre>\r\n\r\n<pre>\r\n#TestInsert</pre>', NULL, 0, '2017-06-21 03:40:04', '2017-06-21 03:40:04'),
(19, 'Manchester united takes over barcelona', '<p>casd</p>', NULL, 0, '2017-06-21 03:43:47', '2017-06-21 03:43:47'),
(20, 'Manchester united takes over barcelona', '<p>asddas</p>', NULL, 1, '2017-06-21 03:44:52', '2017-06-21 03:44:52'),
(21, 'Manchester united takes over barcelona', 'dsadsadsa', NULL, 1, '2017-06-21 03:45:35', '2017-06-21 03:45:35'),
(22, 'fcbghdfgh', 'asa', NULL, NULL, '2017-06-21 03:46:25', '2017-06-21 03:46:25'),
(23, 'Test', '<p>TestTestTestTestTestTestTest<br></p>', NULL, 1, '2017-06-21 03:51:24', '2017-06-21 03:51:24'),
(24, 'Manchester united takes over barcelona', '<p>sdsadas</p>', NULL, 1, '2017-06-21 04:15:29', '2017-06-21 04:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$w5RHIsXGwdv3nJqCNqYt/OsaweLyakF7Ihhjj5RY3PHuyYMYkfyEG', '8tZ8dvLGl3hDnPwrir0ijJ4mrmi4UE9pN6f3fRN7Do8Ra7UNivdudJNaLqUL', '2017-06-13 04:30:26', '2017-06-13 04:30:26'),
(2, 'Abin', 'abin@prabidhiacademy.com', '$2y$10$wwcGNe2/BV1fF8sCEKuVXu8ViSY6uahtMBSSZG0MOi/JjLwwJOyRK', '4DWovJEd6ywLVzZvXOioRMBLqmDCcpvvhlHrRHDVr1c113lCSsXpq0R8wNeB', '2017-06-14 03:04:24', '2017-06-14 03:04:24');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tests`
--
ALTER TABLE `tests`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
