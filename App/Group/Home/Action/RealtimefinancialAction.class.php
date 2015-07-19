<?php
class RealtimefinancialAction extends HCommonAction {
	public function index(){
		//资金统计
		$map=array();
		$list = M("member_moneylog")->field('type,sum(affect_money) as money')->where($map)->group('type')->select();
		$row=array();
		$name = C('MONEY_LOG');
		foreach($list as $v){
			$row[$v['type']]['money']= ($v['money']>0)?$v['money']:$v['money']*(-1);
			$row[$v['type']]['name']= $name[$v['type']];
		}
		
		//最近30天资金统计
		$endDate = strtotime("30 days");
		$map30=array();
		$map30['status'] = array("in","7,3,4,5");
		$map30['repayment_time'] = 0;
		$map30['deadline'] = array("elt", $endDate);
		$statics30 = M("investor_detail")->where($map30)->sum('capital+interest');
		$this->assign('statics30',$statics30);
		
		//逾期总额
		$map1=array();
		$map1['status'] = array("in","3,5,7");
		$map1['repayment_time'] = 0;
		$map1['deadline'] = array("lt", time());
		$row['expired']['money'] = M('investor_detail')->where($map1)->sum('capital+interest');
		
		//逾期率
		$expiredrate = ($row['expired']['money']/($row['17']['money'] - $row['11']['money']))*100;
		$normalrate = 100 - $expiredrate;
		$this->assign('expiredratestr',sprintf("%.2f%%", $expiredrate));
		$this->assign('normalratestr',sprintf("%.2f%%", $normalrate));
		$this->assign('expiredrate',$expiredrate);
		$this->assign('normalrate',$normalrate);
		
		$this->assign('staticslist',$row);
		
		$totalDeals = M("borrow_info")->where("borrow_status >= 6")->count("1");
		$this->assign('totalDeals',$totalDeals);
		
		//近30天还款情况
		$nearlyStartTime = strtotime("-3 days");
		$nearlyStartDate = date('Y-m-d', $nearlyStartTime);
		$nearlyEndTime = strtotime("$nearlyStartDate 1 month -1 day");
		$nearlyEndDate = date('Y-m-d', $nearlyEndTime);
		$this->assign('nearlyStartDate',$nearlyStartDate);
		$this->assign('nearlyEndDate',$nearlyEndDate);

		$map = array();
		$map['d.status'] = array("neq", 0);
		$map['d.deadline'] = array("between", $nearlyStartTime.','.$nearlyEndTime);
		$nearlylist = getTenderList($map, 20, 10, 'd.deadline asc');
		$this->assign('nearlylist',$nearlylist["list"]);
		$this->assign("pagebar",$nearlylist['page']);
		
		$this->display();
	}
}