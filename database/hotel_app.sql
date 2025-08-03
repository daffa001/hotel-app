-- Adminer 5.3.0 MariaDB 10.11.11-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` bigint(20) unsigned NOT NULL,
  `rooms_id` bigint(20) unsigned NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `price_day` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_c_id_index` (`c_id`),
  KEY `carts_rooms_id_index` (`rooms_id`),
  CONSTRAINT `carts_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_rooms_id_foreign` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` longtext DEFAULT NULL,
  `jk` enum('?','L','P') DEFAULT '?',
  `job` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `name`, `address`, `jk`, `job`, `birthdate`, `nik`, `created_at`, `updated_at`) VALUES
(1,	'cakra',	'grand',	'L',	'nganggur',	'2025-02-01',	NULL,	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(2,	'customer',	'grand',	'L',	'nganggur',	'2025-02-01',	NULL,	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(3,	'Andrianto Pratama',	'jakarta',	'P',	'ss',	NULL,	'3201131301000006',	'2025-02-02 13:54:31',	'2025-02-02 13:55:29'),
(4,	'Andrianto Pratama',	'jakarta',	'L',	'assasin',	NULL,	'3201131301000006',	'2025-02-02 14:12:49',	'2025-02-02 14:15:21'),
(5,	'rara',	'jakarta',	'P',	'damkar',	NULL,	'123131255555',	'2025-02-03 10:27:38',	'2025-02-03 10:34:48'),
(6,	'tupai',	'jakarta',	'L',	'ss',	NULL,	'3201131301000006',	'2025-02-03 10:29:54',	'2025-02-03 10:32:16'),
(7,	'jihan',	NULL,	'?',	NULL,	NULL,	NULL,	'2025-02-03 18:42:36',	'2025-02-03 18:42:36'),
(8,	'jihann',	NULL,	'?',	NULL,	NULL,	NULL,	'2025-02-03 18:47:30',	'2025-02-03 18:47:30'),
(9,	'admin123',	NULL,	'P',	NULL,	NULL,	'123131255555',	'2025-06-28 18:56:39',	'2025-06-29 05:24:45'),
(10,	'andripratama',	NULL,	'P',	NULL,	NULL,	'123131255555',	'2025-06-29 13:11:42',	'2025-06-30 00:23:47');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `image_rooms`;
CREATE TABLE `image_rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` bigint(20) unsigned NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_rooms_room_id_index` (`room_id`),
  CONSTRAINT `image_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2013_12_24_130100_create_customers_table',	1),
(2,	'2014_10_12_000000_create_users_table',	1),
(3,	'2014_10_12_100000_create_password_resets_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2022_02_14_021722_create_payment_methods_table',	1),
(7,	'2022_11_03_040944_create_room_statuses_table',	1),
(8,	'2022_11_04_015722_create_types_table',	1),
(9,	'2022_11_04_015822_create_rooms_table',	1),
(10,	'2022_11_04_015922_create_image_rooms_table',	1),
(11,	'2022_12_24_084554_create_transactions_table',	1),
(12,	'2023_01_25_010743_create_payments_table',	1),
(13,	'2023_01_25_094345_create_notifications_table',	1),
(14,	'2025_07_13_174504_create_carts_table',	2),
(15,	'2025_07_28_020140_add_price_to_transactions_table',	3),
(16,	'2025_07_28_020313_add_price_to_transactions_table',	4),
(17,	'2025_07_28_024047_create_payments_table',	5),
(18,	'2025_07_28_024215_create_transactions_table',	6);

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `status`, `read_at`, `created_at`, `updated_at`) VALUES
('0846eb5e-0be6-4ae1-8213-f8fd4b354ffc',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 16D reservated by tupai. Payment: Rp. 950.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/21\"}',	'unread',	NULL,	'2025-02-03 10:33:06',	'2025-02-03 10:33:06'),
('19ebfa4b-ac22-44cf-8a44-006ceaf3d512',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/34\"}',	'unread',	NULL,	'2025-07-05 10:39:57',	'2025-07-05 10:39:57'),
('1cfd92aa-bc85-4e29-8a6d-fc6be3111ead',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 14D reservated by admin123. Payment: Rp. 1.200.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/32\"}',	'unread',	NULL,	'2025-07-05 08:50:12',	'2025-07-05 08:50:12'),
('347395b2-e6f8-4c00-99b0-b09516c3db1c',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 14D reservated by admin123. Payment: Rp. 1.200.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/32\"}',	'unread',	NULL,	'2025-07-05 08:50:12',	'2025-07-05 08:50:12'),
('35356387-0326-4194-a7af-08450359945a',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10A reservated by andripratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/28\"}',	'unread',	NULL,	'2025-07-05 08:02:16',	'2025-07-05 08:02:16'),
('35fc9387-e991-4057-995b-d5bfa332b3c3',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 11A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/35\"}',	'unread',	NULL,	'2025-07-05 20:13:04',	'2025-07-05 20:13:04'),
('39e06bae-fbc5-41e9-8a29-6ca09e66156f',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10A reservated by admin123. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/29\"}',	'unread',	NULL,	'2025-07-05 08:32:17',	'2025-07-05 08:32:17'),
('3e653191-3d02-4b41-a06a-9e9c6b2edb57',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 11A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/33\"}',	'unread',	NULL,	'2025-07-05 09:40:37',	'2025-07-05 09:40:37'),
('4c6e4e8c-a87e-4ef4-8a38-f7a7ed1f73fd',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10B reservated by admin123. Payment: Rp. 500.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/36\"}',	'unread',	NULL,	'2025-07-05 22:04:59',	'2025-07-05 22:04:59'),
('593b77f0-3b7d-4b68-b2d6-ef39ed03e205',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10B reservated by admin123. Payment: Rp. 500.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/37\"}',	'unread',	NULL,	'2025-07-05 22:43:31',	'2025-07-05 22:43:31'),
('602a5611-a61a-4a98-a30c-7dfdd96953ba',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by Andrianto Pratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/19\"}',	'unread',	NULL,	'2025-02-02 14:15:59',	'2025-02-02 14:15:59'),
('63b2fe2c-07ae-42ca-8982-2a4b4af7cbff',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by andripratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/24\"}',	'unread',	NULL,	'2025-06-30 00:24:23',	'2025-06-30 00:24:23'),
('7090cf9a-55a5-4e77-838d-5b08d6c8c11b',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 11A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/38\"}',	'unread',	NULL,	'2025-07-05 23:15:07',	'2025-07-05 23:15:07'),
('74caa9f6-0078-4ffd-bcc8-567057ecd8b3',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 12A reservated by andripratama. Payment: Rp. 1.750.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/25\"}',	'unread',	NULL,	'2025-06-30 06:07:55',	'2025-06-30 06:07:55'),
('75ee0e11-d5f3-4241-ad7f-c02053632ff7',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 17A reservated by admin123. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/27\"}',	'unread',	NULL,	'2025-07-03 10:12:38',	'2025-07-03 10:12:38'),
('893130a8-1cf0-4f3c-9fb5-86cf16ae06b1',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 11A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/38\"}',	'unread',	NULL,	'2025-07-05 23:15:07',	'2025-07-05 23:15:07'),
('8baee75b-72cc-4ff6-a3f5-7cde7198dfa0',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10B reservated by admin123. Payment: Rp. 500.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/39\"}',	'unread',	NULL,	'2025-07-05 23:16:43',	'2025-07-05 23:16:43'),
('8e8c551e-3ec3-4069-9e55-c43079e79706',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by Andrianto Pratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/17\"}',	'read',	'2025-02-02 14:11:17',	'2025-02-02 13:55:51',	'2025-02-02 14:11:17'),
('934b3fb2-a481-4585-b472-81d4c0eaca65',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 12A reservated by admin123. Payment: Rp. 1.750.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/30\"}',	'unread',	NULL,	'2025-07-05 08:41:21',	'2025-07-05 08:41:21'),
('9684ec0e-85a3-4976-bb8f-88e3b39047a7',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 11A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/35\"}',	'unread',	NULL,	'2025-07-05 20:13:04',	'2025-07-05 20:13:04'),
('a7c357f3-25bb-482c-bc41-b2b0a9af1057',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10B reservated by admin123. Payment: Rp. 500.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/36\"}',	'unread',	NULL,	'2025-07-05 22:04:59',	'2025-07-05 22:04:59'),
('b973707c-1805-4103-bbe0-2b1553ccd3ed',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10A reservated by admin123. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/23\"}',	'unread',	NULL,	'2025-06-29 05:28:19',	'2025-06-29 05:28:19'),
('b9d843f1-e1b8-48fb-b8e8-cf19a2bbd3db',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10B reservated by admin123. Payment: Rp. 500.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/37\"}',	'unread',	NULL,	'2025-07-05 22:43:30',	'2025-07-05 22:43:30'),
('bc9b8456-969a-42aa-b26b-7906bd447f4e',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by rara. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/22\"}',	'unread',	NULL,	'2025-02-03 10:35:15',	'2025-02-03 10:35:15'),
('c60bc652-8879-4a11-8ff7-f5b47aee83ec',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by andripratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/28\"}',	'unread',	NULL,	'2025-07-05 08:02:16',	'2025-07-05 08:02:16'),
('d02d17d5-75b9-48e3-88a7-66b7c602a040',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 17A reservated by admin123. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/27\"}',	'unread',	NULL,	'2025-07-03 10:12:38',	'2025-07-03 10:12:38'),
('d5ab834e-0ffc-468f-b539-bcdba2eabcc9',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 14D reservated by admin123. Payment: Rp. 1.200.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/31\"}',	'unread',	NULL,	'2025-07-05 08:44:22',	'2025-07-05 08:44:22'),
('d6178838-3782-4d35-b43b-9b02885a44a3',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10B reservated by admin123. Payment: Rp. 500.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/39\"}',	'unread',	NULL,	'2025-07-05 23:16:43',	'2025-07-05 23:16:43'),
('db672bc6-d084-471f-b229-94972940d79d',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 12A reservated by andripratama. Payment: Rp. 1.750.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/25\"}',	'unread',	NULL,	'2025-06-30 06:07:55',	'2025-06-30 06:07:55'),
('ddc5b90e-940c-45c7-a0ae-b7ddfd53e62c',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 11A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/33\"}',	'unread',	NULL,	'2025-07-05 09:40:37',	'2025-07-05 09:40:37'),
('ddfca5ce-e8ed-4a48-b5b4-a77a9764e96a',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by admin123. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/23\"}',	'unread',	NULL,	'2025-06-29 05:28:19',	'2025-06-29 05:28:19'),
('de759360-8ad7-45b6-9e05-b87a85e5a18e',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 10A reservated by andripratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/24\"}',	'unread',	NULL,	'2025-06-30 00:24:23',	'2025-06-30 00:24:23'),
('e3a149a6-d90a-4b18-bffb-031f912acf0e',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by admin123. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/29\"}',	'unread',	NULL,	'2025-07-05 08:32:17',	'2025-07-05 08:32:17'),
('e5b05f78-612c-4512-adf0-d42eaa460efb',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	1,	'{\"message\":\"Room 10A reservated by admin123. Payment: Rp. 350.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/34\"}',	'unread',	NULL,	'2025-07-05 10:39:57',	'2025-07-05 10:39:57'),
('e81cffc2-69ea-41d4-ab94-7a0bbf30dcae',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 14D reservated by admin123. Payment: Rp. 1.200.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/31\"}',	'unread',	NULL,	'2025-07-05 08:44:22',	'2025-07-05 08:44:22'),
('fcc9c526-4645-4b32-ba2e-5e12ae9391e5',	'App\\Notifications\\NewRoomReservationDownPayment',	'App\\Models\\User',	9,	'{\"message\":\"Room 12A reservated by admin123. Payment: Rp. 1.750.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/30\"}',	'unread',	NULL,	'2025-07-05 08:41:21',	'2025-07-05 08:41:21');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` bigint(20) unsigned NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `payment_method_id` bigint(20) unsigned NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_c_id_index` (`c_id`),
  KEY `payments_payment_method_id_index` (`payment_method_id`),
  CONSTRAINT `payments_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `payments` (`id`, `c_id`, `invoice`, `payment_method_id`, `price`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1,	9,	'02INV1Gzki',	2,	700000.00,	'Down Payment',	'bukti-images/DHXGf141fMBaYo0NJk2XlT1gco3q1c3VIh03mZQO.jpg',	'2025-07-27 19:50:43',	'2025-08-02 19:26:38'),
