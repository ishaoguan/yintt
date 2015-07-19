<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_usergroup`;");
DB_C("CREATE TABLE `pre_common_usergroup` (
  `groupid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `radminid` tinyint(3) NOT NULL DEFAULT '0',
  `type` enum('system','special','member') NOT NULL DEFAULT 'member',
  `system` varchar(255) NOT NULL DEFAULT 'private',
  `grouptitle` varchar(255) NOT NULL DEFAULT '',
  `creditshigher` int(10) NOT NULL DEFAULT '0',
  `creditslower` int(10) NOT NULL DEFAULT '0',
  `stars` tinyint(3) NOT NULL DEFAULT '0',
  `color` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `allowvisit` tinyint(1) NOT NULL DEFAULT '0',
  `allowsendpm` tinyint(1) NOT NULL DEFAULT '1',
  `allowinvite` tinyint(1) NOT NULL DEFAULT '0',
  `allowmailinvite` tinyint(1) NOT NULL DEFAULT '0',
  `maxinvitenum` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `inviteprice` smallint(6) unsigned NOT NULL DEFAULT '0',
  `maxinviteday` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupid`),
  KEY `creditsrange` (`creditshigher`,`creditslower`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_usergroup` values('1','1','system','private','管理员','0','0','9','','','1','1','1','1','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('2','2','system','private','超级版主','0','0','8','','','1','1','1','1','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('3','3','system','private','版主','0','0','7','','','1','1','1','1','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('4','0','system','private','禁止发言','0','0','0','','','1','1','0','0','0','0','0');");
DB_I("replace  into `pre_common_usergroup` values('5','0','system','private','禁止访问','0','0','0','','','0','1','0','0','0','0','0');");
DB_I("replace  into `pre_common_usergroup` values('6','0','system','private','禁止 IP','0','0','0','','','0','1','0','0','0','0','0');");
DB_I("replace  into `pre_common_usergroup` values('7','0','system','private','游客','0','0','0','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('8','0','system','private','等待验证会员','0','0','0','','','1','1','0','0','0','0','0');");
DB_I("replace  into `pre_common_usergroup` values('9','0','member','private','限制会员','-9999999','0','0','','','1','1','0','0','0','0','0');");
DB_I("replace  into `pre_common_usergroup` values('10','0','member','private','新手上路','0','50','1','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('11','0','member','private','注册会员','50','200','2','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('12','0','member','private','中级会员','200','500','3','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('13','0','member','private','高级会员','500','1000','4','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('14','0','member','private','金牌会员','1000','3000','6','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('15','0','member','private','论坛元老','3000','9999999','8','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('16','3','special','private','实习版主','0','0','7','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('17','2','special','private','网站编辑','0','0','8','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('18','1','special','private','信息监察员','0','0','9','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('19','3','special','private','审核员','0','0','7','','','1','1','0','0','0','0','10');");
DB_I("replace  into `pre_common_usergroup` values('20','0','special','private','QQ游客','0','0','0','','','1','1','0','0','0','0','0');");

?>