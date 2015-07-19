<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_data_info`;");
DB_C("CREATE TABLE `lzh_member_data_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `data_url` varchar(100) NOT NULL,
  `type` smallint(5) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `data_name` varchar(50) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `ext` varchar(10) NOT NULL,
  `deal_info` varchar(40) NOT NULL,
  `deal_credits` smallint(5) unsigned NOT NULL,
  `deal_user` int(11) NOT NULL,
  `deal_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`type`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=16421 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_data_info` values('16417','2999','UF/Uploads/MemberData/2999/20121109222547440.jpg','3','0','1352471147','文件名称fdjyg','9464','jpg','','0','0','0');");
DB_I("replace  into `lzh_member_data_info` values('16418','2974','UF/Uploads/MemberData/2974/20121218210630773.gif','2','1','1355835990','sdffs','416','gif','1','4002','0','0');");
DB_I("replace  into `lzh_member_data_info` values('16419','3027','','4','1','1356587926','44444','0','',' 寺','20','0','0');");
DB_I("replace  into `lzh_member_data_info` values('16420','3027','UF/Uploads/MemberData/3027/20121227140845644.gif','22','1','1356588526','文件名称又','14802','gif','','0','0','0');");

?>