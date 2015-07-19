<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_jubao`;");
DB_C("CREATE TABLE `lzh_jubao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uemail` varchar(60) NOT NULL,
  `b_uid` int(11) NOT NULL,
  `b_uname` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `text` varchar(500) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_jubao` values('1','1','lzsrth@yahoo.com.cn','93','jiedai','此用户在其他网站有借款','附加信息附加信息附加信息附加信息','1342970429','113.247.35.168');");
DB_I("replace  into `lzh_jubao` values('2','108','342556015@qq.com','1','test','此用户在其他网站有借款','枯仍枯仍fsd wefwef','1344795356','127.0.0.1');");
DB_I("replace  into `lzh_jubao` values('3','2975','1037525011@qq.com','2975','邮政银行李行长','此用户冒用他人身份','qe akdv sk;sajf','1348839540','221.235.71.40');");

?>