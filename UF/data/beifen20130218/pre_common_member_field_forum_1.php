<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_field_forum`;");
DB_C("CREATE TABLE `pre_common_member_field_forum` (
  `uid` mediumint(8) unsigned NOT NULL,
  `publishfeed` tinyint(3) NOT NULL DEFAULT '0',
  `customshow` tinyint(1) unsigned NOT NULL DEFAULT '26',
  `customstatus` varchar(30) NOT NULL DEFAULT '',
  `medals` text NOT NULL,
  `sightml` text NOT NULL,
  `groupterms` text NOT NULL,
  `authstr` varchar(20) NOT NULL DEFAULT '',
  `groups` mediumtext NOT NULL,
  `attentiongroup` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_member_field_forum` values('1','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('2','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('11','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('17','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('4','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('25','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('26','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('8','0','26','','','','','','','');");
DB_I("replace  into `pre_common_member_field_forum` values('33','0','26','','','','','','','');");

?>