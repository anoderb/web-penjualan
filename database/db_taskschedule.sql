-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 08:55 AM
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
-- Database: `db_taskschedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('rikidavidtra.2310@gmail.com|127.0.0.1', 'i:2;', 1716178191),
('rikidavidtra.2310@gmail.com|127.0.0.1:timer', 'i:1716178191;', 1716178191);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('86iRdT9t3u9Ih1T1q4xJgN68A66TnZ3Z5Q919daM', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaFZwQWFQb3FwbEJEUERjQnFSMFdkZ1BJdHEwdkMxRVhoVmREeUNmaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MTc3MzUzMTk7fX0=', 1717742783),
('DgDjI5HdlP2yH2LG1A1NY2ch8FKOkYpoOjraM3ur', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEZTdnRmVlFtRFQ5VENEMHE2MGhMZWJkRWp4ekNpY2RFOUVTaVVlMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1717734494);

-- --------------------------------------------------------

--
-- Table structure for table `tb_accessmenus`
--

CREATE TABLE `tb_accessmenus` (
  `id_accessmenu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` text DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_firstmenu` int(11) DEFAULT NULL,
  `id_secondmenu` int(11) DEFAULT NULL,
  `id_thirdmenu` int(11) DEFAULT NULL,
  `id_fourthmenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_accessmenus`
--

