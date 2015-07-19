<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_friend`;");
DB_C("CREATE TABLE `lzh_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_txt` varchar(50) NOT NULL,
  `link_href` varchar(50) NOT NULL,
  `link_img` varchar(100) NOT NULL DEFAULT ' ',
  `link_order` int(1) NOT NULL DEFAULT '0',
  `link_type` int(1) NOT NULL DEFAULT '0',
  `is_show` int(1) NOT NULL DEFAULT '1',
  `game_id` int(11) NOT NULL DEFAULT '0',
  `game_name` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_friend` values('26','网贷点评网','http://www.wangdaidp.com','./UF/Uploads/Friends/wangdaidp4.gif','20','1','1','0','');");

?>