-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping database structure for eldief
DROP DATABASE IF EXISTS `eldief`;
CREATE DATABASE IF NOT EXISTS `eldief` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eldief`;

-- Dumping structure for table eldief.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping structure for table eldief.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping structure for table eldief.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(49) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eldief.categories: ~6 rows (approximately)
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Dompet'),
	(2, 'Kunci'),
	(3, 'HP'),
	(5, 'Buku'),
	(6, 'Cas'),
	(9, 'Pulpen');

-- Dumping structure for table eldief.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(21) DEFAULT NULL,
  `name` varchar(49) DEFAULT NULL,
  `display_name` varchar(51) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(21) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eldief.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `nim`, `name`, `display_name`, `password`, `phone`, `role`, `created_at`, `update_at`) VALUES
	(1, 'F1G124021', 'Yus Askia', 'im.askaa', '$2y$12$qFabQj87/Ls.h67ukjt6VeL4FNC4wp8uNRT0X8OlnvfVce2BwTQb6', '081049518786', 'admin', '2025-12-12 17:00:43', '2025-12-12 17:00:43'),
	(2, 'F1G124051', 'St.Rahmy', 'weartvile', '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq', '085005061106', 'user', '2025-12-12 17:07:09', '2025-12-12 17:07:09'),
	(3, 'F1G124004', 'AZIZA', '14.07za', '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq', '080414170602', 'user', '2025-12-13 16:38:51', '2025-12-13 16:38:51'),
	(4, 'F1G124019', 'Wa Rahmawati', 'serbyraa_', '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq', '082275129009', 'user', '2025-12-13 16:38:51', '2025-12-13 16:38:51'),
	(5, 'F1G124043', 'Nayla Safira Audrya Putri', 'sinahellla', '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq', '081122609913', 'user', '2025-12-13 16:38:51', '2025-12-13 16:38:51');

-- Dumping structure for table eldief.locations
DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(49) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eldief.locations: ~9 rows (approximately)
INSERT INTO `locations` (`id`, `name`) VALUES
	(4, 'Perpustakaan'),
	(5, 'Gazebo'),
	(6, 'Musholla'),
	(7, 'Ruang Kelas'),
	(8, 'WC Gedung A'),
	(9, 'Lab Basis Data'),
	(10, 'Lab UTI'),
	(11, 'Taman'),
	(12, 'Parkiran Belakang');

-- Dumping structure for table eldief.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `location_id` int DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `status` enum('lost','found','returned') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `items_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `items_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eldief.items: ~3 rows (approximately)
INSERT INTO `items` (`id`, `user_id`, `category_id`, `location_id`, `title`, `description`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
	(8, 4, 3, 8, 'HP Samsung', 'Ditemukan HP samsung di WC Putri Gedung A FMIPA, bagi yang merasa kehilangan silahkan hubungi nomor di bawah', 'items/ux1icIPozQyNOL9DGRSa5lJYku6B2nNO85f4izm7.jpg', 'found', '2025-12-17 00:44:11', '2025-12-17 00:44:11'),
	(10, 4, 2, 6, 'Kunci', 'Saya kehilangan kunci kos saya, lokasi terakhir di sekitaran mushola, bagi yang menemukannya bisa menghubungi nomor di bawah', 'items/S7RSHawi9fTA17UHUxjuTqzeyqIRUNH8R0JxCZoy.jpg', 'lost', '2025-12-17 01:29:43', '2025-12-17 01:29:43'),
	(14, 2, 5, 5, 'Buku', 'Saya menemukan buku ini di gazebo belakang gedung A FMIPA, bagi yang merasa kehilangan mohon hubungi nomor di bawah', 'items/iEuILaLKy9JBZUl9qQRWg1cuJLL3piCopN1dWn5F.jpg', 'found', '2025-12-17 01:53:39', '2025-12-17 01:53:39');

-- Dumping structure for table eldief.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping structure for table eldief.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eldief.migrations: ~3 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_06_27_044432_create_cache_table', 1),
	(2, '2026_06_27_044440_create_sessions_table', 1),
	(3, '2026_06_27_044448_create_jobs_table', 1);

-- Dumping structure for table eldief.reports
DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `report_type` enum('appove','reject','close') DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping structure for table eldief.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
