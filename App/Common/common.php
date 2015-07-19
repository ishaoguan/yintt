<?php
require APP_PATH."Common/Lib.php";
require APP_PATH."Common/DataSource.php";
function acl_get_key(){
	empty($model)?$model=strtolower(MODULE_NAME):$model=strtolower($model);
	empty($action)?$action=strtolower(ACTION_NAME):$action=strtolower($action);
	
	$keys = array($model,'data','eqaction_'.$action);
	require C('APP_ROOT')."Common/acl.inc.php";
	$inc = $acl_inc;
	
	$array = array();
	foreach($inc as $key => $v){
			if(isset($v['low_leve'][$model])){
				$array = $v['low_leve'];
				continue;
			}
	}//找到acl.inc中对当前模块的定义的数组
	
	$num = count($keys);
	$num_last = $num - 1;
	$this_array_0 = &$array;
	$last_key = $keys[$num_last];
	
	for ($i = 0; $i < $num_last; $i++){
		$this_key = $keys[$i];
		$this_var_name = 'this_array_' . $i;
		$next_var_name = 'this_array_' . ($i + 1);        
		if (!array_key_exists($this_key, $$this_var_name)) {            
			break;       
		}        
		$$next_var_name = &${$this_var_name}[$this_key];    
	}    
	/*取得条件下的数组  ${$next_var_name}得到data数组 $last_key即$keys = array($model,'data','eqaction_'.$action);里面的'eqaction_'.$action,所以总的组成就是，在acl.inc数组里找到键为$model的数组里的键为data的数组里的键为'eqaction_'.$action的值;*/
	$actions = ${$next_var_name}[$last_key];//这个值即为当前action的别名,然后用别名与用户的权限比对,如果是带有参数的条件则$actions是数组，数组里有相关的参数限制
	if(is_array($actions)){
		foreach($actions as $key_s => $v_s){
			$ma = true;
			if(isset($v_s['POST'])){
				foreach($v_s['POST'] as $pkey => $pv){
					switch($pv){
						case 'G_EMPTY';//必须为空
							if( isset($_POST[$pkey]) && !empty($_POST[$pkey]) ) $ma = false;
						break;
					
						case 'G_NOTSET';//不能设置
							if( isset($_POST[$pkey]) ) $ma = false;
						break;
					
						case 'G_ISSET';//必须设置
							if( !isset($_POST[$pkey]) ) $ma = false;
						break;
					
						default;//默认
							if( !isset($_POST[$pkey]) || strtolower($_POST[$pkey]) != strtolower($pv) ) $ma = false;
						break;
					}
				}
			}
			
			if(isset($v_s['GET'])){
				foreach($v_s['GET'] as $pkey => $pv){
					switch($pv){
						case 'G_EMPTY';//必须为空
							if( isset($_GET[$pkey]) && !empty($_GET[$pkey]) ) $ma = false;
						break;
					
						case 'G_NOTSET';//不能设置
							if( isset($_GET[$pkey]) ) $ma = false;
						break;
					
						case 'G_ISSET';//必须设置
							if( !isset($_GET[$pkey]) ) $ma = false;
						break;
					
						default;//默认
							if( !isset($_GET[$pkey]) || strtolower($_GET[$pkey]) != strtolower($pv) ) $ma = false;
						break;
					}
					
				}
			}
			if($ma)	return $key_s;
			else $actions="0";
		}//foreach
	}else{
		return $actions;
	}
}

function getbUrl($id){
	switch($id){
		case 1:
			return "/help/question/36.html";
		break;
		case 2:
			return "/help/question/37.html";
		break;
		case 3:
			return "/help/question/38.html";
		break;
		case 4:
			return "/help/question/39.html";
		break;
	}
}

