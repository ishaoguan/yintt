<?php
// 本类由系统自动生成，仅供测试用途
class ToolAction extends HCommonAction {
	//圈子首页
    public function index(){
		if($_POST){
			$money = floatval($_POST['money']);
			$rate = floatval($_POST['interest_rate']);
			$month = intval($_POST['month']);
			
			$total = ($rate/12 * $month * $money)/100 + $money;
			$fee = getFloatValue( $total/$month,4);
			
			$monthData['money'] = $money;
			$monthData['year_apr'] = $rate;
			$monthData['duration'] = $month;
			$repay_list = EqualMonth($monthData);
			$this->assign('repay_list',$repay_list);

			$monthData['type'] = "all";
			$repay_detail = EqualMonth($monthData);
			$this->assign('repay_detail',$repay_detail);
			$this->assign('m',$month);
			
			$data['html_1'] = $this->fetch('index_res_1');
			$data['html_2'] = $this->fetch('index_res_2');
			exit(json_encode($data));
		}

		$this->display();
	}
    public function tool2(){
		if($_POST){
			$money = floatval($_POST['money']);
			$rate = floatval($_POST['interest_rate']);
			$month = ($_POST['selDays']== -1)?intval($_POST['month']):intval($_POST['selDays']);
			$fee = getFloatValue( ($rate/12 * $month * $money)/100 + $money,4);
			$this->assign('m',$month);
			$this->assign('fee',$fee);
			$data['html'] = $this->fetch('tool2_res');
			exit(json_encode($data));
		}
		$this->display();
	}
    public function tool3(){
		if($_POST){
			$money = floatval($_POST['money']);
			$rate = floatval($_POST['interest_rate']);
			$month = ($_POST['selDays']== -1)?intval($_POST['month']):intval($_POST['selDays']);
			$fee = getFloatValue( ($rate/12 * $month * $money)/100 + $money,4);
			$this->assign('mmoney',$money);
			$this->assign('m',$month);
			$this->assign('fee',$fee);

			$parm['month_times'] = $month;
			$parm['account'] = $money;
			$parm['year_apr'] = $rate;
			$repay_detail = EqualSeason($parm);
			$parm['type'] = "all";
			$repay_summary = EqualSeason($parm);
			
			$this->assign('repay_detail',$repay_detail);
			$this->assign('repay_summary',$repay_summary);

			$data['html_1'] = $this->fetch('tool3_res_1');
			$data['html_2'] = $this->fetch('tool3_res_2');
			exit(json_encode($data));
		}
		$this->display();
	}
}