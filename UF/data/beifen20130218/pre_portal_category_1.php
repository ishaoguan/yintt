<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_portal_category`;");
DB_C("CREATE TABLE `pre_portal_category` (
  `catid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `upid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(255) NOT NULL DEFAULT '',
  `articles` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `allowcomment` tinyint(1) NOT NULL DEFAULT '1',
  `displayorder` smallint(6) NOT NULL DEFAULT '0',
  `notinheritedarticle` tinyint(1) NOT NULL DEFAULT '0',
  `notinheritedblock` tinyint(1) NOT NULL DEFAULT '0',
  `domain` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `shownav` tinyint(1) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `seotitle` text NOT NULL,
  `keyword` text NOT NULL,
  `primaltplname` varchar(255) NOT NULL DEFAULT '',
  `articleprimaltplname` varchar(255) NOT NULL DEFAULT '',
  `disallowpublish` tinyint(1) NOT NULL DEFAULT '0',
  `foldername` varchar(255) NOT NULL DEFAULT '',
  `notshowarticlesummay` varchar(255) NOT NULL DEFAULT '',
  `perpage` smallint(6) NOT NULL DEFAULT '0',
  `maxpages` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>