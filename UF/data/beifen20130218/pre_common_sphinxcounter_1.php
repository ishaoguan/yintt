<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_sphinxcounter`;");
DB_C("CREATE TABLE `pre_common_sphinxcounter` (
  `indexid` tinyint(1) NOT NULL,
  `maxid` int(10) NOT NULL,
  PRIMARY KEY (`indexid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>