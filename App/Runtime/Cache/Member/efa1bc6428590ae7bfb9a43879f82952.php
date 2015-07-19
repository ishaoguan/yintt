<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="__ROOT__/Style/M/js/amounttochinese.js" language="javascript"></script>
<script type="text/javascript">
$(function() {
	//$("#btnSendMsg").click(sendSMS);
	$("#txt_Amount").bind("keyup", function() {
		$this = $(this);
		$this.val($this.val().toString().replace(/[^(\d|\.)]+/, ""));
	});
	$("#txt_Amount").focus(function() {
		$("#d_money").css("display", "none");
	});
});
var suretx = function(d,h,v){
	if(d===true){
		$.jBox.tip(AJAX_TIPS, 'loading', {timeout:AJAX_TIMEOUT});
		$.ajax({
			url: "__URL__/actwithdraw",
			type: "post",
			dataType: "json",
			data: {"pwd":$("#txtPassword").val(),"amount":$("#txt_Amount").val()},
			success: function(d) {
				$.jBox.tip("", 'loading', {timeout:1});
				if (d.status == 2) {
					$.jBox.tip(d.message,'fail');
				}
				else if(d.status==1) {
					$.jBox.alert(d.message, ALERT_TIT, {closed:function(){ajaxreload($("a[href='#fragment-1']"));ajaxreload($("a[href='#fragment-2']"));$("a[href='#fragment-2']").click();}});
				} else {
					$.jBox.tip("支付密码错误！", 'fail');
				}
			}
		});
	}
}
var arrWrong = "<img  src='__ROOT__/Style/M/images/zhuce2.gif'/>&nbsp";
function SetError(val, cont) {
		$("#d_money").css("display", "block");
		$("#d_money").html(val + cont);
		$("#d_money").attr("class", "reg_wrong");
}

function drawMoney() {
	if (testAmount()) {
		if ($("#txtPassword").val().length < 1) {
			$.jBox.tip("您好，请输入支付密码后再点击确认提现！", 'tip');
			return;
		}
		if (parseFloat($("#txt_Amount").val()) <= parseFloat($("#currentMoeny").html()) && $("#txtPassword").eq(0).val().length > 0 && parseFloat($("#txt_Amount").val()) > 0) {
			$.ajax({
				url: "__URL__/validate",
				type: "post",
				dataType: "json",
				data: {"pwd":$("#txtPassword").val(),"amount":$("#txt_Amount").val(),smscode:$("#code").val()},
				success: function(d) {
					if (d.status == 2) {
						$.jBox.tip(d.message,'fail');
					}
					else if(d.status==1) {
						$.jBox.confirm(d.message, "提现确认", suretx, { buttons: { '确认提现': true, '暂不提现': false} });
					} 

					else if(d.status==3) {
						$.jBox.tip("手机验证码错误！", 'fail');
					} 
					else {
						$.jBox.tip("支付密码错误！", 'fail');
					}
				}
			});
		} 
	}
}

function testAmount() {
	var testreuslt = true;
	if ($("#txt_Amount").val() == '') {
		SetError(arrWrong, "请输入提现金额，如1000.10。");
		testreuslt = false;
	}
	if (!(/^\d+(.)?\d{1,2}$/.test($("#txt_Amount").val()))) {
		SetError(arrWrong, "请输入正确的提现金额，如1001.20。");
		testreuslt = false;
	}
	if (parseFloat($("#txt_Amount").val()) < 100) {
		SetError(arrWrong, "提现金额不能小于100。");
		testreuslt = false;
	}
	if (parseFloat($("#txt_Amount").val()) > 500000) {
		SetError(arrWrong, "提现金额不能大于500000。");
		testreuslt = false;
	}
	if (parseFloat($("#currentMoeny").html()) < parseFloat($("#txt_Amount").val())) {
		SetError(arrWrong, "您的账户余额不足以提现。");
		testreuslt = false;
	}
	
	if (testreuslt) {
		showChineseAmount();
	}
	return testreuslt;
}

