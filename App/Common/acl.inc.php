<?php
/*array(菜单名，菜单url参数，是否显示)*/
//error_reporting(E_ALL);
/*
$acl_inc[$i]['low_leve']['global']  global是model
每个action前必须添加eqaction_前缀'eqaction_websetting'  => 'at1','at1'表示唯一标志,可独自命名,eqaction_后面跟的action必须统一小写


*/
$acl_inc =  array();
$i=0;
$acl_inc[$i]['low_title'][] = '全局设置';
$acl_inc[$i]['low_leve']['global']= array( "网站设置" =>array(
												 "列表" 		=> 'at1',
												 "增加" 		=> 'at2',
												 "删除" 		=> 'at3',
												 "修改" 		=> 'at4',
												),
											"友情链接" =>array(
												 "列表" 		=> 'at5',
												 "增加" 		=> 'at6',
												 "删除" 		=> 'at7',
												 "修改" 		=> 'at8',
												 "搜索" 		=> 'att8',
											),
											"前台模板" =>array(
												 "清除" 		=> 'at18',
											),
											"后台模板" =>array(
												 "清除" 		=> 'at19',
											),
											"会员中心" =>array(
												 "清除" 		=> 'at20',
											),
											"数据缓存" =>array(
												 "清除" 		=> 'at21',
											),
											"所有缓存" =>array(
												 "清除" 		=> 'at22',
											),
										   "data" => array(
										   		//网站设置
												'eqaction_websetting'  => 'at1',
												'eqaction_doadd'    => 'at2',
												'eqaction_dodelweb'    => 'at3',
												'eqaction_doedit'   => 'at4',
												//友情链接
												'eqaction_friend'  	   => 'at5',
												'eqaction_dodeletefriend'    => 'at7',
												'eqaction_searchfriend'    => 'att8',
												'eqaction_addfriend'   => array(
																'at6'=>array(
																	'POST'=>array(
																		"fid"=>'G_NOTSET',
																	),
																 ),	
																'at8'=>array(
																	'POST'=>array(
																		"fid"=>'G_ISSET',
																	),
																),
													),
										   		//清除缓存
												'eqaction_cleantemplet'   => array(
																'at18'=>array(
																	'GET'=>array(
																		"acahe"=>'1',
																	),
																 ),	
																'at19'=>array(
																	'GET'=>array(
																		"acahe"=>'2',
																	),
																),
																'at20'=>array(
																	'GET'=>array(
																		"acahe"=>'3',
																	),
																),
													),
												'eqaction_cleandata'    => 'at21',
												'eqaction_cleanall'  => 'at22',
											)
							);
$acl_inc[$i]['low_leve']['area']= array( "地区管理" =>array(
												 "列表" 		=> 'dq1',
												 "增加" 		=> 'dq2',
												 "批量增加" 	=> 'dq5',
												 "删除" 		=> 'dq3',
												 "修改" 		=> 'dq4',
												),
										   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'dq1',
												'eqaction_listtype'  => 'dq1',
												'eqaction_add'    => 'dq2',
												'eqaction_doadd'    => 'dq2',
												'eqaction_edit'    => 'dq4',
												'eqaction_doedit'    => 'dq4',
												'eqaction_dodel'    => 'dq3',
												'eqaction_addmultiple'    => 'dq5',
												'eqaction_doaddmul'    => 'dq5',
											)
							);
$acl_inc[$i]['low_leve']['ad']= array( "广告管理" =>array(
												 "列表" 		=> 'ad1',
												 "增加" 		=> 'ad2',
												 "删除" 		=> 'ad4',
												 "修改" 		=> 'ad3',
												),
										   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'ad1',
												'eqaction_add'    => 'ad2',
												'eqaction_doadd'    => 'ad2',
												'eqaction_edit'    => 'ad3',
												'eqaction_doedit'    => 'ad3',
												'eqaction_swfupload'    => 'ad3',
												'eqaction_dodel'    => 'ad4',
											)
							);
$acl_inc[$i]['low_leve']['leve']= array( "会员级别管理" =>array(
												 "查看" 		=> 'jb1',
												 "修改" 		=> 'jb2',
												),
										   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'jb1',
												'eqaction_save'    => 'jb2',
											)
							);
