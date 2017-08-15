/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : charm_pj

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-15 22:26:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL,
  `url` varchar(64) DEFAULT NULL,
  `class` varchar(32) DEFAULT NULL COMMENT '样式',
  `pid` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='菜单';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '账号管理', '', null, '0', '1');
INSERT INTO `menu` VALUES ('2', '链接管理', null, null, '0', '1');
INSERT INTO `menu` VALUES ('3', '地区管理', null, '', '0', '1');
INSERT INTO `menu` VALUES ('4', '部门管理', null, '', '0', '1');
INSERT INTO `menu` VALUES ('5', '域名管理', null, null, '0', '1');
INSERT INTO `menu` VALUES ('6', '权限管理', 'group/index', 'icon-user-group', '1', '1');
INSERT INTO `menu` VALUES ('7', '用户管理', 'user/index', 'icon-user', '1', '1');
INSERT INTO `menu` VALUES ('8', '链接跳转', 'link/skip', 'icon-link', '2', '1');
INSERT INTO `menu` VALUES ('9', '链接内容', 'link/link', 'icon-product', '2', '1');
INSERT INTO `menu` VALUES ('10', '屏蔽地区', 'address/index', 'icon-address', '3', '1');
INSERT INTO `menu` VALUES ('11', '部门', 'section/index', 'icon-sector', '4', '1');
INSERT INTO `menu` VALUES ('12', '域名', 'domain/index', null, '5', '1');
