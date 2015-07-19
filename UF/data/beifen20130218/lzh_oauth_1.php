<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_oauth`;");
DB_C("CREATE TABLE `lzh_oauth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_bind` tinyint(30) NOT NULL DEFAULT '0',
  `site` varchar(30) NOT NULL DEFAULT '',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `logintimes` int(10) unsigned NOT NULL DEFAULT '0',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `bind_uid` int(10) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `site` (`site`,`openid`),
  KEY `uname` (`is_bind`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_oauth` values('17','1','qq','D9A6107DD5C7F9CC8E09C889A5108BEC','风随行','','','5','1355107169','3007','1353910146');");
DB_I("replace  into `lzh_oauth` values('18','0','qq','C02DB769BD7016074652E27DE031CA9D','nothing-dede','','','3','1355106516','3010','1355106052');");
DB_I("replace  into `lzh_oauth` values('19','1','qq','9F58FFFCDF3A51503111F553D48068FB','MM','','','1','1355107206','3011','1355107206');");
DB_I("replace  into `lzh_oauth` values('20','1','qq','0DCC2B0010610EA35259C9382EF26D1C','贷齐乐','','','1','1355278535','3012','1355278535');");
DB_I("replace  into `lzh_oauth` values('21','1','sina','1578783392','@sina1578783392','','','2','1355729836','3013','1355278595');");
DB_I("replace  into `lzh_oauth` values('22','0','qq','9409C8EC1B1B1EACF2ABA770908AF563','华龙通信','','','1','1355832411','3017','1355832411');");
DB_I("replace  into `lzh_oauth` values('23','1','qq','0836A88AB47FA4F7D14BCB03710E74D8','宝宝#','','','1','1356058220','3020','1356058220');");
DB_I("replace  into `lzh_oauth` values('24','1','qq','826C1A69402CD1B1D24EB78DF575715D','宇新','','','2','1356316648','3022','1356316583');");
DB_I("replace  into `lzh_oauth` values('25','0','qq','89C1C1B03D31F1D080BD8E64A7817F94','qzuser','','','1','1356429826','3024','1356429826');");
DB_I("replace  into `lzh_oauth` values('26','0','qq','07A5516C7FA169F981B9B67472DD886E','挥剑','','','3','1356610386','3028','1356610062');");
DB_I("replace  into `lzh_oauth` values('27','0','qq','FBBE0610645D2A716C603ABC350D113A','战斗007','','','1','1356658372','3029','1356658372');");

?>