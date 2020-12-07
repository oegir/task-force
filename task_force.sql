-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2020 at 07:14 PM
-- Server version: 8.0.12
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_force`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` char(48) NOT NULL,
  `slug` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'Уборка', 'clean'),
(2, 'Компьютерная помощь', 'neo'),
(3, 'Ремонт квартирный', 'flat'),
(4, 'Ремонт техники', 'repair'),
(5, 'Красота', 'beauty'),
(6, 'Фото', 'photo'),
(7, 'Переводы', 'translation'),
(8, 'Переезды', 'cargo');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` char(48) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `latitude`, `longitude`) VALUES
(1, 'Казань', 55.796289, 49.108795),
(2, 'Nong Chik', 6.8117856, 101.1843887),
(3, 'Kavadarci', 41.4410475, 22.0126949),
(4, 'Sapele', 5.8750769, 5.6931356),
(5, 'Al Majd', 31.8810103, 35.219546),
(6, 'Helmas', 41.191548, 19.626265),
(7, 'Dicun', 37.8311926, 112.5870889),
(8, 'Kelasuri', 43.0225426, 41.1157847),
(9, 'Youngstown', 41.0699247, -80.6937177),
(10, 'Heidelberg', -26.2396883, 28.3217259);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `description` text NOT NULL,
  `worker_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `date_add`, `description`, `worker_id`, `owner_id`) VALUES
