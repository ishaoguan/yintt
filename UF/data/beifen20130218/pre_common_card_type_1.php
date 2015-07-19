<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_card_type`;");
DB_C("CREATE TABLE `pre_common_card_type` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `typename` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>