function getExpandCode($uid){
	$expand_num = D('members')->where(array('id'=>$uid))->getField('expand_num');
	if(empty($expand_num)){
// 		$expand_num = sprintf("%d",rand(1000000,9999999));
// 		$times = 0;
// 		$confcount = 100;
// 		while(true){
// 			$count = D('members')->where(array('expand_num'=>$expand_num))->count("*");
// 			if($count > 0){
// 				$expand_num = sprintf("%d",rand(1000000,9999999));
// 				++$times;
// 			}else{
// 				break;
// 			}
// 			if($times == $confcount){
// 				$expand_num = "对不起，推广号已发送完毕，请联系粤商伟业！";
// 				break;
// 			}
// 		}
// 		if($times < $confcount)
// 			D('members')->where(array('id'=>$uid))->save(array('expand_num'=>$expand_num));
		$max_expand_num = D('members')->where('expand_num is not null')->max("expand_num+0");
		if(empty($max_expand_num)){
			$expand_num = 10;
		}else{
			$expand_num = $max_expand_num + 1;
		}
		D('members')->where(array('id'=>$uid))->save(array('expand_num'=>$expand_num));
	}
	return $expand_num;
}

function judgeHttps($isAjax=false){
	if($isAjax)return;
	$need_https_urls = C('NEED_HTTPS_URLS');
	$no_need_https_urls = C('NO_NEED_HTTPS_URLS');
	$disabled_ssl_urls = C('DISABLED_SSL_URLS');
	if(in_array(strtolower($_SERVER["HTTP_HOST"]), $disabled_ssl_urls))return;
	if(in_array(strtolower($_SERVER["REQUEST_URI"]), $no_need_https_urls))return;
	foreach($need_https_urls as $myurl){
		if(strpos(strtolower($_SERVER["REQUEST_URI"]), $myurl) !== false){
// 			forceHttps();
			forceHttp();
			return;
		}
	}
	if ($_SERVER["HTTPS"]=="on"){
		$xredir="http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		header("Location: ".$xredir);
		exit;
	}
}
function forceHttps(){
	$disabled_ssl_urls = C('DISABLED_SSL_URLS');
	if(in_array(strtolower($_SERVER["HTTP_HOST"]), $disabled_ssl_urls))return;
	if ($_SERVER["HTTPS"]<>"on"){
		$xredir="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		header("Location: ".$xredir);
		exit;
	}
}
function forceHttp(){
	if ($_SERVER["HTTPS"]=="on"){
		$xredir="http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		header("Location: ".$xredir);
		exit;
	}
}

function saveCommonLog($recordId, $logContent, $tableName, $userName, $userId, $opType, $logType="SYSTEM", $userType="ADMIN"){
	$now = date("Y-m-d H:i:s", time());
	$logData["record_id"] = $recordId;
	$logData["log_content"] = "[".$userName."]在".$now.$logContent;
	$logData["log_table"] = $tableName;
	$logData["log_type"] = $logType;
	$logData["operation_type"] = $opType;
	$logData["user_type"] = $userType;
	$logData["create_time"] = $now;
	$logData["create_userid"] = $userId;
	M("operation_log")->add($logData);
}

function saveDataLog($recordId, $oldData, $newData, $chkInfo, $userName, $userId, $opType, $logType="SYSTEM", $userType="ADMIN"){
	if(is_array($chkInfo)){
		$tableName = $chkInfo['TABLE_NAME'];
		$chkInfo = array_splice($chkInfo, 1);
		$logContent = "将\n";
		$hasChange = false;
		foreach($chkInfo as $k=>$v){
			if($oldData[$k]!=$newData[$k]){
				$hasChange = true;
				if(!empty($v['param'])){
					$params = C($v['param']);
					if(!empty($params[$oldData[$k]]))
						$oldData[$k] = $params[$oldData[$k]];
					if(!empty($params[$newData[$k]]))
						$newData[$k] = $params[$newData[$k]];
				}
				$logContent.='['.$v['name'].']由['.$oldData[$k].']改为['.$newData[$k]."],\n";
			}
		}
		if($hasChange){
			$logContent = rtrim($logContent, ",\n");
			saveCommonLog($recordId, $logContent, $tableName, $userName, $userId, $opType);
		}
	}
}


