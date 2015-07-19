<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_magiclog`;");
DB_C("CREATE TABLE `pre_common_magiclog` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `magicid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `action` tinyint(1) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `amount` smallint(6) unsigned NOT NULL DEFAULT '0',
  `credit` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `price` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `targetid` int(10) unsigned NOT NULL DEFAULT '0',
  `idtype` char(6) DEFAULT NULL,
  `targetuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  KEY `uid` (`uid`,`dateline`),
  KEY `action` (`action`),
  KEY `targetuid` (`targetuid`,`dateline`),
  KEY `magicid` (`magicid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>