<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_connect`;");
DB_C("CREATE TABLE `pre_common_member_connect` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `conuin` char(40) NOT NULL DEFAULT '',
  `conuinsecret` char(16) NOT NULL DEFAULT '',
  `conopenid` char(32) NOT NULL DEFAULT '',
  `conisfeed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `conispublishfeed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `conispublisht` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `conisregister` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `conisqzoneavatar` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `conisqqshow` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `conuin` (`conuin`),
  KEY `conopenid` (`conopenid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>