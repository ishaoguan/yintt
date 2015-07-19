<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_count`;");
DB_C("CREATE TABLE `pre_common_member_count` (
  `uid` mediumint(8) unsigned NOT NULL,
  `extcredits1` int(10) NOT NULL DEFAULT '0',
  `extcredits2` int(10) NOT NULL DEFAULT '0',
  `extcredits3` int(10) NOT NULL DEFAULT '0',
  `extcredits4` int(10) NOT NULL DEFAULT '0',
  `extcredits5` int(10) NOT NULL DEFAULT '0',
  `extcredits6` int(10) NOT NULL DEFAULT '0',
  `extcredits7` int(10) NOT NULL DEFAULT '0',
  `extcredits8` int(10) NOT NULL DEFAULT '0',
  `friends` smallint(6) unsigned NOT NULL DEFAULT '0',
  `posts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `threads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `digestposts` smallint(6) unsigned NOT NULL DEFAULT '0',
  `doings` smallint(6) unsigned NOT NULL DEFAULT '0',
  `blogs` smallint(6) unsigned NOT NULL DEFAULT '0',
  `albums` smallint(6) unsigned NOT NULL DEFAULT '0',
  `sharings` smallint(6) unsigned NOT NULL DEFAULT '0',
  `attachsize` int(10) unsigned NOT NULL DEFAULT '0',
  `views` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `oltime` smallint(6) unsigned NOT NULL DEFAULT '0',
  `todayattachs` smallint(6) unsigned NOT NULL DEFAULT '0',
  `todayattachsize` int(10) unsigned NOT NULL DEFAULT '0',
  `feeds` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `follower` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `following` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `newfollower` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `posts` (`posts`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_member_count` values('1','0','110','0','0','0','0','0','0','0','36','36','0','0','0','0','0','0','0','19','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('2','0','14','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('11','0','26','0','0','0','0','0','0','0','4','4','0','0','0','0','0','0','0','4','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('17','0','18','0','0','0','0','0','0','0','6','6','0','0','0','0','0','0','0','1','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('4','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('25','0','6','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('26','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('8','0','4','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member_count` values('33','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");

?>