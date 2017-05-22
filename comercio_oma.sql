/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : oma_envios

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-05-08 20:44:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `rif` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES ('1', 'Google', 'j555656', 'computs', '2', '2017-04-16 16:08:20', '2017-04-16 16:08:20');
INSERT INTO `companies` VALUES ('2', 'Google', 'j55265', 'compitacion', '1', '2017-04-16 16:12:32', '2017-04-16 16:12:32');
INSERT INTO `companies` VALUES ('3', 'Google', 'j778484', 'osx', '1', '2017-04-16 16:17:39', '2017-04-16 16:17:39');
INSERT INTO `companies` VALUES ('4', 'kp inc', 'n15115', 'asass', '3', '2017-04-16 17:40:34', '2017-04-16 17:40:34');
INSERT INTO `companies` VALUES ('5', 'kp inc', 'n15115', 'asass', '5', '2017-04-16 17:43:25', '2017-04-16 17:43:25');
INSERT INTO `companies` VALUES ('6', 'kp inc', 'j5551', 'asdasd', '6', '2017-04-16 17:46:47', '2017-04-16 17:46:47');
INSERT INTO `companies` VALUES ('7', 'kp inc', 'j5551', 'asdasd', '7', '2017-04-16 17:48:23', '2017-04-16 17:48:23');
INSERT INTO `companies` VALUES ('8', '', '', '', '8', '2017-04-26 21:41:09', '2017-04-26 21:41:08');
INSERT INTO `companies` VALUES ('9', 'cocuyo', '15151', '5151', '9', '2017-04-26 21:42:13', '2017-04-26 21:42:13');

-- ----------------------------
-- Table structure for rates
-- ----------------------------
DROP TABLE IF EXISTS `rates`;
CREATE TABLE `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rates
-- ----------------------------
INSERT INTO `rates` VALUES ('1', 'Rate 1', '3000', '2017-04-16 17:01:21', '2017-04-16 17:01:24');
INSERT INTO `rates` VALUES ('2', 'Rate 2', '4500', '2017-04-16 17:02:23', '2017-04-16 17:02:25');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for shipments
-- ----------------------------
DROP TABLE IF EXISTS `shipments`;
CREATE TABLE `shipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `weigth` float NOT NULL,
  `shipping_cost` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `name_receiver` varchar(255) NOT NULL,
  `phone_receiver` varchar(255) NOT NULL,
  `Dest_address` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shipments
-- ----------------------------
INSERT INTO `shipments` VALUES ('1', '1', '54', '300', '2017-04-16 16:53:49', '2017-04-16 16:53:51', 'Pedir', 'Karla Pereira', '22555', 'asaasa', '2', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `number_phone` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Oscar', 'Valecillos', 'oscarvalecillosg@gmail.com', null, null, 'e10adc3949ba59abbe56e057f20f883e', null, '2017-04-16 16:17:39', '2017-04-16 16:17:39', '1');
INSERT INTO `users` VALUES ('2', 'Larry', 'Page', 'lp@gmail.com', null, null, 'e10adc3949ba59abbe56e057f20f883e', null, '2017-04-16 16:54:53', '2017-04-16 16:54:55', '2');
INSERT INTO `users` VALUES ('7', 'Karla', 'Pereira', 'kp@gmail.com', null, null, 'e10adc3949ba59abbe56e057f20f883e', null, '2017-04-16 17:48:23', '2017-04-16 17:48:23', '2');
INSERT INTO `users` VALUES ('8', '', '', '', null, null, 'd41d8cd98f00b204e9800998ecf8427e', null, '2017-04-26 21:41:08', '2017-04-26 21:41:08', '2');
INSERT INTO `users` VALUES ('9', 'Daniel', 'Guarecuco', 'daniel@gmail.com', null, null, 'e10adc3949ba59abbe56e057f20f883e', null, '2017-04-26 21:42:13', '2017-04-26 21:42:13', '2');

-- ----------------------------
-- Table structure for zones
-- ----------------------------
DROP TABLE IF EXISTS `zones`;
CREATE TABLE `zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `rate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of zones
-- ----------------------------
INSERT INTO `zones` VALUES ('1', 'Zona 1', 'Chacao', '2017-04-16 17:00:52', '2017-04-16 17:00:54', '1');
INSERT INTO `zones` VALUES ('2', 'Zona 2', 'Sucre', '2017-04-16 17:05:40', '2017-04-16 17:05:44', '1');
INSERT INTO `zones` VALUES ('3', 'Zona 3', 'El Hatillo', '2017-04-16 17:05:47', '2017-04-16 17:05:49', '2');
INSERT INTO `zones` VALUES ('4', 'Zona 4', 'Baruta', '2017-04-16 17:05:51', '2017-04-16 17:05:53', '2');
INSERT INTO `zones` VALUES ('5', 'Zona 5', 'Libertador', '2017-04-16 17:05:56', '2017-04-16 17:06:00', '2');
