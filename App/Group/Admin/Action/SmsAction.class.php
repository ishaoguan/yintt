<?php
// 全局设置
class SmsAction extends ACommonAction
{
	var $ismsinfo = NULL;
	public function _MyInit(){
		$this->ismsinfo = C("ISMS_INFO");
		$msgconfig = FS("Webconfig/msgconfig");
        $this->assign("smsuid", $msgconfig['sms']['user']);
        $this->assign("smspwd", $msgconfig['sms']['pass']);
	}
	
	public function getFee(){
        $this->display();
	}
	
	/**
	 * success:id=300&err=成功&errid=0&short=XXX
	 * error:id=0&err=该企业用户无效&errid=6001
	 */
	public function doGetFee(){
		//功能：获得企业用户余额
		$name = $_POST["name"];
		$pwd  = $_POST["pwd"];
		//备用IP地址为203.81.21.13
	    $fp=fopen($this->ismsinfo["GETFEE_URL"]."?name=$name&pwd=$pwd","r");
		$ret  = fgetss($fp,255);
		$ret = auto_charset($ret,"gbk",'utf-8');
		fclose($fp);
        $this->assign("msg", "查询结果：".$ret);
        $this->display("getFee");
	}
	
	public function massSend(){
        $this->display();
	}
	
	/**
	 * success:num=1&success=18652044823&faile=&err=发送成功！&errid=0
	 * error:num=0&err=无效的手机号码&errid=6008
	 */
	public function doMassSend(){
		//功能：发送短信
		$name = $_POST["name"];
		$pwd  = $_POST["pwd"];
		$dst  = $_POST["dst"];
		$msg  = $_POST["msg"];
		$time = $_POST["time"];
		$msg=urlencode(auto_charset($msg,"utf-8",'gbk'));
	
		//备用IP地址为203.81.21.13
		$fp = fopen($this->ismsinfo["MASSSEND_URL"]."?name=$name&pwd=$pwd&dst=$dst&msg=$msg&time=$time","r");
		$ret= fgetss($fp,255);
		$ret = auto_charset($ret,"gbk",'utf-8');
		fclose($fp);
        $this->assign("msg", "短信发送结果：".$ret);
        $this->display("massSend");
	}
	
	public function receive(){
        $this->display();
	}
	
	public function doReceive(){
		//功能：主动读取用户上行短信
		$name = $_POST["name"];
		$pwd  = $_POST["pwd"];
		//备用IP地址为203.81.21.13
		$fp = fopen($this->ismsinfo["RECEIVE_URL"]."?name=$name&pwd=$pwd","r");
		$ret  = fgetss($fp,255);
		$ret = auto_charset($ret,"gbk",'utf-8');
		fclose($fp);
        $this->assign("msg", "短信接收结果：".$ret);
        $this->display("receive");
	}
	
	public function cpwd(){
        $this->display();
	}
	
	public function doCpwd(){
		//功能：修改企业用户密码
		$name   = $_POST["name"];
		$pwd    = $_POST["pwd"];
		$newpwd = $_POST["newpwd"];
		//备用IP地址为203.81.21.13
		$fp = fopen($this->ismsinfo["CPWD_URL"]."?name=$name&pwd=$pwd&newpwd=$newpwd","r");
		$ret    = fgetss($fp,255);
		$ret = auto_charset($ret,"gbk",'utf-8');
		fclose($fp);
        $this->assign("msg", "修改企业用户密码结果：".$ret);
        $this->display("cpwd");
	}
}
?>