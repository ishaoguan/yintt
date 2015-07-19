<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_connect_tthreadlog`;");
DB_C("CREATE TABLE `pre_connect_tthreadlog` (
  `twid` char(16) NOT NULL,
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `conopenid` char(32) NOT NULL,
  `pagetime` int(10) unsigned DEFAULT '0',
  `lasttwid` char(16) DEFAULT NULL,
  `nexttime` int(10) unsigned DEFAULT '0',
  `updatetime` int(10) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`twid`),
  KEY `nexttime` (`tid`,`nexttime`),
  KEY `updatetime` (`tid`,`updatetime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>