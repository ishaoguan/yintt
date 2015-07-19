<?php
include "SmsBase.class.php";
/**
 * 直接调用URL方式短信接口
 * 
 * @author leochen
 *        
 */
class SmsUrlInvoke extends SmsBase {
	public function getFee1() {
		// $d = @file_get_contents("http://service.winic.org:8009/webservice/public/remoney.asp?uid={$this->msgconfig['sms']['user']}&pwd={$this->msgconfig['sms']['pass']}",false);
		// 功能：获得企业用户余额
		// 备用IP地址为203.81.21.13
		// success:id=300&err=成功&errid=0&short=粤商伟业
		// error:id=0&err=该企业用户无效&errid=6001
		$fp = fopen ( $this->ismsinfo ["GETFEE_URL"] . "?name=" . $this->msgconfig ['sms'] ['user'] . "&pwd=" . $this->msgconfig ['sms'] ['pass'], "r" );
		$ret = fgetss ( $fp, 255 );
		$ret = auto_charset ( $ret, "gbk", 'utf-8' );
		fclose ( $fp );
		$data = dealSmsResult ( $ret );
		if ($data ["errid"] == 0) {
			$d = $data ["id"];
		} else {
			if (isset ( $data ["err"] )) {
				$d = $data ["err"];
			} else {
				$d = "未知返回结果！";
			}
		}
		return $d;
	}
	public function getFee() {
		$http = 'http://119.145.9.12/getSmsBalance.action';
		$data = array
		(
				'enterpriseID'=>"15621",
				'loginName'=>"admin",
				'password'=>strtolower(md5("ytt131021"))
		);
		$ret = $this->do_post($http, $data);
		$arr = (array)$ret;
		$balance = str_replace(" ","",strval($arr[0]));
		return $balance;
	}
	public function massSend1($mob,$content, $time, $isSub=false) {
		if(!$isSub){
			$uid = $this->msgconfig ['sms'] ['user']; // 分配给你的账号
			$pwd = $this->msgconfig ['sms'] ['pass']; // 密码
		}else{
			$uid = $this->msgconfig ['sms'] ['subuser']; // 分配给你的账号
			$pwd = $this->msgconfig ['sms'] ['subpass']; // 密码
		}
		$mob = $mob; // 发送号码用逗号分隔
		$content = urlencode ( auto_charset ( $content, "utf-8", 'gbk' ) ); // 短信内容
		                                                          
		// 功能：发送短信
		// $time = date('YmdHi',time());
		
		// 备用IP地址为203.81.21.13
		$fp = fopen ( $this->ismsinfo ["MASSSEND_URL"] . "?name=$uid&pwd=$pwd&dst=$mob&msg=$content&time=$time", "r" );
		$ret = fgetss ( $fp, 255 );
		$ret = auto_charset ( $ret, "gbk", 'utf-8' );
		fclose ( $fp );
		$data = dealSmsResult ( $ret );
		return $data;
	}
	
	public function massSend($mob,$content,$time)
	{
	
		$http = 'http://119.145.9.12/sendSMS.action';
		$content = str_replace("@", "", $content);
		$data = array
		(
				'enterpriseID'=>"15621",
				'loginName'=>"admin",
				'password'=>strtolower(md5("ytt131021")),
				'smsId'=>"",
				'subPort'=>"",
				'Phone'=>"",
				'mobiles'=>$mob,
				'content'=>$content,
				'sendTime'=>$time
		);
		$ret = $this->do_post($http, $data);
		$xml = simplexml_load_string($ret);
		if($xml->Result != 0){
			LOG::write(dump($xml, false, null, false));
		}
		return $xml;
	}
	
	
// 	function postfeed($url,$data)
// 	{
// 		$row = parse_url($url);
// 		$host = $row['host'];
// 		$port = $row['port'] ? $row['port']:80;
// 		$file = $row['path'];
// 		while ((list($k,$v) = each($data))!=FALSE)
// 		{
// 			$post .= rawurlencode($k)."=".rawurlencode($v)."&";
// 		}
// 		$post = substr( $post , 0 , -1 );
// 		$len = strlen($post);
// 		$fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
// 		if (!$fp) {
// 			return "$errstr ($errno)\n";
// 		} else {
// 		$receive = '';
// 				$out = "POST $file HTTP/1.1\r\n";
// 				$out .= "Host: $host\r\n";
// 				$out .= "Content-type: application/x-www-form-urlencoded\r\n";
// 				$out .= "Connection: Close\r\n";
// 				$out .= "Content-Length: $len\r\n\r\n";
// 				$out .= $post;
// 				fwrite($fp, $out);
// 				while (!feof($fp)) {
// 								$receive .= fgets($fp, 128);
// 		}
// 		fclose($fp);
// 		dump($receive);
// 		$receive = explode("\r\n\r\n",$receive);
// 		unset($receive[0]);
// 		return implode("",$receive);
// 		}
// 	}
	function do_post($url, $data)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_URL, $url);
		$ret = curl_exec($ch);
	
		curl_close($ch);
		return $ret;
	}
	function get_url_contents($url)
	{
	    if (ini_get("allow_url_fopen") == "1")
	        return file_get_contents($url);
	
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    $result =  curl_exec($ch);
	    curl_close($ch);
		if(empty($result)) exit("need 'curl' OR 'allow_url_fopen'");
	    return $result;
	}
}
