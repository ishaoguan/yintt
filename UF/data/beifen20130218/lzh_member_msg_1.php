<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_msg`;");
DB_C("CREATE TABLE `lzh_member_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) NOT NULL,
  `from_uname` varchar(20) NOT NULL,
  `to_uid` int(11) NOT NULL,
  `to_uname` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `is_read` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type` smallint(6) NOT NULL,
  `to_del` tinyint(4) NOT NULL DEFAULT '0',
  `from_del` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_msg` values('10','1','test','108','test11','sdfwefewf','sdfsdf','1345564276','1','1','1','1');");
DB_I("replace  into `lzh_member_msg` values('11','108','test11','1','test','我不理你','我不理你我不理你我不理你','1345564294','1','1','1','1');");
DB_I("replace  into `lzh_member_msg` values('9','1','test','108','test11','标题标题标题','留言的信留言的信留言的信','1345563884','1','1','1','1');");
DB_I("replace  into `lzh_member_msg` values('7','108','test11','1','test','sfdwefwe','fsdfsdf','1345563251','1','1','1','1');");
DB_I("replace  into `lzh_member_msg` values('8','108','test11','1','test','eeeeeeeeee','sdfsdf','1345563849','1','1','1','1');");

?>