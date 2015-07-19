<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_block`;");
DB_C("CREATE TABLE `pre_common_block` (
  `bid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `blockclass` varchar(255) NOT NULL DEFAULT '0',
  `blocktype` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `title` text NOT NULL,
  `classname` varchar(255) NOT NULL DEFAULT '',
  `summary` text NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `styleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `blockstyle` text NOT NULL,
  `picwidth` smallint(6) unsigned NOT NULL DEFAULT '0',
  `picheight` smallint(6) unsigned NOT NULL DEFAULT '0',
  `target` varchar(255) NOT NULL DEFAULT '',
  `dateformat` varchar(255) NOT NULL DEFAULT '',
  `dateuformat` tinyint(1) NOT NULL DEFAULT '0',
  `script` varchar(255) NOT NULL DEFAULT '',
  `param` text NOT NULL,
  `shownum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `cachetime` int(10) NOT NULL DEFAULT '0',
  `cachetimerange` char(5) NOT NULL DEFAULT '',
  `punctualupdate` tinyint(1) NOT NULL DEFAULT '0',
  `hidedisplay` tinyint(1) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `notinherited` tinyint(1) NOT NULL DEFAULT '0',
  `isblank` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_block` values('1','group_thread','0','','','','','1','admin','0','Array','339','215','blank','Y-m-d','0','groupthread','a:8:{s:5:\"gtids\";a:1:{i:0;s:1:\"0\";}s:12:\"rewardstatus\";s:1:\"0\";s:11:\"titlelength\";s:2:\"40\";s:13:\"summarylength\";s:2:\"80\";s:8:\"startrow\";s:1:\"0\";s:5:\"items\";s:1:\"4\";s:7:\"special\";a:1:{i:0;s:1:\"0\";}s:11:\"picrequired\";s:1:\"1\";}','4','0','','0','0','0','0','0');");
DB_I("replace  into `pre_common_block` values('2','group_thread','0','','','','','1','admin','24','','0','0','blank','Y-m-d','0','groupthreadspecial','a:6:{s:5:\"gtids\";a:1:{i:0;s:1:\"0\";}s:12:\"rewardstatus\";s:1:\"0\";s:11:\"picrequired\";s:1:\"0\";s:11:\"titlelength\";s:2:\"40\";s:13:\"summarylength\";s:2:\"80\";s:5:\"items\";s:2:\"10\";}','10','3600','','0','0','0','0','0');");

?>