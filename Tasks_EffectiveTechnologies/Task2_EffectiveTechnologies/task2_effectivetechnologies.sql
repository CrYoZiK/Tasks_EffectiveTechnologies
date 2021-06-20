-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2021 г., 08:49
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task2_effectivetechnologies`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `ID_Author` int(11) NOT NULL,
  `Author_Surname` varchar(100) NOT NULL,
  `Author_Name` varchar(100) NOT NULL,
  `Author_Patronymic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `ID_Book` int(11) NOT NULL,
  `Book_Name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `mtm_authors_and_books`
--

CREATE TABLE `mtm_authors_and_books` (
  `ID_Book` int(11) NOT NULL,
  `ID_Author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `task_query_res`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `task_query_res` (
`ID_Author` int(11)
,`Author_Surname` varchar(100)
,`Author_Name` varchar(100)
,`Author_Patronymic` varchar(100)
,`Count_Books` bigint(21)
);

-- --------------------------------------------------------

--
-- Структура для представления `task_query_res`
--
DROP TABLE IF EXISTS `task_query_res`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `task_query_res`  AS SELECT `a`.`ID_Author` AS `ID_Author`, `b`.`Author_Surname` AS `Author_Surname`, `b`.`Author_Name` AS `Author_Name`, `b`.`Author_Patronymic` AS `Author_Patronymic`, count(0) AS `Count_Books` FROM (`mtm_authors_and_books` `a` join `authors` `b` on(`a`.`ID_Author` = `b`.`ID_Author`)) GROUP BY `a`.`ID_Author` HAVING `Count_Books` <= 6 ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`ID_Author`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID_Book`);

--
-- Индексы таблицы `mtm_authors_and_books`
--
ALTER TABLE `mtm_authors_and_books`
  ADD KEY `ID_Book` (`ID_Book`),
  ADD KEY `ID_Author` (`ID_Author`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `ID_Author` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `ID_Book` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `mtm_authors_and_books`
--
ALTER TABLE `mtm_authors_and_books`
  ADD CONSTRAINT `mtm_authors_and_books_ibfk_1` FOREIGN KEY (`ID_Book`) REFERENCES `books` (`ID_Book`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mtm_authors_and_books_ibfk_2` FOREIGN KEY (`ID_Author`) REFERENCES `authors` (`ID_Author`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
