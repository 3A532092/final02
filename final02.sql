-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cs_id` int(10) unsigned NOT NULL,
  `gc_id` int(10) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `qy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_cs_id_foreign` (`cs_id`),
  KEY `carts_gc_id_foreign` (`gc_id`),
  CONSTRAINT `carts_cs_id_foreign` FOREIGN KEY (`cs_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carts_gc_id_foreign` FOREIGN KEY (`gc_id`) REFERENCES `graphiccard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `graphiccard`;
CREATE TABLE `graphiccard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constructor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `chipset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gcp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `6/8pin` tinyint(1) NOT NULL,
  `dx11f` int(11) NOT NULL,
  `dx12t` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `graphiccard` (`id`, `gc_id`, `gc_name`, `constructor`, `price`, `chipset`, `size`, `gcp`, `6/8pin`, `dx11f`, `dx12t`, `created_at`, `updated_at`) VALUES
(1,	'G001',	'Nvidia Geforce GTX 1050 Ti',	'Nvidia',	5000,	'Pascal',	'4.38\" x 5.7\" （2-slot）',	'75W',	0,	6623,	2462,	NULL,	NULL),
(2,	'G002',	'Nvidia Geforce GTX 1060 ',	'Nvidia',	8000,	'Pascal',	'4.376\" x 9.823\" （2-slot）',	'120W',	1,	10955,	4318,	NULL,	NULL),
(3,	'G003',	'Nvidia Geforce GTX 1070 Ti',	'Nvidia',	12000,	'Pascal',	'4.376\" x 10.5\" （2-slot）',	'180W',	1,	15877,	6248,	NULL,	NULL),
(4,	'G004',	'Nvidia Geforce GTX 1080 Ti',	'Nvidia',	30000,	'Pascal',	'4.376\" x 10.5\" （2-slot）',	'250W',	1,	20787,	6902,	NULL,	NULL),
(5,	'A001',	'AMD Radeon RX 560',	'AMD',	6666,	'Polaris',	'4.45\" x 6\" （2-slot）',	'80W',	0,	6395,	3256,	NULL,	'2018-12-25 08:25:15'),
(6,	'A002',	'AMD Radeon RX 570',	'AMD',	6000,	'Polaris',	'4.92\" x 9\" （2-slot）',	'180W',	1,	9130,	2343,	NULL,	NULL),
(7,	'A003',	'AMD Radeon RX 580',	'AMD',	8000,	'Polaris',	'4.92\" x 9\" （2-slot）',	'225W',	1,	11588,	3086,	NULL,	NULL),
(8,	'A004',	'AMD Radeon RX 590',	'AMD',	9999,	'Polaris',	'5.314\" x 10.23\" （2-slot）',	'250W',	0,	14165,	5263,	NULL,	'2018-12-25 08:27:07');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35,	'2014_10_12_000000_create_users_table',	1),
(36,	'2014_10_12_100000_create_password_resets_table',	1),
(37,	'2018_12_17_143951_create_graphiccard_table',	1),
(38,	'2018_12_17_144056_create_orders_table',	1),
(39,	'2018_12_17_144124_create_orderdetails_table',	1),
(40,	'2019_01_12_142038_create_carts_table',	1);

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE `orderdetails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `od_id` int(10) unsigned NOT NULL,
  `gc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `de_qy` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orderdetails_od_id_foreign` (`od_id`),
  CONSTRAINT `orderdetails_od_id_foreign` FOREIGN KEY (`od_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orderdetails` (`id`, `od_id`, `gc_id`, `de_qy`, `sum`, `created_at`, `updated_at`) VALUES
(1,	7,	'G003',	3,	0,	NULL,	NULL),
(2,	7,	'G002',	3,	0,	NULL,	NULL),
(3,	7,	'A002',	1,	0,	NULL,	NULL),
(4,	8,	'G001',	6,	30000,	NULL,	NULL),
(6,	8,	'A002',	5,	30000,	NULL,	NULL),
(7,	9,	'G002',	5,	40000,	NULL,	NULL),
(11,	11,	'G002',	5,	40000,	NULL,	NULL),
(12,	12,	'G002',	4,	32000,	NULL,	NULL),
(13,	12,	'A003',	4,	32000,	NULL,	NULL),
(15,	13,	'G003',	6,	72000,	NULL,	NULL),
(16,	13,	'G004',	2,	60000,	NULL,	NULL),
(17,	13,	'A002',	5,	30000,	NULL,	NULL),
(18,	13,	'G001',	4,	20000,	NULL,	NULL);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cs_id` int(10) unsigned NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `od_st` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_cs_id_foreign` (`cs_id`),
  CONSTRAINT `orders_cs_id_foreign` FOREIGN KEY (`cs_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `cs_id`, `total`, `od_st`, `created_at`, `updated_at`) VALUES
