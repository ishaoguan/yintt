<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_blog`;");
DB_C("CREATE TABLE `pre_home_blog` (
  `blogid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `subject` char(80) NOT NULL DEFAULT '',
  `classid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `catid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `viewnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `replynum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hot` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `picflag` tinyint(1) NOT NULL DEFAULT '0',
  `noreply` tinyint(1) NOT NULL DEFAULT '0',
  `friend` tinyint(1) NOT NULL DEFAULT '0',
  `password` char(10) NOT NULL DEFAULT '',
  `favtimes` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sharetimes` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `click1` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click2` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click3` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click4` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click5` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click6` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click7` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click8` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogid`),
  KEY `uid` (`uid`,`dateline`),
  KEY `hot` (`hot`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>