<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_forumfield`;");
DB_C("CREATE TABLE `pre_forum_forumfield` (
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `password` varchar(12) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `redirect` varchar(255) NOT NULL DEFAULT '',
  `attachextensions` varchar(255) NOT NULL DEFAULT '',
  `creditspolicy` mediumtext NOT NULL,
  `formulaperm` text NOT NULL,
  `moderators` text NOT NULL,
  `rules` text NOT NULL,
  `threadtypes` text NOT NULL,
  `threadsorts` text NOT NULL,
  `viewperm` text NOT NULL,
  `postperm` text NOT NULL,
  `replyperm` text NOT NULL,
  `getattachperm` text NOT NULL,
  `postattachperm` text NOT NULL,
  `postimageperm` text NOT NULL,
  `spviewperm` text NOT NULL,
  `seotitle` text NOT NULL,
  `keywords` text NOT NULL,
  `seodescription` text NOT NULL,
  `supe_pushsetting` text NOT NULL,
  `modrecommend` text NOT NULL,
  `threadplugin` text NOT NULL,
  `extra` text NOT NULL,
  `jointype` tinyint(1) NOT NULL DEFAULT '0',
  `gviewperm` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `membernum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
  `activity` int(10) unsigned NOT NULL DEFAULT '0',
  `founderuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `foundername` varchar(255) NOT NULL DEFAULT '',
  `banner` varchar(255) NOT NULL DEFAULT '',
  `groupnum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `commentitem` text NOT NULL,
  `relatedgroup` text NOT NULL,
  `picstyle` tinyint(1) NOT NULL DEFAULT '0',
  `widthauto` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`),
  KEY `membernum` (`membernum`),
  KEY `dateline` (`dateline`),
  KEY `lastupdate` (`lastupdate`),
  KEY `activity` (`activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_forum_forumfield` values('1','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('2','发布九洲贷公告、通知、规则、帮助等相关信息。<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('3','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('4','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('5','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('6','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('7','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('8','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('9','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('10','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('11','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('12','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('13','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('14','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('15','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('16','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('17','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('18','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('19','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('20','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('21','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('22','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('23','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('24','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('25','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('26','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('27','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('28','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('29','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('30','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('31','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('32','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('33','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('34','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('35','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('36','有问有答，客服服务，帮助他人，快乐自己，共赢未来。如果您有好建议，也可在此版块提出。<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('37','网络借贷，风险控制尤为重要，如何预防借款人逾期，针对逾期用户的措施,预期用户黑名单,都可以在逾期催收专区讨论。<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('38','提供与网贷相关的新闻资讯<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('39','九洲贷所有大型网络互动活动专区','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('41','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('42','万事开头难，欢迎新手在这里提出各种进行交流。人人为我，我为人人，希望大家多多解答。<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('43','借款人在此可以与投资人进行交流，借款人如果需要借钱，可在此回答相关问题。<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('44','为兢兢业业的黄牛们建一个“家”，一个投资交流，联络感情的地方。','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('45','本版只公布网站所有给力标详细信息，请投资用户查阅。','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('46','投资交流区，欢迎大家在此讨论各种投资经验，风险好的投资项目。<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('47','沟通交流信用卡办理及使用心得。<br />\r\n','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('48','本版是各种娱乐、美食、旅游、影视、音乐、书籍、心情、生活、家具、时尚等精品信息汇集的板块，给所有九洲贷用户提供休闲娱乐的空间。','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('49','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('50','本版块可发淘宝相关的各种资讯信息，并给所有在九洲贷投资的淘宝卖家提供一个投资交流，专门展示自己店铺的平台。','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
DB_I("replace  into `pre_forum_forumfield` values('51','网贷之家投资人同盟会简称，在这里，我们共享数据，经验，心得体会。相聚九洲贷，少一些逾期，多一些快乐。更有线下同城聚会。','','','','','a:0:{}','a:5:{i:0;s:0:\"\";i:1;s:0:\"\";s:7:\"message\";s:0:\"\";s:5:\"medal\";N;s:5:\"users\";s:0:\"\";}','','','','','','','','','','','','','','','','a:8:{s:4:\"open\";s:1:\"0\";s:3:\"num\";i:10;s:8:\"imagenum\";i:0;s:10:\"imagewidth\";i:300;s:11:\"imageheight\";i:250;s:9:\"maxlength\";i:0;s:9:\"cachelife\";i:0;s:8:\"dateline\";i:0;}','N;','a:2:{s:9:\"namecolor\";s:0:\"\";s:9:\"iconwidth\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");

?>