<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_pokearchive`;");
DB_C("CREATE TABLE `pre_home_pokearchive` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `pokeuid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fromuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `iconid` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  KEY `pokeuid` (`pokeuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>