(1, '2019-05-09', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 1, 2),
(2, '2018-10-27', 'Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 2, 1),
(3, '2018-11-02', 'Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 1, 2),
(4, '2019-06-04', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.', 2, 1),
(5, '2018-10-09', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 2, 1),
(6, '2019-07-16', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 1, 2),
(7, '2019-01-22', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 2, 1),
(8, '2019-06-11', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 1, 2),
(9, '2019-02-16', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 2, 1),
(10, '2019-07-16', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, 2),
(11, '2018-11-11', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 1, 2),
(12, '2018-11-01', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 2, 1),
(13, '2018-10-05', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 1, 2),
(14, '2019-02-28', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 2, 1),
(15, '2019-07-04', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 1, 2),
(16, '2019-07-30', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 2, 1),
(17, '2019-07-10', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 1, 2),
(18, '2019-09-15', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 2, 1),
(19, '2018-10-16', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 1, 2),
(20, '2019-02-13', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1607356913),
('m201018_152335_create_junction_table_for_user_and_profile', 1607356929),
('m201018_153322_create_junction_table_for_user_and_task', 1607356930),
('m201018_161047_create_junction_table_for_user_and_category', 1607356930),
('m201102_175120_change_cords_fields', 1607356930),
('m201106_114036_add_popular_column_to_profile_table', 1607356930),
('m201107_065853_add_online_column_to_profile_table', 1607356930),
('m201107_100807_add_favorite_column_to_profile_table', 1607356930),
('m201116_154214_create_table_for_task_and_file', 1607356930),
('m201117_181950_create_response_table', 1607356931),
('m201118_190350_add_avatar_column_to_profile_table', 1607356931),
('m201126_162438_add_date_column_to_user_table', 1607356931),
('m201127_180133_add_task_column_to_opinion_table', 1607356931),
('m201127_182850_add_avatar_column_to_user_table', 1607356931),
('m201127_183246_remove_avatar_column_from_profile_table', 1607356932),
('m201128_065435_add_foreign_key_to_task_file_table', 1607356932),
('m201128_070720_add_owner_column_to_task_table', 1607356932),
('m201207_160134_update_phone_column_to_profile_table', 1607356932);

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE `opinion` (
  `id` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `rate` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `opinion`
--

INSERT INTO `opinion` (`id`, `date_add`, `rate`, `description`, `owner_id`, `worker_id`, `task_id`) VALUES
(1, '2019-08-19', 3, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui.', 4, 2, 1),
(2, '2019-02-22', 2, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 5, 1, 2),
(3, '2019-07-11', 2, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 6, 2, 7),
(4, '2018-10-07', 2, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 7, 1, 4),
(5, '2018-12-01', 1, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 8, 1, 3),
(6, '2018-11-09', 3, 'In congue. Etiam justo. Etiam pretium iaculis justo.', 4, 2, 8),
(7, '2018-12-10', 5, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus.', 5, 3, 9),
(8, '2018-10-20', 2, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 9, 3, 10),
(9, '2018-10-27', 2, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 10, 3, 5),
(10, '2019-06-14', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 6, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `about` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `date_birthday` date NOT NULL,
  `phone` text,
  `skype` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telegram` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `popular` int(11) DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `favorite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `address`, `about`, `date_birthday`, `phone`, `skype`, `telegram`, `city_id`, `popular`, `online`, `favorite`) VALUES
(1, '76 Annamark Court', 'Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '1993-10-02', '292-540-0226', 'transitional', 'monitoring', 1, 1, 1, 1),
(2, '8410 Jackson Pass', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '1985-03-20', '962-212-7940', '6th generation', 'discrete', 2, 3, 0, 1),
(3, '28236 Reindahl Plaza', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', '1983-12-22', '597-907-0142', 'background', 'circuit', 3, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `price` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `task_id`, `user_id`, `date_add`, `price`, `description`) VALUES
(1, 1, 1, '2020-11-16', 1500, 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.'),
(2, 1, 2, '2020-10-19', 1000, 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(48) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_add` date NOT NULL,
  `date_expire` date NOT NULL,
  `price` int(11) NOT NULL,
  `address` text NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `date_add`, `date_expire`, `price`, `address`, `latitude`, `longitude`, `owner_id`) VALUES
(1, 'enable impactful technologies', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2019-03-09', '2021-11-15', 6587, '1 Eagan Crossing', 6.96417, 158.208, 4),
(2, 'exploit revolutionary portals', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2019-07-03', '2019-12-07', 2904, '24043 Paget Alley', 5.62351, 10.2544, 5),
(3, 'matrix next-generation e-commerce', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2019-06-27', '2019-11-23', 1170, '2867 Dryden Pass', 63.5932, 53.9069, 6),
(4, 'benchmark plug-and-play infomediaries', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.', '2019-01-01', '2019-11-10', 838, '80 Cambridge Street', 20.58, -75.2435, 7),
(5, 'integrate cross-platform e-business', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2019-09-07', '2021-12-15', 7484, '1 Stone Corner Junction', 14.9327, -91.6942, 8),
(6, 'enable dot-com niches', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2018-11-01', '2021-11-24', 5725, '12 Stephen Terrace', 40.1631, 116.639, 9),
(7, 'transform web-enabled relationships', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2019-09-13', '2021-11-19', 4414, '6213 Lake View Drive', 44.3795, 20.2639, 1),
(8, 'strategize frictionless solutions', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '2019-04-01', '2019-11-14', 3454, '994 Corry Park', -7.32515, 108.361, 4),
(9, 'innovate seamless metrics', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2019-03-28', '2021-12-12', 3101, '2 Bluestem Park', 43, -87.97, 5),
(10, 'integrate wireless infomediaries', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', '2019-05-01', '2019-12-19', 6562, '1 Dexter Hill', 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `task_category`
--

CREATE TABLE `task_category` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_category`
--

INSERT INTO `task_category` (`id`, `task_id`, `category_id`) VALUES
(1, 1, 2),
(2, 3, 4),
(3, 2, 1),
(4, 5, 4),
(5, 1, 3),
(6, 4, 6),
(7, 5, 2),
(8, 8, 1),
(9, 7, 8),
(10, 6, 3),
(11, 9, 1),
(12, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `task_file`
--

CREATE TABLE `task_file` (
  `id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_file`
--

INSERT INTO `task_file` (`id`, `task_id`, `file`) VALUES
(1, 1, 'picture.jpg'),
(2, 1, 'agreement.docx'),
(3, 2, 'smartphone-photo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` char(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` char(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_last` datetime DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `date_last`, `date_add`, `avatar`) VALUES
(1, 'Василий', 'test@test.ru', '$2y$10$Cs8kJj70t/Cz4887Bw.9cOMF.pk83iAa8hoK.aBgPXthG3PSo/Xwq', '2020-07-27 00:00:00', '2020-07-20', 'man-blond.jpg'),
(2, 'Trstram Rosas', 'trosas1@vistaprint.com', 'cd7e76732c506c8d99ddfcfaec8c9689ab619bf1daef4361d6ec42899a3674d8', '2020-04-16 00:00:00', '2020-03-16', 'man-brune.jpg'),
(3, 'Haily Eborn', 'heborn2@answers.com', '05055fedcd49c7a8fab91a7ae6d08c57f421808433beaca2a5c1bf0124ce9112', '2020-09-28 00:00:00', '2020-09-27', 'man-glasses.jpg'),
(4, 'Marcello Learoid', 'mlearoid3@qq.com', 'b119c1afe175fd4a68a5dce935e6d23b674de47761c983f9216be99508df40f1', '2020-07-19 00:00:00', '2020-07-10', 'man-blond.jpg'),
(5, 'Elicia Crutcher', 'ecrutcher4@reference.com', 'b7545e0642c46fa80bfc1ef57fa0effe71a13de82671bf84101a0866eb4dd18b', '2019-10-09 00:00:00', '2019-10-01', 'man-hat.png'),
(6, 'Ennis Lawranson', 'elawranson5@photobucket.com', 'c6f75ca507a22ecdb271af49c0a1eff10df7a23d7263efb291931e2d3dbb4610', '2019-11-03 00:00:00', '2019-10-11', 'man-glasses.jpg'),
(7, 'Gram Malarkey', 'gmalarkey6@shinystat.com', 'ffeffbf53125f77c04d7d53a3c794f11008d9f818209c3e97f1b27c8e2ff4433', '2019-10-13 00:00:00', '2019-09-12', 'man-glasses.jpg'),
(8, 'Danita Lownes', 'dlownes7@examiner.com', '6bf7907fb59ffe13f5781936504168797c0eb413606530b59084d1b082cda5eb', '2020-08-12 00:00:00', '2020-07-11', 'man-glasses.jpg'),
(9, 'Gussi Paffett', 'gpaffett8@statcounter.com', 'c9fa5d8c6c0ac1e3c43b1a2d3e3e9e21df3cec3c2cf131bef94ead2cb57ec077', '2020-08-03 00:00:00', '2020-08-02', 'man-glasses.jpg'),
(10, 'Miles Escofier', 'mescofier9@bravesites.com', '18e9c416fbfedca2fab5c07bc175b6fe3e7b7f815e5f7be6609e59b810bf26e9', '2020-09-02 00:00:00', '2020-07-02', 'man-glasses.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `user_id`, `category_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 1),
(5, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `profile_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`id`, `user_id`, `task_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 1),
(5, 3, 6),
(6, 3, 5),
(7, 2, 7),
(8, 2, 8),
(9, 3, 9),
(10, 3, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `worker_id` (`worker_id`),
  ADD KEY `idx-opinion-task_id` (`task_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-response-task_id` (`task_id`),
  ADD KEY `idx-response-user_id` (`user_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-task-owner_id` (`owner_id`);

--
-- Indexes for table `task_category`
--
ALTER TABLE `task_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `task_file`
--
ALTER TABLE `task_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-task_file-task_id` (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_category-user_id` (`user_id`),
  ADD KEY `idx-user_category-category_id` (`category_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_profile-user_id` (`user_id`),
  ADD KEY `idx-user_profile-profile_id` (`profile_id`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_task-user_id` (`user_id`),
  ADD KEY `idx-user_task-task_id` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task_category`
--
ALTER TABLE `task_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task_file`
--
ALTER TABLE `task_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`worker_id`) REFERENCES `profile` (`id`);

--
-- Constraints for table `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `fk-opinion-task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opinion_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `opinion_ibfk_2` FOREIGN KEY (`worker_id`) REFERENCES `profile` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `fk-response-task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-response-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk-task-owner_id` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_category`
--
ALTER TABLE `task_category`
  ADD CONSTRAINT `task_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `task_category_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`);

--
-- Constraints for table `task_file`
--
ALTER TABLE `task_file`
  ADD CONSTRAINT `fk-task_file-task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_category`
--
ALTER TABLE `user_category`
  ADD CONSTRAINT `fk-user_category-task_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_category-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `fk-user_profile-profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_profile-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `fk-user_task-task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_task-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
