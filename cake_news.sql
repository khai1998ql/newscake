-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 10, 2021 lúc 11:44 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cake_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `status`, `created`, `modified`) VALUES
(2, 1, 'Thế giới', 1, '2021-08-09 05:25:16', '2021-08-09 10:17:08'),
(3, 1, 'Trong nước', 1, '2021-08-09 05:29:11', '2021-08-09 05:29:11'),
(4, 1, 'Thể thao', 0, '2021-08-09 05:35:07', '2021-08-09 05:35:07'),
(8, 1, 'Test', 0, '2021-08-09 18:11:14', '2021-08-09 18:11:14'),
(9, 1, 'Test1', 0, '2021-08-10 05:46:17', '2021-08-10 05:46:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `category_id` int(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `body`, `status`, `created`, `modified`) VALUES
(1, 1, 2, 'Ngày mới', '333333333333', 1, '2021-08-09 10:56:25', '2021-08-09 16:45:11'),
(5, 1, 2, 'Ngày cũ', '1111111111', 1, '2021-08-09 16:06:12', '2021-08-09 16:06:12'),
(6, 1, 2, 'Ngày new', 'Ngày new', 0, '2021-08-09 18:11:54', '2021-08-09 18:11:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `role`, `created_at`, `update_at`) VALUES
(1, 'admin', '47bae28ef4dfd91e60ae8ee08c93419749bf2246', 'Admin', 1, NULL, NULL),
(2, 'user', '47bae28ef4dfd91e60ae8ee08c93419749bf2246', 'User', 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
