-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 01:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildhub_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '/default_uploads/avatar.jpg',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '/default_uploads/avatar.jpg', 'superadmin@gmail.com', NULL, '$2y$12$N.aW9MQJu5ZV5PV1sgZPZ.H5VilnGdZxQgDMYnZ.mwHrvLk4J7ayC', NULL, '2024-04-16 16:09:19', '2024-04-16 16:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE `bloggers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `blog_category` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`id`, `image`, `title`, `slug`, `author`, `blog_category`, `publish_date`, `content`, `created_at`, `updated_at`) VALUES
(4, '/uploads/media_66483ab2ba21b.jpg', 'Hunian Nyaman Dengan 2 Kombinasi Berikut!', 'accusamus-sit-quisq', '1', 'Interior', '2024-05-18', '<div>Hunian nyaman merupakan impian setiap orang, dan salah satu cara untuk mewujudkannya adalah dengan mengombinasikan elemen desain yang tepat. Dua kombinasi berikut dapat menjadi solusi sempurna untuk menciptakan hunian idaman. Pertama, perpaduan antara gaya minimalis dan elemen alami. Desain minimalis dengan dominasi warna netral, perabotan yang fungsional, dan penataan ruang yang efisien memberikan kesan luas dan rapi. Elemen alami seperti tanaman hias, penggunaan material kayu, dan pencahayaan alami yang optimal akan menambah suasana sejuk dan menyegarkan. Kedua, kombinasi antara teknologi pintar dan sentuhan personal. Penggunaan perangkat smart home, seperti lampu yang dapat dikontrol dengan suara atau aplikasi, serta sistem keamanan canggih, akan meningkatkan kenyamanan dan keamanan hunian. Sementara itu, sentuhan personal melalui dekorasi yang mencerminkan kepribadian penghuni, seperti foto keluarga, karya seni, atau barang-barang koleksi, akan membuat rumah terasa lebih hangat dan personal. Dengan menggabungkan kedua kombinasi ini, hunian Anda tidak hanya akan nyaman tetapi juga mencerminkan karakter dan gaya hidup modern yang Anda inginkan.<br><br><strong>### Poin-Poin Utama:</strong><br><br>1. **Perpaduan Gaya Minimalis dan Elemen Alami**:<br>&nbsp; &nbsp; - Desain minimalis dengan warna netral dan perabotan fungsional.<br>&nbsp; &nbsp; - Penataan ruang yang efisien untuk kesan luas dan rapi.<br>&nbsp; &nbsp; - Elemen alami seperti tanaman hias dan material kayu.<br>&nbsp; &nbsp; - Optimalisasi pencahayaan alami untuk suasana sejuk dan menyegarkan.<br><br>2. **Kombinasi Teknologi Pintar dan Sentuhan Personal**:<br>&nbsp; &nbsp; - Penggunaan perangkat smart home yang dapat dikontrol dengan suara atau aplikasi.<br>&nbsp; &nbsp; - Sistem keamanan canggih untuk kenyamanan dan keamanan ekstra.<br>&nbsp; &nbsp; - Dekorasi yang mencerminkan kepribadian penghuni, seperti foto keluarga dan karya seni.<br>&nbsp; &nbsp; - Sentuhan personal yang membuat rumah terasa lebih hangat dan personal.<br><br>3. **Manfaat Kombinasi Ini**:<br>&nbsp; &nbsp; - Menciptakan hunian yang nyaman dan efisien.<br>&nbsp; &nbsp; - Menyediakan lingkungan yang menyegarkan dan aman.<br>&nbsp; &nbsp; - Membuat rumah mencerminkan karakter dan gaya hidup penghuni.<br>&nbsp; &nbsp; - Menggabungkan modernitas dengan sentuhan pribadi untuk hunian idaman.</div>', '2024-05-17 22:15:24', '2024-05-18 13:28:51'),
(5, '/uploads/media_66483a5f961e8.jpeg', 'Memainkan Warna Pastel di Living Room', 'memainkan-warna-pastel-di-living-room', '1', 'Cat', '2024-05-18', '<div>ada</div>', '2024-05-17 22:19:27', '2024-05-17 22:19:27'),
(6, '/uploads/media_66483a8c136fb.jpeg', 'Pantry Minimalis Italian, Mau Coba?', 'pantry-minimalis-italian-mau-coba', '1', 'Interior', '2024-05-18', '<div>Saepe exercitationem.</div>', '2024-05-17 22:20:12', '2024-05-17 22:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user1_id` bigint(20) UNSIGNED NOT NULL,
  `user2_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`) VALUES
