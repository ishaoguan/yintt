<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_face_apply`;");
DB_C("CREATE TABLE `lzh_face_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  `apply_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credits` int(11) NOT NULL DEFAULT '0',
  `deal_user` int(10) unsigned NOT NULL,
  `deal_time` int(10) unsigned NOT NULL,
  `deal_info` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_face_apply` values('1','2872','1347256240','112.233.57.157','1','0','18','1347261128','审核通过！');");
DB_I("replace  into `lzh_face_apply` values('2','2851','1347258482','112.251.90.222','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('3','2670','1347321480','112.241.18.183','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('4','1346','1347340445','222.132.162.158','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('5','499','1347343331','119.176.164.223','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('6','87','1347375836','222.247.159.27','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('7','2192','1347376862','112.228.203.8','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('8','2151','1347377010','112.228.203.8','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('9','2126','1347378062','112.228.203.8','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('10','2841','1347396787','112.82.228.140','2','0','13','1347506479','');");
DB_I("replace  into `lzh_face_apply` values('11','2862','1347413033','112.251.31.209','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('12','692','1347440809','112.233.82.66','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('13','355','1347446097','123.132.246.255','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('14','2733','1347495221','27.197.130.112','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('15','2771','1347501185','27.197.130.112','0','0','0','0','');");
DB_I("replace  into `lzh_face_apply` values('16','438','1347516309','112.233.62.77','1','1231','2','1347811750','233');");
DB_I("replace  into `lzh_face_apply` values('17','2968','1347908669','127.0.0.1','1','0','2','1347908677','wef');");
DB_I("replace  into `lzh_face_apply` values('18','2970','1348323899','59.175.0.184','1','0','106','1353778475','');");
DB_I("replace  into `lzh_face_apply` values('19','2978','1348898469','59.175.171.186','1','10','100','1348973919','朱玮的同学');");
DB_I("replace  into `lzh_face_apply` values('20','3027','1356589336','116.208.86.178','1','0','106','1356589411','');");

?>