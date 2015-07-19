<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_grouppm`;");
DB_C("CREATE TABLE `pre_common_member_grouppm` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `gpmid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`gpmid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>