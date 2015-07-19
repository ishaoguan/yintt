<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_template_block`;");
DB_C("CREATE TABLE `pre_common_template_block` (
  `targettplname` varchar(100) NOT NULL DEFAULT '',
  `tpldirectory` varchar(80) NOT NULL DEFAULT '',
  `bid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`targettplname`,`tpldirectory`,`bid`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_template_block` values('group/index','./template/default','1');");
DB_I("replace  into `pre_common_template_block` values('group/index','./template/default','2');");

?>