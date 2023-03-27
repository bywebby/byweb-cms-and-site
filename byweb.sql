-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 26 2023 г., 12:47
-- Версия сервера: 5.6.47
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `byweb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(1, 'Создание сайтов', 'sozdanie-saytov', 'Создание сайтов', 'Создание сайтов разработка сайтов', '2022-10-19 12:23:35', '2023-03-19 15:27:42'),
(2, 'Разработка сайта', 'razrabotka-saita', 'Разработка сайта', 'Разработка сайта', '2023-03-19 15:28:06', '2023-03-19 15:28:06');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_01_26_133221_create_categories_table', 2),
(5, '2022_02_08_074825_create_posts_table', 2),
(6, '2022_02_08_082435_create_types_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `type_id`, `description`, `content`, `category_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'СОЗДАНИЕ САЙТОВ', 'sozdanie-saitov', 1, '123', '<p>Веб-студия «БайВеб» оказывает весь спектр услуг по профессиональной разработке веб-сайтов под ключ с нуля.</p><p>Разработка эффективного сайта</p><h3><a href=\"tel:+375295573639\"><strong>+375&nbsp;(29) 557-36-39 (МТС)</strong></a></h3><div class=\"raw-html-embed\">\r\n<a class=\"btn-slider\" href=\"https://byweb.by/#zakaz\">ЗАКАЗАТЬ САЙТ</a>\r\n\r\n</div>', 1, 'images/sozdanie-saitov/sozdanie-saytov-v-minske.jpg', '2022-10-26 08:14:28', '2023-03-25 13:30:05'),
(2, 'Корпоративный сайт', 'korporativniy-sajt-polosa', 2, NULL, '<p>Изготовление сайта компании с новостным блогом, адаптивным дизайном и регистрацией.</p>', 1, 'images/sozdanie-saitov/post-503397906-0-21731000-1543403138.png', '2023-03-19 10:13:58', '2023-03-19 15:56:01'),
(3, 'САЙТ-ВИЗИТКА', 'polosa-sajt-vizitka', 2, NULL, '<p>Создание продающего сайта под ключ в виде 5-10 продающих страниц, адаптивный дизайн.</p>', 1, NULL, '2023-03-19 10:14:39', '2023-03-19 11:16:26'),
(4, 'LANDING PAGE', 'polodsa-landing-page', 2, NULL, '<p>Продающий сайт с системой управления и адаптивным дизайном под контекстную рекламу.</p>', 1, NULL, '2023-03-19 10:15:28', '2023-03-19 11:17:00'),
(5, 'ИНТЕРНЕТ-МАГАЗИН', 'polosa-internet-shop', 2, NULL, '<p>Разработка сайта магазина с корзиной товаров или без – каталога продукции (витрина товаров).</p>', 1, NULL, '2023-03-19 11:18:22', '2023-03-20 12:45:16'),
(6, 'Разработка сайта', 'razrabotka-saita', 3, NULL, '<p>тудия ByWeb оказывает полный цикл услуг – создания сайтов под ключ, раскрутка по регионам Беларуси: Брест, Витебск, Гомель, Гродно, Могилев, Минск и России: Москва, СПБ. За годы непрерывного обучения и практики накопился опыт, который мы стараемся воплощать в своих проектах. Основной акцент – аналитика, юзабилити, оптимизация сайта и доступная подача контента для потребителя. Первоначально мы делаем оптимизацию, поэтому дальнейшее позиционирование в поисковых системах не будут затратными.</p><p>Поскольку клиентская база у нас на абонентском обслуживании более 50 отечественных и зарубежных компаний, мы понимаем всю ответственность своей работы и гарантировано реагируем на все заявки в рамках оказываемой <a href=\"https://byweb.by/uslugi/podderzhka-sajta\">технической поддержки</a>, что строго прописывается в договорных обязательствах с учётом штрафных санкций и сроков их исполнения. Клиенты, работающие с нами, получают полное <a href=\"/uslugi/podderzhka-sajta\">сопровождение</a> на всех этапах работы в виде интерактивного удалённого консалтинга.</p><p>Еще один ведущий наш вид деятельности, который активно набирает обороты, – это информационная безопасность: <a href=\"/uslugi/podderzhka-sajta/lechenie-sajtov\">лечение сайтов от вирусов</a>, поиск уязвимого кода и защита от взлома.</p><div class=\"raw-html-embed\"><div class=\"center\">\r\n    <a class=\"btn\" href=\"/#portfolio\">ПОРТФОЛИО</a> <a class=\"btn\" href=\"/#zakaz\">Сделать сайт</a>\r\n</div></div>', 1, 'images/sozdanie-saitov/sozdanie-sajtov.jpg', '2023-03-25 12:25:50', '2023-03-25 13:32:43');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Слайдер', '2022-10-26 08:13:19', '2022-10-26 08:13:19'),
(2, 'Полоса', '2023-03-19 10:12:27', '2023-03-19 11:15:39'),
(3, 'Главная статья', '2023-03-25 12:23:22', '2023-03-25 12:23:22');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

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
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
