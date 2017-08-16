-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-16 01:38:29
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
(14, '重庆', 1500262435, 1501041487, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `domain`
--

CREATE TABLE `domain` (
  `id` int(11) UNSIGNED NOT NULL,
  `domain` varchar(36) NOT NULL COMMENT '域名',
  `url` varchar(36) NOT NULL,
  `create_uid` int(11) NOT NULL COMMENT '创建者ID',
  `create_time` int(10) NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='域名管理';

--
-- 转存表中的数据 `domain`
--

INSERT INTO `domain` (`id`, `domain`, `url`, `create_uid`, `create_time`) VALUES
(1, '百度', 'www.baidu.com', 1, 1500467645),
(2, '搜狐', 'www.sohu.com', 1, 1500467666),
(4, '雅虎', 'yahuu.com', 1, 1500564885),
(5, '新浪', 'sina.com', 1, 1500565846),
(6, '命中水', 'cxiansheng.cn', 1, 1500565869),
(7, 'charm测试', 'charmpjtest.com', 1, 1502195646),
(8, 'test.wjlc.co', 'test.wjlc.co', 1, 1502721634),
(9, 'test.huashunglass.com', 'test.huashunglass.com', 1, 1502722424);

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
(2, '管理员', '超级管理员', 1499949313, 1),
(4, '优化经理', '优化经理', 1500163308, 1),
(5, '优化师', '优化师', 1500163331, 1),
(6, '销售', '销售', 1500163618, 1);

-- --------------------------------------------------------

--
-- 表的结构 `groupmenu`
--

CREATE TABLE `groupmenu` (
  `group_id` int(11) NOT NULL COMMENT '权限ID',
  `menu_id` int(11) NOT NULL COMMENT '菜单ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `groupmenu`
--

INSERT INTO `groupmenu` (`group_id`, `menu_id`) VALUES
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(4, 8),
(4, 9),
(5, 8),
(5, 9),
(6, 8),
(6, 9);

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE `link` (
  `id` int(11) UNSIGNED NOT NULL,
  `leading_uid` int(11) DEFAULT NULL COMMENT '负责人ID',
  `domain_id` varchar(36) NOT NULL COMMENT '域名',
  `orginal_link` varchar(128) NOT NULL COMMENT '原始链接',
  `referral_link` varchar(128) DEFAULT NULL COMMENT '推广链接',
  `audit_link` varchar(128) DEFAULT NULL COMMENT '审核链接',
  `creat_uid` int(11) NOT NULL COMMENT '创建者ID',
  `creat_time` int(10) NOT NULL COMMENT '创建时间',
  `last_edit_uid` int(11) NOT NULL,
  `last_edit_time` int(10) NOT NULL,
  `is_pass` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='链接跳转表';

--
-- 转存表中的数据 `link`
--

INSERT INTO `link` (`id`, `leading_uid`, `domain_id`, `orginal_link`, `referral_link`, `audit_link`, `creat_uid`, `creat_time`, `last_edit_uid`, `last_edit_time`, `is_pass`) VALUES
(2, 1, '1', '1.php', '3s.php', '2.php', 1, 1500470227, 1, 1502197824, 0),
(3, 2, '1', '1.hp', '3.php', '2t.php', 1, 1500470320, 1, 1500994326, 0),
(4, 2, '1', '1.php', '3.php', '2.php', 1, 1500470387, 1, 1501047993, 0),
(5, 2, '1', 'test.php', 'test.php', 'test.php', 1, 1500556009, 1, 1500559216, 0),
(6, 1, '2', 'souhu.php', 'souhutuiguang.php', 'souhushenhe.php', 1, 1500992201, 6, 1502791663, 1),
(7, 4, '7', 'origin', 'baidu.com', 'approl', 1, 1502195711, 6, 1502791721, 0),
(8, 3, '8', 'origin', 'sohu.com', 'origin', 1, 1502721736, 6, 1502791628, 0),
(9, 2, '9', 'test', 'sina.com', 'test', 1, 1502722448, 6, 1502791640, 0),
(10, 4, '9', 't1.php', 'https://www.aliyun.com/', 'http://www.baidu.com/', 6, 1502761567, 6, 1502791682, 0);

-- --------------------------------------------------------

--
-- 表的结构 `link_address`
--

CREATE TABLE `link_address` (
  `link_id` int(11) NOT NULL COMMENT '链接ID',
  `address_id` int(11) NOT NULL COMMENT '地区ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='链接屏蔽地区';

--
-- 转存表中的数据 `link_address`
--

INSERT INTO `link_address` (`link_id`, `address_id`) VALUES
(5, 5),
(5, 8),
(5, 10),
(5, 12),
(3, 8),
(4, 5),
(4, 6),
(4, 10),
(4, 12),
(4, 14),
(2, 5),
(2, 6),
(8, 10),
(9, 8),
(9, 10),
(6, 10),
(6, 12),
(10, 5),
(7, 8),
(7, 10),
(7, 11);

-- --------------------------------------------------------

--
-- 表的结构 `link_content`
--

CREATE TABLE `link_content` (
  `id` int(11) UNSIGNED NOT NULL,
  `link_id` int(11) NOT NULL COMMENT '链接ID',
  `title` varchar(256) DEFAULT NULL COMMENT '标题',
  `display_page` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0默认显示全部信息1只显示产品简介',
  `price` float(10,2) DEFAULT NULL COMMENT '价格',
  `buy_count` int(11) DEFAULT NULL COMMENT '购买数量',
  `discount` float(4,1) DEFAULT '1.0' COMMENT '折扣',
  `end_time` varchar(36) DEFAULT NULL COMMENT '结束时间',
  `company_name` varchar(64) DEFAULT NULL COMMENT '公司名称',
  `icp` varchar(64) DEFAULT NULL,
  `phone` varchar(24) DEFAULT NULL COMMENT '电话',
  `wechat` varchar(36) DEFAULT NULL COMMENT '微信号',
  `main_image` text COMMENT '产品主图',
  `process` text COMMENT '购买流程',
  `description` text COMMENT '简介',
  `reply` text COMMENT '客户留言',
  `is_show_time` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示时间',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='链接内容';

--
-- 转存表中的数据 `link_content`
--

INSERT INTO `link_content` (`id`, `link_id`, `title`, `display_page`, `price`, `buy_count`, `discount`, `end_time`, `company_name`, `icp`, `phone`, `wechat`, `main_image`, `process`, `description`, `reply`, `is_show_time`, `create_time`, `update_time`) VALUES
(1, 2, '测试', 0, 174.50, 156, 6.7, '2017-06-11 20:41:36', '福田2', 'icp123123', '123123123', 'wechat', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170728/1501246866.jpg&quot; title=&quot;1501246866.jpg&quot; alt=&quot;6363478936865030373830353.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;./ueditor/php/upload/image/20170728/1501248671.jpg&quot; title=&quot;1501248671.jpg&quot; alt=&quot;2uucyj1vlhyvjjr2779.jpg&quot;/&gt;&lt;/p&gt;', '&lt;p&gt;1、先经过什么&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2、再经过什么&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;3、好了些吗&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;很好用啊这个&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;很好啊&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 0, 1501165179, 1501248866),
(2, 7, 'charm测试页面', 0, 98.90, 1000, 0.9, '2017-10-11 20:41:36', 'charm公司', 'charm0987723', '8786-2837822', 'wechat-charm', '&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/resource/images/20170808/1502195806.jpg&quot; title=&quot;1502195806.jpg&quot; alt=&quot;6363478936865030373830353.jpg&quot; width=&quot;632&quot; height=&quot;729&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;1.这个&amp;nbsp;&lt;img src=&quot;/resource/images/20170814/1502720577.jpg&quot; title=&quot;1502720577.jpg&quot; alt=&quot;2uucyj1vlhyvjjr2779.jpg&quot;/&gt;&lt;/p&gt;', '&lt;p&gt;好用&lt;/p&gt;', '&lt;p&gt;baidu.com&lt;/p&gt;', 1, 1502195843, 1502721002),
(3, 8, 'test.wjlc.co测试', 1, 99.00, 998, 0.8, '2017-09-13 20:34:54', 'test.wjlc.co公司', 'test.wjlc.co-icp-8786656', '8786656', 'wechat-test.wjlc.co', '&lt;img src=&quot;/resource/images/20170814/1502722091658824.jpg&quot; title=&quot;1502722091658824.jpg&quot; alt=&quot;coser3.jpg&quot;/&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;爱一个人时间长了，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;好像是忘掉了别的东西，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;心里只有他，&lt;/strong&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(36, 36, 31);&quot;&gt;&lt;/span&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;仿佛自己单机一样，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;单机而已，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;无需缅怀，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;都是付出过的，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;谁也不欠谁的，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;你真的是那些年月里最烈的酒，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;我是真的真的认真醉过&lt;/strong&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;爱一个人时间长了，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;好像是忘掉了别的东西，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;心里只有他，&lt;/strong&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(36, 36, 31);&quot;&gt;&lt;/span&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;仿佛自己单机一样，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;单机而已，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;无需缅怀，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;都是付出过的，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;谁也不欠谁的，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;你真的是那些年月里最烈的酒，&lt;/strong&gt;&lt;br/&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; border: none; outline: none; font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 18pt; color: rgb(178, 178, 178); white-space: normal;&quot;&gt;我是真的真的认真醉过&lt;/strong&gt;&lt;/p&gt;', '', 1, 1502722173, 1502722173),
(4, 9, 'test.huashung.com测试游戏类', 0, 187.00, 187, 1.0, '2017-08-28 20:34:54', 'test.huashung.com公司', 'test.huashung.com-icp-0077', '7872-9897823', 'wecha-223', '&lt;p&gt;&lt;img src=&quot;/resource/images/20170814/1502722523832324.jpg&quot; title=&quot;1502722523832324.jpg&quot; alt=&quot;coser2.jpg&quot;/&gt;&lt;/p&gt;', '&lt;p&gt;&lt;img src=&quot;/resource/images/20170814/1502722536354656.jpg&quot; title=&quot;1502722536354656.jpg&quot; alt=&quot;coser1.jpg&quot; width=&quot;118&quot; height=&quot;100&quot;/&gt;&lt;/p&gt;', '&lt;p&gt;&lt;span style=&quot;color: rgb(36, 36, 31); font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 26.6667px;&quot;&gt;时间慢慢地带走了本不该留下的，我已经快要想不起来你笑起来的样子，你穿的什么衣服牵着谁的手，突然难过了。我知道自己喜欢你，但我不知道将来在哪，因为我知道，无论在哪里，你都不会带我去，而记忆打亮你的微笑，要如此用力才变得欢喜。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(36, 36, 31); font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 26.6667px;&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(36, 36, 31); font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 26.6667px;&quot;&gt;&lt;span style=&quot;color: rgb(36, 36, 31); font-family: Arial, &amp;#39;Microsoft Sans Serif&amp;#39;, &amp;#39;Lucida Sans Unicode&amp;#39;; font-size: 12px; line-height: 26.6667px;&quot;&gt;欢迎关注我个人的微信公众号：记忆杂货铺&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '&lt;p&gt;sina.com&lt;/p&gt;', 1, 1502722590, 1502722590);

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(48) NOT NULL,
  `url` varchar(64) DEFAULT NULL,
  `class` varchar(32) DEFAULT NULL COMMENT '样式',
  `pid` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='菜单';

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `class`, `pid`, `status`) VALUES
(1, '账号管理', '', NULL, 0, 1),
(2, '链接管理', NULL, NULL, 0, 1),
(3, '地区管理', NULL, '', 0, 1),
(4, '部门管理', NULL, '', 0, 1),
(5, '域名管理', NULL, '', 0, 1),
(6, '权限管理', 'group/index', 'icon-group', 1, 1),
(7, '用户管理', 'user/index', 'icon-user', 1, 1),
(8, '链接跳转', 'link/skip', 'icon-skip', 2, 1),
(9, '链接内容', 'link/link', 'icon-link', 2, 1),
(10, '屏蔽地区', 'address/index', 'icon-address', 3, 1),
(11, '部门', 'section/index', 'icon-section', 4, 1),
(12, '域名', 'domain/index', 'icon-domain', 5, 1);

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
(1, '管理员', 1499783827, 1501041589, 1, 1),
(2, '扶翼', 1499783914, 1501041419, 1, 1),
(4, '陌陌', 1500209712, 1501041430, 1, 1),
(5, '电商', 1501041440, 1501041440, 1, 1),
(6, 'TSA', 1501041446, 1501041446, 1, 1),
(7, 'KA', 1501041450, 1501041450, 1, 1),
(8, '微博', 1501041596, 1501041596, 1, 1);

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
(1, 'admin', '$2y$10$Yhis6.Ph76n1StRMFv/cqeOlwyFRwmpTKLCP0yhdMYvy.wDErcapm', 1, 2, 1500190776, 1501041620, 1502807511, '220.112.17.231', 1),
(2, '张总', '$2y$10$irrwAcryVSSzgsLYcabPOeF/4Y6DEjy/QuvYsux9JPa4Q3vllOeQC', 2, 4, 1500190931, 1501047879, 1502791772, '116.25.96.214', 1),
(3, '小刘', '$2y$10$VQIJ2MdM3KnvlEYOC5ZWYOlw9vWBiS29TF.B86F7sUlrcs7jP67pm', 2, 5, 1500190971, 1501047909, 1502791737, '116.25.98.210', 1),
(4, '小夏', '$2y$10$SaAM883JuAFpia5LFI51V.3lYcs5LPvccjU1LDFBD5QaXkXBqLDJy', 2, 6, 1500191438, 1501047944, 1502791756, '116.25.98.210', 1),
(6, 'test', '$2y$10$J6/CuDghuICeXjHOpJey2e0SRW40JpsBGbNj77Fg4DVQbQaTfGmu.', 2, 2, 1500259529, 1501041787, 1502847284, '127.0.0.1', 1),
(7, '小周', '$2y$10$YJJ5TsHES6ecO0EeY5C9/eiehXSkDrZvjVewAB74MV.CN8MjopAJS', 2, 5, 1501048187, 1501048187, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_content`
--
ALTER TABLE `link_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- 使用表AUTO_INCREMENT `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `link_content`
--
ALTER TABLE `link_content`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