(20, 4, 2, '2024-05-15 09:12:55', '2024-05-15 09:12:55'),
(21, 2, 3, '2024-05-15 09:34:55', '2024-05-15 09:34:55'),
(22, 4, 3, '2024-05-17 07:08:39', '2024-05-17 07:08:39'),
(23, 2, 1, '2024-05-18 10:06:46', '2024-05-18 10:06:46'),
(24, 12, 1, '2024-05-19 15:57:50', '2024-05-19 15:57:50'),
(25, 14, 3, '2024-05-19 16:08:42', '2024-05-19 16:08:42'),
(26, 17, 3, '2024-05-19 18:38:05', '2024-05-19 18:38:05'),
(27, 4, 24, '2024-05-19 19:13:39', '2024-05-19 19:13:39'),
(28, 28, 3, '2024-05-20 05:33:36', '2024-05-20 05:33:36'),
(29, 29, 1, '2024-05-20 05:41:07', '2024-05-20 05:41:07'),
(30, 34, 2, '2024-05-20 07:39:35', '2024-05-20 07:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `logo`, `banner`, `name`, `desc`, `instagram`, `facebook`, `email`, `phone`, `alamat`, `kota`, `provinsi`, `kodepos`, `created_at`, `updated_at`) VALUES
(1, 4, '/uploads/media_6648d70516c3c.png', '/uploads/media_6627029e0e217.jpg', 'Kylian Mbappé', 'Alias autem quos nul', 'Ex a delectus volup', 'Et sint enim tenetu', 'khaled@gmail.com', '+1 (305) 956-9048', 'Recusandae Enim fug', '3204', '32', 17530, '2024-04-22 17:36:46', '2024-05-19 15:50:55'),
(2, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'firdarsn@gmail.com', '08771972112', 'jakarta', '3171', '31', 901999, '2024-05-19 15:55:53', '2024-05-19 15:55:53'),
(3, 29, '/uploads/media_664b44d754504.png', '/uploads/media_664b44d754b06.png', 'Samantha Page', 'Consequuntur maiores', 'Culpa qui deleniti', 'Omnis doloribus mole', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-20 05:40:55', '2024-05-20 05:40:55'),
(4, 34, '/uploads/media_664b614f92992.png', '/uploads/media_664b614f92ee5.png', 'Xanthus Faulkner', 'Porro voluptates dol', 'Minim laudantium ne', 'Tempore voluptatem', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-20 07:42:23', '2024-05-20 07:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_carts`
--

CREATE TABLE `customer_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_qty` varchar(255) NOT NULL DEFAULT '0',
  `item_price` int(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_carts`
--

INSERT INTO `customer_carts` (`id`, `customer_id`, `product_id`, `store_name`, `item_name`, `item_qty`, `item_price`, `item_image`, `date`, `created_at`, `updated_at`) VALUES
(85, 4, 21, 'Ibox Store Jakarta', 'Simone Barr', '1', 3152, '/uploads/media_663c7a40cfd1a.jpg', '2024-05-20', '2024-05-20 07:43:10', '2024-05-20 07:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_checklists`
--

CREATE TABLE `customer_checklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `isComplete` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_checklists`
--

INSERT INTO `customer_checklists` (`id`, `user_id`, `title`, `isComplete`, `isActive`, `created_at`, `updated_at`) VALUES
(10, 4, 'project kamar mandi', 1, 1, '2024-05-15 18:14:31', '2024-05-18 08:29:10'),
(11, 4, 'project dapur', 1, 1, '2024-05-17 04:12:54', '2024-05-18 08:06:21'),
(13, 4, 'warehouse', 1, 0, '2024-05-18 08:33:42', '2024-05-19 15:37:11'),
(14, 4, 'test', 1, 1, '2024-05-19 15:40:22', '2024-05-19 15:40:47'),
(15, 4, 'test', 1, 0, '2024-05-19 15:42:18', '2024-05-19 15:42:28'),
(16, 4, 'halo', 1, 1, '2024-05-19 15:44:11', '2024-05-19 15:44:25'),
(17, 4, 'cekkk', 1, 0, '2024-05-19 15:45:04', '2024-05-19 15:45:18'),
(18, 4, 'halo', 1, 0, '2024-05-19 15:46:38', '2024-05-19 15:47:08'),
(20, 4, 'halo', 1, 0, '2024-05-19 15:48:13', '2024-05-19 15:48:23'),
(21, 30, 'test', 1, 0, '2024-05-20 05:45:35', '2024-05-20 05:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `customer_checklist_items`
--

CREATE TABLE `customer_checklist_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_checklist_id` bigint(20) UNSIGNED NOT NULL,
  `list` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `isComplete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_checklist_items`
--

INSERT INTO `customer_checklist_items` (`id`, `customer_checklist_id`, `list`, `notes`, `isComplete`, `created_at`, `updated_at`) VALUES
(19, 10, 'beli bebek bebekan', 'nbdja', 1, '2024-05-15 18:14:44', '2024-05-15 18:18:15'),
(21, 10, 'da', 'dada', 1, '2024-05-15 22:53:39', '2024-05-18 07:36:38'),
(22, 11, 'pintu', '1000', 1, '2024-05-17 04:13:06', '2024-05-17 04:13:14'),
(23, 11, 'here', 'ada', 1, '2024-05-18 07:36:46', '2024-05-18 07:44:56'),
(29, 13, 'pintu', '5', 1, '2024-05-18 08:33:57', '2024-05-18 08:34:01'),
(31, 14, 'halo', 'has', 1, '2024-05-19 15:40:29', '2024-05-19 15:40:37'),
(33, 15, 'halo', 'apa', 1, '2024-05-19 15:42:25', '2024-05-19 15:42:27'),
(34, 16, 'ada', 'daa', 1, '2024-05-19 15:44:16', '2024-05-19 15:44:21'),
(35, 17, 'halo', 'halo', 1, '2024-05-19 15:45:14', '2024-05-19 15:45:17'),
(36, 18, 'sekar', 'sekar', 1, '2024-05-19 15:46:46', '2024-05-19 15:46:56'),
(37, 18, 'firda', 'firda', 1, '2024-05-19 15:46:54', '2024-05-19 15:46:58'),
(40, 20, 'adsad', 'dadas', 1, '2024-05-19 15:48:18', '2024-05-19 15:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `customer_checkouts`
--

CREATE TABLE `customer_checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cart_id`)),
  `hasCheckout` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_checkouts`
--

INSERT INTO `customer_checkouts` (`id`, `user_id`, `store_id`, `cart_id`, `hasCheckout`, `created_at`, `updated_at`) VALUES
(69, 4, 4, '\"[\\\"71\\\"]\"', 1, '2024-05-18 05:28:56', '2024-05-18 05:29:15'),
(70, 4, 4, '\"[\\\"72\\\"]\"', 1, '2024-05-18 11:25:38', '2024-05-18 11:25:41'),
(71, 4, 4, '\"[\\\"73\\\"]\"', 0, '2024-05-18 11:26:49', '2024-05-18 11:26:49'),
(72, 4, 4, '\"[\\\"73\\\"]\"', 1, '2024-05-18 11:32:58', '2024-05-18 11:33:00'),
(73, 4, 4, '\"[\\\"74\\\"]\"', 1, '2024-05-18 11:33:55', '2024-05-18 11:33:57'),
(74, 4, 4, '\"[\\\"76\\\"]\"', 1, '2024-05-20 02:43:44', '2024-05-20 02:43:47'),
(75, 4, 4, '\"[\\\"77\\\"]\"', 0, '2024-05-20 02:44:10', '2024-05-20 02:44:10'),
(76, 4, 4, '\"[\\\"77\\\"]\"', 1, '2024-05-20 02:45:44', '2024-05-20 02:45:47'),
(77, 4, 4, '\"[\\\"78\\\"]\"', 1, '2024-05-20 05:57:53', '2024-05-20 05:57:56'),
(78, 4, 4, '\"[\\\"79\\\"]\"', 1, '2024-05-20 06:26:10', '2024-05-20 06:26:12'),
(79, 4, 4, '\"[\\\"80\\\"]\"', 1, '2024-05-20 06:45:58', '2024-05-20 06:46:00'),
(80, 4, 4, '\"[\\\"81\\\"]\"', 1, '2024-05-20 07:08:03', '2024-05-20 07:08:06'),
(81, 4, 5, '\"[\\\"82\\\"]\"', 1, '2024-05-20 07:13:40', '2024-05-20 07:13:42'),
(82, 4, 4, '\"[\\\"83\\\"]\"', 1, '2024-05-20 07:14:42', '2024-05-20 07:14:44'),
(83, 34, 4, '\"[\\\"84\\\"]\"', 0, '2024-05-20 07:42:38', '2024-05-20 07:42:38'),
(84, 34, 4, '\"[\\\"84\\\"]\"', 1, '2024-05-20 07:43:16', '2024-05-20 07:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_checkout_items`
--

CREATE TABLE `customer_checkout_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_qty` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_checkout_items`
--

INSERT INTO `customer_checkout_items` (`id`, `checkout_id`, `product_id`, `store_name`, `item_name`, `item_qty`, `item_price`, `item_image`, `date`, `created_at`, `updated_at`) VALUES
(56, 53, 22, 'Ibox Store Jakarta', 'Kaos Programmer', '1', '165000', '/uploads/media_663c7a86aac9c.jpg', '2024-05-18 00:23:55', '2024-05-17 17:23:55', '2024-05-17 17:23:55'),
(57, 55, 20, 'Ibox Store Jakarta', 'Ashton George', '1', '155', '/uploads/media_663c793cefbb5.jpg', '2024-05-18 00:24:53', '2024-05-17 17:24:53', '2024-05-17 17:24:53'),
(58, 56, 19, 'Ibox Store Jakarta', 'Dawn Gallagher', '1', '59000', '/uploads/media_663c75da17ced.jpg', '2024-05-18 00:27:13', '2024-05-17 17:27:13', '2024-05-17 17:27:13'),
(59, 57, 21, 'Ibox Store Jakarta', 'Simone Barr', '1', '3152', '/uploads/media_663c7a40cfd1a.jpg', '2024-05-18 00:29:40', '2024-05-17 17:29:40', '2024-05-17 17:29:40'),
(60, 58, 19, 'Ibox Store Jakarta', 'Dawn Gallagher', '1', '59000', '/uploads/media_663c75da17ced.jpg', '2024-05-18 00:30:17', '2024-05-17 17:30:18', '2024-05-17 17:30:18'),
(61, 59, 19, 'Ibox Store Jakarta', 'Dawn Gallagher', '1', '59000', '/uploads/media_663c75da17ced.jpg', '2024-05-18 00:31:01', '2024-05-17 17:31:01', '2024-05-17 17:31:01'),
(62, 60, 19, 'Ibox Store Jakarta', 'Dawn Gallagher', '1', '59000', '/uploads/media_663c75da17ced.jpg', '2024-05-18 00:32:17', '2024-05-17 17:32:17', '2024-05-17 17:32:17'),
(63, 61, 19, 'Ibox Store Jakarta', 'Dawn Gallagher', '1', '59000', '/uploads/media_663c75da17ced.jpg', '2024-05-18 00:33:17', '2024-05-17 17:33:17', '2024-05-17 17:33:17'),
(64, 62, 19, 'Ibox Store Jakarta', 'Dawn Gallagher', '1', '59000', '/uploads/media_663c75da17ced.jpg', '2024-05-18 00:35:54', '2024-05-17 17:35:54', '2024-05-17 17:35:54'),
(65, 64, 22, 'Ibox Store Jakarta', 'Kaos Programmer', '1', '165000', '/uploads/media_663c7a86aac9c.jpg', '2024-05-18 00:37:54', '2024-05-17 17:37:54', '2024-05-17 17:37:54'),
(66, 69, 19, 'Ibox Store Jakarta', 'Dawn Gallagher', '1', '59000', '/uploads/media_663c75da17ced.jpg', '2024-05-18 12:29:15', '2024-05-18 05:29:15', '2024-05-18 05:29:15'),
(67, 70, 19, 'Ibox Store Jakarta', 'Dawn Gallagheraaa', '1', '59000', '/uploads/media_6648e5fd4b6ae.png', '2024-05-18 18:25:41', '2024-05-18 11:25:41', '2024-05-18 11:25:41'),
(68, 72, 19, 'Ibox Store Jakarta', 'Dawn Gallagheraaa', '1', '59000', '/uploads/media_6648e5fd4b6ae.png', '2024-05-18 18:33:00', '2024-05-18 11:33:00', '2024-05-18 11:33:00'),
(69, 73, 22, 'Ibox Store Jakarta', 'Kaos Programmer', '1', '165000', '/uploads/media_663c7a86aac9c.jpg', '2024-05-18 18:33:57', '2024-05-18 11:33:57', '2024-05-18 11:33:57'),
(70, 74, 20, 'Ibox Store Jakarta', 'Ashton George', '1', '155', '/uploads/media_6648e5f511694.png', '2024-05-20 09:43:46', '2024-05-20 02:43:47', '2024-05-20 02:43:47'),
(71, 76, 19, 'Ibox Store Jakarta', 'Dawn Gallagheraaa', '1', '59000', '/uploads/media_6648e5fd4b6ae.png', '2024-05-20 09:45:47', '2024-05-20 02:45:47', '2024-05-20 02:45:47'),
(72, 77, 22, 'Ibox Store Jakarta', 'Kaos Programmer', '1', '165000', '/uploads/media_663c7a86aac9c.jpg', '2024-05-20 12:57:56', '2024-05-20 05:57:56', '2024-05-20 05:57:56'),
(73, 78, 19, 'Ibox Store Jakarta', 'Dawn Gallagheraaa', '1', '59000', '/uploads/media_6648e5fd4b6ae.png', '2024-05-20 13:26:12', '2024-05-20 06:26:12', '2024-05-20 06:26:12'),
(74, 79, 20, 'Ibox Store Jakarta', 'Ashton George', '1', '155', '/uploads/media_6648e5f511694.png', '2024-05-20 13:46:00', '2024-05-20 06:46:00', '2024-05-20 06:46:00'),
(75, 80, 19, 'Ibox Store Jakarta', 'Dawn Gallagheraaa', '1', '59000', '/uploads/media_6648e5fd4b6ae.png', '2024-05-20 14:08:06', '2024-05-20 07:08:06', '2024-05-20 07:08:06'),
(76, 81, 23, 'Callum Merritt', 'Aphrodite Church', '1', '532', '/uploads/media_664aaeab458d5.png', '2024-05-20 14:13:42', '2024-05-20 07:13:42', '2024-05-20 07:13:42'),
(77, 82, 22, 'Ibox Store Jakarta', 'Kaos Programmer', '1', '165000', '/uploads/media_663c7a86aac9c.jpg', '2024-05-20 14:14:44', '2024-05-20 07:14:44', '2024-05-20 07:14:44'),
(78, 84, 19, 'Ibox Store Jakarta', 'Dawn Gallagheraaa', '2', '118000', '/uploads/media_6648e5fd4b6ae.png', '2024-05-20 14:43:18', '2024-05-20 07:43:18', '2024-05-20 07:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `invoice_no`, `customer_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(4, '17052024DRQCQT', 1, 22, 5, 'ada', '2024-05-17 16:28:22', '2024-05-17 16:28:22'),
(5, '18052024JEOKQ7', 1, 19, 5, NULL, '2024-05-17 17:37:26', '2024-05-17 17:37:26'),
(6, '180520248473YT', 1, 19, 5, 'terima kasih ya', '2024-05-18 05:31:02', '2024-05-18 05:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_orders`
--

CREATE TABLE `customer_service_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `orderType` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `serviceProvider_name` varchar(255) NOT NULL,
  `serviceProvider_email` varchar(255) NOT NULL,
  `serviceProvider_id` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `isPayment` tinyint(1) NOT NULL DEFAULT 0,
  `isApprove` tinyint(1) NOT NULL DEFAULT 0,
  `paid_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_service_orders`
--

INSERT INTO `customer_service_orders` (`id`, `invoice_no`, `orderType`, `service_name`, `total_price`, `client_email`, `serviceProvider_name`, `serviceProvider_email`, `serviceProvider_id`, `isActive`, `isPayment`, `isApprove`, `paid_at`, `created_at`, `updated_at`) VALUES
(23, '180520243TEIHI', 'PROFESSIONAL SERVICE', 'test professional biru biru', '1245559.00', 'byruxuqi@mailinator.com', 'ADIKARYA BERKAH JAYA', 'adikarya@gmail.com', '3', 1, 0, 0, NULL, '2024-05-18 05:56:32', '2024-05-18 05:56:32'),
(24, '18052024BCGF3Z', 'PROFESSIONAL SERVICE', 'Lumion 3D Rendere', '228100.00', 'khaled@gmail.com', 'ADIKARYA BERKAH JAYA', 'adikarya@gmail.com', '3', 1, 1, 1, '2024-05-18', '2024-05-18 05:58:35', '2024-05-18 12:06:20'),
(25, '18052024OFGM6U', 'PROFESSIONAL SERVICE', 'Lumion 3D Rendere', '61600.00', 'khaled@gmail.com', 'ADIKARYA BERKAH JAYA', 'adikarya@gmail.com', '3', 1, 1, 1, '2024-05-18', '2024-05-18 06:00:02', '2024-05-18 12:06:28'),
(26, '18052024OBXFJV', 'VENDOR SERVICE', 'Acton Gravesa', '47337.00', 'wisin@mailinator.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 0, 0, NULL, '2024-05-18 10:57:47', '2024-05-18 10:57:47'),
(27, '18052024SQBJIG', 'VENDOR SERVICE', 'test vendor biru', '391230.00', 'khaled@gmail.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 1, 1, '2024-05-18', '2024-05-18 10:58:17', '2024-05-18 12:07:53'),
(28, '18052024FOLA4K', 'VENDOR SERVICE', 'Acton Gravesa', '675132.00', 'weduho@mailinator.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 0, 0, NULL, '2024-05-18 11:03:17', '2024-05-18 11:03:17'),
(30, '18052024ADY6JW', 'VENDOR SERVICE', 'Acton Gravesa', '129624.00', 'khaled@gmail.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 1, 1, '2024-05-20', '2024-05-18 11:07:47', '2024-05-20 07:19:14'),
(31, '18052024NJAJVB', 'VENDOR SERVICE', 'test vendor biru', '353358.00', 'javomifut@mailinator.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 0, 1, NULL, '2024-05-18 11:08:41', '2024-05-20 05:30:21'),
(34, '18052024H6RZEF', 'PROFESSIONAL SERVICE', 'test professional biru biru', '79299.00', 'gosan@mailinator.com', 'ADIKARYA BERKAH JAYA', 'adikarya@gmail.com', '3', 1, 0, 1, NULL, '2024-05-18 11:10:49', '2024-05-20 05:30:14'),
(40, '20052024KDJZ0E', 'PROFESSIONAL SERVICE', 'Lumion 3D Rendere', '597165.00', 'khaled@gmail.com', 'ADIKARYA BERKAH JAYA', 'adikarya@gmail.com', '3', 1, 1, 1, '2024-05-20', '2024-05-20 05:26:35', '2024-05-20 05:30:09'),
(41, '200520247RXZ68', 'VENDOR SERVICE', 'lala', '202212.00', 'lisna@gmail.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 1, 1, '2024-05-20', '2024-05-20 05:43:13', '2024-05-20 06:43:02'),
(42, '200520240LT4PA', 'VENDOR SERVICE', 'Acton Gravesa', '74120.00', 'khaled@gmail.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 1, 1, '2024-05-20', '2024-05-20 06:33:39', '2024-05-20 06:38:42'),
(43, '20052024QDJVTQ', 'VENDOR SERVICE', 'Acton Gravesa', '100596.00', 'jivymo@mailinator.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 0, 0, NULL, '2024-05-20 06:47:17', '2024-05-20 06:47:17'),
(44, '20052024IW2DQZ', 'VENDOR SERVICE', 'Acton Gravesa', '660585.00', 'khaled@gmail.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 1, 1, '2024-05-20', '2024-05-20 06:47:28', '2024-05-20 06:48:57'),
(45, '20052024ATYYEF', 'VENDOR SERVICE', 'Acton Gravesa', '112095.00', 'khaled@gmail.com', 'SAMSUNG', 'samsung@gmail.com', '1', 1, 1, 1, '2024-05-20', '2024-05-20 07:07:30', '2024-05-20 07:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_order_items`
--

CREATE TABLE `customer_service_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_service_order_id` bigint(20) UNSIGNED NOT NULL,
  `itemName` varchar(255) DEFAULT NULL,
  `itemPrice` int(11) DEFAULT NULL,
  `itemQty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_service_order_items`
--

INSERT INTO `customer_service_order_items` (`id`, `customer_service_order_id`, `itemName`, `itemPrice`, `itemQty`, `created_at`, `updated_at`) VALUES
(27, 23, 'Adria Mathis', 793, 991, '2024-05-18 05:56:32', '2024-05-18 05:56:32'),
(28, 23, 'Zia Kent', 732, 628, '2024-05-18 05:56:32', '2024-05-18 05:56:32'),
(29, 24, 'Wyoming Montgomery', 214, 520, '2024-05-18 05:58:35', '2024-05-18 05:58:35'),
(30, 24, 'Mira Burgess', 990, 118, '2024-05-18 05:58:35', '2024-05-18 05:58:35'),
(31, 25, 'Nathan Richardson', 100, 616, '2024-05-18 06:00:02', '2024-05-18 06:00:02'),
(32, 26, 'Reuben Murphy', 93, 509, '2024-05-18 10:57:47', '2024-05-18 10:57:47'),
(33, 27, 'Winifred Britt', 630, 621, '2024-05-18 10:58:17', '2024-05-18 10:58:17'),
(34, 28, 'Brian Bush', 762, 886, '2024-05-18 11:03:17', '2024-05-18 11:03:17'),
(36, 30, 'Jin Hutchinson', 491, 264, '2024-05-18 11:07:47', '2024-05-18 11:07:47'),
(37, 31, 'Ignatius Wise', 402, 879, '2024-05-18 11:08:41', '2024-05-18 11:08:41'),
(40, 34, 'Ramona Franco', 891, 89, '2024-05-18 11:10:49', '2024-05-18 11:10:49'),
(46, 40, 'Dante Glover', 615, 971, '2024-05-20 05:26:35', '2024-05-20 05:26:35'),
(47, 41, 'Ray Mathis', 738, 274, '2024-05-20 05:43:13', '2024-05-20 05:43:13'),
(48, 42, 'Gareth Burt', 1090, 68, '2024-05-20 06:33:39', '2024-05-20 06:33:39'),
(49, 43, 'Kelly Hopper', 996, 101, '2024-05-20 06:47:17', '2024-05-20 06:47:17'),
(50, 44, 'Hayfa Garrison', 705, 937, '2024-05-20 06:47:28', '2024-05-20 06:47:28'),
(51, 45, 'Cora Luna', 141, 795, '2024-05-20 07:07:30', '2024-05-20 07:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_reviews`
--

CREATE TABLE `customer_service_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_service_reviews`
--

INSERT INTO `customer_service_reviews` (`id`, `invoice_no`, `client_email`, `service_name`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, '17052024VXEN9K', 'khaled@gmail.com', 'Lumion 3D Rendere', 5, 'good!', '2024-05-18 05:53:33', '2024-05-18 05:53:33'),
(2, '18052024BCGF3Z', 'khaled@gmail.com', 'Lumion 3D Rendere', 5, 'bagus', '2024-05-18 05:59:27', '2024-05-18 05:59:27'),
(3, '18052024OFGM6U', 'khaled@gmail.com', 'Lumion 3D Rendere', 5, 'oke order lagi besok', '2024-05-18 06:01:51', '2024-05-18 06:01:51'),
(4, '18052024SQBJIG', 'khaled@gmail.com', 'test vendor biru', 5, 'bagus banget', '2024-05-20 04:58:41', '2024-05-20 04:58:41'),
(5, '18052024ADY6JW', 'khaled@gmail.com', 'Acton Gravesa', 5, 'ok.', '2024-05-20 05:31:08', '2024-05-20 05:31:08'),
(6, '20052024KDJZ0E', 'khaled@gmail.com', 'Lumion 3D Rendere', 3, 'ok bagus..', '2024-05-20 05:31:18', '2024-05-20 05:31:18'),
(7, '200520247RXZ68', 'lisna@gmail.com', 'lala', 4, 'nice. makasih', '2024-05-20 05:43:57', '2024-05-20 05:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactions`
--

CREATE TABLE `customer_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `has_discount` tinyint(1) NOT NULL DEFAULT 0,
  `discount_amount` tinyint(1) NOT NULL DEFAULT 0,
  `shipping_address` text NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `isApprove` tinyint(1) NOT NULL DEFAULT 0,
  `payment` varchar(255) NOT NULL DEFAULT 'bank_transfer',
  `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_transactions`
--

INSERT INTO `customer_transactions` (`id`, `checkout_id`, `user_id`, `invoice_no`, `total_price`, `has_discount`, `discount_amount`, `shipping_address`, `transaction_date`, `isActive`, `isApprove`, `payment`, `payment_status`, `paid_at`, `created_at`, `updated_at`) VALUES
(44, 80, 4, '20052024IX2NPV', 59000, 0, 0, 'Recusandae Enim fug, 3204', '2024-05-20 14:23:07', 1, 1, 'bank_transfer', 'paid', '2024-05-20 07:11:14', '2024-05-20 07:08:06', '2024-05-20 07:23:07'),
(45, 81, 4, '20052024AGMGU5', 532, 0, 0, 'Recusandae Enim fug, 3204', '2024-05-20 14:16:40', 1, 1, 'bank_transfer', 'paid', '2024-05-20 07:13:47', '2024-05-20 07:13:42', '2024-05-20 07:16:40'),
(46, 82, 4, '200520246FR9Z6', 165000, 0, 0, 'Recusandae Enim fug, 3204', '2024-05-20 14:16:41', 1, 1, 'bank_transfer', 'paid', '2024-05-20 07:14:51', '2024-05-20 07:14:44', '2024-05-20 07:16:41'),
(47, 84, 34, '20052024R1CZT3', 118000, 0, 0, ',', '2024-05-20 07:43:18', 1, 0, 'bank_transfer', 'pending', NULL, '2024-05-20 07:43:18', '2024-05-20 07:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `event_category` varchar(255) NOT NULL,
  `event_by` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `slug`, `author`, `event_category`, `event_by`, `date`, `content`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_6648b3b60cc8f.jpeg', 'Workshop: How To Maintenance Home Studio Room', 'workshop-how-to-maintenance-home-studio', '1', 'Studio Interior', 'InteriorXSpace', '2024-06-08', '<div>ada</div>', '2024-05-18 06:57:10', '2024-05-18 07:18:36'),
(2, '/uploads/media_6648b9cc009aa.jpg', 'Modern Minimalism: Designing Spaces with Purpose and Simplicity', 'modern-minimalism-designing-spaces-with-purpose-and-simplicity', '1', 'Modern Architect', 'ArsikuPedia Group', '2024-06-20', '<div>hala madrid</div>', '2024-05-18 07:23:08', '2024-05-18 07:23:08'),
(3, '/uploads/media_6648ba1310fe0.jpg', 'Sustainable Living: Eco-Friendly Interior Design Strategies', 'sustainable-living-eco-friendly-interior-design-strategies', '1', 'Exhibi', 'ArsikuPedia Group, Jordi Interior', '2024-06-08', '<div>ada</div>', '2024-05-18 07:24:19', '2024-05-18 07:24:19');

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
-- Table structure for table `general_notifications`
--

CREATE TABLE `general_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_notifications`
--

INSERT INTO `general_notifications` (`id`, `email`, `title`, `message`, `isRead`, `created_at`, `updated_at`) VALUES
(26, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>17052024ECME0X</strong>.\n            telah berhasil. Thank you', 0, '2024-05-17 15:46:42', '2024-05-17 15:46:42'),
(27, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-17 15:46:42', '2024-05-17 15:46:42'),
(28, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>17052024ECME0X</strong>.\n            telah berhasil. Thank you', 0, '2024-05-17 15:58:52', '2024-05-17 15:58:52'),
(29, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-17 15:58:52', '2024-05-17 15:58:52'),
(30, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>17052024DRQCQT</strong>.\n            telah berhasil. Thank you', 0, '2024-05-17 16:21:11', '2024-05-17 16:21:11'),
(31, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-17 16:21:11', '2024-05-17 16:21:11'),
(32, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>17052024CH54LF</strong>.\n            telah berhasil. Thank you', 0, '2024-05-17 16:35:13', '2024-05-17 16:35:13'),
(33, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-17 16:35:13', '2024-05-17 16:35:13'),
(34, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>17052024CH54LF</strong>.\n            telah berhasil. Thank you', 0, '2024-05-17 17:08:30', '2024-05-17 17:08:30'),
(35, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-17 17:08:30', '2024-05-17 17:08:30'),
(36, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>180520244HWD18</strong>.\n            telah berhasil. Thank you', 0, '2024-05-17 17:24:38', '2024-05-17 17:24:38'),
(37, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-17 17:24:38', '2024-05-17 17:24:38'),
(38, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024JEOKQ7</strong>.\n            telah berhasil. Thank you', 0, '2024-05-17 17:36:58', '2024-05-17 17:36:58'),
(39, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-17 17:36:58', '2024-05-17 17:36:58'),
(40, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024JEOKQ7</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 05:26:47', '2024-05-18 05:26:47'),
(41, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 05:26:47', '2024-05-18 05:26:47'),
(42, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024JEOKQ7</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 05:27:42', '2024-05-18 05:27:42'),
(43, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 05:27:42', '2024-05-18 05:27:42'),
(44, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024JEOKQ7</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 05:28:05', '2024-05-18 05:28:05'),
(45, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 05:28:05', '2024-05-18 05:28:05'),
(46, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>180520248473YT</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 05:29:30', '2024-05-18 05:29:30'),
(47, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 05:29:30', '2024-05-18 05:29:30'),
(48, 'byruxuqi@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>180520243TEIHI</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 12:56:32. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 05:56:32', '2024-05-18 05:56:32'),
(49, 'adikarya@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 05:56:32', '2024-05-18 05:56:32'),
(50, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024BCGF3Z</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 12:58:35. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 05:58:35', '2024-05-18 05:58:35'),
(51, 'adikarya@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 05:58:35', '2024-05-18 05:58:35'),
(52, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024BCGF3Z</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 05:58:57', '2024-05-18 05:58:57'),
(53, 'adikarya@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 05:58:57', '2024-05-18 05:58:57'),
(54, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024OFGM6U</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 13:00:02. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 06:00:02', '2024-05-18 06:00:02'),
(55, 'adikarya@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 06:00:02', '2024-05-18 06:00:02'),
(56, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024OFGM6U</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 06:02:23', '2024-05-18 06:02:23'),
(57, 'adikarya@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 06:02:23', '2024-05-18 06:02:23'),
(58, 'wisin@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024OBXFJV</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 17:57:47. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 10:57:47', '2024-05-18 10:57:47'),
(59, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 10:57:47', '2024-05-18 10:57:47'),
(60, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024SQBJIG</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 17:58:17. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 10:58:17', '2024-05-18 10:58:17'),
(61, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 10:58:17', '2024-05-18 10:58:17'),
(62, 'weduho@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024FOLA4K</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 18:03:17. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 11:03:17', '2024-05-18 11:03:17'),
(63, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 11:03:17', '2024-05-18 11:03:17'),
(64, 'nesuvubo@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>180520240DQUST</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 18:06:17. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 11:06:17', '2024-05-18 11:06:17'),
(65, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 11:06:17', '2024-05-18 11:06:17'),
(66, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024ADY6JW</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 18:07:47. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 11:07:47', '2024-05-18 11:07:47'),
(67, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 11:07:47', '2024-05-18 11:07:47'),
(68, 'javomifut@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024NJAJVB</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 18:08:41. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 11:08:41', '2024-05-18 11:08:41'),
(69, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 11:08:41', '2024-05-18 11:08:41'),
(70, 'sima@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024WJUVKV</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 18:09:04. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 11:09:04', '2024-05-18 11:09:04'),
(71, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 11:09:04', '2024-05-18 11:09:04'),
(72, 'cilufe@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024YPSP8K</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 18:09:52. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 11:09:52', '2024-05-18 11:09:52'),
(73, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 11:09:52', '2024-05-18 11:09:52'),
(74, 'gosan@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>18052024H6RZEF</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-18 18:10:49. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-18 11:10:49', '2024-05-18 11:10:49'),
(75, 'adikarya@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-18 11:10:49', '2024-05-18 11:10:49'),
(76, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>180520248473YT</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 11:27:18', '2024-05-18 11:27:18'),
(77, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 11:27:18', '2024-05-18 11:27:18'),
(78, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>180520248473YT</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 11:29:57', '2024-05-18 11:29:57'),
(79, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 11:29:57', '2024-05-18 11:29:57'),
(80, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>180520248473YT</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 11:30:26', '2024-05-18 11:30:26'),
(81, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 11:30:26', '2024-05-18 11:30:26'),
(82, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024ORBGNC</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 11:33:09', '2024-05-18 11:33:09'),
(83, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 11:33:09', '2024-05-18 11:33:09'),
(84, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024ORBGNC</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 11:34:45', '2024-05-18 11:34:45'),
(85, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 11:34:45', '2024-05-18 11:34:45'),
(86, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024ORBGNC</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 11:35:13', '2024-05-18 11:35:13'),
(87, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 11:35:13', '2024-05-18 11:35:13'),
(88, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024KQLCT7</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 11:39:05', '2024-05-18 11:39:05'),
(89, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 11:39:05', '2024-05-18 11:39:05'),
(90, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024SQBJIG</strong>.\n            telah berhasil. Thank you', 0, '2024-05-18 12:07:42', '2024-05-18 12:07:42'),
(91, 'samsung@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-18 12:07:42', '2024-05-18 12:07:42'),
(92, 'faci@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>20052024O1P1ZX</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 00:58:50. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-19 17:58:50', '2024-05-19 17:58:50'),
(93, 'professional@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-19 17:58:50', '2024-05-19 17:58:50'),
(94, 'gylaryja@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>20052024SU0CCX</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 01:17:10. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-19 18:17:10', '2024-05-19 18:17:10'),
(95, 'professional@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-19 18:17:10', '2024-05-19 18:17:10'),
(96, 'bupiwo@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>20052024HQPRS2</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 01:17:56. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-19 18:17:56', '2024-05-19 18:17:56'),
(97, 'professional@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-19 18:17:56', '2024-05-19 18:17:56'),
(98, 'kikokegil@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>200520242C8CXW</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 01:20:34. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-19 18:20:34', '2024-05-19 18:20:34'),
(99, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-19 18:20:34', '2024-05-19 18:20:34'),
(100, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024QDAP3Y</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 02:44:46', '2024-05-20 02:44:46'),
(101, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 02:44:46', '2024-05-20 02:44:46'),
(102, 'tukonewek@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>200520241EWNYR</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 11:46:12. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-20 04:46:12', '2024-05-20 04:46:12'),
(103, 'andrew@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-20 04:46:12', '2024-05-20 04:46:12'),
(104, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>20052024KDJZ0E</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 12:26:35. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-20 05:26:35', '2024-05-20 05:26:35'),
(105, 'adikarya@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-20 05:26:35', '2024-05-20 05:26:35'),
(106, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024KDJZ0E</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 05:27:07', '2024-05-20 05:27:07'),
(107, 'adikarya@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 05:27:07', '2024-05-20 05:27:07'),
(108, 'lisna@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>200520247RXZ68</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 12:43:13. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-20 05:43:13', '2024-05-20 05:43:13'),
(109, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-20 05:43:13', '2024-05-20 05:43:13'),
(110, 'lisna@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>200520247RXZ68</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 05:43:44', '2024-05-20 05:43:44'),
(111, 'samsung@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 05:43:44', '2024-05-20 05:43:44'),
(112, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024MWB9VV</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 05:58:05', '2024-05-20 05:58:05'),
(113, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 05:58:05', '2024-05-20 05:58:05'),
(114, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>18052024ADY6JW</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 06:25:25', '2024-05-20 06:25:25'),
(115, 'samsung@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 06:25:25', '2024-05-20 06:25:25'),
(116, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024GXYRH1</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 06:26:18', '2024-05-20 06:26:18'),
(117, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 06:26:18', '2024-05-20 06:26:18'),
(118, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 06:29:42', '2024-05-20 06:29:42'),
(119, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 06:29:44', '2024-05-20 06:29:44'),
(120, 'khaled@gmail.com', 'Payment for 20052024GXYRH1 has been approved by Admin!', 'Check your dashboard for details.', 0, '2024-05-20 06:32:00', '2024-05-20 06:32:00'),
(121, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>200520240LT4PA</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 13:33:39. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-20 06:33:39', '2024-05-20 06:33:39'),
(122, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-20 06:33:39', '2024-05-20 06:33:39'),
(123, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>200520240LT4PA</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 06:34:10', '2024-05-20 06:34:10'),
(124, 'samsung@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 06:34:10', '2024-05-20 06:34:10'),
(125, 'khaled@gmail.com', 'Payment for transaction 20052024GXYRH1 has been approved by admin!', 'Check your dashboard for details.', 0, '2024-05-20 06:37:33', '2024-05-20 06:37:33'),
(126, 'khaled@gmail.com', 'Payment for transaction 20052024GXYRH1 has been approved by admin!', 'Check your dashboard for details.', 0, '2024-05-20 06:37:47', '2024-05-20 06:37:47'),
(127, 'khaled@gmail.com', 'Payment for transaction 20052024GXYRH1 has been approved by admin!', 'Check your dashboard for details.', 0, '2024-05-20 06:42:28', '2024-05-20 06:42:28'),
(128, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024VYYL8F</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 06:46:24', '2024-05-20 06:46:24'),
(129, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 06:46:24', '2024-05-20 06:46:24'),
(130, 'jivymo@mailinator.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>20052024QDJVTQ</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 13:47:17. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-20 06:47:17', '2024-05-20 06:47:17'),
(131, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-20 06:47:17', '2024-05-20 06:47:17'),
(132, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>20052024IW2DQZ</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 13:47:28. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-20 06:47:28', '2024-05-20 06:47:28'),
(133, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-20 06:47:28', '2024-05-20 06:47:28'),
(134, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024IW2DQZ</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 06:48:30', '2024-05-20 06:48:30'),
(135, 'samsung@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 06:48:30', '2024-05-20 06:48:30'),
(136, 'khaled@gmail.com', 'Konfirmasi pembayaran service!', 'Your have an service order with invoice no: <strong>20052024ATYYEF</strong>.\n        To complete the order, please\n         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before 2024-05-20 14:07:30. After\n         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you', 0, '2024-05-20 07:07:30', '2024-05-20 07:07:30'),
(137, 'samsung@gmail.com', 'Invoice berhasil dibuat!', 'You have received a new order. Check your dashboard for details.', 0, '2024-05-20 07:07:30', '2024-05-20 07:07:30'),
(138, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024ATYYEF</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 07:07:48', '2024-05-20 07:07:48'),
(139, 'samsung@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 07:07:48', '2024-05-20 07:07:48'),
(140, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024IX2NPV</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 07:11:14', '2024-05-20 07:11:14'),
(141, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 07:11:14', '2024-05-20 07:11:14'),
(142, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>20052024AGMGU5</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 07:13:47', '2024-05-20 07:13:47'),
(143, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 07:13:47', '2024-05-20 07:13:47'),
(144, 'khaled@gmail.com', 'Pembayaran kamu Behasil!', 'Pembayaran kamu untuk invoice no: <strong>200520246FR9Z6</strong>.\n            telah berhasil. Thank you', 0, '2024-05-20 07:14:51', '2024-05-20 07:14:51'),
(145, 'khaled@gmail.com', 'Invoice telah dibayar oleh client!', 'Check your dashboard for details.', 0, '2024-05-20 07:14:51', '2024-05-20 07:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `general_transaction_proofs`
--

CREATE TABLE `general_transaction_proofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `shipping_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generan_transaction_proofs`
--

CREATE TABLE `generan_transaction_proofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `shipping_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generan_transaction_proofs`
--

INSERT INTO `generan_transaction_proofs` (`id`, `invoice_no`, `payment_proof`, `shipping_proof`, `created_at`, `updated_at`) VALUES
(6, '17052024VXEN9K', '/uploads/media_664775deb4c05.png', NULL, '2024-05-17 08:21:02', '2024-05-17 08:21:02'),
(7, '170520241PICVG', '/uploads/media_66477654ad456.png', NULL, '2024-05-17 08:23:00', '2024-05-17 08:23:00'),
(8, '1705202489NUQB', '/uploads/media_6647b0b5944cf.jpg', NULL, '2024-05-17 12:32:05', '2024-05-17 12:32:05'),
(9, '17052024EAZSSX', '/uploads/media_6647d463dad13.png', NULL, '2024-05-17 15:04:19', '2024-05-17 15:04:19'),
(10, '17052024WNX38L', '/uploads/media_6647d55789868.png', NULL, '2024-05-17 15:08:23', '2024-05-17 15:08:23'),
(11, '17052024ECME0X', '/uploads/media_6647e12cd1f1d.png', NULL, '2024-05-17 15:46:42', '2024-05-17 15:58:52'),
(12, '17052024DRQCQT', '/uploads/media_6647e6672764a.png', NULL, '2024-05-17 16:21:11', '2024-05-17 16:21:11'),
(13, '17052024CH54LF', '/uploads/media_6647f17e940ea.png', NULL, '2024-05-17 16:35:13', '2024-05-17 17:08:30'),
(14, '180520244HWD18', '/uploads/media_6647f5466a67a.png', NULL, '2024-05-17 17:24:38', '2024-05-17 17:24:38'),
(15, '18052024JEOKQ7', '/uploads/media_66489ed5ab31d.jpeg', '/uploads/media_66481687ce92b.png', '2024-05-17 17:36:58', '2024-05-18 05:28:05'),
(16, '180520248473YT', '/uploads/media_6648f3c25bb39.png', '/uploads/media_66489f5375c21.jpeg', '2024-05-18 05:29:30', '2024-05-18 11:30:26'),
(17, '18052024BCGF3Z', '/uploads/media_6648a6113e4e6.jpeg', NULL, '2024-05-18 05:58:57', '2024-05-18 05:58:57'),
(18, '18052024OFGM6U', '/uploads/media_6648a6dfd5796.jpeg', NULL, '2024-05-18 06:02:23', '2024-05-18 06:02:23'),
(19, '18052024ORBGNC', '', '', '2024-05-18 11:33:09', '2024-05-20 02:15:43'),
(20, '18052024KQLCT7', '', '', '2024-05-18 11:39:05', '2024-05-20 02:37:51'),
(21, '18052024SQBJIG', '/uploads/media_6648fc7e9bc81.png', NULL, '2024-05-18 12:07:42', '2024-05-18 12:07:42'),
(22, '20052024QDAP3Y', '/uploads/media_664b1b8e1de07.png', NULL, '2024-05-20 02:44:46', '2024-05-20 02:44:46'),
(23, '20052024KDJZ0E', '/uploads/media_664b419b3e554.png', NULL, '2024-05-20 05:27:07', '2024-05-20 05:27:07'),
(24, '200520247RXZ68', '/uploads/media_664b458085b5c.png', NULL, '2024-05-20 05:43:44', '2024-05-20 05:43:44'),
(25, '20052024MWB9VV', '/uploads/media_664b48dd0c047.png', NULL, '2024-05-20 05:58:05', '2024-05-20 05:58:05'),
(26, '18052024ADY6JW', '/uploads/media_664b4f4597b0b.png', NULL, '2024-05-20 06:25:25', '2024-05-20 06:25:25'),
(27, '20052024GXYRH1', '/uploads/media_664b4f7a9fb16.png', '/uploads/media_664b58273bb9b.png', '2024-05-20 06:26:18', '2024-05-20 07:03:19'),
(28, '200520240LT4PA', '/uploads/media_664b5151ee6af.png', NULL, '2024-05-20 06:34:09', '2024-05-20 06:34:09'),
(29, '20052024VYYL8F', '/uploads/media_664b5430523bd.png', '/uploads/media_664b58c1425a0.png', '2024-05-20 06:46:24', '2024-05-20 07:05:53'),
(30, '20052024IW2DQZ', '/uploads/media_664b54ae6420f.png', NULL, '2024-05-20 06:48:30', '2024-05-20 06:48:30'),
(31, '20052024ATYYEF', '/uploads/media_664b5934b0b19.png', NULL, '2024-05-20 07:07:48', '2024-05-20 07:07:48'),
(32, '20052024IX2NPV', '/uploads/media_664b5a0277074.png', '/uploads/media_664b5a11b866e.png', '2024-05-20 07:11:14', '2024-05-20 07:11:29'),
(33, '20052024AGMGU5', '/uploads/media_664b5a9b7797f.png', NULL, '2024-05-20 07:13:47', '2024-05-20 07:13:47'),
(34, '200520246FR9Z6', '/uploads/media_664b5adb16b99.png', '/uploads/media_664b5aecbd72c.png', '2024-05-20 07:14:51', '2024-05-20 07:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(45, 20, 4, 2, '<div>halo</div>', '2024-05-15 09:12:55', '2024-05-15 09:12:55'),
(46, 21, 2, 3, '<div>join yuk</div>', '2024-05-15 09:34:55', '2024-05-15 09:34:55'),
(47, 22, 4, 3, '<div>bang</div>', '2024-05-17 07:08:39', '2024-05-17 07:08:39'),
(48, 22, 4, 3, '<div>udh bayar ya gw bang</div>', '2024-05-17 07:18:44', '2024-05-17 07:18:44'),
(49, 21, 2, 3, '<div>bolleh</div>', '2024-05-17 20:07:53', '2024-05-17 20:07:53'),
(50, 21, 3, 2, '<div>kapan</div>', '2024-05-17 20:08:18', '2024-05-17 20:08:18'),
(51, 22, 4, 3, '<div>dah bayar</div>', '2024-05-18 05:59:14', '2024-05-18 05:59:14'),
(52, 22, 3, 4, '<div>oke</div>', '2024-05-18 05:59:43', '2024-05-18 05:59:43'),
(53, 22, 4, 3, '<div>makasih</div>', '2024-05-18 09:42:04', '2024-05-18 09:42:04'),
(54, 22, 4, 3, '<div>kerne</div>', '2024-05-18 09:42:13', '2024-05-18 09:42:13'),
(55, 22, 4, 3, '<div>test</div>', '2024-05-18 09:43:58', '2024-05-18 09:43:58'),
(56, 20, 2, 4, '<div>iya</div>', '2024-05-18 09:58:47', '2024-05-18 09:58:47'),
(57, 23, 2, 1, '<div>cek</div>', '2024-05-18 10:06:46', '2024-05-18 10:06:46'),
(58, 23, 1, 2, '<div>iya kak kenapa&nbsp;</div>', '2024-05-18 10:44:00', '2024-05-18 10:44:00'),
(59, 24, 12, 1, '<div>halo kak&nbsp;</div>', '2024-05-19 15:57:50', '2024-05-19 15:57:50'),
(60, 24, 1, 12, '<div>iyaa</div>', '2024-05-19 15:58:13', '2024-05-19 15:58:13'),
(61, 25, 14, 3, '<div>halo bisa kasih saya training cara jd professional...?</div>', '2024-05-19 16:08:42', '2024-05-19 16:08:42'),
(62, 25, 3, 14, '<div>iya bisa.. mau mulai dari mana?</div>', '2024-05-19 16:09:17', '2024-05-19 16:09:17'),
(63, 26, 17, 3, '<div>test saya store baru namanya dani</div>', '2024-05-19 18:38:05', '2024-05-19 18:38:05'),
(64, 27, 4, 24, '<div>halo</div>', '2024-05-19 19:13:39', '2024-05-19 19:13:39'),
(65, 28, 28, 3, '<div>test</div>', '2024-05-20 05:33:36', '2024-05-20 05:33:36'),
(66, 29, 29, 1, '<div>halo sy lisna</div>', '2024-05-20 05:41:07', '2024-05-20 05:41:07'),
(67, 29, 29, 1, '<div>mau pesen kak</div>', '2024-05-20 05:41:13', '2024-05-20 05:41:13'),
(68, 29, 1, 29, '<div>oya bolehh... mau apa&nbsp;</div>', '2024-05-20 05:41:40', '2024-05-20 05:41:40'),
(69, 30, 34, 2, '<div>halo</div>', '2024-05-20 07:39:35', '2024-05-20 07:39:35');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_11_173905_create_admins_table', 1),
(6, '2024_04_14_110306_create_professional_service_table', 2),
(13, '2024_04_16_154145_create_stores_table', 8),
(14, '2024_04_17_025657_create_store_categories_table', 9),
(16, '2024_04_22_072551_create_vendors_table', 11),
(17, '2024_04_22_081605_create_professionals_table', 12),
(18, '2024_04_23_002731_create_customers_table', 13),
(19, '2024_04_23_122901_create_vendor_categories_table', 14),
(20, '2024_04_23_124450_create_professional_categories_table', 15),
(22, '2024_04_14_153927_create_store_products_table', 16),
(23, '2024_04_24_135731_create_customer_carts_table', 17),
(27, '2024_04_26_235303_create_notifications_table', 19),
(28, '2024_04_27_053242_create_transaction_proofs_table', 20),
(29, '2024_04_27_120407_create_conversations_table', 21),
(31, '2024_04_27_120423_create_messages_table', 22),
(34, '2024_04_14_160717_create_vendor_services_table', 23),
(38, '2024_04_14_113510_create_professional_services_table', 27),
(40, '2024_05_05_135458_create_price_ranges_table', 29),
(41, '2024_05_05_073631_create_customer_reviews_table', 30),
(43, '2024_05_07_010908_create_customer_checklists_table', 31),
(45, '2024_05_08_004233_create_customer_checklist_items_table', 32),
(46, '2024_05_08_133754_create_cities_table', 33),
(47, '2024_05_08_133911_create_provinces_table', 33),
(48, '2024_04_14_161337_create_vendor_portfolios_table', 34),
(50, '2024_05_16_223355_create_customer_service_orders_table', 36),
(51, '2024_05_16_224101_create_customer_service_order_items_table', 37),
(53, '2024_05_17_131216_create_general_notifications_table', 38),
(54, '2024_05_17_143251_create_generan_transaction_proofs_table', 39),
(63, '2024_05_17_163347_create_customer_checkot_items_table', 40),
(64, '2024_05_17_163347_create_customer_checkout_items_table', 41),
(66, '2024_05_17_153334_create_customer_checkouts_table', 42),
(67, '2024_05_17_143251_create_general_transaction_proofs_table', 43),
(68, '2024_05_18_030940_create_bloggers_table', 43),
(70, '2024_05_18_124430_create_customer_service_reviews_table', 44),
(71, '2024_05_18_031406_create_events_table', 45),
(72, '2024_04_14_113837_create_professional_portfolios_table', 46);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('adikarya@gmail.com', '$2y$12$vJn1Zg97M6zOcStMfRHdI.OHCZX2gmUjj/cdvQmcJFc.Qww3UE9CS', '2024-04-14 06:08:39'),
('khaled@gmail.com', '$2y$12$akZ2r67f2RXPI2wTKYllWO00.qkEsJClkndIVtsq4sLFPX4rmrNOO', '2024-04-14 06:09:15');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_ranges`
--

CREATE TABLE `price_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_ranges` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_ranges`
--

INSERT INTO `price_ranges` (`id`, `price_ranges`, `created_at`, `updated_at`) VALUES
(1, '500.000 - 1.000.000', '2024-05-05 06:58:17', '2024-05-05 06:58:17'),
(2, '1000.000 - 1.999.999', '2024-05-05 06:58:17', '2024-05-05 06:58:17'),
(3, '2000.000 - 2.999.999', '2024-05-05 06:58:17', '2024-05-05 06:58:17'),
(4, '3000.000 - 3.999.999', '2024-05-05 06:58:17', '2024-05-05 06:58:17'),
(5, '4000.000 - 5.999.999', '2024-05-05 06:58:17', '2024-05-05 06:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_professional_id` int(11) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`id`, `user_id`, `logo`, `banner`, `name`, `category_professional_id`, `desc`, `instagram`, `facebook`, `email`, `phone`, `alamat`, `kota`, `provinsi`, `kodepos`, `created_at`, `updated_at`) VALUES
(1, 3, '/uploads/media_66261eeed7c90.png', '/uploads/media_66261eeed836a.jpg', 'ADIKARYA BERKAH JAYA', NULL, 'Iusto in facilis eum', 'Porro quos quia duis', 'Ut dignissimos possi', 'geqow@mailinator.com', '+1 (923) 596-8758', 'Velit aut quis persp', '3174', '31', 19080, '2024-04-22 01:25:18', '2024-05-08 20:43:56'),
(2, 5, '/uploads/media_662e78e3ac7de.png', '/uploads/media_662e78e3ad1c6.jpg', 'Sima Nahdia Space', NULL, 'i was born in chicago', 'simanahdia90', 'Sima Nahdia', 'simastore@gmail.com', '08998171267', 'BEKASI', '3216', '32', 17530, '2024-04-28 09:27:15', '2024-04-28 09:29:34'),
(3, 14, '/uploads/media_664a879d07c1f.png', '/uploads/media_664a879d082c5.png', 'Chiquita Nash', NULL, 'Ut est accusamus acc', 'Laudantium facere a', 'Provident aliquip a', 'buweryre@mailinator.com', '+1 (143) 808-3013', 'Facere adipisicing a', '1202', '12', 64, '2024-05-19 16:13:33', '2024-05-19 16:13:43'),
(4, 23, '/uploads/media_664ab1006e8c6.png', '/uploads/media_664ab1006ee17.png', 'Reuben Williamson', NULL, 'Rerum et dignissimos', 'Corrupti minima lab', 'Ea doloribus saepe e', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-19 19:10:08', '2024-05-19 19:10:08'),
(5, 27, '/uploads/media_664b36998667a.png', '/uploads/media_664b369986b2c.png', 'Lesley Farmer', 3, 'In qui unde sed simi', 'Quo rem debitis sapi', 'Mollit dolor laudant', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-20 04:40:09', '2024-05-20 04:44:28'),
(6, 31, '/uploads/media_664b4673881ee.png', '/uploads/media_664b467388715.png', 'MacKenzie Phillips', 3, 'Tempore ipsam ipsam', 'Reprehenderit rerum', 'Molestiae numquam in', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-20 05:47:47', '2024-05-20 05:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `professional_categories`
--

CREATE TABLE `professional_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_categories`
--

INSERT INTO `professional_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Arsitektur', '2024-04-28 09:00:21', '2024-04-28 09:00:21'),
(3, 'Interior Designer', '2024-04-28 09:13:11', '2024-04-28 09:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `professional_portfolios`
--

CREATE TABLE `professional_portfolios` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professional_portfolios`
--

INSERT INTO `professional_portfolios` (`id`, `professional_id`, `image`, `name`, `desc`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, '/uploads/media_664a9cb884144.png', 'test BCA', 'KWEOK', '2022', '2024-05-19 17:43:36', '2024-05-19 17:43:36'),
(2, 3, '/uploads/media_664a9d00e1116.png', 'cek', 'cac', '2025', '2024-05-19 17:44:48', '2024-05-19 17:44:48'),
(3, 4, '/uploads/media_664ab112847ff.png', 'Germaine Warren', 'Non ea et quaerat do', '1991', '2024-05-19 19:10:26', '2024-05-19 19:10:26'),
(4, 5, '/uploads/media_664b37ee17041.png', 'Reagan Blair', 'Sapiente eiusmod tot', '2004', '2024-05-20 04:45:50', '2024-05-20 04:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `professional_services`
--

CREATE TABLE `professional_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professional_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_services`
--

INSERT INTO `professional_services` (`id`, `professional_id`, `image`, `name`, `slug`, `category`, `desc`, `status`, `price`, `created_at`, `updated_at`) VALUES
(13, 1, '/uploads/media_6648e742e775a.png', 'Lumion 3D Rendere', 'lumion-3d-render', 'Arsitektur', 'testwdw', 1, '3000.000 - 3.999.999', '2024-05-05 07:04:06', '2024-05-18 10:37:06'),
(14, 1, '/uploads/media_6638f0b2e617b.jpeg', 'test professional biru biru', 'test-professional-biru-biru', 'Interior Designer', 'testtt oke', 1, '4000.000 - 5.999.999', '2024-05-06 08:01:06', '2024-05-06 08:01:06'),
(15, 3, '/uploads/media_664a87d2938cf.jpeg', 'tadaaaaaa', 'tadaaa', 'Arsitektur', 'ini buatan kami', 1, '2000.000 - 2.999.999', '2024-05-19 16:14:14', '2024-05-19 16:14:26'),
(16, 4, '/uploads/media_664ab10ae0486.png', 'Jacob Bean', 'jacob-bean', 'Arsitektur', 'Aliquid magna quia i', 1, '500.000 - 1.000.000', '2024-05-19 19:10:18', '2024-05-19 19:10:18'),
(17, 5, '/uploads/media_664b37e420270.png', 'Destiny Shepard', 'destiny-shepard', 'Arsitektur', 'Omnis minim id at u', 1, '1000.000 - 1.999.999', '2024-05-20 04:45:40', '2024-05-20 04:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regencies`
--

INSERT INTO `regencies` (`id`, `province_id`, `name`) VALUES
(1101, 11, 'KABUPATEN SIMEULUE'),
(1102, 11, 'KABUPATEN ACEH SINGKIL'),
(1103, 11, 'KABUPATEN ACEH SELATAN'),
(1104, 11, 'KABUPATEN ACEH TENGGARA'),
(1105, 11, 'KABUPATEN ACEH TIMUR'),
(1106, 11, 'KABUPATEN ACEH TENGAH'),
(1107, 11, 'KABUPATEN ACEH BARAT'),
(1108, 11, 'KABUPATEN ACEH BESAR'),
(1109, 11, 'KABUPATEN PIDIE'),
(1110, 11, 'KABUPATEN BIREUEN'),
(1111, 11, 'KABUPATEN ACEH UTARA'),
(1112, 11, 'KABUPATEN ACEH BARAT DAYA'),
(1113, 11, 'KABUPATEN GAYO LUES'),
(1114, 11, 'KABUPATEN ACEH TAMIANG'),
(1115, 11, 'KABUPATEN NAGAN RAYA'),
(1116, 11, 'KABUPATEN ACEH JAYA'),
(1117, 11, 'KABUPATEN BENER MERIAH'),
(1118, 11, 'KABUPATEN PIDIE JAYA'),
(1171, 11, 'KOTA BANDA ACEH'),
(1172, 11, 'KOTA SABANG'),
(1173, 11, 'KOTA LANGSA'),
(1174, 11, 'KOTA LHOKSEUMAWE'),
(1175, 11, 'KOTA SUBULUSSALAM'),
(1201, 12, 'KABUPATEN NIAS'),
(1202, 12, 'KABUPATEN MANDAILING NATAL'),
(1203, 12, 'KABUPATEN TAPANULI SELATAN'),
(1204, 12, 'KABUPATEN TAPANULI TENGAH'),
(1205, 12, 'KABUPATEN TAPANULI UTARA'),
(1206, 12, 'KABUPATEN TOBA SAMOSIR'),
(1207, 12, 'KABUPATEN LABUHAN BATU'),
(1208, 12, 'KABUPATEN ASAHAN'),
(1209, 12, 'KABUPATEN SIMALUNGUN'),
(1210, 12, 'KABUPATEN DAIRI'),
(1211, 12, 'KABUPATEN KARO'),
(1212, 12, 'KABUPATEN DELI SERDANG'),
(1213, 12, 'KABUPATEN LANGKAT'),
(1214, 12, 'KABUPATEN NIAS SELATAN'),
(1215, 12, 'KABUPATEN HUMBANG HASUNDUTAN'),
(1216, 12, 'KABUPATEN PAKPAK BHARAT'),
(1217, 12, 'KABUPATEN SAMOSIR'),
(1218, 12, 'KABUPATEN SERDANG BEDAGAI'),
(1219, 12, 'KABUPATEN BATU BARA'),
(1220, 12, 'KABUPATEN PADANG LAWAS UTARA'),
(1221, 12, 'KABUPATEN PADANG LAWAS'),
(1222, 12, 'KABUPATEN LABUHAN BATU SELATAN'),
(1223, 12, 'KABUPATEN LABUHAN BATU UTARA'),
(1224, 12, 'KABUPATEN NIAS UTARA'),
(1225, 12, 'KABUPATEN NIAS BARAT'),
(1271, 12, 'KOTA SIBOLGA'),
(1272, 12, 'KOTA TANJUNG BALAI'),
(1273, 12, 'KOTA PEMATANG SIANTAR'),
(1274, 12, 'KOTA TEBING TINGGI'),
(1275, 12, 'KOTA MEDAN'),
(1276, 12, 'KOTA BINJAI'),
(1277, 12, 'KOTA PADANGSIDIMPUAN'),
(1278, 12, 'KOTA GUNUNGSITOLI'),
(1301, 13, 'KABUPATEN KEPULAUAN MENTAWAI'),
(1302, 13, 'KABUPATEN PESISIR SELATAN'),
(1303, 13, 'KABUPATEN SOLOK'),
(1304, 13, 'KABUPATEN SIJUNJUNG'),
(1305, 13, 'KABUPATEN TANAH DATAR'),
(1306, 13, 'KABUPATEN PADANG PARIAMAN'),
(1307, 13, 'KABUPATEN AGAM'),
(1308, 13, 'KABUPATEN LIMA PULUH KOTA'),
(1309, 13, 'KABUPATEN PASAMAN'),
(1310, 13, 'KABUPATEN SOLOK SELATAN'),
(1311, 13, 'KABUPATEN DHARMASRAYA'),
(1312, 13, 'KABUPATEN PASAMAN BARAT'),
(1371, 13, 'KOTA PADANG'),
(1372, 13, 'KOTA SOLOK'),
(1373, 13, 'KOTA SAWAH LUNTO'),
(1374, 13, 'KOTA PADANG PANJANG'),
(1375, 13, 'KOTA BUKITTINGGI'),
(1376, 13, 'KOTA PAYAKUMBUH'),
(1377, 13, 'KOTA PARIAMAN'),
(1401, 14, 'KABUPATEN KUANTAN SINGINGI'),
(1402, 14, 'KABUPATEN INDRAGIRI HULU'),
(1403, 14, 'KABUPATEN INDRAGIRI HILIR'),
(1404, 14, 'KABUPATEN PELALAWAN'),
(1405, 14, 'KABUPATEN S I A K'),
(1406, 14, 'KABUPATEN KAMPAR'),
(1407, 14, 'KABUPATEN ROKAN HULU'),
(1408, 14, 'KABUPATEN BENGKALIS'),
(1409, 14, 'KABUPATEN ROKAN HILIR'),
(1410, 14, 'KABUPATEN KEPULAUAN MERANTI'),
(1471, 14, 'KOTA PEKANBARU'),
(1473, 14, 'KOTA D U M A I'),
(1501, 15, 'KABUPATEN KERINCI'),
(1502, 15, 'KABUPATEN MERANGIN'),
(1503, 15, 'KABUPATEN SAROLANGUN'),
(1504, 15, 'KABUPATEN BATANG HARI'),
(1505, 15, 'KABUPATEN MUARO JAMBI'),
(1506, 15, 'KABUPATEN TANJUNG JABUNG TIMUR'),
(1507, 15, 'KABUPATEN TANJUNG JABUNG BARAT'),
(1508, 15, 'KABUPATEN TEBO'),
(1509, 15, 'KABUPATEN BUNGO'),
(1571, 15, 'KOTA JAMBI'),
(1572, 15, 'KOTA SUNGAI PENUH'),
(1601, 16, 'KABUPATEN OGAN KOMERING ULU'),
(1602, 16, 'KABUPATEN OGAN KOMERING ILIR'),
(1603, 16, 'KABUPATEN MUARA ENIM'),
(1604, 16, 'KABUPATEN LAHAT'),
(1605, 16, 'KABUPATEN MUSI RAWAS'),
(1606, 16, 'KABUPATEN MUSI BANYUASIN'),
(1607, 16, 'KABUPATEN BANYU ASIN'),
(1608, 16, 'KABUPATEN OGAN KOMERING ULU SELATAN'),
(1609, 16, 'KABUPATEN OGAN KOMERING ULU TIMUR'),
(1610, 16, 'KABUPATEN OGAN ILIR'),
(1611, 16, 'KABUPATEN EMPAT LAWANG'),
(1612, 16, 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
(1613, 16, 'KABUPATEN MUSI RAWAS UTARA'),
(1671, 16, 'KOTA PALEMBANG'),
(1672, 16, 'KOTA PRABUMULIH'),
(1673, 16, 'KOTA PAGAR ALAM'),
(1674, 16, 'KOTA LUBUKLINGGAU'),
(1701, 17, 'KABUPATEN BENGKULU SELATAN'),
(1702, 17, 'KABUPATEN REJANG LEBONG'),
(1703, 17, 'KABUPATEN BENGKULU UTARA'),
(1704, 17, 'KABUPATEN KAUR'),
(1705, 17, 'KABUPATEN SELUMA'),
(1706, 17, 'KABUPATEN MUKOMUKO'),
(1707, 17, 'KABUPATEN LEBONG'),
(1708, 17, 'KABUPATEN KEPAHIANG'),
(1709, 17, 'KABUPATEN BENGKULU TENGAH'),
(1771, 17, 'KOTA BENGKULU'),
(1801, 18, 'KABUPATEN LAMPUNG BARAT'),
(1802, 18, 'KABUPATEN TANGGAMUS'),
(1803, 18, 'KABUPATEN LAMPUNG SELATAN'),
(1804, 18, 'KABUPATEN LAMPUNG TIMUR'),
(1805, 18, 'KABUPATEN LAMPUNG TENGAH'),
(1806, 18, 'KABUPATEN LAMPUNG UTARA'),
(1807, 18, 'KABUPATEN WAY KANAN'),
(1808, 18, 'KABUPATEN TULANGBAWANG'),
(1809, 18, 'KABUPATEN PESAWARAN'),
(1810, 18, 'KABUPATEN PRINGSEWU'),
(1811, 18, 'KABUPATEN MESUJI'),
(1812, 18, 'KABUPATEN TULANG BAWANG BARAT'),
(1813, 18, 'KABUPATEN PESISIR BARAT'),
(1871, 18, 'KOTA BANDAR LAMPUNG'),
(1872, 18, 'KOTA METRO'),
(1901, 19, 'KABUPATEN BANGKA'),
(1902, 19, 'KABUPATEN BELITUNG'),
(1903, 19, 'KABUPATEN BANGKA BARAT'),
(1904, 19, 'KABUPATEN BANGKA TENGAH'),
(1905, 19, 'KABUPATEN BANGKA SELATAN'),
(1906, 19, 'KABUPATEN BELITUNG TIMUR'),
(1971, 19, 'KOTA PANGKAL PINANG'),
(2101, 21, 'KABUPATEN KARIMUN'),
(2102, 21, 'KABUPATEN BINTAN'),
(2103, 21, 'KABUPATEN NATUNA'),
(2104, 21, 'KABUPATEN LINGGA'),
(2105, 21, 'KABUPATEN KEPULAUAN ANAMBAS'),
(2171, 21, 'KOTA B A T A M'),
(2172, 21, 'KOTA TANJUNG PINANG'),
(3101, 31, 'KABUPATEN KEPULAUAN SERIBU'),
(3171, 31, 'KOTA JAKARTA SELATAN'),
(3172, 31, 'KOTA JAKARTA TIMUR'),
(3173, 31, 'KOTA JAKARTA PUSAT'),
(3174, 31, 'KOTA JAKARTA BARAT'),
(3175, 31, 'KOTA JAKARTA UTARA'),
(3201, 32, 'KABUPATEN BOGOR'),
(3202, 32, 'KABUPATEN SUKABUMI'),
(3203, 32, 'KABUPATEN CIANJUR'),
(3204, 32, 'KABUPATEN BANDUNG'),
(3205, 32, 'KABUPATEN GARUT'),
(3206, 32, 'KABUPATEN TASIKMALAYA'),
(3207, 32, 'KABUPATEN CIAMIS'),
(3208, 32, 'KABUPATEN KUNINGAN'),
(3209, 32, 'KABUPATEN CIREBON'),
(3210, 32, 'KABUPATEN MAJALENGKA'),
(3211, 32, 'KABUPATEN SUMEDANG'),
(3212, 32, 'KABUPATEN INDRAMAYU'),
(3213, 32, 'KABUPATEN SUBANG'),
(3214, 32, 'KABUPATEN PURWAKARTA'),
(3215, 32, 'KABUPATEN KARAWANG'),
(3216, 32, 'KABUPATEN BEKASI'),
(3217, 32, 'KABUPATEN BANDUNG BARAT'),
(3218, 32, 'KABUPATEN PANGANDARAN'),
(3271, 32, 'KOTA BOGOR'),
(3272, 32, 'KOTA SUKABUMI'),
(3273, 32, 'KOTA BANDUNG'),
(3274, 32, 'KOTA CIREBON'),
(3275, 32, 'KOTA BEKASI'),
(3276, 32, 'KOTA DEPOK'),
(3277, 32, 'KOTA CIMAHI'),
(3278, 32, 'KOTA TASIKMALAYA'),
(3279, 32, 'KOTA BANJAR'),
(3301, 33, 'KABUPATEN CILACAP'),
(3302, 33, 'KABUPATEN BANYUMAS'),
(3303, 33, 'KABUPATEN PURBALINGGA'),
(3304, 33, 'KABUPATEN BANJARNEGARA'),
(3305, 33, 'KABUPATEN KEBUMEN'),
(3306, 33, 'KABUPATEN PURWOREJO'),
(3307, 33, 'KABUPATEN WONOSOBO'),
(3308, 33, 'KABUPATEN MAGELANG'),
(3309, 33, 'KABUPATEN BOYOLALI'),
(3310, 33, 'KABUPATEN KLATEN'),
(3311, 33, 'KABUPATEN SUKOHARJO'),
(3312, 33, 'KABUPATEN WONOGIRI'),
(3313, 33, 'KABUPATEN KARANGANYAR'),
(3314, 33, 'KABUPATEN SRAGEN'),
(3315, 33, 'KABUPATEN GROBOGAN'),
(3316, 33, 'KABUPATEN BLORA'),
(3317, 33, 'KABUPATEN REMBANG'),
(3318, 33, 'KABUPATEN PATI'),
(3319, 33, 'KABUPATEN KUDUS'),
(3320, 33, 'KABUPATEN JEPARA'),
(3321, 33, 'KABUPATEN DEMAK'),
(3322, 33, 'KABUPATEN SEMARANG'),
(3323, 33, 'KABUPATEN TEMANGGUNG'),
(3324, 33, 'KABUPATEN KENDAL'),
(3325, 33, 'KABUPATEN BATANG'),
(3326, 33, 'KABUPATEN PEKALONGAN'),
(3327, 33, 'KABUPATEN PEMALANG'),
(3328, 33, 'KABUPATEN TEGAL'),
(3329, 33, 'KABUPATEN BREBES'),
(3371, 33, 'KOTA MAGELANG'),
(3372, 33, 'KOTA SURAKARTA'),
(3373, 33, 'KOTA SALATIGA'),
(3374, 33, 'KOTA SEMARANG'),
(3375, 33, 'KOTA PEKALONGAN'),
(3376, 33, 'KOTA TEGAL'),
(3401, 34, 'KABUPATEN KULON PROGO'),
(3402, 34, 'KABUPATEN BANTUL'),
(3403, 34, 'KABUPATEN GUNUNG KIDUL'),
(3404, 34, 'KABUPATEN SLEMAN'),
(3471, 34, 'KOTA YOGYAKARTA'),
(3501, 35, 'KABUPATEN PACITAN'),
(3502, 35, 'KABUPATEN PONOROGO'),
(3503, 35, 'KABUPATEN TRENGGALEK'),
(3504, 35, 'KABUPATEN TULUNGAGUNG'),
(3505, 35, 'KABUPATEN BLITAR'),
(3506, 35, 'KABUPATEN KEDIRI'),
(3507, 35, 'KABUPATEN MALANG'),
(3508, 35, 'KABUPATEN LUMAJANG'),
(3509, 35, 'KABUPATEN JEMBER'),
(3510, 35, 'KABUPATEN BANYUWANGI'),
(3511, 35, 'KABUPATEN BONDOWOSO'),
(3512, 35, 'KABUPATEN SITUBONDO'),
(3513, 35, 'KABUPATEN PROBOLINGGO'),
(3514, 35, 'KABUPATEN PASURUAN'),
(3515, 35, 'KABUPATEN SIDOARJO'),
(3516, 35, 'KABUPATEN MOJOKERTO'),
(3517, 35, 'KABUPATEN JOMBANG'),
(3518, 35, 'KABUPATEN NGANJUK'),
(3519, 35, 'KABUPATEN MADIUN'),
(3520, 35, 'KABUPATEN MAGETAN'),
(3521, 35, 'KABUPATEN NGAWI'),
(3522, 35, 'KABUPATEN BOJONEGORO'),
(3523, 35, 'KABUPATEN TUBAN'),
(3524, 35, 'KABUPATEN LAMONGAN'),
(3525, 35, 'KABUPATEN GRESIK'),
(3526, 35, 'KABUPATEN BANGKALAN'),
(3527, 35, 'KABUPATEN SAMPANG'),
(3528, 35, 'KABUPATEN PAMEKASAN'),
(3529, 35, 'KABUPATEN SUMENEP'),
(3571, 35, 'KOTA KEDIRI'),
(3572, 35, 'KOTA BLITAR'),
(3573, 35, 'KOTA MALANG'),
(3574, 35, 'KOTA PROBOLINGGO'),
(3575, 35, 'KOTA PASURUAN'),
(3576, 35, 'KOTA MOJOKERTO'),
(3577, 35, 'KOTA MADIUN'),
(3578, 35, 'KOTA SURABAYA'),
(3579, 35, 'KOTA BATU'),
(3601, 36, 'KABUPATEN PANDEGLANG'),
(3602, 36, 'KABUPATEN LEBAK'),
(3603, 36, 'KABUPATEN TANGERANG'),
(3604, 36, 'KABUPATEN SERANG'),
(3671, 36, 'KOTA TANGERANG'),
(3672, 36, 'KOTA CILEGON'),
(3673, 36, 'KOTA SERANG'),
(3674, 36, 'KOTA TANGERANG SELATAN'),
(5101, 51, 'KABUPATEN JEMBRANA'),
(5102, 51, 'KABUPATEN TABANAN'),
(5103, 51, 'KABUPATEN BADUNG'),
(5104, 51, 'KABUPATEN GIANYAR'),
(5105, 51, 'KABUPATEN KLUNGKUNG'),
(5106, 51, 'KABUPATEN BANGLI'),
(5107, 51, 'KABUPATEN KARANG ASEM'),
(5108, 51, 'KABUPATEN BULELENG'),
(5171, 51, 'KOTA DENPASAR'),
(5201, 52, 'KABUPATEN LOMBOK BARAT'),
(5202, 52, 'KABUPATEN LOMBOK TENGAH'),
(5203, 52, 'KABUPATEN LOMBOK TIMUR'),
(5204, 52, 'KABUPATEN SUMBAWA'),
(5205, 52, 'KABUPATEN DOMPU'),
(5206, 52, 'KABUPATEN BIMA'),
(5207, 52, 'KABUPATEN SUMBAWA BARAT'),
(5208, 52, 'KABUPATEN LOMBOK UTARA'),
(5271, 52, 'KOTA MATARAM'),
(5272, 52, 'KOTA BIMA'),
(5301, 53, 'KABUPATEN SUMBA BARAT'),
(5302, 53, 'KABUPATEN SUMBA TIMUR'),
(5303, 53, 'KABUPATEN KUPANG'),
(5304, 53, 'KABUPATEN TIMOR TENGAH SELATAN'),
(5305, 53, 'KABUPATEN TIMOR TENGAH UTARA'),
(5306, 53, 'KABUPATEN BELU'),
(5307, 53, 'KABUPATEN ALOR'),
(5308, 53, 'KABUPATEN LEMBATA'),
(5309, 53, 'KABUPATEN FLORES TIMUR'),
(5310, 53, 'KABUPATEN SIKKA'),
(5311, 53, 'KABUPATEN ENDE'),
(5312, 53, 'KABUPATEN NGADA'),
(5313, 53, 'KABUPATEN MANGGARAI'),
(5314, 53, 'KABUPATEN ROTE NDAO'),
(5315, 53, 'KABUPATEN MANGGARAI BARAT'),
(5316, 53, 'KABUPATEN SUMBA TENGAH'),
(5317, 53, 'KABUPATEN SUMBA BARAT DAYA'),
(5318, 53, 'KABUPATEN NAGEKEO'),
(5319, 53, 'KABUPATEN MANGGARAI TIMUR'),
(5320, 53, 'KABUPATEN SABU RAIJUA'),
(5321, 53, 'KABUPATEN MALAKA'),
(5371, 53, 'KOTA KUPANG'),
(6101, 61, 'KABUPATEN SAMBAS'),
(6102, 61, 'KABUPATEN BENGKAYANG'),
(6103, 61, 'KABUPATEN LANDAK'),
(6104, 61, 'KABUPATEN MEMPAWAH'),
(6105, 61, 'KABUPATEN SANGGAU'),
(6106, 61, 'KABUPATEN KETAPANG'),
(6107, 61, 'KABUPATEN SINTANG'),
(6108, 61, 'KABUPATEN KAPUAS HULU'),
(6109, 61, 'KABUPATEN SEKADAU'),
(6110, 61, 'KABUPATEN MELAWI'),
(6111, 61, 'KABUPATEN KAYONG UTARA'),
(6112, 61, 'KABUPATEN KUBU RAYA'),
(6171, 61, 'KOTA PONTIANAK'),
(6172, 61, 'KOTA SINGKAWANG'),
(6201, 62, 'KABUPATEN KOTAWARINGIN BARAT'),
(6202, 62, 'KABUPATEN KOTAWARINGIN TIMUR'),
(6203, 62, 'KABUPATEN KAPUAS'),
(6204, 62, 'KABUPATEN BARITO SELATAN'),
(6205, 62, 'KABUPATEN BARITO UTARA'),
(6206, 62, 'KABUPATEN SUKAMARA'),
(6207, 62, 'KABUPATEN LAMANDAU'),
(6208, 62, 'KABUPATEN SERUYAN'),
(6209, 62, 'KABUPATEN KATINGAN'),
(6210, 62, 'KABUPATEN PULANG PISAU'),
(6211, 62, 'KABUPATEN GUNUNG MAS'),
(6212, 62, 'KABUPATEN BARITO TIMUR'),
(6213, 62, 'KABUPATEN MURUNG RAYA'),
(6271, 62, 'KOTA PALANGKA RAYA'),
(6301, 63, 'KABUPATEN TANAH LAUT'),
(6302, 63, 'KABUPATEN KOTA BARU'),
(6303, 63, 'KABUPATEN BANJAR'),
(6304, 63, 'KABUPATEN BARITO KUALA'),
(6305, 63, 'KABUPATEN TAPIN'),
(6306, 63, 'KABUPATEN HULU SUNGAI SELATAN'),
(6307, 63, 'KABUPATEN HULU SUNGAI TENGAH'),
(6308, 63, 'KABUPATEN HULU SUNGAI UTARA'),
(6309, 63, 'KABUPATEN TABALONG'),
(6310, 63, 'KABUPATEN TANAH BUMBU'),
(6311, 63, 'KABUPATEN BALANGAN'),
(6371, 63, 'KOTA BANJARMASIN'),
(6372, 63, 'KOTA BANJAR BARU'),
(6401, 64, 'KABUPATEN PASER'),
(6402, 64, 'KABUPATEN KUTAI BARAT'),
(6403, 64, 'KABUPATEN KUTAI KARTANEGARA'),
(6404, 64, 'KABUPATEN KUTAI TIMUR'),
(6405, 64, 'KABUPATEN BERAU'),
(6409, 64, 'KABUPATEN PENAJAM PASER UTARA'),
(6411, 64, 'KABUPATEN MAHAKAM HULU'),
(6471, 64, 'KOTA BALIKPAPAN'),
(6472, 64, 'KOTA SAMARINDA'),
(6474, 64, 'KOTA BONTANG'),
(6501, 65, 'KABUPATEN MALINAU'),
(6502, 65, 'KABUPATEN BULUNGAN'),
(6503, 65, 'KABUPATEN TANA TIDUNG'),
(6504, 65, 'KABUPATEN NUNUKAN'),
(6571, 65, 'KOTA TARAKAN'),
(7101, 71, 'KABUPATEN BOLAANG MONGONDOW'),
(7102, 71, 'KABUPATEN MINAHASA'),
(7103, 71, 'KABUPATEN KEPULAUAN SANGIHE'),
(7104, 71, 'KABUPATEN KEPULAUAN TALAUD'),
(7105, 71, 'KABUPATEN MINAHASA SELATAN'),
(7106, 71, 'KABUPATEN MINAHASA UTARA'),
(7107, 71, 'KABUPATEN BOLAANG MONGONDOW UTARA'),
(7108, 71, 'KABUPATEN SIAU TAGULANDANG BIARO'),
(7109, 71, 'KABUPATEN MINAHASA TENGGARA'),
(7110, 71, 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
(7111, 71, 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
(7171, 71, 'KOTA MANADO'),
(7172, 71, 'KOTA BITUNG'),
(7173, 71, 'KOTA TOMOHON'),
(7174, 71, 'KOTA KOTAMOBAGU'),
(7201, 72, 'KABUPATEN BANGGAI KEPULAUAN'),
(7202, 72, 'KABUPATEN BANGGAI'),
(7203, 72, 'KABUPATEN MOROWALI'),
(7204, 72, 'KABUPATEN POSO'),
(7205, 72, 'KABUPATEN DONGGALA'),
(7206, 72, 'KABUPATEN TOLI-TOLI'),
(7207, 72, 'KABUPATEN BUOL'),
(7208, 72, 'KABUPATEN PARIGI MOUTONG'),
(7209, 72, 'KABUPATEN TOJO UNA-UNA'),
(7210, 72, 'KABUPATEN SIGI'),
(7211, 72, 'KABUPATEN BANGGAI LAUT'),
(7212, 72, 'KABUPATEN MOROWALI UTARA'),
(7271, 72, 'KOTA PALU'),
(7301, 73, 'KABUPATEN KEPULAUAN SELAYAR'),
(7302, 73, 'KABUPATEN BULUKUMBA'),
(7303, 73, 'KABUPATEN BANTAENG'),
(7304, 73, 'KABUPATEN JENEPONTO'),
(7305, 73, 'KABUPATEN TAKALAR'),
(7306, 73, 'KABUPATEN GOWA'),
(7307, 73, 'KABUPATEN SINJAI'),
(7308, 73, 'KABUPATEN MAROS'),
(7309, 73, 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
(7310, 73, 'KABUPATEN BARRU'),
(7311, 73, 'KABUPATEN BONE'),
(7312, 73, 'KABUPATEN SOPPENG'),
(7313, 73, 'KABUPATEN WAJO'),
(7314, 73, 'KABUPATEN SIDENRENG RAPPANG'),
(7315, 73, 'KABUPATEN PINRANG'),
(7316, 73, 'KABUPATEN ENREKANG'),
(7317, 73, 'KABUPATEN LUWU'),
(7318, 73, 'KABUPATEN TANA TORAJA'),
(7322, 73, 'KABUPATEN LUWU UTARA'),
(7325, 73, 'KABUPATEN LUWU TIMUR'),
(7326, 73, 'KABUPATEN TORAJA UTARA'),
(7371, 73, 'KOTA MAKASSAR'),
(7372, 73, 'KOTA PAREPARE'),
(7373, 73, 'KOTA PALOPO'),
(7401, 74, 'KABUPATEN BUTON'),
(7402, 74, 'KABUPATEN MUNA'),
(7403, 74, 'KABUPATEN KONAWE'),
(7404, 74, 'KABUPATEN KOLAKA'),
(7405, 74, 'KABUPATEN KONAWE SELATAN'),
(7406, 74, 'KABUPATEN BOMBANA'),
(7407, 74, 'KABUPATEN WAKATOBI'),
(7408, 74, 'KABUPATEN KOLAKA UTARA'),
(7409, 74, 'KABUPATEN BUTON UTARA'),
(7410, 74, 'KABUPATEN KONAWE UTARA'),
(7411, 74, 'KABUPATEN KOLAKA TIMUR'),
(7412, 74, 'KABUPATEN KONAWE KEPULAUAN'),
(7413, 74, 'KABUPATEN MUNA BARAT'),
(7414, 74, 'KABUPATEN BUTON TENGAH'),
(7415, 74, 'KABUPATEN BUTON SELATAN'),
(7471, 74, 'KOTA KENDARI'),
(7472, 74, 'KOTA BAUBAU'),
(7501, 75, 'KABUPATEN BOALEMO'),
(7502, 75, 'KABUPATEN GORONTALO'),
(7503, 75, 'KABUPATEN POHUWATO'),
(7504, 75, 'KABUPATEN BONE BOLANGO'),
(7505, 75, 'KABUPATEN GORONTALO UTARA'),
(7571, 75, 'KOTA GORONTALO'),
(7601, 76, 'KABUPATEN MAJENE'),
(7602, 76, 'KABUPATEN POLEWALI MANDAR'),
(7603, 76, 'KABUPATEN MAMASA'),
(7604, 76, 'KABUPATEN MAMUJU'),
(7605, 76, 'KABUPATEN MAMUJU UTARA'),
(7606, 76, 'KABUPATEN MAMUJU TENGAH'),
(8101, 81, 'KABUPATEN MALUKU TENGGARA BARAT'),
(8102, 81, 'KABUPATEN MALUKU TENGGARA'),
(8103, 81, 'KABUPATEN MALUKU TENGAH'),
(8104, 81, 'KABUPATEN BURU'),
(8105, 81, 'KABUPATEN KEPULAUAN ARU'),
(8106, 81, 'KABUPATEN SERAM BAGIAN BARAT'),
(8107, 81, 'KABUPATEN SERAM BAGIAN TIMUR'),
(8108, 81, 'KABUPATEN MALUKU BARAT DAYA'),
(8109, 81, 'KABUPATEN BURU SELATAN'),
(8171, 81, 'KOTA AMBON'),
(8172, 81, 'KOTA TUAL'),
(8201, 82, 'KABUPATEN HALMAHERA BARAT'),
(8202, 82, 'KABUPATEN HALMAHERA TENGAH'),
(8203, 82, 'KABUPATEN KEPULAUAN SULA'),
(8204, 82, 'KABUPATEN HALMAHERA SELATAN'),
(8205, 82, 'KABUPATEN HALMAHERA UTARA'),
(8206, 82, 'KABUPATEN HALMAHERA TIMUR'),
(8207, 82, 'KABUPATEN PULAU MOROTAI'),
(8208, 82, 'KABUPATEN PULAU TALIABU'),
(8271, 82, 'KOTA TERNATE'),
(8272, 82, 'KOTA TIDORE KEPULAUAN'),
(9101, 91, 'KABUPATEN FAKFAK'),
(9102, 91, 'KABUPATEN KAIMANA'),
(9103, 91, 'KABUPATEN TELUK WONDAMA'),
(9104, 91, 'KABUPATEN TELUK BINTUNI'),
(9105, 91, 'KABUPATEN MANOKWARI'),
(9106, 91, 'KABUPATEN SORONG SELATAN'),
(9107, 91, 'KABUPATEN SORONG'),
(9108, 91, 'KABUPATEN RAJA AMPAT'),
(9109, 91, 'KABUPATEN TAMBRAUW'),
(9110, 91, 'KABUPATEN MAYBRAT'),
(9111, 91, 'KABUPATEN MANOKWARI SELATAN'),
(9112, 91, 'KABUPATEN PEGUNUNGAN ARFAK'),
(9171, 91, 'KOTA SORONG'),
(9401, 94, 'KABUPATEN MERAUKE'),
(9402, 94, 'KABUPATEN JAYAWIJAYA'),
(9403, 94, 'KABUPATEN JAYAPURA'),
(9404, 94, 'KABUPATEN NABIRE'),
(9408, 94, 'KABUPATEN KEPULAUAN YAPEN'),
(9409, 94, 'KABUPATEN BIAK NUMFOR'),
(9410, 94, 'KABUPATEN PANIAI'),
(9411, 94, 'KABUPATEN PUNCAK JAYA'),
(9412, 94, 'KABUPATEN MIMIKA'),
(9413, 94, 'KABUPATEN BOVEN DIGOEL'),
(9414, 94, 'KABUPATEN MAPPI'),
(9415, 94, 'KABUPATEN ASMAT'),
(9416, 94, 'KABUPATEN YAHUKIMO'),
(9417, 94, 'KABUPATEN PEGUNUNGAN BINTANG'),
(9418, 94, 'KABUPATEN TOLIKARA'),
(9419, 94, 'KABUPATEN SARMI'),
(9420, 94, 'KABUPATEN KEEROM'),
(9426, 94, 'KABUPATEN WAROPEN'),
(9427, 94, 'KABUPATEN SUPIORI'),
(9428, 94, 'KABUPATEN MAMBERAMO RAYA'),
(9429, 94, 'KABUPATEN NDUGA'),
(9430, 94, 'KABUPATEN LANNY JAYA'),
(9431, 94, 'KABUPATEN MAMBERAMO TENGAH'),
(9432, 94, 'KABUPATEN YALIMO'),
(9433, 94, 'KABUPATEN PUNCAK'),
(9434, 94, 'KABUPATEN DOGIYAI'),
(9435, 94, 'KABUPATEN INTAN JAYA'),
(9436, 94, 'KABUPATEN DEIYAI'),
(9471, 94, 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_store_id` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `logo`, `banner`, `name`, `category_store_id`, `desc`, `instagram`, `facebook`, `email`, `phone`, `alamat`, `kota`, `provinsi`, `kodepos`, `created_at`, `updated_at`) VALUES
(4, 2, '/uploads/media_663c69944639f.png', '/uploads/media_663c6994469d3.jpg', 'Ibox Store Jakarta', '--Pilih Kategori Store--', 'Magna rerum autem ma', 'Velit commodi id m', 'Laborum suscipit non', 'dewe@mailinator.com', '+1 (321) 421-1959', 'Numquam omnis animi', '3401', '34', 16081, '2024-05-08 23:13:40', '2024-05-11 07:03:30'),
(5, 20, '/uploads/media_664aae9d35ae7.png', '/uploads/media_664aae9d35e62.png', 'Callum Merritt', 'Chicago', 'Ex ut porro est even', 'Aut sed ad exercitat', 'Duis deserunt eius o', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-19 18:59:57', '2024-05-19 18:59:57'),
(6, 21, '/uploads/media_664ab0005c6f3.png', '/uploads/media_664ab0005cb58.png', 'Lara Nguyen', '--Pilih Kategori Store--', 'Dicta maiores corpor', 'Elit ad magni archi', 'Voluptates ullamco t', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-19 19:05:52', '2024-05-19 19:05:52'),
(7, 24, '/uploads/media_664ab149aa863.png', '/uploads/media_664ab149aafc6.png', 'Fallon Marsh', 'Chicago', 'Impedit atque eos', 'Ipsam at velit magna', 'Mollit eiusmod moles', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-19 19:11:21', '2024-05-19 19:11:21'),
(8, 33, '/uploads/media_664b470356b41.png', '/uploads/media_664b470356f2f.png', 'Levi Harmon', '19', 'Distinctio Providen', 'Adipisci consequatur', 'Illum labore exerci', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-20 05:50:11', '2024-05-20 05:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

CREATE TABLE `store_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(16, 'Bahan bangunan', '2024-04-28 08:57:28', '2024-04-28 08:57:28'),
(17, 'Interior', '2024-04-28 08:57:37', '2024-04-28 08:57:37'),
(18, 'Furniture', '2024-04-28 08:57:44', '2024-04-28 08:57:44'),
(19, 'Perkakas/alat kerja', '2024-04-28 08:57:55', '2024-04-28 08:57:55'),
(20, 'Beton', '2024-04-28 09:12:40', '2024-04-28 09:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `store_products`
--

CREATE TABLE `store_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `tag` varchar(255) NOT NULL,
  `normal_price` int(11) NOT NULL,
  `display_price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT 0,
  `ratings` varchar(255) NOT NULL DEFAULT '0',
  `review` varchar(255) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_products`
--

INSERT INTO `store_products` (`id`, `store_id`, `image`, `name`, `slug`, `category`, `desc`, `stock`, `tag`, `normal_price`, `display_price`, `discount_price`, `ratings`, `review`, `status`, `created_at`, `updated_at`) VALUES
(19, 4, '/uploads/media_6648e5fd4b6ae.png', 'Dawn Gallagheraaa', 'dawn-gallagher', 'Furniture', '<div>ada</div>', 40, 'dawn', 600100, 59000, 9000, '0', '0', 1, '2024-05-09 00:06:02', '2024-05-18 10:31:59'),
(20, 4, '/uploads/media_6648e5f511694.png', 'Ashton George', 'ashton-george', 'Bahan bangunan', '<div>Ipsa reprehenderit</div>', 61, 'ashton', 976, 155, 821, '0', '0', 1, '2024-05-09 00:20:29', '2024-05-18 10:31:33'),
(21, 4, '/uploads/media_663c7a40cfd1a.jpg', 'Simone Barr', 'simone-barr', 'Bahan bangunan', '<div>Consequuntur velit n.</div>', 24, 'barr', 3911, 3152, 759, '0', '0', 1, '2024-05-09 00:24:48', '2024-05-09 00:24:48'),
(22, 4, '/uploads/media_663c7a86aac9c.jpg', 'Kaos Programmer', 'kaos-programmer', 'Interior', '<div>&nbsp;<strong>Cara Pakai:<br></strong>&nbsp;1. Working quietly. It would not be disruptive while you nap and sleep<br>2. 250ml large capacity<br>3. Automatic power failure protection, anti-dry<br>&nbsp;<br><strong>&nbsp;Kegunaan:<br></strong>&nbsp;1. Working quietly. It would not be disruptive while you nap and sleep<br>2. 250ml large capacity<br>3. Automatic power failure protection, anti-dry<br><br>&nbsp;<strong>Bedanya sama produk lain apa sih???<br></strong>&nbsp;1. Working quietly. It would not be disruptive while you nap and sleep&nbsp;<br>2. 250ml large capacity&nbsp;<br>3. Automatic power failure protection, anti-dry&nbsp;</div>', 120, 'kaos', 200000, 165000, 35000, '0', '0', 1, '2024-05-09 00:25:58', '2024-05-09 00:25:58'),
(23, 5, '/uploads/media_664aaeab458d5.png', 'Aphrodite Church', 'aphrodite-church', 'Bahan bangunan', '<div>Ullamco iusto quis e.</div>', 83, 'church', 663, 532, 131, '0', '0', 1, '2024-05-19 19:00:04', '2024-05-19 19:00:11'),
(24, 6, '/uploads/media_664ab0141a7cb.png', 'Jin Hays', 'jin-hays', 'Bahan bangunan', '<div>Amet, exercitationem.</div>', 86000, 'hays', 340, 184, 156, '0', '0', 1, '2024-05-19 19:06:12', '2024-05-19 19:06:12'),
(25, 7, '/uploads/media_664ab157bcbd4.png', 'Timon Cobb', 'timon-cobb', 'Bahan bangunan', '<div>Voluptatibus ut mini.</div>', 56, 'cobb', 335, -240, 575, '0', '0', 1, '2024-05-19 19:11:28', '2024-05-19 19:11:35'),
(26, 8, '/uploads/media_664b47158347c.png', 'Xanthus Orr', 'xanthus-orr', 'Bahan bangunan', '<div>Quia dolor cupidatat.</div>', 15, 'orr', 818, 349, 469, '0', '0', 1, '2024-05-20 05:50:22', '2024-05-20 05:50:29'),
(27, 4, '/uploads/media_664deac49a59a.png', 'Kaos Kalbe', 'kaos-kalbe', 'Perkakas/alat kerja', '<div>test aja&nbsp;</div>', 70, 'kaos', 50000, 40000, 10000, '0', '0', 1, '2024-05-22 05:53:24', '2024-05-22 05:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '/default_uploads/avatar.jpg',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('customer','vendor','professional','store') NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'samsung corp.', '/default_uploads/avatar.jpg', 'samsung@gmail.com', NULL, 'vendor', '$2y$12$qEG8931ZsNrIouLFP5U48OTQKAhYC4dQeD6qxHF6L6a9KWwZd6S0K', NULL, '2024-04-13 22:38:11', '2024-04-22 00:58:29'),
(2, 'ibox jakarta', '/default_uploads/avatar.jpg', 'ibox@gmail.com', NULL, 'store', '$2y$12$2U1lAWtxl5KU913wmSOY/.UKvJV3PFcyISEr5./P676MVs9vaBNS6', NULL, '2024-04-13 23:00:30', '2024-04-16 19:18:21'),
(3, 'adikarya Tbk Perseroo', '/default_uploads/avatar.jpg', 'adikarya@gmail.com', NULL, 'professional', '$2y$12$oMvSr0eCRGBBP3p9xiEHtO.hclN/UTFWVcni9/fM5Zb7qUAkHxnoG', NULL, '2024-04-13 23:01:23', '2024-05-04 22:31:34'),
(4, 'Kylian Mbappé', '/default_uploads/avatar.jpg', 'khaled@gmail.com', NULL, 'customer', '$2y$12$4ZGI19t8S/W6./olka19cu6IEjsLezpTJyWBjNiPD/96AXQ5PNiNi', NULL, '2024-04-13 23:02:12', '2024-05-10 20:41:08'),
(5, 'Sima Nahdia', '/default_uploads/avatar.jpg', 'simanahdia@gmail.com', NULL, 'professional', '$2y$12$v8JWCLo6acRiUqSVek/lOe.uOUhaYIZt5W.JtGokVQ7/g18wlH41q', NULL, '2024-04-28 09:24:27', '2024-04-28 09:24:27'),
(7, 'Firda Rosiana Tanjung', '/default_uploads/avatar.jpg', 'firdaroziana10@gmail.com', NULL, 'customer', '$2y$12$JmBPV44tktv7nbPyaG30geMAB0QKAM349oUM2qxxZMBM7KxdEL9fq', NULL, '2024-05-07 23:48:11', '2024-05-07 23:48:11'),
(11, 'Piper Stout', '/default_uploads/avatar.jpg', 'matahari@gmail.com', NULL, 'vendor', '$2y$12$gOlCHcxfqMfl2lrOOxdjFO0BRriQlSg5yshmIWskcLOFudhA/qFNe', NULL, '2024-05-14 18:03:16', '2024-05-14 18:03:16'),
(12, 'firda', '/default_uploads/avatar.jpg', 'firdarsn@gmail.com', NULL, 'customer', '$2y$12$Fe9/j.QmrKismnyYd91JeuV1X2vpya77fzmS/tv.OxGsEwQtkEpHi', NULL, '2024-05-19 15:51:42', '2024-05-19 15:51:42'),
(13, 'zack', '/default_uploads/avatar.jpg', 'zack@gmail.com', NULL, 'customer', '$2y$12$5JM3BZ0G6.ttv.h4jbaLz.icY/1hLVlR3ILw4VPcNQ1jUHVGQ/PD2', NULL, '2024-05-19 15:58:55', '2024-05-19 15:58:55'),
(14, 'professional id', '/default_uploads/avatar.jpg', 'professional@gmail.com', NULL, 'professional', '$2y$12$00jWMka4z7BgDSJ4ACIgZuDXiX3RvlWLKGAOiKiZbwYPPqIoazFd.', NULL, '2024-05-19 15:59:32', '2024-05-19 15:59:32'),
(15, 'Kennan Burris', '/default_uploads/avatar.jpg', 'xyz@gmail.com', NULL, 'professional', '$2y$12$JspGn.Wot2KPs3tYZbG7heQHCiZCqb6lWnyYpjP2R7mzGFZqfKIP.', NULL, '2024-05-19 18:26:25', '2024-05-19 18:26:25'),
(16, 'Uma Bowen', '/default_uploads/avatar.jpg', 'ivana@gmail.com', NULL, 'vendor', '$2y$12$RSWCOwZzck0sNB1Szj/piuLIHx.koQNWNTmjT4XpHZy8ymZNfSAVq', NULL, '2024-05-19 18:27:15', '2024-05-19 18:27:15'),
(17, 'Dani Alves Serrano', '/default_uploads/avatar.jpg', 'danialves@gmail.com', NULL, 'store', '$2y$12$RDixIfmyJHJAPSvOLUoLgees4Omufmx2U4TiMrQGLKAfGnKzBwTQi', NULL, '2024-05-19 18:34:18', '2024-05-19 18:34:18'),
(18, 'Aimee Dudley', '/default_uploads/avatar.jpg', 'cuzi@mailinator.com', NULL, 'professional', '$2y$12$k/2qR6S3ay4ME0OI1mCyNujritqi.UZa7XDkGnqS0IsGkRequPHPy', NULL, '2024-05-19 18:39:29', '2024-05-19 18:39:29'),
(19, 'Hadassah Whitley', '/default_uploads/avatar.jpg', 'kafahylyl@mailinator.com', NULL, 'vendor', '$2y$12$XUnPl/bJ696EHDa22PhdNOkIvXkRTBsiKSM7YuWS4kLrOKfZ38j.i', NULL, '2024-05-19 18:39:40', '2024-05-19 18:39:40'),
(20, 'Fuji Jeremy Osborn', '/default_uploads/avatar.jpg', 'fuji@gmail.com', NULL, 'store', '$2y$12$CzLqs2iCCKcEFXaTYWheweSlqeuE0VNYXzfm8hDIxD6p8xJWo1F8y', NULL, '2024-05-19 18:58:22', '2024-05-19 18:58:22'),
(21, 'Chelsea Woodard', '/default_uploads/avatar.jpg', 'panavu@mailinator.com', NULL, 'store', '$2y$12$E3p/JR.WtuKX4nNQoC7lEumckIJSagx27eUcmF7AoYEQk9hPDiWTa', NULL, '2024-05-19 19:01:52', '2024-05-19 19:01:52'),
(22, 'Latifah Fulton', '/default_uploads/avatar.jpg', 'ruqik@mailinator.com', NULL, 'vendor', '$2y$12$mMCxaTGmbxYIPErldd0s5ObeAalDPFssbFpeck5zUQsOFREIc7pLS', NULL, '2024-05-19 19:07:40', '2024-05-19 19:07:40'),
(23, 'Orla Hart', '/default_uploads/avatar.jpg', 'myzavatup@mailinator.com', NULL, 'professional', '$2y$12$1dgaHZq0MF9nb3Y1vEFdYOEoCI1pd9vrvhsjF20.3RGHmYvPjaExm', NULL, '2024-05-19 19:09:35', '2024-05-19 19:09:35'),
(24, 'Joseph Chambers', '/default_uploads/avatar.jpg', 'hozequgy@mailinator.com', NULL, 'store', '$2y$12$iUkGB/b5bdDL59tzPdz/3u0v3mlfpteuuvKwVfMV2t3JtiwYh0s4W', NULL, '2024-05-19 19:10:59', '2024-05-19 19:10:59'),
(25, 'Norman Kane', '/default_uploads/avatar.jpg', 'zufajozif@mailinator.com', NULL, 'professional', '$2y$12$cx.Ah9BOGiTZ5ujzJUfkqua5Qi4yNnP1h6rUmn0AaUCxDUn/FSHWy', NULL, '2024-05-20 00:40:04', '2024-05-20 00:40:04'),
(26, 'rahmahh', '/default_uploads/avatar.jpg', 'rahmah@gmail.com', NULL, 'store', '$2y$12$poCufd4CPBtUQnLxyUSpBuBFfYBN0rixuefeJ3D46V3pRe.0aQGp.', NULL, '2024-05-20 02:27:50', '2024-05-20 02:27:50'),
(27, 'Drew Spears', '/default_uploads/avatar.jpg', 'andrew@gmail.com', NULL, 'professional', '$2y$12$aL1WljAt4nuoc2GLUyaUWecBlcD6KYGK/P1oOdfIlpfMMycWOkj6q', NULL, '2024-05-20 04:33:12', '2024-05-20 04:33:12'),
(28, 'Regina Bernard', '/default_uploads/avatar.jpg', 'xizypi@mailinator.com', NULL, 'professional', '$2y$12$3G1l4WJ7dUWG1/VkeIam8OQefEr3DJVc9bpKBqPunIEkp1cOk1m8S', NULL, '2024-05-20 05:33:25', '2024-05-20 05:33:25'),
(29, 'lisna', '/default_uploads/avatar.jpg', 'lisna@gmail.com', NULL, 'customer', '$2y$12$OOMsKTdYESi2Hdje7uvYrObWvQKnPUSnk2jIP954sIfxGjHwzpxG2', NULL, '2024-05-20 05:39:52', '2024-05-20 05:39:52'),
(30, 'farhan sidiqillah', '/default_uploads/avatar.jpg', 'farhan@gmail.com', NULL, 'customer', '$2y$12$9plwl3pwE/LsE8CIXexQTOBh0hKvooEuDyBqj6b/jS8HPQ8Sie8bu', NULL, '2024-05-20 05:45:09', '2024-05-20 05:45:09'),
(31, 'Alice Fischer', '/default_uploads/avatar.jpg', 'petepymabi@mailinator.com', NULL, 'professional', '$2y$12$no4QmuFf244wPKpq0KeML.dFZRVZdLaIdpjgUXc9SiZOZiRApkJJa', NULL, '2024-05-20 05:47:25', '2024-05-20 05:47:25'),
(32, 'James Bonner', '/default_uploads/avatar.jpg', 'cubazog@mailinator.com', NULL, 'vendor', '$2y$12$I1oxhQ4gHPRuWgWEokMRN.MTzPc.2Xy0TxcbsH0O8WGK3j8jasI0.', NULL, '2024-05-20 05:47:59', '2024-05-20 05:47:59'),
(33, 'Brielle Delgado', '/default_uploads/avatar.jpg', 'zeqagylow@mailinator.com', NULL, 'store', '$2y$12$18plNvdblgSmO99ich9rauvz.nOGFWt82phcUQHC6MMP4bjkhhwLm', NULL, '2024-05-20 05:48:17', '2024-05-20 05:48:17'),
(34, 'Price Reyes', '/default_uploads/avatar.jpg', 'zyta@mailinator.com', NULL, 'customer', '$2y$12$NB5yIl8f1x4ghXQMvDb81uF/NWYwFdQqvqKQI7H7YXje.sG3J1GMK', NULL, '2024-05-20 07:36:28', '2024-05-20 07:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_vendor_id` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `logo`, `banner`, `name`, `category_vendor_id`, `desc`, `instagram`, `facebook`, `email`, `phone`, `alamat`, `kota`, `provinsi`, `kodepos`, `created_at`, `updated_at`) VALUES
(1, 1, '/uploads/media_6648e8d15534c.png', '/uploads/media_662616664161a.jpg', 'SAMSUNG', '5', 'Magna rerum autem ma', 'Voluptates autem cil', 'Labore accusantium r', 'samsung@mailinator.com', '+1 (404) 553-8044', 'Girimulyo, Jl. Jend Ahmad Yani', '3403', '34', 17540, '2024-04-22 00:48:54', '2024-05-18 10:43:45'),
(2, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'matahari@gmail.com', '08192819821', 'KP. RUKO JIOS', '1402', '14', 109201, '2024-05-14 18:04:07', '2024-05-14 18:04:07'),
(3, 16, '/uploads/media_664aa7de00565.jpg', '/uploads/media_664aa7de00948.png', 'Hop Saunders', '4', 'Omnis ea vel velit r', 'Aut ut fugiat ex es', 'Est proident qui un', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-19 18:31:10', '2024-05-19 18:31:10'),
(4, 19, '/uploads/media_664aaaad46308.png', '/uploads/media_664aaaad467b6.png', 'Ivan Howard', '4', 'Numquam aut facere r', 'Illo molestiae itaqu', 'Placeat sit itaque', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-19 18:43:09', '2024-05-19 18:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_categories`
--

INSERT INTO `vendor_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Rumah Hunian', '2024-04-28 08:58:14', '2024-04-28 08:58:14'),
(4, 'Ruko Hunian', '2024-04-28 08:58:19', '2024-04-28 08:58:19'),
(5, 'Apartment', '2024-04-28 09:12:56', '2024-04-28 09:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_portfolios`
--

CREATE TABLE `vendor_portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_portfolios`
--

INSERT INTO `vendor_portfolios` (`id`, `vendor_id`, `image`, `name`, `desc`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, '/uploads/media_6648e87c8194e.png', 'Design Apartment Lumion', 'Project ini berdasarkan permintaan client untuk pembangunan apart lokasi metropolis pada tahun 2019 menggunakan software lumion 3D', '2019', '2024-05-08 19:06:07', '2024-05-18 10:42:20'),
(2, 1, '/uploads/media_664a9940bd8a1.png', 'portfolio by professional.id', 'hala madrid', '2020', '2024-05-19 17:28:48', '2024-05-19 17:28:48'),
(3, 1, '/uploads/media_664a9c2f6f970.png', 'ters', 'teet', '2022', '2024-05-19 17:41:19', '2024-05-19 17:41:19'),
(4, 3, '/uploads/media_664aa7e8717f0.png', 'Cally Wong', 'Et quis sapiente deb', '1984', '2024-05-19 18:31:20', '2024-05-19 18:31:20'),
(5, 4, '/uploads/media_664aaad99c5bd.png', 'Cherokee Jacobson', 'Error et sapiente es', '1984', '2024-05-19 18:43:53', '2024-05-19 18:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_services`
--

CREATE TABLE `vendor_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_services`
--

INSERT INTO `vendor_services` (`id`, `vendor_id`, `image`, `name`, `category`, `desc`, `status`, `price`, `created_at`, `updated_at`) VALUES
(5, 1, '/uploads/media_6648e8bae2a7e.png', 'Acton Gravesa', 'Apartment', 'Modi ut numquam volu', 1, '1000.000 - 1.999.999', '2024-05-04 22:18:22', '2024-05-18 10:43:35'),
(6, 1, '/uploads/media_663717669967d.png', 'Colleen Barron', 'Apartment', 'Id perferendis volup', 1, '3000.000 - 3.999.999', '2024-05-04 22:21:42', '2024-05-05 07:44:37'),
(7, 1, '/uploads/media_6637987379845.jpg', 'lala', 'Ruko Hunian', 'ara ara...', 1, '4000.000 - 5.999.999', '2024-05-05 07:32:19', '2024-05-05 07:37:59'),
(8, 1, '/uploads/media_6638ef771db9a.jpeg', 'test vendor biru', 'Ruko Hunian', 'test aja', 1, '3000.000 - 3.999.999', '2024-05-06 07:55:51', '2024-05-06 07:55:51'),
(9, 2, '/uploads/media_66440a236198d.png', 'Melinda Riggs', 'Rumah Hunian', 'Ad non quisquam simi', 1, '2000.000 - 2.999.999', '2024-05-14 18:04:35', '2024-05-14 18:04:35'),
(10, 3, '/uploads/media_664aa7f46e630.png', 'Yetta Stokes', 'Rumah Hunian', 'Qui quaerat aut dolo', 1, '4000.000 - 5.999.999', '2024-05-19 18:31:32', '2024-05-19 18:31:32'),
(11, 4, '/uploads/media_664aaaba29230.png', 'Yvonne Solomon', 'Rumah Hunian', 'Reprehenderit volupt', 1, '1000.000 - 1.999.999', '2024-05-19 18:43:22', '2024-05-19 18:43:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_user1_id_foreign` (`user1_id`),
  ADD KEY `conversations_user2_id_foreign` (`user2_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_carts`
--
ALTER TABLE `customer_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_carts_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `customer_checklists`
--
ALTER TABLE `customer_checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_checklists_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_checklist_items`
--
ALTER TABLE `customer_checklist_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_checklist_items_customer_checklist_id_foreign` (`customer_checklist_id`);

--
-- Indexes for table `customer_checkouts`
--
ALTER TABLE `customer_checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_checkout_items`
--
ALTER TABLE `customer_checkout_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_reviews_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `customer_service_orders`
--
ALTER TABLE `customer_service_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_service_order_items`
--
ALTER TABLE `customer_service_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_service_order_items_customer_service_order_id_foreign` (`customer_service_order_id`);

--
-- Indexes for table `customer_service_reviews`
--
ALTER TABLE `customer_service_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_notifications`
--
ALTER TABLE `general_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_transaction_proofs`
--
ALTER TABLE `general_transaction_proofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generan_transaction_proofs`
--
ALTER TABLE `generan_transaction_proofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_store_id_foreign` (`store_id`);

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
-- Indexes for table `price_ranges`
--
ALTER TABLE `price_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professionals_user_id_foreign` (`user_id`);

--
-- Indexes for table `professional_categories`
--
ALTER TABLE `professional_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_portfolios`
--
ALTER TABLE `professional_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_services`
--
ALTER TABLE `professional_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professional_services_professional_id_foreign` (`professional_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_user_id_foreign` (`user_id`);

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_products_store_id_foreign` (`store_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Ruko Gudang` (`id`);

--
-- Indexes for table `vendor_portfolios`
--
ALTER TABLE `vendor_portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_portfolios_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `vendor_services`
--
ALTER TABLE `vendor_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_services_vendor_id_foreign` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_carts`
--
ALTER TABLE `customer_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `customer_checklists`
--
ALTER TABLE `customer_checklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_checklist_items`
--
ALTER TABLE `customer_checklist_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customer_checkouts`
--
ALTER TABLE `customer_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `customer_checkout_items`
--
ALTER TABLE `customer_checkout_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_service_orders`
--
ALTER TABLE `customer_service_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer_service_order_items`
--
ALTER TABLE `customer_service_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customer_service_reviews`
--
ALTER TABLE `customer_service_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_notifications`
--
ALTER TABLE `general_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `general_transaction_proofs`
--
ALTER TABLE `general_transaction_proofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generan_transaction_proofs`
--
ALTER TABLE `generan_transaction_proofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_ranges`
--
ALTER TABLE `price_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `professional_categories`
--
ALTER TABLE `professional_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professional_portfolios`
--
ALTER TABLE `professional_portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professional_services`
--
ALTER TABLE `professional_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor_portfolios`
--
ALTER TABLE `vendor_portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor_services`
--
ALTER TABLE `vendor_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversations_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customer_carts`
--
ALTER TABLE `customer_carts`
  ADD CONSTRAINT `customer_carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `store_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_checklists`
--
ALTER TABLE `customer_checklists`
  ADD CONSTRAINT `customer_checklists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_checklist_items`
--
ALTER TABLE `customer_checklist_items`
  ADD CONSTRAINT `customer_checklist_items_customer_checklist_id_foreign` FOREIGN KEY (`customer_checklist_id`) REFERENCES `customer_checklists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD CONSTRAINT `customer_reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `store_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_service_order_items`
--
ALTER TABLE `customer_service_order_items`
  ADD CONSTRAINT `customer_service_order_items_customer_service_order_id_foreign` FOREIGN KEY (`customer_service_order_id`) REFERENCES `customer_service_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `professionals`
--
ALTER TABLE `professionals`
  ADD CONSTRAINT `professionals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `professional_services`
--
ALTER TABLE `professional_services`
  ADD CONSTRAINT `professional_services_professional_id_foreign` FOREIGN KEY (`professional_id`) REFERENCES `professionals` (`id`);

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `store_products`
--
ALTER TABLE `store_products`
  ADD CONSTRAINT `store_products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendor_portfolios`
--
ALTER TABLE `vendor_portfolios`
  ADD CONSTRAINT `vendor_portfolios_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `vendor_services`
--
ALTER TABLE `vendor_services`
  ADD CONSTRAINT `vendor_services_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
