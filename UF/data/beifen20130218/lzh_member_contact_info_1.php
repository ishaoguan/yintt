<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_contact_info`;");
DB_C("CREATE TABLE `lzh_member_contact_info` (
  `uid` int(10) unsigned NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `contact1` varchar(50) NOT NULL,
  `contact1_re` varchar(20) NOT NULL,
  `contact1_tel` varchar(50) NOT NULL,
  `contact2` varchar(50) NOT NULL,
  `contact2_re` varchar(20) NOT NULL,
  `contact2_tel` varchar(20) NOT NULL,
  `contact1_other` varchar(100) NOT NULL,
  `contact2_other` varchar(100) NOT NULL,
  `contact3` varchar(40) DEFAULT NULL,
  `contact3_re` varchar(20) DEFAULT NULL,
  `contact3_tel` varchar(100) DEFAULT NULL,
  `contact3_other` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_contact_info` values('2970','11','15972099576','11','家庭成员','11','11','家庭成员','11','11','11','11','家庭成员','11','11');");
DB_I("replace  into `lzh_member_contact_info` values('2972','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('2978','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('2980','武汉市黄陂区江北第一府3-1-301','85905155','朱天明','家庭成员','63320217','夏巧珍','家庭成员','15342336525','61001747','61001747','孙奥','家庭成员','15871451850','61004005');");
DB_I("replace  into `lzh_member_contact_info` values('2983','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('2985','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('2974','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('2999','64981365','+99862954894949','259898','家庭成员','19872659','0591320','家庭成员','29895298523','jkbhjklm','898','2987*9852','家庭成员','6549897461','jhuiginjmo');");
DB_I("replace  into `lzh_member_contact_info` values('3001','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('3002','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('3005','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('3020','','','','','','','','','','',NULL,NULL,NULL,NULL);");
DB_I("replace  into `lzh_member_contact_info` values('3027','aaaa','3333','xxx','家庭成员','xcxc','cxcxx','朋友','xxxx','vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvbbbbbbbbbbbbbbbbbbbbbbbbbttttt','xxxx','xxx','商业伙伴','xxx','xx');");
DB_I("replace  into `lzh_member_contact_info` values('3032','杭州','12345678','张三','家庭成员','12345678','李四','家庭成员','352345234534','阿萨德','爱上','王五','家庭成员','23453264523','猴子');");
DB_I("replace  into `lzh_member_contact_info` values('3033','','','','','','','','','','',NULL,NULL,NULL,NULL);");

?>