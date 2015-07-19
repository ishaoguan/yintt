<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_card`;");
DB_C("CREATE TABLE `pre_common_card` (
  `id` char(255) NOT NULL DEFAULT '',
  `typeid` smallint(6) unsigned NOT NULL DEFAULT '1',
  `maketype` tinyint(1) NOT NULL DEFAULT '0',
  `makeruid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `price` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `extcreditskey` tinyint(1) NOT NULL DEFAULT '0',
  `extcreditsval` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `cleardateline` int(10) unsigned NOT NULL DEFAULT '0',
  `useddateline` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>