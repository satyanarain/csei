-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2018 at 12:05 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csei`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `request_id`, `created_at`, `updated_at`, `document`) VALUES
(62, 58, '2018-05-06 23:40:23', '2018-05-06 23:40:23', 'LkKyg8Sr_hwB6uh5J_Screenshot from 2017-04-06 12-11-36 (1).png'),
(63, 57, '2018-05-06 23:47:13', '2018-05-06 23:47:13', 'BOf8nAG4_FRv0zLI7_Screenshot from 2018-03-13 18-19-04.png,TJrvTmJV_hwB6uh5J_Screenshot from 2017-04-06 12-11-36 (1).png'),
(64, 76, '2018-05-17 23:47:48', '2018-05-17 23:47:48', 'vF4lNgx2_Nx4YvZjS_Screenshot from 2017-07-17 15-55-11.png,ZUr9Jcw2_Nx4YvZjS_Screenshot from 2017-07-17 15-55-11.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2018-03-21 04:48:05', '2018-03-21 04:48:05'),
(2, 'Material', '2018-03-21 04:48:05', '2018-03-21 04:48:05'),
(3, 'Service', '2018-03-21 04:48:05', '2018-03-21 04:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `committee_member_comments`
--

CREATE TABLE `committee_member_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `request_id` int(20) NOT NULL,
  `committee_member_id` int(20) DEFAULT NULL,
  `committee_member_remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_status`
--

CREATE TABLE `c_status` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `b_class` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_status`
--

INSERT INTO `c_status` (`id`, `name`, `b_class`) VALUES
(1, 'REQUESTED', 'badge badge-primary'),
(2, 'Approved', 'badge badge-info'),
(3, 'Finance Cleared', 'badge badge-warning'),
(4, 'Approved by admin', 'badge badge-secondary'),
(5, 'Complete', 'badge badge-success'),
(6, 'Rejected By Approver', 'badge badge-danger'),
(7, 'Rejected By Verifier', 'badge badge-danger'),
(8, 'Pending', 'badge badge-danger');

-- --------------------------------------------------------

--
-- Table structure for table `material_details`
--

CREATE TABLE `material_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(20) NOT NULL,
  `s_no` int(20) DEFAULT NULL,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` int(20) DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_pendding_approval_details`
--

CREATE TABLE `material_pendding_approval_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `request_id` int(20) NOT NULL,
  `material_id` int(20) NOT NULL,
  `committee_officer_id` int(20) DEFAULT NULL,
  `quotation_approval_id` int(20) NOT NULL,
  `approved_id` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_01_09_123438_entrust_setup_tables', 1),
(4, '2018_01_12_103022_add_additional_columns_to_user_table', 1),
(5, '2018_01_12_121111_create_states_table', 1),
(6, '2018_01_15_051037_create_state_user_table', 1),
(7, '2018_02_05_103614_create-osrtc-services-table', 1),
(8, '2018_02_05_105144_create-osrtc-places-table', 1),
(9, '2018_02_07_053019_create_bus_types_table', 1),
(10, '2018_02_07_060338_create_amenities_table', 1),
(11, '2018_03_20_095417_create_categories_table', 1),
(12, '2018_03_20_101108_create_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `osrtc_places`
--

CREATE TABLE `osrtc_places` (
  `id` int(10) UNSIGNED NOT NULL,
  `placeCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `osrtc_services`
--

