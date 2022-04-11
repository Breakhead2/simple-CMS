-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2022 г., 19:11
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `localhost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_item`, `session_id`, `quantity`) VALUES
(38, 51, '2g1jmaj9275o07lqcir6aqaus63jq5m8', 1),
(39, 55, '2g1jmaj9275o07lqcir6aqaus63jq5m8', 1),
(40, 53, '2g1jmaj9275o07lqcir6aqaus63jq5m8', 1),
(45, 55, '724bf62h615fhl0pnc09ej1rvc8djv0s', 1),
(46, 52, '724bf62h615fhl0pnc09ej1rvc8djv0s', 1),
(47, 51, 'unqf18e4j3o0borrs30c8ucg9mso9aj7', 1),
(48, 52, 'unqf18e4j3o0borrs30c8ucg9mso9aj7', 1),
(51, 51, 'b78f6fma6pme4jmd6rtg13lbrq05l0g9', 2),
(52, 52, 'b78f6fma6pme4jmd6rtg13lbrq05l0g9', 2),
(53, 51, 'n6h1ogphsu9gogt0hh45tdsm201gcj9b', 1),
(54, 52, 'n6h1ogphsu9gogt0hh45tdsm201gcj9b', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `size` float NOT NULL,
  `address` text NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `file_name`, `size`, `address`, `views`) VALUES
