-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 04:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nature_luxuries_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `book_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `book_description` varchar(70) CHARACTER SET latin1 NOT NULL,
  `book_picture` varchar(50) CHARACTER SET latin1 NOT NULL,
  `book_price` decimal(10,2) NOT NULL,
  `book_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `teacher_id`, `book_name`, `book_description`, `book_picture`, `book_price`, `book_quantity`) VALUES
(15, 71, 'The Hunger Games', '(The Hunger Games #1)', '5ec335d25fa5f.jpg', '20.99', 3),
(16, 71, 'To Kill a Mockingbird', 'A novel by Harper Lee', '5ec3360133075.jpg', '21.99', 2),
(17, 70, 'Pride and Prejudice', 'Authors: Jane Austen & Anna Quindlen', '5ec336fa0981a.jpg', '14.99', 5),
(18, 70, 'Twilight', 'Author: Stephenie Meyer', '5ec33723948c7.jpg', '19.89', 2),
(19, 72, '	The Fault in Our Stars', 'Author: John Green', '5ec33833b4190.jpg', '17.99', 5),
(20, 72, 'Les Misérables', 'Authors:  Victor Hugo, Lee Fahnestock (Translator), Norman MacAfee (Tr', '5ec33862a2709.jpg', '16.49', 15);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_sender` int(11) NOT NULL,
  `message_receiver` int(11) NOT NULL,
  `message_text` varchar(50) CHARACTER SET latin1 NOT NULL,
  `message_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `message_read` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_sender`, `message_receiver`, `message_text`, `message_timestamp`, `message_read`) VALUES
(27, 73, 70, 'Hello, how are you?', '2020-05-19 01:41:36', b'1'),
(28, 73, 70, 'Please contact me as soon as you can.', '2020-05-19 01:43:52', b'1'),
(29, 74, 70, 'Hello there.', '2020-05-19 01:50:47', b'1'),
(31, 76, 71, 'Hello, how are you?', '2020-05-19 02:29:17', b'1'),
(32, 71, 76, 'Hello, I\'m fine, how about you?', '2020-05-19 02:34:10', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `news_article` varchar(70) CHARACTER SET latin1 NOT NULL,
  `news_topic` varchar(20) CHARACTER SET latin1 NOT NULL,
  `news_picture` varchar(50) CHARACTER SET latin1 NOT NULL,
  `news_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `seller_id`, `news_article`, `news_topic`, `news_picture`, `news_timestamp`) VALUES
(6, 76, 'New sale!', 'Sale', '5ec3438781463.jpg', '2020-05-19 02:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_text` varchar(60) CHARACTER SET latin1 NOT NULL,
  `notification_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `notification_read` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status` enum('Cart','Paid') CHARACTER SET latin1 NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_status`, `order_date`) VALUES
(100, 73, 'Cart', '2020-05-19 01:39:40'),
(101, 74, 'Paid', '2020-05-19 01:51:07'),
(102, 74, 'Paid', '2020-05-19 01:51:44'),
(103, 74, 'Cart', '2020-05-19 01:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_item_id`, `product_id`, `order_id`, `order_price`, `order_quantity`) VALUES
(102, 69, 1, '9.99', 1),
(103, 69, 101, '9.99', 1),
(104, 70, 101, '6.89', 1),
(105, 69, 103, '9.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `card_number` int(19) NOT NULL,
  `card_company` varchar(50) CHARACTER SET latin1 NOT NULL,
  `expiration_date` int(4) NOT NULL,
  `card_cvc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`card_id`, `customer_id`, `card_number`, `card_company`, `expiration_date`, `card_cvc`) VALUES
(4, 73, 2147483647, 'Scotia Bank', 1220, 555);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `product_picture` varchar(50) CHARACTER SET latin1 NOT NULL,
  `product_details` varchar(70) CHARACTER SET latin1 NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `seller_id`, `product_category`, `product_name`, `product_picture`, `product_details`, `product_price`, `product_quantity`) VALUES
(69, 71, 1, 'Lipstick', '5ec334d1ab0cd.jpg', 'Red Lipstick', '9.99', 1),
(70, 71, 1, 'Mascara', '5ec3352b6d5ae.jpg', 'Black Mascara', '6.89', 2),
(72, 70, 2, 'Medical Mask', '5ec3366921bf1.jpg', 'Blue', '18.99', 1),
(73, 70, 2, 'Nitrile Exam Gloves', '5ec336b94191c.jpg', 'Purple', '24.99', 5),
(74, 72, 3, 'Green Tea', '5ec337ab184c9.jpg', 'Matcha', '9.89', 10),
(75, 72, 3, 'Oolong Tea', '5ec3380238d62.jpg', 'Cream Oolong Tea', '4.99', 8),
(76, 71, 1, 'Eyeshadow', '5ec33c61f1a4b.jpg', 'Nude Palette', '11.99', 2),
(77, 70, 2, 'Test', '5ec33f9acd4c4.png', 'Dairy', '6.89', 2),
(78, 76, 1, 'Mascara', '5ec344f48bb71.jpg', 'Red Lipstick', '9.99', 11);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `phone_number` varchar(25) CHARACTER SET latin1 NOT NULL,
  `location` varchar(30) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `user_type` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `theme_id`, `first_name`, `last_name`, `email`, `phone_number`, `location`, `gender`, `user_type`) VALUES
(70, 59, 2, 'John', 'Doe', 'johndoe@mail.com', '5556667777', 'Canada', 'Male', 'Seller'),
(71, 60, 1, 'Bobby', 'Brown', 'bobbybrown@mail.com', '2223334444', 'USA', 'Male', 'Seller'),
(72, 61, 3, 'Jake', 'Perralta', 'jakeperralta@mail.com', '7778889999', 'USA', 'Male', 'Seller'),
(73, 62, 1, 'Billy', 'Smith', 'billysmith@mail.com', '4445556666', 'New Zealand', 'Male', 'Buyer'),
(74, 63, 1, 'Lily', 'Smith', 'lilysmith@mail.com', '1112223333', 'London', 'Female', 'Buyer'),
(75, 64, 3, 'Jane', 'Doe', 'janedoe@mail.com', '1234567899', 'Montreal, QC, Canada', 'Female', 'Buyer'),
(76, 65, 1, 'Test', 'User', 'test@test.com', '1112223333', 'Montreal, Canada', 'Female', 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `promotion_price` decimal(10,2) NOT NULL,
  `promotion_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_rating` varchar(10) CHARACTER SET latin1 NOT NULL,
  `review_comment` varchar(50) CHARACTER SET latin1 NOT NULL,
  `review_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `customer_id`, `product_id`, `product_rating`, `review_comment`, `review_timestamp`) VALUES
