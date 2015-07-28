/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : yintt

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2015-07-28 22:32:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lzh_active`
-- ----------------------------
DROP TABLE IF EXISTS `lzh_active`;
CREATE TABLE `lzh_active` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '标志,0-不启动,1-启动',
  `amount` double(7,0) NOT NULL DEFAULT '0' COMMENT '奖励金额',
  `desc` varchar(100) DEFAULT '0' COMMENT '描述',
  UNIQUE KEY `active_key` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lzh_active
-- ----------------------------
INSERT INTO `lzh_active` VALUES ('1', '1', '2', '0');
INSERT INTO `lzh_active` VALUES ('2', '1', '30', '0');
INSERT INTO `lzh_active` VALUES ('3', '1', '33', '0');
