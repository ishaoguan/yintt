<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_banks`;");
DB_C("CREATE TABLE `lzh_member_banks` (
  `uid` int(10) unsigned NOT NULL,
  `bank_num` varchar(50) NOT NULL,
  `bank_province` varchar(20) NOT NULL,
  `bank_city` varchar(20) NOT NULL,
  `bank_address` varchar(100) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_banks` values('2971','4340612871209287','湖北','武汉','建设银行黄陂潘家田','中国银行','1349000136','27.16.134.44');");
DB_I("replace  into `lzh_member_banks` values('2974','622909346822126819','重庆','重庆','士大夫大师傅大师傅','兴业银行','1351656444','110.232.50.204');");

?>