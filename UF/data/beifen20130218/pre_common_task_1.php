<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_task`;");
DB_C("CREATE TABLE `pre_common_task` (
  `taskid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `relatedtaskid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `icon` varchar(150) NOT NULL DEFAULT '',
  `applicants` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `achievers` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tasklimits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `applyperm` text NOT NULL,
  `scriptname` varchar(50) NOT NULL DEFAULT '',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `period` int(10) unsigned NOT NULL DEFAULT '0',
  `periodtype` tinyint(1) NOT NULL DEFAULT '0',
  `reward` enum('credit','magic','medal','invite','group') NOT NULL DEFAULT 'credit',
  `prize` varchar(15) NOT NULL DEFAULT '',
  `bonus` int(10) NOT NULL DEFAULT '0',
  `displayorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `version` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`taskid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>