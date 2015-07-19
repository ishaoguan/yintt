<?php
return array(
	//'配置项'=>'配置值'
	'APP_RES_VER'		=> '20140504',
	'TMPL_CACHE_ON'     => true, //测试时关闭模板缓存
	'GFB_TEST'			=> false,//国付宝测试环境标志
	'APP_GROUP_MODE'	=> 1,
	'APP_GROUP_PATH'    => 'Group',
    'APP_GROUP_LIST'    => 'Home,Admin,Member,Svc',//分组
    'DEFAULT_GROUP'     =>'Home',//默认分组
    'DEFAULT_THEME'     =>'default',//使用的模板
	'LANG_SWITCH_ON'	=>true,//开启语言包
	'SMS_TYPE'          =>'REAL',//短信类型,SIMU-模拟,REAL-真实
    'URL_MODEL'=>2, // 如果你的环境不支持PATHINFO 请设置为3,设置为2时配合放在项目入口文件一起的rewrite规则实现省略index.php/
	'URL_CASE_INSENSITIVE'=>true,//关闭大小写为true.忽略地址大小写
    'TMPL_STRIP_SPACE'      => false,       // 是否去除模板文件里面的html空格与换行
	'APP_ROOT'=>str_replace(array('\\','Conf','config.php','//'), array('/','/','','/'), dirname(__FILE__)),//APP目录物理路径
	'WEB_ROOT'=>str_replace("\\", '/', substr(str_replace('\\Conf\\', '/', dirname(__FILE__)),0,-8)),//网站根目录物理路径
	'URL_HTML_SUFFIX'=>".html",//静态文件后缀
	'TMPL_ACTION_ERROR' =>str_replace("\\", '/', substr(str_replace('\\Conf\\', '/', dirname(__FILE__)),0,-8))."/Style/tip/tip.html",//操作错误提示
	'TMPL_ACTION_SUCCESS' =>str_replace("\\", '/', substr(str_replace('\\Conf\\', '/', dirname(__FILE__)),0,-8))."/Style/tip/tip.html",//操作正确提示
	'ERROR_PAGE'	=>'/Public/error.html',
	'LOAD_EXT_CONFIG' => 'log,borrow_config', // 加载扩展配置文件
	'TTXF_TMP_HOUR' => 10,
	//cookie
	'COOKIE_PREFIX'	=>'lzh_',
	'COOKIE_PATH'	=>'/',
	'COOKIE_DOMAIN'	=>'yintt.com',//
	//cookie
	//数据库配置
	'DB_TYPE'           => 'mysql',
	'DB_HOST'           => 'localhost',
	'DB_NAME'           =>'yintt',
	'DB_USER'           =>'root',
	'DB_PWD'            =>'c2c007a682',
	'DB_PORT'           =>'3306',
	'DB_PREFIX'         =>'lzh_',
	//'DB_PARAMS'			=>array('persist'=>true),
	//数据库配置
	//子域名配置
	'URL_ROUTER_ON'		=>true,//开启路由规则
	'URL_ROUTE_RULES'	=>array(
		'/^'.SAFE_ADMIN.'$/' => 'Admin/index/login',
		'/^'.SAFE_ADMIN.'\/index$/' => 'Admin/index/index',
		'/^rjd\/index.html$/' => 'Home/rjd/index',//贷
		'/^realtimefinancial\/index.html(\S*)$/' => 'Home/realtimefinancial/index:1',//贷
		'/^test\/index.html$/' => 'Home/test/index',//测试页面
		'/^tuiguang\/index.html$/' => 'Home/help/tuiguang',//文章栏目页
		'/^service\/index.html$/' => 'Home/help/kf',//文章栏目页
		'/^borrow\/tool\/index.html$/' => 'Home/tool/index',//文章栏目页
		'/^borrow\/tool\/tool(\d+).html$/' => 'Home/tool/tool:1',//文章栏目页
		'/^borrow\/post\/([a-zA-z]+)\.html$/' => 'Home/borrow/post?type=:1',//文章栏目页
		'/^invests\/tool.html$/' => 'Home/tool/index',//文章栏目页
		'/^invests\/tool(\d+).html$/' => 'Home/tool/tool:1',//文章栏目页
		'/^invest\/index.html\?(.*)$/' => 'Home/invest/index?:1',//文章栏目页
		'/^invest\/(\d+).html$/' => 'Home/invest/detail?id=:1',//文章栏目页
		'/^invest\/(\d+).html\?(.*)$/' => 'Home/invest/detail?id=:1:2',//文章栏目页
		'/^([a-zA-z]+)\/([a-zA-z]+).html\/(\d+).html\/(\d+)$/' => 'Home/help/index?p=:4',//文章栏目页
		'/^([a-zA-z]+)\/([a-zA-z]+).html(.*)$/' => 'Home/help/index:3',//文章栏目页
		'/^([a-zA-z]+)\/(\d+).html$/' => 'Home/help/view?id=:2',//文章内容页
		'/^([a-zA-z]+)\/id\-(\d+).html$/' => 'Home/help/view?id=:2&type=subsite',//文章内容页
		'/^([a-zA-z]+)\/([a-zA-z]+)\/(\d+).html$/' => 'Home/help/view?id=:3',//文章内容页
	),
	
	'SYS_URL'	=>array('admin','borrow','member','invest','donate','tool','feedback','service','bid'),
	'EXC_URL'	=>array('invest/tool/index.html','borrow/tool/index.html','borrow/tool/tool2.html','borrow/tool/tool2.html'),
	//友情链接
    'FRIEND_LINK'=>array(
			1=>'首页',
			2=>'内页',
		),
	//友情链接
    'TYPE_SET'=>array(
			1=>'列表页',
			2=>'单页',
			3=>'跳转',
		),
	'XMEMBER_TYPE'=>array(
			1=>'普通借款者',
			2=>'优良借款者',
			3=>'风险借款者',
			4=>'黑名单',
	),
	//收费类型
    'MONEY_LOG'=>array(
			1=>'会员注册奖励',
			2=>'会员升级',
			3=>'会员充值',
			4=>'提现冻结',
			5=>'撤消提现',
			6=>'投标冻结',
			15=>'投标成功本金解冻',
			28=>'投标成功待收利息',
			7=>'管理员操作',
			8=>'流标返还',
			16=>'复审未通过返还',
			9=>'会员还款',
			10=>'网站代还',
			11=>'偿还借款',
			12=>'提现失败',
			13=>'推广奖励',
			14=>'升级VIP',
			17=>'借款入帐',
			18=>'借款管理费',
			19=>'借款保证金',
			20=>'投标奖励',
			21=>'支付投标奖励',
			22=>'视频认证费用',
			23=>'利息管理费',
			24=>'还款完成解冻',
			25=>'实名认证费用',
			26=>'现场认证费用',
			27=>'充值审核',
			29=>'提现成功',
			30=>'逾期罚息',
			31=>'催收费',
			32=>'偿还本金',
		),
	'BANK_NAME'=>array(
			'招商银行'=>'招商银行',
			'中国银行'=>'中国银行',
			'中国工商银行'=>'中国工商银行',
			'中国建设银行'=>'中国建设银行',
			'中国农业银行'=>'中国农业银行',
			'中国邮政储蓄银行'=>'中国邮政储蓄银行',
			'交通银行'=>'交通银行',
			'上海浦东发展银行'=>'上海浦东发展银行',
			'深圳发展银行'=>'深圳发展银行',
			'中国民生银行'=>'中国民生银行',
			'兴业银行'=>'兴业银行',
			'平安银行'=>'平安银行',
			'北京银行'=>'北京银行',
			'天津银行'=>'天津银行',
			'上海银行'=>'上海银行',
			'华夏银行'=>'华夏银行',
			'光大银行'=>'光大银行',
			'广发银行'=>'广发银行',
			'中信银行'=>'中信银行',
			'上海农商银行'=>'上海农商银行',
			'深圳农商银行'=>'深圳农商银行',
		),
	
	'REPAYMENT_TYPE'=>array(
			'1'=>'每月还款',
			'2'=>'一次性还款'
		),
	
	'PAYLOG_TYPE'=>array(
			'0'=>'充值未完成',
			'1'=>'充值成功',
			'2'=>'签名不符',
			'3'=>'充值失败'
		),
	
	'WITHDRAW_STATUS'=>array(
			'0'=>'待审核',
			'1'=>'审核通过,处理中',
			'2'=>'已提现',
			'3'=>'审核未通过'
		),
	
	'FEEDBACK_TYPE'=>array(
			'1'=>'借入借出',
			'2'=>'资金账户',
			'3'=>'推广奖金',
			'4'=>'充值提现',
			'5'=>'注册登录',
			'6'=>'其他问题',
			'7'=>'快速借款通道'
		),
	'GFB_BANKS'=>array(
		'ICBC'=>array('工商银行','gsyh'),
		'ABC'=>array('农业银行','nyyh'),
		'BOC'=>array('中国银行','zgyh'),
		'CCB'=>array('建设银行','jsyh'),
		'CMB'=>array('招商银行','zsyh'),
		'BOCOM'=>array('交通银行','jtyh'),
		'PSBC'=>array('邮政储蓄','ycyh'),
		'CMBC'=>array('民生银行','msyh'),
		'GDB'=>array('广发银行','gfyh'),
		'SPDB'=>array('浦发银行','pfyh'),
		'CEB'=>array('光大银行','gdyh'),
		'CITIC'=>array('中信银行','zxyh'),
		'CIB'=>array('兴业银行','xyyh'),
		'HXBC'=>array('华夏银行','hxyh'),
		'PAB'=>array('平安银行','payh'),
		'BOBJ'=>array('北京银行','bjyh'),
		'BOS'=>array('上海银行','shyh'),
		'SRCB'=>array('上海农商银行','shnsyh'),
		'SDB'=>array('深圳发展银行','szyh'),
		'TCCB'=>array('天津银行','tjyh'),
	),
	
	'GFB_PARAMS'=>array(
			'PRODUCT_URL'=>'https://www.gopay.com.cn/PGServer/Trans/WebClientAction.do',
			'TEST_URL'=>'https://211.88.7.30/PGServer/Trans/WebClientAction.do',
			'TEST_MERCHANTID'=>'0000003358',
			'TEST_VERFICATIONCODE'=>'12345678',
			'TEST_VIRCARDNOIN'=>'0000000001000000584'
		),
	
	'ISMS_INFO'=>array(
			'GETFEE_URL'=>'http://203.81.21.34/send/getfee.asp',
			'MASSSEND_URL'=>'http://203.81.21.34/send/gsend.asp',
			'RECEIVE_URL'=>'http://203.81.21.34/send/readsms.asp',
			'CPWD_URL'=>'http://203.81.21.34/send/cpwd.asp',
			'WS_URL'=>'http://119.145.9.12/services/emsServices?wsdl'
		),
	'EXCEPT_INFO'=>array(//可以使用任意多个的手机号
			'PHONE' => array('13509660085')
		),
	'AVOID_CHK_GRP'=>array(
			'后台测试',
			'网络管理',
			'编辑',
		),
	'NEED_HTTPS_URLS'=>array(
			'/member',
			'/pay',
			'/invest',
			'/borrow',
	),
	'NO_NEED_HTTPS_URLS'=>array(
			'/member/common/verify',
	),
	'DISABLED_SSL_URLS'=>array(
			'dev.yesvion.com',
			'alt.yesvion.com',
	),
	'ALLINPAY_BANKS'=>array(
		'cmb'=>array('招商银行','zsyh'),
		'chinapay'=>array('银联电子商务','yldzsw'),
		'icbc'=>array('中国工商银行','gsyh'),
		'ccb'=>array('中国建设银行','jsyh'),
		'abc'=>array('中国农业银行','nyyh'),
		'cmbc'=>array('中国民生银行','msyh'),
		'spdb'=>array('上海浦东发展银行','pfyh'),
		//'sdb'=>array('深圳发展银行','szyh'),
		'hxb'=>array('华夏银行','hxyh'),
		'cgb'=>array('广东发展银行','gfyh'),
		'cib'=>array('兴业银行','xyyh'),
		'ceb'=>array('光大银行','gdyh'),
		'bob'=>array('北京银行','bjyh'),
		'comm'=>array('交通银行','jtyh'),
		'boc'=>array('中国银行','zgyh'),
		'citic'=>array('中信银行','zxyh'),
		'bos'=>array('上海银行','shyh'),
		'pingan'=>array('平安银行','payh'),
		'psbc'=>array('邮政储蓄','ycyh'),
		'egb'=>array('恒丰银行','hfyh'),
	),
	
	'ALLINPAY_PARAMS'=>array(
			'MODE'=>'PRODUCT',
			'PRODUCT_PAY_URL'=>'https://service.allinpay.com/gateway/index.do',
			'TEST_PAY_URL'=>'http://ceshi.allinpay.com/gateway/index.do',
			'TEST_BANK_CODE'=>'vbank',
			'TEST_KEY'=>'Lib/Pay/allinpay/test/publickey.txt',
			'PRODUCT_KEY'=>'Lib/Pay/allinpay/product/publickey.txt',
		),
		
	'TENPAY_BANKS'=>array(
		'ICBC'=>array('工商银行','gsyh'),
		'CCB'=>array('建设银行','jsyh'),
		'ABC'=>array('农业银行','nyyh'),
		'CMB'=>array('招商银行','zsyh'),
		'SPDB'=>array('上海浦发银行','pfyh'),
		'SDB'=>array('深圳发展银行','szyh'),
		'CIB'=>array('兴业银行','xyyh'),
		'BOB'=>array('北京银行','bjyh'),
		'CEB'=>array('光大银行','gdyh'),
		'CMBC'=>array('民生银行','msyh'),
		'CITIC'=>array('中信银行','zxyh'),
		'GDB'=>array('广东发展银行','gfyh'),
		'PAB'=>array('平安银行','payh'),
		'BOC'=>array('中国银行','zgyh'),
		'COMM'=>array('交通银行','jtyh'),
		'NJCB'=>array('南京银行','njyh'),
		'NBCB'=>array('宁波银行','nbyh'),
		'SRCB'=>array('上海农商','shnsyh'),
		'BEA'=>array('东亚银行','dyyh'),
		'POSTGC'=>array('邮储','ycyh'),
		'ICBCB2B'=>array('工商银行（企业）','gsyh'),
		'CMBB2B'=>array('招商银行（企业）','zsyh'),
		'CCBB2B'=>array('建设银行（企业）','jsyh'),
		'ABCB2B'=>array('农业银行（企业）','nyyh'),
		'SPDBB2B'=>array('浦发银行（企业）','pfyh'),
		'CEBB2B'=>array('光大银行（企业）','gdyh'),
	),
	
	'TENPAY_PARAMS'=>array(
			'PAY_URL'=>'https://gw.tenpay.com/gateway/pay.htm',
			'VERIFY_URL'=>'https://gw.tenpay.com/gateway/verifynotifyid.xml',
	),
	
	'PAY_TYPE'=>array(
			'off'=>'线下充值',
			'gfb'=>'国付宝',
			'ips'=>'环迅支付',
			'chinabank'=>'网银在线',
			'allinpay'=>'通联支付',
			'tenpay'=>'财付通',
	),
	'SMS_CONTENT_TYPE'=>array(
			'NEW_BORROW'=>'新标提醒',
			'CHECK_CODE'=>'校验码',
			'MASS_SEND'=>'群发',
			'payback'=>'收到还款',
			'refuse'=>'refuse',
			'firstV'=>'现场认证',
			'approve'=>'approve',
			'payoffline'=>'线下充值',
			'payonline'=>'在线充值',
			'vip'=>'vip',
			'withdraw'=>'已提现',
			'modifybank'=>'修改银行账号',
			'withdrawreq'=>'申请提现',
			'autoinvest'=>'自动投标借出完成',
	),
	'LOG_OPERATION_TYPE'=>array(
			'MODIFY_RECOMMOND'=>array('MODIFY_RECOMMOND','修改推荐人'),
			'SCORES'=>array('SCORES','积分日志'),
			'EXP'=>array('EXP','经验日志'),
			'MODIFY_DELICATED'=>array('MODIFY_DELICATED','修改专属客服'),
			'MSG_OPT'=>array('MSG_OPT','站内信操作'),
			'BORROW_OPT'=>array('BORROW_OPT','借款标操作'),
	),
	'LOG_USER_TYPE'=>array(
			'ADMIN'=>'ADMIN',
			'MEMBER'=>'MEMBER',
	),
	'ALL_CACHE_KEYS'=>array(
			'art_cat_id'=>'article_category_id',
			'art_cat_pid'=>'article_category_parentid',
			'art_cat_pid_count'=>'article_category_parentid_count',
			'art_cat_cond'=>'art_cat_cond',
	),
	'CREDITS_TYPE'=>array(
			'1'=>array('name'=>'资料','max-times'=>10),//max-times对每个会员最大次数
			'2'=>array('name'=>'实名认证','max-times'=>1),
			'3'=>array('name'=>'正常还款','max-times-per-period'=>1),//max-times-per-period每期最大次数
			'4'=>array('name'=>'迟还','max-times-per-period'=>1),
			'5'=>array('name'=>'逾期还款','max-times-per-period'=>1),
			'6'=>array('name'=>'提前还款','max-times-per-period'=>1),
			'7'=>array('name'=>'视频认证','max-times'=>1),
			'8'=>array('name'=>'现场认证','max-times'=>1),
			'9'=>array('name'=>'VIP','max-times'=>1),
			'10'=>array('name'=>'投资','max-times-per-invest'=>1),//max-times-per-invest每笔投资最大次数
			'11'=>array('name'=>'手机认证','max-times'=>1),
			'12'=>array('name'=>'Email认证','max-times'=>1),
	),
	'SCORES_TYPE'=>array(
			'1'=>array('name'=>'资料','max-times'=>10),//max-times对每个会员最大次数
			'2'=>array('name'=>'实名认证','max-times'=>1),
			'3'=>array('name'=>'正常还款','max-times-per-period'=>1),//max-times-per-period每期最大次数
			'4'=>array('name'=>'迟还','max-times-per-period'=>1),
			'5'=>array('name'=>'逾期还款','max-times-per-period'=>1),
			'6'=>array('name'=>'提前还款','max-times-per-period'=>1),
			'7'=>array('name'=>'视频认证','max-times'=>1),
			'8'=>array('name'=>'现场认证','max-times'=>1),
			'9'=>array('name'=>'VIP','max-times'=>1),
			'10'=>array('name'=>'投资','max-times-per-invest'=>1),//max-times-per-invest每笔投资最大次数
			'11'=>array('name'=>'手机认证','max-times'=>1),
			'12'=>array('name'=>'Email认证','max-times'=>1),
			'99'=>array('name'=>'消费','max-times-per-consume'=>1),//max-times-per-consume每次消费最大次数
	),
	'VERIFY_TYPE'=>array(
			'1'=>'注册成功发送邮件',
			'2'=>'验证手机验证码',
			'3'=>'安全中心通过验证码改密码安全问题',
			'4'=>'安全中心通过验证码改手机',
			'5'=>'安全中心通过验证码改手机',
			'6'=>'安全中心新手机验证码安全码',
			'7'=>'密码找回',
			'8'=>'绑定账户手机校验码',
			'9'=>'支付密码找回',
			'10'=>'修改邮箱手机验证码',
			'11'=>'修改银行手机验证码',
			'12'=>'提现手机验证码',
			'13'=>'后台登陆短信验证码',
			'14'=>'接口token',
	),
	'SYS_TIPS_IGNORE'=>array(
			
	),
);
?>
