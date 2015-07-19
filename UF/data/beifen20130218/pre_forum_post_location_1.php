<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_post_location`;");
DB_C("CREATE TABLE `pre_forum_post_location` (
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(8) unsigned DEFAULT '0',
  `uid` mediumint(8) unsigned DEFAULT '0',
  `mapx` varchar(255) NOT NULL,
  `mapy` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `tid` (`tid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>