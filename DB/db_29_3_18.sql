-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2018 г., 05:25
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Andrey', 'artyshko.andrey@gmail.com', '$2y$10$8KV5zjW2x1hPKXjStQw6YOqAYCqTQ8hGiI7IYm6PmpAvRaWpbQ6Y.', '567890567890', 1, '2018-03-03 17:00:00', '2018-03-27 10:57:12'),
(3, 'Грачёв Алексей Сергеевич', 'admin@example.com', '$2y$10$0ACP7cCwB7wfeUeWB.A8EOm5AHvxcP0lSFdWOgsYwzNKM.bN6mSNS', '899999999999', 1, '2018-03-05 11:44:59', '2018-03-05 11:44:59');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 3, 4, NULL, NULL),
(4, 7, 3, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 1, 1, NULL, NULL),
(8, 2, 1, NULL, NULL),
(9, 2, 3, NULL, NULL),
(10, 2, 4, NULL, NULL),
(11, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'sarthak', 'sarthak', '2017-06-26 00:47:23', '2017-06-26 00:47:23'),
(2, 'bitfumes', 'bitfumes', '2017-06-26 00:47:29', '2017-06-26 00:47:29'),
(3, '123123', '123123123', '2018-03-04 08:57:34', '2018-03-04 08:57:34');

-- --------------------------------------------------------

--
-- Структура таблицы `category_posts`
--

CREATE TABLE `category_posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `categoryable_type` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_posts`
--

INSERT INTO `category_posts` (`post_id`, `category_id`, `categoryable_type`, `created_at`, `updated_at`) VALUES
(180, 2, NULL, '2018-03-10 06:13:00', '2018-03-10 06:13:00'),
(186, 1, NULL, '2018-03-18 02:31:05', '2018-03-18 02:31:05'),
(187, 2, NULL, '2018-03-18 03:23:38', '2018-03-18 03:23:38');

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `name`, `icon`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Электроника', 'icon-energy', 'Lorem', '2018-03-22 17:00:00', NULL),
(3, 'ПОЛИМАТЕМАТИКА', 'icon-notebook', 'Lorem ipsum dolor sit amet.', '2018-03-27 11:14:53', '2018-03-27 11:14:53');

-- --------------------------------------------------------

--
-- Структура таблицы `headers`
--

