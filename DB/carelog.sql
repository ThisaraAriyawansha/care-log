-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 02:03 PM
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
-- Database: `carelog`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donator_id` bigint(20) UNSIGNED NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `donation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donator_id`, `total_quantity`, `donation_date`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2025-10-09', '2025-10-09 04:49:57', '2025-10-09 04:49:57'),
(2, 1, 10, '2025-10-09', '2025-10-09 04:52:07', '2025-10-09 04:52:07'),
(3, 1, 10, '2025-10-09', '2025-10-09 04:53:47', '2025-10-09 04:53:47'),
(4, 1, 20, '2025-10-09', '2025-10-09 05:45:24', '2025-10-09 05:45:24'),
(5, 1, 200, '2025-10-09', '2025-10-09 05:52:05', '2025-10-09 05:52:05'),
(6, 1, 100, '2025-10-09', '2025-10-09 05:53:04', '2025-10-09 05:53:04'),
(7, 1, 50, '2025-10-09', '2025-10-09 05:54:20', '2025-10-09 05:54:20'),
(8, 1, 1, '2025-10-09', '2025-10-09 05:54:41', '2025-10-09 05:54:41'),
(9, 1, 5, '2025-10-09', '2025-10-09 05:56:47', '2025-10-09 05:56:47'),
(10, 1, 2, '2025-10-09', '2025-10-09 05:56:57', '2025-10-09 05:56:57'),
(11, 6, 18, '2025-10-09', '2025-10-09 06:02:13', '2025-10-09 06:02:13'),
(12, 4, 1, '2025-10-09', '2025-10-09 07:17:19', '2025-10-09 07:17:19'),
(13, 4, 2, '2025-10-09', '2025-10-09 07:18:27', '2025-10-09 07:18:27'),
(14, 6, 14, '2025-10-09', '2025-10-09 11:07:16', '2025-10-09 11:07:16'),
(15, 6, 2, '2025-10-09', '2025-10-09 11:07:32', '2025-10-09 11:07:32'),
(16, 6, 2, '2025-10-09', '2025-10-09 11:07:36', '2025-10-09 11:07:36'),
(17, 6, 2, '2025-10-09', '2025-10-09 11:07:40', '2025-10-09 11:07:40'),
(18, 8, 250, '2025-10-09', '2025-10-09 11:21:57', '2025-10-09 11:21:57'),
(19, 10, 290, '2025-10-09', '2025-10-09 11:58:58', '2025-10-09 11:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `donation_items`
--

CREATE TABLE `donation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_items`
--

INSERT INTO `donation_items` (`id`, `donation_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 43, 5, '2025-10-09 04:49:57', '2025-10-09 04:49:57'),
(2, 2, 43, 5, '2025-10-09 04:52:07', '2025-10-09 04:52:07'),
(3, 2, 44, 5, '2025-10-09 04:52:07', '2025-10-09 04:52:07'),
(4, 3, 45, 5, '2025-10-09 04:53:47', '2025-10-09 04:53:47'),
(5, 3, 46, 5, '2025-10-09 04:53:47', '2025-10-09 04:53:47'),
(6, 4, 52, 20, '2025-10-09 05:45:24', '2025-10-09 05:45:24'),
(7, 5, 50, 100, '2025-10-09 05:52:05', '2025-10-09 05:52:05'),
(8, 5, 51, 100, '2025-10-09 05:52:05', '2025-10-09 05:52:05'),
(9, 6, 51, 100, '2025-10-09 05:53:04', '2025-10-09 05:53:04'),
(10, 7, 50, 50, '2025-10-09 05:54:20', '2025-10-09 05:54:20'),
(11, 8, 50, 1, '2025-10-09 05:54:41', '2025-10-09 05:54:41'),
(12, 9, 44, 5, '2025-10-09 05:56:47', '2025-10-09 05:56:47'),
(13, 10, 44, 2, '2025-10-09 05:56:57', '2025-10-09 05:56:57'),
(14, 11, 43, 10, '2025-10-09 06:02:13', '2025-10-09 06:02:13'),
(15, 11, 44, 8, '2025-10-09 06:02:13', '2025-10-09 06:02:13'),
(16, 12, 56, 1, '2025-10-09 07:17:19', '2025-10-09 07:17:19'),
(17, 13, 45, 1, '2025-10-09 07:18:27', '2025-10-09 07:18:27'),
(18, 13, 48, 1, '2025-10-09 07:18:27', '2025-10-09 07:18:27'),
(19, 14, 46, 3, '2025-10-09 11:07:16', '2025-10-09 11:07:16'),
(20, 14, 47, 3, '2025-10-09 11:07:16', '2025-10-09 11:07:16'),
(21, 14, 48, 5, '2025-10-09 11:07:16', '2025-10-09 11:07:16'),
(22, 14, 51, 2, '2025-10-09 11:07:16', '2025-10-09 11:07:16'),
(23, 14, 52, 1, '2025-10-09 11:07:16', '2025-10-09 11:07:16'),
(24, 15, 49, 1, '2025-10-09 11:07:32', '2025-10-09 11:07:32'),
(25, 15, 50, 1, '2025-10-09 11:07:32', '2025-10-09 11:07:32'),
(26, 16, 52, 1, '2025-10-09 11:07:36', '2025-10-09 11:07:36'),
(27, 16, 55, 1, '2025-10-09 11:07:36', '2025-10-09 11:07:36'),
(28, 17, 44, 1, '2025-10-09 11:07:40', '2025-10-09 11:07:40'),
(29, 17, 45, 1, '2025-10-09 11:07:40', '2025-10-09 11:07:40'),
(30, 18, 45, 100, '2025-10-09 11:21:57', '2025-10-09 11:21:57'),
(31, 18, 47, 100, '2025-10-09 11:21:57', '2025-10-09 11:21:57'),
(32, 18, 54, 50, '2025-10-09 11:21:57', '2025-10-09 11:21:57'),
(33, 19, 47, 100, '2025-10-09 11:58:58', '2025-10-09 11:58:58'),
(34, 19, 48, 100, '2025-10-09 11:58:58', '2025-10-09 11:58:58'),
(35, 19, 51, 90, '2025-10-09 11:58:58', '2025-10-09 11:58:58');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issuer_id` bigint(20) UNSIGNED NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `issuer_id`, `total_quantity`, `issue_date`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2025-10-09', '2025-10-09 06:26:34', '2025-10-09 06:26:34'),
(2, 1, 100, '2025-10-09', '2025-10-09 06:27:50', '2025-10-09 06:27:50'),
(3, 6, 1, '2025-10-09', '2025-10-09 06:59:45', '2025-10-09 06:59:45'),
(4, 7, 6, '2025-10-09', '2025-10-09 11:00:12', '2025-10-09 11:00:12'),
(5, 7, 3, '2025-10-09', '2025-10-09 11:00:26', '2025-10-09 11:00:26'),
(6, 9, 90, '2025-10-09', '2025-10-09 11:23:52', '2025-10-09 11:23:52'),
(7, 11, 90, '2025-10-09', '2025-10-09 12:00:33', '2025-10-09 12:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `issue_items`
--

CREATE TABLE `issue_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_items`
--

INSERT INTO `issue_items` (`id`, `issue_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 47, 1, '2025-10-09 06:26:34', '2025-10-09 06:26:34'),
(2, 1, 50, 3, '2025-10-09 06:26:34', '2025-10-09 06:26:34'),
(3, 2, 43, 100, '2025-10-09 06:27:50', '2025-10-09 06:27:50'),
(4, 3, 56, 1, '2025-10-09 06:59:45', '2025-10-09 06:59:45'),
(5, 4, 53, 3, '2025-10-09 11:00:12', '2025-10-09 11:00:12'),
(6, 4, 54, 3, '2025-10-09 11:00:12', '2025-10-09 11:00:12'),
(7, 5, 46, 1, '2025-10-09 11:00:26', '2025-10-09 11:00:26'),
(8, 5, 51, 1, '2025-10-09 11:00:26', '2025-10-09 11:00:26'),
(9, 5, 52, 1, '2025-10-09 11:00:26', '2025-10-09 11:00:26'),
(10, 6, 44, 10, '2025-10-09 11:23:52', '2025-10-09 11:23:52'),
(11, 6, 53, 40, '2025-10-09 11:23:52', '2025-10-09 11:23:52'),
(12, 6, 55, 40, '2025-10-09 11:23:52', '2025-10-09 11:23:52'),
(13, 7, 46, 40, '2025-10-09 12:00:33', '2025-10-09 12:00:33'),
(14, 7, 47, 10, '2025-10-09 12:00:33', '2025-10-09 12:00:33'),
(15, 7, 50, 40, '2025-10-09 12:00:33', '2025-10-09 12:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(225) NOT NULL,
  `item_name` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `minimum_qty` int(11) DEFAULT NULL,
  `start_qty` int(10) DEFAULT NULL,
  `image_path` varchar(225) DEFAULT NULL,
  `item_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_code`, `item_name`, `quantity`, `minimum_qty`, `start_qty`, `image_path`, `item_category_id`, `status_id`, `created_at`, `updated_at`) VALUES
