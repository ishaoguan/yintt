/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : yintt

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2015-07-28 22:32:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lzh_active_award_log`
-- ----------------------------
DROP TABLE IF EXISTS `lzh_active_award_log`;
CREATE TABLE `lzh_active_award_log` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `awardTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` double(7,0) NOT NULL,
  `uid` int(10) NOT NULL COMMENT '0-注册奖励,1-首投奖励,3-推荐奖励',
  `awardType` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lzh_active_award_log
-- ----------------------------

