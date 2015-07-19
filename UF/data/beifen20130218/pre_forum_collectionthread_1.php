<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_collectionthread`;");
DB_C("CREATE TABLE `pre_forum_collectionthread` (
  `ctid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ctid`,`tid`),
  KEY `ctid` (`ctid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>