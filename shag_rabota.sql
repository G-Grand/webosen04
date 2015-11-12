-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 12 2015 г., 18:54
-- Версия сервера: 5.5.46
-- Версия PHP: 5.3.10-1ubuntu3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shag_rabota`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dom`
--

CREATE TABLE IF NOT EXISTS `dom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `dom`
--

INSERT INTO `dom` (`id`, `text`) VALUES
(1, 'Proverka');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `img_order` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img_order`, `image`, `user_login`) VALUES
(1, 0, '1.JPG', ''),
(14, 0, '1.JPG', 'retyrok@mail.ru'),
(15, 0, '1.JPG', 'retyrok@mail.ru'),
(16, 0, '1.JPG', 'retyrok@mail.ru'),
(17, 0, '17.JPG', 'retyrok@mail.ru'),
(18, 36, '18.JPG', 'retyrok@mail.ru'),
(19, 36, '19.JPG', 'retyrok@mail.ru'),
(20, 36, '20.JPG', 'retyrok@mail.ru'),
(21, 36, '21.JPG', 'retyrok@mail.ru'),
(22, 36, '22.JPG', 'retyrok@mail.ru'),
(23, 36, '23.JPG', 'retyrok@mail.ru'),
(24, 37, '24.JPG', 'retyrok@mail.ru'),
(25, 37, '25.JPG', 'retyrok@mail.ru'),
(26, 37, '26.JPG', 'retyrok@mail.ru'),
(27, 37, '27.JPG', 'retyrok@mail.ru'),
(28, 37, '28.JPG', 'retyrok@mail.ru'),
(29, 37, '29.JPG', 'retyrok@mail.ru'),
(30, 37, '30.JPG', 'retyrok@mail.ru'),
(31, 37, '31.JPG', 'retyrok@mail.ru'),
(32, 37, '32.JPG', 'retyrok@mail.ru'),
(33, 37, '33.JPG', 'retyrok@mail.ru'),
(34, 37, '34.JPG', 'retyrok@mail.ru'),
(35, 39, '35.jpg', 'win32@list.ru2'),
(36, 40, '36.JPG', 'retyrok@mail.ru'),
(37, 40, '37.JPG', 'retyrok@mail.ru'),
(38, 40, '38.JPG', 'retyrok@mail.ru'),
(39, 40, '39.JPG', 'retyrok@mail.ru'),
(40, 40, '40.JPG', 'retyrok@mail.ru'),
(41, 40, '41.JPG', 'retyrok@mail.ru'),
(42, 40, '42.JPG', 'retyrok@mail.ru'),
(43, 40, '43.JPG', 'retyrok@mail.ru'),
(44, 40, '44.JPG', 'retyrok@mail.ru'),
(45, 40, '45.JPG', 'retyrok@mail.ru'),
(46, 42, '46.jpg', 'win32@list.ru2'),
(47, 43, '47.JPG', 'retyrok303@mail.ru'),
(48, 43, '48.JPG', 'retyrok303@mail.ru'),
(49, 43, '49.JPG', 'retyrok303@mail.ru'),
(50, 44, '50.jpg', 'retyrok@mail.ru'),
(51, 44, '51.jpg', 'retyrok@mail.ru'),
(52, 45, '52.JPG', 'retyrok@mail.ru'),
(53, 46, '53.jpg', 'retyrok@mail.ru'),
(54, 46, '54.jpg', 'retyrok@mail.ru'),
(55, 46, '55.jpg', 'retyrok@mail.ru'),
(56, 46, '56.jpg', 'retyrok@mail.ru'),
(57, 46, '57.jpg', 'retyrok@mail.ru'),
(58, 46, '58.jpg', 'retyrok@mail.ru'),
(59, 46, '59.jpg', 'retyrok@mail.ru'),
(60, 46, '60.jpg', 'retyrok@mail.ru'),
(61, 46, '61.jpg', 'retyrok@mail.ru'),
(62, 46, '62.jpg', 'retyrok@mail.ru'),
(63, 46, '63.jpg', 'retyrok@mail.ru'),
(64, 46, '64.jpg', 'retyrok@mail.ru'),
(65, 47, '65.jpg', 'retyrok@mail.ru'),
(66, 47, '66.jpg', 'retyrok@mail.ru'),
(67, 47, '67.jpg', 'retyrok@mail.ru'),
(68, 47, '68.jpg', 'retyrok@mail.ru'),
(69, 47, '69.jpg', 'retyrok@mail.ru'),
(70, 47, '70.jpg', 'retyrok@mail.ru'),
(71, 47, '71.jpg', 'retyrok@mail.ru'),
(72, 47, '72.jpg', 'retyrok@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `text` varchar(65000) CHARACTER SET cp1251 NOT NULL,
  `image` int(255) NOT NULL,
  `Description` int(150) NOT NULL,
  `Keywords` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(6) NOT NULL AUTO_INCREMENT,
  `order_status` int(2) NOT NULL,
  `order_view` int(2) NOT NULL,
  `area` int(3) NOT NULL,
  `property_Type` int(2) NOT NULL,
  `show` int(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `rooms` int(2) NOT NULL,
  `floor` int(2) NOT NULL,
  `all_floor` int(2) NOT NULL,
  `general` int(4) NOT NULL,
  `type_wall` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(6) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `datatime_order` int(10) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_order`, `order_status`, `order_view`, `area`, `property_Type`, `show`, `city`, `district`, `street`, `rooms`, `floor`, `all_floor`, `general`, `type_wall`, `description`, `price`, `Username`, `user_login`, `phone`, `datatime_order`) VALUES
(1, 3, 1, 1, 1, 0, 'Днепропетровск', 'Красногвардейский р-н', 'Карла Маркса', 4, 3, 9, 100, '', 'Квартира расположена на улице Комсомольской в самом центре города. Есть возможность разделения на 2 квартиры. окна и балкон выходят на кафедральный Троицкий собор. Также есть 2 парковочных места. В стоимость квартиры они не входят.', 100000, 'Иван', 'w@l.ru', '0670000000', 0),
(12, 1, 1, 1, 1, 1, 'Dnepropetrovsk', 'Левый берег', 'Героев', 3, 4, 10, 72, 'кипичь', 'вавыпвыапвкпукпкупку\r\nкпкупукпкупкуп\r\nсимваиверкер аикеркер\r\n', 22000, 'Вася', 'retyrok@mail.ru', '+3(097)444-44-44', 1441906230),
(13, 1, 1, 1, 1, 1, 'Кременчуг', 'Левый берег', 'Ленина', 3, 4, 10, 72, 'кипичь', 'вавыпвыапвкпукпкупку\r\nкпкупукпкупкуп\r\nсимваиверкер аикеркер\r\n', 22000, 'Вася', 'retyrok@mail.ru', '+3(097)444-44-44', 1441906782),
(15, 1, 1, 3, 1, 1, 'Павлоград', 'Хороший', 'Отличная', 3, 5, 7, 45, 'кирпич', 'крвартире лучше нет', 2355, 'Коля', 'retyrok@mail.ru', '+3(333)333-33-33', 1443187965),
(16, 1, 0, 0, 0, 1, '', '', '', 0, 0, 0, 0, '', '', 0, '', 'retyrok@mail.ru', '', 1443188014),
(17, 1, 1, 3, 1, 1, 'Павлоград', 'Хороший', 'Отличная', 3, 5, 7, 45, 'кирпич', 'крвартире лучше нет', 2355, 'Коля', 'retyrok@mail.ru', '+3(333)333-33-33', 1443188430),
(18, 1, 0, 0, 0, 1, '', '', '', 0, 0, 0, 0, '', '', 0, '', 'retyrok@mail.ru', '', 1443188472),
(19, 1, 1, 1, 1, 1, 'erwerwer', 'ewrwer', 'erwere', 3, 3, 3, 3, 'fdfdf', 'fvfdgdfgd', 34343, 'fdfd', '', '+3(222)222-22-22', 1443188885),
(20, 1, 1, 1, 1, 1, 'erwerwer', 'ewrwer', 'erwere', 3, 3, 3, 3, 'fdfdf', 'fvfdgdfgd', 34343, 'fdfd', '', '+3(222)222-22-22', 1443189269),
(21, 1, 1, 1, 1, 1, 'dfsdfsd', 'dfdfd', 'dfdfdf', 3, 3, 3, 3, 'fdf', 'fdsdfsdvdfgg', 3434, 'efdfef', '', '+3(333)333-33-33', 1443261871),
(22, 1, 1, 1, 1, 1, 'dfsdfsd', 'dfdfd', 'dfdfdf', 3, 3, 3, 3, 'fdf', 'fdsdfsdvdfgg', 3434, 'efdfef', 'retyrok@mail.ru', '+3(333)333-33-33', 1443262006),
(23, 1, 1, 1, 1, 1, 'fgfgfg', 'fgfgfg', 'fgfgfgf', 2, 2, 2, 2, 'fdf', 'fvfdbgfddfgd', 23232, 'fefef', 'retyrok@mail.ru', '+3(333)333-33-33', 1443265908),
(24, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(25, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(26, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(27, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(28, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(29, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(30, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(31, 1, 1, 1, 1, 1, 'fgdfgf', 'fgfgfg', 'gfgfgf', 4, 4, 4, 44, 'gfg', 'ghdhdrhrh', 4444, 'gdfgdf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443267350),
(32, 1, 1, 1, 1, 1, 'dfsdfsd', 'dfdfd', 'fdfdfd', 3, 3, 3, 3434, 'fdfdf', 'jghjghjghjg', 3434, 'fgrgrg', 'retyrok@mail.ru', '+3(666)666-66-66', 1443269276),
(33, 1, 1, 1, 1, 1, 'dfsdfsd', 'dfdfd', 'fdfdfd', 3, 3, 3, 3434, 'fdfdf', 'jghjghjghjg', 3434, 'fgrgrg', 'retyrok@mail.ru', '+3(666)666-66-66', 1443269276),
(34, 1, 1, 1, 1, 1, 'fgdfgd', 'gfdgdfg', 'gdfgdfgf', 3, 3, 3, 3434, 'fsere', 'vdfgfgdfgdf', 343434, 'fsdf', 'retyrok@mail.ru', '+3(343)434-34-34', 1443269610),
(35, 1, 1, 1, 1, 1, 'ваываыв', 'вавава', 'вавава', 33, 3, 3, 3434, 'вавыа', 'аываываыа', 3, 'ууку', 'retyrok@mail.ru', '+3(333)333-33-33', 1443270112),
(36, 1, 1, 1, 1, 1, 'fgdfgd', 'gfgdf', 'fgdfg', 3, 3, 3, 3434, 'fsere', 'dfgsdfgs', 3434, 'ghfgh', 'retyrok@mail.ru', '+3(444)444-44-44', 1443273286),
(37, 1, 1, 1, 1, 1, 'dfsdfd', 'fdfd', 'dfdf', 33, 3, 3, 333, 'fdfd', 'fgdfgdfgdfgd', 4343, 'gfdgdf', 'retyrok@mail.ru', '+3(334)343-43-43', 1443284345),
(38, 1, 1, 1, 1, 1, 'dfsdfd', 'fdfd', 'dfdf', 33, 3, 3, 333, 'fdfd', 'fgdfgdfgdfgd', 4343, 'gfdgdf', 'retyrok@mail.ru', '+3(334)343-43-43', 1443284345),
(39, 1, 1, 1, 1, 1, 'днепропетровск', '1111', '11111111', 1, 1, 1, 1, '', 'Теперь о проблемах:\r\n1. файл *.vars содержит всю информацию о пользователе (ФИО, почту, компанию, должность и т.д.)\r\n2. в екселевском файле информация о пользователе ограничена: только ФИО и почта\r\n3. в екселевском файле есть строки, которые соответствуют определенному файлу *.vars (одинаковый e-mail)\r\n\r\nНа данный момент я занес в одну общую таблицу пользователей из файлов *vars и из екселевского файла (при этом uid-ы екселевских юзеров больше (из екселя записываются в конец таблицы после того, как в таблицу внесена информация из файлов *vars.', 1, '', 'win32@list.ru2', '+3(067)777-77-77', 1443336173),
(40, 1, 1, 1, 1, 1, 'dfsdfd', 'bghg', 'fghfgf', 33, 3, 3, 343, 'sfgdf', 'rgdrgdhdh', 34, 'fsdf', 'retyrok@mail.ru', '+3(343)434-34-34', 1443347832),
(41, 1, 1, 1, 1, 1, 'xvdv', 'xcxc', 'xcxcx', 4, 4, 4, 45, 'ffff', 'dfsdfsd', 4343, 'dferf', 'retyrok@mail.ru', '+3(333)333-33-33', 1443352099),
(42, 1, 1, 1, 1, 1, 'днепропетровск2', '1111', '11111111', 1, 1, 1, 1, '', 'fwefwefewfewfe', 1956, '', 'win32@list.ru2', '+3(067)777-77-77', 1443356470),
(43, 1, 1, 1, 1, 1, 'Павлоград', 'вввввввв', 'ввввввв', 3, 3, 3, 33, 'кирпич', 'уауцаывмываыуацуаупкппупуп', 333333, 'вася', 'retyrok303@mail.ru', '+3(453)454-53-45', 1445954132),
(44, 1, 1, 2, 2, 1, 'rgergrfg', 'rtgergerg', 'gergerg', 3, 3, 3, 333, 'rrgrfg', 'rghrtjtyjtyj', 35345634, 'rthrtyh', 'retyrok@mail.ru', '+3(345)654-67-56', 1445967464),
(45, 1, 1, 3, 1, 1, 'dfghdf', 'fgdgd', 'fgfdg', 4, 5, 9, 675, 'bnfgh', 'vbhjmfgjhgjhk,fghjgjh,gkghjjkgj', 45465464, 'fgdgd', 'retyrok@mail.ru', '+3(454)354-36-43', 1446312145),
(46, 1, 1, 1, 1, 1, 'sdsds', 'dsdsd', 'dsdsd', 3, 4, 7, 3423, 'fdfd', 'sdsdfsdvx xgdfgdfg', 3432342, 'dfsdf', 'retyrok@mail.ru', '+3(343)434-34-34', 1447142549),
(47, 1, 1, 1, 1, 1, 'esfewe', 'efeww', 'efewf', 34, 3, 3, 2343, 'dfdf', 'werewrwerwerew', 3434, 'dfgwefgew', 'retyrok@mail.ru', '+3(343)535-43-65', 1447174475);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_hash` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`) VALUES
(1, 'qwert@mail.ru', '1f32aa4c9a1d2ea010adcf2348166a04', ''),
(2, '12345@mail.ru', '1f32aa4c9a1d2ea010adcf2348166a04', ''),
(3, '123456@mail.ru', '14e1b600b1fd579f47433b88e8d85291', ''),
(4, 'retyrok@mail.ru', 'db11ecf9b2bb1518121b8a9a6141b73d', '22356266601861f461591ec39ec77b68'),
(5, 'retyrok1@mail.ru', 'db11ecf9b2bb1518121b8a9a6141b73d', '2436f2542a14e44b3e7bd010f5c7f9d8'),
(6, 'asdfg@mail.ru', '1f32aa4c9a1d2ea010adcf2348166a04', '8fad8baac03c4cd5c8c27e6b9c12936d'),
(7, 'win32@list.ru', 'ab1ed26acc76708a73a63e48d19b0cc9', ''),
(8, 'win32@list.ru2', '14e1b600b1fd579f47433b88e8d85291', 'ab8a5c805551a3883e8d79b09820e089'),
(9, 'retyrok30@mail.ru', '43e5b4b125f5452449e0debc4ab0d1c7', ''),
(10, 'retyrok303@mail.ru', '224cf2b695a5e8ecaecfb9015161fa4b', 'e6f510a3ff98d38f520a15d75afe69cf'),
(11, 'retyrok111@mail.ru', 'd9b1d7db4cd6e70935368a1efb10e377', 'afc5152155a1674d80f769ce6a35e615');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
