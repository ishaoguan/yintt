<?php
// 本类由系统自动生成，仅供测试用途
class SafeAction extends MCommonAction {

    public function index(){
		$this->display();
    }

    public function email(){
    	$ids = M('members_status')->getFieldByUid($this->uid,'email_status');

    	if($ids==1){
		$sq = M('member_safequestion')->find($this->uid);
		$email = M('members')->field('user_email,user_name')->where("id={$this->uid}")->find();
		$this->assign("sq",$sq);
		$this->assign("email",$email);
		$data['html'] = $this->fetch();
		}
		//submit: function (v, h, f) {window.location.href="'.__APP__.'/member/verify#fragment-1";return true; };
		else{
			$data['html'] = '<script type="text/javascript">$.jBox.alert("您还没有进行邮箱验证，请先进行邮箱验证","温馨提示", {closed: function () {window.location.href="'.__APP__.'/member/verify#fragment-1";return true;} });
			</script>';
		}
		exit(json_encode($data));
    }

    public function idcard(){
		$ids = M('members_status')->getFieldByUid($this->uid,'id_status');
		if($ids==1){
			$vo = M("member_info")->field('idcard,real_name')->find($this->uid);
			$this->assign("vo",$vo);
			$data['html'] = $this->fetch();
		}
		else{
			$data['html'] = '<script type="text/javascript">$.jBox.alert("您还没有进行身份验证，请先进行身份验证","温馨提示", {closed: function () {window.location.href="'.__APP__.'/member/verify#fragment-3";return true;} });
			</script>';
		}
		exit(json_encode($data));
    }

    public function safequestion(){
		$sqs = M('members_status')->getFieldByUid($this->uid,'safequestion_status');
		if($sqs==0){
			$data['html'] = '<script type="text/javascript">$.jBox.alert("您还没有设置安全问题，请先设置安全问题","温馨提示", {closed: function () {window.location.href="'.__APP__.'/member/verify#fragment-7";return true;} });
			</script>';
		}else{
			$sq = M('member_safequestion')->find($this->uid);
			$this->assign("sq",$sq);
			$this->assign("userphone",M('members')->getFieldById($this->uid,'user_phone'));
			$data['html'] = $this->fetch();
		}
		exit(json_encode($data));
    }
	public function changesafe(){
		$map['answer1'] = text($_POST['a1']);
		$map['answer2']  = text($_POST['a2']);
		$map['uid']  = $this->uid;
		$c = M('member_safequestion')->where($map)->count('uid');
		if($c==0) ajaxmsg('',0);
		else{
			session('temp_safequestion',1);
			ajaxmsg();
		}
	}
	public function changesafeact(){
		$is_can = session('temp_safequestion');
		if($is_can==1){
			$data['uid'] = $this->uid;
			$data['question1'] = text($_POST['q1']);
			$data['question2'] = text($_POST['q2']);
			$data['answer1'] = text($_POST['a1']);
			$data['answer2'] = text($_POST['a2']);
			$newid = M('member_safequestion')->save($data);
			if($newid){
				session('temp_safequestion',NULL);
				ajaxmsg();
			}
			else ajaxmsg('',0);
		}else{
			ajaxmsg('',0);
		}
	
	}

