-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2018 at 12:03 PM
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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
