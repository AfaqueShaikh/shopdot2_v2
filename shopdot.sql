-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 01:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cms`
--

CREATE TABLE `admin_cms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_cms`
--

INSERT INTO `admin_cms` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'retailer-terms-and-privacy', 'retailer-terms-and-privacy', 'Retailer terms and policy', '2021-02-28 07:03:35', NULL),
(2, 'brand-terms-and-privacy', 'brand-terms-and-privacy', 'Brand terms and policy', '2021-02-28 07:03:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user_id`, `bank_name`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 3, 'HDFC', '1234567864', '2021-01-22 04:05:41', '2021-01-22 04:05:41'),
(2, 5, 'HDFC', '123456789', '2021-02-03 08:58:20', '2021-02-03 08:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

CREATE TABLE `business_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand_name` varchar(25) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `user_id`, `brand_name`, `company_name`, `city`, `state`, `zip`, `country`, `phone`, `fax`, `created_at`, `updated_at`) VALUES
(1, 3, 'Nike', 'test', 'Jamkhed', 'Maharashtra', 413201, 2, '456345634653465', '4564564', '2021-01-22 04:35:33', '2021-01-22 04:35:33'),
(2, 5, 'Fusion', 'test', 'jamkhed', 'Maharashtra', 413201, 2, '9028285332', '1234567', '2021-02-03 09:31:40', '2021-02-03 09:31:40'),
(3, 9, 'aamir', 'test', 'Jamkhed', 'Maharashtra', 413201, 2, '9028285332', '4564564', '2021-02-28 02:52:07', '2021-02-28 02:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 'Shirt', '1', '2021-01-29 10:54:45', '2021-01-29 10:54:45'),
(4, 4, 'Shirt', '1', '2021-02-02 12:16:36', '2021-02-02 12:45:35'),
(5, 3, 'Tshirt', '1', '2021-02-16 15:13:49', '2021-02-16 15:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `user_id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 3, 'return-policy', '<b>Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data&nbsp;</b><br><b>Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data&nbsp;</b><br><b>Testing data Testing data Testing data Testing data Testing data Testing data Testing data Testing data&nbsp;</b><br><b>Testing data Testing data Testing data Testing data Testing data Testing data Testing data&nbsp;</b><br>', '2021-02-01 12:01:55', '2021-02-01 07:09:27'),
(2, 3, 'shopify-sync-rule', 'Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules&nbsp;<br>Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules&nbsp;<br>Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules&nbsp;<br><br>Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules Shopify Sync Rules&nbsp;<br>Shopify Sync Rules&nbsp;<br>', '2021-02-01 12:06:39', '2021-02-01 07:14:47'),
(3, 4, 'return-policy', '', '2021-02-02 12:12:45', '2021-02-02 12:12:45'),
(4, 4, 'shopify-sync-rule', '', '2021-02-02 12:12:45', '2021-02-02 12:12:45'),
(5, 5, 'return-policy', '', '2021-02-03 08:47:20', '2021-02-03 08:47:20'),
(6, 5, 'shopify-sync-rule', '', '2021-02-03 08:47:20', '2021-02-03 08:47:20');

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
-- Table structure for table `invite_brands`
--

CREATE TABLE `invite_brands` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invite_brands`
--

INSERT INTO `invite_brands` (`id`, `user_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 5, 'umbro@gmail.com', '2021-02-04 12:47:33', '2021-02-04 12:47:33'),
(2, 5, 'lotto@gmail.com', '2021-02-04 12:50:05', '2021-02-04 12:50:05'),
(4, 5, 'sega@gmail.com', '2021-02-08 21:39:58', '2021-02-08 21:39:58'),
(5, 5, 'aamirkazi47@gmail.com', '2021-02-08 21:40:59', '2021-02-08 21:40:59');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `weight` decimal(10,0) NOT NULL,
  `weight_unit` varchar(10) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `featured_image` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `offer_available` enum('0','1') NOT NULL DEFAULT '0',
  `offer_price` decimal(10,2) DEFAULT NULL,
  `offer_startdate` varchar(50) DEFAULT NULL,
  `offer_enddate` varchar(50) DEFAULT NULL,
  `sync_from_shopify` enum('0','1') NOT NULL DEFAULT '0',
  `color` varchar(10) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `material` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `description`, `weight`, `weight_unit`, `sku`, `price`, `sale_price`, `qty`, `featured_image`, `status`, `offer_available`, `offer_price`, `offer_startdate`, `offer_enddate`, `sync_from_shopify`, `color`, `size`, `material`, `created_at`, `updated_at`) VALUES
