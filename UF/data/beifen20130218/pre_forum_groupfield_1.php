<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_groupfield`;");
DB_C("CREATE TABLE `pre_forum_groupfield` (
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `privacy` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `data` text NOT NULL,
  UNIQUE KEY `types` (`fid`,`type`),
  KEY `fid` (`fid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>