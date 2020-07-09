-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 09 日 15:55
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d06_34`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `posts_table`
--

CREATE TABLE `posts_table` (
  `id` int(12) NOT NULL,
  `hizuke` date NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `honbun` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(12) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `posts_table`
--

INSERT INTO `posts_table` (`id`, `hizuke`, `title`, `honbun`, `img_file`, `user_id`, `updated_at`, `created_at`) VALUES
(1, '2020-07-02', 'post01', 'post01_memo', 'uploads/ae807a1af4e8f0aa94958fe27b99ce85b0584148.jpg', 1, '2020-07-09 22:35:51', '2020-07-09 22:35:51'),
(2, '2020-07-09', 'post02', 'post02_memo', 'uploads/56fee0147b271bb54e3a09fb88b7d785f297fad2.jpg', 1, '2020-07-09 22:36:52', '2020-07-09 22:36:52'),
(3, '2020-07-10', 'post03', 'post03_memo', 'uploads/85f600cabf66725ff5b6ec5469bab2d65aeba77f.jpg', 1, '2020-07-09 22:37:42', '2020-07-09 22:37:42'),
(4, '2020-07-09', 'post001', 'post001_memo', 'uploads/7c6bb7d3579a136aedff91a97897c414ff4a57b0.jpg', 5, '2020-07-09 22:42:13', '2020-07-09 22:42:13'),
(5, '2020-07-05', 'post002', 'post002_memo', 'uploads/5a32a082d2b60cfd5fa2e9808e57fd04de3b5f36.jpg', 5, '2020-07-09 22:50:57', '2020-07-09 22:50:57'),
(6, '2020-07-09', 'post01', 'post01_memoyo', 'uploads/932aa3511a80f55eada74b22703dbb9ef14b07f0.jpg', 3, '2020-07-09 22:52:12', '2020-07-09 22:52:12');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `posts_table`
--
ALTER TABLE `posts_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `posts_table`
--
ALTER TABLE `posts_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
