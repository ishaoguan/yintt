<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `lzh_global`;");
DB_C("CREATE TABLE `lzh_global` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `text` text NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT ' ',
  `tip` varchar(200) NOT NULL DEFAULT ' ',
  `order_sn` int(11) NOT NULL DEFAULT '0',
  `code` varchar(20) NOT NULL DEFAULT ' ',
  `is_sys` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8");
DB_I("replace  into `lzh_global` values('20','textarea','贷齐乐,贷齐乐白金版,p2p借贷系统','网站关键词','在首页的keywords中显示','118','web_keywords','1');");
DB_I("replace  into `lzh_global` values('21','textarea','贷齐乐白金版p2p借贷系统是菏泽牡丹区伟德电子科技有限公司开发，贷齐乐是可以建设全国分站的P2P借贷系统','网站描述','在网站首页的描述中显示','117','web_descript','1');");
DB_I("replace  into `lzh_global` values('19','input','贷齐乐','网站名称','出现在每个页面的title后面','120','web_name','1');");
DB_I("replace  into `lzh_global` values('27','input','贷齐乐白金版演示网站 贷齐乐打造最好的p2p借贷系统','首页title','首页标题','119','index_title','1');");
DB_I("replace  into `lzh_global` values('56','textarea','COPYRIGHT ? JIUZHOUDAI.COM All Rights Reserved.  伟德电子科技有限公司 版权所有 鲁ICP备12013628号<br>公司地址：菏泽市双河路星光驾校向东300米 网址：www.daiqile.com E-mail：3490766@qq.com <BR>电话：0530-6660369手机：15562806655','网站底部','网站底部的版权和联系信息','116','bottom','1');");
DB_I("replace  into `lzh_global` values('71','input','120','VIP费用','VIP费用(每年)','0','fee_vip','1');");
DB_I("replace  into `lzh_global` values('72','input','3|8','逾期罚息','逾期后罚息的计算,(3|8)表示逾期3天开始算罚息,每天千分之8','110','fee_expired','1');");
DB_I("replace  into `lzh_global` values('73','input','30|2','催收费','逾期以后的催收费,(30|2)表示逾期30天以后开始算每天千分之2的催收费','111','fee_call','1');");
DB_I("replace  into `lzh_global` values('63','input','10','注册奖励','此金额只可以用来投标','0','award_reg','1');");
DB_I("replace  into `lzh_global` values('64','input','0|10','提现手续费','以3|300的形式填入，3表示3%的手续费,300表示手续费上限','112','fee_tqtx','1');");
DB_I("replace  into `lzh_global` values('66','input','10|24','发标时的年化利率','以10|24的形式填入，表示年化利率最小10%,最大24%','1','rate_lixi','1');");
DB_I("replace  into `lzh_global` values('69','input','10','投资者成交管理费','10表示10%','113','fee_invest_manage','1');");
DB_I("replace  into `lzh_global` values('70','input','1|24','借款期限(按天)','以1|24的形式填入，以月为单位，表示按天借款时最少借款时间为1天，最多24天','1','borrow_duration_day','1');");
DB_I("replace  into `lzh_global` values('67','input','1|12','借款期限','以1|24的形式填入，以月为单位，表示最小借款时间为1个月，最大24个月','1','borrow_duration','1');");
DB_I("replace  into `lzh_global` values('74','input','10','借款保证金','借款者借款成功后冻结的保证金,填10表示借款总金额的10%','114','money_deposit','1');");
DB_I("replace  into `lzh_global` values('75','input','10','视频认证费用','','0','fee_video','1');");
DB_I("replace  into `lzh_global` values('76','input','0','现场认证费用','','0','fee_face','1');");
DB_I("replace  into `lzh_global` values('77','input','0','实名认证费用','','0','fee_idcard','1');");
DB_I("replace  into `lzh_global` values('78','input','0','VIP默认额度','','0','limit_vip','1');");
DB_I("replace  into `lzh_global` values('79','input','0.1|1|0.2|4','借款者管理费','以0.1|1|0.2|4的形式填入，表示按天时每天收取借款总额0.1%的管理费，按月时在借款期限小于等于4个月时收取借款总额1%的管理费，借款期限大于4个月时(收获取借款总额1%的管理费+超过4个月的时间里每月收取借款总额0.2%的管理费)','115','fee_borrow_manage','1');");
DB_I("replace  into `lzh_global` values('90','input','2','客服提成','客服提成比例,填2表示千分之二','0','customer_rate','0');");
DB_I("replace  into `lzh_global` values('91','input','1|-3|-10|2|100','成功还款积分规则','填入1|-3|-10|2|100表示,正常还款|迟还逾期还款|提前还款|金额比率  不同状态下还款金额折合金额金额比率后*对应值','0','credit_borrow','0');");
DB_I("replace  into `lzh_global` values('92','input','100','投资成功积分规则','整数或者小数，表示比率，比如填入100，会员投资成功300元，则可得到300/100=3分','0','credit_investor','0');");

?>