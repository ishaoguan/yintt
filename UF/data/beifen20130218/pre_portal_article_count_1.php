<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_portal_article_count`;");
DB_C("CREATE TABLE `pre_portal_article_count` (
  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `viewnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `commentnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `favtimes` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sharetimes` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>