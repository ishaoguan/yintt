<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_postcomment`;");
DB_C("CREATE TABLE `pre_forum_postcomment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `author` varchar(15) NOT NULL DEFAULT '',
  `authorid` mediumint(8) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `score` tinyint(1) NOT NULL DEFAULT '0',
  `useip` varchar(15) NOT NULL DEFAULT '',
  `rpid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`),
  KEY `authorid` (`authorid`),
  KEY `score` (`score`),
  KEY `rpid` (`rpid`),
  KEY `pid` (`pid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>