<?php
// 本类由系统自动生成，仅供测试用途
class BorrowAction extends HCommonAction {
    public function index(){
		$per = C('DB_PREFIX');
		if($this->uid){
			$this->assign("mstatus", M('members_status')->field(true)->find($this->uid));
			$this->assign("mdata", getMemberInfoDone($this->uid));
			$this->assign("minfo", getMinfo($this->uid,true));
			$this->assign("capitalinfo", getMemberBorrowScan($this->uid));
		}
		
		//各种标数据统计
		$this->assign("allStat", getAllBorrowStat());
		
		$this->display();
    }
	
	public function post(){
		if(!$this->uid) $this->error("请先登陆",__APP__."/member/common/login");
		
		$MinfoDone=getMemberInfoDone($this->uid);
		//if($MinfoDone['mi']=='未填写'||$MinfoDone['mci']=='未填写'||$MinfoDone['mdpi']=='未填写'||$MinfoDone['mfi']=='未填写'||$MinfoDone['mhi']!='未填写'||$MinfoDone['mei']=='未填写'){
			//$this->error("个人资料:".$MinfoDone['mi']."<br/>联系方式:".$MinfoDone['mci']."<br/>单位资料:".$MinfoDone['mdpi']."<br/>财务状况:".$MinfoDone['mfi']."<br/>房产信息:".$MinfoDone['mhi']."<br/>联保情况:".$MinfoDone['mei']."<br/>请先补全个人资料然后再发标",__APP__."/member/memberinfo");
			//$this->assgin('waitSecond',80000);
		//}
		
		$_xoc = M('borrow_info')->where("borrow_uid={$this->uid} AND borrow_status in(0,2,4)")->count('id');
		if($_xoc>0)  $this->error("您有一个借款中的标，请等待审核",__APP__."/member/borrowin#fragment-1");
		
		$vminfo = M('members')->field("user_leve,time_limit")->find($this->uid);
		if(!($vminfo['user_leve']>0 && $vminfo['time_limit']>time())) $this->error("请先通过VIP审核再发标",__APP__."/member/vip");
		
		$gtype = text($_GET['type']);
		$vkey = md5(time().$gtype);
		switch($gtype){
			case "normal"://普通标
				$borrow_type=1;
			break;
			case "vouch"://担保标
				$borrow_type=2;
			break;
			case "second"://秒还标
				$this->assign("miao",'yes');
				$borrow_type=3;
			break;
			case "net"://净值标
				$borrow_type=4;
				break;
			case "mortgage"://抵押标
				$borrow_type=5;
				break;
			case "student"://助学贷标
				$borrow_type=6;
			break;
		}


		cookie($vkey,$borrow_type,3600);
		$borrow_duration_day = explode("|",$this->glo['borrow_duration_day']);
		$day = range($borrow_duration_day[0],$borrow_duration_day[1]);
		$day_time=array();
		foreach($day as $v){
			$day_time[$v] = $v."天";
		}

		$borrow_duration = explode("|",$this->glo['borrow_duration']);
		$month = range($borrow_duration[0],$borrow_duration[1]);
		$month_time=array();
		foreach($month as $v){
			$month_time[$v] = $v."个月";
		}
		
		$borrow_config = require C("APP_ROOT")."Conf/borrow_config.php";
		$this->assign("borrow_use",$borrow_config['BORROW_USE']);
		$this->assign("borrow_min",$borrow_config['BORROW_MIN']);
		$this->assign("borrow_max",$borrow_config['BORROW_MAX']);
		$this->assign("borrow_time",$borrow_config['BORROW_TIME']);
		$this->assign("BORROW_TYPE",$borrow_config['BORROW_TYPE']);
		$this->assign("borrow_type",$borrow_type);
		$this->assign("borrow_day_time",$day_time);
		$this->assign("borrow_month_time",$month_time);
		$this->assign("repayment_type",$borrow_config['REPAYMENT_TYPE']);
		$this->assign("vkey",$vkey);
		
		$this->display();
	}
	
