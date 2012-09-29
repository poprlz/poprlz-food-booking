/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50509
Source Host           : localhost:3306
Source Database       : poprlz_food_booking

Target Server Type    : MYSQL
Target Server Version : 50509
File Encoding         : 65001

Date: 2012-09-29 16:38:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `catalog`
-- ----------------------------
DROP TABLE IF EXISTS `catalog`;
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
-- Records of catalog
-- ----------------------------

-- ----------------------------
-- Table structure for `order_information`
-- ----------------------------
DROP TABLE IF EXISTS `order_information`;
CREATE TABLE `order_information` (
  `id` bigint(20) NOT NULL,
  `biz_number` char(100) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `currency` char(5) NOT NULL DEFAULT 'CNY',
  `status` char(20) NOT NULL,
  `shipping_status` char(20) NOT NULL,
  `payment_status` char(20) NOT NULL DEFAULT 'awaiting_payment',
  `order_mode` char(20) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `order_operator_id` bigint(20) DEFAULT NULL,
  `booking_user_id` bigint(20) NOT NULL,
  `booking_user_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_information
-- ----------------------------

-- ----------------------------
-- Table structure for `order_item`
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` bigint(20) NOT NULL,
  `order_information_id` bigint(20) NOT NULL,
  `currency` char(5) NOT NULL DEFAULT 'CNY',
  `unit_price` decimal(10,0) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '1',
  `final_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `item_type` char(20) NOT NULL,
  `item_type_union_id` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `business_status` char(20) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_item
-- ----------------------------

-- ----------------------------
-- Table structure for `order_payment`
-- ----------------------------
DROP TABLE IF EXISTS `order_payment`;
CREATE TABLE `order_payment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_information_id` bigint(20) NOT NULL,
  `payment_method` char(255) DEFAULT NULL,
  `merchant_id` char(100) DEFAULT NULL,
  `tx_amount` decimal(10,0) DEFAULT NULL,
  `currency` char(4) DEFAULT 'CNY',
  `tx_type` char(10) DEFAULT 'payment',
  `payment_trace_number` char(50) DEFAULT NULL,
  `trace_number` char(50) DEFAULT NULL,
  `auth_number` char(50) DEFAULT NULL,
  `tx_time` datetime DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_payment
-- ----------------------------

-- ----------------------------
-- Table structure for `order_shipping`
-- ----------------------------
DROP TABLE IF EXISTS `order_shipping`;
CREATE TABLE `order_shipping` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_information_id` bigint(20) NOT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` char(15) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `mobile` char(20) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `contact_name` char(100) NOT NULL,
  `shipping_mode` char(20) DEFAULT NULL,
  `trace_number` char(50) DEFAULT NULL,
  `shipping_fee` decimal(10,0) DEFAULT NULL,
  `currency` char(4) DEFAULT 'CNY',
  `shipping_server` varchar(100) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_shipping
-- ----------------------------

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
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
-- Records of product
-- ----------------------------

-- ----------------------------
-- Table structure for `product_catalog`
-- ----------------------------
DROP TABLE IF EXISTS `product_catalog`;
CREATE TABLE `product_catalog` (
  `catalog_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  UNIQUE KEY `product_catalog_index` (`catalog_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_catalog
-- ----------------------------

-- ----------------------------
-- Table structure for `product_image`
-- ----------------------------
DROP TABLE IF EXISTS `product_image`;
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
-- Records of product_image
-- ----------------------------

-- ----------------------------
-- Table structure for `product_option`
-- ----------------------------
DROP TABLE IF EXISTS `product_option`;
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
-- Records of product_option
-- ----------------------------

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
