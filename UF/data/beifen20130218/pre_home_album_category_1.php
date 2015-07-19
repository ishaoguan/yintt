<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_album_category`;");
DB_C("CREATE TABLE `pre_home_album_category` (
  `catid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `upid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(255) NOT NULL DEFAULT '',
  `num` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `displayorder` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>