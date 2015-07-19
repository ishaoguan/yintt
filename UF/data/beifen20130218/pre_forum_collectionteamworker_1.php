<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_collectionteamworker`;");
DB_C("CREATE TABLE `pre_forum_collectionteamworker` (
  `ctid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(15) NOT NULL DEFAULT '',
  `lastvisit` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ctid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>