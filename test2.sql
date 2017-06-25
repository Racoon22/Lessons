-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2017 г., 10:27
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `type` enum('частное лицо','компания') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ad`
--

INSERT INTO `ad` (`id`, `name`, `desc`, `type`) VALUES
(1, 'awd', 'awd', 'частное лицо'),
(2, 'EFSF', 'SEFSFSEF', 'частное лицо');

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `private` tinyint(4) DEFAULT '0',
  `seller_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `sity_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `allow_mails` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `private`, `seller_name`, `email`, `phone`, `sity_id`, `category_id`, `title`, `description`, `price`, `allow_mails`) VALUES
(131, 1, 'Татьяна', 'tanupha@mail.ru', '9529140425', 2, 5, 'Платье КРАСИВОЕ', 'Желтое платье, разме', '1000', 1),
(183, 2, 'фцвф', 'фцвфв', 'фцвцфв', 1, 1, 'фцвв', 'фцвфцв', 'фцвфцв', 1),
(184, 2, 'фцвф', 'фцвфв', 'фцвцфв', 1, 1, 'фцвв', 'фцвфцв', 'фцвфцв', 1),
(213, 1, 'awdad', 'awdawd', 'awdad', 1, 1, 'awdawdawd', '', '98448468', 1),
(210, 0, '', '', '', 1, 1, 'awdawdawdawd', '', '', 0),
(211, 1, '23424', '23424', '23424', 5, 7, '23424', '23424', '23424', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, '--Выбор категории--'),
(2, 'Транспорт'),
(3, 'Недвижимость'),
(4, 'Услуги'),
(5, 'Личные вещи'),
(6, 'Для дома и дачи'),
(7, 'Бытовая электроника'),
(8, 'Хобби и отдых');

-- --------------------------------------------------------

--
-- Структура таблицы `private`
--

CREATE TABLE `private` (
  `id` int(1) NOT NULL,
  `private` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `private`
--

INSERT INTO `private` (`id`, `private`) VALUES
(1, 'Частное лицо'),
(2, 'Комапания');

-- --------------------------------------------------------

--
-- Структура таблицы `sity`
--

CREATE TABLE `sity` (
  `id` int(2) NOT NULL,
  `sity_name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sity`
--

INSERT INTO `sity` (`id`, `sity_name`) VALUES
(1, '--Выбор города--'),
(2, 'Новосибирск'),
(3, 'Барабинск'),
(4, 'Бердск'),
(5, 'Искитим'),
(6, 'Междуреченск');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `private`
--
ALTER TABLE `private`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sity`
--
ALTER TABLE `sity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `private`
--
ALTER TABLE `private`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `sity`
--
ALTER TABLE `sity`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
