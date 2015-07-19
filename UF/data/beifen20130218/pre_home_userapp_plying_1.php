<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_userapp_plying`;");
DB_C("CREATE TABLE `pre_home_userapp_plying` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `appid` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>