<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_house_info`;");
DB_C("CREATE TABLE `lzh_member_house_info` (
  `uid` int(11) NOT NULL,
  `house_dizhi` varchar(200) NOT NULL,
  `house_mianji` float(10,2) NOT NULL,
  `house_nian` varchar(10) NOT NULL,
  `house_gong` varchar(20) NOT NULL,
  `house_suo1` varchar(20) NOT NULL,
  `house_suo2` varchar(20) NOT NULL,
  `house_feng1` float(10,2) NOT NULL,
  `house_feng2` float(10,2) NOT NULL,
  `house_dai` int(11) NOT NULL,
  `house_yuegong` float(10,2) NOT NULL,
  `house_shangxian` float(10,2) NOT NULL,
  `house_anjiebank` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_house_info` values('2970','11','11.00','11','按揭中','11','11','0.00','0.00','11','11.00','11.00','11');");
DB_I("replace  into `lzh_member_house_info` values('2972','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('2978','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('2980','武汉市黄陂区江北第一府3-1-301','113.00','2008','按揭中','张玲','朱玮','50.00','50.00','10','3000.00','20.00','武汉水果湖工行');");
DB_I("replace  into `lzh_member_house_info` values('2971','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('2983','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('2985','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('2974','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('2999','hvghcgvbnm,./','123.00','2009','已供完房款','45','ghjk','26.00','74.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('3001','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('3002','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('3005','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('3020','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('3027','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('3032','西湖','100.00','2000','已供完房款','张三','','100.00','0.00','0','0.00','0.00','');");
DB_I("replace  into `lzh_member_house_info` values('3033','','0.00','','','','','0.00','0.00','0','0.00','0.00','');");

?>