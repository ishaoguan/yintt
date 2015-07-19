<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_stat`;");
DB_C("CREATE TABLE `pre_common_stat` (
  `daytime` int(10) unsigned NOT NULL DEFAULT '0',
  `login` int(10) unsigned NOT NULL DEFAULT '0',
  `mobilelogin` int(10) unsigned NOT NULL DEFAULT '0',
  `connectlogin` int(10) unsigned NOT NULL DEFAULT '0',
  `register` int(10) unsigned NOT NULL DEFAULT '0',
  `invite` int(10) unsigned NOT NULL DEFAULT '0',
  `appinvite` int(10) unsigned NOT NULL DEFAULT '0',
  `doing` int(10) unsigned NOT NULL DEFAULT '0',
  `blog` int(10) unsigned NOT NULL DEFAULT '0',
  `pic` int(10) unsigned NOT NULL DEFAULT '0',
  `poll` int(10) unsigned NOT NULL DEFAULT '0',
  `activity` int(10) unsigned NOT NULL DEFAULT '0',
  `share` int(10) unsigned NOT NULL DEFAULT '0',
  `thread` int(10) unsigned NOT NULL DEFAULT '0',
  `docomment` int(10) unsigned NOT NULL DEFAULT '0',
  `blogcomment` int(10) unsigned NOT NULL DEFAULT '0',
  `piccomment` int(10) unsigned NOT NULL DEFAULT '0',
  `sharecomment` int(10) unsigned NOT NULL DEFAULT '0',
  `reward` int(10) unsigned NOT NULL DEFAULT '0',
  `debate` int(10) unsigned NOT NULL DEFAULT '0',
  `trade` int(10) unsigned NOT NULL DEFAULT '0',
  `group` int(10) unsigned NOT NULL DEFAULT '0',
  `groupjoin` int(10) unsigned NOT NULL DEFAULT '0',
  `groupthread` int(10) unsigned NOT NULL DEFAULT '0',
  `grouppost` int(10) unsigned NOT NULL DEFAULT '0',
  `post` int(10) unsigned NOT NULL DEFAULT '0',
  `wall` int(10) unsigned NOT NULL DEFAULT '0',
  `poke` int(10) unsigned NOT NULL DEFAULT '0',
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `sendpm` int(10) unsigned NOT NULL DEFAULT '0',
  `friend` int(10) unsigned NOT NULL DEFAULT '0',
  `addfriend` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`daytime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_stat` values('20120923','2','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20120926','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20120927','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20120928','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20120930','2','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121001','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121002','1','0','0','0','0','0','0','0','0','0','0','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121003','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121004','1','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121006','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121008','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121009','2','0','0','1','0','0','0','0','0','0','0','0','41','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121010','2','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121011','2','0','0','0','0','0','0','0','0','0','0','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121012','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121013','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121015','4','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121016','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121017','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121018','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121019','1','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121029','2','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121030','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121102','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121104','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121106','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121124','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121130','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121221','2','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121222','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121223','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_stat` values('20121225','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");

?>