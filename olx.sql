-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 08:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olx`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'item-empty-img.png',
  `added_date` date NOT NULL,
  `governorate` varchar(255) NOT NULL DEFAULT 'Cairo',
  `item_status` varchar(255) DEFAULT 'new',
  `publish_state` varchar(255) DEFAULT 'pending',
  `rating` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `price`, `phone_number`, `image`, `added_date`, `governorate`, `item_status`, `publish_state`, `rating`, `user_id`, `category_id`) VALUES
(1, 'Game of thrones', 'an amazing book and very fantasy story', 120, '01154214028', 'olx-ad2573301525597images.jpeg', '2022-03-02', 'cairo', 'new', 'published', 0, 1, 2),
(2, 'iPhone 13 pro max', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 16000, '01047587462', 'olx-ad861700765271461IJBsHm97L._AC_SL1500_.jpg', '2022-03-02', 'cairo', 'used', 'published', 0, 2, 3),
(6, 'Samsung 20s', 'Samsung 20s description the desc', 9000, '01147587265', 'olx-ad3478700517351ox3l9OzDL._AC_SL1162_.jpg', '2022-03-03', 'giza', 'new', 'published', 0, 1, 3),
(7, 'IPhone 8 plus', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4599, '01148735290', 'olx-ad707786193411941IXYJszU4L._AC_.jpg', '2022-03-03', 'cairo', 'like new', 'published', 0, 1, 3),
(8, 'A song of ice and fire', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 299, '01048562744', 'olx-ad317667521692851OtvZLinVL._AC_SY580_.jpg', '2021-03-18', 'alex', 'new', 'published', 0, 1, 2),
(9, 'Black Jacket', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 170, '01267483647', 'olx-ad73805546524053.jpg', '2022-03-03', 'cairo', 'like new', 'published', 0, 2, 1),
(10, 'Red T-shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 258, '01264780262', 'olx-ad9538650888912istockphoto-674456750-612x612.jpg', '2022-03-03', 'cairo', 'new', 'published', 0, 2, 1),
(11, 'Eloquent Javascript - Third Edition', 'A modern introduction to programming&#13;&#10;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 200, '01147284980', 'olx-ad4546871974602book.jpg', '2022-03-03', 'cairo', 'new', 'published', 0, 2, 2),
(12, 'Samsung s6 white', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1400, '01037462532', 'olx-ad4742249733270618cyFfBFkL._AC_SX466_.jpg', '2022-03-03', 'alex', 'used', 'published', 0, 2, 3),
(13, 'Keyboard Gaming RGB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 89, '01156398462', 'olx-ad418638609432971PC6XdmvjL._AC_SL1500_.jpg', '2022-03-03', 'giza', 'used', 'published', 0, 1, 10),
(14, 'Gaming Mouse RGB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 99, '01164892645', 'olx-ad1234547583633611jbF+FbbL._AC_SL1500_.jpg', '2022-03-03', 'giza', 'used', 'published', 0, 1, 10),
(16, 'Harry potter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 289, '01146847689', 'olx-ad540088094277olx-ad767520819891GUEST_f3dcd77d-bef5-4037-a2bd-fb6524ddb0cf.jpeg', '2022-03-06', 'alex', 'new', 'published', 0, 1, 2),
(18, 'tall boots', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 330, '01147364592', 'olx-ad260838429570971QSjlTq9SL._AC_SY625_.jpg', '2022-03-07', 'alex', 'used', 'published', 0, 3, 1),
(19, 'women&#39;s shoes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 99, '01556783976', 'olx-ad353038400108141DXbSdinES._AC_.jpg', '2022-03-07', 'cairo', 'new', 'published', 0, 3, 1),
(20, 'Bee car for kids', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 58, '01574852095', 'olx-ad62043252941741NDJczVj9S._AC_.jpg', '2022-03-07', 'alex', 'used', 'published', 0, 3, 5),
(21, 'red car for kids', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 89, '01045627849', 'olx-ad168457256317851yLHo1qH4L._AC_.jpg', '2022-03-07', 'giza', 'like new', 'published', 0, 3, 5),
(22, 'yellow teddy bear', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 120, '01246578928', 'olx-ad167460471961M21qBCFWS.__AC_SX300_SY300_QL70_ML2_.jpg', '2022-03-07', 'giza', 'new', 'published', 0, 3, 5),
(23, 'Black watch', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 170, '01274687323', 'olx-ad9314629160886813BjZzAqrL._AC_SY741_.jpg', '2022-03-07', 'giza', 'used', 'published', 0, 3, 1),
(24, 'Honda car selver', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#38;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 49000, '01167487625', 'olx-ad13053370466097cutout-car-images.jpg', '2022-03-07', 'cairo', 'like new', 'published', 0, 3, 14),
(25, 'red car toyota ', 'Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry&#38;#38;#39;S Standard Dummy Text Ever Since The 1500s, When An Unknown Printer Took A Galley Of Type And Scrambled It To Make A Type Specimen Book. It', 400000, '01154275689', 'olx-ad6334061997602021-Toyota-Camry-XSE.jpg', '2022-03-07', 'alex', 'new', 'published', 0, 3, 14),
(26, 'motorcycle halawa', 'The 1960s With The Release Of Letraset Sheets Containing Lorem Ipsum Passages, And More Recently With Desktop Publishing Software Like Aldus PageMaker Including Versions Of Lorem Ipsum.', 4799, '010564784724', 'olx-ad5240962391400mash-five-hundred-400cc-2018.jpg', '2022-03-07', 'cairo', 'new', 'published', 0, 2, 15),
(27, 'orange motorcycle', 'But Also The Leap Into Electronic Typesetting, Remaining Essentially Unchanged. It Was Popularised In The 1960s With The Release Of Letraset Sheets Containing Lorem Ipsum Passages, And More Recently With Desktop Publishing Software', 8000, '0105678392', 'olx-ad134181330354020822-livewire-arrow-s2-del-mar-f-633x388.png', '2022-03-07', 'alex', 'like new', 'published', 0, 2, 15),
(28, ' iPhone 12 mini', '&#13;&#10;iPhone 12 mini 64GB Green', 14999, '01064789243', 'olx-ad850473920953871i+-WmxHWL._AC_SL1500_.jpg', '2022-03-07', 'alex', 'new', 'published', 0, 1, 3),
(29, 'SAMSUNG 32', 'SAMSUNG 32 Inch Odyssey G5 Gaming Monitor with 1000R Curved Screen, 144Hz, 1ms, FreeSync Premium, QHD (LC32G55TQWMXZN), Black', 6999, '01167857625', 'devlogs-ad188955248607061VrLMwLSES._AC_SL1500_.jpg', '2022-03-07', 'cairo', 'new', 'published', 0, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `parent`) VALUES
(1, 'fashion', 'fashion description', 0),
(2, 'books', 'books description', 0),
(3, 'phones', 'phones description', 4),
(4, 'technology', 'technology desc', 0),
(5, 'Kids', 'Kids desc', 0),
(6, 'Vehicles', 'Vehicles desc', 0),
(10, 'Computer & Laptop', 'Computer & Laptop desc', 4),
(14, 'cars', 'desc', 6),
(15, 'motorcycles', 'desc motorcycles', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `comment_date`, `status`, `user_id`, `ad_id`) VALUES
(1, 'Thank you', '2022-03-05', 1, 3, 2),
(2, 'bla bla bla', '2022-03-05', 1, 3, 7),
(3, 'Amazing', '2022-03-05', 1, 2, 2),
(4, 'gameed', '2022-03-05', 1, 1, 11),
(5, 'A Modern Introduction To Programming Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry&#38;#39;S Standard Dummy Text Ever Since The 1500s, When An Unknown Printer Took A Galley Of Type And Scrambled It To Make A Type Specimen Book. It Has Survived Not Only Five Centuries, But Also The Leap Into Electronic Typesetting, Remaining Essentially Unchanged. It Was Popularised In The 1960s With The Release Of Letraset Sheets Containing Lorem Ipsum Passages, And More Recently With Desktop Publishing Software Like Aldus PageMaker Including Versions Of Lorem Ipsum.', '2022-03-05', 1, 1, 11),
(6, 'كتاب جامد جدا', '2022-03-05', 1, 2, 8),
(7, 'Thank you george r. r. &#60;3', '2022-03-05', 1, 3, 8),
(8, 'جميل جدا', '2022-03-05', 1, 3, 13),
(9, 'dsadasd', '2022-03-06', 1, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`ad_id`, `user_id`) VALUES
(8, 2),
(9, 2),
(14, 2),
(13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `ordering`) VALUES
(3, 'devlogs-image-1835155800Untitled-1.jpg', 0),
(4, 'devlogs-image-1139178400Untitled-1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'user-empty.png',
  `cover_image` varchar(255) NOT NULL DEFAULT 'cover.jpg',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_state` varchar(255) NOT NULL DEFAULT 'pending',
  `trust_user` tinyint(4) NOT NULL DEFAULT 0,
  `reg_date` date NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Egypt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `profile_image`, `cover_image`, `email`, `password`, `reg_state`, `trust_user`, `reg_date`, `country`) VALUES
(1, 'youssef', 'Youssef Ahmed Sayed', 'olx-img31504788001157991.jpg', 'olx-img271622600010709367.jpg', 'youssef@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'registered', 1, '2022-03-02', 'egypt'),
(2, 'abdo', 'Abdo Rabie', 'olx-img3402878500IMG_2092.JPG', 'olx-img3270366000olx-img2330893200122222.jpg', 'abdo@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'pending', 1, '2022-03-02', 'egypt'),
(3, 'fatma', 'Fatma Ahmed', 'user-empty.png', 'cover.jpg', 'fatma@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'pending', 1, '2022-03-04', 'Egypt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_ibfk_2` (`category_id`),
  ADD KEY `ads_ibfk_1` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ad_id` (`ad_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ad_id` (`ad_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
