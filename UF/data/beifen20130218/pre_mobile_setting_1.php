<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_mobile_setting`;");
DB_C("CREATE TABLE `pre_mobile_setting` (
  `skey` varchar(255) NOT NULL DEFAULT '',
  `svalue` text NOT NULL,
  PRIMARY KEY (`skey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_mobile_setting` values('extend_used','1');");
DB_I("replace  into `pre_mobile_setting` values('extend_lastupdate','1343182299');");

?>