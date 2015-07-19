<?php
// 本类由系统自动生成，仅供测试用途
class BankAction extends MCommonAction {

    public function index(){
		$this->display();
    }

    public function bank(){
		$ids = M("members")->alias("m")->field("m.bind_uid,ms.id_status,ms.phone_status")->join("left join {$this->pre}members_status ms on m.id=ms.uid")->where(array("m.id"=>$this->uid))->find();
		
		if($ids["phone_status"] != 1 && empty($ids["bind_uid"])){
			$data['html'] = '<script type="text/javascript">$.jBox.alert("您还未绑定手机，请先绑定手机","温馨提醒",{closed:function(){window.location.href="'.__APP__.'/member/verify#fragment-2";}});</script>';
			exit(json_encode($data));
		}
		if($ids["id_status"]==1){
			$voinfo = M("member_info")->field('idcard,real_name')->find($this->uid);
			$vobank = M("member_banks")->field(true)->find($this->uid);
			$idname = $this->uid;
			$voname = M("members")->where("id={$idname}")->field('id,user_name')->find();
			
			$vobank['bank_province'] = M('area')->getFieldByName("{$vobank['bank_province']}",'id');
			$vobank['bank_city'] = M('area')->getFieldByName("{$vobank['bank_city']}",'id');
			
			$this->assign("voname",$voname);
			$this->assign("voinfo",$voinfo);
			$this->assign("vobank",$vobank);
			$this->assign("bank_list",C('BANK_NAME'));
			$data['html'] = $this->fetch();
		}
		else  $data['html'] = '<script type="text/javascript">alert("您还未完成身份验证，请先进行身份验证");window.location.href="'.__APP__.'/member/verify#fragment-3";</script>';

		exit(json_encode($data));
    }
	public function bindbank(){
		$oldaccount = M('member_banks')->getFieldByUid($this->uid,'bank_num');
		$data['uid'] = $this->uid;
		$data['bank_num'] = text($_POST['account']);
		$data['bank_name'] = text($_POST['bankname']);
		$data['bank_address'] = text($_POST['bankaddress']);
		$data['bank_province'] = text($_POST['province']);
		$data['bank_city'] = text($_POST['cityName']);
		$data['add_ip'] = get_client_ip();
		$data['add_time'] = time();
		//短信校验
		$smscode = text($_POST['smscode']);
		if(!is_verify($this->uid,$smscode,11,10*60) ){
			ajaxmsg('短信验证码不对，请重新输入！',0);
		}
		if($oldaccount){
			$old = text($_POST['oldaccount']);
			if($old <> $oldaccount) ajaxmsg('原银卡号不对',0);
			$newid = M('member_banks')->save($data);
		}else{
			$newid = M('member_banks')->add($data);
		}
		if($newid){
			MTip('chk2',$this->uid);
			ajaxmsg();
		}
		else ajaxmsg('操作失败，请重试',0);
	}
	
	
	public function getarea(){
		$rid = intval($_GET['rid']);
		if(empty($rid)) return;
		$map['reid'] = $rid;
		$alist = M('area')->field('id,name')->order('sort_order DESC')->where($map)->select();
		//$this->display("Public:empty");
		if(count($alist)===0){
			$str="<option value=''>--该地区下无下级地区--</option>\r\n";
		}else{
			foreach($alist as $v){
				$str.="<option value='{$v['id']}'>{$v['name']}</option>\r\n";
			}
		}
		$data['option'] = $str;
		$res = json_encode($data);
		echo $res;
	}
	public function getSmsCode(){
    	dealSmsCode($this->uid, $this->pre, 11);
    }
}