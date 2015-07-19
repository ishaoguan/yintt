<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_threaddisablepos`;");
DB_C("CREATE TABLE `pre_forum_threaddisablepos` (
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8");

?>