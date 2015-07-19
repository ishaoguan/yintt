<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_cron`;");
DB_C("CREATE TABLE `pre_common_cron` (
  `cronid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('user','system') NOT NULL DEFAULT 'user',
  `name` char(50) NOT NULL DEFAULT '',
  `filename` char(50) NOT NULL DEFAULT '',
  `lastrun` int(10) unsigned NOT NULL DEFAULT '0',
  `nextrun` int(10) unsigned NOT NULL DEFAULT '0',
  `weekday` tinyint(1) NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `hour` tinyint(2) NOT NULL DEFAULT '0',
  `minute` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`cronid`),
  KEY `nextrun` (`available`,`nextrun`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_cron` values('1','1','system','清空今日发帖数','cron_todaypost_daily.php','1357666916','1357747200','-1','-1','0','0');");
DB_I("replace  into `pre_common_cron` values('2','1','system','清空本月在线时间','cron_onlinetime_monthly.php','1356969969','1359648000','-1','1','0','0');");
DB_I("replace  into `pre_common_cron` values('3','1','system','每日数据清理','cron_cleanup_daily.php','1357681103','1357767000','-1','-1','5','30');");
DB_I("replace  into `pre_common_cron` values('5','1','system','每日公告清理','cron_announcement_daily.php','1357667125','1357747200','-1','-1','0','0');");
DB_I("replace  into `pre_common_cron` values('6','1','system','限时操作清理','cron_threadexpiry_hourly.php','1357711387','1357714800','-1','-1','-1','0');");
DB_I("replace  into `pre_common_cron` values('7','1','system','论坛推广清理','cron_promotion_hourly.php','1357668969','1357747200','-1','-1','0','00');");
DB_I("replace  into `pre_common_cron` values('8','1','system','每月主题清理','cron_cleanup_monthly.php','1356991329','1359669600','-1','1','6','00');");
DB_I("replace  into `pre_common_cron` values('9','1','system','道具自动补货','cron_magic_daily.php','1357668969','1357747200','-1','-1','0','0');");
DB_I("replace  into `pre_common_cron` values('10','1','system','每日验证问答更新','cron_secqaa_daily.php','1357683262','1357768800','-1','-1','6','0');");
DB_I("replace  into `pre_common_cron` values('11','1','system','每日标签更新','cron_tag_daily.php','1357669040','1357747200','-1','-1','0','0');");
DB_I("replace  into `pre_common_cron` values('12','1','system','每日勋章更新','cron_medal_daily.php','1357673693','1357747200','-1','-1','0','0');");
DB_I("replace  into `pre_common_cron` values('13','1','system','清理过期动态','cron_cleanfeed.php','1357673694','1357747200','-1','-1','0','0');");
DB_I("replace  into `pre_common_cron` values('14','1','system','每日获取安全补丁','cron_checkpatch_daily.php','1357679377','1357755720','-1','-1','2','22');");
DB_I("replace  into `pre_common_cron` values('15','1','system','定时发布主题','cron_publish_halfhourly.php','1357713558','1357714800','-1','-1','-1','0	30');");
DB_I("replace  into `pre_common_cron` values('16','1','system','每周广播归档','cron_follow_daily.php','1357678946','1357754400','-1','-1','2','0');");
DB_I("replace  into `pre_common_cron` values('17','1','system','更新每日查看数','cron_todayviews_daily.php','1357679811','1357758000','-1','-1','3','0	5	10	15	20	25	30	35	40	45	50	55');");
DB_I("replace  into `pre_common_cron` values('18','0','system','每日用户表优化','cron_member_optimize_daily.php','0','1348345937','-1','-1','2','0	5	10	15	20	25	30	35	40	45	50	55');");
DB_I("replace  into `pre_common_cron` values('19','1','user','','cron_security_daily.php','1357679377','1357754400','-1','-1','2','0');");

?>