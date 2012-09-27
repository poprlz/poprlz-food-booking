/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50509
Source Host           : localhost:3306
Source Database       : poprlz_food_booking

Target Server Type    : MYSQL
Target Server Version : 50509
File Encoding         : 65001

Date: 2012-09-27 18:33:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL DEFAULT '0',
  `full_name` varchar(50) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` int(1) DEFAULT '0',
  `strict_password` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `status` char(10) NOT NULL DEFAULT 'CREATE',
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_full_name_index` (`full_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('7', '0', null, null, '0', null, '270cf12c8b7b163f75bb8b5ba25bdb18', 'Active', '2012-07-18 19:47:37', '2012-07-18 19:47:37');
INSERT INTO `user` VALUES ('8', '0', null, null, '0', null, '6465e3529659cf75745cd2ba51387f87', 'Active', '2012-07-20 11:38:04', '2012-07-20 11:38:04');

-- ----------------------------
-- Table structure for `user_account`
-- ----------------------------
DROP TABLE IF EXISTS `user_account`;
CREATE TABLE `user_account` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `app` char(20) NOT NULL DEFAULT 'poprlz',
  `open_id` varchar(100) DEFAULT NULL,
  `auth_token` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nick_name` varchar(100) DEFAULT NULL,
  `status` char(10) NOT NULL DEFAULT 'CREATE',
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_account_email_index` (`email`) USING BTREE,
  KEY `user_account_open_id_index` (`open_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_account
-- ----------------------------
INSERT INTO `user_account` VALUES ('2', '0', '7', 'poprlz', '5006a2597d19b', '0baa94e2173c5c36f48798ad45a9c877', 'poprlz@21c.om3', '242b2423aed6ddf0e7bd00c340687a38', null, 'Active', '2012-07-18 19:47:37', '2012-07-18 19:47:37');
INSERT INTO `user_account` VALUES ('3', '0', '8', 'poprlz', '5008d29c800e0', '4c4110f9c049a4482d2660f48e224c9c', 'poprlz@21c.com', '2ef608be6a5a1c4a11e3f9cec78fb1ef', null, 'Active', '2012-07-20 11:38:04', '2012-07-20 11:38:04');
