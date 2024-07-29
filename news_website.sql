-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-5.7
-- Время создания: Июл 29 2024 г., 22:05
-- Версия сервера: 5.7.44
-- Версия PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news_website`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'John Smith'),
(2, 'Emma Johnson'),
(3, 'Michael Brown'),
(4, 'Sarah Davis'),
(5, 'David Wilson'),
(6, 'Jennifer Lee'),
(7, 'Robert Taylor'),
(8, 'Lisa Anderson'),
(9, 'William Clark'),
(10, 'Mary White'),
(11, 'James Martin'),
(12, 'Patricia Moore');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Science'),
(3, 'Politics'),
(4, 'Business'),
(5, 'Entertainment'),
(6, 'Sports'),
(7, 'Health'),
(8, 'Environment'),
(9, 'Education'),
(10, 'Travel'),
(11, 'Food'),
(12, 'Fashion');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailed_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `view_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `announcement`, `detailed_text`, `category_id`, `author_id`, `date`, `view_count`) VALUES
(1, 'New Smartphone Launch', 'Tech giant unveils latest smartphone model', 'Detailed description of the new smartphone features and specifications...', 1, 1, '2024-07-20 06:17:30', 5),
(2, 'Breakthrough in Cancer Research', 'Scientists discover potential cure for specific cancer type', 'In-depth explanation of the research findings and potential implications...', 2, 2, '2024-07-22 06:17:30', 1),
(3, 'Election Results Announced', 'Final tallies for recent national election released', 'Comprehensive breakdown of election results and analysis of outcomes...', 3, 3, '2024-06-26 06:17:30', 11),
(4, 'Stock Market Hits Record High', 'Major index reaches unprecedented levels', 'Detailed analysis of market trends and factors contributing to the surge...', 4, 4, '2024-07-26 06:17:30', 2),
(5, 'Blockbuster Movie Premiere', 'Highly anticipated film debuts to critical acclaim', 'Review of the movie, cast performances, and box office predictions...', 5, 5, '2024-07-26 06:17:30', 0),
(6, 'Championship Game Results', 'Underdog team clinches victory in final moments', 'Play-by-play recap of the game and post-game reactions...', 6, 6, '2024-06-21 06:17:30', 0),
(7, 'New Diet Trend Gains Popularity', 'Experts weigh in on the latest nutrition craze', 'Explanation of the diet, potential benefits, and expert opinions...', 7, 7, '2023-08-16 06:17:30', 0),
(8, 'Climate Change Report Released', 'Study shows accelerating impact of global warming', 'Key findings from the report and implications for future policy...', 8, 8, '2021-05-26 06:17:30', 3),
(9, 'Online Learning Platform Launches', 'New e-learning service aims to revolutionize education', 'Features of the platform and its potential impact on traditional education...', 9, 9, '2024-08-26 06:17:30', 5),
(10, 'Top Travel Destinations for 2023', 'Expert picks for must-visit locations this year', 'Detailed descriptions of each destination and travel tips...', 10, 10, '2024-08-21 06:17:30', 1),
(11, 'Michelin Star Awarded to Local Restaurant', 'Citys culinary scene gains international recognition', 'Profile of the restaurant, its chef, and signature dishes...', 11, 11, '2023-08-26 06:17:30', 1),
(12, 'Sustainable Fashion Trends', 'Eco-friendly clothing options gain traction', 'Overview of sustainable fashion practices and popular brands...', 12, 12, '2024-08-26 06:17:30', 0),
(13, 'Новая новость', 'Новая новость на сайте!', 'Новая новость на сайте!2', 2, 5, '2024-07-26 06:35:11', 8),
(14, 'Новая новость 2', 'Новая новость на сайте 2', 'Новая новость на сайте 2', 1, 4, '2024-07-26 06:41:44', 16),
(15, 'Новая новость 3', 'Новая новость на сайте 3', 'Новая новость на сайте 3', 11, 9, '2024-07-26 06:51:39', 3),
(16, 'Новая новость  4', 'Новая новость на сайте 4', 'Новая новость на сайте 4', 10, 9, '2024-07-26 06:53:18', 10),
(17, 'Новость 5', 'Новость на сайте 5', 'Новость на сайте 5', 9, 8, '2024-07-26 07:33:32', 3),
(18, 'Новая новость 7', 'Новая новость на сайте 7', 'Новая новость на сайте 7!', 11, 11, '2024-07-28 04:21:38', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `similar_news`
--

CREATE TABLE `similar_news` (
  `news_id` int(11) NOT NULL,
  `similar_news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `similar_news`
--

INSERT INTO `similar_news` (`news_id`, `similar_news_id`) VALUES
(4, 1),
(14, 1),
(16, 1),
(7, 2),
(14, 2),
(16, 2),
(8, 3),
(16, 3),
(1, 4),
(16, 4),
(6, 5),
(16, 5),
(5, 6),
(16, 6),
(2, 7),
(16, 7),
(3, 8),
(16, 8),
(10, 9),
(16, 9),
(9, 10),
(16, 10),
(18, 10),
(12, 11),
(16, 11),
(18, 11),
(11, 12),
(16, 12),
(14, 13),
(16, 13),
(15, 14),
(16, 14),
(16, 15),
(18, 17);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `similar_news`
--
ALTER TABLE `similar_news`
  ADD PRIMARY KEY (`news_id`,`similar_news_id`),
  ADD KEY `similar_news_id` (`similar_news_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Ограничения внешнего ключа таблицы `similar_news`
--
ALTER TABLE `similar_news`
  ADD CONSTRAINT `similar_news_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `similar_news_ibfk_2` FOREIGN KEY (`similar_news_id`) REFERENCES `news` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
