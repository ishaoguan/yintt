<?php
// 全局设置
class PaylogAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
	
		if(!empty($_REQUEST['status']) && $_REQUEST['status']>-1){
			$map['status'] = intval($_REQUEST['status']);
			$search['status'] = $map['status'];
		}else{
			$search['status'] = -1;
		}
		if(!empty($_REQUEST['way'])){
			$map['way'] = text($_REQUEST['way']);
			$search['way'] = $map['way'];
		}
		if(!empty($_REQUEST['uname'])){
			$uid = M("members")->getFieldByUserName(text(urldecode($_REQUEST['uname'])),'id');
			$map['uid'] = $uid;
			$search['uname'] = text(urldecode($_REQUEST['uname']));
		}
		if(!empty($_REQUEST['dealuser'])){
			$map['deal_user'] = text(urldecode($_REQUEST['dealuser']));
			$search['dealuser'] = $map['deal_user'];
		}
		if(!empty($_REQUEST['uid'])){
			$map['uid'] = intval($_REQUEST['uid']);
			$search['uid'] = $map['uid'];
		}
		if(!empty($_REQUEST['start_time'])&&!empty($_REQUEST['end_time'])){

			$start_time = strtotime($_REQUEST['start_time']." 00:00:00");
			$end_time = strtotime($_REQUEST['end_time']." 23:59:59");
			$map['add_time'] = array("between","{$start_time},{$end_time}");
			$search['start_time'] = $_REQUEST['start_time'];
			$search['end_time'] = $_REQUEST['end_time'];
			$xtime['start_time'] = $_REQUEST['start_time'];
			$xtime['end_time'] = $_REQUEST['end_time'];
		}
		$this->assign('search',$search);
		
	 	$listType = C('PAYLOG_TYPE');
		$listType[-1]="不限制";
		$this->assign('type_list',$listType);
		$field= 'id,uid,status,money,add_time,tran_id,way,off_bank,off_way,deal_user';
		$this->_list(D('Paylog'),$field,$map,'id','DESC',$xtime);
		$map['status'] = 1;
		$this->assign("successamount", M("member_payonline")->where($map)->sum("money"));
        $this->display();
    }
	
	public function edit(){
		setBackUrl();
		$this->assign("id",intval($_GET['id']));	
		$this->display();
	}
	
	public function doEdit(){
		$id=intval($_POST['id']);	
		$status = intval($_POST['status']);
		$tran_id = text($_POST['tran_id']);
		
		$statusx = M('member_payonline')->getFieldById($id,"status");
		if ($statusx!=0){
			$this->error("请不要重复提交表单");
		}
		if($status==1){
			if(empty($tran_id)){
				$this->error("如充值成功，请输入相应支付平台的对账订单号！");
				return;
			}
			$tran_counts = M('member_payonline')->where(array("tran_id"=>$tran_id))->count("1");
			if($tran_counts > 0){
				$this->error("该对账订单号已经存在！");
				return;
			}
			$vo = M('member_payonline')->field('money,fee,uid,way')->find($id);
			$newid = memberMoneyLog($vo['uid'],27,$vo['money']-$vo['fee'],"管理员手动审核充值");
			if($newid){
				$save['deal_user'] = session('adminname');
				$save['deal_uid'] = $this->admin_id;
				$save['status'] = 1;
				$save['tran_id'] = $tran_id;
				M('member_payonline')->where("id={$id}")->save($save);
				$vx = M('members')->field("user_name,user_phone")->find($vo['uid']);
				if($vo['way']=="off") SMStip("payoffline",$vx['user_phone'],array("#USERANEM#","#MONEY#"),array($vx['user_name'],$vo['money']), null, array($vo['uid']));
				else  SMStip("payonline",$vx['user_phone'],array("#USERANEM#","#MONEY#"),array($vx['user_name'],$vo['money']), null, array($vo['uid']));
				$this->success("处理成功");
			}
			else $this->error("处理失败");
		}else{
			$save['deal_user'] = session('adminname');
			$save['deal_uid'] = $this->admin_id;
			$save['status'] = 3;
			$newid = M('member_payonline')->where("id={$id}")->save($save);
			if($newid) $this->success("处理成功");
			else $this->error("处理失败");
		}
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