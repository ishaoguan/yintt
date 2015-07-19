<?php
// 本类由系统自动生成，仅供测试用途
class PayAction extends HCommonAction {
	var $paydetail = NULL;
	var $payConfig = NULL;
	var $locked = false;
	var $return_url = "";
	var $notice_url = "";
	var $tenpay_rtn_url = "";
	var $tenpay_notice_url = "";
	var $member_url = "";
	
	public function _Myinit(){
		$url_prefix = "http://";
		$this->return_url = $url_prefix.$_SERVER['HTTP_HOST']."/Pay/payreturn";
		$this->notice_url = $url_prefix.$_SERVER['HTTP_HOST']."/Pay/paynotice";
		$this->tenpay_rtn_url = $url_prefix.$_SERVER['HTTP_HOST']."/Pay/tenpayreturn";
		$this->tenpay_notice_url = $url_prefix.$_SERVER['HTTP_HOST']."/Pay/tenpaynotice";
		$this->member_url = $url_prefix.$_SERVER['HTTP_HOST']."/member";
		$this->payConfig = FS("Webconfig/payconfig");
	}
	
	public function offline(){
		$this->getPaydetail();
		$this->paydetail['money'] = floatval($_POST['money_off']);
		//本地要保存的信息
		$this->paydetail['fee'] = 0;
		$this->paydetail['nid'] = 'offline';
		$this->paydetail['way'] = 'off';
		$this->paydetail['tran_id'] = text($_POST['tran_id']);
		$this->paydetail['off_bank'] = text($_POST['off_bank']);
		$this->paydetail['off_way'] = text($_POST['off_way']);
		$newid = M('member_payonline')->add($this->paydetail);
		if($newid) $this->success("线下充值提交成功，请等待管理员审核",__APP__."/member/charge#fragment-2");
		else $this->success("线下充值提交失败，请重试");
	}
	
    public function guofubaopay(){
		if($this->payConfig['guofubao']['enable']==0) exit("对不起，该支付方式被关闭，暂时不能使用!");
		$this->getPaydetail();
		
		$gfbparams = C('GFB_PARAMS');
		$submitUrl = $gfbparams["PRODUCT_URL"];
		$merchantID = $this->payConfig['guofubao']['merchantID'];
		$virCardNoIn = $this->payConfig['guofubao']['virCardNoIn'];
		if(C('GFB_TEST')){
			$submitUrl = $gfbparams["TEST_URL"];
			$merchantID = $gfbparams["TEST_MERCHANTID"];
			$virCardNoIn = $gfbparams["TEST_VIRCARDNOIN"];
		}
		
		$submitdata['charset'] = 2;
		$submitdata['language'] = 1;
		$submitdata['version'] = "2.0";
		$submitdata['tranCode'] = '8888';
		$submitdata['feeAmt'] = 0;
		$submitdata['currencyType'] = 156;
		$submitdata['merOrderNum'] = "guofu".date("YmdHis").rand(10000,99999);
		$submitdata['tranDateTime'] = date("YmdHis",time());
		$submitdata['tranIP'] = get_client_ip();
		$submitdata['goodsName'] = $this->glo['web_name']."帐户充值";
		$submitdata['frontMerUrl'] = $this->return_url."?payid=gfb";
		$submitdata['backgroundMerUrl'] = $this->notice_url."?payid=gfb";
		$submitdata['merchantID'] = $merchantID;//商户ID
		$submitdata['virCardNoIn'] = $virCardNoIn;//国付宝帐户
		$submitdata['tranAmt'] = $this->paydetail['money'];
		if($this->paydetail['bank']) $submitdata['bankCode'] = $this->paydetail['bank'];//银行直联必须
		$submitdata['userType'] = 1;//银行直联,1个人,2企业
		$submitdata['signValue'] = $this->getSign('gfb',$submitdata);
		
		//本地要保存的信息
		$this->paydetail['fee'] = getFloatValue($this->payConfig['guofubao']['feerate'] * $this->paydetail['money'] / 100,2);
		$this->paydetail['nid'] = $this->createnid('gfb',$submitdata['merOrderNum']);
		$this->paydetail['way'] = 'gfb';
		$this->paydetail['mer_order_num'] = $submitdata['merOrderNum'];
		M('member_payonline')->add($this->paydetail);
		$this->create($submitdata, $submitUrl);
    }

