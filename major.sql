-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 10:44 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `major`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'badal', 'badal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `proposal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `created_at`, `updated_at`, `user_id`, `jobs_id`, `price`, `proposal`, `status`, `time`) VALUES
(1, '2019-05-20 10:05:35', '2019-05-20 14:39:56', 1, 1, 19, 'bana dunga', 2, 10),
(2, '2019-05-20 14:43:44', '2019-05-26 07:42:49', 1, 2, 11, 'its a bid', 2, 11),
(3, '2019-05-24 02:16:18', '2019-05-26 09:15:33', 1, 3, 12, 'i can do that', 2, 20),
(15, '2019-06-04 10:53:13', '2019-06-06 03:37:06', 1, 15, 12, 'i  will do this', 2, 11),
(17, '2019-07-17 00:12:27', '2019-07-17 01:01:08', 1, 18, 8, 'i can make that', 0, 1),
(18, '2019-07-17 00:36:59', '2019-07-17 00:36:59', 1, 16, 30, 'i will make the best php project', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `maxMoney` int(11) NOT NULL,
  `maxDays` int(11) NOT NULL,
  `linkToReferenceProject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignedTo` int(11) DEFAULT NULL,
  `final_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `body`, `created_at`, `updated_at`, `description`, `status`, `maxMoney`, `maxDays`, `linkToReferenceProject`, `assignedTo`, `final_link`, `report`) VALUES
(1, 2, 'Perfect job', '2019-05-20 10:02:33', '2019-05-20 14:39:56', 'The perfect job description for the perfect job', 2, 20, 12, 'https://google.com?q=potty', 1, 'lul', NULL),
(2, 2, 'Some project', '2019-05-20 14:37:21', '2019-05-26 07:42:49', 'Its a fun project', 2, 20, 12, 'http://www.google.com', 1, 'good day', NULL),
(3, 2, 'Random Job', '2019-05-24 02:15:17', '2019-05-26 09:15:33', 'Its a random job', 2, 20, 12, 'google.com', 1, 'wallah', NULL),
(15, 2, 'A react Project', '2019-06-04 10:52:43', '2019-06-06 03:37:06', 'I am a react project', 2, 23, 20, 'aaa', 1, 'aaaa', NULL),
(16, 2, 'php project', '2019-06-04 10:53:58', '2019-06-04 10:53:58', 'I am a php project', 1, 44, 11, '1', NULL, NULL, NULL),
(18, 2, 'A Css Project', '2019-06-20 02:35:39', '2019-07-17 01:01:08', 'Its a Css project, you need to make changes to an existing project.\nFake requiements', 0, 10, 2, 'http://google.com', 1, NULL, NULL),
(19, 2, 'e commerce', '2019-07-17 00:01:52', '2019-07-17 00:01:52', 'website to sell mangos', 1, 10, 10, 'https://amazon.in', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `skills_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`id`, `jobs_id`, `skills_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-05-20 14:37:21', '2019-05-20 14:37:21'),
(2, 2, 3, '2019-05-20 14:37:21', '2019-05-20 14:37:21'),
(3, 3, 1, '2019-05-24 02:15:17', '2019-05-24 02:15:17'),
(4, 3, 3, '2019-05-24 02:15:18', '2019-05-24 02:15:18'),
(21, 15, 1, '2019-06-04 10:52:43', '2019-06-04 10:52:43'),
(22, 15, 4, '2019-06-04 10:52:43', '2019-06-04 10:52:43'),
(23, 16, 2, '2019-06-04 10:53:58', '2019-06-04 10:53:58'),
(26, 18, 3, '2019-06-20 02:35:40', '2019-06-20 02:35:40'),
(27, 18, 1, '2019-06-20 02:35:40', '2019-06-20 02:35:40'),
(28, 19, 2, '2019-07-17 00:01:52', '2019-07-17 00:01:52'),
(29, 19, 1, '2019-07-17 00:01:52', '2019-07-17 00:01:52'),
(30, 19, 4, '2019-07-17 00:01:52', '2019-07-17 00:01:52');

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
(3, '2019_02_13_171153_create_jobs_table', 1),
(4, '2019_02_22_053145_addtoken', 1),
(5, '2019_02_24_143551_add_discription_column', 1),
(6, '2019_02_28_110258_lastchangetojobstable', 1),
(7, '2019_02_28_113124_oh_last_migration_to_jobs', 1),
(8, '2019_02_28_155103_assigned_to_column', 1),
(9, '2019_03_03_043406_user_type_classification', 1),
(10, '2019_03_03_060201_create_bids_table', 1),
(11, '2019_03_14_113107_create_skills_table', 1),
(12, '2019_03_14_121634_create_job_skills_table', 1),
(13, '2019_04_07_091251_create_notifications_table', 1),
(14, '2019_04_07_130234_nauthystatus', 1),
(15, '2019_04_20_162238_finallink', 1),
(16, '2019_04_30_162306_create_transactions_table', 1),
(17, '2019_04_30_170754_add_status', 1),
(18, '2019_05_05_085708_addpaypalacount', 1),
(19, '2019_05_09_041825_create_reviews_table', 1),
(20, '2019_05_09_044848_useronline', 1),
(21, '2019_05_10_161952_userpic', 1),
(22, '2019_05_14_125848_create_userskills_table', 1),
(23, '2019_06_14_163215_create_admins_table', 2),
(24, '2019_06_22_132551_add_report', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `jobs_id`, `body`, `created_at`, `updated_at`, `status`) VALUES
(16, 1, 5, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 09:56:29', '2019-06-04 09:57:22', 1),
(17, 1, 6, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:04:11', '2019-06-04 10:12:57', 1),
(18, 1, 7, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:15:21', '2019-06-04 10:20:19', 1),
(19, 1, 8, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:18:45', '2019-06-04 10:20:20', 1),
(20, 1, 9, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:33:15', '2019-06-04 10:33:37', 1),
(21, 1, 10, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:39:34', '2019-06-05 04:59:37', 1),
(22, 1, 11, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:42:33', '2019-06-05 04:59:37', 1),
(23, 1, 12, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:44:39', '2019-06-05 04:59:37', 1),
(24, 1, 13, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:51:36', '2019-06-05 04:59:37', 1),
(25, 1, 14, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:51:43', '2019-06-05 04:59:37', 1),
(26, 1, 15, 'Your Bid was Approved Happy Coding!!!', '2019-06-04 10:54:03', '2019-06-05 04:59:37', 1),
(27, 1, 15, 'Payment recieved for an project please check balance section', '2019-06-06 03:37:06', '2019-06-06 03:48:28', 1),
(28, 1, 17, 'Your Bid was Approved Happy Coding!!!', '2019-06-06 03:39:09', '2019-06-06 03:48:29', 1),
(29, 1, 18, 'Your Bid was Approved Happy Coding!!!', '2019-07-17 01:01:08', '2019-07-17 01:01:08', 0);

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `by` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `stars`, `by`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 'Very well done, liked your work', '2019-05-24 10:45:42', '2019-05-24 10:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'JavaScript', NULL, NULL),
(2, 'Php', NULL, NULL),
(3, 'CSS', NULL, NULL),
(4, 'React', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobs_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `pid`, `jobs_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'PAYID-LTRMT6A7GK84910VP941991S', 1, '2019-05-20 14:38:33', '2019-05-20 14:42:46', '0'),
(2, 'PAYID-LTVI7WQ05G53135CB295672E', 2, '2019-05-26 07:38:42', '2019-05-26 22:47:05', '0'),
(3, 'PAYID-LTVKMXA4DM7377350905243L', 3, '2019-05-26 09:14:45', '2019-05-26 22:46:31', '0'),
(4, 'PAYID-LT4NPDQ13L7898112173012U', 15, '2019-06-06 03:36:20', '2019-07-17 00:02:48', '0');

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
  `api_token` char(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `api_token`, `created_at`, `updated_at`, `type`, `paypal`, `portfolio`, `resume`, `facebook`, `twitter`, `pic`) VALUES
