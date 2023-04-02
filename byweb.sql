-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 02 2023 г., 12:28
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
(1, 'Главная', 'sozdanie-saitov', 'Создание сайтов', 'Создание сайтов', '2023-03-26 12:21:09', '2023-03-26 12:21:09');

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
(7, '2023_03_26_101313_create_modules_table', 1);

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
(1, '6 ПРИЧИН СДЕЛАТЬ, ЗАКАЗАТЬ САЙТ У НАС', '<p>Краткое описание</p>', 4, 1, '2023-03-26 14:30:28', '2023-03-29 13:32:34'),
(2, 'Создание интернет-сайтов под ключ цены', '<p>Наши экспресс-цены – это стоимость по которым мы предлагаем концепцию с точки зрения нашего опыта и наработок без вмешательства Заказчика в ядро функциональности. Если Вам требуется строго индивидуальный функционал и макет по техническому заданию, то стоимость будет договорная по человеко-часам, согласно среднему тарифу на разработку сайта – 30-50р. час в зависимости от вида работ. &nbsp;</p>', 7, 1, '2023-04-01 12:25:17', '2023-04-01 12:25:17');

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
(1, 'Разработка сайта', 'razrabotka-saita', 1, NULL, '<p>Студия ByWeb оказывает полный цикл услуг – создания сайтов под ключ, раскрутка по регионам Беларуси: Брест, Витебск, Гомель, Гродно, Могилев, Минск и России: Москва, СПБ. За годы непрерывного обучения и практики накопился опыт, который мы стараемся воплощать в своих проектах. Основной акцент – аналитика, юзабилити, оптимизация сайта и доступная подача контента для потребителя. Первоначально мы делаем оптимизацию, поэтому дальнейшее позиционирование в поисковых системах не будут затратными.</p><p>Поскольку клиентская база у нас на абонентском обслуживании более 50 отечественных и зарубежных компаний, мы понимаем всю ответственность своей работы и гарантировано реагируем на все заявки в рамках оказываемой <a href=\"https://byweb.by/uslugi/podderzhka-sajta\">технической поддержки</a>, что строго прописывается в договорных обязательствах с учётом штрафных санкций и сроков их исполнения. Клиенты, работающие с нами, получают полное <a href=\"https://byweb.by/uslugi/podderzhka-sajta\">сопровождение</a> на всех этапах работы в виде интерактивного удалённого консалтинга.</p><p>Еще один ведущий наш вид деятельности, который активно набирает обороты, – это информационная безопасность: <a href=\"https://byweb.by/uslugi/podderzhka-sajta/lechenie-sajtov\">лечение сайтов от вирусов</a>, поиск уязвимого кода и защита от взлома.</p><div class=\"raw-html-embed\"><p class=\"center\">\r\n    <a class=\"btn\" href=\"https://byweb.by/#portfolio\">ПОРТФОЛИО</a> <a class=\"btn\" href=\"https://byweb.by/#zakaz\">Сделать сайт</a>\r\n</p></div>', 1, 'images/glavnaya/sozdanie-sajtov.jpg', '2023-03-26 12:23:05', '2023-03-29 13:34:06'),
(2, 'СОЗДАНИЕ САЙТОВ', 'sozdanie-saitov-slaider', 5, NULL, '<p>Веб-студия «БайВеб» оказывает весь спектр услуг по профессиональной разработке веб-сайтов под ключ с нуля.</p><h3>Разработка эффективного сайта</h3><h3><a href=\"tel:+375295573639\">+375&nbsp;(29) 557-36-39 (МТС)</a></h3><div class=\"raw-html-embed\"><p>\r\n    <a class=\"btn-slider\" href=\"https://byweb.by/#zakaz\">Заказать сайт</a>\r\n</p></div>', 1, 'images/glavnaya/sozdanie-saytov-v-minske.jpg', '2023-03-26 12:32:30', '2023-03-26 12:33:56'),
(3, 'Сопровождение', 'soprovozdenie', 4, '<i class=\"fa-brands fa-facebook\"></i>', '<p>Даём гарантию на весь срок службы сайтов, оперативно решаем поставленные задачи строго в срок.</p><p>ссылка</p>', 1, NULL, '2023-03-26 15:48:08', '2023-03-28 03:28:47'),
(4, 'Дизайн сайтов', 'dizain-saitov', 4, '<i class=\"fa-solid fa-laptop\"></i>', '<p>Вы можете быть уверены в том, что адаптивные шаблоны сайтов подстроятся под любое формат экрана.</p><p><a href=\"#\">ссылка</a></p>', 1, NULL, '2023-03-27 10:22:59', '2023-03-28 04:06:26'),
(5, 'Кроссбраузерность', 'krossbrauzernost', 4, '<i class=\"fa-solid fa-sun\"></i>', '<p>Интерфейс сайтов будет отображаться в любом браузере правильно, благодаря грамотному коду.</p><p><a href=\"https://byweb.by/#portfolio\">Портфолио&nbsp;</a></p>', 1, NULL, '2023-03-29 13:26:37', '2023-03-29 14:08:24'),
(6, 'Техническое задание', 'texniceskoe-zadanie', 4, '<i class=\"fa-solid fa-cart-shopping\"></i>', '<p>Написание технического задания с учётом глубокого анализа конкурентов и статистики запросов.</p>', 1, NULL, '2023-03-29 13:31:02', '2023-03-29 13:31:47'),
(7, 'Landing page', 'landing-page', 3, NULL, '<p>Продающий сайт с системой управления и адаптивным дизайном под контекстную рекламу.</p>', 1, NULL, '2023-03-29 13:34:38', '2023-03-29 13:34:38'),
(8, 'Корпоративный сайт', 'korporativnyi-sait', 3, '<i class=\"fa-solid fa-bag-shopping\"></i>', '<p>Изготовление сайта компании с новостным блогом, адаптивным дизайном и регистрацией.</p>', 1, NULL, '2023-03-29 13:35:03', '2023-03-29 13:43:59'),
(9, 'Интернет-магазин', 'internet-magazin', 3, '<a href=\'#\'><i class=\"fa-solid fa-cart-shopping\"></i></a>', '<p>Разработка сайта магазина с корзиной товаров или без – каталога продукции (витрина товаров).</p>', 1, NULL, '2023-03-29 13:35:25', '2023-03-29 14:05:59'),
(10, 'Сайт-визитка', 'sait-vizitka', 3, NULL, '<p>Создание продающего сайта под ключ в виде 5-10 продающих страниц, адаптивный дизайн.</p>', 1, NULL, '2023-03-29 13:35:44', '2023-03-29 13:35:44'),
(11, 'Сайт объявлений', 'sait-obyavlenii', 6, 'https://obyavleniya.by/', '<p>https://obyavleniya.by/</p>', 1, 'images/glavnaya/400kupit-kvartiru.jpg', '2023-03-30 04:06:04', '2023-03-30 04:27:57'),
(12, 'Белаэронавигация', 'belaeronavigaciya', 6, 'https://www.ban.by', '<p>Белаэронавигация</p>', 1, 'images/glavnaya/400sozdanie-sajta-banby.jpg', '2023-03-30 04:30:19', '2023-03-30 04:30:19'),
(13, 'Интернет-магазин с фильтрацией товаров', 'internet-magazin-s-filtraciei-tovarov', 6, 'http://evrotruba.by', '<p>Интернет-магазин с фильтрацией товаров</p>', 1, 'images/glavnaya/400evrotruba.jpg', '2023-03-30 04:42:49', '2023-03-30 04:42:49'),
(14, 'ООО \"ТехЭксперт\"', 'ooo-texekspert', 6, 'https://byweb.by/portfolio-sajtov/techexpert', '<p>ООО \"ТехЭксперт\"</p>', 1, 'images/glavnaya/4000001expertiza-max2.jpg', '2023-03-30 04:48:19', '2023-03-30 04:48:19'),
(15, 'Wm-ex', 'wm-ex', 6, 'https://bot-webmoney.best-website-development.com/', '<p>https://bot-webmoney.best-website-development.com/</p>', 1, 'images/glavnaya/400botwb.jpg', '2023-03-30 04:51:39', '2023-03-30 04:51:58'),
(16, 'Yartruba', 'yartruba', 6, 'https://byweb.by/portfolio-sajtov/yartruba', '<p>Yartruba</p>', 1, 'images/glavnaya/400yartruba-mini.jpg', '2023-03-30 06:52:29', '2023-03-30 06:53:04'),
(17, 'Vprok tur', 'vprok-tur', 6, 'https://byweb.by/portfolio-sajtov/vprok-tur', '<p>Vprok tur</p>', 1, 'images/glavnaya/400mini-vprok-tur.jpg', '2023-03-30 09:27:57', '2023-03-30 09:27:57'),
(19, 'Сайт-визитка', 'sait-vizitka-cena', 7, '/uslugi/sajt-vizitka', '<div class=\"raw-html-embed\">\r\n<label><input type=\"checkbox\" value=\"50\" name=\"pay1_2\" class=\"pay\" checked=\"\">Создание дизайна</label><br>\r\n<label><input type=\"checkbox\" value=\"30\" name=\"pay1_3\" class=\"pay\" checked=\"\">Наполнение</label><br>\r\n\r\n\r\n<hr>\r\n<p><b>Установка и настройка системы управления CMS:</b></p>\r\n<label><i class=\"joomla\"></i><input type=\"radio\" value=\"150\" name=\"pay1_1\" class=\"pay\" checked=\"\">Joomla</label><br>\r\n<label><i class=\"wp\"></i><input type=\"radio\" value=\"190\" name=\"pay1_1\" class=\"pay\">WordPress</label><br>\r\n<label><i class=\"bitrix\"></i><input type=\"radio\" value=\"900\" name=\"pay1_1\" class=\"pay\">1c-Битрикс</label><br>\r\n<label><i class=\"laravel\"></i><input type=\"radio\" value=\"1200\" name=\"pay1_1\" class=\"pay\">Фреймворк Laravel</label><br>\r\n<label><i class=\"php\"></i><input type=\"radio\" value=\"1700\" name=\"pay1_1\" class=\"pay\">Нативный PHP</label>\r\n\r\n<hr>\r\n<p><b>Веб-сервер:</b></p>\r\n<label><input type=\"checkbox\" value=\"12.7\" name=\"pay1_5\" class=\"pay\">Доменное имя</label><br>\r\n<label><input type=\"checkbox\" value=\"3\" name=\"pay1_6\" class=\"pay\">Хостинг на месяц</label>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</div><p>&nbsp;</p>', 1, NULL, '2023-04-01 12:41:09', '2023-04-01 13:14:50');

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
(1, 'Главная статья', '2023-03-26 09:55:02', '2023-03-26 09:55:02'),
(3, 'Полоса', '2023-03-26 09:55:47', '2023-03-26 09:55:47'),
(4, 'Почему мы', '2023-03-26 09:56:03', '2023-03-26 09:56:03'),
(5, 'Слайдер', '2023-03-26 12:31:23', '2023-03-26 12:31:23'),
(6, 'Галерея', '2023-03-30 04:01:41', '2023-03-30 04:01:41'),
(7, 'Цены', '2023-04-01 12:24:04', '2023-04-01 12:24:04');

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