    public function cellphone(){
    	$ids = M('members_status')->getFieldByUid($this->uid,'phone_status');
		if($ids==1){
			$sq = M('member_safequestion')->find($this->uid);
			$phone = M('members')->getFieldById($this->uid,'user_phone');
			$this->assign("sq",$sq);
			$this->assign("phone",$phone);
			$data['html'] = $this->fetch();
		}
		else{
			$data['html'] = '<script type="text/javascript">$.jBox.alert("您还没有进行手机，请先进行手机验证","温馨提示", {closed: function () {window.location.href="'.__APP__.'/member/verify#fragment-2";return true;} });
			</script>';
		}
		exit(json_encode($data));
    }
	public function sendphonecode(){
		$r = Notice(3,$this->uid);
		if(C('SMS_TYPE') == "SIMU"){
    		ajaxmsg($r, -1);
			return;
		}
		if($r) ajaxmsg();
		else ajaxmsg('',0);
	}
	public function sendphonecodex(){
		$p = text($_POST['phone']);
		$c = M('members')->where("user_phone='{$p}'")->count('id');
		$needcheck = checkNeedCheck($p);
		if($needcheck){
			if($c>0) ajaxmsg('',2);
		}
		$r = Notice(4,$this->uid,array('phone'=>$p));
		if(C('SMS_TYPE') == "SIMU"){
    		ajaxmsg($r, -1);
			return;
		}
		if($r) ajaxmsg();
		else ajaxmsg('',0);
	}
	public function changephone(){
		$vcode = text($_POST['code']);
		$pcode = is_verify($this->uid,$vcode,4,10*60);
		if($pcode){
			session('temp_phone',1);
			ajaxmsg();
		}
		else ajaxmsg('',0);
	}
	public function changephoneact(){
		$xs = session('temp_phone');
		$vcode = text($_POST['code']);
		$pcode = is_verify($this->uid,$vcode,5,10*60);
		if($pcode&&$xs==1){
			$newid = M('members')->where("id={$this->uid}")->setField('user_phone',text($_POST['phone']));
			session('temp_phone',NULL);
			if($newid) ajaxmsg();
			else  ajaxmsg('',0);
		}
		else ajaxmsg('',0);
	}

	public function sendemailtov(){
		$r = Notice(5,$this->uid);
		if($r) ajaxmsg();
		else ajaxmsg('',0);
	}

	
	public function sendemailforverify(){
		$status=Notice(10,$this->uid);
		if($status){ajaxmsg('',1);}
		else{ajaxmsg('',0);}
	}
	
	public function doemailchangephone(){
		$code = text($_POST['safecode']);
		$r = is_verify($this->uid,$code,6,10*60);
		if(!$r) ajaxmsg("",2);
		$map['answer1'] = text($_POST['qone']);
		$map['answer2']  = text($_POST['qtwo']);
		$map['uid']  = $this->uid;
		$c = M('member_safequestion')->where($map)->count('uid');
		if($c==0) ajaxmsg('',0);
		session('temp_phone',1);
		ajaxmsg();
	}
	
	
	public function sendverify(){
		$r = Notice(2,$this->uid);
		if($r) echo(1);
		else echo(0);
	}
	
