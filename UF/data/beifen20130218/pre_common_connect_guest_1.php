<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_connect_guest`;");
DB_C("CREATE TABLE `pre_common_connect_guest` (
  `conopenid` char(32) NOT NULL DEFAULT '',
  `conuin` char(40) NOT NULL DEFAULT '',
  `conuinsecret` char(16) NOT NULL DEFAULT '',
  `conqqnick` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`conopenid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>