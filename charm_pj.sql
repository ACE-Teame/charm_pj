/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : charm_pj

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-20 23:55:55
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
INSERT INTO `address` VALUES ('14', '湖南', '1500262435', '1500262435', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='域名管理';

-- ----------------------------
-- Records of domain
-- ----------------------------
INSERT INTO `domain` VALUES ('1', '百度', 'www.baidu.com', '1', '1500467645');
INSERT INTO `domain` VALUES ('2', '搜狐', 'www.sohu.com', '1', '1500467666');
INSERT INTO `domain` VALUES ('4', '雅虎', 'yahuu.com', '1', '1500564885');
INSERT INTO `domain` VALUES ('5', '新浪', 'sina.com', '1', '1500565846');
INSERT INTO `domain` VALUES ('6', '命中水', 'cxiansheng.cn', '1', '1500565869');

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
INSERT INTO `group` VALUES ('2', '管理员', '管理员啊2', '1499949313', '1');
INSERT INTO `group` VALUES ('4', '测试组哈哈', '测试组哈哈', '1500163308', '1');
INSERT INTO `group` VALUES ('5', '超管组', '超管组1', '1500163331', '1');
INSERT INTO `group` VALUES ('6', '王大锤', '哈哈哈哈', '1500163618', '1');

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
  `page_view` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='链接跳转表';

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES ('2', '1', '1', '1.hp', '3s.php', '2.php', '1', '1500470227', '1', '1500559829', '0');
INSERT INTO `link` VALUES ('3', '1', '1', '1.hp', '3.php', '2t.php', '1', '1500470320', '1', '1500559786', '0');
INSERT INTO `link` VALUES ('4', '1', '1', '1.php', '3.php', '2.php', '1', '1500470387', '1', '1500557989', '0');
INSERT INTO `link` VALUES ('5', '2', '1', 'test.php', 'test.php', 'test.php', '1', '1500556009', '1', '1500559216', '0');

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
INSERT INTO `link_address` VALUES ('4', '5');
INSERT INTO `link_address` VALUES ('4', '6');
INSERT INTO `link_address` VALUES ('4', '10');
INSERT INTO `link_address` VALUES ('4', '12');
INSERT INTO `link_address` VALUES ('4', '14');
INSERT INTO `link_address` VALUES ('5', '5');
INSERT INTO `link_address` VALUES ('5', '8');
INSERT INTO `link_address` VALUES ('5', '10');
INSERT INTO `link_address` VALUES ('5', '12');
INSERT INTO `link_address` VALUES ('3', '8');
INSERT INTO `link_address` VALUES ('2', '9');

-- ----------------------------
-- Table structure for `link_content`
-- ----------------------------
DROP TABLE IF EXISTS `link_content`;
CREATE TABLE `link_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL COMMENT '链接ID',
  `title` varchar(256) DEFAULT NULL COMMENT '标题',
  `price` float(10,2) DEFAULT NULL COMMENT '价格',
  `buy_num` int(11) DEFAULT NULL COMMENT '购买数量',
  `discount` float(4,2) DEFAULT NULL COMMENT '折扣',
  `end_time` varchar(36) DEFAULT NULL COMMENT '结束时间',
  `campany` varchar(64) DEFAULT NULL COMMENT '公司名称',
  `icp` varchar(64) DEFAULT NULL,
  `mobile` varchar(24) DEFAULT NULL COMMENT '电话',
  `wechat` varchar(36) DEFAULT NULL COMMENT '微信号',
  `product_photo` varchar(128) DEFAULT NULL COMMENT '产品主图',
  `buy_flow` text COMMENT '购买流程',
  `synopsis` text COMMENT '简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='链接内容';

-- ----------------------------
-- Records of link_content
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('1', '测试部', '1499783827', '1500209545', '1', '1');
INSERT INTO `section` VALUES ('2', '网络部', '1499783914', '1500209624', '1', '1');
INSERT INTO `section` VALUES ('4', '人事部', '1500209712', '1500209877', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$Yhis6.Ph76n1StRMFv/cqeOlwyFRwmpTKLCP0yhdMYvy.wDErcapm', '2', '2', '1500190776', '1500304057', '1500554521', '127.0.0.1', '1');
INSERT INTO `user` VALUES ('2', '测试', '$2y$10$AaMn.P5IufgJWqPFHyMyGOFnpnsbYX.pNL1NQqdgZXOFY65hPx1QG', '2', '1', '1500190931', '1500202634', '1500385198', null, '1');
INSERT INTO `user` VALUES ('3', 'local', '$2y$10$xYiRivRPy8sZT210IgGTEeWTYmP4VTqzn2Fc5Grn48qI6e7CibWdi', '3', '2', '1500190971', '1500190971', null, null, '1');
INSERT INTO `user` VALUES ('4', '三胖', '$2y$10$eVNy0sdyw7DHCsy5f2meYen1S4nsWZVnvfZzVzNYMmQpw.5UVCjia', '2', '2', '1500191438', '1500210382', null, null, '1');
INSERT INTO `user` VALUES ('6', 'admin', '$2y$10$rdM2Z9t8hXv7qZ8K0WYmm.La8j7FfxOmq9wXQXtjcB4atwe/8gUny', '3', '2', '1500259529', '1500259529', null, null, '1');
