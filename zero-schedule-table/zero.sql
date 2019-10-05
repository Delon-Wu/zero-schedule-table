-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-10-05 15:52:52
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `zero`
--

-- --------------------------------------------------------

--
-- 表的结构 `account1`
--

CREATE TABLE `account1` (
  `id` int(20) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `account1`
--

INSERT INTO `account1` (`id`, `nickname`, `email`, `password`) VALUES
(1, '402', '402@qq.com', '9174e5b543aa4e8fdc07cc9dae7b5c80'),
(2, '捉星星的比比', '181160130@qq.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, '霄物', '161100071@qq.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `courses`
--

CREATE TABLE `courses` (
  `Mon` text NOT NULL,
  `Tue` text NOT NULL,
  `Wed` text NOT NULL,
  `Thur` text NOT NULL,
  `Fri` text NOT NULL,
  `Sat` text NOT NULL,
  `Sun` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户来记录用户的课程表';

--
-- 转存表中的数据 `courses`
--

INSERT INTO `courses` (`Mon`, `Tue`, `Wed`, `Thur`, `Fri`, `Sat`, `Sun`, `email`) VALUES
('[\"a-1\",\"a-2\",\"a-3\"]', '[\"b-3\",\"b-4\",\"b-5\"]', '[\"c-6\",\"c-7\"]', '[\"d-7\",\"d-8\"]', '[\"e-7\",\"e-8\"]', '[\"f-9\",\"f-10\"]', '[\"g-10\"]', '181160130@qq.com'),
('[\"a-11\"]', '[\"b-9\"]', '[\"c-9\",\"c-10\"]', '[\"d-10\",\"d-11\"]', '[\"e-11\"]', 'null ', 'null ', '161100071@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `nickname` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `account1`
--
ALTER TABLE `account1`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `account1`
--
ALTER TABLE `account1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
