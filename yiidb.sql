-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2021 г., 15:46
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yiidb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1618227170),
('m130524_201442_init', 1618227177),
('m190124_110200_add_verification_token_column_to_user_table', 1618227177);

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id`, `first_name`, `last_name`, `email`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'bunyod', 'Iskandarov', 'bunyod@bunyod.uz', 'ayol', '2021-04-19 17:41:52', '2021-04-19 17:42:46'),
(2, 'Xolmurod', 'Isroilov', 'x.isroilov@piima.uz', 'erkak', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(3, 'sdada', 'dsadsadsa', 'dsadas@sda.sd', 'erkak', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(4, 'Xolmurod', 'Isroilov', 'x.isroilov@piima.uz', 'erkak', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(5, 'Xolmurod', 'Isroilov', 'x.isroilov@piima.uz', 'erkak', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(6, 'saf', 'asfasfa', 'sfasf@asf.afsafas', 'erkak', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(7, 'asgsag', 'asgsag', 'dsadas@sda.sd', 'erkak', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(8, 'asfsafsaf', 'afasfa', 'sfasf@asf.afsafas', 'ayol', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(9, 'safsaf', 'afasf', 'sfasf@asf.afsafas', 'ayol', '2021-04-19 17:41:52', '2021-04-19 17:42:30'),
(10, 'asfdas', 'fsafsaf', 'sfasf@asf.afsafas', 'ayol', '2021-04-19 17:41:52', '2021-04-19 00:00:00'),
(11, 'TEST', 'TEST', 'TEST@TEST.TEST', 'erkak', '2021-04-19 17:45:55', '2021-04-19 17:45:55');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'bunyodjon', 'eSZ21zGED19U_fLYAULNm7zbg0zOAGul', '$2y$13$vo0SLDlWXDv1tn4ZF.i6..9lT.fVlrQFtuJzkYKdLlIuL7wYj6FgG', NULL, 'b.iskandarov@piima.uz', 10, 1618578669, 1618578669, 'tRX0JJEEDjyjdHdPz2sUMoV4fuY0dbeh_1618578669');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
