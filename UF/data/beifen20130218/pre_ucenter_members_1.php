<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_ucenter_members`;");
DB_C("CREATE TABLE `pre_ucenter_members` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` char(32) NOT NULL DEFAULT '',
  `myid` char(30) NOT NULL DEFAULT '',
  `myidkey` char(16) NOT NULL DEFAULT '',
  `regip` char(15) NOT NULL DEFAULT '',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  `lastloginip` int(10) NOT NULL DEFAULT '0',
  `lastlogintime` int(10) unsigned NOT NULL DEFAULT '0',
  `salt` char(6) NOT NULL,
  `secques` char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_ucenter_members` values('1','admin','bb219edf5e101c6b3e382221a761c516','admin@admin.com','','','hidden','1348342328','0','0','171195','');");
DB_I("replace  into `pre_ucenter_members` values('2','音乐精灵520','e635e12ea8280edbedd49333632d760a','369828392@qq.com','','','111.173.199.33','1348363243','0','0','bddb06','');");
DB_I("replace  into `pre_ucenter_members` values('3','zhouge85901101','7e3e7ebc88034351c10a79c036c20b58','270006344@qq.com','','','119.96.117.95','1348366504','0','0','860657','');");
DB_I("replace  into `pre_ucenter_members` values('4','coco78721','e3fb235cd830dcaf18c999e0c75154c6','29373657@qq.com','','','123.93.2.98','1348388383','0','0','f4e56b','');");
DB_I("replace  into `pre_ucenter_members` values('5','mindie','bc637c0070028ad3a75ecbb56d12047b','330911968@qq.com','','','123.93.2.98','1348388573','0','0','d3f27a','');");
DB_I("replace  into `pre_ucenter_members` values('6','ggggwfn11','f444ae69d7d0f97f1048d268f98a0cd5','3490766@qq.com','','','110.194.24.205','1348543863','0','0','745d74','');");
DB_I("replace  into `pre_ucenter_members` values('7','邮政银行李行长','d2c1f6e60f4ea2cd1b48ef6a11211f8e','1037525011@qq.com','','','119.96.255.184','1348644662','0','0','6adb61','');");
DB_I("replace  into `pre_ucenter_members` values('8','wzy21cn','35ce0e03afebd8b6b0d7af3b99f498b8','wzy21cn@163.com','','','222.187.112.250','1348713209','0','0','949558','');");
DB_I("replace  into `pre_ucenter_members` values('9','nier80916','18e3014ad1b12291c188fccf0d89f18e','nier80916@163.com','','','59.175.171.186','1348896779','0','0','b02238','');");
DB_I("replace  into `pre_ucenter_members` values('10','yanni80916','f83a99f226b58ca453c6da9896cded7f','77370753@qq.com','','','59.175.171.186','1348898866','0','0','21d687','');");
DB_I("replace  into `pre_ucenter_members` values('11','九洲贷发言人','4f5de935e4c5f21be890b0f146bd71dd','25546685@qq.com','','','27.16.134.44','1348987989','0','0','5ce3dc','');");
DB_I("replace  into `pre_ucenter_members` values('12','九洲贷博天下','ce5ee27a4950602a2c47a4d650857f70','75848733@qq.com','','','27.16.134.44','1348991857','0','0','14c104','');");
DB_I("replace  into `pre_ucenter_members` values('13','666666','397457dd7ae9d54510c17f8a1b5ba352','526666@qq.com','','','110.194.28.158','1349458554','0','0','b031e6','');");
DB_I("replace  into `pre_ucenter_members` values('14','njkkkk','6a80cd66759e8cdd9c794e939c480b1e','njkkkk@sina.cn','','','117.88.31.227','1349458616','0','0','836663','');");
DB_I("replace  into `pre_ucenter_members` values('15','yuyancd','94bf3fdbd9a154f714e56d3dd094a09d','yuyancd@163.com','','','111.173.153.114','1349574123','0','0','b1787d','');");
DB_I("replace  into `pre_ucenter_members` values('16','张海清624345224','ad965ea3a34e7bbfe2242ab5b85d2dd5','624345224@qq.com','','','119.96.191.174','1349753215','0','0','f08714','');");
DB_I("replace  into `pre_ucenter_members` values('17','472986645','7a3fc69be90b2b9a261246bcdfad97cf','472986645@qq.com','','','111.175.72.248','1349759068','0','0','c221e0','');");
DB_I("replace  into `pre_ucenter_members` values('18','zf99613','9e19528c926f09c033ce068850d47c1f','83866089@qq.com','','','61.183.22.194','1349773168','0','0','020a04','');");
DB_I("replace  into `pre_ucenter_members` values('19','juhua123','4a7c98533959734c0ecc289c06b0dcb0','avens12@126.com','','','61.152.239.200','1349852541','0','0','d6f713','');");
DB_I("replace  into `pre_ucenter_members` values('20','武汉神农遗风','47cd8362c7dd61494fa1a10de230a402','1572217380@qq.com','','','219.140.107.77','1349942585','0','0','972270','');");
DB_I("replace  into `pre_ucenter_members` values('21','lyflove','14ce3cbdff55e94400acf986888c9cca','529118951@qq.com','','','58.48.196.198','1350367811','0','0','3de4a7','');");
DB_I("replace  into `pre_ucenter_members` values('22','远来如驰','d6c00acd1b6a34d0c710b424fb870cef','1729312880@qq.com','','','59.175.104.77','1350371321','0','0','920d54','');");
DB_I("replace  into `pre_ucenter_members` values('23','sjhz','eb1c668f6d9e145768c1ce836aeb0f4a','sjhz@sjhz.net','','','111.175.73.62','1350376992','0','0','050497','');");
DB_I("replace  into `pre_ucenter_members` values('24','其实你就是佛','4f462afefeb8524040d9b2066ce85f49','392473397@qq.com','','','183.94.19.179','1350461338','0','0','abea19','');");
DB_I("replace  into `pre_ucenter_members` values('25','betty','482612d738035141055987c19e090a17','355509425@qq.com','','','111.175.73.62','1350608354','0','0','2408ac','');");
DB_I("replace  into `pre_ucenter_members` values('26','aplaojia7000','992393a06357a174600067cd92999b7f','972136460@qq.com','','','118.81.65.128','1351460867','0','0','36059a','');");
DB_I("replace  into `pre_ucenter_members` values('27','sob8','62c4b8a60b4162355254152d590f1923','408499578@qq.com','','','183.16.149.109','1353756285','0','0','e1acdf','');");
DB_I("replace  into `pre_ucenter_members` values('28','1111111','bd6410e698ab0f4795e83c6b03101432','45@qq.com','','','221.0.38.218','1354296296','0','0','840ab0','');");
DB_I("replace  into `pre_ucenter_members` values('29','a857983','e848e4b922cc18ea98cbb2b175900425','zhuxiaokunnnnn@126.com','','','124.114.165.172','1354715052','0','0','c52502','');");
DB_I("replace  into `pre_ucenter_members` values('30','dlw20000','0c6b90249b91ddf06d928c218a6e5189','dlw20000@tom.com','','','113.92.55.201','1355157011','0','0','371bb4','');");
DB_I("replace  into `pre_ucenter_members` values('31','aaaa','cacdd5b9e6dd4144d04e3403d53eb415','aaaa@126.com','','','125.39.18.174','1355324843','0','0','bd602b','');");
DB_I("replace  into `pre_ucenter_members` values('32','大侠','3148e374b2aca47ba28b02b58a07fece','515506259@qq.com','','','60.2.93.6','1355705583','0','0','f5dce5','');");
DB_I("replace  into `pre_ucenter_members` values('33','2310198','477436368830841bf35286ca6e015a97','2310198@qq.com','','','218.26.233.225','1356076239','0','0','fae7e7','');");
DB_I("replace  into `pre_ucenter_members` values('34','1111','672b664788c716b7d1fc82aa34528ddd','11111@122.com','','','112.224.67.135','1356427984','0','0','14201c','');");
DB_I("replace  into `pre_ucenter_members` values('35','test','6b9e562b61dc6532415498d17da0cafc','test@tom.com','','','218.18.245.83','1356969506','0','0','39b3b7','');");
DB_I("replace  into `pre_ucenter_members` values('36','zbnh2001','14ad2b387f84fea9de77ad5150cb7d27','zbnh2001@tom.com','','','218.18.245.83','1356970004','0','0','476257','');");

?>