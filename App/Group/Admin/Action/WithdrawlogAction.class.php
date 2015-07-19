<?php
// 全局设置
class WithdrawlogAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		if(!empty($_REQUEST['withdraw_status']) || $_REQUEST['withdraw_status'] == '0'){
			$map['t.withdraw_status'] = intval($_REQUEST['withdraw_status']);
			$search['withdraw_status'] = $map['t.withdraw_status'];
		}
		if(!empty($_REQUEST['uname'])){
			$uid = M("members")->getFieldByUserName(text($_REQUEST['uname']),'id');
			$map['t.uid'] = $uid;
			$search['uid'] = text($_REQUEST['uname']);
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
		if(empty($search['withdraw_status']) && $search['withdraw_status'] != '0'){
			$search['withdraw_status'] = -1;
		}
		$this->assign('search',$search);
		
	 	$listType = C('WITHDRAW_STATUS');
		$this->assign('type_list',$listType);
		$field= "t.*,m.user_name uname";
		$mymodel = D('Withdrawlog')->alias('t')->join("{$this->pre}members m on m.id=t.uid");
		$this->_list($mymodel,$field,$map,'t.id','DESC',$xtime, $mymodel->getOptions());
		$map["t.withdraw_status"] = 0;
		$this->assign("auditingmoney", M("member_withdraw")->alias('t')->where($map)->sum("withdraw_money"));
		$map["t.withdraw_status"] = 1;
		$this->assign("auditedmoney", M("member_withdraw")->alias('t')->where($map)->sum("withdraw_money"));
		$map["t.withdraw_status"] = 2;
		$this->assign("withdrawed", M("member_withdraw")->alias('t')->where($map)->sum("withdraw_money"));
		$map["t.withdraw_status"] = 3;
		$this->assign("unaudited", M("member_withdraw")->alias('t')->where($map)->sum("withdraw_money"));
        $this->display();
    }
	
	//编辑
    public function edit() {
        $model = D(ucfirst($this->getActionName()));
        $id = intval($_REQUEST['id']);
        $vo = $model->find($id);
		$vo['uname'] = M("members")->getFieldById($vo['uid'],'user_name');
	 	$listType = C('WITHDRAW_STATUS');
		$this->assign('type_list',$listType);
        $this->assign('vo', $vo);
        $this->display();
    }
	
	public function _doEditFilter($m){
		$m->deal_time=time();
		$m->deal_user=session('adminname');
		
		$vox = M("member_withdraw")->field(true)->find($m->id);
		if($vox['withdraw_status']<>3 && $m->withdraw_status==3){
			$lm = M('members')->getFieldById($vox['uid'],'account_money');
			addInnerMsg($uid,"您的提现申请审核未通过","您的提现申请审核未通过");
			memberMoneyLog($vox['uid'],12,$vox['withdraw_money'],"提现未通过,返还");
		}elseif($vox['withdraw_status']<>2 && $m->withdraw_status==2){
			$um = M('members')->field("user_name,user_phone")->find($vox['uid']);
			addInnerMsg($uid,"您的提现已完成","您的提现已完成");
			memberMoneyLog($vox['uid'],29,-($vox['withdraw_money']),"提现成功，减去冻结资金，到帐金额".($vox['withdraw_money']-intval($_POST['withdraw_fee'])));
			SMStip("withdraw",$um['user_phone'],array("#USERANEM#","#MONEY#"),array($um['user_name'],($vox['withdraw_money']-intval($_POST['withdraw_fee']))),null, array($vox['uid']));
		}elseif($vox['withdraw_status']<>1 && $m->withdraw_status==1){
			addInnerMsg($uid,"您的提现申请已通过","您的提现申请已通过，正在处理中");
		}
		
		return $m;
	}
	
	public function _listFilter($list){
	 	$listType = C('WITHDRAW_STATUS');
		$row=array();
		foreach($list as $key=>$v){
			$v['withdraw_status_num'] = $v['withdraw_status'];
			$v['withdraw_status'] = $listType[$v['withdraw_status']];
			//$v['uname'] = M("members")->getFieldById($v['uid'],'user_name');
			$row[$key]=$v;
		}
		return $row;
	}
	
}
?>