$acl_inc[$i]['low_leve']['age']= array( "会员年龄别称" =>array(
												 "查看" 		=> 'bc1',
												 "修改" 		=> 'bc2',
												),
										   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'bc1',
												'eqaction_save'    => 'bc2',
											)
							);
$acl_inc[$i]['low_leve']['loginonline']= array( "登陆接口管理" =>array(
												 "查看" 		=> 'dl1',
												 "修改" 		=> 'dl2',
												),
										   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'dl1',
												'eqaction_save'    => 'dl2',
											)
							);
$acl_inc[$i]['low_leve']['active']= array( "活动管理" =>array(
												"查看" 		=> 'hd1',
												"修改" 		=> 'hd2',
												),
											"data" => array(
													//网站设置
													'eqaction_index'  => 'hd1',
													'eqaction_save'    => 'hd2',
											)
							);
$i++;
$acl_inc[$i]['low_title'][] = '在线通知管理';
$acl_inc[$i]['low_leve']['payonline']= array( "支付接口管理" =>array(
												 "查看" 		=> 'jk1',
												 "修改" 		=> 'jk2',
												),
										   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'jk1',
												'eqaction_save'    => 'jk2',
											)
							);
$acl_inc[$i]['low_leve']['msgonline']= array( "通知信息接口管理" =>array(
												 "查看" 		=> 'jk3',
												 "修改" 		=> 'jk4',
												),
											 "通知信息模板管理" =>array(
												 "查看" 		=> 'jk5',
												 "修改" 		=> 'jk6',
											),
									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'jk3',
												'eqaction_save'    => 'jk4',
												'eqaction_templet'  => 'jk5',
												'eqaction_templetsave'    => 'jk6',
											)
							);
$i++;
$acl_inc[$i]['low_title'][] = '借款管理';
$acl_inc[$i]['low_leve']['borrow']= array( "初审待审核借款" =>array(
												 "列表" 		=> 'br1',
												 "审核" 		=> 'br2',
												 "生成预告短信与邮件" 		=> 'br17',
												),
										   "复审待审核借款" =>array(
												 "列表" 		=> 'br3',
												 "审核" 		=> 'br4',
											),
										   "招标中的借款" =>array(
												 "列表" 		=> 'br5',
												 "审核" 		=> 'br6',
											),
										   "还款中的借款" =>array(
												 "列表" 		=> 'br7',
												 "一周内到期标" =>'br7',
											),
										   "已完成的借款" =>array(
												 "列表" 		=> 'br9',
											),
										   "已流标借款" =>array(
												 "列表" 		=> 'br11',
											),
										   "初审未通过的借款" =>array(
												 "列表" 		=> 'br13',
											),
										   "复审未通过的借款" =>array(
												 "列表" 		=> 'br14',
											),
										   "商品图片上传" =>array(
												 "上传" 		=> 'br15',
											),
										   "近N天到期的借款" =>array(
												 "列表" 		=> 'br16',
											),
									   "data" => array(
										   		//网站设置
												'eqaction_waitverify'  => 'br1',
												'eqaction_edit' =>'br2',	
												'eqaction_edit' =>'br4',	
												'eqaction_edit' =>'br6',	
												'eqaction_doeditwaitverify' =>'br2',	
												'eqaction_waitverify2'  => 'br3',
												'eqaction_doeditwaitverify2'  => 'br4',
												'eqaction_waitmoney'  => 'br5',
												'eqaction_doeditwaitmoney'  => 'br6',
												'eqaction_repaymenting'    => 'br7',
												'eqaction_doweek'    => 'br7',
												'eqaction_done'    => 'br9',
												'eqaction_unfinish'    => 'br11',
												'eqaction_fail'    => 'br13',
												'eqaction_fail2'    => 'br14',
												'eqaction_swfupload'    => 'br15',
												'eqaction_expire'    => 'br16',
												'eqaction_dogeneratetip'    => 'br17',
											)
							);
$acl_inc[$i]['low_leve']['expired']= array( "逾期借款管理" =>array(
												 "查看" 		=> 'yq1',
												 "代还" 		=> 'yq2',
												),
										   "逾期会员列表" =>array(
												 "列表" 		=> 'yq3',
											),
									   "data" => array(
												'eqaction_index'  => 'yq1',
												'eqaction_doexpired'  => 'yq2',
												'eqaction_member'  => 'yq3',
											)
							);
