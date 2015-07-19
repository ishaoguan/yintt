<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends MCommonAction {
	var $is_third_first = false;

    public function index(){
		$this->display();
    }

    public function header(){
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function password(){
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function pinpass(){
    	$this->setIsThirdFirst();
		$this->assign("is_third_first",$this->is_third_first);
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }
    
    private function setIsThirdFirst(){
		//判断是否是第三方登录用户
		$count = M('oauth')->where("is_bind=1 and bind_uid = {$this->uid}")->count('id');
		$c = M('members')->where("id={$this->uid}")->find();
		if(empty($c['pin_pass']) && $count > 0){
			$this->is_third_first = true;
		}
    }

    public function changepass(){
		$old = md5($_POST['oldpwd']);
		$newpwd1 = md5($_POST['newpwd1']);
		$c = M('members')->where("id={$this->uid} AND user_pass = '{$old}'")->count('id');
		if($c==0) ajaxmsg('',2);
		$newid = M('members')->where("id={$this->uid}")->setField('user_pass',$newpwd1);
		if($newid){
			MTip('chk1',$this->uid);
			ajaxmsg();
		}
		else ajaxmsg('',0);
    }

    public function changepin(){
		$old = md5($_POST['oldpwd']);
		$newpwd1 = md5($_POST['newpwd1']);
		$c = M('members')->where("id={$this->uid}")->find();
		if(empty($c['pin_pass'])){
    		$this->setIsThirdFirst();
			if($c['user_pass'] == $old || $this->is_third_first){
				$newid = M('members')->where("id={$this->uid}")->setField('pin_pass',$newpwd1);
				if($newid){
					$msg = array("jumpUrl"=>__ROOT__.__GROUP__);
					ajaxmsg($msg, 1);
				}
				else ajaxmsg("设置失败，请重试",0);
			}else{
				ajaxmsg("原支付密码(即登陆密码)错误，请重试",0);
			}
		}else{
			if($c['pin_pass'] == $old){
				$newid = M('members')->where("id={$this->uid}")->setField('pin_pass',$newpwd1);
				if($newid){
					$msg = array("jumpUrl"=>__ROOT__.__GROUP__);
					ajaxmsg($msg, 1);
				}
				else ajaxmsg("设置失败，请重试",0);
			}else{
				ajaxmsg("原支付密码错误，请重试",0);
			}
		}
    }

    public function msgset(){
    	$this->assign("ms", M("members_status")->find($this->uid));
		$this->assign("vo",M('sys_tip')->find($this->uid));
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }
	
	public function savetip(){
		$oldtip = M('sys_tip')->where("uid={$this->uid}")->count('uid');
		$data['tipset'] = text($_POST['Params']);
		$data['uid'] = $this->uid;
		if($oldtip) $newid = M('sys_tip')->save($data);
		else $newid = M('sys_tip')->add($data);
		if($newid) echo 1;
		else echo 0;
	}

	public function third(){
		$oauth = M('oauth')->where(array("bind_uid"=>$this->uid,'is_bind'=>1))->find();
		$this->assign("oauth", $oauth);
		$data['html'] = $this->fetch();
		exit(json_encode($data));
	}
	public function updatethird(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		$loginenable = $_POST['loginenable'];
		if(!empty($username) || !empty($password) || !empty($password1)){
			if(empty($username)){
				ajaxmsg("用户名不能为空",0);
			}
			if(empty($password)){
				ajaxmsg("密码不能为空",0);
			}
			if(empty($password1)){
				ajaxmsg("再次输入密码不能为空",0);
			}
			if($password != $password1){
				ajaxmsg("两次密码不一致",0);
			}
			if(strlen($username) < 2){
				ajaxmsg("用户名长度 不能低于2位",0);
			}
			if(strlen($password) < 6){
				ajaxmsg("密码长度 不能低于6位",0);
			}
			$count = M('members')->where(array('user_name'=>$username))->count(1);
			if($count>0) ajaxmsg("注册失败，用户名已经有人使用",0);

			$oauth = M('oauth')->where(array("bind_uid"=>$this->uid,'is_bind'=>1))->find();
			if($oauth["account_flag"] == 1){
				ajaxmsg("您已修改过账号密码，无法再次修改",0);
			}
			
			M('members')->where("id={$this->uid}")->save(array("user_name"=>$username, "user_pass"=>md5($password)));
			M('oauth')->where(array("bind_uid"=>$this->uid,'is_bind'=>1))->save(array("login_enable"=>$loginenable, "account_flag"=>1));
			$data["needlogout"] = 1;
			ajaxmsg($data);
		}else{
			M('oauth')->where(array("bind_uid"=>$this->uid,'is_bind'=>1))->save(array("login_enable"=>$loginenable));
			ajaxmsg();
		}
	}
	
	public function getpinpass(){
		$email_status = M('members_status')->where(array("uid"=>$this->uid))->getField("email_status");
		if($email_status != 1){
			$data["jumpUrl"]=__APP__."/member/verify?id=1#fragment-1";
			ajaxmsg($data,2);
			return;
		}
		$res = Notice(9, $this->uid);
		if($res) ajaxmsg();
		else ajaxmsg('',0);
	}
	
	public function getpinpasswordverify(){
		$code = text($_GET['vcode']);
		$uk = is_verify(0,$code,9,60*1000);
		if(false===$uk){
			$this->assign('jumpUrl', __APP__."/member/user#fragment-3");
			$this->error("重置支付密码验证失败");
		}else{
			$this->display('getpinpass');
		}
	}

    public function changenewpin(){
		$newpwd1 = md5($_POST['newpwd1']);
		$c = M('members')->where("id={$this->uid}")->find();
		$newid = M('members')->where("id={$this->uid}")->setField('pin_pass',$newpwd1);
		if($newid){
			$msg = array("jumpUrl"=>__ROOT__.__GROUP__);
			ajaxmsg($msg, 1);
		}
		else ajaxmsg("设置失败，请重试",0);
    }
}