<?php
class WdzjAction extends Action{
	var $wdzjUid = -1;
	
	public function Login(){
		$chk_user = "wdzj";
		$chk_pass = "rjs_109203";//d4068d373bcc50fc83fd5bb6fe35ee7d
		
		$userName = text($_POST["userName"]);
		$password = text($_POST["password"]);
		if($userName == $chk_user && $password = md5($chk_pass)){
			$vcode = rand_string($this->wdzjUid,32,null,14);
			echo $vcode;
		}else{
			echo "User name or password is incorrect!";
		}
	}
	
	// *Title：标地标题
	// *Amount：借款金额
	// *Schedule：完成进度
	// *InterestRate：利率
	// *Deadline：借款期限，月/int型
	// *TuandaiRate：奖励利率
	// *Type：借款类型1:长期担保贷2:短期担保贷3:流转担保贷4:部分担保贷
	// *RepaymentType：还款方式：1:到期还本息 2.每月付息到期还本 3.每月等额本息
	// *Subscribes(List)	投资人情报对象数据或LIST		
	// *其他字段说明：	
	// *ProjectId(guid)： 项目主键
	// *TotalShares(int) ：总共多少份
	// *CastedShares(int)：已投多少份
	// *DeadLineUnit(string)：期限单位（月）
	// *Province(string)：省
	// *City(string)：城市
	// *UserName(string)：发标人
	// *UserAvatarUrl(string)：发标人头像
	// *AmountUsedDesc(string)：用途
	// *revenue(double):营收【也就是服务费】500.05
	// dev.yesvion.com/
	/**
	 * 获取当前正在进行投标中的标信息。
	 */
	public function GetNowProjects(){
		$this->doCheckToken();
		$map['borrow_status']	 =array("in","2");

		$list = M('borrow_info')->where($map)->select();
		$data = array();

		foreach ($list as $k => $v) {
			$data[$k]['Title'] = $v['borrow_name'];    						
			$data[$k]['Amount'] = $v['borrow_money'];				
			$data[$k]['Schedule'] =($v['has_borrow']/$v['borrow_money']);
			$data[$k]['InterestRate'] = 0.22;
			$data[$k]['Deadline']=($v['repayment_type']==1)?1:$v['borrow_duration'];	
			$data[$k]['TuandaiRate']=($v['reward_vouch_rate']/100);
			$data[$k]['Type']=2;
			$data[$k]['RepaymentType']=3;	

			$data[$k]['Subscribes']['ProjectId'] = ((int)$v['id']+C('ADD_NUMBER'));
			// $data[$k]['Subscribes']['TotalShares'];	
			// $data[$k]['Subscribes']['CastedShares'];	
			// $data[$k]['Subscribes']['DeadLineUnit'];	
			// $data[$k]['Subscribes']['Province'];	
			// $data[$k]['Subscribes']['City'];	
			// $data[$k]['Subscribes']['UserName'];	
			// $data[$k]['Subscribes']['UserAvatarUrl'];	
			$data[$k]['Subscribes']['revenue']=0;										
		}
		echo json_encode($data);
	}


	/**
	 *获取今天（00：0开始到当前（调动该接口时刻））已经成功的标信息。
	 */
	public function GetTodayProjects(){
		$this->doCheckToken();

		$time = date('Y-m-d',time());
		$timedown = strtotime($time." 00:00:00");
		$timetop  = strtotime($time." 23:59:59");

		$map['first_verify_time']=array("between","{$timedown},{$timetop}"); 
		$map['borrow_status']	 =array("in","4,6,7");

		$list = M('borrow_info')->where($map)->select();
		$data = array();

		foreach ($list as $k => $v) {
			$data[$k]['Title'] = $v['borrow_name'];    						
			$data[$k]['Amount'] = $v['borrow_money'];				
			$data[$k]['Schedule'] = 1;
			$data[$k]['InterestRate'] = 0.22;
			$data[$k]['Deadline']=($v['repayment_type']==1)?1:$v['borrow_duration'];	
			$data[$k]['TuandaiRate']=($v['reward_vouch_rate']/100);
			$data[$k]['Type']=2;
			$data[$k]['RepaymentType']=3;	

			$data[$k]['Subscribes']['ProjectId'] = ((int)$v['id']+C('ADD_NUMBER'));
			// $data[$k]['Subscribes']['TotalShares'];	
			// $data[$k]['Subscribes']['CastedShares'];	
			// $data[$k]['Subscribes']['DeadLineUnit'];	
			// $data[$k]['Subscribes']['Province'];	
			// $data[$k]['Subscribes']['City'];	
			// $data[$k]['Subscribes']['UserName'];	
			// $data[$k]['Subscribes']['UserAvatarUrl'];	
			$data[$k]['Subscribes']['revenue']=0;										
		}
		echo json_encode($data);

	}


