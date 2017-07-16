/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : charm_pj

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-16 21:43:10
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$u42K0PKJf04KUgQ9Xq9NPeJqOr9SHugKAfOmyFCqTiFDhaPHMNChe', '2', '2', '1500190776', '1500190776', null, null, '1');
INSERT INTO `user` VALUES ('2', '测试', '$2y$10$AaMn.P5IufgJWqPFHyMyGOFnpnsbYX.pNL1NQqdgZXOFY65hPx1QG', '2', '1', '1500190931', '1500202634', null, null, '1');
INSERT INTO `user` VALUES ('3', 'local', '$2y$10$xYiRivRPy8sZT210IgGTEeWTYmP4VTqzn2Fc5Grn48qI6e7CibWdi', '3', '2', '1500190971', '1500190971', null, null, '1');
INSERT INTO `user` VALUES ('4', '三胖', '$2y$10$eVNy0sdyw7DHCsy5f2meYen1S4nsWZVnvfZzVzNYMmQpw.5UVCjia', '2', '2', '1500191438', '1500210382', null, null, '1');
