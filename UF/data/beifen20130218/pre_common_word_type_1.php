<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_word_type`;");
DB_C("CREATE TABLE `pre_common_word_type` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_word_type` values('1','政治');");
DB_I("replace  into `pre_common_word_type` values('2','广告');");

?>