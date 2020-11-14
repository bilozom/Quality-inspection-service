-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 16 2020 г., 12:49
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `b91946q7_saims`
--

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--
-- Создание: Мар 01 2020 г., 14:06
-- Последнее обновление: Мар 15 2020 г., 12:33
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`message_id`, `marks`, `name`, `email`, `message`, `date`) VALUES
(50, '2', 'Кылосов Кирилл Андреевич', 'is17.kylosovkirill@mail.ru', 'so good', '2020-03-08 17:00:26'),
(51, '4', 'Sai', 'd@a.s', 'woooowww', '2020-03-08 18:19:25'),
(52, '4', 'sssssssssssssssssssssss', 'is17.kylosovkirill@mail.russssssssssssssssss', 'qwerqwrtqewrewfwqrwqrqwtqwer', '2020-03-08 18:20:20'),
(53, '1', 'Кылосов sАндреевич', 'kylsovkirill@mail.ru', 'fdg', '2020-03-08 19:52:48'),
(54, '5', 'ввваывыа', 'kylsovkirill@mail.ru', 'ячсмвымп', '2020-03-08 20:04:37'),
(55, '3', 'я', 'c@c.c', 'лалалалалалалалла', '2020-03-08 20:08:15'),
(56, '5', 'вав', 'is17.s@mail.ru', 'ыыыыыыыыы', '2020-03-09 12:47:06'),
(57, '2', '2.5 3.5 3.4 5.6 3.4 2.3 1.2 3.2 5.4 1.2', 'zzzzzzzzzzz@z.z', '2 2 2 2 2 2', '2020-03-09 13:09:00'),
(58, '1', 'Кылосов Кирилл Андреевич', 'is17.kylosovkirill@mail.ru', 'Разнообразный и богатый опыт новая модель организационной деятельности требуют определения и уточнения позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции играет важную роль в формировании существенных финансовых и административных условий. Повседневная практика показывает, что укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Повседневная практика показывает, что консультация с широким активом в значительной степени обуславливает создание систем массового участия. С другой стороны рамки и место обучения кадров в значительной степени обуславливает создание систем массового участия. С другой стороны реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития.', '2020-03-09 13:11:49'),
(59, '4', 'Мим Мамумым', 'm@v.v', 'мммммммммммммммммммммммммммммммммммммм spagettttttttt', '2020-03-10 13:58:45'),
(60, '2', 'Бубен', 'bub@bu.ba', 'wow its just wow fuckit', '2020-03-11 11:53:05'),
(61, '3', 'Лунтик', 'lun@t.ik', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2020-03-11 11:56:03'),
(62, '1', 'Виктор', 'B@xn--q1a.xn--41a', 'Отзыв о товаре\r\n\r\nВсе поля обязательны для заполнения\r\n\r\nОцените товар', '2020-03-15 15:33:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
