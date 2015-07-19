<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_comment_moderate`;");
DB_C("CREATE TABLE `pre_home_comment_moderate` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `idtype` varchar(15) NOT NULL DEFAULT '',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idtype` (`idtype`,`status`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>