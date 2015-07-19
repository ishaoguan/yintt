<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_failedlogin`;");
DB_C("CREATE TABLE `pre_common_failedlogin` (
  `ip` char(15) NOT NULL DEFAULT '',
  `username` char(32) NOT NULL DEFAULT '',
  `count` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ip`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_failedlogin` values('176.119.0.187','','1','1356968123');");
DB_I("replace  into `pre_common_failedlogin` values('58.56.29.114','','1','1357635363');");

?>