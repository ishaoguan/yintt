<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_kvtable`;");
DB_C("CREATE TABLE `lzh_kvtable` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `nid` varchar(10) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `son_count` int(10) unsigned NOT NULL,
  `field_1` int(10) unsigned NOT NULL,
  `field_2` int(10) unsigned NOT NULL,
  `field_3` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nid` (`nid`,`value`,`sort_order`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_kvtable` values('2','ftest','club','22','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('4','testeee','club','0','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('5','eeeeeee','club','0','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('6','testfq','fq','1','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('7','ee','fq','0','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('8','test','club','0','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('9','tessdf','show','2','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('10','111','show','2','0','0','0','0');");
DB_I("replace  into `lzh_kvtable` values('12','www.baidu.com','jiequurl','2','0','0','0','0');");

?>