-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 04 2024 г., 18:30
-- Версия сервера: 5.6.51
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `arsbd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `price` int(10) DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `file`, `cat_id`) VALUES
(1, 'Гипсофилы малиновые', 100, 'гипсофилы-малиновые.jpg', 1),
(2, 'Гипсофилы белые', 100, 'гипсофилы-белые.jpg', 1),
(3, 'Гипсофилы голубые', 500, 'гипсофилы-голубые.jpg', 1),
(4, 'Гипсофилы желтые', 30, 'гипсофилы-желтые.jpg', 1),
(5, 'Лилии белые', 100, 'лилии-белые.jpg', 1),
(6, 'Лилии розовые', 500, 'лилии-розовые.jpg', 1),
(7, 'Розы розовые', 100, 'розы-розовые.jpg', 1),
(8, 'Розы кремовые', 500, 'розы-кремовые.jpg', 1),
(9, 'Розы синие', 100, 'розы-синие.jpg', 1),
(10, 'Эвкалипт', 30, 'evcalipt.jpg', 2),
(11, 'Фисташка', 50, 'fistashka.jpg', 2),
(12, 'Питтоспорум', 30, 'pittosporum.jpg', 2),
(13, 'Аралия', 50, 'araliya.jpg', 2),
(14, 'Аспидастра', 50, 'aspidistra.jpg', 2),
(15, 'Корейская пленка белая', 10, 'Корейская пленка белая.png', 3),
(16, 'Корейская пленка прозрачная', 10, 'Корейская пленка прозрачная.png', 3),
(17, 'Крафтовая бумага', 10, 'Крафтовая бумага.jpg', 3),
(18, 'Фоамиран белый', 10, 'Фоамиран белый.jpg', 3),
(19, 'Розы белые', 500, 'розы-белые.jpg', 1),
(20, 'Розы красные', 500, 'розы-красные.jpg', 1),
(21, 'Розы черные', 700, 'розы-черные.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_cats`
--

CREATE TABLE `product_cats` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_img` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_cats`
--

INSERT INTO `product_cats` (`cat_id`, `cat_name`, `cat_slag`, `cat_img`) VALUES
(1, 'Цветы', 'flowers', ''),
(2, 'Зелень', 'greenery', ''),
(3, 'Оформление', 'decoration', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `timeStamp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `timeStamp`) VALUES
(3, 'Тестик', 'PROFEBIZNES@yandex.ru', '$2y$10$MGWy9m3dEF4dezmru7otRemMfIU.TF.KeHeVljGcSxu2RZbeqNxHC', '2024-05-14 14:51:30'),
(4, 'Тест', 'PROFEBIZNES@yandex.ru', '$2y$10$VwO3kTEUpM0HkOC7kvxjquLcBoMI.b7qFDy1SFtJWaC.XwCzjPuTy', '2024-05-14 15:22:21'),
(5, 'Test', 'PROFEBIZNES@yandex.ru', '$2y$10$wVvreVQodUfyj4pnMUjXM.29zUSjpCKDEFHYaXasmnz0LB1lEQ05u', '2024-05-14 20:20:27'),
(6, 'Сергей', 'PROFEBIZNES@yandex.ru', '$2y$10$PDRO13Sumo3Kmx2wD2Ft4.vTZFYJ3Af4gxZFI4Rom9h.J4GPayBSS', '2024-05-15 17:07:33'),
(7, 'Саня', 'PROFEBIZNES@yandex.ru', '$2y$10$uhz0muz.CGxfUSnd/GEUleTGnRPy0jzg9g1Hlcypo2..uL84aXKgC', '2024-05-15 21:04:01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_cats`
--
ALTER TABLE `product_cats`
  ADD PRIMARY KEY (`cat_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `product_cats`
--
ALTER TABLE `product_cats`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