CREATE TABLE `osrtc_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `arrivalDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrivalTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biFromPlace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biToPlace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classLayoutId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `className` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cropName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departureTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fare` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journeyDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journeyHours` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxSeatsAllowed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refundStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routeNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seatStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seatsAvailable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startPoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stuId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tripCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viaPlaces` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('satya2000chauhan@gmail.com', '$2y$10$ZP3X7fWIfCBG.l8UZMoc7.RLXCbKuBVLt1UUoeQzXf3Fixs8d2p8q', '2018-03-30 03:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `pending_quotations_`
--

CREATE TABLE `pending_quotations_` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` int(20) NOT NULL,
  `material_id` int(20) DEFAULT NULL,
  `s_no` int(20) DEFAULT NULL,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` int(20) DEFAULT NULL,
  `purchase_unit_rate` decimal(20,2) NOT NULL,
  `purchase_unit_amount` decimal(20,2) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `vendor_remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending_quotations_`
--

INSERT INTO `pending_quotations_` (`id`, `vendor_id`, `request_id`, `material_id`, `s_no`, `product_name`, `purchase_quantity`, `purchase_unit_rate`, `purchase_unit_amount`, `remark`, `vendor_remark`, `created_at`, `updated_at`) VALUES
(5, '20', 72, 1, 1, 'Pen', 2, '200.00', '400.00', 'Test', 'Test', '2018-05-10 09:14:08', '2018-05-10 09:14:08'),
(6, '20', 73, 3, 1, 'Pen73', 2, '200.00', '400.00', 'Test73', 'Remark', '2018-05-10 10:01:32', '2018-05-10 10:01:32'),
(7, '20', 73, 4, 2, 'Marker73', 2, '200.00', '400.00', 'test73', 'Remark', '2018-05-10 10:01:32', '2018-05-10 10:01:32'),
(8, '19', 73, 3, 1, 'Pen73', 2, '100.00', '200.00', 'Test73', 'Remark12', '2018-05-10 10:10:14', '2018-05-10 10:10:14'),
(9, '19', 73, 4, 2, 'Marker73', 2, '200.00', '400.00', 'test73', 'Remark12', '2018-05-10 10:10:14', '2018-05-10 10:10:14'),
(10, '19', 72, 1, 1, 'Pen', 2, '200.00', '400.00', 'Test', 'Remark123', '2018-05-10 10:11:31', '2018-05-10 10:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-user', 'Create User', 'Roles with create user permission can create users.', '2018-03-21 04:48:04', '2018-03-21 04:48:04'),
(2, 'create-request', 'Create request', 'Roles with create request permission can create requests.', '2018-03-21 04:48:04', '2018-03-21 04:48:04'),
(3, 'generate-po', 'Generate Purchage Order', 'Roles with generate po permission can generate purchage orders.', '2018-03-21 04:48:04', '2018-03-21 04:48:04'),
(4, 'reconcile-bills', 'Reconcile Bills', 'Roles with reconcile bills permission can reconcile bills and close the request.', '2018-03-21 04:48:04', '2018-03-21 04:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `po_number` varchar(100) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `v_name` varchar(500) DEFAULT NULL,
  `v_address` varchar(500) DEFAULT NULL,
  `v_phone` text,
  `v_mobile` varchar(500) DEFAULT NULL,
  `s_name` varchar(500) DEFAULT NULL,
  `s_address` text,
  `s_mobile` varchar(500) DEFAULT NULL,
  `s_phone` varchar(500) DEFAULT NULL,
  `total` varchar(500) DEFAULT NULL,
  `requisitioner` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `po_number`, `po_date`, `v_name`, `v_address`, `v_phone`, `v_mobile`, `s_name`, `s_address`, `s_mobile`, `s_phone`, `total`, `requisitioner`, `created_at`, `updated_at`) VALUES
(7, 1, '1', '2018-04-03', 'Ravi', 'Vendor Address', 'Vendor Phone', 'Vendor Mobile', 'Satya', 'Ship Address', 'Ship Mobile', 'Ship Phone', NULL, NULL, '2018-04-12 04:27:38', '2018-04-11 03:49:16'),
(8, 1, '2', '2018-04-11', 'Kisan', 'Vendor Address', 'Vendor Phone', 'Vendor Mobile', 'Ram', 'Ship Address', 'Ship Mobile', 'Ship Phone', NULL, NULL, '2018-04-12 04:27:46', '2018-04-11 04:07:10'),
(9, 1, '3', '2018-04-11', 'Rakesh', 'Vendor Address', 'Vendor Phone', 'Vendor Mobile', 'Ship Name', 'Ship Address', 'Ship Mobile', 'Ship Phone', '4108.00', NULL, '2018-04-12 04:28:00', '2018-04-11 04:07:59'),
(10, 1, '3', '2018-04-11', 'Salim', 'Vendor Address', 'Vendor Phone', 'Vendor Mobile', 'Ship Name', 'Ship Address', 'Ship Mobile', 'Ship Phone', '4108.00', NULL, '2018-04-12 04:28:09', '2018-04-11 04:11:50'),
(11, 1, '3', '2018-04-11', 'Kamal', 'Vendor Address', 'Vendor Phone', 'Vendor Mobile', 'Ship Name', 'Ship Address', 'Ship Mobile', 'Ship Phone', '4108.00', NULL, '2018-04-12 04:28:20', '2018-04-11 04:13:04'),
(12, 1, '4', '2018-04-04', 'Apurva', 'C6 basant kunj', '42343243434', '34343434344', 'Ship Name', 'Ship Address', '342343243', '432423443', '70000.00', 'test', '2018-04-12 01:14:49', '2018-04-12 01:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_committees`
--

