-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 20 2023 г., 15:02
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
-- Структура таблицы `calc_categories`
--

CREATE TABLE `calc_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calc_classes_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_categories`
--

INSERT INTO `calc_categories` (`id`, `title`, `created_at`, `updated_at`, `calc_classes_id`) VALUES
(2, 'Интернет-магазин', '2023-04-10 10:26:53', '2023-04-10 13:46:13', 2),
(3, 'Каталог товаров', '2023-04-14 04:54:59', '2023-04-14 04:54:59', 2),
(4, 'Сайт-портал', '2023-04-14 04:55:38', '2023-04-14 04:55:38', 2),
(5, 'Landing page', '2023-04-14 04:56:04', '2023-04-14 04:56:04', 2),
(6, 'Сайт-визитка', '2023-04-14 04:56:17', '2023-04-14 04:56:17', 2),
(8, 'Информационный сайт', '2023-04-14 04:56:58', '2023-04-14 04:56:58', 2),
(9, 'Веб-программирование', '2023-04-14 04:57:11', '2023-04-14 04:57:11', 2),
(10, 'Корпоративный сайт', '2023-04-14 04:57:26', '2023-04-14 04:57:26', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `calc_classes`
--

CREATE TABLE `calc_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_classes`
--

INSERT INTO `calc_classes` (`id`, `description`, `created_at`, `updated_at`, `title`) VALUES
(2, 'btn1', '2023-04-05 13:38:52', '2023-04-18 10:59:25', 'btn1'),
(3, 'cms-joomla', '2023-04-10 10:28:44', '2023-04-10 10:28:44', 'cms-joomla'),
(4, 'Без класса', '2023-04-14 04:59:30', '2023-04-14 04:59:30', 'Без класса'),
(5, 'opencart', '2023-04-14 06:32:19', '2023-04-14 06:32:19', 'opencart');

-- --------------------------------------------------------

--
-- Структура таблицы `calc_items`
--

CREATE TABLE `calc_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calc_title_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `calc_module_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calc_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_items`
--

INSERT INTO `calc_items` (`id`, `calc_title_id`, `price`, `description`, `calc_module_id`, `created_at`, `updated_at`, `calc_category_id`) VALUES
(2, 2, 50.00, '435345', 5, '2023-04-14 04:52:59', '2023-04-14 05:30:02', 3),
(3, 3, 90.00, NULL, 5, '2023-04-14 05:29:55', '2023-04-14 05:29:55', 3),
(4, 4, 0.00, NULL, 5, '2023-04-14 06:58:22', '2023-04-14 06:58:22', 3),
(5, 7, 400.00, NULL, 5, '2023-04-14 07:13:06', '2023-04-14 07:13:06', 3),
(6, 2, 500.00, NULL, 5, '2023-04-14 12:31:37', '2023-04-14 12:31:37', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `calc_modules`
--

CREATE TABLE `calc_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_modules`
--

INSERT INTO `calc_modules` (`id`, `title`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Создание интернет-сайтов под ключ цены', 'Наши экспресс-цены – это стоимость по которым мы предлагаем концепцию с точки зрения нашего опыта и наработок без вмешательства Заказчика в ядро функциональности. Если Вам требуется строго индивидуальный функционал и макет по техническому заданию, то стоимость будет договорная по человеко-часам, согласно среднему тарифу на разработку сайта – 30-50р. час в зависимости от вида работ.', 1, '2023-04-09 05:20:03', '2023-04-09 15:07:12'),
(6, 'Программирование на Laravel цена, стоимость в Минске', 'Стоимость услуг php-программиста договорная по человеко-часам, по тарифу 10-20р. час в зависимости от вида работ.', 2, '2023-04-09 05:22:40', '2023-04-09 15:07:49');

-- --------------------------------------------------------

--
-- Структура таблицы `calc_titles`
--

CREATE TABLE `calc_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calc_classes_id` bigint(20) UNSIGNED NOT NULL,
  `calc_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_titles`
--

INSERT INTO `calc_titles` (`id`, `title`, `created_at`, `updated_at`, `calc_classes_id`, `calc_type_id`) VALUES
(2, 'Верстка дизайна', '2023-04-10 14:35:52', '2023-04-14 04:59:13', 2, 16),
(3, 'Наполнение', '2023-04-14 05:01:08', '2023-04-14 05:01:08', 4, 20),
(4, 'Установка и настройка системы управления CMS:', '2023-04-14 06:29:37', '2023-04-14 06:46:00', 4, 21),
(7, 'OpenCart ocStore', '2023-04-14 07:12:45', '2023-04-14 07:12:45', 5, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `calc_types`
--

CREATE TABLE `calc_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_types`
--

INSERT INTO `calc_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(16, 'radio', '2023-04-06 04:55:51', '2023-04-06 04:55:51'),
(20, 'checkbox', '2023-04-06 04:59:08', '2023-04-06 04:59:08'),
(21, 'Без типа', '2023-04-14 06:06:04', '2023-04-14 06:06:04');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(1, 'Создание сайтов', 'sozdanie-saitov', 'Создание сайтов', 'Создание сайтов', '2023-04-02 08:09:14', '2023-04-02 08:09:14'),
(2, 'Разработка сайта', 'razrabotka-saita', 'Разработка сайта', 'Разработка сайта', '2023-04-09 05:50:43', '2023-04-09 05:50:43');

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
(4, '2022_01_26_133221_create_categories_table', 1),
(5, '2022_02_08_074825_create_posts_table', 1),
(6, '2022_02_08_082435_create_types_table', 1),
(7, '2023_01_26_101313_create_modules_table', 1),
(8, '2023_03_02_090526_create_calc_titles_table', 1),
(9, '2023_03_02_092232_create_calc_classes_table', 1),
(10, '2023_03_02_092523_create_calc_types_table', 1),
(11, '2023_03_03_095124_create_calc_modules_table', 1),
(12, '2023_04_03_085935_create_calc_items_table', 1),
(13, '2023_04_04_155156_add_title_to_calc_class_table', 2),
(14, '2023_04_10_111555_create_calc_categories_table', 3),
(15, '2023_04_10_131713_add_class_id_to_calc_categories', 4),
(16, '2023_04_10_170911_add_class_id_adn_type_id_to_calc_titles', 5),
(17, '2023_04_11_152003_correct_fields_to_calc_items', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`id`, `title`, `desc`, `type_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '6 ПРИЧИН СДЕЛАТЬ, ЗАКАЗАТЬ САЙТ У НАС', '<p>45345345</p>', 4, 1, '2023-04-02 08:55:58', '2023-04-02 08:55:58');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `type_id`, `description`, `content`, `category_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Создание сайтов', 'sozdanie-saitov-slaider', 1, NULL, '<p>Веб-студия «БайВеб» оказывает весь спектр услуг по профессиональной разработке веб-сайтов под ключ с нуля.</p><h3>Разработка эффективного сайта</h3><h3><a href=\"tel:+375295573639\">+375&nbsp;(29) 557-36-39 (МТС)</a></h3><div class=\"raw-html-embed\"><p>\r\n    <a class=\"btn-slider\" href=\"#zakaz\">Заказать сайт</a>\r\n</p></div>', 1, 'images/sozdanie-saitov/sozdanie-saytov-v-minske.jpg', '2023-04-02 08:19:51', '2023-04-14 04:40:44'),
(2, 'Landing page', 'landing-page', 2, NULL, '<p>Продающий сайт с системой управления и адаптивным дизайном под контекстную рекламу.</p>', 1, NULL, '2023-04-02 08:34:49', '2023-04-02 08:35:33'),
(3, 'Корпоративный сайт', 'korporativnyi-sait', 2, NULL, '<p>Изготовление сайта компании с новостным блогом, адаптивным дизайном и регистрацией.</p>', 1, NULL, '2023-04-02 08:44:42', '2023-04-02 08:44:42'),
(4, 'Интернет-магазин', 'internet-magazin', 2, NULL, '<p>Разработка сайта магазина с корзиной товаров или без – каталога продукции (витрина товаров).</p>', 1, NULL, '2023-04-02 08:45:03', '2023-04-02 08:45:03'),
(5, 'Сайт-визитка', 'sait-vizitka', 2, NULL, '<p>Создание продающего сайта под ключ в виде 5-10 продающих страниц, адаптивный дизайн.</p>', 1, NULL, '2023-04-02 08:45:22', '2023-04-02 08:45:22'),
(6, 'Разработка сайта', 'razrabotka-saita', 3, NULL, '<p>Студия ByWeb оказывает полный цикл услуг – создания сайтов под ключ, раскрутка по регионам Беларуси: Брест, Витебск, Гомель, Гродно, Могилев, Минск и России: Москва, СПБ. За годы непрерывного обучения и практики накопился опыт, который мы стараемся воплощать в своих проектах. Основной акцент – аналитика, юзабилити, оптимизация сайта и доступная подача контента для потребителя. Первоначально мы делаем оптимизацию, поэтому дальнейшее позиционирование в поисковых системах не будут затратными.</p><p>Поскольку клиентская база у нас на абонентском обслуживании более 50 отечественных и зарубежных компаний, мы понимаем всю ответственность своей работы и гарантировано реагируем на все заявки в рамках оказываемой <a href=\"https://byweb.by/uslugi/podderzhka-sajta\">технической поддержки</a>, что строго прописывается в договорных обязательствах с учётом штрафных санкций и сроков их исполнения. Клиенты, работающие с нами, получают полное <a href=\"https://byweb.by/uslugi/podderzhka-sajta\">сопровождение</a> на всех этапах работы в виде интерактивного удалённого консалтинга.</p><p>Еще один ведущий наш вид деятельности, который активно набирает обороты, – это информационная безопасность: <a href=\"https://byweb.by/uslugi/podderzhka-sajta/lechenie-sajtov\">лечение сайтов от вирусов</a>, поиск уязвимого кода и защита от взлома.</p><div class=\"raw-html-embed\"><div data-aos=\"flip-left\" data-aos-once=\"false\">\r\n<a class=\"btn\" href=\"#portfolio\">ПОРТФОЛИО</a> \r\n<a class=\"btn\" href=\"#zakaz\" data-aos=\"flip-left\" data-aos-once=\"false\" data-aos-delay=\"300\">Сделать сайт</a>\r\n</div></div>', 1, 'images/sozdanie-saitov/sozdanie-sajtov.jpg', '2023-04-02 08:47:30', '2023-04-02 08:49:57'),
(7, 'Техническое задание', 'texniceskoe-zadanie', 4, '1', '<p>Написание технического задания с учётом глубокого анализа конкурентов и статистики запросов.</p><p><a href=\"https://byweb.by/uslugi/tekhnicheskoe-zadanie\"><strong>Подробнее</strong></a></p>', 1, NULL, '2023-04-02 08:51:06', '2023-04-02 08:56:45'),
(8, 'Оптимизация сайтов', 'optimizaciya-saitov', 4, '2', '<p>Сделаем продающий проект на базе аналитики с поисковой оптимизацией под ключевые слова.</p><ul><li><a href=\"https://byweb.by/uslugi/optimizatsiya-sajta\"><strong>Перейти</strong></a></li></ul>', 1, NULL, '2023-04-02 08:52:47', '2023-04-02 08:52:47'),
(9, '43534534', '4543543', 5, '4444', '<p>55555</p>', 1, 'images/sozdanie-saitov/400botwb.jpg', '2023-04-02 08:57:44', '2023-04-02 08:57:44'),
(10, '45443', '43534', 5, '34565464', '<p>54645654645</p>', 2, 'images/sozdanie-saitov/sozdanie-saytov-v-minske.jpg', '2023-04-02 08:58:15', '2023-04-09 06:19:44');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Слайдер', '2023-04-02 08:19:16', '2023-04-02 08:19:16'),
(2, 'Полоса', '2023-04-02 08:34:10', '2023-04-02 08:34:10'),
(3, 'Главная статья', '2023-04-02 08:45:56', '2023-04-02 08:45:56'),
(4, 'Почему мы', '2023-04-02 08:50:27', '2023-04-02 08:50:27'),
(5, 'Галерея', '2023-04-02 08:57:06', '2023-04-02 08:57:06');

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
-- Индексы таблицы `calc_categories`
--
ALTER TABLE `calc_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calc_categories_title_unique` (`title`),
  ADD KEY `calc_categories_calc_classes_id_foreign` (`calc_classes_id`);

--
-- Индексы таблицы `calc_classes`
--
ALTER TABLE `calc_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calc_classes_title_unique` (`title`);

--
-- Индексы таблицы `calc_items`
--
ALTER TABLE `calc_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calc_items_calc_title_id_foreign` (`calc_title_id`),
  ADD KEY `calc_items_calc_module_id_foreign` (`calc_module_id`),
  ADD KEY `calc_items_calc_category_id_foreign` (`calc_category_id`);

--
-- Индексы таблицы `calc_modules`
--
ALTER TABLE `calc_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calc_modules_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `calc_titles`
--
ALTER TABLE `calc_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calc_titles_title_unique` (`title`),
  ADD KEY `calc_titles_calc_classes_id_foreign` (`calc_classes_id`),
  ADD KEY `calc_titles_calc_type_id_foreign` (`calc_type_id`);

--
-- Индексы таблицы `calc_types`
--
ALTER TABLE `calc_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calc_types_title_unique` (`title`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_type_id_foreign` (`type_id`),
  ADD KEY `modules_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_title_unique` (`title`);

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
-- AUTO_INCREMENT для таблицы `calc_categories`
--
ALTER TABLE `calc_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `calc_classes`
--
ALTER TABLE `calc_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `calc_items`
--
ALTER TABLE `calc_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `calc_modules`
--
ALTER TABLE `calc_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `calc_titles`
--
ALTER TABLE `calc_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `calc_types`
--
ALTER TABLE `calc_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `calc_categories`
--
ALTER TABLE `calc_categories`
  ADD CONSTRAINT `calc_categories_calc_classes_id_foreign` FOREIGN KEY (`calc_classes_id`) REFERENCES `calc_classes` (`id`);

--
-- Ограничения внешнего ключа таблицы `calc_items`
--
ALTER TABLE `calc_items`
  ADD CONSTRAINT `calc_items_calc_category_id_foreign` FOREIGN KEY (`calc_category_id`) REFERENCES `calc_categories` (`id`),
  ADD CONSTRAINT `calc_items_calc_module_id_foreign` FOREIGN KEY (`calc_module_id`) REFERENCES `calc_modules` (`id`),
  ADD CONSTRAINT `calc_items_calc_title_id_foreign` FOREIGN KEY (`calc_title_id`) REFERENCES `calc_titles` (`id`);

--
-- Ограничения внешнего ключа таблицы `calc_modules`
--
ALTER TABLE `calc_modules`
  ADD CONSTRAINT `calc_modules_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `calc_titles`
--
ALTER TABLE `calc_titles`
  ADD CONSTRAINT `calc_titles_calc_classes_id_foreign` FOREIGN KEY (`calc_classes_id`) REFERENCES `calc_classes` (`id`),
  ADD CONSTRAINT `calc_titles_calc_type_id_foreign` FOREIGN KEY (`calc_type_id`) REFERENCES `calc_types` (`id`);

--
-- Ограничения внешнего ключа таблицы `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `modules_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