	public function save(){
		if(!$this->uid) $this->error("请先登陆",__APP__."/member/common/login");
		$pre = C('DB_PREFIX');
		//相关的判断参数
		$rate_lixt = explode("|",$this->glo['rate_lixi']);
		$borrow_duration = explode("|",$this->glo['borrow_duration']);
		$borrow_duration_day = explode("|",$this->glo['borrow_duration_day']);
		$fee_borrow_manage = explode("|",$this->glo['fee_borrow_manage']);
		$vminfo = M('members m')->join("{$pre}member_info mf ON m.id=mf.uid")->field("m.user_leve,m.time_limit,mf.province_now,mf.city_now,mf.area_now")->where("m.id={$this->uid}")->find();
		//相关的判断参数

		$borrow['borrow_type'] = intval(cookie(text($_POST['vkey'])));
		if($borrow['borrow_type']==50) $this->error("校验数据有误，请重新发布");
		$borrow['borrow_money'] = intval($_POST['borrow_money']);


		$_minfo = getMinfo($this->uid,true);
		$_capitalinfo = getMemberBorrowScan($this->uid);
		switch($borrow['borrow_type']){
			case 1://普通标
				if($_minfo['credit_cuse']<$borrow['borrow_money']) $this->error("您的可用信用额度为{$_minfo['credit_cuse']}元，小于您准备借款的金额，不能发标");
			break;
			case 2://担保标
				if($_minfo['borrow_vouch_cuse']<$borrow['borrow_money']) $this->error("您的可用信用担保借款额度为{$_minfo['borrow_vouch_cuse']}元，小于您准备借款的金额，不能发标");
			break;
			case 3://秒还标

			break;
			case 4://净值标
				$_netMoney = getFloatValue($minfo['money_collect'],2);//getNet($_minfo,$_capitalinfo);
				if($_netMoney<$borrow['borrow_money']) $this->error("您的净资产为{$_netMoney}元，小于您准备借款的金额，不能发标");
			break;
			case 5://抵押标
				//$borrow_type=5;
			break;
		}

		
		if($borrow['borrow_type']==2){//担保标				
			$borrow['reward_vouch_rate'] = floatval($_POST['vouch_rate']);
			$borrow['reward_vouch_money'] = getFloatValue($borrow['borrow_money']*$borrow['reward_vouch_rate']/100,2);
			$borrow['vouch_member'] = text($_POST['vouch_member']);
		}
		
		$borrow['borrow_uid'] = $this->uid;
		$borrow['borrow_name'] = text($_POST['borrow_name']);
		$borrow['borrow_duration'] = ($borrow['borrow_type']==3)?1:intval($_POST['borrow_duration']);//秒标固定为一月
		$borrow['borrow_interest_rate'] = floatval($_POST['borrow_interest_rate']);
		if(strtolower($_POST['is_day'])=='yes') $borrow['repayment_type'] = 1;
		elseif($borrow['borrow_type']==3) $borrow['repayment_type'] = 2;//秒标按月还
		else $borrow['repayment_type'] = intval($_POST['repayment_type']);
		
		
		if($_POST['show_tbzj']==1) $borrow['is_show_invest'] = 1;//共几期(分几次还)
		
		$borrow['total'] = ($borrow['repayment_type']==1)?1:$borrow['borrow_duration'];//共几期(分几次还)
		$borrow['borrow_status'] = 0;
		$borrow['borrow_use'] = intval($_POST['borrow_use']);
		$borrow['add_time'] = time();
		$borrow['collect_day'] = intval($_POST['borrow_time']);
		$borrow['add_ip'] = get_client_ip();
		$borrow['borrow_info'] = text($_POST['borrow_info']);
		$borrow['reward_type'] = intval($_POST['reward_type']);
		$borrow['reward_num'] = floatval($_POST["reward_type_{$borrow['reward_type']}_value"]);
		$borrow['borrow_min'] = intval($_POST['borrow_min']);
		$borrow['borrow_max'] = intval($_POST['borrow_max']);
		$borrow['province'] = $vminfo['province_now'];
		$borrow['city'] = $vminfo['city_now'];
		$borrow['area'] = $vminfo['area_now'];
		if($_POST['is_pass']&&intval($_POST['is_pass'])==1) $borrow['password'] = md5($_POST['password']);
		
		//借款费和利息
		$borrow['borrow_interest'] = getBorrowInterest($borrow['repayment_type'],$borrow['borrow_money'],$borrow['borrow_duration'],$borrow['borrow_interest_rate']);
		
		
		if($borrow['repayment_type'] == 1){//按天还
			$fee_rate = (is_numeric($fee_borrow_manage[0]))?($fee_borrow_manage[0]/100):0.001;
			$borrow['borrow_fee'] = getFloatValue($fee_rate*$borrow['borrow_money']*$borrow['borrow_duration'],2);
		}else{
			$fee_rate_1=(is_numeric($fee_borrow_manage[1]))?($fee_borrow_manage[1]/100):0.02;
			$fee_rate_2=(is_numeric($fee_borrow_manage[2]))?($fee_borrow_manage[2]/100):0.002;
			if($borrow['borrow_duration']>$fee_borrow_manage[3]&&is_numeric($fee_borrow_manage[3])){
				$borrow['borrow_fee'] = getFloatValue($fee_rate_1*$borrow['borrow_money'],2);
				$borrow['borrow_fee'] += getFloatValue($fee_rate_2*$borrow['borrow_money']*($borrow['borrow_duration']-$fee_borrow_manage[3]),2);
			}else{
				$borrow['borrow_fee'] = getFloatValue($fee_rate_1*$borrow['borrow_money'],2);
			}
		}
		
		if($borrow['borrow_type']==3){//秒还标
			if($borrow['reward_type']>0){
				if($borrow['reward_type']==1) $_reward_money = getFloatValue($borrow['borrow_money']*$borrow['reward_num']/100,2);
				elseif($borrow['reward_type']==2) $_reward_money = getFloatValue($borrow['reward_num'],2);
			}
			$_reward_money =floatval($_reward_money);
			if($_minfo['account_money']<($borrow['borrow_fee']+$_reward_money)) $this->error("发布此标您最少需保证您的帐户余额大于等于".($borrow['borrow_fee']+$_reward_money)."元，以确保可以支付借款管理费和投标奖励费用");
		}
		
		//投标上传图片资料（暂隐）
		foreach($_POST['swfimglist'] as $key=>$v){
			if($key>10) break;
			$row[$key]['img'] = substr($v,1);
			$row[$key]['info'] = $_POST['picinfo'][$key];
		}
		$borrow['updata']=serialize($row);
		$borrow['is_tuijian'] = 1;
		$newid = M("borrow_info")->add($borrow);

		if($newid) $this->success("借款发布成功，网站会尽快初审",__APP__."/member/borrowin#fragment-1");
		else $this->error("发布失败，请先检查是否完成了个人详细资料然后重试");
		
	}
	
