<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_block_item_data`;");
DB_C("CREATE TABLE `pre_common_block_item_data` (
  `dataid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `idtype` varchar(255) NOT NULL DEFAULT '',
  `itemtype` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `pic` varchar(255) NOT NULL DEFAULT '',
  `picflag` tinyint(1) NOT NULL DEFAULT '0',
  `makethumb` tinyint(1) NOT NULL DEFAULT '0',
  `summary` text NOT NULL,
  `showstyle` text NOT NULL,
  `related` text NOT NULL,
  `fields` text NOT NULL,
  `displayorder` smallint(6) NOT NULL DEFAULT '0',
  `startdate` int(10) unsigned NOT NULL DEFAULT '0',
  `enddate` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `isverified` tinyint(1) NOT NULL DEFAULT '0',
  `verifiedtime` int(10) unsigned NOT NULL DEFAULT '0',
  `stickgrade` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`dataid`),
  KEY `bid` (`bid`,`stickgrade`,`verifiedtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>