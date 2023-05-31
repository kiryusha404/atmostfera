-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 31 2023 г., 23:18
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
-- Структура таблицы `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `name_action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `action`
--

INSERT INTO `action` (`id_action`, `name_action`, `info_action`, `img_action`, `status_action`) VALUES
(1, 'Зимние каникулы продолжаются', 'Выбирайте любые удобные для вас даты с 12 по 30 января — и получите ещё один день полноценного отдыха в подарок! ', 'img/action/3.webp', 'passive'),
(2, 'Работай с отдыхом', 'С 1 февраля приглашаем вас в особые дни за 20% скидкой! Понедельник, вторник, среда, четверг - скидка 20% на все сферы.', 'img/action/1.webp', 'active'),
(3, 'Романтика уже тут', 'Устрой романтический вечер своей второй половинке в супер Атмосферном месте (14 февраля – 10000 рублей).\r\nПри бронировании сферы ужин от Кафе - парка «Теремок» в подарок!', 'img/action/2.webp', 'active'),
(4, 'Разбей свой счёт', 'отдыхай сейчас, плати потом! Оплатить отдых в глэмпинге можно «ДОЛЯМИ».', 'img/action/1.webp', 'passive'),
(8, 'Кушай вкусно', 'До конца лета при бронирование сферы идёт скидка на ужин', 'img/action/o-o.png', 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user_fk` int(11) DEFAULT NULL,
  `id_sphere_fk` int(11) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `status_booking` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `people` int(11) NOT NULL,
  `time` date NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user_fk`, `id_sphere_fk`, `date1`, `date2`, `status_booking`, `people`, `time`, `comment`) VALUES
(1, 1, 1, '2023-05-30', '2023-06-01', 'add', 2, '2023-05-31', 'a'),
(2, 1, 2, '2023-05-31', '2023-06-06', 'del', 3, '2023-05-31', 'Домик в ремонте'),
(7, 2, 3, '2023-06-06', '2023-06-08', 'add', 1, '2023-05-31', '');

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
(13, 'img/sphere/Sbw.jpg'),
(15, 'img/sphere/1870675.jpg'),
(16, 'img/sphere/1870675.jpg'),
(17, 'img/sphere/187.jpg'),
(18, 'img/sphere/536345.jpg'),
(19, 'img/sphere/536345.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `sphere`
--

CREATE TABLE `sphere` (
  `id_sphere` int(11) NOT NULL,
  `name_sphere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_sphere` int(11) DEFAULT NULL,
  `aprice_sphere` int(11) NOT NULL,
  `capacity_sphere` int(11) DEFAULT NULL,
  `square_sphere` float DEFAULT NULL,
  `description_sphere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sphere`
--

INSERT INTO `sphere` (`id_sphere`, `name_sphere`, `price_sphere`, `aprice_sphere`, `capacity_sphere`, `square_sphere`, `description_sphere`) VALUES
(1, 'Cфера №1', 3000, 2500, 7, 78.9, 'Отличная комната для тусовок'),
(2, 'Cфера №2', 2000, 1900, 3, 52.5, 'Очень уютная комната, чтоб провести время втроём'),
(3, 'Cфера №3', 1500, 0, 6, 68.5, 'Сфера для ночных посиделок, есть много настольных игр'),
(4, 'Cфера №4', 2100, 0, 3, 45, 'Небольшой уютный домик, идеально подойдёт тем, кто не любит много шума'),
(5, 'Cфера №5', 2500, 2350, 4, 57.8, 'Хорошая комната для любителей походов, можно быстро обустроиться'),
(11, 'Кафе сфера', 1000, 950, 4, 0, 'Удачный выбор, чтоб провести свой ужин в компании друзей');

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
(1, 13),
(3, 13),
(11, 17),
(11, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `surname_user`, `patronymic_user`, `login_user`, `email_user`, `pass_user`, `role_user`) VALUES
(1, 'Админ', 'Админов', '', 'sphere', 'sphere@gmail.com', '$2y$10$PbGAt8n4V5HIh6mhaTBLfuFBWO1PZhI1ahfZFH8rlr30pw.u/WENi', 'admin'),
(2, 'Юзер', 'Юзеров', '', 'user', '1@gmail.com', '$2y$10$0s8cT5TLaMI02hFpR1mJteAZNV9BGq.t.VLYN1hEPKQn8wsA1RFjK', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`);

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user_fk` (`id_user_fk`),
  ADD KEY `id_sphere_fk` (`id_sphere_fk`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login_user` (`login_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `sphere`
--
ALTER TABLE `sphere`
  MODIFY `id_sphere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_sphere_fk`) REFERENCES `sphere` (`id_sphere`);

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
