<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_admincp_perm`;");
DB_C("CREATE TABLE `pre_common_admincp_perm` (
  `cpgroupid` smallint(6) unsigned NOT NULL,
  `perm` varchar(255) NOT NULL,
  UNIQUE KEY `cpgroupperm` (`cpgroupid`,`perm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_admincp_perm` values('1','albumcategory');");
DB_I("replace  into `pre_common_admincp_perm` values('1','article');");
DB_I("replace  into `pre_common_admincp_perm` values('1','block');");
DB_I("replace  into `pre_common_admincp_perm` values('1','blockstyle');");
DB_I("replace  into `pre_common_admincp_perm` values('1','blogcategory');");
DB_I("replace  into `pre_common_admincp_perm` values('1','diytemplate');");
DB_I("replace  into `pre_common_admincp_perm` values('1','portalcategory');");
DB_I("replace  into `pre_common_admincp_perm` values('1','topic');");
DB_I("replace  into `pre_common_admincp_perm` values('1','_allowpost');");
DB_I("replace  into `pre_common_admincp_perm` values('2','attach');");
DB_I("replace  into `pre_common_admincp_perm` values('2','forums');");
DB_I("replace  into `pre_common_admincp_perm` values('2','forums_merge');");
DB_I("replace  into `pre_common_admincp_perm` values('2','misc_attachtype');");
DB_I("replace  into `pre_common_admincp_perm` values('2','misc_censor');");
DB_I("replace  into `pre_common_admincp_perm` values('2','moderate_replies');");
DB_I("replace  into `pre_common_admincp_perm` values('2','moderate_threads');");
DB_I("replace  into `pre_common_admincp_perm` values('2','prune');");
DB_I("replace  into `pre_common_admincp_perm` values('2','recyclebin');");
DB_I("replace  into `pre_common_admincp_perm` values('2','report');");
DB_I("replace  into `pre_common_admincp_perm` values('2','threads');");
DB_I("replace  into `pre_common_admincp_perm` values('2','threads_forumstick');");
DB_I("replace  into `pre_common_admincp_perm` values('2','threads_postposition');");
DB_I("replace  into `pre_common_admincp_perm` values('2','threadtypes');");
DB_I("replace  into `pre_common_admincp_perm` values('2','_allowpost');");
DB_I("replace  into `pre_common_admincp_perm` values('3','attach_group');");
DB_I("replace  into `pre_common_admincp_perm` values('3','group_deletegroup');");
DB_I("replace  into `pre_common_admincp_perm` values('3','group_editgroup');");
DB_I("replace  into `pre_common_admincp_perm` values('3','group_level');");
DB_I("replace  into `pre_common_admincp_perm` values('3','group_manage');");
DB_I("replace  into `pre_common_admincp_perm` values('3','group_setting');");
DB_I("replace  into `pre_common_admincp_perm` values('3','group_type');");
DB_I("replace  into `pre_common_admincp_perm` values('3','group_userperm');");
DB_I("replace  into `pre_common_admincp_perm` values('3','prune_group');");
DB_I("replace  into `pre_common_admincp_perm` values('3','threads_group');");
DB_I("replace  into `pre_common_admincp_perm` values('3','_allowpost');");
DB_I("replace  into `pre_common_admincp_perm` values('4','album');");
DB_I("replace  into `pre_common_admincp_perm` values('4','blog');");
DB_I("replace  into `pre_common_admincp_perm` values('4','click');");
DB_I("replace  into `pre_common_admincp_perm` values('4','comment');");
DB_I("replace  into `pre_common_admincp_perm` values('4','doing');");
DB_I("replace  into `pre_common_admincp_perm` values('4','feed');");
DB_I("replace  into `pre_common_admincp_perm` values('4','pic');");
DB_I("replace  into `pre_common_admincp_perm` values('4','setting_home');");
DB_I("replace  into `pre_common_admincp_perm` values('4','share');");
DB_I("replace  into `pre_common_admincp_perm` values('4','_allowpost');");
DB_I("replace  into `pre_common_admincp_perm` values('5','admingroup');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_access');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_add');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_ban');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_clean');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_credit');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_edit');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_group');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_ipban');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_medal');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_newsletter');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_profile');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_repeat');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_reward');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_search');");
DB_I("replace  into `pre_common_admincp_perm` values('5','members_verify');");
DB_I("replace  into `pre_common_admincp_perm` values('5','moderate_members');");
DB_I("replace  into `pre_common_admincp_perm` values('5','specialuser_defaultuser');");
DB_I("replace  into `pre_common_admincp_perm` values('5','specialuser_follow');");
DB_I("replace  into `pre_common_admincp_perm` values('5','usergroups');");
DB_I("replace  into `pre_common_admincp_perm` values('5','verify_verify');");
DB_I("replace  into `pre_common_admincp_perm` values('5','_allowpost');");

?>