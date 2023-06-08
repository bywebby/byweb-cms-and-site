-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 06 2023 г., 11:28
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_classes`
--

INSERT INTO `calc_classes` (`id`, `created_at`, `updated_at`, `title`) VALUES
(2, '2023-04-05 13:38:52', '2023-04-18 10:59:25', 'btn1'),
(3, '2023-04-10 10:28:44', '2023-04-29 05:29:37', 'joomla'),
(4, '2023-04-14 04:59:30', '2023-04-14 04:59:30', 'Без класса'),
(5, '2023-04-14 06:32:19', '2023-04-21 10:50:19', 'opencart'),
(6, '2023-04-21 11:02:55', '2023-04-21 11:02:55', 'wp'),
(7, '2023-04-29 05:34:41', '2023-04-29 05:34:41', 'bitrix'),
(8, '2023-04-29 05:43:59', '2023-04-29 05:47:11', 'laravel'),
(10, '2023-04-29 05:47:36', '2023-04-29 05:47:36', 'php');

-- --------------------------------------------------------

--
-- Структура таблицы `calc_items`
--

CREATE TABLE `calc_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calc_title_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `calc_module_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calc_category_id` bigint(20) UNSIGNED NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calc_items`
--

INSERT INTO `calc_items` (`id`, `calc_title_id`, `price`, `calc_module_id`, `created_at`, `updated_at`, `calc_category_id`, `checked`, `status`) VALUES
(2, 2, 50.00, 6, '2023-04-14 04:52:59', '2023-05-24 09:27:08', 3, 1, 1),
(3, 3, 90.00, 6, '2023-04-14 05:29:55', '2023-05-24 09:28:45', 3, 0, 1),
(4, 4, 0.00, 6, '2023-04-14 06:58:22', '2023-05-24 09:28:59', 3, 0, 1),
(5, 7, 400.00, 6, '2023-04-14 07:13:06', '2023-05-24 09:29:14', 3, 1, 1),
(6, 2, 390.00, 5, '2023-04-14 12:31:37', '2023-04-24 06:42:49', 5, 1, 1),
(8, 7, 500.00, 5, '2023-04-20 10:18:29', '2023-04-27 10:21:00', 2, 1, 1),
(9, 2, 500.00, 5, '2023-04-20 10:29:30', '2023-04-20 10:29:30', 6, 1, 1),
(10, 8, 500.00, 6, '2023-04-21 11:04:21', '2023-05-24 09:29:43', 3, 0, 1),
(11, 3, 391.00, 5, '2023-04-29 05:22:14', '2023-04-29 05:27:42', 5, 0, 1),
(12, 9, 130.00, 5, '2023-04-29 05:25:12', '2023-04-29 05:25:12', 5, 1, 1),
(13, 8, 150.00, 5, '2023-04-29 05:28:59', '2023-04-29 05:28:59', 5, 0, 1),
(14, 10, 700.00, 5, '2023-04-29 05:35:26', '2023-04-29 05:35:26', 5, 0, 1),
(15, 11, 1500.00, 5, '2023-04-29 05:46:02', '2023-04-29 05:46:02', 5, 0, 1),
(16, 12, 2500.00, 5, '2023-04-29 06:01:00', '2023-04-29 06:01:49', 5, 0, 1),
(17, 13, 0.00, 5, '2023-04-29 06:11:22', '2023-04-29 06:11:22', 5, 0, 1),
(18, 14, 34.00, 5, '2023-04-29 06:13:50', '2023-04-29 06:13:50', 5, 0, 1),
(19, 15, 12.00, 5, '2023-04-29 06:14:12', '2023-04-29 06:14:12', 5, 0, 1),
(20, 2, 190.00, 5, '2023-05-19 04:19:10', '2023-05-19 04:19:10', 4, 1, 1),
(21, 16, 5000.00, 5, '2023-05-19 04:22:42', '2023-05-19 04:22:42', 4, 0, 1),
(22, 17, 150.00, 5, '2023-05-19 04:24:33', '2023-05-19 04:24:33', 4, 0, 1),
(23, 18, 190.00, 5, '2023-05-19 04:25:25', '2023-05-19 04:25:25', 4, 0, 1),
(24, 4, 0.00, 5, '2023-05-19 04:26:36', '2023-05-19 04:26:36', 4, 0, 1),
(25, 9, 150.00, 5, '2023-05-19 04:27:03', '2023-05-19 04:38:12', 4, 1, 1),
(26, 8, 200.00, 5, '2023-05-19 04:27:21', '2023-05-19 04:27:21', 4, 0, 1);

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
(2, 'Верстка дизайна', '2023-04-10 14:35:52', '2023-04-29 05:32:28', 4, 20),
(3, 'Наполнение', '2023-04-14 05:01:08', '2023-04-14 05:01:08', 4, 20),
(4, 'Установка и настройка системы управления CMS:', '2023-04-14 06:29:37', '2023-04-14 06:46:00', 4, 21),
(7, 'OpenCart ocStore', '2023-04-14 07:12:45', '2023-04-14 07:12:45', 5, 16),
(8, 'WordPress', '2023-04-21 11:03:19', '2023-04-21 11:03:19', 6, 16),
(9, 'Joomla', '2023-04-29 05:24:29', '2023-04-29 05:26:06', 3, 16),
(10, '1с-Битрикс', '2023-04-29 05:33:45', '2023-04-29 05:36:16', 7, 16),
(11, 'Фреймворк Laravel', '2023-04-29 05:45:26', '2023-04-29 05:45:26', 8, 16),
(12, 'Нативный php', '2023-04-29 05:48:39', '2023-04-29 05:48:39', 10, 16),
(13, 'Веб-сервер', '2023-04-29 06:10:57', '2023-04-29 06:13:09', 4, 20),
(14, 'Доменное имя', '2023-04-29 06:12:40', '2023-04-29 06:12:40', 4, 20),
(15, 'Хостинг на месяц', '2023-04-29 06:12:58', '2023-04-29 06:12:58', 4, 20),
(16, 'Доска объявлений', '2023-05-19 04:21:53', '2023-05-19 04:21:53', 4, 20),
(17, 'Новостной блог', '2023-05-19 04:23:47', '2023-05-19 04:23:47', 4, 20),
(18, 'Форум', '2023-05-19 04:24:59', '2023-05-19 04:24:59', 4, 20);

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
(1, 'Создание сайтов', 'sozdanie-saitov', 'Создание сайтов', 'Разработка сайтов в Минск под ключ', '2023-04-02 08:09:14', '2023-05-22 06:47:18'),
(2, 'Разработка сайта', 'razrabotka-saita', 'Разработка сайта', 'Разработка сайта', '2023-04-09 05:50:43', '2023-05-24 07:57:29');

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
(17, '2023_04_11_152003_correct_fields_to_calc_items', 6),
(18, '2023_04_20_090036_add_cheked_to_calc_items', 7),
(19, '2023_04_29_084000_del_field_description_to_calc_classes', 8),
(20, '2023_04_29_090405_del_fields_description_to_calc_items', 9),
(21, '2023_05_18_082137_add_field_is_admin_to_users', 10);

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
(1, '6 ПРИЧИН СДЕЛАТЬ, ЗАКАЗАТЬ САЙТ У НАС', NULL, 4, 1, '2023-04-02 08:55:58', '2023-05-24 07:56:00'),
(2, 'Как сделать сайт на заказ', '<p>Рекомендуем заранее подготовить информацию, которую вы планируете разместить на интернет-площадке. Сгруппируйте её по папкам, сохраните в архив и отправьте на почту info@byweb.by</p>', 7, 1, '2023-05-24 06:39:02', '2023-05-24 06:39:02'),
(3, 'ОТЗЫВЫ ПО РАЗРАБОТКЕ САЙТА', NULL, 8, 1, '2023-05-25 05:18:23', '2023-05-26 04:37:32');

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
(1, 'Создание сайтов', 'sozdanie-saitov-slaider', 1, NULL, '<p>Веб-студия «БайВеб» оказывает весь спектр услуг по профессиональной разработке веб-сайтов под ключ с нуля.</p><h3>Разработка эффективного сайта</h3><h3><a href=\"tel:+375295573639\">+375&nbsp;(29) 557-36-39 (МТС)</a></h3><div class=\"raw-html-embed\"><p>\r\n    <a class=\"btn-slider\" href=\"#zakaz\">Заказать сайт</a>\r\n</p></div>', 1, 'images/sozdanie-saitov/sozdanie-saytov-v-minske.jpg', '2023-04-02 08:19:51', '2023-05-19 05:43:57'),
(2, 'Landing page', 'landing-page', 2, 'fa fa-wallet', '<p>Продающий сайт с системой управления и адаптивным дизайном под контекстную рекламу.</p>', 1, NULL, '2023-04-02 08:34:49', '2023-06-01 12:33:52'),
(3, 'Корпоративный сайт', 'korporativnyi-sait', 2, 'fa fa-building-flag', '<p>Изготовление сайта компании с новостным блогом, адаптивным дизайном и регистрацией.</p>', 1, NULL, '2023-04-02 08:44:42', '2023-06-01 12:33:01'),
(4, 'Интернет-магазин', 'internet-magazin', 2, 'fa fa-cart-plus\r\n|\r\n#', '<p>Разработка сайта магазина с корзиной товаров или без – каталога продукции (витрина товаров).</p>', 1, NULL, '2023-04-02 08:45:03', '2023-05-29 08:33:12'),
(5, 'Сайт-визитка', 'sait-vizitka', 2, 'fa fa-id-card|#', '<p>Создание продающего сайта под ключ в виде 5-10 продающих страниц, адаптивный дизайн.</p>', 1, NULL, '2023-04-02 08:45:22', '2023-05-29 08:39:17'),
(6, 'Разработка сайта', 'razrabotka-saita', 3, NULL, '<p>Студия ByWeb оказывает полный цикл услуг – создания сайтов под ключ, раскрутка по регионам Беларуси: Брест, Витебск, Гомель, Гродно, Могилев, Минск и России: Москва, СПБ. За годы непрерывного обучения и практики накопился опыт, который мы стараемся воплощать в своих проектах. Основной акцент – аналитика, юзабилити, оптимизация сайта и доступная подача контента для потребителя. Первоначально мы делаем оптимизацию, поэтому дальнейшее позиционирование в поисковых системах не будут затратными.</p><p>Поскольку клиентская база у нас на абонентском обслуживании более 50 отечественных и зарубежных компаний, мы понимаем всю ответственность своей работы и гарантировано реагируем на все заявки в рамках оказываемой <a href=\"https://byweb.by/uslugi/podderzhka-sajta\">технической поддержки</a>, что строго прописывается в договорных обязательствах с учётом штрафных санкций и сроков их исполнения. Клиенты, работающие с нами, получают полное <a href=\"https://byweb.by/uslugi/podderzhka-sajta\">сопровождение</a> на всех этапах работы в виде интерактивного удалённого консалтинга.</p><p>Еще один ведущий наш вид деятельности, который активно набирает обороты, – это информационная безопасность: <a href=\"https://byweb.by/uslugi/podderzhka-sajta/lechenie-sajtov\">лечение сайтов от вирусов</a>, поиск уязвимого кода и защита от взлома.</p><div class=\"raw-html-embed\"><div data-aos=\"flip-left\" data-aos-once=\"false\">\r\n<a class=\"btn\" href=\"#portfolio\">ПОРТФОЛИО</a> \r\n<a class=\"btn\" href=\"#zakaz\" data-aos=\"flip-left\" data-aos-once=\"false\" data-aos-delay=\"300\">Сделать сайт</a>\r\n</div></div>', 1, 'images/sozdanie-saitov/sozdanie-sajtov.jpg', '2023-04-02 08:47:30', '2023-04-02 08:49:57'),
(7, 'Техническое задание', 'texniceskoe-zadanie', 4, 'fa fa-align-justify', '<p>Написание технического задания с учётом глубокого анализа конкурентов и статистики запросов.</p><p><a href=\"https://byweb.by/uslugi/tekhnicheskoe-zadanie\"><strong>Подробнее</strong></a></p>', 1, NULL, '2023-04-02 08:51:06', '2023-05-29 08:42:51'),
(8, 'Оптимизация сайтов', 'optimizaciya-saitov', 4, 'fa fa-gauge', '<p>Сделаем продающий проект на базе аналитики с поисковой оптимизацией под ключевые слова.</p><p><a href=\"https://byweb.by/uslugi/optimizatsiya-sajta\"><strong>Перейти</strong></a></p>', 1, NULL, '2023-04-02 08:52:47', '2023-05-29 08:43:13'),
(9, 'Сайт объявлений', 'httpsobyavleniyaby', 5, 'https://obyavleniya.by/', '<p>https://obyavleniya.by/</p>', 1, 'images/sozdanie-saitov/400botwb.jpg', '2023-04-02 08:57:44', '2023-05-19 05:25:16'),
(10, 'Белаэронавигация', 'httpswwwbanby', 5, 'https://www.ban.by/', '<p>https://www.ban.by/</p>', 1, 'images/razrabotka-saita/400sozdanie-sajta-banby.jpg', '2023-04-02 08:58:15', '2023-05-19 05:37:37'),
(11, 'Создание сайтов по доступным ценам', 'main-under-price', 6, NULL, '<p>Цена на разработку сайта — это один из ключевых вопросов, интересующих многих потенциальных клиентов. Однако ответить на него можно, лишь получив предварительное видение задач сайта, функционала: каталога товаров, интернет-магазина, продающий сайт или сайт компании.</p><p>Опыт показывает: в природе не существует двух идентичных сайтов. Поэтому расчет стоимости и сроков реализации производится лишь после получения исходной информации от клиента.</p><p>В своей деятельности мы используем одну из самых прозрачных схем ценообразования сайта – заказчики должны чётко понимать за что платят деньги и по каким тарифам.</p><h3>Стоимость сайта</h3><p>Для кого-то стоимость должна быть как можно меньше, т.к. лишь начинает свой бизнес и не может вложить большое количество средств. Для других, наоборот – этот показатель качества и опыта фирмы. Но одно можно сказать исходя из опыта: цены очень разные, но все же чем выше, тем лучше. <strong>Почему?</strong> Платя низкую стоимость, Вы можете переплатить потом гораздо больше за различные доработки и исправления, тем более, если будете обращаться к другому программисту, т.к. порой бывает очень сложно разобраться в чужом коде.</p>', 1, 'images/razrabotka-saita/razrabotka-sajta-dlya-biznessa.jpg', '2023-05-19 04:54:06', '2023-05-19 05:01:15'),
(12, 'Разработка каталога продукции', 'razrabotka-kataloga-produkcii', 5, NULL, '<p>http://www.galsoptics.com/</p>', 1, 'images/razrabotka-saita/400gals-optic.jpg', '2023-05-22 06:51:09', '2023-05-22 06:51:43'),
(13, 'Выбор дизайна', 'vibor-design-main', 7, NULL, '<p>Укажите пример на создания веб-ресурса в сети Интернет, который вам понравился, и мы сделаем расчет стоимости аналога.</p>', 1, 'images/sozdanie-saitov/feature-1.jpg', '2023-05-24 06:43:31', '2023-05-24 06:43:31'),
(14, 'Согласование', 'soglasovanie', 7, NULL, '<p>Подпишите документы – договор на веб-разработку, продвижения и техническую поддержку.</p>', 1, 'images/sozdanie-saitov/feature-2.jpg', '2023-05-24 06:44:07', '2023-05-24 06:44:07'),
(15, 'Получение КП', 'poluchenie-kp', 7, NULL, '<p>Получите предложение и согласуйте будущий веб-дизайн, этапы работ, сопровождение.</p>', 1, 'images/sozdanie-saitov/feature-3.jpg', '2023-05-24 06:44:43', '2023-05-24 06:44:43'),
(16, 'Веб-программист Laravel', 'slider-programmer', 1, NULL, '<p>Веб-студия «БайВеб» оказывает весь спектр услуг по профессиональной веб-разработке приложений на Laravel под ключ</p><h3>Разработка эффективного сайта</h3><h3><a href=\"tel:+375295573639\">+375&nbsp;(29) 557-36-39 (МТС)</a></h3><div class=\"raw-html-embed\">\r\n            \r\n        \r\n    <p>\r\n                            <a class=\"btn-slider\" href=\"#zakaz\">Заказать проект</a>\r\n                    \r\n            \r\n    </p>\r\n</div>', 2, 'images/razrabotka-saita/web-programmist.jpg', '2023-05-24 08:00:24', '2023-05-24 09:42:11'),
(17, 'Интернет-магазин с фильтрацией товаров EvroTruba.by', 'evrotrubaby', 5, 'http://evrotruba.by/', '<p>http://evrotruba.by/</p>', 1, 'images/sozdanie-saitov/400evrotruba.jpg', '2023-05-24 09:52:38', '2023-05-24 09:52:38'),
(18, 'Сайт объявлений', 'ads', 5, 'https://obyavleniya.by/', '<p>https://obyavleniya.by/</p>', 1, 'images/sozdanie-saitov/400kupit-kvartiru.jpg', '2023-05-24 09:53:49', '2023-05-24 09:53:49'),
(19, 'Yartruba', 'yartruba', 5, '#', '<p>#</p>', 1, 'images/sozdanie-saitov/400yartruba-mini.jpg', '2023-05-24 09:54:46', '2023-05-24 09:54:46'),
(20, 'Vprok-tur', 'vprok-tur', 5, '#', '<p>#</p>', 1, 'images/sozdanie-saitov/400mini-vprok-tur.jpg', '2023-05-24 09:55:27', '2023-05-25 04:34:31'),
(22, 'Председатель Ассоциации застройщиков Беларуси', 'a-z', 8, '#', '<p>Благодарим Byweb за оказание услуг – это проектирование структуры и создание эффективного сайта и оригинальный творческий подход в улучшении по позициям в поисковой выдачи.</p>', 1, 'images/sozdanie-saitov/otzyv-sozdanie-sajta-az-mini.jpg', '2023-05-25 06:38:27', '2023-05-26 04:04:05'),
(23, 'Начальник управления КГБ', 'kgb', 8, NULL, '<p>От имени главного управления КГБ Республики Беларусь благодарим за индивидуальный подход и оперативность в оказании содействия в сфере услуги – изготовление корпоративных сайтов.</p>', 1, 'images/sozdanie-saitov/otzyv-kgb-mini.jpg', '2023-05-26 04:11:54', '2023-05-26 04:11:54'),
(24, 'ЧТУП \"Оазис Холода\"', 'oazis', 8, NULL, '<p>Работали с агентством сделали всё качественно. Запустили несколько сайтов и уже через два месяца поступали заказы - это связано с тем, что нужно было время на рост позиций в поисковых системах.</p>', 1, 'images/razrabotka-saita/otzyv-sozdanie-sajta-oh-mini.jpg', '2023-05-27 04:27:51', '2023-05-27 04:28:45'),
(25, 'Заказать создание сайта под ключ в Минске', 'home-zakaz', 9, NULL, '<p>Всегда рады ответить на все вопросы.</p>', 1, NULL, '2023-05-27 15:49:47', '2023-05-27 15:49:47'),
(26, 'ЗАКАЗАТЬ ВЕБ-ОРИЕНТИРОВАННОЕ ПРИЛОЖЕНИЕ НА LARAVEL', 'zakaz-laravel', 9, NULL, '<p>Выполняем работу по тех. заданию</p>', 2, NULL, '2023-06-01 12:38:13', '2023-06-01 12:39:03');

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
(5, 'Галерея', '2023-04-02 08:57:06', '2023-04-02 08:57:06'),
(6, 'Блок под ценами', '2023-05-19 04:43:45', '2023-05-19 04:43:45'),
(7, 'Блок-над-отзывами', '2023-05-24 06:38:40', '2023-05-24 07:17:04'),
(8, 'Отзывы', '2023-05-25 05:02:03', '2023-05-25 05:02:03'),
(9, 'Заголовок подвала', '2023-05-27 15:49:06', '2023-05-27 16:00:22');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'info@byweb.by', NULL, '$2y$10$vI0dM25Or7qDNkUnSxa6O.WAYWijSqDZbOJsAc6Okx8caAf2WgK32', NULL, '2023-05-18 05:51:34', '2023-05-18 05:51:34', 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `calc_items`
--
ALTER TABLE `calc_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `calc_modules`
--
ALTER TABLE `calc_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `calc_titles`
--
ALTER TABLE `calc_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