function massSmsLog($content, $receivers, $user_id, $borrow_id, $create_user, $smstype, $errid=null, $err=null){
	if(is_array($receivers) && count($receivers) > 0){
		$model = M("sms_content");
		$model->startTrans();
		$ret = $model->add(array("sms_content"=>$content, "borrow_id"=>$borrow_id,"sms_type"=>$smstype, "create_time"=>date('Y-m-d H:i:s',time()), "create_user"=>$create_user, "deal_flag"=>"1", "deal_user"=>$create_user, "deal_time"=>date('Y-m-d H:i:s',time())));
		if($ret !== false){
			$data = array();
			$i = 0;
			foreach($receivers as $r){
				if(!empty($r)){
					$data[$i]["sms_log_id"] = $ret;
					$data[$i]["phone_number"] = $r;
					$data[$i]["sms_status"] = "1";
					if(!empty($user_id))
						$data[$i]["uid"] = $user_id[$i];
					$data[$i]["error_code"] = $errid;
					$data[$i]["error_info"] = $err;
					++$i;
				}
			}
			if(count($data) > 0){
				M("sms_receiver")->addAll($data);
			}
			$model->commit() ;
			return $ret;
		}else{
			$model->rollback();
			return false;
		}
	}
}

function massEmailLog($subject, $content, $emailtype, $sender, $receivers, $create_uid=null, $sent_time=null, $borrow_id=null){
	if(is_array($receivers) && count($receivers) > 0){
		$model = M("email");
		$model->startTrans();
		$ret = $model->add(array("title"=>$subject, "content"=>$content, "email_type"=>$emailtype, "sender"=>$sender, "create_time"=>date('Y-m-d H:i:s',time()), "create_uid"=>$create_uid, "borrow_id"=>$borrow_id));
		if($ret !== false){
			$data = array();
			$i = 0;
			foreach($receivers as $r){
				if(!empty($r)){
					$data[$i]["uid"] = $r["uid"];
					$data[$i]["email_id"] = $ret;
					$data[$i]["receiver"] = $r["email"];
					$data[$i]["receiver_type"] = $r["type"];
					if(!empty($sent_time))$data[$i]["sent_time"] = $sent_time;
					++$i;
				}
			}
			if(count($data) > 0){
				M("email_receiver")->addAll($data);
			}
			$model->commit() ;
			return $ret;
		}else{
			$model->rollback();
			return false;
		}
	}
}

function investEmail($subject, $content, $emailtype, $tip_type, $borrow_id){
	$pre = C("DB_PREFIX");
	$msgconfig = FS("Webconfig/msgconfig");
	$sender = $msgconfig['stmp']['user'];
	$ret = M("email")->add(array("title"=>$subject, "content"=>$content, "email_type"=>$emailtype, "sender"=>$sender, "create_time"=>date('Y-m-d H:i:s',time()), "borrow_id"=>$borrow_id));
	if($ret !== false){
		$isql = "INSERT INTO `{$pre}email_receiver`(uid,email_id,receiver,receiver_type)(SELECT distinct b.id,{$ret},b.user_email,'to' FROM `{$pre}members_status` a INNER JOIN `{$pre}members` b ON a.uid=b.id left join {$pre}sys_tip c on a.uid=c.uid
		 inner join {$pre}borrow_investor bi on bi.investor_uid=a.uid WHERE a.email_status='1' AND b.user_email IS NOT NULL AND b.user_email<>'' AND (c.`tipset` IS NULL OR c.`tipset` LIKE '%{$tip_type}%') AND bi.borrow_id={$borrow_id})";
		$ret = M()->execute($isql);
		return $ret;
	}else{
		return false;
	}
}

