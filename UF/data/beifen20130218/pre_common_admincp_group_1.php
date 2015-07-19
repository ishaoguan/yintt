<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_admincp_group`;");
DB_C("CREATE TABLE `pre_common_admincp_group` (
  `cpgroupid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cpgroupname` varchar(255) NOT NULL,
  PRIMARY KEY (`cpgroupid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_admincp_group` values('1','门户管理员');");
DB_I("replace  into `pre_common_admincp_group` values('2','论坛管理员');");
DB_I("replace  into `pre_common_admincp_group` values('3','群组管理员');");
DB_I("replace  into `pre_common_admincp_group` values('4','空间管理员');");
DB_I("replace  into `pre_common_admincp_group` values('5','用户管理员');");

?>