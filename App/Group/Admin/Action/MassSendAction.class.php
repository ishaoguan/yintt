<?php
class MassSendAction extends ACommonAction
{
	var $smsLimit  =1000;
	
	public function index(){
		$curType = 'MASS_SEND';
        $count = M('sms_content')->alias('t')->where(array("t.sms_type"=>$curType))->count("1");
        import("ORG.Util.Page");
        $p = new Page($count, C('ADMIN_PAGE_SIZE'));
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		$list = M('sms_content')->alias('t')->join("left join {$this->pre}ausers au on au.id=t.deal_user")->
        	field("t.*,au.real_name deal_user_name,(select count(1) from {$this->pre}sms_receiver sr where sr.sms_log_id=t.id and sr.sms_status='0') wait_send_count,
        		(select count(1) from {$this->pre}sms_receiver sr where sr.sms_log_id=t.id and sr.sms_status='1') suc_send_count,
        		(select count(1) from {$this->pre}sms_receiver sr where sr.sms_log_id=t.id and sr.sms_status='2') err_send_count")->
			where(array("t.sms_type"=>$curType))->limit($Lsql)->order("t.id DESC")->select();
		$this->assign("list", $list);
        $this->assign("pagebar", $page);
		$this->display();
	}
	
	public function edit(){
		$id = intval($_GET['id']);
		if(!empty($id)){
			$sms_content = M('sms_content')->getFieldById($id, "sms_content");
			$data["id"] = $id;
			$data["sms_content"] = $sms_content;
			$this->assign("vo", $data);
		}
		$this->display();
	}
	
	public function doEdit(){
		$id=intval($_POST['id']);
		$sms_content = text($_POST['smsContent']);
		$smsReceiver = $_POST['smsReceiver'];
		if(empty($sms_content))$this->error("短信内容不能为空");
		$len = cnstrlen($sms_content);
		if($len > 240)$this->error("短信内容为不能超过240个汉字、字符、数字组成的字符串");
		
		if(empty($id)){
			$ret = massSmsNotify($sms_content, $this->admin_id);
			if($ret){
				$this->success("添加成功");
			}else{
				$this->error("添加失败");
			}
		}else{
			$deal_flag = M('sms_content')->getFieldById($id,"deal_flag");
			if($deal_flag == 1){
				$this->error("已被处理过的记录无法更改短信内容");
			}
			M('sms_content')->where(array("id"=>$id))->save(array("sms_content"=>$sms_content));
			$this->success("修改成功");
		}
	}

	public function masssend(){
		$id = intval($_GET['id']);
		$sms_content = M('sms_content')->alias("t")->field("t.sms_content")->where(array("id"=>$id))->find();
		$receivers = M('sms_receiver')->alias("t")->field("m.user_name")->join("{$this->pre}members m on t.uid=m.id")->where(array("t.sms_log_id"=>$id, "t.sms_status"=>"0"))->limit($this->smsLimit)->select();
		foreach($receivers as $k=>$v){
			$receiverssarr[] =$v["user_name"];
		}
		$data["id"] = $id;
		$data["sms_content"] = $sms_content["sms_content"];
		$data["receivers"] = implode(",", $receiverssarr);
		$this->assign("vo", $data);
		$this->display();
	}
	
	public function doMasssend(){
		$id=intval($_POST['id']);
		$sms_content = M('sms_content')->alias("t")->field("t.id,t.sms_content")->where(array("id"=>$id))->find();
		$allreceivers = M('sms_receiver')->alias("t")->field("distinct t.phone_number")->where(array("t.sms_log_id"=>$id, "t.sms_status"=>"0"))->limit($this->smsLimit)->select();
		foreach($allreceivers as $k=>$v){
			$receivers[] =$v["phone_number"];
		}
		$content = $sms_content["sms_content"];
		$len = cnstrlen($content);
		if($len == 0)$this->error("短信内容不能为空");
		if($len > 240)$this->error("短信内容为不能超过240个汉字、字符、数字组成的字符串");
		if(checkMessage($sms_content['sms_content'])!=null){
			$this->assign('waitSecond','-1');
			$this->error(checkMessage($sms_content['sms_content']));
		}
		$sms_log_id = $sms_content["id"];
		if(empty($receivers))$this->error("发送失败，接受者为空");
		$rcount = count($receivers);
		if(C('SMS_TYPE') == "REAL"){
			//每次发送100条
			$perCount = 100;
			$pageCount = ceil($rcount/$perCount);
			$errmsg = "";
			$allsuccess = 0;
			$allfail = 0;
			$allerrid = "";
			$allerr = "";
			for($i = 1; $i <= $pageCount; ++$i){
				$curreceivers = array_slice($receivers,($i-1)*$perCount, $perCount);
				$data = array();
				if($len <= 70){//发送正常短信
					$data = masssendsms(implode(",", $curreceivers), $content, '', false, true);
				}else{//发送超过70个汉字的短信
					$data = masssendsms(implode(",", $curreceivers), $content, '', true, true);
				}
				if(is_array($data)){
					$success = array();
					$faile = array();
					if(!empty($data["success"]))$success = explode(",", $data["success"]);
					if(!empty($data["faile"]))$faile = explode(",", $data["faile"]);
					if(!empty($data["num"]))$allsuccess = $allsuccess + intval($data["num"]);
					if(!empty($data["errid"]))$allerrid .= $data["errid"];
					if(!empty($data["err"]))$allerr .= $data["err"];
					if(count($success) > 0){
						M('sms_receiver')->where(array("phone_number"=>array("in", $success), "sms_log_id"=>$sms_log_id))->save(array("sms_status"=>1, "error_code"=>$data["errid"], "error_info"=>$data["err"]));
					}
					if(count($faile) > 0){
						$allfail = $allfail + count($faile);
						M('sms_receiver')->where(array("phone_number"=>array("in", $faile), "sms_log_id"=>$sms_log_id))->save(array("sms_status"=>2, "error_code"=>$data["errid"], "error_info"=>$data["err"]));
					}
				}else{
					$errmsg .= $data;
				}
			}
			M('sms_content')->where(array("id"=>$id))->save(array("deal_flag"=>1, "deal_user"=>$this->admin_id, "deal_time"=>date('Y-m-d H:i:s',time())));
			if(!empty($errmsg)){
				$this->assign('waitSecond','-1');
				$this->error("发送失败，失败原因：".$errmsg);
			}
			
			$this->assign('waitSecond','5');
			$this->success("发送结果:<br>发送成功{$allsuccess}条，<br>发送失败[".$allfail."]条，<br>(错误)编码[{$allerrid}]，<br>(错误)原因[{$allerr}]");
		}else{//模拟发送
			M('sms_receiver')->where(array("sms_log_id"=>$sms_log_id, "phone_number"=>array("in", $receivers)))->save(array("sms_status"=>1, "error_info"=>"模拟群发成功"));
			M('sms_content')->where(array("id"=>$id))->save(array("deal_flag"=>1, "deal_user"=>$this->admin_id, "deal_time"=>date('Y-m-d H:i:s',time())));
			$this->assign('waitSecond','3');
			$this->success("发送结果:<br>模拟发送成功{$rcount}条，<br>");
		}
	}
}