	//迅环支付
	public function ips(){
		if ( $this->payConfig['ips']['enable'] == 0 )
		{
						exit( "对不起，该支付方式被关闭，暂时不能使用!" );
		}
		$this->getPaydetail();
		$submitdata['Mer_code'] = $this->payConfig['ips']['MerCode'];
		$submitdata['Billno'] = date( "YmdHis" ).mt_rand( 100000, 999999 );
		$submitdata['Date'] = date( "Ymd" );
		$submitdata['Amount'] = number_format( $this->paydetail['money'], 2, ".", "" );
		$submitdata['DispAmount'] = $submitdata['Amount'];
		$submitdata['Currency_Type'] = "RMB";
		$submitdata['Gateway_Type'] = "01";
		$submitdata['Lang'] = "GB";
		$submitdata['Merchanturl'] = $this->return_url."?payid=ips";
		$submitdata['FailUrl'] = $this->return_url."?payid=ips";
		$submitdata['ErrorUrl'] = "";
		$submitdata['Attach'] = "";
		$submitdata['OrderEncodeType'] = "5";
		$submitdata['RetEncodeType'] = "17";
		$submitdata['Rettype'] = "1";
		$submitdata['ServerUrl'] = $this->notice_url."?payid=ips";
		$submitdata['SignMD5'] = $this->getSign( "ips", $submitdata );
		$submitdata['DoCredit'] = "1";
		$submitdata['Bankco'] = $this->paydetail['bank'];
		$this->paydetail['fee'] = getfloatvalue( $this->payConfig['ips']['feerate'] * $this->paydetail['money'] / 100, 2 );
		$this->paydetail['nid'] = $this->createnid( "ips", $submitdata['Billno'] );
		$this->paydetail['way'] = "ips";
		$this->paydetail['mer_order_num'] = $submitdata['Billno'];
		M( "member_payonline" )->add( $this->paydetail );
		$this->create( $submitdata, "https://pay.ips.com.cn/ipayment.aspx" );		//正式环境
		//$this->create( $submitdata, "https://pay.ips.net.cn/ipayment.aspx" );		//测试环境
	}
	
	//网银在线
	public function chinabank(){
		if($this->payConfig['chinabank']['enable']==0) exit("对不起，该支付方式被关闭，暂时不能使用!");
		$this->getPaydetail();
		$submitdata['v_mid'] = $this->payConfig['chinabank']['mid'];
		$submitdata['v_oid'] = "chinabank".date("YmdHis").rand(10000,99999);
		$submitdata['v_amount'] = $this->paydetail['money'];
		$submitdata['v_moneytype'] = 'CNY';
		$submitdata['v_url'] = $this->notice_url."?payid=chinabank";
		$submitdata['v_md5info'] = strtoupper($this->getSign('chinabank',$submitdata));
		
		//if($this->paydetail['bank']) $submitdata['bankCode'] = $this->paydetail['bank'];//银行直联必须
		//$submitdata['userType'] = 1;//银行直联,1个人,2企业
		
		//本地要保存的信息
		unset($this->paydetail['bank']);
		$this->paydetail['fee'] = getFloatValue($this->payConfig['chinabank']['feerate'] * $this->paydetail['money'] / 100,2);
		$this->paydetail['nid'] = $this->createnid('chinabank',$submitdata['v_oid']);
		$this->paydetail['way'] = 'chinabank';
		M('member_payonline')->add($this->paydetail);
		$this->create($submitdata,"https://Pay3.chinabank.com.cn/PayGate");
	}

	//通联支付
	public function allinpay(){
		if ( $this->payConfig['allinpay']['enable'] == 0 )
		{
			exit( "对不起，该支付方式被关闭，暂时不能使用!" );
		}
		$allinpay_params = C('ALLINPAY_PARAMS');
		$this->getPaydetail();
// 		$submitdata['inputCharset'] = "1";
		$submitdata['pickupUrl'] = $this->return_url."?payid=allinpay";
		$submitdata['receiveUrl'] = $this->notice_url."?payid=allinpay";
		$submitdata['version'] = "v1.0";
// 		$submitdata['language'] = "1";
		$submitdata['signType'] = "1";
		$submitdata['merchantId'] = $this->payConfig['allinpay']['MerCode'];
// 		$submitdata['payerName'] = "";
// 		$submitdata['payerEmail'] = "";
// 		$submitdata['payerTelephone'] = "";
// 		$submitdata['payerIDCard'] = "";
// 		$submitdata['pid'] = "";
		$submitdata['orderNo'] = "allinpay".date("YmdHis").rand(10000,99999);
		$submitdata['orderAmount'] = doubleval($this->paydetail['money']) * 100;
// 		$submitdata['orderCurrency'] = "0";
		$submitdata['orderDatetime'] = date("YmdHis",time());
// 		$submitdata['orderExpireDatetime'] = "";
// 		$submitdata['productName'] = "";
// 		$submitdata['productPrice'] = "";
// 		$submitdata['productNum'] = "";
// 		$submitdata['productId'] = "";
// 		$submitdata['productDesc'] = "";
// 		$submitdata['ext1'] = "";
// 		$submitdata['ext2'] = "";
// 		$submitdata['extTL'] = "";
		$submitdata['payType'] = "1";
		
		if($allinpay_params['MODE'] == 'TEST')
			$submitdata['issuerId'] = $allinpay_params['TEST_BANK_CODE'];
		else
			$submitdata['issuerId'] = $this->paydetail['bank'];
// 		$submitdata['pan'] = "";
// 		$submitdata['tradeNature'] = "";
		$submitdata['signMsg'] = $this->getSign('allinpay',$submitdata);
		$this->paydetail['fee'] = getfloatvalue( $this->payConfig['allinpay']['feerate'] * $this->paydetail['money'] / 100, 2 );
		$this->paydetail['nid'] = $this->createnid( "allinpay", $submitdata['orderNo']);
		$this->paydetail['way'] = "allinpay";
		$this->paydetail['mer_order_num'] = $submitdata['orderNo'];
		M( "member_payonline" )->add( $this->paydetail );
		$this->create( $submitdata, $allinpay_params[$allinpay_params['MODE'].'_PAY_URL']);
	}
	
