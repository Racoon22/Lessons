-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `type` enum('частное лицо','компания') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ad` (`id`, `name`, `desc`, `type`) VALUES
(1,	'awd',	'awd',	'частное лицо'),
(2,	'EFSF',	'SEFSFSEF',	'частное лицо');

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `private` tinyint(4) DEFAULT '0',
  `seller_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `sity_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `allow_mails` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ads` (`id`, `private`, `seller_name`, `email`, `phone`, `sity_id`, `category_id`, `title`, `description`, `price`, `allow_mails`) VALUES
(336,	0,	'',	'',	'',	1,	1,	'dawdadw',	'',	'',	0),
(337,	0,	'',	'',	'',	1,	1,	'adawdawd',	'',	'',	1);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `category_name`) VALUES
(1,	'--Выбор категории--'),
(2,	'Транспорт'),
(3,	'Недвижимость'),
(4,	'Услуги'),
(5,	'Личные вещи'),
(6,	'Для дома и дачи'),
(7,	'Бытовая электроника'),
(8,	'Хобби и отдых');

DROP TABLE IF EXISTS `private`;
CREATE TABLE `private` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `private` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `private` (`id`, `private`) VALUES
(1,	'Частное лицо'),
(2,	'Комапания');

DROP TABLE IF EXISTS `sity`;
CREATE TABLE `sity` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sity_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sity` (`id`, `sity_name`) VALUES
(1,	'--Выбор города--'),
(2,	'Новосибирск'),
(3,	'Барабинск'),
(4,	'Бердск'),
(5,	'Искитим');

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2017-04-24 16:27:54
