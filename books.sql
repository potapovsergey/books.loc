-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2018 г., 21:45
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Ростик'),
(2, 'Іванов В.В'),
(3, 'Петорв А.А'),
(4, 'Сидоров А.А'),
(5, 'Тестов Т.Т'),
(6, 'Стівен Кінг'),
(7, 'Дж.К. Ролінг'),
(8, 'Дж.Р.Р. Толкін'),
(9, 'Рей Бредбері'),
(10, 'Джордж Орвелл'),
(11, 'Олдос Гакслі'),
(12, 'Робін Ніксон'),
(13, 'Брюс Екел'),
(14, 'Ден Браун'),
(15, 'Агата Крісті'),
(16, 'Томас Мор');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1494754793);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Администратор', NULL, NULL, 1494754753, 1494754753);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`, `image`, `author_id`, `year_id`, `category_id`, `count`) VALUES
(1, 'Тестова книга', 'Тестова книга для перевірки роботи сайту', '50', 1494846415, 1494846415, '', 5, 12, 2, NULL),
(9, 'Зелена миля', 'У в''язниці «Холодна гора» блок смертників називають Зеленою Милею. Там бачили різних ув''язнених, але одного разу на Милю привозять Джона Коффі — величезного негра, який нібито вчинив страшний злочин — жорстоко вбив двох маленьких дівчаток. І ось головному герою Полу Еджкомбу та іншим співробітникам блоку належить дізнатися, що не все буває таким, яким здається. Трапляється що той, хто за ґратами, може бути кращим за того, хто зовні. А смерть може стати бажаним порятунком від тяжкого тягаря життя.', '110', 1494845214, 1494845214, '', 6, 47, 8, NULL),
(10, 'Довга прогулянка', 'Це була страшна гра — гра на виживання. Це була Довга Прогулянка. Прогулянка зі Смертю, бо смерть очікувала кожного хто впав. Дорога до щастя — бо той хто переміг у грі, отримував ВСЕ. На довгу прогулянку вийшли багато, але закінчить її тільки один. Решта мертвими ляжуть на дорозі — бо дорога до щастя для одного стане останньою дорогою для багатьох …', '110', 1494845545, 1494845545, '', 6, 31, 1, NULL),
(11, 'Повернення короля', 'Перед вами — третя книга з усесвітньо відомої трилогії «Володар перснів», написаною англійським письменником Дж. Р. Р. Толкиеном.  Повелитель сил Тьми Саурон направляє свої незліченні раті під стіни Мінас-тіріта, фортеці Останньої Надії. Він передчуває близьку перемогу, але саме це і заважає йому відмітити дві крихітні фігурки — хоббітов, що наближаються до Фатальної Гори, де їм належить знищити Кільце Всевладдя. Чи посміхнеться їм щастя?..', '80', 1494846071, 1494846071, '', 8, 65, 6, NULL),
(12, 'Дві вежі', '«Дві вежі» — друга книга всесвітньо відомої трилогії «Володар Перснів», написаної англійським письменником Дж. Р. Р. Толкієном.  Страшна небезпека чигає на загін Хранителів Персня. Безодня поглинула мудрого мага Гандальфа, гине в нерівній боротьбі відважний витязь Боромир. Загін розпадається, і кожен з Хранителів повинен зробити все можливе й неможливе для того, щоб зберегти світ Середзем`я. Двійко друзів гобітів — Фродо і Сем — йдуть до смертельно небезпечного Мордору...', '140', 1494846200, 1494846200, '', 8, 61, 6, NULL),
(13, 'Братство персня', 'До рук гобіта Фродо потрапляє чарівний перстень. Саме цього персня бракує Темному Володареві для того, щоби нарешті завоювати увесь світ. Тож Фродо мусить залишити свій дім і вирушити в небезпечну мандрівку просторами Середзем`я. На нього та його нових друзів чекають неймовірні пригоди!', '130', 1494846295, 1494846295, '', 8, 59, 6, NULL),
(14, '451* за Фаренгейтом', 'роман-антиутопія американського письменника Рея Бредбері в жанрі наукової фантастики. Вперше побачив світ у 1953. Книга була присвячена автором «Донові Конгдону із вдячністю».  Цей роман Рей Бредбері надрукував на взятій напрокат у громадській бібліотеці друкарській машинці на основі рукописних заміток. Скорочений до повісті роман був надрукований в журналі «Galaxy Science Fiction» у 1951 році. ', '70', 1494846688, 1494846688, '', 9, 5, 7, NULL),
(15, '"1984"', ' антиутопія англійського письменника Джорджа Орвелла, написаний 1948 року (у назві роману цифри 4 і 8 переставлені місцями) й опублікований 1949-го. Роман розповідає історію Вінстона Сміта і його деградації під впливом тоталітарної держави, в якій він живе.', '125', 1494846898, 1494846898, '', 10, 61, 7, NULL),
(16, 'Прекра́сний нови́й світ', 'Суспільство року 632-го гармонійне, щасливе, гуманне й засноване на досягненнях науки й техніки. Людей вирощують у пробірках, ретельно відбираючи генетичний матеріал для створення як працівників полів і заводів, так і керівників держави. Шляхом генетики та виховання у людей формують повне сприйняття призначеного для них статусу в суспільстві. У суспільстві панує абсолютна сексуальна свобода — кожен належить всім однаково, от лише народжувати дітей не можна, але нікому таке й на думку б не спало. Сім''ї, звісно, немає, тож немає дурних сімейних свар.', '45', 1494847099, 1494847099, '', 11, 32, 7, NULL),
(17, 'Марсіанські хроніки', 'Зміст книги — дещо середнє між збіркою коротких оповідань та епізодичних новел, включаючи вперше опубліковані у літературних журналах у другій половині 1940-х років оповідання Рея Бредбері. Оповідання були безсистемно об''єднані для публікації. До числа творів, що вплинули на структуру «Марсіанських хронік», Рей Бредбері вказує «Грона гніву» Джона Стейнбека, а також «Вайнсбурґ, Огайо» Шервуда Андерсона. Він назвав цей твір «кузеном роману» або «збіркою оповідань, яка вдає, ніби вона — роман». Насправді, «Марсіанські хроніки» близькі за своєю структурою до збірки оповідань Бредбері «Ілюстрована людина», в якій також використовується рамкова композиція, щоб об''єднати зовні несхожі оповідання разом.', '220', 1494847472, 1494847472, '', 9, 43, 1, NULL),
(18, 'Сильмариліон', 'збірка псевдоміфічних творів Дж. Р. Р. Толкіна, яку було видано посмертно його сином Крістофером Толкіном у 1977 році. Події, що розгортаються в збірці «Сильмариліон», в більшості передують подіям трилогії «Володар Перстенів». У ній розповідається про історію вигаданої епохи Землі, коли вона називалася Ардою: створення богом Ілуватаром айнурів, матеріального світу Еа та Арди зокрема, Дітей Ілуватара (ельфів і людей), їхню боротьбу проти злих Мелкора та Саурона.', '165', 1494847646, 1494847646, '', 8, 63, 1, NULL),
(19, 'Learning PHP', 'Описание книги Создаем динамические веб-сайты с помощью PHP, MySQL, JavaScript, CSS и HTML5: Новое издание признанного бестселлера, охватывающего как клиентские, так и серверные аспекты веб-разработки. Эта книга поможет вам освоить динамическое веб-программирование с применением самых современных технологий. Источник: http://forcoder.ru/php/', '105', 1494847846, 1494847846, '', 12, 66, 2, NULL),
(20, 'Філософія Java', 'Впервые читатель может познакомиться с полной версией этого классического труда, который ранее на русском языке печатался в сокращении. Книга, выдержавшая в оригинале не одно переиздание, за глубокое и поистине философское изложение тонкостей языка Java считается одним из лучших пособий для программистов. Чтобы по-настоящему понять язык Java, необходимо рассматривать его не просто как набор неких команд и операторов, а понять его "философию", подход к решению задач, в сравнении с таковыми в других языках программирования. На этих страницах автор рассказывает об основных проблемах написания кода: в чем их природа и какой подход использует Java в их разрешении. Поэтому обсуждаемые в каждой главе черты языка неразрывно связаны с тем, как они используются для решения определенных задач.', '250', 1494848083, 1494848083, '', 13, 68, 2, NULL),
(21, 'Інферно', 'Професор Ленґдон прийшов до тями в лікарні у Флоренції. Як він опинився тут? Чому його хотіли вбити? І як він потрапив до італійського міста, сповненого стародавніх секретів? Роберт нічого не пам''ятає. Лише в моторошних видіннях він бачить жінку з дивним амулетом, яка благає про допомогу. А в кишені знаходить вказівку на картину Боттічеллі «Мапа пекла». Але картину дивно змінено… Зашифровані у витворах мистецтва послання, таємні тунелі і новітні технології — ось що чекає Ленґдона та його помічницю Сієнну на шляху до розкриття загадки божевільного генія. Та невідомий ворог випереджає їх на крок…', '170', 1494848206, 1494848206, '', 14, 67, 3, NULL),
(22, 'Десятеро негренят ', ' детективний роман англійської письменниці Агати Кристі, написаний у 1939 році та виданий у Лондоні під назвою «Ten Little Niggers». Однак уже в першому американському виданні наступного 1940-го року книга вийшла під назвою «І нікого не стало» (англ. And Then There Were None). З того часу це єдина назва в усьому англомовному світі. Також виходив як «Десятеро індіанців» (англ. Ten Little Indians). За словами автора, найкращий її твір. Роман є найвідомішим та найпопулярнішим твором Агати Кристі: у світі продано понад сто мільйонів екземплярів книги.', '140', 1494848543, 1494848543, '', 15, 55, 3, NULL),
(23, 'Сяйво', ' роман американського письменника Стівена Кінга, написаний у жанрах психологічного жаху та готичної літератури, вперше опублікований 1977 року видавництвом Doubleday[en]. Назву твору автор дав, будучи натхненним словами з пісні Джона Леннона «Instant Karma![en]». Роман був третім за порядком видання романом Кінга та його першим бестселером у твердій обкладинці. Відповідно до основної сюжетної лінії, колишній викладач влаштовується доглядачем і переїжджає зі своєю родиною до гірського готелю «Оверлук» на зиму. Будучи ізольованим від зовнішнього світу, Джек Торренс, алкоголік у зав''язці, піддається впливу зловісного готелю та привидів, що там мешкають', '330', 1494848840, 1494848840, '', 6, 29, 4, NULL),
(24, 'Воно', ' роман американського письменника Стівена Кінга, написаний у жанрі жахів, уперше опублікований 1986 року видавництвом Viking Press. У творі зачіпаються важливі для Кінга теми: влада пам''яті, сила об''єднаної групи, вплив травм дитинства на доросле життя. Відповідно до основної сюжетної лінії, семеро друзів із вигаданого міста Деррі в штаті Мен борються з почварою, що вбиває дітей і здатна втілюватись у будь-яку фізичну форму. Оповідь здійснюється паралельно в різних часових інтервалах, один із яких відповідає дитинству головних героїв, а інший — їх дорослому життю.', '225', 1494848928, 1494848928, '', 6, 31, 4, NULL),
(25, 'Утопія', 'твір англійського письменника Томаса Мора, в якому сучасному європейському суспільству протиставляється ідеальне суспільство, без приватної власності. Від назви твору походить назва жанру літератури про ідеальне суспільство — утопія.', '35', 1494850064, 1494850064, '', 16, 42, 7, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Фантастика'),
(2, 'Учбові'),
(3, 'Детективи'),
(4, 'Романи'),
(5, 'Документальні'),
(6, 'Фентезі'),
(7, 'Утопії'),
(8, 'Драми'),
(9, 'Пригоди');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'Books/Books6/82a3bb.png', 6, 1, 'Books', '5785e2b035-1', ''),
(2, 'Books/Books9/a089d3.jpg', 9, 1, 'Books', '5922f737af-1', ''),
(3, 'Books/Books10/543277.jpg', 10, 1, 'Books', 'cf3fa63e8f-1', ''),
(4, 'Books/Books11/f003ff.jpg', 11, 1, 'Books', 'c2904440cf-1', ''),
(5, 'Books/Books12/ab83ae.jpg', 12, 1, 'Books', 'bd134d5a33-1', ''),
(6, 'Books/Books13/07f11b.jpg', 13, 1, 'Books', 'a85a553ac1-1', ''),
(7, 'Books/Books14/ec064b.jpg', 14, 1, 'Books', 'c4b761ad2e-1', ''),
(8, 'Books/Books15/262dc2.jpg', 15, 1, 'Books', '36b7cfd559-1', ''),
(9, 'Books/Books16/5480a6.jpg', 16, 1, 'Books', '65333bcb70-1', ''),
(10, 'Books/Books17/e3d10e.jpg', 17, 1, 'Books', '713d5e6f86-1', ''),
(11, 'Books/Books18/1e09b5.jpg', 18, 1, 'Books', 'ef287ff796-1', ''),
(12, 'Books/Books19/cbea9a.jpg', 19, 1, 'Books', 'd96c3fb0a0-1', ''),
(13, 'Books/Books20/633590.jpg', 20, 1, 'Books', '8837e3ea34-1', ''),
(14, 'Books/Books21/ee3bf6.jpg', 21, 1, 'Books', 'ece8d3decb-1', ''),
(15, 'Books/Books22/ef177f.jpg', 22, 1, 'Books', 'e38c2566e7-1', ''),
(16, 'Books/Books23/3bb64a.jpg', 23, 1, 'Books', '8237f0c5cc-1', ''),
(17, 'Books/Books24/69ae1c.jpg', 24, 1, 'Books', 'f5df1abc58-1', ''),
(18, 'Books/Books25/87e6a7.jpg', 25, 1, 'Books', '01d8f52b93-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1492604757),
('m140506_102106_rbac_init', 1494754681),
('m140622_111540_create_image_table', 1494401128),
('m140622_111545_add_name_to_image_table', 1494401128),
('m170419_122323_create_user_table', 1492604760),
('m170505_155754_create_books_table', 1494400799),
('m170505_155824_create_author_table', 1494400800),
('m170505_155834_create_year_table', 1494400800),
('m170505_155859_create_category_table', 1494400800),
('m170505_161422_add_author_id_in_books_table', 1494400801),
('m170505_161441_add_year_id_in_books_table', 1494400803),
('m170505_161453_add_category_id_in_books_table', 1494400804),
('m170509_143308_alter_insert_price_to_books_table', 1494400805),
('m170514_085249_create_order_table', 1494752310),
('m170514_085305_create_order_books_table', 1494752311),
('m170514_085906_add_books_id_in_order_books_tabler', 1494752592),
('m170514_085925_add_order_id_in_order_books_tabler', 1494752593),
('m170514_092145_add_properties_in_order_books_table', 1494753923),
('m170515_134011_create_profile_table', 1494859400),
('m170515_134341_add_user_id_in_profile_table', 1494859402),
('m170608_225638_add_count_in_books_table', 1496962684);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number_post` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `phone`, `address`, `number_post`) VALUES
(1, 'admin', 'admin', '456', 'sdasad', 1),
(2, 'admin', 'admin', '456', 'sdasad', 1),
(3, 'admin', 'admin', '456', 'sdasad', 1),
(4, 'admin', 'admin', '456', 'sdasad', 1),
(5, 'admin', 'admin', '456', 'sdasad', 25),
(6, 'admin', 'admin', '456', 'sdasad', 25),
(7, 'admin', 'admin', '456', 'sdasad', 1),
(8, 'admin', 'admin', '456', 'sdasad', 1),
(9, '1', '1', '1', '1', 1),
(10, '1', '1', '1', '1', 1),
(11, 'Denis', 'Mazur', '12345678', 'st. Schema', 2),
(12, 'Denis', 'Mazur', '12345678', 'st. Schema', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `order_books`
--

CREATE TABLE IF NOT EXISTS `order_books` (
  `id` int(11) NOT NULL,
  `books_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_books`
--

INSERT INTO `order_books` (`id`, `books_id`, `order_id`, `name`, `price`, `quantity`) VALUES
(1, 1, 6, 'зрз', '50', 1),
(2, 1, 8, 'зрз', '50', 1),
(3, 24, NULL, 'Воно', '225', 1),
(4, 25, NULL, 'Утопія', '35', 1),
(5, 24, NULL, 'Воно', '225', 1),
(6, 24, NULL, 'Воно', '225', 1),
(7, 24, 10, 'Воно', '225', 1),
(8, 25, 11, 'Утопія', '35', 1),
(9, 23, 12, 'Сяйво', '330', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_name` varchar(255) NOT NULL,
  `address_name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `first_name`, `last_name`, `phone_name`, `address_name`, `user_id`) VALUES
(1, 'Test', 'Test', '4565', 'Test', 2),
(2, 'Denis', 'Mazur', '12345678', 'st. Schema', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `status`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'Denis', 'denis@admin.co', '$2y$13$UdZXAvJsd2KqTyT1IPRhIeKHpTd3tSqafbu4oSxdIWncYJ0qwCMeO', 10, 'SeoFS8AxgOL5d0B-wRnEkUy8p0bnM82z', 1492604844, 1492604844),
(2, 'test', 'or@sredi.gor', '$2y$13$2gW1efXjbY8qPYGDM8C8Ye76x/qGCRPs4q4IQWvsQloeotr9xAgee', 10, 'sqz7XI_HE9KX5pLbk7JTQRYYVyqQ36Yz', 1494755052, 1494755052);

-- --------------------------------------------------------

--
-- Структура таблицы `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `year`
--

INSERT INTO `year` (`id`, `year`) VALUES
(1, '1949'),
(2, '1950'),
(3, '1951'),
(4, '1952'),
(5, '1953'),
(6, '1954'),
(7, '1955'),
(8, '1956'),
(9, '1957'),
(10, '1958'),
(11, '1959'),
(12, '1960'),
(13, '1961'),
(14, '1962'),
(15, '1963'),
(16, '1964'),
(17, '1965'),
(18, '1966'),
(19, '1967'),
(20, '1968'),
(21, '1969'),
(22, '1970'),
(23, '1971'),
(24, '1972'),
(25, '1973'),
(26, '1974'),
(27, '1975'),
(28, '1976'),
(29, '1977'),
(30, '1978'),
(31, '1979'),
(32, '1980'),
(33, '1981'),
(34, '1982'),
(35, '1983'),
(36, '1984'),
(37, '1985'),
(38, '1986'),
(39, '1987'),
(40, '1988'),
(41, '1989'),
(42, '1990'),
(43, '1991'),
(44, '1992'),
(45, '1993'),
(46, '1994'),
(47, '1995'),
(48, '1996'),
(49, '1997'),
(50, '1998'),
(51, '1999'),
(52, '2000'),
(53, '2001'),
(54, '2002'),
(55, '2003'),
(56, '2004'),
(57, '2005'),
(58, '2006'),
(59, '2007'),
(60, '2008'),
(61, '2009'),
(62, '2010'),
(63, '2011'),
(64, '2012'),
(65, '2013'),
(66, '2014'),
(67, '2015'),
(68, '2016');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_books` (`author_id`),
  ADD KEY `year_books` (`year_id`),
  ADD KEY `category_books` (`category_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_books`
--
ALTER TABLE `order_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_books_order` (`books_id`),
  ADD KEY `order_order` (`order_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `order_books`
--
ALTER TABLE `order_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `author_books` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_books` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `year_books` FOREIGN KEY (`year_id`) REFERENCES `year` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_books`
--
ALTER TABLE `order_books`
  ADD CONSTRAINT `order_books_order` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `order_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
