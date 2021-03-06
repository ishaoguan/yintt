<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_access`;");
DB_C("CREATE TABLE `pre_forum_access` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `allowview` tinyint(1) NOT NULL DEFAULT '0',
  `allowpost` tinyint(1) NOT NULL DEFAULT '0',
  `allowreply` tinyint(1) NOT NULL DEFAULT '0',
  `allowgetattach` tinyint(1) NOT NULL DEFAULT '0',
  `allowgetimage` tinyint(1) NOT NULL DEFAULT '0',
  `allowpostattach` tinyint(1) NOT NULL DEFAULT '0',
  `allowpostimage` tinyint(1) NOT NULL DEFAULT '0',
  `adminuser` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`fid`),
  KEY `listorder` (`fid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>