<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_collectioncomment`;");
DB_C("CREATE TABLE `pre_forum_collectioncomment` (
  `cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ctid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `useip` varchar(16) NOT NULL DEFAULT '',
  `rate` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `ctid` (`ctid`,`dateline`),
  KEY `userrate` (`ctid`,`uid`,`rate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>