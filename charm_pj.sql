-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-17 10:29:40
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charm_pj`
--

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(36) NOT NULL,
  `create_time` int(10) NOT NULL,
  `last_edit_time` int(10) NOT NULL,
  `last_edit_uid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`id`, `name`, `create_time`, `last_edit_time`, `last_edit_uid`, `status`) VALUES
(5, '北京', 1500260564, 1500260682, 1, 1),
(6, '上海', 1500260676, 1500260687, 1, 1),
(8, '广州', 1500260736, 1500260736, 1, 1),
(9, '武汉', 1500262121, 1500262121, 1, 1),
(10, '深圳', 1500262136, 1500262136, 1, 1),
(11, '厦门', 1500262392, 1500262392, 1, 1),
(12, '天津', 1500262399, 1500262399, 1, 1),
(13, '杭州', 1500262413, 1500262413, 1, 1),
(14, '湖南', 1500262435, 1500262435, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(48) NOT NULL,
  `discription` varchar(64) DEFAULT NULL COMMENT '描述',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态(1启用0停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `group`
--

INSERT INTO `group` (`id`, `name`, `discription`, `create_time`, `status`) VALUES
(2, '管理员', '管理员啊2', 1499949313, 1),
(4, '测试组哈哈', '测试组哈哈', 1500163308, 1),
(5, '超管组', '超管组1', 1500163331, 1),
(6, '王大锤', '哈哈哈哈', 1500163618, 1);

-- --------------------------------------------------------

--
-- 表的结构 `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(36) NOT NULL,
  `create_time` int(10) NOT NULL,
  `last_edit_time` int(10) NOT NULL,
  `last_edit_uid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `section`
--

INSERT INTO `section` (`id`, `name`, `create_time`, `last_edit_time`, `last_edit_uid`, `status`) VALUES
(1, '测试部', 1499783827, 1500209545, 1, 1),
(2, '网络部', 1499783914, 1500209624, 1, 1),
(4, '人事部', 1500209712, 1500209877, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `section_id` tinyint(2) DEFAULT NULL,
  `group_id` tinyint(2) DEFAULT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) DEFAULT NULL,
  `login_time` int(10) DEFAULT NULL,
  `ip` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `pwd`, `section_id`, `group_id`, `create_time`, `update_time`, `login_time`, `ip`, `status`) VALUES
(1, 'admin', '$2y$10$u42K0PKJf04KUgQ9Xq9NPeJqOr9SHugKAfOmyFCqTiFDhaPHMNChe', 2, 2, 1500190776, 1500190776, NULL, NULL, 1),
(2, '测试', '$2y$10$AaMn.P5IufgJWqPFHyMyGOFnpnsbYX.pNL1NQqdgZXOFY65hPx1QG', 2, 1, 1500190931, 1500202634, NULL, NULL, 1),
(3, 'local', '$2y$10$xYiRivRPy8sZT210IgGTEeWTYmP4VTqzn2Fc5Grn48qI6e7CibWdi', 3, 2, 1500190971, 1500190971, NULL, NULL, 1),
(4, '三胖', '$2y$10$eVNy0sdyw7DHCsy5f2meYen1S4nsWZVnvfZzVzNYMmQpw.5UVCjia', 2, 2, 1500191438, 1500210382, NULL, NULL, 1),
(6, 'admin', '$2y$10$rdM2Z9t8hXv7qZ8K0WYmm.La8j7FfxOmq9wXQXtjcB4atwe/8gUny', 3, 2, 1500259529, 1500259529, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