	//财付通
	public function tenpay(){
		if ( $this->payConfig['tenpay']['enable'] == 0 ){
			exit( "对不起，该支付方式被关闭，暂时不能使用!" );
		}
		$tenpay_params = C('TENPAY_PARAMS');
		$this->getPaydetail();
		$this->paydetail['use_account'] = empty($_GET['useAccount'])?0:$_GET['useAccount'];

		require_once C('APP_ROOT')."Lib/Pay/Tenpay/RequestHandler.class.php";

		/* 创建支付请求对象 */
		$reqHandler = new RequestHandler();
		$reqHandler->init();
		$reqHandler->setKey($this->payConfig['tenpay']['mkey']);
		$reqHandler->setGateUrl($tenpay_params["PAY_URL"]);
		
		//----------------------------------------
		//设置支付参数
		//----------------------------------------
		$reqHandler->setParameter("total_fee", doubleval($this->paydetail['money']) * 100);  //总金额
		//用户ip
		$reqHandler->setParameter("spbill_create_ip", get_client_ip());//客户端IP
		$reqHandler->setParameter("return_url", $this->tenpay_rtn_url);//支付成功后返回
		$reqHandler->setParameter("partner", $this->payConfig['tenpay']['MerCode']);
		$reqHandler->setParameter("out_trade_no", "tenpay".date("YmdHis").rand(10000,99999));
		$reqHandler->setParameter("notify_url", $this->tenpay_notice_url);
		$reqHandler->setParameter("body", "轩宇泰投资用户充值");
		if($this->paydetail['use_account'] == 1){
			$this->paydetail['bank'] = "";
			$reqHandler->setParameter("bank_type", "DEFAULT");              //买方财付通帐号
		}else{
			$reqHandler->setParameter("bank_type", $this->paydetail['bank']);  	  //银行类型，默认为财付通
		}
		$reqHandler->setParameter("fee_type", "1");               //币种
		//系统可选参数
		$reqHandler->setParameter("sign_type", "MD5");  	 	  //签名方式，默认为MD5，可选RSA
		$reqHandler->setParameter("service_version", "1.0"); 	  //接口版本号
		$reqHandler->setParameter("input_charset", "UTF-8");   	  //字符集
		$reqHandler->setParameter("sign_key_index", "1");    	  //密钥序号
		
		//业务可选参数
		$reqHandler->setParameter("attach", "");             	  //附件数据，原样返回就可以了
		$reqHandler->setParameter("product_fee", "");        	  //商品费用
		$reqHandler->setParameter("transport_fee", "");      	  //物流费用
		$reqHandler->setParameter("time_start", date("YmdHis"));  //订单生成时间
		$reqHandler->setParameter("time_expire", "");             //订单失效时间

		$reqHandler->setParameter("buyer_id", "");
		$reqHandler->setParameter("goods_tag", "");               //商品标记
		
		//请求的URL
		$reqUrl = $reqHandler->getRequestURL();
		
		$this->paydetail['fee'] = getfloatvalue( $this->payConfig['tenpay']['feerate'] * $this->paydetail['money'] / 100, 2 );
		$this->paydetail['nid'] = $this->createnid(	"tenpay", $reqHandler->getParameter("out_trade_no"));
		$this->paydetail['way'] = "tenpay";
		$this->paydetail['mer_order_num'] = $reqHandler->getParameter("out_trade_no");
		M( "member_payonline" )->add( $this->paydetail );
		$this->create( $reqHandler->getAllParameters(), $reqHandler->getGateUrl());
	}
	
