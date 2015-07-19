<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_stat_field`;");
DB_C("CREATE TABLE `pre_common_member_stat_field` (
  `optionid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fieldid` varchar(255) NOT NULL DEFAULT '',
  `fieldvalue` varchar(255) NOT NULL DEFAULT '',
  `hash` varchar(255) NOT NULL DEFAULT '',
  `users` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`optionid`),
  KEY `fieldid` (`fieldid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>