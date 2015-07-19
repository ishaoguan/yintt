<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_security_eviluser`;");
DB_C("CREATE TABLE `pre_security_eviluser` (
  `uid` int(10) unsigned NOT NULL,
  `evilcount` int(10) NOT NULL DEFAULT '0',
  `eviltype` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `operateresult` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isreported` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `operateresult` (`operateresult`,`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>