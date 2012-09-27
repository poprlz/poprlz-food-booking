/*
MySQL Data Transfer
Source Host: 127.0.0.1
Source Database: poprlz_food_booking
Target Host: 127.0.0.1
Target Database: poprlz_food_booking
Date: 2012/9/28 0:03:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for catalog
-- ----------------------------
CREATE TABLE `catalog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL DEFAULT '0',
  `parent_id` bigint(20) DEFAULT NULL,
  `name` char(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img_path` char(200) DEFAULT NULL,
  `status` char(10) NOT NULL DEFAULT 'active',
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catalog_name_index` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product
-- ----------------------------
CREATE TABLE `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `img_path` char(200) NOT NULL,
  `description` longtext,
  `price` decimal(10,0) NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'active',
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_title_index` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product_catalog
-- ----------------------------
CREATE TABLE `product_catalog` (
  `catalog_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  UNIQUE KEY `product_catalog_index` (`catalog_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product_image
-- ----------------------------
CREATE TABLE `product_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL DEFAULT '0',
  `product_id` bigint(20) NOT NULL,
  `img_path` char(200) NOT NULL,
  `alt` char(200) DEFAULT NULL,
  `status` char(10) NOT NULL DEFAULT 'active',
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product_option
-- ----------------------------
CREATE TABLE `product_option` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` bigint(20) NOT NULL DEFAULT '0',
  `product_id` bigint(20) NOT NULL,
  `option_code` char(20) NOT NULL,
  `name` char(200) NOT NULL,
  `value` tinytext NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `status` char(10) NOT NULL DEFAULT 'active',
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_option_code_index` (`option_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
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
-- Table structure for user_account
-- ----------------------------
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
-- Records 
-- ----------------------------
INSERT INTO `user` VALUES ('7', '0', null, null, '0', null, '270cf12c8b7b163f75bb8b5ba25bdb18', 'Active', '2012-07-18 19:47:37', '2012-07-18 19:47:37');
INSERT INTO `user` VALUES ('8', '0', null, null, '0', null, '6465e3529659cf75745cd2ba51387f87', 'Active', '2012-07-20 11:38:04', '2012-07-20 11:38:04');
INSERT INTO `user_account` VALUES ('2', '0', '7', 'poprlz', '5006a2597d19b', '0baa94e2173c5c36f48798ad45a9c877', 'poprlz@21c.om3', '242b2423aed6ddf0e7bd00c340687a38', null, 'Active', '2012-07-18 19:47:37', '2012-07-18 19:47:37');
INSERT INTO `user_account` VALUES ('3', '0', '8', 'poprlz', '5008d29c800e0', '4c4110f9c049a4482d2660f48e224c9c', 'poprlz@21c.com', '2ef608be6a5a1c4a11e3f9cec78fb1ef', null, 'Active', '2012-07-20 11:38:04', '2012-07-20 11:38:04');