$i++;
$acl_inc[$i]['low_title'][] = '借款推送信息管理';
$acl_inc[$i]['low_leve']['newborrow']= array( "新标短信提醒" =>array(
												 "列表" 		=> 'yq1',
												 "进入修改短信" 		=> 'yq2',
												 "修改短信内容" 		=> 'yq3',
												 "进入全部发送" 		=> 'yq4',
												 "全部发送" 		=> 'yq5',
												),
									   "data" => array(
												'eqaction_index'  => 'yq1',
												'eqaction_edit'  => 'yq2',
												'eqaction_doedit'  => 'yq3',
												'eqaction_masssend'  => 'yq4',
												'eqaction_domasssend'  => 'yq5',
											)
							);
$acl_inc[$i]['low_leve']['masssend']= array( "短信群发" =>array(
												 "列表" 			=> 'yq1',
												 "进入新增(修改)短信" => 'yq2',
												 "新增(修改)短信内容" => 'yq3',
												 "进入全部发送" 		=> 'yq4',
												 "全部发送" 		=> 'yq5',
												),
									   "data" => array(
												'eqaction_index'  => 'yq1',
												'eqaction_edit'  => 'yq2',
												'eqaction_doedit'  => 'yq3',
												'eqaction_masssend'  => 'yq4',
												'eqaction_domasssend'  => 'yq5',
											)
							);
$acl_inc[$i]['low_leve']['innermsg']= array( "活动站内信" =>array(
											"列表" 			=> 'inner1',
											"进入新增(修改)站内信" => 'inner2',
											"新增(修改)站内信" => 'inner3',
											"确定群发站内信"   => 'inner4',
											),
										"data" => array(
												'eqaction_index'  => 'inner1',
												'eqaction_edit'  => 'inner2',
												'eqaction_doedit'  => 'inner3',
												'eqaction_sendinnermsg' => 'inner4',
										)
);
$i++;
$acl_inc[$i]['low_title'][] = '会员管理';
$acl_inc[$i]['low_leve']['members']= array( "会员列表" =>array(
												 "列表" 		=> 'me1',
												 "调整余额" 	=> 'mx2',
												 "调整授信" 	=> 'mx3',
												 "删除会员" 	=> 'mxw',
												 "修改客户类型" 	=> 'xmxw',
												 "获取地区" 	=> 'area',
												),
										   "会员资料" =>array(
												 "列表" 		=> 'me3',
												 "查看" 		=> 'me4',
											),
										   "额度申请待审核" =>array(
												 "列表" 		=> 'me7',
												 "审核" 		=> 'me6',
											),
										   "客服专员" =>array(
												 "列表" 		=> 'me8',
												 "进入分配客服专员页面" 		=> 'me9',
												 "分配客服专员" 		=> 'me10',
												 "进入修改推荐人页面" 		=> 'me11',
												 "修改推荐人" 		=> 'me12',
											),
                                            "用户推广明细" =>array(
                                                "列表" 		=> 'me13',
                                            ),

									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'me1',
												'eqaction_info' =>'me3',	
												'eqaction_viewinfom'  => 'me4',
												'eqaction_infowait'  => 'me7',
												'eqaction_viewinfo'  => 'me6',
												'eqaction_doeditcredit'  => 'me6',
												'eqaction_domoneyedit'  => 'mx2',
												'eqaction_moneyedit'  => 'mx2',
												'eqaction_creditedit'  => 'mx3',
												'eqaction_dodel'    => 'mxw',
												'eqaction_edit'    => 'xmxw',
												'eqaction_doedit'    => 'xmxw',
												'eqaction_docreditedit'  => 'mx3',
												'eqaction_delicated'    => 'me8',
												'eqaction_godelicated'  => 'me9',
												'eqaction_dodelicated'  => 'me10',
												'eqaction_gomodifyrecommend'  => 'me11',
												'eqaction_domodifyrecommend'  => 'me12',
												'eqaction_getarea'  => 'area',
                                                'eqaction_invite'  => 'me13',
											)
							);
$acl_inc[$i]['low_leve']['common']= array( "会员详细资料" =>array(
												 "查年" 		=> 'mex5',
												),
									   "data" => array(
										   		//网站设置
												'eqaction_member'  => 'mex5',
											)
							);
