/*
Navicat MySQL Data Transfer

Source Server         : zxy
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : s47_shop

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-08-13 17:11:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for s47_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `s47_admin_user`;
CREATE TABLE `s47_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pwd` char(32) NOT NULL,
  `tel` char(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_admin_user
-- ----------------------------
INSERT INTO `s47_admin_user` VALUES ('18', 'admin', '670b14728ad9902aecba32e22fa4f6bd', '18516604560', '0');
INSERT INTO `s47_admin_user` VALUES ('19', 'yang', 'e10adc3949ba59abbe56e057f20f883e', '13888883434', '1');

-- ----------------------------
-- Table structure for s47_category
-- ----------------------------
DROP TABLE IF EXISTS `s47_category`;
CREATE TABLE `s47_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '0,',
  `display` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cname` (`cname`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_category
-- ----------------------------
INSERT INTO `s47_category` VALUES ('1', '整机', '0', '0,', '1');
INSERT INTO `s47_category` VALUES ('2', '定制手机', '1', '0,1,', '1');
INSERT INTO `s47_category` VALUES ('3', '户外运动手机', '1', '0,1,', '1');
INSERT INTO `s47_category` VALUES ('4', '配件', '0', '0,', '1');
INSERT INTO `s47_category` VALUES ('29', '青橙VOGA V1', '3', '0,1,3,', '0');
INSERT INTO `s47_category` VALUES ('36', '青橙N类', '2', '0,1,2,', '1');
INSERT INTO `s47_category` VALUES ('37', '青橙N2', '36', '0,1,2,36,', '1');
INSERT INTO `s47_category` VALUES ('41', '青橙N3s', '36', '0,1,2,36,', '1');
INSERT INTO `s47_category` VALUES ('42', '户外配件套装', '4', '0,4,', '0');
INSERT INTO `s47_category` VALUES ('43', '户外配件单件', '4', '0,4,', '0');
INSERT INTO `s47_category` VALUES ('44', '机械器件', '43', '0,4,43,', '0');
INSERT INTO `s47_category` VALUES ('45', '其他', '43', '0,4,43,', '0');
INSERT INTO `s47_category` VALUES ('46', 'V1专用', '42', '0,4,42,', '0');
INSERT INTO `s47_category` VALUES ('47', '户外专用', '42', '0,4,42,', '0');
INSERT INTO `s47_category` VALUES ('48', '手机背夹', '44', '0,4,43,44,', '0');
INSERT INTO `s47_category` VALUES ('49', '腰带', '45', '0,4,43,45,', '0');
INSERT INTO `s47_category` VALUES ('50', '越野套装', '46', '0,4,42,46,', '0');
INSERT INTO `s47_category` VALUES ('51', '骑行套装', '47', '0,4,42,47,', '0');
INSERT INTO `s47_category` VALUES ('52', '1234', '0', '0,', '1');
INSERT INTO `s47_category` VALUES ('53', '                   ', '0', '0,', '1');
INSERT INTO `s47_category` VALUES ('54', '123 456', '0', '0,', '1');

-- ----------------------------
-- Table structure for s47_discuss
-- ----------------------------
DROP TABLE IF EXISTS `s47_discuss`;
CREATE TABLE `s47_discuss` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordernum` varchar(255) NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(255) NOT NULL,
  `say` varchar(655) DEFAULT NULL,
  `reply` varchar(655) DEFAULT NULL,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_discuss
-- ----------------------------
INSERT INTO `s47_discuss` VALUES ('30', '20160524295', '11', 'xshxsh', '去去去去去去去去去', '天天天', '61');

-- ----------------------------
-- Table structure for s47_goods
-- ----------------------------
DROP TABLE IF EXISTS `s47_goods`;
CREATE TABLE `s47_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) DEFAULT NULL,
  `cate_id` int(10) unsigned DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int(10) unsigned NOT NULL DEFAULT '0',
  `sale` int(10) unsigned NOT NULL DEFAULT '0',
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `is_hot` tinyint(4) NOT NULL DEFAULT '0',
  `state` tinyint(4) NOT NULL DEFAULT '1',
  `zan` smallint(6) NOT NULL DEFAULT '0',
  `msg` varchar(600) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `gname` (`gname`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_goods
-- ----------------------------
INSERT INTO `s47_goods` VALUES ('8', '青橙N3', '36', '1799.00', '45', '0', '1', '1', '1', '10', '“型”影不离\r\n    全网通 自由切换 支持盲插\r\n    FHD超清大屏\r\n    0.5秒 指纹解锁\r\n    HotKnot 碰触传输\r\n    1300万高清摄像头');
INSERT INTO `s47_goods` VALUES ('9', '青橙M4', '36', '1299.00', '50', '0', '1', '1', '1', '0', '指为你精彩\r\n\r\n    指纹识别\r\n    8核64位强劲处理器\r\n    移动/联通/电信4G手机\r\n    可拆卸 超大电池\r\n    熄屏解锁');
INSERT INTO `s47_goods` VALUES ('10', '青橙C1', '1', '399.00', '50', '0', '1', '1', '1', '0', '好品 好用 好看的手机\r\n\r\n    双卡双待\r\n    移动4G/联通2G\r\n    超长待机\r\n    超高性价比\r\n    支持内存卡扩展');
INSERT INTO `s47_goods` VALUES ('11', '青橙VOGA V1', '1', '3499.00', '40', '0', '1', '1', '1', '1', '青橙VOGA V1号称”年轻人第一部户外运动手机”，主打的部分自然也放在了户外运动这一特点上。青橙VOGA V1采用了航空级玻纤聚碳酸酯与拜耳亲肤高弹分子材料，打造军用级防护，精密结构设计与适应宽温操作的AMOLED屏确保了青橙VOGA V1在极寒、极热环境下都能够顺畅运行。');
INSERT INTO `s47_goods` VALUES ('12', '青橙N2', '1', '1599.00', '34', '0', '1', '1', '0', '6', '弧动之美 一触即发\r\n移动/联通/电信4G手机 \r\n全金属工艺 5.5寸高清大屏\r\n熄屏解锁 PTT一键对讲');
INSERT INTO `s47_goods` VALUES ('13', '青橙N20', '1', '999.00', '56', '0', '1', '1', '1', '0', '一款高质价比的手机\r\n\r\n    5.5寸高清大屏\r\n    双卡双待\r\n    移动/联通/电信4G手机 自由切换\r\n    1300万高清摄像头\r\n    PTT一键对讲功能');
INSERT INTO `s47_goods` VALUES ('14', 'M4配件大礼包', '1', '39.00', '40', '0', '1', '1', '1', '0', '礼包包含高透贴膜一张和炫彩外壳一个');
INSERT INTO `s47_goods` VALUES ('15', '青橙N2/N20专用钢化膜', '4', '29.90', '40', '0', '1', '1', '1', '0', '1.高强度防刮\r\n2.高清晰\r\n3.防指纹\r\n4.触摸顺滑\r\n5.反应灵敏');
INSERT INTO `s47_goods` VALUES ('16', '青橙N2专用保护壳', '4', '19.90', '23', '0', '1', '1', '1', '0', '独特的磨砂工艺,超薄外观精致,手感细腻,简约时尚,采用环保PC材料,为您的健康着想');
INSERT INTO `s47_goods` VALUES ('17', '青橙标准耳机', '4', '29.00', '15', '0', '1', '1', '1', '0', '可线控操作,入耳式设计.简约外观金属耳壳设计,彰显独特个性');
INSERT INTO `s47_goods` VALUES ('18', '标准电源适配器', '1', '49.00', '56', '0', '1', '1', '1', '0', '搭配原装数据线使用,高效充电,便捷随行.');
INSERT INTO `s47_goods` VALUES ('19', 'N1加厚侧翻牛皮皮套（3000毫安电池专用）', '4', '99.00', '15', '0', '1', '1', '1', '0', '出色材质,简洁大气,精致完美');
INSERT INTO `s47_goods` VALUES ('20', '优赞自动收线器', '4', '38.00', '46', '0', '1', '1', '1', '0', '柔和的线条,动感时尚.');
INSERT INTO `s47_goods` VALUES ('21', '标准数据线(1米)', '1', '19.00', '25', '0', '1', '1', '1', '0', '高速传输,使用便捷');
INSERT INTO `s47_goods` VALUES ('22', '吸盘底座', '4', '100.00', '23', '0', '1', '1', '1', '0', '固定在光滑表名的组件,易拆卸');
INSERT INTO `s47_goods` VALUES ('23', '车把底座', '4', '100.00', '76', '0', '1', '1', '1', '0', '固定在车把上的组件');
INSERT INTO `s47_goods` VALUES ('24', 'V1专用超值套装', '42', '388.00', '67', '0', '1', '1', '1', '0', '超值套装,可满足骑行场景及越野场景需求');
INSERT INTO `s47_goods` VALUES ('25', '臂带', '4', '100.00', '12', '0', '1', '1', '1', '0', '搭配手机背夹使用');
INSERT INTO `s47_goods` VALUES ('26', '手机背夹', '4', '100.00', '15', '0', '1', '1', '1', '0', '固定手机使用');
INSERT INTO `s47_goods` VALUES ('27', '平板底座', '4', '100.00', '0', '0', '1', '1', '1', '0', '固定在滑板或其他薄板上的组件');
INSERT INTO `s47_goods` VALUES ('28', '腰带', '4', '100.00', '15', '0', '1', '1', '1', '0', '搭配手机背夹使用');

-- ----------------------------
-- Table structure for s47_image
-- ----------------------------
DROP TABLE IF EXISTS `s47_image`;
CREATE TABLE `s47_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iname` varchar(255) DEFAULT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `cover` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `iname` (`iname`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_image
-- ----------------------------
INSERT INTO `s47_image` VALUES ('1', '2016051157330a8980512.jpg', '6', '1');
INSERT INTO `s47_image` VALUES ('2', '2016051157330ac586c53.jpg', '7', '1');
INSERT INTO `s47_image` VALUES ('45', '2016051357355bc28636f.jpg', '8', '1');
INSERT INTO `s47_image` VALUES ('46', '2016051357355c2df2a60.jpg', '12', '1');
INSERT INTO `s47_image` VALUES ('47', '2016051357355ca1b8735.jpg', '11', '1');
INSERT INTO `s47_image` VALUES ('48', '2016051357355cdc2be8b.jpg', '10', '1');
INSERT INTO `s47_image` VALUES ('49', '2016051357355d4a73847.jpg', '13', '1');
INSERT INTO `s47_image` VALUES ('50', '2016051357355d8fde333.jpg', '9', '1');
INSERT INTO `s47_image` VALUES ('51', '2016051357355e3e6b349.jpg', '11', '0');
INSERT INTO `s47_image` VALUES ('52', '2016051357355ed3716fd.jpg', '11', '0');
INSERT INTO `s47_image` VALUES ('53', '2016051357355f25da590.jpg', '11', '0');
INSERT INTO `s47_image` VALUES ('54', '2016051357355f64c9a5f.jpg', '11', '0');
INSERT INTO `s47_image` VALUES ('55', '201605145736e5e3e7f27.jpg', '8', '0');
INSERT INTO `s47_image` VALUES ('59', '201605145736e88c5d7fe.jpg', '8', '0');
INSERT INTO `s47_image` VALUES ('60', '201605145736e8e5edd12.jpg', '8', '0');
INSERT INTO `s47_image` VALUES ('61', '201605145736e95f97230.jpg', '8', '0');
INSERT INTO `s47_image` VALUES ('62', '201605145736eab865c09.jpg', '12', '0');
INSERT INTO `s47_image` VALUES ('63', '201605145736eb0d34e33.jpg', '12', '0');
INSERT INTO `s47_image` VALUES ('64', '201605145736eb749ed2f.jpg', '12', '0');
INSERT INTO `s47_image` VALUES ('65', '201605145736ebb2e15e1.jpg', '12', '0');
INSERT INTO `s47_image` VALUES ('66', '201605145736ec2fa2a80.jpg', '10', '0');
INSERT INTO `s47_image` VALUES ('67', '201605145736ec83280b0.jpg', '10', '0');
INSERT INTO `s47_image` VALUES ('68', '201605145736eccc36bc3.jpg', '10', '0');
INSERT INTO `s47_image` VALUES ('69', '201605145736ed51e3bea.jpg', '10', '0');
INSERT INTO `s47_image` VALUES ('70', '201605145736ee232f12b.jpg', '13', '0');
INSERT INTO `s47_image` VALUES ('71', '201605145736ee86b8b1a.jpg', '13', '0');
INSERT INTO `s47_image` VALUES ('72', '201605145736ef4be5320.jpg', '13', '0');
INSERT INTO `s47_image` VALUES ('73', '201605145736ef9cd8e5e.jpg', '13', '0');
INSERT INTO `s47_image` VALUES ('74', '201605145736f01f1c0af.jpg', '9', '0');
INSERT INTO `s47_image` VALUES ('75', '201605145736f05611946.jpg', '9', '0');
INSERT INTO `s47_image` VALUES ('76', '201605145736f08fd3038.jpg', '9', '0');
INSERT INTO `s47_image` VALUES ('78', '201605145736f1377911c.jpg', '9', '0');
INSERT INTO `s47_image` VALUES ('80', '201605165739a960351ac.jpg', '15', '1');
INSERT INTO `s47_image` VALUES ('81', '201605165739aa40d4bc6.jpg', '16', '1');
INSERT INTO `s47_image` VALUES ('82', '201605165739acba2d8dd.jpg', '17', '1');
INSERT INTO `s47_image` VALUES ('84', '201605165739ae153c690.jpg', '19', '1');
INSERT INTO `s47_image` VALUES ('85', '201605165739ae9402dab.jpg', '20', '1');
INSERT INTO `s47_image` VALUES ('86', '201605165739af0a84aee.jpg', '21', '1');
INSERT INTO `s47_image` VALUES ('87', '201605165739b173978dd.jpg', '22', '1');
INSERT INTO `s47_image` VALUES ('88', '201605165739b1e223aa7.jpg', '23', '1');
INSERT INTO `s47_image` VALUES ('89', '201605165739b2654b56d.jpg', '24', '1');
INSERT INTO `s47_image` VALUES ('90', '201605165739b2cb3f55c.jpg', '25', '1');
INSERT INTO `s47_image` VALUES ('91', '201605165739b315aeb9f.jpg', '26', '1');
INSERT INTO `s47_image` VALUES ('92', '201605165739b3946b28f.jpg', '27', '1');
INSERT INTO `s47_image` VALUES ('93', '20160517573a5364564f6.jpg', '28', '1');
INSERT INTO `s47_image` VALUES ('94', '20160517573aa5e5912a0.jpg', '18', '1');
INSERT INTO `s47_image` VALUES ('95', '20160517573aaae66e50c.jpg', '14', '1');

-- ----------------------------
-- Table structure for s47_order
-- ----------------------------
DROP TABLE IF EXISTS `s47_order`;
CREATE TABLE `s47_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordernum` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `oname` varchar(255) NOT NULL,
  `phone` char(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `allprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ordernum` (`ordernum`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_order
-- ----------------------------
INSERT INTO `s47_order` VALUES ('18', '20160518662', '89', '小明', '15925892419', '上海市', '7397.00', '2');
INSERT INTO `s47_order` VALUES ('38', '20160519878', '91', '冷兔', '15925892419', '北京', '2898.00', '2');
INSERT INTO `s47_order` VALUES ('39', '20160519623', '91', '小白', '15925892419', '浙江省绍兴市', '20393.00', '2');
INSERT INTO `s47_order` VALUES ('40', '20160519707', '91', '小黑', '15925892419', '江西南昌', '17495.00', '2');
INSERT INTO `s47_order` VALUES ('41', '20160519268', '91', '小黄', '15925892419', '云南大理', '2394.00', '3');
INSERT INTO `s47_order` VALUES ('42', '20160519851', '91', '小兔', '15925892419', '台湾', '999.00', '1');
INSERT INTO `s47_order` VALUES ('43', '20160520129', '91', '慕蓉', '15925892419', '古代', '13996.00', '2');
INSERT INTO `s47_order` VALUES ('44', '20160520386', '58', '苏打水', '15925892419', '湖南常德', '1596.00', '0');
INSERT INTO `s47_order` VALUES ('45', '20160520206', '58', '矿泉水', '15925892419', '湖南长沙', '5994.00', '0');
INSERT INTO `s47_order` VALUES ('46', '20160520578', '1', '黄超', '13676768787', '江苏', '16992.00', '0');
INSERT INTO `s47_order` VALUES ('52', '20160524849', '95', '发发发反反复复', '13888884545', '江苏', '388.00', '2');
INSERT INTO `s47_order` VALUES ('59', '20160524215', '96', '有意义', '有意义', '有意义', '1299.00', '1');
INSERT INTO `s47_order` VALUES ('60', '20160524466', '96', '有意义', '原因用', '有意义', '1299.00', '1');
INSERT INTO `s47_order` VALUES ('61', '20160524295', '96', '帅华', '13676768787', '上海市', '10497.00', '2');
INSERT INTO `s47_order` VALUES ('62', '20160527835', '97', '23323', '233232', '233232', '999.00', '0');

-- ----------------------------
-- Table structure for s47_ordergoods
-- ----------------------------
DROP TABLE IF EXISTS `s47_ordergoods`;
CREATE TABLE `s47_ordergoods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qty` int(10) unsigned NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_ordergoods
-- ----------------------------
INSERT INTO `s47_ordergoods` VALUES ('3', '12', '1599.00', '1', '13');
INSERT INTO `s47_ordergoods` VALUES ('4', '12', '1599.00', '1', '14');
INSERT INTO `s47_ordergoods` VALUES ('6', '12', '1599.00', '1', '16');
INSERT INTO `s47_ordergoods` VALUES ('7', '12', '1599.00', '1', '17');
INSERT INTO `s47_ordergoods` VALUES ('8', '11', '3499.00', '2', '18');
INSERT INTO `s47_ordergoods` VALUES ('9', '10', '399.00', '1', '18');
INSERT INTO `s47_ordergoods` VALUES ('10', '12', '1599.00', '5', '19');
INSERT INTO `s47_ordergoods` VALUES ('11', '11', '3499.00', '1', '19');
INSERT INTO `s47_ordergoods` VALUES ('12', '8', '1799.00', '1', '19');
INSERT INTO `s47_ordergoods` VALUES ('13', '13', '999.00', '1', '19');
INSERT INTO `s47_ordergoods` VALUES ('14', '8', '1799.00', '7', '20');
INSERT INTO `s47_ordergoods` VALUES ('15', '10', '399.00', '3', '21');
INSERT INTO `s47_ordergoods` VALUES ('16', '12', '1599.00', '1', '22');
INSERT INTO `s47_ordergoods` VALUES ('17', '12', '1599.00', '1', '23');
INSERT INTO `s47_ordergoods` VALUES ('18', '12', '1599.00', '1', '24');
INSERT INTO `s47_ordergoods` VALUES ('19', '12', '1599.00', '1', '25');
INSERT INTO `s47_ordergoods` VALUES ('20', '12', '1599.00', '1', '26');
INSERT INTO `s47_ordergoods` VALUES ('21', '12', '1599.00', '1', '27');
INSERT INTO `s47_ordergoods` VALUES ('22', '12', '1599.00', '1', '28');
INSERT INTO `s47_ordergoods` VALUES ('23', '12', '1599.00', '1', '29');
INSERT INTO `s47_ordergoods` VALUES ('24', '12', '1599.00', '1', '30');
INSERT INTO `s47_ordergoods` VALUES ('25', '12', '1599.00', '1', '31');
INSERT INTO `s47_ordergoods` VALUES ('26', '12', '1599.00', '1', '32');
INSERT INTO `s47_ordergoods` VALUES ('27', '12', '1599.00', '1', '33');
INSERT INTO `s47_ordergoods` VALUES ('28', '12', '1599.00', '1', '34');
INSERT INTO `s47_ordergoods` VALUES ('29', '12', '1599.00', '1', '35');
INSERT INTO `s47_ordergoods` VALUES ('30', '12', '1599.00', '1', '36');
INSERT INTO `s47_ordergoods` VALUES ('31', '12', '1599.00', '1', '37');
INSERT INTO `s47_ordergoods` VALUES ('32', '12', '1599.00', '1', '38');
INSERT INTO `s47_ordergoods` VALUES ('33', '9', '1299.00', '1', '38');
INSERT INTO `s47_ordergoods` VALUES ('34', '12', '1599.00', '1', '39');
INSERT INTO `s47_ordergoods` VALUES ('35', '9', '1299.00', '1', '39');
INSERT INTO `s47_ordergoods` VALUES ('36', '11', '3499.00', '5', '39');
INSERT INTO `s47_ordergoods` VALUES ('37', '11', '3499.00', '5', '40');
INSERT INTO `s47_ordergoods` VALUES ('38', '10', '399.00', '6', '41');
INSERT INTO `s47_ordergoods` VALUES ('39', '13', '999.00', '1', '42');
INSERT INTO `s47_ordergoods` VALUES ('40', '11', '3499.00', '4', '43');
INSERT INTO `s47_ordergoods` VALUES ('41', '10', '399.00', '4', '44');
INSERT INTO `s47_ordergoods` VALUES ('42', '13', '999.00', '6', '45');
INSERT INTO `s47_ordergoods` VALUES ('43', '8', '1799.00', '2', '46');
INSERT INTO `s47_ordergoods` VALUES ('44', '12', '1599.00', '4', '46');
INSERT INTO `s47_ordergoods` VALUES ('45', '11', '3499.00', '2', '46');
INSERT INTO `s47_ordergoods` VALUES ('46', '8', '1799.00', '2', '47');
INSERT INTO `s47_ordergoods` VALUES ('47', '8', '1799.00', '1', '48');
INSERT INTO `s47_ordergoods` VALUES ('48', '8', '1799.00', '3', '49');
INSERT INTO `s47_ordergoods` VALUES ('49', '12', '1599.00', '5', '50');
INSERT INTO `s47_ordergoods` VALUES ('50', '8', '1799.00', '1', '51');
INSERT INTO `s47_ordergoods` VALUES ('51', '24', '388.00', '1', '52');
INSERT INTO `s47_ordergoods` VALUES ('52', '8', '1799.00', '1', '53');
INSERT INTO `s47_ordergoods` VALUES ('53', '8', '1799.00', '1', '54');
INSERT INTO `s47_ordergoods` VALUES ('54', '11', '3499.00', '1', '55');
INSERT INTO `s47_ordergoods` VALUES ('55', '10', '399.00', '1', '56');
INSERT INTO `s47_ordergoods` VALUES ('56', '11', '3499.00', '1', '57');
INSERT INTO `s47_ordergoods` VALUES ('57', '16', '19.90', '2', '58');
INSERT INTO `s47_ordergoods` VALUES ('58', '9', '1299.00', '1', '59');
INSERT INTO `s47_ordergoods` VALUES ('59', '9', '1299.00', '1', '60');
INSERT INTO `s47_ordergoods` VALUES ('60', '11', '3499.00', '3', '61');
INSERT INTO `s47_ordergoods` VALUES ('61', '13', '999.00', '1', '62');

-- ----------------------------
-- Table structure for s47_user
-- ----------------------------
DROP TABLE IF EXISTS `s47_user`;
CREATE TABLE `s47_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pwd` char(32) NOT NULL,
  `tel` char(11) NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '2',
  `email` varchar(255) DEFAULT NULL,
  `logincount` int(10) unsigned DEFAULT '0',
  `head` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s47_user
-- ----------------------------
INSERT INTO `s47_user` VALUES ('1', 'huangchao', '19e7d665ff5530bf4baf739cfc0d4447', '18516604543', '1', '3300696254@qq.com', '13', '2016052357425dcc06a8b.jpg');
INSERT INTO `s47_user` VALUES ('2', 'qqqqq1', '19e7d665ff5530bf4baf739cfc0d4447', '13888888888', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('4', 'eeeee1', '19e7d665ff5530bf4baf739cfc0d4447', '13888888888', '2', '12544334013@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('13', 'ttttt2', '19e7d665ff5530bf4baf739cfc0d4447', '13888888888', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('55', 'zxy1234', '19e7d665ff5530bf4baf739cfc0d4447', '13888888888', '0', '125@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('59', '11', '19e7d665ff5530bf4baf739cfc0d4447', '1', '0', '125@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('64', 'zxy123123', '19e7d665ff5530bf4baf739cfc0d4447', '13888888888', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('66', '11111111111', '19e7d665ff5530bf4baf739cfc0d4447', '111111111', '0', '125@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('72', 'zzzz1', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '1', '1254433013@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('73', 'qqq1', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('75', 'aqwer', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '0', '1254433013@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('76', 'ee1111', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('78', 'a12321', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('79', 'a34343', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('80', 'ad3324324', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('81', 'z1111', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('82', 'qqqqqqqqq', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', null, '0', null);
INSERT INTO `s47_user` VALUES ('83', 'sd333333', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', '1254433013@qq.com', '1', null);
INSERT INTO `s47_user` VALUES ('86', 'aqqqq', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', '1254433013@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('87', 'deeee', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', '1254433013@qq.com', '0', null);
INSERT INTO `s47_user` VALUES ('91', 'zxcvb', '19e7d665ff5530bf4baf739cfc0d4447', '15925892419', '2', '1254433@qq.com', '20', '20160521573ff026711cb.jpg');
INSERT INTO `s47_user` VALUES ('93', 'mts123', '19e7d665ff5530bf4baf739cfc0d4447', '13888884545', '2', '1254433013@qq.com', '1', '20160522574129fc25a29.jpg');
INSERT INTO `s47_user` VALUES ('95', 'admin123', '19e7d665ff5530bf4baf739cfc0d4447', '13888884545', '2', '1254433013@qq.com', '1', '2016052457438e1404e24.jpg');
INSERT INTO `s47_user` VALUES ('96', 'xshxsh', '19e7d665ff5530bf4baf739cfc0d4447', '13888884545', '2', '1254433013@qq.com', '1', null);
INSERT INTO `s47_user` VALUES ('97', 'asdfg', 'e10adc3949ba59abbe56e057f20f883e', '13676768787', '2', '1254433013@qq.com', '6', null);
INSERT INTO `s47_user` VALUES ('98', 'qwert', 'b0baee9d279d34fa1dfd71aadb908c3f', '13888884545', '2', '1254433013@qq.com', '1', null);
INSERT INTO `s47_user` VALUES ('99', 'bbbb', '670b14728ad9902aecba32e22fa4f6bd', '13888883434', '2', '1254433013@qq.com', '0', null);