(6, 73, 69, '8/10', 'Very nice!', '2020-05-19 01:44:38'),
(7, 73, 69, '9/10', 'Cool!', '2020-05-19 01:45:11'),
(8, 73, 70, '7/10', 'It\'s not waterproof but I like the color.', '2020-05-19 01:46:04'),
(9, 73, 72, '10/10', 'Very good quality!', '2020-05-19 01:47:17'),
(10, 73, 73, '7.5/10', 'I like the color.', '2020-05-19 01:48:03'),
(11, 73, 74, '6/10', 'Delicious!', '2020-05-19 01:48:42'),
(12, 74, 69, '10/10', 'The color is nice.', '2020-05-19 01:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password_hash` varchar(72) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(59, 'John', '$2y$10$HEaPMqWlccpc25inAxS3luTQ7yKwhXE/OOfa1KRJh8AB.6Bunf55u'),
(60, 'Bobby', '$2y$10$habC2dzg1xcTbUJyK2j0Pu273cdQRqyo4ES9WTYk4mIvbHJyF9eYS'),
(61, 'Jake', '$2y$10$qtOb1y8rUUpHpWvovfriEejt.GETkUbgsyjoHQ5s1mJV2bFXLlSwu'),
(62, 'Billy', '$2y$10$AbMNc/Jl4.hvmMeOeSTPKu5L/uU0vC0wo544tFyWY1F6pEfGsMGzu'),
(63, 'Lily', '$2y$10$XokFzpEBtxKlQwz1rkgK0.DGA563XhTSfjJkdbxAGkdwb5NYZrx26'),
(64, 'Jane', '$2y$10$N/SEPaqQW/hgLYIDdcNiVeViDDBd.gELxwrZrB6klwKg.EJvkZR3i'),
(65, 'Test', '$2y$10$iUXaBGMQ0d9Dr9mjER37auhXA2U2j2HPo/WsLc/SKrxnxMmS8UxJG');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `product_id`, `customer_id`) VALUES
(24, 77, 74);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_to_profile` (`teacher_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_sender_to_profile` (`message_sender`),
  ADD KEY `message_receiver_to_profile` (`message_receiver`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `news_to_profile` (`seller_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notification_to_profile` (`customer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_to_profile` (`customer_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_item_id`),
  ADD UNIQUE KEY `product_id` (`product_id`,`order_id`),
  ADD KEY `order_details_to_product` (`product_id`) USING BTREE,
  ADD KEY `order_details_to_order` (`order_id`) USING BTREE;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `payment_to_profile` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_to_profile` (`seller_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`),
  ADD KEY `promotion_to_product` (`product_id`),
  ADD KEY `promotion_to_profile` (`seller_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_to_profile` (`customer_id`),
  ADD KEY `review_to_product` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `wish_to_product` (`product_id`),
  ADD KEY `wish_to_profile` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_to_profile` FOREIGN KEY (`customer_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