	public function payreturn(){
		$payid = $_REQUEST['payid'];
		$rtnUrl = __APP__."/member/charge#fragment-2";
		switch($payid){
			case 'gfb':
				$recode = $_REQUEST['respCode'];
				if($recode=="0000"){//充值成功
					$signGet = $this->getSign('gfb',$_REQUEST);
					$nid = $this->createnid('gfb',$_REQUEST['merOrderNum']);
					if($_REQUEST['signValue']==$signGet){//充值完成
						$this->success("充值完成",$rtnUrl);
					}else{//签名不付
						$this->error("签名不付",$rtnUrl);
					}
				}else{//充值失败
						$this->error(auto_charset($_REQUEST['msgExt']),$rtnUrl);
				}
			break;
			case "ips" :
				$recode = $_REQUEST['succ'];
				if ( $recode == "Y" )
				{
					$signGet = $this->getSign( "ips_return", $_REQUEST );
					$nid = $this->createnid( "ips", $_REQUEST['billno'] );
					if ( $_REQUEST['signature'] == $signGet )
					{
						$this->success( "充值完成", $rtnUrl );
					}
					else
					{
						$this->error( "签名不付", $rtnUrl );
					}
				}
				else
				{
					$this->error( "充值失败", $rtnUrl );
				}
			break;
			case 'chinabank':
				$v_pstatus = $_REQUEST['v_pstatus'];
				if($v_pstatus=="20"){//充值成功
					$signGet = strtoupper($this->getSign('chinabank_return',$_REQUEST));
					$nid = $this->createnid('chinabank',$_REQUEST['v_oid']);
					if($_REQUEST['v_md5str']==$signGet){//充值完成
						$this->success("充值完成",$rtnUrl);
					}else{//签名不付
						$this->error("签名不付",$rtnUrl);
					}
				}else{//充值失败
						$this->error("充值失败",$rtnUrl);
				}
			break;
			case 'allinpay':
				$this->success("充值完成",$rtnUrl);
				break;
		}
	}
	
	public function paynotice(){
		$payid = $_REQUEST['payid'];
		switch($payid){
			case 'gfb':
				$recode = $_REQUEST['respCode'];
				if($recode=="0000"){//充值成功
					$signGet = $this->getSign('gfb',$_REQUEST);
					$nid = $this->createnid('gfb',$_REQUEST['merOrderNum']);
					$money = $_REQUEST['tranAmt'];
					if($_REQUEST['signValue']==$signGet){//充值完成
						$done = $this->payDone(1,$nid,$_REQUEST['orderId'], 'tranAmt:'.$money);
					}else{//签名不付
						$done = $this->payDone(2,$nid,$_REQUEST['orderId'], print_r($_REQUEST, true));
					}
				}else{//充值失败
					$done = $this->payDone(3,$nid,$_REQUEST['orderId'], print_r($_REQUEST, true));
				}
				if($done===true) echo "ResCode=0000|JumpURL=".$this->member_url;
				else echo "ResCode=9999|JumpURL=".$this->member_url;
			break;
			case "ips" :
				$recode = $_REQUEST['succ'];
				if ( $recode == "Y" )
				{
					$signGet = $this->getSign( "ips_return", $_REQUEST );
					$nid = $this->createnid( "ips", $_REQUEST['billno'] );
					if ( $_REQUEST['signature'] == $signGet )
					{
						$done = $this->payDone( 1, $nid, $_REQUEST['ipsbillno'], 'amount:'.$_REQUEST['amount']);
					}
					else
					{
						$done = $this->payDone( 2, $nid, $_REQUEST['ipsbillno'], print_r($_REQUEST, true));
						echo "签名不正确";
					}
				}
				else
				{
					$done = $this->payDone( 3, $nid, $_REQUEST['ipsbillno'], print_r($_REQUEST, true));
				}
				if ( $done === true )
				{
					echo "ipscheckok";//回复ipscheckok表示已成功接收到该笔订单
				}
				else
				{
					echo "交易失败";
				}
				break;
			case 'chinabank':
				$v_pstatus = $_REQUEST['v_pstatus'];
				if($v_pstatus=="20"){//充值成功
					$signGet = strtoupper($this->getSign('chinabank_return',$_REQUEST));
					$nid = $this->createnid('chinabank',$_REQUEST['v_oid']);
					$money = $_REQUEST['v_amount'];
					if($_REQUEST['v_md5str']==$signGet){//充值完成
						$done = $this->payDone(1,$nid,$_REQUEST['v_oid'], 'v_amount:'.$money);
					}else{//签名不付
						$done = $this->payDone(2,$nid,$_REQUEST['v_oid'], print_r($_REQUEST, true));
						echo "签名不正确";
					}
				}else{//充值失败
					$done = $this->payDone(3,$nid, $_REQUEST['v_oid'], print_r($_REQUEST, true));
				}
				if($done===true) echo "ok";
				else echo "error";
			break;
			case 'allinpay':
				$result = $this->getAllinpyOrderResult();

				$nid = $this->createnid( "allinpay", $result['orderNo']);
				if($result['verify_result'] !== true){
					$done = $this->payDone(2, $nid, $result['paymentOrderId'], print_r($result, true));
					echo "验签失败";
					return;
				}
				
				//验签成功，还需要判断订单状态，为"1"表示支付成功。
				if($result['verify_result'] and $result['payResult'] == 1){
					$done = $this->payDone(1,$nid, $result['paymentOrderId'], 'orderAmount:'.$result['orderAmount']);
				}else{
					$done = $this->payDone(3,$nid, $result['paymentOrderId'], print_r($result, true));
				}
				if($done===true) echo "ok";
				else echo "充值失败";
			break;
		}
	}
	
