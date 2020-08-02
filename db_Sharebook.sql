-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2020 at 06:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_Sharebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `books_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `book_name` char(55) DEFAULT NULL,
  `author` varchar(20) NOT NULL,
  `publisher` varchar(250) NOT NULL,
  `uploader` int(11) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `image` char(80) DEFAULT NULL,
  `page_number` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`books_id`, `type_id`, `book_name`, `author`, `publisher`, `uploader`, `status`, `image`, `page_number`, `amount`, `updated_at`, `created_at`) VALUES
(23, 1, 'The Jane Austen Society', 'NATALIE JENNER', 'Nhà xuất bản thế giới', 11, 'Just after the Second World War, in the small English village of Chawton, an unusual but like-minded group of people band together to attempt something remarkable.\r\n\r\nOne hundred and fifty years ago, Chawton was the final home of Jane Austen, one of England\'s finest novelists. Now it\'s home to a few distant relatives and their diminishing estate. With the last bit of Austen\'s legacy threatened, a group of disparate individuals come together to preserve both Jane Austen\'s home and her legacy. These people—a laborer, a young widow, the local doctor, and a movie star, among others—could not be more different and yet they are united in their love for the works and words of Austen. As each of them endures their own quiet struggle with loss and trauma, some from the recent war, others from more distant tragedies, they rally together to create the Jane Austen Society.', 'uploads/books/1591630358_e4204b5b0b924745e0e5ab8d0082bc42book14.jpg', NULL, 250, '2020-06-08 15:32:38', '2020-06-08 15:32:38'),
(24, 6, 'The vanishing half', 'BRIT NENNETT', 'Nhà xuất bản thế giới', 11, 'The Vignes twin sisters will always be identical. But after growing up together in a small, southern black community and running away at age sixteen, it\'s not just the shape of their daily lives that is different as adults, it\'s everything: their families, their communities, their racial identities. Ten years later, one sister lives with her black daughter in the same southern town she once tried to escape. The other secretly passes for white, and her white husband knows nothing of her past. Still, even separated by so many miles and just as many lies, the fates of the twins remain intertwined. What will happen to the next generation, when their own daughters\' storylines intersect?\r\n\r\nWeaving together multiple strands and generations of this family, from the Deep South to California, from the 1950s to the 1990s, Brit Bennett produces a story that is at once a riveting, emotional family story and a brilliant exploration of the American history of passing. Looking well beyond issues of race, The Vanishing Half considers the lasting influence of the past as it shapes a person\'s decisions, desires, and expectations, and explores some of the multiple reasons and realms in which people sometimes feel pulled to live as something other than their origins.', 'uploads/books/1591631000_125c0e943c73bb8a0840ab524fdcbd08book-21.jpg', NULL, 502, '2020-06-08 15:43:20', '2020-06-08 15:43:20'),
(25, 6, 'DOCTOR SLEEP\r\n', 'STEPHEN KING', 'Nhà xuất bản thế giới', 11, 'Doctor Sleep is a 2013 horror novel by American writer Stephen King and the sequel to his 1977 novel The Shining. The book reached the first position on The New York Times Best Seller list for print and ebook fiction (combined), hardcover fiction, and ebook fiction. Doctor Sleep won the 2013 Bram Stoker Award for Best Novel.[1]\r\n\r\nThe novel was adapted into a film of the same name, which was released on November 8, 2019 in the United States.', 'uploads/books/1591631140_5cc085288d7afc9d76f6aa846b7e5d5fbook-15.jpg', NULL, 425, '2020-06-08 15:45:40', '2020-06-08 15:45:40'),
(26, 6, 'The Rain in Portugan', 'BILLY COLLINS', 'Nhà xuất bản thế giới', 11, 'By turns entertaining, engaging, and enlightening, The Rain in Portugal amounts to another chorus of poems from one of the most respected and familiar voices in the world of American poetry. Praise for The Rain in Portugal. “Nothing in Billy Collins\'s twelfth book .', 'uploads/books/1591631262_af1aab8e1492ed8a46ba456e2c74e915book-30.jpg', NULL, 500, '2020-06-08 15:47:42', '2020-06-08 15:47:42'),
(27, 3, 'LET\'S GO TO AMSTERDAM', 'JONAS NILL BARTON', 'Nhà xuất bản thế giới', 12, 'Let\'s Go Budget Amsterdam is a budget traveler\'s ticket to getting the most out of a trip to Amsterdam—without breaking the bank. Whether you want to finally see Sunflowers in person at the Van Gogh Museum, sample the fare at one of the city\'s world-famous coffeeshops, or partake in Leidseplein\'s hopping bar scene, this slim, easy-to-carry guide is packed with dollar-saving information to help you make every penny count. Let\'s Go Budget Amsterdam also includes neighborhood maps to help you get oriented, plus eight pages\' worth of color photos to whet your appetite for sightseeing. From how to get discount tickets for museums, performances, and public transportation to where to find cheap eats and affordable accommodations, Let\'s Go Budget Amsterdam has got you covered—and it\'s small enough to fit in your back pocket.Let\'s Go Budget Guides are for travelers who want to spend less but have more fun, students with more time than money, an', 'uploads/books/1591631588_595afbd7f5a99efd71556d99b39c268ebook--7.jpg', NULL, 600, '2020-06-08 15:53:08', '2020-06-08 15:53:08'),
(28, 3, 'THE SECOND HOME', 'CHRISTINA CLANCY', 'Nhà xuất bản thế giới', 12, 'After a disastrous summer spent at her family summer home on Cape Cod, seventeen-year-old Ann Gordon was left with a secret that changed her life forever, and created a rift between her sister, Poppy, and their adopted brother, Michael.\r\n\r\nNow, fifteen years later, her parents have died, leaving Ann and Poppy to decide the fate of the Wellfleet home that\'s been in the Gordon family for generations. For Ann, the once-beloved house is tainted with bad memories. Poppy loves the old saltbox, but after years spent chasing waves around the world, she isn\'t sure she knows how to stay in one place.\r\n\r\nJust when the sisters decide to sell, Michael re-e', 'uploads/books/1591631686_0c31e3f48d676b7020ce13ef3b80132ebook-23.jpg', NULL, 450, '2020-06-08 15:54:46', '2020-06-08 15:54:46'),
(29, 6, 'FAMILY for BEGINNERS', 'SARAH MORGAN', 'Nhà xuất bản thế giới', 12, 'When Flora falls in love with Jack, suddenly she’s not only handling a very cranky teenager, but she’s also living in the shadow of Jack’s perfect, immortalised wife, Becca. Every summer, Becca and Jack would holiday with Becca’s oldest friends and Jack wants to continue the tradition, so now Flora must face a summer trying to live up to Becca’s memory, with not only Jack’s daughter looking on, but with Becca’s best friends judging her every move…', 'uploads/books/1591631811_6f0a4bf5894cd8acfbcaba3c386fd1c0book-24.jpg', NULL, 500, '2020-06-08 15:56:51', '2020-06-08 15:56:51'),
(30, 3, 'Like a summer', 'MARIE NOVELE', 'Nhà xuất bản thế giới', 12, '<p><tt>It&#39;s almost Christmas, but there is no joy in the house of terminally ill Jack and his family. With only a short time left to live, he spends his last days preparing to say goodbye to his devoted wife, Lizzie, and their three children. Then, unthinkably, tragedy strikes again: Lizzie is killed in a car accident. With no one able to care for them, the children are separated from each other and sent to live with family members around the country.</tt></p>\r\n\r\n<p><tt>Just when all seems lost, Jack begins to recover in a miraculous turn of events. He rises from what should have been his deathbed, determined to bring his fractured family back together. Struggling to rebuild their lives after Lizzie&#39;s death, he reunites everyone at Lizzie&#39;s childhood home on the oceanfront in South Carolina. And there, over one unforgettable summer, Jack will begin to learn to love again, and he and his children will learn how to become a family once more.</tt></p>', 'uploads/books/1591632888_149c7ed331bd4b4eb91cb6a4e97a83b0book--8.jpg', NULL, 680, '2020-06-08 16:14:48', '2020-06-08 16:14:48'),
(31, 2, 'ABSTRACT BACKGROUND', 'JONAS NILL BARTON', 'Nhà xuất bản thế giới', 13, '<p><em><strong>The Vignes twin sisters will always be identical. But after growing up together in a small, southern black community and running away at age sixteen, it&#39;s not just the shape of their daily lives that is different as adults, it&#39;s everything: their families, their communities, their racial identities. Ten years later, one sister lives with her black daughter in the same southern town she once tried to escape. The other secretly passes for white, and her white husband knows nothing of her past. Still, even separated by so many miles and just as many lies, the fates of the twins remain intertwined. What will happen to the next generation, when their own daughters&#39; storylines intersect? Weaving together multiple strands and generations of this family, from the Deep South to California, from the 1950s to the 1990s, Brit Bennett produces a story that is at once a riveting, emotional family story and a brilliant exploration of the American history of passing. Looking well beyond issues of race, The Vanishing Half considers the lasting influence of the past as it shapes a person&#39;s decisions, desires, and expectations, and explores some of the multiple reasons and realms in which people sometimes feel pulled to live as something other than their origins.</strong></em></p>', 'uploads/books/1591695362_bae00fb8b4115786ba5dbbb67b9b177abook--4.jpg', NULL, 258, '2020-06-09 09:36:02', '2020-06-09 09:36:02'),
(32, 8, 'Body language', 'JOHN FANDER', 'Nhà xuất bản thế giới', 14, '<p><code><em>Actions really do speak louder than words. If you are puzzled by other people or want to improve the impression you give, having an insight into body language is key.</em></code></p>\r\n\r\n<p><code><em>In this book you&#39;ll discover how the body reveals what people really mean, and how you can use your body and your expressions to make a positive impact. It also explores why we give the signals we do, how to read the most common expressions and goes on to show how you can use body language to transform your personal and professional relationships.</em></code></p>', 'uploads/books/1593224823_b61248fcbcb76b463231d88a39b5d4cbbook-26.jpg', NULL, 250, '2020-06-27 02:27:03', '2020-06-27 02:27:03'),
(33, 6, 'The lover', 'abc', 'abc', 14, '<p>salkdnaslkfnaoifnaslkfnaslfnasf ;&agrave; alshfasl;fhwf ja;rawpprhawofhaoifh alfsapf</p>\r\n\r\n<p>&nbsp;</p>', 'uploads/books/1593225094_0aa1511124ea5b7ea5d54e0a648bf830book-19.jpg', NULL, 25468, '2020-06-27 02:31:34', '2020-06-27 02:31:34'),
(34, 6, 'The secrets', 'JONAS NILL BARTON', 'Nhà xuất bản thế giới', 14, '<p>The Secret is a self-help book regarding the power of positive thinking by Rhonda Byrne. The book suggests the notion that like attracts the like, which means if you emit positive energy, it will be very beneficial because you will attract positive things to you. Byrne proposed that positive thinking magnets positive outcomes. Simply believing in what you want to acquire or become will become of you. The book portrays that the secret is mainly about the law of attraction but it also highlights gratitude and visualization. The primary technique of ask, believe and receive is explained further by stating some facts from some of the Secret&rsquo;s practitioners. The book promotes encouragement for people in times of trials or deepens their urge to succeed. Happiness, wealth, success in relationships, and even health improvement are all justified as achievable by the application of the so-called secret.</p>', 'uploads/books/1593251767_25d6202ac9a813700f3660aafd2c59b8book--1.jpg', NULL, 548, '2020-06-27 09:56:07', '2020-06-27 09:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `type_id` int(11) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `type_name` char(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`type_id`, `slug`, `type_name`) VALUES
(1, 'kinh-te', 'Kinh tế'),
(2, 'cntt', 'Công nghệ thông tin'),
(3, 'pcs', 'Phong cách sống'),
(6, 'tieu-thuyet', 'Tiểu thuyết'),
(7, 'ngoai-ngu', 'Ngoại ngữ'),
(8, 'kh-ds', 'Khoa học và đời sống');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `ranking` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_03_21_112817_create_authors_table', 0),
(2, '2020_03_21_112817_create_book_type_table', 0),
(3, '2020_03_21_112817_create_books_table', 0),
(4, '2020_03_21_112817_create_comments_table', 0),
(5, '2020_03_21_112817_create_publishers_table', 0),
(6, '2020_03_21_112817_create_transaction_table', 0),
(7, '2020_03_21_112817_create_transaction_detail_table', 0),
(8, '2020_03_21_112817_create_user_table', 0),
(9, '2020_03_21_112819_add_foreign_keys_to_books_table', 0),
(10, '2020_03_21_112819_add_foreign_keys_to_comments_table', 0),
(11, '2020_03_21_112819_add_foreign_keys_to_transaction_table', 0),
(12, '2020_03_21_112819_add_foreign_keys_to_transaction_detail_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `state` int(3) NOT NULL,
  `date_borrow` date NOT NULL,
  `date_return` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `state`, `date_borrow`, `date_return`, `user_id`, `books_id`) VALUES
(9, 2, '2020-06-27', '0000-00-00', 14, 26),
(10, 2, '2020-06-27', '0000-00-00', 14, 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` char(55) NOT NULL,
  `phone` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `phone`, `email`, `password`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(11, 'Thuận Phong', '0949028696', 'phongbui241299@gmail.com', '$2y$10$v33eV7oFz7oly1IGIVhUMOH4t2kvoBIS0.WHbPu6BpJ1fNq3MFgi6', 'uploads/avatar/1591630205_3da972c3ec85b6f3cc5306acf034fd23user-6.jpg', 0, '2020-06-08 08:30:05', '2020-06-08 08:30:05'),
