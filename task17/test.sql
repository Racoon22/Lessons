-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

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
(343,	0,	'Алексей',	'Alex@mail.ru',	'+7 999 888 88 88',	5,	2,	'Приора',	'Новая Приора',	'8000 руб.',	0),
(342,	0,	'Владимир',	'Vova@mail.ru',	'+7 999 999 99 99',	2,	2,	'Продам гараж',	'Хороший гараж в цент',	'5000 руб.',	1);

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


-- 2017-05-10 11:32:32
