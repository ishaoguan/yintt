<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_ausers`;");
DB_C("CREATE TABLE `lzh_ausers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `u_group_id` smallint(6) NOT NULL,
  `real_name` varchar(20) NOT NULL DEFAULT '匿名',
  `last_log_time` int(10) NOT NULL DEFAULT '0',
  `last_log_ip` varchar(30) NOT NULL DEFAULT '0',
  `is_ban` int(1) NOT NULL DEFAULT '0',
  `area_id` int(11) NOT NULL,
  `area_name` varchar(10) NOT NULL,
  `is_kf` int(10) unsigned NOT NULL DEFAULT '0',
  `qq` varchar(20) NOT NULL COMMENT '管理员qq',
  `phone` varchar(20) NOT NULL COMMENT '客服电话',
  PRIMARY KEY (`id`),
  KEY `is_kf` (`is_kf`,`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_ausers` values('104','朱玮','4b9e99615a8feda104c53fdebf7a183c','5','朱玮','0','0','0','1','中国','1','713050119','13856923658');");
DB_I("replace  into `lzh_ausers` values('103','贷齐乐玲玲','e10adc3949ba59abbe56e057f20f883e','22','张玲','0','0','0','1','中国','1','123456','4568979');");
DB_I("replace  into `lzh_ausers` values('102','贷齐乐燕燕','e10adc3949ba59abbe56e057f20f883e','22','曹艳','0','0','0','1','中国','1','512463258','18625965843');");
DB_I("replace  into `lzh_ausers` values('101','admin','1064f3b20a66813e8076bc24b3500bef','5','张敏','0','0','0','1','中国','0','110355235','18656842567');");
DB_I("replace  into `lzh_ausers` values('100','daiqile','1064f3b20a66813e8076bc24b3500bef','5','五志','0','0','0','1','中国','0','1523568','15645896235');");
DB_I("replace  into `lzh_ausers` values('106','ceshi','e10adc3949ba59abbe56e057f20f883e','23','后台测试 权限有限','0','0','0','1','中国','0','12345678','15936856324');");

?>