<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_magic`;");
DB_C("CREATE TABLE `pre_common_member_magic` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `magicid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `num` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`magicid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>