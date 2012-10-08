# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.27)
# Datenbank: mnemonic
# Erstellungsdauer: 2012-08-27 12:35:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;

INSERT INTO `accounts` (`id`, `name`, `disabled`)
VALUES
	(1,'ING DiBa',0),
	(2,'Sparkasse',0),
	(3,'Commerz Finanz',0),
	(4,'ING DiBa Extrakonto',0),
	(5,'Miete',0),
	(6,'Strom',0),
	(7,'Telekom',0),
	(8,'GEZ',0),
	(9,'Kabel Deutschland',0),
	(10,'Sky',0),
	(11,'Autoversicherung',0),
	(12,'Sprit',0),
	(13,'Autosteuer',0),
	(14,'Autowartung',0),
	(15,'BVG',0),
	(16,'Handy',0),
	(17,'Versicherung Hausrat',0),
	(18,'Versicherung Haftpflicht',0),
	(19,'Altersvorsorge',0),
	(20,'BMW Bank',0),
	(21,'TV Commerz Finanz',0),
	(22,'iMac CreditPlus',0),
	(23,'Mittagessen Arbeit',0),
	(24,'Geldbörse',0),
	(25,'Rebuy',0);

/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `from_account_id` int(11) unsigned NOT NULL,
  `to_account_id` int(11) unsigned NOT NULL,
  `amount` int(11) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle periods
# ------------------------------------------------------------

DROP TABLE IF EXISTS `periods`;

CREATE TABLE `periods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `day` int(2) unsigned NOT NULL DEFAULT '0',
  `month` int(2) unsigned NOT NULL DEFAULT '0',
  `year` int(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `periods` WRITE;
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;

INSERT INTO `periods` (`id`, `description`, `day`, `month`, `year`)
VALUES
	(1,'täglich',1,0,0),
	(2,'wöchentlich',7,0,0),
	(3,'monatlich',0,1,0),
	(4,'quartal',0,3,0),
	(5,'jährlich',0,0,1),
	(6,'halbjährlich',0,6,0);

/*!40000 ALTER TABLE `periods` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle recurring_bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recurring_bookings`;

CREATE TABLE `recurring_bookings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `from_account_id` int(11) unsigned NOT NULL,
  `to_account_id` int(11) unsigned NOT NULL,
  `amount` int(11) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `period` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `recurring_bookings` WRITE;
/*!40000 ALTER TABLE `recurring_bookings` DISABLE KEYS */;

INSERT INTO `recurring_bookings` (`id`, `description`, `from_account_id`, `to_account_id`, `amount`, `created`, `start`, `end`, `period`)
VALUES
	(1,'Gehalt',25,1,238000,'2012-08-27 12:28:37','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(2,'Miete',1,5,400,'2012-08-27 12:29:25','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(3,'Strom',1,6,8500,'2012-08-27 12:29:37','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(4,'Telekom',1,7,7000,'2012-08-27 12:30:09','2012-09-15 00:00:00','2020-08-31 00:00:00',3),
	(5,'GEZ',2,8,5600,'2012-08-27 12:31:24','2012-11-15 00:00:00','2020-08-31 00:00:00',4),
	(6,'Kabel Deutschland',1,9,1600,'2012-08-27 12:32:07','2012-09-30 00:00:00','2020-08-31 00:00:00',3),
	(7,'Sky',1,10,3600,'2012-08-27 12:32:28','2012-09-05 00:00:00','2020-08-31 00:00:00',3),
	(8,'Autoversicherung',1,11,21000,'2012-08-27 12:33:14','2012-10-01 00:00:00','2020-08-31 00:00:00',4),
	(9,'Autosteuer',1,13,10000,'2012-08-27 12:34:09','2013-01-01 00:00:00','2020-08-31 00:00:00',5),
	(10,'BVG',2,15,5600,'2012-08-27 12:35:03','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(11,'Handy',1,16,400,'2012-08-27 12:35:40','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(12,'Hausrat',2,17,850,'2012-08-27 12:36:20','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(13,'Haftpflicht',2,18,8000,'2012-08-27 12:36:50','2013-06-01 00:00:00','2020-08-31 00:00:00',5),
	(14,'Altersvorsorge',1,19,10000,'2012-08-27 12:37:31','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(15,'Commerz Finanz',1,3,9000,'2012-08-27 12:38:00','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(16,'TV Commerz Finanz',1,21,13600,'2012-08-27 12:38:24','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(17,'BMW Bank',1,20,23200,'2012-08-27 12:38:44','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(18,'iMac CreditPlus',1,22,9500,'2012-08-27 12:39:09','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(19,'Mittagessen Arbeit',1,23,7000,'2012-08-27 12:39:49','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(20,'Sprit',1,24,15000,'2012-08-27 12:40:28','2012-09-01 00:00:00','2020-08-31 00:00:00',3),
	(21,'Wochenbudget',1,24,7500,'2012-08-27 12:41:28','2012-08-30 00:00:00','2020-08-31 00:00:00',2),
	(22,'Reifen',1,14,6000,'2012-08-27 12:43:03','2012-11-01 00:00:00','2020-10-30 00:00:00',6),
	(23,'Sparen',1,2,15000,'2012-08-27 12:44:17','2012-09-01 00:00:00','2020-08-31 00:00:00',3);

/*!40000 ALTER TABLE `recurring_bookings` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
