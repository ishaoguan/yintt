<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_groupcreditslog`;");
DB_C("CREATE TABLE `pre_forum_groupcreditslog` (
  `fid` mediumint(8) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL,
  `logdate` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`,`uid`,`logdate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>