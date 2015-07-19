<?php
// 全局设置
class RechargecountAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		if(!empty($_REQUEST['uname'])){
			$uid = M("members")->getFieldByUserName(text(urldecode($_REQUEST['uname'])),'id');
			$map['t.uid'] = $uid;
			$search['uname'] = text(urldecode($_REQUEST['uname']));
		}
		if(!empty($_REQUEST['uid'])){
			$map['t.uid'] = intval($_REQUEST['uid']);
			$search['uid'] = $map['t.uid'];
		}
		if(!empty($_REQUEST['start_time'])&&!empty($_REQUEST['end_time'])){
			$start_time = strtotime($_REQUEST['start_time']." 00:00:00");
			$end_time = strtotime($_REQUEST['end_time']." 23:59:59");
			$map['t.add_time'] = array("between","{$start_time},{$end_time}");
			$search['start_time'] = $_REQUEST['start_time'];
			$search['end_time'] = $_REQUEST['end_time'];
			$xtime['start_time'] = $_REQUEST['start_time'];
			$xtime['end_time'] = $_REQUEST['end_time'];
		}
		if(!empty($_REQUEST['_reg_start_time'])&&!empty($_REQUEST['_reg_end_time'])){
			$reg_start_time = strtotime($_REQUEST['_reg_start_time']."00:00:00");
			$reg_end_time = strtotime($_REQUEST['_reg_end_time']."23:59:59");
			$map['m.reg_time'] = array("between","{$reg_start_time},{$reg_end_time}");
		//	$map['uid'] = M("members")->where("reg_time>{$reg_start_time} and reg_time<{$reg_end_time}")->field('id')->select();
			$search['_reg_start_time'] = $_REQUEST['_reg_start_time'];
			$search['_reg_end_time'] = $_REQUEST['_reg_end_time'];
			$xtime['_reg_start_time'] = $_REQUEST['_reg_start_time'];
			$xtime['_reg_end_time'] = $_REQUEST['_reg_end_time'];
		}

		$map['t.status']= 1;
		$this->assign('search',$search);
	 	$listType = C('PAYLOG_TYPE');
		$listType[-1]="不限制";
		$this->assign('type_list',$listType);
		$field= 't.id,t.uid,t.status,t.money,t.add_time,t.tran_id,t.way,t.off_bank,t.off_way,t.deal_user,m.id,m.reg_time';
		$newmodel = D('Paylog')->alias('t')->join("{$this->pre}members m on t.uid=m.id");
		//_list(D('Paylog')->alias('t')->join("{$this->pre}members m on t.uid=m.id")
		$this->_list($newmodel,$field,$map,'t.id','DESC',$xtime,$newmodel->getOptions());
		$statnum = M('member_payonline')->alias('t')->join("{$this->pre}members m on m.id = t.uid ")->where($map)->count();
		$statsum = M('member_payonline')->alias('t')->join("{$this->pre}members m on m.id = t.uid ")->where($map)->sum("t.money");
		$this->assign('datastat',$statnum);
		$this->assign('datasum',$statsum);
	
        $this->display();
    }	
	
    public function _listFilter($list){
	 	$listType = C('PAYLOG_TYPE');
	 	$payType = C('PAY_TYPE');
		$this->assign("payType",$payType);
		$row=array();
		foreach($list as $key=>$v){
			$v['status_num'] = $v['status'];
			$v['status'] = $listType[$v['status']];
			$v['uname'] = M("members")->getFieldById($v['uid'],'user_name');
			$v['way'] = $payType[$v['way']];
			$row[$key]=$v;
		}
		return $row;
	}
	
}
?>