(1, 'Badal Mishra', 'badalmishr7035@gmail.com', '2019-05-20 09:39:06', '$2y$10$rVfX4uQmn9upaQC.XD39T.y/ND1SDVnwH3yFTA06gAkQhOaA0Yazy', '2dETyILLha9DNN5TTRGzZZumth6qkI44aEDCmqbuueJwhXkeCY3N70GKegw7', '$2y$10$SQruYgc.14xyg16dJ7lj4.PfWBLRPRNzDdiRQzgpdsPRyW7b7prIq', '2019-05-20 09:35:35', '2019-07-17 00:02:32', 'freelancer', 'mayank@gol.com', 'https://badalmishra.github.io', NULL, NULL, NULL, '1_1559802230.jpg'),
(2, 'Mayank Mishra', 'badal@gol.com', '2019-05-20 09:39:06', '$2y$10$gcobO/KO7AYcxayeNCqQT.PEfepW20Wlb7j18KnEX4/HMuNYNZzkO', 'yqf9aC9y4rG7W3NtVudd6c6LiMgXX2oDtW6K33yGdqNyJUKiZTM9TYnoHV7o', '$2y$10$G036wVTkNoz.dmippony2OY0tCupT70jk87.S.Ir.AuTDA6rdvIvK', '2019-05-20 09:55:57', '2019-07-17 01:00:54', 'client', 'badal@gmail.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userskills`
--

CREATE TABLE `userskills` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `skills_id` int(11) NOT NULL,
  `yoe` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userskills`
--

INSERT INTO `userskills` (`id`, `user_id`, `skills_id`, `yoe`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, '2019-05-20 10:22:28', '2019-05-20 10:22:28'),
(2, 1, 4, 2, '2019-05-26 22:49:38', '2019-05-26 22:49:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `userskills`
--
ALTER TABLE `userskills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userskills`
--
ALTER TABLE `userskills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
