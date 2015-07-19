<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_onlinetime`;");
DB_C("CREATE TABLE `pre_common_onlinetime` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `thismonth` smallint(6) unsigned NOT NULL DEFAULT '0',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_onlinetime` values('1','0','1260','1356439717');");
DB_I("replace  into `pre_common_onlinetime` values('11','0','220','1350454143');");
DB_I("replace  into `pre_common_onlinetime` values('2','0','20','1349258445');");
DB_I("replace  into `pre_common_onlinetime` values('17','0','30','1350292585');");
DB_I("replace  into `pre_common_onlinetime` values('25','0','10','1350608354');");
DB_I("replace  into `pre_common_onlinetime` values('8','0','10','1354278807');");

?>