-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 15, 2021 lúc 07:38 PM
-- Phiên bản máy phục vụ: 10.2.26-MariaDB-log-cll-lve
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `yjmfhsehosting_phongtro247`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id_add` int(11) NOT NULL,
  `add_apart` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `add_wards` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `add_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `add_province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id_add`, `add_apart`, `add_wards`, `add_district`, `add_province`) VALUES
(1, '52 đường Mễ Trì', 'Mỹ Đình', 'Nam Từ Liêm', 'Hà Nội'),
(62, 'số 5 đường Ngọc Hồi', 'Ngọc Hồi', 'Thanh Trì', 'Hà Nội'),
(63, 'Số nhà 12', 'Nghĩa Tân', 'Cầu Giấy', 'Hà Nội'),
(64, 'Số 17 đường mai  dịch', 'Mai Dịch', 'Cầu Giấy', 'Hà Nội'),
(65, 'Ngõ 280 đường cổ nhuế', 'Cổ Nhuế 1', 'Bắc Từ Liêm', 'Hà Nội'),
(66, 'Số 12 đường cầu giấy', 'Nghĩa Tân', 'Cầu Giấy', 'Hà Nội'),
(67, 'Đường trần thái tông', 'Dịch Vọng Hậu', 'Cầu Giấy', 'Hà Nội'),
(68, 'Đường thái thành', 'Dịch Vọng', 'Cầu Giấy', 'Hà Nội'),
(69, '17 phố duy tân', 'Dịch Vọng', 'Cầu Giấy', 'Hà Nội'),
(70, 'số 12 đường duy tân', 'Dịch Vọng Hậu', 'Cầu Giấy', 'Hà Nội'),
(71, 'Đường cầu giấy', 'Dịch Vọng Hậu', 'Cầu Giấy', 'Hà Nội'),
(72, '', 'Phường/Xã', 'Yên Phong', 'Bắc Ninh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `cmt_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cmt_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `user_id`, `room_id`, `cmt_content`, `cmt_time`) VALUES
(135, 155, 70, '...', '2020-12-28 08:23:00'),
(136, 136, 80, 'cmt', '2020-12-28 13:19:10'),
(137, 156, 80, 'user', '2020-12-28 13:20:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infor`
--

CREATE TABLE `infor` (
  `infor_id` int(11) NOT NULL,
  `infor_firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_iden` int(11) NOT NULL,
  `infor_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_address` int(11) NOT NULL,
  `infor_birth` date NOT NULL,
  `infor_gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `infor`
--

INSERT INTO `infor` (`infor_id`, `infor_firstname`, `infor_lastname`, `infor_iden`, `infor_phone`, `infor_address`, `infor_birth`, `infor_gender`, `infor_avatar`) VALUES
(136, 'Nguyễn Văn', 'Admin', 0, '53452353', 1, '1999-12-08', 'Nam', 'avatar.jpg'),
(154, 'Phạm Văn ', 'Huy', 0, '', 1, '2000-06-10', 'Nam', 'avatar.jpg'),
(155, 'Phạm Văn Huy', '1', 0, '', 1, '2000-12-28', 'Nữ', 'avatar.jpg'),
(156, 'Nguyễn', 'Long', 0, '', 1, '2005-12-28', 'Nam', 'avatar.jpg'),
(157, 'Nguyễn', 'Long', 0, '', 1, '2005-10-25', 'Nam', 'avatar.jpg'),
(158, 'Nguyen', 'e', 0, '', 0, '2222-03-10', 'Nam', ''),
(159, '123', '123', 0, '', 0, '2021-04-22', 'Nam', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_room`
--

CREATE TABLE `info_room` (
  `id_infor` int(11) NOT NULL,
  `infor_category` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_count` int(11) NOT NULL,
  `infor_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_elect` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_water` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_closed` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_areage` int(11) NOT NULL,
  `infor_detailRoom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_airCo` varchar(255) NOT NULL,
  `infor_heater` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_fridge` varchar(255) NOT NULL,
  `infor_WM` varchar(255) NOT NULL,
  `infor_bed` varchar(255) NOT NULL,
  `infor_wardrobe` varchar(255) NOT NULL,
  `infor_nearHost` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infor_post` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `info_room`
--

INSERT INTO `info_room` (`id_infor`, `infor_category`, `infor_count`, `infor_price`, `infor_elect`, `infor_water`, `infor_closed`, `infor_areage`, `infor_detailRoom`, `infor_airCo`, `infor_heater`, `infor_fridge`, `infor_WM`, `infor_bed`, `infor_wardrobe`, `infor_nearHost`, `infor_time`, `infor_note`, `infor_post`) VALUES
(70, 'Chung cư mini', 1, '2500000VND/Tháng', '3700/số', '100k/1 người', 'khép kín', 28, '1 phòng ở, 1 bếp nhỏ, 1 nhà vệ sinh', '1', '1', '0', '0', '1', '1', 'chung chủ', 'không giới hạn', '', '<p>Chung cư mini đẹp</p>\n'),
(71, 'chung cư', 10, '4 triệu', '5000/ 1 số', '200 000/1 tháng', 'khép kín', 50, '2 phong ngủ', '2', '1', '1', '1', '2', '2', 'không', '6h-22h', 'Trọ giá rẻ ', '<p>Ph&ugrave; hợp với học sinh, sinh vi&ecirc;n</p>\n'),
(72, 'chung cư cao cấp', 18, '10 triệu VNĐ', '4000/1 số', '100 000/ 1 tháng', 'khép kín', 80, '3 phòng ngủ,1 phòng khách,2 wc', '3', '2', '3', '1', '3', '3', 'chung chủ', '10h - 23h', 'trọ đẹp', '<p>Nh&agrave; t&ocirc;i c&oacute; t&ograve;a nh&agrave; CCMN vừa mới x&acirc;y xong tổng 21 ph&ograve;ng. Đ&atilde; c&oacute; thể v&agrave;o ở được lu&ocirc;n. - Địa chỉ: Nh&agrave; số 5 ng&otilde; 43 đường Cổ Nhuế, P. Cổ Nhuế 2, Bắc Từ Li&ecirc;m, H&agra'),
(73, 'Cấp 4', 4, '1,5 triệu', '4000/1 số', '100 000/ 1 tháng', 'Không khép kín', 30, '1 ngủ, 1 wc', '1', '1', '0', '0', '1', '1', 'chung chủ', '6h-24h', '', '<p>Cho thu&ecirc; ph&ograve;ng 1,5 triệu/th c&oacute; m&aacute;y lạnh, gần đường Phạm Văn Đồng, Mỏ, T&agrave;i Ch&iacute;nh, T&agrave;i Nguy&ecirc;n M&ocirc;i Trường, Metro, c&ocirc;ng vi&ecirc;n H&ograve;a B&igrave;nh - An ninh tốt. - Ph&ograve;ng c&oacu'),
(74, 'chung cư mini', 22, '3,8 triệu', '5000/ 1 số', '120 000/ 1 tháng', 'khép kín', 40, '1 ngủ, 1 wc', '1', '1', '1', '1', '1', '1', 'chung chủ', '6h-23h', 'Giá rẻ', '<p>** Ch&iacute;nh chủ cho thu&ecirc; ph&ograve;ng kh&eacute;p k&iacute;n tại to&agrave; nh&agrave; chung cư mini 6 tầng, đường Cầu Giấy. Hiện gia đ&igrave;nh m&igrave;nh c&ograve;n 01 ph&ograve;ng trống cho thu&ecirc; tại CCMN Cầu Giấy. - Nh&agrave; mới,'),
(75, 'chung cư', 10, '5 triệu VNĐ', '4000/1 số', '120 000/ 1 tháng', 'khép kín', 50, '2 phong ngủ, 1 wc', '2', '1', '1', '1', '2', '2', 'chung chủ', '6h -23h', '', '<p>Nh&agrave; m&igrave;nh ở số 84A, ng&otilde; 44 Trần Th&aacute;i T&ocirc;ng &ndash; cổng l&agrave;ng Cốm V&ograve;ng, trung t&acirc;m khu Cầu Giấy, xung quanh rất nhiều chợ v&agrave; trung t&acirc;m thương mại, từ nh&agrave; đi bộ sang Đại học Sư Phạm c'),
(76, 'chung cư cao cấp', 15, '11,5 triệu', '5000/ 1 số', '200 000/1 tháng', 'khép kín', 100, '3 phòng ngủ,1 phòng khách,2 wc', '3', '2', '1', '1', '3', '3', 'không', 'Giờ thoải mái', '', '<p>Si&ecirc;u rẻ v&agrave; đẹp cho thu&ecirc; căn hộ ở N09B1 Th&agrave;nh Th&aacute;i , Cầu Giấy. Kh&aacute;ch c&oacute; thể v&agrave;o ở lu&ocirc;n ạ. + 2 ph&ograve;ng ngủ đầy đủ tất cả đồ kh&aacute;ch chỉ cần mang vali đến ở gi&aacute; chỉ 11,5tr/th&aac'),
(77, 'chung cư cao cấp', 13, '12 triệu', '5000/ 1 số', '200 000/1 tháng', 'khép kín', 100, '3 phòng ngủ,1 phòng khách,2 wc', '3', '2', '1', '1', '3', '3', 'không', 'Giờ giấc thoải mái', 'Cọc 1 năm tiền phòng', '<p>Ch&iacute;nh chủ cần cho thu&ecirc; căn hộ cao cấp tại H&agrave; Đ&ocirc; Park View. Th&ocirc;ng tin căn hộ cho thu&ecirc; như sau: - Diện t&iacute;ch: 90m2. - Số ph&ograve;ng ngủ: 2 ph&ograve;ng ngủ, 2 vệ sinh, 1 ban c&ocirc;ng, 1 loggia phơi đồ + Nội'),
(78, 'chung cư cao cấp', 14, '12 triệu VNĐ', '5000/ 1 số', '100 000/ 1 tháng', 'khép kín', 90, '2 phong ngủ, 1 wc', '2', '1', '1', '1', '2', '2', 'không', 'Giờ thoải mái', 'Thuê lâu dài', '<p>&nbsp;</p>\n\n<p>Ch&iacute;nh chủ cần cho thu&ecirc; gấp c&aacute;c căn hộ cao cấp tại H&Agrave; Đ&Ocirc; PARK VIEW. Căn hộ c&oacute; diện t&iacute;ch 90m, với 2 ph&ograve;ng ngủ, 1 ph&ograve;ng kh&aacute;ch, 1 khu bếp, 1 loggia, v&agrave; 1 ban c&ocirc;'),
(79, 'chung cư cao cấp', 33, '14 triệu', '5k/1 số', '25k/ 1 số', 'khép kín', 95, '3 phòng ngủ,1 phòng khách,2 wc', '3', '2', '1', '1', '3', '3', 'không', 'Giờ thoải mái', '', '<p>Cho thu&ecirc; căn hộ chung cư Discovery Complex, 302 Cầu Giấy, H&agrave; Nội. Căn g&oacute;c đẹp t&ograve;a nh&agrave;, view hồ Nghĩa T&acirc;n, hồ T&acirc;y, Lotte... Nh&agrave; thiết kế 2 ph&ograve;ng ngủ ch&iacute;nh + 1 ph&ograve;ng đa năng + 1 ph'),
(80, 'Chung cư mini', 5, '2500000VND/Tháng', '3700/số', '100k/1 người', 'khép kín', 28, '1 phòng ở, 1 bếp nhỏ, 1 nhà vệ sinh', '3', '4', '4', '8', '6', '7', 'chung chủ', 'không giới hạn', 'nite', '<p>M&ocirc; tả</p>\n\n<p><img alt=\"\" src=\"https://phongtro247.xyz/public/upload/image/images/penthouse.jpg\" style=\"height:851px; width:1280px\" /></p>\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rep_comment`
--

CREATE TABLE `rep_comment` (
  `rep_id` int(11) NOT NULL,
  `id_cmt` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rep_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rep_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `rep_comment`
--

INSERT INTO `rep_comment` (`rep_id`, `id_cmt`, `id_user`, `rep_content`, `rep_time`) VALUES
(39, 136, 156, 'user', '2020-12-28 13:20:49'),
(40, 136, 136, 'Kenny', '2021-01-02 01:25:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'vendor'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `room_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `add_id` int(11) NOT NULL,
  `room_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `seo_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_time` datetime NOT NULL,
  `room_timeend` datetime NOT NULL,
  `room_countday` int(11) NOT NULL,
  `room_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id_room`, `room_title`, `add_id`, `room_image`, `id_vendor`, `seo_url`, `room_time`, `room_timeend`, `room_countday`, `room_status`) VALUES
(70, 'Phòng trọ bình dân', 62, 'tải xuống (1).jpg,tải xuống.jpg,penthouse.jpg', 155, '', '2020-12-28 07:49:25', '2021-01-27 00:00:00', 30, 1),
(71, 'Trọ 1', 63, '0317.jpg', 157, '', '2020-12-28 07:58:57', '2021-01-04 00:00:00', 7, 1),
(72, 'Cho thuê phòng trọ giá rẻ 10 triệu', 64, '44-1.jpg,26-2.jpg,0206.jpg,3108.jpg,0317.jpg,3227.jpg,0160.jpg', 157, '', '2020-12-28 08:03:44', '2021-01-27 00:00:00', 30, 1),
(73, 'Phòng trọ 1,5tr Quận Bắc Từ Liêm 22m² có Điều Hòa', 65, '3227.jpg,0160.jpg,3037.jpg,2886.jpg', 157, '', '2020-12-28 08:07:19', '2021-01-04 00:00:00', 7, 1),
(74, 'Phòng trọ CCMN khép kín Quận Cầu Giấy 34m²', 66, '1.jpg,2.jpg,3.jpg,11.jpg', 157, '', '2020-12-28 08:10:32', '2021-01-04 00:00:00', 7, 1),
(75, 'PHÒNG ĐẸP ĐÓN TẾT, VỀ Ở NGAY, GIÁ 5 TR', 67, '3227.jpg,0160.jpg', 157, '', '2020-12-28 08:13:17', '2021-01-04 00:00:00', 7, 1),
(76, 'Cho Thuê Căn Hộ N09B1 Dịch Vọng 100m² 2PN Full Đồ', 68, 'can-ho-penthouse.jpg,gia-can-ho-penthouse-636954288875742758.jpg,massive_l.a._penthouse_-top1197_beverlyblvd_-publicity_-_h_2019_-compressed.jpg,the-nao-nao-la-mot-can-ho-penthouse.jpg', 157, '', '2020-12-28 08:17:22', '2021-01-04 00:00:00', 7, 1),
(77, 'Chung cư Hà Đô Park View 90m² 2PN Full Đồ Nhà Đẹp', 69, 'a.jpg,b.jfif,c.jfif,d.jpg', 157, '', '2020-12-28 08:21:36', '2021-01-04 00:00:00', 7, 1),
(78, 'Chung cư Hà Đô Park View 90m² 2PN Full Đồ Đạc Đẹp', 70, '11.jpg,12 - Copy.jfif,12 - Copy.jpg,13 - Copy.jfif', 157, '', '2020-12-28 08:26:57', '2021-01-04 00:00:00', 7, 1),
(79, 'CHO THUÊ DISCOVERY 2 NGỦ ĐỦ ĐỒ ĐẸP CHỈ 14TR', 71, '66.jpg,67.jpg,68.jpeg', 157, '', '2020-12-28 08:30:50', '0000-00-00 00:00:00', 7, 0),
(80, 'Phòng trọ bình dân', 72, 'tải xuống (1).jpg,tải xuống.jpg,penthouse.jpg,nha-nuoc.jpg,download.jpg', 157, '', '2020-12-28 13:17:28', '2021-01-04 00:00:00', 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_like`
--

CREATE TABLE `room_like` (
  `id_like` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_like`
--

INSERT INTO `room_like` (`id_like`, `user_id`, `room_id`) VALUES
(101, 155, 70),
(103, 136, 80);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_pass`, `id_role`, `user_status`) VALUES
(136, 'embupbelv@gmail.com', '$2y$10$KuBUvMIcSwMoLAT79GvRZO1vI0Xfx8oBO12ZDttrogWhuIjPucSHq', 1, 1),
(154, 'huyredevil@gmail.com', '$2y$10$C6p5LiSn0FJjgvwRDRcCV.8RBs6YPVlijCzwyEO3jzj519/jRmske', 2, 1),
(155, 'huyredevil1@gmail.com', '$2y$10$RJLGOIJdGgvLqqWDDlxobueWomyZ98tztVPvFY4ElZbCVssq0dVbS', 2, 1),
(156, 'abc@gmail.com', '$2y$10$G2yPAunk/Z6MU.YoOjluuee43Xzj18Wg61onc2VX4bC2s77aSaZNq', 3, 1),
(157, 'long@gmail.com', '$2y$10$j4zRM22h9DTBzn94CQ1iyO/MJAkm4bv/KhIOnw/6ULpVoLYgTc6tK', 2, 1),
(158, 'long12345@gmail.com', '$2y$10$Z/KeWRLZYMWUf2QiHkoSdec.f/3E7bY2/6Nill7iJdy6N5Wfpr7qe', 3, 1),
(159, 'huycute@gmail.com', '$2y$10$M4RegsLes.DlFaYg2V0i8Ovi18cROHpFEbFLBjyGmBZySH7b4Kij2', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `vote_star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vote`
--

INSERT INTO `vote` (`id_vote`, `user_id`, `room_id`, `vote_star`) VALUES
(11, 157, 70, 5),
(12, 155, 70, 5),
(13, 136, 80, 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_add`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `infor`
--
ALTER TABLE `infor`
  ADD PRIMARY KEY (`infor_id`);

--
-- Chỉ mục cho bảng `info_room`
--
ALTER TABLE `info_room`
  ADD PRIMARY KEY (`id_infor`);

--
-- Chỉ mục cho bảng `rep_comment`
--
ALTER TABLE `rep_comment`
  ADD PRIMARY KEY (`rep_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Chỉ mục cho bảng `room_like`
--
ALTER TABLE `room_like`
  ADD PRIMARY KEY (`id_like`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id_add` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `info_room`
--
ALTER TABLE `info_room`
  MODIFY `id_infor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `rep_comment`
--
ALTER TABLE `rep_comment`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `room_like`
--
ALTER TABLE `room_like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