function showChineseAmount() {
	var regamount = /^(([1-9]{1}[0-9]{0,})|([0-9]{1,}\.[0-9]{1,2}))$/;
	var reg = new RegExp(regamount);
	if (reg.test($("#txt_Amount").val())) {
		var amstr = $("#txt_Amount").val();
		var leng = amstr.toString().split('.').length;
		if (leng == 1) {
			$("#txt_Amount").val($("#txt_Amount").val() + ".00");
		}
		$("#d_money").html(Arabia_to_Chinese($("#txt_Amount").val()));
		$("#d_money").css("display", "");
		$("#d_money").css("color", "red");
		$("#d_money").removeClass("reg_wrong");
	}
	else {
		$("#d_money").html("");
	}
}
</script>
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($vo["real_name"]); ?>，您可以将账户中的余额提取到银行卡中，敬请仔细操作 </p>
</div>
<div class="u12_clew">
	<p>
	1、尊敬的<?php echo ($vo["real_name"]); ?>，提现操作涉及您的资金变动，请仔细核对您的提现信息<br>
	2、一般用户单日提现上限为30万元<br>
	3、涉及到您的资金安全，请仔细操作</p>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<th width="110">您的银行账号是：</th>
  	<td>
		<div style="height: 20px; line-height: 20px;">
			<?php echo (hidecard($vo["bank_num"],3,'还没有登记您的银行账号')); ?>
			[<a href="__APP__/member/bank#fragment-1">点此修改</a>]
		</div>
		<div style="height: 20px; line-height: 20px;">
			<?php echo ($vo["bank_name"]); ?> -- <?php echo ($vo["bank_address"]); ?>
		</div>
  	</td>
  </tr>
  <tr>
  	<th>您的真实姓名：</th>
  	<td><?php echo ($vo["real_name"]); ?>（必须和您银行账户姓名一致）</td>
  </tr>
  <tr>
  	<th>联络手机：</th>
  	<td><?php echo (($vo["user_phone"])?($vo["user_phone"]):"还未验证"); ?>
				（<?php echo ($glo["web_name"]); ?>划款时会通知您）[<a href="__APP__/member/safe#fragment-3">点此修改</a>]</td>
  </tr>
  <tr>
  	<th>提款期限：</th>
  	<td>24小时/72小时（1个工作日内处理，3工作日内到账，具体到账时间各银行有所不同）</td>
  </tr>
  <tr>
  	<th>可提现金额：</th>
  	<td>[<span id="currentMoeny"><?php echo ($vo["account_money"]); ?></span>] （单日提现金额会员限制为100-300000元）</td>
  </tr>
  <tr>
  	<th>手续费：</th>
  	<td>投资人提现免费（提现每笔建议100-49999元），借款人提现免费。（充值后未投资提现，需要收取0.5%提现手续费，最低收费5元）。</td>
  </tr>
  <tr>
  	<th>提现金额：</th>
  	<td class="tdinput">
		<div style="float: left; line-height: 21px;">
			<input name="txt_Amount" id="txt_Amount" class="u8_text" onblur="testAmount();" type="text">
		</div>
		<div id="d_money" style="width: 250px; height: 20px; line-height: 20px; margin-left: 10px;float: left;">
		</div></td>
  </tr>
  <tr>
  	<th>支付密码：</th>
  	<td class="tdinput"><input name="txtPassword" id="txtPassword" class="u8_text" style="float: left; margin-top: 5px;" type="password">（为了保证您的提款安全，请输入您的支付密码。）</td>
  </tr>
  <tr>
  	<th>手机验证码：</th>
  	<td class="tdinput">
		<input type="text" class="u8_text" id="code" name="code" maxlength="6" />
		<a href="javascript:;" onclick="sendMobileValidSMSCode()" id="btnSendMsg">获取短信验证码</a>
		<div class="spTip" id="sendSMSTip"></div></td>
  </tr>
  <tr>
  	<th>&nbsp;</th>
  	<td class="tdinput"><input type="button" class="u8_but" value="确认提现" onclick="drawMoney()" /></td>
  </tr>
</table>
<script type="text/javascript">
	if(timer)clearInterval(timer);
	var timer = null;
	var leftsecond = 60; //倒计时
	var msg = "";
	var msgNum=""
	function sendMobileValidSMSCode() {
		var admin_name = "<?php echo ($vo["user_name"]); ?>";
		$.jBox.tip(AJAX_TIPS, 'loading', {timeout:AJAX_TIMEOUT});
		$.ajax({
			url: "__URL__/getSmsCode/",
			type: "post",
			dataType: "json",
			data: {"admin_name":admin_name},
			success: function(d) {
				$.jBox.tip("", 'loading', {timeout:1});
				leftsecond = 60;
				if (d.status == 1) {
					msg = "发送成功，如未收到";
					clearInterval(timer);
					timer = setInterval(setLeftTime, 1000, "1");
					$("#btnSendMsg").html("");
					$("#admin_name").attr("readonly", true);
				}
				else if (d.status == -1) {
					msg = "您的验证码为：" + d.message;
					msgNum = d.message;
					clearInterval(timer);
					timer = setInterval(setLeftTime, 1000, "1");

					$("#btnSendMsg").html("");
					$("#admin_name").attr("readonly", false);
				}
				else {
					msg = d.message;
					msgNum =d.message;
					$.jBox.alert(msg, ALERT_TIT);
					$("#btnSendMsg").html("获取短信验证码");
					$("#admin_name").attr("readonly", false);
				}

			}
		});
	}
	function setLeftTime() {
		var second = Math.floor(leftsecond);
		if($("#spanSec").length == 0)
			$(".spTip").eq(0).html(msg + ",<span id='spanSec'>" + second + "</span>秒后可重发");
		else
			$("#spanSec").html(second);
		leftsecond--;
		if (leftsecond < 1) {
			$(".spTip").eq(0).html("现在可重新发送！");
			clearInterval(timer);
			try {
				$("#btnSendMsg").html("获取短信验证码");
				$("#admin_name").removeAttr("readonly");
			} catch (E) { }
			return;
		}
	}
</script>