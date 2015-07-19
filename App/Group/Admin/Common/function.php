<?php

//获取借款列表
function getTMemberList($search=array(),$size=''){
	$pre = C('DB_PREFIX');
	$map['m.is_transfer'] = '1';
	$map = array_merge($map,$search);


	//分页处理
	import("ORG.Util.Page");
	$count = M('members m')->where($map)->count('m.id');
	$p = new Page($count, $size);
	$page = $p->show();
	$Lsql = "{$p->firstRow},{$p->listRows}";
	//分页处理

	$field = "m.id,m.user_name,mf.info";
	$list = M('members m')->field($field)->join("{$pre}member_info mf ON m.id=mf.uid")->where($map)->limit($Lsql)->select();
	foreach($list as $key=>$v){
		$total = M('borrow_info')->field("sum(borrow_money) as tb,sum(transfer_out*per_transfer) as to")->where("borrow_uid={$v['id']}")->find();
		$list[$key]['transfer_total'] = $total['tb'];
		$list[$key]['transfer_total_out'] = $total['to'];
	}
	
	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	return $row;
}

//获取借款列表
function getMemberInfoList($search=array(),$size=''){
	$pre = C('DB_PREFIX');
	$map = array();
	$map = array_merge($map,$search);


	//分页处理
	import("ORG.Util.Page");
	$count = M('members m')->where($map)->count('m.id');
	$p = new Page($count, $size);
	$page = $p->show();
	$Lsql = "{$p->firstRow},{$p->listRows}";
	//分页处理

	$field = "m.id,m.id as uid,m.user_name,mbank.uid as mbank_id,mi.uid as mi_id,mci.uid as mci_id,mhi.uid as mhi_id,mdpi.uid as mdpi_id,mei.uid as mei_id,mfi.uid as mfi_id";
	$list = M('members')->alias("m")->field($field)->join("{$pre}member_banks mbank ON m.id=mbank.uid")->join("{$pre}member_contact_info mci ON m.id=mci.uid")->join("{$pre}member_department_info mdpi ON m.id=mdpi.uid")->join("{$pre}member_house_info mhi ON m.id=mhi.uid")->join("{$pre}member_ensure_info mei ON m.id=mei.uid")->join("{$pre}member_info mi ON m.id=mi.uid")->join("{$pre}member_financial_info mfi ON m.id=mfi.uid")->where($map)->limit($Lsql)->order('m.id DESC')->select();
	foreach($list as $key=>$v){
		$is_data = M('member_data_info')->where("uid={$v['uid']}")->count("id");
		$list[$key]['mbank'] = ($v['mbank_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mci'] = ($v['mci_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mdi'] = ($is_data>0)?"<span style='color:green'>已填写(<a href='".U('/admin/memberdata/index')."?uid={$v['uid']}'>查看</a>)</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mhi'] = ($v['mhi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mdpi'] = ($v['mdpi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mei'] = ($v['mei_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mfi'] = ($v['mfi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mi'] = ($v['mi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
	}
	
	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	return $row;
}


//获取借款列表
function getMemberApplyList($search=array(),$size=''){
	$pre = C('DB_PREFIX');
	$map['ap.apply_status'] = '0';
	$map = array_merge($map,$search);


	//分页处理
	import("ORG.Util.Page");
	$count = M('member_apply ap')->where($map)->count('ap.id');
	$p = new Page($count, $size);
	$page = $p->show();
	$Lsql = "{$p->firstRow},{$p->listRows}";
	//分页处理

	$field = "ap.id,ap.apply_type,m.id as uid,m.user_name,mbank.uid as mbank_id,mhi.uid as mhi_id,mi.uid as mi_id,mci.uid as mci_id,mdpi.uid as mdpi_id,mei.uid as mei_id,mfi.uid as mfi_id,ap.add_time";
	$list = M('member_apply ap')->field($field)->join("{$pre}members m ON m.id=ap.uid")->join("{$pre}member_banks mbank ON m.id=mbank.uid")->join("{$pre}member_contact_info mci ON m.id=mci.uid")->join("{$pre}member_department_info mdpi ON m.id=mdpi.uid")->join("{$pre}member_ensure_info mei ON m.id=mei.uid")->join("{$pre}member_house_info mhi ON m.id=mhi.uid")->join("{$pre}member_info mi ON m.id=mi.uid")->join("{$pre}member_financial_info mfi ON m.id=mfi.uid")->where($map)->limit($Lsql)->order('ap.id DESC')->select();
	foreach($list as $key=>$v){
		$is_data = M('member_data_info')->where("uid={$v['uid']}")->count("id");
		$list[$key]['mbank'] = ($v['mbank_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mci'] = ($v['mci_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mdi'] = ($is_data>0)?"<span style='color:green'>已填写(<a href='".U('/admin/memberdata/index')."?uid={$v['uid']}'>查看</a>)</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mhi'] = ($v['mhi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mdpi'] = ($v['mdpi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mei'] = ($v['mei_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mfi'] = ($v['mfi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
		$list[$key]['mi'] = ($v['mi_id']>0)?"<span style='color:green'>已填写</span>":"<span style='color:black'>未填写</span>";
	}
	
	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	return $row;
}

//获取借款列表
function getMemberInfoDetail($uid){
	$pre = C('DB_PREFIX');
	$map['m.id'] = $uid;
	$field = "*";
	$list = M('members m')->field($field)->join("{$pre}member_banks mbank ON m.id=mbank.uid")->join("{$pre}member_contact_info mci ON m.id=mci.uid")->join("{$pre}member_house_info mhi ON m.id=mhi.uid")->join("{$pre}member_department_info mdpi ON m.id=mdpi.uid")->join("{$pre}member_ensure_info mei ON m.id=mei.uid")->join("{$pre}member_info mi ON m.id=mi.uid")->join("{$pre}member_financial_info mfi ON m.id=mfi.uid")->where($map)->limit($Lsql)->find();
	return $list;
}

function getRepayDetail($repayment_type,$borrow_interest_rate, $borrow_duration){
	$repay_detail = array();
	if($repayment_type==2){
		$money = 100;
		$rate = $borrow_interest_rate;
		$month = $borrow_duration;
			
		$monthData['money'] = $money;
		$monthData['year_apr'] = $rate;
		$monthData['duration'] = $month;
		$monthData['type'] = "all";
		$repay_detail = EqualMonth($monthData);
	}elseif($repayment_type==3){
		$money = 100;
		$rate = $borrow_interest_rate;
		$month = $borrow_duration;
			
		$monthData['account'] = $money;
		$monthData['year_apr'] = $rate;
		$monthData['month_times'] = $month;
		$monthData['type'] = "all";
		$repay_detail = EqualSeason($monthData);
	}elseif($repayment_type == 4){
		$money = 100;
		$rate = $borrow_interest_rate;
		$month = $borrow_duration;
		$parm['month_times'] = $month;
		$parm['account'] = $money;
		$parm['year_apr'] = $rate;
		$parm['type'] = "all";
		$repay_detail = EqualEndMonth($parm);
	}
	return $repay_detail;
}

function newBorrowSmsNotify($content, $borrow_id, $create_user){
	$pre = C("DB_PREFIX");
	$smscontentid = M("sms_content")->add(array("sms_content"=>$content, "borrow_id"=>$borrow_id,"sms_type"=>"NEW_BORROW", "create_time"=>date('Y-m-d H:i:s',time()), "create_user"=>$create_user));
	if($smscontentid !== false){
		$borrow_uid = M("borrow_info")->getFieldById($borrow_id, "borrow_uid");
		$isql = "INSERT INTO `{$pre}sms_receiver`(sms_log_id, phone_number, uid)(SELECT distinct {$smscontentid},b.user_phone,b.id FROM `{$pre}members_status` a INNER JOIN `{$pre}members` b ON a.uid=b.id left join {$pre}sys_tip c on a.uid=c.uid WHERE a.phone_status='1' AND b.user_phone IS NOT NULL AND b.user_phone<>'' AND b.id<>'{$borrow_uid}' AND (c.`tipset` IS NULL OR c.`tipset` LIKE '%newborrow_3%'))";
		$ret = M()->execute($isql);
		return $ret;
	}else{
		return false;
	}
}

function massSmsNotify($content, $create_user){
	$model = M("sms_content");
	$model->startTrans();
	$ret = M("sms_content")->add(array("sms_content"=>$content, "borrow_id"=>$borrow_id,"sms_type"=>"MASS_SEND", "create_time"=>date('Y-m-d H:i:s',time()), "create_user"=>$create_user));
	if($ret !== false){
		$isql = "INSERT INTO `lzh_sms_receiver`(sms_log_id, phone_number, uid)(SELECT distinct {$ret},b.user_phone,b.id FROM `lzh_members_status` a INNER JOIN `lzh_members` b ON a.uid=b.id WHERE a.phone_status='1' AND b.user_phone IS NOT NULL AND b.user_phone<>'')";
		$ret = M()->execute($isql);
		$model->commit() ;
		return $ret;
	}else{
		$model->rollback();
		return false;
	}
}

//站内信群发函数
function innerMsgSend($mass_id){
	//$inntype =C('MASS_RECEIVER_TYPE');
	$innmess = M('inner_msg')->where("mass_id='{$mass_id}'")->field('msg,title')->find();
	$msg =$innmess['msg'];
	$title = $innmess['title'];
	$time = time();
	$isql = parseSql("INSERT INTO `lzh_inner_msg`(uid,title,msg,send_time,mass_id)(SELECT b.id,'%s','%s','%s','%s' FROM `lzh_members` b WHERE b.is_ban='0')", array($title, $msg, $time,$mass_id));
	if($model = M()->execute($isql)){
		return true;
	}else{
		return false;
	}
}
//验证短信敏感字符方法,有敏感字返回敏感字，没有返回空
function checkMessage($message){

	$content= file("./Style/sensiword.txt");

	for($i=0;$i<count($content);$i++){

		if (preg_match("/".addcslashes(trim($content[$i]),'+,-,.,,,=,*,/,&,@')."/i",$message)) {
	  		$sensiword ='包含敏感词:'.$content[$i];
	  		return $sensiword;
			}
		}
}

function massEmailNotify($subject, $content, $emailtype, $sender, $tip_type, $create_uid=null, $borrow_id=null){
	$pre = C("DB_PREFIX");
	$ret = M("email")->add(array("title"=>$subject, "content"=>$content, "email_type"=>$emailtype, "sender"=>$sender, "create_time"=>date('Y-m-d H:i:s',time()), "create_uid"=>$create_uid, "borrow_id"=>$borrow_id));
	if($ret !== false){
		$isql = "INSERT INTO `{$pre}email_receiver`(uid,email_id,receiver,receiver_type)(SELECT distinct b.id,{$ret},b.user_email,'TO' FROM `{$pre}members_status` a INNER JOIN `{$pre}members` b ON a.uid=b.id left join {$pre}sys_tip c on a.uid=c.uid WHERE a.email_status='1' AND b.user_email IS NOT NULL AND b.user_email<>'' AND (c.`tipset` IS NULL OR c.`tipset` LIKE '%{$tip_type}%'))";
		$ret = M()->execute($isql);
		return $ret;
	}else{
		return false;
	}
}