$acl_inc[$i]['low_leve']['jubao']= array( "举报信息" =>array(
												 "列表" 		=> 'me5',
												),
									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'me5',
											)
							);

$i++;
$acl_inc[$i]['low_title'][] = '认证及申请管理';
$acl_inc[$i]['low_leve']['vipapply']= array( "VIP申请列表" =>array(
												 "列表" 		=> 'vip1',
												 "审核" 		=> 'vip2',
												),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'vip1',
													'eqaction_edit' =>'vip2',	
													'eqaction_doedit'  => 'vip2',
												)
							);
$acl_inc[$i]['low_leve']['memberid']= array( "会员实名认证管理" =>array(
												 "列表" 		=> 'me10',
												 "审核" 		=> 'me9',
												),
									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'me10',
												'eqaction_edit'  => 'me9',
												'eqaction_doedit'  => 'me9',
											)
							);
$acl_inc[$i]['low_leve']['memberdata']= array( "会员上传资料管理" =>array(
												 "列表" 		=> 'dat1',
												 "审核" 		=> 'dat2',
												),
									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'dat1',
												'eqaction_edit'  => 'dat2',
												'eqaction_doedit'  => 'dat2',
											)
							);
$acl_inc[$i]['low_leve']['verifyphone']= array( "手机认证会员" =>array(
												 "列表" 		=> 'vphone1',
												 "导出" 		=> 'vphone2',
												),
									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'vphone1',
												'eqaction_export'  => 'vphone2',
											)
							);
$acl_inc[$i]['low_leve']['verifyvideo']= array( "视频认证申请" =>array(
												 "列表" 		=> 'vpv1',
												 "审核" 		=> 'vpv2',
												),
									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'vpv1',
												'eqaction_edit'  => 'vpv2',
												'eqaction_doedit'  => 'vpv2',
											)
							);
$acl_inc[$i]['low_leve']['verifyface']= array( "现场认证申请" =>array(
												 "列表" 		=> 'vface1',
												 "审核" 		=> 'vface2',
												),
									   "data" => array(
										   		//网站设置
												'eqaction_index'  => 'vface1',
												'eqaction_edit'  => 'vface2',
												'eqaction_doedit'  => 'vface2',
											)
							);
$i++;
$acl_inc[$i]['low_title'][] = '充值提现管理';
$acl_inc[$i]['low_leve']['paylog']= array( "充值记录" =>array(
												 "列表" 		=> 'cg1',
												 "充值处理" 		=> 'cg33',
												),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'cg1',
													'eqaction_edit'  => 'cg33',
													'eqaction_doedit'  => 'cg33',
												)
							);
$acl_inc[$i]['low_leve']['withdrawlog']= array("提现管理" =>array(
												 "列表" 		=> 'cg2',
												 "审核" 		=> 'cg3',
											),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'cg2',
													'eqaction_edit' =>'cg3',	
													'eqaction_doedit'  => 'cg3',
												)
							);
$i++;
$acl_inc[$i]['low_title'][] = '文章管理';
$acl_inc[$i]['low_leve']['article']= array( "文章管理" =>array(
												 "列表" 		=> 'at1',
												 "添加" 		=> 'at2',
												 "删除" 		=> 'at3',
												 "修改" 		=> 'at4',
												),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'at1',
													'eqaction_add'  => 'at2',
													'eqaction_doadd'  => 'at2',
													'eqaction_dodel'  => 'at3',
													'eqaction_edit'  => 'at4',
													'eqaction_doedit'  => 'at4',
												)
							);
$acl_inc[$i]['low_leve']['acategory']= array("文章分类" =>array(
												 "列表" 		=> 'act1',
												 "添加" 		=> 'act2',
												 "批量添加" 	=> 'act5',
												 "删除" 		=> 'act3',
												 "修改" 		=> 'act4',
											),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'act1',
													'eqaction_listtype'  => 'act1',
													'eqaction_add'  => 'act2',
													'eqaction_doadd'  => 'act2',
													'eqaction_dodel'  => 'act3',
													'eqaction_edit'  => 'act4',
													'eqaction_doedit'  => 'act4',
													'eqaction_addmultiple'  => 'act5',
													'eqaction_doaddmul'  => 'act5',
												)
							);
