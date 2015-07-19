<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends HCommonAction {
    public function index(){
		$per = C('DB_PREFIX');
		
		//公司动态
		$parm['type_id'] = 321;
		$parm['limit'] = 5;
		$parm['need_content'] = true;
		$this->assign("noticeList",getArticleList($parm));


        /*//行业动态
      /*$parm['type_id'] = 398;
        $parm['limit'] = 1;
        $parm['need_content'] = true;
        $this->assign("buzList",getArticleList($parm));*/

		//公司动态
		$parm['type_id'] = 396;
		$parm['limit'] = 5;
		$parm['need_content'] = true;
		$this->assign("gsdtList",getArticleList($parm));

		//行业新闻
		
		/*//粤商动态
		$parm['type_id'] = 396;
		$parm['limit'] = 17;
		$parm['need_content'] = true;
		$this->assign("trendList",getArticleList($parm));
		//粤商动态*/
		
		/*//最新功能
		$parm = array();
		$parm['type_id'] = 395;
		$parm['limit'] = 8;
		$this->assign("newestFunctionList",getArticleList($parm));
		//最新功能*/
		
		//常见问题
		$parm = array();
		$parm['type_id'] = 392;
		$parm['limit'] = 6;
		$this->assign("questionList",getArticleList($parm));
		//常见问题
		
		//首页动态图片新闻
		$this->assign("picnew", M("article")->where("is_homepicnews=1 and type_id=396")->order("id desc")->find());
		//首页动态图片新闻
		
		//首页行业图片新闻
		$this->assign("buzpicnew", M("article")->where("is_homepicnews=1 and type_id=338")->order("id desc")->find());
		//首页行业图片新闻
		
		//成功的借款
		$parm=array();
		$searchMap = array();
		$searchMap['b.borrow_status']=array("in",'6,7');
		$parm['map'] = $searchMap;
		$parm['limit'] = 3;
		$parm['orderby']="b.id DESC";
		$successBorrow = getBorrowList($parm);
		$this->assign("successBorrow",$successBorrow);
		//成功的借款
		//逾期的借款
		$parm=array();
		$searchMap = array();
		$searchMap['borrow_status']=8;
		$parm['map'] = $searchMap;
		$parm['limit'] = 3;
		$parm['orderby']="b.id DESC";
		$breakBorrow = getBorrowList($parm);
		$this->assign("breakBorrow",$breakBorrow);
		//逾期的借款
		//正在进行的贷款
		$searchMap = array();
		$searchMap['borrow_status']=array("in",'2,4,6,7');
		$Bconfig = require C("APP_ROOT")."Conf/borrow_config.php";
		$parm=array();
		date_default_timezone_set('Asia/Shanghai');
		$ntime=date('Y-m-d H:i:s');
		$searchMap['schedular_time']=array("LT",$ntime);
		$parm['map'] = $searchMap;
		$parm['limit'] = 5;
		$parm['orderby']="b.borrow_status ASC,b.id DESC";
		$listBorrow = getBorrowList($parm);
		$this->assign("Bconfig",$Bconfig);
		$this->assign("listBorrow",$listBorrow);
		//正在进行的贷款
		
		//可投标的借款
		$searchMap = array();
		$searchMap['borrow_status']=array("in",'2');
		$parm=array();
		$parm['map'] = $searchMap;
		$this->assign("doingnum",getBorrowList($parm, true));
		//可投标的借款
		
		//最热借款
		$searchMap = array();
		$searchMap['borrow_status']=array("in",'6,7,8,9');
		$searchMap['full_time']=array("gt", 0);
		$parm=array();
		$parm['map'] = $searchMap;
		$parm['limit'] = 10;
		$parm['hotest'] = true;
		$parm['orderby']="IFNULL(b.`full_time`,0)-IFNULL(bv.`deal_time`,0) ASC";
		$listBorrowHotest = getBorrowList($parm);
		$this->assign("listBorrowHotest",$listBorrowHotest);
		//最热借款
		
		//推荐的贷款
		$searchMap = array();
		$searchMap['borrow_status']=array("in",'2,4,6,7');
		$searchMap['is_tuijian']=1;
		//$searchMap['collect_time']=array('gt',time());
		$parm=array();
		$parm['map'] = $searchMap;
		$parm['limit'] = 1;
		$parm['orderby']="b.id DESC";
		$listBorrowtj = getBorrowList($parm);
		$this->assign("listBorrow_tj",$listBorrowtj);
		//推荐的贷款

		$this->assign( "mcount", M( "members" )->count( "id" ) );
		$this->assign( "mborrowOut",M( "borrow_info" )->where( "borrow_status in(6,7,8,9)" )->sum( "borrow_money" ) );
		$this->assign( "mborrowOutNum",M( "borrow_info" )->where( "borrow_status in(6,7,8,9)" )->count( "id" ) );

		//地区文章列表
		$artList = getAreaTypeList(array("limit"=>7,"area_id"=>$this->siteInfo['id'],'type_id'=>0));
		$this->assign("newlist",$artList);
		//地区文章列表
		if($this->uid){
			$this->assign("m_minfo",M('members')->field('credits')->find($this->uid));
			$this->assign("unread",$read=M("inner_msg")->where("uid={$this->uid} AND status=0")->count('id'));
		}
		
		//近期投资
		$this->assign("recentList", getRecentList(10));

		//近期还款
		$nearlyStartTime = strtotime("-3 days");
		$nearlyStartDate = date('Y-m-d', $nearlyStartTime);
		$nearlyEndTime = strtotime("$nearlyStartDate 1 month -1 day");
		$map = array();
		$map['d.status'] = array("neq", 0);
		$map['d.deadline'] = array("between", $nearlyStartTime.','.$nearlyEndTime);
		$nearlylist = getTenderList($map, null, 10, 'd.deadline asc');
		$this->assign("recentPayList", $nearlylist['list']);
		
		//////////////////////////排行榜//////////////////
		$map = array();
		$start = strtotime(date("Y-m-d",time())." 00:00:00");
		$end = strtotime(date("Y-m-d",time())." 23:59:59");
		$map['add_time'] = array(
						"between",
						"{$start},{$end}"
		);
		$listPmday = getranklist($map,10);
		$this->assign("pmDay",$listPmday);
		
		$map = array();
		$start = strtotime("-7 day",strtotime(date("Y-m-d",time())." 00:00:00"));//strtotime(date("Y-m-d",time())." 00:00:00");
		$end = strtotime(date("Y-m-d",time())." 23:59:59");
		$map['add_time'] = array(
						"between",
						"{$start},{$end}"
		);
		$listPmweek = getranklist($map,10);
		$this->assign("pmWeek",$listPmweek);
		
		$map = array();
		$xdat = explode("|", $this->glo['rankDate']);
		$start = strtotime($xdat[0]." 00:00:00");
		$end = strtotime($xdat[1]." 23:59:59");
		$map['add_time'] = array(
						"between",
						"{$start},{$end}"
		);
		$listPmMonth = getranklist($map,10);
		$this->assign("pmMonth",$listPmMonth);

		//资金统计
		$map=array();
		$list = M("member_moneylog")->field('type,sum(affect_money) as money')->where($map)->group('type')->select();
		$row=array();
		$name = C('MONEY_LOG');
		foreach($list as $v){
			$row[$v['type']]['money']= ($v['money']>0)?$v['money']:$v['money']*(-1);
			$row[$v['type']]['name']= $name[$v['type']];
		}
		$this->assign('staticslist',$row);
		
		//理财产品
		//$financial_arr = getFinancialData();
		//$this->assign('financial_arr',$financial_arr);
		
		////////////////////////////////////////////
		$this->display();
		/****************************募集期内标未满,自动流标 新增 2013-03-13****************************/
		//流标返回
		$mapT = array();
		$mapT['collect_time']=array("lt",time());
		$mapT['borrow_status'] = 2;
		$tlist = M("borrow_info")->field("id,borrow_uid,borrow_type,borrow_money,first_verify_time,borrow_interest_rate,borrow_duration,repayment_type,collect_day,collect_time")->where($mapT)->select();
		if(empty($tlist)) exit;
		foreach($tlist as $key=>$vbx){
			$borrow_id=$vbx['id'];
			//流标
			$done = false;
			$borrowInvestor = D('borrow_investor');
			$binfo = M("borrow_info")->field("borrow_type,borrow_money,borrow_uid,borrow_duration,repayment_type")->find($borrow_id);
			$investorList = $borrowInvestor->field('id,investor_uid,investor_capital')->where("borrow_id={$borrow_id}")->select();
			M('investor_detail')->where("borrow_id={$borrow_id}")->delete();
			if($binfo['borrow_type']==1) $limit_credit = memberLimitLog($binfo['borrow_uid'],12,($binfo['borrow_money']),$info="{$binfo['id']}号标流标");//返回额度
			$borrowInvestor->startTrans();
			
			$bstatus = $type= 3;
			$upborrow_info = M('borrow_info')->where("id={$borrow_id}")->setField("borrow_status",$bstatus);
			//处理借款概要
			$buname = M('members')->getFieldById($binfo['borrow_uid'],'user_name');
			//处理借款概要
			if(is_array($investorList)){
				$upsummary_res = M('borrow_investor')->where("borrow_id={$borrow_id}")->setField("status",$type);
				foreach($investorList as $v){
					MTip('chk15',$v['investor_uid'],$borrow_id);//sss
					$accountMoney_investor = M("member_money")->field(true)->find($v['investor_uid']);
					$datamoney_x['uid'] = $v['investor_uid'];
					$datamoney_x['type'] = 8;
					$datamoney_x['affect_money'] = $v['investor_capital'];
					$datamoney_x['account_money'] = ($accountMoney_investor['account_money'] + $datamoney_x['affect_money']);
					$datamoney_x['collect_money'] = $accountMoney_investor['money_collect'];
					$datamoney_x['freeze_money'] = $accountMoney_investor['money_freeze'] - $datamoney_x['affect_money'];
					//会员帐户
					$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
					$mmoney_x['money_collect']=$datamoney_x['collect_money'];
					$mmoney_x['account_money']=$datamoney_x['account_money'];
					//会员帐户
					$_xstr = "募集期内标未满,流标";
					$datamoney_x['info'] = "第{$borrow_id}号标".$_xstr."，返回冻结资金";
					$datamoney_x['add_time'] = time();
					$datamoney_x['add_ip'] = get_client_ip();
					$datamoney_x['target_uid'] = $binfo['borrow_uid'];
					$datamoney_x['target_uname'] = $buname;
					$moneynewid_x = M('member_moneylog')->add($datamoney_x);
					if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
				}
			}else{
				$moneynewid_x = true;
				$bxid=true;
				$upsummary_res=true;
			}
	
			if($moneynewid_x && $upsummary_res && $bxid && $upborrow_info){
				$done=true;
				$borrowInvestor->commit();
			}else{
				$borrowInvestor->rollback() ;
			}
			if(!$done) continue;
			

			MTip('chk11',$vbx['borrow_uid'],$borrow_id);
			$verify_info['borrow_id'] = $borrow_id;
			$verify_info['deal_info_2'] = text($_POST['deal_info_2']);
			$verify_info['deal_user_2'] = 0;
			$verify_info['deal_time_2'] = time();
			$verify_info['deal_status_2'] = 3;
			if($vbx['first_verify_time']>0) M('borrow_verify')->save($verify_info);
			else  M('borrow_verify')->add($verify_info);
			
			$vss = M("members")->field("user_phone,user_name")->where("id = {$vbx['borrow_uid']}")->find();
			SMStip("refuse",$vss['user_phone'],array("#USERANEM#","ID"),array($vss['user_name'],$verify_info['borrow_id']), $verify_info['borrow_id'], array($vbx['borrow_uid']));
			//@SMStip("refuse",$vss['user_phone'],array("#USERANEM#","ID"),array($vss['user_name'],$verify_info['borrow_id']));
			//updateBinfo
			$newBinfo=array();
			$newBinfo['id'] = $borrow_id;
			$newBinfo['borrow_status'] = 3;
			$newBinfo['second_verify_time'] = time();
			$x = M("borrow_info")->save($newBinfo);
			}
			/****************************募集期内标未满,自动流标 新增 2013-03-13****************************/
		}	
    }