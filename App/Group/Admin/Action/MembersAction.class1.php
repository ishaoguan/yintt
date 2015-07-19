<?php
// 全局设置
class MembersAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
    	$this->getMembers();
    	$this->assign("action", "index");
        $this->display();
    }
    
    private function getMembers(){
    	$map=array();
    	if($_REQUEST['uname']){
    		$map['m.user_name'] = array("like",urldecode($_REQUEST['uname'])."%");
    		$search['uname'] = urldecode($_REQUEST['uname']);
    	}
    	if($_REQUEST['realname']){
    		$map['mi.real_name'] = urldecode($_REQUEST['realname']);
    		$search['realname'] = $map['mi.real_name'];
    	}
    	if($_REQUEST['is_vip']=='yes'){
    		$map['m.user_leve'] = 1;
    		$map['m.time_limit'] = array('gt',time());
    		$search['is_vip'] = 'yes';
    	}elseif($_REQUEST['is_vip']=='no'){
    		$map['_string'] = 'm.user_leve=0 OR m.time_limit<'.time();
    		$search['is_vip'] = 'no';
    	}
    	if($_REQUEST['is_transfer']=='yes'){
    		$map['m.is_transfer'] = 1;
    	}elseif($_REQUEST['is_transfer']=='no'){
    		$map['m.is_transfer'] = 0;
    	}
    	
    	if(session('admin_is_kf')==1){
    		$map['m.delicated_customer'] = session('admin_id');
    	}else{
    		if($_REQUEST['customer_id'] && $_REQUEST['customer_name']){
    			$map['m.customer_id'] = $_REQUEST['customer_id'];
    			$search['customer_id'] = $map['m.customer_id'];
    			$search['customer_name'] = urldecode($_REQUEST['customer_name']);
    		}
    			
    		if($_REQUEST['customer_name'] && !$search['customer_id']){
    			$cusname = urldecode($_REQUEST['customer_name']);
    			$kfid = M('ausers')->getFieldByUserName($cusname,'id');
    			$map['m.customer_id'] = $kfid;
    			$search['customer_name'] = $cusname;
    			$search['customer_id'] = $kfid;
    		}
	    	if($_REQUEST['kf']){
	    		$map['m.delicated_customer'] = $_REQUEST['kf'];
	    		$search['kf'] = $map['m.delicated_customer'];
	    	}
    	}
    	if(!empty($_REQUEST['bj']) && !empty($_REQUEST['lx']) && !empty($_REQUEST['money'])){
    		$map[$_REQUEST['lx']] = array($_REQUEST['bj'],$_REQUEST['money']);
    		$search['bj'] = $_REQUEST['bj'];
    		$search['lx'] = $_REQUEST['lx'];
    		$search['money'] = $_REQUEST['money'];
    	}
    	
    	if(!empty($_REQUEST['start_time']) && !empty($_REQUEST['end_time'])){
    		$timespan = strtotime(urldecode($_REQUEST['start_time'])).",".strtotime(urldecode($_REQUEST['end_time']));
    		$map['m.reg_time'] = array("between",$timespan);
    		$search['start_time'] = urldecode($_REQUEST['start_time']);
    		$search['end_time'] = urldecode($_REQUEST['end_time']);
    	}elseif(!empty($_REQUEST['start_time'])){
    		$xtime = strtotime(urldecode($_REQUEST['start_time']));
    		$map['m.reg_time'] = array("gt",$xtime);
    		$search['start_time'] = $xtime;
    	}elseif(!empty($_REQUEST['end_time'])){
    		$xtime = strtotime(urldecode($_REQUEST['end_time']));
    		$map['m.reg_time'] = array("lt",$xtime);
    		$search['end_time'] = $xtime;
    	}
    	
    	//分页处理
    	import("ORG.Util.Page");
    	$count = M('members')->alias('m')->join("{$this->pre}member_money mm ON mm.uid=m.id")->join("{$this->pre}member_info mi ON mi.uid=m.id")->where($map)->count('m.id');
    	$p = new Page($count, 20);
    	$page = $p->show();
    	$Lsql = "{$p->firstRow},{$p->listRows}";
    	//分页处理
    	
    	$field= 'm.id,m.reg_time,m.user_name,m.customer_name,m.user_leve,m.time_limit,mi.real_name,mm.money_freeze,mm.money_collect,mm.account_money,da.real_name delicated_name,rm.user_name recommend_name,da1.real_name customer_realname';
    	$list = M('members')->alias("m")->field($field)->join("{$this->pre}member_money mm ON mm.uid=m.id")->join("{$this->pre}member_info mi ON mi.uid=m.id")->
    		join("left join {$this->pre}ausers da on da.id=m.delicated_customer")->join("left join {$this->pre}members rm on rm.id=m.recommend_id")->
    		join("left join {$this->pre}ausers da1 on da1.id=m.customer_id")->where($map)->limit($Lsql)->order('m.id DESC')->select();
    	
    	$list=$this->_listFilter($list);
    	
    	$this->assign("bj", array("gt"=>'大于',"eq"=>'等于',"lt"=>'小于'));
    	$this->assign("lx", array("mm.account_money"=>'可用余额',"mm.money_freeze"=>'冻结金额',"mm.money_collect"=>'待收金额'));
    	$this->assign("list", $list);
    	$this->assign("pagebar", $page);
    	$this->assign("search", $search);
    	$this->assign("query", http_build_query($search));
    }

    public function edit() {
        $model = D(ucfirst($this->getActionName()));
		setBackUrl();
        $id = intval($_REQUEST['id']);
        $vo = $model->find($id);
		$vx = M('member_info')->where("uid={$id}")->find();
		if(!is_array($vx)){
			M('member_info')->add(array("uid"=>$id));
		}else{
			foreach($vx as $key=>$vxe){
				$vo[$key]=$vxe;
			}
		}
		
        $this->assign('vo', $vo);
		$this->assign("utype", C('XMEMBER_TYPE'));
        $this->display();
    }
	
	//添加数据
    public function doEdit() {
        $model = M(ucfirst($this->getActionName()));
        $model2 = M("member_info");
		
        //model create的时候会做表单验证，这里需要两次model create，所以暂时先关闭表单验证
        $oldToken = C('TOKEN_ON');
        C('TOKEN_ON', false);
        if (false === $model->create()) {
            $this->error($model->getError());
        }
        C('TOKEN_ON', $oldToken);
        if (false === $model2->create()) {
            $this->error($model2->getError());
        }
		
		$model->startTrans();
        if(!empty($model->user_pass)){
			$model->user_pass=md5($model->user_pass);
		}else{
			unset($model->user_pass);
		}
        if(!empty($model->pin_pass)){
			$model->pin_pass=md5($model->pin_pass);
		}else{
			unset($model->pin_pass);
		}
		
		$result = $model->save();
		$result2 = $model2->save();

        //保存当前数据对象
        if ($result || $result2) { //保存成功
			$model->commit();
            //成功提示
            $this->assign('jumpUrl', __URL__."/".session('listaction'));
            $this->success('修改成功');
        } else {
			$model->rollback();
            //失败提示
            $this->error('修改失败');
        }
    }
	
    public function info()
    {	
		if($_GET['user_name']) $search['m.user_name'] = text($_GET['user_name']);
		else $search=array();
		if(session('admin_is_kf')==1){
			$search['m.delicated_customer'] = session('admin_id');
		}
		$list = getMemberInfoList($search,10);
		$this->assign("list",$list['list']);
		$this->assign("pagebar",$list['page']);
        $this->assign("search", $search);
        $this->display();
    }
	
    public function infowait()
    {	
		$Bconfig = require C("APP_ROOT")."Conf/borrow_config.php";
		if($_GET['user_name']) $search['m.user_name'] = text($_GET['user_name']);
		else $search=array();
		if(session('admin_is_kf')==1){
			$search['m.delicated_customer'] = session('admin_id');
		}
		$list = getMemberApplyList($search,10);
		$this->assign("aType",$Bconfig['APPLY_TYPE']);
		$this->assign("list",$list['list']);
		$this->assign("pagebar",$list['page']);
        $this->display();
    }
	
    public function viewinfo()
    {	
		$Bconfig = require C("APP_ROOT")."Conf/borrow_config.php";
		$this->assign("aType",$Bconfig['APPLY_TYPE']);
		setBackUrl();
		$id = intval($_GET['id']);
		$vx = M('member_apply')->field(true)->find($id);
		$uid = $vx['uid'];
		$vo = getMemberInfoDetail($uid);
		$this->assign("vx",$vx);
		$this->assign("vo",$vo);
		$this->assign("id",$id);
        $this->display();
    }
	
    public function viewinfom()
    {	
		$id = intval($_GET['id']);
		$vo = getMemberInfoDetail($id);
		$this->assign("vo",$vo);
        $this->display();
    }

	public function doEditCredit(){
		$id = intval($_POST['id']);
		$uid = intval($_POST['uid']);
		$data['id'] = $id;
		$data['deal_info'] = text($_POST['deal_info']);
		$data['apply_status'] = intval($_POST['apply_status']);
		$data['credit_money'] = floatval($_POST['credit_money']);
		$newid = M('member_apply')->save($data);
		
		if($newid){
			//审核通过后资金授信改动
			if($data['apply_status']==1){
				$vx = M('member_apply')->field(true)->find($id);
				$umoney = M('member_money')->field(true)->find($vx['uid']);
				
				$moneyLog['uid'] = $vx['uid'];
				if($vx['apply_type']==1){
					$moneyLog['credit_limit'] = floatval($umoney['credit_limit']) + $data['credit_money'];
					$moneyLog['credit_cuse'] = floatval($umoney['credit_cuse']) + $data['credit_money'];
				}elseif($vx['apply_type']==2){
					$moneyLog['borrow_vouch_limit'] = floatval($umoney['borrow_vouch_limit']) + $data['credit_money'];
					$moneyLog['borrow_vouch_cuse'] = floatval($umoney['borrow_vouch_cuse']) + $data['credit_money'];
				}elseif($vx['apply_type']==3){
					$moneyLog['invest_vouch_limit'] = floatval($umoney['invest_vouch_limit']) + $data['credit_money'];
					$moneyLog['invest_vouch_cuse'] = floatval($umoney['invest_vouch_cuse']) + $data['credit_money'];
				}
				
				if(!is_array($umoney))	M('member_money')->add($moneyLog);
				else M('member_money')->where("uid={$vx['uid']}")->save($moneyLog);
			}//审核通过后资金授信改动
			$this->success("审核成功",__URL__."/infowait".session('listaction'));
		}else{
			$this->error("审核失败");
		}
	}
	
    public function moneyedit()
    {
		setBackUrl();
		$this->assign("id",intval($_GET['id']));
		$this->display();
    }
	
    public function doMoneyEdit()
    {
		$id = intval($_POST['id']);
		$uid = $id;
		$info = text($_POST['info']);
		$done=false;
		if(floatval($_POST['account_money'])!=0){
			$done=memberMoneyLog($uid,71,floatval($_POST['account_money']),$info);
		}
		if(floatval($_POST['money_freeze'])!=0){
			$done=false;
			$done=memberMoneyLog($uid,72,floatval($_POST['money_freeze']),$info);
		}
		if(floatval($_POST['money_collect'])!=0){
			$done=false;
			$done=memberMoneyLog($uid,73,floatval($_POST['money_collect']),$info);
		}
		//记录
		
        $this->assign('jumpUrl', __URL__."/index".session('listaction'));
		if($done) $this->success("操作成功");
		else  $this->error("操作失败");
    }
	
    public function creditedit()
    {
		setBackUrl();
		$this->assign("id",intval($_GET['id']));
		$this->display();
    }
	
    public function doCreditEdit()
    {
		$id = intval($_POST['id']);
		
		$umoney = M('member_money')->field(true)->find($id);
		if(intval($_POST['credit_limit'])!=0){
			$moneyLog['uid'] = $id;
			$moneyLog['credit_limit'] = floatval($umoney['credit_limit']) + floatval($_POST['credit_limit']);
			$moneyLog['credit_cuse'] = floatval($umoney['credit_cuse']) + floatval($_POST['credit_limit']);
			if(!is_array($umoney))	$newid = M('member_money')->add($moneyLog);
			else $newid = M('member_money')->where("uid={$id}")->save($moneyLog);
		}
		if(intval($_POST['borrow_vouch_limit'])!=0){
			$moneyLog=array();
			$moneyLog['uid'] = $id;
			$moneyLog['borrow_vouch_limit'] = floatval($umoney['borrow_vouch_limit']) + floatval($_POST['borrow_vouch_limit']);
			$moneyLog['borrow_vouch_cuse'] = floatval($umoney['borrow_vouch_cuse']) + floatval($_POST['borrow_vouch_limit']);
			if(!is_array($umoney) && !$newid)	$newid = M('member_money')->add($moneyLog);
			else $newid = M('member_money')->where("uid={$id}")->save($moneyLog);
		}
		if(intval($_POST['invest_vouch_limit'])!=0){
			$moneyLog=array();
			$moneyLog['uid'] = $id;
			$moneyLog['invest_vouch_limit'] = floatval($umoney['invest_vouch_limit']) + floatval($_POST['invest_vouch_limit']);
			$moneyLog['invest_vouch_cuse'] = floatval($umoney['invest_vouch_cuse']) + floatval($_POST['invest_vouch_limit']);
			if(!is_array($umoney) && !$newid)	$newid = M('member_money')->add($moneyLog);
			else $newid = M('member_money')->where("uid={$id}")->save($moneyLog);
		}

        $this->assign('jumpUrl', __URL__."/index".session('listaction'));
		if($newid) $this->success("操作成功");
		else  $this->error("操作失败");
    }
	
	
	public function _listFilter($list){
		$row=array();
		foreach($list as $key=>$v){
			($v['user_leve']==1 && $v['time_limit']>time())?$v['user_type'] = "<span style='color:red'>VIP会员</span>":$v['user_type'] = "普通会员";
			$row[$key]=$v;
		}
		return $row;
	}
	
	public function getusername(){
		$uname = M("members")->getFieldById(intval($_POST['uid']),"user_name");
		if($uname) exit(json_encode(array("uname"=>"<span style='color:green'>".$uname."</span>")));
		else exit(json_encode(array("uname"=>"<span style='color:orange'>不存在此会员</span>")));
	}
	
	public function getarea(){
		$rid = intval($_GET['rid']);
		if(empty($rid)){
			$data['NoCity'] = 1;
			exit(json_encode($data));
		}
		$map['reid'] = $rid;
		$alist = M('area')->field('id,name')->order('sort_order DESC')->where($map)->select();

		if(count($alist)===0){
			$str="<option value=''>--该地区下无下级地区--</option>\r\n";
		}else{
			if($rid==1) $str.="<option value='0'>请选择省份</option>\r\n";
			foreach($alist as $v){
				$str.="<option value='{$v['id']}'>{$v['name']}</option>\r\n";
			}
		}
		$data['option'] = $str;
		$res = json_encode($data);
		echo $res;
	}
	
	public function delicated(){
    	$this->getMembers();
    	$kflist = M("ausers")->where("is_kf=1")->getField('id,real_name');
    	$this->assign("kflist",$kflist);
    	$this->assign("action", "delicated");
        $this->display();
	}
	
	public function goDelicated(){
		$id = intval($_GET['id']);
		$mem = M("members")->alias("t")->join("left join {$this->pre}member_info mi on mi.uid=t.id")->field("t.user_name,mi.real_name")->where(array("t.id"=>$id))->find();
		$kflist = M("ausers")->where("is_kf=1 and is_ban=0")->getField('id,real_name');
      	$this->assign("kflist",$kflist);
      	$this->assign("member",$mem);
      	$this->assign("id",$id);
		$this->display();
	}
	
	public function doDelicated(){
		$id = intval($_POST['id']);
		$kfid = intval($_POST['kf']);
		$oldData = M("members")->alias("m")->field("m.delicated_customer,au.user_name,au.real_name")->join("left join {$this->pre}ausers au on m.delicated_customer=au.id")->where(array("m.id"=>$id))->find();
		M("members")->where(array("id"=>$id))->save(array("delicated_customer"=>$kfid));

		if($oldData["delicated_customer"] != $kfid){
			$newData = M("ausers")->field("user_name,real_name")->getById($kfid);
			$logText = "将专属客服";
			$logText .= "由[".$oldData["real_name"]."(".$oldData["user_name"].")]改为[".$newData["real_name"]."(".$newData["user_name"].")]";
			saveCommonLog($id, $logText, "members", session('adminname'), $this->admin_id, $this->logOpType["MODIFY_DELICATED"][0]);
		}
		
		$this->success("分配专属客服成功！");
	}
	
	public function goModifyRecommend(){
		$id = intval($_GET['id']);
		$mem = M("members")->alias("t")->join("left join {$this->pre}member_info mi on mi.uid=t.id")->
			join("left join {$this->pre}members rm on rm.id=t.recommend_id")->field("t.user_name,mi.real_name,rm.user_name recommend_name")->where(array("t.id"=>$id))->find();
      	$this->assign("member",$mem);
      	$this->assign("id",$id);
		$this->display();
	}
	
	public function doModifyRecommend(){
		$id = intval($_POST['id']);
		if(!is_numeric($_POST['expand_num']))$this->error("推广码只能是数字！");
		$expand_num = intval($_POST['expand_num']);
		$expandmember = M("members")->field("id,user_name")->where(array("expand_num"=>$expand_num))->find();
		if(empty($expandmember))$this->error("该推广码不存在！");
		$relatedMember = M("members")->alias("t")->field("a.user_name")->join("{$this->pre}members a on t.recommend_id=a.id")->where(array("t.id"=>$id, "t.recommend_id"=>array("gt", 0)))->find();
		M("members")->where(array("id"=>$id))->save(array("recommend_id"=>$expandmember["id"]));
		
		if($relatedMember["user_name"] != $expandmember["user_name"]){
			$logText = "将推荐人";
			$logText .= "由[".$relatedMember["user_name"]."]改为[".$expandmember["user_name"]."]";
			saveCommonLog($id, $logText, "members", session('adminname'), $this->admin_id, $this->logOpType["MODIFY_RECOMMOND"][0]);
		}
		
		$this->success("修改推荐人成功！");
	}
}
?>