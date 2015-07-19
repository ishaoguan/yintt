<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_ad`;");
DB_C("CREATE TABLE `lzh_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `start_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `ad_type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_ad` values('1','<img style=\"margin: 0px; float: none\" alt=\"\" src=\"/UF/Uploads/Article/20130109150454.jpg\" />','1357660800','1391097600','1357715233','首页LOGO图片（推荐LOGO图片大小：220*65像素）','0');");
DB_I("replace  into `lzh_ad` values('2','<img style=\"margin: 0px; width: 171px; float: none; height: 60px\" alt=\"\" src=\"/UF/Uploads/Article/20130109150958.jpg\" />','1357660800','1391097600','1357715437','首页顶部中间广告条（尺寸大小：485*65像素）','0');");
DB_I("replace  into `lzh_ad` values('3','<img style=\"margin: 0px; float: none\" alt=\"\" src=\"/UF/Uploads/Article/20130109151144.jpg\" />','1357660800','1391011200','1357715509','首页顶部联系电话图片（推荐尺寸大小：225*65像素）','0');");
DB_I("replace  into `lzh_ad` values('4','a:3:{i:0;a:3:{s:3:\"img\";s:34:\"UF/Uploads/Ad/2013021609333381.jpg\";s:4:\"info\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:3:{s:3:\"img\";s:35:\"UF/Uploads/Ad/20130216093333367.jpg\";s:4:\"info\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:3:{s:3:\"img\";s:35:\"UF/Uploads/Ad/20130216093334839.jpg\";s:4:\"info\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','1357660800','1391097600','1357715551','首页幻灯片展示','1');");
DB_I("replace  into `lzh_ad` values('5','<img style=\"margin: 0px; width: 980px; float: none\" alt=\"\" src=\"/UF/Uploads/Article/20130109152815.jpg\" />','1357660800','1393516800','1357716501','内页中上部大广告位','0');");

?>