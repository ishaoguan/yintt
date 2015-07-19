<?php
// 全局设置
class FinancestatAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
    	// 注释部分是只显示投资人的统计方法
 		// if(!empty($_REQUEST['status']) && $_REQUEST['status']>-1){
		// 	$map['status'] = intval($_REQUEST['status']);
		// 	$search['status'] = $map['status'];
		// }else{
		// 	$search['status'] = -1;
		// }
		// if(!empty($_REQUEST['uname'])){
		// 	$uid = M("members")->alias('m')->getFieldByUserName(text(urldecode($_REQUEST['uname'])),'m.id');
		// 	$map['uid'] = $uid;
		// 	$search['uname'] = text(urldecode($_REQUEST['uname']));
		// }
		// if(!empty($_REQUEST['uid'])){
		// 	$map['t.uid'] = intval($_REQUEST['uid']);
		// 	$search['uid'] = $map['t.uid'];
		// }
		// if(!empty($_REQUEST['start_time'])&&!empty($_REQUEST['end_time'])){
		// 	$start_time = strtotime($_REQUEST['start_time']." 00:00:00");
		// 	$end_time = strtotime($_REQUEST['end_time']." 23:59:59");
		// 	$map['t.add_time'] = array("between","{$start_time},{$end_time}");
		// 	$search['start_time'] = $_REQUEST['start_time'];
		// 	$search['end_time'] = $_REQUEST['end_time'];
		// }
		// if(!empty($_REQUEST['_reg_start_time'])&&!empty($_REQUEST['_reg_end_time'])){
		// 	$_reg_start_time = strtotime($_REQUEST['_reg_start_time']."00:00:00");
		// 	$_reg_end_time = strtotime($_REQUEST['_reg_end_time']."23:59:59");
		// 	$map['m.reg_time'] = array("between","{$reg_start_time},{$_reg_end_time}");
		// 	$search['_reg_start_time'] = $_REQUEST['_reg_start_time'];
		// 	$search['_reg_end_time'] = $_REQUEST['_reg_end_time'];
		// }

		// $this->assign('search',$search);

		// import("ORG.Util.Page");
		// $datasourse = M('member_payonline')->alias('t')->join("{$this->pre}members m on m.id = t.uid")->where($map)->field('distinct m.user_name')->select();
		// $map['t.status']=1;
		// $datasum = M('member_payonline')->alias('t')->join("{$this->pre}members m on m.id = t.uid")->where($map)->sum('t.money');
		// $count = sizeof($datasourse);
		// $p = new Page($count, C('ADMIN_PAGE_SIZE'));
		// $page = $p->show();
		// $this->assign('pagebar',$page);	

		// foreach ($datasourse as $k => $v) {
		// 	$map['m.user_name']=$v['user_name'];
		// 	$map['t.status']= 1;
		// 	$succinvest[$k]['id'] = $k+1;
		// 	$succinvest[$k]['money'] = M('member_payonline')->alias('t')->join("{$this->pre}members m on m.id = t.uid")->where($map)->sum('t.money');
		// 	$succinvest[$k]['name']	=$v['user_name'];
		// 	unset($map['t.status']);
		// 	$map['t.status']=array('neq',1);
		// 	$succinvest[$k]['failmoney'] = M('member_payonline')->alias('t')->join("{$this->pre}members m on m.id= t.uid")->where($map)->sum('t.money');
		// 	unset($map);
		// 	$map['m.user_name']=$v['user_name'];
		// 	$succinvest[$k]['reg_time'] = M('member_payonline')->alias('t')->join("{$this->pre}members m on m.id= t.uid")->where($map)->getField('m.reg_time');
		// }
		// //dump($succinvest);
		// $this->assign('succinvest',$succinvest);
		// $this->assign('datastat',$count);
		// $this->assign('datasum',$datasum);
    	if($_REQUEST['uname']||$_REQUEST['_reg_start_time']||$_REQUEST['_reg_end_time']){
    		$condition = "where ";
    	}else{
    		$condition ="";
    	}
    	if(!empty($_REQUEST['uname'])){
			$unamecondi = "(t.`user_name` = '$_REQUEST[uname]')";
			$search['uname'] = text(urldecode($_REQUEST['uname']));
		}else{
			$unamecondi ="";
		}
		if(!empty($_REQUEST['start_time'])&&!empty($_REQUEST['end_time'])){
			$start_time = strtotime($_REQUEST['start_time']." 00:00:00");
			$end_time = strtotime($_REQUEST['end_time']." 23:59:59");
			$timecondi = " and (a.`add_time` > '$start_time') and (a.`add_time` < '$end_time')";
			$investcondi = " and (b.`add_time` > '$start_time') and (b.`add_time` < '$end_time')";
			$search['start_time'] = $_REQUEST['start_time'];
			$search['end_time'] = $_REQUEST['end_time'];
		}else{
			$timecondi ="";
		}
		if(!empty($_REQUEST['_reg_start_time'])&&!empty($_REQUEST['_reg_end_time'])){
			$_reg_start_time = strtotime($_REQUEST['_reg_start_time']."00:00:00");
			$_reg_end_time = strtotime($_REQUEST['_reg_end_time']."23:59:59");
			$regcondi =" (t.`reg_time` > '$_reg_start_time') and (t.`reg_time` < '$_reg_end_time')";
			$search['_reg_start_time'] = $_REQUEST['_reg_start_time'];
			$search['_reg_end_time'] = $_REQUEST['_reg_end_time'];
		}else{
			$regcondi ="";
		}
		if(!empty($_REQUEST['uname'])&&(!empty($_REQUEST['_reg_start_time'])&&!empty($_REQUEST['_reg_end_time']))){
			$andchar = " and ";
		}else{
			$andchar ="";
		}

		$this->assign('search',$search);
		import("ORG.Util.Page");
		$sqlcount ="SELECT t.id,t.reg_time,t.user_name,m.totalpay,n.totalinvestor FROM lzh_members t LEFT JOIN (SELECT a.uid,SUM(a.`money`) totalpay FROM lzh_member_payonline a WHERE (a.`status`=1) $timecondi GROUP BY a.uid) m ON t.id=m.uid
		LEFT JOIN (SELECT b.investor_uid,SUM(b.investor_capital) totalinvestor FROM lzh_borrow_investor b WHERE (b.status>=4) $investcondi GROUP BY b.`investor_uid`)n ON t.id=n.investor_uid $condition $unamecondi $andchar $regcondi";		
		$countlist = M()->query($sqlcount);
		$countsize = sizeof($countlist);
		$this->assign('countsize',$countsize);
		$p = new Page($countsize, C('ADMIN_PAGE_SIZE'));
		$page = $p->show();
		$sqldisplay = "SELECT t.id,t.reg_time,t.user_name,m.totalpay,n.totalinvestor FROM lzh_members t LEFT JOIN (SELECT a.uid,SUM(a.`money`) totalpay FROM lzh_member_payonline a WHERE (a.`status`=1) $timecondi GROUP BY a.uid) m ON t.id=m.uid
		LEFT JOIN (SELECT b.investor_uid,SUM(b.investor_capital) totalinvestor FROM lzh_borrow_investor b WHERE (b.status>=4) $investcondi GROUP BY b.`investor_uid`)n ON t.id=n.investor_uid $condition $unamecondi $andchar $regcondi ORDER BY t.id ASC limit $p->firstRow,$p->listRows;";
		$list = M()->query($sqldisplay);
		$investno =0; $payno =0; $investmon =0; $paymon =0;
		foreach($countlist as $k=>$v){
			if($v['totalpay']>0){
				$investno += 1;
				$investmon += $v['totalpay'];
			}
			if($v['totalinvestor']>0){
				$payno += 1;
				$paymon += $v['totalinvestor'];
			}
		}
		$this->assign('investno',$investno);$this->assign('payno',$payno);
		$this->assign('investmon',$investmon);$this->assign('paymon',$paymon);
		$this->assign('pagebar',$page);
		$this->assign('list',$list);
        $this->display();
    }	

}
?>