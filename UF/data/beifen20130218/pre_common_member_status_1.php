<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_status`;");
DB_C("CREATE TABLE `pre_common_member_status` (
  `uid` mediumint(8) unsigned NOT NULL,
  `regip` char(15) NOT NULL DEFAULT '',
  `lastip` char(15) NOT NULL DEFAULT '',
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0',
  `lastactivity` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpost` int(10) unsigned NOT NULL DEFAULT '0',
  `lastsendmail` int(10) unsigned NOT NULL DEFAULT '0',
  `invisible` tinyint(1) NOT NULL DEFAULT '0',
  `buyercredit` smallint(6) NOT NULL DEFAULT '0',
  `sellercredit` smallint(6) NOT NULL DEFAULT '0',
  `favtimes` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sharetimes` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `profileprogress` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `lastactivity` (`lastactivity`,`invisible`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_member_status` values('1','','111.161.47.23','1356440781','1356424996','1349960943','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('2','111.173.199.33','59.173.197.215','1350269502','1349258445','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('11','27.16.134.44','219.140.94.91','1350454143','1350444170','1349960674','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('17','111.175.72.248','111.175.73.62','1350380618','1350292585','1349762257','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('4','Manual Acting','Manual Acting','1350449964','1350449964','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('25','111.175.73.62','59.172.9.112','1352190086','1350608354','1350608568','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('26','118.81.65.128','118.81.65.128','1351460867','1351460867','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('8','60.2.159.150','222.187.112.250','1354278807','1354278807','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_status` values('33','218.26.233.225','218.26.233.225','1356076239','1356076239','0','0','0','0','0','0','0','0');");

?>