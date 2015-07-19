<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_process`;");
DB_C("CREATE TABLE `pre_common_process` (
  `processid` char(32) NOT NULL,
  `expiry` int(10) DEFAULT NULL,
  `extra` int(10) DEFAULT NULL,
  PRIMARY KEY (`processid`),
  KEY `expiry` (`expiry`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8");

?>