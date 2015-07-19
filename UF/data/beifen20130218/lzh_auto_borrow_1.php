<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_auto_borrow`;");
DB_C("CREATE TABLE `lzh_auto_borrow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `tender_type` tinyint(4) NOT NULL DEFAULT '0',
  `tender_account` float(15,2) unsigned NOT NULL,
  `tender_rate` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `my_friend` tinyint(4) NOT NULL DEFAULT '0',
  `not_black` tinyint(4) NOT NULL DEFAULT '0',
  `target_user` tinyint(4) NOT NULL DEFAULT '0',
  `credits` tinyint(4) NOT NULL DEFAULT '0',
  `borrow_credit_status` tinyint(4) NOT NULL DEFAULT '0',
  `borrow_credit_first` int(11) NOT NULL,
  `borrow_credit_last` int(11) NOT NULL,
  `repayment_type` tinyint(4) NOT NULL DEFAULT '0',
  `timelimit_status` tinyint(4) NOT NULL DEFAULT '0',
  `timelimit_month_first` int(11) NOT NULL,
  `timelimit_month_last` int(11) NOT NULL,
  `apr_status` tinyint(4) NOT NULL DEFAULT '0',
  `apr_first` float(5,2) NOT NULL,
  `apr_last` float(5,2) NOT NULL,
  `award_status` tinyint(4) NOT NULL DEFAULT '0',
  `award_first` float(5,2) NOT NULL,
  `award_last` float(5,2) NOT NULL,
  `borrow_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `is_use` (`borrow_type`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_auto_borrow` values('2','2970','1','1','1000.00','0','0','0','0','0','0','0','0','0','0','1','1','0','0.00','0.00','0','0.00','0.00','0');");
DB_I("replace  into `lzh_auto_borrow` values('3','2999','0','1','6000.00','20','0','0','0','0','0','0','0','0','0','1','1','0','12.00','25.00','0','0.00','0.00','0');");
DB_I("replace  into `lzh_auto_borrow` values('4','3018','1','1','0.00','0','0','0','0','0','0','0','0','0','0','1','1','1','0.00','0.00','0','0.00','0.00','0');");
DB_I("replace  into `lzh_auto_borrow` values('6','3019','1','1','100.00','0','0','0','0','0','0','0','0','0','0','1','12','0','0.00','0.00','0','0.00','0.00','0');");
DB_I("replace  into `lzh_auto_borrow` values('7','3033','1','1','125.00','0','0','0','0','0','0','0','0','0','0','1','1','0','0.00','0.00','0','0.00','0.00','0');");

?>