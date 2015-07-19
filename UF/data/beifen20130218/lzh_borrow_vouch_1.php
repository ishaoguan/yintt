<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_borrow_vouch`;");
DB_C("CREATE TABLE `lzh_borrow_vouch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `borrow_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `vouch_money` decimal(15,2) NOT NULL,
  `vouch_reward_rate` decimal(4,2) NOT NULL,
  `vouch_reward_money` decimal(15,2) NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  `vouch_time` int(11) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `substitute_money` decimal(15,2) NOT NULL,
  `get_back` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `borrow_id` (`borrow_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_borrow_vouch` values('1','133','836','会飞的小鱼','15000.00','0.00','0.00','60.213.87.66','1347714014','0','0.00','0.00');");

?>