	public function verifyep(){
		$pcode = is_verify($this->uid,text($_POST['pcode']),3,10*60);
		$ecode = is_verify($this->uid,text($_POST['ecode']),3,10*60);

		if($pcode && $ecode){
			session('temp_safequestion',1);
			ajaxmsg();
		}else{
			ajaxmsg('',0);
		}
	}
	//接收手机验证码方法
	public function getSmsCode(){
    	$smsTxt = FS("Webconfig/smstxt");
    	$smsTxt=de_xie($smsTxt);
    	$admin_name = text($_POST['admin_name']);
		$data['user_name'] = $admin_name;
		$data['is_ban'] = array('neq','1');
		$admin = M('members')->field('id,user_phone,user_name')->where($data)->find();
		if(is_array($admin) && count($admin)>0 ){
			$phone = $admin["user_phone"];
			if($phone == ""){
				ajaxmsg('该用户未设置手机号', 2);
				return;
			}
			$mbTest = "^(13|14|15|18|17)[0-9]{9}$";
			if(!ereg($mbTest, $phone)){
				ajaxmsg('该用户手机号格式不正确', 3);
				return;
			}
    	
			session("temp_adminid",$admin["id"]);
	    	$code = rand_string($admin["id"],6,1,10);
	    	$content = str_replace(array("#UserName#","#CODE#"),array($admin["user_error()`_name"],$code),$smsTxt['verify_phone']);
	    	
	    	//判断是否为模拟短信
	    	if(C('SMS_TYPE') == "SIMU"){
	    		ajaxmsg($code, -1);
	    		return;
	    	}else{
	    		$res = sendsms($phone,$content);
	    	}
	    	if($res){
	    		ajaxmsg();
	    	}
	    	else ajaxmsg("短信发送失败",0);
		}else{
			ajaxmsg('该用户不存在', 0);
		}
    }
	public function getBindSmsCode(){
    	$smsTxt = FS("Webconfig/smstxt");
    	$smsTxt=de_xie($smsTxt);
    	$bind_name = text($_POST['bind_name']);
    	$bind_pass = text($_POST['bind_pass']);
    	$pin_pass = text($_POST['pin_pass']);
		$data['user_name'] = $bind_name;
		$data['is_ban'] = array('neq','1');
		$bind_member = M('members')->field('id,user_phone,user_name,user_pass')->where($data)->find();
		if(is_array($bind_member) && count($bind_member)>0 ){
			if($bind_member["id"] == $this->uid){
				ajaxmsg('您不能绑定您自己！！', 2);
			}
			
			$cur_member = M("members")->field("bind_uid")->getById($this->uid);
			if($bind_member["id"] == $cur_member["bind_uid"]){
				ajaxmsg('您已经绑定过该账户了！', 2);
			}
			
			if($bind_member["user_pass"] != md5($bind_pass)){
				ajaxmsg('绑定用户名或者密码错误！', 2);
			}
			
			$curMem = M('members')->field('pin_pass')->getById($this->uid);
			if(md5($pin_pass) != $curMem["pin_pass"]){
				ajaxmsg('当前账号支付密码错误！', 2);
			}
			
			$phone = $bind_member["user_phone"];
			if($phone == ""){
				ajaxmsg('该用户未设置手机号', 2);
			}
			$mbTest = "^(13|14|15|18|17)[0-9]{9}$";
			if(!ereg($mbTest, $phone)){
				ajaxmsg('该用户手机号格式不正确', 3);
			}
    	
			session("temp_bindid",$bind_member["id"]);
			session("temp_bindusername",$bind_member["user_name"]);
	    	$code = rand_string($this->uid,6,1,8);
	    	$content = str_replace(array("#UserName#","#CODE#"),array($bind_member["user_error()`_name"],$code),$smsTxt['verify_phone']);
	    	
	    	//判断是否为模拟短信
	    	if(C('SMS_TYPE') == "SIMU"){
	    		ajaxmsg($code, -1);
	    	}else{
	    		$res = sendsms($phone,$content);
	    	}
	    	if($res){
	    		ajaxmsg();
	    	}
	    	else ajaxmsg("短信发送失败",0);
		}else{
			ajaxmsg('绑定用户名或者密码错误！！', 0);
		}
    }

	public function checkanswer(){

		// $vfa = text($_POST['firstanswer']);
		// $vsa = text($_POST['secondanswer']);
		$vmc = text($_POST['mobilecode']);
		$vmail = text($_POST['email']);
	

		$vq = M('members')->where("id={$this->uid}")->field('id,user_phone')->find();
		$vn = M('members')->where("user_email='{$vmail}'")->count();

		if($vn!=0){
			ajaxmsg('您输入的邮箱已被使用',3);
		}

		if(is_verify($this->uid,$vmc,10,10*60) ){
				 if($vmail!=null){
				 	M('members_status')->where("uid={$this->uid}")->setField('email_status',0);
				 	$vxmail =M('members')->where("id={$this->uid}")->setField('user_email',$vmail);
				 	//$status=Notice(8,$this->uid);
				 	ajaxmsg('',1);
				 	
				 }else{
				 	ajaxmsg('您输入的邮箱为空',0);
				 }
		}else{
			ajaxmsg('您输入的手机验证码不正确',0);
		}

		
		
	}

	public function checkemailreg(){
		$vmail = text($_POST['email']);
		$vcode = text($_POST['emailcode']);
		$vfa = text($_POST['firstanswer']);
		$vsa = text($_POST['secondanswer']);

		$sq = M('member_safequestion')->find($this->uid);
		$vn = M('members')->where("user_email='{$vmail}'")->count();
	

		if($vn!=0){
			ajaxmsg('您输入的邮箱已被使用',3);
		}
	
		$r = is_verify($this->uid,$vcode,6,10*60);
		if($vfa==$sq['answer1'] && $vsa==$sq['answer2']){
		if(!$r){
			ajaxmsg("邮箱验证码错误",2);
		}else{
			M('members_status')->where("uid={$this->uid}")->setField('email_status',0);
			$vmail =M('members')->where("id={$this->uid}")->setField('user_email',$vmail);
			//$status=Notice(8,$this->uid);
		 	ajaxmsg('',1);
		}
	    }else{
		    ajaxmsg("您输入的安全答案错误",0);
		}
	}

