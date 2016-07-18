-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photographer`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `detail_al` text COLLATE utf8_unicode_ci NOT NULL,
  `fullprice` int(11) DEFAULT NULL,
  `halfprice` int(11) DEFAULT NULL,
  `type_al` text COLLATE utf8_unicode_ci,
  `url_al` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

--
-- dump ตาราง `albums`
--

INSERT INTO `albums` (`id`, `detail_al`, `fullprice`, `halfprice`, `type_al`, `url_al`, `user_id`, `created_at`, `updated_at`) VALUES
(40, 'งานฟรี นะ', NULL, NULL, 'อีเวนต์', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 3, '2016-02-18 00:41:24', '2016-04-07 21:14:40'),
(43, 'ฟรีจ้า', NULL, NULL, 'ฟรีเวดดิ้ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 2, '2016-02-18 01:58:45', '2016-03-17 08:20:29'),
(48, 'งานมโน', NULL, NULL, 'ฟรีเวดดิ้ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 13, '2016-02-27 23:04:23', '2016-03-12 01:47:57'),
(50, 'งานบวช', 500, 200, 'ฟรีเวดดิ้ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 2, '2016-02-27 23:46:05', '2016-03-05 07:24:48'),
(51, 'ขึ้นบ้านใหม่', 25000, 17000, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 14, '2016-03-01 11:18:06', '2016-03-01 11:56:27'),
(53, 'งานแต่งงาน', 500, 200, 'ฟรีเวดดิ้ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 15, '2016-03-01 11:36:16', '2016-03-01 12:04:45'),
(55, 'แต่งงานพี่สาว ', NULL, NULL, 'งานแต่ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 3, '2016-03-02 22:33:21', '2016-04-07 17:07:39'),
(58, 'ทะเล', NULL, NULL, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 12, '2016-03-02 22:58:21', '2016-03-17 08:19:44'),
(62, 'จ้างงาน', 25000, 17000, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 4, '2016-03-05 08:00:36', '2016-03-05 08:00:36'),
(65, 'ก่อนผ่าตัด', 500, 250, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 5, '2016-03-07 21:58:51', '2016-03-07 21:58:57'),
(66, 'ลองกล้องนะคะ', NULL, NULL, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 3, '2016-03-14 11:06:03', '2016-04-07 16:43:56'),
(67, ' รับปริญญา 59', NULL, NULL, 'รับปริญญา', 'hhttps://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 16, '2016-04-07 10:28:36', '2016-04-07 10:28:36'),
(68, 'หกด่หาสก่ดาสหกดหกเ', NULL, NULL, 'ฟรีเวดดิ้ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 18, '2016-04-07 10:48:52', '2016-04-07 10:49:20'),
(71, ' รับปริญญา มฟล', NULL, NULL, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 3, '2016-04-07 16:57:03', '2016-04-07 16:57:03'),
(72, 'รับงาน 59', NULL, NULL, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 19, '2016-04-07 22:44:56', '2016-04-07 22:44:56'),
(77, '123465', NULL, NULL, 'งานแต่ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 3, '2016-04-30 01:42:12', '2016-04-30 01:42:20'),
(79, 'รับปริญาญา 56', NULL, NULL, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 1, '2016-05-06 22:42:08', '2016-06-13 16:01:50'),
(80, 'ทริปแต่งงาน จ.น่าน', NULL, NULL, 'ฟรีเวดดิ้ง', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 7, '2016-06-06 13:24:42', '2016-06-06 13:24:42'),
(81, 'ขึ้นบ้านใหม่', NULL, NULL, 'รับปริญญา', 'https://www.facebook.com/natthawut.jantapoon/media_set?set=a.123701564348459.26942.100001258483518&type=3', 17, '2016-06-13 22:04:55', '2016-06-13 22:04:55');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `morning` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `afternoon` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `evening` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `allDay` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=123 ;

--
-- dump ตาราง `evenement`
--

INSERT INTO `evenement` (`id`, `title`, `user_id`, `start`, `end`, `morning`, `afternoon`, `evening`, `url`, `allDay`, `created_at`, `updated_at`) VALUES
(68, 'ไม่ว่างนะค่ะ', 3, '0000-00-00', '0000-00-00', 'ช่วงเช้า', NULL, NULL, '/editcalendar68', 'false', '2016-03-23 10:25:11', '2016-03-23 10:25:11'),
(69, 'ติดแฟน', 2, '2016-03-02', '2016-03-07', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar69', 'false', '2016-03-23 10:28:37', '2016-03-31 03:03:29'),
(71, 'ไปญี่ปุ่น', 3, '2016-03-02', '2016-03-01', 'ช่วงเช้า', NULL, NULL, '/editcalendar71', 'false', '2016-03-23 22:56:15', '2016-03-31 02:58:10'),
(74, 'ติดธุระจ๋าาาา', 3, '2016-04-05', '2016-04-08', 'ช่วงเช้า', 'ช่วงบ่าย', NULL, '/editcalendar74', 'false', '2016-04-05 08:45:03', '2016-04-07 12:28:15'),
(75, 'สงกานต์ ไม่รับงานคะ', 3, '2016-04-10', '2016-04-16', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar75', 'false', '2016-04-06 12:44:54', '2016-04-06 12:44:55'),
(76, 'ืทดสอบ', 15, '2016-04-07', '2016-04-08', 'ช่วงเช้า', 'ช่วงบ่าย', NULL, '/editcalendar76', 'false', '2016-04-07 07:31:16', '2016-04-07 07:31:16'),
(77, 'ติว ๆ ๆๆ', 15, '2016-04-09', '2016-04-10', 'ช่วงเช้า', NULL, NULL, '/editcalendar77', 'false', '2016-04-07 07:31:30', '2016-04-07 07:31:30'),
(78, 'สอบสอบอสบ', 15, '2016-04-11', '2016-04-14', NULL, NULL, 'ช่วงเย็น', '/editcalendar78', 'false', '2016-04-07 07:31:45', '2016-04-07 07:31:45'),
(79, 'สงกราน', 15, '2016-04-13', '2016-04-15', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar79', 'false', '2016-04-07 07:31:58', '2016-04-07 07:31:59'),
(80, 'รับงาน มฟล', 16, '2016-04-07', '2016-04-10', 'ช่วงเช้า', 'ช่วงบ่าย', NULL, '/editcalendar80', 'false', '2016-04-07 10:29:31', '2016-04-07 10:29:31'),
(81, 'รับงาน ถ่ายภาพหกดหกดหเหเกห', 18, '2016-04-07', '2016-04-15', 'ช่วงเช้า', NULL, NULL, '/editcalendar81', 'false', '2016-04-07 10:50:17', '2016-04-07 10:50:33'),
(89, 'รับปริญญา 59v dsdssdf', 19, '2016-04-08', '2016-04-10', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar89', 'false', '2016-04-07 22:44:05', '2016-04-07 22:44:18'),
(90, 'งานฟรีครับบ', 3, '2016-05-01', '2016-05-06', 'ช่วงเช้า', NULL, 'ช่วงเย็น', '/editcalendar90', 'false', '2016-04-30 01:09:55', '2016-04-30 01:59:33'),
(91, 'ลาบวช', 2, '2016-05-01', '2016-05-04', NULL, 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar91', 'false', '2016-04-30 02:01:27', '2016-04-30 02:01:27'),
(96, 'วันเกิดแฟนครับ!!', 7, '2016-06-08', '2016-06-08', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar96', 'false', '2016-06-06 13:19:18', '2016-06-06 13:19:18'),
(111, 'บวช', 15, '2016-06-10', '2016-06-12', 'ช่วงเช้า', NULL, NULL, '/editcalendar111', 'false', '2016-06-10 04:16:07', '2016-06-10 04:16:07'),
(116, 'ไปงานลำใย', 2, '2016-06-13', '2016-06-15', 'ช่วงเช้า', 'ช่วงบ่าย', NULL, '/editcalendar116', 'false', '2016-06-10 07:42:39', '2016-06-10 07:49:03'),
(121, 'งานบวชเด้อ ', 1, '2016-06-19', '2016-06-21', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar121', 'false', '2016-06-14 00:25:55', '2016-06-14 00:25:55'),
(122, 'ไปฝึกงาน', 1, '2016-06-30', '2016-06-30', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '/editcalendar122', 'false', '2016-06-23 10:07:42', '2016-06-23 03:07:43');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_02_02_074539_create_albums_table', 1),
('2016_02_02_080009_crate_photographers_table', 1),
('2016_02_02_081013_photographers_albums_relationship', 1),
('2016_02_02_084033_create_sections_table', 1),
('2016_02_16_072249_create_books_table', 2);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('manchesterunit_mypao@hotmail.com', '588c762a15d8eae9ece1033db86dd004afa6c208574fd4199b627755ef028b92', '2016-02-18 00:26:14');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `photographers_albums_relationship`
--

CREATE TABLE IF NOT EXISTS `photographers_albums_relationship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photographer_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkreques` int(1) NOT NULL,
  `checkview` int(1) NOT NULL,
  `facebook_id` int(25) NOT NULL,
  `facebook_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_facebook` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail_request` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `title` varchar(125) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `morning` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `afternoon` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `evening` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=289 ;

