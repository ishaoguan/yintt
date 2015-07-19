<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_field_home`;");
DB_C("CREATE TABLE `pre_common_member_field_home` (
  `uid` mediumint(8) unsigned NOT NULL,
  `videophoto` varchar(255) NOT NULL DEFAULT '',
  `spacename` varchar(255) NOT NULL DEFAULT '',
  `spacedescription` varchar(255) NOT NULL DEFAULT '',
  `domain` char(15) NOT NULL DEFAULT '',
  `addsize` int(10) unsigned NOT NULL DEFAULT '0',
  `addfriend` smallint(6) unsigned NOT NULL DEFAULT '0',
  `menunum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `theme` varchar(20) NOT NULL DEFAULT '',
  `spacecss` text NOT NULL,
  `blockposition` text NOT NULL,
  `recentnote` text NOT NULL,
  `spacenote` text NOT NULL,
  `privacy` text NOT NULL,
  `feedfriend` mediumtext NOT NULL,
  `acceptemail` text NOT NULL,
  `magicgift` text NOT NULL,
  `stickblogs` text NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_member_field_home` values('1','','','','','0','0','0','','','','网站会不会被黑掉？','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('2','','','','','0','0','0','','','','','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('11','','','','','0','0','0','','','','九洲贷各种标的定义','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('4','','','','','0','0','0','','','','','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('17','','','','','0','0','0','','','','中小企业五招敲开银行贷款大门','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('25','','','','','0','0','0','','','','','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('26','','','','','0','0','0','','','','','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('8','','','','','0','0','0','','','','','','','','','','');");
DB_I("replace  into `pre_common_member_field_home` values('33','','','','','0','0','0','','','','','','','','','','');");

?>