	public function sendEmaila(){
		$status=Notice(8,$this->uid);
	}
	
	public function bind(){
		$pre = C('DB_PREFIX');
		$cur_mem = M("members")->alias("m")->join("left join {$pre}members_status ms on m.id=ms.uid")->join("left join {$pre}members mb on m.bind_uid=mb.id")->
			field("m.bind_uid, ms.phone_status,mb.user_name bind_username,m.pin_pass")->where(array("m.id"=>$this->uid))->find();
		if(empty($cur_mem['pin_pass'])){
			$data['html'] = '<script type="text/javascript">$.jBox.alert("请先设置支付密码","温馨提示", {closed: function () {window.location.href="'.__APP__.'/member/user#fragment-3";} });
			</script>';
			exit(json_encode($data));
		}
		$this->assign("cur_mem", $cur_mem);
		$data['html'] = $this->fetch();
		exit(json_encode($data));
	}
	
	public function doBind(){
		$bindCode = text($_POST['bindCode']);
    	$bind_name = text($_POST['bind_name']);
    	$bindid = session("temp_bindid");
    	if(empty($bindid)){
			ajaxmsg('请先发送短信验证码！', 0);
    	}
    	$bindid = intval($bindid);
    	if(session("temp_bindusername") != $bind_name){
			ajaxmsg('您已经修改绑定账号，请重新发送短信校验码！', 0);
    	}
		if(is_verify($this->uid,$bindCode,8,10*60)){
			LOG::write("bindid:".$bindid.",uid:".$this->uid, Log::DEBUG);
			M("members")->where(array("id"=>$this->uid))->save(array("bind_uid" => $bindid));
			session("temp_bindid", null);
			session("temp_bindusername", null);
			ajaxmsg('绑定成功！');
		}else{
			ajaxmsg('短信校验码不正确！！', 0);
		}
	}
	public function undophone(){
		$ids = M('members_status')->getFieldByUid($this->uid,'phone_status');
		$eqs = M('members_status')->field('safequestion_status,email_status')->find($this->uid);
		$this->assign('eqs',$eqs);
		if($ids==1){
			$sq = M('member_safequestion')->find($this->uid);
			$phone = M('members')->getFieldById($this->uid,'user_phone');
			$email = M('members')->field('user_email,user_name')->where("id={$this->uid}")->find();
			$this->assign("email",$email);
			$this->assign("sq",$sq);
			$this->assign("phone",$phone);
			$data['html'] = $this->fetch();
		}
		else{
			$data['html'] = '<script type="text/javascript">$.jBox.alert("您还没有进行手机，请先进行手机验证","温馨提示", {closed: function () {window.location.href="'.__APP__.'/member/verify#fragment-2";return true;} });
			</script>';
		}
		exit(json_encode($data));
	}

	public function checkCancelMethod(){
		$cancelcode = text($_POST['phonecode']);
    	$answerone = text($_POST['answerone']);
    	$answertwo = text($_POST['answertwo']);
    	$idnum =$this->uid;    	

    	$sq = M('member_safequestion')->find($this->uid);

    	if(is_verify($this->uid,$cancelcode,10,10*60) ){
		 	if($answerone ==$sq['answer1'] && $answertwo ==$sq['answer2']){
		 		M('members')->where("id='{$idnum}'")->setField('user_phone',null);
		 		M('members_status')->where("uid='{$idnum}'")->setField('phone_status',0);
		    	ajaxmsg('安全问题正确',1);
		    }else{
		    	ajaxmsg('安全问题不正确',2);
		    }
		}else{
    		ajaxmsg('手机验证码不正确',3);
    	}
	}
	public function checkUndoMethod(){
		$phcode = text($_POST['phcode']);
		$emcode = text($_POST['emcode']);
		$idnum = $this->uid;

		if(is_verify($this->uid,$phcode,10,10*60) ){
			if(is_verify($this->uid,$emcode,6,10*60)){
				M('members')->where("id='{$idnum}'")->setField('user_phone',null);
		 		M('members_status')->where("uid='{$idnum}'")->setField('phone_status',0);
				ajaxmsg('手机取消绑定成功',1);
			}else{
				ajaxmsg('邮箱验证码错误',2);
			}
		}else{
    		ajaxmsg('手机验证码不正确',3);
    	}
	}

}