(5, 3, 3, 'Summer Special', 'Summer', '10', 'lb', 'summer', '20.00', '45.00', 50, '0001611001612169847.jpg', '1', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(6, 4, 4, 'Printed shirt', 'test', '1', 'lb', 'summer', '30.00', '50.00', 23, '0473601001612289889.jpg', '1', '1', '40.00', '02/10/2021', '02/18/2021', '0', NULL, NULL, NULL, '2021-02-02 12:48:09', '2021-02-02 13:24:42'),
(9, 3, 0, 'Shirt', 'sdfg', '0', 'lb', 'sh345345', '1.00', '10.22', 25, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '1', '0', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-02-16 15:13:44', '2021-02-16 15:13:44'),
(10, 3, 5, 'short sleev tshirt', 'summer tshirt', '1', 'lb', 'nike-air', '1.00', '25.45', 10, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/sportswear-t-shirt-fVwcng_2.jpg?v=1613506815', '1', '0', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-02-16 15:13:49', '2021-02-16 15:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail_images`
--

CREATE TABLE `product_detail_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_detail_images`
--

INSERT INTO `product_detail_images` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(13, 5, '0092424001612169847.png', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(14, 5, '0180324001612169847.png', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(15, 5, '0280168001612169847.png', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(16, 5, '0395974001612169847.png', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(22, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '2021-02-16 15:13:44', '2021-02-16 15:13:44'),
(23, 10, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/sportswear-t-shirt-fVwcng_2.jpg?v=1613506815', '2021-02-16 15:13:49', '2021-02-16 15:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `color` varchar(25) DEFAULT NULL,
  `size` varchar(25) DEFAULT NULL,
  `material` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `image`, `sale_price`, `qty`, `sku`, `color`, `size`, `material`, `created_at`, `updated_at`) VALUES
(9, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-Y3p', 'Yellow', '3', 'poly', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(10, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-Y3f', 'Yellow', '3', 'fab', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(11, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-Y4p', 'Yellow', '4', 'poly', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(12, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-Y4f', 'Yellow', '4', 'fab', '2021-02-01 03:27:27', '2021-02-01 03:27:27'),
(13, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-r3p', 'red', '3', 'poly', '2021-02-01 03:27:28', '2021-02-01 03:27:28'),
(14, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-r3f', 'red', '3', 'fab', '2021-02-01 03:27:28', '2021-02-01 03:27:28'),
(15, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-r4p', 'red', '4', 'poly', '2021-02-01 03:27:28', '2021-02-01 03:27:28'),
(16, 5, '0001611001612169847.jpg', '20.00', 50, 'summer-r4f', 'red', '4', 'fab', '2021-02-01 03:27:28', '2021-02-01 03:27:28'),
(26, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-mYp', 'Yellow', 'm', 'poly', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(27, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-mYf', 'Yellow', 'm', 'fab', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(28, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-mrp', 'red', 'm', 'poly', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(29, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-mrf', 'red', 'm', 'fab', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(30, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-lYp', 'Yellow', 'l', 'poly', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(31, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-lYf', 'Yellow', 'l', 'fab', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(32, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-lrp', 'red', 'l', 'poly', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(33, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-lrf', 'red', 'l', 'fab', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(34, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-xYp', 'Yellow', 'xl', 'poly', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(35, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-xYf', 'Yellow', 'xl', 'fab', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(36, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-xrp', 'red', 'xl', 'poly', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(37, 6, '0473601001612289889.jpg', '50.00', 23, 'summer-xrf', 'red', 'xl', 'fab', '2021-02-02 12:48:10', '2021-02-02 12:48:10'),
(38, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:44', '2021-02-16 15:13:44'),
(39, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:44', '2021-02-16 15:13:44'),
(40, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:44', '2021-02-16 15:13:44'),
(41, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:44', '2021-02-16 15:13:44'),
(42, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(43, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(44, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(45, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(46, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(47, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(48, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(49, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(50, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(51, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(52, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(53, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(54, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:45', '2021-02-16 15:13:45'),
(55, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(56, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(57, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(58, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(59, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(60, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(61, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(62, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(63, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:46', '2021-02-16 15:13:46'),
(64, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(65, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(66, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(67, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(68, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(69, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(70, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(71, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(72, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(73, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(74, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(75, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:47', '2021-02-16 15:13:47'),
(76, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(77, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(78, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(79, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(80, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(81, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(82, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(83, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(84, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(85, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(86, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(87, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(88, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(89, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(90, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(91, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(92, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(93, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:48', '2021-02-16 15:13:48'),
(94, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:49', '2021-02-16 15:13:49'),
(95, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:49', '2021-02-16 15:13:49'),
(96, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:49', '2021-02-16 15:13:49'),
(97, 9, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/bulb.png?v=1607280059', '10.22', 25, 'sh345345', NULL, NULL, NULL, '2021-02-16 15:13:49', '2021-02-16 15:13:49'),
(98, 10, 'https://cdn.shopify.com/s/files/1/0512/8889/9771/products/sportswear-t-shirt-fVwcng_2.jpg?v=1613506815', '25.45', 10, 'nike-air', NULL, NULL, NULL, '2021-02-16 15:13:49', '2021-02-16 15:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_products`
--

CREATE TABLE `retailer_products` (
  `id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retailer_products`
--

INSERT INTO `retailer_products` (`id`, `retailer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, 6, '2021-02-06 05:12:08', '2021-02-06 05:12:08'),
(2, 5, 5, '2021-02-06 05:14:41', '2021-02-06 05:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_requests`
--

CREATE TABLE `retailer_requests` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retailer_requests`
--

INSERT INTO `retailer_requests` (`id`, `brand_id`, `retailer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 5, '1', '2021-02-06 04:30:20', '2021-02-06 04:30:20'),
(2, 3, 5, '1', '2021-02-06 04:41:53', '2021-02-08 20:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `time` varchar(10) NOT NULL,
  `unit` enum('1','2') NOT NULL COMMENT '1=>day,2=>hour',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `user_id`, `rate`, `time`, `unit`, `created_at`, `updated_at`) VALUES
(1, 3, 12, '4', '1', '2021-01-22 04:35:58', '2021-01-22 04:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=>admin,2=>brand,3=>retailer',
  `user_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=>inactive,1=>active',
  `agree_term` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=>reject,1=>accept',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `logo`, `user_type`, `user_status`, `agree_term`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'admin@gmail.com', NULL, '$2y$10$1pfvDS7OTkJbnaNn2WR2lO0bWaNiJLFjjE5nYTVgDIUKWU06j/WQ6', NULL, '1', '1', '0', NULL, NULL, NULL),
(18, 'Aamir', 'Kazi', 'aamirkazi47@gmail.com', '2021-04-08 05:34:26', '$2y$10$R/GLIdSDBB83ro1cBk9Gqu3y.5I7TElq47wNUYN/p1v53w7FS3l1u', NULL, '3', '1', '1', NULL, '2021-04-08 05:30:18', '2021-04-08 05:34:26'),
(26, 'Afaque', 'Shaikh', 'afaque.icon@gmail.com', '2021-04-30 05:32:31', '$2y$10$k06aDzbUWVqaCx5qbea4QelwkImOOB.DkE9o.IqHQMet0600NDY2m', NULL, '3', '1', '1', NULL, '2021-04-30 05:32:05', '2021-04-30 05:32:31'),
(27, 'sohel', 'patel', 'sohelahr@gmail.com', '2021-05-02 05:31:28', '$2y$10$K82LQcyghYYLbJWWdDvAlOYn2ZC8VVVHjlbz3X2CNpN7cLUwAVZDG', NULL, '3', '1', '1', NULL, '2021-05-02 05:29:03', '2021-05-02 05:31:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cms`
--
ALTER TABLE `admin_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_details`
--
ALTER TABLE `business_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invite_brands`
--
ALTER TABLE `invite_brands`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detail_images`
--
ALTER TABLE `product_detail_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_products`
--
ALTER TABLE `retailer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_requests`
--
ALTER TABLE `retailer_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
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
-- AUTO_INCREMENT for table `admin_cms`
--
ALTER TABLE `admin_cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_details`
--
ALTER TABLE `business_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invite_brands`
--
ALTER TABLE `invite_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_detail_images`
--
ALTER TABLE `product_detail_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `retailer_products`
--
ALTER TABLE `retailer_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retailer_requests`
--
ALTER TABLE `retailer_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
