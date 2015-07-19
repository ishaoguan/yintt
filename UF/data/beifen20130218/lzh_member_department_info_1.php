<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_department_info`;");
DB_C("CREATE TABLE `lzh_member_department_info` (
  `uid` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_tel` varchar(20) NOT NULL,
  `department_address` varchar(200) NOT NULL,
  `department_year` varchar(20) NOT NULL,
  `voucher_name` varchar(20) NOT NULL,
  `voucher_tel` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_department_info` values('2970','11','11','11','10年以上','11','11');");
DB_I("replace  into `lzh_member_department_info` values('2972','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('2978','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('2980','湖北康辉旅行社黄陂车站门市部','13554279332','武汉市黄陂区前川街黄陂大道221-5号','1年以下','邓青青','13476034966');");
DB_I("replace  into `lzh_member_department_info` values('2983','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('2985','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('2974','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('2999','nhuiojkl;&#039;\\\\','jhvbnkm,l.','dx','10年以上','vbnm,.','tuijokl;');");
DB_I("replace  into `lzh_member_department_info` values('3001','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('3002','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('3005','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('3020','','','','','','');");
DB_I("replace  into `lzh_member_department_info` values('3027','dc','222','2222','1-3年','222','22222');");
DB_I("replace  into `lzh_member_department_info` values('3032','杭州品杰','12345678','西湖','10年以上','网吧','4352352345234534');");
DB_I("replace  into `lzh_member_department_info` values('3033','','','','','','');");

?>