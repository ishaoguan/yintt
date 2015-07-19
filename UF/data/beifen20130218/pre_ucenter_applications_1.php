<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_ucenter_applications`;");
DB_C("CREATE TABLE `pre_ucenter_applications` (
  `appid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(16) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `authkey` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `viewprourl` varchar(255) NOT NULL,
  `apifilename` varchar(30) NOT NULL DEFAULT 'uc.php',
  `charset` varchar(8) NOT NULL DEFAULT '',
  `dbcharset` varchar(8) NOT NULL DEFAULT '',
  `synlogin` tinyint(1) NOT NULL DEFAULT '0',
  `recvnote` tinyint(1) DEFAULT '0',
  `extra` text NOT NULL,
  `tagtemplates` text NOT NULL,
  `allowips` text NOT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_ucenter_applications` values('1','DISCUZX','Discuz! Board','http://cjc.cc/bbs','aeebWv75Kcoix+CHRSTy3xotQI5GIb4d3lDcNR649CaLsxYARNLj+JmO5DmEAfMQ442cRHYCAE2D8DmCPQ','','','uc.php','','','1','1','a:2:{s:7:\"apppath\";s:0:\"\";s:8:\"extraurl\";a:0:{}}','<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n	<item id=\"template\"><![CDATA[]]></item>\r\n</root>','');");
DB_I("replace  into `pre_ucenter_applications` values('2','OTHER','贷齐乐','http://cjc.cc','5ffdNvpc1LDJ/LJ+m5WoIwbFVWflQUzEVlpNNRDjglnZwtU','','','uc','','','1','1','a:2:{s:7:\"apppath\";s:0:\"\";s:8:\"extraurl\";a:0:{}}','<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n	<item id=\"template\"><![CDATA[]]></item>\r\n</root>','');");

?>