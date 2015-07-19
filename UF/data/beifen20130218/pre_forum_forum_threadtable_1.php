<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_forum_threadtable`;");
DB_C("CREATE TABLE `pre_forum_forum_threadtable` (
  `fid` smallint(6) unsigned NOT NULL,
  `threadtableid` smallint(6) unsigned NOT NULL,
  `threads` int(11) unsigned NOT NULL DEFAULT '0',
  `posts` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`,`threadtableid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>