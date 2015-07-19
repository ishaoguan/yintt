<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_threadrush`;");
DB_C("CREATE TABLE `pre_forum_threadrush` (
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `stopfloor` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `starttimefrom` int(10) unsigned NOT NULL DEFAULT '0',
  `starttimeto` int(10) unsigned NOT NULL DEFAULT '0',
  `rewardfloor` text NOT NULL,
  `creditlimit` int(10) NOT NULL DEFAULT '-996',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>