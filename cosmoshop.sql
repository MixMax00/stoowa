-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 03:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title_top` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title_top`, `banner_title`, `banner_description`, `banner_image`, `banner_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Smart Blood', 'Pressure monitor', 'Our Country best Product', '1646848095.jpg', 1, NULL, '2022-03-09 17:48:15', '2022-03-09 17:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `par_cat_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `par_cat_id`, `description`, `cat_img`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'new arrival product', NULL, 'Good', '1646249548.png', 'new-arrival-product', 2, '2022-03-03 07:07:25', '2022-03-02 19:32:28', '2022-03-03 07:07:25'),
(2, 'Most Popular Product', 1, 'sdfdsfgdsgsg', '1646250031.png', 'most-popular-product', 1, NULL, '2022-03-02 19:40:31', '2022-03-06 18:10:37'),
(3, 'new arrival product', NULL, 'Very Good for new arrival', '1646288007.png', 'new-arrival-product', 1, NULL, '2022-03-03 05:50:14', '2022-03-06 18:10:44'),
(4, 'Deals of the Day', NULL, 'fdsgdfgdfgf', '1646637507.png', 'deals-of-the-day', 1, NULL, '2022-03-07 07:18:27', '2022-03-07 07:18:27'),
(5, 'Mobail Associres', NULL, 'adfdgdfgdfgd', '1646637550.png', 'mobail-associres', 1, NULL, '2022-03-07 07:19:10', '2022-03-07 07:19:10'),
(6, 'Computer Accessories', NULL, 'dsnbxcnbxbjxhb', '1646637615.png', 'computer-accessories', 1, NULL, '2022-03-07 07:20:15', '2022-03-07 07:20:15'),
(7, 'Computer Electronics', NULL, 'dfgdhdh', '1646637663.png', 'computer-electronics', 2, '2022-03-07 07:21:12', '2022-03-07 07:21:03', '2022-03-07 07:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(2, 2, 1, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(8, 4, 2, '2022-03-09 05:19:59', '2022-03-09 05:19:59'),
(9, 4, 3, '2022-03-09 15:43:50', '2022-03-09 15:43:50'),
(10, 3, 3, '2022-03-09 15:43:50', '2022-03-09 15:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'RED', 'red', 2, NULL, '2022-03-05 05:15:26', '2022-03-05 07:50:43'),
(2, 'INDIGO YELLOW', 'indigo-yellow', 1, NULL, '2022-03-05 05:15:38', '2022-03-05 08:04:15'),
(3, 'GREEN', 'green', 1, NULL, '2022-03-05 05:15:48', '2022-03-05 05:15:48'),
(4, 'WHITE', 'white', 1, NULL, '2022-03-05 05:15:59', '2022-03-05 05:15:59'),
(5, 'YELLOW', 'yellow', 1, NULL, '2022-03-05 05:16:10', '2022-03-05 05:16:10'),
(6, 'COFFEE', 'coffee', 1, NULL, '2022-03-05 05:16:26', '2022-03-05 05:16:26'),
(7, 'SKY BLUE', 'sky-blue', 1, NULL, '2022-03-05 05:16:41', '2022-03-05 05:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(2, 3, 1, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(3, 6, 1, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(4, 7, 1, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(13, 4, 2, '2022-03-09 05:19:59', '2022-03-09 05:19:59'),
(14, 4, 3, '2022-03-09 15:43:51', '2022-03-09 15:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_03_01_124919_create_banners_table', 2),
(7, '2022_03_02_221459_create_parent_categories_table', 2),
(8, '2022_03_03_004342_create_categories_table', 3),
(9, '2022_03_03_233116_create_sizes_table', 4),
(10, '2022_03_03_234328_create_colors_table', 4),
(20, '2022_03_05_091743_create_products_table', 5),
(21, '2022_03_05_094753_create_product_galleries_table', 5),
(22, '2022_03_05_100028_create_product_size_table', 5),
(23, '2022_03_05_100307_create_color_product_table', 5),
(24, '2022_03_07_092843_create_category_product_table', 5),
(25, '2022_03_09_193155_create_permission_tables', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_cat_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_categories`
--

INSERT INTO `parent_categories` (`id`, `parent_category_name`, `description`, `parent_cat_img`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Compute', 'new collection computer system', '1646243517.png', 'compute', 1, NULL, '2022-03-02 17:51:57', '2022-03-02 17:51:57'),
(2, 'Electronics', 'Good Product', '1646243827.png', 'electronics', 1, NULL, '2022-03-02 17:57:07', '2022-03-02 17:57:07');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'all products', 'web', '2022-03-09 13:55:35', '2022-03-09 13:55:35'),
(2, 'add products', 'web', '2022-03-09 13:56:22', '2022-03-09 13:56:22'),
(3, 'delete products', 'web', '2022-03-09 13:56:43', '2022-03-09 13:56:43'),
(4, 'products', 'web', '2022-03-13 02:57:34', '2022-03-13 02:57:34'),
(5, 'product', 'web', '2022-03-13 02:58:38', '2022-03-13 02:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `user_id`, `slug`, `sku`, `short_description`, `price`, `sale_price`, `quantity`, `description`, `add_info`, `product_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CURREN 8109 Watches', 1, 'curren-8109-watches', 'CUR-S0BA7Q3LUQ15AUC6', 'It is a long established fact that a reader will be distracted eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate', '700.00', '620.00', 50, '<p style=\"font-size: 15px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p><p class=\"mb-0\" style=\"font-size: 15px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif;\">Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>', '<p style=\"font-size: 15px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif;\">Return into stiff sections the bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked what\'s happened to me he thought It wasn\'t a dream. His room, a proper human room although a little too small</p><div class=\"additional_info_list\" style=\"margin-bottom: 40px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif; font-size: 14px;\"><h4 class=\"info_title\" style=\"margin-bottom: 20px; font-size: 18px; color: rgb(37, 37, 37);\">Additional Info</h4><ul class=\"ul_li_block\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">No Side Effects</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative;\">Made in USA</li></ul></div><ul><li style=\"color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif; font-size: 14px;\"><h4 class=\"info_title\" style=\"margin-bottom: 20px; font-size: 18px; color: rgb(37, 37, 37);\">Product Features Info</h4><ul class=\"ul_li_block\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><ul><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Compatible for indoor and outdoor use</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Wide polypropylene shell seat for unrivalled comfort</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Rust-resistant frame</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Durable UV and weather-resistant construction</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Shell seat features water draining recess</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Shell and base are stackable for transport</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Choice of monochrome finishes and colourways</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative;\">Designed by Nagi</li></ul></ul></li></ul>', 'curren-8109-watches-1646638228.png', 1, NULL, '2022-03-07 07:30:28', '2022-03-09 14:34:08'),
(2, 'CURREN HandSat Watches', 1, 'curren-handsat-watches', 'CUR-IAZR7IBU65MH0DEZ', 'It is a long established fact that a reader will be distracted eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate', '800.00', '720.00', 50, '<p style=\"font-size: 15px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p><p class=\"mb-0\" style=\"font-size: 15px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif;\">Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>', '<p style=\"font-size: 15px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif;\">Return into stiff sections the bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked what\'s happened to me he thought It wasn\'t a dream. His room, a proper human room although a little too small</p><div class=\"additional_info_list\" style=\"margin-bottom: 40px; color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif; font-size: 14px;\"><h4 class=\"info_title\" style=\"margin-bottom: 20px; font-size: 18px; color: rgb(37, 37, 37);\">Additional Info</h4><ul class=\"ul_li_block\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">No Side Effects</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative;\">Made in USA</li></ul></div><div class=\"additional_info_list\" style=\"color: rgb(5, 40, 64); font-family: &quot;Aktiv grotesk&quot;, sans-serif; font-size: 14px;\"><h4 class=\"info_title\" style=\"margin-bottom: 20px; font-size: 18px; color: rgb(37, 37, 37);\">Product Features Info</h4><ul class=\"ul_li_block\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Compatible for indoor and outdoor use</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Wide polypropylene shell seat for unrivalled comfort</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Rust-resistant frame</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Durable UV and weather-resistant construction</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Shell seat features water draining recess</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Shell and base are stackable for transport</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative; margin-bottom: 8px;\">Choice of monochrome finishes and colourways</li><li style=\"display: block; list-style: none; font-size: 15px; padding-left: 20px; position: relative;\">Designed by Nagi</li></ul></div>', 'curren-handsat-watches_1646803483.png', 2, NULL, '2022-03-08 17:01:36', '2022-03-09 05:58:32'),
(3, 'laptop big sccern', 3, 'laptop-big-sccern', 'LAP-SPCUBITVY9C6EHFN', 'vcxxcvcbcvbcvbvcbvbvcbcvbcvbvb', '452.00', '456.00', 10, '<p>vcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvb<br></p>', '<p>vcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvbvcxxcvcbcvbcvbvcbvbvcbcvbcvbvb<br></p>', 'laptop-big-sccern-1646840629.png', 1, NULL, '2022-03-09 15:43:49', '2022-03-09 15:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'curren-8109-watches-6225b49649216.png', '2022-03-07 07:30:30', '2022-03-07 07:30:30'),
(2, 1, 'curren-8109-watches-6225b4967ac8f.png', '2022-03-07 07:30:30', '2022-03-07 07:30:30'),
(3, 1, 'curren-8109-watches-6225b4968ab83.png', '2022-03-07 07:30:30', '2022-03-07 07:30:30'),
(4, 1, 'curren-8109-watches-6225b496c361d.png', '2022-03-07 07:30:30', '2022-03-07 07:30:30'),
(5, 2, 'curren-8109-watches-62278bf18b630.png', '2022-03-08 17:01:37', '2022-03-08 17:01:37'),
(6, 2, 'curren-8109-watches-62278bf1bc128.png', '2022-03-08 17:01:37', '2022-03-08 17:01:37'),
(7, 2, 'curren-8109-watches-62278bf1cc358.png', '2022-03-08 17:01:37', '2022-03-08 17:01:37'),
(8, 2, 'curren-8109-watches-62278bf225a7c.png', '2022-03-08 17:01:38', '2022-03-08 17:01:38'),
(9, 3, 'laptop-big-sccern-6228cb372a5f4.png', '2022-03-09 15:43:51', '2022-03-09 15:43:51'),
(10, 3, 'laptop-big-sccern-6228cb3766c07.png', '2022-03-09 15:43:51', '2022-03-09 15:43:51'),
(11, 3, 'laptop-big-sccern-6228cb3788824.png', '2022-03-09 15:43:51', '2022-03-09 15:43:51'),
(12, 3, 'laptop-big-sccern-6228cb37b3b47.png', '2022-03-09 15:43:51', '2022-03-09 15:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(2, 1, 5, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(3, 1, 6, '2022-03-07 07:30:29', '2022-03-07 07:30:29'),
(10, 2, 2, '2022-03-09 05:19:59', '2022-03-09 05:19:59'),
(11, 3, 2, '2022-03-09 15:43:50', '2022-03-09 15:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2022-03-09 13:50:23', '2022-03-09 13:50:23'),
(2, 'Admin', 'web', '2022-03-09 13:51:29', '2022-03-09 13:51:29'),
(3, 'Author', 'web', '2022-03-09 13:51:59', '2022-03-09 13:51:59'),
(4, 'Subscriber', 'web', '2022-03-09 13:52:19', '2022-03-09 13:52:19'),
(5, 'User', 'web', '2022-03-09 13:52:33', '2022-03-09 13:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 5),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'XXL', 'xxl', 2, NULL, '2022-03-05 05:02:25', '2022-03-05 06:35:53'),
(2, 'SM', 'sm', 1, NULL, '2022-03-05 05:06:55', '2022-03-05 05:06:55'),
(5, 'M', 'm', 2, NULL, '2022-03-05 05:07:49', '2022-03-05 07:12:35'),
(6, 'S', 's', 1, NULL, '2022-03-05 05:07:58', '2022-03-07 07:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'cosmoshop', 'cosmoshop@gmail.com', NULL, '$2y$10$A3.f9e0VHUyDve4oR6Vj5eb1yTHAB8LzsRcWR0Ip7SQHg3j3R.dC2', NULL, '2022-02-19 19:05:38', '2022-02-19 19:05:38'),
(2, 'Sakib', 'sakib@gmail.com', NULL, '$2y$10$P7YrLI2HPHNYZ0kVX4ReGOELVqmYhRiP6hunGCIqkP6GJLDRyVUv2', NULL, '2022-02-20 06:25:31', '2022-02-20 06:25:31'),
(3, 'Supper Admin', 'superadmin@gmail.com', NULL, '$2y$10$t7sZezPVHJsjgbCkN1cQn.PHOLJPq3jE0SCs9uo5A8UvA6DWw2iiG', NULL, '2022-03-09 14:49:55', '2022-03-09 14:49:55'),
(4, 'Masud Rana', 'masud@gmail.com', NULL, '$2y$10$f1U9P1SgYqCTEZN2wOPtTuZHBTrN9Db5Vi9UO3IjdS35/pQYmigh.', NULL, '2022-03-16 05:29:27', '2022-03-16 05:29:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`),
  ADD KEY `color_product_product_id_foreign` (`product_id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_product_id_foreign` (`product_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
