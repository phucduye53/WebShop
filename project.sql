-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2017 lúc 07:10 SA
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_ind` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_ind`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(19, 'Quần Jean', 'quan-jean', 0, 0, 'Quần Jean', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Quần Jean Nam', 'quan-jean-nam', 0, 19, 'Quần Jean Nam', 'Quần Jean Nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Quần Jean Nữ Moden', 'quan-jean-nu-moden', 12, 19, 'Quần Jean ', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Áo', 'ao', 0, 0, 'Áo', 'Áo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Áo thun', 'ao-thun', 0, 25, 'Áo thun', 'Áo thun', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Áo sơ mi', 'ao-so-mi', 0, 25, 'Áo sơ mi', 'Áo sơ mi', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_12_16_080048_create_cates_table', 1),
('2016_12_16_080921_create_products_table', 2),
('2016_12_16_081554_create_product_images_table', 3),
('2016_12_26_083500_create_orders_table', 4),
('2016_12_29_130105_add_total_to_orders', 5),
('2017_01_03_101708_create_reviews_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `cart` text COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `user_id`, `cart`, `payment_id`, `total`) VALUES
(3, '2016-12-29 06:37:13', '2016-12-29 06:37:13', 6, '', 'ch_19W45lK60UTZq2HI0EBYaIoi', 4000),
(4, '2017-01-03 06:59:38', '2017-01-03 06:59:38', 6, '', 'ch_19XspCK60UTZq2HICbqlH51u', 4000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(25, 'Áo thun xám', 'ao-thun-xam', 1200, '<p>&Aacute;o thun x&aacute;m</p>\r\n', '<p>&Aacute;o thun x&aacute;m</p>\r\n', 'ao thun polo (3).jpg', 'Áo thun xám', 'Áo thun xám', 1, 26, '2017-01-04 21:51:27', '2017-01-04 21:51:27'),
(24, 'Áo thun xanh', '26', 1000, '<p>&Aacute;o thun Pro</p>\r\n', '<p>&Aacute;o thun Pro</p>\r\n', '4_700_61.jpg', 'Áo thun Pro', 'pro', 1, 26, '2017-01-03 06:57:00', '2017-01-04 09:03:57'),
(26, 'Áo thun xanh lá cây', 'ao-thun-xanh-la-cay', 500, '<p>&Aacute;o thun xanh l&aacute; c&acirc;y</p>\r\n', '<p>&Aacute;o thun xanh l&aacute; c&acirc;y</p>\r\n', '845636359205.jpg', 'Áo thun xanh lá cây', 'Áo thun xanh lá cây', 1, 26, '2017-01-04 21:52:01', '2017-01-04 21:52:01'),
(20, 'Quần Jean Nam Classic A1', '28', 1000, '<p>Quần Jean Nam Classic A1</p>\r\n', '<p>Quần Jean Nam Classic A1</p>\r\n', 'quan-cong-so-cs01-8 - Copy (6).jpg', 'Quần Jean Nam Classic A1', 'Quần Jean Nam Classic A1', 1, 28, '2016-12-28 19:27:30', '2017-01-03 05:26:37'),
(21, 'Quần Jean Nam Classic A2', '30', 2000, '<p>Quần Jean Nam Classic A1</p>\r\n', '<p>Quần Jean Nam Classic A1</p>\r\n', 'quan-cong-so-cs01-8 - Copy (3).jpg', 'Quần Jean Nam Classic A1', 'Quần Jean Nam Classic A1', 1, 30, '2016-12-28 19:28:03', '2017-01-03 05:26:27'),
(27, 'Áo thun cổ xanh đẹp', 'ao-thun-co-xanh-dep', 700, '<p>&Aacute;o thun cổ xanh đẹp</p>\r\n', '<p>&Aacute;o thun cổ xanh đẹp</p>\r\n', '3.jpg', 'Áo thun cổ xanh đẹp', 'Áo thun cổ xanh đẹp', 1, 26, '2017-01-04 21:52:35', '2017-01-04 21:52:35'),
(29, 'Quần Jean Nam Classic A4', 'quan-jean-nam-classic-a4', 1234, '<p>Quần Jean Nam D&agrave;i</p>\r\n', '<p>Quần Jean Nam Classic A1</p>\r\n', 'quan-jean-rach-xanh-den-qj1275-5667-slide-1.jpg', 'Quần Jean Nam Classic A1', 'Quần Jean Nam Classic A1', 1, 28, '2017-01-04 21:56:27', '2017-01-04 21:56:27'),
(30, 'Quần Jean Nam Classic A5', 'quan-jean-nam-classic-a5', 3214, '<p>Quần Jean Nam Classic A5</p>\r\n', '<p>Quần Jean Nam Classic A5</p>\r\n', 'jean-nam-3-b.jpg', 'Quần Jean Nam Classic A5', 'Quần Jean Nam Classic A5', 1, 28, '2017-01-04 21:56:56', '2017-01-04 21:56:56'),
(31, 'Quần Jean Nam Classic A6', 'quan-jean-nam-classic-a6', 3232, '<p>Quần Jean Nam Classic A6</p>\r\n', '<p>Quần Jean Nam Classic A6</p>\r\n', 'p-11.jpg', 'Quần Jean Nam Classic A6', 'Quần Jean Nam Classic A6', 1, 28, '2017-01-04 21:58:00', '2017-01-04 21:58:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '13892244_1754644464800781_5968900379035528960_n.jpg', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '13934653_10208377794195380_8649229717288642585_n.jpg', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'hqdefault.jpg', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'viewme2.jpg', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '10347715_1547307278857252_9067312875467746871_n.jpg', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'CL_9EIzUsAAPhpU.jpg', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '10846121_1525317397722907_8976191489496302650_n.jpg', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '3654_514440988612289_1209285889_n.jpg', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '12939188_1150180898377872_1107276613_n.jpg', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '382480_509223112483219_728332201_n.jpg', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '2ce24a3f9b95dc97b19bb883a7c78ab6.jpg', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '14639678_10208845176859249_8738321675437486427_n.jpg', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'hqdefault.jpg', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '12391454_1001405113249205_6994209183941944957_n.jpg', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '382480_509223112483219_728332201_n.jpg', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '13934653_10208377794195380_8649229717288642585_n.jpg', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'quan-cong-so-cs01-8 - Copy (2).jpg', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'xanhya-aotron_5bfd278c-6d43-41ab-44c1-f573daf45257_medium.jpg', 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `id_product`, `text`, `username`, `created_at`, `updated_at`) VALUES
(1, 20, 'qweqweqwe', 'qweqwe', '2017-01-03 04:17:49', '2017-01-03 04:17:49'),
(2, 20, 'qweqweqwe', 'qweqwe', '2017-01-03 04:18:35', '2017-01-03 04:18:35'),
(3, 20, 'qweqweqwe', 'qweqwe', '2017-01-03 04:19:44', '2017-01-03 04:19:44'),
(4, 20, 'dep qua', 'truc', '2017-01-03 04:21:17', '2017-01-03 04:21:17'),
(5, 24, 'áo pro', 'phucduye53', '2017-01-03 07:00:34', '2017-01-03 07:00:34'),
(6, 24, 'ao xau qua', '14ck2', '2017-01-03 07:01:05', '2017-01-03 07:01:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$fBJ/Mn4RHGd7XVl3tBIpmuH7t/A9p7qGn56GzDf8xrBIz0Q2y/kji', 'a@gmail.com', 1, 'lCbjFYMUWHyjtRZff4cXumwUeJpORG7zBq51W0yydY2hwK1TG2liYQYvIbsD', '2016-12-17 08:28:20', '2017-01-04 21:58:53'),
(4, 'member', '$2y$10$1HRQ62i1v4E64dB8EFXYCOwtd1RK51D7dyjWXpTKBB5CV3OaaI2Xu', 'a@gmail.com', 1, 'u0VnguGYAIHkfBLGsKlC4ziSBRdtxwQ1AuRQH0ouAzZ950Ry7KgPyhq6ipJO', '2016-12-18 21:48:06', '2016-12-21 03:57:06'),
(6, 'phucduye53', '$2y$10$EOyDFAx2RbEPuK6gvqHM8uoT4MaTvUXhCPzRih7ieAYoU2sDAiin6', 'phucduye53@gmail.com', 2, 'tLlKHRJsHewmnRegJYvS4qiZpCVM6FZbMPqE9nSOAQ8smpUgMZ35H99LNayk', '2016-12-20 11:38:12', '2017-01-03 07:00:47'),
(5, 'user', '$2y$10$xAFPu9hDaA/1WL.2z1CBmex3bykFBw138ddGzs3Fhpuu07aTDUi6e', 'abc@gmail.com', 2, 'Kc5vqDtrHdiJaCyWplUxaiI1oMmjWtPJBvgSa3T6', '2016-12-18 21:48:21', '2016-12-18 21:48:21'),
(7, 'user2', '$2y$10$3VmUJ7e/hjiKMlUksZRng.OgEv1nPSAqkS051hFTGQL02NLfq40j.', 'user2@gmail.com', 2, NULL, '2016-12-21 04:02:43', '2016-12-21 04:02:43'),
(8, 'user3', '$2y$10$H2j7ZNBoW0/bpzAjQE71R./rpLVh0IPrBkzn/o1WuosmB8ncCHBvS', 'user3@gmail.com', 2, 'KXZ1S4TCULr8oKvBK8fJL5cBE2qUhOqwB6a2ekpQatXlModnJPPT5VjuvpVn', '2016-12-21 07:57:25', '2016-12-22 06:31:02'),
(11, 'userxyz', '$2y$10$RetoPXoSqZKO0.TvnhtO0ePt9zDHw1smtafPw/ZMuymE41vka6sLi', 'a@gmail.com', 1, 'DgM4yiKtezv6XtrKP5krPryefFZAxOPhM1ZfvWmh', '2017-01-03 06:58:05', '2017-01-03 06:58:05'),
(10, 'phucduye55', '$2y$10$D0eXDbNWL6cn4ZXLb8Z4TuejN2YrC50jF3/BnVFEVSPFSEBWvKiVK', 'phucduye5222@gmail.com', 1, NULL, '2016-12-30 01:06:59', '2017-01-03 06:57:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