--
-- dump ตาราง `requests`
--

INSERT INTO `requests` (`id`, `checkreques`, `checkview`, `facebook_id`, `facebook_email`, `facebook_avatar`, `name_facebook`, `user_id`, `name_user`, `detail_request`, `url`, `start`, `end`, `title`, `morning`, `afternoon`, `evening`, `created_at`, `updated_at`) VALUES
(284, 3, 0, 21, 'noo_praew.naluk@hotmail.com', 'https://graph.facebook.com/v2.6/932740806813780/picture?type=normal', 'Anutra Atiyut', 1, 'วันเฉลิม กันทะวงค์', 'เช้า', '/seeinfo284', '2016-07-24', NULL, 'Anutra', 'ช่วงเช้า', NULL, NULL, '2016-07-16 11:35:17', '2016-07-16 04:59:09'),
(285, 1, 1, 21, 'noo_praew.naluk@hotmail.com', 'https://graph.facebook.com/v2.6/932740806813780/picture?type=normal', 'Anutra Atiyut', 1, 'วันเฉลิม กันทะวงค์', 'บ่าย', '/seeinfo285', '2016-07-25', NULL, 'Anutra', NULL, 'ช่วงบ่าย', NULL, '2016-07-16 11:36:05', '2016-07-18 07:08:51'),
(286, 1, 1, 21, 'noo_praew.naluk@hotmail.com', 'https://graph.facebook.com/v2.6/932740806813780/picture?type=normal', 'Anutra Atiyut', 1, 'วันเฉลิม กันทะวงค์', 'เย็น', '/seeinfo286', '2016-07-26', NULL, 'Anutra', NULL, NULL, 'ช่วงเย็น', '2016-07-16 11:36:25', '2016-07-18 07:36:57'),
(287, 3, 0, 21, 'noo_praew.naluk@hotmail.com', 'https://graph.facebook.com/v2.6/932740806813780/picture?type=normal', 'Anutra Atiyut', 1, 'วันเฉลิม กันทะวงค์', 'เต็มวัน', '/seeinfo287', '2016-07-17', NULL, 'Anutra', 'ช่วงเช้า', 'ช่วงบ่าย', 'ช่วงเย็น', '2016-07-16 11:36:53', '2016-07-18 05:11:23'),
(288, 1, 1, 1, 'manchesterunit_mypao@hotmail.com', 'https://graph.facebook.com/v2.6/1029522760431519/picture?type=normal', 'Wanchalerm Kunthawong', 1, 'วันเฉลิม กันทะวงค์', 'เช้า', '/seeinfo288', '2016-07-24', NULL, 'Wanchalerm', NULL, 'ช่วงบ่าย', NULL, '2016-07-16 11:45:28', '2016-07-18 05:10:01');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` int(11) NOT NULL,
  `name_user` text COLLATE utf8_unicode_ci NOT NULL,
  `like` int(11) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `replycomment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `facebook_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_facebook` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- dump ตาราง `review`