CREATE TABLE `purchase_committees` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  `member_id` varchar(500) NOT NULL,
  `head_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_committees`
--

INSERT INTO `purchase_committees` (`id`, `name`, `created_at`, `updated_at`, `status`, `member_id`, `head_id`) VALUES
(1, 'Committee1', '2018-04-25 07:29:53', '2018-04-25 01:59:53', NULL, '1,4,2,3', 1),
(2, 'c2', '2018-04-25 08:16:02', '2018-04-25 02:46:02', NULL, '6,5,1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(20) NOT NULL,
  `purchase_id` int(20) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `purchase_quantity` int(20) NOT NULL,
  `purchase_unit_rate` varchar(500) NOT NULL,
  `purchase_unit_amount` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `product_code`, `product_name`, `purchase_quantity`, `purchase_unit_rate`, `purchase_unit_amount`, `created_at`, `updated_at`) VALUES
(5, 7, '#1', 'product1', 1, '1000', '1000.00', '2018-04-11 09:19:16', '2018-04-11 09:19:16'),
(6, 7, '#3', 'product2', 2, '30000', '60000.00', '2018-04-11 09:19:16', '2018-04-11 09:19:16'),
(7, 7, '#3', 'product3', 3, '40000', '120000.00', '2018-04-11 09:19:16', '2018-04-11 09:19:16'),
(8, 11, '#11', 'product11', 2, '2000', '4000.00', '2018-04-11 09:43:04', '2018-04-11 09:43:04'),
(9, 11, '#1', 'product11', 2, '54', '108.00', '2018-04-11 09:43:04', '2018-04-11 09:43:04'),
(10, 12, '#2232', 'product1', 2, '10000', '20000.00', '2018-04-12 06:44:49', '2018-04-12 06:44:49'),
(11, 12, '#1223', 'product2', 5, '10000', '50000.00', '2018-04-12 06:44:49', '2018-04-12 06:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(20) NOT NULL,
  `material_id` int(20) DEFAULT NULL,
  `s_no` int(20) DEFAULT NULL,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` int(20) DEFAULT NULL,
  `remark` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

CREATE TABLE `quotation_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(20) NOT NULL,
  `material_id` int(20) DEFAULT NULL,
  `s_no` int(20) DEFAULT NULL,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` int(20) DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `vendor_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` int(20) NOT NULL,
  `rfq_no` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_send_for_comparision`
--

CREATE TABLE `quotation_send_for_comparision` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `request_id` int(20) NOT NULL,
  `associate_id` int(20) DEFAULT NULL,
  `committee_member_remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_no` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `required_by_date` date NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci,
  `due_date` date DEFAULT NULL,
  `name_of_project` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_expense_head` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_of_use` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifire_id` int(20) DEFAULT NULL,
  `approver_id` int(20) DEFAULT NULL,
  `rejectore_id` int(20) DEFAULT NULL,
  `director_id` int(20) DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `amount_issued` decimal(20,0) DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_no`, `category_id`, `user_id`, `amount`, `required_by_date`, `purpose`, `due_date`, `name_of_project`, `project_expense_head`, `description_of_use`, `verifire_id`, `approver_id`, `rejectore_id`, `director_id`, `comments`, `amount_issued`, `date_issued`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSEI/C-1/2018/05/28', '1', 1, 2000.00, '2018-05-29', 'Personal', '2018-05-28', 'Name Of Project', 'Project Expense Head', 'twst', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-05-28 04:52:34', '2018-05-28 06:10:38'),
