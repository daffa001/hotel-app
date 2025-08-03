-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 08:39 AM
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
-- Database: `hotel_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` longtext DEFAULT NULL,
  `jk` enum('?','L','P') DEFAULT '?',
  `job` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `jk`, `job`, `birthdate`, `nik`, `created_at`, `updated_at`) VALUES
(1, 'cakra', 'grand', 'L', 'nganggur', '2025-02-01', NULL, '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(2, 'customer', 'grand', 'L', 'nganggur', '2025-02-01', NULL, '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(3, 'Andrianto Pratama', 'jakarta', 'P', 'ss', NULL, '3201131301000006', '2025-02-02 13:54:31', '2025-02-02 13:55:29'),
(4, 'Andrianto Pratama', 'jakarta', 'L', 'assasin', NULL, '3201131301000006', '2025-02-02 14:12:49', '2025-02-02 14:15:21'),
(5, 'rara', 'jakarta', 'P', 'damkar', NULL, '123131255555', '2025-02-03 10:27:38', '2025-02-03 10:34:48'),
(6, 'tupai', 'jakarta', 'L', 'ss', NULL, '3201131301000006', '2025-02-03 10:29:54', '2025-02-03 10:32:16'),
(7, 'jihan', NULL, '?', NULL, NULL, NULL, '2025-02-03 18:42:36', '2025-02-03 18:42:36'),
(8, 'jihann', NULL, '?', NULL, NULL, NULL, '2025-02-03 18:47:30', '2025-02-03 18:47:30');

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
-- Table structure for table `image_rooms`
--

CREATE TABLE `image_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2013_12_24_130100_create_customers_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_14_021722_create_payment_methods_table', 1),
(7, '2022_11_03_040944_create_room_statuses_table', 1),
(8, '2022_11_04_015722_create_types_table', 1),
(9, '2022_11_04_015822_create_rooms_table', 1),
(10, '2022_11_04_015922_create_image_rooms_table', 1),
(11, '2022_12_24_084554_create_transactions_table', 1),
(12, '2023_01_25_010743_create_payments_table', 1),
(13, '2023_01_25_094345_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `status`, `read_at`, `created_at`, `updated_at`) VALUES
('0846eb5e-0be6-4ae1-8213-f8fd4b354ffc', 'App\\Notifications\\NewRoomReservationDownPayment', 'App\\Models\\User', 1, '{\"message\":\"Room 16D reservated by tupai. Payment: Rp. 950.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/21\"}', 'unread', NULL, '2025-02-03 10:33:06', '2025-02-03 10:33:06'),
('602a5611-a61a-4a98-a30c-7dfdd96953ba', 'App\\Notifications\\NewRoomReservationDownPayment', 'App\\Models\\User', 1, '{\"message\":\"Room 10A reservated by Andrianto Pratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/19\"}', 'unread', NULL, '2025-02-02 14:15:59', '2025-02-02 14:15:59'),
('8e8c551e-3ec3-4069-9e55-c43079e79706', 'App\\Notifications\\NewRoomReservationDownPayment', 'App\\Models\\User', 1, '{\"message\":\"Room 10A reservated by Andrianto Pratama. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/17\"}', 'read', '2025-02-02 14:11:17', '2025-02-02 13:55:51', '2025-02-02 14:11:17'),
('bc9b8456-969a-42aa-b26b-7906bd447f4e', 'App\\Notifications\\NewRoomReservationDownPayment', 'App\\Models\\User', 1, '{\"message\":\"Room 10A reservated by rara. Payment: Rp. 650.000,00\",\"url\":\"\\/dashboard\\/order\\/history-pay\\/22\"}', 'unread', NULL, '2025-02-03 10:35:15', '2025-02-03 10:35:15');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `c_id`, `invoice`, `transaction_id`, `payment_method_id`, `price`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'INV021CJ23KA', 1, 2, 2000000.00, 'Down Payment', NULL, '2022-01-05 13:51:30', '2025-02-02 13:51:30'),
(2, 1, 'INVB0912AS2', 2, 2, 2000000.00, 'Down Payment', NULL, '2022-02-01 13:51:30', '2025-02-02 13:51:30'),
(3, 1, 'INV01FAJ412', 3, 2, 2000000.00, 'Down Payment', NULL, '2022-02-03 13:51:30', '2025-02-02 13:51:30'),
(4, 1, 'INV4KU5UK4', 4, 2, 2000000.00, 'Down Payment', NULL, '2022-03-04 13:51:30', '2025-02-02 13:51:30'),
(5, 1, 'ngasal', 5, 1, 2000000.00, 'Down Payment', NULL, '2022-03-06 13:51:30', '2025-02-02 13:51:30'),
(6, 1, 'ngasal', 6, 1, 2000000.00, 'Down Payment', NULL, '2022-04-02 13:51:30', '2025-02-02 13:51:30'),
(7, 1, 'ngasal', 7, 1, 2000000.00, 'Down Payment', NULL, '2022-04-04 13:51:30', '2025-02-02 13:51:30'),
(8, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-04-06 13:51:30', '2025-02-02 13:51:30'),
(9, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-05-06 13:51:30', '2025-02-02 13:51:30'),
(10, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-06-06 13:51:30', '2025-02-02 13:51:30'),
(11, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-07-06 13:51:30', '2025-02-02 13:51:30'),
(12, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-08-06 13:51:30', '2025-02-02 13:51:30'),
(13, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-09-06 13:51:30', '2025-02-02 13:51:30'),
(14, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-10-06 13:51:30', '2025-02-02 13:51:30'),
(15, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-11-06 13:51:30', '2025-02-02 13:51:30'),
(16, 1, 'ngasal', 8, 1, 2000000.00, 'Down Payment', NULL, '2022-12-06 13:51:30', '2025-02-02 13:51:30'),
(17, 3, '03INV17lbpZ', 17, 2, 650000.00, 'Down Payment', 'bukti-images/fDOEEsvkEtOTRij8UlmNt6eTaJKKgeqb8eP0Hq5o.jpg', '2025-02-02 13:55:51', '2025-02-02 13:59:59'),
(18, 3, '0INV18UJEy', 17, 1, 12222.00, 'Down Payment', NULL, '2025-02-02 13:59:23', '2025-02-02 13:59:23'),
(19, 4, '04INV19phS3', 18, 2, 650000.00, 'Down Payment', 'bukti-images/9Q3bAd6eFVJKwpUNjUGLnjRKjYRePjm72JBW0U2O.jpg', '2025-02-02 14:15:59', '2025-02-02 14:18:33'),
(20, 4, '0INV20ETVp', 18, 1, 650000.00, 'Down Payment', NULL, '2025-02-02 14:18:04', '2025-02-02 14:18:04'),
(21, 6, '06INV21UEpu', 19, 2, 950000.00, 'Pending', NULL, '2025-02-03 10:32:58', '2025-02-03 10:32:58'),
(22, 5, '05INV222A8b', 20, 2, 650000.00, 'Down Payment', 'bukti-images/ikvLYgQDRgfafeuvQNsoM0j6oKB6WU8ZWF7iDcCy.png', '2025-02-03 10:35:15', '2025-02-03 10:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `nama`, `no_rek`, `created_at`, `updated_at`) VALUES
(1, 'OFFLINE', NULL, '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(2, 'BCA', '5221-8420-7788-2024', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(3, 'BRI', '7632-01-007520-53-0', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(4, 'BNI', '099-5653-265', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(5, 'BTN', '00461-01-50-0029320-0', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(6, 'Mandiri', '113-00-1522616-4', '2025-02-02 13:51:30', '2025-02-02 13:51:30');

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `info` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `no`, `type_id`, `status_id`, `capacity`, `price`, `info`, `created_at`, `updated_at`) VALUES
(1, '10A', 10, 1, 2, 650000, 'Aut excepturi ut sint dolorem sed non. Quia assumenda minus aut quidem culpa vel quod. Non ex beatae fugit accusantium tenetur vel. Eos suscipit tempora ex voluptatibus hic. Recusandae voluptates dolorem cum aspernatur asperiores accusamus. Rerum deserunt sunt quis voluptatum blanditiis et. Quam est eum et eveniet voluptatem veritatis cumque. Commodi quo iste quis autem. Occaecati expedita perferendis accusantium. Et deserunt itaque natus eum. Sit voluptas sunt ut. Et ipsum atque voluptatem doloribus itaque non sapiente. Distinctio praesentium cum enim voluptates inventore. Veritatis sit atque quam. Consectetur id aliquam culpa autem quae qui adipisci magni. Dignissimos ad omnis ut aperiam sequi in officiis. Error neque qui occaecati asperiores perspiciatis. Blanditiis voluptates tempora id. Reiciendis consequuntur dignissimos doloremque vero ut numquam quos. Saepe aut et et iste dignissimos illo id quia. Pariatur aliquam porro dicta eveniet asperiores culpa ut. Voluptas commodi nisi amet et saepe. Impedit quo nisi ex eligendi. Quis ut voluptatibus labore non blanditiis. A consequatur tenetur nobis dolor voluptatem nulla voluptas. Numquam est quasi corrupti facere. Alias ab officiis fugiat. Debitis deserunt est omnis nisi illo exercitationem. Aut deleniti aliquid sapiente vel qui autem aliquam. Non accusamus distinctio aspernatur molestiae id ullam. Facere numquam sint vel perspiciatis facere. Quisquam sed molestiae esse mollitia sed. Magni quia aliquam in et ipsum. Ut laborum dignissimos quia rem iure et architecto. Est quas soluta sunt suscipit autem. Sint veritatis aut ut nostrum veritatis delectus autem quae. Itaque non autem sint quis ipsam autem. Aut nihil ea sit eveniet. Non sed doloremque voluptatem provident. Quod qui voluptatem voluptas qui. Sed dolores reprehenderit sint rem. Illum autem occaecati placeat ipsa. Quae corrupti ipsam voluptas molestias enim excepturi perspiciatis. Aliquam ad architecto in dolorem numquam nulla quod. Nesciunt et dolores optio. Dolores esse culpa ducimus neque architecto assumenda beatae.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(2, '11C', 11, 1, 6, 2000000, 'Dolor quae magni voluptatem doloribus modi assumenda. Beatae voluptatem laboriosam porro in quaerat. Officiis excepturi sed mollitia fugiat. Consequatur vel itaque recusandae ratione sint. Alias rerum ad quidem modi recusandae veritatis ut nulla. Molestiae rem fuga cumque. Et debitis aut voluptatem amet atque aspernatur. In quia quaerat temporibus recusandae neque ut in. Consequatur qui et in est quia. Dolorem consequuntur aut officia doloribus amet. Sit blanditiis dolore blanditiis itaque enim rerum. Qui rerum eligendi a officiis exercitationem labore animi. Voluptatem labore atque est rerum odit architecto. Aliquid dolore voluptate harum sit. Dignissimos amet quo et porro autem. Nihil earum excepturi in eum aut corrupti eos. Accusantium modi rerum qui. Molestias ab et cumque a voluptatem deleniti autem. Dolores voluptatum officiis unde. Vel quas dicta id et repellat deserunt. Quia ut id dignissimos ut facilis. Ab atque error possimus eligendi quia et. Rerum sequi facere quia est. Odit aut saepe voluptatem non non modi dolores. Nobis sapiente quia nobis velit. Quae optio praesentium commodi itaque quidem. Ut molestiae id doloribus voluptatem rerum. Neque consectetur consequuntur ut exercitationem.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(3, '12A', 6, 1, 11, 1750000, 'Velit delectus nihil qui adipisci. Quos ea vitae quae dicta molestiae. Aut omnis ut corrupti. Quo beatae possimus quidem cupiditate exercitationem eveniet. Tempore quisquam dolores nihil mollitia et velit. Amet velit et eius. Beatae expedita quaerat voluptates cumque ipsam. Est et tempora dolorum qui iste quos. Enim vero totam omnis corporis tempore. Id sunt autem numquam natus id adipisci. Debitis sapiente sunt cum. Et doloribus sit numquam ipsam. Vel officia vel animi esse consequuntur quia. Rerum iure cupiditate excepturi voluptatem est atque. Eos quos temporibus sit unde. Quia rem numquam blanditiis aut qui ad et. Voluptatem sit animi est qui ab optio. Ab qui blanditiis excepturi totam animi. Nemo consequatur quis illo quidem. Sint placeat minus at optio nihil eveniet nostrum. Qui ut sapiente qui. Nemo maxime tempore autem assumenda dolorum earum et. Aliquid unde accusantium fuga saepe dolores architecto odio. Laudantium aperiam ex sint esse magnam. Laudantium maiores ut ut asperiores. Necessitatibus animi sapiente et voluptas alias. Praesentium aut unde quam est omnis sed amet. Quo quo pariatur sed voluptates in aut. Voluptates natus hic incidunt aperiam sit tempore. Omnis nostrum ut laborum aut et. Dignissimos fuga eveniet consectetur impedit consectetur expedita non. Non laboriosam aliquid molestiae animi iure aliquid ut. Voluptates quod ut omnis qui porro aut. Cumque omnis et debitis porro optio distinctio ad. Sed sed tempora modi odio et. Labore facere aperiam veritatis esse. Eligendi aut eaque voluptas suscipit.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(4, '13D', 10, 1, 11, 2000000, 'Hic laborum ipsa in. Dolorum odit reiciendis voluptatum ex illo doloremque consequatur. Sed velit perferendis dolore odit aliquid vel. Sint architecto nobis dolores. Dolor non non nihil. Sed ex aut quaerat voluptatem. Beatae et voluptas et fugit eum autem. Repellat cupiditate harum nihil in consectetur suscipit. Tenetur eius non veritatis voluptate voluptas rem. Aut rerum molestiae sunt saepe ut quos aspernatur. Voluptates perspiciatis provident fugiat molestiae est maiores. Aliquid molestiae modi ea commodi perspiciatis numquam ipsum. Amet inventore ut deleniti minus voluptatem sunt quod. Reiciendis ea eveniet eligendi qui distinctio vitae. Inventore alias at voluptatem voluptate. Dolorem quia iste sint et autem. Alias alias placeat veniam deleniti rem nostrum aut. Qui ut quod libero in facilis dicta. Magni rerum architecto beatae sed. Suscipit ipsum expedita omnis. Est eaque sit dicta velit temporibus. Sit minus accusamus iste et voluptatem. Tempore est pariatur accusamus enim illum. Voluptatem nesciunt velit deserunt et molestiae eaque non. Non eaque quos quia beatae voluptas. Error fuga tempora soluta rem rerum. Molestias excepturi eum blanditiis. Autem maiores ut itaque et inventore iure. Provident magni quia laborum tenetur. Ea quo doloremque ex hic possimus est ut. Ut ut nemo molestiae sit aut. Sed aut consequatur necessitatibus dolore et molestias. Quod voluptas sunt nesciunt praesentium vel consequuntur. Animi voluptatem natus atque consequatur corporis minima. Vitae aut voluptatem autem velit. Optio molestias dolore omnis. A sit dolorem dolor autem nemo. Sapiente dolorum sed voluptatem et qui. Ratione ut blanditiis corporis quo. Est aliquid dolor rerum quae. Sit libero id deserunt tempora. Earum nam autem modi pariatur perspiciatis itaque iure. Ut qui mollitia et perspiciatis est. Omnis voluptatem et magni aut. Sequi consectetur ullam blanditiis.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(5, '14D', 1, 1, 3, 1200000, 'Id aperiam provident quia doloremque est corporis consequuntur enim. Ut optio sint quia quo aliquam aperiam consequatur non. Expedita rerum odit facilis est ut id. Ut aut et ex quibusdam. Accusamus nihil laudantium tempore placeat. Qui vitae quasi vitae corrupti. Sit ipsa nihil laborum vel et itaque dolores. Mollitia quo sapiente eveniet voluptas quaerat dolores libero. Saepe molestiae fugit culpa voluptate aut corrupti suscipit vitae. Veniam consequuntur non rerum assumenda fugit eum. Dolor voluptatum placeat dolores officia architecto. Labore eum asperiores explicabo quos quasi voluptatibus repellendus. Vel illum est minus provident. Minima molestiae esse ab omnis quibusdam accusamus dolores. Incidunt delectus neque quam aut vel iusto veniam eum. Et odit sed eum laboriosam corrupti earum voluptate nesciunt. Modi et voluptas necessitatibus repudiandae rerum. Laborum qui quis et consequuntur ea harum voluptatem. Placeat libero nostrum quas impedit facilis. Facilis unde aut vero facilis facere ullam vero corporis. Dicta id dolore magni at et magni minus. Architecto consequatur assumenda quas minus. Enim reprehenderit deserunt cumque. A sit est et magnam rerum commodi. Exercitationem aperiam quidem debitis illum. Voluptatibus perferendis modi sed vel ipsum tempora. Dolorum molestias occaecati aspernatur est deserunt neque distinctio est. Ut quis error quasi nihil. Adipisci earum minus libero porro. Sed excepturi illo tempore sint ipsa est quidem. Et quasi sed sed tempora molestiae necessitatibus qui. Molestiae possimus laborum et nihil beatae nemo dolor debitis. Sit accusamus et incidunt.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(6, '15A', 3, 1, 5, 500000, 'Nisi rerum provident autem magni. Ut assumenda totam dolores soluta laborum dolores at. Et aut soluta aut. Ex corrupti perspiciatis dolorum sint quidem ducimus. Et voluptatem doloribus asperiores cumque. Voluptatibus totam omnis aut consequatur. Nostrum sequi excepturi qui ut. Tenetur soluta voluptatem alias quia. Nihil debitis commodi aliquid sunt adipisci nam. Enim aperiam deleniti explicabo velit totam. Omnis ipsa dicta doloremque iste consectetur quia. Tempora eum officiis consequuntur. Optio vel excepturi tenetur veritatis delectus placeat at doloremque. Mollitia rerum vitae dignissimos eum recusandae. Ut quis dolore similique consequatur nihil earum odit. Enim saepe eos omnis et molestiae. Accusamus pariatur dolores nobis commodi voluptatum sint maiores inventore. Est et saepe in architecto. Saepe nam error debitis ut mollitia possimus. Dolore temporibus aspernatur tempora et velit occaecati. Quam et provident totam. Est est laudantium dignissimos architecto sunt doloribus eos. Magnam qui distinctio esse id nemo nihil hic. Necessitatibus velit asperiores vel modi omnis dolorem quos. Optio ea aut at ut. Nisi voluptatum exercitationem est rerum maxime assumenda neque. Quo quis error quo non dolores sint. Et labore aut beatae sit. Qui quia recusandae odio incidunt recusandae fugit doloribus repellat. Est laborum autem omnis sit illo ea. Velit ab alias aliquid sint. Deleniti architecto aliquam soluta voluptatum sunt nemo fugit. Qui et ad consequatur officia eveniet rem. Dolor beatae omnis rem pariatur. Molestias rerum quia distinctio libero. Dignissimos possimus exercitationem illum ipsam. Vel molestiae ut ut aut. Dolore qui qui id voluptas laboriosam. Quod ut inventore nihil voluptatum et similique commodi quo. Fugit non non rerum nam maiores. Molestias vel voluptatem repellendus unde at enim. Ut quam error qui nisi. Consequatur accusantium ipsa nemo. Inventore consequatur provident nulla sed. Et natus est omnis est dolor culpa. Neque eum laborum pariatur rem doloremque. Impedit aut reiciendis occaecati. Aut dolor est a quis ea et. Voluptatibus et asperiores enim soluta. Quo dolores ullam quam.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(7, '16D', 8, 1, 1, 950000, 'Optio quae unde in dicta vel vitae nesciunt delectus. Corrupti iusto illum laborum neque. Est deserunt itaque quis perspiciatis aut laboriosam. Et laboriosam in doloribus et. Animi dolores aliquid id cum temporibus. Qui porro quae dolores quod molestiae quidem quos beatae. Natus debitis quis vel. Totam eaque qui odit voluptates qui est qui. Delectus qui fugit aspernatur eum. Et enim sit doloremque tempore eveniet facere et dolorem. Molestiae quae ipsum explicabo eos officiis eum perspiciatis hic. Recusandae cumque vitae accusamus officia. Vel consequatur ad sed eum quis voluptatem. Dolor autem eveniet nesciunt qui sequi. Labore eos soluta nemo reiciendis. Dicta perferendis voluptatem ullam libero enim rerum. Voluptatum voluptatibus enim enim vel ex. Et dolorem iusto molestiae quas. Tempora distinctio quaerat fuga ducimus qui blanditiis. Quod expedita omnis est necessitatibus. Corporis deleniti quis dicta et. Omnis animi fuga quo consequuntur dolore et repudiandae in. Sit voluptate doloribus cum autem. Et modi nihil ad quis. Distinctio illo nesciunt beatae aut et. Dolor assumenda quas sit dolor quam. Totam dicta magnam velit numquam quia necessitatibus. Dolores quaerat iusto rem expedita voluptate consequuntur quibusdam. Nobis odio ipsum eligendi voluptas odit dolorum earum delectus. Cupiditate minus nihil molestias quod eum. Id explicabo debitis autem natus dolor odit alias. Officiis nihil asperiores quo vel. Perferendis dolores quidem et odio aut assumenda. Molestias vitae nihil in similique at consequatur itaque.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(8, '17A', 8, 1, 6, 650000, 'Sed accusantium natus voluptatem expedita occaecati vero. Nemo pariatur labore officia voluptates architecto doloribus eaque. Qui incidunt itaque est earum ullam. In ex voluptatibus veritatis. Cum repellat omnis dolore laudantium sed. Modi itaque excepturi aperiam vel. Ut possimus recusandae ipsa sed hic adipisci sint. Et minima sapiente voluptas. Velit earum dolorum sit quae. Sunt porro voluptate aut repellat deserunt repellat. Enim labore consequuntur officiis delectus. Voluptatum hic facere nisi impedit. Sit laboriosam blanditiis quisquam soluta. Sit consequatur voluptates eos. Quis odio aut est nihil ducimus. Necessitatibus et qui perspiciatis ab est. Rerum perferendis ex unde dicta. Amet eaque officia ut aliquam repudiandae ratione eaque. Quos est aut necessitatibus. Architecto omnis ut magnam fugiat. Ea molestiae rerum dolor neque natus quis est. Officiis ipsam dignissimos et. Quis ut sunt illum eum qui. Delectus veritatis consequatur quia. Sed harum velit placeat laborum quibusdam voluptatem. Qui accusamus mollitia occaecati deleniti et. Beatae minus pariatur nobis ut facere cupiditate. Atque recusandae asperiores animi. Quisquam sit quasi tempore facilis. Aliquam quia hic excepturi eos sunt et sequi. Numquam nobis corporis veniam necessitatibus quia. Voluptatibus iure in aperiam ipsa quas ab dolorum. Architecto dolorem et atque labore. Provident distinctio unde voluptate enim. Harum illum ducimus et tempore. Temporibus qui odit corrupti et. Sit recusandae voluptatem esse vitae alias et excepturi et. Sequi ipsum incidunt ipsa qui. Explicabo blanditiis vel natus unde earum consequuntur ullam.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(9, '18C', 14, 1, 11, 850000, 'Voluptatum est autem et consequuntur. Nemo consequatur rem et voluptas. Est cum assumenda explicabo sed minima sed rem. Sapiente ad soluta fuga est. Id beatae maxime dolorum molestiae odio. Aut tempore asperiores aut esse. Ut odio doloribus expedita et iure. Quos eos enim eius similique sed consectetur sed. Vel quaerat aliquam distinctio numquam. Nihil dolor laboriosam distinctio vero et distinctio quaerat. Quo ea dignissimos quaerat iusto optio consequatur aut. Veritatis voluptates molestias ad sint laboriosam cum. Quia hic pariatur et consectetur consequatur debitis. Quis aut repellendus velit. Neque enim deleniti molestiae harum dolorem perspiciatis est vel. Est temporibus sit id. Porro a dolor sint provident est. Consequatur sed ad magnam quisquam veritatis doloremque. Praesentium aut sapiente mollitia. Vero dolor iste incidunt delectus ducimus vero corrupti. Laboriosam nobis eum ullam fugit quasi architecto. Sunt fugit voluptatem et ex. Assumenda est quam dignissimos magnam saepe. Odio repellat dolor fuga ea aspernatur ullam. Dicta sunt ut velit sit blanditiis. Enim nobis voluptate velit magnam excepturi debitis rem. Sed libero dolor rem sint laboriosam dolorem et repudiandae. Dignissimos repudiandae quis expedita et voluptas quam omnis. At perspiciatis sequi ut cum incidunt velit. Quibusdam itaque consectetur quia sint tenetur. Dignissimos similique laborum voluptatem perspiciatis quas et aut autem. Temporibus blanditiis quibusdam consequatur dicta repudiandae omnis reprehenderit. Aut omnis totam aut temporibus at eveniet iusto. Totam vel omnis eos suscipit ut nobis aut. Sed eligendi sunt unde accusamus dolores reprehenderit. Quis pariatur culpa voluptas. Corporis ut in ea optio harum. Qui quaerat sint temporibus sunt consequuntur non. Et necessitatibus distinctio consequatur quaerat hic accusamus. Quia non possimus labore corrupti error ipsum perferendis. Unde iusto nisi reiciendis cum voluptatem. Temporibus quam rerum officia. Nostrum sequi quasi sit doloremque voluptates dignissimos minus. Doloribus earum voluptas harum vero. Doloribus sint recusandae accusamus neque. Repellendus repellendus asperiores odio et.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(10, '19A', 10, 1, 1, 1750000, 'Et ut harum consequatur et minus sapiente. Magnam enim adipisci ducimus magni ut. Magnam et hic animi et. Provident earum et est dolore adipisci culpa magnam. Et reprehenderit repellat amet molestiae molestiae expedita est. Quia odio ut at. Illum fugiat id aut distinctio. Quasi minus magnam voluptates ut maxime. Aut est ut in optio vero perferendis quia et. Nemo impedit tempore tenetur sed corporis nam. Quia aliquam voluptate ut quos et ullam. Officiis eos reiciendis ipsa mollitia et. Accusamus voluptas illo ratione molestiae iure. Ut voluptates magnam laudantium corporis distinctio. Magnam vitae laboriosam veniam. Explicabo sit rem rerum reprehenderit saepe ut ut. Ad qui iste qui quo aperiam facere enim. Provident laudantium dolores consequatur assumenda aperiam. Laudantium sit sit molestias quaerat voluptas quod sed. Vitae dolores ipsam consectetur error ea eos. Qui id fugit voluptate rem. Iure expedita quae iste. Similique inventore voluptas eaque. Maxime sed animi autem autem aut laudantium ut. Tempore sunt ea voluptas est sit explicabo autem. Rem consequatur quisquam rerum. Iste inventore itaque et voluptas nesciunt. Ipsa sapiente error aliquam voluptate odio provident. Odio rerum non rem accusantium quam corporis earum repudiandae. Inventore optio et cumque qui eum quo. Laudantium temporibus autem sunt voluptas id. Quia rerum ut modi quos ipsam. Incidunt distinctio officia numquam officia. Qui accusantium eius laudantium explicabo sequi esse. Iusto ut repellat nobis ut aliquid. Vel officia atque ad ut at. Facere magnam nam placeat debitis exercitationem beatae a. Voluptatem quibusdam libero quia. Est aliquam iste nam quis similique sed ut. Impedit molestiae sit incidunt aliquam ea quasi incidunt eos. Ducimus neque modi cupiditate molestiae vel quo sit officiis.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(11, '20D', 12, 1, 2, 650000, 'Qui eum expedita provident eum aliquam. Et aut voluptatem sunt praesentium culpa. Possimus voluptatem dolor vero voluptas. Modi corporis recusandae nobis perferendis magni. Est est aperiam dolores illo officiis dicta. Aliquid sed et iure id qui optio autem. Alias iste laborum maiores atque sed. Et corporis in at alias odio sunt. Iste veritatis officia non sequi et quod. Eum quisquam est magni quis est autem aliquid. In quidem vel distinctio et eveniet id. Impedit molestiae fugit tenetur consequuntur aut aliquid. Cupiditate est animi qui quis nisi. Voluptatem tempora culpa voluptas sit. Officia qui harum est ullam temporibus pariatur quis tempore. Et voluptas cupiditate est quia enim ut tenetur. Nam ad ut inventore. Ut consequatur quia dolorum consequatur nisi laborum assumenda. Illo et est voluptatum ratione qui dignissimos veritatis. Eum accusamus sed illo quam totam sint. Quis aliquid fuga architecto et dolore omnis. Vero sed eius autem nihil est hic cum voluptatem. Non voluptas omnis quam rerum et non quos ea. Fugiat cumque tempore eum minus delectus et. Quia neque sit dolorem voluptatum qui dicta accusantium. Hic consectetur et qui excepturi. Officia aperiam itaque vel porro est soluta sunt. Eum sed repellat quaerat et quis modi consequatur aut. Deserunt vitae debitis necessitatibus ut eveniet dignissimos dignissimos. Quaerat omnis non reiciendis quo facilis. Quia laudantium cumque eligendi numquam exercitationem. Voluptas distinctio dolores voluptatem et sunt. Aut quia sunt consequuntur impedit eligendi. Ut corporis omnis similique incidunt veritatis porro. Molestiae quod et et eligendi blanditiis. Magnam vitae nemo vel nemo quis excepturi occaecati. Dolore qui fugit non voluptatem ut culpa quidem. Aspernatur omnis quibusdam temporibus cum. Aperiam sunt quidem vero reprehenderit beatae est. Culpa pariatur et facere est provident molestiae. Explicabo iure non voluptates a cupiditate pariatur autem. Facilis similique omnis recusandae placeat.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(12, '21D', 11, 1, 6, 2000000, 'Aut aut excepturi voluptas et animi iure quibusdam iste. Deserunt dolor itaque ipsa accusantium quia ut quia. Voluptatem mollitia est rem nulla ad. Aperiam corrupti aut et. Doloribus natus neque sit eum. Minima est hic dolorem enim nulla libero repellendus placeat. Quis culpa aut consequatur et est consequatur nesciunt et. Vel eveniet laboriosam nemo temporibus eum vel. Culpa deserunt nihil culpa repellat dolorum. Veniam dolore voluptatem quaerat sed cupiditate nam explicabo. In sequi libero quis voluptatem est quo accusamus. Temporibus sed nemo ut ullam aspernatur sint. Est corporis numquam ea est alias omnis quae. Reprehenderit quae inventore atque qui aut omnis. Quas quibusdam ab sed maiores culpa. Unde possimus esse sit ipsa accusamus quidem. Quis eum distinctio vero sit corporis fuga. Molestiae saepe aut voluptatem incidunt quia impedit voluptatibus. Aliquam temporibus at ut. Est nulla omnis sit recusandae. Consequatur aut sint ducimus pariatur mollitia eius. Magni sed rerum ut. Repellendus nobis sit sit a. Consequuntur voluptatem odio libero est dolores et. Et itaque error reprehenderit possimus quasi. Tempore autem reiciendis odio facere dolorum delectus. Expedita ipsam totam sit iusto asperiores explicabo consequatur incidunt. Unde harum minus dolore vero recusandae repellendus sapiente sed. Delectus veniam commodi rerum voluptate nihil rem aspernatur non. Amet dolores temporibus quia pariatur. Doloribus quia omnis omnis ducimus dolor. Molestiae aut non officiis nemo et et enim. Quo sunt pariatur non et ad et. Asperiores sed amet iusto quia eveniet. Qui quisquam repellendus ad quis non iste. Excepturi minus sed fuga at. Rem quasi doloribus quam sed mollitia id tempore. Modi et sed sunt rerum in maiores. Sit ut at officia. Qui iusto quod voluptas totam labore consequatur. Tempore aut porro et tenetur sed esse.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(13, '22A', 14, 1, 3, 2000000, 'Sequi voluptatem voluptas omnis. Ea id maxime quas totam eos quia. Dignissimos rerum maiores voluptatum praesentium. Distinctio vel corporis reiciendis vel et recusandae. Ut officiis aut sunt esse placeat cum. Sint omnis maxime sequi magni occaecati libero similique est. Quae aut nulla veritatis. Officiis quis incidunt quia natus vel ducimus amet. Recusandae ut consequuntur sit perferendis. Itaque est placeat et cum. Nam nemo qui quo consequatur cupiditate possimus. Quam temporibus ullam pariatur quas. Quaerat tempore enim non alias. Corrupti dolores sapiente sit similique quidem quia. Repellendus est hic sapiente harum amet voluptatem sint. Ut et corporis ipsa fugiat voluptas eum. Quia alias provident qui ut optio nobis voluptatem quis. Sed dicta occaecati porro eveniet. Sed nisi explicabo eaque et non vitae. Sequi veniam vel modi non. Consectetur qui deserunt sed quia distinctio. Id culpa quod est autem. Aspernatur architecto voluptas sint id consequuntur dignissimos rem. Eius aliquam placeat corporis aut repellat esse. Et quia dolorem numquam quia architecto odit sunt. Itaque possimus in est neque maiores soluta quis. Voluptas et eveniet laborum eaque. Est est nihil eaque veritatis. Autem nesciunt delectus est qui. Cupiditate placeat necessitatibus aut labore quia. Alias rerum vel maxime sunt.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(14, '23B', 6, 1, 12, 1750000, 'Debitis est nesciunt dolorem soluta officia in minus. Possimus voluptas corrupti optio amet. Quidem excepturi modi corrupti. Omnis voluptates debitis doloremque aut provident ipsam non. Dolore vitae cum ipsam dolorem. Facilis alias id corporis soluta ea soluta ratione. Maxime et repellendus sed quo et. Est nesciunt qui et esse dolor dolores. Quam quisquam fugit esse eaque sequi aut hic. Explicabo ducimus fugit commodi magnam. Accusantium quia quia voluptatem omnis est numquam. Non laudantium dignissimos asperiores quae id. Numquam quia neque qui cupiditate cum vero. Molestiae praesentium saepe nemo sit. Necessitatibus ipsa vel recusandae. Distinctio quibusdam inventore id corporis molestiae eius. Nisi illum rerum aut culpa praesentium. Et reiciendis nihil consectetur asperiores et eos. Eveniet consequatur blanditiis et aperiam consequatur earum est. Labore qui aperiam laborum dolorum quia reiciendis. Consectetur nesciunt dignissimos autem voluptas dolorem ipsa qui. Tempore quo unde cupiditate accusamus. At a sunt aperiam qui. Molestiae aperiam velit et aliquam ducimus voluptate. Doloribus totam sunt sint amet aut nesciunt. Laboriosam praesentium quibusdam laboriosam reiciendis quia. Voluptatem corrupti et quia voluptatem soluta consequatur vel. Deserunt et sequi pariatur ea delectus amet ea.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(15, '24A', 15, 1, 5, 950000, 'Est quas id sint odit ut architecto est. Provident quasi ut architecto in est dolor commodi. Exercitationem unde ullam illo quia rem qui eaque. Consequatur fugit illum praesentium non molestiae quia ad cumque. Voluptas aliquam et quo sit autem aut est. Sunt harum delectus explicabo assumenda eum blanditiis. Fuga autem aut illum consequuntur ut odit voluptatem. Neque illo fugit eveniet adipisci provident est. Quam et voluptatibus natus natus mollitia repellat. Cum sit illo est repellat quis natus pariatur. Facilis quis quam quos eos ex nemo. Quia et ut non aliquid deserunt. Totam dignissimos iure harum excepturi. Animi esse optio voluptas ut reiciendis cum. Quis odit autem et. Est vero nam vel eaque cupiditate labore est. Et rerum dolorem porro est quas. Animi voluptatem consequatur nam vel. Sint praesentium ex et accusantium dolorem quae molestias. Perferendis necessitatibus autem sunt error assumenda. Omnis officiis dolorum ut non et rerum et. Vero rerum est dolore dolor quo. Autem delectus sit rerum corrupti dolorem at et. Fugiat dolorum labore ut debitis. Maiores sint temporibus reiciendis dolores voluptate nobis a. Iusto eos quo sit doloremque. Doloribus ut similique consequuntur quis veniam et. Quia cumque repellendus eum nostrum. Voluptas commodi sapiente laudantium velit. Explicabo ut sequi molestias doloremque. Velit nemo dolores dolore consequatur cum. Beatae tempora et et. Iusto facere est consequatur ut.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(16, '25A', 15, 1, 11, 1500000, 'Quisquam repudiandae optio sed. Qui est impedit id. Ut quam porro in exercitationem aut blanditiis. In ullam laboriosam quae quidem. Velit quia tempore eaque non. Consequatur quis dignissimos iusto consequuntur earum ut consequatur earum. Rerum doloremque sed odit nostrum vel ea praesentium. Eos itaque numquam reiciendis culpa sapiente architecto aut. Quia et dicta facilis nobis. Qui quod et ullam aliquid. Laudantium molestiae est impedit id. Voluptatem sint quod ut porro qui sint consequuntur rerum. Odit error iure sunt minus. Voluptatibus sunt ab occaecati est sit. Distinctio ipsa magni ipsum autem neque aut animi. Aut velit ratione est iusto quas et enim. Quia debitis voluptatem alias itaque consequatur illum. Exercitationem aliquid ut id nobis. Recusandae assumenda sint qui inventore iste ullam. Eveniet dolorem quia illum delectus ad. Voluptas quia provident sed sequi sit vero. Exercitationem reprehenderit delectus dolorem incidunt laborum. Molestias ut sed deleniti itaque magni labore. Et ea facere aut earum vel. Quia dolor blanditiis quia corrupti in doloribus. Ut et labore ipsam adipisci cupiditate. Et et et fugiat illum. Et non reprehenderit molestias a nihil. Aut consequatur atque facilis tempore labore ea.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(17, '26D', 11, 1, 5, 1200000, 'Exercitationem quis possimus cupiditate quia sequi minus. Voluptatibus ab animi consectetur nesciunt animi. Et voluptatem soluta iure nisi ducimus. Et consequatur architecto dolores maxime quae. Modi quam omnis quaerat blanditiis eos repellendus ut. Modi a molestiae sint fuga non inventore sit. Rerum error dolores consectetur nam. Accusamus facilis assumenda maxime sit. Magni est rem adipisci est inventore quasi. Voluptas consequatur sed quo aut. Veniam voluptate natus consectetur perspiciatis ut rerum sint. Tenetur hic quo reprehenderit ut molestiae doloribus culpa. Inventore quibusdam facilis molestiae quia. Dolores iste distinctio praesentium rerum repellat voluptatum commodi. Sit consequatur vero nemo et velit aut doloremque. Sint saepe voluptatem ab fugit pariatur. Quia molestiae consequuntur consequatur aut enim ratione vitae tempore. Corrupti maxime recusandae labore nesciunt. Consequatur ut velit aut eos itaque eaque enim nam. Molestias corrupti omnis dolorum nostrum facilis deserunt reprehenderit. Eos voluptatem minus accusamus dolor occaecati. Iusto libero vitae voluptatibus modi et blanditiis. Maiores provident voluptatem rerum soluta nihil. Voluptates voluptatem exercitationem voluptas quas nemo. Soluta cupiditate vitae voluptatum illo maxime quam. Delectus doloribus ut sapiente voluptate. Eius et temporibus aperiam eius. Ut optio officiis et est vel aut debitis iure. Et sit ut accusantium et vel placeat ut. Commodi recusandae consequatur nemo ipsum. Minus debitis quis minus dolore natus. Repellat quasi eius atque. Asperiores quidem sit animi fugit natus numquam. Asperiores consectetur omnis est id adipisci. Ea est rerum provident sed ut.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(18, '27D', 14, 1, 6, 450000, 'Et repellat laboriosam alias explicabo. Quae aut animi iste soluta. Molestiae et a officia. Tenetur omnis laborum et soluta ut rerum sint dolorum. Quo laboriosam nulla consequatur aliquid. Sunt voluptas vero dignissimos quaerat impedit consequatur aut illo. Dolor magni perferendis et ex nostrum maiores. Dolore necessitatibus sint cumque nobis consequatur. Et eos et et delectus nobis consequatur. Quas et iste voluptas molestiae expedita in. Adipisci modi voluptatem occaecati praesentium tenetur earum. Ad maxime ducimus officiis corrupti fugit corrupti aut odit. Earum quia expedita eum quia. Ab voluptas voluptatem doloremque suscipit velit voluptatem ab earum. Harum illum velit consequatur culpa omnis nisi sint. Ut natus dolores sequi ipsum placeat. Magnam dolores id modi minima. Sunt sint dolores eum amet in. Qui omnis et consectetur atque enim sint inventore. Illo accusantium dolorum non omnis itaque nesciunt sed. Qui aliquam velit quo eum. Quis corporis aut consequatur aspernatur optio. Non quo esse corporis consequatur velit.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(19, '28A', 6, 1, 8, 650000, 'Aperiam nam consequatur ducimus aut optio nemo qui. Modi amet omnis aut magnam sit tenetur repellat. Eos odit vel cumque dignissimos deserunt distinctio. Occaecati quia aut expedita et tempore a. Ullam repudiandae officia voluptatem molestias. Voluptatibus ut voluptas quia molestias laborum nemo. Vitae quos architecto veniam. Ipsa qui ipsa exercitationem sed. Eos accusantium ea aperiam earum. Magnam ut autem et corporis. Molestias eum quia nisi dolor iure est iure. Suscipit molestiae nulla asperiores tempora voluptas. Aut dolores incidunt optio sed eos tempora. Ut voluptatibus aperiam nihil reprehenderit hic enim et. Ad qui in dolores eos sunt nihil. Dolor asperiores dolorum molestiae cum. Ea vero commodi molestiae aut explicabo dolor eum. Alias ab voluptatem quas error. Itaque esse accusamus aut quo quia nihil et. Deleniti consequuntur omnis cumque. Occaecati qui velit velit ratione non dicta ad. Natus eos nesciunt exercitationem eligendi qui. Autem vero suscipit dolorem sit veniam consequatur exercitationem. Facilis aliquid est eum voluptas et molestiae. Culpa nihil ut doloremque molestiae in laudantium. Accusantium perspiciatis et iste voluptatibus et autem harum. Ea provident consequatur dignissimos enim. Ullam nemo corporis deleniti sunt ab nulla. Repudiandae magni quo iusto ab doloribus.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(20, '29A', 11, 1, 11, 1750000, 'Sed ab rerum voluptatem quia laboriosam illum. Voluptas numquam rerum dolorem officiis ipsam voluptatem. Voluptas illum adipisci et quis voluptas placeat. Tempore rem eos rem fugiat consequatur. Dolor iure eum ut vel voluptatem. Id provident nisi voluptatibus illum omnis omnis. Quam nisi incidunt et quae aut harum. Nam enim non dolor quibusdam. Suscipit dolorem enim repudiandae animi iure ullam et. Corrupti adipisci soluta et suscipit est qui. Voluptatem placeat impedit ut enim voluptates facere ut. Sit id dignissimos in dolorem est facilis architecto. Harum odio illum sit expedita illum in tempore. Non veniam placeat necessitatibus est fugit. Aut est quibusdam est earum. Amet molestias occaecati maxime commodi ad similique. Est vel corrupti et perferendis. Iste nesciunt exercitationem laboriosam voluptate ut. Qui quidem vel culpa occaecati nemo eveniet. Sit rerum deleniti distinctio molestiae totam. Consequatur vero omnis minima. Sit autem expedita natus quo maxime eius rerum. Repudiandae sed est aspernatur enim sit.', '2022-10-26 03:09:02', '2022-10-26 03:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `room_statuses`
--

CREATE TABLE `room_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `info` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_statuses`
--

INSERT INTO `room_statuses` (`id`, `name`, `code`, `info`, `created_at`, `updated_at`) VALUES
(1, 'Vacant', 'V', 'Sebutan bagi kamar yang kosong.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(2, 'Occupied', 'O', 'Suatu kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(3, 'Occupied Clean', 'OC', 'Suatu kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel pada kamar yang bersih.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(4, 'Occupied Dirty', 'OD', 'Suatu kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel pada kamar yang kotor. Ini terjadi akibat perubahan status dari OC ke OD setelah melewati satu malam stay.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(5, 'Vacant Clean Inspected', 'VCI', 'Kamar kosong yang sudah dibersihkan dan diperiksa oleh floor supervisor dan siap untuk menerima tamu (dijual).', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(6, 'Vacant Clean', 'VC', 'Kamar yang kosong dengan keadaan bersih.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(7, 'Vacant Dirty', 'VD', 'Kamar yang kosong dengan keadaan kotor. kamar kotor dapat terjadi karena tamu yang sudah check out atau program cleaning dari housekeeping.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(8, 'Compliment', 'Comp', 'Kamar yang terigester oleh seorang tamu, namun kamar tersebut free of charge (gratis).', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(9, 'House Use', 'HU', 'Kamar yang teregister tetapi digunakan oleh pihak managemen hotel.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(10, 'Do not Disturb', 'DND', 'Kamar yang menaruh tanda tersebut berarti tamu tidak ingin di ganggu.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(11, 'Sleep Out', 'SO', 'Seorang tamu yang masih teregister, namun kamar tidak dipergunakan karena tamu tesebut harus meninggalkan hotel beberapa hari atau tamu sedang tidur diluar area hotel.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(12, 'Skipper', 'Skip', 'Tamu meninggalkan hotel sebelum melunasi semua kewajibannya .', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(13, 'Out of Service', 'OS', 'Status kamar yang sedang dalam perbaikan.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(14, 'Out of Order', 'OOO', 'Kamar yang memerlukan perbaikan yang serius, biasanya lama perbaikan lebih dari satu hari. Status ini dapat terjadi karena kerusakan di kamar atau progam cleaning dari housekeeping.Out of order mengurangi room availability.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(15, 'Due Out / Expected Departure', 'DO/ED', 'Daftar kamar-kamar yang diharapkan untuk check-out hari ini sesuai dengan tanggal departure.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(16, 'Expected Arrival', 'EA', 'Daftar nama-nama tamu yang diharapkan tiba hari ini.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(17, 'Check Out', 'CO', 'Tamu yang sudah meninggalkan hotel hari ini setelah melunasi semua kewajibannya termasuk menyerahkan kunci yang dipakai ke front office.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(18, 'Late Check Out', 'LCO', 'Permintaan tamu untuk meninggalkan hotel lebih lambat dari waktu check out yang ditentukan.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(19, 'Occupeid no Luggage', 'ONL', 'Seorang tamu yang masih teregister pada suatu kamar tanpa suatu barang apapun di dalamnya.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(20, 'Double Lock', 'DL', 'Permintaan tamu ke pihak hotel untuk melakukan double lock sehingga tidak seorangpun dapat masuk ke kamar tersebut.', '2022-10-26 03:09:02', '2022-10-26 03:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `c_id`, `room_id`, `check_in`, `check_out`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-01-05', '2022-01-07', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(2, 1, 2, '2022-02-01', '2022-02-02', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(3, 1, 2, '2022-02-03', '2022-02-04', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(4, 1, 2, '2022-03-04', '2022-03-05', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(5, 1, 2, '2022-03-06', '2022-03-07', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(6, 1, 2, '2022-04-02', '2022-04-03', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(7, 1, 2, '2022-04-04', '2022-04-05', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(8, 1, 2, '2022-04-06', '2022-04-07', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(9, 1, 2, '2022-05-06', '2022-05-07', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(10, 1, 2, '2022-06-06', '2022-06-07', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(11, 1, 2, '2022-07-06', '2022-07-07', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(12, 1, 2, '2022-08-08', '2022-08-09', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(13, 1, 2, '2022-09-06', '2022-09-08', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(14, 1, 2, '2022-10-06', '2022-10-08', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(15, 1, 2, '2022-11-06', '2022-11-08', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(16, 1, 2, '2022-12-06', '2022-12-08', 'Reservation', '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(17, 3, 1, '2025-02-07', '2025-02-09', 'Reservation', '2025-02-02 13:55:51', '2025-02-02 13:55:51'),
(18, 4, 1, '2025-02-05', '2025-02-06', 'Reservation', '2025-02-02 14:15:59', '2025-02-02 14:15:59'),
(19, 6, 7, '2025-02-20', '2025-02-21', 'Reservation', '2025-02-03 10:32:58', '2025-02-03 10:32:58'),
(20, 5, 1, '2025-02-18', '2025-02-19', 'Reservation', '2025-02-03 10:35:15', '2025-02-03 10:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `info`, `created_at`, `updated_at`) VALUES
(1, 'Standard Room', 'Seperti namanya, jenis kamar standard room adalah tipe kamar hotel yang paling dasar di hotel. Biasanya, kamar tipe ini dibanderol dengan harga yang relatif murah. Fasilitas yang ditawarkan pun standar seperti kasur ukuran king size atau dua queen size. Namun, penawaran yang diberikan tergantung pada masing-masing hotel. Standard room hotel bintang 1 dan bintang 5 tentu berbeda.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(2, 'Superior Room', 'Pada dasarnya, superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room. Perbedaannya dapat berupa dari fasilitas yang diberikan, interior kamar, atau pemandangan dari kamar.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(3, 'Deluxe Room', 'Di atas tipe kamar hotel superior room adalah deluxe room. Kamar ini tentu memiliki kamar yang lebih besar. Tersedia pilihan kasur yang bisa kamu pilih, double bed atau twin bed. Biasanya, dari segi interior kamar ini terkesan lebih mewah.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(4, 'Junior Suite Room', 'Tipe kamar hotel junior suite room ditandai dengan adanya ruang tamu. Namun, ruang tamu tersebut masih berada satu ruangan dengan tempat tidur. Ruang tamu tersebut biasanya dibatasi atau disekat dengan lemari besar agar tempat tidur tidak terlihat. ', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(5, 'Suite Room', 'Suite room berada di atas tipe kamar hotel junior suite room. Ruang tamu di kamar hotel ini terpisah dari kamar tidur. Dari segi fasilitas, tentu berbeda dari junior suite room. Selain ruang tamu, biasanya tipe kamar hotel ini dilengkapi dengan dapur.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(6, 'Presidential Suite', 'Presidential suite adalah tipe kamar hotel yang terbaik dan paling mahal. Bahkan, tidak semua hotel memiliki presidential suite. Fasilitas yang ditawarkan pun tentu yang terbaik, mulai dari interior, pemandangan kamar, dan masih banyak lainnya.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(7, 'Single Room', 'Single room adalah tipe kamar hotel yang paling umum. Tipe kamar hotel ini terdiri dari satu single bed, sofa, dan kamar mandi. Ukuran kamarnya juga tidak terlalu besar. Biasanya tipe kamar hotel ini dipilih oleh para backpacker atau solo traveler karena fasilitasnya memang untuk satu orang dan harga yang murah.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(8, 'Twin Room', 'Dari namanya saja, sudah bisa ditebak bahwa tipe kamar hotel ini memiliki dua tempat tidur ukuran single yang terpisah. Tipe kamar hotel ini cocok digunakan untuk suami istri atau menginap bersama teman dengan jumlah orang 2-3 orang.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(9, 'Double Room', 'Ingin menginap dengan lebih nyaman dan fasilitas yang lebih baik? Kamu bisa memesan tipe kamar hotel double room. Tipe kamar hotel ini biasanya memiliki ukuran kasur yang besar seperti king size. Double room ini cocok banget buat pasangan suami istri yang ingin berbulan madu.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(10, 'Family Room/Triple Room', 'Pergi traveling bersama keluarga besar atau teman-teman? Kamu bisa pilih tipe kamar hotel family room. Dari segi ukuran kamar, tentu jauh lebih luas daripada tipe kamar hotel lainnya. Tipe kamar hotel family room ini biasanya tersedia satu tempat dengan ukuran king size dan satu tempat tidur dengan ukuran yang lebih kecil.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(11, 'Connecting Room', 'Tipe kamar hotel dengan Connecting Room ini cocok untuk kamu yang pergi bersama keluarga besar atau rombongan tetapi ingin memiliki kamar tidur masing-masing.  Kamar kamu dan anggota keluarga lainnya akan bersebelahan dan terdapat pintu yang menghubungkan kamar kalian. Sehingga, kalau kamu atau anggota keluarga lainnya ingin ke kamar satu sama lain, bisa melalui connecting door dan tidak perlu repot melalui pintu depan, Toppers.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(12, 'Murphy Room', 'Murphy room ini adalah tipe kamar hotel yang menyediakan sofa bed di kamar. Sofa bed ini digunakan sebagai tempat tidur pada malam hari dan ruang tamu di siang hari. Besar kamar Murphy Room ini sekitar 20 – 40 m. Wah, seru, ya konsepnya!', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(13, 'Accessible Room/Disabled Room', 'Tipe kamar Accessible Room/Disable Room ini tersedia untuk para tamu yang memiliki keterbatasan. Adanya tipe kamar ini juga diwajibkan oleh hukum, loh, untuk menghindari diskriminasi. Hal ini juga dibuat agar memudahkan tamu-temu tersebut saat menginap di hotel.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(14, 'Smoking/Non Smoking Room', 'Biasanya tamu tidak diizinkan untuk merokok di dalam kamar. Tetapi, banyak hotel yang sudah menyediakan tipe kamar hotel Smoking/Non Smoking Room. Hal ini juga berguna agar tidak mengganggu tamu selanjutnya dengan aroma rokok yang terdapat pada kamar. Jadi, kalau kamu seorang perokok, sekarang bisa memesan kamar dengan tipe smooking room.', '2022-10-26 03:09:02', '2022-10-26 03:09:02'),
(15, 'Cabana Room', 'Kamu ingin langsung berenang saat buka pintu kamar? Atau punya private pool? Pilih tipe kamar hote Cabana Room! Tipe kamar hotel ini memang didesain dengan kolam renang private untuk pemesan kamar tersebut. Luas kamar Cabana Room ini sekitar 30 – 40 m.', '2022-10-26 03:09:02', '2022-10-26 03:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `c_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `c_id`, `username`, `telp`, `card_number`, `email`, `password`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'admin', '851312512', NULL, 'admin@gmail.com', '$2y$10$lDzvQrmz1ZCAhxqpJ4abFuRQPnnpv2rsU/FGMPmAk.eIIWb4w.pSO', 1, NULL, NULL, '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(2, NULL, 2, 'Customer', '851312512', NULL, 'admsin@gmail.com', '$2y$10$iYkuMMkYJhZs8sEL6Ad2P.C8PPArIx1KdXmCMafNCOCCFXG3EWb6S', 0, NULL, NULL, '2025-02-02 13:51:30', '2025-02-02 13:51:30'),
(4, 'user-images/6xzGvQliFPulGn5oZ00RwXzbEvb2uzbKLQbnwInF.jpg', 4, 'andri', '032131311313', NULL, 'prtmandri30@gmail.com', '$2y$10$O6NwOxaRFCxJp2tT/8RlGetB.xiHiw4CRdE2mkwwltETnYwLtpIx2', 0, NULL, NULL, '2025-02-02 14:12:49', '2025-02-02 14:15:21'),
(5, NULL, 5, 'rara', '12313131', '1211111111', 'ajahandrian86@yahoo.co.id', '$2y$10$YcRbL9KzVsgpdjg2NacoTuIWzSzy4NQ/RoE8mgI8QCH9m2T8hHzk2', 0, NULL, NULL, '2025-02-03 10:27:38', '2025-02-03 10:34:48'),
(6, NULL, 6, 'tupai', '032131311313', 'sssss', 'prtmandri0@gmail.com', '$2y$10$IY7K1Dq6sO1BLZNbALHaHe8iUhdpzPa8qYn5/wCzK.F.u9C0nq2S2', 0, NULL, NULL, '2025-02-03 10:29:54', '2025-02-03 10:32:39'),
(7, NULL, 7, 'jihan', NULL, NULL, NULL, '$2y$10$Ry3dxwdAkbGKnT3hVNah0uJHDgWTNv9fkJX026MY8KyRkNeTgg2V2', 0, NULL, NULL, '2025-02-03 18:42:36', '2025-02-03 18:42:36'),
(8, NULL, 8, 'jihann', NULL, NULL, NULL, '$2y$10$6nVNIUgkSNoU7c2EIux.y.YCu8SlwmUmZlav9kSS6mFvWhgv/742i', 0, NULL, NULL, '2025-02-03 18:47:30', '2025-02-03 18:47:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image_rooms`
--
ALTER TABLE `image_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_rooms_room_id_index` (`room_id`);

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
  ADD KEY `payments_c_id_index` (`c_id`),
  ADD KEY `payments_transaction_id_index` (`transaction_id`),
  ADD KEY `payments_payment_method_id_index` (`payment_method_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_type_id_index` (`type_id`),
  ADD KEY `rooms_status_id_index` (`status_id`);

--
-- Indexes for table `room_statuses`
--
ALTER TABLE `room_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_c_id_index` (`c_id`),
  ADD KEY `transactions_room_id_index` (`room_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_c_id_index` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_rooms`
--
ALTER TABLE `image_rooms`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_statuses`
--
ALTER TABLE `room_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_rooms`
--
ALTER TABLE `image_rooms`
  ADD CONSTRAINT `image_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `room_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