	public function tenpayreturn(){
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/ResponseHandler.class.php";
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/RequestHandler.class.php";
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/client/ClientResponseHandler.class.php";
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/client/TenpayHttpClient.class.php";
		/* 创建支付应答对象 */
		$resHandler = new ResponseHandler();
		$resHandler->setKey($this->payConfig['tenpay']['mkey']);
		
		//Log::write('tenpay return：'.print_r($resHandler->getAllParameters(), true), Log::DEBUG);
		
		$rtnUrl = __APP__."/member/charge#fragment-2";
		//判断签名
		if($resHandler->isTenpaySign()) {
			//通知id
			$notify_id = $resHandler->getParameter("notify_id");
		
			$tenpay_params = C('TENPAY_PARAMS');
			//通过通知ID查询，确保通知来至财付通
			//创建查询请求
			$queryReq = new RequestHandler();
			$queryReq->init();
			$queryReq->setKey($this->payConfig['tenpay']['mkey']);
			$queryReq->setGateUrl($tenpay_params["VERIFY_URL"]);
			$queryReq->setParameter("partner", $this->payConfig['tenpay']['MerCode']);
			$queryReq->setParameter("notify_id", $notify_id);
			$queryReq->setParameter("input_charset", "UTF-8");
		
			//通信对象
			$httpClient = new TenpayHttpClient();
			$httpClient->setTimeOut(5);
			//设置请求内容
			$httpClient->setReqContent($queryReq->getRequestURL());
		
			//后台调用
			if($httpClient->call()) {
				//设置结果参数
				$queryRes = new ClientResponseHandler();
				$queryRes->setContent($httpClient->getResContent());
				$queryRes->setKey($this->payConfig['tenpay']['mkey']);
		
				//判断签名及结果
				//只有签名正确,retcode为0，trade_state为0才是支付成功
				if($queryRes->isTenpaySign() && $queryRes->getParameter("retcode") == "0" && $queryRes->getParameter("trade_state") == "0" && $queryRes->getParameter("trade_mode") == "1" ) {
					//取结果参数做业务处理
					$out_trade_no = $queryRes->getParameter("out_trade_no");
					//财付通订单号
					$transaction_id = $queryRes->getParameter("transaction_id");
					//金额,以分为单位
					$total_fee = $queryRes->getParameter("total_fee");
					//如果有使用折扣券，discount有值，total_fee+discount=原请求的total_fee
					$discount = $queryRes->getParameter("discount");
		
					//------------------------------
					//处理业务开始
					//------------------------------
		
					//处理数据库逻辑
					//注意交易单不要重复处理
					//!!!注意判断返回金额!!!
					$nid = $this->createnid( "tenpay", $out_trade_no);
		
					//------------------------------
					//处理业务完毕
					//------------------------------
					$this->success("充值完成",$rtnUrl);
		
				} else {
					$out_trade_no = $resHandler->getParameter("out_trade_no");
					$nid = $this->createnid( "tenpay", $out_trade_no);
					$done = $this->payDone(3,$nid, "", print_r($queryRes->getAllParameters(), true));
					//错误时，返回结果可能没有签名，写日志trade_state、retcode、retmsg看失败详情。
					$this->error("支付失败",$rtnUrl);
				}
			}else {
// 				$out_trade_no = $resHandler->getParameter("out_trade_no");
// 				$transaction_id = $resHandler->getParameter("transaction_id");
// 				$nid = $this->createnid( "tenpay", $out_trade_no);
// 				$done = $this->payDone(3,$nid, $transaction_id, print_r($resHandler->getAllParameters(), true));
				//通信失败
				//后台调用通信失败,写日志，方便定位问题，这些信息注意保密，最好不要打印给用户
				$this->error("订单通知查询失败:" . $httpClient->getResponseCode() ."," . $httpClient->getErrInfo(),$rtnUrl);
				Log::write("tenpay return：<br>call err:" . $httpClient->getResponseCode() ."," . $httpClient->getErrInfo(), Log::DEBUG);
			}
		} else {
			$out_trade_no = $resHandler->getParameter("out_trade_no");
			$transaction_id = $resHandler->getParameter("transaction_id");
			$nid = $this->createnid( "tenpay", $out_trade_no);
			$done = $this->payDone(2, $nid, $transaction_id, print_r($resHandler->getAllParameters(), true));
			//签名错误
			$this->error("签名失败",$rtnUrl);
		}
	}

