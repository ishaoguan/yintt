<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_security_failedlog`;");
DB_C("CREATE TABLE `pre_security_failedlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reporttype` char(20) NOT NULL,
  `tid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `failcount` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `posttime` int(10) unsigned NOT NULL DEFAULT '0',
  `delreason` char(255) NOT NULL,
  `scheduletime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastfailtime` int(10) unsigned NOT NULL DEFAULT '0',
  `extra1` int(10) unsigned NOT NULL,
  `extra2` char(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>