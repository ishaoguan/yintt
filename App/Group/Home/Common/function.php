<?php
//返回日期格式
function trans_date_format($datetime, $format = 'Y-m-d H:i:s')
{
    return date($format, strtotime($datetime));
}
//获取借款列表
function getBorrowList($parm=array(), $countonly = false){
	if(empty($parm['map'])) return;
	$map= $parm['map'];
	$orderby= $parm['orderby'];
	//$map = array_merge($map,$search);
	
	if($countonly)return M('borrow_info b')->where($map)->count('b.id');
	if($parm['pagesize']){
		//分页处理
		import("ORG.Util.Page");
		$count = M('borrow_info b')->where($map)->count('b.id');
		$p = new Page($count, $parm['pagesize']);
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		//分页处理
	}else{
		$page="";
		$Lsql="{$parm['limit']}";
	}
	$pre = C('DB_PREFIX');
	$suffix=C("URL_HTML_SUFFIX");
	$field = "b.id,b.borrow_name,b.borrow_type,b.reward_type,b.borrow_times,b.borrow_status,b.borrow_money,b.borrow_use,b.repayment_type,b.borrow_interest_rate,b.borrow_duration,b.collect_time,b.province,b.has_borrow,b.has_vouch,b.city,b.area,b.reward_type,b.reward_num,b.password,b.borrow_info,m.user_name,m.id as uid,m.credits,m.customer_name,b.is_tuijian,b.pro_provide,b.first_verify_time,b.schedular_time";
	if($parm['hotest']){
		$field .= ",IFNULL(b.`full_time`,0)-IFNULL(bv.`deal_time`,0) finish_time";
		$list = M('borrow_info')->alias("b")->field($field)->join("{$pre}members m ON m.id=b.borrow_uid")->join("{$pre}borrow_verify bv ON b.id=bv.borrow_id")->where($map)->order($orderby)->limit($Lsql)->select();
	}else{
		$list = M('borrow_info')->alias("b")->field($field)->join("{$pre}members m ON m.id=b.borrow_uid")->where($map)->order($orderby)->limit($Lsql)->select();
	}
	$areaList = getArea();
	foreach($list as $key=>$v){
		$list[$key]['location'] = $areaList[$v['province']].$areaList[$v['city']];
		$list[$key]['biao'] = $v['borrow_times'];
		$list[$key]['need'] = $v['borrow_money'] - $v['has_borrow'];
		$list[$key]['leftdays'] = getLeftTime($v['collect_time']);
		$list[$key]['progress'] = getFloatValue($v['has_borrow']/$v['borrow_money']*100,2);
		$list[$key]['vouch_progress'] = getFloatValue($v['has_vouch']/$v['borrow_money']*100,2);
		$list[$key]['burl'] = MU("Home/invest","invest",array("id"=>$v['id'],"suffix"=>$suffix));
		$list[$key]['schedular_time'] = trans_date_format($v['schedular_time'],'Y-m-d');
	}
	
	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	return $row;
}

//获取特定栏目下文章列表
function getArticleList($parm){
	if(empty($parm['type_id'])) return;
	$map['type_id'] = $parm['type_id'];
	$Osql="id DESC";
	$field="id,title,art_set,art_time,art_url";
	if($parm["need_content"])$field.=",art_content";
	//查询条件 
	if($parm['pagesize']){
		//分页处理
		import("ORG.Util.Page");
		$count = M('article')->where($map)->count('id');
		$depr       =   C('URL_PATHINFO_DEPR');
		$cur_url = GetCurUrl();
		if(preg_match("/\/l\/([a-zA-z-]+)\/([\w\/]*)\?l=([a-zA-z-]+)/",$cur_url) === 1){
			$cur_url = preg_replace("/\?l=([a-zA-z-]+)/", "", $cur_url);
		}
		$p = new Page($count, $parm['pagesize'], '', preg_replace(array('/.html\/l\/([a-zA-z-]+)\/\d*/', '/.html\/\d+/'),array('.html?l='.LANG_SET,'.html'),ltrim($cur_url,$depr)));
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		//分页处理
	}else{
		$page="";
		$Lsql="{$parm['limit']}";
	}

	$data = M('article')->field($field)->where($map)->order($Osql)->limit($Lsql)->select();

	$suffix=C("URL_HTML_SUFFIX");
	$typefix = get_type_leve_nid($map['type_id']);
	$typeu = implode("/",$typefix);
	foreach($data as $key=>$v){
		if($v['art_set']==1) $data[$key]['arturl'] = (stripos($v['art_url'],"http://")===false)?"http://".$v['art_url']:$v['art_url'];
		//elseif(count($typefix)==1) $data[$key]['arturl'] = 
		else $data[$key]['arturl'] = MU("Home/{$typeu}","article",array("id"=>$v['id'],"suffix"=>$suffix));
	}
	$row=array();
	$row['list'] = $data;
	$row['page'] = $page;
	
	return $row;
}

