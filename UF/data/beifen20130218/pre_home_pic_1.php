<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_pic`;");
DB_C("CREATE TABLE `pre_home_pic` (
  `picid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `albumid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `postip` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `size` int(10) unsigned NOT NULL DEFAULT '0',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `thumb` tinyint(1) NOT NULL DEFAULT '0',
  `remote` tinyint(1) NOT NULL DEFAULT '0',
  `hot` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sharetimes` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `click1` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click2` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click3` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click4` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click5` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click6` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click7` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click8` smallint(6) unsigned NOT NULL DEFAULT '0',
  `magicframe` tinyint(6) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`picid`),
  KEY `uid` (`uid`),
  KEY `albumid` (`albumid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>