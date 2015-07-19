<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_taskvar`;");
DB_C("CREATE TABLE `pre_common_taskvar` (
  `taskvarid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `taskid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `sort` enum('apply','complete') NOT NULL DEFAULT 'complete',
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `variable` varchar(40) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT 'text',
  `value` text NOT NULL,
  PRIMARY KEY (`taskvarid`),
  KEY `taskid` (`taskid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>