--

INSERT INTO `review` (`id`, `facebook_id`, `name_user`, `like`, `detail`, `replycomment`, `created_at`, `updated_at`, `user_id`, `facebook_email`, `name_facebook`) VALUES
(29, 1, 'วันเฉลิม กันทะวงค์', 1, 'ถ่ายภาพดีมากเลยครับ', 'ขอบคุณครับ', '2016-07-19 14:05:49', '2016-07-18 14:05:49', 1, 'manchesterunit_mypao@hotmail.com', 'Wanchalerm Kunthawong'),
(30, 21, 'วันเฉลิม กันทะวงค์', 2, '  ห่วยมากกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก', '', '2016-07-18 14:25:07', '2016-07-18 14:25:07', 1, 'noo_praew.naluk@hotmail.com', 'Anutra Atiyut');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'photographer',
  `addres` text COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullprice` int(11) DEFAULT NULL,
  `halfprice` int(11) DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `status`, `addres`, `website`, `email`, `phonenumber`, `fullprice`, `halfprice`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'เปาเองจะใครละ.jpg', 'วันเฉลิม กันทะวงค์', 'admin', 'มหาลัยพะเยา', 'https://www.facebook.com/nocaffeine.mypao', 'manchesterunit_mypao@hotmail.com', '0815326477', 2000, 1000, '$2y$10$63JbfgNfDDe8Nw4KSrprpuqy2a6RUTUxf2aJA3ZK7PvNQWOxkYrmy', 'oW7JSQJQHz0vUa1o3Nqmue8cchiJOWmGXd0S8sZxP8fSnz1rQ8mvkKyMxaMz', '2016-02-09 01:07:59', '2016-06-13 17:36:24'),
(2, '1.jpg', 'สุภิสิทธิ์ ไข่กา', 'admin', 'พะเยา', 'https://www.facebook/BIo-C', 'wanchalermkiki@gmail.com', '996420233', 3000, 1500, '$2y$10$HLYpGwnrk5LPlRg9faLrq.cWa4DckDaWOZJhNVZKviDYkXw1elwwa', 'bKRAmLQoXyptkDrKpwGWLlA3UeBoYmAf21AJMXG9FBcH5DZ0PA2bRX5gKXjA', '2016-02-08 10:05:28', '2016-07-18 05:09:44'),
(4, '3.jpg', 'เอกชัย บุญเรือง', 'photographer', '44/5 บ้านโป้ง อ.เมือง จ.สงขลา', 'https://www.facebook.com/natthawut.jantapoon', 'aek123@gmail.com', '54420292', 300, 150, '$2y$10$QZ.OqredT1F/43jSX/K7zOxr5C4fDn9qkWelZmnkmEo5dey8CjUle', 'YFef1R8NW4SEyx5HoDcYhCBL9GVpnAR4TR6MtaYwDydCZ9sfTMaU6HqJuU2t', '2016-02-09 01:14:26', '2016-06-13 14:50:01'),
(5, '4.jpg', 'อาทิตย์ ถาตุ่ม', 'ban', 'วัดแม่กา', 'https://www.facebook/supiya', 'admin@gmail.com', '998452144', 3000, 1500, '$2y$10$a5sLTMM/MzFQM6VeQEaW1.mswR2HH7WVoUz6XYBiW1wOGnrpU7n5K', '5DLRP88m508SvxeLFk3FI9XXRzUPD52BhORV4cMhkaFitKDc5OP0w0sGCmm5', '2016-02-09 02:02:10', '2016-07-16 08:10:54'),
(7, 'อยากรวย.jpg', 'ณัฐวุฒิ จันทาพูน', 'photographer', 'มหาลัยพะเยา', 'https://www.facebook.com/อยากรวย', 'Pao@gmail.com', '0845126411', 2500, 1500, '$2y$10$hTFaF3OryO82RGqvB9cdYekTMTlacLDhtGyZT2yBwYYj.x7A2gMO2', 'aNIzs97vZZl5VIJXW6ySgaxOfHL8RlldGAGEeuidp2o11yeAu3d7QuO1xIEI', '2016-02-09 12:06:21', '2016-06-13 14:46:41'),
(12, '6.jpg', 'สยามรัก แก้วตา', 'photographer', 'มหาลัยพะเยา', 'https://www.facebook/Mong', '123@gmail.com', '815312644', 1500, 750, '$2y$10$LdvXHqwo0Oe4YXjKGlS8Oeom3KG5mUiY75p.cHCX7C.pd0d9bAmiy', 'qljl66Ym2HHYEyP6p6k9VCuAUkFkBdmcmncByzJdlYv8pB3w2EQ9m3BVl8ns', '2016-02-16 02:40:16', '2016-06-10 09:01:29'),
(13, '7.jpg', 'ปฏิพล ปันยวง', 'photographer', 'ึ74 ม.1 จ.เชียงราย', 'https://www.facebook.com/NxTaPon?fref=nf', 'testter@gmail.com', '32652144', 1000, 500, '$2y$10$vQqBNavLPoHfYUKZm/zeJujPEKjfVehF7ec1cNvs5KXRMsA38siG.', 'M9WYGbbZeoCBdY8iDUkLq1oFrCDLoCRwnczcvReRX0WaOGXFBjQRKOm73cs8', '2016-03-02 08:37:04', '2016-06-12 21:08:37'),
(14, '8.jpg', 'ตุ๊กตา พารวย', 'photographer', '55/1 อ.เขียงแสน', 'https://www.facebook/Volume', 'za@gmail.com', '854792100', 500, 250, '$2y$10$rOsFb5bMdboxoi8TTMf9nOrE5ltJeIvLhHCy/vcSrDBwo3KBCvsSS', 'M20YbhFsW54Ewq1E6rub86Yk9XgtyPFAhKX2yxl4YdztOKvvS9li1d5ydQE9', '2016-04-07 05:26:31', '2016-06-10 18:02:14'),
(15, '9.jpg', 'อนุชา พันเพียง', 'admin', '474/5 อ.แม่สาย จ.เชียงราย', 'https://www.facebook.com/nocaffeine.mypao', 'keachai191@hotmail.com', '954488122', 4000, 2100, '$2y$10$5lNYK4MifjB46FSI/fvmbuGIN469aMCxBs1i5UaTJ0NVt3lq9h2by', 'yfzE1rVruznKt3YttoRv3VWYYrjMm09afbllHVttibHSXVziFE6OIgbpDQuB', '2016-04-07 07:30:40', '2016-06-10 04:16:32'),
(16, 'test.jpg', 'กรรนิกา ทาแกง', 'ban', '22/1 อ.เมือง จ.เชียงใหม่', 'https://www.facebook.com/common', '555@gmail.com', '81532644', 5000, 2500, '$2y$10$r2c0pNGGU3Q5oZaCYciP.Ot.qyKkc2BF6/aX/IsawbDIbE3hibHC2', '7427P3cfGKAzn3ACx9Z2LPfQ2XN5dktBVYI2DlvMnBRZHZ6WSdzbIM9LsJRQ', '2016-04-07 10:25:31', '2016-06-13 06:17:53'),
(17, 'นายจตุพร กันทะวงค์ .jpg', 'นายจตุพร กันทะวงค์ ', 'photographer', 'หมู่ 2 ถ.ตาเรื่องศร อ.เมือง จ.น่าน', 'https://www.facebook.com/จตุพร', 'jatupont@gmail.com', '0824598766', 2000, 1200, '$2y$10$0KeP9tNoWQ6MF/9UZuxPjezH7bqZRjozR2kuxgl/zHK2gKQY5/VL.', 'Tahd2WKPwkTQIRmA0RzG0zqCFDyZyVOcQnJrard5W59oap1uCBrIM9u84Olq', '2016-06-13 21:39:53', '2016-06-13 22:16:31');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users_facebook`
--

