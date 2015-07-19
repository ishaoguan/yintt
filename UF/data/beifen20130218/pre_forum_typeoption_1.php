<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_typeoption`;");
DB_C("CREATE TABLE `pre_forum_typeoption` (
  `optionid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `classid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `expiration` tinyint(1) NOT NULL,
  `protect` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `identifier` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `unit` varchar(255) NOT NULL,
  `rules` mediumtext NOT NULL,
  `permprompt` mediumtext NOT NULL,
  PRIMARY KEY (`optionid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_forum_typeoption` values('1','0','0','0','','分类A','','','','','','');");
DB_I("replace  into `pre_forum_typeoption` values('2','0','0','0','','分类B','','','','','','');");
DB_I("replace  into `pre_forum_typeoption` values('3','0','0','0','','分类C','','','','','','');");
DB_I("replace  into `pre_forum_typeoption` values('4','0','0','0','','分类D','','','','','','');");
DB_I("replace  into `pre_forum_typeoption` values('5','0','0','0','','分类E','','','','','','');");
DB_I("replace  into `pre_forum_typeoption` values('6','0','0','0','','分类F','','','','','','');");

?>