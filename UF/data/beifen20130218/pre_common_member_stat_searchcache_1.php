<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_stat_searchcache`;");
DB_C("CREATE TABLE `pre_common_member_stat_searchcache` (
  `optionid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`optionid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>