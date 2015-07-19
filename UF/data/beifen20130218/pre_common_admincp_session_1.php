<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_admincp_session`;");
DB_C("CREATE TABLE `pre_common_admincp_session` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `panel` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `errorcount` tinyint(1) NOT NULL DEFAULT '0',
  `storage` mediumtext NOT NULL,
  PRIMARY KEY (`uid`,`panel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_admincp_session` values('1','1','1','111.161.47.23','1356440093','-1','');");

?>