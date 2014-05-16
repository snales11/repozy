-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 14 2014 г., 16:27
-- Версия сервера: 5.5.24-log
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'игры'),
(2, 'программы');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(100) NOT NULL,
  `idprod` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `product`, `idprod`, `price`, `name`, `fname`, `email`, `date`, `time`) VALUES
(1, 'Kaspery', 3, '76.00', '113312', '12312', '23432424@', '2014-05-11', '14:35:51'),
(2, 'Kaspery', 3, '76.00', '2342234', '234223', '3355@', '2014-05-11', '14:35:59'),
(3, 'World of Warcraft', 4, '99.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-12', '15:22:03'),
(4, 'Kaspery', 3, '76.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-12', '15:22:03'),
(5, 'Eset NOD 32 ', 2, '79.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-12', '15:22:03'),
(6, 'Starcraft II', 1, '89.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-12', '15:22:03'),
(7, 'Kaspery', 3, '76.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-13', '12:00:53'),
(8, 'Eset NOD 32 ', 2, '79.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-13', '12:00:53'),
(9, 'Kaspery', 3, '76.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-13', '12:01:34'),
(10, 'Eset NOD 32 ', 2, '79.00', 'Владимир', 'Чемерилов', 'snales11@mail.ru', '2014-05-13', '12:01:34'),
(11, 'World of Warcraft', 4, '99.00', 'demo', 'demonstration', 'demo@example.com', '2014-05-14', '12:28:59'),
(12, 'Starcraft II', 1, '89.00', 'demo', 'demonstration', 'demo@example.com', '2014-05-14', '12:28:59');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `image` varchar(100) NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `title`, `description`, `price`, `image`, `cat`) VALUES
(1, 'Starcraft II', 'В Heart of the Swarm получает продолжение сюжетная линия "StarCraft II: Wings of Liberty". Сара Керриган решила возродить Рой и отомстить Арктуру Менгску. На протяжении сюжетной кампании игрокам предстоит следовать за Керриган через всю галактику в поисках необычных разновидностей зергов, которые могут пополнить ее войско. \r\nНе обойдется без нововведений и многопользовательский режим - визитная карточка серии StarCraft. Многочисленные улучшения призваны сделать игру еще ярче и интереснее. \r\n<br><br>\r\nОсобенности игры:\r\nНовая сюжетная компания "StarCraft II: Heard of the Swarm", состоящая из 20 миссий, полностью посвящена зергам. Вас ждет продолжение истории Сары Керриган и рассказ о том, как владычица Роя - могущественная Королева Клинков - отправится в крестовый поход по галактике, главной целью которого станет месть Арктуру Менгску.\r\nС каждой новой миссией могущество Керриган будет расти, а игроки смогут выбирать для нее новые способности.\r\nВ многопользовательском режиме Heart of the Swarm появятся новые боевые единицы - "Геллитроны" терранов, роевики зергов и "Ураганы" протоссов. Существующим боевым единицам будут добавлены новые возможности.\r\nВ игре появится ряд новых опций: система кланов и групп; нерейтинговые поединки; "Международный доступ", чтобы играть с пользователями из любого региона; расширенное меню статистики; улучшенный пользовательский интерфейс; более совершенное воспроизведение физических реалий боя; возможность смотреть сетевые поединки в записи вместе с друзьями; система уровней, позволяющая получать дополнительные награды. ', '89', '2.jpg', 1),
(2, 'Eset NOD 32 ', 'Security', '79', '3.jpg', 2),
(3, 'Kaspery', 'Kaspery one', '76', '4.jpg', 2),
(4, 'World of Warcraft', 'Возвращение короля Лича', '99', '1.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'dee1', 'Administrator'),
(2, 'demonstration', 'demo1'),
(6, 'sdfsdfsdff', 'asfxdf'),
(7, 'Чемерилов', 'Владимир'),
(8, 'sdgdf', 'sdg'),
(10, 'sdgsdg', 'sdfgsg'),
(11, 'gosha', 'sergey'),
(12, 'ывдолыв', 'ываджвыла'),
(13, 'sdf', 'sdf');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'snales11@mail.ru', '9a24eff8c15a6a141ece27eb6947da0f', '2014-04-11 00:57:38', '2014-05-14 04:04:21', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2014-04-11 00:57:38', '2014-05-14 07:56:14', 0, 1),
(6, 'sdf', 'e2c430ab4cdd2c7861bab9e734201fc5', 'ae@qmail.com', '65c30bf86bbe58173f262ae1b392c0d2', '2014-04-13 04:09:41', '0000-00-00 00:00:00', 0, 0),
(7, 'Vladimir', 'adfb9f7fc3bce7ee6583ff0feb050230', 'vladimirslslsl@gmail.com', 'fa88586160b2620cd0e57dca61993f21', '2014-04-12 21:45:38', '2014-04-12 21:46:33', 0, 1),
(8, 'ssss', '2d02e669731cbade6a64b58d602cf2a4', 'asdd@gmail.ru', 'e14848830bfa59c90e1c96a8128289bd', '2014-04-14 05:11:52', '2014-04-13 22:13:45', 0, 1),
(10, 'wer', '70c9d3d094e3b1c331174946b7c93ec1', 'werwer@gmail.com', 'c4c4859a7614a80032c2a79f7a63d931', '2014-04-14 01:20:39', '0000-00-00 00:00:00', 0, 0),
(11, 'ssqq', 'e2c430ab4cdd2c7861bab9e734201fc5', 'sqqw@gmail.com', 'f687400f864f435571f152660eb934f6', '2014-04-14 12:38:51', '2014-04-14 05:39:44', 0, 1),
(12, 'wert', 'e2c430ab4cdd2c7861bab9e734201fc5', 'sfsf@mail.ru', '43abaf82abe115c5826d81f41e3813c8', '2014-04-21 09:51:56', '2014-04-21 02:53:39', 0, 1),
(13, 'dfdf', 'b52c96bea30646abf8170f333bbd42b9', 'sdgg@mail.ru', 'bf86efe173d5fa12d6f64ccd755688e6', '2014-04-27 19:43:28', '2014-04-27 19:44:11', 0, 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
