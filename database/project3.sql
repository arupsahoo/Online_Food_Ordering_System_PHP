-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 04:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(30, 'Admin', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(31, 'siba', 'siba', '4122cb13c7a474c1976c9706ae36521d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `img_name`, `featured`, `active`) VALUES
(2, 'Biryani', 'chicken biryani827.jpg', 'on', 'on'),
(10, ' Rolls', 'Chicken Roll92.jpg', 'on', 'on'),
(12, 'pizza', 'pizza374.jpg', 'on', 'on'),
(13, 'Burger', 'Burger918.jpg', 'on', 'on'),
(14, 'Sandwich', 'Sandwich891.jpg', 'on', 'on'),
(15, 'Pasta', 'Pasta541.jpg', 'on', 'on'),
(16, 'Meals', 'Meals188.jpg', 'on', 'on'),
(17, 'Momo', 'Momo665.jpg', 'on', 'on'),
(18, 'Samosa', 'Samosa59.jpg', 'on', 'on'),
(19, 'Panipuri', 'Panipuri710.jpg', 'on', 'on'),
(20, 'Chicken', 'Chicken35.jpg', 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` decimal(10,0) NOT NULL COMMENT '₹',
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(12, 'Veg Pizza', 'Pizza dough, roasted red bell, canned artichoke hearts, pizza sauce, red pepper flakes', '180', 'Test 2 updatd348.jpg', 12, 'off', 'on'),
(13, 'Chicken biryani', 'Aromatic, delicious and spicy one pot chicken biryani made with basmati rice, spices, chicken and herbs', '100', 'Chicken biryani60.jpg', 2, 'on', 'on'),
(15, 'Chicken Pizza', 'Onion, capsicum , Canned black beans, pizza crust, skinless chicken breasts and soas.', '280', 'Chicken Pizza518.jpg', 12, 'off', 'on'),
(16, 'Margherita Pizza', 'whole wheat pizza crust, scratch-made tomato sauce, melty mozzarella cheese and fresh basil', '250', 'Margherita Pizza427.jpg', 12, 'on', 'on'),
(17, 'Paneer Pizza', ' Pizza crust layered with marinara sauce, paneer, bell pepper, onions, and cheese. The best fusion pizza ever!', '200', 'Paneer Pizza254.jpg', 12, 'off', 'on'),
(18, 'Egg Pizza', 'Cheese, cherry tomatoes, pizza base, green pepper, egg', '230', 'Egg Pizza860.jpg', 12, 'off', 'on'),
(19, 'kolkata Dum Biryani', 'A potpourri of extravagant flavours, tender chicken spiced with freshly ground spices ', '120', 'kolkata Dum Biryani987.jpg', 2, 'off', 'on'),
(20, 'Paneer Biryani', 'Made with Paneer, fried onions, basmati rice, biryani masala, rose water', '120', 'Paneer Biryani242.jpg', 2, 'off', 'on'),
(21, 'Sindhi Biryani', 'made with basmati rice, vegetables and various spices as well as chopped chillies, mint and coriander leaves, onions, nuts, dried fruits and yoghurt', '70', 'Sindhi Biryani876.jpg', 2, 'off', 'on'),
(22, 'Hyderabadi Chicken Biryani', ' traditional dish made using Basmati rice, chicken and various other exotic spices.', '130', 'Hyderabadi Chicken Biryani968.jpeg', 2, 'on', 'on'),
(23, 'Tacos', 'Crispy taco shells are packed with fresh ingredients and a play of spices. Take a bite and savour the delight! ', '50', 'Tacos901.jpg', 10, 'off', 'on'),
(24, 'Vietnamese Cold Spring Rolls', 'Light and lively snack that will keep your mid-meal cravings in place. Take a headlong plunge in a wave of authentic Vietnamese flavours.', '80', 'Vietnamese Cold Spring Rolls203.webp', 10, 'off', 'on'),
(25, 'Minced Meat Filling', 'This classic Mexican delicacy will knock your socks off! Flour tortillas stuffed with a generous helping of mildly-spiced minced meat mixture', '90', 'Minced Meat Filling842.jpg', 10, 'off', 'on'),
(26, 'Mutton Kathi Roll', ' kathi roll is a street-food that originated in Kolkata? Mutton filled kathis are an all time favourite of dedicated meat lovers', '120', 'Mutton Kathi Roll501.webp', 10, 'on', 'on'),
(27, 'Chicken Shawarma', 'Shawarma has its genesis in the Turkish doner kebab. Bite in to these mouthwatering rolls loaded with chicken and authentic masalas.', '80', 'Chicken Shawarma498.jpg', 10, 'off', 'on'),
(28, ' Paneer Tikka Kathi Roll', 'the goodness of paneerstacked in the brilliance of egg parathas. This paratha roll is sure to be winner! ', '110', ' Paneer Tikka Kathi Roll329.jpg', 10, 'off', 'on'),
(29, 'Pizza Burger', 'The delicious and cheesy flavours of pizza are in the shape of a burger. The fun part is that this recipe is very easy to make.', '200', 'Pizza Burger792.webp', 13, 'off', 'on'),
(30, 'Rajma Patty Burger', 'We all love burger, here we found a delicious rajma patty burger. Try this quick and easy burger your kids and family definitely like this crunchy burger.', '104', 'Rajma Patty Burger880.png', 13, 'off', 'on'),
(31, 'Mushroom Burger', ' A lentil, mushroom and sun dried tomato pattie packed between a whole wheat bun.\r\n', '140', 'Mushroom Burger769.jpg', 13, 'on', 'on'),
(32, 'Chicken Burger', 'Chicken mince marinated with salt, pepper and feta cheese is only the beginning of this ultimate wonder.', '160', 'Chicken Burger100.webp', 13, 'off', 'on'),
(33, 'Chilli burger With Pepper Relish', 'This scrumptious burger sits under a chilli lamb pattie, roasted bell pepper dip, onions, tomatoes and lettuce.', '200', 'Chilli burger With Pepper Relish981.webp', 13, 'off', 'on'),
(34, 'Paneer Bhurji Sandwich', 'Made with paneer, onion, tamato, bread and soas', '30', 'Paneer Bhurji Sandwich64.jpg', 14, 'off', 'on'),
(35, 'Veg Sandwich', 'This is very popular in the streets of Bombay (Mumbai) and hence the name. It is made with vegetables (Cucumber, beetroot and boiled Potatoes). ', '50', 'Veg Sandwich320.jpg', 14, 'on', 'on'),
(36, ' Penne', 'Cut into cylindrical tubes with slanting edges, this pasta comes with a ridged texture.', '60', ' Penne850.webp', 15, 'on', 'on'),
(37, 'Fusilli', ' A delicacy from southern Italy, fusilli pasta was traditionally made by wrapping pasta strips, made from semolina flour, around a thin rod', '50', 'Fusilli748.webp', 15, 'off', 'on'),
(38, 'Veg Meal Plate', ' This meal includes Beetroot salad , Vegetable & Avarekalu kootu, Boondi Raita, Avarekalu Rasam along with Steamed Rice. ', '80', 'Veg Meal Plate396.jpeg', 16, 'on', 'on'),
(39, 'Chicken Thali', 'This plate includes Butter roti\r\nJeera rice,Tandoori gobi fry,\r\nDal makhani, Dhaba style chicken curry,Semiyan kheer', '120', 'Chicken Thali159.jpg', 16, 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_title` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `c_name` varchar(155) NOT NULL,
  `c_contact` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food_title`, `price`, `qty`, `total`, `order_date`, `status`, `c_name`, `c_contact`, `c_email`, `c_address`, `user_id`) VALUES
(6, 'Veg Pizza', '180', 3, '540', '2022-09-19 11:33:18', 'ontheway', 'Arup Sahoo', '78748478444', 'arupsahoo6370@gmail.com', 'Bhubaneswar', 1),
(9, 'Chicken Thali', '120', 3, '360', '2022-09-22 05:34:27', 'delivered', 'Shiba Prashad Parida', '78748478444', 'spparida@gmail.com', 'Nimapada', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `contact`, `password`, `date`) VALUES
(1, 'Arup Sahoo', 'arupsahoo6370@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-21 10:04:56'),
(2, 'Subhamm kumar', 'subhamkumar@gmail.com', 99945454, '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-21 10:12:32'),
(5, 'shiba prashad parida', 'spparida@gmail.com', 2147483647, 'eb7fe07aa0614c1d92b935c118ad76d6', '2022-09-22 20:57:38'),
(7, 'Rabindra Nayak', 'rabindra@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055', '2022-09-23 00:21:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD CONSTRAINT `tbl_food_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
