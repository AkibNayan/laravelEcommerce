-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 08:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', 'yamaha', '1643764239.jpg', 1, '2022-02-02 09:10:39', '2022-02-02 09:10:39'),
(2, 'Suzuki', 'suzuki', '1643764259.jpg', 1, '2022-02-02 09:10:59', '2022-02-02 09:10:59'),
(3, 'Honda', 'honda', '1643764305.jpg', 1, '2022-02-02 09:11:45', '2022-02-02 09:11:45'),
(4, 'Car', 'car', NULL, 1, '2022-02-28 21:23:12', '2022-02-28 21:23:53'),
(5, 'Apple', 'apple', NULL, 1, '2022-03-09 11:47:37', '2022-03-09 11:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `unit_price` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `order_id`, `unit_price`, `user_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 6, NULL, 1, NULL, '2022-03-27 12:17:59', '2022-03-27 12:19:51'),
(2, 3, 1, 6, NULL, 1, NULL, '2022-03-27 12:18:05', '2022-03-27 12:19:51'),
(5, 5, 2, 7, 350000, 3, NULL, '2022-03-27 21:45:15', '2022-03-27 21:47:30'),
(10, 6, 1, 8, 80000, 3, NULL, '2022-04-01 09:15:42', '2022-04-01 09:21:48'),
(12, 2, 1, NULL, 150000, 1, NULL, '2022-04-05 22:34:53', '2022-04-05 22:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` int(11) NOT NULL DEFAULT 0 COMMENT '0=Primary',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `image`, `is_parent`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Motor Cycle', 'motor-cycle', NULL, NULL, 0, 1, '2022-02-02 09:12:08', '2022-02-02 09:12:08'),
(2, 'Yamaha', 'yamaha', NULL, '1643764351.jpg', 1, 1, '2022-02-02 09:12:31', '2022-02-02 09:12:31'),
(6, 'Suzuki', 'suzuki', NULL, '1643764384.jpg', 1, 1, '2022-02-02 09:13:04', '2022-02-02 09:13:04'),
(8, 'Honda', 'honda', NULL, '1643764441.jpg', 1, 1, '2022-02-02 09:14:01', '2022-02-02 09:23:01'),
(9, 'Smart Phone', 'smart-phone', NULL, NULL, 0, 1, '2022-02-05 01:52:50', '2022-02-05 01:52:50'),
(10, 'Apple', 'apple', NULL, NULL, 9, 1, '2022-02-05 01:53:10', '2022-02-05 01:53:10'),
(11, 'Realme', 'realme', NULL, NULL, 9, 1, '2022-02-05 01:53:32', '2022-02-05 01:53:32'),
(12, 'Samsung', 'samsung', NULL, NULL, 9, 1, '2022-02-05 01:53:45', '2022-02-05 01:53:51'),
(13, 'Lamborgini', 'lamborgini', NULL, NULL, 0, 1, '2022-02-28 21:24:12', '2022-02-28 21:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `division_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gazipur', 1, 1, '2022-02-28 05:00:21', '2022-02-28 05:00:21'),
(2, 'Kishoreganj', 1, 1, '2022-02-28 05:00:44', '2022-02-28 05:00:44'),
(3, 'Dhaka', 1, 1, '2022-02-28 05:01:07', '2022-02-28 05:01:07'),
(6, 'Tangail', 1, 1, '2022-02-28 05:01:52', '2022-02-28 05:01:52'),
(7, 'Chattogram', 2, 1, '2022-02-28 05:02:13', '2022-02-28 05:02:13'),
(8, 'Cox\'s Bazar', 2, 1, '2022-02-28 05:02:36', '2022-02-28 05:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, 1, '2022-02-28 04:56:24', '2022-02-28 04:56:24'),
(2, 'Chattogram', 2, 1, '2022-02-28 04:56:38', '2022-02-28 04:56:38'),
(3, 'Rajshahi', 3, 1, '2022-02-28 04:56:52', '2022-02-28 04:56:52'),
(4, 'Khulna', 4, 1, '2022-02-28 04:57:03', '2022-02-28 04:57:03'),
(5, 'Barishal', 5, 1, '2022-02-28 04:57:24', '2022-02-28 04:57:24'),
(6, 'Sylhet', 6, 1, '2022-02-28 04:57:37', '2022-02-28 04:57:37'),
(7, 'Rangpur', 7, 1, '2022-02-28 04:57:51', '2022-02-28 04:57:51'),
(8, 'Mymensing', 8, 1, '2022-02-28 04:58:07', '2022-02-28 04:58:07');

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
(5, '2021_12_07_053030_create_brands_table', 1),
(6, '2021_12_14_041736_create_categories_table', 1),
(7, '2021_12_14_074754_create_products_table', 1),
(8, '2021_12_19_041637_create_divisions_table', 1),
(9, '2021_12_19_082647_create_districts_table', 1),
(10, '2021_12_24_044034_create_product_images_table', 1),
(11, '2022_02_09_023625_create_carts_table', 2),
(15, '2022_02_09_052544_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0 COMMENT '0=COD, 1=SSL',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=processing, 1=hold, 2=successful, 3=canceled',
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `ip_address`, `cus_name`, `last_name`, `phone`, `email`, `address`, `division_id`, `district_id`, `country`, `post_code`, `message`, `amount`, `transaction_id`, `currency`, `is_paid`, `status`, `admin_note`, `created_at`, `updated_at`) VALUES
(6, 1, NULL, 'Akib Uddin', 'Nayan', '01723195116', 'akibnayan182@gmail.com', '6 No Ward Satkania Pourashava, Satkania Chattogram', 2, 7, 'Bangladesh', '4386', 'Nothing', 260000, '6240aaa9e07d3', 'BDT', 1, 2, NULL, '2022-03-27 18:20:08', '2022-03-28 21:08:22'),
(7, 3, NULL, 'Hasnain Ben', 'Shahid', '01934325434', 'hasnain@gmail.com', 'Banskhali.', 2, 7, 'Bangladesh', '1214', 'Please give the product as soon as possible.', 700000, '62412fc4368b6', 'BDT', 1, 0, NULL, '2022-03-27 04:22:25', '2022-03-28 21:09:35'),
(8, 3, NULL, 'Hasnain Ben', 'Shahid', '01934321213', 'hasnain@gmail.com', 'Banskhali Sadar, Chattogram.', 2, 7, 'Bangladesh', '1214', 'Please Send the product asap.', 80000, '62471880421d6', 'BDT', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('akibnayan182@gmail.com', '$2y$10$d/qfu2VYFHaFTH1AU.2g/.vTCcjYwy9MFTEEFpCZ3RzGiG/9n3nw.', '2022-02-19 02:42:58');

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
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 5,
  `regular_price` int(11) NOT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0 COMMENT '0=Inactive, 1=Active',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `short_description`, `description`, `brand_id`, `category_id`, `quantity`, `regular_price`, `offer_price`, `is_featured`, `status`, `tags`, `created_at`, `updated_at`) VALUES
(2, 'Honda CB Hornet 160 cbs', 'honda-cb-hornet-160-cbs', 'Bangladesh Honda Private Limited (BHL) operates in a single industry segment in Bangladesh under a joint venture between Honda Motor Company Limited, Japan and Bangladesh Steel and Engineering Corporation (State Own Corporation) under The Ministry of Industry, The Peoples Republic of Bangladesh.', 'Bangladesh Honda Private Limited (BHL) operates in a single industry segment in Bangladesh under a joint venture between Honda Motor Company Limited, Japan and Bangladesh Steel and Engineering Corporation (State Own Corporation) under The Ministry of Industry, The Peoples Republic of Bangladesh. The Company was incorporated in Bangladesh on December 04, 2012 as a private limited company and joint venture agreement was signed on September 27, 2012. The commercial production of the company more... more', 3, 8, 12, 190000, 150000, 1, 1, 'honda', '2022-02-02 09:31:55', '2022-02-02 09:31:55'),
(3, 'Honda CB trigger', 'honda-cb-trigger', 'Bangladesh Honda Private Limited (BHL) operates in a single industry segment in Bangladesh under a joint venture between Honda Motor Company Limited, Japan and Bangladesh Steel and Engineering Corporation (State Own Corporation) under The Ministry of Industry, The Peoples Republic of Bangladesh.', 'Bangladesh Honda Private Limited (BHL) operates in a single industry segment in Bangladesh under a joint venture between Honda Motor Company Limited, Japan and Bangladesh Steel and Engineering Corporation (State Own Corporation) under The Ministry of Industry, The Peoples Republic of Bangladesh. The Company was incorporated in Bangladesh on December 04, 2012 as a private limited company and joint venture agreement was signed on September 27, 2012. The commercial production of the company more... more', 3, 8, 40, 180000, NULL, 0, 1, 'honda, trigger', '2022-02-05 04:00:53', '2022-02-05 04:00:53'),
(5, 'Suzuki', 'suzuki', 'Bangladesh Honda Private Limited (BHL) operates in a single industry segment in Bangladesh under a joint venture between Honda Motor Company Limited, Japan and Bangladesh Steel and Engineering Corporation (State Own Corporation) under The Ministry of Industry, The Peoples Republic of Bangladesh.', 'Bangladesh Honda Private Limited (BHL) operates in a single industry segment in Bangladesh under a joint venture between Honda Motor Company Limited, Japan and Bangladesh Steel and Engineering Corporation (State Own Corporation) under The Ministry of Industry, The Peoples Republic of Bangladesh. The Company was incorporated in Bangladesh on December 04, 2012 as a private limited company and joint venture agreement was signed on September 27, 2012. The commercial production of the company more... more', 2, 6, 10, 400000, 350000, 1, 1, 'suzuki', '2022-02-06 02:52:02', '2022-02-06 02:52:02'),
(6, 'iPhone 13 Pro', 'iphone-13-pro', 'Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (HBM), 1200 nits (peak)\r\nSize	6.1 inches, 90.2 cm2 (~86.0% screen-to-body ratio)\r\nResolution	1170 x 2532 pixels, 19.5:9 ratio (~460 ppi density)\r\nProtection	Scratch-resistant ceramic glass, oleophobic coating\r\n 	Wide color gamut\r\nTrue-tone', 'NETWORK	Technology	\r\nGSM / CDMA / HSPA / EVDO / LTE / 5G\r\nLAUNCH	Announced	2021, September 14\r\nStatus	Available. Released 2021, September 24\r\nBODY	Dimensions	146.7 x 71.5 x 7.7 mm (5.78 x 2.81 x 0.30 in)\r\nWeight	204 g (7.20 oz)\r\nBuild	Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame\r\nSIM	Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM/eSIM, dual stand-by)\r\n 	IP68 dust/water resistant (up to 6m for 30 mins)\r\nApple Pay (Visa, MasterCard, AMEX certified)\r\nDISPLAY	Type	Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (HBM), 1200 nits (peak)\r\nSize	6.1 inches, 90.2 cm2 (~86.0% screen-to-body ratio)\r\nResolution	1170 x 2532 pixels, 19.5:9 ratio (~460 ppi density)\r\nProtection	Scratch-resistant ceramic glass, oleophobic coating\r\n 	Wide color gamut\r\nTrue-tone\r\nPLATFORM	OS	iOS 15, upgradable to iOS 15.3\r\nChipset	Apple A15 Bionic (5 nm)\r\nCPU	Hexa-core (2x3.22 GHz Avalanche + 4xX.X GHz Blizzard)\r\nGPU	Apple GPU (5-core graphics)\r\nMEMORY	Card slot	No\r\nInternal	128GB 6GB RAM, 256GB 6GB RAM, 512GB 6GB RAM, 1TB 6GB RAM\r\n 	NVMe\r\nMAIN CAMERA	Quad	12 MP, f/1.5, 26mm (wide), 1.9µm, dual pixel PDAF, sensor-shift OIS\r\n12 MP, f/2.8, 77mm (telephoto), PDAF, OIS, 3x optical zoom\r\n12 MP, f/1.8, 13mm, 120˚ (ultrawide), PDAF\r\nTOF 3D LiDAR scanner (depth)', 5, 10, 10, 85000, 80000, 1, 1, 'iphone', '2022-03-09 11:53:58', '2022-03-09 11:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(10, 2, '558802897.jpg', '2022-02-02 09:31:55', '2022-02-02 09:31:55'),
(11, 2, '490811593.jpg', '2022-02-02 09:31:55', '2022-02-02 09:31:55'),
(12, 2, '620548067.jpg', '2022-02-02 09:31:55', '2022-02-02 09:31:55'),
(13, 3, '96603647.jpg', '2022-02-05 04:00:53', '2022-02-05 04:00:53'),
(14, 3, '476709685.jpg', '2022-02-05 04:00:53', '2022-02-05 04:00:53'),
(15, 4, '808209701.jpg', '2022-02-06 02:47:57', '2022-02-06 02:47:57'),
(16, 5, '195507423.jpg', '2022-02-06 02:52:02', '2022-02-06 02:52:02'),
(17, 6, '101356577.jpg', '2022-03-09 11:53:59', '2022-03-09 11:53:59'),
(18, 6, '809543754.jpg', '2022-03-09 11:53:59', '2022-03-09 11:53:59');

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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=Customers',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `city`, `country`, `zipcode`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akib Uddin Nayan', 'akibnayan182@gmail.com', '2022-02-02 09:01:10', '$2y$10$g6SkX660W0q3u9YOUn3R7OXEG5kUaYOymT1Jynvt2XIjbcTXkJhrS', '01723195116', '6 No Ward Satkania Pourashava, Satkania Chattogram.', 'Chattogram', 'Bangladesh', '4386', 1, '1643763939.png', NULL, '2022-02-02 09:00:38', '2022-02-02 09:05:39'),
(3, 'Hasnain Ben Shahid', 'hasnain@gmail.com', '2022-03-28 21:15:29', '$2y$10$xn9sjiozNtEz70RvFugyGOKh5rGKENFlp0gpknR0oYDoHIecH2As6', '01934321213', NULL, NULL, 'Bangladesh', '1214', 2, '1648524721.jpg', NULL, '2022-03-05 12:38:38', '2022-04-01 09:20:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_district_name_unique` (`district_name`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
