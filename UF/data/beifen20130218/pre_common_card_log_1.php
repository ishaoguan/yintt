<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_card_log`;");
DB_C("CREATE TABLE `pre_common_card_log` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL DEFAULT '',
  `cardrule` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `description` mediumtext NOT NULL,
  `operation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `dateline` (`dateline`),
  KEY `operation_dateline` (`operation`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>