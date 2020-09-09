-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2020 at 08:41 PM
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
  `name` char(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Уборка'),
(2, 'Курьерские услуги'),
(3, 'Доставка');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` char(48) NOT NULL,
  `coord` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `coord`) VALUES
(1, 'Казань', '55.796289, 49.108795');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` char(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Новая'),
(2, 'В работе'),
(3, 'Завершено'),
(4, 'Провалено'),
(5, 'Отменено');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` char(48) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category` int(8) NOT NULL,
  `city` char(48) DEFAULT NULL,
  `price` int(8) NOT NULL,
  `date_end` datetime NOT NULL,
  `owner` int(11) NOT NULL,
  `worker` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `estimation` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `category`, `city`, `price`, `date_end`, `owner`, `worker`, `status`, `estimation`) VALUES
(1, 'Повесить полку', 'Описание', 1, '55.796289, 49.108795', 1000, '2020-11-26 00:00:00', 1, NULL, 0, NULL);

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
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` char(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` char(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` int(11) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `description` text,
  `phone` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `skype` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telegram` char(48) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `failed` int(11) NOT NULL DEFAULT '0',
  `popular` int(11) DEFAULT NULL,
  `avatar` char(255) DEFAULT NULL,
  `last_enter` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `city`, `birthday`, `description`, `phone`, `skype`, `telegram`, `failed`, `popular`, `avatar`, `last_enter`) VALUES
(1, 'Василий', '$2y$10$Cs8kJj70t/Cz4887Bw.9cOMF.pk83iAa8hoK.aBgPXthG3PSo/Xwq', 'DenisT@bk.ru', 1, NULL, NULL, '85551874487', NULL, NULL, 0, NULL, NULL, NULL),
(2, 'Павел', '$2y$13$0ZumIKAU5KTk86CrFocW/uzB9AbIrwF6EFYnGopxGWOM82GeKkQly', 'somedf@dff.ru', 1, '1988-09-22 00:00:00', NULL, '89999999999', NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_favorite`
--

CREATE TABLE `user_favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_favorite`
--

INSERT INTO `user_favorite` (`id`, `user_id`, `worker_id`, `is_favorite`) VALUES
(1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE `user_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_rating`
--

INSERT INTO `user_rating` (`id`, `user_id`, `worker_id`, `rating`) VALUES
(1, 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`id`, `user_id`, `worker_id`, `review`) VALUES
(1, 1, 2, 'Отзыв');

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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category`),
  ADD KEY `city_id` (`city`),
  ADD KEY `owner_id` (`owner`),
  ADD KEY `worker_id` (`worker`);

--
-- Indexes for table `task_category`
--
ALTER TABLE `task_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `user_favorite`
--
ALTER TABLE `user_favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- Indexes for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_category`
--
ALTER TABLE `task_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_favorite`
--
ALTER TABLE `user_favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`owner`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `worker_id` FOREIGN KEY (`worker`) REFERENCES `user` (`id`);

--
-- Constraints for table `task_category`
--
ALTER TABLE `task_category`
  ADD CONSTRAINT `task_category_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `task_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`city`) REFERENCES `city` (`id`);

--
-- Constraints for table `user_favorite`
--
ALTER TABLE `user_favorite`
  ADD CONSTRAINT `user_favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_favorite_ibfk_2` FOREIGN KEY (`worker_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD CONSTRAINT `user_rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_rating_ibfk_2` FOREIGN KEY (`worker_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_review`
--
ALTER TABLE `user_review`
  ADD CONSTRAINT `user_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_review_ibfk_2` FOREIGN KEY (`worker_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
