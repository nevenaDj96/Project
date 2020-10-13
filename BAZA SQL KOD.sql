-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2018 at 11:21 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5308301_nevena`
--
CREATE DATABASE IF NOT EXISTS `id5308301_nevena` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id5308301_nevena`;

-- --------------------------------------------------------

--
-- Table structure for table `anketas`
--

CREATE TABLE `anketas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `img_id` int(10) UNSIGNED NOT NULL,
  `ocena` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anketas`
--

INSERT INTO `anketas` (`id`, `user_id`, `img_id`, `ocena`) VALUES
(1, 11, 3, 5),
(2, 12, 3, 3),
(3, 14, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'PEra', 'pera@gmail.com', 'kontakt', 'Dobardan', '2018-04-07 12:19:59', '2018-04-07 12:19:59'),
(2, 'dasda', 'asdasd@gmail.com', 'asda', 'sdasdas', '2018-04-07 12:25:36', '2018-04-07 12:25:36'),
(3, 'Adfda', 'asda@asd.com', 'asdfasfasf', 'asfasfasfasfa', '2018-04-07 12:27:41', '2018-04-07 12:27:41'),
(4, 'Adfda', 'asda@asd.com', 'asdfasfasf', 'asfasfasfasfa', '2018-04-07 12:28:36', '2018-04-07 12:28:36'),
(5, 'Adfda', 'asda@asd.com', 'asdfasfasf', 'asfasfasfasfa', '2018-04-07 12:29:40', '2018-04-07 12:29:40'),
(6, 'Adfda', 'asda@asd.com', 'asdfasfasf', 'asfasfasfasfa', '2018-04-07 12:30:11', '2018-04-07 12:30:11'),
(7, 'Asdasd', 'asdasd@gmail.com', 'asdasd', 'asdasfafs', '2018-04-07 12:31:31', '2018-04-07 12:31:31'),
(8, 'Pera', 'pera@gmail.com', 'subjekat', 'Asdsdasd', '2018-04-10 16:16:22', '2018-04-10 16:16:22'),
(9, 'Aasdad', 'asdasd@asdd.com', 'asdasd', 'asdasd', '2018-04-10 16:32:15', '2018-04-10 16:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paragraph` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`, `user_id`, `heading`, `paragraph`, `likes`, `created_at`, `updated_at`) VALUES
(3, '1523026191_img_1.jpg', 10, 'Siva slika', 'Predivne nijanse sive boje', 2, '2018-04-06 12:49:51', '2018-04-06 12:51:31'),
(4, '1523026244_img_2.jpg', 11, 'Plava boja', 'Predivne nijanse plave boje', 1, '2018-04-06 12:50:44', '2018-04-12 23:16:56'),
(5, '1523026284_img_3.jpg', 12, 'Roze slika', 'Nijanse roze boje', 0, '2018-04-06 12:51:24', '2018-04-06 12:51:24'),
(6, '1523026344_img_4.jpg', 13, 'Narandzasta boja', 'Nijanse', 0, '2018-04-06 12:52:24', '2018-04-06 12:52:24'),
(7, '1523026380_img_6.jpg', 14, 'Ljubicasto plava', 'Raznolikosti boje', 0, '2018-04-06 12:53:00', '2018-04-06 12:53:00'),
(8, '1523026408_computer.jpg', 14, 'Computer', 'Our future', 1, '2018-04-06 12:53:28', '2018-04-06 12:57:25'),
(9, '1523026535_person_1.jpg', 14, 'Siva Boja', 'Nijanse su cudo', 0, '2018-04-06 12:55:35', '2018-04-06 12:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `img_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `img_id`) VALUES
(1, 11, 3),
(2, 12, 3),
(3, 14, 8),
(4, 10, 4);

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
(1, '2013_03_29_234638_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_03_29_230212_create_networks_table', 1),
(5, '2018_03_29_230259_create_navigations_table', 1),
(6, '2018_03_30_004700_create_subscribers_table', 1),
(8, '2018_03_30_160100_create_questions_table', 1),
(9, '2018_03_30_224410_create_contacts_table', 1),
(10, '2018_04_02_154624_create_anketas_table', 1),
(11, '2018_04_03_220247_create_likes_table', 1),
(12, '2018_03_30_121800_create_images_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `url`, `name`) VALUES
(6, '/', 'Home'),
(7, '/questions', 'Questions'),
(8, '/contact', 'Contact'),
(9, '/image', 'Photos'),
(10, '/author', 'Author'),
(11, '/dokumentacija', 'Documentation');

-- --------------------------------------------------------

--
-- Table structure for table `networks`
--

CREATE TABLE `networks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `networks`
--

INSERT INTO `networks` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(9, 'twitter', '#', NULL, NULL),
(10, 'facebook', '#', NULL, NULL),
(11, 'linkedin', '#', NULL, NULL);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem ipsum?', 'he important factor when using Lorem ipsum text is that the text looks realistic otherwise the brochure or book will not look very good. Lorem Ipsum is dummy text which has no meaning however looks very similar to real text.', '2018-04-06 19:41:15', '2018-04-06 19:42:39'),
(2, 'What is Lorem ipsum?', 'he important factor when using Lorem ipsum text is that the text looks realistic otherwise the brochure or book will not look very good. Lorem Ipsum is dummy text which has no meaning however looks very similar to real text.', '2018-04-06 19:41:20', '2018-04-06 19:42:45'),
(3, 'What is Lorem ipsum?', 'he important factor when using Lorem ipsum text is that the text looks realistic otherwise the brochure or book will not look very good. Lorem Ipsum is dummy text which has no meaning however looks very similar to real text.', '2018-04-06 19:41:23', '2018-04-06 19:42:47'),
(4, 'What is Lorem ipsum?', 'he important factor when using Lorem ipsum text is that the text looks realistic otherwise the brochure or book will not look very good. Lorem Ipsum is dummy text which has no meaning however looks very similar to real text.', '2018-04-06 19:41:27', '2018-04-06 19:42:49'),
(5, 'What is Lorem ipsum?', 'he important factor when using Lorem ipsum text is that the text looks realistic otherwise the brochure or book will not look very good. Lorem Ipsum is dummy text which has no meaning however looks very similar to real text.', '2018-04-06 19:41:31', '2018-04-06 19:42:52'),
(6, 'What is Lorem ipsum?', NULL, '2018-04-06 19:41:33', '2018-04-06 19:41:33'),
(7, 'What is Lorem ipsum?', 'he important factor when using Lorem ipsum text is that the text looks realistic otherwise the brochure or book will not look very good. Lorem Ipsum is dummy text which has no meaning however looks very similar to real text.', '2018-04-06 19:41:38', '2018-04-06 19:42:55'),
(8, 'What is Lorem ipsum?', 'he important factor when using Lorem ipsum text is that the text looks realistic otherwise the brochure or book will not look very good. Lorem Ipsum is dummy text which has no meaning however looks very similar to real text.', '2018-04-06 19:41:42', '2018-04-06 19:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'peraperic@gmail.com', '2018-04-07 12:51:09', '2018-04-07 12:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'admin@gmail.com', '75d23af433e0cea4c0e45a56dba18b30', 1, NULL, NULL, '2018-04-06 19:51:41'),
(9, 'user', 'user@gmail.com', 'cba1f2d695a5ca39ee6f343297a761a4', 2, NULL, '2018-04-06 12:48:26', '2018-04-06 12:48:26'),
(10, 'user1', 'user1@gmail.com', '59029276955677351421b3ff6bf5ee4c', 2, NULL, '2018-04-06 12:49:13', '2018-04-06 12:49:13'),
(11, 'user2', 'user2@gmail.com', 'fa7c3fcb670a58aa3e90a391ea533c99', 2, NULL, '2018-04-06 12:50:05', '2018-04-06 12:50:05'),
(12, 'user3', 'user3@gmail.com', 'a3012064ea70afa9351e80e4a62b5dcb', 2, NULL, '2018-04-06 12:51:08', '2018-04-06 19:48:22'),
(13, 'user4', 'user4@gmail.com', 'de934b5a66b34c72636d2e34ad075e8d', 1, NULL, '2018-04-06 12:52:00', '2018-04-06 19:48:38'),
(14, 'user5', 'user5@gmail.com', '70a910d1849c17436d6099bcc31ed1a5', 2, NULL, '2018-04-06 12:52:37', '2018-04-06 12:52:37'),
(15, 'pera', 'peraaa@gmail.com', 'cc2b16f395691802e56442684c594e53', 2, NULL, '2018-04-12 23:16:10', '2018-04-12 23:16:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketas`
--
ALTER TABLE `anketas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anketas_user_id_index` (`user_id`),
  ADD KEY `anketas_img_id_index` (`img_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_index` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_index` (`user_id`),
  ADD KEY `likes_img_id_index` (`img_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `networks`
--
ALTER TABLE `networks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `networks_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketas`
--
ALTER TABLE `anketas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `networks`
--
ALTER TABLE `networks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketas`
--
ALTER TABLE `anketas`
  ADD CONSTRAINT `anketas_img_id_foreign` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `anketas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_img_id_foreign` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
