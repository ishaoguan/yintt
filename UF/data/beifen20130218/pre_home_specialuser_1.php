<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_specialuser`;");
DB_C("CREATE TABLE `pre_home_specialuser` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) NOT NULL DEFAULT '0',
  `reason` text NOT NULL,
  `opuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `opusername` varchar(15) NOT NULL DEFAULT '',
  `displayorder` mediumint(8) unsigned NOT NULL DEFAULT '0',
  KEY `uid` (`uid`,`status`),
  KEY `displayorder` (`status`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>