<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_smiley`;");
DB_C("CREATE TABLE `pre_common_smiley` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` smallint(6) unsigned NOT NULL,
  `displayorder` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('smiley','stamp','stamplist') NOT NULL DEFAULT 'smiley',
  `code` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `type` (`type`,`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_smiley` values('1','1','1','smiley',':)','smile.gif');");
DB_I("replace  into `pre_common_smiley` values('2','1','2','smiley',':(','sad.gif');");
DB_I("replace  into `pre_common_smiley` values('3','1','3','smiley',':D','biggrin.gif');");
DB_I("replace  into `pre_common_smiley` values('4','1','4','smiley',':''(','cry.gif');");
DB_I("replace  into `pre_common_smiley` values('5','1','5','smiley',':@','huffy.gif');");
DB_I("replace  into `pre_common_smiley` values('6','1','6','smiley',':o','shocked.gif');");
DB_I("replace  into `pre_common_smiley` values('7','1','7','smiley',':P','tongue.gif');");
DB_I("replace  into `pre_common_smiley` values('8','1','8','smiley',':\$','shy.gif');");
DB_I("replace  into `pre_common_smiley` values('9','1','9','smiley',';P','titter.gif');");
DB_I("replace  into `pre_common_smiley` values('10','1','10','smiley',':L','sweat.gif');");
DB_I("replace  into `pre_common_smiley` values('11','1','11','smiley',':Q','mad.gif');");
DB_I("replace  into `pre_common_smiley` values('12','1','12','smiley',':lol','lol.gif');");
DB_I("replace  into `pre_common_smiley` values('13','1','13','smiley',':loveliness:','loveliness.gif');");
DB_I("replace  into `pre_common_smiley` values('14','1','14','smiley',':funk:','funk.gif');");
DB_I("replace  into `pre_common_smiley` values('15','1','15','smiley',':curse:','curse.gif');");
DB_I("replace  into `pre_common_smiley` values('16','1','16','smiley',':dizzy:','dizzy.gif');");
DB_I("replace  into `pre_common_smiley` values('17','1','17','smiley',':shutup:','shutup.gif');");
DB_I("replace  into `pre_common_smiley` values('18','1','18','smiley',':sleepy:','sleepy.gif');");
DB_I("replace  into `pre_common_smiley` values('19','1','19','smiley',':hug:','hug.gif');");
DB_I("replace  into `pre_common_smiley` values('20','1','20','smiley',':victory:','victory.gif');");
DB_I("replace  into `pre_common_smiley` values('21','1','21','smiley',':time:','time.gif');");
DB_I("replace  into `pre_common_smiley` values('22','1','22','smiley',':kiss:','kiss.gif');");
DB_I("replace  into `pre_common_smiley` values('23','1','23','smiley',':handshake','handshake.gif');");
DB_I("replace  into `pre_common_smiley` values('24','1','24','smiley',':call:','call.gif');");
DB_I("replace  into `pre_common_smiley` values('25','2','1','smiley','{:2_25:}','01.gif');");
DB_I("replace  into `pre_common_smiley` values('26','2','2','smiley','{:2_26:}','02.gif');");
DB_I("replace  into `pre_common_smiley` values('27','2','3','smiley','{:2_27:}','03.gif');");
DB_I("replace  into `pre_common_smiley` values('28','2','4','smiley','{:2_28:}','04.gif');");
DB_I("replace  into `pre_common_smiley` values('29','2','5','smiley','{:2_29:}','05.gif');");
DB_I("replace  into `pre_common_smiley` values('30','2','6','smiley','{:2_30:}','06.gif');");
DB_I("replace  into `pre_common_smiley` values('31','2','7','smiley','{:2_31:}','07.gif');");
DB_I("replace  into `pre_common_smiley` values('32','2','8','smiley','{:2_32:}','08.gif');");
DB_I("replace  into `pre_common_smiley` values('33','2','9','smiley','{:2_33:}','09.gif');");
DB_I("replace  into `pre_common_smiley` values('34','2','10','smiley','{:2_34:}','10.gif');");
DB_I("replace  into `pre_common_smiley` values('35','2','11','smiley','{:2_35:}','11.gif');");
DB_I("replace  into `pre_common_smiley` values('36','2','12','smiley','{:2_36:}','12.gif');");
DB_I("replace  into `pre_common_smiley` values('37','2','13','smiley','{:2_37:}','13.gif');");
DB_I("replace  into `pre_common_smiley` values('38','2','14','smiley','{:2_38:}','14.gif');");
DB_I("replace  into `pre_common_smiley` values('39','2','15','smiley','{:2_39:}','15.gif');");
DB_I("replace  into `pre_common_smiley` values('40','2','16','smiley','{:2_40:}','16.gif');");
DB_I("replace  into `pre_common_smiley` values('41','3','1','smiley','{:3_41:}','01.gif');");
DB_I("replace  into `pre_common_smiley` values('42','3','2','smiley','{:3_42:}','02.gif');");
DB_I("replace  into `pre_common_smiley` values('43','3','3','smiley','{:3_43:}','03.gif');");
DB_I("replace  into `pre_common_smiley` values('44','3','4','smiley','{:3_44:}','04.gif');");
DB_I("replace  into `pre_common_smiley` values('45','3','5','smiley','{:3_45:}','05.gif');");
DB_I("replace  into `pre_common_smiley` values('46','3','6','smiley','{:3_46:}','06.gif');");
DB_I("replace  into `pre_common_smiley` values('47','3','7','smiley','{:3_47:}','07.gif');");
DB_I("replace  into `pre_common_smiley` values('48','3','8','smiley','{:3_48:}','08.gif');");
DB_I("replace  into `pre_common_smiley` values('49','3','9','smiley','{:3_49:}','09.gif');");
DB_I("replace  into `pre_common_smiley` values('50','3','10','smiley','{:3_50:}','10.gif');");
DB_I("replace  into `pre_common_smiley` values('51','3','11','smiley','{:3_51:}','11.gif');");
DB_I("replace  into `pre_common_smiley` values('52','3','12','smiley','{:3_52:}','12.gif');");
DB_I("replace  into `pre_common_smiley` values('53','3','13','smiley','{:3_53:}','13.gif');");
DB_I("replace  into `pre_common_smiley` values('54','3','14','smiley','{:3_54:}','14.gif');");
DB_I("replace  into `pre_common_smiley` values('55','3','15','smiley','{:3_55:}','15.gif');");
DB_I("replace  into `pre_common_smiley` values('56','3','16','smiley','{:3_56:}','16.gif');");
DB_I("replace  into `pre_common_smiley` values('57','3','17','smiley','{:3_57:}','17.gif');");
DB_I("replace  into `pre_common_smiley` values('58','3','18','smiley','{:3_58:}','18.gif');");
DB_I("replace  into `pre_common_smiley` values('59','3','19','smiley','{:3_59:}','19.gif');");
DB_I("replace  into `pre_common_smiley` values('60','3','20','smiley','{:3_60:}','20.gif');");
DB_I("replace  into `pre_common_smiley` values('61','3','21','smiley','{:3_61:}','21.gif');");
DB_I("replace  into `pre_common_smiley` values('62','3','22','smiley','{:3_62:}','22.gif');");
DB_I("replace  into `pre_common_smiley` values('63','3','23','smiley','{:3_63:}','23.gif');");
DB_I("replace  into `pre_common_smiley` values('64','3','24','smiley','{:3_64:}','24.gif');");
DB_I("replace  into `pre_common_smiley` values('65','0','0','stamp','精华','001.gif');");
DB_I("replace  into `pre_common_smiley` values('66','0','1','stamp','热帖','002.gif');");
DB_I("replace  into `pre_common_smiley` values('67','0','2','stamp','美图','003.gif');");
DB_I("replace  into `pre_common_smiley` values('68','0','3','stamp','优秀','004.gif');");
DB_I("replace  into `pre_common_smiley` values('69','0','4','stamp','置顶','005.gif');");
DB_I("replace  into `pre_common_smiley` values('70','0','5','stamp','推荐','006.gif');");
DB_I("replace  into `pre_common_smiley` values('71','0','6','stamp','原创','007.gif');");
DB_I("replace  into `pre_common_smiley` values('72','0','7','stamp','版主推荐','008.gif');");
DB_I("replace  into `pre_common_smiley` values('73','0','8','stamp','爆料','009.gif');");
DB_I("replace  into `pre_common_smiley` values('74','0','9','stamplist','精华','001.small.gif');");
DB_I("replace  into `pre_common_smiley` values('75','0','10','stamplist','热帖','002.small.gif');");
DB_I("replace  into `pre_common_smiley` values('76','0','11','stamplist','美图','003.small.gif');");
DB_I("replace  into `pre_common_smiley` values('77','0','12','stamplist','优秀','004.small.gif');");
DB_I("replace  into `pre_common_smiley` values('78','0','13','stamplist','置顶','005.small.gif');");
DB_I("replace  into `pre_common_smiley` values('79','0','14','stamplist','推荐','006.small.gif');");
DB_I("replace  into `pre_common_smiley` values('80','0','15','stamplist','原创','007.small.gif');");
DB_I("replace  into `pre_common_smiley` values('81','0','16','stamplist','版主推荐','008.small.gif');");
DB_I("replace  into `pre_common_smiley` values('82','0','17','stamplist','爆料','009.small.gif');");
DB_I("replace  into `pre_common_smiley` values('83','4','19','stamp','编辑采用','010.gif');");
DB_I("replace  into `pre_common_smiley` values('84','0','18','stamplist','编辑采用','010.small.gif');");
DB_I("replace  into `pre_common_smiley` values('85','0','20','stamplist','新人帖','011.small.gif');");

?>