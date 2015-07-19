<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_nav`;");
DB_C("CREATE TABLE `pre_common_nav` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL,
  `highlight` tinyint(1) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `subtype` tinyint(1) NOT NULL DEFAULT '0',
  `subcols` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `suburl` varchar(255) NOT NULL,
  `navtype` tinyint(1) NOT NULL DEFAULT '0',
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `navtype` (`navtype`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_nav` values('1','0','门户','Portal','portal.php','1','0','0','-1','1','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('2','0','网站首页','首页','forum.php','2','0','0','0','1','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('3','0','群组','Group','group.php','3','0','0','-1','7','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('4','0','动态','Space','home.php','4','0','0','-1','8','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('5','0','会员社区','Manyou','userapp.php','5','0','0','0','5','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('6','0','借贷工具','Plugin','#','6','0','0','0','6','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('7','0','关于我们','Help','misc.php?mod=faq','7','0','0','0','7','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('8','0','排行榜','Ranklist','misc.php?mod=ranklist','8','0','0','-1','16','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('9','0','广播','Follow','home.php?mod=follow','9','0','0','-1','5','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('10','0','导读','Guide','forum.php?mod=guide','10','0','0','-1','3','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('11','0','淘帖','Collection','forum.php?mod=collection','11','0','0','-1','11','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('12','0','日志','Blog','home.php?mod=space&do=blog','12','0','0','-1','12','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('13','0','相册','Album','home.php?mod=space&do=album','13','0','0','-1','13','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('14','0','分享','Share','home.php?mod=space&do=share','14','0','0','-1','14','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('15','0','记录','Doing','home.php?mod=space&do=doing','15','0','0','-1','15','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('16','0','站点统计','','misc.php?mod=stat','stat','0','0','1','1','0','0','0','0','','','','1','');");
DB_I("replace  into `pre_common_nav` values('17','0','举报','','#','report','0','0','1','2','0','0','0','0','','','','1','');");
DB_I("replace  into `pre_common_nav` values('18','0','Archiver','','archiver/','archiver','0','0','1','3','0','0','0','0','','','','1','');");
DB_I("replace  into `pre_common_nav` values('19','0','手机版','','forum.php?mobile=yes','mobile','0','0','1','3','0','0','0','0','','','','1','');");
DB_I("replace  into `pre_common_nav` values('20','0','日志','','home.php?mod=space&do=blog','blog','0','0','-1','2','0','0','0','0','{STATICURL}image/feed/blog.gif','发布','home.php?mod=spacecp&ac=blog','2','');");
DB_I("replace  into `pre_common_nav` values('21','0','相册','','home.php?mod=space&do=album','album','0','0','-1','3','0','0','0','0','{STATICURL}image/feed/album.gif','上传','home.php?mod=spacecp&ac=upload','2','');");
DB_I("replace  into `pre_common_nav` values('22','0','分享','','home.php?mod=space&do=share','share','0','0','-1','4','0','0','0','0','{STATICURL}image/feed/share.gif','添加','home.php?mod=spacecp&ac=share','2','');");
DB_I("replace  into `pre_common_nav` values('23','0','记录','','home.php?mod=space&do=doing','doing','0','0','-1','5','0','0','0','0','{STATICURL}image/feed/doing.gif','','','2','');");
DB_I("replace  into `pre_common_nav` values('24','0','广播','','home.php?mod=follow','follow','0','0','-1','6','0','0','0','0','{STATICURL}image/feed/follow.gif','','','2','');");
DB_I("replace  into `pre_common_nav` values('25','0','{userpanelarea1}','','','','0','0','1','7','0','0','0','0','','','','2','');");
DB_I("replace  into `pre_common_nav` values('26','0','{hr}','','','','0','1','1','8','0','0','0','0','','','','2','');");
DB_I("replace  into `pre_common_nav` values('27','0','{userpanelarea2}','','','','0','0','1','9','0','0','0','0','','','','2','');");
DB_I("replace  into `pre_common_nav` values('28','0','好友','','home.php?mod=space&do=friend','friend','0','0','1','1','0','0','0','0','{STATICURL}image/feed/friend_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('29','0','帖子','','forum.php?mod=guide&view=my','thread','0','0','1','2','0','0','0','0','{STATICURL}image/feed/thread_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('30','0','收藏','','home.php?mod=space&do=favorite&view=me','favorite','0','0','1','3','0','0','0','0','{STATICURL}image/feed/favorite_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('31','0','道具','','home.php?mod=magic','magic','0','0','1','4','0','0','0','0','{STATICURL}image/feed/magic_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('32','0','勋章','','home.php?mod=medal','medal','0','0','1','5','0','0','0','0','{STATICURL}image/feed/medal_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('33','0','任务','','home.php?mod=task','task','0','0','1','6','0','0','0','0','{STATICURL}image/feed/task_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('34','0','淘帖','','forum.php?mod=collection&op=my','collection','0','0','-1','7','0','0','0','0','{STATICURL}image/feed/collection_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('35','0','动态','','home.php','feed','0','0','-1','8','0','0','0','0','{STATICURL}image/feed/feed_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('36','0','日志','','home.php?mod=space&do=blog','blog','0','0','-1','9','0','0','0','0','{STATICURL}image/feed/blog_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('37','0','相册','','home.php?mod=space&do=album','album','0','0','-1','10','0','0','0','0','{STATICURL}image/feed/album_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('38','0','分享','','home.php?mod=space&do=share','share','0','0','-1','11','0','0','0','0','{STATICURL}image/feed/share_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('39','0','记录','','home.php?mod=space&do=doing','doing','0','0','-1','12','0','0','0','0','{STATICURL}image/feed/doing_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('40','0','留言板','','home.php?mod=space&do=wall','wall','0','0','-1','13','0','0','0','0','{STATICURL}image/feed/wall_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('41','0','广播','','home.php?mod=follow','follow','0','0','-1','14','0','0','0','0','{STATICURL}image/feed/follow_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('42','0','群组','','group.php','group','0','0','-1','15','0','0','0','0','{STATICURL}image/feed/group_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('43','0','门户','','portal.php','portal','0','0','-1','16','0','0','0','0','{STATICURL}image/feed/portal_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('44','0','导读','','forum.php?mod=guide','guide','0','0','-1','17','0','0','0','0','{STATICURL}image/feed/guide_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('45','0','排行榜','','misc.php?mod=ranklist','ranklist','0','0','-1','18','0','0','0','0','{STATICURL}image/feed/ranklist_b.png','','','3','');");
DB_I("replace  into `pre_common_nav` values('46','0','设为首页','','#','sethomepage','0','0','1','1','0','0','0','0','','','','4','');");
DB_I("replace  into `pre_common_nav` values('47','0','收藏本站','','#','setfavorite','0','0','1','2','0','0','0','0','','','','4','');");
DB_I("replace  into `pre_common_nav` values('48','0','我要投资','','http://cjc.cc/invest/index.html','','0','1','1','2','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('49','0','我要借款','','http://cjc.cc/borrow/index.html','','0','1','1','3','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('50','0','我的账户','','http://cjc.cc/member/common/login/','','0','1','1','4','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('51','0','帮助中心','','http://cjc.cc/help/index.html','','0','1','1','9','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('53','0','会员社区','','http://cjc.cc/bbs/forum.php','','0','1','1','5','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('54','0','借贷工具','','http://cjc.cc/invests/tool.html','','0','1','1','6','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('55','0','网站首页','','http://cjc.cc/index.html','','0','1','1','1','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('56','0','关于我们','','http://cjc.cc/dfafa/index.html','','0','1','1','8','0','0','1','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('57','55','首页','','http://cjc.cc/index.html','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('58','55','资费说明','','http://cjc.cc/indexs/zf.html','','0','1','1','1','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('59','48','正在进行的借款','','http://cjc.cc/invest/index?borrow_status=2','','0','1','1','1','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('60','48','复审中的借款','','http://cjc.cc/invest/index?borrow_status=4','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('61','55','平台原理','','http://cjc.cc/indexs/about.html','','0','1','1','5','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('62','55','网站公告','','http://cjc.cc/indexs/notice.html','','0','1','1','4','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('63','55','行业新闻','','http://cjc.cc/indexs/ddd.html','','0','1','1','3','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('64','55','政策法规','','http://cjc.cc/indexs/zc.html','','0','1','1','2','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('65','48','已完成的借款','','http://cjc.cc/invest/index?borrow_status=7','','0','1','1','3','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('66','48','还款中的借款','','http://cjc.cc/invest/index?borrow_status=6','','0','1','1','2','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('67','49','发布抵押标','','http://cjc.cc/borrow/post/mortgage.html','','0','1','1','4','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('68','49','发布秒标','','http://cjc.cc/borrow/post/second.html','','0','1','1','3','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('69','49','发布净值标','','http://cjc.cc/borrow/post/net.html','','0','1','1','2','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('70','49','发布担保标','','http://cjc.cc/borrow/post/vouch.html','','0','1','1','1','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('71','49','发布信用标','','http://cjc.cc/borrow/post/normal.html','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('72','56','媒体报道','','http://cjc.cc/dfafa/mtibd.html','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('73','51','线下充值','','http://cjc.cc/help/xianxiachongzhi.html','','0','1','1','1','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('74','51','在线客服','','http://cjc.cc/help/hylm.html','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('75','50','登录账户','','http://cjc.cc/member/common/actlogout/','','0','1','1','1','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('76','50','退出登录','','http://cjc.cc/member/common/login/','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('77','54','按季还款利息计算器','','http://cjc.cc/invests/tool3.html','','0','1','1','2','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('78','54','一次性还款利息计算器','','http://cjc.cc/invests/tool2.html','','0','1','1','1','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('79','54','分期还款利息计算器','','http://cjc.cc/invests/tool.html','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('80','53','新手讨论','','forum.php?mod=forumdisplay&fid=42','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('81','53','投资理财交流','','forum.php?mod=forumdisplay&fid=46','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('82','53','经验分享','','forum.php?mod=forumdisplay&fid=43','','0','1','1','0','0','0','0','0','','','','0','');");
DB_I("replace  into `pre_common_nav` values('83','53','意见反馈','','forum.php?mod=forumdisplay&fid=36','','0','1','1','0','0','0','0','0','','','','0','');");

?>