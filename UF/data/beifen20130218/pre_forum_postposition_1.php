<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_postposition`;");
DB_C("CREATE TABLE `pre_forum_postposition` (
  `tid` mediumint(8) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tid`,`position`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>