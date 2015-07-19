<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends MCommonAction {
    public function index(){
		$ucLoing = de_xie($_COOKIE['LoginCookie']);
		setcookie('LoginCookie','',time()-10*60,"/");
		$this->assign("uclogin",$ucLoing);
		
		$this->assign("unread",$read=M("inner_msg")->where("uid={$this->uid} AND status=0")->count('id'));
		$vipIdenty=M("vip_apply");

		$this->assign("MinfoDone",getMemberInfoDone($this->uid));
		
		$mstatus = M('members_status')->field(true)->find($this->uid);		
		$memberinfo = M('members')->find($this->uid);		
		$rate = 0;		
		if($mstatus["id_status"] == 1 ){
			++$rate;
		}
		if($mstatus["phone_status"] == 1 ){
			++$rate;
		}
		if($mstatus["email_status"] == 1 ){
			++$rate;
		}
		if($mstatus["video_status"] == 1 ){
			++$rate;
		}
		if($mstatus["face_status"] == 1 ){
			++$rate;
		}
		if($memberinfo["user_leve"] == 1 ){
			++$rate;
		}				
		$this->assign("rate", $rate);
		
		$this->assign("mstatus", M('members_status')->field(true)->find($this->uid));
		$this->assign("capitalinfo", getMemberBorrowScan($this->uid));
		$this->assign("memberinfo", M('members')->find($this->uid));
		$this->assign("memberdetail", M('member_info')->find($this->uid));
		$_SX = M('investor_detail')->field('deadline,interest,capital')->where("investor_uid = {$this->uid} AND status=7")->order("deadline ASC")->find();
		$toubiaojl =M('borrow_investor')->where("investor_uid={$this->uid}")->sum('reward_money');//投标奖励
		$this->assign("toubiaojl", $toubiaojl);//投标奖励
		
		$tuiguangjl =M('member_moneylog')->where("uid={$this->uid} and type=13")->sum('affect_money');//推广奖励
		$this->assign("tuiguangjl",$tuiguangjl);	//推广奖励
		
		$lastInvest['gettime'] = $_SX['deadline'];
		$lastInvest['interest'] = $_SX['interest'];
		$lastInvest['capital'] = $_SX['capital'];
		$this->assign("lastInvest",$lastInvest);
		
		$_SX="";
		$_SX = M('investor_detail')->field('deadline,sum(interest) as interest,sum(capital) as capital')->where("borrow_uid = {$this->uid} AND status=7")->group("borrow_id,sort_order")->order("deadline ASC")->find();
		$lastBorrow['gettime'] = $_SX['deadline'];
		$lastBorrow['interest'] = $_SX['interest'];
		$lastBorrow['capital'] = $_SX['capital'];
		$this->assign("lastBorrow",$lastBorrow);
		
		
		$this->assign("kflist",get_admin_name());
		$list=array();
		$pre = C('DB_PREFIX');
		$rule = M('ausers u')->field('u.id,u.qq,u.phone')->join("{$pre}members m ON m.customer_id=u.id")->where("u.is_kf =1 and m.customer_id={$minfo['customer_id']}")->select();
		foreach($rule as $key=>$v){
			$list[$key]['qq']=$v['qq'];
			$list[$key]['phone']=$v['phone'];
		}
		$this->assign("kfs",$list);
		
		//获取推荐姓名
		$recommend_name = "";
		if(!empty($minfo["recommend_id"]) && $minfo["recommend_id"] > 0){
			$recommend_user = D("members")->where(array('id'=>$minfo["recommend_id"]))->find();
			if(!empty($recommend_user)){
				$recommend_name = $recommend_user['user_name'];
			}
		}
		$this->assign("recommend_name",$recommend_name);
		
		//上次登录时间
		$this->assign("login_info", M("member_login")->where("uid={$this->uid}")->order("id desc")->find());
		$this->display();
    }
}