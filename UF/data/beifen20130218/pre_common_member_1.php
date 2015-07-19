<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_member`;");
DB_C("CREATE TABLE `pre_common_member` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `email` char(40) NOT NULL DEFAULT '',
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `emailstatus` tinyint(1) NOT NULL DEFAULT '0',
  `avatarstatus` tinyint(1) NOT NULL DEFAULT '0',
  `videophotostatus` tinyint(1) NOT NULL DEFAULT '0',
  `adminid` tinyint(1) NOT NULL DEFAULT '0',
  `groupid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `groupexpiry` int(10) unsigned NOT NULL DEFAULT '0',
  `extgroupids` char(20) NOT NULL DEFAULT '',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  `credits` int(10) NOT NULL DEFAULT '0',
  `notifysound` tinyint(1) NOT NULL DEFAULT '0',
  `timeoffset` char(4) NOT NULL DEFAULT '',
  `newpm` smallint(6) unsigned NOT NULL DEFAULT '0',
  `newprompt` smallint(6) unsigned NOT NULL DEFAULT '0',
  `accessmasks` tinyint(1) NOT NULL DEFAULT '0',
  `allowadmincp` tinyint(1) NOT NULL DEFAULT '0',
  `onlyacceptfriendpm` tinyint(1) NOT NULL DEFAULT '0',
  `conisbind` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `groupid` (`groupid`),
  KEY `conisbind` (`conisbind`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_member` values('1','admin@admin.com','admin','a9c7a3c3bc5293cae9380c2ad852f093','0','0','0','0','1','1','0','','1348342337','146','0','','0','0','0','1','0','0');");
DB_I("replace  into `pre_common_member` values('2','369828392@qq.com','音乐精灵520','a7b00272b835135f248541254371f980','0','0','0','0','0','10','0','','1348363532','14','0','9999','0','1','0','0','0','0');");
DB_I("replace  into `pre_common_member` values('11','25546685@qq.com','九洲贷发言人','360a990a8d8f2e7cd86aa643e305c1bb','0','0','0','0','0','10','0','','1348987989','30','0','9999','0','1','0','0','0','0');");
DB_I("replace  into `pre_common_member` values('17','472986645@qq.com','472986645','e4e6e59ad77e40b25fa96ecd7200d1ce','0','0','0','0','0','10','0','','1349759068','24','0','9999','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member` values('4','29373657@qq.com','coco78721','1e25be0456733bc7d48804f35681444f','0','0','0','0','0','10','0','','1350449964','0','0','9999','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member` values('25','355509425@qq.com','betty','a875c0cf3c34c4cbcd2e455d57010ec2','0','0','0','0','0','10','0','','1350608354','6','0','9999','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member` values('26','972136460@qq.com','aplaojia7000','729a4ccaeaac7042db6da06208787630','0','0','0','0','0','10','0','','1351460867','2','0','9999','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member` values('8','wzy21cn@163.com','wzy21cn','0fff972703ef1b1d839d22bed6dda88a','0','0','0','0','0','10','0','','1351997118','4','0','9999','0','0','0','0','0','0');");
DB_I("replace  into `pre_common_member` values('33','2310198@qq.com','2310198','5d88e3c8dfe626a3a862e50ed267f657','0','0','0','0','0','10','0','','1356076239','2','0','9999','0','1','0','0','0','0');");

?>