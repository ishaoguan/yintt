<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_financial_info`;");
DB_C("CREATE TABLE `lzh_member_financial_info` (
  `uid` int(10) unsigned NOT NULL,
  `fin_monthin` varchar(20) NOT NULL,
  `fin_incomedes` varchar(2000) NOT NULL,
  `fin_monthout` varchar(20) NOT NULL,
  `fin_outdes` varchar(2000) NOT NULL,
  `fin_house` varchar(50) NOT NULL,
  `fin_housevalue` varchar(20) NOT NULL,
  `fin_car` varchar(20) NOT NULL,
  `fin_carvalue` varchar(20) NOT NULL,
  `fin_stockcompany` varchar(50) NOT NULL,
  `fin_stockcompanyvalue` varchar(50) NOT NULL,
  `fin_otheremark` varchar(2000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_financial_info` values('2970','11','11','11','11','有商品房','11','是','11','11','11','11');");
DB_I("replace  into `lzh_member_financial_info` values('2972','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('2978','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('2980','8000','组团','4000','生活费，水电开销，门面租金','有商品房','500000.00','否','0','无','无','在汉口还有套小户型在出租');");
DB_I("replace  into `lzh_member_financial_info` values('2971','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('2983','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('2985','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('2974','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('2999','50000','opjojhgytcv','66+','vbnm,./','有商品房','uiop[]\\\\789+','是','+985+26+','59846','5+98+2','bhvyvubm,.');");
DB_I("replace  into `lzh_member_financial_info` values('3001','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('3002','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('3005','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('3020','','','','','','','','','','','');");
DB_I("replace  into `lzh_member_financial_info` values('3027','swsw','swsw','swswsw','swsws','有其他（非商品房）','wsws','是','wsws','swsw','swsw','dvdvd');");
DB_I("replace  into `lzh_member_financial_info` values('3032','10000','工资奖金','100','买衣服','有商品房','200万','是','30万','海尔','100万','无');");
DB_I("replace  into `lzh_member_financial_info` values('3033','','','','','','','','','','','');");

?>