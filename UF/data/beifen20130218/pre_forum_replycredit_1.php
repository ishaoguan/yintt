<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_replycredit`;");
DB_C("CREATE TABLE `pre_forum_replycredit` (
  `tid` mediumint(6) unsigned NOT NULL,
  `extcredits` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `extcreditstype` tinyint(1) NOT NULL DEFAULT '0',
  `times` smallint(6) unsigned NOT NULL DEFAULT '0',
  `membertimes` smallint(6) unsigned NOT NULL DEFAULT '0',
  `random` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>