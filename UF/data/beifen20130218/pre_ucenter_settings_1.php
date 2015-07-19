<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_ucenter_settings`;");
DB_C("CREATE TABLE `pre_ucenter_settings` (
  `k` varchar(32) NOT NULL DEFAULT '',
  `v` text NOT NULL,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_ucenter_settings` values('accessemail','');");
DB_I("replace  into `pre_ucenter_settings` values('censoremail','');");
DB_I("replace  into `pre_ucenter_settings` values('censorusername','');");
DB_I("replace  into `pre_ucenter_settings` values('dateformat','y-n-j');");
DB_I("replace  into `pre_ucenter_settings` values('doublee','0');");
DB_I("replace  into `pre_ucenter_settings` values('nextnotetime','0');");
DB_I("replace  into `pre_ucenter_settings` values('timeoffset','28800');");
DB_I("replace  into `pre_ucenter_settings` values('privatepmthreadlimit','25');");
DB_I("replace  into `pre_ucenter_settings` values('chatpmthreadlimit','30');");
DB_I("replace  into `pre_ucenter_settings` values('chatpmmemberlimit','35');");
DB_I("replace  into `pre_ucenter_settings` values('pmfloodctrl','15');");
DB_I("replace  into `pre_ucenter_settings` values('pmcenter','1');");
DB_I("replace  into `pre_ucenter_settings` values('sendpmseccode','1');");
DB_I("replace  into `pre_ucenter_settings` values('pmsendregdays','0');");
DB_I("replace  into `pre_ucenter_settings` values('maildefault','username@21cn.com');");
DB_I("replace  into `pre_ucenter_settings` values('mailsend','1');");
DB_I("replace  into `pre_ucenter_settings` values('mailserver','smtp.21cn.com');");
DB_I("replace  into `pre_ucenter_settings` values('mailport','25');");
DB_I("replace  into `pre_ucenter_settings` values('mailauth','1');");
DB_I("replace  into `pre_ucenter_settings` values('mailfrom','UCenter <username@21cn.com>');");
DB_I("replace  into `pre_ucenter_settings` values('mailauth_username','username@21cn.com');");
DB_I("replace  into `pre_ucenter_settings` values('mailauth_password','password');");
DB_I("replace  into `pre_ucenter_settings` values('maildelimiter','0');");
DB_I("replace  into `pre_ucenter_settings` values('mailusername','1');");
DB_I("replace  into `pre_ucenter_settings` values('mailsilent','1');");
DB_I("replace  into `pre_ucenter_settings` values('version','1.6.0');");

?>