(2, 'CSEI/C-2/2018/05/28', '1', 3, 2000.00, '2018-05-28', 'Official', '2018-05-28', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-28 05:25:45', '2018-05-28 05:25:45'),
(3, 'CSEI/C-3/2018/05/28', '1', 1, 2000.00, '2018-05-28', 'Personal', '2018-05-28', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-28 05:32:34', '2018-05-28 05:32:34'),
(4, 'CSEI/C-4/2018/05/28', '1', 1, 2000.00, '2018-05-29', 'Personal', '2018-05-28', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2018-05-28 05:33:54', '2018-05-29 04:22:18'),
(5, 'CSEI/C-5/2018/05/28', '1', 1, 2000.00, '2018-05-28', 'Personal', '2018-05-28', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2018-05-28 06:40:08', '2018-05-29 04:17:38'),
(6, 'CSEI/C-6/2018/05/29', '1', 1, 1111.00, '2018-05-29', 'Personal', '2018-05-29', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, 1, NULL, NULL, NULL, NULL, 5, '2018-05-29 04:46:20', '2018-05-29 07:22:47'),
(7, 'CSEI/C-7/2018/05/29', '1', 4, 2000.00, '2018-05-29', 'Personal', '2018-05-29', 'Name of Project', 'Project Expense Head', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-29 06:10:37', '2018-05-29 06:10:37'),
(8, 'CSEI/C-8/2018/05/29', '1', 4, 2000.00, '2018-05-29', 'Personal', '2018-05-29', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-29 06:47:51', '2018-05-29 06:47:51'),
(9, 'CSEI/C-9/2018/05/29', '1', 1, 2000.00, '2018-05-29', 'Personal', '2018-05-29', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-29 07:15:06', '2018-05-29 07:15:06'),
(10, 'CSEI/C-10/2018/05/30', '1', 9, 2000.00, '2018-05-30', 'Personal', '2018-05-30', NULL, NULL, 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-30 00:02:56', '2018-05-30 00:02:56'),
(11, 'CSEI/C-11/2018/05/30', '1', 1, 2000.00, '2018-05-30', 'Personal', '2018-05-30', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-30 00:08:20', '2018-05-30 00:08:20'),
(12, 'CSEI/C-12/2018/05/30', '1', 9, 2000.00, '2018-05-30', 'Personal', '2018-05-30', 'Name of Project', 'Project Expense Head', 'TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2018-05-30 00:35:44', '2018-05-30 00:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(20) NOT NULL,
  `s_no` int(20) DEFAULT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci,
  `purchase_quantity` int(20) DEFAULT NULL,
  `remark` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_no` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `required_by_date` date NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci,
  `due_date` date DEFAULT NULL,
  `name_of_project` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_expense_head` decimal(20,2) DEFAULT NULL,
  `description_of_use` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifire_id` int(20) DEFAULT NULL,
  `approver_id` int(20) DEFAULT NULL,
  `rejectore_id` int(20) DEFAULT NULL,
  `director_id` int(20) DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `amount_issued` decimal(20,0) DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_logs`
--

INSERT INTO `request_logs` (`id`, `request_no`, `category_id`, `user_id`, `amount`, `required_by_date`, `purpose`, `due_date`, `name_of_project`, `project_expense_head`, `description_of_use`, `verifire_id`, `approver_id`, `rejectore_id`, `director_id`, `comments`, `amount_issued`, `date_issued`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSEI/C-7/2018/05/29', '1', 4, 2000.00, '2018-05-29', 'Personal', '2018-05-29', 'Name of Project', '0.00', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-29 06:10:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', 'Administrator is having authority to access entire system, create users, make request etc.', '2018-03-21 04:48:01', '2018-03-21 04:48:01'),
(5, 'Director', 'Director', 'Accountant is having authority to create a request, reconcile a bill etc.', '2018-03-21 04:48:01', '2018-03-21 04:48:01'),
(6, 'Employee', 'Employee', 'Employee', '2018-04-13 01:02:02', '2018-04-13 01:02:02'),
(7, 'Finance Head', 'Finance Head', 'Finance Head', '2018-04-13 01:22:59', '2018-04-13 01:22:59'),
(10, 'ops director', 'OPS Director', 'Operations Director', '2018-04-25 04:10:03', '2018-04-25 04:10:03'),
(11, 'coordinator', 'Coordinator', 'Admin coordinator', '2018-05-28 07:29:50', '2018-05-28 07:29:50'),
(12, 'office assistance', 'Office Assistance', 'Office Assistance can create requests and request approve/verify by finance clearance', '2018-05-29 23:14:25', '2018-05-29 23:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles_copy`
--

CREATE TABLE `roles_copy` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_copy`
--

INSERT INTO `roles_copy` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', 'Administrator is having authority to access entire system, create users, make request etc.', '2018-03-21 04:48:01', '2018-03-21 04:48:01'),
(2, 'requester', 'Requester', 'Requester is having authority to create a request.', '2018-03-21 04:48:01', '2018-03-21 04:48:01'),
(3, 'verifier', 'Verifier', 'Verifier is having authority to verify a request. He/She can accept a request or reject a request with comment.', '2018-03-21 04:48:01', '2018-03-21 04:48:01'),
(4, 'approver', 'Approver', 'Approver is having authority to approve a request. He/She can accept a request or reject a request with comment.', '2018-03-21 04:48:01', '2018-03-21 04:48:01'),
(5, 'Director', 'Director', 'Accountant is having authority to create a request, reconcile a bill etc.', '2018-03-21 04:48:01', '2018-03-21 04:48:01'),
(6, 'Employee', 'Employee', 'Employee', '2018-04-13 01:02:02', '2018-04-13 01:02:02'),
(7, 'Finance Head', 'Finance Head', 'Finance Head', '2018-04-13 01:22:59', '2018-04-13 01:22:59'),
(10, 'ops director', 'OPS Director', 'Operations Director', '2018-04-25 04:10:03', '2018-04-25 04:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(6, 6),
(3, 7),
(5, 7),
(4, 11),
(9, 12);

-- --------------------------------------------------------

--
-- Table structure for table `service_documents`
--

CREATE TABLE `service_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(20) NOT NULL,
  `associate_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_documents`
--

INSERT INTO `service_documents` (`id`, `request_id`, `associate_id`, `created_at`, `updated_at`, `document`) VALUES
(64, 67, 1, '2018-05-07 01:54:01', '2018-05-07 01:54:01', 'K7SRO7jg_hwB6uh5J_Screenshot from 2017-04-06 12-11-36 (1).png'),
(65, 63, 1, '2018-05-07 02:05:45', '2018-05-07 02:05:45', '9h8SA4zV_hwB6uh5J_Screenshot from 2017-04-06 12-11-36 (1).png,gm9ArHl4_hwB6uh5J_Screenshot from 2017-04-06 12-11-36 (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `code`, `name`) VALUES
(1, 'UP', 'Uttar Pradesh'),
(2, 'HR', 'Haryana'),
(3, 'OR', 'Orissa'),
(4, 'RJ', 'Rajasthan'),
(5, 'DL', 'Delhi'),
(6, 'WB', 'West Bengal'),
(7, 'MH', 'Maharashtra'),
(8, 'TN', 'Tamil Nadu'),
(9, 'HP', 'Himachal Pradesh'),
(10, 'BR', 'Bihar'),
(11, 'GJ', 'Gujarat'),
(12, 'MP', 'Madhya Pradesh'),
(13, 'PB', 'Punjab'),
(14, 'UK', 'Uttarakhand');

-- --------------------------------------------------------

--
-- Table structure for table `state_user`
--

CREATE TABLE `state_user` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state_user`
--

INSERT INTO `state_user` (`state_id`, `user_id`) VALUES
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'test', '2018-04-24 07:15:09', '2018-04-24 07:15:09', NULL),
(2, 'test1', '2018-04-25 03:23:16', '2018-04-25 03:23:16', NULL),
(3, 't2', '2018-04-30 00:52:36', '2018-04-30 00:52:36', NULL),
(4, 't1', '2018-04-30 00:54:18', '2018-04-30 00:54:18', NULL),
(5, '434', '2018-04-30 00:58:03', '2018-04-30 00:58:03', NULL),
(6, 'Jay Prakash', '2018-05-24 00:12:31', '2018-05-24 00:12:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test`) VALUES
(2, 'satya'),
(4, 'satya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_reset_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifiers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_limit` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` bigint(202) DEFAULT NULL,
  `ifsc_code` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` text COLLATE utf8mb4_unicode_ci,
  `registration_no` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no_upload` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no_upload` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no_upload` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_vendor` int(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `contact`, `profile_picture`, `manual_reset_password_token`, `approvers`, `verifiers`, `credit_limit`, `bank_name`, `account_no`, `ifsc_code`, `branch_address`, `registration_no`, `registration_no_upload`, `pan_no`, `pan_no_upload`, `gst_no`, `gst_no_upload`, `roles_vendor`, `status`) VALUES
(1, 'Main Admin', 'satyamcavns@gmail.com', '$2y$10$eV1P/YrlwedanDXT5ezk.ecdigJ0lvHlDvVN/kcThrcoposgCI1qu', 'mYWHQLQPi7pinPCCAZa61Eev7V5F8GLE8UB6JSCDshV4BzRM9hyDV81YFzmd', '2018-03-21 04:47:59', '2018-05-28 00:45:43', '9971361243', NULL, NULL, '3,4,5,6,8', '3,4,5,6,8', NULL, '', 0, '', '', '', '', '', '', '', '', NULL, 1),
(2, 'Kunal', 'requester@gmail.com', '$2y$10$kiKTSY7tDlWuy0ZAM8E0guxM/P5i6x1uy71GdEgnD9FF3o4JxIWaq', NULL, '2018-03-21 04:47:59', '2018-05-16 00:56:20', '9971361243', NULL, NULL, '3,4,5', '3,4,5', NULL, '', 0, '', '', '', '', '', '', '', '', NULL, 1),
(3, 'Satyanarain', 'satya2000chauhan@gmail.com', '$2y$10$ue4WrO5sI6xSy2lAmXOTo.vBeWba/IQs71ZD3QiIRn8x3/HeJ5F8e', 'qwfSAtx3eOVWEIpVL0PT467xHgf5t75tgbCtnD9p1cvSNv0OjJ9qcUBnUzwA', '2018-03-21 04:48:00', '2018-05-16 01:24:27', '9971361243', NULL, NULL, '4', '3', NULL, '', 0, '', '', '', '', '', '', '', '', NULL, 1),
(4, 'Apurv', 'apurv_sharma@opiant.in', '$2y$10$f0UzhEB09VK4URDvczvQae04vmDgb/O16KdI7iJT/hK.RWqBYweMe', 'wIqusGVXPn4eRHUwpHYT6jpnJevNlvFsNaVw2XLAt2iWMkuyDipGS9Ekc78b', '2018-03-21 04:48:00', '2018-05-30 01:00:55', '9971361243', 'TvWmPosG_Screenshot from 2017-08-22 11-53-36.png', NULL, '4', NULL, NULL, '', 0, '', '', '', '', '', '', '', '', NULL, 1),
(5, 'Admin Associates(Accountant)', 'satya2000chauhan@yahoo.com', '$2y$10$WQYmc6VGQ.fE.pOlnUbkNO/qtWHarQJYcpp0acgA.C.vijEs0kwni', 'H7km0D7xGDcrqR3Bbk36MoPeTwwqRLMWGsPG2kyTW5icZbdRCASOPH2mDnFG', '2018-03-21 04:48:00', '2018-04-25 06:47:47', '9971361243', NULL, NULL, '4', '3', NULL, '', 0, '', '', '', '', '', '', '', '', NULL, 1),
(6, 'Aarti Chitkara', 'aarti_chitkara@opiant.in', '$2y$10$yZHCirNnydpp5GZAbsg1Z.5JzvLIMkmRZKxq6BBgR50fwMhGE1CNa', NULL, '2018-04-04 00:05:27', '2018-05-28 00:53:52', '9510074970', 'P74WyjFx_Screenshot from 2016-10-24 14-45-40.png', 'GMgs8CamaE9Sl4439K3cGRfWYveF4TDtOFOKiu6oRbNdH1fhbY53xrZXLMFv', '1,2,3', NULL, NULL, '', 0, '', '', '', '', '', '', '', '', NULL, 0),
(7, 'Nagerdra Singh', 'nagendra_singh@opiant1.in', '$2y$10$MDtkcYZp8fre.gS/Y25zxeyrq25fv1GyZKQ.uQR7ZFfoP98ds3xJW', NULL, '2018-04-27 00:09:54', '2018-04-27 00:09:54', '9999000000', NULL, 'jptfbFY2twhCqHhbfYwhDA0No5VzNsMiqLWTxDHGRrg038b3ctx9OGagyqDU', '1,2,3,4', '1,2,3,4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 'Pulkit', 'pulkit_arora@opiant.in', '$2y$10$pQV/VjlQ05RPbryCS.7hTOTmGhpUDBLGsw3AsNX52WTrmQe3CrNPC', NULL, '2018-04-30 00:49:04', '2018-04-30 00:49:04', '4455554545', NULL, 'UqiTMDlLHwezwj3KYmiU4N33njTTaf04EiY8w52SJd41fboEPiE1oC6238gy', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'Bittoo Sharma(Office Assis.)', 'satyanarain_chauhan@opiant.in', '$2y$10$H/axUk81h6syR9e3bQn8aOCrsEtoSiSmqrN4WFhuxwcCeGze4NMV.', 'G3kXcAEjaFGtgAf1XZ9TBi8lrXTfhK84O27fhMgph1cLXKU7EHFj8ReQVvnQ', '2018-05-29 23:28:51', '2018-05-29 23:29:51', '8510074970', NULL, '6YzwcJVaUvTAHw76wkvByvY9jYNtiYXgFYrFNlrH9DAxKUuyFJwCeoVSTsgm', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` bigint(202) DEFAULT NULL,
  `ifsc_code` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` text COLLATE utf8mb4_unicode_ci,
  `upload_document` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no_upload` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no_upload` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no_upload` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `created_at`, `updated_at`, `contact`, `bank_name`, `account_no`, `ifsc_code`, `branch_address`, `upload_document`, `registration_no`, `registration_no_upload`, `pan_no`, `pan_no_upload`, `gst_no`, `gst_no_upload`, `status`) VALUES
(19, 'Satyanarain2000', 'satya2000chauhan@gmail.com', '2018-04-25 05:50:38', '2018-05-09 23:25:00', '8510074970', 'ICICI', 629601512102, '454545445', 'test123', 'hwB6uh5J_Screenshot from 2017-04-06 12-11-36.png', '45454544RT', 'HIlUAiQ3_Screenshot from 2017-07-10 09-58-27.png', '23232ddddd', 'Nx4YvZjS_Screenshot from 2017-07-17 15-55-11.png', '34343434', 'FRv0zLI7_Screenshot from 2018-03-13 18-19-04.png', 1),
(20, 'Ravimcavns', 'satyamcavns@gmail.com', '2018-04-25 06:44:11', '2018-05-09 05:04:19', '3232323232', 'ICICI', 629601512102, '454545445', 'test', 'xrqRzCiD_Screenshot from 2017-05-29 15-43-32.png', '45454544RT', 'Cb8r6mSc_Screenshot from 2017-07-10 09-58-27.png', 'BBRPC0481N', NULL, '34343434', 'F06AhRmg_Screenshot from 2017-07-10 09-58-27.png', 1),
(21, 'Subhash', 'subhash_chandra@opiant.in', '2018-04-25 07:02:36', '2018-05-08 01:12:14', '8510074970', 'ICICI', 629601512102, '454545445', 'vikas puri', NULL, '45454544RT', NULL, '23232ddddd', NULL, '34343434', NULL, 1),
(23, 'Kisan', 'kisan1@gmail.com', '2018-04-25 07:08:46', '2018-05-07 02:59:02', '8510074970', 'ICICI', 629601512102, '454545445', 'test', NULL, '45454544RT', NULL, '23232ddddd', NULL, '34343434', NULL, 1),
(24, 'Pulkit', 'pulkit_arora@opiant.in', '2018-04-30 01:09:58', '2018-04-30 01:09:58', '4455554545', 'Test', 43434343433, 'ewrrere43', 'terrtt', 'uX253RsA_process detail for software development.docx', 'test', 'FZ7xH6lH_csei_flow_chart.docx', 'test2', 'RjXDT15u_Rablox_ITMS_Vision & Scope_v1.1.pdf', '43343', 'Y9zYp2rr_bus.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_quotation_lists`
--

CREATE TABLE `vendor_quotation_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` int(20) NOT NULL,
  `material_id` int(20) DEFAULT NULL,
  `s_no` int(20) DEFAULT NULL,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` int(20) DEFAULT NULL,
  `purchase_unit_rate` decimal(20,2) NOT NULL,
  `purchase_unit_amount` decimal(20,2) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `vendor_remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verdor_masters`
--

CREATE TABLE `verdor_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verdor_masters`
--

INSERT INTO `verdor_masters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Satya', '2018-03-21 04:48:05', '2018-03-21 04:48:05'),
(2, 'Nagender', '2018-03-21 04:48:05', '2018-03-21 04:48:05'),
(3, 'Subash', '2018-03-21 04:48:05', '2018-03-21 04:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `request_id` int(20) NOT NULL,
  `voucher_creater_id` int(20) NOT NULL,
  `date_of_release` date DEFAULT NULL,
  `voucher_commens` text,
  `release_voucher_amount` decimal(20,2) DEFAULT NULL,
  `payment_type` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `request_id`, `voucher_creater_id`, `date_of_release`, `voucher_commens`, `release_voucher_amount`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 56, 1, '2018-05-01', 'we', '23.00', NULL, '2018-05-01 05:30:20', '2018-05-01 05:30:20'),
(5, 56, 1, '2018-05-10', 'test', '2000.00', NULL, '2018-05-01 23:51:00', '2018-05-01 23:51:00'),
(6, 57, 1, '2018-05-16', 'twest', '243.00', NULL, '2018-05-03 03:38:06', '2018-05-03 03:38:06'),
(7, 56, 1, '2018-05-04', 'tset', '2000.00', NULL, '2018-05-04 00:37:20', '2018-05-04 00:37:20'),
(8, 56, 1, '2018-05-04', 'Comment test', '2000.00', NULL, '2018-05-04 05:49:14', '2018-05-04 05:49:14'),
(9, 76, 1, '2018-05-18', 'test', '1000.00', NULL, '2018-05-17 23:42:26', '2018-05-17 23:42:26'),
(10, 91, 1, '2018-05-24', 'terrre', '20000.00', NULL, '2018-05-24 04:10:50', '2018-05-24 04:10:50'),
(11, 91, 1, '2018-05-25', 'wre', '23233232.00', NULL, '2018-05-24 04:12:33', '2018-05-24 04:12:33'),
(12, 91, 1, '2018-05-24', 'ewew', '343434.00', NULL, '2018-05-24 04:14:09', '2018-05-24 04:14:09'),
(13, 91, 1, '3434-05-24', 'wewewe', '23423423.00', NULL, '2018-05-24 04:15:21', '2018-05-24 04:15:21'),
(14, 91, 1, '2018-05-24', 'rtesr', '20000.00', NULL, '2018-05-24 04:17:49', '2018-05-24 04:17:49'),
(15, 92, 1, '2018-05-24', 'w', '2333333333333.00', NULL, '2018-05-24 04:23:28', '2018-05-24 04:23:28'),
(16, 4, 1, NULL, NULL, NULL, NULL, '2018-05-28 05:45:56', '2018-05-28 05:45:56'),
(17, 4, 1, NULL, NULL, NULL, NULL, '2018-05-28 05:46:10', '2018-05-28 05:46:10'),
(18, 1, 1, NULL, NULL, NULL, NULL, '2018-05-28 06:10:39', '2018-05-28 06:10:39'),
(19, 4, 1, NULL, NULL, NULL, NULL, '2018-05-28 06:35:42', '2018-05-28 06:35:42'),
(20, 5, 1, NULL, NULL, NULL, NULL, '2018-05-29 00:43:12', '2018-05-29 00:43:12'),
(21, 5, 1, NULL, NULL, NULL, NULL, '2018-05-29 01:08:04', '2018-05-29 01:08:04'),
(22, 4, 1, '0000-00-00', 'Comment', '323.00', '1', '2018-05-29 04:22:18', '2018-05-29 04:22:18'),
(23, 6, 4, '0000-00-00', 'Comment', '200.00', '1', '2018-05-29 05:09:44', '2018-05-29 05:09:44'),
(24, 6, 4, '0000-00-00', 'tes', '120.00', '1', '2018-05-29 07:22:47', '2018-05-29 07:22:47'),
(25, 12, 4, '0000-00-00', 'Comment', '1000.00', '1', '2018-05-30 00:54:22', '2018-05-30 00:54:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_member_comments`
--
ALTER TABLE `committee_member_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_status`
--
ALTER TABLE `c_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_details`
--
ALTER TABLE `material_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_pendding_approval_details`
--
ALTER TABLE `material_pendding_approval_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osrtc_places`
--
ALTER TABLE `osrtc_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osrtc_services`
--
ALTER TABLE `osrtc_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pending_quotations_`
--
ALTER TABLE `pending_quotations_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_committees`
--
ALTER TABLE `purchase_committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_details`
--
ALTER TABLE `quotation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_send_for_comparision`
--
ALTER TABLE `quotation_send_for_comparision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_created_by_foreign` (`user_id`);

--
-- Indexes for table `request_details`
--
ALTER TABLE `request_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_logs`
--
ALTER TABLE `request_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_created_by_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `roles_copy`
--
ALTER TABLE `roles_copy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `service_documents`
--
ALTER TABLE `service_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_user`
--
ALTER TABLE `state_user`
  ADD KEY `state_user_state_id_foreign` (`state_id`),
  ADD KEY `state_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_quotation_lists`
--
ALTER TABLE `vendor_quotation_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verdor_masters`
--
ALTER TABLE `verdor_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `committee_member_comments`
--
ALTER TABLE `committee_member_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_status`
--
ALTER TABLE `c_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `material_details`
--
ALTER TABLE `material_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material_pendding_approval_details`
--
ALTER TABLE `material_pendding_approval_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `osrtc_places`
--
ALTER TABLE `osrtc_places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `osrtc_services`
--
ALTER TABLE `osrtc_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_quotations_`
--
ALTER TABLE `pending_quotations_`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `purchase_committees`
--
ALTER TABLE `purchase_committees`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation_details`
--
ALTER TABLE `quotation_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation_send_for_comparision`
--
ALTER TABLE `quotation_send_for_comparision`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_logs`
--
ALTER TABLE `request_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles_copy`
--
ALTER TABLE `roles_copy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `service_documents`
--
ALTER TABLE `service_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `vendor_quotation_lists`
--
ALTER TABLE `vendor_quotation_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `verdor_masters`
--
ALTER TABLE `verdor_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_created_by_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state_user`
--
ALTER TABLE `state_user`
  ADD CONSTRAINT `state_user_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `state_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
