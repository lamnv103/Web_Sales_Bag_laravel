-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 24, 2024 lúc 05:04 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel11`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `our_story` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `company_info` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zip` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `isdefault` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `phone`, `locality`, `address`, `city`, `state`, `country`, `landmark`, `zip`, `type`, `isdefault`, `created_at`, `updated_at`) VALUES
(2, 1, 'Sử Thị Hà My', '0775593418', 'Quận Cẩm Lệ', '115 Hoàn ĐÌnh Ái', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quý', '111111', 'home', 1, '2024-12-23 05:35:14', '2024-12-23 05:35:14'),
(3, 3, 'Nguyễn Văn Lâm', '0775593418', 'Quận Cẩm Lệ', '115 Hoàn ĐÌnh Ái', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quýy', '111111', 'home', 1, '2024-12-23 09:39:35', '2024-12-23 09:39:35'),
(4, 4, 'MYSU CUTE LẮM', '0775593418', 'Quận Cẩm Lệ', '250 VĂN TIẾN DŨNG', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quý', '111111', 'home', 1, '2024-12-23 19:42:55', '2024-12-23 20:51:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `product_count`, `created_at`, `updated_at`) VALUES
(1, 'NIKE', 'nike', '1734950305.png', 2, '2024-12-23 03:38:28', '2024-12-23 11:39:03'),
(2, 'ADIDAS', 'adidas', '1734953349.png', 2, '2024-12-23 04:28:52', '2024-12-23 20:55:59'),
(3, 'GUCCI', 'gucci', '1734953372.jpg', 4, '2024-12-23 04:29:32', '2024-12-23 19:58:53'),
(4, 'CHANEL', 'chanel', '1734953386.png', 2, '2024-12-23 04:29:47', '2024-12-23 11:27:44'),
(5, 'FENDI', 'fendi', '1734953422.png', 2, '2024-12-23 04:30:23', '2024-12-23 20:26:13'),
(6, 'Balenciaga', 'balenciaga', '1734954301.jpg', 3, '2024-12-23 04:30:43', '2024-12-23 05:25:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `product_count`, `created_at`, `updated_at`) VALUES
(1, 'Túi đeo vai', 'tui-deo-vai', '1734950340.jpg', 3, '2024-12-23 03:39:00', '2024-12-23 11:27:44'),
(2, 'Túi cầm tay', 'tui-cam-tay', '1734953896.jpg', 5, '2024-12-23 04:38:17', '2024-12-23 20:55:59'),
(3, 'Túi rút dây', 'tui-rut-day', '1734954017.jpg', 2, '2024-12-23 04:40:17', '2024-12-23 20:26:13'),
(4, 'Ba lô', 'ba-lo', '1734954191.jpg', 2, '2024-12-23 04:43:11', '2024-12-23 05:20:59'),
(5, 'Túi ví nhỏ', 'tui-vi-nho', '1734954246.jpg', 3, '2024-12-23 04:44:06', '2024-12-23 11:39:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `response` text DEFAULT NULL,
  `is_responded` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `comment`, `response`, `is_responded`, `created_at`, `updated_at`) VALUES
(1, 'Sử Thị Hà My', 'mysu220805@gmail.com', '0775593418', 'Tôi yêu môn web', NULL, 0, '2024-12-23 05:36:57', '2024-12-23 05:36:57'),
(2, 'Sử Thị Hà My', 'mysu220805@gmail.com', '0775593418', 'Tôi yêu môn web', NULL, 0, '2024-12-23 06:02:18', '2024-12-23 06:02:18'),
(3, 'Sử Thị Hà My', 'mysu220805@gmail.com', '0775593418', 'meo meo', 'gâu gâu', 0, '2024-12-23 12:03:36', '2024-12-23 12:07:55'),
(4, 'Hà My', 'mysth.23ai@vku.udn.vn', '0905549383', 'TÔI YÊU MÔN WEB THẦY QUÂN', NULL, 0, '2024-12-23 19:45:31', '2024-12-23 19:45:31'),
(5, 'mysu cute', 'mysth.23ai@vku.udn.vn', '0775593418', 'TÔI YÊU MÔN WEB THẦY QUÂN', 'TÔI CŨNG VẬY', 0, '2024-12-23 20:20:20', '2024-12-23 20:22:19'),
(6, 'NGUYỄN VĂN LÂM', 'mysth.23ai@vku.udn.vn', '0775593418', 'TÔI YÊU THẦY NGÔ LÊ QUÂN', 'TÔI CŨNG VẬY', 0, '2024-12-23 20:53:13', '2024-12-23 20:53:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('fixed','percent') NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `expiry_date` date NOT NULL DEFAULT cast(current_timestamp() as date),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 'SALE', 'fixed', 10.00, 200.00, '2024-12-31', '2024-12-23 08:47:00', '2024-12-23 08:47:00'),
(2, 'MYSU', 'percent', 50.00, 500.00, '2025-01-09', '2024-12-23 12:05:04', '2024-12-23 12:05:04'),
(3, 'LAM', 'fixed', 25.00, 350.00, '2025-01-09', '2024-12-23 12:05:26', '2024-12-23 12:05:26'),
(4, 'LINH', 'percent', 30.00, 400.00, '2025-01-11', '2024-12-23 12:05:50', '2024-12-23 12:05:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_02_160609_create_brands_table', 1),
(5, '2024_11_05_061318_create_categories_table', 1),
(6, '2024_11_05_074854_create_products_table', 1),
(7, '2024_11_09_063130_create_contacts_table', 1),
(8, '2024_11_11_070717_create_coupons_table', 1),
(9, '2024_11_12_133951_create_orders_table', 1),
(10, '2024_11_12_134128_create_order_items_table', 1),
(11, '2024_11_12_134153_create_addresses_table', 1),
(12, '2024_11_12_134232_create_transactions_table', 1),
(13, '2024_11_14_073609_create_abouts_table', 1),
(14, '2024_11_17_145301_create_slides_table', 1),
(15, '2024_11_18_083831_create_month_names_table', 1),
(16, '2024_12_06_133312_create_reviews_table', 1),
(17, '2024_12_15_153439_add_product_count_to_categories_table', 1),
(18, '2024_12_21_055127_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `month_names`
--

CREATE TABLE `month_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `month_names`
--

INSERT INTO `month_names` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zip` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `status` enum('ordered','delivered','canceled','pending','confirmed','shipping') NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `name`, `phone`, `locality`, `address`, `city`, `state`, `country`, `landmark`, `zip`, `type`, `status`, `is_shipping_different`, `delivered_date`, `canceled_date`, `created_at`, `updated_at`) VALUES
(2, 1, 100.00, 0.00, 21.00, 121.00, 'Sử Thị Hà My', '0775593418', 'Quận Cẩm Lệ', '115 Hoàn ĐÌnh Ái', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quý', '111111', 'home', 'delivered', 0, '2024-12-23', NULL, '2024-12-23 05:35:14', '2024-12-23 08:45:21'),
(4, 3, 640.00, 10.00, 134.40, 774.40, 'Nguyễn Văn Lâm', '0775593418', 'Quận Cẩm Lệ', '115 Hoàn ĐÌnh Ái', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quýy', '111111', 'home', 'delivered', 0, '2024-12-23', NULL, '2024-12-23 09:39:35', '2024-12-23 09:52:25'),
(5, 3, 1240.00, 10.00, 260.40, 1500.40, 'Nguyễn Văn Lâm', '0775593418', 'Quận Cẩm Lệ', '115 Hoàn ĐÌnh Ái', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quýy', '111111', 'home', 'delivered', 0, '2024-12-23', NULL, '2024-12-23 11:14:56', '2024-12-23 11:15:33'),
(6, 4, 2021.00, 10.00, 424.41, 2445.41, 'Hà My', '0905549383', 'Quận Cẩm Lệ', '250 Nguyễn Tất Thành', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quý', '111111', 'home', 'delivered', 0, '2024-12-24', NULL, '2024-12-23 19:42:55', '2024-12-23 19:48:55'),
(7, 4, 955.00, 10.00, 200.55, 1155.55, 'Sử Thị Hà My', '0905545648', 'Quận Cẩm Lệ', '250 Nguyễn Tất Thành', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quý', '111111', 'home', 'delivered', 0, '2024-12-24', NULL, '2024-12-23 20:17:09', '2024-12-23 20:21:44'),
(8, 4, 2038.00, 10.00, 427.98, 2465.98, 'MYSU CUTE LẮM', '0775593418', 'Quận Cẩm Lệ', '250 VĂN TIẾN DŨNG', 'Đà nẵng', 'Độc thân', 'VIE', 'Hoà Quý', '111111', 'home', 'delivered', 0, '2024-12-24', NULL, '2024-12-23 20:50:36', '2024-12-23 20:58:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `options` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `options`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, 2, 100.00, 1, NULL, 0, '2024-12-23 05:35:14', '2024-12-23 05:35:14'),
(5, 11, 4, 150.00, 1, NULL, 0, '2024-12-23 09:39:35', '2024-12-23 09:39:35'),
(6, 8, 4, 500.00, 1, NULL, 0, '2024-12-23 09:39:35', '2024-12-23 09:39:35'),
(7, 7, 5, 300.00, 1, NULL, 0, '2024-12-23 11:14:56', '2024-12-23 11:14:56'),
(8, 5, 5, 350.00, 1, NULL, 0, '2024-12-23 11:14:56', '2024-12-23 11:14:56'),
(9, 4, 5, 450.00, 1, NULL, 0, '2024-12-23 11:14:56', '2024-12-23 11:14:56'),
(10, 6, 5, 150.00, 1, NULL, 0, '2024-12-23 11:14:56', '2024-12-23 11:14:56'),
(11, 13, 6, 500.00, 1, NULL, 0, '2024-12-23 19:42:55', '2024-12-23 19:42:55'),
(12, 14, 6, 399.00, 1, NULL, 0, '2024-12-23 19:42:55', '2024-12-23 19:42:55'),
(13, 14, 7, 399.00, 1, NULL, 0, '2024-12-23 20:17:09', '2024-12-23 20:17:09'),
(14, 15, 7, 566.00, 1, NULL, 0, '2024-12-23 20:17:09', '2024-12-23 20:17:09'),
(15, 18, 8, 566.00, 3, NULL, 0, '2024-12-23 20:50:36', '2024-12-23 20:50:36'),
(16, 12, 8, 350.00, 1, NULL, 0, '2024-12-23 20:50:36', '2024-12-23 20:50:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('in_stock','out_of_stock') NOT NULL DEFAULT 'in_stock',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(2, 'Túi đeo vai làm bằng da cá sấu sang xịn mịn.', 'tui-deo-vai-lam-bang-da-ca-sau-sang-xin-min', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Chiếc túi Aurelia là bản giao hưởng hoàn mỹ giữa dòng chảy của thời gian và sự tinh tế trong phong cách. Với thiết kế vượt thời gian, chiếc túi tỏa sáng nhờ khóa đẩy độc đáo và phom dáng kinh điển, giữ vững vẻ đẹp quyến rũ nguyên bản. Gam màu kem thanh lịch càng tôn lên sự trẻ trung, hiện đại mà Aurelia mang lại. Đây không chỉ là một phụ kiện thời trang, mà còn là tuyên ngôn phong cách đầy tự tin và năng động, hoàn toàn phù hợp với những cô nàng yêu thích sự đổi mới và luôn sẵn sàng bắt kịp nhịp sống hiện đại.', 300.00, 200.00, 'MASO1', 'in_stock', 1, 10, '1734954772.jpg', '1734954772-1.jpg', 1, 2, '2024-12-23 04:52:53', '2024-12-23 04:52:53'),
(3, 'Túi đeo vai dành cho học sinh sinh viên, làm băng da chắc chắc không lo bị rách', 'tui-deo-vai-danh-cho-hoc-sinh-sinh-vien-lam-bang-da-chac-chac-khong-lo-bi-rach', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Chiếc túi Aurelia là bản giao hưởng hoàn mỹ giữa dòng chảy của thời gian và sự tinh tế trong phong cách. Với thiết kế vượt thời gian, chiếc túi tỏa sáng nhờ khóa đẩy độc đáo và phom dáng kinh điển, giữ vững vẻ đẹp quyến rũ nguyên bản. Gam màu kem thanh lịch càng tôn lên sự trẻ trung, hiện đại mà Aurelia mang lại. Đây không chỉ là một phụ kiện thời trang, mà còn là tuyên ngôn phong cách đầy tự tin và năng động, hoàn toàn phù hợp với những cô nàng yêu thích sự đổi mới và luôn sẵn sàng bắt kịp nhịp sống hiện đại.', 500.00, 250.00, 'MASO2', 'in_stock', 1, 12, '1734955186.jpg', '1734955186-1.jpg', 1, 3, '2024-12-23 04:59:46', '2024-12-23 04:59:46'),
(4, 'Túi cầm tay sang trọng, quý phái, sáng bóng quyến rũ thanh lịch.', 'tui-cam-tay-sang-trong-quy-phai-sang-bong-quyen-ru-thanh-lich', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Chiếc túi Aurelia là bản giao hưởng hoàn mỹ giữa dòng chảy của thời gian và sự tinh tế trong phong cách. Với thiết kế vượt thời gian, chiếc túi tỏa sáng nhờ khóa đẩy độc đáo và phom dáng kinh điển, giữ vững vẻ đẹp quyến rũ nguyên bản. Gam màu kem thanh lịch càng tôn lên sự trẻ trung, hiện đại mà Aurelia mang lại. Đây không chỉ là một phụ kiện thời trang, mà còn là tuyên ngôn phong cách đầy tự tin và năng động, hoàn toàn phù hợp với những cô nàng yêu thích sự đổi mới và luôn sẵn sàng bắt kịp nhịp sống hiện đại.', 500.00, 450.00, 'MASO3', 'in_stock', 1, 15, '1734955449.jpg', '1734955449-1.jpg', 2, 3, '2024-12-23 05:04:09', '2024-12-23 05:04:09'),
(5, 'Túi cầm tay thanh lịch vuông nhỏ gọn, phù hợp đi dự tiệc.', 'tui-cam-tay-thanh-lich-vuong-nho-gon-phu-hop-di-du-tiec', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Chiếc túi Aurelia là bản giao hưởng hoàn mỹ giữa dòng chảy của thời gian và sự tinh tế trong phong cách. Với thiết kế vượt thời gian, chiếc túi tỏa sáng nhờ khóa đẩy độc đáo và phom dáng kinh điển, giữ vững vẻ đẹp quyến rũ nguyên bản. Gam màu kem thanh lịch càng tôn lên sự trẻ trung, hiện đại mà Aurelia mang lại. Đây không chỉ là một phụ kiện thời trang, mà còn là tuyên ngôn phong cách đầy tự tin và năng động, hoàn toàn phù hợp với những cô nàng yêu thích sự đổi mới và luôn sẵn sàng bắt kịp nhịp sống hiện đại.', 500.00, 350.00, 'MASO4', 'in_stock', 1, 15, '1734955727.jpg', '1734955727-1.jpg', 2, 5, '2024-12-23 05:08:47', '2024-12-23 05:08:47'),
(6, 'Túi rút dây form dáng dễ thương phù hợp cho các bé gái.', 'tui-rut-day-form-dang-de-thuong-phu-hop-cho-cac-be-gai', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 300.00, 150.00, 'MASO5', 'in_stock', 1, 17, '1734955984.jpg', '1734955984-1.jpg', 3, 6, '2024-12-23 05:13:04', '2024-12-23 11:14:56'),
(7, 'Túi rút dây đi học cho các bạn nữ sinh vô cũng dễ thương', 'tui-rut-day-di-hoc-cho-cac-ban-nu-sinh-vo-cung-de-thuong', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 400.00, 300.00, 'MASO6', 'in_stock', 1, 20, '1734956114.jpg', '1734956114-1.jpg', 3, 6, '2024-12-23 05:15:14', '2024-12-23 05:15:14'),
(8, 'Ba lô đi học nhiều ngăn có thể chứa và bảo vê được laptop, vô cùng dễ thương.', 'ba-lo-di-hoc-nhieu-ngan-co-the-chua-va-bao-ve-duoc-laptop-vo-cung-de-thuong', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 600.00, 500.00, 'MASO7', 'in_stock', 1, 23, '1734956308.jpg', '1734956308-1.png', 4, 2, '2024-12-23 05:18:28', '2024-12-23 09:39:35'),
(9, 'Ba lô kiểu diễ thương phù hợp cho các bạn nữ ở mọi lứa tuôit, đi học đi chơi...', 'ba-lo-kieu-die-thuong-phu-hop-cho-cac-ban-nu-o-moi-lua-tuoit-di-hoc-di-choi', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 550.00, 399.00, 'MASO8', 'in_stock', 1, 50, '1734956459.jpg', '1734956459-1.jpg', 4, 1, '2024-12-23 05:20:59', '2024-12-23 05:20:59'),
(10, 'Túi vải nhung đơn giản nhỏ ngọn, nhiều ngăn có thể chứa tiền xu thẻ card..', 'tui-vai-nhung-don-gian-nho-ngon-nhieu-ngan-co-the-chua-tien-xu-the-card', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 200.00, 100.00, 'MASO9', 'in_stock', 1, 65, '1734956614.jpg', '1734956614-1.jpg', 5, 4, '2024-12-23 05:23:35', '2024-12-23 05:35:14'),
(11, 'Túi nhỏ gọn đựng mỹ phẩm, tiền mặt... dễ dàng mang theo bên mình', 'tui-nho-gon-dung-my-pham-tien-mat-de-dang-mang-theo-ben-minh', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.', 250.00, 150.00, 'MASO10', 'in_stock', 1, 55, '1734956741.jpg', '1734956741-1.jpg', 5, 6, '2024-12-23 05:25:42', '2024-12-23 08:43:33'),
(12, 'Túi sách đeo vai phối dây xích silver, được làm băng da cá sấu bóng loáng', 'tui-sach-deo-vai-phoi-day-xich-silver-duoc-lam-bang-da-ca-sau-bong-loang', 'Túi đeo hông belt bag đang là xu hướng khuấy đảo thời trang đường phố. Đây là phụ kiện hoàn hảo để chứa đựng mọi thứ cần thiết bạn muốn mang theo, mà vẫn rảnh tay để cầm ly café hoặc lướt điện thoại.', 'Túi đeo hông belt bag đang là xu hướng khuấy đảo thời trang đường phố. Đây là phụ kiện hoàn hảo để chứa đựng mọi thứ cần thiết bạn muốn mang theo, mà vẫn rảnh tay để cầm ly café hoặc lướt điện thoại.Túi đeo hông belt bag đang là xu hướng khuấy đảo thời trang đường phố. Đây là phụ kiện hoàn hảo để chứa đựng mọi thứ cần thiết bạn muốn mang theo, mà vẫn rảnh tay để cầm ly café hoặc lướt điện thoại.Túi đeo hông belt bag đang là xu hướng khuấy đảo thời trang đường phố. Đây là phụ kiện hoàn hảo để chứa đựng mọi thứ cần thiết bạn muốn mang theo, mà vẫn rảnh tay để cầm ly café hoặc lướt điện thoại.', 500.00, 350.00, 'MASO11', 'in_stock', 1, 55, '1734978464.jpg', NULL, 1, 4, '2024-12-23 11:27:44', '2024-12-23 20:50:36'),
(13, 'Túi xách tay phối dây rút - TOT 0186 - Màu kem', 'tui-xach-tay-phoi-day-rut-tot-0186-mau-kem', 'Size S (dài x rộng x cao): 330 x 125 x 165 mm\r\n\r\nChức năng: Đựng vừa IP PromaxSize S (dài x rộng x cao): 330 x 125 x 165 mm\r\n\r\nChức năng: Đựng vừa IP Promax', 'Mã sản phẩm: 1011TOT0186\r\nLoại sản phẩm: Túi Xách Nhỏ\r\nKích thước (dài x rộng x cao): 33 x 12.5 x 16.5 cm\r\nChất liệu: Da nhân tạo\r\nChất liệu dây đeo: Da nhân tạo\r\nKiểu khóa: Dây rút\r\nSố ngăn: 1 ngăn lớn, 2 ngăn nhỏ\r\nKích cỡ: Nhỏ\r\nPhù hợp sử dụng: Đi làm, đi chơiMã sản phẩm: 1011TOT0186\r\nLoại sản phẩm: Túi Xách Nhỏ\r\nKích thước (dài x rộng x cao): 33 x 12.5 x 16.5 cm\r\nChất liệu: Da nhân tạo\r\nChất liệu dây đeo: Da nhân tạo\r\nKiểu khóa: Dây rút\r\nSố ngăn: 1 ngăn lớn, 2 ngăn nhỏ\r\nKích cỡ: Nhỏ\r\nPhù hợp sử dụng: Đi làm, đi chơi', 600.00, 500.00, 'MASO12', 'in_stock', 1, 41, '1734978986.jpg', '1734978986-1.jpg', 2, 5, '2024-12-23 11:36:26', '2024-12-23 11:36:26'),
(14, 'Túi xách tay phối dây rút - TOT 0186 - Màu đen', 'tui-xach-tay-phoi-day-rut-tot-0186-mau-den', 'Túi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút -', 'đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đenTúi xách tay phối dây rút - TOT 0186 - Màu đen', 400.00, 399.00, 'MASO13', 'in_stock', 1, 54, '1734979085.jpg', '1734979085-1.jpg', 2, 3, '2024-12-23 11:38:05', '2024-12-23 19:42:55'),
(15, 'Túi xách tay ép khối chần bông - TOT 0169 - Màu kem', 'tui-xach-tay-ep-khoi-chan-bong-tot-0169-mau-kem', 'Túi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kem', 'Túi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kemTúi xách tay ép khối chần bông - TOT 0169 - Màu kem', 700.00, 566.00, 'MASO14', 'in_stock', 1, 21, '1734979143.jpg', '1734979143-1.jpg', 5, 1, '2024-12-23 11:39:03', '2024-12-23 20:17:09'),
(18, 'Túi xách tay ép khối chần bông - TOT 0169 - Màu beee', 'tui-xach-tay-ep-khoi-chan-bong-tot-0169-mau-beee', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng..........', 'Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.Giữ các sản phẩm CHARLES & KEITH của bạn ở tình trạng tốt nhất. Thăm của chúng tôi trang chăm sóc sản phẩm để tìm hiểu thêm về cách chăm sóc chúng.........', 700.00, 566.00, 'MASO15', 'in_stock', 1, 22, '1735009133.jpg', '1735010718-1.jpg', 2, 3, '2024-12-23 19:58:53', '2024-12-23 20:25:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `order_id`, `rating`, `comment`, `status`, `image_path`, `created_at`, `updated_at`) VALUES
(5, 3, 11, 4, 3, 'sản phẩm tốt', 'approved', '1734973495.png', '2024-12-23 10:04:59', '2024-12-23 10:20:19'),
(6, 3, 8, 4, 4, 'sản phẩm tốt', 'approved', '1734974373.jpg', '2024-12-23 10:19:34', '2024-12-23 10:20:14'),
(7, 3, 5, 5, 2, 'Sản phẩm bình thường', 'approved', '1734977821.jpg', '2024-12-23 11:17:01', '2024-12-23 11:22:39'),
(8, 3, 7, 5, 2, 'z', 'approved', NULL, '2024-12-23 11:19:37', '2024-12-23 11:22:37'),
(9, 3, 4, 5, 4, 'Túi vô cùng sang trọng tôi rất thích nó', 'approved', NULL, '2024-12-23 11:21:40', '2024-12-23 11:22:35'),
(10, 3, 6, 5, 5, 'tôi rất thích trang web này', 'approved', NULL, '2024-12-23 11:22:01', '2024-12-23 11:22:32'),
(11, 4, 13, 6, 5, 'sản phẩm tôi rất thích', 'approved', '1735008616.jpg', '2024-12-23 19:50:16', '2024-12-23 19:52:15'),
(12, 4, 14, 6, 3, 'tôi rất thích', 'approved', NULL, '2024-12-23 19:50:38', '2024-12-23 19:52:11'),
(13, 4, 14, 7, 5, 'túi rất đẹp', 'approved', '1735010990.png', '2024-12-23 20:29:50', '2024-12-23 20:30:32'),
(14, 4, 15, 7, 2, 'tôi thích', 'approved', NULL, '2024-12-23 20:30:04', '2024-12-23 20:30:27'),
(15, 4, 18, 8, 4, 'tôi thích', 'approved', '1735012743.jpg', '2024-12-23 20:59:03', '2024-12-23 20:59:48'),
(16, 4, 12, 8, 5, 'tôi rất thích', 'approved', NULL, '2024-12-23 20:59:16', '2024-12-23 20:59:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UhaOVPL0q8fPR4ex2a4Q4nD9BqAMmNKLYjBHiBBh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid3d1RGVuV2d3a1FkN0tNZXR2UEw2UjZ3VkJxNUNQcU5sSm9wZzBmeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM1MDEyNzcxO319', 1735013015);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `tagline`, `title`, `subtitle`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'HOT HOTT', 'SẢN PHẨM GIẢM GIÁ', 'SĂN SALE THÔI', 'http://127.0.0.1:8000/shop', '1734978752.png', '1', '2024-12-23 11:32:33', '2024-12-23 11:32:33'),
(5, 'HOT HOTT', 'SẢN PHẨM GIẢM GIÁ', 'SĂN SALE THÔI', 'http://127.0.0.1:8000/shop', '1734980836.png', '1', '2024-12-23 12:07:16', '2024-12-23 12:07:16'),
(7, 'GIẢM GIÁ', 'CUỐI NĂM SALE ĐẬM', 'SĂN SALE THÔI', 'http://127.0.0.1:8000/shop', '1735012923.png', '1', '2024-12-23 21:02:04', '2024-12-23 21:02:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') NOT NULL,
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'cod', 'approved', '2024-12-23 05:35:19', '2024-12-23 08:45:21'),
(4, 3, 4, 'cod', 'approved', '2024-12-23 09:39:39', '2024-12-23 09:52:25'),
(5, 3, 5, 'cod', 'approved', '2024-12-23 11:15:03', '2024-12-23 11:15:33'),
(6, 4, 6, 'cod', 'approved', '2024-12-23 19:43:00', '2024-12-23 19:48:55'),
(7, 4, 7, 'cod', 'approved', '2024-12-23 20:17:14', '2024-12-23 20:21:44'),
(8, 4, 8, 'cod', 'approved', '2024-12-23 20:50:40', '2024-12-23 20:58:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or Customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `image`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'my su', 'mysu220805@gmail.com', '0775593418', NULL, '$2y$12$RVOoFNUtjhQB5PsMRUs0Y.mFHWAuIBXVRb2Hkmlm.MMbewAvdmide', 'assets/images/avatar/mysu.jpg', 'ADM', NULL, '2024-12-23 03:29:02', '2024-12-23 03:29:02'),
(3, 'Văn Lâm', 'lam@gmail.com', '0156876348', NULL, '$2y$12$rf6RqNXbLaIwNaUQDCtJUO1dI3FaggrYQEfnJcLa42vtFGPLCSus.', 'assets/images/avatar/ginger kitty wallpaper.jpg', 'USR', NULL, '2024-12-23 09:34:45', '2024-12-23 09:34:45'),
(4, 'Hà My', 'mysth.23ai@vku.udn.vn', '0905549383', NULL, '$2y$12$6B9tgduBqFTloXbjW3.3/OEu35qxV43QT6Q3qkDkY6gB1k7G3xMFG', 'assets/images/avatar/Gigi Hadid for Miu Miu\'s Spring 2023 campaign_ Photographed by Steven Meisel_.jpg', 'USR', NULL, '2024-12-23 19:37:50', '2024-12-23 19:37:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_recipient_user_id_foreign` (`recipient_user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `month_names`
--
ALTER TABLE `month_names`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `month_names`
--
ALTER TABLE `month_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_recipient_user_id_foreign` FOREIGN KEY (`recipient_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
