<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_withdraw`;");
DB_C("CREATE TABLE `lzh_member_withdraw` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `withdraw_money` decimal(15,2) NOT NULL,
  `withdraw_status` tinyint(4) NOT NULL,
  `withdraw_fee` decimal(15,2) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  `deal_time` int(10) unsigned NOT NULL,
  `deal_user` varchar(50) NOT NULL,
  `deal_info` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`withdraw_status`,`add_time`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_withdraw` values('7','2971','100.00','0','0.00','1350111065','123.93.2.208','0','','');");
DB_I("replace  into `lzh_member_withdraw` values('8','2974','100.00','2','0.00','1351609631','211.90.10.158','1351609674','张敏','54545445455454');");
DB_I("replace  into `lzh_member_withdraw` values('9','2974','100.00','2','0.00','1351609848','211.90.10.158','1351609875','张敏','5445544545');");
DB_I("replace  into `lzh_member_withdraw` values('10','2974','100.00','2','0.00','1351610017','211.90.10.158','1351610039','张敏','12212121211221');");
DB_I("replace  into `lzh_member_withdraw` values('11','2974','100.00','2','0.00','1351737910','110.232.50.204','1351737931','张敏','121212');");
DB_I("replace  into `lzh_member_withdraw` values('12','2974','100.00','2','0.00','1351738050','110.232.50.204','1351738484','张敏','222222222');");
DB_I("replace  into `lzh_member_withdraw` values('13','2974','100.00','2','0.00','1352010480','60.2.159.150','1352010516','张敏','');");

?>