(43, '38648', 'School Backpack', 1, 5, 2, '20251009043913r3gihg8k1totzli0h84y.jpg', 19, 1, '2025-03-18 04:37:35', '2025-10-09 11:09:13'),
(44, '16911', 'Pain Reliever', 201, 5, 2, '20251009044024mkduvaam4imbqaeayvd2.avif', 17, 1, '2025-03-18 05:11:06', '2025-10-09 11:23:52'),
(45, '62575', 'Cooking Oil', 357, 5, 2, '20251009093157y4tvbfms9adcpkqgaivv.webp', 14, 1, '2025-03-18 05:51:57', '2025-10-09 11:21:57'),
(46, '03841', 'Baby Diapers', 267, 5, 2, '20251009044201prqd6trjkjlif9f9hjoi.png', 18, 1, '2025-03-18 07:28:24', '2025-10-09 12:00:33'),
(47, '99218', 'Cotton T-Shirts', 575, 5, 2, '20251009093328u7hvf65t2ees4th6u1cy.webp', 15, 1, '2025-03-18 07:30:05', '2025-10-09 12:00:33'),
(48, '94759', 'Winter Jackets', 706, 5, 200, '20251009093404o7yu011kacvughshv5ae.jpg', 15, 1, '2025-07-05 06:36:56', '2025-10-09 11:58:58'),
(49, '91836', 'School Socks', 301, 5, 300, '20251009093455q3oxlchxxzxgdiy5ukmk.webp', 15, 1, '2025-07-05 14:44:55', '2025-10-09 11:07:32'),
(50, '69463', 'Bathing Soap', 309, 5, 2, '20251009093538o3iprf30chg0bt6sugzo.jpeg', 16, 1, '2025-10-08 14:50:15', '2025-10-09 12:00:33'),
(51, '98895', 'Shampoo', 491, 5, 20, '20251009093617tjkuuli2n03amtleyrmk.jpg', 16, 1, '2025-10-08 14:54:51', '2025-10-09 11:58:58'),
(52, '33966', 'First Aid Ki', 621, 5, 22, '202510090937008zlffrwtvtonzkrfjwig.jpg', 17, 1, '2025-10-08 14:57:21', '2025-10-09 11:07:36'),
(53, '40266', 'Face Masks', 257, 5, 300, '20251009093745ymooua4zq5mhtm32jabv.jpeg', 17, 1, '2025-10-09 04:07:45', '2025-10-09 11:23:52'),
(54, '08734', 'School Notebooks', 347, 5, 300, '20251009093844eughsr3rqkhnmzrgr9yo.jpeg', 19, 1, '2025-10-09 04:08:44', '2025-10-09 11:21:57'),
(55, '83771', 'Ball Pens', 361, 5, 400, '202510090939213pnp4kevtqz5b9uzdot3.jpg', 19, 1, '2025-10-09 04:09:21', '2025-10-09 11:23:52'),
(56, '76263', 'Test', 200, 5, 200, NULL, 14, 1, '2025-10-09 06:58:57', '2025-10-09 07:17:19'),
(57, '55841', 'Winter Blankets', 200, 5, 200, '2025100904461155qcozivwdigwkfcy0fl.avif', 15, 1, '2025-10-09 11:16:11', '2025-10-09 11:17:19'),
(58, '02308', 'Mosquito Net', 300, 5, 200, '2025100905242896771xsym1ulbei9kplj.webp', 20, 1, '2025-10-09 11:54:28', '2025-10-09 11:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `categories`, `description`, `created_at`, `updated_at`) VALUES
(14, 'Food Items', 'Food and Nutrition', '2025-03-18 04:24:33', '2025-10-08 14:45:51'),
(15, 'Clothing', 'Clothing and Apparel', '2025-03-18 04:24:43', '2025-10-08 14:08:13'),
(16, 'Hygiene Products', 'Hygiene and Personal Care', '2025-03-18 04:45:45', '2025-10-08 14:10:39'),
(17, 'Medical Supplies', 'Medical Supplies', '2025-03-18 04:46:03', '2025-10-08 14:10:49'),
(18, 'Baby Care', 'Educational Materials', '2025-10-08 14:10:00', '2025-10-08 14:10:57'),
(19, 'Educational Materials', 'Educational Materials', '2025-10-09 04:08:08', '2025-10-09 04:08:08'),
(20, 'Household Essentials', 'Household Essentials', '2025-10-09 11:50:42', '2025-10-09 11:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_statuses_table', 1),
(2, '2014_10_11_000001_create_roles_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2024_11_25_132922_create_sessions_table', 1),
(9, '2024_11_25_165000_create_suppliers_table', 1),
(10, '2024_11_25_165647_create_items_table', 1),
(11, '2024_11_25_170214_create_stock_updates_table', 1),
(12, '2024_11_25_170325_create_expense_categories_table', 1),
(13, '2024_11_25_170516_create_permissions_table', 1),
(14, '2024_11_25_170605_create_roles_has_permissions_table', 1),
(15, '2024_11_25_170644_create_expenses_table', 1),
(16, '2024_11_25_170716_create_provinces_table', 1),
(17, '2024_11_25_170802_create_districts_table', 1),
(18, '2024_11_25_170823_create_cities_table', 1),
(19, '2024_11_25_170842_create_customers_table', 1),
(20, '2024_11_25_170905_create_settings_table', 1),
(22, '2024_11_27_181716_create_sales_table', 2),
(23, '2024_11_28_181801_create_sales_items_table', 2),
(24, '2024_11_28_181823_create_hold_orders_table', 2),
(25, '2024_11_28_181830_create_hold_order_items_table', 2),
(26, '2024_11_29_151838_create_item_categories_table', 2),
(29, '2024_12_09_174448_create_payments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permissions_name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permissions_name`, `created_at`, `updated_at`) VALUES
(10, 'Access Dashbord', '2024-12-16 02:22:36', '2025-10-09 10:27:42'),
(17, 'Access Item', '2024-12-16 04:14:57', '2025-10-09 10:28:41'),
(18, 'Access Stock', '2024-12-16 04:15:08', '2025-10-09 10:28:55'),
(19, 'Access Users', '2024-12-16 04:15:20', '2025-10-09 10:29:34'),
(20, 'Access Report', '2024-12-16 04:15:31', '2025-10-09 10:29:51'),
(21, 'Access Setting', '2024-12-16 04:15:42', '2025-10-09 10:30:05'),
(22, 'Access Donators', '2024-12-16 04:15:56', '2025-10-09 10:30:29'),
(23, 'Access Issuers', '2024-12-16 04:16:12', '2025-10-09 10:30:46'),
(28, 'Add new Item', '2024-12-16 22:02:19', '2024-12-16 22:02:19'),
(29, 'Add New User', '2024-12-17 00:55:52', '2024-12-17 00:55:52'),
(30, 'Add New Role', '2024-12-17 00:55:59', '2024-12-17 00:55:59'),
(31, 'Add New Permission', '2024-12-17 00:56:16', '2024-12-17 00:56:16'),
(32, 'User List View', '2024-12-17 00:56:31', '2024-12-17 00:56:31'),
(33, 'Role List View', '2024-12-17 00:56:43', '2024-12-17 00:56:43'),
(34, 'Permission List View', '2024-12-17 00:56:56', '2024-12-17 00:56:56'),
(35, 'User Status Control', '2024-12-17 00:57:31', '2024-12-17 00:57:31'),
(36, 'User Update', '2024-12-17 00:57:38', '2024-12-17 00:57:38'),
(37, 'Role Update', '2024-12-17 00:58:10', '2024-12-17 00:58:10'),
(38, 'Permission Update', '2024-12-17 00:58:20', '2024-12-17 00:58:20'),
(49, 'Add New Items', '2024-12-16 22:31:08', '2024-12-16 22:31:08'),
(50, 'Add New Category', '2024-12-16 22:31:23', '2024-12-16 22:31:23'),
(51, 'View Item List', '2024-12-16 22:31:37', '2024-12-16 22:31:37'),
(52, 'View Item Category List', '2024-12-16 22:32:25', '2024-12-16 22:32:25'),
(53, 'Update Item Category List', '2024-12-16 22:32:44', '2024-12-16 22:32:44'),
(54, 'Delete Item Category', '2024-12-16 22:37:50', '2024-12-16 22:37:50'),
(55, 'Delete Items', '2024-12-16 22:38:05', '2024-12-16 22:38:05'),
(56, 'Update Items', '2024-12-16 22:41:56', '2024-12-16 22:41:56'),
(57, 'Add Stock', '2024-12-17 02:45:46', '2024-12-17 02:45:46'),
(69, 'Change Password', '2025-01-03 18:28:47', '2025-01-03 18:28:47'),
(92, 'Donation History', '2025-10-09 10:42:47', '2025-10-09 10:42:47'),
(93, 'Issuring History', '2025-10-09 10:43:00', '2025-10-09 10:43:00'),
(94, 'Add Donation', '2025-10-09 10:48:30', '2025-10-09 10:48:30'),
(95, 'View Donation', '2025-10-09 10:48:37', '2025-10-09 10:48:37'),
(96, 'Get Goods', '2025-10-09 10:50:50', '2025-10-09 10:50:50'),
(97, 'View Issues', '2025-10-09 10:50:58', '2025-10-09 10:50:58');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-12-16 08:08:56', '2024-12-16 08:08:56'),
(2, 'manager', '2024-12-21 12:51:52', '2024-12-21 12:51:52'),
(3, 'Super Admin', '2025-01-10 10:44:11', '2025-01-10 10:44:11'),
(4, 'Donator', '2025-10-08 12:37:46', '2025-10-08 12:37:46'),
(5, 'Issuer', '2025-10-08 12:37:57', '2025-10-08 12:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles_has_permissions`
--

CREATE TABLE `roles_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permissions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roles_has_permissions`
--

INSERT INTO `roles_has_permissions` (`id`, `roles_id`, `permissions_id`, `created_at`, `updated_at`) VALUES
(2, 1, 10, NULL, NULL),
(3, 1, 17, NULL, NULL),
(4, 1, 18, NULL, NULL),
(5, 1, 19, NULL, NULL),
(6, 1, 20, NULL, NULL),
(7, 1, 21, NULL, NULL),
(8, 1, 22, NULL, NULL),
(9, 1, 23, NULL, NULL),
(14, 1, 28, NULL, NULL),
(15, 1, 29, NULL, NULL),
(16, 1, 30, NULL, NULL),
(17, 1, 31, NULL, NULL),
(18, 1, 32, NULL, NULL),
(19, 1, 33, NULL, NULL),
(20, 1, 34, NULL, NULL),
(21, 1, 35, NULL, NULL),
(22, 1, 36, NULL, NULL),
(23, 1, 37, NULL, NULL),
(24, 1, 38, NULL, NULL),
(28, 2, 10, NULL, NULL),
(29, 2, 17, NULL, NULL),
(30, 2, 18, NULL, NULL),
(31, 2, 19, NULL, NULL),
(32, 2, 20, NULL, NULL),
(33, 2, 21, NULL, NULL),
(34, 2, 22, NULL, NULL),
(35, 2, 23, NULL, NULL),
(36, 2, 24, NULL, NULL),
(37, 2, 25, NULL, NULL),
(38, 2, 26, NULL, NULL),
(39, 2, 27, NULL, NULL),
(40, 2, 28, NULL, NULL),
(41, 2, 29, NULL, NULL),
(42, 2, 30, NULL, NULL),
(43, 2, 31, NULL, NULL),
(44, 2, 32, NULL, NULL),
(45, 2, 33, NULL, NULL),
(46, 2, 34, NULL, NULL),
(47, 2, 35, NULL, NULL),
(48, 2, 36, NULL, NULL),
(49, 2, 37, NULL, NULL),
(50, 2, 38, NULL, NULL),
(51, 2, 39, NULL, NULL),
(52, 2, 40, NULL, NULL),
(61, 1, 49, NULL, NULL),
(62, 1, 50, NULL, NULL),
(63, 1, 51, NULL, NULL),
(64, 1, 52, NULL, NULL),
(65, 1, 53, NULL, NULL),
(66, 1, 54, NULL, NULL),
(67, 1, 55, NULL, NULL),
(68, 1, 56, NULL, NULL),
(69, 1, 57, NULL, NULL),
(81, 1, 69, NULL, NULL),
(92, 3, 10, NULL, NULL),
(93, 3, 20, NULL, NULL),
(94, 3, 21, NULL, NULL),
(114, 4, 17, NULL, NULL),
(115, 4, 18, NULL, NULL),
(117, 4, 20, NULL, NULL),
(118, 4, 21, NULL, NULL),
(119, 4, 22, NULL, NULL),
(129, 4, 32, NULL, NULL),
(130, 4, 33, NULL, NULL),
(148, 4, 51, NULL, NULL),
(149, 4, 52, NULL, NULL),
(166, 4, 69, NULL, NULL),
(181, 1, 92, NULL, NULL),
(182, 1, 93, NULL, NULL),
(183, 1, 94, NULL, NULL),
(184, 1, 95, NULL, NULL),
(185, 1, 96, NULL, NULL),
(186, 1, 97, NULL, NULL),
(187, 5, 20, NULL, NULL),
(188, 5, 21, NULL, NULL),
(189, 5, 23, NULL, NULL),
(190, 5, 69, NULL, NULL),
(191, 5, 92, NULL, NULL),
(192, 5, 93, NULL, NULL),
(193, 5, 96, NULL, NULL),
(194, 5, 97, NULL, NULL),
(195, 3, 17, NULL, NULL),
(196, 3, 18, NULL, NULL),
(197, 3, 19, NULL, NULL),
(198, 3, 22, NULL, NULL),
(199, 3, 23, NULL, NULL),
(200, 3, 28, NULL, NULL),
(201, 3, 29, NULL, NULL),
(202, 3, 30, NULL, NULL),
(203, 3, 31, NULL, NULL),
(204, 3, 32, NULL, NULL),
(205, 3, 33, NULL, NULL),
(206, 3, 34, NULL, NULL),
(207, 3, 35, NULL, NULL),
(208, 3, 36, NULL, NULL),
(209, 3, 37, NULL, NULL),
(210, 3, 38, NULL, NULL),
(211, 3, 49, NULL, NULL),
(212, 3, 50, NULL, NULL),
(213, 3, 51, NULL, NULL),
(214, 3, 52, NULL, NULL),
(215, 3, 53, NULL, NULL),
(216, 3, 54, NULL, NULL),
(217, 3, 55, NULL, NULL),
(218, 3, 56, NULL, NULL),
(219, 3, 57, NULL, NULL),
(220, 3, 69, NULL, NULL),
(221, 3, 92, NULL, NULL),
(222, 3, 93, NULL, NULL),
(223, 3, 94, NULL, NULL),
(224, 3, 95, NULL, NULL),
(225, 3, 96, NULL, NULL),
(226, 3, 97, NULL, NULL),
(227, 4, 92, NULL, NULL),
(228, 4, 93, NULL, NULL),
(229, 4, 94, NULL, NULL),
(230, 4, 95, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Yj6E8lromLX3C3KJh5ZiJOyBZTP9ZUxPiARsM1wb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNXpZeUxYNmhPaHNqOTM4WDMxa1VPbmxUbjZ6Q0RldHdmUUdMUzlLVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pdGVtcy92YWxpZGF0ZS8xMTEwMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1736185095);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2024-11-09 09:32:36', '2024-11-09 09:32:36'),
(2, 'Inactive', '2024-11-09 09:32:36', '2024-11-09 09:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `stock_updates`
--

CREATE TABLE `stock_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `items_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `note` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `stock_updates`
--

INSERT INTO `stock_updates` (`id`, `user_id`, `items_id`, `stock`, `status`, `note`, `created_at`, `updated_at`) VALUES
(5, 1, 43, 100, 1, 'abcd', '2025-07-05 04:32:28', '2025-07-05 04:32:28'),
(6, 1, 44, 200, 1, 'bbb', '2025-07-05 04:32:40', '2025-07-05 04:32:40'),
(7, 1, 45, 234, 1, 'ddd', '2025-07-05 04:32:49', '2025-07-05 04:32:49'),
(8, 1, 46, 300, 1, 'jhmbjh', '2025-07-05 04:33:01', '2025-07-05 04:33:01'),
(9, 1, 47, 400, 1, 'ghjj', '2025-07-05 04:33:09', '2025-07-05 04:33:09'),
(10, 1, 43, 1, 1, 'aaa', '2025-10-08 15:34:43', '2025-10-08 15:34:43'),
(11, 1, 43, 1, 1, 'a', '2025-10-09 03:14:47', '2025-10-09 03:14:47'),
(12, 1, 43, 100, 1, 'ABCDE', '2025-10-09 06:28:45', '2025-10-09 06:28:45'),
(13, 1, 57, 100, 1, 'Add Stock', '2025-10-09 11:17:19', '2025-10-09 11:17:19'),
(14, 1, 58, 100, 1, 'Add Stock', '2025-10-09 11:55:20', '2025-10-09 11:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `storages`
--

CREATE TABLE `storages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storages`
--

INSERT INTO `storages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, '4', '2025-03-06 14:50:11', '2025-03-06 14:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `roles_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `roles_id`, `status_id`, `gender`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0761234567', '2024-11-28 15:41:41', '$2y$12$MxU5s1UR3U38fEuLguVkO.T8RJ9lYdW6WR/AkvTxoxfnYzu/wExyC', NULL, NULL, NULL, 'HpdQGlMXoFZ4psqh1xgwt52m3iBgzGCKvbyDKm905RzXyix6s0EcyD7I3Wwi', 1, 1, 'male', NULL, NULL, '2025-10-08 15:32:09'),
(2, 'aaaa', 'student@gmail.com', '1234567890', NULL, '$2y$12$5mwtEYTPhEp7Y0EgoQFEOOgd6Gj95MOV5Ibi0yyX7PU6fULzrFYiC', NULL, NULL, NULL, NULL, 1, 1, 'male', NULL, '2024-12-16 08:10:05', '2025-10-08 14:26:42'),
(3, 'master admin', 'madmin@gmail.com', '0760123123', NULL, '$2y$12$QNF07UMEa1E.vPKvIXqcoOjh8cWuPsFw6d341Bb.Ed9iDbrQlumOu', NULL, NULL, NULL, 'VwVz1DTSCIc2cb4IAw71XKM9AQv1oBtCrsN04E0PNJZJVQsYbFb8BmoEDcD7', 1, 1, 'male', NULL, '2024-12-21 12:16:23', '2025-01-25 08:04:21'),
(4, 'abc', 'admin123@gmail.com', '1234567808', NULL, '$2y$12$TjNn.wd4YWVuYXxnxjKLKeupggdqybb8vQ2EXvKakentEyjPiPmLS', NULL, NULL, NULL, 'X4DGTnIo2D7eQUR3D0C00xgHOntEqIZljmVwOK3KOZjHnNrf8We69qPxvxKf', 2, 1, 'male', NULL, '2024-12-21 12:52:42', '2024-12-21 12:52:42'),
(5, 'Nimal', 'nimal@gmail.com', '0764534234', NULL, '$2y$12$hMV6iC87vD162.pFpcR3p.AGSxfjUYpsWNfAk32JmDTbLcocACcJy', NULL, NULL, NULL, 'viOQOz2t38UgaEEfuvOtNwh7cYJJZrGmgZtbSfkAvxX9KcrfTENLAbT5Sbq9', 3, 1, 'male', NULL, '2025-01-10 10:46:20', '2025-10-09 11:19:10'),
(6, 'Donator 1', 'd@gmail.com', '0765566789', NULL, '$2y$12$mob9I5n.cbU17gDmERMUpuhJcu4NcvxKxcB4s43DSwIBwTHPjWhPy', NULL, NULL, NULL, 'KlJQaQ9WVTX6M27pvHYgTuArjrH3x2YgWGvKZ4HElJFFflhlFkkIbjUwwSwl', 4, 1, 'male', NULL, '2025-10-09 05:59:54', '2025-10-09 11:35:12'),
(7, 'Issuers 2', 'i@gmail.com', '0765544563', NULL, '$2y$12$2c18HXGns5b33M3yR3mAOuur6t8ptbG8T7g4phBEPR/Ch/jdjJfKa', NULL, NULL, NULL, 'Mn9a5o9mgo3y7ZDzXsju4X19FQaNlE7OAGvQ2rTP3eCgViR4wHb1TN3FAhP1', 5, 1, 'male', NULL, '2025-10-09 06:54:05', '2025-10-09 11:35:25'),
(8, 'Donator', 'donator12@gmail.com', '0765544532', NULL, '$2y$12$1nILqOJ.n3EPgjCBqBx5luuBE2rDYChsRpL1ceF5UCz81/8meDKtO', NULL, NULL, NULL, 'jljEaQ1Lbkv5EjWUjWq9AwTZfLzGrXPNIYuzMcjI6K1oxguvKQDXf8jmO4G7', 4, 1, 'male', NULL, '2025-10-09 11:18:12', '2025-10-09 11:34:41'),
(9, 'Issuer 2', 'issuer12@gmail.com', '0765522123', NULL, '$2y$12$MFqvB2pq1XEu8ULYDaoEzOwDtptpgLfQilRSn29w/2Fz27gMN8At2', NULL, NULL, NULL, 'uNLQepFTWUcMApK46ec4gg7h6hJV7EaUvyMKgjsWbbNeZX5DQFP0BBdqdj7t', 5, 1, 'female', NULL, '2025-10-09 11:18:49', '2025-10-09 11:34:59'),
(10, 'Donator', 'donator@gmail.com', '0765544321', NULL, '$2y$12$bwksV5Ko0aRXQowBPpm5peq9RNwpZBL1hCYhLY/iZ.L7ppPynOVwa', NULL, NULL, NULL, 'Tlk8spM7ZJjOuMYlZ00WOi7g5LhlRua0wRBR46mm19pJkLOXsCqH43Xym4z6', 4, 1, 'male', NULL, '2025-10-09 11:55:56', '2025-10-09 11:55:56'),
(11, 'Issuer', 'issuer@gmail.com', '0786545421', NULL, '$2y$12$bEL1PVVZAYBxi3Nz/gkGB.YrRLwYE/UIjfCzw0OjEMPCmf2gp4bCi', NULL, NULL, NULL, 'kaZZKhCzLGcVoIPervCwlICZ2TXsH0vXELcpzvihFkCbi1f8zT26btw3psBb', 5, 1, 'female', NULL, '2025-10-09 11:56:25', '2025-10-09 11:56:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donator_id` (`donator_id`);

--
-- Indexes for table `donation_items`
--
ALTER TABLE `donation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_id` (`donation_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issuer_id` (`issuer_id`);

--
-- Indexes for table `issue_items`
--
ALTER TABLE `issue_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_id` (`issue_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_status_id_foreign` (`status_id`),
  ADD KEY `item_category_id_item_fk` (`item_category_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_has_permissions`
--
ALTER TABLE `roles_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_has_permissions_roles_id_foreign` (`roles_id`),
  ADD KEY `roles_has_permissions_permissions_id_foreign` (`permissions_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`),
  ADD KEY `sessions_user_id_index` (`user_id`) USING BTREE;

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_updates`
--
ALTER TABLE `stock_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_updates_user_id_foreign` (`user_id`),
  ADD KEY `stock_updates_items_id_foreign` (`items_id`);

--
-- Indexes for table `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_number_unique` (`number`),
  ADD KEY `users_roles_id_foreign` (`roles_id`),
  ADD KEY `users_status_id_foreign` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donation_items`
--
ALTER TABLE `donation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issue_items`
--
ALTER TABLE `issue_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles_has_permissions`
--
ALTER TABLE `roles_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_updates`
--
ALTER TABLE `stock_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `storages`
--
ALTER TABLE `storages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`donator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donation_items`
--
ALTER TABLE `donation_items`
  ADD CONSTRAINT `donation_items_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donation_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`issuer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issue_items`
--
ALTER TABLE `issue_items`
  ADD CONSTRAINT `issue_items_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `item_category_id_item_fk` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`),
  ADD CONSTRAINT `items_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `roles_has_permissions`
--
ALTER TABLE `roles_has_permissions`
  ADD CONSTRAINT `roles_has_permissions_permissions_id_foreign` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `roles_has_permissions_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `stock_updates`
--
ALTER TABLE `stock_updates`
  ADD CONSTRAINT `stock_updates_items_id_foreign` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `stock_updates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
