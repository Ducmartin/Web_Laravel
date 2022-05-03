-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2021 lúc 02:58 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `unimart.com`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `check_prices`
--

CREATE TABLE `check_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `check_prices`
--

INSERT INTO `check_prices` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'dưới 2 triệu', NULL, NULL, 'duoi-2-trieu\r\n'),
(2, 'dưới 5 triệu', NULL, NULL, 'duoi-5-trieu'),
(3, 'dưới 10 triệu', NULL, NULL, 'duoi-10-trieu'),
(4, 'dưới 20 triệu', NULL, NULL, 'duoi-20-trieu'),
(5, 'trên 20 triệu', NULL, NULL, 'tren-20-trieu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `username`, `fullname`, `email`, `address`, `password`, `created_at`, `updated_at`, `phone_number`) VALUES
(3, 'duc15012001@gmail.com', NULL, 'duc15012001@gmail.com', NULL, 'ducthu15012001', '2021-12-11 08:45:53', '2021-12-11 08:45:53', '0987829005');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_09_142335_create_roles_table', 1),
(5, '2021_09_09_142709_add_role_id_to_users_table', 1),
(6, '2021_09_09_160753_add_fullname_to_users_table', 1),
(7, '2021_09_09_164136_add_softdelete_to_users_table', 1),
(8, '2021_09_10_155935_create_statuses_table', 1),
(9, '2021_09_10_160113_create_pages_table', 1),
(10, '2021_09_11_050410_create_post_cats_table', 1),
(11, '2021_09_11_061817_create_product_cats_table', 1),
(12, '2021_09_11_063352_create_products_table', 1),
(13, '2021_09_11_063600_create_thumbnail_products_table', 1),
(14, '2021_09_13_133636_add_status_id_to_product_cats_table', 1),
(15, '2021_09_13_135552_add_branching_to_product_cats_table', 1),
(16, '2021_09_14_075529_add_status_id_to_post_cats_table', 1),
(17, '2021_09_14_075724_add_branching_to_post_cats_table', 1),
(18, '2021_09_14_084048_create_customers_table', 1),
(19, '2021_09_14_084410_create_orders_table', 1),
(20, '2021_09_14_085404_add_phone_number_to_customers_table', 1),
(21, '2021_09_14_090414_add_customer_id_to_orders_table', 1),
(22, '2021_09_14_792526_create_posts_table', 1),
(23, '2021_09_25_165453_add_slug_to_product_cats_table', 2),
(24, '2021_09_26_075139_create_check_prices_table', 2),
(25, '2021_09_26_094356_add_slug_to_check_prices_table', 2),
(26, '2021_12_02_152128_add_sales_to_products_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_order` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `title`, `status_id`, `created_at`, `updated_at`) VALUES
(3, 'Liên hệ', 2, '2021-12-02 18:35:33', '2021-12-02 18:35:33'),
(4, 'Giới thiệu', 2, '2021-12-02 18:36:08', '2021-12-02 18:36:08'),
(5, 'Tin tức', 2, '2021-12-09 09:48:42', '2021-12-09 09:48:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_cats`
--

CREATE TABLE `post_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_cats`
--

INSERT INTO `post_cats` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'Mới nhất', 5, '2021-12-09 10:02:33', '2021-12-09 10:02:33', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `desc`, `detail`, `cat_id`, `status_id`, `created_at`, `updated_at`, `sales`) VALUES
(2, 'Điện Thoại Samsung Galaxy A12 (4GB/128GB) - ĐÃ KÍCH HOẠT BẢO HÀNH ĐIỆN TỬ - Hàng Chính Hãng', 3769000, '<table>\r\n<tbody>\r\n<tr>\r\n<td>Dung lượng pin</td>\r\n<td>5000 mAh</td>\r\n</tr>\r\n<tr>\r\n<td>Bluetooth</td>\r\n<td>v5.0</td>\r\n</tr>\r\n<tr>\r\n<td>Thương hiệu</td>\r\n<td>Samsung</td>\r\n</tr>\r\n<tr>\r\n<td>Xuất xứ thương hiệu</td>\r\n<td>H&agrave;n Quốc</td>\r\n</tr>\r\n<tr>\r\n<td>Camera sau</td>\r\n<td>Ch&iacute;nh 48 MP &amp; Phụ 5 MP, 2 MP, 2 MP</td>\r\n</tr>\r\n<tr>\r\n<td>Camera trước</td>\r\n<td>8 MP</td>\r\n</tr>\r\n<tr>\r\n<td>Hỗ trợ thẻ nhớ ngo&agrave;i</td>\r\n<td>MicroSD, hỗ trợ tối đa 1 TB</td>\r\n</tr>\r\n<tr>\r\n<td>Chip set</td>\r\n<td>MediaTek Helio G35 8 nh&acirc;n</td>\r\n</tr>\r\n<tr>\r\n<td>Tốc độ CPU</td>\r\n<td>8 nh&acirc;n 2.3 GHz</td>\r\n</tr>\r\n<tr>\r\n<td>Đ&egrave;n Flash</td>\r\n<td>C&oacute;</td>\r\n</tr>\r\n<tr>\r\n<td>Loại/ C&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n<td>PLS TFT LCD</td>\r\n</tr>\r\n<tr>\r\n<td>Ghi &acirc;m</td>\r\n<td>Có</td>\r\n</tr>\r\n<tr>\r\n<td>GPS</td>\r\n<td>GLONASSGALILEOBD</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<h3><a title=\"Tham khảo gi&aacute; điện thoại Samsung Galaxy Z Fold3 5G 256GB ch&iacute;nh h&atilde;ng\" href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-z-fold-3\" target=\"_blank\" rel=\"noopener\">Galaxy Z Fold3 5G</a>, chiếc&nbsp;<a title=\"Tham khảo gi&aacute; điện thoại smartphone ch&iacute;nh h&atilde;ng\" href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" rel=\"noopener\">điện thoại</a>&nbsp;được n&acirc;ng cấp to&agrave;n diện về nhiều mặt, đặc biệt đ&acirc;y l&agrave; điện thoại m&agrave;n h&igrave;nh gập đầu ti&ecirc;n tr&ecirc;n thế giới c&oacute; camera ẩn (08/2021). Sản phẩm sẽ l&agrave; một &ldquo;c&uacute; hit&rdquo; của&nbsp;<a title=\"Tham khảo sản phẩm Samsung ch&iacute;nh h&atilde;ng tại Thegioididong.com\" href=\"https://thegioididong.com/samsung\" target=\"_blank\" rel=\"noopener\">Samsung</a>&nbsp;g&oacute;p phần mang đến những trải nghiệm mới cho người d&ugrave;ng.</h3>\r\n<h3>Thiết kế n&acirc;ng tầm smartphone m&agrave;n h&igrave;nh gập</h3>\r\n<p>C&oacute; thể thấy mẫu smartphone Galaxy Z Fold3 lần n&agrave;y vẫn giữ nguy&ecirc;n ngoại h&igrave;nh c&ugrave;ng cơ chế m&agrave;n h&igrave;nh gập mở dạng quyển s&aacute;ch như của tiền nhiệm, hồ biến chiếc smartphone th&agrave;nh một chiếc m&aacute;y t&iacute;nh bảng mini một c&aacute;ch dễ d&agrave;ng v&agrave; ngược lại.</p>\r\n<p><a class=\"preventdefault\" href=\"https://www.thegioididong.com/images/42/226935/samsung-galaxy-z-fold-3-25.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Samsung Galaxy Z Fold3 5G | Thiết kế n&acirc;ng tầm smartphone m&agrave;n h&igrave;nh gập\" src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-25.jpg\" alt=\"Samsung Galaxy Z Fold3 5G | Thiết kế n&acirc;ng tầm smartphone m&agrave;n h&igrave;nh gập\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-25.jpg\" /></a></p>\r\n<p>Khung viền sử dụng hợp kim nh&ocirc;m Armor Aluminum cứng c&aacute;p, bền bỉ hơn 10% so với c&aacute;c vật liệu trước đ&acirc;y Samsung từng sản xuất. Với cấu tạo chắc chắn sẽ gi&uacute;p bạn y&ecirc;n t&acirc;m tận hưởng c&aacute;c hoạt động y&ecirc;u th&iacute;ch một c&aacute;ch trọn vẹn nhất.</p>\r\n<p><a class=\"preventdefault\" href=\"https://www.thegioididong.com/images/42/226935/samsung-galaxy-z-fold3-5g-256gb-9.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Samsung Galaxy Z Fold3 5G | Khung viền cao cấp, độ bền cao\" src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold3-5g-256gb-9.jpg\" alt=\"Samsung Galaxy Z Fold3 5G | Khung viền cao cấp, độ bền cao\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold3-5g-256gb-9.jpg\" /></a></p>\r\n<p>Bộ khớp nối bản lề được thiết kế mới gi&uacute;p kết nối bộ khung của Galaxy Z Fold3 ho&agrave;n hảo hơn, tăng cao độ bền khi đ&oacute;ng mở li&ecirc;n tục v&agrave; cố định cực kỳ chắc chắn cho bạn trải nghiệm sử dụng thoải m&aacute;i nhất.</p>\r\n<p><a class=\"preventdefault\" href=\"https://www.thegioididong.com/images/42/226935/samsung-galaxy-z-fold3-5g-256gb-30.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Samsung Galaxy Z Fold3 5G | Kết cấu khung viền chắc chắn\" src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold3-5g-256gb-30.jpg\" alt=\"Samsung Galaxy Z Fold3 5G | Kết cấu khung viền chắc chắn\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold3-5g-256gb-30.jpg\" /></a></p>\r\n<p>Mặt lưng của Z Fold3 5G được l&agrave;m nh&aacute;m hơn so với mặt lưng tr&ecirc;n Z Fold2 5G, điều n&agrave;y gi&uacute;p hạn chế b&aacute;m bẩn, mồ h&ocirc;i hay dấu v&acirc;n tay trong qu&aacute; tr&igrave;nh ch&uacute;ng ta sử dụng m&aacute;y.&nbsp;</p>\r\n<p><a class=\"preventdefault\" href=\"https://www.thegioididong.com/images/42/226935/samsung-galaxy-z-fold-3-18.jpg\"><img class=\" lazyloaded\" title=\"Samsung Galaxy Z Fold3 5G | Thiết kế mặt lưng\" src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-18.jpg\" alt=\"Samsung Galaxy Z Fold3 5G | Thiết kế mặt lưng\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-18.jpg\" /></a></p>\r\n<p>B&ecirc;n cạnh đ&oacute;, Samsung cho biết họ sử dụng k&iacute;nh Gorilla Glass Victus cho phần m&agrave;n h&igrave;nh ngo&agrave;i nhằm tăng cường độ bền cho Galaxy Z Fold3 5G, gi&uacute;p m&aacute;y c&oacute; khả năng chống va đập khi rơi từ độ cao 2m, đồng thời chống xước tới 4 lần.</p>\r\n<p><a class=\"preventdefault\" href=\"https://www.thegioididong.com/images/42/226935/samsung-galaxy-z-fold-3-24.jpg\"><img class=\" lazyloaded\" title=\"Samsung Galaxy Z Fold3 5G | M&agrave;n h&igrave;nh ngo&agrave;i trang bị k&iacute;nh Gorilla Glass Victus\" src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-24.jpg\" alt=\"Samsung Galaxy Z Fold3 5G | M&agrave;n h&igrave;nh ngo&agrave;i trang bị k&iacute;nh Gorilla Glass Victus\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-24.jpg\" /></a></p>\r\n<p>Hệ thống loa k&eacute;p stereo k&iacute;ch thước lớn ở 2 cạnh tr&ecirc;n dưới, t&iacute;ch hợp c&ocirc;ng nghệ Dolby Atmos, Z Fold3 5G cho trải nghiệm chơi game, xem phim đ&atilde; tai với &acirc;m lượng lớn, hiệu ứng đa k&ecirc;nh r&otilde; r&agrave;ng ch&acirc;n thực.</p>\r\n<p><a class=\"preventdefault\" href=\"https://www.thegioididong.com/images/42/226935/samsung-galaxy-z-fold-3-23.jpg\"><img class=\" lazyloaded\" title=\"Samsung Galaxy Z Fold3 5G  | Hệ thống loa k&eacute;p hỗ trợ khả năng giải tr&iacute; ấn tượng\" src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-23.jpg\" alt=\"Samsung Galaxy Z Fold3 5G  | Hệ thống loa k&eacute;p hỗ trợ khả năng giải tr&iacute; ấn tượng\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold-3-23.jpg\" /></a></p>\r\n<p>Ngo&agrave;i ra, Galaxy Z Fold3 5G cũng l&agrave; thiết bị m&agrave;n h&igrave;nh gập đầu ti&ecirc;n tr&ecirc;n thế giới sở hữu c&ocirc;ng nghệ&nbsp;<a title=\"Tham khảo gi&aacute; điện thoại smartphone chống nước chống bụi\" href=\"https://www.thegioididong.com/dtdd-chong-nuoc-bui\" target=\"_blank\" rel=\"noopener\">kh&aacute;ng nước</a>&nbsp;chuẩn IPX8 ở mức cao nhất trong thang đo từ 1 - 8 gi&uacute;p ch&uacute;ng ta y&ecirc;n t&acirc;m sử dụng hằng ng&agrave;y.</p>\r\n<p><a class=\"preventdefault\" href=\"https://www.thegioididong.com/images/42/226935/samsung-galaxy-z-fold3-5g-256gb-20.jpg\"><img class=\" lazyloaded\" title=\"Samsung Galaxy Z Fold3 5G | Khả năng kh&aacute;ng nước ấn tượng\" src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold3-5g-256gb-20.jpg\" alt=\"Samsung Galaxy Z Fold3 5G | Khả năng kh&aacute;ng nước ấn tượng\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/226935/samsung-galaxy-z-fold3-5g-256gb-20.jpg\" /></a></p>\r\n<p>Với&nbsp;<a title=\"Tham khảo gi&aacute; điện thoại smartphone c&oacute; bảo mật cảm biến v&acirc;n tay\" href=\"https://www.thegioididong.com/dtdd-bao-mat-van-tay\" target=\"_blank\" rel=\"noopener\">cảm biến v&acirc;n tay</a>&nbsp;ở cạnh b&ecirc;n, việc mở kh&oacute;a m&agrave;n h&igrave;nh tr&ecirc;n Z Fold3 5G giờ đ&acirc;y đ&atilde; được thực hiện một c&aacute;ch nhanh ch&oacute;ng v&agrave; an to&agrave;n chỉ trong một nốt nhạc.</p>', 3, 4, '2021-12-09 07:56:10', '2021-12-09 09:34:51', NULL),
(3, 'Máy tính bảng Kindle Fire HD10 2021 - 11th - (All New Fire HD10 - 2021) - Ram 3GB, bộ nhớ 32GB, màn hình 1080 FullHD', 3450000, '<table>\r\n<tbody>\r\n<tr>\r\n<td>Thời gian pin</td>\r\n<td>tr&ecirc;n 12h</td>\r\n</tr>\r\n<tr>\r\n<td>Thương hiệu</td>\r\n<td>OEM</td>\r\n</tr>\r\n<tr>\r\n<td>Xuất xứ thương hiệu</td>\r\n<td>Mỹ</td>\r\n</tr>\r\n<tr>\r\n<td>Thời gian sạc</td>\r\n<td>4-5h</td>\r\n</tr>\r\n<tr>\r\n<td>K&iacute;ch thước</td>\r\n<td>\r\n<p>262 mm x 159 mm x 9.8 mm</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Loại/ C&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n<td>Led</td>\r\n</tr>\r\n<tr>\r\n<td>Phụ kiện đi k&egrave;m</td>\r\n<td>\r\n<ul class=\"a-unordered-list a-vertical a-spacing-mini\">\r\n<li>C&aacute;p sạc type-C</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Model</td>\r\n<td>Kindle Fire HD10 10th</td>\r\n</tr>\r\n<tr>\r\n<td>Xuất xứ</td>\r\n<td>Mỹ</td>\r\n</tr>\r\n<tr>\r\n<td>Trọng lượng</td>\r\n<td>456gr</td>\r\n</tr>\r\n<tr>\r\n<td>Độ ph&acirc;n giải</td>\r\n<td>1920 x 1200 pixels</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<h4 class=\"BlockTitle__Wrapper-sc-qpz3fo-0 eHltcn\">M&ocirc; Tả Sản Phẩm</h4>\r\n<div class=\"content\">\r\n<div class=\"ToggleContent__Wrapper-sc-1dbmfaw-1 cqXrJr\">\r\n<div class=\"ToggleContent__View-sc-1dbmfaw-0 cYhiAl\">\r\n<div>\r\n<p>Kindle Fire HD10 2021 (11th) l&agrave; d&ograve;ng sản phẩm đ&aacute;nh v&agrave;o ph&acirc;n kh&uacute;c gi&aacute; rẻ của m&aacute;y t&iacute;nh bảng. Mục đ&iacute;ch ban đầu của nh&agrave; sản xuất l&agrave; b&ugrave; đắp cho sự thiếu hụt của m&aacute;y đọc s&aacute;ch c&ocirc;ng nghệ Eink ở t&iacute;nh năng đọc PDF. Sau n&agrave;y trở th&agrave;nh d&ograve;ng sản phẩm ri&ecirc;ng biệt nhắm v&agrave;o nhu cầu giải tr&iacute; phim ảnh trong hệ sinh th&aacute;i Amazon s&aacute;ng tạo.</p>\r\n<p>Bản th&acirc;n chiếc kindle Fire HD10 vốn dĩ với triết l&yacute; thiết kế rất thực tế về hiệu năng n&ecirc;n bạn kh&ocirc;ng thể đ&ograve;i hỏi n&oacute; qu&aacute; cao về cấu h&igrave;nh m&aacute;y. Tuy nhi&ecirc;n, với số tiền dưới 4 triệu đồng&nbsp; th&igrave; gần như kh&ocirc;ng c&oacute; sản phẩm n&agrave;o c&oacute; thể vượt qua được n&oacute; (nhất l&agrave; với nhu cầu xem phim/video hoặc c&aacute;c nhu cầu li&ecirc;n quan đến hiển thị h&igrave;nh ảnh).</p>\r\n<p>&nbsp;Một số điểm nổi bật của Kindle Fire HD10</p>\r\n<p>1. Pin rất tốt l&ecirc;n đến 12h - Với bản HD10 2021 (11th), Amazon đ&atilde; trang bị cổng USB-C khiến bạn c&oacute; thể đồng bộ cổng sạc với c&aacute;c thiết bị hiện đại kh&aacute;c. Đồng thời, c&ocirc;ng nghệ sạc kh&ocirc;ng d&acirc;y đ&atilde; được trang bị tr&ecirc;n chiếc Kindle Fire thế hệ 11 (chỉ c&oacute; ở phi&ecirc;n bản Plus) gi&uacute;p bạn thoải m&aacute;i vừa xem phim vừa sạc m&agrave; kh&ocirc;ng lo đến hiện tượng nguy hiểm khi sạc (tuy nhi&ecirc;n, n&ecirc;n hạn chế vừa sử dụng vừa sạc).</p>\r\n<p>2. RAM 3GB, CHIP Octa-core 2.0 GHz tăng hiệu năng sử dụng gấp nhiều lần so với c&aacute;c sản phẩm đời trước. Nếu bạn l&agrave; người trung th&agrave;nh với d&ograve;ng sản phẩm m&aacute;y t&iacute;nh bảng Kindle Fire&nbsp; th&igrave; chắc chắn sẽ nhận ra sự kh&aacute;c biệt rất r&otilde; rệt ở lần n&acirc;ng cấp phần cứng n&agrave;y c&oacute; ảnh hưởng như n&agrave;o đến trải nghiệm sử dụng sản phẩm.</p>\r\n<p>3. M&agrave;n h&igrave;nh 10.1inch FullHD 1080 l&ecirc;n đến 2 triệu điểm ảnh khiến m&agrave;u sắc hiển thị v&ocirc; c&ugrave;ng bắt mắt, sắc n&eacute;t. Gần như kh&ocirc;ng c&oacute; sự ph&agrave;n n&agrave;n n&agrave;o về m&agrave;n h&igrave;nh hiển thị chiếc Kindle Fire HD10 từ người sử dụng.&nbsp;</p>\r\n<p>4. Kindle Fire HD10 thế hệ 11 đ&atilde; n&acirc;ng cấp camera trước v&agrave; sau l&ecirc;n 2MP v&agrave; 5MP đ&aacute;p ứng tốt hơn nhu cầu học online hoặc l&agrave;m việc trực tuyến qua video call.&nbsp;</p>\r\n<p>5. Hệ điều h&agrave;nh c&oacute; thể c&agrave;i đặt c&aacute;c ứng dụng CH Play m&agrave; kh&ocirc;ng cần ROOT m&aacute;y l&agrave; ưu điểm của c&aacute;c phiển bản Kindle Fire thế hệ sau n&agrave;y. Bạn kh&ocirc;ng cần phải bỏ c&ocirc;ng sức ra để can thiệp v&agrave;o hệ điều h&agrave;nh g&acirc;y rủi do trong qu&aacute; tr&igrave;nh sử dụng như c&aacute;c phi&ecirc;n bản trước đ&acirc;y.</p>\r\n<p>6. Với phi&ecirc;n bản Kindle Fire HD10 thế hệ 11 bạn c&oacute; thể t&igrave;m kiếm cho m&igrave;nh những phụ kiện th&ocirc;ng minh đi k&egrave;m gia tăng hiệu quả l&agrave;m việc: Sạc kh&ocirc;ng d&acirc;y, b&agrave;n ph&iacute;m (Keyboard),</p>\r\n<p>The End:&nbsp;</p>\r\n<p>Nếu bạn muốn sử dụng một chiếc m&aacute;y t&iacute;nh bảng gi&aacute; rẻ, ph&ugrave; hợp với c&aacute;c nhu cầu giải tr&iacute; nghe nh&igrave;n m&agrave; kh&ocirc;ng hướng đến hiệu năng hay sử dụng c&aacute;c phần mềm đ&ograve;i hỏi cấu h&igrave;nh cao th&igrave; d&ograve;ng m&aacute;y t&iacute;nh bảng Kindle Fire n&oacute;i chung v&agrave; Kindle Fire HD10 n&oacute;i ri&ecirc;ng rất đ&aacute;ng để c&acirc;n nhắc.</p>\r\n<p><img src=\"https://salt.tikicdn.com/ts/tmp/e7/55/73/82fb024ac8acc708a63f6e4eb44d9e49.jpg\" alt=\"\" width=\"750\" height=\"750\" /></p>\r\n<p>Gi&aacute; sản phẩm tr&ecirc;n Tiki đ&atilde; bao gồm thuế theo luật hiện h&agrave;nh. B&ecirc;n cạnh đ&oacute;, tuỳ v&agrave;o loại sản phẩm, h&igrave;nh thức v&agrave; địa chỉ giao h&agrave;ng m&agrave; c&oacute; thể ph&aacute;t sinh th&ecirc;m chi ph&iacute; kh&aacute;c như ph&iacute; vận chuyển, phụ ph&iacute; h&agrave;ng cồng kềnh, thuế nhập khẩu (đối với đơn h&agrave;ng giao từ nước ngo&agrave;i c&oacute; gi&aacute; trị tr&ecirc;n 1 triệu đồng).....</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 4, 4, '2021-12-09 08:05:18', '2021-12-09 09:45:17', NULL),
(4, 'Máy tính bảng Kindle Fire HD8 Model 2020 - 32GB - Hàng nhập khẩu', 2040000, '<table>\r\n<tbody>\r\n<tr>\r\n<td>Thời gian pin</td>\r\n<td>Pin l&ecirc;n tới 12 giờ cho nhu cầu sử dụng hỗn hợp đọc s&aacute;ch, xem video, lướt web, nghe nhạc...</td>\r\n</tr>\r\n<tr>\r\n<td>Thương hiệu</td>\r\n<td>Amazon</td>\r\n</tr>\r\n<tr>\r\n<td>Xuất xứ thương hiệu</td>\r\n<td>Mỹ</td>\r\n</tr>\r\n<tr>\r\n<td>Thời gian sạc</td>\r\n<td>Khoảng 4h</td>\r\n</tr>\r\n<tr>\r\n<td>Dung lượng ổ cứng</td>\r\n<td>32gb</td>\r\n</tr>\r\n<tr>\r\n<td>Phụ kiện đi k&egrave;m</td>\r\n<td>\r\n<p>M&aacute;y + C&aacute;p + Cục sạc + S&aacute;ch</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Xuất xứ</td>\r\n<td>Mỹ / Trung Quốc</td>\r\n</tr>\r\n<tr>\r\n<td>Trọng lượng</td>\r\n<td>355g</td>\r\n</tr>\r\n<tr>\r\n<td>Cổng USB</td>\r\n<td>USB-C</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<h4 class=\"BlockTitle__Wrapper-sc-qpz3fo-0 eHltcn\">M&ocirc; Tả Sản Phẩm</h4>\r\n<div class=\"content\">\r\n<div class=\"ToggleContent__Wrapper-sc-1dbmfaw-1 cqXrJr\">\r\n<div class=\"ToggleContent__View-sc-1dbmfaw-0 cYhiAl\">\r\n<div>\r\n<h1 class=\"page-title\">Đ&aacute;nh gi&aacute; m&aacute;y t&iacute;nh bảng gi&aacute; rẻ Amazon Fire HD 8 2020: Đ&atilde; tốt nay c&ograve;n tốt hơn!<br />Amazon Fire HD 8 2020 với bộ xử l&yacute; nhanh hơn, dung lượng RAM mở rộng c&ugrave;ng cổng sạc USB-C sẽ l&agrave; chiếc m&aacute;y t&iacute;nh bảng gi&aacute; rẻ cực kỳ đ&aacute;ng sắm sửa trong năm nay.</h1>\r\n<div class=\"article-content\">\r\n<p>Nếu bạn chưa biết về m&aacute;y t&iacute;nh bảng Amazon th&igrave; m&igrave;nh sẽ n&oacute;i ngắn gọn đ&ocirc;i ch&uacute;t. Đ&acirc;y l&agrave; d&ograve;ng m&aacute;y t&iacute;nh bảng gi&aacute; rẻ rất g&acirc;y được ch&uacute; &yacute; tr&ecirc;n thị trường, n&oacute; kh&ocirc;ng nhắm đến hiệu năng khủng hay thiết kế qu&aacute; mức sang trọng. Thay v&agrave;o đ&oacute;, h&atilde;ng tập trung đến hiệu suất ổn định v&agrave; gi&aacute; th&agrave;nh, một m&oacute;n qu&agrave; hết sức &yacute; nghĩa với c&aacute;c bạn nhỏ hoặc những người mới sử dụng m&aacute;y t&iacute;nh bảng. Ch&iacute;nh v&igrave; cũng kh&aacute; được ưa chuộng m&agrave; thỉnh thoảng Amazon lại tung ra sản phẩm mới. Năm ngo&aacute;i họ đ&atilde; l&agrave;m lại mẫu Fire HD 7 v&agrave; năm nay đối tượng được &lsquo;remake&rsquo; l&agrave; Fire HD 8.</p>\r\n<p><img src=\"https://salt.tikicdn.com/ts/tmp/d2/06/fa/ad65b03c2248652c385a38b7f5eb94d5.jpg\" alt=\"\" width=\"750\" height=\"421\" /></p>\r\n<p>Hiện tại chiếc Fire HD 8 2020 đ&atilde; c&oacute; mặt tr&ecirc;n thị trường v&agrave; nghe đ&acirc;u model Fire HD 8 Plus cũng sẽ xuất hiện trong năm nay, cả phụ kiện l&agrave; dock sạc kh&ocirc;ng d&acirc;y nữa. Tại Việt Nam, m&aacute;y t&iacute;nh bảng Amazon kh&ocirc;ng hẳn l&agrave; sản phẩm được nhiều người biết đến nhưng nếu bạn đang t&igrave;m kiếm một chiếc tablet gi&aacute; rẻ c&oacute; thể l&agrave;m được nhiều thứ th&igrave; n&ecirc;n c&acirc;n nhắc d&ograve;ng sản phẩm n&agrave;y của Amazon.</p>\r\n<h2 id=\"nhung-dieu-ban-can-biet-ve-amazon-fire-hd-8-2020\"><strong>Những điều bạn cần biết về Amazon Fire HD 8 2020</strong></h2>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 4, 3, '2021-12-09 08:08:59', '2021-12-09 08:08:59', NULL),
(5, 'Điện Thoại Samsung Galaxy M12 (4GB/64GB) - Hàng Chính Hãng', 3390000, '<table>\r\n<tbody>\r\n<tr>\r\n<td>Dung lượng pin</td>\r\n<td>5000mAh</td>\r\n</tr>\r\n<tr>\r\n<td>Bluetooth</td>\r\n<td>Bluetooth v5.0</td>\r\n</tr>\r\n<tr>\r\n<td>Thương hiệu</td>\r\n<td>Samsung</td>\r\n</tr>\r\n<tr>\r\n<td>Xuất xứ thương hiệu</td>\r\n<td>H&agrave;n Quốc</td>\r\n</tr>\r\n<tr>\r\n<td>Camera sau</td>\r\n<td>48.0 MP + 5.0 MP + 2.0 MP + 2.0 MP</td>\r\n</tr>\r\n<tr>\r\n<td>Camera trước</td>\r\n<td>8.0 MP</td>\r\n</tr>\r\n<tr>\r\n<td>Hỗ trợ thẻ nhớ ngo&agrave;i</td>\r\n<td>MicroSD</td>\r\n</tr>\r\n<tr>\r\n<td>Chip set</td>\r\n<td>Exynos 850 (8 nh&acirc;n)</td>\r\n</tr>\r\n<tr>\r\n<td>Đ&egrave;n Flash</td>\r\n<td>C&oacute;</td>\r\n</tr>\r\n<tr>\r\n<td>Loại/ C&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n<td>PLS TFT LCD</td>\r\n</tr>\r\n<tr>\r\n<td>GPS</td>\r\n<td>GPS, Glonass, Beidou, Galileo</td>\r\n</tr>\r\n<tr>\r\n<td>H&ocirc;̃ trợ 4G</td>\r\n<td>C&oacute;</td>\r\n</tr>\r\n<tr>\r\n<td>Phụ kiện đi k&egrave;m</td>\r\n<td>S&aacute;ch hướng dẫn, c&acirc;y lấy sim, c&aacute;p</td>\r\n</tr>\r\n<tr>\r\n<td>Model</td>\r\n<td>M12</td>\r\n</tr>\r\n<tr>\r\n<td>Jack tai nghe</td>\r\n<td>3.5mm</td>\r\n</tr>\r\n<tr>\r\n<td>Số sim</td>\r\n<td>2</td>\r\n</tr>\r\n<tr>\r\n<td>Loại Sim</td>\r\n<td>SIM Nano</td>\r\n</tr>\r\n<tr>\r\n<td>Nghe nhạc</td>\r\n<td>C&oacute;</td>\r\n</tr>\r\n<tr>\r\n<td>Xuất xứ</td>\r\n<td>Việt Nam/Ấn Độ/Trung Quốc (T&ugrave;y từng đợt nhập h&agrave;ng)</td>\r\n</tr>\r\n<tr>\r\n<td>Cổng sạc</td>\r\n<td>USB Type-C</td>\r\n</tr>\r\n<tr>\r\n<td>Quay phim</td>\r\n<td>FHD (1920 x 1080)@30fps</td>\r\n</tr>\r\n<tr>\r\n<td>RAM</td>\r\n<td>4GB</td>\r\n</tr>\r\n<tr>\r\n<td>Độ ph&acirc;n giải</td>\r\n<td>HD+ (720 x 1600 pixels)</td>\r\n</tr>\r\n<tr>\r\n<td>ROM</td>\r\n<td>64GB</td>\r\n</tr>\r\n<tr>\r\n<td>K&iacute;ch thước m&agrave;n h&igrave;nh</td>\r\n<td>6.5 inch</td>\r\n</tr>\r\n<tr>\r\n<td>Hỗ trợ thẻ tối đa</td>\r\n<td>Tối đa 1TB</td>\r\n</tr>\r\n<tr>\r\n<td>Wifi</td>\r\n<td>802.11 b/g/n 2.4GHz</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<h5>M&agrave;n H&igrave;nh Rộng, Trải Nghiệm Nhiều Hơn</h5>\r\n<p><strong>Điện Thoại Samsung Galaxy M12 (4GB/64GB)</strong>&nbsp;thoải m&aacute;i trải nghiệm nhiều nội dung hơn với m&agrave;n h&igrave;nh tr&agrave;n viền v&ocirc; cực Infinity-V 6,5 inch tr&ecirc;n m&atilde;nh th&uacute; Galaxy M12.</p>\r\n<p><img id=\"https://salt.tikicdn.com/ts/tmp/d0/1c/8d/308e1e90926cb928651148de57ca6fbf.jpg\" title=\"\" src=\"https://salt.tikicdn.com/ts/tmp/d0/1c/8d/308e1e90926cb928651148de57ca6fbf.jpg\" alt=\"\" width=\"750\" height=\"510\" /></p>\r\n<p>C&ocirc;ng nghệ HD+ mang đến chất lượng hiển thị r&otilde; r&agrave;ng v&agrave; sắc n&eacute;t, cho bạn thỏa th&iacute;ch thưởng thức nội dung đỉnh cao mỗi ng&agrave;y.</p>\r\n<h5>Thiết Kế Trẻ Trung, Hiện Đại</h5>\r\n<p>Chi&ecirc;m ngưỡng vẻ đẹp trẻ trung đầy c&aacute; t&iacute;nh của Galaxy M12. Mặt lưng &aacute;nh kim thời thượng, kết hợp với những họa tiết si&ecirc;u nhỏ tạo n&ecirc;n một thiết kế Galaxy đậm chất thời đại, dẫn đầu xu hướng. Th&acirc;n m&aacute;y được ho&agrave;n thiện tỉ mỉ với đường cong mềm mại, cho ph&eacute;p cầm nắm v&agrave; sử dụng điện thoại dễ d&agrave;ng.</p>\r\n<p><img id=\"https://salt.tikicdn.com/ts/tmp/4f/4f/ab/d57ccea8e7bba683e5d505f73d4dacb9.jpg\" title=\"\" src=\"https://salt.tikicdn.com/ts/tmp/4f/4f/ab/d57ccea8e7bba683e5d505f73d4dacb9.jpg\" alt=\"\" width=\"750\" height=\"597\" /></p>\r\n<h5>Thỏa Sức S&aacute;ng Tạo Những Khung H&igrave;nh Th&uacute; Vị Với Bộ 4 Camera 48MP</h5>', 5, 3, '2021-12-09 08:12:54', '2021-12-09 08:12:54', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_cats`
--

CREATE TABLE `product_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_cats`
--

INSERT INTO `product_cats` (`id`, `name`, `created_at`, `updated_at`, `status_id`, `slug`) VALUES
(3, 'Điện thoại', NULL, NULL, 2, 'dien-thoai'),
(4, 'Máy Tính bảng', NULL, NULL, 2, 'may-tinh-bang'),
(5, 'Asus', '2021-12-02 18:39:46', '2021-12-02 18:39:46', 2, 'may-tinh-bang-asus'),
(6, 'Macbook', '2021-12-02 18:40:35', '2021-12-02 18:40:35', 2, 'may-tinh-bang-macbook'),
(7, 'Laptop', NULL, NULL, 2, 'laptop'),
(8, 'Tai nghe', NULL, NULL, 2, 'tai-nghe'),
(9, 'Thời trang', NULL, NULL, 2, 'thoi-trang'),
(10, 'Đồ gia dụng', NULL, NULL, 2, 'do-gia-dung'),
(11, 'Thiết bị văn phòng', NULL, NULL, 2, 'thiet-bi-van-phong'),
(12, 'xiaomi', '2021-12-09 08:44:56', '2021-12-09 08:44:56', 2, 'dien-thoai-xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', NULL, NULL),
(2, 'editor', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chờ duyệt', NULL, NULL),
(2, 'Công khai', NULL, NULL),
(3, 'còn hàng', NULL, NULL),
(4, 'hết hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thumbnail_products`
--

CREATE TABLE `thumbnail_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thumbnail_products`
--

INSERT INTO `thumbnail_products` (`id`, `thumbnail`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'public/uploads/products/sp1.1.jpg', 2, '2021-12-09 07:56:11', '2021-12-09 07:56:11'),
(2, 'public/uploads/products/sp1.jpg', 2, '2021-12-09 07:56:11', '2021-12-09 07:56:11'),
(3, 'public/uploads/products/sp2.1.jpg', 3, '2021-12-09 08:05:18', '2021-12-09 08:05:18'),
(4, 'public/uploads/products/sp2.jpg', 3, '2021-12-09 08:05:18', '2021-12-09 08:05:18'),
(5, 'public/uploads/products/4dd641413ae9791a84d477eaec10b249.jpg.jpg', 4, '2021-12-09 08:08:59', '2021-12-09 08:08:59'),
(6, 'public/uploads/products/3f8dbf19d2110c702cdff36d460f2534.jpg.jpg', 4, '2021-12-09 08:08:59', '2021-12-09 08:08:59'),
(7, 'public/uploads/products/109cdfee306c37c89c67736341cdc588.jpg.jpg', 5, '2021-12-09 08:12:54', '2021-12-09 08:12:54'),
(8, 'public/uploads/products/d2c101d7c2b6e77e0b391fbb5041d1ca.jpg.jpg', 5, '2021-12-09 08:12:54', '2021-12-09 08:12:54'),
(9, 'public/uploads/products/3377a65a5e426e395b9984e275886353.jpg.jpg', 5, '2021-12-09 08:12:54', '2021-12-09 08:12:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `deleted_at`) VALUES
(1, 'Nguyễn văn đức', 'ducthu15012001', 'duc15012001@gmail.com', NULL, '$2y$10$WezyS8Z6jkAnXTy8yqH87.XDDJI7qogyA8nb3kDuTEOncoXHypUIq', NULL, '2021-12-02 08:29:21', '2021-12-02 08:29:21', 1, NULL),
(3, 'Nguyễn thị phượng', 'duc15012001@gmail.com', 'phpmaster@gmail.com', NULL, '$2y$10$sSxhapf/Vb5rKxCdowoK4enA.RKSSJN8ORi9uAoCIpHR3SuUA9jqC', NULL, '2021-12-09 08:20:37', '2021-12-09 08:43:59', 2, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `check_prices`
--
ALTER TABLE `check_prices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_status_id_foreign` (`status_id`),
  ADD KEY `posts_cat_id_foreign` (`cat_id`);

--
-- Chỉ mục cho bảng `post_cats`
--
ALTER TABLE `post_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_cats_parent_id_foreign` (`parent_id`),
  ADD KEY `post_cats_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `product_cats`
--
ALTER TABLE `product_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cats_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thumbnail_products`
--
ALTER TABLE `thumbnail_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thumbnail_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `check_prices`
--
ALTER TABLE `check_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `post_cats`
--
ALTER TABLE `post_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_cats`
--
ALTER TABLE `product_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thumbnail_products`
--
ALTER TABLE `thumbnail_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `post_cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `post_cats`
--
ALTER TABLE `post_cats`
  ADD CONSTRAINT `post_cats_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_cats_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `product_cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_cats`
--
ALTER TABLE `product_cats`
  ADD CONSTRAINT `product_cats_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thumbnail_products`
--
ALTER TABLE `thumbnail_products`
  ADD CONSTRAINT `thumbnail_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
