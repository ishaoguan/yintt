<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_apply`;");
DB_C("CREATE TABLE `lzh_member_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  `apply_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credit_money` decimal(15,2) NOT NULL,
  `deal_user` int(10) unsigned NOT NULL,
  `deal_time` int(10) unsigned NOT NULL,
  `deal_info` varchar(50) NOT NULL,
  `apply_type` tinyint(3) unsigned NOT NULL,
  `apply_money` decimal(15,2) NOT NULL,
  `apply_info` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_apply` values('168','2970','1348323168','59.175.0.184','1','50000.00','0','0','张玲表弟','1','11.00','11');");
DB_I("replace  into `lzh_member_apply` values('169','2999','1352471192','113.242.95.105','0','0.00','0','0','','1','300000.00','ghjkl');");
DB_I("replace  into `lzh_member_apply` values('170','3020','1356059058','113.240.1.221','1','100000.00','0','0','','1','1000.00','申请说明');");
DB_I("replace  into `lzh_member_apply` values('171','3032','1356958654','124.90.141.6','0','0.00','0','0','','1','1000.00','阿萨德发生的');");

?>