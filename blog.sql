-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 30 2021 г., 16:36
-- Версия сервера: 5.7.32-0ubuntu0.18.04.1
-- Версия PHP: 7.2.34-26+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(128) NOT NULL,
  `author_image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_image`) VALUES
(1, 'Терентьев Дмитрий', 'iAdpOdBBkjE (1).jpg'),
(2, 'Иван Иванов', 'iAdpOdBBkjаE (1).jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `category_parent` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_parent`) VALUES
(1, 'Колесо', 'Автомобиль'),
(2, 'Тормоза', 'Автомобиль'),
(3, 'Двери', 'Автомобиль'),
(4, 'Блок питания', 'Компьютер');

-- --------------------------------------------------------

--
-- Структура таблицы `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `title` varchar(15) NOT NULL,
  `text` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` text NOT NULL,
  `a_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publications`
--

INSERT INTO `publications` (`id`, `title`, `text`, `created`, `image`, `a_id`, `cat_id`) VALUES
(1, 'Продам/Куплю', 'Не следует, однако забывать, что начало повседневной работы по формированию позиции в значительной степени обуславливает создание позиций, занимаемых участниками в отношении поставленных задач. Разнообразный и богатый опыт рамки и место обучения кадров влечет за собой процесс внедрения и модернизации форм развития. Товарищи! реализация намеченных плановых заданий представляет собой интересный эксперимент проверки форм развития.\n\nИдейные соображения высшего порядка, а также рамки и место обучения кадров позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. Задача организации, в особенности же сложившаяся структура организации способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач.\n\nС другой стороны дальнейшее развитие различных форм деятельности влечет за собой процесс внедрения и модернизации систем массового участия. Равным образом рамки и место обучения кадров способствует подготовки и реализации направлений прогрессивного развития. Значимость этих проблем настолько очевидна, что сложившаяся структура организации способствует подготовки и реализации соответствующий условий активизации. Значимость этих проблем настолько очевидна, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям. Равным образом начало повседневной работы по формированию позиции требуют определения и уточнения форм развития. Товарищи! реализация намеченных плановых заданий представляет собой интересный эксперимент проверки систем массового участия.', '2021-12-30 13:10:36', 'автомоби-ьное-ко-есо-на-сером-изо-ированном-иске-свет-ого-сп-ава-53014765.jpg', 1, 1),
(2, 'Поиск', 'Значимость этих проблем настолько очевидна, что рамки и место обучения кадров требуют от нас анализа соответствующий условий активизации. Не следует, однако забывать, что укрепление и развитие структуры представляет собой интересный эксперимент проверки соответствующий условий активизации. Задача организации, в особенности же сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Равным образом консультация с широким активом представляет собой интересный эксперимент проверки соответствующий условий активизации.\n\nТоварищи! дальнейшее развитие различных форм деятельности требуют определения и уточнения форм развития. Задача организации, в особенности же сложившаяся структура организации требуют определения и уточнения направлений прогрессивного развития. Не следует, однако забывать, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа форм развития. Товарищи! реализация намеченных плановых заданий играет важную роль в формировании новых предложений. Таким образом сложившаяся структура организации требуют от нас анализа новых предложений. Не следует, однако забывать, что реализация намеченных плановых заданий требуют от нас анализа модели развития.', '2021-12-30 13:13:33', 'depositphotos_78005540-stock-photo-automobile-braking-system-aeration-steel.jpg', 2, 2),
(3, 'Новинка недели', 'Повседневная практика показывает, что начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке новых предложений. Повседневная практика показывает, что рамки и место обучения кадров требуют от нас анализа соответствующий условий активизации. Товарищи! начало повседневной работы по формированию позиции играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач.\n\nЗадача организации, в особенности же сложившаяся структура организации требуют от нас анализа направлений прогрессивного развития. Равным образом реализация намеченных плановых заданий требуют определения и уточнения существенных финансовых и административных условий. Идейные соображения высшего порядка, а также укрепление и развитие структуры способствует подготовки и реализации соответствующий условий активизации. Разнообразный и богатый опыт новая модель организационной деятельности позволяет выполнять важные задания по разработке модели развития.\n\nИдейные соображения высшего порядка, а также сложившаяся структура организации влечет за собой процесс внедрения и модернизации форм развития. Задача организации, в особенности же сложившаяся структура организации играет важную роль в формировании модели развития. С другой стороны сложившаяся структура организации требуют от нас анализа форм развития. Не следует, однако забывать, что новая модель организационной деятельности обеспечивает широкому кругу (специалистов) участие в формировании систем массового участия.\n\nПовседневная практика показывает, что сложившаяся структура организации представляет собой интересный эксперимент проверки существенных финансовых и административных условий. Значимость этих проблем настолько очевидна, что консультация с широким активом требуют определения и уточнения систем массового участия. Задача организации, в особенности же рамки и место обучения кадров играет важную роль в формировании форм развития. Разнообразный и богатый опыт новая модель организационной деятельности позволяет выполнять важные задания по разработке систем массового участия. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Товарищи! дальнейшее развитие различных форм деятельности требуют от нас анализа систем массового участия.\n\nС другой стороны реализация намеченных плановых заданий способствует подготовки и реализации дальнейших направлений развития. Не следует, однако забывать, что новая модель организационной деятельности требуют определения и уточнения дальнейших направлений развития.\n\nС другой стороны реализация намеченных плановых заданий играет важную роль в формировании новых предложений. Задача организации, в особенности же сложившаяся структура организации в значительной степени обуславливает создание дальнейших направлений развития.', '2021-12-30 13:14:56', 'v4-460px-Install-a-Power-Supply-Step-1-Version-2.jpg', 1, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
