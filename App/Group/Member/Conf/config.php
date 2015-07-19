<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_THEME'     =>'gold',//使用的模板
	'MEMBER_PAGE_SIZE'=>15,//后台列表默认显示条数
	'VIP_PAGE_SIZE'=>15,//后台列表默认显示条数
	'MEMBER_MAX_UPLOAD'=>2000000,//后台上传文件最大限制2M
	'MEMBER_UPLOAD_DIR'=>'UF/Uploads/',//后台上传目录
	'MEMBER_ALLOW_EXTS'=>array('jpg', 'gif', 'png', 'jpeg' , 'bmp', 'doc' ,'docx' ,'pdf', 'rar' , 'zip'),//允许上传的附件类型
	'MEMBER_IDCARD_ALLOW_EXTS'=>array('jpg', 'gif', 'png', 'jpeg' ,'bmp'),//允许上传的附件类型
	'SHOW_UPLOAD_W'	=> "300",
	'SHOW_UPLOAD_H'	=> "300",
	'ALBUM_UPLOAD_W'	=> "300",
	'ALBUM_UPLOAD_H'	=> "300",
    'IPS_ERR_ARR'=>array(
    		'1001'=>'验证不通过',
    		'1002'=>'无银行列表',
    		'1003'=>'商户访问被拒绝',
    		'9001'=>'服务器验证失败',
    		'9002'=>'服务器操作失败',
	),
	'IPS_BANK_IMG'=>array(
			'00056'=>'bjncsyyh',
			'00050'=>'bjyh',
			'00095'=>'bhyh',
			'00096'=>'dyyh',
			'00057'=>'gdyh',
			'00052'=>'gfyh',
			'00081'=>'hzyh',
			'00041'=>'hxyh',
			'00005'=>'jtyh',
			'00013'=>'msyh',
			'00085'=>'nbyh',
			'00087'=>'payh',
			'00032'=>'pfyh',
			'00084'=>'shyh',
			'00023'=>'szyh',
			'00016'=>'xyyh',
			'00051'=>'ycyh',
			'00021'=>'zsyh',
			'00086'=>'zhesyh',
			'00004'=>'gsyh',
			'00026'=>'gssjyh',
			'00015'=>'jsyh',
			'00017'=>'nyyh',
			'00083'=>'zgyh',
			'00054'=>'zxyh',
    ),
);
?>