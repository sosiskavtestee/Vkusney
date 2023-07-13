-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 11 2023 г., 14:59
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 1, '2023-06-04 07:44:14', '2023-06-04 07:44:14'),
(3, 1, '2023-06-04 07:47:53', '2023-06-04 07:47:53'),
(4, 1, '2023-06-06 00:11:19', '2023-06-06 00:11:19'),
(5, 1, '2023-06-06 05:25:57', '2023-06-06 05:25:57');

-- --------------------------------------------------------

--
-- Структура таблицы `cart_tovar`
--

CREATE TABLE `cart_tovar` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint NOT NULL,
  `tovar_id` bigint NOT NULL,
  `price` int NOT NULL,
  `amount` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart_tovar`
--

INSERT INTO `cart_tovar` (`id`, `cart_id`, `tovar_id`, `price`, `amount`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 111, 1, NULL, NULL),
(8, 2, 2, 111, 5, NULL, NULL),
(11, 3, 6, 111, 1, NULL, NULL),
(12, 4, 2, 111, 4, NULL, NULL),
(13, 5, 2, 111, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Молочная продукция', 0, NULL, '2023-06-04 12:18:18'),
(2, 'Кисломолочная продукция', 1, NULL, NULL),
(3, 'Сыры', 0, NULL, NULL),
(4, 'Напитки', 0, NULL, NULL),
(5, 'Молоко', 1, NULL, NULL),
(6, 'Масло', 1, NULL, NULL),
(7, 'Сухие', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_03_110535_create_categories_table', 2),
(7, '2023_04_03_130542_create_tovars_table', 3),
(8, '2023_04_06_121019_create_products_table', 4),
(9, '2023_04_25_094101_create_sliders_table', 5),
(10, '2023_05_31_144749_create_carts_table', 6),
(11, '2023_05_31_145048_create_cart_tovars_table', 7),
(12, '2023_05_31_152547_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` int DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `user_id`, `status`, `address`, `comment`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, NULL, NULL, '2023-06-04 07:44:14', '2023-06-07 09:47:41'),
(3, 2, 1, 2, NULL, NULL, '2023-06-04 07:47:53', '2023-06-07 09:53:31'),
(4, 3, 1, 0, NULL, NULL, '2023-06-06 00:11:19', '2023-06-06 00:11:19'),
(5, 4, 1, 0, NULL, NULL, '2023-06-06 05:25:57', '2023-06-06 05:25:57');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Молоко', 'вкусно, свежо, молочно\nлучшая молочка только у нашей компании', 'http://d.zaix.ru/yMFR.png', NULL, NULL),
(2, 'Сыры', 'вкусно, свежо, молочно\nлучшая молочка только у нашей компании', 'http://d.zaix.ru/yMFU.png', NULL, NULL),
(3, 'Йогурты', 'вкусно, свежо, молочно\r\nлучшая молочка только у нашей компании', 'http://d.zaix.ru/yMFW.png', NULL, NULL),
(4, 'Масло', 'вкусно, свежо, молочно\r\nлучшая молочка только у нашей компании', 'http://d.zaix.ru/yMLz.png', NULL, NULL),
(5, 'Творог', 'вкусно, свежо, молочно\r\nлучшая молочка только у нашей компании', 'http://d.zaix.ru/yMLX.png', NULL, NULL),
(6, 'Хлеб', 'вкусно, свежо, молочно\r\nлучшая молочка только у нашей компании', 'http://d.zaix.ru/yMM9.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Наша продукция!', 'Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus suscipit massa dapibu.', 'http://d.zaix.ru/z9sf.png', NULL, NULL),
(2, 'Молоко, которому нечего скрывать', 'Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus suscipit massa dapibu.', 'http://d.zaix.ru/yMzR.png', NULL, NULL),
(3, 'Наша продукция!', 'Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus suscipit massa dapibu.', 'http://d.zaix.ru/z9sf.png', NULL, NULL),
(4, 'Наша продукция!', 'Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus suscipit massa dapibu.', 'http://d.zaix.ru/z9sf.png', NULL, NULL),
(5, 'Наша продукция!', 'Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus suscipit massa dapibu.', 'http://d.zaix.ru/z9sf.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tovars`
--

CREATE TABLE `tovars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `price` int NOT NULL,
  `amount` int NOT NULL DEFAULT '1',
  `price_disc` int DEFAULT NULL,
  `packaging` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `weight` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `percent` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tovars`
--

INSERT INTO `tovars` (`id`, `name`, `category_id`, `price`, `amount`, `price_disc`, `packaging`, `weight`, `percent`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ряженка \"Вкусней\" ', 2, 54, 2, NULL, 'тетрапак', '500 гр', '2,5', 'Состав : молоко нормализованное топленое, закваска термофильных молочнокислых стрептококков.\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 3,0г, углеводов - 4,7г.\nЭнергетическая ценность - 58 ккал/243 кДж. Отсутствие ГМО. Хранить при температуре: (4±2)°С. Срок годности: 7 суток. ГОСТ 31455-2012', 'http://d.zaix.ru/zYa9.png', NULL, '2023-06-05 13:23:20'),
(2, 'Йогурт фруктовый - Вишня', 1, 50, 16, NULL, 'стакан', '200 гр', '2,5', 'Состав : молоко нормализованное пастеризованное, сахар-песок стабилизатор, йогуртовая закваска, пастеризованный фруктово-ягодный наполнитель вишня.\n\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 2,8 г, углеводов - 12,1 г. ( в т.ч. сахарозы -8,5 г.)\n\nЭнергетическая ценность - 82 ккал/343 кДж.\nОтсутствие ГМО. Хранить при температуре: от (4±2)°С .\nСрок годности: 7 суток.', 'http://d.zaix.ru/zYae.png', NULL, NULL),
(15, 'Ряженка \"Вкусней\" ', 2, 54, 2, NULL, 'тетрапак', '500 гр', '2,5', 'Состав : молоко нормализованное топленое, закваска термофильных молочнокислых стрептококков.\r\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 3,0г, углеводов - 4,7г.\r\nЭнергетическая ценность - 58 ккал/243 кДж. Отсутствие ГМО. Хранить при температуре: (4±2)°С. Срок годности: 7 суток. ГОСТ 31455-2012', 'http://d.zaix.ru/zYa9.png', NULL, '2023-06-05 13:23:20'),
(16, 'Йогурт фруктовый - Вишня', 1, 50, 16, NULL, 'стакан', '200 гр', '2,5', 'Состав : молоко нормализованное пастеризованное, сахар-песок стабилизатор, йогуртовая закваска, пастеризованный фруктово-ягодный наполнитель вишня.\r\n\r\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 2,8 г, углеводов - 12,1 г. ( в т.ч. сахарозы -8,5 г.)\r\n\r\nЭнергетическая ценность - 82 ккал/343 кДж.\r\nОтсутствие ГМО. Хранить при температуре: от (4±2)°С .\r\nСрок годности: 7 суток.', 'http://d.zaix.ru/zYae.png', NULL, NULL),
(17, 'Ряженка \"Вкусней\" ', 2, 54, 2, NULL, 'тетрапак', '500 гр', '2,5', 'Состав : молоко нормализованное топленое, закваска термофильных молочнокислых стрептококков.\r\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 3,0г, углеводов - 4,7г.\r\nЭнергетическая ценность - 58 ккал/243 кДж. Отсутствие ГМО. Хранить при температуре: (4±2)°С. Срок годности: 7 суток. ГОСТ 31455-2012', 'http://d.zaix.ru/zYa9.png', NULL, '2023-06-05 13:23:20'),
(18, 'Йогурт фруктовый - Вишня', 1, 50, 16, NULL, 'стакан', '200 гр', '2,5', 'Состав : молоко нормализованное пастеризованное, сахар-песок стабилизатор, йогуртовая закваска, пастеризованный фруктово-ягодный наполнитель вишня.\r\n\r\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 2,8 г, углеводов - 12,1 г. ( в т.ч. сахарозы -8,5 г.)\r\n\r\nЭнергетическая ценность - 82 ккал/343 кДж.\r\nОтсутствие ГМО. Хранить при температуре: от (4±2)°С .\r\nСрок годности: 7 суток.', 'http://d.zaix.ru/zYae.png', NULL, NULL),
(19, 'Ряженка \"Вкусней\" ', 2, 54, 2, NULL, 'тетрапак', '500 гр', '2,5', 'Состав : молоко нормализованное топленое, закваска термофильных молочнокислых стрептококков.\r\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 3,0г, углеводов - 4,7г.\r\nЭнергетическая ценность - 58 ккал/243 кДж. Отсутствие ГМО. Хранить при температуре: (4±2)°С. Срок годности: 7 суток. ГОСТ 31455-2012', 'http://d.zaix.ru/zYa9.png', NULL, '2023-06-05 13:23:20'),
(20, 'Йогурт фруктовый - Вишня', 1, 50, 16, NULL, 'стакан', '200 гр', '2,5', 'Состав : молоко нормализованное пастеризованное, сахар-песок стабилизатор, йогуртовая закваска, пастеризованный фруктово-ягодный наполнитель вишня.\r\n\r\nПищевая ценность ( содержание в 100 г продукта): жира 2,5 г, белка - 2,8 г, углеводов - 12,1 г. ( в т.ч. сахарозы -8,5 г.)\r\n\r\nЭнергетическая ценность - 82 ккал/343 кДж.\r\nОтсутствие ГМО. Хранить при температуре: от (4±2)°С .\r\nСрок годности: 7 суток.', 'http://d.zaix.ru/zYae.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `type`, `admin`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Настя', '8989898989', 2, 1, 'http://d.zaix.ru/zhen.jpg', 'potap.43@yandex.ru', NULL, '$2y$10$ht3H0WCZygbcva4eZIbg.ucbxu7IIEhqi/nJl2Um1c2b8drWDMacu', NULL, '2023-03-30 09:51:29', '2023-03-30 09:51:29'),
(2, 'выы', '456789', 1, 0, NULL, 'weqw@mail.ru', NULL, '$2y$10$8BbElRlPH4i97u6DPdv1.OfwZ1HXkvb0KNmoziyjqstwWh6a0KJtq', NULL, '2023-06-06 05:48:01', '2023-06-06 05:48:01'),
(3, 'Админ', '8989898989', 2, 1, 'http://d.zaix.ru/A4HN.jpg', 'admin.123@mail.ru', NULL, '$2y$10$tGCMyKRXbTj165pul9z9UOrvNoeYaxO7UHE.rL1OxWLLO6zFEZPWK', NULL, '2023-06-11 06:42:14', '2023-06-11 06:42:14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart_tovar`
--
ALTER TABLE `cart_tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovars`
--
ALTER TABLE `tovars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `cart_tovar`
--
ALTER TABLE `cart_tovar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tovars`
--
ALTER TABLE `tovars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
