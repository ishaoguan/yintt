<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_imagetype`;");
DB_C("CREATE TABLE `pre_forum_imagetype` (
  `typeid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `name` char(20) NOT NULL,
  `type` enum('smiley','icon','avatar') NOT NULL DEFAULT 'smiley',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `directory` char(100) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_forum_imagetype` values('1','1','默认','smiley','1','default');");
DB_I("replace  into `pre_forum_imagetype` values('2','1','酷猴','smiley','2','coolmonkey');");
DB_I("replace  into `pre_forum_imagetype` values('3','1','呆呆男','smiley','3','grapeman');");

?>