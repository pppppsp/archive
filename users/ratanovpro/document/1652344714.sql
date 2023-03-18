-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220208.47252f9cf8
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 05 2022 г., 08:54
-- Версия сервера: 8.0.24
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `apteka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `check`
--

CREATE TABLE `check` (
  `id` int NOT NULL,
  `idtovar` int NOT NULL,
  `count` int NOT NULL,
  `summ` int NOT NULL,
  `idorder` int NOT NULL,
  `idcourier` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `idcompany` int NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `courier`
--

CREATE TABLE `courier` (
  `id` int NOT NULL,
  `surname` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `midname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `idinfo` int UNSIGNED NOT NULL,
  `tovar` int NOT NULL,
  `exdate` date NOT NULL,
  `counttovar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `client` int NOT NULL,
  `data` date NOT NULL,
  `sum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `idposition` int NOT NULL,
  `name` varchar(32) NOT NULL,
  `duty` varchar(32) NOT NULL,
  `rights` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `postavhiki`
--

CREATE TABLE `postavhiki` (
  `idpostavhik` int NOT NULL,
  `surname` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `midname` varchar(32) NOT NULL,
  `nameorganiz` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `prihod`
--

CREATE TABLE `prihod` (
  `idprihod` int NOT NULL,
  `postavhik` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `prihodnaklad`
--

CREATE TABLE `prihodnaklad` (
  `id` int NOT NULL,
  `idprihod` int NOT NULL,
  `idtovar` int NOT NULL,
  `count` int NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int NOT NULL,
  `name` varchar(43) NOT NULL,
  `heft` int NOT NULL,
  `content` varchar(255) NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `surname` varchar(32) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Birthday` date NOT NULL,
  `phone` int NOT NULL,
  `idposition` int NOT NULL,
  `idcompany` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `check`
--
ALTER TABLE `check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idorder` (`idorder`),
  ADD KEY `idtovar` (`idtovar`),
  ADD KEY `idcourier` (`idcourier`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idcompany`),
  ADD UNIQUE KEY `idcompany` (`idcompany`),
  ADD UNIQUE KEY `idcompany_2` (`idcompany`);

--
-- Индексы таблицы `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`idinfo`),
  ADD KEY `tovar` (`tovar`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `client` (`client`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`idposition`),
  ADD UNIQUE KEY `idposition` (`idposition`);

--
-- Индексы таблицы `postavhiki`
--
ALTER TABLE `postavhiki`
  ADD PRIMARY KEY (`idpostavhik`);

--
-- Индексы таблицы `prihod`
--
ALTER TABLE `prihod`
  ADD PRIMARY KEY (`idprihod`),
  ADD UNIQUE KEY `idprihod` (`idprihod`),
  ADD KEY `postavhik` (`postavhik`);

--
-- Индексы таблицы `prihodnaklad`
--
ALTER TABLE `prihodnaklad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idprihod` (`idprihod`,`idtovar`),
  ADD KEY `idtovar` (`idtovar`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idposition` (`idposition`),
  ADD KEY `idcompany` (`idcompany`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `check`
--
ALTER TABLE `check`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `idcompany` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `courier`
--
ALTER TABLE `courier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `idinfo` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `idposition` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `postavhiki`
--
ALTER TABLE `postavhiki`
  MODIFY `idpostavhik` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `prihod`
--
ALTER TABLE `prihod`
  MODIFY `idprihod` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `prihodnaklad`
--
ALTER TABLE `prihodnaklad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `check`
--
ALTER TABLE `check`
  ADD CONSTRAINT `check_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `check_ibfk_2` FOREIGN KEY (`idcourier`) REFERENCES `courier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `check_ibfk_3` FOREIGN KEY (`idtovar`) REFERENCES `tovar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`tovar`) REFERENCES `tovar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`client`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `prihod`
--
ALTER TABLE `prihod`
  ADD CONSTRAINT `prihod_ibfk_1` FOREIGN KEY (`postavhik`) REFERENCES `postavhiki` (`idpostavhik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `prihodnaklad`
--
ALTER TABLE `prihodnaklad`
  ADD CONSTRAINT `prihodnaklad_ibfk_1` FOREIGN KEY (`idprihod`) REFERENCES `prihod` (`idprihod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prihodnaklad_ibfk_2` FOREIGN KEY (`idtovar`) REFERENCES `tovar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idposition`) REFERENCES `position` (`idposition`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idcompany`) REFERENCES `company` (`idcompany`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
