<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_devicetoken`;");
DB_C("CREATE TABLE `pre_common_devicetoken` (
  `uid` mediumint(8) unsigned NOT NULL,
  `token` char(50) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>