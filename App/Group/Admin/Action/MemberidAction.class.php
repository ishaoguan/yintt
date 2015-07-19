<?php
// 全局设置
class MemberidAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$pre = C('DB_PREFIX');
		$field= true;
		$map=array();
		
		
		if($_REQUEST['status']){
			$map['s.id_status'] = intval($_REQUEST['status']);
			$search['status'] = $map['s.id_status'];
		}
		else  $map['s.id_status'] = array("in","1,3");
		
		
		if($_REQUEST['uname']){
			$map['m.user_name'] = text($_REQUEST['uname']);
			$search['uname'] = $map['m.user_name'];
		}

		if($_REQUEST['realname']){
			$map['mi.real_name'] = urldecode($_REQUEST['realname']);
			$search['real_name'] = $map['mi.real_name'];	
		}

		if($_REQUEST['idcard']){
			$map['mi.idcard'] = urldecode($_REQUEST['idcard']);
			$search['idcard'] = $map['mi.idcard'];	
		}
		
		if(!empty($_REQUEST['start_time']) && !empty($_REQUEST['end_time'])){
			$timespan = strtotime(urldecode($_REQUEST['start_time'])).",".strtotime(urldecode($_REQUEST['end_time']));
			$map['mi.up_time'] = array("between",$timespan);
			$search['start_time'] = urldecode($_REQUEST['start_time']);	
			$search['end_time'] = urldecode($_REQUEST['end_time']);	
		}elseif(!empty($_REQUEST['start_time'])){
			$xtime = strtotime(urldecode($_REQUEST['start_time']));
			$map['mi.up_time'] = array("gt",$xtime);
			$search['start_time'] = $xtime;	
		}elseif(!empty($_REQUEST['end_time'])){
			$xtime = strtotime(urldecode($_REQUEST['end_time']));
			$map['mi.up_time'] = array("lt",$xtime);
			$search['end_time'] = $xtime;	
		}
		//if(session('admin_is_kf')==1)	$map['m.delicated_customer'] = session('admin_id');
		

		import("ORG.Util.Page");
		$count = M('members_status s')->join("{$pre}members m ON m.id=s.uid")->join("{$pre}member_info mi ON mi.uid=s.uid")->where($map)->count('s.uid');
		$p = new Page($count, C('ADMIN_PAGE_SIZE'));
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		$list = M('members_status s')->field('s.uid,s.id_status,mi.up_time,mi.card_img,mi.real_name,mi.idcard,m.user_name,mi.cardback_img')->join("{$pre}members m ON m.id=s.uid")->join("{$pre}member_info mi ON mi.uid=s.uid")->where($map)->order("mi.up_time DESC")->limit($Lsql)->select();

        $this->assign("status", array("1"=>'已认证',"3"=>'待认证'));
		$this->assign("search",$search);
		$this->assign("list",$list);
		$this->assign("pagebar",$page);
        $this->display();
    }
    public function edit() {
		setBackUrl();
        $id = intval($_REQUEST['id']);
        $minfo = M('member_info')->where(array('uid'=>$id))->find();
        $mids = M('member_info')->alias('a')->join('inner join '.C('DB_PREFIX').'members b on a.uid=b.id')->field('a.uid,b.user_name')->where(array('a.idcard'=>$minfo['idcard'],'a.uid'=>array('neq', $id)))->select();
        $msg="";
        if(!empty($mids)){
        	$msg="现系统限制一个身份证最多被2个会员使用，该身份证号{$minfo['idcard']}已被会员 ";
        	foreach ($mids as $mid){
        		$msg.=$mid['user_name'].',';
        	}
        	$msg = substr($msg, 0, strlen($msg) - 1);
        	$msg .= "使用，请仔细核对该会员资料！";
        }
        $this->assign('msg', $msg);
        $this->assign('uid', $id);
        $this->display();
    }
	
	public function doEdit(){
		$status = intval($_POST['status']);
		$uid = intval($_POST['id']);
		$uif = $_POST['deal_info'];
		if($status==1){
			memberCreditsLog($uid,2,intval($this->glo["real_score"]),"实名认证通过经验奖励");
			memberScoresLog($uid,2,intval($this->glo["real_score"]),"实名认证通过积分奖励");
			memberMoneyLog($uid,25,-($this->glo['fee_idcard']),$info="实名认证通过");
			$newxid = M("members_status")->where("uid={$uid}")->setField('id_status',1);
			$dealInfo=M("member_info")->where("uid={$uid}")->setField('deal_info',$uif);//deal_info字段存在member_info表
			addInnerMsg($uid,"您的实名认证申请已经通过", "您的实名认证申请已经通过");

		}else{
			$newxid = M("members_status")->where("uid={$uid}")->setField('id_status',0);
			addInnerMsg($uid,"您的实名认证申请未能通过", "未通过原因：".$uif);
		}
		if($newxid) $this->success("审核成功",__URL__."/index".session('listaction'));
		else $this->error("审核失败");
	}

}
?>