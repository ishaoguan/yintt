<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_video_apply`;");
DB_C("CREATE TABLE `lzh_video_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  `apply_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credits` int(11) NOT NULL DEFAULT '0',
  `deal_user` int(10) unsigned NOT NULL,
  `deal_time` int(10) unsigned NOT NULL,
  `deal_info` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_video_apply` values('1','2771','1346890677','112.233.83.119','1','0','2','1346911204','sdfsdf');");
DB_I("replace  into `lzh_video_apply` values('2','1021','1346890904','112.233.62.73','1','0','2','1346914330','sdf');");
DB_I("replace  into `lzh_video_apply` values('3','1082','1346892441','112.233.83.119','1','0','13','1346979281','');");
DB_I("replace  into `lzh_video_apply` values('4','2898','1346895448','119.177.251.226','1','0','13','1346979300','');");
DB_I("replace  into `lzh_video_apply` values('5','2904','1346895512','119.177.251.226','1','0','13','1346979313','');");
DB_I("replace  into `lzh_video_apply` values('6','2920','1346896648','112.228.227.209','1','10','16','1346985663','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('7','2910','1346897912','119.177.251.226','1','10','16','1346985710','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('8','1346','1346898745','123.135.45.192','1','10','16','1346985797','审核');");
DB_I("replace  into `lzh_video_apply` values('9','2870','1346899487','112.233.51.61','2','0','16','1346985836','');");
DB_I("replace  into `lzh_video_apply` values('10','2895','1346900657','112.234.216.138','1','10','16','1346985915','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('11','496','1346903645','112.233.83.119','1','10','16','1346985968','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('12','1073','1346907202','119.177.199.141','2','0','16','1346985993','');");
DB_I("replace  into `lzh_video_apply` values('13','2871','1346909850','112.233.51.61','2','0','16','1346986021','审核不通过！');");
DB_I("replace  into `lzh_video_apply` values('14','2855','1346912377','112.233.51.61','1','0','13','1346913174','审核失败！四大认证未通过！不能申请此认证！');");
DB_I("replace  into `lzh_video_apply` values('15','2680','1346913304','112.233.83.119','1','10','16','1346986056','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('16','2872','1346913621','112.233.51.61','1','0','13','1346913828','审核失败！');");
DB_I("replace  into `lzh_video_apply` values('17','2917','1346916925','119.177.251.226','1','10','16','1346986094','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('18','2670','1346919168','112.241.6.130','1','10','16','1346986151','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('19','2873','1346919196','119.176.167.108','1','0','13','1346920597','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('20','2874','1346921284','119.176.167.108','2','0','13','1346921462','');");
DB_I("replace  into `lzh_video_apply` values('21','2379','1346976733','123.131.167.222','1','10','16','1346986231','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('22','87','1346979652','112.251.30.55','1','10','16','1346986274','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('23','2924','1346984895','112.228.225.87','1','10','16','1346986334','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('24','2851','1346989723','112.228.225.87','1','10','16','1346998768','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('25','2887','1346989782','112.228.225.87','1','10','16','1346998863','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('26','2891','1346989823','112.228.225.87','1','10','16','1346998946','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('27','2922','1346989968','112.228.225.87','1','10','16','1346999003','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('28','2874','1346990949','112.251.30.55','1','10','16','1346991078','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('29','2294','1346998136','123.131.167.222','1','10','16','1346999182','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('30','2278','1346998273','123.131.167.222','1','10','16','1346999247','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('31','2763','1347005198','112.233.62.73','1','10','16','1347005606','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('32','2437','1347006340','182.37.246.106','1','10','16','1347067620','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('33','2192','1347010480','112.233.114.75','1','10','16','1347067705','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('34','2151','1347010953','112.233.114.75','1','10','16','1347067765','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('35','2013','1347012121','222.173.154.158','1','10','16','1347067841','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('36','2205','1347025878','112.233.114.75','2','0','16','1347067883','');");
DB_I("replace  into `lzh_video_apply` values('37','2126','1347026308','112.233.114.75','1','10','16','1347067993','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('38','1959','1347066488','112.234.33.197','1','10','16','1347085467','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('39','2425','1347067290','112.234.33.197','1','10','16','1347068066','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('40','2203','1347067792','112.234.33.197','1','10','16','1347093675','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('41','2747','1347069370','112.234.33.197','1','10','16','1347083080','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('42','1984','1347070862','112.234.33.197','1','10','16','1347071083','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('43','2340','1347071550','112.234.33.197','1','10','16','1347088310','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('44','2167','1347071794','112.234.33.197','2','0','13','1347347829','审核失败！请上传视频认证的资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('45','1992','1347072241','112.234.33.197','1','10','16','1347074177','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('46','459','1347072766','112.234.33.197','2','0','16','1347074120','审核失败！');");
DB_I("replace  into `lzh_video_apply` values('47','355','1347084199','112.234.185.10','2','0','13','1347347908','审核失败！请上传视频认真的资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('48','1045','1347154885','60.213.89.213','1','10','16','1347157326','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('49','2871','1347157300','112.233.61.114','2','0','13','1347347974','审核失败！请上传视频认证的资料谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('50','1749','1347197607','112.228.198.139','2','0','13','1347348092','审核失败！请上传视频认证类的资历。谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('51','2876','1347263808','112.233.57.157','1','0','18','1347263893','审核通过');");
DB_I("replace  into `lzh_video_apply` values('52','2938','1347326607','119.165.107.224','2','0','13','1347348166','审核失败！请上传基本资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('53','723','1347326769','119.176.164.223','2','0','16','1347333723','审核不通过！');");
DB_I("replace  into `lzh_video_apply` values('54','2939','1347329706','119.177.159.245','1','10','13','1347348243','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('55','2435','1347330352','182.37.244.202','1','10','16','1347333863','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('56','1844','1347330645','182.37.244.202','1','10','16','1347333995','');");
DB_I("replace  into `lzh_video_apply` values('57','1858','1347330705','182.37.244.202','1','10','16','1347334210','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('58','1995','1347330758','182.37.244.202','1','10','16','1347334342','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('59','2935','1347330813','119.165.107.224','2','0','13','1347348285','审核失败！请上传资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('60','2014','1347330833','182.37.244.202','1','10','16','1347334465','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('61','2185','1347330907','182.37.244.202','1','10','13','1347348458','审核失败！');");
DB_I("replace  into `lzh_video_apply` values('62','2553','1347331091','182.37.244.202','1','10','13','1347348497','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('63','2835','1347331280','182.37.244.202','2','0','13','1347348573','审核失败！请上传标准类的视频资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('64','499','1347334508','119.176.164.223','1','10','13','1347348598','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('65','438','1347335793','119.176.164.223','2','0','13','1347348650','');");
DB_I("replace  into `lzh_video_apply` values('66','2934','1347336026','119.176.151.166','2','0','13','1347348711','审核失败！请上传视频认证类资料谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('67','2941','1347346628','112.233.59.211','2','0','13','1347348769','审核失败！请上传视频认证类资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('68','2938','1347350968','119.165.107.224','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('69','2903','1347352306','182.37.244.202','1','10','16','1347585007','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('70','2941','1347354922','112.233.59.211','1','10','79','1347355152','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('71','2841','1347396795','112.82.228.140','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('72','2921','1347412712','119.176.145.165','1','10','16','1347585071','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('73','2862','1347413020','112.251.31.209','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('74','1870','1347417989','117.32.101.66','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('75','355','1347429333','112.233.82.66','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('76','2816','1347431534','112.233.82.66','1','10','16','1347585146','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('77','2906','1347431630','112.233.82.66','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('78','2811','1347431693','112.233.82.66','1','10','16','1347585194','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('79','2888','1347431758','112.233.82.66','1','10','16','1347585223','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('80','2909','1347431813','112.233.82.66','1','10','16','1347585252','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('81','2733','1347433473','112.233.82.66','1','10','16','1347585286','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('82','2912','1347436102','182.37.247.198','1','10','13','1347592639','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('83','2866','1347436530','112.251.31.209','2','0','13','1347592689','审核失败!请先申请实名认证，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('84','2911','1347436967','111.36.186.178','2','0','13','1347592792','审核失败！请上传视频认证类资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('85','438','1347437034','119.176.164.223','1','10','16','1347585335','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('86','2817','1347438965','112.251.31.209','1','0','18','1347438992','审核通过');");
DB_I("replace  into `lzh_video_apply` values('87','2936','1347439189','112.233.82.66','1','10','16','1347585369','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('88','2871','1347439937','112.251.31.209','1','0','18','1347439969','审核通过');");
DB_I("replace  into `lzh_video_apply` values('89','692','1347440763','112.233.82.66','1','10','16','1347585400','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('90','2870','1347443021','112.251.31.209','1','0','18','1347444239','审核通过');");
DB_I("replace  into `lzh_video_apply` values('91','2935','1347506678','119.165.109.23','2','0','13','1347592493','审核失败！请上传资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('92','2885','1347518271','27.197.130.112','1','10','16','1347585444','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('93','2929','1347522421','119.177.196.2','2','0','13','1347592444','审核失败！请上传视频认证类资料，谢谢合作！');");
DB_I("replace  into `lzh_video_apply` values('94','413','1347524592','27.197.130.112','1','10','13','1347592367','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('95','2770','1347525008','119.177.196.2','1','10','13','1347592347','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('96','2931','1347544878','119.176.165.43','1','0','18','1347544924','');");
DB_I("replace  into `lzh_video_apply` values('97','2818','1347547505','119.176.165.43','1','0','18','1347547548','审核通过');");
DB_I("replace  into `lzh_video_apply` values('98','1004','1347577044','112.251.68.89','1','10','13','1347592314','');");
DB_I("replace  into `lzh_video_apply` values('99','2956','1347582605','113.122.198.89','1','10','16','1347585682','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('100','857','1347582679','112.233.54.243','1','1','74','1347582829','');");
DB_I("replace  into `lzh_video_apply` values('101','1154','1347582840','113.122.198.89','1','5','74','1347582861','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('102','2838','1347584744','112.233.54.243','1','10','16','1347585696','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('103','648','1347591654','112.233.60.20','1','10','13','1347592268','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('104','2945','1347603216','119.177.196.82','1','10','13','1347680254','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('105','2144','1347606604','119.177.196.82','1','10','16','1347759233','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('106','2692','1347606634','119.177.196.82','1','10','16','1347759325','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('107','2902','1347606667','119.177.196.82','1','10','16','1347759510','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('108','2451','1347606692','119.177.196.82','1','10','16','1347759559','审核通过！');");
DB_I("replace  into `lzh_video_apply` values('109','459','1347609131','119.177.153.233','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('110','1483','1347674755','112.233.111.123','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('111','1839','1347697151','119.177.196.15','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('112','2301','1347698604','119.177.196.15','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('113','835','1347699937','112.233.54.201','1','0','18','1347699957','审核通过');");
DB_I("replace  into `lzh_video_apply` values('114','2934','1347700184','119.177.196.15','1','10','16','1347759701','审核通过!');");
DB_I("replace  into `lzh_video_apply` values('115','2896','1347756600','182.37.223.211','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('116','1486','1347757714','119.176.149.220','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('117','1421','1347758323','119.176.149.220','1','2','2','1347811809','f');");
DB_I("replace  into `lzh_video_apply` values('118','2925','1347760357','182.37.223.211','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('119','1322','1347766031','112.233.48.174','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('120','2596','1347766128','112.233.48.174','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('121','2944','1347767263','119.176.149.220','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('122','2968','1347767397','113.122.196.72','2','0','2','1347908644','asd');");
DB_I("replace  into `lzh_video_apply` values('123','2172','1347774762','119.176.149.220','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('124','2052','1347777757','119.176.149.220','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('125','2962','1347780560','112.233.48.174','1','0','106','1352615707','');");
DB_I("replace  into `lzh_video_apply` values('126','2968','1347908650','127.0.0.1','1','0','2','1347908659','fsdfwef');");
DB_I("replace  into `lzh_video_apply` values('127','2970','1348323896','59.175.0.184','1','10','100','1348325669','');");
DB_I("replace  into `lzh_video_apply` values('128','2971','1348324540','59.175.0.184','1','10','100','1348325678','');");
DB_I("replace  into `lzh_video_apply` values('129','3027','1356589325','116.208.86.178','1','0','106','1356590084','');");
DB_I("replace  into `lzh_video_apply` values('130','2974','1356590095','124.164.232.22','1','10','101','1356590113','10');");
DB_I("replace  into `lzh_video_apply` values('131','3032','1356961569','124.90.141.6','0','0','0','0','');");
DB_I("replace  into `lzh_video_apply` values('132','3033','1357956153','127.0.0.6','1','0','101','1357956164','');");

?>