<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_ensure_info`;");
DB_C("CREATE TABLE `lzh_member_ensure_info` (
  `uid` int(11) NOT NULL,
  `ensuer1_name` varchar(20) NOT NULL,
  `ensuer1_re` varchar(20) NOT NULL,
  `ensuer1_tel` varchar(20) NOT NULL,
  `ensuer2_name` varchar(20) NOT NULL,
  `ensuer2_re` varchar(20) NOT NULL,
  `ensuer2_tel` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_ensure_info` values('2970','11','家庭成员','11','11','家庭成员','11');");
DB_I("replace  into `lzh_member_ensure_info` values('2972','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('2978','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('2980','张玲','家庭成员','13971517099','张敏','家庭成员','15972099576');");
DB_I("replace  into `lzh_member_ensure_info` values('2971','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('2983','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('2974','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('2999','166','朋友','81894981','984949','朋友','1594846384789');");
DB_I("replace  into `lzh_member_ensure_info` values('3001','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('3002','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('3020','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('3027','','','','','','');");
DB_I("replace  into `lzh_member_ensure_info` values('3032','张三','家庭成员','43534543','李四','家庭成员','452345234');");
DB_I("replace  into `lzh_member_ensure_info` values('3033','','','','','','');");

?>