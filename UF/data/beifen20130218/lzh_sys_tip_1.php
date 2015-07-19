<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_sys_tip`;");
DB_C("CREATE TABLE `lzh_sys_tip` (
  `uid` int(10) unsigned NOT NULL,
  `tipset` varchar(300) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `tipset` (`tipset`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_sys_tip` values('1','chk1_1,chk1_2,chk9_1,chk9_2,chk10_1,chk10_2,chk11_1,chk27_1,chk27_2,chk14_1,chk14_2,chk15_1,chk15_2,chk16_1,chk16_2,chk18_1,chk18_2,');");
DB_I("replace  into `lzh_sys_tip` values('94','chk27_1,chk27_2,chk14_1,chk14_2,');");
DB_I("replace  into `lzh_sys_tip` values('91','chk14_1,chk14_2,chk15_1,chk15_2,');");

?>