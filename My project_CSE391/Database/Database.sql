-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 04:06 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trangsuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vòng', 0, 1, '2018-02-02 05:08:11', '2018-02-02 05:08:11'),
(2, 'Nhẫn', 0, 1, '2018-02-02 05:08:16', '2018-02-02 05:08:16'),
(3, 'Khuyên tai', 0, 1, '2018-02-02 05:08:22', '2018-02-02 05:08:22'),
(4, 'Trâm cài', 0, 1, '2018-02-02 05:08:28', '2018-02-02 05:08:28'),
(5, 'Vòng tay', 1, 1, '2018-02-02 05:08:44', '2018-02-02 05:08:44'),
(6, 'Dây chuyền', 1, 1, '2018-02-02 05:08:57', '2018-02-02 05:08:57'),
(7, 'Vòng đá quý', 1, 1, '2018-02-02 05:09:15', '2018-02-02 05:09:15'),
(8, 'Lắc chân', 1, 1, '2018-02-02 05:10:16', '2018-02-02 05:10:16'),
(9, 'Nhẫn vàng', 2, 1, '2018-02-02 05:10:38', '2018-02-02 05:10:38'),
(10, 'Nhẫn cưới', 2, 1, '2018-02-02 05:10:48', '2018-02-02 05:10:48'),
(11, 'Nhẫn kim cương', 2, 1, '2018-02-02 05:11:00', '2018-02-02 05:11:00'),
(12, 'Nhẫn bạc', 2, 1, '2018-02-02 05:11:09', '2018-02-02 05:11:09'),
(13, 'Khuyên tai nữ', 3, 1, '2018-02-02 05:11:33', '2018-02-02 05:11:33'),
(14, 'Khuyên tai nam', 3, 1, '2018-02-02 05:11:47', '2018-02-02 05:11:47'),
(15, 'Khuyên tai vàng', 3, 1, '2018-02-02 05:12:15', '2018-02-02 05:12:15'),
(16, 'Trâm vàng', 4, 1, '2018-02-02 05:12:25', '2018-02-02 05:12:25'),
(17, 'Trâm ngọc', 4, 1, '2018-02-02 05:12:33', '2018-02-02 05:12:33'),
(18, 'Trâm mới 2018', 4, 1, '2018-02-02 05:12:53', '2018-02-02 05:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_12_20_134343_create_table_category', 1),
(3, '2017_12_31_080950_create_table_groups', 1),
(4, '2017_12_31_081015_create_table_customer', 1),
(5, '2017_12_31_081025_create_table_products', 1),
(6, '2018_01_19_140547_create_table_user', 1),
(7, '2018_01_26_140416_create_table_status', 1),
(8, '2018_01_26_141600_create_table_statuspro', 1),
(9, '2018_01_29_033251_create_table_city', 1),
(10, '2018_01_29_033502_create_table_county', 1),
(11, '2018_01_31_032244_create_table_order', 1),
(12, '2018_01_31_032439_create_table_order_detail', 1),
(13, '2018_02_02_082318_create_table_banner', 1),
(14, '2018_02_02_153859_create_table_contact', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_id` int(11) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_add` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `price_sale` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `price_sale` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_hover1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images_hover2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images_hover3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images_hover4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `images`, `cat_id`, `content`, `price`, `price_sale`, `status`, `slug`, `images_hover1`, `images_hover2`, `images_hover3`, `images_hover4`, `created_at`, `updated_at`) VALUES
(1, 'Lắc tay nam da đầu rồng', 'danam001.jpg', 5, '<p><span> <strong>Lắc tay nam da đầu rồng </strong>được làm từ chất liệu da , hai đầu là hình đầu rồng mạnh mẽ. Rồng là linh thú trong truyền thuyết, có sức mạnh vô biên, là biểu trưng cho năng lượng của đất trời, là con vật có vượng khí nhất trong phong thủy. Đeo lắc tay rồng sẽ mang lại vượng khí và tài lộc cho chủ nhân.</span></p>\r\n<div class=\"_56vj _23n-\">\r\n<p><span>Sản phẩm lắc tay nam đẹp sở hữu những nét mới lạ và đem đến cho nam giới sự tự tin và mạnh mẽ bởi chất liệu cao cấp hoàn chỉnh và cùng với đó chính là thiết thế mạnh mẽ và tạo sự khỏe khoắn giành cho phái nam</span></p>\r\n</div>', 1200000, 1000000, 1, 'lac-tay-nam-da-dau-rong', 'danam-002.jpg', 'danam-003.jpg', 'danam-004.jpg', 'danam-005.jpg', '2018-02-02 05:18:52', '2018-02-02 05:18:52'),
(2, 'Vòng dây vải phật', 'lacnam-001.jpg', 5, '<span> Vòng dây vải phật -&gt; lá bùa hộ mệnh giúp cuộc sống bạn thêm may mắn hạnh phúc và thành công.</span><br><span> 👆Vòng đá phong thủy  👉 Chọn màu hợp mệnh sẽ đem lại may mắn, tài vận , khai thông vượng khí cho gia chủ, được coi là công cụ tích trữ tài lộc cho người đeo.</span><br><span> 👆Vòng đá phong thủy mang trường năng lượng tốt giúp lưu thông khí huyết, cải thiện sức khỏe.</span>', 2000000, 1200000, 1, 'vong-day-vai-phat', 'lacnam-004.jpg', 'lacnam-002.jpg', 'lacnam-005.jpg', 'lacnam-003.jpg', '2018-02-02 05:21:38', '2018-02-02 05:21:38'),
(3, 'Vòng Tay Nam Hạt Bồ Đề', 'vda-nam 003.jpg', 5, '<p><span><strong><em>Vòng Tay Nam Hạt Bồ Đề Lục Tự Đại Minh Chân Ngôn</em></strong></span></p>\r\n<h2><span><em><strong>Thông Tin chung về sản phẩm<br><span><strong>Vòng Tay Nam Hạt Bồ Đề Lục <br>Tự Đại Minh Chân Ngôn</strong></span></strong></em></span></h2>', 1500000, 900000, 1, 'vong-tay-nam-hat-bo-de', 'lacnam-003.jpg', 'vda-nam.jpg', 'vdanam-007.jpg', 'vdanam-ô6.jpg', '2018-02-02 05:23:31', '2018-02-02 06:27:28'),
(4, 'Vòng tay da nữ 2018', 'Vnu-001.jpg', 5, NULL, 900000, NULL, 1, 'vong-tay-da-nu 2018', 'vnu-002.jpg', 'vnu-003.jpg', 'vdnam-004.jpg', 'vdnam-004.jpg', '2018-02-02 05:25:16', '2018-02-02 05:30:47'),
(5, 'Vòng tay nữ đẹp', 'vnu-006.jpg', 5, NULL, 1100000, 7000000, 1, 'vong-tay-nu-dep', 'vnu-003.jpg', 'vnu-004.jpg', 'vnu-005.jpg', 'vnu-006.jpg', '2018-02-02 05:26:14', '2018-02-02 05:26:14'),
(6, 'Vòng tay nam mỏ neo', 'vong-tay-nam-mo-neo-1m4G3-4Gvx20_simg_d0daf0_800x1200_max.jpg', 5, NULL, 800000, NULL, 1, 'vong-tay-nam-mo-neo', 'vong-tay-nam-mo-neo-1m4G3-Bk7m5x_simg_d0daf0_800x1200_max.jpg', 'vong-tay-nam-mo-neo-1m4G3-c57b5h_simg_d0daf0_800x1200_max.jpg', 'vong-tay-nam-mo-neo-1m4G3-c57b5h_simg_d0daf0_800x1200_max.jpg', 'vong-tay-nam-mo-neo-1m4G3-ppxEGf_simg_d0daf0_800x1200_max.jpg', '2018-02-02 05:28:20', '2018-02-02 05:42:12'),
(7, 'Vòng tay nam thiên sứ', 'vong-tay-nam-thien-su-1m4G3-368kSt_simg_d0daf0_800x1200_max.jpg', 5, NULL, 600000, NULL, 1, 'vong-tay-nam-thien-su', 'vong-tay-nam-thien-su-1m4G3-GyhMAH_simg_d0daf0_800x1200_max.jpg', 'vong-tay-nam-thien-su-1m4G3-iqm3Vy_simg_d0daf0_800x1200_max.jpg', 'vong-tay-nam-thien-su-1m4G3-KveJxD_simg_d0daf0_800x1200_max.jpg', 'vong-tay-nam-thien-su-1m4G3-368kSt_simg_d0daf0_800x1200_max.jpg', '2018-02-02 05:30:15', '2018-02-02 05:30:39'),
(8, 'Dây chuyền nam bạc 2018', 'nam-001.jpg', 6, NULL, 3000000, 2800000, 1, 'day-chuyen-nam-bac-2018', 'nam-001-1.jpg', 'nam-002.jpg', 'nam-003.jpg', 'nam-004.jpg', '2018-02-02 05:45:13', '2018-02-02 05:45:13'),
(9, 'Dây chuyền nam vàng', 'nam-005.jpg', 6, NULL, 4000000, NULL, 1, 'day-chuyen-nam-vang', 'nam-006.jpg', 'nam-005.jpg', 'nam-006.jpg', 'nam-005.jpg', '2018-02-02 05:46:16', '2018-02-02 05:46:16'),
(10, 'Vòng nữ lồng nhẫn', 'nu-001.jpg', 6, NULL, 1300000, 1100000, 1, 'vong-nu-long-nhan', 'nu-001.jpg', 'nu-002.png', 'nu-001-1.jpg', 'nu-001-1.jpg', '2018-02-02 05:47:07', '2018-02-02 05:47:07'),
(11, 'Vòng nữ rubi', 'nu-003.jpg', 6, NULL, 6000000, NULL, 1, 'vong-nu-rubi', 'nu-009-1.png', 'nu-009.png', 'nu-003.jpg', 'nu-003-1.jpg', '2018-02-02 05:48:01', '2018-02-02 05:48:01'),
(12, 'Vòng nữ 2018', 'nu-004.png', 6, NULL, 2500000, NULL, 1, 'vong-nu-2018', 'nu-007-1.png', 'nu-006-1.png', 'nu-006.png', 'nu-007.png', '2018-02-02 05:48:52', '2018-02-02 05:48:52'),
(13, 'Vòng nữ mới', 'nu-008-1.jpg', 6, NULL, 1400000, 1200000, 1, 'vong-nu-moi', 'nu-008.png', 'nu-005-1.jpg', 'nam-007.jpg', 'nu-005.png', '2018-02-02 05:49:44', '2018-02-02 05:49:44'),
(14, 'Khuyên tai nữ 2018', '002.jpg', 13, NULL, 600000, 500000, 1, 'khuyen-tai-nu-2018', '002-1.jpg', '003.jpg', '004.jpg', '005.jpg', '2018-02-02 05:50:40', '2018-02-02 05:50:40'),
(15, 'Khuyên tai tròn', 'nam-001-1.jpg', 13, NULL, 1200000, 1000000, 1, 'khuyen-tai-tron', 'nu-001.jpg', '005-1.png', '006-1.jpg', 'nam-001-2.jpg', '2018-02-02 05:51:29', '2018-02-02 05:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuspro`
--

CREATE TABLE `statuspro` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_pro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuspro`
--

INSERT INTO `statuspro` (`id`, `name_pro`, `id_status`, `created_at`, `updated_at`) VALUES
(8, 'Vòng tay nữ đẹp', 4, '2018-02-02 05:26:14', '2018-02-02 05:26:14'),
(9, 'Vòng tay nữ đẹp', 2, '2018-02-02 05:26:14', '2018-02-02 05:26:14'),
(21, 'Dây chuyền nam bạc 2018', 3, '2018-02-02 05:45:13', '2018-02-02 05:45:13'),
(22, 'Dây chuyền nam bạc 2018', 2, '2018-02-02 05:45:13', '2018-02-02 05:45:13'),
(23, 'Vòng nữ lồng nhẫn', 3, '2018-02-02 05:47:07', '2018-02-02 05:47:07'),
(24, 'Vòng nữ lồng nhẫn', 2, '2018-02-02 05:47:07', '2018-02-02 05:47:07'),
(25, 'Vòng nữ rubi', 2, '2018-02-02 05:48:02', '2018-02-02 05:48:02'),
(26, 'Vòng nữ 2018', 2, '2018-02-02 05:48:52', '2018-02-02 05:48:52'),
(29, 'Vòng tay nam thiên sứ', 1, '2018-02-02 06:16:32', '2018-02-02 06:16:32'),
(36, 'Vòng Tay Nam Hạt Bồ Đề', 4, '2018-02-02 06:27:28', '2018-02-02 06:27:28'),
(37, 'Vòng Tay Nam Hạt Bồ Đề', 2, '2018-02-02 06:27:28', '2018-02-02 06:27:28'),
(38, 'Vòng tay nam mỏ neo', 2, '2018-02-02 11:15:09', '2018-02-02 11:15:09'),
(39, 'Vòng dây vải phật', 3, '2018-02-02 11:15:17', '2018-02-02 11:15:17'),
(40, 'Vòng dây vải phật', 2, '2018-02-02 11:15:17', '2018-02-02 11:15:17'),
(41, 'Lắc tay nam da đầu rồng', 3, '2018-02-02 11:15:49', '2018-02-02 11:15:49'),
(42, 'Lắc tay nam da đầu rồng', 2, '2018-02-02 11:15:49', '2018-02-02 11:15:49'),
(43, 'Dây chuyền nam vàng', 2, '2018-02-02 11:16:11', '2018-02-02 11:16:11'),
(45, 'Khuyên tai nữ 2018', 3, '2018-02-02 11:16:36', '2018-02-02 11:16:36'),
(46, 'Khuyên tai nữ 2018', 2, '2018-02-02 11:16:36', '2018-02-02 11:16:36'),
(47, 'Khuyên tai tròn', 3, '2018-02-02 11:17:04', '2018-02-02 11:17:04'),
(48, 'Khuyên tai tròn', 2, '2018-02-02 11:17:04', '2018-02-02 11:17:04'),
(49, 'Vòng tay da nữ 2018', 1, '2018-02-02 11:17:15', '2018-02-02 11:17:15'),
(50, 'Vòng tay da nữ 2018', 2, '2018-02-02 11:17:15', '2018-02-02 11:17:15'),
(51, 'Vòng nữ mới', 3, '2018-02-02 11:17:39', '2018-02-02 11:17:39'),
(52, 'Vòng nữ mới', 2, '2018-02-02 11:17:39', '2018-02-02 11:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `address`, `groups`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$LySpfGnHp6yz0eVO/6f5ZuptstC92y.xipY3KajTJ0OoQ2nnxzA72', 'admin@gmail.com', NULL, NULL, 'admin', '9vERpeF56B03vHSjODxYgz1dQ6Yr5QhewH65ZCaArzY4B8go8pLX8LjDpu3P', 1, '2018-02-02 11:56:12', '2018-02-02 11:56:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cat_id` (`cat_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuspro`
--
ALTER TABLE `statuspro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuspro`
--
ALTER TABLE `statuspro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
