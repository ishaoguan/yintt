<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_pluginvar`;");
DB_C("CREATE TABLE `pre_common_pluginvar` (
  `pluginvarid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pluginid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `variable` varchar(40) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT 'text',
  `value` text NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY (`pluginvarid`),
  KEY `pluginid` (`pluginid`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_pluginvar` values('1','9','31','是否自定义图片','(*) 根据需要进行自定义图片以便论坛推广。选择是后FLASH将只显示自定义图片，以上图片设置失效，但以下自定义项为空时除外。','pic_switch','radio','0','');");
DB_I("replace  into `pre_common_pluginvar` values('2','9','30','图片调用方式','(*) 选择图片调用的依据.','pic_transfer','select','1','1 = 日期先后顺序\r\n2 = 下载次数多少\r\n3 = 随机调用无序');");
DB_I("replace  into `pre_common_pluginvar` values('3','9','1','游客是否显示','','is_guest','radio','1','');");
DB_I("replace  into `pre_common_pluginvar` values('4','9','29','图片搜索张数','(*) 设置图片搜索的张数，以避免搜索过早发布的图片。','pic_schnum','number','50','');");
DB_I("replace  into `pre_common_pluginvar` values('5','9','28','只显图片设置','(*) 设置只想被调用显示图片的版块fid 。单个如： 2  多个如: 1,2,3 不限制则留空，请谨慎设置。','only_pic','text','','');");
DB_I("replace  into `pre_common_pluginvar` values('6','9','27','图片标题颜色','设置FLASH 的标题背景色及当前按钮色，以配合论坛风格显示。若为空则为默认颜色:#0099FF (必须为16进制式)','pic_color','color','','');");
DB_I("replace  into `pre_common_pluginvar` values('7','9','26','图片显示张数','设置N格中图片显示的张数，建议6张以内。(不影响自定义图片张数)','pic_num','number','6','');");
DB_I("replace  into `pre_common_pluginvar` values('8','9','25','图片切换时间','单位（秒），设置图片切换时间间隔','pic_cut','number','6','');");
DB_I("replace  into `pre_common_pluginvar` values('9','9','23','周期发帖数颜色','设置周期会员排行发帖数颜色。若为空则等同于下面[图片标题颜色]','authnum_color','color','','');");
DB_I("replace  into `pre_common_pluginvar` values('10','9','22','周期发帖会员显示字数','(*) 根据需要设置周期发帖会员的显示长度(字节)','ahthor_nums','number','8','');");
DB_I("replace  into `pre_common_pluginvar` values('11','9','21','横排会员显示头像','横排显示排行会员时，是否使用显示会员头像方式。(是：只显示会员头像，否：显示会员文字列表)','five_pic','radio','1','');");
DB_I("replace  into `pre_common_pluginvar` values('12','9','20','会员调用显示方式','是否横排显示调用的会员列表。\r\n是：横排显示\r\n否：竖排显示。','five_list','radio','1','');");
DB_I("replace  into `pre_common_pluginvar` values('13','9','19','第五格会员发帖排行周期','(*) 当为五格时，调用发帖排行周期。请同时设置 [N格标题设置]','author_date','select','6','1 = 今日排行\r\n2 = 本周排行\r\n3 = 本月排行\r\n4 = 本年排行\r\n5 = 总帖排行\r\n6 = 新注册会员');");
DB_I("replace  into `pre_common_pluginvar` values('14','9','18','精华级别设置','(*) 设置精华的调用级别。如单个: 1 或多个: 1,2,3  (当第四格为精华时设置)','dig_rank','text','1,2,3','');");
DB_I("replace  into `pre_common_pluginvar` values('15','9','17','精华排序方式','(*) 设置精华帖子的排序依据 (当第四格为精华时设置)','dig_list','select','4','1 = 回复最多精华\r\n2 = 浏览最多精华\r\n3 = 最新精华帖子\r\n4 = 最新回复精华');");
DB_I("replace  into `pre_common_pluginvar` values('16','9','16','第四格天数(热门或精华)','(*) 设置热门或精华时调用多少天内帖子，单位(天) (注意热门或精华都生效)','tid_day','number','7','');");
DB_I("replace  into `pre_common_pluginvar` values('17','9','14','设置调用热门或精华','(*) 设置第四栏调用内容，请区分设置以下四项中对应的选项，请同时设置 [N格标题设置]\r\n。','hot_dig','select','1','1 = 第四格为调用热门帖子\r\n2 = 第四格为调用精华帖子');");
DB_I("replace  into `pre_common_pluginvar` values('18','9','15','热门排序方式','(*) 设置热门帖子的排序依据 (当第四格为热门时设置)','hot_list','select','2','1 = 按回复次数多到少\r\n2 = 按浏览次数多到少');");
DB_I("replace  into `pre_common_pluginvar` values('19','9','13','只显版块ID设置(主题)','(*) 设置只想被调用的版块fid。与上面非显设置方法相同。若为空则不限。','only_show','text','','');");
DB_I("replace  into `pre_common_pluginvar` values('20','9','11','右排显示发帖会员','是否在主题右排显示发帖会员','is_author','radio','1','');");
DB_I("replace  into `pre_common_pluginvar` values('21','9','12','非显版块ID设置(主题)','(*) 设置不想被调用的版块fid。单个如:1 多个如: 1,2,11 请谨慎设置。若为空则不限。','not_show','text','','');");
DB_I("replace  into `pre_common_pluginvar` values('22','9','9','标题文字长度','(*) 一个中文字相当于2个字节。','subject_length','number','22','');");
DB_I("replace  into `pre_common_pluginvar` values('23','9','10','右排发帖会员色','设置右排显示发帖会员的文字颜色。若为空则等同于下面[周期发帖数颜色]','author_color','color','#95B9FF','');");
DB_I("replace  into `pre_common_pluginvar` values('24','9','7','是否高亮主题','(*) 是否根据主题本身的加亮或加粗显示主题。','highlight','radio','1','');");
DB_I("replace  into `pre_common_pluginvar` values('25','9','8','链接打开窗口','设置点击主题时是否在新窗口中打开','link_window','radio','1','');");
DB_I("replace  into `pre_common_pluginvar` values('26','9','6','鼠标提示文字前缀','自由设置鼠标指向的提示信息文字前缀。共七行。','propre','textarea','论坛: \r\n标题: \r\n发表: \r\n浏览: \r\n次\r\n回复: \r\n回复: 暂未','');");
DB_I("replace  into `pre_common_pluginvar` values('27','9','4','N 格标题设置','设置N格中的每个部分显示的标题，\r\n一行设置一个请分四或五行输入','set_title','textarea','论坛图片\r\n最新帖子\r\n最新回复\r\n本周热门\r\n新会员','');");
DB_I("replace  into `pre_common_pluginvar` values('28','9','3','插件缓存时间','设置主题和图片缓存时间，单位(秒)。\r\n\r\n注意：当设置或更改带(*) 选项时需达到本[插件缓存时间]才会生效。','cache_time','number','1','');");
DB_I("replace  into `pre_common_pluginvar` values('29','9','32','自定义图片地址','自定义图片的地址每一行一个，可以使用相对或绝对路径。','pic_urls','textarea','','');");
DB_I("replace  into `pre_common_pluginvar` values('30','9','33','自定义图片标题','自定义与图片地址对应的标题每一行一个，个数请与上面相等。','pic_titles','textarea','','');");
DB_I("replace  into `pre_common_pluginvar` values('31','9','34','自定义图片链接','自定义与图片地址对应的链接每一行一个，个数请与上面相等。','pic_links','textarea','','');");
DB_I("replace  into `pre_common_pluginvar` values('32','9','35','是否图片调用','是否调用图片。','pic_on','radio','1','');");
DB_I("replace  into `pre_common_pluginvar` values('33','9','36','会员调用个数','设置调用的会员个数。填入数字，如果设置了竖排调用的话，请保证改数值和帖子调用数目一致。','user_num','number','10','');");
DB_I("replace  into `pre_common_pluginvar` values('34','9','37','用自定义标题样式','设置标题的CSS样式，以如下的形式写入CSS代码：\r\nwidth:20px;background:#000;','userdefinecss','text','','');");
DB_I("replace  into `pre_common_pluginvar` values('35','9','38','帖子调用数目','帖子调用数目。建议不要超过10。','thread_num','number','10','');");
DB_I("replace  into `pre_common_pluginvar` values('36','9','39','标签式浏览','','tab_style','radio','0','');");
DB_I("replace  into `pre_common_pluginvar` values('37','10','0','允许使用马甲','设置哪些用户组可以使用马甲切换功能','usergroups','groups','','');");
DB_I("replace  into `pre_common_pluginvar` values('38','11','1','显示的数量','','shownum','number','3','');");
DB_I("replace  into `pre_common_pluginvar` values('39','11','0','显示的标题','','showtitle','text','<font style=\"font-weight:700\">我玩的应用:</font><br/>','');");
DB_I("replace  into `pre_common_pluginvar` values('40','11','2','显示用户漫游动态','开启后帖子下方显示本用户的漫游动态','showmyapp','radio','1','');");

?>