	public function tenpaynotice(){
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/ResponseHandler.class.php";
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/RequestHandler.class.php";
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/client/ClientResponseHandler.class.php";
		require_once C('APP_ROOT')."Lib/Pay/Tenpay/client/TenpayHttpClient.class.php";

		/* 创建支付应答对象 */
		$resHandler = new ResponseHandler();
		$resHandler->setKey($this->payConfig['tenpay']['mkey']);
		
		//Log::write('tenpay notice：'.print_r($resHandler->getAllParameters(), true), Log::DEBUG);
		
		//判断签名
		if($resHandler->isTenpaySign()) {
			//通知id
			$notify_id = $resHandler->getParameter("notify_id");
			$tenpay_params = C('TENPAY_PARAMS');
		
			//通过通知ID查询，确保通知来至财付通
			//创建查询请求
			$queryReq = new RequestHandler();
			$queryReq->init();
			$queryReq->setKey($this->payConfig['tenpay']['mkey']);
			$queryReq->setGateUrl($tenpay_params["VERIFY_URL"]);
			$queryReq->setParameter("partner", $this->payConfig['tenpay']['MerCode']);
			$queryReq->setParameter("notify_id", $notify_id);
			$queryReq->setParameter("input_charset", "UTF-8");
		
			//通信对象
			$httpClient = new TenpayHttpClient();
			$httpClient->setTimeOut(5);
			//设置请求内容
			$httpClient->setReqContent($queryReq->getRequestURL());
		
			//后台调用
			if($httpClient->call()) {
				//设置结果参数
				$queryRes = new ClientResponseHandler();
				$queryRes->setContent($httpClient->getResContent());
				$queryRes->setKey($this->payConfig['tenpay']['mkey']);
		
				//判断签名及结果
				//只有签名正确,retcode为0，trade_state为0才是支付成功
				if($queryRes->isTenpaySign() && $queryRes->getParameter("retcode") == "0" && $queryRes->getParameter("trade_state") == "0" && $queryRes->getParameter("trade_mode") == "1" ) {
					//取结果参数做业务处理
					$out_trade_no = $queryRes->getParameter("out_trade_no");
					//财付通订单号
					$transaction_id = $queryRes->getParameter("transaction_id");
					//金额,以分为单位
					$total_fee = $queryRes->getParameter("total_fee");
					//如果有使用折扣券，discount有值，total_fee+discount=原请求的total_fee
					$discount = $queryRes->getParameter("discount");
						
					//------------------------------
					//处理业务开始
					//------------------------------
						
					//处理数据库逻辑
					//注意交易单不要重复处理
					//注意判断返回金额
					$nid = $this->createnid( "tenpay", $out_trade_no);
					$done = $this->payDone(1, $nid, $transaction_id, "total_fee:".$total_fee);
						
					//------------------------------
					//处理业务完毕
					//------------------------------
					echo "success";
						
				} else {
					//错误时，返回结果可能没有签名，写日志trade_state、retcode、retmsg看失败详情。
					//echo "验证签名失败 或 业务错误信息:trade_state=" . $queryRes->getParameter("trade_state") . ",retcode=" . $queryRes->getParameter("retcode"). ",retmsg=" . $queryRes->getParameter("retmsg") . "<br/>" ;
					$out_trade_no = $resHandler->getParameter("out_trade_no");
					$nid = $this->createnid( "tenpay", $out_trade_no);
					$done = $this->payDone(3, $nid, "", print_r($queryRes->getAllParameters(), true));
					echo "fail";
				}
			}else {
// 				$out_trade_no = $resHandler->getParameter("out_trade_no");
// 				$nid = $this->createnid( "tenpay", $out_trade_no);
// 				$done = $this->payDone(3,$nid, "", print_r($resHandler->getAllParameters(), true));
				//通信失败
				echo "fail";
				//后台调用通信失败,写日志，方便定位问题
				//echo "<br>call err:" . $httpClient->getResponseCode() ."," . $httpClient->getErrInfo() . "<br>";
				Log::write("tenpay notice：<br>call err:" . $httpClient->getResponseCode() ."," . $httpClient->getErrInfo(), Log::DEBUG);
			}
		} else {
			$out_trade_no = $resHandler->getParameter("out_trade_no");
			$transaction_id = $resHandler->getParameter("transaction_id");
			$nid = $this->createnid( "tenpay", $out_trade_no);
			$done = $this->payDone(2, $nid, $transaction_id, print_r($resHandler->getAllParameters(), true));
			//回调签名错误
			echo "fail";
		}
	}
	