CREATE TABLE IF NOT EXISTS `users_facebook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(12) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `idfacebook` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `social` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=23 ;

--
-- dump ตาราง `users_facebook`
--

INSERT INTO `users_facebook` (`id`, `status`, `idfacebook`, `username`, `social`, `avatar`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'userfacebook', '1029522760431519', '1029522760431519', 'facebook', 'https://graph.facebook.com/v2.6/1029522760431519/picture?type=normal', 'Wanchalerm Kunthawong', 'manchesterunit_mypao@hotmail.com', '2016-06-10 11:25:40', '2016-06-14 01:48:30'),
(8, 'ban', '1046958598689413', '1046958598689413', 'facebook', 'https://graph.facebook.com/v2.5/1046958598689413/picture?type=normal', 'Natthawut Jantapoon', 'davilbm_9@hotmail.com', '2016-04-18 08:06:11', '2016-06-13 06:12:29'),
(17, 'userfacebook', '537240729811135', '537240729811135', 'facebook', 'https://graph.facebook.com/v2.6/537240729811135/picture?type=normal', 'Suphisit View Punnari', 'suphisit1@gmail.com', '2016-04-26 08:24:54', '2016-04-26 08:24:54'),
(18, 'userfacebook', '925130384221600', '925130384221600', 'facebook', 'https://graph.facebook.com/v2.6/925130384221600/picture?type=normal', 'เอ ก.', 'thaigame-hacker@hotmail.com', '2016-04-26 20:27:04', '2016-06-13 06:37:32'),
(21, 'userfacebook', '932740806813780', '932740806813780', 'facebook', 'https://graph.facebook.com/v2.6/932740806813780/picture?type=normal', 'Anutra Atiyut', 'noo_praew.naluk@hotmail.com', '2016-06-13 18:27:08', '2016-06-13 18:27:08'),
(22, 'userfacebook', '823483917762336', '823483917762336', 'facebook', 'https://graph.facebook.com/v2.6/823483917762336/picture?type=normal', 'เพียวริคุ เก๊กฮวยขาว', NULL, '2016-06-14 01:42:00', '2016-06-14 01:42:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
