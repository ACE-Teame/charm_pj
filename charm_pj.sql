/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : charm_pj

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-08 21:57:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `address`
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) NOT NULL,
  `create_time` int(10) NOT NULL,
  `last_edit_time` int(10) NOT NULL,
  `last_edit_uid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('5', '北京', '1500260564', '1500260682', '1', '1');
INSERT INTO `address` VALUES ('6', '上海', '1500260676', '1500260687', '1', '1');
INSERT INTO `address` VALUES ('8', '广州', '1500260736', '1500260736', '1', '1');
INSERT INTO `address` VALUES ('9', '武汉', '1500262121', '1500262121', '1', '1');
INSERT INTO `address` VALUES ('10', '深圳', '1500262136', '1500262136', '1', '1');
INSERT INTO `address` VALUES ('11', '厦门', '1500262392', '1500262392', '1', '1');
INSERT INTO `address` VALUES ('12', '天津', '1500262399', '1500262399', '1', '1');
INSERT INTO `address` VALUES ('13', '杭州', '1500262413', '1500262413', '1', '1');
INSERT INTO `address` VALUES ('14', '重庆', '1500262435', '1501041487', '1', '1');

-- ----------------------------
-- Table structure for `domain`
-- ----------------------------
DROP TABLE IF EXISTS `domain`;
CREATE TABLE `domain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(36) NOT NULL COMMENT '域名',
  `url` varchar(36) NOT NULL,
  `create_uid` int(11) NOT NULL COMMENT '创建者ID',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='域名管理';

-- ----------------------------
-- Records of domain
-- ----------------------------
INSERT INTO `domain` VALUES ('1', '百度', 'www.baidu.com', '1', '1500467645');
INSERT INTO `domain` VALUES ('2', '搜狐', 'www.sohu.com', '1', '1500467666');
INSERT INTO `domain` VALUES ('4', '雅虎', 'yahuu.com', '1', '1500564885');
INSERT INTO `domain` VALUES ('5', '新浪', 'sina.com', '1', '1500565846');
INSERT INTO `domain` VALUES ('6', '命中水', 'cxiansheng.cn', '1', '1500565869');
INSERT INTO `domain` VALUES ('7', 'charm测试', 'charmpjtest.com', '1', '1502195646');

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL,
  `discription` varchar(64) DEFAULT NULL COMMENT '描述',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态(1启用0停用)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('2', '管理员', '超级管理员', '1499949313', '1');
INSERT INTO `group` VALUES ('4', '优化经理', '优化经理', '1500163308', '1');
INSERT INTO `group` VALUES ('5', '优化师', '优化师', '1500163331', '1');
INSERT INTO `group` VALUES ('6', '销售', '销售', '1500163618', '1');

