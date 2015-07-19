<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_collectionfollow`;");
DB_C("CREATE TABLE `pre_forum_collectionfollow` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `ctid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`ctid`),
  KEY `ctid` (`ctid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>