	/**
	 *获取某时间段的标。
	 */
	public function GetProjectsByDate(){
		$this->doCheckToken();
		$time = text($_POST["date"]);
		$timedown = strtotime($time." 00:00:00");
		$timetop  = strtotime($time." 23:59:59");

		$map['first_verify_time']=array("between","{$timedown},{$timetop}"); 
		$map['borrow_status']	 =array("in","2,4,6,7");

		$list = M('borrow_info')->where($map)->select();
		$data = array();

		foreach ($list as $k => $v) {
			$data[$k]['Title'] = $v['borrow_name'];    						
			$data[$k]['Amount'] = $v['borrow_money'];				
			$data[$k]['Schedule'] =($v['has_borrow']/$v['borrow_money']);
			$data[$k]['InterestRate'] = 0.22;
			$data[$k]['Deadline']=($v['repayment_type']==1)?1:$v['borrow_duration'];	
			$data[$k]['TuandaiRate']=($v['reward_vouch_rate']/100);
			$data[$k]['Type']=2;
			$data[$k]['RepaymentType']=3;	

			$data[$k]['Subscribes']['ProjectId'] = ((int)$v['id']+C('ADD_NUMBER'));
			// $data[$k]['Subscribes']['TotalShares'];	
			// $data[$k]['Subscribes']['CastedShares'];	
			// $data[$k]['Subscribes']['DeadLineUnit'];	
			// $data[$k]['Subscribes']['Province'];	
			// $data[$k]['Subscribes']['City'];	
			// $data[$k]['Subscribes']['UserName'];	
			// $data[$k]['Subscribes']['UserAvatarUrl'];	
			$data[$k]['Subscribes']['revenue']=0;										

		}
		echo json_encode($data);
	}

	/**
	 *某天还款的标的信息
	 *要返回标的ID+status
	 *status:部分还款1 全部还款0 推迟还款2  垫付3
	 */
   public function GetPaiedLoanInfo(){	
		$this->doCheckToken();
		$this->pre = C('DB_PREFIX');
		$time = text($_POST["strDate"]);
		$timedown = strtotime($time." 00:00:00");
		$timetop  = strtotime($time." 23:59:59");

		$map['d.repayment_time'] = array("between","{$timedown},{$timetop}"); 
		$map['b.borrow_status']	 = array("in","6,7");

		$list = M('borrow_info')->alias('b')->join("{$this->pre}investor_detail d ON b.id=d.borrow_id")->field('distinct d.borrow_id')->where($map)->select();
		foreach ($list as $k => $v) {
			$data[$k]['id'] = ((int)$v['borrow_id']+C('ADD_NUMBER'));
			$data[$k]['status'] = 0;
		}
		return $data;		
	}


	// *
	//  *验证该用户是否是平台用户
	//  *	要返回：true[是平台用户]  false【不是】
	//  *  userName：用户名
	//  *	realName：真实姓名
	//  *	cardId：身份证号码
	 
	public function checkUserInfo(){
		$this->doCheckToken();
		$this->pre = C('DB_PREFIX');
		$userName = (text($_POST["userName"])=='')?'9Yd3dQx!c':'text($_POST["userName"]';
		$realName = (text($_POST["realName"])=='')?'9Yd3dQx!c':'text($_POST["realName"]';
		$cardId = (text($_POST["cardId"])=='')?'9Yd3dQx!c':'text($_POST["cardId"]';

		$user = M('members')->alias('m')->join("{$this->pre}member_info t on m.id=t.uid")
		->where("m.user_name='{$userName}' and t.real_name='{$realName}' and t.idcard='{$cardId}'")->count();

		if((int)$user>0) {return true;} else {return false;}
	}



	// 账户总额	totalamount	
	// 可用余额	leaveAmount	
	// 冻结总额	totalfreezing	
	// 借出总额	loanamount	
	// 待收总额	collectamount	
	// 已赚利息	earnedinterest	
	// 已赚奖励	earnedcredit	
	// 以下内容是LIST格式返回	
	// 充值时间	dateTime	203/07/29 12:30:30
	// 充值/提现	inout	0:充值；1：提现
	// 支付方式	paytype	
	// 充值金额	payamount	
	// 备注	comment	
	// 状态	status	0：充值成功；1：失败
	// 类型	type	0:线下充值;1:线上充值

	/**
	 *功能介绍：返回用户账户信息，充值履历，取现履历，账户余额等，具体见sheet【AcountInfo】
	 */
/*	public function getUserAcountInf(){
		$this->doCheckToken();
		$userName = text($_POST["userName"]);
		$map['m.user_name']=array('eq',$userName);
		$this->pre = C('DB_PREFIX');
		$userinfo = M('member_money')->alias('t')->join("{$this->pre}members m on m.id = t.uid")->where($map)->find();
		$userinvest = M('borrow_investor')->alias('b')->join("{$this->pre}members a on a.id = b.investor_uid")->where("a.user_name='{$userName}' and b.status>=4")->sum('investor_capital');
		$userincome = M('borrow_investor')->alias('b')->join("{$this->pre}members a on a.id = b.investor_uid")->where("a.user_name='{$userName}' and b.status>=4")->sum('investor_interest');

		$data =array();
		$data['totalamount'] = $userinfo['account_money']+$userinfo['money_freeze']+$userinfo['money_collect'];
		$data['leaveAmount'] = $userinfo['account_money'];
		$data['totalfreezing']= $userinfo['money_freeze'];
		$data['loanamount'] = $userinvest;
		$data['collectamount']= $userinfo['money_collect'];
		$data['earnedinterest']= $userincome;

		echo json_encode($data);
	}*/
	


	private function doCheckToken(){
		$token = text($_POST["token"]);
		if(!is_verify($this->wdzjUid,text($token),14,10*60)){
			echo "Token is incorrect!";
			exit;
		}
	}
}