	//swf上传图片
	public function swfUpload(){
		if($_POST['picpath']){
			$imgpath = substr($_POST['picpath'],1);
			if(in_array($imgpath,$_SESSION['imgfiles'])){
					 unlink(C("WEB_ROOT").$imgpath);
					 $thumb = get_thumb_pic($imgpath);
				$res = unlink(C("WEB_ROOT").$thumb);
				if($res) $this->success("删除成功","",array("data"=>$_POST['oid']));
				else $this->error("删除失败","",array("data"=>$_POST['oid']));
			}else{
				$this->error("图片不存在","",array("data"=>$_POST['oid']));
			}
		}else{
			$this->savePathNew = C('HOME_UPLOAD_DIR').'Product/';
			$this->thumbMaxWidth = C('PRODUCT_UPLOAD_W');
			$this->thumbMaxHeight = C('PRODUCT_UPLOAD_H');
			$this->saveRule = date("YmdHis",time()).rand(0,1000);
			$info = $this->CUpload();
			$data['product_thumb'] = $info[0]['savepath'].$info[0]['savename'];
			if(!isset($_SESSION['count_file'])) $_SESSION['count_file']=1;
			else $_SESSION['count_file']++;
			$_SESSION['imgfiles'][$_SESSION['count_file']] = $data['product_thumb'];
			echo "{$_SESSION['count_file']}:".__ROOT__."/".$data['product_thumb'];//返回给前台显示缩略图
		}
	}

	public function financial(){
		$name=$_GET["_URL_"][2];
		$financial_arr = getFinancialData();
		if(!array_key_exists($name, $financial_arr)){
			$this->error("非法访问");
		}
		$this->assign("vo", $financial_arr[$name]);
		$this->display();
	}
	
	public function ajax_intention(){
		if(!$this->uid) ajaxmsg("请先登陆",0);
		$phonestatus = M('members_status')->getFieldByUid($this->uid,'phone_status');
		if($phonestatus==1){
			$name=$_GET["_URL_"][2];
			$financial_arr = getFinancialData();
			if(!array_key_exists($name, $financial_arr)){
				ajaxmsg("非法访问",0);
			}
			$mem = M('members')->getById($this->uid);
			$this->assign('user_name', $mem['user_name']);
			$this->assign('user_phone', $mem['user_phone']);
			$this->assign("vo", $financial_arr[$name]);
			$data['content'] = $this->fetch();
			ajaxmsg($data);
		}else{
			$data['content'] = '<script>alert("您还未验证手机，请先验证");window.location.href="'.__APP__.'/member/verify";</script>';
			ajaxmsg($data);
		}
	}
	
	public function intentionconfirm(){
		if(!$this->uid) ajaxmsg("请先登陆",0);
		$name=$_GET["_URL_"][2];
		$financial_arr = getFinancialData();
		if(!array_key_exists($name, $financial_arr)){
			ajaxmsg("非法访问",0);
		}
		$intention_money = intval($_POST['intention_money']);
		$borrow_min = $financial_arr[$name]['min_price'];
		if($intention_money < $borrow_min){
			ajaxmsg("本产品最低投资金额为$borrow_min元，请重新输入投标金额",2);
		}
		$uid = M('finalcial_intention')->data(array('finalcial_type'=>$name,'member_id'=>$this->uid,'intention_money'=>$intention_money,'create_time'=>date('Y-m-d H:i:s',time())))->add();
		if($uid !== false){
			ajaxmsg("提交成功！");
		}else{
			ajaxmsg("提交失败！",3);
		}
	}
}