CREATE TABLE `headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `headers`
--

INSERT INTO `headers` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(5, 'input1', 'Инженерная школа МАОУ \"КУГ № 1 - Универс\"', NULL, NULL),
(6, 'input2', '#ИнженернаяШкола', NULL, NULL),
(7, 'input3', 'Инженерное образование - приоритет - качество - перспектива.', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(24, 3, 170, '2017-08-03 23:24:28', '2017-08-03 23:24:28'),
(25, 3, 169, '2017-08-03 23:24:30', '2017-08-03 23:24:30'),
(26, 3, 167, '2017-08-03 23:24:33', '2017-08-03 23:24:33'),
(27, 2, 169, '2017-08-03 23:25:02', '2017-08-03 23:25:02'),
(28, 2, 170, '2017-08-03 23:25:24', '2017-08-03 23:25:24'),
(29, 2, 168, '2017-08-03 23:25:26', '2017-08-03 23:25:26'),
(31, 2, 166, '2017-08-03 23:25:28', '2017-08-03 23:25:28'),
(32, 2, 164, '2017-08-03 23:25:32', '2017-08-03 23:25:32'),
(33, 2, 163, '2017-08-03 23:25:34', '2017-08-03 23:25:34'),
(34, 4, 169, '2018-03-04 08:52:32', '2018-03-04 08:52:32'),
(35, 4, 170, '2018-03-04 08:52:33', '2018-03-04 08:52:33'),
(36, 4, 168, '2018-03-04 08:52:34', '2018-03-04 08:52:34'),
(37, 4, 167, '2018-03-04 08:52:35', '2018-03-04 08:52:35');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2017_06_19_070344_create_posts_table', 1),
(34, '2017_06_19_070731_create_tags_table', 1),
(35, '2017_06_19_070801_create_categories_table', 1),
(36, '2017_06_19_070824_create_category_posts_table', 1),
(37, '2017_06_19_070923_create_post_tags_table', 1),
(38, '2017_06_19_071000_create_admins_table', 1),
(39, '2017_06_19_071103_create_roles_table', 1),
(40, '2017_06_19_071125_create_admin_roles_table', 1),
(41, '2017_07_22_070234_create_permissions_table', 2),
(42, '2017_08_04_055752_likes', 3),
(43, '2018_03_07_120715_header', 4),
(44, '2018_03_23_163232_create_courses_table', 5),
(45, '2018_03_27_191928_create_plan', 6),
(46, '2018_03_28_085206_create_teachers_table', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `for`, `created_at`, `updated_at`) VALUES
(4, 'Post-Create', 'post', '2017-07-22 01:21:37', '2017-07-22 01:21:37'),
(5, 'Post-update', 'post', '2017-07-22 01:22:27', '2017-07-22 01:22:27'),
(6, 'Post-Delete', 'post', '2017-07-22 01:22:40', '2017-07-22 01:22:40'),
(7, 'User-Create', 'user', '2017-07-22 01:23:05', '2017-07-22 01:23:05'),
(8, 'User-Update', 'user', '2017-07-22 01:23:24', '2017-07-22 01:23:24'),
(9, 'User-Delete', 'user', '2017-07-22 01:23:35', '2017-07-22 01:23:35'),
(10, 'Post-Publish', 'post', '2017-07-22 01:23:51', '2017-07-22 01:23:51'),
(11, 'Tag-CRUD', 'other', '2017-07-22 01:24:12', '2017-07-22 01:24:12'),
(12, 'Category-CRUD', 'other', '2017-07-22 01:24:20', '2017-07-22 01:24:20'),
(13, 'Course-Update', 'course', '2018-03-27 11:00:56', '2018-03-27 11:00:56');

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(3, 6),
(3, 10),
(4, 4),
(4, 5),
(4, 11),
(4, 12),
(5, 4),
(5, 9),
(5, 12),
(1, 6),
(1, 4),
(1, 12),
(1, 5),
(1, 10),
(1, 7),
(1, 8),
(1, 9),
(1, 11),
(1, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `plans`
--

INSERT INTO `plans` (`id`, `title`, `content`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Углублённое изучение предметов', 'Lorem ipsum dolor sit amet.', 8, '2018-03-07 17:00:00', '2018-03-28 01:50:34'),
(2, 'Моделирование и графика', 'Lorem ipsum dolor sit amet.', 8, '2018-03-27 12:55:46', '2018-03-27 12:55:46'),
(3, 'Полипредметные интенсивы', 'Lorem ipsum dolor sit amet.', 8, '2018-03-27 12:56:51', '2018-03-27 12:56:51'),
(4, 'Специализированные курсы', 'Lorem ipsum dolor sit amet.', 8, '2018-03-27 12:57:01', '2018-03-27 12:57:01'),
(5, 'Лабораторные работы', 'Lorem ipsum dolor sit amet.', 8, '2018-03-27 12:57:12', '2018-03-27 12:57:12'),
(6, 'Экскурсии, конференции, олимпиады', 'Lorem ipsum dolor sit amet.', 8, '2018-03-27 12:57:24', '2018-03-27 12:57:24'),
(7, 'Бесплатное обучение', 'Lorem ipsum dolor sit amet.', 8, '2018-03-27 12:57:33', '2018-03-27 12:57:33'),
(8, 'Углублённое изучение предметов', 'Lorem ipsum dolor sit amet.', 10, '2018-03-27 12:57:49', '2018-03-27 12:57:49'),
(9, 'Aнглийский', 'Lorem ipsum dolor sit amet.', 10, '2018-03-27 12:57:59', '2018-03-27 12:57:59'),
(10, 'Моделирование и графика', 'Lorem ipsum dolor sit amet.', 10, '2018-03-27 12:58:11', '2018-03-27 12:58:11'),
(11, 'Полипредметные интенсивы', 'Lorem ipsum dolor sit amet.', 10, '2018-03-27 12:58:31', '2018-03-27 12:58:31'),
(12, 'Специализированные курсы', 'Lorem ipsum dolor sit amet.', 10, '2018-03-27 12:58:47', '2018-03-27 12:58:47'),
(13, 'Лабораторные работы', 'Lorem ipsum dolor sit amet.', 10, '2018-03-27 12:58:57', '2018-03-27 12:58:57'),
(14, 'Экскурсии, конференции, олимпиады', 'Lorem ipsum dolor sit amet.', 10, '2018-03-27 12:59:08', '2018-03-27 12:59:08');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `posted_by` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed` int(255) DEFAULT '0',
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `slug`, `body`, `status`, `posted_by`, `image`, `viewed`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(180, 'Навыки и интересы программистов по всему миру: исследование от HackerRank', 'В исследовании 2018 Developer Skills Report компания HackerRank опросила 39,5 тысяч разработчиков разных стран и возрастов, чтобы выявить главные тренды в их методах обучения, развитии навыков и практике найма. Опрос проходил с 16 октября по 1 ноября 2017 года.', 'navyki-i-interesy-programmistov-po-vsemu-0803181333', '<div class=\"slider\"><img alt=\"\" src=\"http://127.0.0.1:8000/upload/post/DVPylms2LGBRGnA65Lp2.jpg\" /><img alt=\"\" src=\"http://127.0.0.1:8000/upload/post/mqKDufL6bnxwoK2bPQrs.jpg\" /><img alt=\"\" src=\"http://127.0.0.1:8000/upload/post/H0YYutblTgdEwu1ubRhM.jpg\" /><img alt=\"\" src=\"http://127.0.0.1:8000/upload/post/ZX8Ivlkyh9W67qbezirt.jpg\" /></div>', 1, 'Andrey', '9iN6aXLtKWCEr5mk9NIS.jpg', 34, '34234', '234234', '2018-03-08 10:33:17', '2018-03-12 09:44:21'),
(181, 'Подборка хороших книг для программистов', 'В этом посте мы собрали подборку самых популярных книг для разработчиков. Они затрагивают множество различных тем и являются лучшими для старта изучения той или иной технологии.', 'podborka-khoroshikh-knig-dlya-programmistov-0803181335', '<p>В&nbsp;этом посте мы&nbsp;собрали подборку самых популярных книг для разработчиков. Они затрагивают множество различных тем и&nbsp;являются лучшими для старта изучения той или иной технологии.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/Karera-programmista-720x1024.jpg\" style=\"height:280px; width:197px\" title=\"Книга «Карьера программиста»\" /></p>\r\n\r\n<h3>Карьера программиста</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/135945302/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Автором этого пособия является Г. Макдоуэлл, основатель CareerCup и бывший сотрудник таких компаний, как Apple, Google и Microsoft. Книга предназначена для качественной подготовки к предстоящему собеседованию на позицию разработчика программного обеспечения.</p>\r\n\r\n<p>Она сделана в формате &laquo;задача-решение&raquo;: почти 200 вопросов и ответов, большинство из которых автор взял из собственного опыта, покрывают всевозможные темы, в том числе алгоритмы, шаблоны проектирования и многое другое. В целом прочтение &laquo;Cracking the Coding Interview&raquo; точно не будет лишним, и это подтверждает его статус бестселлера.</p>\r\n\r\n<p>Многие задачи из этой книги есть в нашем переводе в <a href=\"https://tproger.ru/category/problems/\" rel=\"noopener follow\" target=\"_blank\">соответствующей рубрике</a> сайта.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/01/U22EnuQtDkA.jpg\" style=\"height:280px; width:226px\" title=\"Книга «24 Deadly Sins of Software Security»\" /></p>\r\n\r\n<h3>24 Deadly Sins of Software Security</h3>\r\n\r\n<p><a href=\"https://goo.gl/rcZY5L\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>В книге &laquo;24 смертных греха компьютерной безопасности&raquo; Майкл Ховард и Дэвид Лебланк, эксперты безопасности Microsoft, рассказывают о наиболее распространенных и серьезных ошибках при создании разнообразного ПО, а также соответствующих &laquo;дырах&raquo;.</p>\r\n\r\n<p><ins><ins><ins><iframe frameborder=\"0\" height=\"117\" id=\"aswift_1\" name=\"aswift_1\" scrolling=\"no\" width=\"468\"></iframe></ins></ins></ins></p>\r\n\r\n<p>Рассмотрено большинство языков и платформ программирования, каждая глава посвящена отдельному типу уязвимости &mdash; &laquo;смертному греху&raquo;.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/01/RYTSli9lIxs.jpg\" style=\"height:280px; width:220px\" title=\"Книга «Artificial Intelligence for Games»\" /></p>\r\n\r\n<h3>Artificial Intelligence for Games</h3>\r\n\r\n<p><a href=\"https://goo.gl/ApC4eG\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Создание качественного и развитого искусственного интеллекта &mdash; одна из самых сложных задач, с которыми сталкиваются разработчики игр. Часто от качества ИИ зависит весь коммерческий успех проекта.</p>\r\n\r\n<p>В этом пособии Ян Миллингтон, известный в игровой индустрии программист и автор серии книг, делится своим опытом создания и улучшения ИИ в самых разнообразных играх. Книга содержит множество реальных примеров, а также исходные коды популярных коммерческих реализаций алгоритмов ИИ. Большое внимание уделено разработке геймплея с упором на искусственный интеллект, реализации поведения персонажей и особенностям разработки игр-головоломок.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/01/o8y5RZ6r-uU.jpg\" style=\"height:280px; width:218px\" title=\"Книга «Mathematics for 3D Game Programming and Computer Graphics»\" /></p>\r\n\r\n<h3>Mathematics for 3D Game Programming and Computer Graphics</h3>\r\n\r\n<p><a href=\"https://goo.gl/yUhEfZ\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Обновленное третье издание рассказывает обо всех математических концептах, которые должен знать современный разработчик компьютерных игр для создания графики и игровых движков на профессиональном уровне.</p>\r\n\r\n<p>Третье издание раскрывает такие темы, как проекции, тени, физика, отрисовка ткани и числовые методы, а весь код полностью соответствует последним спецификациям языка шейдеров.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/01/9fIwBQAAQBAJ-188x300-1-188x300.jpg\" style=\"height:280px; width:175px\" title=\"Книга «Game Programming Patterns»\" /></p>\r\n\r\n<h3>Game Programming Patterns</h3>\r\n\r\n<p><a href=\"http://gameprogrammingpatterns.com/contents.html\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Читать</a>&nbsp;<a href=\"https://goo.gl/tJCMTt\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Самая большая проблема, стоящая перед многими разработчиками игр &mdash; завершение разработки их продукта. Часто проекты &laquo;выдыхаются&raquo;, оказываясь перегруженными сложностью и запутанностью их собственного кода. Эта книга призвана решить эту проблему раз и навсегда.</p>\r\n\r\n<p>&laquo;Game Programming Patterns&raquo; &mdash; это коллекция шаблонов, делающих код (не только игр) чище, проще для понимания и быстрее. Из нее вы узнаете, как создать надежный цикл игры, как организовывать объекты и их компоненты, как использовать кэш процессора для улучшения производительности и многое другое. Вы погрузитесь в изучение не только того, как работают скриптовые движки и как их оптимизировать, но и того, как классические шаблоны проектирования могут быть использованы в разработке игр.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/01/r8lHaNcNL7Y.jpg\" style=\"height:280px; width:217px\" title=\"Книга «Jump Start MySQL»\" /></p>\r\n\r\n<h3>Jump Start MySQL</h3>\r\n\r\n<p><a href=\"https://goo.gl/AEKHn2\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>MySQL &mdash; супер-популярная свободная реляционная система управления базами данных, которую использует большинство интернет-сайтов.</p>\r\n\r\n<p>С помощью этой книги всего за 7 дней вы сможете освоить MySQL, научиться использовать её скорость и гибкость. Вы научитесь сохранять, модифицировать и обрабатывать данные, подключать к БД свои программы, работать с таблицами, делать бекапы и многое другое.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/Head-First-Android-Development.jpg\" style=\"height:280px; width:242px\" title=\"Книга «Head First. Программирование для Android»\" /></p>\r\n\r\n<h3>Head First. Программирование для Android</h3>\r\n\r\n<p><a href=\"https://www.piter.com/product/head-first-programmirovanie-dlya-android\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Если у вас есть идея для &laquo;взрывного&raquo; Android-приложения, но вы не знаете, как её реализовать, то эта книга &mdash; то, что вам нужно. Вы узнаете, как правильно задать структуру своего приложения, создать к нему интерфейс и базу данных, а также как сделать, чтобы оно работало на самых разных смартфонах и планшетах, и многое другое.</p>\r\n\r\n<p>По словам авторов, эта книга &mdash; как опытный Android-разработчик рядом с тобой. Единственное, что вам нужно для начала &mdash; небольшое знание Java.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/01/ItlbFc1JbUM.jpg\" style=\"height:280px; width:187px\" title=\"Книга «97 Things Every Programmer Should Know»\" /></p>\r\n\r\n<h3>97 Things Every Programmer Should Know</h3>\r\n\r\n<p><a href=\"https://www.gitbook.com/download/pdf/book/97-things-every-x-should-know/97-things-every-programmer-should-know?lang=en\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Скачать</a>&nbsp;</p>\r\n\r\n<p>&laquo;97 вещей, которые должен знать каждый программист&raquo; &mdash; сборник коротких практических советов от ведущих специалистов в области IT, который поможет избежать многих проблем, стоящих на пути программиста.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/978-5-8459-1530-6.jpg\" style=\"height:280px; width:191px\" title=\"Книга «Эффективная работа с унаследованным кодом»\" /></p>\r\n\r\n<h3>Эффективная работа с унаследованным кодом</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/4311012/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>В&nbsp;этой книге&nbsp;Майкл Физерс предлагает стратегии по эффективной работе с legacy-кодом. Автор долгое время занимался наставничеством и решил поместить в книгу весь свой опыт. Прочитав её, вы узнаете, как читать, исправлять и улучшать такой код. Помимо примеров на&nbsp;Java, C++, C&nbsp;и C# в книге есть 24 способа избавления от зависимостей.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/large_49600389.jpg\" style=\"height:280px; width:198px\" title=\"Книга «Приёмы объектно-ориентированного проектирования»\" /></p>\r\n\r\n<h3>Приёмы объектно-ориентированного проектирования</h3>\r\n\r\n<p><a href=\"https://ad.admitad.com/g/2d388421f44b209e7e4f3baa9723ff/?ulp=https%3A%2F%2Fwww.litres.ru%2Fdzhon-vlissides%2Fpriemy-obektno-orientirovannogo-proektirovaniya-patterny-proektirovaniya-16419747%2F\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>В этой книге&nbsp;говорится о паттернах проектирования и описываются простые и элегантные решения типичных задач, возникающих в объектно-ориентированном проектировании. Паттерны проектирования не появились сразу в готовом виде; многие разработчики, искавшие возможности повысить гибкость и степень пригодности к повторному использованию своих программ, приложили много усилий, чтобы поставленная цель была достигнута. В паттернах проектирования найденные решения отлиты в краткую и легко применимую на практике форму.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/large_49600487.jpg\" style=\"height:280px; width:197px\" title=\"Книга «Чистый код: создание, анализ и рефакторинг»\" /></p>\r\n\r\n<h3>Чистый код: создание, анализ и рефакторинг</h3>\r\n\r\n<p><a href=\"https://ad.admitad.com/g/2d388421f44b209e7e4f3baa9723ff/?ulp=https%3A%2F%2Fwww.litres.ru%2Frobert-s-martin%2Fchistyy-kod-sozdanie-analiz-i-refaktoring-2%2F\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Роберт Мартин в своём творении, опираясь на личный опыт и, что даже важнее, конкретные примеры из своей практики, рассказывает о том, как нужно кодить. Принципиальное отличие от книги Макконелла заключается в том, что здесь очень мало статистических обоснований правильности тех или иных действий, только код (занимающий почти треть книги) и рекомендации автора.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/kniga-predmetno-orientirovannoe-proektirovanie-600x800.jpg\" style=\"height:280px; width:210px\" title=\"Книга «Предметно-ориентированное проектирование (DDD). Структуризация сложных программных систем»\" /></p>\r\n\r\n<h3>Предметно-ориентированное проектирование (DDD). Структуризация сложных программных систем</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/30958003/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Эта книга отлично подойдёт тем, кто сталкивался или ещё только столкнётся с проблемно-ориентированным программированием.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1020973362.jpg\" style=\"height:280px; width:200px\" title=\"Книга «Совершенный код»\" /></p>\r\n\r\n<h3>Совершенный код</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/142768363/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Если вы планируете построить успешную карьеру программиста, то это та книга, которую прочитать вы просто обязаны. Абсолютно неважно, в какой среде вы планируете работать, какой ваш уровень подготовки, новичок вы или уже руководитель &mdash; здесь найдётся полезная информация для каждого, кто хоть как-то связан с процессом создания кода. Совершенного кода.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/01/The-C-Programming-Language.jpg\" style=\"height:280px; width:194px\" title=\"Книга «Язык программирования Си»\" /></p>\r\n\r\n<h3>Язык программирования Си</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/2480925/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>&laquo;Язык программирования Си&raquo; (также известна как K&amp;R)&nbsp;&mdash; книга Брайана Кернигана и Денниса Ритчи, причём последний&nbsp;&mdash; один из непосредственных авторов и разработчиков языка Си. Книга стала основой для разработки и популяризации Си, до сих пор имеет спрос&nbsp;и широко используется в качестве &laquo;классического&raquo; учебника по языку. Она долгое время была единственным справочным руководством и де-факто&nbsp;&mdash; стандартом языка.</p>\r\n\r\n<p>Кстати, у нас есть <a href=\"https://tproger.ru/books/9-free-clang-books/\" rel=\"noopener follow\" target=\"_blank\">неплохая подборка</a> бесплатных книг по Си, советуем взглянуть, если этот язык вам интересен.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/The-Pragmatic-Programmer.jpg\" style=\"height:280px; width:223px\" title=\"Книга «The Pragmatic Programmer: From Journeyman to Master»\" /></p>\r\n\r\n<h3>The Pragmatic Programmer: From Journeyman to Master</h3>\r\n\r\n<p><a href=\"https://goo.gl/zijWvn\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Ещё один представитель программистской литературы, где на трёхстах страницах методично описываются основные принципы создания качественного кода и условия, при которых вы будете получать удовольствие от работы, а клиент от результатов. Написана книга приятным языком, поэтому много времени на её освоение не уйдёт.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1013663461.jpg\" style=\"height:280px; width:198px\" title=\"Книга «Путь программиста»\" /></p>\r\n\r\n<h3>Путь программиста</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/34792421/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Практически каждого программиста привела в профессию любовь к созиданию, удовольствие от созерцания, как символы превращаются в программы. Однако есть в этой работе и обратная сторона: высокая конкуренция, сложные отношения с клиентами, коллегами, руководством, финансовая нестабильность. Именно о тёмной стороне работы программиста и о том, как существовать в ладах со всеми этими заботами, рассказывает в своей книге Джон Сонмез.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1234.jpeg\" style=\"height:274px; width:200px\" title=\"Книга «Структура и Интерпретация Компьютерных Программ»\" /></p>\r\n\r\n<h3>Структура и Интерпретация Компьютерных Программ</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/5322055/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Эта книга рассматривает создание кода на уровне общих принципов, то есть описываются алгоритмы, объясняется взаимодействие программной среды и машины и, как следствие, предлагаются методы оптимизации будущего кода. Несмотря на довольно общую тематику, в профессиональных кругах эта книга считается учебником, как для новичков, так и для настоящих зубров IT-цеха.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1013233467-770x1024.jpg\" style=\"height:280px; width:211px\" title=\"Книга «Алгоритмы. Построение и анализ»\" /></p>\r\n\r\n<h3>Алгоритмы. Построение и анализ</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/33769775/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Ещё одна увесистая книга по алгоритмам, впервые изданная в 1990 году в Массачусетском технологическом институте с авторством местных преподавателей. Несмотря на то, что написана она простым и понятным языком, из-за объёма и подачи материала (каждая глава имеет законченный вид) использовать лучше в качестве справочника, периодически обращаясь к нужной информации.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1000043489.jpg\" style=\"height:280px; width:190px\" title=\"Книга «Искусство программирования»\" /></p>\r\n\r\n<h3>Искусство программирования</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/1335648/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Искусство программирования &mdash; монументальный труд Дональда Кнута. Серия книг состоит из 4 томов, каждый из которых охватывает определенные виды алгоритмов. Это классика, которую до сих пор в обязательном порядке проходят в ВУЗах. Материал подан в достаточно сложном формате, но и цель у книг особенная &mdash; рассказать наиболее полно о существующих алгоритмах.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/11/1019495393-719x1024.jpg\" style=\"height:280px; width:197px\" title=\"Книга «Карьера программиста. Как устроиться на работу в Google, Microsoft или другую ведущую IT-компанию»\" /></p>\r\n\r\n<h3>Карьера программиста. Как устроиться на работу в Google, Microsoft или другую ведущую IT-компанию</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/29561974/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Не обращайте внимание на российское название &mdash;&nbsp;в оригинале это &laquo;Cracking the Coding Interview: 189 Programming Interview Questions and Solution&raquo;, то есть просто 189 наиболее часто задаваемых вопросов на собеседованиях в крупных IT-компаниях. Ответы, разумеется, прилагаются. Помогает не только потренировать собственный мозг, но и получить представление об образе мышления в Amazon, Apple, Facebook, Google и Microsoft.</p>\r\n\r\n<p>Кстати, мы часто даем разборы задач из этой книги в рубрике&nbsp;<a href=\"https://tproger.ru/category/problems/\" rel=\"noopener follow\" target=\"_blank\">&laquo;Задачки&raquo;</a> на нашем сайте.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2016/11/11.jpeg\" style=\"height:277px; width:220px\" title=\"Книга «Жемчужины программирования»\" /></p>\r\n\r\n<h3>Жемчужины программирования</h3>\r\n\r\n<p><a href=\"https://goo.gl/nqQqCX\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Очень хорошее чтиво для людей, начинающих свой путь в программировании. Здесь автор доступным языком описывает основные этапы написания качественного кода: от идеи до финального тестирования.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1018888532-728x1024.jpg\" style=\"height:280px; width:199px\" title=\"Книга «Release it! Проектирование и дизайн ПО для тех, кому не все равно»\" /></p>\r\n\r\n<h3>Release it! Проектирование и дизайн ПО для тех, кому не все равно</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/135464861/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>От серьёзных и фундаментальных принципов построения кода перейдём непосредственно к практической части создания ПО, а именно юзабилити, производительности, масштабированию, администрированию и далее по списку. Здесь вас ждут реальные примеры из жизни автора, несколько типовых кодов на Java (при этом сам язык никакой роли не играет) и профессиональные советы, как общего плана, так и вполне конкретные по созданию кода.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1002505150.jpg\" style=\"height:264px; width:200px\" title=\"Книга «Кодеры за работой. Размышления о ремесле программиста»\" /></p>\r\n\r\n<h3>Кодеры за работой. Размышления о ремесле программиста</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/6252312/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Если вам когда-нибудь хотелось подсмотреть за работой других программистов высокого полёта, то это книга придётся вам по душе. Пятнадцать человек в формате живого общения расскажут об отношении к профессии, о будущем программирования и дадут конкретные практические советы.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1005306183.jpg\" style=\"height:280px; width:212px\" title=\"Книга «Мифический человеко-месяц»\" /></p>\r\n\r\n<h3>Мифический человеко-месяц</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/83760/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Эта книга в США входит в список must-read любого разработчика ПО. Написана она была в далёком 1975 году, но описанные этапы, проблемы и советы по разработке ПО актуальны и по сей день. Вряд ли она будет полезна для человека, который уже несколько лет варится в профессии и на личном опыте знает об этом процессе, а вот студентам и новичкам в IT &mdash;&nbsp;прочитать действительно следует.</p>\r\n\r\n<hr />\r\n<p><img alt=\"Обложка книги «»\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/02/1016505993-707x1024.jpg\" style=\"height:280px; width:193px\" title=\"Книга «Не заставляйте меня думать»\" /></p>\r\n\r\n<h3>Не заставляйте меня думать</h3>\r\n\r\n<p><a href=\"https://www.ozon.ru/context/detail/id/139556451/?partner=tproger\" rel=\"noopener noreferrer nofollow\" target=\"_blank\">Купить</a>&nbsp;</p>\r\n\r\n<p>Если &laquo;Мифический человеко-месяц&raquo; &mdash;&nbsp;книга для разработчиков, то это своего рода библия для работников веб-индустрии. Как повысить производительность и привлекательность веб-сайта, советы для новичков, ветеранов и руководителей &ndash; всё это можно подчеркнуть из немного ироничной и крайне полезной книги Стива Круга.</p>', 1, 'Andrey', 'JzhMKbSgBDlUwzfIwcRL.jpg', 1, NULL, NULL, '2018-03-08 10:35:46', '2018-03-08 10:35:46'),
(182, 'Удаленная работа для программиста: результаты исследования от Stack Overflow', 'Опрос Stack Overflow Developer Survey 2018 уже прошёл, и пока в компании разбираются с данными за этот год, давайте посмотрим на результаты, полученные за прошлый, и разузнаем побольше об удалённой работе программистов.', 'udalennaya-rabota-dlya-programmista-rezul-0803181337', '<p>Опрос Stack Overflow Developer Survey 2018 <a href=\"https://tproger.ru/articles/stack-overflow-developer-survey-2018/\" rel=\"follow\">уже прошёл</a>, и пока в компании разбираются с данными за этот год, давайте посмотрим на результаты, полученные за прошлый, и разузнаем побольше об удалённой работе программистов.</p>\r\n\r\n<h2>В каких регионах удалённая работа наиболее распространена?</h2>\r\n\r\n<p><a href=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka1.jpg\"><img alt=\"stack overflow\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka1.jpg\" style=\"height:675px; width:1013px\" /></a></p>\r\n\r\n<p>На этой карте показаны страны, где участие в опросе 2017 года приняло как минимум 100 человек. В США 11.2% респондентов ответили, что они работают удалённо на полную ставку, однако это число колеблется между гораздо меньшими значениями в Западной Европе (3.93% в Швеции и 3.47% в Бельгии) и большими значениями в Центральной Азии, Восточной Европе и России (20.5% в России). Местные экономические факторы, а также ожидания сотрудников от места работы играют роль в этих повсеместных различиях.</p>\r\n\r\n<p>Размер компании, в которой работают разработчики, также сильно влияет на вероятность удалённой работы.</p>\r\n\r\n<p><a href=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka2-1.jpg\"><img alt=\"stack overflow\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka2-1.jpg\" style=\"height:675px; width:675px\" /></a></p>\r\n\r\n<p>В Stack Overflow работает около 250 человек. Ранее в блоге компании <a href=\"https://stackoverflow.blog/2017/09/29/making-remote-work-behind-scenes/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">рассказывалось</a> о том, как они делают эффективные <a href=\"https://stackoverflow.blog/2013/02/01/why-we-still-believe-in-working-remotely/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">команды из офисных работников и удалёнщиков</a>. Результаты опросов показывают, что разработчики из небольших компаний (даже меньше Stack Overflow) с большей вероятностью работают удалённо, в то время как в больших компаниях такая вероятность ниже.</p>\r\n\r\n<p>Вполне логично, что компании поменьше поддерживают удалённую работу. Как правило, такие компании зачастую только образовались, не имеют своего офиса, и разработчики, которые формируют компанию, работают, откуда им удобно. После применения прогнозного моделирования на данных опроса (предсказывает, работает ли разработчик удалённо или нет) выяснилось, что размер компании был самым значительным показателем, позволяющим делать прогноз.</p>\r\n\r\n<h2>Что можно сказать о самих разработчиках?</h2>\r\n\r\n<p><a href=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka3.jpg\"><img alt=\"stack overflow\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka3.jpg\" style=\"height:675px; width:771px\" /></a></p>\r\n\r\n<p>Есть большая разница в общем уровне опыта удалённых и офисных разработчиков. В большинстве стран разработчики, которые работают удалённо, имеют больше опыта профессионального программирования, чем те, кто работают в офисах. Числа действительно большие &mdash; в среднем, 5-летняя разница в опыте удалённых и офисных работников в Соединённых Штатах и Канаде. Несложно понять, почему компании с большей вероятностью поддерживают удалёнщиков, у которых есть проверенный послужной список.</p>\r\n\r\n<p><ins><ins><ins><iframe frameborder=\"0\" height=\"117\" id=\"aswift_1\" name=\"aswift_1\" scrolling=\"no\" width=\"468\"></iframe></ins></ins></ins></p>\r\n\r\n<p>Не все опрошенные огласили свою зарплату, но мы можем воспользоваться данными тех, кто сделал это, чтобы посмотреть, сколько получают на удалённой работе.</p>\r\n\r\n<p><a href=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka4.jpg\"><img alt=\"stack overflow\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka4-1024x455.jpg\" style=\"height:533px; width:1200px\" /></a></p>\r\n\r\n<p>Обратите внимание на то, что пропасти между уровнями зарплат удалённых и офисных разработчиков нет, но удалёнщики все же получают чуть больше.</p>\r\n\r\n<p>В целом разработчики <a href=\"https://insights.stackoverflow.com/survey/2017#work-how-do-developers-feel-about-their-jobs-and-careers\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">вполне довольны своей карьерой</a>, 74.5% респондентов оценили свою степень удовлетворённости 7 или более баллами по 10-балльной шкале. Определенные характеристики разработчиков, в том числе удалённая работа, связаны с ещё большей удовлетворённостью карьерой.</p>\r\n\r\n<p><a href=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka5.png\"><img alt=\"stack overflow\" src=\"https://cdn.tproger.ru/wp-content/uploads/2018/01/kartinka5.png\" style=\"height:675px; width:900px\" /></a></p>\r\n\r\n<p>Разница небольшая (никто не доволен на 100%, вне зависимости от того, работает он удалённо или в офисе), но как разница из-за удалённой работы, так и разница из-за внесения вклада в open source, являются статистически значимыми.</p>\r\n\r\n<p style=\"text-align:right\">Перевод статьи <a href=\"https://stackoverflow.blog/2018/01/22/remote-work-2017-developer-survey/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">&laquo;Remote Work in the 2017 Developer Survey&raquo;</a></p>\r\n\r\n<p style=\"text-align:right\"><a href=\"https://tproger.ru/author/NickPrice\" rel=\"follow\">Никита Прияцелюк</a>, укротитель змей</p>', 1, 'Andrey', 'kBuuL6Q8QyM3IbDLJLYZ.png', 1, NULL, NULL, '2018-03-08 10:37:46', '2018-03-08 10:37:46'),
(183, 'Как начать использовать Wine для запуска Windows-приложений на Android', 'Если вы ещё не в курсе, Wine — это бесплатный open source слой совместимости с Windows API, позволяющий запускать программы этой платформы на Unix-подобных системах. Wine находится в разработке с 1993 года и позволяет запускать множество Windows-программ на Linux и macOS, хотя иногда требуются танцы с бубном.', 'kak-nachat-ispolzovat-wine-dlya-zapuska-0803181339', '<p>Если вы ещё не в курсе, <a href=\"https://ru.wikipedia.org/wiki/Wine\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">Wine</a> &mdash; это бесплатный open source слой совместимости с Windows API, позволяющий запускать программы этой платформы на Unix-подобных системах. Wine находится в разработке с 1993 года и позволяет запускать множество Windows-программ на Linux и macOS, хотя иногда требуются танцы с бубном.</p>\r\n\r\n<h3>Что там с Android</h3>\r\n\r\n<p>CodeWeavers работает над портированием Wine на Android на протяжении последних нескольких лет, и <a href=\"http://www.androidpolice.com/2016/08/25/crossover-android-runs-windows-programs-x86-android-tablets-chromebooks/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">первый альфа-релиз вышел в августе 2016</a>. Несмотря на то, что компания выпускает коммерческий продукт, она вносит большой вклад в развитие Wine. Недавно <a href=\"https://tproger.ru/news/wine-three-is-available/\" rel=\"follow\">вышел Wine 3.0</a>, который вы можете установить как приложение на Android. Вам будет доступно полноэкранное окно Windows, почти как в первых сборках <a href=\"https://ru.wikipedia.org/wiki/CrossOver\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">CrossOver</a> для Android, с меню &laquo;Пуск&raquo; в нижнем левом углу. Имеется поддержка аудио и простой графики.</p>\r\n\r\n<p>Вот небольшой видео обзор:</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"555\" src=\"https://www.youtube.com/embed/UOLQqkTo2No?feature=oembed&amp;enablejsapi=1&amp;origin=https://tproger.ru\" width=\"740\"></iframe></p>\r\n\r\n<p>Так как Wine для Android только вышел, у него есть ряд ограничений. Автору англоязычной статьи, которая использована в качестве источника для этого перевода, удалось полноценно запустить приложение на OnePlus 5T; на Galaxy Tab S и Pixel 2016 наблюдались фризы и краши. Масштабирование DPI (dots per inch, точек на дюйм) тоже корявое, так что пользоваться Wine на тачскрине довольно проблематично. Графический драйвер на данный момент не поддерживает Direct 3D, поэтому много программ (особенно игр) не будут работать до тех пор, пока вы с помощью настроек не заставите их использовать OpenGL.</p>\r\n\r\n<h3>Как начать использовать</h3>\r\n\r\n<p>Wine &mdash; слой совместимости, а не полноценный эмулятор, поэтому вам понадобится x86 Android-устройство, чтобы выжать из него максимум. Wine поддерживает ARM устройства, но вы сможете использовать только те программы, которые были портированы на <a href=\"https://ru.wikipedia.org/wiki/Windows_RT\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">Windows RT</a>. На <a href=\"https://forum.xda-developers.com/showthread.php?t=2092348\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">форуме XDA</a> можно найти несколько примеров. Также ведётся работа над использованием <a href=\"https://ru.wikipedia.org/wiki/QEMU\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">QEMU</a> для эмуляции инструкций x86-процессора на ARM.</p>\r\n\r\n<p>Если вы хотите попробовать Wine на своём Android-устройстве (или Chromebook, если у вас разрешён режим разработчика), вы можете скачать последние сборки на <a href=\"https://dl.winehq.org/wine-builds/android/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">сайте Wine</a>. Убедитесь, что скачиваете стабильные версии (&laquo;wine-3.0-arm&raquo; или &laquo;wine-3.0-x86&raquo;), а не релиз-кандидатов (*rc*.apk).</p>', 1, 'Andrey', 'rvVkshQZMxspJz2ujZfI.jpg', 170, NULL, NULL, '2018-03-08 10:39:27', '2018-03-08 10:39:27'),
(184, 'Сбербанк запустил обучающий проект для школьников «Академия искусственного интеллекта»', '1 марта стартовала программа обучающего проекта «Академия искусственного интеллекта», разработанного при поддержке благотворительного фонда Сбербанка «Вклад в будущее».', 'sberbank-zapustil-obuchayushchiy-proekt-dlya-sh-0803181342', '<p>1 марта <a href=\"https://www.ai-academy.ru/\" rel=\"noopener nofollow noreferrer\" target=\"_blank\">стартовала</a> программа обучающего проекта &laquo;Академия искусственного интеллекта&raquo;, разработанного при поддержке благотворительного фонда Сбербанка <a href=\"https://vbudushee.ru/\" rel=\"noopener nofollow noreferrer\" target=\"_blank\">&laquo;Вклад в будущее&raquo;</a>. Цель проекта &mdash; познакомить учащихся средних и старших классов с технологиями искусственного интеллекта, машинного обучения и анализа данных.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"416\" src=\"https://www.youtube.com/embed/AJRhUvf2c3M?feature=oembed&amp;enablejsapi=1&amp;origin=https://tproger.ru\" width=\"740\"></iframe></p>\r\n\r\n<h3>Этапы программы</h3>\r\n\r\n<ul>\r\n	<li><strong>Погружение</strong> (с 1 марта) &mdash; просмотр&nbsp;<a href=\"https://www.youtube.com/playlist?list=PLxF_rYtB5vBC6MIx4Y3VX_O67jX0iG6U-\" rel=\"noopener nofollow noreferrer\" target=\"_blank\">серии открытых вводных уроков</a> для знакомства с отраслью знаний.</li>\r\n	<li><strong>Навыки</strong> (с 7 марта) &mdash; решение тренировочных задач.</li>\r\n	<li><strong>Практика</strong> (с 12 марта по 12 апреля) &mdash; решение реальной задачи по&nbsp;материалам Dota. 100 лучших получат приглашение на московский хакатон.</li>\r\n	<li><strong>Хакатон</strong> (21 апреля) &mdash; решение задач из области искусственного интеллекта.</li>\r\n</ul>\r\n\r\n<h3>Призы</h3>\r\n\r\n<ul>\r\n	<li>Смартфоны &mdash; победителям <a href=\"https://telegram.me/AIAcademy_bot\" rel=\"noopener nofollow noreferrer\" target=\"_blank\">викторины в Telegram</a>;</li>\r\n	<li>Сертификат на 100 тыс. рублей &mdash; первой десятке победителей хакатона;</li>\r\n	<li>Первые три места хакатона:\r\n	<ul>\r\n		<li>3 место &mdash; iPad;</li>\r\n		<li>2 место &mdash; iPhone X;</li>\r\n		<li>1 место &mdash; ноутбук.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Вводные уроки</h3>\r\n\r\n<p>В школах и на открытых площадках регионов России уже стартовали лекции, которые проводят специалисты Сбербанка. Обучающие материалы компания обещает выложить <a href=\"http://htweek.ru/lessons/2018/\" rel=\"noopener nofollow noreferrer\" target=\"_blank\">на сайте &laquo;Недели высоких технологий и технопредпринимательства&raquo;</a>.</p>', 1, 'Andrey', 'OUX3gH3rMztMm5eMYzWx.jpg', 9, NULL, NULL, '2018-03-08 10:42:19', '2018-03-08 10:42:19'),
(185, '4 марта в Новосибирске пройдет конференция для Java-разработчиков JBreak 2018', '4 марта в Новосибирске состоится встреча профессиональных разработчиков, посвящённая вопросам программирования на Java, — JBreak 2018.', '4-marta-v-novosibirske-proydet-konferents-0803181343', '<p>4&nbsp;марта в&nbsp;Новосибирске состоится встреча профессиональных разработчиков, посвящённая вопросам программирования на&nbsp;Java,&nbsp;&mdash; <a href=\"https://2018.jbreak.ru/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">JBreak 2018</a>.</p>\r\n\r\n<h3>О чём будут рассказывать?</h3>\r\n\r\n<p>Все доклады читают специалисты из&nbsp;ведущих компаний России, США, Европы и&nbsp;Израиля. Спикеры <a href=\"https://2018.jbreak.ru/talks/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">затронут темы</a>, связанные с&nbsp;современными и&nbsp;востребованными Java-технологиями:</p>\r\n\r\n<ul>\r\n	<li>тестирование;</li>\r\n	<li>распределённые системы и&nbsp;высокие нагрузки в&nbsp;мире Java;</li>\r\n	<li>фреймворки и&nbsp;базы данных;</li>\r\n	<li>компьютерные науки;</li>\r\n	<li>программная архитектура;</li>\r\n	<li>DevOps.</li>\r\n</ul>\r\n\r\n<p>Участники услышат выступления как русскоязычных, так и&nbsp;англоязычных спикеров. Среди последних&nbsp;&mdash; представители Twitter, SAP, Freelancer, Azul Systems. Российские коллеги будут рассказывать от&nbsp;лица таких компаний, как &laquo;Яндекс&raquo;, &laquo;Одноклассники&raquo;, &laquo;Сбербанк-Технологии&raquo;.</p>\r\n\r\n<p>Также на&nbsp;протяжении всей конференции будут открыты специальные дискуссионные зоны, где все желающие смогут лично пообщаться с&nbsp;докладчиками сразу после выступления.</p>\r\n\r\n<p>Мероприятие <a href=\"https://2018.jbreak.ru/#sheduleTable\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">продлится</a> с&nbsp;9:00 до&nbsp;19:40. В&nbsp;20:00 начнётся <a href=\"https://2018.jbreak.ru/party/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">вечеринка</a>, на&nbsp;которой все участники смогут поиграть в&nbsp;спортивное &laquo;Что? Где? Когда?&raquo;, которое будет вести двукратный обладатель &laquo;Хрустальной совы&raquo; Михаил Скипский.</p>\r\n\r\n<h3>Как попасть на&nbsp;JBreak 2018?</h3>\r\n\r\n<p>Билеты <a href=\"https://2018.jbreak.ru/tickets/\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">можно приобрести</a> на&nbsp;официальном сайте JBreak. Мероприятие пройдёт по&nbsp;адресу: г. Новосибирск, Экспоцентр, ул. Станционная, д.&nbsp;104. Все доклады конференции будут транслироваться онлайн.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"500\" src=\"https://yandex.ru/map-widget/v1/-/CBe87IgrGA\" width=\"740\">&amp;lt;span data-mce-type=&quot;bookmark&quot; style=&quot;display: inline-block; width: 0px; overflow: hidden; line-height: 0;&quot; class=&quot;mce_SELRES_start&quot;&amp;gt;﻿&amp;lt;/span&amp;gt;</iframe></p>', 1, 'Andrey', 'yl6cVworNAzwnneF2ZFY.jpg', 14, NULL, NULL, '2018-03-08 10:43:30', '2018-03-08 10:43:30'),
(186, 'test', 'test', 'test-1803180931', '<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>\r\n\r\n<p>пока не может обработать этот запрос.</p>\r\n\r\n<p>HTTP ERROR 500</p>', 1, 'Andrey', 'Er6YixWL01GLUbpG38mD.JPG', 2, 'test', 'test', '2018-03-18 02:31:05', '2018-03-18 02:31:05'),
(187, '123123', 'В Бельгии на случай ядерной катастрофы раздают таблетки с йодом', '123123-1803181023', '<p>http://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.techhttp://n91351wu.beget.tech</p>', 1, 'Andrey', 'Ymk4DmsPVyO5WVNrr20N.JPG', 2, 'sdfg', '11', '2018-03-18 03:23:38', '2018-03-18 03:23:38');

