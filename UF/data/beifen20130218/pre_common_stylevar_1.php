<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_stylevar`;");
DB_C("CREATE TABLE `pre_common_stylevar` (
  `stylevarid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `styleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `variable` text NOT NULL,
  `substitute` text NOT NULL,
  PRIMARY KEY (`stylevarid`),
  KEY `styleid` (`styleid`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_stylevar` values('1','1','menuhoverbgcolor','#005AB4 nv_a.png no-repeat 50% -33px');");
DB_I("replace  into `pre_common_stylevar` values('2','1','lightlink','#FFF');");
DB_I("replace  into `pre_common_stylevar` values('3','1','floatbgcolor','#FFF');");
DB_I("replace  into `pre_common_stylevar` values('4','1','dropmenubgcolor','#FEFEFE');");
DB_I("replace  into `pre_common_stylevar` values('5','1','floatmaskbgcolor','#000');");
DB_I("replace  into `pre_common_stylevar` values('6','1','dropmenuborder','#DDD');");
DB_I("replace  into `pre_common_stylevar` values('7','1','specialbg','#E5EDF2');");
DB_I("replace  into `pre_common_stylevar` values('8','1','specialborder','#C2D5E3');");
DB_I("replace  into `pre_common_stylevar` values('9','1','commonbg','#F2F2F2');");
DB_I("replace  into `pre_common_stylevar` values('10','1','commonborder','#CDCDCD');");
DB_I("replace  into `pre_common_stylevar` values('11','1','inputbg','#FFF');");
DB_I("replace  into `pre_common_stylevar` values('12','1','stypeid','1');");
DB_I("replace  into `pre_common_stylevar` values('13','1','inputborderdarkcolor','#848484');");
DB_I("replace  into `pre_common_stylevar` values('14','1','headerbgcolor','#FFFFFF');");
DB_I("replace  into `pre_common_stylevar` values('15','1','headerborder','0');");
DB_I("replace  into `pre_common_stylevar` values('16','1','sidebgcolor',' vlineb.png repeat-y 0 0');");
DB_I("replace  into `pre_common_stylevar` values('17','1','msgfontsize','14px');");
DB_I("replace  into `pre_common_stylevar` values('18','1','bgcolor','#FFF background.png repeat-x 0 0');");
DB_I("replace  into `pre_common_stylevar` values('19','1','noticetext','#F26C4F');");
DB_I("replace  into `pre_common_stylevar` values('20','1','highlightlink','#369');");
DB_I("replace  into `pre_common_stylevar` values('21','1','link','#333');");
DB_I("replace  into `pre_common_stylevar` values('22','1','lighttext','#999');");
DB_I("replace  into `pre_common_stylevar` values('23','1','midtext','#666');");
DB_I("replace  into `pre_common_stylevar` values('24','1','tabletext','#444');");
DB_I("replace  into `pre_common_stylevar` values('25','1','smfontsize','0.83em');");
DB_I("replace  into `pre_common_stylevar` values('26','1','threadtitlefont','Tahoma,Helvetica,''SimSun'',sans-serif');");
DB_I("replace  into `pre_common_stylevar` values('27','1','threadtitlefontsize','14px');");
DB_I("replace  into `pre_common_stylevar` values('28','1','smfont','Tahoma,Helvetica,sans-serif');");
DB_I("replace  into `pre_common_stylevar` values('29','1','titlebgcolor','#E5EDF2 titlebg.png repeat-x 0 0');");
DB_I("replace  into `pre_common_stylevar` values('30','1','fontsize','12px/1.5');");
DB_I("replace  into `pre_common_stylevar` values('31','1','font','Tahoma,Helvetica,''SimSun'',sans-serif');");
DB_I("replace  into `pre_common_stylevar` values('32','1','styleimgdir','');");
DB_I("replace  into `pre_common_stylevar` values('33','1','imgdir','');");
DB_I("replace  into `pre_common_stylevar` values('34','1','boardimg','logo.jpg');");
DB_I("replace  into `pre_common_stylevar` values('35','1','available','');");
DB_I("replace  into `pre_common_stylevar` values('36','1','headertext','#444');");
DB_I("replace  into `pre_common_stylevar` values('37','1','footertext','#666');");
DB_I("replace  into `pre_common_stylevar` values('38','1','menubgcolor','#2B7ACD nv.png no-repeat 0 0');");
DB_I("replace  into `pre_common_stylevar` values('39','1','menutext','#FFF');");
DB_I("replace  into `pre_common_stylevar` values('40','1','menuhovertext','#FFF');");
DB_I("replace  into `pre_common_stylevar` values('41','1','wrapbg','#FFF');");
DB_I("replace  into `pre_common_stylevar` values('42','1','wrapbordercolor','#CCC');");
DB_I("replace  into `pre_common_stylevar` values('43','1','contentwidth','630px');");
DB_I("replace  into `pre_common_stylevar` values('44','1','contentseparate','#C2D5E3');");
DB_I("replace  into `pre_common_stylevar` values('45','1','inputborder','#E0E0E0');");

?>