(3,	9,	'02INV3kZfl',	2,	850000.00,	'Down Payment',	'bukti-images/mGgyInVEWI3UMZGtpKEod4i5SqJDNbYw993MOB88.jpg',	'2025-08-02 01:58:34',	'2025-08-02 15:25:36'),
(4,	9,	'01INV4sy34',	2,	350000.00,	'Down Payment',	'bukti-images/1r6v13d8Lug0lWzxV05Orb7CJ1WpqOBdkyJhOgcT.jpg',	'2025-08-02 02:00:06',	'2025-08-02 15:24:01'),
(5,	9,	'01INV4IyrZ',	2,	650000.00,	'Down Payment',	'bukti-images/i45gP7gfGbzLoEJYVSUHTZqMgUIc9urRaoFev7Nl.jpg',	'2025-08-02 16:06:59',	'2025-08-02 16:17:47'),
(7,	9,	'02INV536xs',	3,	1150000.00,	'Down Payment',	'bukti-images/83VHUacAJjhlaMWQjiCa3ok9dcp4Clii9KPp370w.jpg',	'2025-08-02 16:45:30',	'2025-08-02 16:47:47'),
(8,	9,	'01INV6m9Km',	2,	500000.00,	'Denied',	NULL,	'2025-08-02 19:11:33',	'2025-08-02 19:20:06'),
(9,	9,	'01INV7fM7N',	2,	1050000.00,	'Down Payment',	'bukti-images/nWFEtuHr1PzPBI8mzPp33JTMSI5UYvyjcbASMFjZ.jpg',	'2025-08-02 19:25:09',	'2025-08-02 19:25:15');

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE `payment_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `payment_methods` (`id`, `nama`, `no_rek`, `created_at`, `updated_at`) VALUES
(1,	'OFFLINE',	NULL,	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(2,	'BCA',	'5221-8420-7788-2024',	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(3,	'BRI',	'7632-01-007520-53-0',	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(4,	'BNI',	'099-5653-265',	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(5,	'BTN',	'00461-01-50-0029320-0',	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(6,	'Mandiri',	'113-00-1522616-4',	'2025-02-02 13:51:30',	'2025-02-02 13:51:30');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `status_id` bigint(20) unsigned NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `info` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_type_id_index` (`type_id`),
  KEY `rooms_status_id_index` (`status_id`),
  CONSTRAINT `rooms_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `room_statuses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rooms_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rooms` (`id`, `no`, `type_id`, `status_id`, `capacity`, `price`, `info`, `created_at`, `updated_at`) VALUES
(21,	'10A',	1,	1,	3,	350000,	'Dirancang untuk pelancong bisnis maupun rekreasi, Kamar Standar kami menawarkan perpaduan sempurna antara kenyamanan dan fungsionalitas. Ruangan yang ditata secara efisien ini menyediakan semua kebutuhan esensial untuk memastikan Anda mendapatkan istirahat yang berkualitas setelah seharian beraktivitas.',	'2025-07-05 09:24:03',	'2025-07-05 09:24:50'),
(22,	'11A',	1,	1,	2,	350000,	'Dirancang untuk pelancong bisnis maupun rekreasi, Kamar Standar kami menawarkan perpaduan sempurna antara kenyamanan dan fungsionalitas. Ruangan yang ditata secara efisien ini menyediakan semua kebutuhan esensial untuk memastikan Anda mendapatkan istirahat yang berkualitas setelah seharian beraktivitas.',	'2025-07-05 09:24:31',	'2025-07-05 09:24:42'),
(24,	'10B',	2,	1,	4,	500000,	'Tingkatkan pengalaman menginap Anda di Kamar Superior kami yang luas dan elegan. Dirancang khusus bagi Anda yang menginginkan kenyamanan lebih, kamar ini menawarkan ruang gerak yang lebih lega serta fasilitas tambahan untuk memanjakan Anda. Dengan jendela yang lebih besar, nikmati pemandangan kota atau taman yang menenangkan langsung dari kamar Anda.',	'2025-07-05 09:32:32',	'2025-07-05 09:32:32'),
(25,	'12B',	2,	1,	5,	500000,	'Tingkatkan pengalaman menginap Anda di Kamar Superior kami yang luas dan elegan. Dirancang khusus bagi Anda yang menginginkan kenyamanan lebih, kamar ini menawarkan ruang gerak yang lebih lega serta fasilitas tambahan untuk memanjakan Anda. Dengan jendela yang lebih besar, nikmati pemandangan kota atau taman yang menenangkan langsung dari kamar Anda.',	'2025-07-05 09:34:12',	'2025-07-05 09:44:16'),
(26,	'13A',	3,	1,	6,	650000,	'Nikmati puncak kemewahan dan keanggunan di Kamar Deluxe kami. Sebagai pilihan akomodasi paling premium, kamar ini menawarkan ruang yang sangat luas, desain interior yang megah, dan fasilitas terbaik di kelasnya. Dari jendela panorama, Anda akan disuguhi pemandangan spektakuler kota, laut, atau taman yang tak tertandingi,',	'2025-07-05 09:35:45',	'2025-07-05 09:35:45'),
(27,	'13B',	3,	1,	6,	650000,	'Nikmati puncak kemewahan dan keanggunan di Kamar Deluxe kami. Sebagai pilihan akomodasi paling premium, kamar ini menawarkan ruang yang sangat luas, desain interior yang megah, dan fasilitas terbaik di kelasnya. Dari jendela panorama, Anda akan disuguhi pemandangan spektakuler kota, laut, atau taman yang tak tertandingi,',	'2025-07-05 09:37:29',	'2025-07-05 09:44:38'),
(28,	'14A',	5,	1,	8,	1200000,	'Ciptakan kenangan indah bersama orang-orang terkasih di Family Suite kami. Didesain secara khusus untuk memenuhi kebutuhan keluarga,menyediakan ruang yang lapang dan nyaman untuk semua anggota keluarga.',	'2025-07-05 20:25:50',	'2025-07-05 20:25:50'),
(29,	'15B',	5,	1,	8,	1200000,	'Ciptakan kenangan indah bersama orang-orang terkasih di Family Suite kami. Didesain secara khusus untuk memenuhi kebutuhan keluarga, menyediakan ruang yang lapang dan nyaman untuk semua anggota keluarga.',	'2025-07-05 20:26:35',	'2025-07-05 20:26:35');

DROP TABLE IF EXISTS `room_statuses`;
CREATE TABLE `room_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `info` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `room_statuses` (`id`, `name`, `code`, `info`, `created_at`, `updated_at`) VALUES
(1,	'Vacant',	'V',	'Sebutan bagi kamar yang kosong.',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(2,	'Occupied',	'O',	'Suatu kamar yang sedang ditempati oleh sesorang se...',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(3,	'Occupied Clean',	'OC',	'Suatu kamar yang sedang ditempati oleh sesorang se...',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(4,	'Occupied Dirty',	'OD',	'Suatu kamar yang sedang ditempati oleh sesorang se...',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(5,	'Vacant Clean Inspected',	'VCI',	'Kamar kosong yang sudah dibersihkan dan diperiksa ...',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02');

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` bigint(20) unsigned NOT NULL,
  `room_id` bigint(20) unsigned NOT NULL,
  `payments_id` bigint(20) unsigned NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_c_id_index` (`c_id`),
  KEY `transactions_room_id_index` (`room_id`),
  KEY `transactions_payments_id_index` (`payments_id`),
  CONSTRAINT `transactions_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_payments_id_foreign` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `transactions` (`id`, `c_id`, `room_id`, `payments_id`, `price`, `check_in`, `check_out`, `status`, `created_at`, `updated_at`) VALUES
(1,	9,	21,	1,	350000.00,	'2025-07-28',	'2025-07-29',	'Reservation',	'2025-07-27 19:50:43',	'2025-07-27 19:50:43'),
(2,	9,	21,	1,	350000.00,	'2025-08-01',	'2025-08-02',	'Reservation',	'2025-07-27 19:50:43',	'2025-07-27 19:50:43'),
(5,	9,	21,	3,	350000.00,	'2025-08-15',	'2025-08-16',	'Reservation',	'2025-08-02 01:58:34',	'2025-08-02 01:58:34'),
(6,	9,	25,	3,	500000.00,	'2025-08-02',	'2025-08-03',	'Reservation',	'2025-08-02 01:58:34',	'2025-08-02 01:58:34'),
(7,	9,	22,	4,	350000.00,	'2025-08-02',	'2025-08-03',	'Reservation',	'2025-08-02 02:00:06',	'2025-08-02 02:00:06'),
(8,	9,	26,	5,	650000.00,	'2025-08-03',	'2025-08-04',	'Reservation',	'2025-08-02 16:06:59',	'2025-08-02 16:06:59'),
(11,	9,	25,	7,	500000.00,	'2025-08-16',	'2025-08-17',	'Reservation',	'2025-08-02 16:45:30',	'2025-08-02 16:45:30'),
(12,	9,	26,	7,	650000.00,	'2025-08-19',	'2025-08-20',	'Reservation',	'2025-08-02 16:45:30',	'2025-08-02 16:45:30'),
(13,	9,	25,	8,	500000.00,	'2025-08-06',	'2025-08-07',	'Reservation',	'2025-08-02 19:11:33',	'2025-08-02 19:11:33'),
(14,	9,	21,	9,	1050000.00,	'2025-06-02',	'2025-06-05',	'Reservation',	'2025-08-02 19:25:09',	'2025-08-02 19:25:09');

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `info` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `types` (`id`, `name`, `info`, `created_at`, `updated_at`) VALUES
(1,	'Standard Room',	'Seperti namanya, jenis kamar standard room adalah tipe kamar hotel yang paling dasar di hotel. Biasanya, kamar tipe ini dibanderol dengan harga yang relatif murah. Fasilitas yang ditawarkan pun standar seperti kasur ukuran king size atau dua queen size. Namun, penawaran yang diberikan tergantung pada masing-masing hotel. Standard room hotel bintang 1 dan bintang 5 tentu berbeda.',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(2,	'Superior Room',	'Pada dasarnya, superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room. Perbedaannya dapat berupa dari fasilitas yang diberikan, interior kamar, atau pemandangan dari kamar.',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(3,	'Deluxe Room',	'Di atas tipe kamar hotel superior room adalah deluxe room. Kamar ini tentu memiliki kamar yang lebih besar. Tersedia pilihan kasur yang bisa kamu pilih, double bed atau twin bed. Biasanya, dari segi interior kamar ini terkesan lebih mewah.',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(4,	'Junior Suite Room',	'Tipe kamar hotel junior suite room ditandai dengan adanya ruang tamu. Namun, ruang tamu tersebut masih berada satu ruangan dengan tempat tidur. Ruang tamu tersebut biasanya dibatasi atau disekat dengan lemari besar agar tempat tidur tidak terlihat. ',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02'),
(5,	'Suite Room',	'Suite room berada di atas tipe kamar hotel junior suite room. Ruang tamu di kamar hotel ini terpisah dari kamar tidur. Dari segi fasilitas, tentu berbeda dari junior suite room. Selain ruang tamu, biasanya tipe kamar hotel ini dilengkapi dengan dapur.',	'2022-10-26 03:09:02',	'2022-10-26 03:09:02');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `c_id` bigint(20) unsigned DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_c_id_index` (`c_id`),
  CONSTRAINT `users_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `image`, `c_id`, `username`, `telp`, `card_number`, `email`, `password`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	NULL,	1,	'admin',	'851312512',	NULL,	'admin@gmail.com',	'$2y$10$lDzvQrmz1ZCAhxqpJ4abFuRQPnnpv2rsU/FGMPmAk.eIIWb4w.pSO',	1,	NULL,	NULL,	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(2,	NULL,	2,	'Customer',	'851312512',	NULL,	'admsin@gmail.com',	'$2y$10$iYkuMMkYJhZs8sEL6Ad2P.C8PPArIx1KdXmCMafNCOCCFXG3EWb6S',	0,	NULL,	NULL,	'2025-02-02 13:51:30',	'2025-02-02 13:51:30'),
(4,	'user-images/6xzGvQliFPulGn5oZ00RwXzbEvb2uzbKLQbnwInF.jpg',	4,	'andri',	'032131311313',	NULL,	'prtmandri30@gmail.com',	'$2y$10$O6NwOxaRFCxJp2tT/8RlGetB.xiHiw4CRdE2mkwwltETnYwLtpIx2',	0,	NULL,	NULL,	'2025-02-02 14:12:49',	'2025-02-02 14:15:21'),
(5,	NULL,	5,	'rara',	'12313131',	'1211111111',	'ajahandrian86@yahoo.co.id',	'$2y$10$YcRbL9KzVsgpdjg2NacoTuIWzSzy4NQ/RoE8mgI8QCH9m2T8hHzk2',	0,	NULL,	NULL,	'2025-02-03 10:27:38',	'2025-02-03 10:34:48'),
(6,	NULL,	6,	'tupai',	'032131311313',	'sssss',	'prtmandri0@gmail.com',	'$2y$10$IY7K1Dq6sO1BLZNbALHaHe8iUhdpzPa8qYn5/wCzK.F.u9C0nq2S2',	0,	NULL,	NULL,	'2025-02-03 10:29:54',	'2025-02-03 10:32:39'),
(7,	NULL,	7,	'jihan',	NULL,	NULL,	NULL,	'$2y$10$Ry3dxwdAkbGKnT3hVNah0uJHDgWTNv9fkJX026MY8KyRkNeTgg2V2',	0,	NULL,	NULL,	'2025-02-03 18:42:36',	'2025-02-03 18:42:36'),
(8,	NULL,	8,	'jihann',	NULL,	NULL,	NULL,	'$2y$10$6nVNIUgkSNoU7c2EIux.y.YCu8SlwmUmZlav9kSS6mFvWhgv/742i',	0,	NULL,	NULL,	'2025-02-03 18:47:30',	'2025-02-03 18:47:30'),
(9,	'user-images/N351Hwe0zFETPMBR44A8N3XAaV598KtOHx2TnHnc.jpg',	9,	'admin123',	NULL,	NULL,	'123@gmail.com',	'$2y$10$aD8zzbjyp0MFx2wl.mxWjuYERbrNjPsi6hBOWyk9BkXnhl..d96gq',	1,	NULL,	'IlztDaYu9f0mkya04cDUnFDOeJo4Su6ysvf2BEktZNSCtcBSmQ4HqhgtTGt0',	'2025-06-28 18:56:39',	'2025-06-29 05:54:29'),
(10,	NULL,	10,	'user123',	NULL,	NULL,	'user12@gmail.com',	'$2y$10$0qnNYoVgcJzuWmkMXqltvu2CGMaNHnwVf01S1L2/Fjr5J3UZsMFOS',	0,	NULL,	'077NNTe83C0IWUQPqbKp9qAMvvvh1xyPRO9RV5gddQurOT22UU8ZcJ33WIVb',	'2025-06-29 13:11:42',	'2025-06-30 00:23:47');

-- 2025-08-03 02:32:35 UTC