INSERT INTO `tb_accessmenus` (`id_accessmenu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `id_level`, `id_firstmenu`, `id_secondmenu`, `id_thirdmenu`, `id_fourthmenu`) VALUES
(152, '2024-05-21 06:31:36', '2024-05-21 06:31:36', 'Coordinator', NULL, NULL, 2, 1, 1, NULL, NULL),
(153, '2024-05-21 06:31:36', '2024-05-21 06:31:36', 'Coordinator', NULL, NULL, 2, 16, 22, NULL, NULL),
(154, '2024-05-21 06:31:36', '2024-05-21 06:31:36', 'Coordinator', NULL, NULL, 2, 16, 25, NULL, NULL),
(155, '2024-05-21 06:31:36', '2024-05-21 06:31:36', 'Coordinator', NULL, NULL, 2, 16, 23, NULL, NULL),
(156, '2024-05-21 06:31:36', '2024-05-21 06:31:36', 'Coordinator', NULL, NULL, 2, 19, NULL, NULL, NULL),
(157, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 1, 1, NULL, NULL),
(158, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 16, 24, 15, NULL),
(159, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 16, 24, 16, NULL),
(160, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 16, 24, 14, NULL),
(161, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 16, 22, NULL, NULL),
(162, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 16, 25, NULL, NULL),
(163, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 16, 23, NULL, NULL),
(164, '2024-05-23 03:47:06', '2024-05-23 03:47:06', 'Coordinator', NULL, NULL, 1, 19, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_levels`
--

CREATE TABLE `tb_levels` (
  `id_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` text DEFAULT NULL,
  `level_name` varchar(255) DEFAULT NULL,
  `create` bit(1) DEFAULT NULL,
  `read` bit(1) DEFAULT NULL,
  `update` bit(1) DEFAULT NULL,
  `delete` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_levels`
--

INSERT INTO `tb_levels` (`id_level`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `level_name`, `create`, `read`, `update`, `delete`) VALUES
(1, NULL, '2024-06-07 02:52:52', NULL, 'Riki', NULL, 'Coordinator', b'1', b'1', b'1', b'1'),
(2, NULL, '2024-06-07 02:52:48', NULL, 'Riki', NULL, 'Support', b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menufirsts`
--

CREATE TABLE `tb_menufirsts` (
  `id_firstmenu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` text DEFAULT NULL,
  `firstmenu_name` varchar(255) DEFAULT NULL,
  `firstmenu_link` varchar(255) DEFAULT NULL,
  `firstmenu_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menufirsts`
--

INSERT INTO `tb_menufirsts` (`id_firstmenu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `firstmenu_name`, `firstmenu_link`, `firstmenu_icon`) VALUES
(1, NULL, '2024-05-20 04:24:34', NULL, 'David', NULL, 'Dashboards', '#', 'feather icon-home'),
(16, '2024-05-20 04:24:54', NULL, 'David', NULL, NULL, 'Masters', '#', 'feather icon-layers'),
(19, '2024-05-20 04:39:43', '2024-05-20 04:45:47', 'David', 'David', NULL, 'Task Schedule', 'taskschedule', 'feather icon-calendar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menufourths`
--

CREATE TABLE `tb_menufourths` (
  `id_fourthmenu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` text DEFAULT NULL,
  `fourthmenu_name` varchar(255) DEFAULT NULL,
  `fourthmenu_link` varchar(255) DEFAULT NULL,
  `fourthmenu_icon` varchar(255) DEFAULT NULL,
  `id_thirdmenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menuseconds`
--

CREATE TABLE `tb_menuseconds` (
  `id_secondmenu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` text DEFAULT NULL,
  `secondmenu_name` varchar(255) DEFAULT NULL,
  `secondmenu_link` varchar(255) DEFAULT NULL,
  `secondmenu_icon` varchar(255) DEFAULT NULL,
  `id_firstmenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menuseconds`
--

INSERT INTO `tb_menuseconds` (`id_secondmenu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `secondmenu_name`, `secondmenu_link`, `secondmenu_icon`, `id_firstmenu`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'Analytics', 'home', 'feather icon-activity', 1),
(22, '2024-05-20 15:06:53', '2024-05-20 15:09:49', 'David', 'David', NULL, 'Module', 'module', 'feather icon-book-open', 16),
(23, '2024-05-21 03:46:17', '2024-05-21 03:48:36', 'David', 'David', NULL, 'Status', 'status', 'feather icon-git-branch', 16),
(24, '2024-05-21 03:55:17', '2024-05-21 03:59:12', 'David', 'David', NULL, 'Applications', '#', 'feather icon-grid', 16),
(25, '2024-05-21 06:31:15', NULL, 'Coordinator', NULL, NULL, 'Program', 'program', 'feather icon-github', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menuthirds`
--

CREATE TABLE `tb_menuthirds` (
  `id_thirdmenu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` text DEFAULT NULL,
  `thirdmenu_name` varchar(255) DEFAULT NULL,
  `thirdmenu_link` varchar(255) DEFAULT NULL,
  `thirdmenu_icon` varchar(255) DEFAULT NULL,
  `id_secondmenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menuthirds`
--

INSERT INTO `tb_menuthirds` (`id_thirdmenu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `thirdmenu_name`, `thirdmenu_link`, `thirdmenu_icon`, `id_secondmenu`) VALUES
(14, '2024-05-21 03:55:53', NULL, 'David', NULL, NULL, 'User', 'user', 'feather icon-user', 24),
(15, '2024-05-21 03:56:15', NULL, 'David', NULL, NULL, 'Level', 'level', 'feather icon-pocket', 24),
(16, '2024-05-21 03:56:41', NULL, 'David', NULL, NULL, 'Menu', 'menu', 'feather icon-menu', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_modules`
--

CREATE TABLE `tb_modules` (
  `id_module` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` varchar(255) DEFAULT NULL,
  `module_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_modules`
--

INSERT INTO `tb_modules` (`id_module`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `module_name`) VALUES
(1, '2024-05-20 15:19:03', '2024-05-20 15:19:16', 'David', 'David', NULL, 'Beranda'),
(8, '2024-05-21 02:13:04', '2024-05-21 02:13:04', 'David', NULL, NULL, 'IDM'),
(9, '2024-05-23 04:07:41', '2024-05-23 04:07:41', 'David', NULL, NULL, 'Lahan Desa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_programs`
--

CREATE TABLE `tb_programs` (
  `id_program` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` varchar(255) DEFAULT NULL,
  `program_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_programs`
--

INSERT INTO `tb_programs` (`id_program`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `program_name`) VALUES
(9, '2024-05-21 06:31:46', '2024-05-21 06:32:02', 'Coordinator', 'Coordinator', NULL, 'PRM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statuses`
--

CREATE TABLE `tb_statuses` (
  `id_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` varchar(255) DEFAULT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_statuses`
--

INSERT INTO `tb_statuses` (`id_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `status_name`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'On-Progress'),
(2, NULL, NULL, NULL, NULL, NULL, 'Done'),
(3, NULL, NULL, NULL, NULL, NULL, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_taskschedules`
--

CREATE TABLE `tb_taskschedules` (
  `id_taskschedule` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` varchar(255) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `change_model` int(11) DEFAULT NULL,
  `change_controller` int(11) DEFAULT NULL,
  `change_view` int(11) DEFAULT NULL,
  `change_database` int(11) DEFAULT NULL,
  `change_assets` int(11) DEFAULT NULL,
  `change_others` int(11) DEFAULT NULL,
  `desc_model` varchar(255) DEFAULT NULL,
  `desc_controller` varchar(255) DEFAULT NULL,
  `desc_view` varchar(255) DEFAULT NULL,
  `desc_database` varchar(255) DEFAULT NULL,
  `desc_assets` varchar(255) DEFAULT NULL,
  `desc_others` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_taskschedules`
--

INSERT INTO `tb_taskschedules` (`id_taskschedule`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `id_module`, `description`, `id_status`, `change_model`, `change_controller`, `change_view`, `change_database`, `change_assets`, `change_others`, `desc_model`, `desc_controller`, `desc_view`, `desc_database`, `desc_assets`, `desc_others`, `id_user`, `id_program`, `deadline`, `image1`, `image2`, `image3`, `image4`) VALUES
(24, '2024-05-28 16:35:18', '2024-05-28 16:35:18', 'David', NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, '2024-06-04', '1716914118_doraemon.jpg', NULL, NULL, NULL),
(25, '2024-05-28 16:39:19', '2024-05-28 16:42:34', 'David', 'Riki', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 9, '2024-06-04', '1716914359_flower-colorfull.jpg', '1716914554_dorami.jpg', NULL, NULL),
(26, '2024-06-07 02:54:02', '2024-06-07 02:55:13', 'Riki', 'David', NULL, 8, '21313 312 313213213123 1 231312', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 9, '2024-06-14', '1717728842_doraemon.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `activity_log` text DEFAULT NULL,
  `id_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`, `activity_log`, `id_level`) VALUES
(1, 'Riki', 'riki@gmail.com', NULL, '$2y$12$T2RhnRqFxNj2lXWTxt.W9utoyjUtl8yosp7Iibjff6gHSxt0YdlJK', NULL, '2024-05-20 04:09:36', '2024-05-20 04:09:36', NULL, NULL, NULL, '1'),
(2, 'David', 'david@gmail.com', NULL, '$2y$12$T2RhnRqFxNj2lXWTxt.W9utoyjUtl8yosp7Iibjff6gHSxt0YdlJK', NULL, '2024-05-20 04:09:36', '2024-05-20 04:09:36', NULL, NULL, NULL, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`) USING BTREE;

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `jobs_queue_index` (`queue`) USING BTREE;

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sessions_user_id_index` (`user_id`) USING BTREE,
  ADD KEY `sessions_last_activity_index` (`last_activity`) USING BTREE;

--
-- Indexes for table `tb_accessmenus`
--
ALTER TABLE `tb_accessmenus`
  ADD PRIMARY KEY (`id_accessmenu`) USING BTREE,
  ADD KEY `fkey_id_level_tb_accessmenus` (`id_level`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`id_category`) USING BTREE;

--
-- Indexes for table `tb_levels`
--
ALTER TABLE `tb_levels`
  ADD PRIMARY KEY (`id_level`) USING BTREE;

--
-- Indexes for table `tb_menufirsts`
--
ALTER TABLE `tb_menufirsts`
  ADD PRIMARY KEY (`id_firstmenu`) USING BTREE;

--
-- Indexes for table `tb_menufourths`
--
ALTER TABLE `tb_menufourths`
  ADD PRIMARY KEY (`id_fourthmenu`) USING BTREE,
  ADD KEY `fkey_id_thirdmenu_tb_menufourths` (`id_thirdmenu`);

--
-- Indexes for table `tb_menuseconds`
--
ALTER TABLE `tb_menuseconds`
  ADD PRIMARY KEY (`id_secondmenu`) USING BTREE,
  ADD KEY `fkey_id_firstmenu_tb_menuseconds` (`id_firstmenu`);

--
-- Indexes for table `tb_menuthirds`
--
ALTER TABLE `tb_menuthirds`
  ADD PRIMARY KEY (`id_thirdmenu`) USING BTREE,
  ADD KEY `fkey_id_secondmenu_tb_menuthirds` (`id_secondmenu`);

--
-- Indexes for table `tb_modules`
--
ALTER TABLE `tb_modules`
  ADD PRIMARY KEY (`id_module`) USING BTREE;

--
-- Indexes for table `tb_programs`
--
ALTER TABLE `tb_programs`
  ADD PRIMARY KEY (`id_program`) USING BTREE;

--
-- Indexes for table `tb_statuses`
--
ALTER TABLE `tb_statuses`
  ADD PRIMARY KEY (`id_status`) USING BTREE;

--
-- Indexes for table `tb_taskschedules`
--
ALTER TABLE `tb_taskschedules`
  ADD PRIMARY KEY (`id_taskschedule`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_accessmenus`
--
ALTER TABLE `tb_accessmenus`
  MODIFY `id_accessmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_levels`
--
ALTER TABLE `tb_levels`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_menufirsts`
--
ALTER TABLE `tb_menufirsts`
  MODIFY `id_firstmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_menufourths`
--
ALTER TABLE `tb_menufourths`
  MODIFY `id_fourthmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_menuseconds`
--
ALTER TABLE `tb_menuseconds`
  MODIFY `id_secondmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_menuthirds`
--
ALTER TABLE `tb_menuthirds`
  MODIFY `id_thirdmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_modules`
--
ALTER TABLE `tb_modules`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_programs`
--
ALTER TABLE `tb_programs`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_statuses`
--
ALTER TABLE `tb_statuses`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_taskschedules`
--
ALTER TABLE `tb_taskschedules`
  MODIFY `id_taskschedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_accessmenus`
--
ALTER TABLE `tb_accessmenus`
  ADD CONSTRAINT `fkey_id_level_tb_accessmenus` FOREIGN KEY (`id_level`) REFERENCES `tb_levels` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_menufourths`
--
ALTER TABLE `tb_menufourths`
  ADD CONSTRAINT `fkey_id_thirdmenu_tb_menufourths` FOREIGN KEY (`id_thirdmenu`) REFERENCES `tb_menuthirds` (`id_thirdmenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_menuseconds`
--
ALTER TABLE `tb_menuseconds`
  ADD CONSTRAINT `fkey_id_firstmenu_tb_menuseconds` FOREIGN KEY (`id_firstmenu`) REFERENCES `tb_menufirsts` (`id_firstmenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_menuthirds`
--
ALTER TABLE `tb_menuthirds`
  ADD CONSTRAINT `fkey_id_secondmenu_tb_menuthirds` FOREIGN KEY (`id_secondmenu`) REFERENCES `tb_menuseconds` (`id_secondmenu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
