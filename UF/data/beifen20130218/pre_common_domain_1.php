<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_domain`;");
DB_C("CREATE TABLE `pre_common_domain` (
  `domain` char(30) NOT NULL DEFAULT '',
  `domainroot` char(60) NOT NULL DEFAULT '',
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `idtype` char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`idtype`),
  KEY `domain` (`domain`,`domainroot`),
  KEY `idtype` (`idtype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>