-- --------------------------------------------------------

--
-- Структура таблицы `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(180, 2, '2018-03-10 06:13:00', '2018-03-10 06:13:00'),
(186, 1, '2018-03-18 02:31:05', '2018-03-18 02:31:05'),
(187, 2, '2018-03-18 03:23:38', '2018-03-18 03:23:38');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Editors', '2017-07-21 01:17:13', '2017-07-21 01:27:48'),
(3, 'Publisher', '2017-07-21 01:28:33', '2017-07-21 01:28:33'),
(4, 'Writer', '2017-07-21 01:28:38', '2017-07-21 01:28:38');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'master', 'master', '2017-06-26 00:47:05', '2017-06-26 00:47:05'),
(2, 'master1', 'master1', '2017-06-26 00:47:12', '2017-06-26 00:47:12');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `profession`, `content`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'ГРАЧЁВ АЛЕКСЕЙ СЕРГЕЕВИЧ', 'Учитель информатики, физики и робототехники', '<p>2001-2005 &ndash; Красноярский государственный технический университет, Инженерно-физический факультет, Степень бакалавра техники и технологии по направлению &laquo;Техническая физика&raquo;. 2005-2007 &ndash; Сибирский федеральный университет, Инженерно-физический факультет, Степень магистра техники и технологии по направлению &laquo;Техническая физика&raquo;. 2007-2010 &ndash; Сибирский федеральный университет, Аспирантура по специальности оптика. 2013 защитил диссертацию на соискание ученой степени кандидата физико-математических наук по специальности оптика на тему: &quot;ОБРАЗОВАНИЕ ПЛАЗМОННО-РЕЗОНАНСНЫХ НАНОСТРУКТУР И ИХ МОДИФИКАЦИЯ В ДИСПЕРСНЫХ СИСТЕМАХ ПОД ДЕЙСТВИЕМ ОПТИЧЕСКОГО ИЗЛУЧЕНИЯ&quot;</p>', 'PEuDQJaQ3a3zvgbVCzrX.jpg', '2018-03-28 03:02:55', '2018-03-28 03:02:55');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Sarthak Shrivastava', 'bitfumes@gmail.com', '$2y$10$5L.QBN0qXSZ8x9KuxSh65.E4aJtw5cAh901VXqHsfiHI72EfdH5dS', 'ZmfCotzspvRsk7tQVZamZpYyTHSM20SAPmLWjTg9DbWyNmA3Z7zEzTff9PSo', '2017-07-11 22:37:55', '2017-07-11 22:37:55'),
(3, 'Ankur Shrivastava', 'ankur@gmail.com', '$2y$10$l4ODE.jAzImO5cL7KJuK7Obok1VXHsDonQX9U/6aishfDfEyiyfaC', 'lMuCX5ZMe0yhEJPL7C2DcjgzKn5J1gY7UJYs35UL0iBmFoTvMdkysFBLTL4D', '2017-07-11 22:52:45', '2017-07-11 22:52:45'),
(4, 'Andrey', 'artyshko.andrey@gmail.com', '$2y$10$8KV5zjW2x1hPKXjStQw6YOqAYCqTQ8hGiI7IYm6PmpAvRaWpbQ6Y.', NULL, '2018-03-04 08:48:46', '2018-03-04 08:48:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Индексы таблицы `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_posts`
--
ALTER TABLE `category_posts`
  ADD KEY `category_posts_post_id_index` (`post_id`),
  ADD KEY `category_posts_category_id_index` (`category_id`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post_tags_post_id_index` (`post_id`),
  ADD KEY `post_tags_tag_id_index` (`tag_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_posts`
--
ALTER TABLE `category_posts`
  ADD CONSTRAINT `category_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
