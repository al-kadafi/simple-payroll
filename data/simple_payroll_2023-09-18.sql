# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.27-MariaDB)
# Database: simple_payroll
# Generation Time: 2023-09-18 12:07:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attendances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attendances`;

CREATE TABLE `attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned NOT NULL,
  `start_time` time NOT NULL DEFAULT '07:30:00',
  `end_time` time NOT NULL DEFAULT '16:30:00',
  `date` date NOT NULL,
  `type` enum('attend','leave') NOT NULL DEFAULT 'attend',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_employee_id_foreign` (`employee_id`),
  CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;

INSERT INTO `attendances` (`id`, `employee_id`, `start_time`, `end_time`, `date`, `type`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,1,'07:30:00','16:30:00','2023-09-14','attend',NULL,'2023-09-18 12:05:10','2023-09-18 12:05:10'),
	(2,2,'07:30:00','16:30:00','2023-09-06','leave',NULL,'2023-09-18 12:05:18','2023-09-18 12:05:18'),
	(3,1,'07:30:00','16:30:00','2023-09-05','attend',NULL,'2023-09-18 12:05:29','2023-09-18 12:05:29');

/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `position` enum('staff','lead','supervisor','manager','director') NOT NULL,
  `status` enum('permanent','contract','freelance') NOT NULL,
  `insurance` tinyint(1) NOT NULL DEFAULT 1,
  `join_date` date NOT NULL,
  `basic_salary` bigint(20) NOT NULL,
  `allowance` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` (`id`, `name`, `email`, `birth_place`, `birth_date`, `gender`, `position`, `status`, `insurance`, `join_date`, `basic_salary`, `allowance`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'Brian Baker','brian@email.com','Surabaya','1990-10-02','male','staff','permanent',1,'2023-08-20',5000000,2000000,NULL,'2023-09-18 11:48:54','2023-09-18 11:48:54'),
	(2,'Mona Lott','mona@email.com','Gresik','1992-10-02','female','lead','contract',1,'2022-01-20',8000000,1000000,NULL,'2023-09-18 11:48:54','2023-09-18 11:48:54'),
	(3,'Ivana Tinkle','ivana@email.com','Sidoarjo','1990-10-02','male','staff','freelance',0,'2020-01-20',4000000,1000000,NULL,'2023-09-18 11:48:54','2023-09-18 11:48:54'),
	(4,'Baker John','john@email.com','Surabaya','1990-10-02','male','staff','permanent',1,'2023-01-20',5000000,1000000,NULL,'2023-09-18 11:48:54','2023-09-18 11:48:54'),
	(5,'Anita Bath','bath@email.com','Surabaya','1990-10-02','female','supervisor','permanent',0,'2021-01-20',8000000,2000000,NULL,'2023-09-18 11:48:54','2023-09-18 11:48:54'),
	(6,'Eileen Dover','dover@email.com','Jakarta','1990-10-02','male','manager','permanent',1,'2017-01-20',10000000,3000000,NULL,'2023-09-18 11:48:54','2023-09-18 11:48:54'),
	(7,'Ann Chovey','ann@email.com','Jakarta','1990-10-02','male','director','permanent',0,'2018-01-20',15000000,1000000,NULL,'2023-09-18 11:48:54','2023-09-18 11:48:54');

/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(49,'2014_10_12_000000_create_users_table',1),
	(50,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(51,'2023_09_13_041806_create_employee_table',1),
	(52,'2023_09_14_023835_create_attendances_table',1),
	(53,'2023_09_14_023938_create_overtimes_table',1),
	(54,'2023_09_16_110927_create_slips_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table overtimes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `overtimes`;

CREATE TABLE `overtimes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `reason` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `overtimes_employee_id_foreign` (`employee_id`),
  CONSTRAINT `overtimes_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `overtimes` WRITE;
/*!40000 ALTER TABLE `overtimes` DISABLE KEYS */;

INSERT INTO `overtimes` (`id`, `employee_id`, `start_time`, `end_time`, `reason`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,1,'2023-09-13 20:00:00','2023-09-13 23:00:00','Belum selesai kerja',NULL,'2023-09-18 12:04:21','2023-09-18 12:04:21'),
	(2,2,'2023-09-12 21:00:00','2023-09-13 01:00:00','Bug fix',NULL,'2023-09-18 12:04:47','2023-09-18 12:04:47');

/*!40000 ALTER TABLE `overtimes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table slips
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slips`;

CREATE TABLE `slips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned NOT NULL,
  `month_period` date NOT NULL,
  `status` enum('approved','rejected','draft') NOT NULL DEFAULT 'draft',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slips_employee_id_foreign` (`employee_id`),
  CONSTRAINT `slips_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `slips` WRITE;
/*!40000 ALTER TABLE `slips` DISABLE KEYS */;

INSERT INTO `slips` (`id`, `employee_id`, `month_period`, `status`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,1,'2023-09-30','approved',NULL,'2023-09-18 12:03:46','2023-09-18 12:07:10'),
	(2,2,'2023-09-30','draft',NULL,'2023-09-18 12:03:46','2023-09-18 12:03:46'),
	(3,3,'2023-09-30','approved',NULL,'2023-09-18 12:03:46','2023-09-18 12:07:32'),
	(4,4,'2023-09-30','draft',NULL,'2023-09-18 12:03:46','2023-09-18 12:03:46'),
	(5,5,'2023-09-30','draft',NULL,'2023-09-18 12:03:46','2023-09-18 12:03:46'),
	(6,6,'2023-09-30','draft',NULL,'2023-09-18 12:03:46','2023-09-18 12:03:46'),
	(7,7,'2023-09-30','rejected',NULL,'2023-09-18 12:03:46','2023-09-18 12:07:22');

/*!40000 ALTER TABLE `slips` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('staff','supervisor') NOT NULL DEFAULT 'staff',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Fulan','fulan@email.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','supervisor','nb02lOJHl0',NULL,NULL),
	(2,'Fulanah','fulanah@email.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','staff','mQ3U9zxT00PaACoZSfWspu8qLjsRoGTKQg1woMtWTEAoZwGbEHIBN4AfpjgJ',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
