<?php
class AdviceModel extends ACommonModel {
	protected $tableName = 'advice'; 
	protected $_validate	=	array(
			array('nick_name','1,50',"昵称长度过长", Model::VALUE_VAILIDATE, 'length'),
			array('phone','1,20',"手机号长度过长", Model::VALUE_VAILIDATE, 'length'),
			array('qq','number',"QQ号为纯数字", Model::VALUE_VAILIDATE),
			array('qq','1,30',"QQ号长度超长", Model::VALUE_VAILIDATE, 'length'),
			array('email','email',"邮箱格式不正确", Model::VALUE_VAILIDATE),
			array('email','1,50',"邮箱超长", Model::VALUE_VAILIDATE, 'length'),
			array('content','require',"内容不能为空", Model::MUST_VALIDATE),
			array('http_referer','require',"非法提交", Model::MUST_VALIDATE),
		);
}