(1,	3,	'16000',	0,	NULL,	NULL),
(2,	3,	'24000',	0,	NULL,	NULL),
(3,	3,	'16000',	0,	NULL,	NULL),
(4,	3,	'24000',	0,	NULL,	NULL),
(5,	3,	'0',	0,	NULL,	NULL),
(6,	3,	'24000',	0,	NULL,	NULL),
(7,	3,	'36000',	0,	NULL,	NULL),
(8,	2,	'60000',	0,	NULL,	NULL),
(9,	2,	'40000',	0,	NULL,	NULL),
(11,	2,	'40000',	1,	NULL,	NULL),
(12,	2,	'64000',	0,	NULL,	NULL),
(13,	2,	'182000',	1,	NULL,	NULL);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cs_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cs_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cs_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `cs_name`, `cs_telephone`, `cs_address`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'3A532092',	'123@gmail.com',	NULL,	'$2y$10$jnLBSRaQ1cp8gArOetpPW.cgUj7bRv0GevNYxTMXSRMWOlpRsKlt.',	'陳冠宇',	'0929629955',	'臺中市太平區中山路二段57號',	1,	'UyETOo4Ujsv7XHZmq5IaDethLdXIO2b8D1oFJWnv66P1our53tN4in2jKjWo',	'2018-12-25 08:26:34',	'2018-12-25 08:26:34'),
(2,	'3A532092',	'963@gmail.com',	NULL,	'$2y$10$4sO.UXiAasFVXT2waUfhD.YqHfmIuh.g1HUCWK98cDPu4oo1W94q2',	'高偉瀚',	'0977777777',	'臺中市太平區中山路二段57號',	0,	'BPJX846C7w73kU9UVmc2TkHNievs9xkVcBXlKjAn4SV9p8YGhLKfJxukVFVM',	'2019-01-01 17:52:41',	'2019-01-01 17:52:41'),
(3,	'3A532089',	'852@gmail.com',	NULL,	'$2y$10$p0EN9EKYIC3mCfJpvUum3.qTQ00t/jIoGIJUkQFEdlF270frG6e7u',	'高偉瀚',	'0912345678',	'台中市太平區中山路二段57號',	0,	'TBsyIEJhrGWwOdWNoteYKNopd709caagKdYKVz9e3ZjEIqcQ1fAzRUyXFsrK',	'2019-01-03 05:14:40',	'2019-01-03 05:14:40'),
(4,	'123',	'star1998410@gmail.com',	NULL,	'$2y$10$TaUFcpikjf0y.gG.nKAeFuZlW0ruHASJyFQOHJV748oYCw4ckTQXe',	'963',	'0988888888',	'963355123',	0,	'UkybVj3aN8sqRCxEUsLx6AXfLwSDoKI3Y7s7bbMERjTsfud4fMNktzyiywuI',	'2019-01-08 22:42:27',	'2019-01-08 22:42:27'),
(5,	'ZAQ',	'likebestupid@gmail.com',	NULL,	'$2y$10$Zv7L13k0.nhWTPnVBU.Gz.l/2JoMwdopal3dafKtjzEWgV/HDnRfW',	'曾郁閔',	'0919690727',	'台中市北屯區環太東路625號3樓之2',	0,	'HMUtQ0aj8uvbWGBROfDm18z9Bo7h52Dz6nBBckfR9f73JmpNcNC0jbODI2RD',	'2019-01-15 12:00:43',	'2019-01-15 12:00:43');

-- 2019-01-16 02:07:34
