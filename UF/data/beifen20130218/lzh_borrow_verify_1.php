<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_borrow_verify`;");
DB_C("CREATE TABLE `lzh_borrow_verify` (
  `borrow_id` int(11) unsigned NOT NULL,
  `deal_user` mediumint(10) unsigned NOT NULL,
  `deal_time` int(10) unsigned NOT NULL,
  `deal_info` varchar(50) NOT NULL,
  `deal_time_2` int(10) unsigned NOT NULL,
  `deal_user_2` mediumint(10) unsigned NOT NULL,
  `deal_info_2` varchar(50) NOT NULL,
  `deal_status` tinyint(3) unsigned NOT NULL,
  `deal_status_2` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`borrow_id`),
  KEY `borrow_id` (`borrow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_borrow_verify` values('8','79','1346471186','初审意见','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('9','79','1346478875','审核通过！','1346547699','2','','2','5');");
DB_I("replace  into `lzh_borrow_verify` values('10','2','1346547862','e','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('11','2','1346548126','1','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('12','79','1346743977','审核不通过！该借款者不符合借款条件！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('13','79','1346744802','审核通过！','1346834451','2','1','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('14','18','1346750196','审核通过！','1346827229','18','','2','5');");
DB_I("replace  into `lzh_borrow_verify` values('15','2','1346865169','1','1347525095','79','审核不通过！您的部门资料上传格式不合格，无法查看，谢谢！','2','5');");
DB_I("replace  into `lzh_borrow_verify` values('16','2','1346827252','审核通过','1346833727','2','wefwefwef','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('17','18','1346833473','审核通过','1346865191','2','1','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('18','2','1346865150','1','1347263638','18','流标','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('19','13','1347246880','审核失败!更新住址证明，并上传借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('20','13','1347247101','审核失败！更新住址证明和银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('21','13','1347247677','审核不通过！更新有效的住址证明,谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('22','13','1346920837','审核通过！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('23','13','1347248069','审核失败！更新银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('24','79','1346991691','审核未通过！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('25','13','1347248349','审核失败，更新住址证明，并上传结婚证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('26','79','1346993323','审核不通过！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('27','13','1347248602','审核失败！上传银行流水至少6张，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('28','79','1346987867','审核未通过！您必须有一次还款记录！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('29','13','1347248625','审核失败！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('30','79','1346988167','审核通过！','1346988343','79','','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('31','79','1346989393','审核通过！','1346989534','79','审核通过！','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('32','79','1346990485','审核通过！','1346992784','79','审核未通过！','2','5');");
DB_I("replace  into `lzh_borrow_verify` values('33','79','1346992181','审核通过！','1347246326','79','审核不通过！无理由！','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('34','79','1346994013','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('35','79','1347073767','审核不通过！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('36','13','1347248974','审核失败，银行流水至少更新6张，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('37','13','1347243639','审核失败！上传户口本索引页，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('38','13','1347249350','审核失败！上传家人身份证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('39','13','1347254091','审核失败！上传户口本家人页、本人页、公章页，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('40','13','1347254314','审核失败！请上传借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('41','13','1347254491','审核失败，请更新住址证明，上传银行流水和家人身份证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('42','13','1347254917','审核失败！请上传家人身份证和借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('43','79','1347073897','审核通过！谢谢合作！','1347699739','18','流标','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('44','13','1347246635','审核失败！上传户口本索引页和家人页！并更新银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('45','13','1347246255','审核失败！资料审核全部通过之后方能借款，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('46','13','1347246065','','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('47','13','1347245998','审核失败！资料上传完整之后在发标，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('48','13','1347245081','审核失败！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('49','18','1347241894','审核通过','1347242305','18','审核通过','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('50','13','1347327593','审核失败！上传家人身份证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('51','13','1347343679','审核失败！请上传借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('52','13','1347344151','审核失败!此标发超了！谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('53','13','1347344624','审核失败！请上传正规的水电费单据，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('54','13','1347345073','审核失败！请上传资料，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('55','13','1347345523','审核失败！请填写借款详情和还款保障，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('56','13','1347345044','审核失败！上传户口本家人页、本人页、公章页，谢谢合作','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('57','13','1347345694','审核失败！请待资料完全审核通过之后在发标，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('58','13','1347345801','审核失败！请更新住址证明，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('59','13','1347345932','审核失败！资料上传不全，待资料传全并审核通过之后在发标，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('60','13','1347346119','审核失败！资料正在审核中，待资料审核通过之后方能发标，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('61','13','1347346162','审核失败！请上传家人身份证和借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('62','13','1347346267','审核失败，更新住址证明，并上传结婚证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('63','13','1347346308','审核失败，银行流水至少更新6张，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('64','13','1347346344','审核失败！上传银行流水至少6张，谢谢合作','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('65','13','1347346422','审核失败！更新住址证明和银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('66','13','1347346458','审核失败！上传户口本索引页和家人页！并更新银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('67','13','1347346649','审核不通过！请更新住址证明和银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('68','13','1347346808','审核失败！请上传银行流水和借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('69','13','1347346906','审核失败!更新住址证明，并上传借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('70','13','1347346944','审核失败！资料审核全部通过之后方能借款，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('71','13','1347327704','审核失败！请上传借款承诺书，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('72','79','1347333245','审核通过！','1347335797','79','审核通过！','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('73','13','1347347023','审核失败！由于您的资料有一部分尚在老系统中，正在转移，所以请暂时在老系统发标，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('74','79','1347336655','审核通过！请保持良好的信誉！','1347336975','79','审核通过！保持良好的还款信誉！','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('75','13','1347419166','审核失败！待资料审核通过之后在发标，并填写借款详情和还款保障，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('76','13','1347419031','审核失败！请填写借款详情和还款保障，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('77','13','1347418620','审核失败！请上传有效的住址证明，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('78','13','1347418476','审核失败！请填写还款保障，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('79','13','1347418276','审核失败！请更新银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('80','13','1347417578','审核失败！请更新住址证明谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('81','13','1347418013','审核失败！请填写详细规范的借款详情和还款保障，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('82','79','1347355731','审核未通过！不符合借款条件！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('83','79','1347355851','审核通过！','1347357730','79','审核通过！','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('84','79','1347427698','审核未通过！请优先申请视频认证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('85','79','1347427760','审核不通过！请优先申请视频认证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('86','79','1347422300','审核不通过！请正确上传家人身份证！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('87','79','1347427794','审核不通过！请优先申请视频认证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('88','79','1347427993','审核不通过！视频认证未申请，且不符合借款条件！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('89','79','1347428151','审核不通过！视频认证未申请，资料等待审核，无固定住址证明，不符合借款条件，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('90','79','1347429292','审核不通过！尚不符合借款条件，谢谢！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('91','79','1347429565','审核不通过！尚不符合借款条件，谢谢！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('92','79','1347430822','审核不通过！请上传固定居住地的住址证明，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('93','79','1347434791','审核不通过！尚不符合借款条件，谢谢！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('94','13','1347593203','审核失败！请更新银行流水，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('95','13','1347506814','审核未通过！请优先申请视频认证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('96','13','1347519345','审核不通过！请优先申请视频认证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('97','13','1347519290','审核失败，请上传借款详情和还款保障，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('98','13','1347519170','审核不通过！请优先申请视频认证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('99','13','1347518510','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('100','79','1347437283','审核不通过！测试！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('103','79','1347438454','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('104','79','1347438620','审核通过！','1347583803','18','更新资料','2','5');");
DB_I("replace  into `lzh_borrow_verify` values('105','18','1347439136','审核通过','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('106','13','1347516039','审核不通过！视频认证未申请，资料等待审核，无固定住址证明，不符合借款条件，谢谢','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('107','18','1347440199','审核通过','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('108','18','1347444454','审核通过','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('109','13','1347506948','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('110','13','1347518621','审核不通过！请上传固定居住地的住址证明，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('111','13','1347518556','审核不通过！尚不符合借款条件，谢谢！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('112','13','1347593387','审核失败！请更新住址证明，并上传视频认证资料，申请视频认证，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('113','13','1347593033','审核失败，请在老系统里发标，谢谢合作！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('114','18','1347546759','审核通过','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('115','18','1347548181','审核通过','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('116','13','1347584048','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('117','13','1347583924','审核通过！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('118','13','1347583894','审核通过！','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('119','13','1347584065','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('120','13','1347584525','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('121','13','1347584509','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('122','13','1347585566','审核通过！','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('132','18','1347710218','审核通过','1347712175','18','审核通过','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('133','18','1347713905','审核通过','1347714076','18','审核通过','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('135','18','1347768696','审核通过','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('138','2','1348246785','wefwef','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('139','100','1348366162','张经理认识的朋友','1348388601','2','','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('140','2','1348388686','1221','1348590982','2','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('141','2','1348591047','','1348713572','2','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('142','100','1348729538','可以','1348730440','2','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('145','100','1348738899','张经理同意','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('146','100','1348739169','同意','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('147','100','1348739429','同意','1348992768','101','','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('148','100','1348839147','同意','1350268453','100','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('149','101','1348992673','','1350271169','100','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('150','100','1349749477','lkll','1353912823','101','1212','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('151','100','1350268644','张玲朋友','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('152','101','1351148873','','1352473027','101','ok','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('153','101','1351148960','','1354669403','106','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('154','101','1351610334','545454','1351610417','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('155','101','1351610489','2121','1351738080','101','dsfdsf','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('156','101','1351738182','2112','1352130077','101','','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('157','101','1352130212','122121','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('158','101','1352382975','通过','1352469809','101','ok','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('159','101','1352471758','ok','0','0','','1','0');");
DB_I("replace  into `lzh_borrow_verify` values('160','101','1352472133','ok','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('161','101','1352650859','','1352865871','101','5445','2','5');");
DB_I("replace  into `lzh_borrow_verify` values('162','101','1355989213','dsfsd','1355991117','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('163','101','1355989678','sdf','1355989944','101','','2','6');");
DB_I("replace  into `lzh_borrow_verify` values('164','101','1355990152','','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('165','101','1355991205','4','1355994419','101','双方都','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('166','101','1355994505','dsfd','1356145346','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('167','106','1356590326','gbgb','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('168','106','1356959356','','1361107224','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('169','101','1357956551','','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('170','101','1359617502','初审通过，借款中','1359678567','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('171','101','1359681996','啊啊啊','1361062742','101','复审未通过','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('172','101','1361063517','初审通过','1361094889','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('173','101','1361095077','初审通过','1361096869','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('174','101','1361097006','初审通过','1361100723','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('175','101','1361102554','初审通过','1361102823','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('176','101','1361105015','初审通过','1361106091','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('177','101','1361106180','啊啊','1361106647','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('178','101','1361106796','额为二人','1361107006','101','双方低声道','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('179','101','1361107301','撒大大','1361111086','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('180','101','1361111211','qq群轻轻巧巧','0','0','','2','0');");
DB_I("replace  into `lzh_borrow_verify` values('181','101','1361117779','而威尔','1361148171','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('182','101','1361148234','我问问','1361148284','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('183','101','1361151524','1111111111','1361151636','101','222222222','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('184','101','1361151672','222222222','1361151946','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('185','101','1361151990','33333333333','1361158694','101','','2','3');");
DB_I("replace  into `lzh_borrow_verify` values('186','101','1361158783','通过','0','0','','2','0');");

?>