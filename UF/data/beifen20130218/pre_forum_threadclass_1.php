<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_threadclass`;");
DB_C("CREATE TABLE `pre_forum_threadclass` (
  `typeid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fid` mediumint(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `displayorder` mediumint(9) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `moderators` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`typeid`),
  KEY `fid` (`fid`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>