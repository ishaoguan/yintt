<?php
class PushmesssetAction extends MCommonAction{
	public function index(){
		$this->display();
	}
	
	public function newborrowremind(){
		$mstatus = M("members_status")->getByUid($this->uid);
		$sms_remind = 1;
		$email_remind = 1;
		if(!empty($mstatus)){
			$sms_remind = $mstatus["new_borrow_sms_remind"];
			$email_remind = $mstatus["new_borrow_email_remind"];
		}
		$this->assign("sms_remind",$sms_remind);
		$this->assign("email_remind",$email_remind);
		$data['html'] = $this->fetch();
		exit(json_encode($data));
	}
	
	public function setNewBorrowRemind(){
		$sms_remind = $_POST['sms_remind'];
		$email_remind = $_POST['email_remind'];
		$mstatus = M("members_status")->getByUid($this->uid);
		if(!empty($mstatus)){
			M("members_status")->where(array("uid"=>$this->uid))->save(array("new_borrow_sms_remind"=>$sms_remind,"new_borrow_email_remind"=>$email_remind));
		}else{
			M("members_status")->add(array("uid"=>$this->uid,"new_borrow_sms_remind"=>$sms_remind,"new_borrow_email_remind"=>$email_remind));
		}
		ajaxmsg();
	}
}