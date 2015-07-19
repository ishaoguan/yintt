<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_members_status`;");
DB_C("CREATE TABLE `lzh_members_status` (
  `uid` int(10) unsigned NOT NULL,
  `phone_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `id_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0:未上传1:验证通过2:等待验证',
  `email_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `account_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credit_status` tinyint(4) NOT NULL DEFAULT '0',
  `safequestion_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `video_status` tinyint(4) NOT NULL DEFAULT '0',
  `face_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_members_status` values('2969','1','1','1','0','0','1','0','0');");
DB_I("replace  into `lzh_members_status` values('2970','1','1','1','0','0','1','1','1');");
DB_I("replace  into `lzh_members_status` values('2971','1','1','1','0','0','1','1','0');");
DB_I("replace  into `lzh_members_status` values('2972','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2973','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2974','1','1','1','0','0','1','1','0');");
DB_I("replace  into `lzh_members_status` values('2975','1','1','1','0','0','1','0','0');");
DB_I("replace  into `lzh_members_status` values('2978','1','1','1','0','0','1','0','1');");
DB_I("replace  into `lzh_members_status` values('2979','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2980','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2983','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2984','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2985','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2986','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2987','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2988','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2993','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2995','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2996','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2997','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('2998','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3000','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3001','0','1','1','0','0','1','0','0');");
DB_I("replace  into `lzh_members_status` values('3002','1','1','1','0','0','1','0','0');");
DB_I("replace  into `lzh_members_status` values('3004','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3005','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3006','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3014','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3015','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3016','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3018','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3019','0','3','1','0','0','1','0','0');");
DB_I("replace  into `lzh_members_status` values('3021','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3023','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3025','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3027','1','1','1','0','0','1','1','1');");
DB_I("replace  into `lzh_members_status` values('3030','0','0','1','0','0','0','0','0');");
DB_I("replace  into `lzh_members_status` values('3032','1','1','1','0','0','1','0','0');");
DB_I("replace  into `lzh_members_status` values('3033','1','1','1','0','0','0','1','0');");

?>