(12, 'Phan Ngọc Thảo', '0919293330', 'thaophan@gmail.com', '$2y$10$KB6.ATlqXHYPP6BwhJPopOPBTohnxGf1P.imGdvxwMaeEzQEcWONK', 'uploads/avatar/1591631440_ded081fcbbe6cda656e5bc51dfc6bbfauser-7.jpg', 0, '2020-06-08 08:50:40', '2020-06-08 08:50:40'),
(13, 'Lê Quốc Vương', '54684684', 'kinglee@gmail.com', '$2y$10$4vM5yu8PCLg3yu5myg2FMOS9rpy4yUhMdyODZ.VRRBFNCCxT05642', 'uploads/avatar/1591632992_8b4a7f8ae7c1159a3a6210ba630181causer-4.jpg', 0, '2020-06-08 09:16:32', '2020-06-08 09:16:32'),
(14, 'Quách Trần Khả Hân', '0911112223', 'khahan@gmail.com', '$2y$10$DOxUKqsaIA9AUuZM.ocT6egkzFkIH9TyeyyDHBCSflIYkpI5oTtdy', 'uploads/avatar/1592051724_4fec58181bb416f09f8ef0f69433584fuser-4.jpeg', 0, '2020-06-13 05:35:24', '2020-06-13 05:35:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`books_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `uploader` (`uploader`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `books_id` (`books_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `id_book` (`books_id`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone` (`phone`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `book_type` (`type_id`),
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`uploader`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`books_id`) REFERENCES `books` (`books_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`books_id`) REFERENCES `books` (`books_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
