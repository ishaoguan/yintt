<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_portal_article_related`;");
DB_C("CREATE TABLE `pre_portal_article_related` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `raid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `displayorder` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`,`raid`),
  KEY `aid` (`aid`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>