<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_home_notification`;");
DB_C("CREATE TABLE `pre_home_notification` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `authorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(15) NOT NULL DEFAULT '',
  `note` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `from_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `from_idtype` varchar(20) NOT NULL DEFAULT '',
  `from_num` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`new`,`dateline`),
  KEY `from_id` (`from_id`,`from_idtype`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_home_notification` values('1','2','system','1','0','','尊敬的音乐精灵520，您已经注册成为Comsenz Inc.的会员，请您在发表言论时，遵守当地法律法规。<br />\r\n如果您有什么疑问可以联系管理员，Email&#58; admin@admin.com。<br />\r\n<br />\r\n<br />\r\nDiscuz! Board<br />\r\n2012-9-23 09&#58;25','1348363532','0','welcomemsg','1');");
DB_I("replace  into `pre_home_notification` values('2','11','system','0','0','','尊敬的九洲贷发言人，您已经注册成为九州贷的会员，请您在发表言论时，遵守当地法律法规。<br />\r\n如果您有什么疑问可以联系管理员，Email&#58; admin@admin.com。<br />\r\n<br />\r\n<br />\r\n九州贷论坛<br />\r\n2012-9-30 14&#58;53','1348987989','0','welcomemsg','0');");
DB_I("replace  into `pre_home_notification` values('3','17','system','0','0','','尊敬的472986645，您已经注册成为九洲贷的会员，请您在发表言论时，遵守当地法律法规。<br />\r\n如果您有什么疑问可以联系管理员，Email&#58; admin@admin.com。<br />\r\n<br />\r\n<br />\r\n九洲贷论坛<br />\r\n2012-10-9 13&#58;04','1349759068','0','welcomemsg','0');");
DB_I("replace  into `pre_home_notification` values('4','25','system','0','0','','尊敬的betty，您已经注册成为九洲贷的会员，请您在发表言论时，遵守当地法律法规。<br />\r\n如果您有什么疑问可以联系管理员，Email&#58; admin@admin.com。<br />\r\n<br />\r\n<br />\r\n九洲贷论坛<br />\r\n2012-10-19 08&#58;59','1350608354','0','welcomemsg','0');");
DB_I("replace  into `pre_home_notification` values('5','11','post','1','25','betty','<a href=\"home.php?mod=space&uid=25\">betty</a> 回复了您的帖子 <a href=\"forum.php?mod=redirect&goto=findpost&ptid=46&pid=48\" target=\"_blank\">九洲贷各种标的定义</a> &nbsp; <a href=\"forum.php?mod=redirect&goto=findpost&pid=48&ptid=46\" target=\"_blank\" class=\"lit\">查看</a>','1350608568','46','post','1');");
DB_I("replace  into `pre_home_notification` values('6','26','system','0','0','','尊敬的aplaojia7000，您已经注册成为九洲贷的会员，请您在发表言论时，遵守当地法律法规。<br />\r\n如果您有什么疑问可以联系管理员，Email&#58; admin@admin.com。<br />\r\n<br />\r\n<br />\r\n九洲贷论坛<br />\r\n2012-10-29 05&#58;47','1351460867','0','welcomemsg','0');");
DB_I("replace  into `pre_home_notification` values('7','33','system','1','0','','尊敬的2310198，您已经注册成为贷齐乐的会员，请您在发表言论时，遵守当地法律法规。<br />\r\n如果您有什么疑问可以联系管理员，Email&#58; admin@admin.com。<br />\r\n<br />\r\n<br />\r\n贷齐乐论坛<br />\r\n2012-12-21 15&#58;50','1356076239','0','welcomemsg','1');");

?>