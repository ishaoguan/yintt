<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_groupuser`;");
DB_C("CREATE TABLE `pre_forum_groupuser` (
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `threads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `replies` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `joindateline` int(10) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
  `privacy` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`,`uid`),
  KEY `uid_lastupdate` (`uid`,`lastupdate`),
  KEY `userlist` (`fid`,`level`,`lastupdate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>