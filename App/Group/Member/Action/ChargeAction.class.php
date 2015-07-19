<?php
// 本类由系统自动生成，仅供测试用途
class ChargeAction extends MCommonAction {

    public function index(){
		$this->display();
    }

    public function allcharge(){
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function charge(){
    	$lastPayLog = M('member_payonline')->field("way,bank,use_account")->where(array('uid'=>$this->uid))->order('id DESC')->find();
    	$pay_way = "";
    	$pay_bank = "";
    	if($lastPayLog){
    		$pay_way = $lastPayLog["way"];
    		$pay_bank = $lastPayLog["bank"];
    		$use_account = $lastPayLog["use_account"];
    	}
    	$this->assign("pay_way", $pay_way);
    	$this->assign("pay_bank", $pay_bank);
    	$this->assign("use_account", $use_account);
    	$payConfig = FS("Webconfig/payconfig");
		$this->assign("payConfig",$payConfig);
		if($payConfig['guofubao']['enable'] == 1){
			$this->assign("gfbbanks", C('GFB_BANKS'));
		}
		if($payConfig['allinpay']['enable'] == 1){
			$this->assign("allinpaybanks", C('ALLINPAY_BANKS'));
		}
		if($payConfig['tenpay']['enable'] == 1){
			$this->assign("tenpaybanks", C('TENPAY_BANKS'));
		}
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function chargeoff(){
		$this->assign("vo",M('article_category')->where("type_name='线下充值'")->find());
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function chargelog(){
		$map['uid'] = $this->uid;
		
		if($_GET['start_time']&&$_GET['end_time']){
			$_GET['start_time'] = strtotime($_GET['start_time']." 00:00:00");
			$_GET['end_time'] = strtotime($_GET['end_time']." 23:59:59");
			
			if($_GET['start_time']<$_GET['end_time']){
				$map['add_time']=array("between","{$_GET['start_time']},{$_GET['end_time']}");
				$search['start_time'] = $_GET['start_time'];
				$search['end_time'] = $_GET['end_time'];
			}
		}
		$list = getChargeLog($map,10);
		$this->assign('search',$search);
		$this->assign("list",$list['list']);
		$this->assign("pagebar",$list['page']);
		$this->assign("success_money",$list['success_money']);
		$this->assign("fail_money",$list['fail_money']);
		
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function getIpsBanks(){
    	$cacheName = "ipsbanklist";
    	if(!S($cacheName)){
	    	$wsdl = "http://webservice.ips.com.cn/web/Service.asmx?wsdl";
	    	$client = new SoapClient($wsdl);
	    	$payConfig = FS("Webconfig/payconfig");
	    	$MerCode = $payConfig['ips']['MerCode'];
	    	$SignMD5 = md5($MerCode.$payConfig['ips']['MerKey']);
	    	$param = array('MerCode'=>$MerCode,'SignMD5'=>$SignMD5);
	    	$ret = $client->GetBankList($param);
	    	$ipsErrArr = C('IPS_ERR_ARR');
	    	if (array_key_exists($ret->GetBankListResult, $ipsErrArr)){
	    		ajaxmsg($ipsErrArr[$ret->GetBankListResult], 0);
	    	}else{
	    		$bankList = explode('#', urldecode($ret->GetBankListResult));
	    		$list = array();
	    		$bankimgs = C('IPS_BANK_IMG');
	    		$count = 0;
	    		foreach($bankList as $bankLine){
	    			$bankArr = explode('|', $bankLine);
	    			if(count($bankArr) == 3){
		    			$list[$count]['bank_name'] = $bankArr[0];
		    			$list[$count]['bank_alias'] = $bankArr[1];
		    			$list[$count]['bank_code'] = $bankArr[2];
		    			$list[$count]['bank_img'] = $bankimgs[$bankArr[2]];
		    			$count++;
	    			}
	    		}
	    		$list = array_sort($list,'bank_code');
				S($cacheName,$list,3600*1000);
	    		$this->assign('list', $list);
	    		$data['html'] = $this->fetch('ipsbanks');
	    		ajaxmsg($data);
	    	}
    	}else{
    		$this->assign('list', S($cacheName));
    		$data['html'] = $this->fetch('ipsbanks');
    		ajaxmsg($data);
    	}
    }
}