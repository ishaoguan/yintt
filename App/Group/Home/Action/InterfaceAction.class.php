<?php
class InterfaceAction extends Action{
	public function getAllBorrows(){
		$whiteList = array("112.124.65.29",
							"127.0.0.1",
							"116.204.68.178"
		);
		//ip地址限制访问
		$ip = get_client_ip();
		if(!in_array($ip, $whiteList)){
			echo "You can't visit this interface because your ip address is not allowed.";
			exit;
		}
		//ip地址限制访问结束

		$time = date('Y-m-d',time());
		$timedown = strtotime($time." 00:00:00");
		$timetop  = strtotime($time." 23:59:59");
				
		$map['first_verify_time']=array("between","{$timedown},{$timetop}"); //当天的标数据
		$map['borrow_status']	 =array("in","2,4,6,7");
		$list = M('borrow_info')->where($map)->select();
		$data = array();
		foreach ($list as $k => $v) {
			$data[$k]['PlatformName'] = "轩宇泰投资";    						//平台名称
			$data[$k]['WebSiteUrl'] = "http://www.yesvion.com";		//平台地址
			$data[$k]['LoanAmount'] = $v['borrow_money'];				//借款金额
			$data[$k]['RepaymentType'] = 1;
			// /*还款方式  1 ->按月还款（按月等额还本付息）
			// 			2 ->按季还款（按月支付利息，按季度偿还本金）
			// 			3 ->到期还本（按月支付利息，到期偿还全部本金）
			// 			4 ->到期一次性偿还本息*/
			$data[$k]['LoanType'] = 3;
			//	 1 ->秒标标
			//   2 ->净值表标
			//   3 ->抵押标
			//   4 ->信用标
			//   5 ->流转标
			//   6 ->推荐标
			//   7 ->忽略密码标
			$data[$k]['Deadline']=($v['repayment_type']==1)?$v['borrow_duration']:($v['borrow_duration']*30);	//借款期限
			$data[$k]['DeadlineType']=($v['repayment_type']==1)?'D':'M';	//M 代表月 D 代表天
			$data[$k]['InterestRate']=($v['repayment_type']==1)?'22.00':$v['borrow_interest_rate'];	//年利率，去百分号float
			$data[$k]['BonusRate']=($v['reward_type']==1)? $v['reward_num']:'0';	//投标奖励：按百分值，去百分号float
			$data[$k]['RebidAward']=0.00;									//续投奖励，去百分号的值float
			$data[$k]['LineReward']=0.00;									//线下奖励，去百分号的值float
			$data[$k]['NanagementFeeRate']=0.00;							//管理费，去百分号的值float
			$data[$k]['Schedule']=($v['has_borrow']/$v['borrow_money']*100);//标进度的百分值去百分号float
		}
		echo json_encode($data);
	}
}