$acl_inc[$i]['low_title'][] = '留言管理';
$acl_inc[$i]['low_leve']['feedback']= array( "留言管理" =>array(
												 "列表" 		=> 'msg1',
												 "查看" 		=> 'msg2',
												 "删除" 		=> 'msg3',
												),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'msg1',
													'eqaction_dodel'  => 'msg3',
													'eqaction_edit'  => 'msg2',
													'eqaction_doedit'  => 'msg2',
												)
							);
$acl_inc[$i]['low_leve']['comment']= array( "评论管理" =>array(
												 "列表" 		=> 'msg1',
												 "查看" 		=> 'msg2',
												 "删除" 		=> 'msg3',
												 "审核" 		=> 'msg4',
												),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'msg1',
													'eqaction_dodel'  => 'msg3',
													'eqaction_edit'  => 'msg2',
													'eqaction_doedit'  => 'msg2',
													'eqaction_doaudit'  => 'msg4',
												)
							);
$acl_inc[$i]['low_leve']['useradvice'] = array("用户意见"=>array(
												"列表"			=>'msg1',
												"查看"			=>'msg2',
												),
											"data" => array(
												'eqaction_index'=>'msg1',
												'eqaction_edit'=>'msg2',
												)
							);

$i++;
$acl_inc[$i]['low_title'][] = '资金统计';
$acl_inc[$i]['low_leve']['capitalaccount']= array( "会员帐户" =>array(
												 "列表" 		=> 'capital_1',
												 "导出" 		=> 'capital_2',
												),
										   "data" => array(
													//网站设置
													'eqaction_index'  => 'capital_1',
													'eqaction_export'  => 'capital_2',
												)
							);
$acl_inc[$i]['low_leve']['capitalonline']= array("充值记录" =>array(
												 "列表" 		=> 'capital_3',
												 "导出" 		=> 'capital_4',
												),
											   "提现记录" =>array(
													 "列表" 		=> 'capital_5',
													 "导出" 		=> 'capital_6',
												),
											   "data" => array(
													//网站设置
													'eqaction_charge'  => 'capital_3',
													'eqaction_withdraw'  => 'capital_5',
													'eqaction_chargeexport'  => 'capital_4',
													'eqaction_withdrawexport'  => 'capital_6',
												)
							);
$acl_inc[$i]['low_leve']['capitaldetail']= array("会员资金记录" =>array(
												 "列表" 		=> 'capital_7',
												 "导出" 		=> 'capital_8',
												),
											   "data" => array(
													//网站设置
													'eqaction_index'  => 'capital_7',
													'eqaction_export'  => 'capital_8',
												)
							);
$acl_inc[$i]['low_leve']['capitalall']= array("网站资金统计" =>array(
												 "查看" 		=> 'capital_9',
												),
											   "data" => array(
													//网站设置
													'eqaction_index'  => 'capital_9',
												)
							);
$acl_inc[$i]['low_leve']['customer']= array("客服客户统计" =>array(
												 "查看" 		=> 'capital_10',
												),
											   "data" => array(
													//客服客户统计查看
													'eqaction_index'  => 'capital_10',
												)
							);
// $acl_inc[$i]['low_leve']['rechargecount'] = array("用户充值投资信息" =>array(
// 												"查看"		=>	'capital_11',
// 												),	
// 												"data" => array(
// 													//统计注册用户的投资信息
// 													'eqaction_index' => 'capital_11',
// 												)
// 							);
$acl_inc[$i]['low_leve']['financestat'] = array("用户金融信息统计" =>array(
												"查看"		=>	'capital_12',
												),	
												"data" => array(
													//统计注册用户的金融信息
													'eqaction_index' => 'capital_12',
												)
							);


//权限管理
$i++;
$acl_inc[$i]['low_title'][] = '权限管理';
$acl_inc[$i]['low_leve']['acl']= array( "权限管理" =>array(
												 "列表" 		=> 'at73',
												 "增加" 		=> 'at74',
												 "删除" 		=> 'at75',
												 "修改" 		=> 'at76',
												),
										   "data" => array(
										   		//权限管理
												'eqaction_index'  => 'at73',
												'eqaction_doadd'    => 'at74',
												'eqaction_add'    => 'at74',
												'eqaction_dodelete'    => 'at75',
												'eqaction_doedit'   => 'at76',
												'eqaction_edit'   	=> 'at76',
											)
							);