	private function payDone($status,$nid,$oid, $payResult = ""){
		$done = false;
		$Moneylog = M('member_payonline');
		if($this->locked) return false;
		$this->locked = true;
		$Moneylog->startTrans();
		$vo = $Moneylog->lock(true)->field('uid,money,fee,status')->where("nid='{$nid}'")->find();
		if( !is_array($vo) || $vo['status']==1){
			$Moneylog->commit();
			return $done;
		}
		switch($status){
			case 1:
				$updata['status'] = $status;
				$updata['tran_id'] = text($oid);
				$updata['pay_result'] = $payResult;
				$xid = $Moneylog->where("uid={$vo['uid']} AND nid='{$nid}'")->save($updata);
				
				$tmoney = floatval($vo['money'] - $vo['fee']);
				if($xid) $newid = memberMoneyLog($vo['uid'],3,$tmoney,"充值订单号:".$oid);//更新成功才充值,避免重复充值 
				if(!$newid){
					$updata['status'] = 0;
					$Moneylog->where("uid={$vo['uid']} AND nid='{$nid}'")->save($updata);
					$Moneylog->commit();
					return false;
				}
				MTip("payonline", $vo['uid'], $vo['money']);
				break;
			case 2:
				$updata['status'] = $status;
				$updata['tran_id'] = text($oid);
				$updata['pay_result'] = $payResult;
				$xid = $Moneylog->where("uid={$vo['uid']} AND nid='{$nid}'")->save($updata);
				break;
			case 3:
				$updata['status'] = $status;
				$updata['pay_result'] = $payResult;
				$xid = $Moneylog->where("uid={$vo['uid']} AND nid='{$nid}'")->save($updata);
				break;
		}

		if($status>0){
			if($xid){
				$done = true;
			}
		}
		$Moneylog->commit();
		$this->locked = false;
		return $done;
	}
	
	private function createnid($type,$static){
			return md5("XXXXX@@#$%".$type.$static);
	}
	
	private function getPaydetail(){
		if(!$this->uid) exit;
		$this->paydetail['money'] = getFloatValue($_GET['t_money'],2);
		$this->paydetail['fee'] = 0;
		$this->paydetail['add_time'] = time();
		$this->paydetail['add_ip'] = get_client_ip();
		$this->paydetail['status'] = 0;
		$this->paydetail['uid'] = $this->uid;
		$this->paydetail['bank'] = $_GET['bankCode'];
	}
	
	private function getSign($type,$data){
		$md5str="";
		switch($type){
			case "gfb":
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
				foreach($signarray as $v){
					if(!isset($data[$v])) $md5str .= "$v=[]";
					else $md5str .= "$v=[$data[$v]]";
				}
				$md5str.="VerficationCode=[".$this->payConfig['guofubao']['VerficationCode']."]";
				$md5str = md5($md5str);
				return $md5str;
			break;
			case "ips" :
				$md5str = "billno".$data['Billno']."currencytype".$data['Currency_Type']."amount".$data['Amount']."date".$data['Date']."orderencodetype".$data['OrderEncodeType'];
				$md5str .= $this->payConfig['ips']['MerKey'];
				$md5str = md5( $md5str );
				return $md5str;
			break;
			case "ips_return" :
				$md5str = "billno".$data['billno']."currencytype".$data['Currency_type']."amount".$data['amount']."date".$data['date']."succ".$data['succ']."ipsbillno".$data['ipsbillno']."retencodetype".$data['retencodetype'];
				$md5str .= $this->payConfig['ips']['MerKey'];
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
				$md5str.=$this->payConfig['chinabank']['mkey'];
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
				$md5str.=$this->payConfig['chinabank']['mkey'];
				$md5str = md5($md5str);
				return $md5str;
			break;
			case "allinpay":
				foreach ($data as $k=>$v){
					$md5str.="$k=$data[$k]&";
				}
				$md5str.= "key={$this->payConfig['allinpay']['mkey']}";
				$md5str = strtoupper(md5($md5str));
				return $md5str;
			break;
		}
	}
	
	private function create($data,$submitUrl, $charset="utf-8"){
		$inputstr = "";
		foreach($data as $key=>$v){
			$inputstr .= '<input type="hidden"  id="'.$key.'" name="'.$key.'" value="'.$v.'"/>
		';
		}
		
		$form = '
		<form action="'.$submitUrl.'" name="pay" id="pay" method="POST">
';
		$form.=	$inputstr;
		$form.=	'
</form>
		';
		
		$html = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset='.$charset.'" />
        <title>请不要关闭页面,支付跳转中.....</title>
        </head>
<body>
        ';
        $html.=	$form;
        $html.=	'
        <script type="text/javascript">
		document.getElementById("pay").submit();
		</script>
        ';
        $html.= '
        </body>
</html>
		';
				 
		Mheader('utf-8');
		echo $html;
		exit;
	}
	
