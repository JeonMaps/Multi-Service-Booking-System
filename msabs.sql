-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 05:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_duration` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `additional_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `service_name`, `service_provider_name`, `service_duration`, `appointment_date`, `appointment_time`, `additional_notes`, `status`, `created_at`, `updated_at`) VALUES
(40, 4, 'Studio Photoshoot', 'Prism Digital Studio', 30, '2023-04-13', '19:00:00', 'Baby and me', 'Paid', '2023-04-12 03:55:35', '2023-04-12 03:56:48'),
(41, 3, 'Pet Grooming', 'Baguio Pet Habitat', 30, '2023-04-14', '21:30:00', NULL, 'Paid', '2023-04-12 05:33:28', '2023-04-12 05:33:28'),
(42, 4, 'Haircut', 'Kwentong Barbero', 30, '2023-04-14', '22:00:00', 'iaosdhfun', 'Paid', '2023-04-12 06:08:54', '2023-04-12 06:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barber', '2023-04-11 20:36:24', '2023-04-11 20:36:24'),
(2, 'Salon', '2023-04-11 20:48:56', '2023-04-11 20:48:56'),
(3, 'Carwash', '2023-04-11 20:49:18', '2023-04-11 20:49:18'),
(4, 'Spa', '2023-04-11 20:55:17', '2023-04-11 20:55:17'),
(5, 'Pet Shop', '2023-04-11 21:31:30', '2023-04-11 21:48:21'),
(6, 'Medical', '2023-04-11 21:47:04', '2023-04-11 21:47:04'),
(7, 'Massage', '2023-04-11 21:48:36', '2023-04-11 21:48:36'),
(8, 'Cleaning', '2023-04-11 21:48:46', '2023-04-11 21:48:46'),
(9, 'Photography', '2023-04-11 21:48:50', '2023-04-11 21:48:50'),
(10, 'Fitness', '2023-04-11 21:48:54', '2023-04-11 21:48:54'),
(11, 'Legal', '2023-04-12 06:10:47', '2023-04-12 06:10:47'),
(12, 'Accommodation', '2023-04-12 06:11:50', '2023-04-12 06:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `category_service_provider`
--

CREATE TABLE `category_service_provider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `service_provider_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_service_provider`
--

INSERT INTO `category_service_provider` (`id`, `category_id`, `service_provider_id`, `created_at`, `updated_at`) VALUES
(14, 5, 2, NULL, NULL),
(15, 10, 3, NULL, NULL),
(16, 9, 4, NULL, NULL),
(17, 4, 5, NULL, NULL),
(18, 7, 5, NULL, NULL),
(19, 1, 6, NULL, NULL),
(20, 2, 6, NULL, NULL),
(21, 4, 6, NULL, NULL),
(22, 1, 1, NULL, NULL),
(23, 7, 1, NULL, NULL),
(24, 3, 7, NULL, NULL),
(25, 1, 8, NULL, NULL),
(26, 7, 8, NULL, NULL),
(27, 4, 9, NULL, NULL),
(28, 7, 9, NULL, NULL),
(29, 8, 10, NULL, NULL),
(30, 3, 11, NULL, NULL),
(31, 10, 12, NULL, NULL);

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
(5, '2023_02_16_071900_create_service_providers_table', 1),
(6, '2023_02_16_071901_create_services_table', 1),
(7, '2023_02_16_072002_create_appointments_table', 1),
(8, '2023_02_16_072017_create_payment_transactions_table', 1),
(9, '2023_02_16_074123_create_reviews_table', 1),
(10, '2023_03_01_125010_add_service_provider_id_to_users_table', 1),
(11, '2023_04_12_035859_create_categories_table', 2),
(12, '2023_04_12_040117_create_category_service_provider_table', 3),
(13, '2023_04_12_071635_create_notifications_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2c2dc6b2-de7a-44e2-a350-340ec94985cb', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\User', 1, '{\"appointment_id\":42,\"user_id\":4,\"service_provider_name\":\"Kwentong Barbero\",\"service_name\":\"Haircut\",\"appointment_date\":\"2023-04-14\",\"appointment_time\":\"22:00\",\"type\":\"Booking\"}', NULL, '2023-04-12 06:08:54', '2023-04-12 06:08:54'),
('5ece3c01-741c-4cd1-9b76-7cff7a45ca40', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\User', 5, '{\"appointment_id\":41,\"user_id\":3,\"service_provider_name\":\"Baguio Pet Habitat\",\"service_name\":\"Pet Grooming\",\"appointment_date\":\"2023-04-14\",\"appointment_time\":\"21:30\",\"type\":\"Booking\"}', NULL, '2023-04-12 05:33:28', '2023-04-12 05:33:28'),
('af55e965-d1d4-440d-aa9b-9cc5673f4d03', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\User', 7, '{\"appointment_id\":40,\"user_id\":4,\"service_provider_name\":\"Prism Digital Studio\",\"service_name\":\"Studio Photoshoot\",\"appointment_date\":\"2023-04-13\",\"appointment_time\":\"19:00\",\"type\":\"Booking\"}', NULL, '2023-04-12 03:55:35', '2023-04-12 03:55:35'),
('bc6ccfaf-b911-44e9-b972-ce2c9eb6e736', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\User', 1, '{\"appointment_id\":40,\"user_id\":4,\"service_provider_name\":\"Prism Digital Studio\",\"service_name\":\"Studio Photoshoot\",\"appointment_date\":\"2023-04-13\",\"appointment_time\":\"19:00\",\"type\":\"Booking\"}', NULL, '2023-04-12 03:55:35', '2023-04-12 03:55:35'),
('e282a81b-b60c-4da5-a16e-e8515d2e41a0', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\User', 2, '{\"appointment_id\":42,\"user_id\":4,\"service_provider_name\":\"Kwentong Barbero\",\"service_name\":\"Haircut\",\"appointment_date\":\"2023-04-14\",\"appointment_time\":\"22:00\",\"type\":\"Booking\"}', NULL, '2023-04-12 06:08:54', '2023-04-12 06:08:54'),
('eebac6dc-e210-41e7-8162-4815ae694c1b', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\User', 1, '{\"appointment_id\":41,\"user_id\":3,\"service_provider_name\":\"Baguio Pet Habitat\",\"service_name\":\"Pet Grooming\",\"appointment_date\":\"2023-04-14\",\"appointment_time\":\"21:30\",\"type\":\"Booking\"}', NULL, '2023-04-12 05:33:28', '2023-04-12 05:33:28');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_provider_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_provider_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicePicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_provider_id`, `name`, `description`, `category`, `servicePicture`, `duration`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Haircut', 'Standard Haircut', 'Barber', 'servicePictures/3TsWtc7wWE6Jxznee2mhCkEMZpDSwfQGztSxrwb3.jpg', 30, '250.00', '2023-04-03 21:14:14', '2023-04-03 21:14:14'),
(2, 1, 'Shave', 'Facial Shave', 'Barber', 'servicePictures/byPgO0T1TjFyjbRQF8p6fg1jFLU8ZOAcw4x4RSSx.jpg', 20, '200.00', '2023-04-03 21:15:24', '2023-04-03 21:15:24'),
(3, 1, 'Body Massage', 'Massage for upper body', 'Barber', 'servicePictures/nTfsPU7MU3mtOdc230C4Ase6ZrNtjageBQ0r0Irf.jpg', 20, '300.00', '2023-04-03 21:15:58', '2023-04-03 21:15:58'),
(4, 1, 'Scalp Massage', 'Scalp, head, neck massage', 'Barber', 'servicePictures/Q9klacjFfkCjYqoSZzxRMzlY0MrjqApTxkalQaZO.jpg', 30, '400.00', '2023-04-03 21:16:47', '2023-04-03 23:11:54'),
(5, 2, 'Pet Grooming', 'Groom your cute little pets', 'Pet Shop', 'servicePictures/CYXMJl9wVkgdnkoentHTWyQkJWkxh6zIFGOYBZrf.jpg', 30, '400.00', '2023-04-03 21:46:56', '2023-04-03 21:46:56'),
(6, 2, 'Pet Hotel', 'Want to go shopping? We can take care of your pets while you do so!', 'Pet Shop', 'servicePictures/URJpQEaPAMCnhvrZ66nlYgDqJOri0f1oF5pFKxNM.jpg', 60, '250.00', '2023-04-03 21:47:32', '2023-04-03 21:47:32'),
(7, 2, 'Pet Vet Check', 'Is your pet not feeling well?', 'Pet Shop', 'servicePictures/pDkqWGiSVbfVF4pDrsZYhRM5BXNmPBKmYfv2CWgx.jpg', 15, '400.00', '2023-04-03 21:48:05', '2023-04-03 23:13:12'),
(8, 3, '1 Week Trainer', 'Get assisted by a trainer for 1 week', 'Fitness', 'servicePictures/jZhUjqFKSIfomLiTtDoFKhWQMZo9SOBSMprsG3sE.png', 60, '2000.00', '2023-04-03 22:54:34', '2023-04-03 22:54:34'),
(9, 3, '1 Month Trainer', 'Get assisted by a trainer for 1 month', 'Fitness', 'servicePictures/lQolkluQbiWRMjLeiuUKRL1s4gLgIuPmkHRwYEXg.jpg', 60, '6000.00', '2023-04-03 22:54:58', '2023-04-03 22:54:58'),
(10, 12, '2 Week Trainer', 'Get assisted by a trainer for 2 weeks', 'Fitness', 'servicePictures/KFgD3Wp36tMLcMvUEv95MLLNx5ymx9x3MyACYmxZ.jpg', 60, '2500.00', '2023-04-03 22:55:52', '2023-04-03 22:55:52'),
(11, 12, '1 Month Trainer', 'Get assisted by a trainer for 1 month', 'Fitness', 'servicePictures/5BSPGjXKlpxw2juNRsAWqlJdICXmHZcOMQo9IFiI.jpg', 60, '6000.00', '2023-04-03 22:56:06', '2023-04-03 22:56:06'),
(12, 4, 'Rush ID', '1x1 2x2 4x4', 'Photography', 'servicePictures/YO2782kFPAW4PDgZz2iTshHZ9Cb555UBjanzP2z3.jpg', 20, '200.00', '2023-04-03 22:56:41', '2023-04-03 22:56:41'),
(13, 4, 'Studio Photoshoot', 'Beautiful Studio Portraits', 'Photography', 'servicePictures/8oYiiLnMXBx5476G7UFbZmbHQMeY3LhI4Tuw3cAf.jpg', 30, '500.00', '2023-04-03 22:57:09', '2023-04-03 22:57:09'),
(14, 5, 'Full Body Massage', 'Full Body', 'Spa', 'servicePictures/11kMdODHI4T0cKYvuPCbIrriOpXwvGS9LBgdlJVb.jpg', 45, '600.00', '2023-04-03 22:58:03', '2023-04-03 22:58:03'),
(15, 5, 'Lower Body Massage', 'Legs, Feet, Thighs', 'Spa', 'servicePictures/wnSzdm0ahxjJTQaGZEPfBblK9VRCCw5XE5EGC8dL.jpg', 20, '200.00', '2023-04-03 22:58:37', '2023-04-03 22:58:37'),
(16, 6, 'Cutting and Styling', 'Premium Cuts and Styling', 'Salon', 'servicePictures/UVZ4kKc1EuG1hAxtm19NYS2H97ya40GIyOGZunVm.jpg', 40, '400.00', '2023-04-03 22:59:38', '2023-04-03 23:13:53'),
(17, 6, 'Hair Color', 'Any color of your choice', 'Salon', 'servicePictures/fA6QBPuh9mKp1Ayo17Dk4AvP0AJez44HLJEojfao.png', 30, '350.00', '2023-04-03 22:59:54', '2023-04-03 22:59:54'),
(18, 7, 'Sedan Carwash', 'For small cars', 'Carwash', 'servicePictures/FcAenMBqoPMP6X0t3WeyaqYuqEPEYHSyhS6fzTJy.jpg', 25, '250.00', '2023-04-03 23:00:30', '2023-04-03 23:00:30'),
(19, 7, 'SUV Carwash', 'For Big Cars', 'Carwash', 'servicePictures/FUJz2uQ0a6cCG10KEpxzgf2RrOWpw1tvIWBlqWma.jpg', 30, '350.00', '2023-04-03 23:00:47', '2023-04-03 23:00:47'),
(20, 8, 'Premium Haircut', 'Styling and premium', 'Barber', 'servicePictures/OSq0YLwUoRjHABj78eKTQarTcXYXyqn1IB9xYnFu.jpg', 30, '300.00', '2023-04-03 23:03:29', '2023-04-03 23:03:29'),
(21, 8, 'Shampoo', 'Premium Shampoo', 'Barber', 'servicePictures/Xo5ePwsktAZU1Cm2ElccPW8WbIMShAQ4DBh3JIx0.jpg', 20, '300.00', '2023-04-03 23:03:50', '2023-04-03 23:03:50'),
(22, 9, 'Full Body Massage', 'Full body', 'Spa', 'servicePictures/3gMY93kRUfmeyQ2SVkQ8FYXtEaojt4mJMDpD4Uie.jpg', 50, '900.00', '2023-04-03 23:04:27', '2023-04-03 23:04:27'),
(23, 9, 'Upper Body Massage', 'Back, Front, Arms', 'Spa', 'servicePictures/YURgtTEvFe60lvrZGj3mV0mNOoFjVWG7oPx3anFz.jpg', 40, '750.00', '2023-04-03 23:04:54', '2023-04-03 23:04:54'),
(24, 9, 'Neck Massage', 'Neck ONLY massage', 'Spa', 'servicePictures/2C2AQkWJO85GN1c28GcV2ccac9m67yKiXyq138Zq.jpg', 20, '400.00', '2023-04-03 23:05:10', '2023-04-03 23:05:10'),
(25, 10, 'Sofa Cleaning', 'For sofa and chairs', 'Cleaning', 'servicePictures/IWAJZyhHILn252iaBSPAJFCk8QzgHllmgyxdJ68U.jpg', 30, '600.00', '2023-04-03 23:05:50', '2023-04-03 23:05:50'),
(26, 10, 'House Cleaning', '1 Floor', 'Cleaning', 'servicePictures/LNBqHd2jRZ53SXEwt2JAv5OruHoJVfrz1lNnarxZ.jpg', 60, '1200.00', '2023-04-03 23:06:34', '2023-04-03 23:06:34'),
(27, 10, 'Pest Control', 'For extermination of pests', 'Cleaning', 'servicePictures/9yBwZTERugKU0fMWWuNzgKS4WamZGj8HqR9mWYMP.jpg', 60, '1500.00', '2023-04-03 23:06:48', '2023-04-03 23:06:48'),
(28, 11, 'Sedan Carwash', 'For small cars', 'Carwash', 'servicePictures/I5fIi9i9NIndZN0XIFsJxNS81CAnkAVqjtIDh4Jg.jpg', 25, '200.00', '2023-04-03 23:07:32', '2023-04-03 23:07:32'),
(29, 11, 'Truck Carwash', 'For all kinds of trucks', 'Carwash', 'servicePictures/xckwOtFZdmJeA4OQMkFPEv686kO1mjwl3E83CJ8v.jpg', 40, '400.00', '2023-04-03 23:07:52', '2023-04-03 23:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `name`, `description`, `category`, `phone_number`, `rating`, `logo`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Kwentong Barbero', 'A Shop that Shears, Shaves and Shines so You Stay Sharps', 'Barber', '09457958064', 0, 'logos/okN6m6K7QGRFog0jN5CQhKvkZYL99D6iNqpFCO46.png', 'SM Baguio 3rd Floor', '2023-04-03 20:33:52', '2023-04-03 21:03:09'),
(2, 'Baguio Pet Habitat', 'Baguio Pet Habitat is a pet store that offers various products and services for all canines and felines', 'Pet Shop', '09563786599', 0, 'logos/MBgvKneHeXWsK4xkXuL2DTZ0eAfXRfHHLqzRVbWj.png', '3rd Floor, Main Building', '2023-04-03 21:39:00', '2023-04-03 21:39:00'),
(3, 'Fitstyle Gym', 'Fit your style here in our gym!', 'Fitness', '09297827251', 0, 'logos/ipBaJfoPqdnJ5dnOGncwvcMo10KdsYwKHq4ZL92i.png', 'Bonifacio St, Perez Building', '2023-04-03 22:09:31', '2023-04-03 22:09:31'),
(4, 'Prism Digital Studio', 'Studio Portrais, Rush IDs', 'Photography', '09274657771', 0, 'logos/MPLgijYwrwf8KGHn22lVpDyMzIhqnEODjTE7mHuX.jpg', 'Session Road, Baguio City', '2023-04-03 22:10:31', '2023-04-03 22:10:31'),
(5, 'Baguio Massage 24/7', 'Always open massage center', 'Spa', '09958826032', 0, 'logos/rHxXO0liiH9Z05kLy4UQouGPhAxBGMcEGOFTNwOR.png', 'Upper Ferguson St', '2023-04-03 22:11:47', '2023-04-03 22:11:47'),
(6, 'David\'s Salon', 'Beautify here', 'Salon', '09457998064', 0, 'logos/Ds1wzxvD84H8acxqduNyyTae0S0ZqBVnaKhmRTnQ.png', 'SM Baguio 3rd Floor', '2023-04-03 22:12:20', '2023-04-03 22:12:20'),
(7, 'Albert\'s Carwash', 'Albert\'s signature carwash', 'Carwash', '09165000509', 0, 'logos/dfChK8bpRQ1H6NCEypT953fG9ntSPGSkHgHt5YCk.png', 'Del Pilar St. Baguio City', '2023-04-03 22:13:35', '2023-04-03 22:13:35'),
(8, 'Bruno\'s Barbers', 'Bruno\'s premium barber cuts', 'Barber', '09487348065', 0, 'logos/IkYybIgBuQGVisNR6V0OB7azrWulRz37dGgu5vV3.jpg', 'SM Baguio 2nd Floor', '2023-04-03 22:14:51', '2023-04-03 22:14:51'),
(9, 'Baguio Castle Spa', '\"The Baguio Castle Spa\" Combines the traditional and modern contemporary that touch the body and mind', 'Spa', '09173200747', 0, 'logos/wq1mWAjnyFw4zCYubdwgfTXUO1eSy78l2T6vkqxO.jpg', 'Burnham Suites, Kisad', '2023-04-03 22:15:48', '2023-04-03 22:15:48'),
(10, 'Delmont Cleaning Services', 'We clean your sofas, and your rooms!', 'Cleaning', '0917 320 0747', 0, 'logos/EYuxnvpxiqrM237bgy9Dno47nWCudWm4hHThxhqV.jpg', 'Anywhere', '2023-04-03 22:18:38', '2023-04-03 22:18:38'),
(11, 'Klintech Carwash', 'Klintech Pure Carwash', 'Carwash', '0965 163 1004', 0, 'logos/YKrv5AieLRxxUDVnLvxQHBiyiVIHCtqh3ZMxFg1S.png', 'Upper East Woodsgate Subd', '2023-04-03 22:19:46', '2023-04-03 22:19:46'),
(12, 'Fitness Edge Gym', 'We offer traditional gym equipment and hourly group exercise classes.', 'Fitness', '09448291064', 0, 'logos/VuDHOvi9rTZLbosGyoERICaKwnv6x0kItZYqIcXT.jpg', 'Bonifacio Baguio', '2023-04-03 22:20:44', '2023-04-04 06:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_provider_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `phone_number`, `google_id`, `remember_token`, `created_at`, `updated_at`, `service_provider_id`) VALUES
(1, 'Arsen Waggay', 'Admin', 'ajwaggay@revest360.com', NULL, '$2y$10$oZ75J/08nC3Qu2qQT2myBe1tgUEL/h/5zXDz.KyBeugRgYvhKx7Im', NULL, NULL, NULL, '2023-04-04 06:31:15', '2023-04-04 06:31:15', NULL),
(2, 'Kwentong Barbero Account', 'Service Provider', 'kwento@gmail.com', NULL, '$2y$10$8.kt9LfaXdPQX6t5K1gOOuVXOlGp6PHWB99ThfdFk4X8s5tOlnUia', '09457958064', NULL, NULL, '2023-04-03 20:35:00', '2023-04-03 22:27:36', 1),
(3, 'Jeremiah Brandon Mapatac', 'User', 'jeonmapatac@gmail.com', NULL, '$2y$10$nz6kJo4a2nQWkLSePY6QDOvgs8BqdMOXQ4Lbx1Qf0.L1LtyO8cpvq', NULL, '109930034097676971549', 'qBmPUWKIpzK3vkeeR9TqrKJ95GPiutunvEuqSvQ9gSDIEEEYpCLx19lTv3xu', '2023-04-03 21:16:55', '2023-04-03 21:16:55', NULL),
(4, 'Ryan Clay', 'User', 'ryan@gmail.com', NULL, '$2y$10$.n5PwUSd96hZ/LqWkO5M4ubLii2sUwgV98y4Hjy3sMC8ryTZ8CA8W', '09238476187', NULL, NULL, '2023-04-03 21:34:29', '2023-04-03 21:34:29', NULL),
(5, 'Pet Habitat Account', 'Service Provider', 'baguiopet@gmail.com', NULL, '$2y$10$s7i5rg8yt4CZ9IH6jLK38usglZJ43hwYgq39zwpWj4RD1q05Un.Yu', NULL, NULL, NULL, '2023-04-03 21:45:01', '2023-04-03 21:45:01', 2),
(6, 'Fitstyle Account', 'Service Provider', 'fitstyle@gmail.com', NULL, '$2y$10$kplg.3uYCtwenSRZrPpgDO8sCSV4wVtSnsuKUow1PDL.M8cIciY4O', NULL, NULL, NULL, '2023-04-03 22:25:00', '2023-04-03 22:25:00', 3),
(7, 'Prism Digital Studio', 'Service Provider', 'prism@gmail.com', NULL, '$2y$10$cgSsH7X0mE4X2BQ7dfS61.MqZ.NTAiKy2inyLJUniZiHgyYgAhBsy', NULL, NULL, NULL, '2023-04-03 22:25:40', '2023-04-03 22:25:40', 4),
(8, 'Baguio Massage 24/7 Account', 'Service Provider', 'massage24@gmail.com', NULL, '$2y$10$aXF390/sXmDrkh/yrl4W.eJx7NNTqF/RBpTwU9NaI24QyhwotsaMe', NULL, NULL, NULL, '2023-04-03 22:26:20', '2023-04-03 22:27:30', 5),
(9, 'David\'s Salon Account', 'Service Provider', 'david@gmail.com', NULL, '$2y$10$6Vmx.K6ZqxcQy6i1gci06eWl6xP.Lj9dE1PRSl/FZaFjhI2xOiVem', NULL, NULL, NULL, '2023-04-03 22:28:04', '2023-04-04 07:10:09', 6),
(10, 'Albert\'s Carwash Account', 'Service Provider', 'albert@gmail.com', NULL, '$2y$10$p9Y1ihZQoVXRCdc8N5ChP.67nSY.pYmrg/P15uFecDSK.P1HMpGgq', NULL, NULL, NULL, '2023-04-03 22:33:57', '2023-04-03 22:33:57', 7),
(11, 'Bruno\'s Barbers Account', 'Service Provider', 'bruno@gmail.com', NULL, '$2y$10$p9hp5rWucUeiDz66Id2j7OdwgCaKEYMKZlslJGSnXhrnYoHg0G9zG', NULL, NULL, NULL, '2023-04-03 22:34:46', '2023-04-03 22:34:46', 8),
(12, 'Baguio Castle Spa Account', 'Service Provider', 'castlespa@gmail.com', NULL, '$2y$10$K.QTZfZ9eqwVrKgCPSday.bfyodRog6YfdDOHieWRbXElwzZCej3q', NULL, NULL, NULL, '2023-04-03 22:36:50', '2023-04-03 22:36:50', 9),
(13, 'Delmont Account', 'Service Provider', 'delmont@gmail.com', NULL, '$2y$10$xjbu14di/Msjni8hDipjbeRfulQblLpwOd8z9SWAkGNQxVxtgRNsG', NULL, NULL, NULL, '2023-04-03 22:38:35', '2023-04-03 22:38:35', 10),
(14, 'Klintech Carwash Account', 'Service Provider', 'klintech@gmail.com', NULL, '$2y$10$AuumTjYRPUFWBo6TK3m3eeKTQu3VwZLoObn1/4qKKbCvNu9u0qAcu', NULL, NULL, NULL, '2023-04-03 22:40:46', '2023-04-04 07:09:12', 11),
(15, 'Fitness Edge Account', 'Service Provider', 'fitnessedge@gmail.com', NULL, '$2y$10$A7.7mDdVrsO/NBUOP5w54ubrDNQH5p1l0ZDvaQdtFE073VgYygcXK', NULL, NULL, NULL, '2023-04-03 22:41:26', '2023-04-03 22:41:26', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_service_provider`
--
ALTER TABLE `category_service_provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_service_provider_category_id_foreign` (`category_id`),
  ADD KEY `category_service_provider_service_provider_id_foreign` (`service_provider_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_service_id_foreign` (`service_id`),
  ADD KEY `reviews_service_provider_id_foreign` (`service_provider_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_service_provider_id_foreign` (`service_provider_id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_service_provider_id_foreign` (`service_provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_service_provider`
--
ALTER TABLE `category_service_provider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_service_provider`
--
ALTER TABLE `category_service_provider`
  ADD CONSTRAINT `category_service_provider_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_service_provider_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `service_providers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `service_providers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `service_providers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `service_providers` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
