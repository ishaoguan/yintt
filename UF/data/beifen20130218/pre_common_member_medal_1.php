<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_medal`;");
DB_C("CREATE TABLE `pre_common_member_medal` (
  `uid` mediumint(8) unsigned NOT NULL,
  `medalid` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`uid`,`medalid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>