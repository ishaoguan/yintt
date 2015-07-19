<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_tagitem`;");
DB_C("CREATE TABLE `pre_common_tagitem` (
  `tagid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `idtype` char(10) NOT NULL DEFAULT '',
  UNIQUE KEY `item` (`tagid`,`itemid`,`idtype`),
  KEY `idtype` (`idtype`,`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_tagitem` values('1','6','tid');");
DB_I("replace  into `pre_common_tagitem` values('1','9','tid');");
DB_I("replace  into `pre_common_tagitem` values('1','12','tid');");
DB_I("replace  into `pre_common_tagitem` values('1','25','tid');");
DB_I("replace  into `pre_common_tagitem` values('2','6','tid');");
DB_I("replace  into `pre_common_tagitem` values('3','6','tid');");
DB_I("replace  into `pre_common_tagitem` values('4','6','tid');");
DB_I("replace  into `pre_common_tagitem` values('5','9','tid');");
DB_I("replace  into `pre_common_tagitem` values('6','12','tid');");
DB_I("replace  into `pre_common_tagitem` values('7','12','tid');");
DB_I("replace  into `pre_common_tagitem` values('8','25','tid');");
DB_I("replace  into `pre_common_tagitem` values('8','33','tid');");
DB_I("replace  into `pre_common_tagitem` values('8','37','tid');");
DB_I("replace  into `pre_common_tagitem` values('9','25','tid');");
DB_I("replace  into `pre_common_tagitem` values('9','30','tid');");
DB_I("replace  into `pre_common_tagitem` values('10','30','tid');");
DB_I("replace  into `pre_common_tagitem` values('11','33','tid');");
DB_I("replace  into `pre_common_tagitem` values('11','37','tid');");
DB_I("replace  into `pre_common_tagitem` values('12','33','tid');");
DB_I("replace  into `pre_common_tagitem` values('13','33','tid');");
DB_I("replace  into `pre_common_tagitem` values('14','37','tid');");
DB_I("replace  into `pre_common_tagitem` values('15','37','tid');");
DB_I("replace  into `pre_common_tagitem` values('16','40','tid');");
DB_I("replace  into `pre_common_tagitem` values('16','43','tid');");
DB_I("replace  into `pre_common_tagitem` values('17','40','tid');");
DB_I("replace  into `pre_common_tagitem` values('18','40','tid');");
DB_I("replace  into `pre_common_tagitem` values('19','41','tid');");
DB_I("replace  into `pre_common_tagitem` values('20','41','tid');");

?>