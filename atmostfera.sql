-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2023 г., 13:20
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `atmostfera`
--

-- --------------------------------------------------------

--
-- Структура таблицы `img_product`
--

CREATE TABLE `img_product` (
  `id_img` int(11) NOT NULL,
  `ucr_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `img_product`
--

INSERT INTO `img_product` (`id_img`, `ucr_img`) VALUES
(1, 'img/sphere/0.jfif'),
(2, 'img/sphere/13f.jfif'),
(3, 'img/sphere/16.jfif'),
(4, 'img/sphere/48.jfif'),
(5, 'img/sphere/77.jfif'),
(6, 'img/sphere/158.jfif'),
(7, 'img/sphere/2325.png'),
(8, 'img/sphere/af.jfif'),
(9, 'img/sphere/c.jfif'),
(10, 'img/sphere/FGo.jpg'),
(11, 'img/sphere/g.jpg'),
(12, 'img/sphere/gj_E.jpg'),
(13, 'img/sphere/Sbw.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `sphere`
--

CREATE TABLE `sphere` (
  `id_sphere` int(11) NOT NULL,
  `name_sphere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_sphere` int(11) DEFAULT NULL,
  `capacity_sphere` int(11) DEFAULT NULL,
  `square_sphere` float DEFAULT NULL,
  `description_sphere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sphere`
--

INSERT INTO `sphere` (`id_sphere`, `name_sphere`, `price_sphere`, `capacity_sphere`, `square_sphere`, `description_sphere`) VALUES
(1, 'Cфера №1', 2500, 7, 78.9, 'Отличная комната для тусовок'),
(2, 'Cфера №2', 1900, 3, 52.5, 'Очень уютная комната, чтоб провести время втроём'),
(3, 'Cфера №3', 1500, 6, 68.5, 'Сфера для ночных посиделок, есть много настольных игр'),
(4, 'Cфера №4', 2100, 3, 45, 'Небольшой уютный домик, идеально подойдёт тем, кто не любит много шума'),
(5, 'Cфера №5', 2350, 4, 57.8, 'Хорошая комната для любителей походов, можно быстро обустроиться');

-- --------------------------------------------------------

--
-- Структура таблицы `sphere_img`
--

CREATE TABLE `sphere_img` (
  `id_sphere_fk` int(11) NOT NULL DEFAULT '0',
  `id_img_fk` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sphere_img`
--

INSERT INTO `sphere_img` (`id_sphere_fk`, `id_img_fk`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(5, 7),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(4, 10),
(1, 11),
(2, 12),
(3, 13);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id_img`);

--
-- Индексы таблицы `sphere`
--
ALTER TABLE `sphere`
  ADD PRIMARY KEY (`id_sphere`);

--
-- Индексы таблицы `sphere_img`
--
ALTER TABLE `sphere_img`
  ADD PRIMARY KEY (`id_sphere_fk`,`id_img_fk`),
  ADD KEY `id_img_fk` (`id_img_fk`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `sphere`
--
ALTER TABLE `sphere`
  MODIFY `id_sphere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sphere_img`
--
ALTER TABLE `sphere_img`
  ADD CONSTRAINT `sphere_img_ibfk_1` FOREIGN KEY (`id_img_fk`) REFERENCES `img_product` (`id_img`),
  ADD CONSTRAINT `sphere_img_ibfk_2` FOREIGN KEY (`id_sphere_fk`) REFERENCES `sphere` (`id_sphere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
