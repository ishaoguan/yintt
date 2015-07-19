<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member_crime`;");
DB_C("CREATE TABLE `pre_common_member_crime` (
  `cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `operatorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `operator` varchar(15) NOT NULL,
  `action` tinyint(5) NOT NULL,
  `reason` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `uid` (`uid`,`action`,`dateline`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_member_crime` values('1','11','1','admin','1',' &nbsp; <a href=\"forum.php?mod=redirect&goto=findpost&pid=0&ptid=46\" target=\"_blank\" class=\"xi2\">查看详情</a>','1353729596');");

?>