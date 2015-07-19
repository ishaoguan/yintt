<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_myapp`;");
DB_C("CREATE TABLE `pre_common_myapp` (
  `appid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `appname` varchar(60) NOT NULL DEFAULT '',
  `narrow` tinyint(1) NOT NULL DEFAULT '0',
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  `version` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `userpanelarea` tinyint(1) NOT NULL DEFAULT '0',
  `canvastitle` varchar(60) NOT NULL DEFAULT '',
  `fullscreen` tinyint(1) NOT NULL DEFAULT '0',
  `displayuserpanel` tinyint(1) NOT NULL DEFAULT '0',
  `displaymethod` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `appstatus` tinyint(2) NOT NULL DEFAULT '0',
  `iconstatus` tinyint(2) NOT NULL DEFAULT '0',
  `icondowntime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`appid`),
  KEY `flag` (`flag`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>