//管理员管理
$i++;
$acl_inc[$i]['low_title'][] = '管理员管理';
$acl_inc[$i]['low_leve']['adminuser']= array( "管理员管理" =>array(
												 "列表" 		=> 'at77',
												 "增加" 		=> 'at78',
												 "删除" 		=> 'at79',
												 "上传头像"	=> 'at99',
												 "修改" 		=> 'at80',
												),
										   	  "data" => array(
										   		//权限管理
												'eqaction_index'  => 'at77',
												'eqaction_dodelete'    => 'at79',
												'eqaction_header'    => 'at99',
												'eqaction_memberheaderuplad'    => 'at99',
												'eqaction_addadmin' =>array(
																'at78'=>array(//增加
																	'POST'=>array(
																		"uid"=>'G_NOTSET',
																	),
																 ),	
																'at80'=>array(//修改
																	'POST'=>array(
																		"uid"=>'G_ISSET',
																	),
																 ),	
												),
											)
							);
//管理员修改密码
$i++;
$acl_inc[$i]['low_title'][] = '修改密码';
$acl_inc[$i]['low_leve']['editinfo']= array( "修改密码" =>array(
											"列表" 			=> 'inner1',
											"修改密码" => 'inner2',
											),
										"data" => array(
											'eqaction_index'  => 'inner1',
											'eqaction_edit'  => 'inner2',

										)
);
//权限管理
$i++;
$acl_inc[$i]['low_title'][] = '数据库管理';
$acl_inc[$i]['low_leve']['db']= array( "数据库信息" =>array(
												 "查看" 		=> 'db1',
												 "备份" 		=> 'db2',
												 "查看表结构" => 'db3',
												),
									   "数据库备份管理" =>array(
											 "备份列表" 		=> 'db4',
											 "删除备份" 		=> 'db5',
											 "恢复备份" 		=> 'db6',
											 "打包下载" 		=> 'db7',
										),
									   "清空数据" =>array(
											 "清空数据" 		=> 'db8',
										),
										   "data" => array(
										   		//权限管理
												'eqaction_index'  => 'db1',
												'eqaction_set'  => 'db2',
												'eqaction_backup'  => 'db2',
												'eqaction_showtable'  => 'db3',
												'eqaction_baklist'  => 'db4',
												'eqaction_delbak'  => 'db5',
												'eqaction_restore'  => 'db6',
												'eqaction_dozip'  => 'db7',
												'eqaction_downzip'  => 'db7',
												'eqaction_truncate'  => 'db8',
											)
							);
$i++;
$acl_inc[$i]['low_title'][] = '图片上传';
$acl_inc[$i]['low_leve']['kissy']= array( "图片上传" =>array(
												 "图片上传" 		=> 'at81',
												),
										   	  "data" => array(
										   		//权限管理
												'eqaction_index'  => 'at81',
											  )
							);
//短信管理
$i++;
$acl_inc[$i]['low_title'][] = '短信管理';
$acl_inc[$i]['low_leve']['sms']= array( "查询余额" =>array(
												 "查看" 		=> 'sms1',
												 "操作" 		=> 'sms2'
												),
									   "发送短信" =>array(
											 "查看" 		=> 'sms3',
											 "操作" 		=> 'sms4',
										),
									   "接收短信" =>array(
											 "查看" 		=> 'sms5',
											 "操作" 		=> 'sms6',
										),
									   "修改密码" =>array(
											 "查看" 		=> 'sms7',
											 "操作" 		=> 'sms8',
										),
										   "data" => array(
										   		//权限管理
												'eqaction_getfee'  => 'sms1',
												'eqaction_dogetfee'  => 'sms2',
												'eqaction_masssend'  => 'sms3',
												'eqaction_domasssend'  => 'sms4',
												'eqaction_receive'  => 'sms5',
												'eqaction_doreceive'  => 'sms6',
												'eqaction_cpwd'  => 'sms7',
												'eqaction_docpwd'  => 'sms8',
											)
							);
$i++;
$acl_inc[$i]['low_title'][] = '查看日志';
$acl_inc[$i]['low_leve']['log']= array( "查看日志" =>array(
												 "查看日志" 		=> 'log1',
												),
										   	  "data" => array(
												'eqaction_loglist'  => 'log1',
											  )
							);
?>