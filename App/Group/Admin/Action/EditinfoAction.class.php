<?php

class EditinfoAction extends ACommonAction {
	public function index(){
		$this ->display();
	}

	public function edit(){

		$adminid = $this->admin_id;
		$admininfo = M('ausers')->where("id='{$adminid}'")->field('user_pass')->find();
		$sqlpassword = $admininfo['user_pass'];

		$oldpassword = $_POST['oldpass'];
		$newpassword = $_POST['newpass'];
		$repassword = $_POST['renewpass'];

		if(md5($oldpassword)!=$sqlpassword){
			$this->error("您输入的密码不正确！");
		}
		if($newpassword != $repassword){
			$this->error("您输入的两次密码不一致");
		}
		if($newpassword == $oldpassword){
			$this->error("您输入的密码与之前一致");
		}

		$data['user_pass'] = md5($newpassword);
		M('ausers')->where("id='{$adminid}'")->save($data);
		$this->success("恭喜您修改成功");

	}
}

?>