-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 11:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_slug` varchar(150) NOT NULL,
  `category_count` varchar(500) NOT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT 1,
  `category_menu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `category_count`, `category_status`, `category_menu`) VALUES
(1, 'html project', 'html-project', '', 1, 'project'),
(3, 'css project', 'css-project', '', 1, 'project'),
(4, 'javascript project', 'javascript-project', '', 1, 'project'),
(5, 'php project', 'php-project', '', 1, 'project');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_slug` varchar(100) NOT NULL,
  `menu_status` tinyint(4) NOT NULL DEFAULT 1,
  `menu_count` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_slug`, `menu_status`, `menu_count`) VALUES
(1, 'project', 'project', 1, ''),
(3, 'templates', 'templates', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_slug` varchar(200) NOT NULL,
  `post_desc` text NOT NULL,
  `post_fb_link` varchar(200) NOT NULL,
  `post_yt_link` varchar(200) NOT NULL,
  `post_price` varchar(100) NOT NULL,
  `post_type` int(11) NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `post_file` varchar(100) NOT NULL,
  `post_img_alt` varchar(50) NOT NULL,
  `post_img_title` varchar(50) NOT NULL,
  `post_meta_title` varchar(150) NOT NULL,
  `post_meta_desc` varchar(200) NOT NULL,
  `post_meta_key` varchar(200) NOT NULL,
  `post_menu` varchar(100) NOT NULL,
  `post_cate` varchar(200) NOT NULL,
  `post_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_slug`, `post_desc`, `post_fb_link`, `post_yt_link`, `post_price`, `post_type`, `post_image`, `post_file`, `post_img_alt`, `post_img_title`, `post_meta_title`, `post_meta_desc`, `post_meta_key`, `post_menu`, `post_cate`, `post_status`) VALUES
(1, 'Toggle navigation menu', 'toggle-navigation-menu', 'Toggle navigation menu  Toggle navigation menu Toggle navigation menu', 'https://fb.watch/6WPMNM5d98/', 'https://youtu.be/PTWIQlMqzL4', '', 0, 'Fadingin.jpg', 'Poppins.zip', 'image alt', 'image title', 'meta title', 'meta desc', 'meta key', 'project', 'html-project', 1),
(2, 'post title2', 'post-title2', 'post desc2', 'https://fb.watch/6WPMNM5d98/', 'https://youtu.be/PTWIQlMqzL4', '', 0, 'manbg.jpg', 'Roboto.zip', 'image alt2', 'image title2', 'meta title2', 'meta desc2', 'meta key2', 'project', 'css-project', 1),
(3, 'Javascript popup modal box', 'javascript-popup-modal-box', 'post desc4', 'https://fb.watch/6WPMNM5d98/', 'https://youtu.be/PTWIQlMqzL4', '54', 1, 'layout-css-flex.png', 'Poppins.zip', 'image alt4', 'image title4', 'meta title4', 'meta desc4', 'meta key4', 'project', 'javascript-project', 1),
(4, 'post title 5', 'post-title-5', 'post title 5', 'https://fb.watch/6WPMNM5d98/', 'https://youtu.be/PTWIQlMqzL4', '241', 1, 'delete-data-jquery.png', 'Poppins.zip', 'image alt 5', 'image title 5', 'meta title5', 'meta desc5', 'meta key5', 'project', 'php-project', 1),
(5, 'post title6', 'post-title6', 'post desc6', 'https://fb.watch/6WPMNM5d98/', 'https://youtu.be/PTWIQlMqzL4', '', 0, 'edit-data.png', 'Roboto.zip', 'image alt6', 'image title6', 'meta title6', 'meta desc6', 'meta key6', 'project', 'css-project', 1),
(6, 'post title7', 'post-title7', 'post desc7', 'https://fb.watch/6WPMNM5d98/', 'https://youtu.be/PTWIQlMqzL4', '', 0, 'form.jpg', 'pawan.zip', 'image alt7', 'image title7', 'meta title7', 'meta desc7', 'meta key7', 'project', 'javascript-project', 1),
(7, 'post title8', 'post-title8', 'post desc8', 'https://fb.watch/6WPMNM5d98/', 'https://youtu.be/PTWIQlMqzL4', '356', 1, 'MODAL-BOX.jpg', 'pawan.zip', 'image alt8', 'image title8', 'meta title8', 'meta desc8', 'meta key8', 'project', 'php-project', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 0,
  `user_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_role`, `user_status`) VALUES
(9, 'Santosh', 'Kumar', 'skambharti563@gmail.com', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 0, 1),
(10, 'Quietude', 'Studio', 'quietudestudio@gmail.com', '104c513b93ae69b9f1da75e38857930426e1722c', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
