-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 02, 2023 lúc 12:03 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `huylnpc05258`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `note`, `create_at`, `update_at`) VALUES
(5, 'Iphone', 'Điện Thoại ', '2023-07-29 00:02:24', '2023-08-02 12:17:51'),
(10, 'sony', 'Tai nghe', '2023-08-02 17:26:19', '2023-08-02 12:27:33'),
(11, 'logitech', 'Chuột', '2023-08-02 18:52:51', '2023-08-02 18:52:51'),
(12, 'Msi', 'Laptop', '2023-08-02 18:55:36', '2023-08-02 13:57:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `description`, `image`, `category_id`, `create_at`, `update_at`) VALUES
(3, 'Iphone 13', 100, 8, '124gb', 'iphone-13-finish-select-202207-6-1inch-pink.jpg', 5, '2023-08-01 20:11:59', '2023-08-01 20:11:59'),
(8, 'Iphone 12', 100, 1, '124gb', 'iphone-12-finish-select-202207-purple.jpg', 5, '2023-08-02 16:45:32', '2023-08-02 16:45:32'),
(13, 'Sony A122', 100000, 3, 'Tai nghe chất lượng', 'a900b53164683e1fc98b8eefb9b6c406.avif', 10, '2023-08-02 17:40:13', '2023-08-02 17:40:13'),
(14, 'Logitech G502', 100000, 23, 'chất lượng tốt', '17312-logitech-mx-master-3-3-4-front.jpg', 11, '2023-08-02 18:53:25', '2023-08-02 18:53:25'),
(15, 'Msi Raider', 100000, 5, 'Chất lượng cao', '1951347_R_Z002A.jpg', 12, '2023-08-02 18:56:46', '2023-08-02 18:56:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cccd` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `phone`, `address`, `cccd`, `gender`, `date`, `password`, `create_at`, `update_at`) VALUES
(28, 1, 'Lâm Nhật Huy', 'huylnpc05258@fpt.edu.vn', '393379824', 'Sóc Trăng', '094204002347', 'Nam', '2004-08-26', 'kalosonits14', '2023-07-26 22:31:31', '2023-07-31 11:55:22'),
(46, 1, 'Nguyễn Chí Phương', 'lamnhathuy0393418721@gmail.com', '0933987854', 'Cần Thơ', '094204002325', 'Nam', '2023-06-29', '21323213', '2023-07-29 00:06:02', '2023-07-31 11:48:09'),
(48, 1, 'Nguyễn Quốc Huy', 'huynqpc05332@fpt.edu.vn', '0869119602', 'Sóc Trăng', '0942040002345', 'Nam', '2004-08-09', 'huynqpc05332@fpt.edu.vn', '2023-07-31 16:47:33', '2023-07-31 11:52:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
