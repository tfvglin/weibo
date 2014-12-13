/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : weibo

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2014-12-13 22:15:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for weibo_blog
-- ----------------------------
DROP TABLE IF EXISTS `weibo_blog`;
CREATE TABLE `weibo_blog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(255) DEFAULT NULL,
  `blog` varchar(255) DEFAULT NULL,
  `userid` varchar(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `dateinfo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `isrepeat` varchar(255) DEFAULT NULL,
  `originaluser` varchar(255) DEFAULT NULL,
  `ps` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weibo_blog
-- ----------------------------
INSERT INTO `weibo_blog` VALUES ('15', '2014-12-08 16:42:52', '哈哈哈', '9', '0', '2014-12-08', 'linsen', null, null, null);
INSERT INTO `weibo_blog` VALUES ('16', '2014-12-08 16:43:47', '嘻嘻嘻', '9', '548564c3f1448.jpg', '2014-12-08', 'linsen', null, null, null);
INSERT INTO `weibo_blog` VALUES ('17', '2014-12-09 19:26:25', '下雪了', '9', '5486dc61bc821.jpg', '2014-12-09', 'linsen', null, null, null);
INSERT INTO `weibo_blog` VALUES ('18', '2014-12-09 19:28:44', '真烦', '10', '0', '2014-12-09', 'tfvglin', null, null, null);
INSERT INTO `weibo_blog` VALUES ('19', '2014-12-10 18:06:08', ' 呵呵', '10', '54881b102befa.jpg', '2014-12-10', 'tfvglin', null, null, null);
INSERT INTO `weibo_blog` VALUES ('24', '2014-12-11 23:21:56', '真烦', '11', '0', '2014-12-11', 'houqian', '1', 'tfvglin', '转发自【tfvglin】');
INSERT INTO `weibo_blog` VALUES ('25', '2014-12-11 23:22:28', '真烦', '10', '0', '2014-12-11', 'tfvglin', '1', 'houqian', '转发自【houqian】转发自【tfvglin】');

-- ----------------------------
-- Table structure for weibo_comment
-- ----------------------------
DROP TABLE IF EXISTS `weibo_comment`;
CREATE TABLE `weibo_comment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `blogid` varchar(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weibo_comment
-- ----------------------------
INSERT INTO `weibo_comment` VALUES ('1', '我的评论', null, 'linsen');
INSERT INTO `weibo_comment` VALUES ('2', '我的评论', null, 'linsen');
INSERT INTO `weibo_comment` VALUES ('3', '好的', null, 'linsen');
INSERT INTO `weibo_comment` VALUES ('4', '好冷', '15', 'linsen');
INSERT INTO `weibo_comment` VALUES ('5', '额 真的好冷', '15', 'linsen');
INSERT INTO `weibo_comment` VALUES ('6', '测试一下', '15', 'linsen');
INSERT INTO `weibo_comment` VALUES ('7', '再测试一下', '15', 'linsen');
INSERT INTO `weibo_comment` VALUES ('8', '再再测试一下', '15', 'linsen');
INSERT INTO `weibo_comment` VALUES ('9', '帮你测试下', '15', 'tfvglin');
INSERT INTO `weibo_comment` VALUES ('10', '笑你妹', '16', 'tfvglin');
INSERT INTO `weibo_comment` VALUES ('11', '', '15', 'tfvglin');

-- ----------------------------
-- Table structure for weibo_follow
-- ----------------------------
DROP TABLE IF EXISTS `weibo_follow`;
CREATE TABLE `weibo_follow` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `focusid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weibo_follow
-- ----------------------------
INSERT INTO `weibo_follow` VALUES ('59', '10', '9');
INSERT INTO `weibo_follow` VALUES ('60', '10', '11');
INSERT INTO `weibo_follow` VALUES ('61', '10', '12');
INSERT INTO `weibo_follow` VALUES ('62', '11', '10');

-- ----------------------------
-- Table structure for weibo_user
-- ----------------------------
DROP TABLE IF EXISTS `weibo_user`;
CREATE TABLE `weibo_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weibo_user
-- ----------------------------
INSERT INTO `weibo_user` VALUES ('9', 'linsen ', '123', '123@qq.com', '1');
INSERT INTO `weibo_user` VALUES ('10', 'tfvglin', '123', '123@qq.com', '1');
INSERT INTO `weibo_user` VALUES ('11', 'houqian', '123', '123@qq.com', '0');
INSERT INTO `weibo_user` VALUES ('12', 'lin1', '123', '123@qq.com', '1');
INSERT INTO `weibo_user` VALUES ('13', 'lin2', '123', '123@qq.com', '1');
INSERT INTO `weibo_user` VALUES ('14', 'lin3', '123', '123@qq.com', '1');
