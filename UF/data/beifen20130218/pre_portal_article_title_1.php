<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_portal_article_title`;");
DB_C("CREATE TABLE `pre_portal_article_title` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `bid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `highlight` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(255) NOT NULL DEFAULT '',
  `from` varchar(255) NOT NULL DEFAULT '',
  `fromurl` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `summary` varchar(255) NOT NULL DEFAULT '',
  `pic` varchar(255) NOT NULL DEFAULT '',
  `thumb` tinyint(1) NOT NULL DEFAULT '0',
  `remote` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `idtype` varchar(255) NOT NULL DEFAULT '',
  `contents` smallint(6) NOT NULL DEFAULT '0',
  `allowcomment` tinyint(1) NOT NULL DEFAULT '0',
  `owncomment` tinyint(1) NOT NULL DEFAULT '0',
  `click1` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click2` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click3` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click4` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click5` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click6` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click7` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click8` smallint(6) unsigned NOT NULL DEFAULT '0',
  `tag` tinyint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `showinnernav` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `catid` (`catid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>