(1, 'img_1.png', 1.07, '/images/big/', 8),
(2, 'img_2.png', 2, '/images/big/', 14),
(3, 'img_3.png', 2.56, '/images/big/', 3),
(4, 'img_4.png', 2.27, '/images/big/', 3),
(5, 'img_5.png', 1.58, '/images/big/', 14),
(6, 'img_6.png', 1.65, '/images/big/', 2),
(8, 'aLX8-NZIbC4.jpg', 0.08, '/images/big/', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `session_id` varchar(60) NOT NULL,
  `name` varchar(15) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `data` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user`, `session_id`, `name`, `surname`, `phone`, `address`, `postcode`, `status`, `data`) VALUES
(6, 'test', '2g1jmaj9275o07lqcir6aqaus63jq5m8', 'test', 'testov', '88000043', 'testgrad', 123321, 'delivered', 'Mon, 14 Feb 22 23:11:07'),
(7, 'denis', '724bf62h615fhl0pnc09ej1rvc8djv0s', 'denis', 'sazonov', '6663628', 'samara', 222333, 'closed', 'Mon, 14 Feb 22 23:51:22');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `code`, `description`, `author`, `pages`, `cover`, `price`) VALUES
(51, 'Заводной апельсин', 2072323, '\"Заводной апельсин\" - литературный парадокс ХХ столетия. Продолжая футуристические традиции в литературе, экспериментируя с языком, на котором говорит рубежное поколение malltshipalltshikov и kisok \"надсатых\", Энтони Бёрджесс создает роман, признанный классикой современной литературы.\r\n         Умный, жестокий, харизматичный антигерой Алекс, лидер уличной банды, проповедуя насилие как высокое искусство жизни, как род наслаждения, попадает в железные тиски новейшей государственной программы по перевоспитанию преступников и сам становится жертвой насилия. Можно ли спасти мир от зла, лишая человека воли совершать поступки и превращая его в \"заводной апельсин\"? Этот вопрос сегодня актуален так же, как и вчера, и вопрос этот автор задает читателю.', 'Берджесс Энтони', 255, 'Мягкий', 350),
(52, '1984', 3734859, 'Своеобразный антипод второй великой антиутопии XX века - \"О дивный новый мир\" Олдоса Хаксли. Что, в сущности, страшнее: доведенное до абсурда \"общество потребления\" - или доведенное до абсолюта \"общество идеи\"? По Оруэллу, нет и не может быть ничего ужаснее тотальной несвободы...', 'Оруэлл Джордж', 300, 'Мягкий', 300),
(53, 'Мартин Иден', 3782430, '\"Мартин Иден\" — самый известный роман Джека Лондона, впервые напечатанный в 1908-1909 гг. Во многом автобиографическая книга о человеке, который \"сделал себя сам\", выбравшись из самых низов, добился признания. Любовь к девушке из высшего общества побуждает героя заняться самообразованием. Он становится писателем, но все издательства отказывают ему в публикации. И как это часто бывает в жизни, пройдя сквозь лишения и унижения, получив отказ от любимой девушки, он наконец становится знаменитым. Но ни слава, ни деньги, ни успех, ни даже возвращение его возлюбленной не могут уберечь Мартина от разочарования в этой насквозь фальшивой жизни.', 'Лондон Джек', 268, 'Мягкий', 315),
(54, 'Человек, который смеется', 3811078, '\"Человек, который смеется\" — один из наиболее известных романов Виктора Гюго.\r\n             В центре повествования Гуинплен, в раннем детстве похищенный бандитами, до неузнаваемости обезобразившими его лицо. Судьба преподнесла ему немало испытаний, но душу не искалечила — преодолев нелегкий путь от ярмарочного актера до лорда и члена парламента, он смог остаться честным и благородным человеком...', 'Гюго Виктор', 400, 'Мягкий', 350),
(55, 'Бойцовский клуб', 3948128, 'Чак Паланик – современный американский писатель, прославившийся в первую очередь романом \"Бойцовский клуб\". Но и другие произведения Паланика – \"Уцелевший\", \"Колыбельная\", \"Призраки\" – получали множество наград, некоторые их них экранизировались и неизменно пользовались успехом. У Паланика свой, особенный стиль. Короткие броские фразы, яркие запоминающиеся образы, едкая сатира, черный юмор. \"Бойцовский клуб\" – самый знаменитый роман Чака Паланика. Все помнят фильм режиссера Дэвида Финчера с Брэдом Питтом в главной роли? Он именно по этой книге. Это роман-вызов, роман, созданный всем назло и вопреки всему, в нем описывается поколение озлобившихся людей, потерявших представление о том, что можно и чего нельзя, где добро и зло, кто они сами и кто их окружает. Сам Паланик называет свой \"Бойцовский клуб\" новым \"Великим Гэтсби\". Какие же они – эти Гэтсби конца XX века?', 'Паланик Чак', 280, 'Мягкий', 280),
(56, 'Сияние', 4029330, '…Проходят годы, десятилетия, но потрясающая история писателя Джека Торранса, его сынишки Дэнни, наделенного необычным даром, и поединка с темными силами, обитающими в роскошном отеле \"Оверлук\", по-прежнему завораживает и держит в неослабевающем напряжении читателей самого разного возраста…', 'Кинг Стивен', 420, 'Мягкий', 315);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `id_item`, `user_name`, `review`) VALUES
(5, 55, 'Denis', 'Это одна из моих самых любимых книг! Книга нравится мне больше, чем фильм!!!'),
(11, 52, 'Denis', 'Очень сильная книга, заставляет задуматься и оглядеться вокруг. Всем кто любит умные и интересные книги в жанре антиуптопия, советую эту книгу.'),
(24, 54, 'Denis', 'Если вам понравится данное произведение, то можете смело браться за роман Отверженные, очень вам рекомендую. Жан Вальжан навсегда в моем сердце.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `user_id`, `pass`) VALUES
(1, 'admin', '9648837256204fce32e12a3.96230961', '$2y$10$KfdAhWi00wg9Sbto5EZId.q7wwgUpB9G.VxT.H5ZebsWWX0sdR4ym'),
(2, 'denis', '1949240238620ac7498b2493.08423100', '$2y$10$aVXSy8CGmusOPlC/KrPkyOxxLX3.rNmceU5qFMRDEztIe4MDv/vym'),
(3, 'test', '2137233845620bccf9c9be17.95956470', '$2y$10$SoHXpKFUkFankXv.LuEBNONyxFJqsg/uXz.XZYzKGMEQPl.c7MsNe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_name` (`file_name`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
