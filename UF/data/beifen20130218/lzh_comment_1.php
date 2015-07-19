<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_comment`;");
DB_C("CREATE TABLE `lzh_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `deal_time` int(10) unsigned NOT NULL,
  `deal_info` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`,`tid`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_comment` values('43','2873','phxzsgg','34','1','dfsdfsdf','1347083412','0','','进货周转');");
DB_I("replace  into `lzh_comment` values('44','2971','coco78721','148','1','vb','1348840693','0','','开店借款');");
DB_I("replace  into `lzh_comment` values('45','3019','test123','168','1','啊啊啊','1357872840','0','','顶顶顶顶,好标');");
DB_I("replace  into `lzh_comment` values('46','3019','test123','168','1','未完全','1357872845','0','','顶顶顶顶,好标');");
DB_I("replace  into `lzh_comment` values('47','3019','test123','168','1','为全文','1357872849','0','','顶顶顶顶,好标');");
DB_I("replace  into `lzh_comment` values('48','3019','test123','168','1','企鹅王企鹅','1357872854','0','','顶顶顶顶,好标');");
DB_I("replace  into `lzh_comment` values('49','3019','test123','168','1','为全文','1357872858','0','','顶顶顶顶,好标');");
DB_I("replace  into `lzh_comment` values('50','3019','test123','168','1','啊实打实的','1357872863','0','','顶顶顶顶,好标');");
DB_I("replace  into `lzh_comment` values('51','3019','test123','168','1','阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈阿斯钢感到骄傲是感觉哈','1357873063','0','','顶顶顶顶,好标');");

?>