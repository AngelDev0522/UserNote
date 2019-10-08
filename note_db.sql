/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : note_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-08 03:20:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `notes`
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `kks` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` int(1) NOT NULL DEFAULT '0',
  `error` int(1) NOT NULL DEFAULT '0',
  `referenceN` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archived` int(1) NOT NULL DEFAULT '0',
  `new` int(1) NOT NULL DEFAULT '1',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgurl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notes
-- ----------------------------
INSERT INTO `notes` VALUES ('23', '1', '', 'Dan', 'Hi Dan!', '0', '1', '', '0', '0', 'EliteDev5220@gmail.com', '', '29980773_captura-radio.png', '2019-05-13 12:54:54');
INSERT INTO `notes` VALUES ('25', '1', '', 'To Raden', 'Hi Raden!', '0', '0', '', '0', '1', '', '', 'dice sc2.png', '2019-06-06 03:55:17');
INSERT INTO `notes` VALUES ('26', '1', 'KKS', 'Title', 'Notis', '0', '0', '', '1', '1', '', '', 'images (2).jpg', '2019-06-06 03:55:37');
INSERT INTO `notes` VALUES ('27', '1', '', 'Hi', 'Don', '0', '0', '', '1', '1', '', '', '667103_Screenshot_20190528-034651.jpg', '2019-06-06 22:07:37');
INSERT INTO `notes` VALUES ('28', '1', '', 'Hi', 'Star', '0', '0', '', '1', '1', '', '', 'logo.png', '2019-06-06 22:07:58');
INSERT INTO `notes` VALUES ('30', '1', '71gah54dd998', 'test2', 'kjahsd', '0', '0', '', '1', '1', '', '', '667103_Screenshot_20190528-034651.jpg', '2019-06-07 19:27:16');
INSERT INTO `notes` VALUES ('31', '1', '', '555', '555', '0', '0', '', '0', '1', '', '', 'default.png', '2019-06-07 20:11:41');
INSERT INTO `notes` VALUES ('32', '1', '', '444', '4444', '0', '0', '', '0', '1', '', '', 'default.png', '2019-06-07 20:12:53');
INSERT INTO `notes` VALUES ('33', '1', '111', '111', '11111', '0', '0', '', '0', '1', '', '', 'default.png', '2019-06-07 20:14:03');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `permission` int(1) DEFAULT NULL COMMENT '1:Admin,2:User',
  PRIMARY KEY (`id`,`user_id`),
  KEY `ID_ENTITE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '222', 'e10adc3949ba59abbe56e057f20f883e', '2');
INSERT INTO `users` VALUES ('2', '111', '111', '1');