function getCommentList($map,$size){
	$Osql="id DESC";
	$field=true;
	//查询条件 
	if($size){
		//分页处理
		import("ORG.Util.Page");
		$count = M('comment')->where($map)->count('id');
		$p = new Page($count, $size);
		$p->parameter .= "type=commentlist&";
		$p->parameter .= "id={$map['tid']}&";
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		//分页处理
	}

	$data = M('comment')->field($field)->where($map)->order($Osql)->limit($Lsql)->select();
	foreach($data as $key=>$v){
	}
	$row=array();
	$row['list'] = $data;
	$row['page'] = $page;
	$row['count'] = $count;
	
	return $row;
}
//排行榜
function getRankList($map,$size)
{
	$field = "m.user_name,sum(t.investor_capital) as total";
	$pre = C('DB_PREFIX');
	$list = M("borrow_investor")->alias('t')->join("{$pre}members m on t.investor_uid=m.id")->field($field)->where($map)->group("m.user_name")->order("total DESC")->limit($size)->select();
	return $list;
}

//近期投资
function getRecentList($size)
{
	$field = "m.user_name,t.investor_capital,t.add_time";
	$pre = C('DB_PREFIX');
	$list = M("borrow_investor")->alias('t')->join("{$pre}members m on t.investor_uid=m.id")->field($field)->where("t.status>=4")->order("t.id desc")->limit($size)->select();
	return $list;
}


function getTenderList($map,$size,$limit=10, $orderby='d.id DESC'){
	$pre = C('DB_PREFIX');
	$Bconfig = require C("APP_ROOT")."Conf/borrow_config.php";
	
	if($size){
		//分页处理
		import("ORG.Util.Page");
		$count = M('borrow_investor')->alias("d")->where($map)->count('distinct d.borrow_id');
		$p = new Page($count, $size);
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		//分页处理
	}else{
		$page="";
		$Lsql=$limit;
	}
	
	$type_arr =C('BORROW_TYPE');
	$field = "d.sort_order,d.deadline,d.borrow_id,m.user_name as borrow_user,b.borrow_duration,b.has_pay,b.borrow_interest_rate,b.add_time as borrow_time,b.borrow_money,b.borrow_name,m.credits,b.repayment_type,b.borrow_type,b.reward_type,b.is_tuijian,b.password,d.repayment_time,sum(d.capital+d.interest) repay_money";
	$groupbyfield="d.deadline,d.borrow_id,m.user_name,b.borrow_duration,b.has_pay,b.borrow_interest_rate,b.add_time,b.borrow_money,b.borrow_name,m.credits,b.repayment_type,b.borrow_type,b.reward_type,b.is_tuijian,b.password,d.repayment_time";
	$list = M('investor_detail')->alias("d")->field($field)->where($map)->join("{$pre}borrow_info b ON b.id=d.borrow_id")->join("{$pre}members m ON m.id=b.borrow_uid")->
		order($orderby)->group($groupbyfield)->limit($Lsql)->select();
	foreach($list as $key=>$v){
		$list[$key]['total'] = ($v['borrow_type']==3)?"1":$v['borrow_duration'];
		$list[$key]['back'] = $v['has_pay'];
	}

	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	$row['total_money'] = M('borrow_investor i')->where($map)->sum('investor_capital');
	$row['total_num'] = $count;
	return $row;
}

function getAllBorrowStat(){
	$allBorrowTypes = C('BORROW_TYPE');
	$statResult = M('borrow_info')->field("borrow_type, count(1) type_num")->where("borrow_status>5")->group("borrow_type")->select();
	$res = array();
	if(!empty($statResult)){
		foreach($statResult as $v){
			$res[$v["borrow_type"]] = $v["type_num"];
		}
	}
	return $res;
}
?>