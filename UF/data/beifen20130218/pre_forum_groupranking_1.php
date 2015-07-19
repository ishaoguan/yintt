<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_groupranking`;");
DB_C("CREATE TABLE `pre_forum_groupranking` (
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `yesterday` smallint(6) unsigned NOT NULL DEFAULT '0',
  `today` smallint(6) unsigned NOT NULL DEFAULT '0',
  `trend` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`),
  KEY `today` (`today`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>