function investDetailEmail($subject, $content, $emailtype, $tip_type, $borrow_id){
	$pre = C("DB_PREFIX");
	$msgconfig = FS("Webconfig/msgconfig");
	$sender = $msgconfig['stmp']['user'];
	$ret = M("email")->add(array("title"=>$subject, "content"=>$content, "email_type"=>$emailtype, "sender"=>$sender, "create_time"=>date('Y-m-d H:i:s',time()), "borrow_id"=>$borrow_id));
	if($ret !== false){
		$isql = "INSERT INTO `{$pre}email_receiver`(uid,email_id,receiver,receiver_type)(SELECT distinct b.id,{$ret},b.user_email,'to' FROM `{$pre}members_status` a INNER JOIN `{$pre}members` b ON a.uid=b.id left join {$pre}sys_tip c on a.uid=c.uid
		 inner join {$pre}investor_detail ind on ind.investor_uid=a.uid WHERE a.email_status='1' AND b.user_email IS NOT NULL AND b.user_email<>'' AND (c.`tipset` IS NULL OR c.`tipset` LIKE '%{$tip_type}%') AND ind.borrow_id={$borrow_id})";
		$ret = M()->execute($isql);
		return $ret;
	}else{
		return false;
	}
}

function getSign($type,$data, $payConfig, $signarr=null){
	$md5str="";
	switch($type){
		case "gfb":
			if(!$signarr){
				$signarray=array(
				"version",
				"tranCode",
				"merchantID",
				"merOrderNum",
				"tranAmt",
				"feeAmt",
				"tranDateTime",
				"frontMerUrl",
				"backgroundMerUrl",
				"orderId",
				"gopayOutOrderId",
				"tranIP",
				"respCode"
						);
			}else{
				$signarray = $signarr;
			}
			foreach($signarray as $v){
				if(!isset($data[$v])) $md5str .= "$v=[]";
				else $md5str .= "$v=[$data[$v]]";
			}
			$md5str.="VerficationCode=[".$payConfig['guofubao']['VerficationCode']."]";
			$md5str = md5($md5str);
			return $md5str;
			break;
		case "ips" :
			$md5str = "billno".$data['Billno']."currencytype".$data['Currency_Type']."amount".$data['Amount']."date".$data['Date']."orderencodetype".$data['OrderEncodeType'];
			$md5str .= $payConfig['ips']['MerKey'];
			$md5str = md5( $md5str );
			return $md5str;
			break;
		case "ips_return" :
			$md5str = "billno".$data['billno']."currencytype".$data['Currency_type']."amount".$data['amount']."date".$data['date']."succ".$data['succ']."ipsbillno".$data['ipsbillno']."retencodetype".$data['retencodetype'];
			$md5str .= $payConfig['ips']['MerKey'];
			$md5str = md5( $md5str );
			return $md5str;
			break;
		case "chinabank":
			$signarray=array(
			"v_amount",
			"v_moneytype",
			"v_oid",
			"v_mid",
			"v_url"
					);
					foreach($signarray as $v){
						if(!isset($data[$v])) $md5str .= "";
						else $md5str .= "$data[$v]";
					}
					$md5str.=$payConfig['chinabank']['mkey'];
					$md5str = md5($md5str);
					return $md5str;
					break;
		case "chinabank_return":
			$signarray=array(
			"v_oid",
			"v_pstatus",
			"v_amount",
			"v_moneytype"
					);
					foreach($signarray as $v){
						if(!isset($data[$v])) $md5str .= "";
						else $md5str .= "$data[$v]";
					}
					$md5str.=$payConfig['chinabank']['mkey'];
					$md5str = md5($md5str);
					return $md5str;
					break;
		case "allinpay":
			foreach ($data as $k=>$v){
				$md5str.="$k=$data[$k]&";
			}
			$md5str.= "key={$payConfig['allinpay']['mkey']}";
			$md5str = strtoupper(md5($md5str));
			return $md5str;
			break;
	}
}
function getUrlDecode($url)
{
	$strurl=urldecode($url);
	return $strurl;
}

?>