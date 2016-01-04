-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.11 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table hoctiengnhat.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` text NOT NULL,
  `CONTENT` text,
  `PREVIEW` text,
  `AUTHOR` varchar(50) DEFAULT NULL,
  `CATEGORY` varchar(50) DEFAULT NULL,
  `DATETIME` datetime DEFAULT NULL,
  `THUMB` text,
  `DELETE` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.category
CREATE TABLE IF NOT EXISTS `category` (
  `ID` varchar(50) DEFAULT NULL,
  `CATEGORY` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `PARENT` varchar(50) DEFAULT NULL,
  `DELETE` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.course
CREATE TABLE IF NOT EXISTS `course` (
  `ID` varchar(50) NOT NULL,
  `NAME` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `DESCRIPTION` text CHARACTER SET utf8,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.gram
CREATE TABLE IF NOT EXISTS `gram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `preview` text,
  `course` char(50) DEFAULT NULL,
  `lesson` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.kanji
CREATE TABLE IF NOT EXISTS `kanji` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CHAR` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `AMHV` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `NGHIA` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ON` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `KUN` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `COURSE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.tbl_admin_users
CREATE TABLE IF NOT EXISTS `tbl_admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` enum('SA','A') DEFAULT 'SA' COMMENT 'SA: Super Admin,A: Admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `signup_date` datetime DEFAULT NULL,
  `phone_mobile` varchar(50) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `deleted` enum('Y','N') DEFAULT 'N',
  `user_status` enum('A','B') DEFAULT 'A' COMMENT 'A: Active; B: Blocked',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table hoctiengnhat.volca
CREATE TABLE IF NOT EXISTS `volca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `preview` text,
  `course` char(50) DEFAULT NULL,
  `lesson` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
