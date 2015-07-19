<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_onlinelist`;");
DB_C("CREATE TABLE `pre_forum_onlinelist` (
  `groupid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_forum_onlinelist` values('1','1','管理员','online_admin.gif');");
DB_I("replace  into `pre_forum_onlinelist` values('2','2','超级版主','online_supermod.gif');");
DB_I("replace  into `pre_forum_onlinelist` values('3','3','版主','online_moderator.gif');");
DB_I("replace  into `pre_forum_onlinelist` values('0','4','会员','online_member.gif');");

?>