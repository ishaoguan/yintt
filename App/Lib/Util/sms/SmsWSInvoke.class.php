<?php
include_once "SmsBase.class.php";
include_once C('APP_ROOT')."Lib/Util/des/DesUtil.php";
/**
 * Webservice 方式短信接口
 * @author leochen
 *
 */
class SmsWSInvoke extends SmsBase{
	var $smsdeskey = "12345678";
	var $wsdl;
	
	public function _initialize(){
		$this->wsdl = $this->ismsinfo["WS_URL"];
	}
	
	public function getFee(){
		$client = new SoapClient($this->wsdl);
		$sName = $this->msgconfig['sms']['user'];
		$sPwdDES = do_mencrypt($this->msgconfig['sms']['pass'], $this->smsdeskey);
		$param = array('sName'=>$sName,'sPwd'=>$sPwdDES);
		$ret = $client->getFee($param);
		$data = dealSmsResult($ret->getFeeResult);
		if($data["errid"] == 0){
			$d = $data["id"];
		}else{
			if(isset($data["err"])){
				$d = $data["err"];
			}else{
				$d = "未知返回结果！";
			}
		}
		return $d;
	}
	
	public function massSend1($mob, $content, $time, $isSub=false){
		$client = new SoapClient($this->wsdl);
		if(!$isSub){
			$sName = $this->msgconfig['sms']['user'];
			$sPwdDES = do_mencrypt($this->msgconfig['sms']['pass'], $this->smsdeskey);
		}else{
			$sName = $this->msgconfig['sms']['subuser'];
			$sPwdDES = do_mencrypt($this->msgconfig['sms']['subpass'], $this->smsdeskey);
		}
		$sDst = do_mencrypt($mob, $this->smsdeskey);
		$sMsg = do_mencrypt(auto_charset($content,"utf-8",'gbk'), $this->smsdeskey);
		$sTime = do_mencrypt($time, $this->smsdeskey);
		$sExNo = do_mencrypt('', $this->smsdeskey);
		$param = array('sName'=>$sName,'sPwd'=>$sPwdDES, 'sDst'=>$sDst, 'sMsg'=>$sMsg, 'sTime'=>$sTime, 'sExNo'=>$sExNo);
		try{
			$ret = $client->massSend($param);
			$data = dealSmsResult($ret->massSendResult);
		}catch(Exception $e){
			$data = $e->getMessage();
		}
		return $data;
	}
	
	public function massSendCcdx($mob, $content, $time, $isSub=false){
		$client = new SoapClient($this->wsdl);
		if(!$isSub){
			$sName = $this->msgconfig['sms']['user'];
			$sPwdDES = do_mencrypt($this->msgconfig['sms']['pass'], $this->smsdeskey);
		}else{
			$sName = $this->msgconfig['sms']['subuser'];
			$sPwdDES = do_mencrypt($this->msgconfig['sms']['subpass'], $this->smsdeskey);
		}
		$sDst = do_mencrypt($mob, $this->smsdeskey);
		$sMsg = do_mencrypt(auto_charset($content,"utf-8",'gbk'), $this->smsdeskey);
		$sTime = do_mencrypt($time, $this->smsdeskey);
		$sExNo = do_mencrypt('', $this->smsdeskey);
		$param = array('sName'=>$sName,'sPwd'=>$sPwdDES, 'sDst'=>$sDst, 'sMsg'=>$sMsg, 'sTime'=>$sTime, 'sExNo'=>$sExNo, 'smsType'=>'CCDX');
		try{
			$ret = $client->massSendCcdx($param);
			$data = dealSmsResult($ret->massSendCcdxResult);
		}catch(Exception $e){
			$data = $e->getMessage();
		}
		return $data;
	}
	
	public function massSend($mob,$content,$time)
	{
	
		$http = 'http://119.145.9.12/services/emsServices?wsdl';
		$data = array
		(
				'enterpriseID'=>"15440",
				'loginName'=>"admin",
				'password'=>strtolower(md5("kouyan1559")),
				'smsId'=>"",
				'subPort'=>"",
				'Phone'=>"",
				'mobiles'=>$mob,
				'content'=>iconv("gbk", "utf-8//IGNORE", $content),
				'sendTime'=>$time
		);
		$re	= postfeed($http,$data);						//POST
	
		return $re;
	}
	
	
	function postfeed($url,$data='')
	{
		$row = parse_url($url);
		$host = $row['host'];
		$port = $row['port'] ? $row['port']:80;
		$file = $row['path'];
		while ((list($k,$v) = each($data))!=FALSE)
		{
			$post .= rawurlencode($k)."=".rawurlencode($v)."&";
		}
		$post = substr( $post , 0 , -1 );
		$len = strlen($post);
		$fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
		if (!$fp) {
			return "$errstr ($errno)\n";
		} else {
		        $receive = '';
				$out = "POST $file HTTP/1.1\r\n";
				$out .= "Host: $host\r\n";
				$out .= "Content-type: application/x-www-form-urlencoded\r\n";
				$out .= "Connection: Close\r\n";
				$out .= "Content-Length: $len\r\n\r\n";
				$out .= $post;
				fwrite($fp, $out);
				while (!feof($fp)) {
						$receive .= fgets($fp, 128);
				}
				fclose($fp);
				$receive = explode("\r\n\r\n",$receive);
				unset($receive[0]);
				return implode("",$receive);
		}
	}
}