-- ----------------------------
-- Table structure for `groupmenu`
-- ----------------------------
DROP TABLE IF EXISTS `groupmenu`;
CREATE TABLE `groupmenu` (
  `group_id` int(11) NOT NULL COMMENT '权限ID',
  `menu_id` int(11) NOT NULL COMMENT '菜单ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groupmenu
-- ----------------------------
INSERT INTO `groupmenu` VALUES ('2', '6');
INSERT INTO `groupmenu` VALUES ('2', '7');
INSERT INTO `groupmenu` VALUES ('2', '8');
INSERT INTO `groupmenu` VALUES ('2', '9');
INSERT INTO `groupmenu` VALUES ('2', '10');
INSERT INTO `groupmenu` VALUES ('2', '11');
INSERT INTO `groupmenu` VALUES ('2', '12');
INSERT INTO `groupmenu` VALUES ('4', '8');
INSERT INTO `groupmenu` VALUES ('4', '9');
INSERT INTO `groupmenu` VALUES ('5', '8');
INSERT INTO `groupmenu` VALUES ('5', '9');
INSERT INTO `groupmenu` VALUES ('6', '8');
INSERT INTO `groupmenu` VALUES ('6', '9');

-- ----------------------------
-- Table structure for `link`
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `leading_uid` int(11) DEFAULT NULL COMMENT '负责人ID',
  `domain_id` varchar(36) NOT NULL COMMENT '域名',
  `orginal_link` varchar(128) NOT NULL COMMENT '原始链接',
  `referral_link` varchar(128) DEFAULT NULL COMMENT '推广链接',
  `audit_link` varchar(128) DEFAULT NULL COMMENT '审核链接',
  `creat_uid` int(11) NOT NULL COMMENT '创建者ID',
  `creat_time` int(10) NOT NULL COMMENT '创建时间',
  `last_edit_uid` int(11) NOT NULL,
  `last_edit_time` int(10) NOT NULL,
  `is_pass` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='链接跳转表';

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES ('2', '1', '1', '1.php', '3s.php', '2.php', '1', '1500470227', '1', '1502197824', '0');
INSERT INTO `link` VALUES ('3', '2', '1', '1.hp', '3.php', '2t.php', '1', '1500470320', '1', '1500994326', '0');
INSERT INTO `link` VALUES ('4', '2', '1', '1.php', '3.php', '2.php', '1', '1500470387', '1', '1501047993', '0');
INSERT INTO `link` VALUES ('5', '2', '1', 'test.php', 'test.php', 'test.php', '1', '1500556009', '1', '1500559216', '0');
INSERT INTO `link` VALUES ('6', '4', '2', 'souhu.php', 'souhutuiguang.php', 'souhushenhe.php', '1', '1500992201', '1', '1500994339', '0');
INSERT INTO `link` VALUES ('7', '1', '7', 'origin', 'baidu.com', 'approl', '1', '1502195711', '1', '1502197656', '1');

-- ----------------------------
-- Table structure for `link_address`
-- ----------------------------
DROP TABLE IF EXISTS `link_address`;
CREATE TABLE `link_address` (
  `link_id` int(11) NOT NULL COMMENT '链接ID',
  `address_id` int(11) NOT NULL COMMENT '地区ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='链接屏蔽地区';

-- ----------------------------
-- Records of link_address
-- ----------------------------
INSERT INTO `link_address` VALUES ('5', '5');
INSERT INTO `link_address` VALUES ('5', '8');
INSERT INTO `link_address` VALUES ('5', '10');
INSERT INTO `link_address` VALUES ('5', '12');
INSERT INTO `link_address` VALUES ('3', '8');
INSERT INTO `link_address` VALUES ('6', '10');
INSERT INTO `link_address` VALUES ('6', '12');
INSERT INTO `link_address` VALUES ('4', '5');
INSERT INTO `link_address` VALUES ('4', '6');
INSERT INTO `link_address` VALUES ('4', '10');
INSERT INTO `link_address` VALUES ('4', '12');
INSERT INTO `link_address` VALUES ('4', '14');
INSERT INTO `link_address` VALUES ('7', '8');
INSERT INTO `link_address` VALUES ('7', '10');
INSERT INTO `link_address` VALUES ('7', '11');
INSERT INTO `link_address` VALUES ('2', '5');
INSERT INTO `link_address` VALUES ('2', '6');

-- ----------------------------
-- Table structure for `link_content`
-- ----------------------------
DROP TABLE IF EXISTS `link_content`;
CREATE TABLE `link_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL COMMENT '链接ID',
  `title` varchar(256) DEFAULT NULL COMMENT '标题',
  `display_page` tinyint(1) NOT NULL DEFAULT '0',
  `price` float(10,2) DEFAULT NULL COMMENT '价格',
  `buy_count` int(11) DEFAULT NULL COMMENT '购买数量',
  `discount` float(4,1) DEFAULT NULL COMMENT '折扣',
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
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='链接内容';

-- ----------------------------
-- Records of link_content
-- ----------------------------
INSERT INTO `link_content` VALUES ('1', '2', '测试', '0', '174.50', '156', '6.7', '2017-06-11 20:41:36', '福田2', 'icp123123', '123123123', 'wechat', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170728/1501246866.jpg&quot; title=&quot;1501246866.jpg&quot; alt=&quot;6363478936865030373830353.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;./ueditor/php/upload/image/20170728/1501248671.jpg&quot; title=&quot;1501248671.jpg&quot; alt=&quot;2uucyj1vlhyvjjr2779.jpg&quot;/&gt;&lt;/p&gt;', '&lt;p&gt;1、先经过什么&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2、再经过什么&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;3、好了些吗&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;很好用啊这个&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;很好啊&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '0', '1501165179', '1501248866');
INSERT INTO `link_content` VALUES ('2', '7', 'charm测试页面', '0', '98.90', '1000', '0.9', '2017-10-11 20:41:36', 'charm公司', 'charm0987723', '8786-2837822', 'wechat-charm', '&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/resource/images/20170808/1502195806.jpg&quot; title=&quot;1502195806.jpg&quot; alt=&quot;6363478936865030373830353.jpg&quot; width=&quot;632&quot; height=&quot;729&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;1.这个&amp;nbsp;&lt;/p&gt;', '&lt;p&gt;好用&lt;/p&gt;', '&lt;p&gt;1&lt;/p&gt;', '1', '1502195843', '1502195843');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL,
  `url` varchar(64) DEFAULT NULL,
  `pid` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '账号管理', '', '0', '1');
INSERT INTO `menu` VALUES ('2', '链接管理', null, '0', '1');
INSERT INTO `menu` VALUES ('3', '地区管理', null, '0', '1');
INSERT INTO `menu` VALUES ('4', '部门管理', null, '0', '1');
INSERT INTO `menu` VALUES ('5', '域名管理', null, '0', '1');
INSERT INTO `menu` VALUES ('6', '权限管理', 'group/index', '1', '1');
INSERT INTO `menu` VALUES ('7', '用户管理', 'user/index', '1', '1');
INSERT INTO `menu` VALUES ('8', '链接跳转', 'link/skip', '2', '1');
INSERT INTO `menu` VALUES ('9', '链接内容', 'link/link', '2', '1');
INSERT INTO `menu` VALUES ('10', '屏蔽地区', 'address/index', '3', '1');
INSERT INTO `menu` VALUES ('11', '部门', 'section/index', '4', '1');
INSERT INTO `menu` VALUES ('12', '域名', 'domain/index', '5', '1');

-- ----------------------------
-- Table structure for `section`
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) NOT NULL,
  `create_time` int(10) NOT NULL,
  `last_edit_time` int(10) NOT NULL,
  `last_edit_uid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('1', '管理员', '1499783827', '1501041589', '1', '1');
INSERT INTO `section` VALUES ('2', '扶翼', '1499783914', '1501041419', '1', '1');
INSERT INTO `section` VALUES ('4', '陌陌', '1500209712', '1501041430', '1', '1');
INSERT INTO `section` VALUES ('5', '电商', '1501041440', '1501041440', '1', '1');
INSERT INTO `section` VALUES ('6', 'TSA', '1501041446', '1501041446', '1', '1');
INSERT INTO `section` VALUES ('7', 'KA', '1501041450', '1501041450', '1', '1');
INSERT INTO `section` VALUES ('8', '微博', '1501041596', '1501041596', '1', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `section_id` tinyint(2) DEFAULT NULL,
  `group_id` tinyint(2) DEFAULT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) DEFAULT NULL,
  `login_time` int(10) DEFAULT NULL,
  `ip` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$Yhis6.Ph76n1StRMFv/cqeOlwyFRwmpTKLCP0yhdMYvy.wDErcapm', '1', '2', '1500190776', '1501041620', '1502195498', '127.0.0.1', '1');
INSERT INTO `user` VALUES ('2', '张总', '$2y$10$irrwAcryVSSzgsLYcabPOeF/4Y6DEjy/QuvYsux9JPa4Q3vllOeQC', '2', '4', '1500190931', '1501047879', '1501769047', '127.0.0.1', '1');
INSERT INTO `user` VALUES ('3', '小刘', '$2y$10$VQIJ2MdM3KnvlEYOC5ZWYOlw9vWBiS29TF.B86F7sUlrcs7jP67pm', '2', '5', '1500190971', '1501047909', '1501768162', '127.0.0.1', '1');
INSERT INTO `user` VALUES ('4', '小夏', '$2y$10$SaAM883JuAFpia5LFI51V.3lYcs5LPvccjU1LDFBD5QaXkXBqLDJy', '2', '6', '1500191438', '1501047944', '1501686782', '127.0.0.1', '1');
INSERT INTO `user` VALUES ('6', 'test', '$2y$10$J6/CuDghuICeXjHOpJey2e0SRW40JpsBGbNj77Fg4DVQbQaTfGmu.', '2', '2', '1500259529', '1501041787', '1501039780', '113.91.161.178', '1');
INSERT INTO `user` VALUES ('7', '小周', '$2y$10$YJJ5TsHES6ecO0EeY5C9/eiehXSkDrZvjVewAB74MV.CN8MjopAJS', '2', '5', '1501048187', '1501048187', null, null, '1');
