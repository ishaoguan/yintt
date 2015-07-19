<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_member_payonline`;");
DB_C("CREATE TABLE `lzh_member_payonline` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `nid` char(32) NOT NULL,
  `money` decimal(15,2) NOT NULL,
  `fee` decimal(8,2) NOT NULL,
  `way` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL,
  `add_ip` varchar(16) NOT NULL,
  `tran_id` varchar(50) NOT NULL,
  `off_bank` varchar(50) NOT NULL,
  `off_way` varchar(100) NOT NULL,
  `deal_user` varchar(40) NOT NULL,
  `deal_uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`status`,`nid`,`id`),
  KEY `uid_2` (`uid`,`money`,`add_time`)
) ENGINE=MyISAM AUTO_INCREMENT=230 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_member_payonline` values('12','1','1a83fedbc15f5b839321efe382813905','100.00','0.00','gfb','3','1341492947','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('11','1','aa141a31a6100644d3f83ef083594e5b','100.00','0.00','gfb','3','1341492446','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('13','1','694dea434ba4b18ea35b8385edc2d3c8','100.00','0.00','gfb','3','1341494828','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('14','1','233e25936b89fae8205e3a42cc59d335','3444000.00','0.00','gfb','3','1341501364','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('15','1','bf479bf2be63a784149d6f40909c8ca7','3444.00','0.00','gfb','0','1341501751','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('16','1','e6bd9305c621629e9367fe7296538c80','234234.00','0.00','gfb','0','1341501854','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('17','1','4b26f99d08c2a6c0ce802a35098f06f3','23423.00','0.00','gfb','0','1341501862','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('18','1','97fd22fa02ea750a32d3f848ab44a8b6','234.00','0.00','gfb','0','1341501926','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('19','1','9672341335a4f8900815f837750b7907','234.00','0.00','gfb','0','1341502136','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('20','1','986b2523e16c3d01c8f5975aef545318','234.00','0.00','gfb','0','1341502194','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('21','1','fee709e714a6b6360592e0d3f3ca9938','234.00','0.00','gfb','0','1341502214','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('22','1','3340be541c85dbd2727a5a93332a2121','234.00','0.00','gfb','0','1341502225','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('23','1','366d5b6e94125897c23056389de0f826','234.00','0.00','gfb','0','1341502315','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('24','1','5b515c48befe07274f891558b055ceda','234.00','0.00','gfb','0','1341502336','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('25','1','25c2748bdb5bf783e8fb2f4b309a8ddc','234.00','0.00','gfb','0','1341502352','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('26','61','3a8ddc7f9686d9a933515bdab2a5ec66','1000.00','0.00','gfb','0','1341824060','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('27','61','26615a8d1a2e0422f7940e21a0d85e2e','1000.00','0.00','gfb','0','1341824068','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('28','61','e0e8c087aec47513bf0106730148fc1e','1000.00','0.00','gfb','0','1341824085','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('29','61','05e27382b789450f9feeaa12dd0fce69','1000.00','0.00','gfb','0','1341824094','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('30','61','b96fb5ee698610a885e50ff3693ec688','1000.00','0.00','gfb','0','1341824123','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('31','85','1a9245a2c6f3028ebdb29032ce92e35b','200.00','0.00','gfb','0','1342758576','14.151.5.249','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('32','85','e65ea58ecc8e1a9670a528671adb9b14','200.00','0.00','gfb','0','1342758613','14.151.5.249','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('33','91','ae219225b3f58314008a1aa3ad4f7c95','500.00','0.00','gfb','0','1342924933','124.207.123.47','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('34','91','a89253310e58419ad5bd6d3367830812','500.00','0.00','gfb','0','1342924965','124.207.123.47','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('35','98','4db7369bb779fe289369f07be00e437a','50.00','0.00','gfb','0','1343139288','118.250.120.188','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('36','98','9ca75c0228fcee1090b896b8023cf33f','50.00','0.00','gfb','0','1343139306','118.250.120.188','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('37','98','3ab57e6c266c6f0d4c8a5dfc4b2c78d7','50.00','0.00','gfb','0','1343139323','118.250.120.188','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('38','94','61108d406f3684c27def6aa1a8687943','456456.00','0.00','gfb','0','1343141249','221.204.219.76','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('39','1','449a0407f7fffa403d8954e0f5158822','23424.00','0.00','gfb','0','1343141473','113.240.5.244','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('40','1','d4154d10c0137e774d897517d1ab10e8','222.00','0.00','gfb','0','1343141770','113.240.5.244','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('41','1','1e10ae418cb8269c8a0cee6bafe4dee4','2221111.00','0.00','gfb','0','1343141777','113.240.5.244','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('42','1','d51a4b8def2831abdc5103e02eeb757c','2221111.00','0.00','gfb','0','1343141797','113.240.5.244','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('43','1','41cef6fba36c52b9ef3bff02ed96fbd2','1213232323.00','0.00','gfb','0','1343142254','113.240.5.244','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('44','1','590ccc8fb7a90666443390d650adccce','1000000.00','0.00','gfb','0','1343142377','113.240.5.244','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('45','1','5e28b2060d5c788f3d1923231bf53300','1000000.00','0.00','gfb','0','1343142495','113.240.5.244','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('46','91','64c2cd2cba8305f993b2c4a0e45b9436','100.00','0.00','gfb','0','1343281814','113.97.8.172','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('47','91','98947737399958c9e266f62e6e9ad55e','800.00','0.00','gfb','0','1343292608','113.97.8.172','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('48','91','e46925405b8addf5ab8dc985984edf64','500.00','0.00','gfb','0','1343365290','116.24.165.185','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('49','92','146dc7ac91721017eb804955b5929d16','546456456.00','0.00','gfb','0','1343532651','110.53.94.167','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('50','92','abe89847701ce07200b008b8f2183cc8','4545.00','0.00','gfb','0','1343532657','110.53.94.167','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('51','91','6a7fe86408706c2a52666456ca7065f7','100000000.00','0.00','gfb','0','1343540468','113.97.4.248','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('52','1','dac7ff2d12032e89d19499d86a5d68e1','44444.00','0.00','gfb','0','1343566995','113.246.13.45','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('53','1','c96fa29eb25efb332802d9cff4f761c9','234.00','0.00','gfb','0','1343734560','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('54','1','22e30cb102098f9cbfd7a8434469164a','234777.00','0.00','gfb','0','1343734569','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('55','1','e85a1676cba3247fb09fa0dd1b1918aa','234.00','0.00','gfb','0','1343734576','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('56','1','07237916606519d58febed4722aa4cf2','234.00','0.00','gfb','0','1343734588','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('57','1','a5d1438457c328c9764a7b0d2fb20c1b','234.00','0.00','gfb','0','1343734596','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('58','1','3d78382eed822b3219657c3a90ed9bd5','234.00','0.00','gfb','0','1343734606','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('59','1','57d6548192f9233e06774cc7def9a8fb','234.00','0.00','gfb','0','1343734613','127.0.0.1','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('60','110','483a60fd8b91873dc48926cd7419a1d2','100.00','0.00','gfb','0','1345821487','220.168.102.160','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('61','792','22adb3f0a886841846d7c0ff50e8ab9a','100.00','0.00','gfb','0','1346123131','112.251.26.99','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('62','438','1b71d23272dfbe8d4e2c0c90d7505939','100.00','0.00','gfb','0','1346125831','119.176.162.88','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('63','438','46e3a20356c25341c60c04782b3aaa36','100.00','0.00','gfb','0','1346125840','119.176.162.88','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('64','438','7e6eafcc94b0db051a9fcb2ac81cb40c','100.00','0.00','gfb','0','1346125861','119.176.162.88','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('65','1036','bf20e3730b056c6844a197e9c51724be','10000.00','0.00','gfb','0','1346204305','221.2.89.34','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('66','1036','bf20e3730b056c6844a197e9c51724be','10000.00','0.00','gfb','0','1346204305','221.2.89.34','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('67','87','c25e96cb1e79f4141aa8e2815397829d','100.00','0.03','gfb','0','1346289519','113.122.198.105','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('68','722','a2ba342c7e81d2a0c70812cd6a6d5581','123.00','0.03','gfb','0','1346293572','112.234.189.180','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('69','1329','16776576084a1615faed7340570a433d','100.00','0.03','gfb','0','1346398966','113.122.205.221','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('70','1159','2dea2bb4ae52668f5e06d91998189c59','50.00','0.01','gfb','0','1346464354','113.122.202.140','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('71','1159','5ebb2ebc9d97d17de100cc90562f1712','50.00','0.01','gfb','0','1346464524','113.122.202.140','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('72','87','44afc3641d38d20fe0ee6f0c3036832d','10000.00','3.00','gfb','0','1346467957','112.233.61.144','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('73','2421','892ad4ea2322b6e2346b4f573b96ce8f','41982.15','12.59','gfb','0','1346468179','123.170.176.199','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('74','87','ace67940e264b88f26150ef405d2c723','100.00','0.03','gfb','0','1346490289','113.122.202.140','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('75','2817','ad3655c11b6f519a3449f81ae7ed5b92','10000.00','3.00','gfb','0','1346490453','222.132.192.60','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('76','2817','923e659092a60ae0865cbb1563e5dcff','10000.00','3.00','gfb','0','1346490480','222.132.192.60','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('77','2817','1b71cd51b4cb598ff827e88147de467f','10000.00','3.00','gfb','0','1346490498','222.132.192.60','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('78','2862','13116cfec048354d7804494694717fa7','50.00','0.01','gfb','0','1346490539','112.233.61.144','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('79','87','8f82701c82c86be0f9c6b307425b2bf6','100.00','0.03','gfb','0','1346490568','113.122.202.140','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('80','87','1fb15fddeb04c2dbab076098a4a64ba7','100.00','0.03','gfb','0','1346490776','113.122.202.140','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('81','87','428730d61a64c8b58f8c991f025b1175','100.00','0.03','gfb','0','1346491204','113.122.202.140','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('82','87','5661ec8a7e5296166339db98e38d401c','100.00','0.03','gfb','1','1346491363','113.122.202.140','2012090106919386','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('83','2861','83172b8f3070c4a0b4094b91760b888f','100.00','0.03','gfb','0','1346500132','218.76.8.186','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('84','2861','7bb3008d52786b51e20d8a897c40dabb','10000.00','3.00','gfb','0','1346500204','218.76.8.186','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('85','2841','d1202c22697ba02910a60513cf56a287','100000.00','30.00','gfb','0','1346547413','112.82.230.74','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('86','438','c71ca7918c6817afa28dc5e8093ae133','100.00','0.03','gfb','0','1346636288','60.213.87.58','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('87','792','dea019461177e7e47359114ef2862863','100.00','0.03','gfb','0','1346654348','182.37.142.191','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('88','87','bba0321c79a32aed0e058079df796d8b','0.10','0.00','gfb','1','1346679832','222.244.1.194','2012090307010016','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('89','87','c9f2665a325b04200a90b2303dda47cf','0.10','0.00','gfb','1','1346680463','222.244.1.194','2012090307010464','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('90','792','38fffbf10ccad0b55091230e7478eb07','50.00','0.01','gfb','0','1346747193','112.251.28.135','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('91','524','ed8711ddcb07076930f4c8a96f59d9de','200.00','0.06','gfb','0','1346750846','222.132.192.49','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('92','2916','dbe39efca42eedf7bb6e51e1e3396bbe','50.00','0.01','gfb','0','1346834510','219.140.93.235','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('93','2916','c8b2a097a87efa2bdc0ce18b14406758','50.00','0.01','gfb','1','1346834561','219.140.93.235','2012090507074471','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('94','2916','9891c19ef4224dc540f664a860a65720','50.00','0.01','gfb','0','1346835277','219.140.93.235','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('95','2838','37f7aaac0a74a11125adde68b73c2e14','5000.00','1.50','gfb','0','1346921267','119.176.167.108','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('96','648','b0530199bbe9881e6df226e0faf6138f','180.00','0.05','gfb','0','1346978376','112.233.62.73','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('97','2926','cdeaf708fec6034f49f0d46edc286244','10000.00','3.00','gfb','0','1346980759','112.233.62.73','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('98','2136','c7e12f20b36c8bb34ceef162267b5224','4400.00','1.32','gfb','0','1347039669','27.197.142.193','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('99','2136','998268e3db1f50de1bb52b26068acf89','4400.00','1.32','gfb','0','1347039679','27.197.142.193','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('100','1036','ddd7e3413f8a38fce53be8d91c8f748f','500.00','0.15','gfb','0','1347069545','221.2.89.34','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('101','1405','84cc79186544e0d4b3e47a146b8bf82d','100.00','0.03','gfb','0','1347079838','112.233.59.202','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('102','1405','22625b13afdb659093b50a8400325454','10000.00','3.00','gfb','0','1347079969','112.233.59.202','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('103','1914','62e929cff76ca8fd6438058228ae6906','5000.00','1.50','gfb','1','1347086085','112.233.81.0','2012090807171056','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('104','87','52b9804e2204e597c268751545a0e6a1','100.00','0.03','gfb','0','1347089818','112.233.59.202','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('105','87','0e53b8915d47ddd7ac21cf36012eac0a','100.00','0.03','gfb','0','1347089855','112.233.59.202','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('106','1914','df1838cf69713bfabbc0738ef2a09f0f','1000.00','0.30','gfb','0','1347089859','112.233.81.0','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('107','1914','8c86ba2426cae58afd6cd64b24c93f1c','1000.00','0.30','gfb','0','1347090151','112.233.81.0','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('108','1914','37571b2dc3616628c22ea3db3301d66d','1000.00','0.30','gfb','0','1347090841','112.233.81.0','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('109','2136','ee5074f2b817b47dce28ed81b1ccce3b','4350.00','1.30','gfb','0','1347118102','27.197.142.193','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('110','2136','c04239788a71e07293a9b8e5fef7bfbf','4350.00','1.30','gfb','0','1347118162','27.197.142.193','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('111','2136','97df5f2975cd2f66762b54b37c1002b3','4350.00','1.30','gfb','1','1347118251','27.197.142.193','2012090807184925','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('112','2136','c11dbe8b0a2a46018e3933f62529a031','50.00','0.01','gfb','1','1347118865','27.197.142.193','2012090807185197','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('113','1405','5408cceecd5de291688bd9472f44aff7','1000.00','0.30','gfb','0','1347155949','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('114','1405','e997e153cb875643f07168072cb1d6cc','1000.00','0.30','gfb','0','1347155963','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('115','1405','fb5dd13f4f5ffe5570dac35298b0e13a','1000.00','0.30','gfb','0','1347155992','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('116','1405','df8f0f4bbf4fd8b73ea2a50685a2030a','1000.00','0.30','gfb','0','1347156010','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('117','1405','79d78c0c22ec367a44895ee9e3ccfade','1000.00','0.30','gfb','0','1347156032','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('118','1405','56cffac95d38f075585e392d580b16e8','1000.00','0.30','gfb','0','1347156046','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('119','1405','045b139395078c5d2fe7f432c9215f1f','1000.00','0.30','gfb','0','1347156064','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('120','1405','55ae678db2e2f82ddc187353d03cfdda','1000.00','0.30','gfb','0','1347156078','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('121','711','07bf9c831d8fc6440fc489b906aef4ff','5555.00','1.66','gfb','0','1347157724','112.233.61.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('122','87','198fb7ef28a3514da73849c075075d39','10000.00','0.00','ccb','0','1347214719','175.0.9.178','2012091002183995533895','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('123','87','offline','12345.00','0.00','off','1','1347214739','175.0.9.178','账单流水号账单流水号','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('124','2862','offline','1000.00','0.00','off','0','1347234889','60.213.89.213','4654564454','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('125','2934','offline','215.00','0.00','off','0','1347248803','60.217.34.196','张明臣工商银行','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('126','2872','c5d6a39331233a50fed86b5b6549cb01','1000.00','0.00','ccb','0','1347258987','112.233.57.157','2012091014362795533972','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('127','2872','c258dc3fa91e187c3ca60d5c2d3a5f4c','1000.00','0.30','gfb','0','1347259007','112.233.57.157','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('128','1405','offline','1.00','0.00','off','0','1347259366','112.233.57.157','123','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('129','1405','f088f56957dd35f92ff37f200418e7e4','50.00','0.00','ccb','0','1347259716','112.233.57.157','2012091014483695533566','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('130','1405','d1a5218ecf0622fdc64ffd16a684d30a','50.00','0.15','gfb','0','1347259749','112.233.57.157','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('131','792','offline','100.00','0.00','off','0','1347262279','112.233.57.157','00256','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('132','2934','8f72307dcfd67cb8593f557225f249df','215.00','0.64','gfb','0','1347265913','60.217.34.196','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('133','2934','offline','215.00','0.00','off','0','1347266053','60.217.34.196','00000','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('134','2862','offline','20000.00','0.00','off','1','1347333776','112.233.59.211','测试充值','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('135','195','0231e0ba828860d7316855abcf703626','100.00','0.30','gfb','0','1347343184','61.152.239.200','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('136','2941','offline','500.00','0.00','off','1','1347345008','112.233.59.211','测试充值','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('137','2771','offline','223.00','0.00','off','3','1347346034','112.251.182.136','HQH000000000001839806960','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('138','2771','offline','223.00','0.00','off','1','1347349163','112.251.182.136','颜廷辉 工商 223 20120911 14:45左右','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('139','2771','offline','10.00','0.00','off','1','1347350360','112.251.182.136','颜廷辉 工商 10  2012091115:55左右','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('140','2941','offline','400.00','0.00','off','1','1347356873','112.233.59.211','测试充值','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('141','2852','offline','20000.00','0.00','off','1','1347357486','112.233.59.211','测试账号','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('142','2921','offline','15.00','0.00','off','0','1347413411','119.176.145.165','9160801800020000008','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('143','2941','offline','50.00','0.00','off','1','1347436847','112.251.31.209','现金交财务','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('144','2941','offline','50.00','0.00','off','3','1347436847','112.251.31.209','现金交财务','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('145','2841','offline','111111.00','0.00','off','0','1347487310','112.82.229.227','23456','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('146','2925','d0db29458cdcac3ca9ce0c51b81c16c3','465.00','1.39','gfb','0','1347495158','182.37.223.61','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('147','648','e73f47a212d4936eefa104372f49c8b2','122.00','0.36','gfb','0','1347514943','112.233.62.77','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('148','2925','offline','15.00','0.00','off','1','1347517152','182.37.223.61','02012091314147890215农业银行，艾永军','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('149','2929','offline','15.00','0.00','off','1','1347522232','119.177.196.2','9160803800020000025 农村信用社 秦文涛','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('150','2945','offline','15.00','0.00','off','1','1347595636','119.177.196.82','陈玉群充值15    工商    唐爱武','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('151','2770','offline','460.00','0.00','off','1','1347677040','119.177.192.248','农村信用社 9160802600010000047 李波','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('152','2910','87160bfcf19adcc0ab3cce7549560c49','200.00','0.60','gfb','0','1347688047','112.234.100.11','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('153','2945','offline','460.00','0.00','off','1','1347690537','119.177.194.80','陈玉群充值460    工商 唐爱武','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('154','438','offline','1000.00','0.00','off','0','1347692297','112.233.48.174','001  农行转账 姓名','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('155','792','f51879abd83e62b10de6374d347df562','50.00','0.15','gfb','0','1347695967','112.233.54.201','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('156','792','ee0e237136b89a5eb576cccf49ea0c88','50.00','0.00','ccb','0','1347695989','112.233.54.201','2012091515594995533440','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('157','792','ff29663b882816895c926b265815192e','50.00','0.15','gfb','0','1347696007','112.233.54.201','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('158','2896','23259ae0f90be64185972cbf42d5d9d0','470.00','1.41','gfb','0','1347758568','182.37.223.211','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('159','2896','offline','15.00','0.00','off','1','1347759721','182.37.223.211','HQH000000000001844896852工商银行邹菓城','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('160','835','d883f9e963432f2299e78f221deaeb4a','1000.00','0.00','ccb','3','1347765176','112.233.48.174','2012091611125695533480','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('161','835','31ef1374a84ae4b651fc6ae869656ac4','1000.00','3.00','gfb','0','1347765184','112.233.48.174','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('162','1961','e108de0979621699d7db6498d1d2ea2f','50.00','0.15','gfb','0','1347767906','113.227.180.241','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('163','835','e822ccbabffafb5b7c73c430636c3679','1000.00','0.00','ccb','0','1347768035','112.233.57.185','2012091612003595533194','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('164','835','f5b6a72a64d044e025cd263cfd2eac7f','1000.00','3.00','gfb','0','1347768072','112.233.57.185','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('165','835','offline','1000.00','0.00','off','3','1347768128','112.233.57.185','杨烁 工商银行 53255','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('166','1941','53d67de950fea1b5b21a87cf8e0d73ad','100.00','0.30','gfb','3','1347768170','113.227.180.241','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('167','2745','b61b737665cf684e1476ffed461ba90c','5000.00','15.00','gfb','1','1347780957','119.177.203.88','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('168','2745','a7334fec404380e5bc1fb2282e7da708','5000.00','15.00','gfb','3','1347780999','119.177.203.88','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('169','2745','77a87a2267a4ee98975a55afc730309f','5000.00','15.00','gfb','1','1347781241','119.177.203.88','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('170','2969','ac11fee5d1c6d48bb6380d5f34b0bad3','2123123213.00','999999.99','gfb','3','1348310556','110.194.30.53','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('171','2969','2aeb5703d80561d2604a771d88244c63','12212.00','122.12','gfb','3','1348310561','110.194.30.53','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('172','2969','199699f404a990b72e7cdc499ab4c839','10000.00','100.00','gfb','3','1348310572','110.194.30.53','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('173','2969','2b61355b2905f0fff47d67188a2028c7','10000.00','100.00','gfb','3','1348310581','110.194.30.53','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('174','2969','e8daeb5a3daecedaa1e9267b7b6aa5aa','5000.00','50.00','gfb','3','1348310589','110.194.30.53','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('175','2971','97bf26af640db7d6c57af3637ae0b1e0','1000.00','10.00','gfb','1','1348324183','59.175.0.184','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('176','2970','offline','100.00','0.00','off','0','1348414820','123.93.2.98','45454564','工商银行','柜台','','0');");
DB_I("replace  into `lzh_member_payonline` values('177','2971','27cbe6e18da5c9b07424199ff881873d','50.00','0.50','gfb','0','1348843366','59.174.81.156','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('178','2971','529221e10ff0dc0264ad36ba7c86e6a8','50.00','0.00','gfb','0','1348892307','59.174.52.57','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('179','2978','2e9a0c4db82d182d50b0b0039b1a960f','50.00','0.50','ccb','0','1348898101','59.175.171.186','2012092913550195533365','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('180','2971','b1bc1eae7b39f9a149ff69691a597b32','50.00','0.00','gfb','0','1348913901','59.174.52.57','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('181','2978','20d99e02b28517cee27761839ebd168a','50.00','0.50','ccb','1','1348913916','59.175.171.186','2012092918183695533170','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('182','2971','b6b2df190e5c0326573896e19bc86353','100.00','1.00','ccb','0','1348972433','27.16.134.44','2012093010335395533475','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('183','2971','e070a579ca2c23390246bd5ce9bece80','100.00','0.00','gfb','0','1348972578','27.16.134.44','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('184','2971','d857488a9e36378b0b01e43c5c605365','100.00','0.00','gfb','0','1348972602','27.16.134.44','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('185','2971','c3ac8388b1f8ab589787d4585eb5f066','100.00','0.00','gfb','0','1348972614','27.16.134.44','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('186','2971','122ca18fa17c7c21e852368f6256813a','100.00','0.00','gfb','0','1348972637','27.16.134.44','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('187','2971','6dc62325221a57360b67b149afa11f31','100.00','0.00','gfb','0','1348972898','27.16.134.44','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('188','2971','62982931985e5550f15a99be876b385d','100.00','0.00','gfb','0','1348973160','27.16.134.44','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('189','2971','8e8c3ccb030c5fcb2a240533227f187a','100.00','1.00','ccb','0','1348973235','27.16.134.44','2012093010471595533283','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('190','2971','c4cfc2c57e4b305f31654a2660dd52bf','100.00','1.00','ccb','0','1348973349','27.16.134.44','2012093010490995533782','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('191','2971','fbe48e2a57919eb901d3bc9490276277','100.00','1.00','ccb','0','1348973368','27.16.134.44','2012093010492895533554','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('192','2971','22c1276b3d7097326b6e844c2d6d0cfe','100.00','0.00','ccb','0','1348973658','27.16.134.44','2012093010541895533548','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('193','2971','5f863eda763f1a612d6df94ccd80e710','100.00','0.00','gfb','0','1348973712','27.16.134.44','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('194','2974','69fa611b2ae932a1d2251e2275076478','200.00','0.00','ccb','0','1348976983','110.194.31.178','2012093011494395533566','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('195','2974','397696c33f4fa96d64d728e916bc8fec','200.00','0.00','gfb','0','1348977021','110.194.31.178','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('196','2974','6cd6ce7a40274dac4a49f45862a43163','200.00','0.00','ccb','0','1348977978','110.194.31.178','2012093012061895533150','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('197','2974','52e26b8401a5900bce3a35a5b0f58a6e','200.00','0.00','gfb','0','1348978262','110.194.31.178','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('198','2974','d8b03f246cf53ae31f0e804aed145c0f','200.00','0.00','ccb','0','1348978980','110.194.31.178','2012093012230095533314','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('199','2984','d644a930c95173739076fa8d944e205a','100.00','0.00','gfb','0','1349574940','111.173.153.114','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('200','2987','6fa08d1771338ae96e5b5ee468cc688b','1000.00','0.00','gfb','0','1349852594','61.152.239.200','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('201','2971','f26d34787b2b5b7807bde359b164146c','100.00','0.00','gfb','0','1350028333','58.48.80.219','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('202','2971','ad25befbe61490705d0cc2e97f01490c','100.00','0.00','gfb','0','1350028336','58.48.80.219','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('203','2971','acf699b7a7fa25a235e5dcfd19e32112','100.00','0.00','ccb','0','1350028386','58.48.80.219','2012101215530695533119','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('204','2971','49c9b7d41e3dbf6a9720e1a0f7337a49','100.00','0.00','gfb','0','1350028404','58.48.80.219','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('205','2971','0e6d7552ea355636fecbd30303437bb0','5000.00','0.00','gfb','0','1350096909','111.172.165.150','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('206','2971','5b51d53eb018fe2b13b3d15006afdb69','10000.00','0.00','gfb','0','1350096935','111.172.165.150','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('207','2971','d6cbb952dfbff72f83cb7b5be519762c','10000.00','0.00','gfb','0','1350096951','111.172.165.150','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('208','2980','24a3ed112724dd64bd37dd026b01d2e0','10000.00','0.00','gfb','0','1350097005','111.172.165.150','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('209','2971','01a88f180f389c2663f4e626a1bb8d67','10000.00','0.00','gfb','0','1350097057','111.172.165.150','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('210','2980','da26ea60923f2f57a5ceb4f101e8805c','10000.00','0.00','gfb','0','1350097283','111.172.165.150','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('211','2975','de40130d3367356ec8adb374e650c088','100.00','0.00','ccb','1','1350268822','59.173.197.215','2012101510402295533026','','','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('212','2975','c56aeba09eea34e2916aedaa5ba69ab7','100.00','0.00','ccb','1','1350268844','59.173.197.215','2012101510404495533820','','','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('213','2990','1ade4b20672853298dc396c624434c0a','10000.00','0.00','gfb','1','1350369146','58.48.196.198','','','','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('214','2991','7e47ec64f569c94e3cbfb90c23a33218','20000.00','0.00','gfb','1','1350373223','59.175.104.77','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('215','2991','5db43ab249cab92114dfb62e445b70a4','20000.00','0.00','gfb','1','1350373252','59.175.104.77','','','','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('216','2991','40706d6cfe272b1a2dd293e968c417df','11000.00','0.00','gfb','1','1350373451','59.175.104.77','','','','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('217','2991','84eb8f7f4b1d118f25b5ed063d9333c8','11000.00','0.00','gfb','1','1350373554','59.175.104.77','','','','后台测试 权限有限','106');");
DB_I("replace  into `lzh_member_payonline` values('218','2993','2b247bb3f176c87dd8805c5fc3c915c9','100.00','0.00','gfb','3','1350465586','183.94.19.179','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('219','2974','offline','1000.00','0.00','off','1','1351609210','211.90.10.158','klj lkj','中国银行','ATM','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('220','2999','offline','30000.00','0.00','off','1','1352469500','113.242.95.105','5998465949846969','5498691556989','65489','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('221','3002','289f32174e1ccdcfb2db1d100f6dc682','50.00','0.00','gfb','1','1352610792','218.18.115.182','','','','后台测试 权限有限','106');");
DB_I("replace  into `lzh_member_payonline` values('222','3002','3d768c83ecf9fd17ecdb6fff8d8c5e61','100.00','0.00','gfb','1','1352643502','219.134.251.193','','','','张敏','101');");
DB_I("replace  into `lzh_member_payonline` values('223','3003','2ed670430136935e6a71dd516779c18e','10000.00','0.00','gfb','1','1352775827','119.98.79.71','','','','后台测试 权限有限','106');");
DB_I("replace  into `lzh_member_payonline` values('224','3006','4e4eede424931df810b20c573dfa567f','50.00','0.00','gfb','1','1353156531','122.13.163.106','','','','后台测试 权限有限','106');");
DB_I("replace  into `lzh_member_payonline` values('225','3018','ac97b218cbdbfdaeb840eb17311f9395','50.00','0.00','gfb','3','1355832542','123.139.65.250','','','','后台测试 权限有限','106');");
DB_I("replace  into `lzh_member_payonline` values('226','3027','83ff3b6f1f5cef47d79a9d535198f514','50.00','0.00','gfb','1','1356586964','116.208.86.178','','','','后台测试 权限有限','106');");
DB_I("replace  into `lzh_member_payonline` values('227','3027','d38d7ec743f9c55e667d289586022eb3','50.00','0.00','gfb','1','1356587003','116.208.86.178','','','','后台测试 权限有限','106');");
DB_I("replace  into `lzh_member_payonline` values('228','3032','52ec7d69eec4df3490ce7c8b690d44f8','50.00','0.00','gfb','0','1356976410','124.90.141.6','','','','','0');");
DB_I("replace  into `lzh_member_payonline` values('229','3032','4d12721fa5c63f6da401df5b636f8c7a','50.00','0.00','gfb','0','1356976583','124.90.141.6','','','','','0');");

?>