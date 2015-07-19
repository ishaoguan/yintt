<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_friend`;");
DB_C("CREATE TABLE `lzh_member_friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `friend_id` int(10) unsigned NOT NULL,
  `apply_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_friend` values('53','108','1','1','1345560957');");
DB_I("replace  into `lzh_member_friend` values('51','1','108','1','1345560885');");
DB_I("replace  into `lzh_member_friend` values('54','2816','2862','3','1346821721');");
DB_I("replace  into `lzh_member_friend` values('55','1870','2847','0','1346827783');");
DB_I("replace  into `lzh_member_friend` values('56','2891','2844','0','1347097636');");
DB_I("replace  into `lzh_member_friend` values('57','2891','857','0','1347594272');");
DB_I("replace  into `lzh_member_friend` values('58','2891','2818','0','1347594313');");
DB_I("replace  into `lzh_member_friend` values('59','2975','2971','0','1350269517');");

?>