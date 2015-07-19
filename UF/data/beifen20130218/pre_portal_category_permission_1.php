<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_portal_category_permission`;");
DB_C("CREATE TABLE `pre_portal_category_permission` (
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `allowpublish` tinyint(1) NOT NULL DEFAULT '0',
  `allowmanage` tinyint(1) NOT NULL DEFAULT '0',
  `inheritedcatid` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`catid`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>