<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_tag`;");
DB_C("CREATE TABLE `pre_common_tag` (
  `tagid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tagid`),
  KEY `tagname` (`tagname`),
  KEY `status` (`status`,`tagid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_tag` values('1','贷款','0');");
DB_I("replace  into `pre_common_tag` values('2','购房计划','0');");
DB_I("replace  into `pre_common_tag` values('3','紧缩政策','0');");
DB_I("replace  into `pre_common_tag` values('4','如何','0');");
DB_I("replace  into `pre_common_tag` values('5','公积金贷款','0');");
DB_I("replace  into `pre_common_tag` values('6','理财专家','0');");
DB_I("replace  into `pre_common_tag` values('7','借款人','0');");
DB_I("replace  into `pre_common_tag` values('8','的','0');");
DB_I("replace  into `pre_common_tag` values('9','民间','0');");
DB_I("replace  into `pre_common_tag` values('10','投资','0');");
DB_I("replace  into `pre_common_tag` values('11','民间借贷','0');");
DB_I("replace  into `pre_common_tag` values('12','新华社','0');");
DB_I("replace  into `pre_common_tag` values('13','负责人','0');");
DB_I("replace  into `pre_common_tag` values('14','文章','0');");
DB_I("replace  into `pre_common_tag` values('15','用户','0');");
DB_I("replace  into `pre_common_tag` values('16','网银','0');");
DB_I("replace  into `pre_common_tag` values('17','网站','0');");
DB_I("replace  into `pre_common_tag` values('18','银行业','0');");
DB_I("replace  into `pre_common_tag` values('19','调查','0');");
DB_I("replace  into `pre_common_tag` values('20','房贷','0');");

?>