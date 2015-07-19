<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_threadimage`;");
DB_C("CREATE TABLE `pre_forum_threadimage` (
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `attachment` varchar(255) NOT NULL DEFAULT '',
  `remote` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>