<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_members`;");
DB_C("CREATE TABLE `lzh_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` char(32) NOT NULL,
  `user_type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `pin_pass` char(32) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `reg_time` int(10) unsigned NOT NULL,
  `reg_ip` varchar(15) NOT NULL,
  `user_leve` tinyint(4) NOT NULL DEFAULT '0',
  `time_limit` int(10) unsigned NOT NULL,
  `credits` int(10) NOT NULL,
  `recommend_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `province` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `is_ban` int(11) NOT NULL DEFAULT '0' COMMENT '是否冻结0：否； 1：是',
  PRIMARY KEY (`id`),
  KEY `user_email` (`user_email`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3034 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_members` values('2970','mindie','e10adc3949ba59abbe56e057f20f883e','2','e10adc3949ba59abbe56e057f20f883e','330911968@qq.com','15972099576','1348318150','59.175.0.184','1','1379860298','10','0','102','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2971','coco78721','96e79218965eb72c92a549dd5a330112','2','96e79218965eb72c92a549dd5a330112','29373657@qq.com','15347115155','1348320555','59.175.0.184','1','1411395800','1048','0','103','九洲贷玲玲','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2972','音乐精灵520','96e79218965eb72c92a549dd5a330112','1','96e79218965eb72c92a549dd5a330112','369828392@qq.com','','1348363243','111.173.199.33','1','1381805750','0','0','102','九洲贷燕燕','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2973','zhouge85901101','c95e12e47f5f1f5068948f52696e4d2a','1','','270006344@qq.com','','1348366504','119.96.117.95','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2974','ggggwfn11','96e79218965eb72c92a549dd5a330112','1','96e79218965eb72c92a549dd5a330112','3490766@qq.com','15562806655','1348543863','110.194.24.205','1','1383145932','4043','0','104','朱玮','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2975','邮政银行李行长','96e79218965eb72c92a549dd5a330112','1','96e79218965eb72c92a549dd5a330112','1037525011@qq.com','13971517099','1348644662','119.96.255.184','1','1380374397','10','0','103','九洲贷玲玲','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2976','admin','53b577229038f45de5ec4824359a3142','1','','admin@admin.com','','1348646966','110.194.29.206','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2977','wzy21cn','96e79218965eb72c92a549dd5a330112','1','','wzy21cn@163.com','','1348713209','222.187.112.250','1','1383530410','16','0','104','朱玮','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2978','nier80916','96e79218965eb72c92a549dd5a330112','2','96e79218965eb72c92a549dd5a330112','nier80916@163.com','13164678149','1348896779','59.175.171.186','0','0','20','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2979','yanni80916','0f90225d943c7fe5e242f853e898d2a5','1','','77370753@qq.com','','1348898866','59.175.171.186','0','0','0','2978','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2980','九洲贷博天下','4b9e99615a8feda104c53fdebf7a183c','1','','75848733@qq.com','','1348991857','27.16.134.44','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2981','九洲贷发言人','4f5de935e4c5f21be890b0f146bd71dd','1','','25546685@qq.com','','1349171806','27.17.69.11','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2982','666666','f379eaf3c831b04de153469d1bec345e','1','','526666@qq.com','','1349458555','110.194.28.158','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2983','njkkkk','acbd1f86c247d682725cfd556b03635d','1','','njkkkk@sina.cn','','1349458616','117.88.31.227','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2984','yuyancd','e10adc3949ba59abbe56e057f20f883e','1','e10adc3949ba59abbe56e057f20f883e','yuyancd@163.com','','1349574123','111.173.153.114','1','1382927929','0','0','102','贷齐乐燕燕','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2985','张海清624345224','9ebbe6ffae56200dfb7896a95cf5df9a','1','','624345224@qq.com','','1349753215','119.96.191.174','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2986','zf99613','4b5c1e1b36116737ae616b32ed424f01','1','','83866089@qq.com','','1349773168','61.183.22.194','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2987','juhua123','a3806d270480a9be270dca36de5ae1b5','1','','avens12@126.com','','1349852541','61.152.239.200','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2988','武汉神农遗风','e10adc3949ba59abbe56e057f20f883e','1','','1572217380@qq.com','','1349942585','219.140.107.77','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2989','472986645','399143668774472fd4b5d3f6e1d0e35b','1','','472986645@qq.com','','1350288379','111.175.73.62','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2990','lyflove','199171765bea818aa4f485c787022f5b','1','','529118951@qq.com','','1350367811','58.48.196.198','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2991','远来如驰','431c3412da44e3059e5941ee51fb3b04','1','','1729312880@qq.com','','1350371321','59.175.104.77','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2992','sjhz','a8ae83a13fad72660e2e46714cb97105','1','','sjhz@sjhz.net','','1350376992','111.175.73.62','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2993','其实你就是佛','a59920ed2be7ac60ce724eb6185cd29c','1','','392473397@qq.com','','1350461338','183.94.19.179','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2994','jenkhua','5956cc77343effc389009060ccf2d04b','1','','jenkhua@sohu.com','','1351402986','106.2.166.43','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2995','tcsr','ffedca2f77cfa62b7deede97081f9125','1','','tcsr@163.com','','1351411558','114.219.122.17','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2996','aplaojia7000','0dc747e7ec6e664c4ba6ab63814a8571','1','','972136460@qq.com','','1351460348','118.81.65.128','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2997','咿呀鹅','4b9afe9ddc526ed0465fd26ce3606154','1','','1356310515@qq.com','','1352342528','121.229.39.57','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2998','yu12366dan','3a5df20b164e15af29f9a15c844f5d2c','1','','yu12366dan@163.com','','1352351741','121.229.39.57','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('2999','baiwenpeng','91fcc68cdd92c1f3970bf65a6bc3ce7a','2','3a15d2b89395fa1ad11429e871ad1415','baiwenpeng@tom.com','','1352469283','113.242.95.105','1','1384006297','120','0','102','贷齐乐燕燕','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3000','334901826','bfa5725c01a0cb71e8a3b1a9f6985a82','1','','334901826@qq.com','','1352522339','180.117.81.95','1','1384058504','0','0','103','贷齐乐玲玲','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3001','chengle','96e79218965eb72c92a549dd5a330112','1','','mwhu_219@163.com','','1352526452','121.32.89.90','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3002','sob8','','2','','408499578@qq.com','13243891000','1352610719','218.18.115.182','1','1384179543','0','0','104','朱玮','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3003','456369','96e79218965eb72c92a549dd5a330112','1','','1234@sina.com','','1352775629','119.98.79.71','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3004','liwenxin77','bc757f9cb613ad182d616e6da73b629b','1','','liwenxin77@163.com','','1352963062','113.81.86.197','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3005','fa78','459e6c01a6a7a61c3cca2cf797ade92b','1','','fa78@yahoo.cn','','1353145808','175.42.100.69','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3006','letea888','7e7290481d5392250ff108d732c9576a','1','','1504703270@qq.com','','1353156263','122.13.163.106','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3007','66666666','7c497868c9e6d3e4cf2e87396372cd3b','1','','66666666@ff.com','','1353910146','125.39.18.185','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3008','ggggwfn33','1064f3b20a66813e8076bc24b3500bef','1','','3490764156@qq.com','','1354108090','125.39.239.111','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3009','xxxxxx','dad3a37aa9d50688b5157698acfd7aee','1','','fsdfsf@sdfsdf.dfc','','1354870726','221.207.36.158','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3010','@qq_nothing-dede290','6cd3e8dc9b16996e368928213f976d95','1','','','','1355106052','111.174.238.58','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3011','ggggwfn556','5b1b68a9abf4d2cd155c81a9225fd158','1','','555555@qq.com','','1355107206','125.39.239.101','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3012','555555666','5b1b68a9abf4d2cd155c81a9225fd158','1','','55556564555@qq.com','','1355278535','125.39.239.121','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3013','第三方','5b1b68a9abf4d2cd155c81a9225fd158','1','','545454@qq.com','','1355278595','125.39.239.121','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3014','2858976066','9d77ce626a96f4b1572f43eb7e6c4d21','1','','2858976066@qq.com','','1355303236','61.164.128.66','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3015','zm1335','c24cb0e1e2df54b60fbb7343b42f27d7','1','','36337591@qq.com','','1355321467','171.104.224.237','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3016','tsqy','9e8624efbefe2ff2eda188b7c003ea77','1','','994596300@qq.com','','1355800665','60.212.45.106','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3017','@qq_华龙通信30','d4cf0efdb06254cfc3c21c2e22dce334','1','','','','1355832411','123.139.65.250','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3018','86huiboka','7a67bbc742e2aaae3775fa64c9863fd4','1','','447589069@qq.com','','1355832489','123.139.65.250','1','1387461381','0','0','103','贷齐乐玲玲','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3019','test123','e10adc3949ba59abbe56e057f20f883e','1','e10adc3949ba59abbe56e057f20f883e','713050119@qq.com','','1355836857','125.39.239.122','1','1389407773','0','0','104','朱玮','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3020','china','e10adc3949ba59abbe56e057f20f883e','1','e10adc3949ba59abbe56e057f20f883e','22@qq.com','','1356058220','113.240.1.221','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3021','test','05a671c66aefea124cc08b76ea6d30bb','1','','343174021@qq.com','','1356091693','124.90.136.31','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3022','asdwqeda','97db1846570837fce6ff62a408f1c26a','1','','asdcvz@qq.com','','1356316582','218.59.237.26','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3023','bing1987','8b76e0a512fb45c94da530ae2b941a1a','1','','1261684147@qq.com','','1356350832','116.55.54.8','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3024','@qq_qzuser212','3bd7fe1c90a75f3358053e24af94e311','1','','','','1356429825','113.91.234.5','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3025','jackm66','9e847c8983fd293f6e29068b43de140f','1','','jackm66@163.com','','1356430140','113.91.234.5','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3026','tsqy1732','8ec5af667b7be97ddeb18db02882607d','1','','kdkdkdkkdkd@sina.com','','1356485869','125.39.18.151','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3027','bkdzw','9d040340b8515291b50d40d53e1ab9ca','1','307735128e7a2f095dd24254e55c1aa1','bkdzw@qq.com','18934605555','1356586822','116.208.86.178','1','1388125986','20','0','104','朱玮','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3028','@qq_挥剑27','2a30c3a110f62e951f04ee0a61a34716','1','','','','1356610060','114.220.102.232','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3029','@qq_战斗007736','63511a361c6a0811372e6e075224de38','1','','','','1356658369','218.72.223.49','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3030','xingxing','e10adc3949ba59abbe56e057f20f883e','1','','693664992@qq.com','','1356765741','218.7.98.183','1','1388302024','0','0','104','朱玮','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3031','fish7850','627e385c39f0406956af7381f0e4409e','1','','szjyrl@163.com','','1356858136','113.128.126.112','0','0','0','0','0','','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3032','amipig','e10adc3949ba59abbe56e057f20f883e','1','e10adc3949ba59abbe56e057f20f883e','54976066@qq.com','13357101800','1356920897','124.90.141.6','1','1388494899','0','0','103','贷齐乐玲玲','0','0','0','0');");
DB_I("replace  into `lzh_members` values('3033','ringback','e10adc3949ba59abbe56e057f20f883e','1','e10adc3949ba59abbe56e057f20f883e','530400843@qq.com','18678538324','1357955889','127.0.0.6','1','1389492218','0','0','104','朱玮','0','0','0','0');");

?>