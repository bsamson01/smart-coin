-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.25 - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for smart-coin
CREATE DATABASE IF NOT EXISTS `smart-coin` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `smart-coin`;

-- Dumping structure for table smart-coin.banking_details
CREATE TABLE IF NOT EXISTS `banking_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `bank_id` int(10) unsigned NOT NULL DEFAULT '0',
  `account_name` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_banking_details_users` (`user_id`),
  KEY `FK_banking_details_banks` (`bank_id`),
  CONSTRAINT `FK_banking_details_banks` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_banking_details_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.banking_details: ~0 rows (approximately)
DELETE FROM `banking_details`;
/*!40000 ALTER TABLE `banking_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `banking_details` ENABLE KEYS */;

-- Dumping structure for table smart-coin.banks
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.banks: ~4 rows (approximately)
DELETE FROM `banks`;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` (`id`, `name`) VALUES
	(1, 'FNB'),
	(2, 'ABSA'),
	(3, 'Standard Bank'),
	(4, 'Capitec'),
	(5, 'Time Bank');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;

-- Dumping structure for table smart-coin.coins_on_auction
CREATE TABLE IF NOT EXISTS `coins_on_auction` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `amount` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users` (`user_id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.coins_on_auction: ~0 rows (approximately)
DELETE FROM `coins_on_auction`;
/*!40000 ALTER TABLE `coins_on_auction` DISABLE KEYS */;
INSERT INTO `coins_on_auction` (`id`, `user_id`, `amount`, `created`, `modified`) VALUES
	(1, 4, 2900, '2020-08-22 16:32:00', '2020-08-22 16:32:02');
/*!40000 ALTER TABLE `coins_on_auction` ENABLE KEYS */;

-- Dumping structure for table smart-coin.coins_on_hand
CREATE TABLE IF NOT EXISTS `coins_on_hand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `amount` int(10) unsigned NOT NULL DEFAULT '0',
  `waiting_period` int(11) DEFAULT NULL,
  `sell_amount` int(11) DEFAULT '0',
  `sell_date` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modfied` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users_id` (`user_id`),
  CONSTRAINT `FK__users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.coins_on_hand: ~0 rows (approximately)
DELETE FROM `coins_on_hand`;
/*!40000 ALTER TABLE `coins_on_hand` DISABLE KEYS */;
INSERT INTO `coins_on_hand` (`id`, `user_id`, `amount`, `waiting_period`, `sell_amount`, `sell_date`, `created`, `modfied`) VALUES
	(1, 4, 200, 3, 300, '2020-08-25 17:32:35', '2020-08-22 16:32:45', '2020-08-22 16:32:47');
/*!40000 ALTER TABLE `coins_on_hand` ENABLE KEYS */;

-- Dumping structure for table smart-coin.i18n
CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  KEY `I18N_FIELD` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.i18n: ~0 rows (approximately)
DELETE FROM `i18n`;
/*!40000 ALTER TABLE `i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `i18n` ENABLE KEYS */;

-- Dumping structure for table smart-coin.pending_payments
CREATE TABLE IF NOT EXISTS `pending_payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seller` int(11) unsigned NOT NULL DEFAULT '0',
  `buyer` int(11) unsigned NOT NULL DEFAULT '0',
  `amount` int(10) unsigned NOT NULL DEFAULT '0',
  `paid` tinyint(1) DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.pending_payments: ~0 rows (approximately)
DELETE FROM `pending_payments`;
/*!40000 ALTER TABLE `pending_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `pending_payments` ENABLE KEYS */;

-- Dumping structure for table smart-coin.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.roles: ~2 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'admin'),
	(2, 'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table smart-coin.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` char(40) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data` blob,
  `expires` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smart-coin.sessions: ~0 rows (approximately)
DELETE FROM `sessions`;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table smart-coin.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) unsigned NOT NULL DEFAULT '0',
  `seller_id` int(11) unsigned NOT NULL DEFAULT '0',
  `amount` int(10) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.transactions: ~2 rows (approximately)
DELETE FROM `transactions`;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `buyer_id`, `seller_id`, `amount`, `created`, `modified`) VALUES
	(1, 4, 6, 2000, '2020-08-22 15:48:58', '2020-08-22 15:48:58'),
	(2, 5, 4, 300, '2020-08-22 15:49:52', '2020-08-22 15:49:52'),
	(3, 4, 5, 3499, '2020-08-22 15:50:13', '2020-08-22 15:50:13');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table smart-coin.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL DEFAULT '2',
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` longtext,
  `token` longtext,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_roles` (`role_id`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table smart-coin.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `first_name`, `last_name`, `phone`, `password`, `token`, `created`, `modified`) VALUES
	(4, 2, 'Brandon', 'test@gmail.com', 'Brandon', 'Samson', '0773912680', '$2y$10$XzeC2jIgPeIzAvepzo33je9He9FeCxMPP46ZII1Irf/G//O2zirSe', NULL, '2020-08-22 10:19:22', '2020-08-22 10:19:22'),
	(5, 2, 'testuser', 'teing@gmail.com', 'jfldsbgkjjlk', 'klgkej;glk', NULL, NULL, NULL, '2020-08-22 15:31:38', '2020-08-22 15:31:38'),
	(6, 2, 'ndsGNKLFDH', 'NFEKLRAMLK@HHHH.COM', 'FJKNKJGL', 'KJENGLKJ', NULL, NULL, NULL, '2020-08-22 15:31:54', '2020-08-22 15:31:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
