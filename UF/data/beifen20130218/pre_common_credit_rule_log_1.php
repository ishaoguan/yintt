<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_credit_rule_log`;");
DB_C("CREATE TABLE `pre_common_credit_rule_log` (
  `clid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cyclenum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `extcredits1` int(10) NOT NULL DEFAULT '0',
  `extcredits2` int(10) NOT NULL DEFAULT '0',
  `extcredits3` int(10) NOT NULL DEFAULT '0',
  `extcredits4` int(10) NOT NULL DEFAULT '0',
  `extcredits5` int(10) NOT NULL DEFAULT '0',
  `extcredits6` int(10) NOT NULL DEFAULT '0',
  `extcredits7` int(10) NOT NULL DEFAULT '0',
  `extcredits8` int(10) NOT NULL DEFAULT '0',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`clid`),
  KEY `uid` (`uid`,`rid`,`fid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_credit_rule_log` values('1','1','15','0','19','1','0','2','0','0','0','0','0','0','0','1356424843');");
DB_I("replace  into `pre_common_credit_rule_log` values('2','2','15','0','7','1','0','2','0','0','0','0','0','0','0','1350269502');");
DB_I("replace  into `pre_common_credit_rule_log` values('3','11','15','0','9','1','0','2','0','0','0','0','0','0','0','1350442228');");
DB_I("replace  into `pre_common_credit_rule_log` values('4','11','1','0','5','5','0','2','0','0','0','0','0','0','0','1349960674');");
DB_I("replace  into `pre_common_credit_rule_log` values('5','1','1','0','36','36','0','2','0','0','0','0','0','0','0','1349960943');");
DB_I("replace  into `pre_common_credit_rule_log` values('6','17','15','0','3','1','0','2','0','0','0','0','0','0','0','1350380618');");
DB_I("replace  into `pre_common_credit_rule_log` values('7','17','1','0','6','6','0','2','0','0','0','0','0','0','0','1349762257');");
DB_I("replace  into `pre_common_credit_rule_log` values('8','25','15','0','3','1','0','2','0','0','0','0','0','0','0','1352190086');");
DB_I("replace  into `pre_common_credit_rule_log` values('9','25','2','0','1','1','0','1','0','0','0','0','0','0','0','1350608568');");
DB_I("replace  into `pre_common_credit_rule_log` values('10','26','15','0','1','1','0','2','0','0','0','0','0','0','0','1351460867');");
DB_I("replace  into `pre_common_credit_rule_log` values('11','8','15','0','2','1','0','2','0','0','0','0','0','0','0','1354278807');");
DB_I("replace  into `pre_common_credit_rule_log` values('12','33','15','0','1','1','0','2','0','0','0','0','0','0','0','1356076239');");

?>