-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 02:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `schedule` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `metting` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `lead_id`, `location`, `schedule`, `time`, `metting`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'kjglkdf', '2023-07-18', '12:05:05', '1', 'kljwkejtklw', NULL, '2023-07-26 01:50:27', '2023-07-26 01:50:27'),
(4, 1, 'fsfsd', '2023-07-03', '12:00:00', '1', 'dfjalkjfa', NULL, '2023-07-26 04:16:55', '2023-07-26 04:16:55'),
(5, 1, 'djflsk', '2023-07-18', '20:25:00', '1', 'd,f.smd,', NULL, '2023-07-26 04:30:03', '2023-07-26 04:30:03'),
(6, 6, 'jhhjgjg', '2023-08-01', '13:00:00', '1', 'khkjhj jhj ghgjh', NULL, '2023-08-02 01:36:10', '2023-08-02 01:36:10'),
(7, 2, 'porbander2', '2023-08-15', '12:00:00', '1', NULL, NULL, '2023-08-09 03:57:43', '2023-08-09 03:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `add_users`
--

CREATE TABLE `add_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_users`
--

INSERT INTO `add_users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(7, 'fskdjfksl11', 'kjslkdjs11@dlsjfls.dsfs', '12345678', '2023-08-09 02:30:20', '2023-08-09 02:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT '1 = admin ,2 = company , 3= company user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`, `company_id`, `user_id`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$CN0nNeuLCVHNdGOGI1QZmOJofdsxQ3R5LWBlNaWyvj6pJngiSDY4a', 1, NULL, '2023-07-25 09:47:28', '2023-07-25 09:47:28', NULL, NULL),
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$eAblvOK.ywqDQ.Y5CNkfeubHI/KHjis4H3/v5LXmxs.kxEDTSMoEu', 1, NULL, '2023-07-26 00:11:07', '2023-07-26 00:11:07', NULL, NULL),
(19, 'shivam corporation', 'shivam@gmail.com', NULL, '$2y$10$XXXqtLzAwPFwBsnHyoNFIuHGGjAkY61DV6GgF4ZK8qljM.9W1yKJa', 2, NULL, '2023-08-05 07:23:32', '2023-08-05 07:23:32', 1, NULL),
(20, 'xplore solution', 'xplore@gmail.com', NULL, '$2y$10$/ItMSoIMSJQ/ZKgkYxULSeXH6sp9lg0773094pySfMGOy3IadxGTe', 2, NULL, '2023-08-09 00:43:44', '2023-08-09 00:43:44', 2, NULL),
(21, 'xplore', 'xplore1@gmail.com', NULL, '$2y$10$iIeMWhBBcvEa44Y.bna.auApS.H5HceubLE/7xGIhx2LyIPQdPhOq', 2, NULL, '2023-08-09 00:44:56', '2023-08-09 00:44:56', 6, NULL),
(22, 'Expert slution', 'expert@gmail.cm', NULL, '$2y$10$Ao1Cqqbc1wxVM6NsNdIgke7lx02cpfDwtjm3M8kdLDU7aRa8PAZGC', 2, NULL, '2023-08-09 00:55:51', '2023-08-09 00:55:51', 7, NULL),
(23, 'Expert slution', 'rwerw@dfgdf.gdfg', NULL, '$2y$10$kN/Yn.Led7ot4wVrAko7auv6hPqWcJJYb0GH8/TCFbNR81rF9bUIO', 2, NULL, '2023-08-09 00:57:43', '2023-08-09 00:57:43', 8, NULL),
(24, 'dsfsd', 'khjh@dfgd.fgd', NULL, '$2y$10$8A04MFUJ3nc6w2jzYgjbzObomdYy0ad/NPWILd4XEXeM5nYIyAfjS', 2, NULL, '2023-08-09 00:58:40', '2023-08-09 00:58:40', 9, NULL),
(25, 'khdfkjfsh', 'jhkjfdh@kdjffk.gd', NULL, '$2y$10$8BFCSgOi5BSf08MN61340.YW9YPI/cUu6Mcymuuh30DhpQBKTfpRK', 2, NULL, '2023-08-09 01:26:14', '2023-08-09 01:26:14', 10, NULL),
(26, 'khdfkjfsh', 'jhkjfdh11@kdjffk.gd', NULL, '$2y$10$cOgoOtvf51oZ331jYXbB6umkS7YYcBvr..tXBTmA.Fuisu505GXXm', 2, NULL, '2023-08-09 01:26:29', '2023-08-09 01:26:29', 12, NULL),
(27, 'hkj', 'hjhjkh@rrwe.rwer', NULL, '$2y$10$KOPwGEqC.v0K0xNXB0SGCONkMtBUdWVwXd94iII79Ml9/6H5k3AeK', 2, NULL, '2023-08-09 01:28:00', '2023-08-09 01:28:00', 14, NULL),
(32, 'fskdjfksl11', 'kjslkdjs11@dlsjfls.dsfs', NULL, '$2y$10$TTjohbJVHT8JYhFUzxHTqu1391iO0qrYIDwyhjxYUyt5Pd1i/RHnm', 3, NULL, '2023-08-09 02:30:20', '2023-08-09 02:41:49', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `email`, `password`, `number`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'shivam corporation', 'shivam@gmail.com', '12345678', '9798564654', 'dsfhskdhf', '4382-hhh-total.PNG', '2023-08-05 07:23:31', '2023-08-05 07:23:31'),
(2, 'xplore solution', 'xplore@gmail.com', '12345678', '9798564654', 'jkshfjsdhfkjh fhskdf', '1183-hours.png', '2023-08-09 00:43:43', '2023-08-09 00:43:43'),
(6, 'xplore', 'xplore1@gmail.com', '12345678', '9798564654', 'shdakjsd sdgajsgdjas', '9919-hours.png', '2023-08-09 00:44:56', '2023-08-09 00:44:56'),
(7, 'Expert slution', 'expert@gmail.cm', '12345678', '879454654578', 'ksfhdfjhskjdhfkjs', '2801-hiiren-dyso.png', '2023-08-09 00:55:51', '2023-08-09 00:55:51'),
(8, 'Expert slution', 'rwerw@dfgdf.gdfg', '12345678', '7987897987', 'dsfsdfsdfs', '8840-hiiren-dyso.png', '2023-08-09 00:57:43', '2023-08-09 00:57:43'),
(9, 'dsfsd', 'khjh@dfgd.fgd', '12345678', '7987897987', 'ffgf gdfgd', '6049-hiiren-dyso.png', '2023-08-09 00:58:39', '2023-08-09 00:58:39'),
(10, 'khdfkjfsh', 'jhkjfdh@kdjffk.gd', '12345678', '9798564654', 'fgjdkjfg ghdjfg hdfhgk dgkd', '3601-hhh-total.PNG', '2023-08-09 01:26:14', '2023-08-09 01:26:14'),
(12, 'khdfkjfsh', 'jhkjfdh11@kdjffk.gd', '12345678', '9798564654', 'fgjdkjfg ghdjfg hdfhgk dgkd', '3032-hhh-total.PNG', '2023-08-09 01:26:29', '2023-08-09 01:26:29'),
(14, 'hkj', 'hjhjkh@rrwe.rwer', '12345678', '7987897987', 'dfsdkjf sjdhfjksd', '5868-hhh-total.PNG', '2023-08-09 01:28:00', '2023-08-09 01:28:00');

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
(2, '2014_10_12_000002_create_admins_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_07_15_094925_create_pipelinecategories_table', 1),
(8, '2023_07_16_121723_create_lead_table', 1),
(9, '2023_07_17_072446_create_tbl_lead_items_table', 1),
(11, '2023_07_20_165607_create_activity', 2),
(12, '2023_07_19_074850_create_companies_table', 3),
(13, '2023_07_24_054353_create_users_table', 3),
(17, '2023_08_03_110629_add_column_changes_to_company_table', 5),
(18, '2023_08_03_101751_add_user_type_field_to_admins_table', 6),
(19, '2023_08_04_070743_add_field_changes_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `pipelinecategories`
--

CREATE TABLE `pipelinecategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipelinecategories`
--

INSERT INTO `pipelinecategories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(3, 'Quotation', '2023-07-31 10:14:43', '2023-07-31 10:14:43'),
(4, 'Demo', '2023-07-31 10:14:56', '2023-07-31 10:14:56'),
(5, 'Contact', '2023-07-31 10:15:06', '2023-07-31 10:15:06'),
(6, 'Inquiry', '2023-07-31 10:15:16', '2023-07-31 10:15:16'),
(10, 'dfgfd', '2023-08-03 04:25:16', '2023-08-03 04:25:16'),
(11, 'demo', '2023-08-09 02:43:00', '2023-08-09 02:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead`
--

CREATE TABLE `tbl_lead` (
  `iid` bigint(20) UNSIGNED NOT NULL,
  `vleadType` varchar(255) NOT NULL,
  `vFullname` varchar(255) NOT NULL,
  `vWhatsapp` varchar(255) NOT NULL,
  `eWhatsapp_type` enum('Work','Office') DEFAULT NULL,
  `vCompany` varchar(255) NOT NULL,
  `vEmail` varchar(255) NOT NULL,
  `eEmail_type` enum('Work','Office') DEFAULT NULL,
  `vTitle` varchar(255) NOT NULL,
  `vRemark` varchar(255) NOT NULL,
  `dValue` double DEFAULT NULL,
  `vCurrency` varchar(255) NOT NULL,
  `vPipeline` varchar(255) NOT NULL,
  `dProbability` double DEFAULT NULL,
  `dExpectedStartDate` date DEFAULT NULL,
  `dExpectedCloseDate` date DEFAULT NULL,
  `vPlateform` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_lead`
--

INSERT INTO `tbl_lead` (`iid`, `vleadType`, `vFullname`, `vWhatsapp`, `eWhatsapp_type`, `vCompany`, `vEmail`, `eEmail_type`, `vTitle`, `vRemark`, `dValue`, `vCurrency`, `vPipeline`, `dProbability`, `dExpectedStartDate`, `dExpectedCloseDate`, `vPlateform`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'contact', 'shah nimesh', '7987987878', 'Work', 'ISRO', 'test@gmail.com', 'Work', 'Isro Deal', 'dfkhdskjfhksd', 25000, 'AFN', '1', 120, '2023-07-19', '2023-07-27', 'facebook', NULL, '2023-07-25 09:49:15', '2023-08-02 00:20:32'),
(2, 'general', 'Joshi Nirali', '9979878971', 'Office', 'Vipro', 'nirali@gmail.com', 'Office', 'vipro deal', 's;ldl;dsk;f', 55000, 'INR', '3', 78, '2023-07-17', '2023-08-04', 'online', NULL, '2023-07-31 10:17:04', '2023-08-02 01:24:46'),
(3, 'contact', 'test lead', '79879878', 'Work', '798798789', 'test@gmail.com', 'Work', 'test title', 'dfkhdskjfhksd', 25000, 'AFN', '2', 120, '2023-07-19', '2023-07-27', 'facebook', NULL, '2023-07-25 09:49:15', '2023-08-02 00:53:30'),
(4, 'general', 'my first lead', '997987897', 'Office', 'skfj', 'test@gmail.com', 'Office', 'first lead', 's;ldl;dsk;f', 55000, 'INR', '4', 78, '2023-07-17', '2023-08-04', 'instagram', NULL, '2023-07-31 10:17:04', '2023-07-31 10:17:04'),
(5, 'contact', 'test lead', '79879878', 'Work', '798798789', 'test@gmail.com', 'Office', 'test title', 'dfkhdskjfhksd', 25000, 'INR', '5', 120, '2023-07-19', '2023-07-27', 'instagram', NULL, '2023-07-25 09:49:15', '2023-07-26 04:29:27'),
(6, 'general', 'Jiya manek', '997987897', 'Office', 'White Cement industry', 'manekJ@gmail.com', 'Office', 'Cement Industry Deal', 's;ldl;dsk;f', 55000, 'AFN', '1', 78, '2023-07-17', '2023-08-04', 'facebook', NULL, '2023-07-31 10:17:04', '2023-08-02 00:50:49'),
(7, 'contact', 'agrvata jinal', '79879878', 'Work', 'shivam corporation', 'test@gmail.com', 'Work', 'shivam corporation deal', 'dfkhdskjfhksd', 25000, 'AFN', '4', 120, '2023-07-19', '2023-07-27', 'facebook', NULL, '2023-07-25 09:49:15', '2023-08-02 00:33:00'),
(8, 'general', 'maheta krishanan', '9979878978', 'Office', 'SK Expert', 'krishananM@gmail.com', 'Office', 'SK Expert deal', 's;ldl;dsk;f', 55000, 'AFN', '1', 78, '2023-07-17', '2023-08-04', 'facebook', NULL, '2023-07-31 10:17:04', '2023-08-02 00:59:46'),
(9, 'general', 'Ishavar Maheat', '8798797987', 'Office', 'RK industry', 'Maheat@yahoo.com', 'Office', 'RK industry', 'lsjflksdj dlfjlsj fksdjfls', 124993, 'AFN', '6', 95, '2023-08-01', '2023-08-25', 'facebook', NULL, '2023-08-02 00:53:06', '2023-08-02 00:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead_items`
--

CREATE TABLE `tbl_lead_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iLeadId` bigint(20) UNSIGNED DEFAULT NULL,
  `vItem` varchar(255) NOT NULL,
  `fQuantity` double(8,2) NOT NULL,
  `dPrice` double NOT NULL,
  `dTax` double(8,2) NOT NULL,
  `dAmount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_lead_items`
--

INSERT INTO `tbl_lead_items` (`id`, `iLeadId`, `vItem`, `fQuantity`, `dPrice`, `dTax`, `dAmount`, `created_at`, `updated_at`) VALUES
(7, 1, 'item1', 15.00, 100, 10.00, 100, '2023-08-02 00:20:32', '2023-08-02 00:20:32'),
(8, 1, 'item2', 17.00, 120, 12.00, 120, '2023-08-02 00:20:32', '2023-08-02 00:20:32'),
(13, 3, 'item1', 10.00, 100, 12.00, 100, '2023-08-02 00:30:56', '2023-08-02 00:30:56'),
(14, 3, 'item2', 15.00, 150, 13.00, 150, '2023-08-02 00:30:56', '2023-08-02 00:30:56'),
(15, 7, 'abc', 150.00, 120, 12.50, 120, '2023-08-02 00:33:00', '2023-08-02 00:33:00'),
(16, 7, 'kdjhfkjs', 125.00, 150, 10.00, 150, '2023-08-02 00:33:00', '2023-08-02 00:33:00'),
(17, 7, 'ttt', 150.00, 120, 10.00, 120, '2023-08-02 00:33:00', '2023-08-02 00:33:00'),
(20, 6, 'item1', 12.00, 12.5, 12.00, 12.5, '2023-08-02 00:50:49', '2023-08-02 00:50:49'),
(21, 6, 'item2', 12.00, 12.5, 12.50, 12.5, '2023-08-02 00:50:49', '2023-08-02 00:50:49'),
(22, 9, 'item1', 1100.00, 125.5, 12.50, 125.5, '2023-08-02 00:53:06', '2023-08-02 00:53:06'),
(23, 9, 'item2', 1200.00, 11.25, 5.50, 11.25, '2023-08-02 00:53:06', '2023-08-02 00:53:06'),
(24, 8, 'item1', 12.00, 125, 12.00, 125, '2023-08-02 00:59:46', '2023-08-02 00:59:46'),
(25, 8, 'item2', 12.00, 124, 11.00, 124, '2023-08-02 00:59:46', '2023-08-02 00:59:46'),
(28, 2, 'item1', 10.00, 150, 10.00, 150, '2023-08-02 01:24:46', '2023-08-02 01:24:46'),
(29, 2, 'item2', 20.00, 120, 5.00, 120, '2023-08-02 01:24:46', '2023-08-02 01:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_lead_id_foreign` (`lead_id`);

--
-- Indexes for table `add_users`
--
ALTER TABLE `add_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `add_users_username_unique` (`email`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_company_id_foreign` (`company_id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_company_email_unique` (`email`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `pipelinecategories`
--
ALTER TABLE `pipelinecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `tbl_lead_items`
--
ALTER TABLE `tbl_lead_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_lead_items_ileadid_foreign` (`iLeadId`);

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
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `add_users`
--
ALTER TABLE `add_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pipelinecategories`
--
ALTER TABLE `pipelinecategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  MODIFY `iid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_lead_items`
--
ALTER TABLE `tbl_lead_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `tbl_lead` (`iid`) ON DELETE CASCADE;

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `add_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_lead_items`
--
ALTER TABLE `tbl_lead_items`
  ADD CONSTRAINT `tbl_lead_items_ileadid_foreign` FOREIGN KEY (`iLeadId`) REFERENCES `tbl_lead` (`iid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
