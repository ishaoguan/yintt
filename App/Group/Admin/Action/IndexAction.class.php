<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends ACommonAction {

	var $justlogin = true;
	
    public function index(){
		require(C('APP_ROOT')."Common/acl.inc.php");
		require(C('APP_ROOT')."Common/menu.inc.php");
		
       	$this->assign('menu_left',$menu_left);
		$this->display();
    }
	public function verify(){
		import("ORG.Util.Image");
		Image::buildImageVerify();
	}

    public function login()
    {
		require C("APP_ROOT")."Common/menu.inc.php";
		if( session("admin") > 0){
			$this->redirect('index');
			exit;
		}
		if($_POST){
// 			if($_SESSION['verify'] != md5($_POST['code'])){
// 				$this->error("验证码错误!");
// 			}
    		$admin_name = text($_POST['admin_name']);
			if(!session("temp_adminid")){
				$this->error('验证失败');
				return;
			}
			if(!is_verify(session("temp_adminid"),text($_POST['code']),13,10*60) ){
				$this->error('短信验证码不对，请重新输入！');
				return;
			}
			$data['user_name'] = $admin_name;
			$data['user_pass'] = md5($_POST['admin_pass']);
			$data['is_ban'] = array('neq','1');
			$admin = M('ausers')->field('id,user_name,u_group_id,real_name,is_kf,area_id')->where($data)->find();
			
			if(is_array($admin) && count($admin)>0 ){
				foreach($admin as $key=>$v){
					session("admin_{$key}",$v);
				}
				if(session("admin_area_id")==0) session("admin_area_id","-1");
				session('admin',$admin['id']);
				session('adminname',$admin['real_name']);
				$this->assign('jumpUrl', "__ROOT__/".SAFE_ADMIN."/index");
				$this->success('登陆成功，现在转向管理主页');
			}else{
				$this->error('用户名或密码错误，登陆失败');
			}
		}else{
			$this->display();
		}
    }


    public function logout()
    {
		require C("APP_ROOT")."Common/menu.inc.php";
		session(null);
		$this->assign('jumpUrl', "http://".$_SERVER['HTTP_HOST'].__ROOT__.'/'.SAFE_ADMIN);
		$this->success('注销成功，现在转向首页');
    }
	
    public function getSmsCode(){
    	$smsTxt = FS("Webconfig/smstxt");
    	$smsTxt=de_xie($smsTxt);
    	$admin_name = text($_POST['admin_name']);
		$data['user_name'] = $admin_name;
		$data['is_ban'] = array('neq','1');
		$admin = M('ausers')->field('id,phone,real_name,u_group_id')->where($data)->find();
		if(is_array($admin) && count($admin)>0 ){
			$phone = $admin["phone"];
			if($phone == ""){
				ajaxmsg('该用户未设置手机号，请联系系统管理员设置手机号', 2);
				return;
			}
			$mbTest = "^(13|14|15|18|17)[0-9]{9}$";
			if(!ereg($mbTest, $phone)){
				ajaxmsg('该用户手机号不正确，请联系系统管理员修改手机号', 3);
				return;
			}
    	
			session("temp_adminid",$admin["id"]);
	    	$code = rand_string($admin["id"],6,1,13);
	    	$content = str_replace(array("#UserName#","#CODE#"),array($admin["real_name"],$code),$smsTxt['verify_phone']);
	    	
	    	//根据用户分组判断是否需要发送短信
	    	$groupid = $admin["u_group_id"];
	    	$acl = M("acl")->where("group_id={$groupid}")->find();
	    	$needRealSms = true;
	    	$avoidChkGrp = C('AVOID_CHK_GRP');
	    	if(in_array($acl['groupname'], $avoidChkGrp))$needRealSms = false;
	    	
	    	//判断是否为模拟短信
	    	if(C('SMS_TYPE') == "SIMU" || !$needRealSms){
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
}