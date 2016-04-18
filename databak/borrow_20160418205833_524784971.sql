/* This file is created by MySQLReback 2016-04-18 20:58:33 */
 /* 创建表结构 `admin` */
 DROP TABLE IF EXISTS `admin`;/* MySQLReback Separation */ CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';/* MySQLReback Separation */
 /* 插入数据 `admin` */
 INSERT INTO `admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3');/* MySQLReback Separation */
 /* 创建表结构 `borrow` */
 DROP TABLE IF EXISTS `borrow`;/* MySQLReback Separation */ CREATE TABLE `borrow` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `borrow_number` varchar(50) NOT NULL DEFAULT '' COMMENT '借款序号',
  `contract_number` varchar(50) NOT NULL DEFAULT '' COMMENT '合同号',
  `borrow_uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户',
  `borrow_duration` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '借款期限',
  `borrow_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '借款金额',
  `borrow_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '借款状态 0,未还 1,已还完 2,续借',
  `renew_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '续借的借款id',
  `borrow_interest` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '利息',
  `borrow_interest_rate` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '利率',
  `borrow_procedures` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '手续费',
  `borrow_procedures_rate` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '手续费率',
  `is_procedures` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否已支付手续费',
  `procedures_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '还手续费时间',
  `borrow_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '借款时间',
  `repayment_type` varchar(255) NOT NULL DEFAULT '' COMMENT '还款方式',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `borrow_remarks` varchar(255) NOT NULL DEFAULT '' COMMENT '借款备注',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COMMENT='借款';/* MySQLReback Separation */
 /* 插入数据 `borrow` */
 INSERT INTO `borrow` VALUES ('77','3.1','yzc20160418','3','6.00','1000000.00','0','0','30000.00','6.00','15000.00','1.50','1','1454688000','1454515200','付息还本','1460984032','');/* MySQLReback Separation */
 /* 创建表结构 `borrow_repayment` */
 DROP TABLE IF EXISTS `borrow_repayment`;/* MySQLReback Separation */ CREATE TABLE `borrow_repayment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `borrow_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '借款编号',
  `borrow_uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '借款人',
  `repayment_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '还款金额',
  `repayment_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '还款时间',
  `real_repayment_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '实际还款时间',
  `is_repayment` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否已还款',
  `is_late` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否逾期',
  `late_penalty_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '逾期罚息',
  `late_interest_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '逾期利息',
  `is_late_money` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否收逾期',
  `is_repayment_late_money` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否已收逾期费',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `repayment_remarks` varchar(255) NOT NULL DEFAULT '' COMMENT '还款备注',
  `late_repayment_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '逾期收取时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=215 DEFAULT CHARSET=utf8 COMMENT='还款记录';/* MySQLReback Separation */
 /* 插入数据 `borrow_repayment` */
 INSERT INTO `borrow_repayment` VALUES ('209','77','3','5000.00','1457020800','1457020800','1','0','0.00','0.00','0','0','1460984032','','0'),('210','77','3','5000.00','1459699200','0','0','1','70.00','11.51','1','0','1460984032','逾期','0'),('211','77','3','5000.00','1462291200','0','0','0','0.00','0.00','0','0','1460984032','','0'),('212','77','3','5000.00','1464969600','0','0','0','0.00','0.00','0','0','1460984032','','0'),('213','77','3','5000.00','1467561600','0','0','0','0.00','0.00','0','0','1460984032','','0'),('214','77','3','1005000.00','1470240000','0','0','0','0.00','0.00','0','0','1460984032','','0');/* MySQLReback Separation */
 /* 创建表结构 `borrow_user_relation` */
 DROP TABLE IF EXISTS `borrow_user_relation`;/* MySQLReback Separation */ CREATE TABLE `borrow_user_relation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `borrow_uid` int(11) NOT NULL DEFAULT '0' COMMENT '借款人编号',
  `borrow_id` int(11) NOT NULL DEFAULT '0' COMMENT '借款编号',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='借款用户关联';/* MySQLReback Separation */
 /* 创建表结构 `user` */
 DROP TABLE IF EXISTS `user`;/* MySQLReback Separation */ CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '借款人姓名',
  `phone` varchar(50) NOT NULL DEFAULT '' COMMENT '借款人联系方式',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`Id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='投资人';/* MySQLReback Separation */
 /* 插入数据 `user` */
 INSERT INTO `user` VALUES ('3','羊种草','13839490337','1460983975');/* MySQLReback Separation */