	private function getAllinpyOrderResult(){
		require_once C('APP_ROOT')."Lib/Pay/allinpay/php_rsa.php";
		
		$result = array();
		
		$merchantId=$_REQUEST["merchantId"];
		$version=$_REQUEST['version'];
		$language=$_REQUEST['language'];
		$signType=$_REQUEST['signType'];
		$payType=$_REQUEST['payType'];
		$issuerId=$_REQUEST['issuerId'];
		$paymentOrderId=$_REQUEST['paymentOrderId'];
		$orderNo=$_REQUEST['orderNo'];
		$orderDatetime=$_REQUEST['orderDatetime'];
		$orderAmount=$_REQUEST['orderAmount'];
		$payDatetime=$_REQUEST['payDatetime'];
		$payAmount=$_REQUEST['payAmount'];
		$ext1=$_REQUEST['ext1'];
		$ext2=$_REQUEST['ext2'];
		$payResult=$_REQUEST['payResult'];
		$errorCode=$_REQUEST['errorCode'];
		$returnDatetime=$_REQUEST['returnDatetime'];
		$signMsg=$_REQUEST["signMsg"];
		
		$bufSignSrc="";
		if($merchantId != "")
			$bufSignSrc=$bufSignSrc."merchantId=".$merchantId."&";
		if($version != "")
			$bufSignSrc=$bufSignSrc."version=".$version."&";
		if($language != "")
			$bufSignSrc=$bufSignSrc."language=".$language."&";
		if($signType != "")
			$bufSignSrc=$bufSignSrc."signType=".$signType."&";
		if($payType != "")
			$bufSignSrc=$bufSignSrc."payType=".$payType."&";
		if($issuerId != "")
			$bufSignSrc=$bufSignSrc."issuerId=".$issuerId."&";
		if($paymentOrderId != "")
			$bufSignSrc=$bufSignSrc."paymentOrderId=".$paymentOrderId."&";
		if($orderNo != "")
			$bufSignSrc=$bufSignSrc."orderNo=".$orderNo."&";
		if($orderDatetime != "")
			$bufSignSrc=$bufSignSrc."orderDatetime=".$orderDatetime."&";
		if($orderAmount != "")
			$bufSignSrc=$bufSignSrc."orderAmount=".$orderAmount."&";
		if($payDatetime != "")
			$bufSignSrc=$bufSignSrc."payDatetime=".$payDatetime."&";
		if($payAmount != "")
			$bufSignSrc=$bufSignSrc."payAmount=".$payAmount."&";
		if($ext1 != "")
			$bufSignSrc=$bufSignSrc."ext1=".$ext1."&";
		if($ext2 != "")
			$bufSignSrc=$bufSignSrc."ext2=".$ext2."&";
		if($payResult != "")
			$bufSignSrc=$bufSignSrc."payResult=".$payResult."&";
		if($errorCode != "")
			$bufSignSrc=$bufSignSrc."errorCode=".$errorCode."&";
		if($returnDatetime != "")
			$bufSignSrc=$bufSignSrc."returnDatetime=".$returnDatetime;
		
		$allinpay_params = C('ALLINPAY_PARAMS');
		//验签
		//解析publickey.txt文本获取公钥信息
		$publickeyfile = C('APP_ROOT').$allinpay_params[$allinpay_params["MODE"].'_KEY'];
		$publickeycontent = file_get_contents($publickeyfile);
		//echo "<br>".$content;
		$publickeyarray = explode(PHP_EOL, $publickeycontent);
		$publickey = explode('=',$publickeyarray[0]);
		$modulus = explode('=',$publickeyarray[1]);
		//echo "<br>publickey=".$publickey[1];
		//echo "<br>modulus=".$modulus[1];
		
		$keylength = 1024;
		//验签结果
		$verify_result = rsa_verify($bufSignSrc,$signMsg, $publickey[1], $modulus[1], $keylength,"sha1");
		
		$result['verify_result'] = $verify_result;
		$result['merchantId'] = $merchantId;
		$result['version'] = $version;
		$result['language'] = $language;
		$result['signType'] = $signType;
		$result['payType'] = $payType;
		$result['issuerId'] = $issuerId;
		$result['paymentOrderId'] = $paymentOrderId;
		$result['orderNo'] = $orderNo;
		$result['orderDatetime'] = $orderDatetime;
		$result['orderAmount'] = $orderAmount;
		$result['payDatetime'] = $payDatetime;
		$result['payAmount'] = $payAmount;
		$result['ext1'] = $ext1;
		$result['ext2'] = $ext2;
		$result['payResult'] = $payResult;
		$result['errorCode'] = $errorCode;
		$result['returnDatetime'] = $returnDatetime;
		return $result;
	}
}